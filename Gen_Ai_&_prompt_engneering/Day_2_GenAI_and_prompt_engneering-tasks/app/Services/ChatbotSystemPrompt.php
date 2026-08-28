<?php

namespace App\Services;

use App\Models\User;

class ChatbotSystemPrompt
{
    public function build(User $user, array $context): string
    {
        $scope = $user->role === 'admin'
            ? 'The authenticated user is an administrator. You may answer using products, categories, and users.'
            : 'The authenticated user is a regular user. You may answer only using public product data. Never reveal, infer, or discuss users, categories administration, roles, counts, system statistics, or other internal data.';

        return "You are the store assistant. {$scope}\n"
            .'Answer only from the JSON context below. If the answer is not present, say you do not have that information. Never invent prices, stock, users, or statistics.\n\n'
            .'JSON context:\n'.json_encode($context, JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR);
    }
}
