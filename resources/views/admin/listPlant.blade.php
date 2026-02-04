<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Plant Inventory</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');
    body { font-family: 'Inter', sans-serif; background-color: #f4f4f0; }
   table {
  width: 100%;
  table-layout: auto; /* natural column widths */
  border-collapse: collapse;
}

th, td {
  padding: 0.5rem 1rem;
  border: 1px solid #e5e7eb;
  vertical-align: middle;
}

th {
  background-color: #2F8F2F;
  color: white;
  font-weight: 600;
  text-transform: uppercase;
  font-size: 0.875rem;
  text-align: center;
}

td {
  text-align: center;
  font-size: 0.875rem;
}

/* Small columns */
td.no-col, td.price-col, td.stock-col, td.reorder-col, td.actions-col {
  width: 50px;
  white-space: nowrap;
}

/* Product column */
td.product-col {
  min-width: 220px;
  text-align: left;
}

/* Category column */
td.category-col {
  min-width: 120px;
}

/* Description & Plant Care */
td.description-col, td.plant-care-col {
  max-width: 300px;
  text-align: left;
  white-space: normal;
  word-wrap: break-word;
}

/* Hover */
tr.table-row-hover:hover {
  background-color: #f8fcf8;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  transform: translateY(-1px);
}

/* Tooltip stays */
.tooltip {
  position: relative;
  display: inline-block;
  cursor: help;
}
.tooltip .tooltip-text {
  visibility: hidden;
  width: 280px;
  background-color: rgba(47,143,47,0.95);
  color: #fff;
  border-radius: 8px;
  padding: 10px;
  position: absolute;
  bottom: 120%;
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.3s;
  font-size: 0.8rem;
  line-height: 1.2rem;
  pointer-events: none;
  white-space: normal;
}
.tooltip:hover .tooltip-text {
  visibility: visible;
  opacity: 1;
}
.tooltip .tooltip-text::after {
  content: "";
  position: absolute;
  top: 100%;
  left: 50%;
  transform: translateX(-50%);
  border-width: 6px;
  border-style: solid;
  border-color: rgba(47,143,47,0.95) transparent transparent transparent;
}


    .category-header {
      background-color: #2F8F2F;
      color: white;
      text-align: left;
      padding: 8px 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
    }

    /* Smooth transition for main content */
    #mainContent {
      transition: margin 0.4s ease, max-width 0.4s ease;
      max-width: calc(100% - 16rem); /* initial width with sidebar */
    }

    /* When sidebar is hidden */
    #mainContent.centered {
      margin-left: auto;
      margin-right: auto;
      max-width: 100%; /* expand content to center */
    }
    .custom-alert-success {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: linear-gradient(135deg, #28a745, #4cd964);
    color: #fff;
    padding: 15px 20px;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    animation: slideDown 0.5s ease;
}

.alert-content {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 15px;
    font-weight: 500;
}

.alert-content i {
    font-size: 22px;
}

.close-btn {
    background: none;
    border: none;
    color: #fff;
    font-size: 22px;
    cursor: pointer;
    line-height: 1;
}

@keyframes slideDown {
    from {
        opacity: 0;
        transform: translateY(-15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
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

  <!-- Sidebar -->
  <x-sidebarAdmin id="sidebar" />
  <!-- Main content -->
  <main id="mainContent" class="flex-1 p-4 sm:p-6 lg:p-8 ml-64">

    <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8 border-t-4 border-leaf">
     @if (session('success'))
    <div class="custom-alert-success" id="successAlert">
        <div class="alert-content">
            <i class="fas fa-check-circle"></i>
            <span>{{ session('success') }}</span>
        </div>
        <button class="close-btn" onclick="closeAlert()">×</button>
    </div>
@endif
      <!-- Header Section -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 border-b pb-4">
        <h1 class="text-3xl font-serif font-bold text-earth mb-4 md:mb-0">List Product Inventory</h1>
        <div class="flex flex-wrap gap-3 items-center w-full md:w-auto">
          <!-- 🔍 Search -->
          <div class="relative w-full sm:w-64">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
            <input type="text" id="plantSearch" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm text-sm hover:border-leaf/50" placeholder="Search by name...">
          </div>

          <!-- 🔽 Sort -->
<div class="relative w-full sm:w-48">
  <select id="sortBy" class="w-full border border-gray-300 rounded-full px-4 py-2 text-sm shadow-sm focus:ring-0">
    <option value="">Sort by...</option>
    <option value="category:outdoor">Category: Outdoor</option>
    <option value="category:indoor">Category: Indoor</option>
    <option value="category:pots">Category: Pots</option>
    <option value="category:fertilizers">Category: Fertilizer</option>
    <option value="priceAsc">Price (Low–High)</option>
    <option value="priceDesc">Price (High–Low)</option>
    <option value="stockAsc">Stock (Low–High)</option>
    <option value="stockDesc">Stock (High–Low)</option>
  </select>
</div>


          <a href="{{ route('admin.dashboard') }}" class="w-full sm:w-auto">
            <button class="w-full flex items-center justify-center px-4 py-2 border border-gray-300 text-earth font-semibold rounded-full text-sm hover:bg-gray-100">
              <i class="fa-solid fa-arrow-left-long mr-2"></i> Dashboard
            </button>
          </a>
          <a href="{{ route('admin.plants.create') }}" class="w-full sm:w-auto">
            <button class="w-full flex items-center justify-center px-4 py-2 bg-leaf text-white font-semibold rounded-full text-sm hover:bg-earth shadow-md">
              <i class="fa-solid fa-leaf mr-2"></i> Add New Product
            </button>
          </a>
        </div>
      </div>

    <!-- Plants Table -->
<div class="w-full shadow-lg rounded-xl overflow-hidden">
  <table class="table-auto w-full divide-y divide-gray-200 bg-white" id="plantTable">
    <thead>
      <tr class="bg-leaf text-white font-bold text-sm uppercase tracking-wider">
        <th class="px-2 py-2 text-center rounded-tl-xl w-8">No</th>
        <th class="px-4 py-2 text-center w-48">Product</th>
        <th class="px-4 py-2 text-center w-32">Category</th>
        <th class="px-4 py-2 text-center w-64">Description</th>
        <th class="px-4 py-2 text-center w-64">Care Instructions</th>
        <th class="px-4 py-2 text-center w-20">Price</th>
        <th class="px-4 py-2 text-center w-20">Stock</th>
        <th class="px-4 py-2 text-center w-32">Supplier</th>
        <th class="px-4 py-2 text-center w-44 rounded-tr-xl">Actions</th>
      </tr>
    </thead>

    <tbody class="divide-y divide-gray-100" id="plantBody">
      @foreach ($plants as $index => $plant)
      <tr class="table-row-hover transition-all duration-200 hover:bg-green-50"
          data-name="{{ strtolower($plant->name) }}"
          data-category="{{ strtolower($plant->category) }}"
          data-price="{{ $plant->price }}"
          data-stock="{{ $plant->stock_quantity }}">

        <!-- No -->
        <td class="px-2 py-2 text-sm text-gray-500 text-center">{{ $loop->iteration }}</td>

        <!-- Product -->
        <td class="px-4 py-2 text-sm text-earth text-center">
          <div class="flex flex-col items-center justify-center space-y-1">
            <div class="h-10 w-10 rounded-lg overflow-hidden border bg-gray-50">
              @if($plant->image)
                <img class="h-full w-full object-cover" src="{{ asset('storage/' . $plant->image) }}" alt="{{ $plant->name }}">
              @else
                <div class="flex items-center justify-center h-full w-full text-gray-300 text-xs font-medium">N/A</div>
              @endif
            </div>
            <span class="text-center break-words">{{ $plant->name }}</span>
          </div>
        </td>

        <!-- Category -->
        <td class="px-4 py-2 text-sm text-center">
          <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-terracotta/10 text-terracotta">
            {{ $plant->category }}
          </span>
        </td>

        <!-- Description -->
        <td class="px-4 py-2 text-sm text-gray-600 text-center">
          @if($plant->description)
            <div class="tooltip break-words">
              {{ Str::limit($plant->description, 50, '...') }}
              <span class="tooltip-text">{{ $plant->description }}</span>
            </div>
          @else
            <span class="italic text-gray-400">No description</span>
          @endif
        </td>

        <!-- Care Instructions -->
        <td class="px-4 py-2 text-sm text-gray-600 text-center">
          @if($plant->plant_care)
            <div class="tooltip break-words">
              {{ Str::limit($plant->plant_care, 50, '...') }}
              <span class="tooltip-text">{{ $plant->plant_care }}</span>
            </div>
          @else
            <span class="italic text-gray-400">No care info</span>
          @endif
        </td>

        <!-- Price -->
        <td class="px-4 py-2 text-sm font-medium text-leaf text-center">RM {{ number_format($plant->price, 2) }}</td>

        <!-- Stock -->
        <td class="px-4 py-2 text-sm text-center">
          <span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full
            {{ $plant->stock_quantity <= $plant->reorder_level
              ? 'bg-red-100 text-red-800'
              : 'bg-green-100 text-green-800' }}">
            {{ $plant->stock_quantity }}
          </span>
        </td>

        <!-- Supplier -->
        <td class="px-4 py-2 text-sm text-center">{{ $plant->supplier ? $plant->supplier->supplier_name : 'N/A' }}</td>

        <!-- Actions -->
        <td class="actions-col px-2 py-2 text-center text-sm space-x-2 w-44 min-w-[160px]">
          <a href="{{ route('admin.plants.edit', $plant->id) }}" class="text-leaf hover:text-earth transition">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <form action="{{ route('admin.plants.destroy', $plant->id) }}" method="POST" class="inline-block">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-terracotta hover:text-red-700 transition"
                    onclick="return confirm('Delete {{ $plant->name }} permanently?')">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        </td>

      </tr>
      @endforeach
    </tbody>
  </table>
</div>


      <!-- Pagination Controls (Right aligned) -->
<div class="flex justify-end mt-4 mb-6 pr-4 select-none" id="paginationControls">
  <div class="flex items-center gap-4 bg-white shadow-md rounded-full px-3 py-2">
    
    <button id="prevPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full hover:bg-leaf hover:text-white transition shadow-sm disabled:opacity-40 disabled:cursor-not-allowed">
      <i class="fa-solid fa-arrow-left"></i>
    </button>

    <span id="pageIndicator" class="font-medium text-earth text-sm min-w-[100px] text-center">
      Page 1 of 5
    </span>

    <button id="nextPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full hover:bg-leaf hover:text-white transition shadow-sm disabled:opacity-40 disabled:cursor-not-allowed">
      <i class="fa-solid fa-arrow-right"></i>
    </button>

  </div>
</div>
    </div>
  </main>

  <footer class="py-4 text-center text-xs text-gray-400 border-t mt-6">
    &copy; 2024 Plant Inventory Management. All rights reserved.
  </footer>

  <script>
    // Smooth Sidebar toggle
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      sidebar.classList.toggle('hidden');
      main.classList.toggle('centered');
    }
document.addEventListener('DOMContentLoaded', () => {

  const plantSearch = document.getElementById('plantSearch');
  const sortBy = document.getElementById('sortBy');
  const tbody = document.getElementById('plantBody');

  const prevBtn = document.getElementById('prevPage');
  const nextBtn = document.getElementById('nextPage');
  const pageIndicator = document.getElementById('pageIndicator');

  const ITEMS_PER_PAGE = 8;
  let currentPage = 1;

  // clone rows to keep originals intact
  const originalRows = Array.from(tbody.querySelectorAll('tr')).map(r => r.cloneNode(true));

  const norm = s => (s ?? '').toString().trim().toLowerCase();

  function paginate(rows) {
    const totalPages = Math.ceil(rows.length / ITEMS_PER_PAGE);
    if (currentPage > totalPages) currentPage = totalPages || 1;

    const start = (currentPage - 1) * ITEMS_PER_PAGE;
    const paginatedRows = rows.slice(start, start + ITEMS_PER_PAGE);

    updatePaginationUI(totalPages);
    return paginatedRows;
  }

  function updatePaginationUI(totalPages) {
    pageIndicator.textContent = `Page ${currentPage} of ${totalPages || 1}`;
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages || totalPages === 0;
  }

  function rebuild(rows) {
    tbody.innerHTML = '';
    rows.forEach((row, i) => {
      const clone = row.cloneNode(true); // clone to keep original intact
      const noCell = clone.querySelector('td:first-child');
      if (noCell) noCell.innerText = (i + 1) + (currentPage - 1) * ITEMS_PER_PAGE;
      tbody.appendChild(clone);
    });
  }

  function applyAll() {
    let rows = originalRows.slice();

    // SEARCH
    const term = norm(plantSearch.value);
    if (term) {
      rows = rows.filter(row => {
        const name = norm(row.getAttribute('data-name'));
        const desc = norm(row.innerText);
        return name.includes(term) || desc.includes(term);
      });
    }

    // CATEGORY FILTER
    const value = sortBy.value;
    if (value.startsWith("category:")) {
      const cat = value.split(":")[1];
      rows = rows.filter(r => norm(r.getAttribute("data-category")) === norm(cat));
    }

    // PRICE / STOCK SORT
    if (value === "priceAsc" || value === "priceDesc" ||
        value === "stockAsc" || value === "stockDesc") {
      rows.sort((a,b) => {
        const priceA = parseFloat(a.dataset.price);
        const priceB = parseFloat(b.dataset.price);
        const stockA = parseInt(a.dataset.stock);
        const stockB = parseInt(b.dataset.stock);
        switch (value) {
          case "priceAsc": return priceA - priceB;
          case "priceDesc": return priceB - priceA;
          case "stockAsc": return stockA - stockB;
          case "stockDesc": return stockB - stockA;
        }
      });
    }

    currentPage = 1; // reset page after filter/sort
    rebuild(paginate(rows));
  }

  function applyPaginationOnly() {
    let rows = originalRows.slice();

    const term = norm(plantSearch.value);
    if (term) rows = rows.filter(r => norm(r.innerText).includes(term));

    const value = sortBy.value;
    if (value.startsWith("category:")) {
      const cat = value.split(":")[1];
      rows = rows.filter(r => norm(r.dataset.category) === norm(cat));
    }

    if (value.includes("price") || value.includes("stock")) {
      rows.sort((a,b) => {
        const priceA = parseFloat(a.dataset.price);
        const priceB = parseFloat(b.dataset.price);
        const stockA = parseInt(a.dataset.stock);
        const stockB = parseInt(b.dataset.stock);
        switch (value) {
          case "priceAsc": return priceA - priceB;
          case "priceDesc": return priceB - priceA;
          case "stockAsc": return stockA - stockB;
          case "stockDesc": return stockB - stockA;
        }
      });
    }

    rebuild(paginate(rows));
  }

  // PAGE BUTTON EVENTS
  prevBtn.addEventListener('click', () => { currentPage--; applyPaginationOnly(); });
  nextBtn.addEventListener('click', () => { currentPage++; applyPaginationOnly(); });

  plantSearch.addEventListener('input', applyAll);
  sortBy.addEventListener('change', applyAll);

  applyAll(); // initialize table
});
  setTimeout(() => {
        const alert = document.getElementById('successAlert');
        if (alert) {
            alert.style.opacity = '0';
            alert.style.transform = 'translateY(-10px)';
            setTimeout(() => alert.remove(), 400);
        }
    }, 3000);

    function closeAlert() {
        const alert = document.getElementById('successAlert');
        if (alert) alert.remove();
    }
  </script>

</body>
</html>
