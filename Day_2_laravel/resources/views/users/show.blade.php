<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-5">
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            <h4>Profile Information</h4>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Back to Users List</a>
        </div>
    </div>

    <h3>User Orders</h3>
    <table class="table table-bordered table-striped mt-3">
        <thead class="table-dark">
            <tr>
                <th># Order ID</th>
                <th>Total Amount</th>
                <th>Status</th>
                <th>Payment Method</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @forelse($user->orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>${{ $order->total_amount }}</td>
                    <td><span class="badge bg-info">{{ $order->status }}</span></td>
                    <td>{{ $order->payment->payment_method ?? 'N/A' }}</td>
                    <td>{{ $order->created_at->format('Y-m-d') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">No orders found for this user.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>