<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-navbar />
    <div class="container">
        <div class="card mb-4 shadow">
            <div class="card-header bg-dark text-white">
                <h4>Order Details #{{ $order->id }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Customer:</strong> {{ $order->user->name }} ({{ $order->user->email }})</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        <h3>Order Items</h3>
        <table class="table table-striped table-bordered mt-3">
            <thead class="table-secondary">
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; @endphp
                @foreach($order->orderItems as $item)
                    @php 
                        $subtotal = $item->price * $item->quantity; 
                        $total += $subtotal;
                    @endphp
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>${{ $item->price }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>${{ number_format($subtotal, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3" class="text-end">Total Amount:</th>
                    <th>${{ number_format($total, 2) }}</th>
                </tr>
            </tfoot>
        </table>
        <a href="{{ route('users.show', $order->user_id) }}" class="btn btn-secondary">Back to User Profile</a>
    </div>
</body>
</html>