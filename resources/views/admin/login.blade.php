<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Keeping original font import */
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');

        /* New custom style for the clean, bottom-border input look from the picture */
        .input-line-group .input-line {
            /* Remove default borders and padding */
            border: none;
            padding: 0.5rem 0.5rem 0.5rem 2rem; /* Adjusted for icon */
            /* Add only the bottom border */
            border-bottom: 2px solid #E0E0E0;
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        /* Focus style for inputs to use the vibrant green accent */
        .input-line-group input:focus {
            border-bottom-color: #00D084 !important;
            box-shadow: none !important;
            outline: none;
        }

        /* Removing the body::before CSS as the new design uses a simpler background */
        .page-bg {
            background-color: #F0FFF6; /* Light green background */
        }
        
        /* Custom style for the checkbox to enforce the color */
        input[type="checkbox"]:checked {
            background-color: #00D084; /* Use 'leaf' color */
            border-color: #00D084;
        }
        input[type="checkbox"]:focus {
            ring: 2px;
            ring-color: rgba(0, 208, 132, 0.5); /* Semi-transparent leaf for focus ring */
        }

    </style>
    <script>
        // Customizing Tailwind colors for the new design while preserving original class names
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        /* * Original names mapped to new, vibrant greens to match the picture, 
                         * ensuring the original button classes like 'bg-leaf' work correctly 
                         */
                        'primary-green': '#00D084',
                        'dark-green': '#00A670',
                        'light-bg': '#F0FFF6',
                        'leaf': '#00D084', 
                        'earth': '#00A670',
                        'terracotta': '#D47551',
                        'sun': '#F1C40F',
                    },
                }
            }
        }
    </script>
</head>

<body class="page-bg text-gray-800 font-sans min-h-screen flex justify-center items-center p-4 overflow-hidden">

    <!-- Main Container Card (Two-Column Layout for the modern look) -->
    <div class="w-full max-w-5xl h-auto md:h-[600px] bg-white rounded-3xl shadow-2xl overflow-hidden grid grid-cols-1 md:grid-cols-2">

        <!-- Left Panel: Illustration & Vibrant Green Theme (Design Element) -->
        <div class="relative p-10 flex flex-col justify-center items-center bg-leaf overflow-hidden min-h-[250px] md:min-h-full">
            
            <!-- Dynamic Green Background Shape (Mimicking the curve) -->
            <div class="absolute inset-0 z-0 opacity-10">
                <svg viewBox="0 0 100 100" class="w-full h-full" preserveAspectRatio="none">
                    <path fill="#00A670" d="M0,0 L100,0 L100,70 C50,100 0,70 0,70 Z" />
                </svg>
            </div>

            <!-- Simplified Vector Illustration (Mobile Phone & Person) -->
            <div class="relative z-10 p-4 rounded-xl">
                <!-- Simple Phone SVG -->
                <svg class="w-32 h-32 md:w-48 md:h-48 text-white mx-auto shadow-2xl" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                    <line x1="12" y1="18" x2="12" y2="18.1"></line>
                </svg>
                <!-- Character Placeholder -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 p-2 rounded-full bg-white bg-opacity-30">
                    <i class="fas fa-user-tie text-4xl text-white"></i>
                </div>
            </div>

            <h3 class="text-3xl font-bold text-white mt-8 text-center drop-shadow-md">
                Admin Portal
            </h3>
            <p class="text-sm text-white text-opacity-80 mt-2 text-center max-w-xs">
                Access your system settings securely.
            </p>
        </div>

        <!-- Right Panel: Login Form (Functional Element) -->
        <div class="p-8 md:p-12 lg:p-16 flex flex-col justify-center">

            <!-- Profile Icon (Mimicking the top center icon) -->
            <div class="text-center mb-6">
                <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-light-bg border-4 border-leaf">
                    <i class="fas fa-user text-4xl text-leaf"></i>
                </div>
            </div>

            <!-- Large WELCOME text as seen in the image -->
            <h2 class="text-6xl font-extrabold text-gray-800 text-center mb-10 tracking-wider">
                ADMIN
            </h2>

            <!-- Original Laravel Blade Error Display (Untouched) -->
            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
                    <ul class="list-disc list-inside mb-0 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Original Form - Method, Action, and @csrf Preserved -->
            <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-8">
                @csrf

                <!-- Email/Username Input Group (Redesigned) -->
                <div class="input-line-group relative">
                    <label for="email" class="sr-only">Email</label>
                    <i class="fa-solid fa-user absolute left-0 top-3 text-gray-400"></i>
                    <input type="email" name="email" id="email" 
                           class="input-line w-full text-gray-800 placeholder-gray-500 text-lg transition-all duration-300" 
                           placeholder="Username" required>
                </div>

                <!-- Password Input Group (Redesigned) -->
                <div class="input-line-group relative">
                    <label for="password" class="sr-only">Password</label>
                    <i class="fa-solid fa-lock absolute left-0 top-3 text-gray-400"></i>
                    <input type="password" name="password" id="password" 
                           class="input-line w-full text-gray-800 placeholder-gray-500 text-lg transition-all duration-300" 
                           placeholder="Password" required>
                </div>
                <!-- Buttons Area (Original classes kept, colors re-mapped) -->
                <div class="space-y-3 pt-6">
                    <!-- Login Button: bg-leaf and hover:bg-earth are now vibrant green shades -->
                    <button type="submit" class="w-full flex justify-center items-center px-6 py-3 border border-transparent text-lg font-bold rounded-full shadow-lg text-white bg-leaf hover:bg-earth transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-leaf focus:ring-opacity-50">
                        <i class="fa-solid fa-right-to-bracket mr-2"></i> LOGIN
                    </button>
                    <!-- Back to Homepage Button (Route Preserved) -->
                    <a href="{{ route('homepage') }}" class="w-full flex justify-center items-center px-6 py-3 border border-gray-300 text-sm font-semibold rounded-full text-gray-600 hover:bg-gray-50 transition-all duration-300">
                        <i class="fa-solid fa-house-chimney mr-2"></i> Back to Homepage
                    </a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
