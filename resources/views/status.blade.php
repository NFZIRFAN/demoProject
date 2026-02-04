<!DOCTYPE html>
<html>
<head>
    <title>Payment Status</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 30px;
            border-radius: 8px;
            width: 450px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .success { color: green; }
        .failed { color: red; }
        .pending { color: orange; }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn.failed { background: #f44336; }
    </style>
</head>
<body>

<div class="card">
    @if ($status === 'SUCCESS')
        <h2 class="success">✅ Payment Successful</h2>
        <p>Thank you for your payment.</p>
        <p><strong>Total Paid:</strong> RM {{ number_format($total ?? 0, 2) }}</p>
    @elseif ($status === 'FAILED')
        <h2 class="failed">❌ Payment Failed</h2>
        <p>Please try again.</p>
    @else
        <h2 class="pending">⏳ Payment Pending</h2>
        <p>Please wait for confirmation.</p>
    @endif

    <hr>

    <p><strong>Bill Code:</strong> {{ $billcode ?? '-' }}</p>
    <p><strong>Order ID:</strong> {{ $order_id ?? '-' }}</p>

    <a href="{{ route('customer.dashboard') }}" class="btn {{ $status === 'FAILED' ? 'failed' : '' }}">
        ⬅ Back to Dashboard
    </a>
</div>

</body>
</html>
