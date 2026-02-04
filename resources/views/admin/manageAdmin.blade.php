<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Manage Admins</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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

.table-row-hover:hover {
  background-color: #f8fcf8;
  box-shadow: 0 4px 10px rgba(0,0,0,0.03);
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
        sans: ['Montserrat', 'sans-serif'],
        serif: ['Playfair Display', 'serif'],
      },
      colors: {
        leaf: '#2F8F2F',
        terracotta: '#D47551',
        earth: '#543310',
        'admin-green': '#16a085',
        'admin-blue': '#3498db',
        'admin-red': '#e74c3c',
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
<main id="mainContent" class="flex-1 p-4 md:p-8">

  <!-- Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b pb-4">
    <h1 class="text-3xl font-bold text-earth text-center border-l-4 border-terracotta pl-4 pb-4 mb-4 md:mb-0">
      <i class="fa-solid fa-users-gear mr-2 text-leaf"></i> Manage System Administrators
    </h1>
    <div class="flex gap-3">
      <a href="{{ route('admin.admins.create') }}" class="flex items-center bg-leaf text-white font-medium px-4 py-2 rounded-lg text-sm shadow-md hover:bg-admin-green transition duration-300">
        <i class="fa-solid fa-plus mr-2"></i> Add Admin
      </a>
      <a href="{{ route('admin.dashboard') }}" class="flex items-center bg-gray-200 text-gray-700 font-medium px-4 py-2 rounded-lg text-sm shadow-md hover:bg-gray-300 transition duration-300">
        <i class="fa-solid fa-arrow-left mr-2"></i> Dashboard
      </a>
    </div>
  </div>

  <!-- Alerts -->
  @if(session('success'))
  <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('success') }}</span>
  </div>
  @endif
  @if(session('error'))
  <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
    <span class="block sm:inline">{{ session('error') }}</span>
  </div>
  @endif

  <!-- Search Box -->
  <div class="relative w-full md:w-64 mb-6">
    <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
    <input type="text" id="searchInput" placeholder="Search by name or email..."
      class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm transition duration-150">
  </div>

  <!-- Admin Table -->
  <div class="overflow-x-auto shadow-lg rounded-lg">
    <table id="adminsTable" class="min-w-full divide-y divide-gray-200 table-auto">
      <thead class="bg-leaf text-white">
        <tr>
          <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider rounded-tl-lg">ID</th>
          <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Full Name</th>
          <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Email</th>
          <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider">IC Number</th>
          <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider">Address</th>
          <th class="px-4 py-3 text-center text-xs font-semibold uppercase tracking-wider rounded-tr-lg">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white divide-y divide-gray-100">
      @foreach($admins as $admin)
        <tr class="table-row-hover transition duration-150">
          <td class="px-4 py-3 whitespace-nowrap text-sm text-center font-medium text-gray-900">{{ $admin->id }}</td>
          <td class="px-4 py-3 whitespace-nowrap text-sm text-left">{{ $admin->name }}</td>
          <td class="px-4 py-3 whitespace-nowrap text-sm text-left">{{ $admin->email }}</td>
          <td class="px-4 py-3 whitespace-nowrap text-sm text-center">{{ $admin->ic_number }}</td>
          <td class="px-4 py-3 whitespace-nowrap text-sm text-left">{{ $admin->address }}</td>
          <td class="px-4 py-3 whitespace-nowrap text-sm text-center space-x-2">
            <a href="{{ route('admin.admins.edit', $admin->id) }}" 
               class="inline-flex items-center bg-admin-blue text-white p-2 rounded-lg text-xs font-medium hover:bg-blue-600 transition duration-300">
              <i class="fa-solid fa-pen-to-square"></i> Edit
            </a>
            <form action="{{ route('admin.admins.destroy', $admin->id) }}" method="POST" style="display:inline;" data-admin-id="{{ $admin->id }}" class="delete-form">
              @csrf
              @method('DELETE')
              <button type="button" class="btn-delete inline-flex items-center bg-admin-red text-white p-2 rounded-lg text-xs font-medium hover:bg-red-600 transition duration-300">
                <i class="fa-solid fa-trash-can"></i> Delete
              </button>
            </form>
          </td>
        </tr>
      @endforeach
      </tbody>
    </table>
  </div>

</main>

<footer class="py-4 text-center text-xs text-gray-400 mt-10">
  &copy; 2024 Customer Management System. All rights reserved.
</footer>

<script>
  // Sidebar toggle
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('mainContent');
    sidebar.classList.toggle('hidden');
    main.classList.toggle('centered');
  }

  // Live search
  document.getElementById('searchInput').addEventListener('keyup', function() {
    const filter = this.value.toLowerCase();
    const rows = document.querySelectorAll('#adminsTable tbody tr');
    rows.forEach(row => {
      const name = row.cells[1].innerText.toLowerCase();
      const email = row.cells[2].innerText.toLowerCase();
      row.style.display = (name.includes(filter) || email.includes(filter)) ? '' : 'none';
    });
  });

  // Delete confirmation
  const modal = document.createElement('div');
  document.querySelectorAll('.btn-delete').forEach(btn => {
    btn.addEventListener('click', function() {
      const form = this.closest('form');
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e74c3c',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          form.submit();
        }
      });
    });
  });
</script>

</body>
</html>
