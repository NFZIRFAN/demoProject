<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Registration</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- RESTORED: Font Awesome CSS for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* General body and background styling */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Inter', sans-serif;
            background-image: url('https://i0.wp.com/morethanourstory.com/wp-content/uploads/2023/01/hidden-health-benefits-of-houseplants-hero.jpg.jpg?fit=2000%2C1333&ssl=1');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Main container for the form with glassmorphism effect */
        .register-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            padding: 40px 30px;
            border-radius: 20px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
            width: 90%;
            max-width: 450px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            text-align: center;
        }

        /* Form title */
        h2 {
            margin-bottom: 30px;
            color: #fff;
            font-size: 28px;
            font-weight: 600;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.4);
        }

        /* Input field group */
        .form-group {
            margin-bottom: 20px;
            width: 100%;
            position: relative; /* Essential for positioning icons inside */
        }
        
        /* Left Input Icon positioning (Lock, User, Email, Phone, IC) */
        .form-group i.input-icon-left {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: black; 
            font-size: 15px;
            z-index: 10;
        }

        /* Password Toggle Icon positioning (Eye) */
        .password-toggle {
            position: absolute;
            right: 12px; 
            top: 50%;
            transform: translateY(-50%);
            color: #333; /* Subtle color */
            cursor: pointer;
            font-size: 18px; 
            z-index: 10;
            padding: 5px; 
            transition: color 0.2s;
        }
        
        .password-toggle:hover {
            color: #4CAF50; /* Highlight on hover */
        }

        /* Input styling */
        .form-group input {
            width: 100%;
            /* Default padding for inputs with left icon only */
            padding: 12px 12px 12px 38px; 
            box-sizing: border-box; 
            border-radius: 12px;
            border: none;
            outline: none;
            font-size: 16px;
            background: rgba(255, 255, 255, 0.4);
            color: #fff;
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: background 0.3s ease, box-shadow 0.3s ease;
        }

        /* Adjustment for inputs that also have a right icon (passwords) */
        .form-group input.has-right-icon {
            padding: 12px 45px 12px 38px; /* Increased right padding to prevent text overlap with the eye icon */
        }

        /* Input focus state */
        .form-group input:focus {
            background: rgba(255, 255, 255, 0.6);
            box-shadow: inset 0 2px 5px rgba(0, 0, 0, 0.2);
            color: #333; /* Darker text when focused */
        }

        /* Placeholder text color */
        .form-group input::placeholder {
            color: #fff;
            opacity: 0.8;
        }

        /* Group for first and last name inputs */
        .name-group {
            display: flex;
            gap: 25px; 
            margin-bottom: 20px;
        }

        .name-group .form-group {
            flex: 1;
            margin-bottom: 0;
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

        /* Styling for the login link section */
        /* Links */
        .extra-links { 
    margin-top:15px; font-size:14px; color:#fff; 
    text-shadow:0 1px 3px rgba(109, 107, 107, 0.5);
}
.extra-links a { 
    color:#222222; text-decoration:none; font-weight:600;
}
.extra-links a:hover { 
    text-decoration:underline; color:#1e693f;
}
        
        /* Error messages styling */
        .error-messages {
            color: #ff6b6b;
            margin-bottom: 15px;
            font-weight: 500;
            text-align: center;
        }

        /* Media queries for smaller screens */
        @media (max-width: 480px) {
            .register-container {
                padding: 30px 20px;
                border-radius: 15px;
            }
            .name-group {
                flex-direction: column;
                gap: 0;
            }
            .name-group .form-group {
                margin-bottom: 20px;
            }
        }
        /* ===== Mobile Responsive for Registration ===== */
@media (max-width: 768px) {
  body {
    padding: 10px;
    align-items: center; /* allow scrolling if needed */
  }

  .register-container {
    width: 95%;            /* almost full width on mobile */
    padding: 30px 20px;    /* smaller padding */
    border-radius: 16px;
    backdrop-filter: blur(18px); /* maintain blur */
    margin: 0 auto;        /* horizontal center */
  }

  h2 {
    font-size: 24px;       /* slightly smaller heading */
    margin-bottom: 20px;
  }

  .form-group input {
    font-size: 14px;       /* smaller input text */
    padding: 10px 12px 10px 38px; /* adjust for icons */
  }

  .form-group input.has-right-icon {
    padding-right: 40px;   /* adjust for password toggle */
  }

  .password-toggle {
    font-size: 16px;       /* smaller eye icon */
    right: 12px;
  }

  .name-group {
    flex-direction: column; /* stack first & last name */
    gap: 12px;
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
    <div class="register-container">
        <h2>Create Account</h2>

        @if ($errors->any())
          <div class="error-messages">
            <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif
        
        <form action="{{ route('customer.register.submit') }}" method="POST">
            @csrf

            <div class="name-group">
                <div class="form-group">
                    <i class="fa fa-user input-icon-left"></i>
                    <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                </div>
                <div class="form-group">
                    <i class="fa fa-user input-icon-left"></i>
                    <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                </div>
            </div>
            <div class="form-group">
                <i class="fa fa-envelope input-icon-left"></i>
                <input type="email" id="email" name="email" placeholder="Email Address" required>
            </div>
            <div class="form-group">
                <i class="fa fa-phone input-icon-left"></i>
                <input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number" required>
            </div>
            <div class="form-group">
                <i class="fa fa-id-card input-icon-left"></i>
                <input type="text" id="icnumber" name="icnumber" placeholder="IC Number" required>
            </div>
            
            <!-- Password Field with Toggle Icon -->
            <div class="form-group">
                <i class="fa fa-lock input-icon-left"></i>
                <input type="password" id="password" name="password" placeholder="Password" class="has-right-icon" required>
                <!-- Eye icon for show/hide password -->
                <i class="fa fa-eye password-toggle" data-target="password"></i>
            </div>
            
            <!-- Confirm Password Field with Toggle Icon -->
            <div class="form-group">
                <i class="fa fa-lock input-icon-left"></i>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="has-right-icon" required>
                <!-- Eye icon for show/hide password -->
                <i class="fa fa-eye password-toggle" data-target="password_confirmation"></i>
            </div>

            <div class="button-group">
                <button type="submit" class="btn">Register</button>
                <a href="{{ route('homepage') }}" class="btn-back">Back</a>
            </div>
        </form>

        <div class="extra-links">
            Already have an account? <a href="{{ route('customer.login') }}">Login</a>
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
