<?php

namespace App\Services;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use RuntimeException;
use Throwable;

class ChatbotService
{
    public const ACCESS_DENIED_MESSAGE = 'Access Denied: You do not have permission to view this information.';

    public function __construct(private ChatbotSystemPrompt $systemPrompt) {}

    public function respond(User $user, string $message): string
    {
        if ($user->role !== 'admin' && $this->requestsRestrictedData($message)) {
            return self::ACCESS_DENIED_MESSAGE;
        }

        $context = $this->buildContext($user);

        try {
            return $this->requestGemini($user, $message, $context);
        } catch (ConnectionException|RequestException|RuntimeException $exception) {
            Log::error('Gemini chatbot request failed.', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);
            report($exception);

            return 'The chatbot is temporarily unavailable. Please try again later.';
        } catch (Throwable $exception) {
            Log::error('Unexpected chatbot failure.', [
                'exception' => $exception::class,
                'message' => $exception->getMessage(),
            ]);
            report($exception);

            return 'The chatbot is temporarily unavailable. Please try again later.';
        }
    }

    private function buildContext(User $user): array
    {
        $context = [
            'products' => Product::with('category:id,name')
                ->get(['id', 'name', 'description', 'price', 'quantity', 'category_id'])
                ->map(fn (Product $product): array => [
                    'id' => $product->id,
                    'name' => $product->name,
                    'description' => $product->description,
                    'price' => $product->price,
                    'available_quantity' => $product->quantity,
                    'category' => $product->category?->name,
                ])->all(),
        ];

        if ($user->role === 'admin') {
            $context['categories'] = Category::query()->get(['id', 'name'])->toArray();
            $context['users'] = User::query()->get(['id', 'name', 'email', 'role'])->toArray();
        }

        return $context;
    }

    private function requestGemini(User $user, string $message, array $context): string
    {
        $apiKey = config('services.gemini.api_key', env('GEMINI_API_KEY'));

        if (! is_string($apiKey) || $apiKey === '') {
            return 'Gemini is not configured. Add GEMINI_API_KEY to the environment to enable AI responses.';
        }

        $systemPrompt = $this->systemPrompt->build($user, $context);
        $userMessage = $message;

        $url = "https://generativelanguage.googleapis.com/v1beta/models/gemini-3.5-flash:generateContent?key={$apiKey}";

        $response = Http::withoutVerifying()->post($url, [
            'contents' => [
                [
                    'parts' => [
                        ['text' => $systemPrompt . "\n\nUser Question:\n" . $userMessage],
                    ],
                ],
            ],
        ]);

        if ($response->failed()) {
            Log::error('Gemini Error: ' . $response->body());
            throw new RuntimeException('Gemini request failed with status ' . $response->status() . ': ' . $response->body());
        }

        $reply = $response->json('candidates.0.content.parts.0.text');

        if (! is_string($reply) || trim($reply) === '') {
            throw new RuntimeException('Gemini returned an empty response.');
        }

        return trim($reply);
    }

    private function requestsRestrictedData(string $message): bool
    {
        $normalizedMessage = strtolower($message);
        $restrictedTerms = [
            'user',
            'customers',
            'customer list',
            'system stat',
            'statistics',
            'dashboard',
            'category administration',
            'manage categor',
            'all categor',
            'role',
        ];

        foreach ($restrictedTerms as $term) {
            if (str_contains($normalizedMessage, $term)) {
                return true;
            }
        }

        return false;
    }
}