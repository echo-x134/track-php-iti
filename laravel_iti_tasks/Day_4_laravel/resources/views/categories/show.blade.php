<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Category Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4>Category: {{ $category->name }}</h4>
        </div>
        <div class="card-body">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
        </div>
    </div>

    <h3>Products in this Category</h3>
    <ul class="list-group mt-3">
        @forelse($category->products as $product)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $product->name }}
                <span class="badge bg-success rounded-pill">${{ $product->price }}</span>
            </li>
        @empty
            <li class="list-group-item text-center">No products found for this category.</li>
        @endforelse
    </ul>
</body>
</html>