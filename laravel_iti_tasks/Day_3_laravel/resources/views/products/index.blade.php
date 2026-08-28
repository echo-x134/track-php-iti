<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-navbar />
    <div class="container">
        <h2 class="mb-4">All Products</h2>
        <table class="table table-bordered table-hover">
            <thead class="table-dark">
                <tr>
                    <th># ID</th>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Category</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>
                            <a href="{{ route('categories.show', $product->category->id) }}" class="badge bg-primary text-decoration-none">
                                {{ $product->category->name }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-info text-white">View Details</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>