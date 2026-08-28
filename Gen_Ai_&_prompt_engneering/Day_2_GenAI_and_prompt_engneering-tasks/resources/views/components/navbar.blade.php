<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="/">E-Commerce Task</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('products.index') }}">Products</a></li>
                
                @auth
                    <li class="nav-item"><a class="nav-link" href="{{ route('cart.index') }}">Cart</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('chatbot.index') }}">Chatbot</a></li>
                    @if(auth()->user()->role === 'admin')
                        <li class="nav-item"><a class="nav-link" href="{{ route('admin.dashboard') }}">Admin Dashboard</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('categories.index') }}">Categories</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('users.index') }}">Users</a></li>
                    @endif
                @endauth
            </ul>
            
            <ul class="navbar-nav ms-auto">
                @auth
                    <li class="nav-item me-3 d-flex align-items-center">
                        <span class="text-white fw-semibold">Welcome, {{ auth()->user()->name }}</span>
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-danger btn-sm">Logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item"><a class="btn btn-outline-light btn-sm me-2" href="{{ route('login') }}">Login</a></li>
                    <li class="nav-item"><a class="btn btn-primary btn-sm" href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>
        </div>
    </div>
</nav>