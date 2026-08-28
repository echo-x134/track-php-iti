<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Chatbot</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <x-navbar />
    <main class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="h2 mb-0">Admin Chatbot</h1>
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-outline-secondary">Back to dashboard</a>
                </div>
                <div class="card shadow-sm">
                    <div class="card-body">
                        <p class="text-muted">This interface is available to administrators only.</p>
                        @if(session('chatbot_response'))
                            <div class="alert alert-info"><strong>Assistant:</strong> {{ session('chatbot_response') }}</div>
                        @endif
                        <form action="{{ route('admin.chatbot.respond') }}" method="POST">
                            @csrf
                            <label for="message" class="form-label">Message</label>
                            <textarea id="message" name="message" rows="4" class="form-control @error('message') is-invalid @enderror" required maxlength="2000">{{ old('message') }}</textarea>
                            @error('message')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            <button type="submit" class="btn btn-primary mt-3">Send message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
