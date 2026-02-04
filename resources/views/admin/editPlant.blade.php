<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Manage Product Details | Yah Nursery Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<script src="https://cdn.tailwindcss.com"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');
body { font-family: 'Inter', sans-serif; background-color: #f4f4f0; margin:0; }

input:focus, textarea:focus, select:focus {
  border-color: #2F8F2F;
  box-shadow: 0 0 0 3px rgba(47,143,47,0.4);
  outline: none;
}

select { appearance: none; }

/* Main content */
#mainContent { transition: margin 0.4s ease, max-width 0.4s ease, justify-content 0.3s ease; max-width: calc(100% - 16rem); margin-left: 16rem; display: flex; justify-content: flex-start; }
#formWrapper { width: 100%; max-width: 2xl; }

/* Sidebar closed */
#mainContent.centered { margin-left: auto; margin-right: auto; max-width: 100%; justify-content: center; }

.card-container {
  background-color: #fff;
  border-top: 4px solid #2F8F2F;
  box-shadow: 0 10px 25px rgba(0,0,0,0.05);
  border-radius: 1rem;
  padding: 2rem;
}

.section-title {
  font-family: 'Playfair Display', serif;
  font-weight: 700;
  font-size: 1.5rem;
  color: #2F8F2F;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
  border-bottom: 1px dashed #2F8F2F40;
  padding-bottom: 0.25rem;
}
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
    }
  }
}
</script>
</head>

<body class="flex flex-col min-h-screen">

<x-sidebarAdmin id="sidebar" />

<main id="mainContent" class="flex-1 p-6 lg:p-10">
  <div id="formWrapper" class="card-container">

    <!-- Header -->
    <div class="mb-6">
      <h1 class="text-3xl font-serif font-bold text-earth mb-2">Manage Product Details: {{ $plant->name }}</h1>
      <p class="text-gray-500 text-sm">
        <a href="{{ route('admin.plants.index') }}" class="hover:text-leaf">Inventory</a> / 
        <span class="text-leaf font-semibold">Edit Product</span>
      </p>
    </div>

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

    <!-- Form -->
    <form action="{{ route('admin.plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Product Details -->
      <h2 class="section-title">Product Details</h2>
      <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Plant Name</label>
          <input type="text" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" value="{{ old('name', $plant->name) }}" required>
        </div>
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Price</label>
          <div class="relative">
            <span class="absolute left-0 inset-y-0 flex items-center pl-3 text-gray-500 text-sm">RM</span>
            <input type="number" step="0.01" name="price" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" value="{{ old('price', $plant->price) }}" required>
          </div>
        </div>
       <div class="md:col-span-2 relative">
    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>

    <select id="category" name="category"
        class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf bg-white"
        required>

        {{-- Only show placeholder if no category --}}
        @if(!old('category', $plant->category))
            <option value="">-- Select Category --</option>
        @endif

        @foreach($categories as $cat)
            <option value="{{ $cat }}"
                {{ old('category', $plant->category) === $cat ? 'selected' : '' }}>
                {{ $cat }}
            </option>
        @endforeach

    </select>
</div>

      </div>

      <!-- Custom Description -->
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">Custom Description</label>
        <textarea id="description" name="description" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-xl shadow-sm hover:border-leaf">{{ old('description', $plant->description) }}</textarea>
      </div>

      <!-- Inventory & Stock -->
      <h2 class="section-title">Inventory & Stock</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div>
          <label class="block text-sm font-medium text-gray-700 mb-1">Current Stock</label>
          <input type="number" name="stock_quantity" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf" value="{{ old('stock_quantity', $plant->stock_quantity) }}" required>
        </div>
        <div class="p-4 bg-green-50 rounded-xl flex items-center justify-center text-sm text-leaf border border-dashed border-leaf/50">
          <i class="fa-solid fa-bell-concierge mr-2"></i> Update stock figures carefully.
        </div>
      </div>

      <!-- PLANT CARE -->
      <div class="mb-4">
        <label for="plant_care" class="block text-gray-700 font-semibold mb-2">Care Instructions:</label>
        <textarea name="plant_care" id="plant_care" rows="4" class="w-full border rounded p-2" placeholder="Enter care instructions">{{ old('plant_care', $plant->plant_care ?? '') }}</textarea>
      </div>
      
      <select id="supplier_id" name="supplier_id" class="w-full px-4 py-2 border border-gray-300 rounded-xl shadow-sm hover:border-leaf bg-white" required>
    @foreach($suppliers as $supplier)
      <option value="{{ $supplier->supplier_id }}" 
        {{ old('supplier_id', $plant->supplier_id) == $supplier->supplier_id ? 'selected' : '' }}>
        {{ $supplier->supplier_name }} ({{ ucfirst($supplier->supplier_type) }})
      </option>
    @endforeach
</select>


      <!-- Product Image -->
      <h2 class="section-title">Product Imagery</h2>
      <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
        <div class="mb-4">
          @if($plant->image)
          <img src="{{ asset('storage/' . $plant->image) }}" class="w-full h-48 object-cover rounded-lg shadow-md border border-gray-300" alt="{{ $plant->name }}">
          @else
          <div class="w-full h-48 flex items-center justify-center bg-gray-100 text-gray-400 rounded-lg border-2 border-dashed border-gray-300">
            <i class="fa-solid fa-image text-4xl mr-2"></i> No Current Image
          </div>
          @endif
        </div>
        <label class="cursor-pointer bg-leaf hover:bg-earth text-white font-semibold py-2.5 px-6 rounded-full text-sm shadow-md">
          <i class="fa-solid fa-cloud-arrow-up mr-2"></i> Change Image
          <input type="file" name="image" id="image" class="hidden">
        </label>
        <span id="fileNameDisplay" class="ml-4 text-sm text-gray-500 italic">
          {{ $plant->image ? basename($plant->image) : 'No new file selected' }}
        </span>
      </div>

      <!-- Buttons -->
      <div class="pt-6 border-t flex flex-col sm:flex-row gap-4 justify-end">
        <a href="{{ route('admin.plants.index') }}" class="w-full sm:w-auto">
          <button type="button" class="w-full flex justify-center items-center px-6 py-3 border border-leaf text-sm font-semibold rounded-full text-leaf hover:bg-leaf hover:text-white shadow-md">
            <i class="fa-solid fa-circle-arrow-left mr-2"></i> Back to Inventory
          </button>
        </a>
        <button type="submit" class="w-full sm:w-auto flex justify-center items-center px-6 py-3 text-base font-bold rounded-full shadow-xl text-white bg-leaf hover:bg-earth">
          <i class="fa-solid fa-save mr-2"></i> Save Changes
        </button>
      </div>

    </form>

  </div>
</main>

<footer class="mt-8 py-4 text-center text-xs text-gray-400 border-t">
  &copy; 2024 Plant Inventory Management. All rights reserved.
</footer>

<script>

</script>


</body>
</html>
