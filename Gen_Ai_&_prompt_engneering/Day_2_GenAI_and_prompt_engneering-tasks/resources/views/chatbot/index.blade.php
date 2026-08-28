<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Store Chatbot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <x-navbar />
    <main class="container py-4">
        <div class="chat-shell shadow-sm rounded-4 overflow-hidden mx-auto" style="max-width: 920px;">
            <header class="bg-dark text-white p-4 d-flex justify-content-between align-items-center">
                <div>
                    <h1 class="h4 mb-1">Store Assistant</h1>
                    <p class="mb-0 text-white-50">{{ $user->role === 'admin' ? 'Admin context enabled' : 'Product assistance' }}</p>
                </div>
                @if($user->role === 'admin')
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-light btn-sm">Dashboard</a>
                @endif
            </header>
            <section class="chat-history p-3" data-chat-history aria-live="polite">
                <div class="d-flex mb-3" data-chat-row>
                    <div class="chat-bubble chat-bubble-assistant shadow-sm p-3">Hello {{ $user->name }}. How can I help you today?</div>
                </div>
                @if(session('chatbot_response'))
                    <div class="d-flex mb-3" data-chat-row><div class="chat-bubble chat-bubble-assistant shadow-sm p-3">{{ session('chatbot_response') }}</div></div>
                @endif
                <div class="d-flex mb-3 d-none" data-chat-loading>
                    <div class="chat-bubble chat-bubble-assistant shadow-sm p-3 typing-dots" aria-label="Assistant is typing"><span></span><span></span><span></span></div>
                </div>
            </section>
            <form action="{{ route('chatbot.respond') }}" method="POST" class="p-3 bg-white" data-chat-form>
                @csrf
                <div class="input-group">
                    <label for="message" class="visually-hidden">Message</label>
                    <textarea id="message" name="message" rows="1" class="form-control" placeholder="Type a message..." required maxlength="2000"></textarea>
                    <button type="submit" class="btn btn-success px-4">Send</button>
                </div>
                @error('message')<div class="text-danger small mt-2">{{ $message }}</div>@enderror
            </form>
        </div>
    </main>
    <template data-chat-template><div class="d-flex mb-3" data-chat-row><div class="chat-bubble shadow-sm p-3" data-chat-bubble></div></div></template>
</body>
</html>