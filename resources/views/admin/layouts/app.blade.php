<!DOCTYPE html>
<html lang="en" class="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100 min-h-screen transition-all duration-300">

    {{-- Dark Mode Toggle Button --}}
    <div class="flex justify-end p-4">
        <button id="darkModeToggle" class="bg-gray-200 dark:bg-gray-700 px-4 py-2 rounded-md transition">
            Toggle Dark Mode
        </button>
    </div>

    {{-- Main content --}}
    <div class="p-6">
        @yield('content')
    </div>

    {{-- Dark Mode Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const html = document.documentElement;
            const savedTheme = localStorage.getItem('theme');
            const toggleBtn = document.getElementById('darkModeToggle');

            // Apply saved theme on load
            if (savedTheme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }

            // Toggle dark mode
            toggleBtn.addEventListener('click', () => {
                html.classList.toggle('dark');
                const isDark = html.classList.contains('dark');
                localStorage.setItem('theme', isDark ? 'dark' : 'light');
            });
        });
    </script>
</body>
</html>
