<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Reorder History | Admin Dashboard</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

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

  <!-- Header -->
  <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b pb-4">
    <h1 class="text-3xl font-serif font-bold text-earth border-l-4 border-leaf pl-4">
      JIT Reorder History
    </h1>

    <a href="{{ route('admin.dashboard') }}">
      <button class="flex items-center px-4 py-2 border border-gray-300 text-earth font-semibold rounded-full text-sm hover:bg-gray-100 transition shadow-sm">
        <i class="fa-solid fa-arrow-left-long mr-2"></i> Dashboard
      </button>
    </a>
  </div>

  <!-- Table Card -->
  <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8 border-t-4 border-leaf">
    <form method="GET" id="sortForm" class="mb-6 flex justify-end">
  <div class="relative w-full sm:w-64">

    <i class="fa-solid fa-sort absolute left-4 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>

    <select name="sort"
            id="sortBy"
            onchange="document.getElementById('sortForm').submit()"
            class="w-full pl-10 pr-4 py-2 text-sm rounded-full
                   border border-gray-300 bg-white
                   shadow-sm hover:shadow-md
                   focus:outline-none focus:ring-2 focus:ring-leaf/40
                   transition">

      <option value="">All Category</option>

      <option value="category:Outdoor" {{ request('sort') == 'category:Outdoor' ? 'selected' : '' }}>
        Category · Outdoor
      </option>

      <option value="category:Indoor" {{ request('sort') == 'category:Indoor' ? 'selected' : '' }}>
        Category · Indoor
      </option>

      <option value="category:pots" {{ request('sort') == 'category:pots' ? 'selected' : '' }}>
        Category · Pots
      </option>

      <option value="category:fertilizers" {{ request('sort') == 'category:fertilizers' ? 'selected' : '' }}>
        Category · Fertilizer
      </option>

      <option value="dateDesc" {{ request('sort') == 'dateDesc' ? 'selected' : '' }}>
        Date · Newest First
      </option>

      <option value="dateAsc" {{ request('sort') == 'dateAsc' ? 'selected' : '' }}>
        Date · Oldest First
      </option>

    </select>
  </div>
</form>


    <div class="overflow-x-auto shadow-lg rounded-xl">
      <table class="min-w-full divide-y divide-gray-200 bg-white">
        <thead>
          <tr class="bg-leaf text-white font-bold text-sm uppercase tracking-wider">
            <th class="px-4 py-3 text-center rounded-tl-xl">No</th>
            <th class="px-4 py-3 text-left">Product</th>
            <th class="px-4 py-3 text-left">Category</th>
            <th class="px-4 py-3 text-left">Supplier</th>
            <th class="px-4 py-3 text-center">Reorder Quantity</th>
            <th class="px-4 py-3 text-center">Reorder Date</th>
            <th class="px-4 py-3 text-center rounded-tr-xl">Expected Delivery</th>
            <th class="px-4 py-3 text-center rounded-tr-xl">Action</th>

          </tr>
        </thead>

        <tbody class="divide-y divide-gray-100">
          @forelse($histories as $index => $history)
          <tr class="table-row-hover transition-all duration-200">
            <td class="px-4 py-4 text-sm text-gray-500 text-center">
              {{ $histories->firstItem() + $index }}

            </td>

            <td class="px-4 py-4 text-sm font-semibold text-earth">
              {{ $history->product_name }}
            </td>

            <td class="px-4 py-4 text-sm text-gray-600">
              {{ $history->category }}
            </td>

            <td class="px-4 py-4 text-sm text-gray-700">
              {{ $history->supplier_name }}
            </td>

            <td class="px-4 py-4 text-sm text-center font-bold text-leaf">
              {{ $history->reorder_quantity }}
            </td>

            <td class="px-4 py-4 text-sm text-center text-gray-600">
              {{ \Carbon\Carbon::parse($history->reorder_date)->format('d M Y') }}
            </td>

            <td class="px-4 py-4 text-sm text-center text-gray-600">
              {{ \Carbon\Carbon::parse($history->expected_delivery_date)->format('d M Y') }}
            </td>
            <td class="px-4 py-4 text-center">
 <form action="{{ url('/admin/reorder-history/'.$history->id) }}"
      method="POST"
      onsubmit="return confirm('Are you sure you want to delete this reorder history?');">
    @csrf
    @method('DELETE')

    <button type="submit"
        class="px-3 py-1 bg-red-500 text-white rounded-full text-xs font-semibold hover:bg-red-600">
        <i class="fa-solid fa-trash"></i>
    </button>
</form>

</td>
          </tr>
          @empty
          <tr>
            <td colspan="8" class="px-6 py-12 text-center text-gray-500 text-xl font-medium">
              <i class="fa-solid fa-box-open text-4xl mb-3 text-terracotta/50"></i>
              <p>No reorder history recorded yet.</p>
            </td>
          </tr>
          @endforelse
        </tbody>
        
      </table>
    </div>
    @if ($histories->hasPages())
<div class="mt-8 flex justify-end items-center">

  <nav class="inline-flex items-center bg-white rounded-full shadow-lg border border-gray-200 overflow-hidden">

    <!-- Previous -->
    @if ($histories->onFirstPage())
      <span class="px-4 py-2 text-gray-300 cursor-not-allowed">
        <i class="fa-solid fa-chevron-left"></i>
      </span>
    @else
      <a href="{{ $histories->previousPageUrl() }}"
         class="px-4 py-2 text-earth hover:bg-leaf hover:text-white transition">
        <i class="fa-solid fa-chevron-left"></i>
      </a>
    @endif

    <!-- Page Numbers -->
    @foreach (
      $histories->getUrlRange(
        max(1, $histories->currentPage() - 2),
        min($histories->lastPage(), $histories->currentPage() + 2)
      ) as $page => $url
    )
      @if ($page == $histories->currentPage())
        <span class="px-4 py-2 bg-leaf text-white font-semibold">
          {{ $page }}
        </span>
      @else
        <a href="{{ $url }}"
           class="px-4 py-2 text-earth hover:bg-gray-100 transition">
          {{ $page }}
        </a>
      @endif
    @endforeach

    <!-- Next -->
    @if ($histories->hasMorePages())
      <a href="{{ $histories->nextPageUrl() }}"
         class="px-4 py-2 text-earth hover:bg-leaf hover:text-white transition">
        <i class="fa-solid fa-chevron-right"></i>
      </a>
    @else
      <span class="px-4 py-2 text-gray-300 cursor-not-allowed">
        <i class="fa-solid fa-chevron-right"></i>
      </span>
    @endif

  </nav>
</div>
@endif

  </div>

</main>

<footer class="py-4 text-center text-xs text-gray-400 mt-10">
  &copy; 2025 Yah Nursery & Landscape. All rights reserved.
</footer>

<script>
function toggleSidebar() {
  const sidebar = document.getElementById('sidebar');
  const main = document.getElementById('mainContent');
  sidebar.classList.toggle('hidden');
  main.classList.toggle('centered');
}
</script>

</body>
</html>
