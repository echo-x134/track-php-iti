<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Your Cart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <x-navbar />
    <main class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1 class="h2">Your Cart</h1>
            <a href="{{ route('products.index') }}" class="btn btn-outline-primary">Continue shopping</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">{{ $errors->first() }}</div>
        @endif

        @forelse($cartItems as $cartItem)
            <section class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="row align-items-center g-3">
                        <div class="col-md-5">
                            <h2 class="h5 mb-1">{{ $cartItem->product->name }}</h2>
                            <p class="text-muted mb-0">${{ number_format($cartItem->product->price, 2) }} each</p>
                        </div>
                        <div class="col-md-4">
                            <form action="{{ route('cart.update', $cartItem) }}" method="POST" class="d-flex gap-2 align-items-end">
                                @csrf
                                @method('PATCH')
                                <div>
                                    <label for="quantity-{{ $cartItem->id }}" class="form-label mb-1">Quantity</label>
                                    <input id="quantity-{{ $cartItem->id }}" type="number" name="quantity" value="{{ $cartItem->quantity }}" min="1" max="{{ $cartItem->product->quantity }}" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-outline-secondary">Update</button>
                            </form>
                        </div>
                        <div class="col-md-3 text-md-end">
                            <p class="h5 mb-2">${{ number_format($cartItem->product->price * $cartItem->quantity, 2) }}</p>
                            <form action="{{ route('cart.destroy', $cartItem) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
        @empty
            <div class="card shadow-sm">
                <div class="card-body text-center py-5">
                    <h2 class="h4">Your cart is empty</h2>
                    <p class="text-muted">Browse the catalog to add something you like.</p>
                    <a href="{{ route('products.index') }}" class="btn btn-primary">Browse products</a>
                </div>
            </div>
        @endforelse
    </main>
</body>
</html>
