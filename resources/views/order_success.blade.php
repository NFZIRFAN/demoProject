<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Success - Yah Nursery</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center max-w-lg w-full">
        <h1 class="text-2xl font-bold text-green-700 mb-4">🎉 Order Placed Successfully!</h1>
        <p class="text-gray-600 mb-6">Thank you for shopping with Yah Nursery & Landscape.</p>
        <div class="border-t border-gray-200 pt-4 text-left text-sm text-gray-700">
            <p><strong>Order ID:</strong> {{ $order->id }}</p>
            <p><strong>Total Paid:</strong> RM {{ number_format($order->total, 2) }}</p>
            <p><strong>Payment Method:</strong> {{ ucfirst($order->payment_method) }}</p>
        </div>
        <a href="{{ route('customer.dashboard') }}" class="inline-block mt-6 bg-green-700 hover:bg-green-800 text-white font-semibold py-2 px-4 rounded">
            Back to Dashboard
        </a>
    </div>
</body>
</html>
