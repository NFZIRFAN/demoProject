<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Customer Profile</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');

body {
    font-family: 'Inter', sans-serif;
    background-color: #f4f6f9;
}

/* Focus ring for inputs */
input:focus, select:focus, textarea:focus {
    --tw-ring-color: #2F8F2F !important;
    border-color: #2F8F2F !important;
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
                sans: ['Inter', 'sans-serif'],
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

  <!-- Form Container -->
  <div class="bg-white rounded-xl shadow-2xl p-6 md:p-10 border-t-4 border-leaf w-full max-w-4xl">
      
    <!-- Header with Back Button -->
    <div class="flex justify-between items-center mb-6 pb-4 border-b border-gray-100">
        <h1 class="text-3xl font-bold text-earth border-l-4 border-terracotta pl-4">
            Edit Customer Profile
        </h1>
        <a href="{{ route('admin.customers.index') }}" class="flex items-center text-sm font-medium text-gray-600 hover:text-leaf transition">
            <i class="fa-solid fa-arrow-left-long mr-2"></i> Back to List
        </a>
    </div>

    <form action="{{ route('admin.customers.update', $asd->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <!-- Personal Info Section -->
        <h2 class="text-xl font-semibold text-leaf mb-4 pt-4 border-t">Personal Information</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label for="firstname" class="block mb-2 text-sm font-medium text-earth">First Name</label>
                <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $asd->firstname ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="lastname" class="block mb-2 text-sm font-medium text-earth">Last Name</label>
                <input type="text" id="lastname" name="lastname" value="{{ old('lastname', $asd->lastname ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="email" class="block mb-2 text-sm font-medium text-earth">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $asd->email ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="phonenumber" class="block mb-2 text-sm font-medium text-earth">Phone Number</label>
                <input type="text" id="phonenumber" name="phonenumber" value="{{ old('phonenumber', $asd->phonenumber ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="icnumber" class="block mb-2 text-sm font-medium text-earth">IC Number</label>
                <input type="text" id="icnumber" name="icnumber" value="{{ old('icnumber', $asd->icnumber ?? '') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="age" class="block mb-2 text-sm font-medium text-earth">Age</label>
                <input type="number" id="age" name="age" value="{{ old('age', $asd->age ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>
        </div>

        <!-- Location & Employment -->
        <h2 class="text-xl font-semibold text-leaf mb-4 pt-8 border-t mt-8">Location & Employment</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            <div>
                <label for="postcode" class="block mb-2 text-sm font-medium text-earth">Postcode</label>
                <input type="text" id="postcode" name="postcode" value="{{ old('postcode', $asd->postcode ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="relationship" class="block mb-2 text-sm font-medium text-earth">Relationship Status</label>
                <input type="text" id="relationship" name="relationship" value="{{ old('relationship', $asd->relationship ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div>
                <label for="occupation" class="block mb-2 text-sm font-medium text-earth">Occupation</label>
                <input type="text" id="occupation" name="occupation" value="{{ old('occupation', $asd->occupation ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>

            <div class="md:col-span-2">
                <label for="address" class="block mb-2 text-sm font-medium text-earth">Full Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $asd->address ?? '') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf transition duration-150">
            </div>
        </div>

        <!-- Save Button -->
        <button type="submit"
                class="mt-10 w-full md:w-1/2 mx-auto flex items-center justify-center px-6 py-3 bg-leaf text-white font-semibold rounded-lg shadow-lg hover:bg-earth transition duration-300 transform hover:scale-[1.01]">
            <i class="fa-solid fa-floppy-disk mr-2"></i> Save Changes
        </button>
    </form>

  </div>
</main>

<footer class="py-4 text-center text-xs text-gray-400 mt-10">
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
