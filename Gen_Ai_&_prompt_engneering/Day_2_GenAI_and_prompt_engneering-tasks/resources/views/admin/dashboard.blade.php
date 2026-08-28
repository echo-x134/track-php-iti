<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <x-navbar />
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h2 mb-1">Admin Dashboard</h1>
                <p class="text-muted mb-0">Manage the store from one place.</p>
            </div>
            <a href="{{ route('chatbot.index') }}" class="btn btn-dark">Open chatbot</a>
        </div>

        <div class="row g-3 mb-4">
            <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Categories</div><div class="display-6">{{ $categoryCount }}</div><a href="{{ route('categories.index') }}">Manage categories</a></div></div></div>
            <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Products</div><div class="display-6">{{ $productCount }}</div><a href="{{ route('products.index') }}">Manage products</a></div></div></div>
            <div class="col-md-4"><div class="card shadow-sm"><div class="card-body"><div class="text-muted">Users</div><div class="display-6">{{ $userCount }}</div><a href="{{ route('users.index') }}">Manage users</a></div></div></div>
        </div>

        <div class="row g-4">
            <section class="col-lg-4"><div class="card shadow-sm h-100"><div class="card-header d-flex justify-content-between"><strong>Categories</strong><a href="{{ route('categories.create') }}">Add</a></div><ul class="list-group list-group-flush">@forelse($categories as $category)<li class="list-group-item d-flex justify-content-between"><span>{{ $category->name }}</span><a href="{{ route('categories.edit', $category) }}">Edit</a></li>@empty<li class="list-group-item">No categories yet.</li>@endforelse</ul></div></section>
            <section class="col-lg-4"><div class="card shadow-sm h-100"><div class="card-header d-flex justify-content-between"><strong>Products</strong><a href="{{ route('products.create') }}">Add</a></div><ul class="list-group list-group-flush">@forelse($products as $product)<li class="list-group-item d-flex justify-content-between"><span>{{ $product->name }}</span><a href="{{ route('products.edit', $product) }}">Edit</a></li>@empty<li class="list-group-item">No products yet.</li>@endforelse</ul></div></section>
            <section class="col-lg-4"><div class="card shadow-sm h-100"><div class="card-header d-flex justify-content-between"><strong>Users</strong><a href="{{ route('users.create') }}">Add</a></div><ul class="list-group list-group-flush">@forelse($users as $user)<li class="list-group-item d-flex justify-content-between"><span>{{ $user->name }} <small class="text-muted">({{ $user->role }})</small></span><a href="{{ route('users.edit', $user) }}">Edit</a></li>@empty<li class="list-group-item">No users yet.</li>@endforelse</ul></div></section>
        </div>
    </main>
</body>
</html>
