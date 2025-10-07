<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Keep similar styling to login */
body { margin:0; padding:0; font-family:'Inter', sans-serif; background:url('https://images6.alphacoders.com/114/1142152.jpg') center/cover fixed; height:100vh; display:flex; justify-content:center; align-items:center;}
.login-container { background: rgba(255,255,255,0.2); backdrop-filter: blur(15px); padding:40px 30px; border-radius:20px; width:90%; max-width:450px; text-align:center; border:1px solid rgba(255,255,255,0.3); box-shadow:0 8px 30px rgba(0,0,0,0.2);}
h2 { margin-bottom:30px; color:#fff; font-size:28px; font-weight:600; text-shadow:0 2px 5px rgba(0,0,0,0.4);}
.form-group input { width:100%; padding:12px; border-radius:12px; border:none; outline:none; font-size:16px; background: rgba(255,255,255,0.4); color:#fff; box-shadow: inset 0 2px 5px rgba(0,0,0,0.1);}
.button-group { display:flex; gap:12px; margin-top:25px; width:100%; }
.btn { flex:1; padding:14px; border-radius:12px; font-size:16px; font-weight:bold; cursor:pointer; border:none; text-decoration:none; text-align:center; background: linear-gradient(45deg,#4CAF50,#2E8B57); color:white; box-shadow:0 5px 15px rgba(0,0,0,0.2);}
.error-messages { color:#ff6b6b; margin-bottom:15px; font-weight:500; text-align:center;}
.success-message { color:#2ecc71; margin-bottom:15px; font-weight:500; text-align:center;}
</style>
</head>
<body>
<div class="login-container">
    <h2>Forgot Password</h2>

    @if(session('success'))
        <div class="success-message">{{ session('success') }}</div>
    @endif

    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group">
            <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn">Send Reset Link</button>
        </div>
    </form>

    <div class="extra-links" style="margin-top:20px;">
        Remember your password? <a href="{{ route('customer.login') }}">Login</a>
    </div>
</div>
</body>
</html>
