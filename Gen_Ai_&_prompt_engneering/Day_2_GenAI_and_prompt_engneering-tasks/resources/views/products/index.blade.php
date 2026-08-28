<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <x-navbar />
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>All Products</h2>
            @auth
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">+ Add Product</a>
                @endif
            @endauth
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body p-0">
                <table class="table table-striped table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th># ID</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Category</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>${{ number_format($product->price, 2) }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>
                                    <span class="badge bg-primary">
                                        {{ $product->category->name ?? 'Uncategorized' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm text-white">View</a>

                                    @auth
                                        @if($product->quantity > 0)
                                            <form action="{{ route('cart.store', $product) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" class="btn btn-success btn-sm">Add to Cart</button>
                                            </form>
                                        @else
                                            <span class="badge bg-secondary">Out of stock</span>
                                        @endif
                                    @endauth
                                    
                                    @auth
                                        @if(auth()->user()->role === 'admin')
                                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-warning btn-sm text-white">Edit</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        @endif
                                    @endauth
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>