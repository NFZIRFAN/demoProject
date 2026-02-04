<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Admin Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&family=Playfair+Display:wght@700&display=swap');

body {
  font-family: 'Montserrat', sans-serif;
  background-color: #f4f6f9;
  color: #2c3e50;
}

input:focus, button:focus, a:focus {
  outline: none;
  box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.4);
}

#mainContent {
  transition: margin 0.4s ease, max-width 0.4s ease;
  max-width: calc(100% - 16rem);
  margin-left: 16rem;
}

#mainContent.centered {
  margin-left: auto;
  margin-right: auto;
  max-width: 100%;
}
</style>

<script>
tailwind.config = {
  theme: {
    extend: {
      fontFamily: {
        sans: ['Montserrat', 'sans-serif'],
        serif: ['Playfair Display', 'serif'],
      },
      colors: {
        leaf: '#2F8F2F',
        terracotta: '#D47551',
        earth: '#543310',
      },
    }
  }
}
</script>
</head>
<body class="min-h-screen flex flex-col">

<!-- Sidebar -->
<x-sidebarAdmin id="sidebar" />

<!-- Main Content -->
<main id="mainContent" class="flex-1 flex justify-center items-start pt-12 pb-12 px-4 md:px-8">

  <!-- Form Container Card -->
  <div class="bg-white w-full max-w-lg rounded-xl shadow-2xl p-8 md:p-10 border-t-4 border-leaf">
      
    <h1 class="text-3xl font-bold text-earth text-center border-b-2 border-terracotta pb-4 mb-8">
      <i class="fa-solid fa-user-edit mr-2 text-leaf"></i> Update Admin Profile
    </h1>

    <!-- Alerts -->
    @if(session('success') || session('error'))
      <div class="mb-4">
        @if(session('success'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
          </div>
        @endif
        @if(session('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
          </div>
        @endif
      </div>
    @endif

    <form action="{{ route('admin.admins.update', $admin->id) }}" method="POST">
      @csrf
      @method('PUT')

      <!-- Full Name -->
      <div class="mb-5">
        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $admin->name) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>

      <!-- Email -->
      <div class="mb-5">
        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address</label>
        <input type="email" id="email" name="email" value="{{ old('email', $admin->email) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>

      <!-- IC Number -->
      <div class="mb-5">
        <label for="ic_number" class="block text-sm font-medium text-gray-700 mb-1">IC Number</label>
        <input type="text" id="ic_number" name="ic_number" value="{{ old('ic_number', $admin->ic_number) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>

      <!-- Address -->
      <div class="mb-8">
        <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address</label>
        <input type="text" id="address" name="address" value="{{ old('address', $admin->address) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>

      <!-- Password Section -->
      <h3 class="text-lg font-semibold text-earth border-b border-gray-200 pb-2 mb-4">Change Password (Optional)</h3>
      <div class="mb-5">
        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">New Password</label>
        <input type="password" id="password" name="password" placeholder="Leave blank if not changing"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>
      <div class="mb-8">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Confirm New Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm new password"
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150 text-sm">
      </div>

      <button type="submit" class="w-full flex items-center justify-center bg-leaf text-white font-semibold py-3 rounded-lg shadow-md hover:bg-earth transition duration-300 transform hover:scale-[1.01]">
        <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Save Changes
      </button>
    </form>

    <a href="{{ route('admin.admins.index') }}" class="mt-6 inline-flex items-center justify-center w-full text-sm text-gray-600 hover:text-leaf transition duration-300">
      <i class="fa-solid fa-arrow-left mr-2"></i> Back to Admin List
    </a>
    
</div>
</main>

<footer class="py-4 text-center text-xs text-gray-400 mt-auto">
  &copy; 2024 Customer Management System. All rights reserved.
</footer>

<script>
  // Sidebar toggle function
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('mainContent');
    sidebar.classList.toggle('hidden');
    main.classList.toggle('centered');
  }
</script>

</body>
</html>
