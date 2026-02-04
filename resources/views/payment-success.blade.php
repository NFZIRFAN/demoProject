<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Purchase Successful</title>
</head>
<body style="font-family: 'Roboto', sans-serif; background:#f9f9f9; padding:30px;">

    <div style="max-width:600px; margin:0 auto; background:white; border-radius:20px; padding:40px; box-shadow:0 10px 30px rgba(0,0,0,0.1);">
        
        <h2 style="font-family: 'Playfair Display', serif; color:#3D4127; font-size:28px; margin-bottom:20px;">
            Payment Successful 🎉
        </h2>

        <p style="font-size:16px; color:#636B2F; line-height:1.7;">
            Dear {{ $user->name }},
        </p>

        <p style="font-size:16px; color:#636B2F; line-height:1.7;">
            Thank you for your purchase! Here are the details of your order:
        </p>

        <ul style="list-style:none; padding:0; font-size:16px; color:#3D4127;">
            <li><strong>Order Reference:</strong> {{ $orderId }}</li>
            <li><strong>Product:</strong> {{ $plant->name }}</li>
            <li><strong>Quantity:</strong> {{ $quantity }}</li>
            <li><strong>Total:</strong> RM{{ number_format($plant->price * $quantity, 2) }}</li>
        </ul>

        <p style="margin-top:20px; font-size:16px; color:#636B2F;">
            We hope you enjoy your purchase. You can visit your <a href="{{ route('customer.dashboard') }}" style="color:#C9A227; font-weight:bold;">dashboard</a> for more details.
        </p>

        <div style="margin-top:30px; text-align:center;">
            <span style="display:inline-block; padding:15px 30px; background:#C9A227; color:white; font-weight:bold; border-radius:50px; font-size:16px;">
                Thank You!
            </span>
        </div>

    </div>
</body>
</html>
