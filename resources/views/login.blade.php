<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Login</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
body {
    margin:0; padding:0;
    font-family:'Inter', sans-serif;
    background:url('https://images6.alphacoders.com/114/1142152.jpg') center/cover fixed;
    height:100vh; display:flex; justify-content:center; align-items:center;
}

/* Login container */
.login-container {
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(20px);
    padding:45px 35px; border-radius:20px;
    width:90%; max-width:420px; text-align:center;
    border:1px solid rgba(255,255,255,0.25);
    box-shadow:0 10px 30px rgba(0,0,0,0.25);
    animation: fadeIn 0.8s ease;
}

/* Heading */
h2 { 
    margin-bottom:25px; 
    color:#fff; 
    font-size:28px; 
    font-weight:700; 
    text-shadow:0 2px 6px rgba(0,0,0,0.5);
}

/* Input group */
.form-group { 
    margin-bottom:18px; 
    position:relative; 
    display:flex; align-items:center;
}

/* Left Input Icon positioning (Lock, Email) */
.form-group i.input-icon-left {
    position:absolute; 
    left:15px; 
    color:rgba(43, 42, 42, 0.85);
    font-size:16px;
    z-index: 10;
}

/* Password Toggle Icon positioning (Eye) */
.password-toggle {
    position: absolute;
    right: 15px; /* Positioned on the right side */
    color: #333; 
    cursor: pointer;
    font-size: 18px; 
    z-index: 10;
    padding: 5px;
    transition: color 0.2s;
}

.password-toggle:hover {
    color: #2E8B57; /* Darker green on hover */
}

/* Input styling */
.form-group input {
    width:100%; 
    /* Default padding for inputs with left icon only */
    padding:12px 14px 12px 42px;
    box-sizing: border-box;
    border-radius:10px; 
    border:1px solid rgba(255,255,255,0.3); 
    outline:none;
    font-size:15px; 
    font-weight:500;
    background: rgba(255,255,255,0.3); 
    color:#black;
    transition: all 0.25s ease;
}

/* Adjustment for inputs that also have a right icon (passwords) */
.form-group input.has-right-icon {
    padding-right: 45px; /* Increased right padding to prevent text overlap with the eye icon */
}

.form-group input:focus {
    border:1px solid #4CAF50;
    background: rgba(255,255,255,0.45);
    box-shadow:0 0 6px rgba(76,175,80,0.6);
}

/* Buttons */
.button-group { 
    display:flex; gap:12px; margin-top:20px; width:100%; 
}
.btn {
    flex:1; padding:12px; border-radius:10px; font-size:15px; font-weight:600;
    cursor:pointer; border:none; text-decoration:none; text-align:center;
    background: linear-gradient(135deg,#1e693f,#2E8B57); color:white;
    box-shadow:0 5px 12px rgba(0,0,0,0.25);
    transition: all 0.25s ease;
}
.btn:hover {
    transform: translateY(-2px);
    background: linear-gradient(135deg,#43a047,#1e693f);
}
.btn-back {
    flex:1; padding:12px; border-radius:10px; font-size:15px; font-weight:600;
    cursor:pointer; border:1px solid rgba(255,255,255,0.5);
    background: rgba(26, 25, 25, 0.67); color:white;
    text-align:center; text-decoration:none;
    transition: all 0.25s ease;
}
.btn-back:hover {
    background: rgba(176, 128, 128, 0.4);
    transform: translateY(-2px);
}

/* Messages */
.error-messages { 
    color:#ff6b6b; margin-bottom:15px; font-weight:500; text-align:center;
}
.success-message { 
    color:#2ecc71; margin-bottom:15px; font-weight:500; text-align:center;
}

/* Links */
.extra-links { 
    margin-top:15px; font-size:14px; color:#fff; 
    text-shadow:0 1px 3px rgba(109, 107, 107, 0.5);
}
.extra-links a { 
    color:#444444; text-decoration:none; font-weight:600;
}
.extra-links a:hover { 
    text-decoration:underline; color:#1e693f;
}

/* Animation */
@keyframes fadeIn {
    from { opacity:0; transform: translateY(20px);}
    to { opacity:1; transform: translateY(0);}
}
/* ===== Mobile Responsive ===== */
@media (max-width: 768px) {
  body {
    padding: 10px;
    align-items: center; /* allow scrolling if needed */
  }

  .login-container {
    width: 95%;         /* almost full width on mobile */
    padding: 30px 20px; /* smaller padding */
    border-radius: 16px;
    backdrop-filter: blur(18px); /* maintain blur */
    margin: 0 auto;            /* horizontal center */

  }

  h2 {
    font-size: 24px;   /* slightly smaller heading */
    margin-bottom: 20px;
  }

  .form-group input {
    font-size: 14px;   /* smaller input text */
    padding: 10px 12px 10px 38px; /* adjust for icons */
  }

  .form-group input.has-right-icon {
    padding-right: 40px; /* adjust for password toggle */
  }

  .password-toggle {
    font-size: 16px; /* smaller eye icon */
    right: 12px;
  }

  .button-group {
    flex-direction: column; /* stack buttons on mobile */
    gap: 12px;
  }

  .btn, .btn-back {
    font-size: 14px;
    padding: 10px 0;
    width: 100%;
  }

  .extra-links {
    font-size: 13px;
    margin-top: 12px;
  }
}

</style>
</head>
<body>
<div class="login-container">
    <h2>WELCOME</h2>

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

    <form action="{{ route('customer.login.submit') }}" method="POST">
        @csrf
        <div class="form-group">
            <i class="fa-solid fa-envelope input-icon-left"></i>
            <input type="email" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
        </div>
        <div class="form-group">
            <i class="fa-solid fa-lock input-icon-left"></i>
            <!-- Added has-right-icon class for correct padding -->
            <input type="password" id="password" name="password" placeholder="Password" class="has-right-icon" required> 
            <!-- Added the password toggle icon -->
            <i class="fa fa-eye password-toggle" data-target="password"></i>
        </div>

        <div class="button-group">
            <button type="submit" class="btn">Login</button>
            <a href="{{ route('homepage') }}" class="btn-back">Back</a>
        </div>
    </form>

    <div class="extra-links">
        Don’t have an account? <a href="{{ route('customer.register') }}">Register</a>
    </div>
</div>

<script>
    // JavaScript to toggle password visibility
    document.addEventListener('DOMContentLoaded', () => {
        const toggleIcons = document.querySelectorAll('.password-toggle');

        toggleIcons.forEach(icon => {
            icon.addEventListener('click', () => {
                const targetId = icon.getAttribute('data-target');
                const passwordInput = document.getElementById(targetId);

                if (passwordInput.type === 'password') {
                    passwordInput.type = 'text';
                    // Change icon to 'eye-slash' (hidden)
                    icon.classList.remove('fa-eye');
                    icon.classList.add('fa-eye-slash');
                } else {
                    passwordInput.type = 'password';
                    // Change icon back to 'eye' (visible)
                    icon.classList.remove('fa-eye-slash');
                    icon.classList.add('fa-eye');
                }
            });
        });
    });
</script>
</body>
</html>
