<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <x-navbar />
    <div class="container">
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h4>User Profile: {{ $user->name }}</h4>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $user->email }}</p>
            </div>
        </div>

        <h3>Orders History</h3>
        <table class="table table-bordered mt-3">
            <thead class="table-dark">
                <tr>
                    <th>Order ID</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user->orders as $order)
                    <tr>
                        <td>
                            <!-- الضغط ينقل لصفحة تفاصيل الطلب -->
                            <a href="{{ route('orders.show', $order->id) }}" class="fw-bold">
                                Order #{{ $order->id }}
                            </a>
                        </td>
                        <td>{{ $order->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-info text-white">View Details</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center">No orders placed by this user yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>