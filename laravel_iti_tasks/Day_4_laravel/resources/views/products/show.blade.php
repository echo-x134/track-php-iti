<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-navbar />
    <div class="container">
        <div class="card shadow">
            <div class="card-header bg-success text-white">
                <h3>Product: {{ $product->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Description:</strong> {{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ $product->price }}</p>
                <p><strong>Quantity:</strong> {{ $product->quantity }}</p>
                <p><strong>Category:</strong> 
                    <a href="{{ route('categories.show', $product->category->id) }}">
                        {{ $product->category->name }}
                    </a>
                </p>
                <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
            </div>
        </div>
    </div>
</body>
</html>