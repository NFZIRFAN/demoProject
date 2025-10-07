<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reset Password</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<style>
/* Keep styling consistent */
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
    <h2>Reset Password</h2>

    @if($errors->any())
        <div class="error-messages">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ request()->query('email') }}">

        <div class="form-group">
            <input type="password" name="password" placeholder="New Password" required>
        </div>
        <div class="form-group">
            <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
        </div>

        <div class="button-group">
            <button type="submit" class="btn">Reset Password</button>
        </div>
    </form>
</div>
</body>
</html>
