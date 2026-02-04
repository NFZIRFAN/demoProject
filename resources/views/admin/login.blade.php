<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Yah Nursery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Updated Google Font Link: Cormorant Garamond for an elegant, fancy serif font -->
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom, slightly textured background for elegance */
        body {
            background-color: #f4f4f0;
        }
        .page-bg {
            background-image: url("data:image/svg+xml,%3Csvg width='6' height='6' viewBox='0 0 6 6' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23e0e0e0' fill-opacity='0.2' fill-rule='evenodd'%3E%3Cpath d='M5 0h1L0 6V5zm1 5v1H5z'/%3E%3C/g%3E%3C/svg%3E");
        }

        /* Floating Label Input Logic */
        .input-group {
            position: relative;
        }

        .input-field {
            width: 100%;
            padding: 1rem 0.75rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.75rem;
            transition: all 0.2s ease-in-out;
            background-color: #ffffff;
        }

        .input-field:focus {
            border-color: #2F8F2F; /* leaf color */
            box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.3);
            outline: none;
        }

        .input-label {
            position: absolute;
            left: 0.75rem;
            top: 1rem;
            transition: all 0.2s ease-in-out;
            pointer-events: none;
            color: #6b7280;
            font-size: 1rem;
        }

        /* Move label up when input is focused or filled (using + selector) */
        .input-field:focus + .input-label,
        .input-field:not(:placeholder-shown) + .input-label {
            top: -0.5rem;
            left: 0.5rem;
            font-size: 0.75rem;
            padding: 0 0.25rem;
            background-color: white;
            color: #2F8F2F; /* leaf color */
            font-weight: 500;
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        // Cormorant Garamond for the "fancy" heading look
                        serif: ['Cormorant Garamond', 'serif'],
                    },
                    colors: {
                        // Reverting to the Yah Nursery specific palette
                        leaf: '#2F8F2F', // Deep, rich green (Primary)
                        earth: '#543310', // Dark brown (Text/Secondary Accent)
                        terracotta: '#D47551', // Accent color
                        sun: '#F1C40F', // Highlight
                        lightgray: '#f9f9f9', // Very light background
                    },
                }
            }
        }
    </script>
</head>

<body class="page-bg text-gray-800 font-sans min-h-screen flex justify-center items-center p-4">

    <!-- Login Card (Single, large, premium card) -->
    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl p-8 md:p-12 border-t-8 border-leaf/70 transform hover:shadow-3xl transition duration-500">

     <!-- Header and Logo -->
<div class="text-center mb-8">
    <div class="inline-flex items-center justify-center mb-4">
        <img src="{{ asset('storage/image/logoYah.png') }}" 
             alt="Admin Logo" 
             class="w-48 h-auto object-contain drop-shadow-md">
    </div>

    <p class="text-gray-500 text-sm font-sans tracking-wide">
        Login to access the Content Management System
    </p>
</div>


        <!-- Original Laravel Blade Error Display (Untouched) -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6" role="alert">
                <ul class="list-disc list-inside mb-0 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Original Form - Method, Action, and @csrf Preserved -->
        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-6">
            @csrf

            <!-- Email/Username Input Group (Floating Label) -->
            <div class="input-group">
                <input type="email" name="email" id="email" 
                       class="input-field placeholder-transparent font-sans" 
                       placeholder="you@example.com" 
                       value="{{ old('email') }}" required>
                <label for="email" class="input-label font-sans">Email Address</label>
            </div>

            <!-- Password Input Group (Floating Label) -->
            <div class="input-group">
                <input type="password" name="password" id="password" 
                       class="input-field placeholder-transparent font-sans" 
                       placeholder="********" required>
                <label for="password" class="input-label font-sans">Password</label>
            </div>

            <!-- Buttons Area -->
            <div class="space-y-4 pt-4">
                <!-- Login Button: Gradient for professional depth -->
                <button type="submit" class="w-full flex justify-center items-center px-6 py-3 text-lg font-bold rounded-full text-white 
                                             bg-leaf hover:bg-earth transition-all duration-300 shadow-xl shadow-leaf/40 
                                             focus:outline-none focus:ring-4 focus:ring-leaf focus:ring-opacity-50
                                             transform hover:scale-[1.01] font-sans">
                    <i class="fa-solid fa-right-to-bracket mr-2"></i> Secure Login
                </button>
                
                <!-- Back to Homepage Button (Route Preserved) -->
                <a href="{{ route('homepage') }}" class="w-full flex justify-center items-center px-6 py-3 text-sm font-semibold rounded-full 
                                                        text-gray-600 border-2 border-gray-200 hover:border-leaf hover:text-leaf 
                                                        transition-all duration-300 font-sans">
                    <i class="fa-solid fa-house-chimney mr-2"></i> Back to Nursery Website
                </a>
            </div>
        </form>
    </div>

</body>
</html>