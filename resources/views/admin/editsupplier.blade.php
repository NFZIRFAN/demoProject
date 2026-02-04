<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Supplier | Admin Dashboard</title>
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

<x-sidebarAdmin id="sidebar" />

<main id="mainContent" class="flex-1 flex justify-center items-start pt-12 pb-12 px-4 md:px-8">

  <!-- Form Card -->
  <div class="bg-white w-full max-w-lg rounded-xl shadow-2xl p-8 md:p-10 border-t-4 border-leaf">
      
    <h1 class="text-3xl font-bold text-earth text-center border-b-2 border-terracotta pb-4 mb-8">
      <i class="fa-solid fa-truck mr-2 text-leaf"></i> Edit Supplier
    </h1>

    <!-- Validation Errors -->
    @if ($errors->any())
      <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('admin.suppliers.update', $supplier->supplier_id) }}" method="POST" class="space-y-5">
      @csrf
      @method('PUT')

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Supplier Name</label>
        <input type="text" name="supplier_name" value="{{ old('supplier_name', $supplier->supplier_name) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
        <input type="text" name="phone_number" value="{{ old('phone_number', $supplier->phone_number) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
        <input type="email" name="email" value="{{ old('email', $supplier->email) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Address</label>
        <input type="text" name="address" value="{{ old('address', $supplier->address) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Delivery Time (days)</label>
        <input type="number" name="delivery_time" value="{{ old('delivery_time', $supplier->delivery_time) }}" required
               class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-leaf focus:border-leaf text-sm">
      </div>

      <label>Supplier Type</label>
<select name="supplier_type" required class="w-full mb-3 px-4 py-2 rounded border">
    <option value="plant" {{ old('supplier_type', $supplier->supplier_type) == 'plant' ? 'selected' : '' }}>Plant</option>
    <option value="non_plant" {{ old('supplier_type', $supplier->supplier_type) == 'non_plant' ? 'selected' : '' }}>Non-Plant</option>
</select>


      <button type="submit" class="w-full flex items-center justify-center bg-leaf text-white font-semibold py-3 rounded-lg shadow-md hover:bg-earth transition duration-300 transform hover:scale-[1.01]">
        <i class="fa-solid fa-pen-to-square mr-2"></i> Update Supplier
      </button>
    </form>

    <a href="{{ route('admin.suppliers.index') }}" class="mt-6 inline-flex items-center justify-center w-full text-sm text-gray-600 hover:text-leaf transition duration-300">
      <i class="fa-solid fa-arrow-left mr-2"></i> Back to Supplier List
    </a>

  </div>
</main>

<footer class="py-4 text-center text-xs text-gray-400 mt-auto">
  &copy; 2024 Supplier Management System. All rights reserved.
</footer>

</body>
</html>
