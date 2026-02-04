<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Customer Registry | Admin Dashboard</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');

body {
  font-family: 'Inter', sans-serif;
  background-color: #f4f4f0;
}

.table-row-hover:hover {
  background-color: #f8fcf8;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
  transform: translateY(-1px);
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
<main id="mainContent" class="flex-1 p-4 sm:p-6 lg:p-8">

  <!-- Header Section -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b pb-4">
    <h1 class="text-3xl font-serif font-bold text-earth mb-4 md:mb-0 border-l-4 border-leaf pl-4">
      Registered Customers
    </h1>
    <div class="flex gap-3">
      <a href="{{ route('admin.dashboard') }}">
        <button class="flex items-center justify-center px-4 py-2 border border-gray-300 text-earth font-semibold rounded-full text-sm hover:bg-gray-100 transition duration-200 shadow-sm">
          <i class="fa-solid fa-arrow-left-long mr-2"></i> Dashboard
        </button>
      </a>
    </div>
  </div>

  <!-- Success Alert -->
  @if(session('success'))
  <div class="bg-green-100 border-l-4 border-leaf text-green-700 p-4 rounded-lg shadow-sm mb-6" role="alert">
    <p class="font-bold">Success!</p>
    <p class="text-sm">{{ session('success') }}</p>
  </div>
  @endif

  <!-- Table Card -->
  <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8 border-t-4 border-leaf">
    <div class="overflow-x-auto shadow-lg rounded-xl">
      <table class="min-w-full divide-y divide-gray-200 bg-white table-auto">
        <thead>
          <tr class="bg-leaf text-white font-bold text-sm uppercase tracking-wider">
            <th class="px-4 py-3 text-center rounded-tl-xl">#</th>
            <th class="px-4 py-3 text-left">Customer Name</th>
            <th class="px-4 py-3 text-left">Contact / Email</th>
            <th class="px-4 py-3 text-center">IC Number</th>
            <th class="px-4 py-3 text-left">Address</th>
            <th class="px-4 py-3 text-center">Postcode</th>
            <th class="px-4 py-3 text-center">Relationship</th>
            <th class="px-4 py-3 text-center">Age</th>
            <th class="px-4 py-3 text-center">Occupation</th>
            <th class="px-4 py-3 text-center rounded-tr-xl">Action</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
          @forelse($customers as $index => $customer)
          <tr class="table-row-hover transition-all duration-200">
            <td class="px-4 py-4 text-sm text-gray-500 text-center">{{ $index + 1 }}</td>
            <td class="px-4 py-4 text-sm font-semibold text-earth">{{ $customer->firstname }} {{ $customer->lastname }}</td>
            <td class="px-4 py-4 text-sm">
              <div class="text-gray-700">{{ $customer->email }}</div>
              <div class="text-xs text-gray-500">{{ $customer->phonenumber }}</div>
            </td>
            <td class="px-4 py-4 text-sm text-gray-600 text-center">{{ $customer->icnumber }}</td>
            <td class="px-4 py-4 text-sm text-gray-600 break-words w-64">{{ $customer->address }}</td>
            <td class="px-4 py-4 text-sm text-gray-500 text-center">{{ $customer->postcode }}</td>
            <td class="px-4 py-4 text-sm text-gray-600 text-center">
              <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full bg-terracotta/10 text-terracotta">
                {{ $customer->relationship }}
              </span>
            </td>
            <td class="px-4 py-4 text-sm text-gray-600 text-center">{{ $customer->age }}</td>
            <td class="px-4 py-4 text-sm text-gray-600 text-center">{{ $customer->occupation }}</td>
            <td class="px-4 py-4 text-center text-sm font-medium space-x-3">
              <a href="{{ route('admin.customers.edit', $customer->id) }}" class="text-leaf hover:text-earth transition duration-200">
                <i class="fa-solid fa-user-pen text-lg"></i>
              </a>
              <form action="{{ route('admin.customers.destroy', $customer->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-terracotta hover:text-red-700 transition duration-200" onclick="return confirm('Are you sure you want to permanently delete this customer?')">
                  <i class="fa-solid fa-trash-can text-lg"></i>
                </button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="10" class="px-6 py-12 text-center text-gray-500 text-xl font-medium">
              <i class="fa-solid fa-user-xmark text-4xl mb-3 text-terracotta/50"></i>
              <p>No customers found in the registry.</p>
            </td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>
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
