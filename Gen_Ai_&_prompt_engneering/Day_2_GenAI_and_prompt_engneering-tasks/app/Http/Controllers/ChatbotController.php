<?php

namespace App\Http\Controllers;

use App\Services\ChatbotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ChatbotController extends Controller
{
    public function index(Request $request): View
    {
        return view('chatbot.index', ['user' => $request->user()]);
    }

    public function respond(Request $request, ChatbotService $chatbot): RedirectResponse|JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $response = $chatbot->respond($request->user(), $validated['message']);

        if ($request->expectsJson()) {
            return response()->json(['message' => $response]);
        }

        return back()->with('chatbot_response', $response);
    }

    public function apiRespond(Request $request, ChatbotService $chatbot): JsonResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return response()->json([
            'message' => $chatbot->respond($request->user(), $validated['message']),
        ]);
    }
}
