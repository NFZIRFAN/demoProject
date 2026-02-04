<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Add Plant</title>

  <!-- Font Awesome for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');
    body { font-family: 'Inter', sans-serif; background-color: #f4f4f0; }

    input:focus, textarea:focus, select:focus {
      border-color: #2F8F2F;
      box-shadow: 0 0 0 3px rgba(47,143,47,0.4);
      outline: none;
    }

    select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }

    /* Smooth main content transition for sidebar toggle */
    #mainContent {
      transition: margin 0.4s ease, max-width 0.4s ease;
      max-width: calc(100% - 16rem); /* initial width with sidebar */
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
            earth: '#543310',
            terracotta: '#D47551',
            sun: '#F1C40F',
          },
        },
      },
    };
  </script>
</head>

<body class="flex flex-col min-h-screen">

  <!-- Sidebar -->
  <x-sidebarAdmin id="sidebar" />

  <!-- Main Content -->
  <main id="mainContent" class="flex-1 p-4 sm:p-6 lg:p-8">

    <!-- Page Header -->
    <div class="mb-8">
      <h1 class="text-4xl font-serif font-bold text-earth border-b pb-2">Add Product Details</h1>
      <p class="text-gray-500 text-sm mt-1">
        <a href="{{ route('admin.plants.index') }}" class="hover:text-leaf">Inventory</a> / 
        <span class="text-leaf font-semibold">Add Product</span>
      </p>
    </div>

    <!-- Form Container -->
    <div class="bg-white rounded-xl shadow-2xl p-6 md:p-10 border-t-4 border-leaf">
      @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4">
          <ul class="list-disc list-inside mb-0 text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4">
          {{ session('success') }}
        </div>
      @endif
            <h1 class="text-3xl font-serif font-bold text-earth mb-2">FILL IN REQUIRED FIELD BELOW : </h1>

      <form action="{{ route('admin.plants.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf 
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" placeholder="e.g., Fiddle Leaf Fig" value="{{ old('name') }}" required>
          </div>
          <div>
            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price</label>
            <div class="relative">
              <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500 text-sm font-medium">RM</span>
              <input type="number" id="price" step="0.01" name="price" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" placeholder="0.00" value="{{ old('price') }}" required>
            </div>
          </div>
          <div class="relative">
            <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
            <select id="category" name="category" class="w-full px-4 py-2.5 border border-gray-300 rounded-xl shadow-sm hover:border-leaf bg-white pr-10" required>
              <option value="">-- Select Category --</option>
              <option value="Indoor" {{ old('category')=='Indoor' ? 'selected' : '' }}>Indoor Plants</option>
              <option value="Outdoor" {{ old('category')=='Outdoor' ? 'selected' : '' }}>Outdoor Plants</option>
              <option value="Pots" {{ old('category')=='Pots' ? 'selected' : '' }}>Pots</option>
              <option value="Fertilizers" {{ old('category')=='Fertilizers' ? 'selected' : '' }}>Fertilizer</option>
            </select>
          </div>
        </div>
        <!-- Custom Description -->
        <div>
          <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Custom Description</label>
          <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" placeholder="Enter plant description here...">{{ old('description') }}</textarea>
        </div>

        <!-- Inventory & Stock -->
        <h3 class="text-2xl font-serif font-semibold text-leaf pt-4 border-t mt-6">Inventory & Stock</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
          <div>
            <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
            <input type="number" id="stock_quantity" name="stock_quantity" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" placeholder="0" value="{{ old('stock_quantity') }}" required>
          </div>
          <div class="p-4 bg-green-50 rounded-xl flex items-center justify-center text-sm text-leaf border border-dashed border-leaf/50">
            <i class="fa-solid fa-bell-concierge mr-2"></i> Low stock alerts enabled
          </div>
        </div>

        <!-- PLANT CARE -->
        <div class="mb-4">
          <label for="plant_care" class="block text-gray-700 font-semibold mb-2">Care Instructions:</label>
           <textarea name="plant_care" id="plant_care" rows="4" 
           class="w-full border rounded p-2"
            placeholder="Enter care instructions">{{ old('plant_care', $plant->plant_care ?? '') }}</textarea>
        </div>

        <div class="relative">
  <label for="supplier_id" class="block text-sm font-medium text-gray-700 mb-1">Supplier</label>
  <select id="supplier_id" name="supplier_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf bg-white" required>
    <option value="">-- Select Supplier --</option>
    @foreach($suppliers as $supplier)
      <option value="{{ $supplier->supplier_id }}" 
    {{ old('supplier_id') == $supplier->supplier_id ? 'selected' : '' }}>
    {{ $supplier->supplier_name }} ({{ ucfirst($supplier->supplier_type) }})
</option>
    @endforeach
  </select>
</div>



        <!-- Product Image -->
        <h3 class="text-2xl font-serif font-semibold text-leaf pt-4 border-t mt-6">Product Imagery</h3>
        <div>
          <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Upload Image </label>
          <div class="flex flex-col md:flex-row items-center w-full bg-gray-50 border-2 border-dashed border-gray-300 rounded-xl p-4 hover:border-leaf/70 hover:bg-white/50">
            <label for="image" class="cursor-pointer bg-leaf hover:bg-earth text-white font-semibold py-2.5 px-6 rounded-full transition-all duration-300 text-sm shadow-md">
              <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Choose Image
              <input type="file" id="image" name="image" class="hidden" required>
            </label>
            <span id="fileNameDisplay" class="ml-0 md:ml-4 mt-3 md:mt-0 text-sm text-gray-500 italic truncate text-center md:text-left">No file chosen.</span>
          </div>
        </div>

        <!-- Buttons -->
        <div class="pt-6 border-t flex flex-col-reverse sm:flex-row gap-4 justify-end">
          <a href="{{ route('admin.plants.index') }}" class="w-full sm:w-auto">
            <button type="button" class="w-full flex justify-center items-center px-6 py-3 border border-leaf text-sm font-semibold rounded-full text-leaf hover:bg-leaf hover:text-white shadow-md">
              <i class="fa-solid fa-clipboard-list mr-2"></i> View Inventory
            </button>
          </a>
          <button type="submit" class="w-full sm:w-auto flex justify-center items-center px-6 py-3 text-base font-bold rounded-full shadow-xl text-white bg-leaf hover:bg-earth">
            <i class="fa-solid fa-plus-circle mr-2"></i> Save 
          </button>
        </div>
      </form>
    </div>
  </main>

  <footer class="mt-8 py-4 text-center text-xs text-gray-400">
    &copy; 2024 Plant Inventory Management. All rights reserved.
  </footer>

  <script>
    // Sidebar toggle function
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      sidebar.classList.toggle('hidden');
      main.classList.toggle('centered');
    }

    // File name preview
    document.getElementById('image').addEventListener('change', function(e) {
      const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen.';
      document.getElementById('fileNameDisplay').textContent = fileName;
    });
</script>


</body>
</html>
