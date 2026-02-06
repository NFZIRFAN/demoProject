<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ Management | Yah Nursery</title>
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
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
      transform: translateY(-1px);
    }

    input:focus, select:focus {
      border-color: #2F8F2F;
      box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.4);
      outline: none;
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

    <!-- Page Header -->
    <div class="mb-8 flex flex-col md:flex-row justify-between items-start md:items-center">
      <h1 class="text-4xl font-serif font-bold text-earth border-b pb-2 mb-4 md:mb-0">FAQ Management | List / Add FAQs</h1>
      <div class="flex gap-3 mt-4 md:mt-0">
        <a href="{{ route('admin.faq.create') }}">
          <button class="flex items-center justify-center px-4 py-2 bg-leaf text-white font-semibold rounded-full text-sm hover:bg-earth transition duration-200 shadow-md">
            <i class="fa-solid fa-circle-plus mr-2"></i> Add FAQ
          </button>
        </a>
        <a href="{{ route('admin.dashboard') }}">
          <button class="flex items-center justify-center px-4 py-2 border border-gray-300 text-earth font-semibold rounded-full text-sm hover:bg-gray-100 transition duration-200">
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

    <!-- FAQ Table Card -->
    <div class="bg-white rounded-xl shadow-2xl p-6 md:p-8 border-t-4 border-leaf">

      <!-- Search & Sort -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
        <div class="flex flex-wrap gap-3 items-center w-full md:w-auto">
          
          <!-- Search Input -->
          <div class="relative w-full sm:w-64">
            <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 text-sm"></i>
            <input type="text" id="faqSearch" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full shadow-sm text-sm transition-all duration-300 hover:border-leaf/50" placeholder="Search by question...">
          </div>

          <!-- Sort Dropdown -->
          <div class="relative w-full sm:w-56">
            <select id="faqSort" class="w-full border border-gray-300 rounded-full py-2 px-4 text-sm text-gray-700 shadow-sm hover:border-leaf/50">
              <option value="">Sort by Section</option>
              <option value="Plant-related Questions">Plant-related Questions</option>
              <option value="Fertilizer-related Questions">Fertilizer-related Questions</option>
              <option value="Ordering & Delivery Questions">Ordering & Delivery Questions</option>
              <option value="Product & Website Info">Product & Website Info</option>
              <option value="Care & Support Questions">Care & Support Questions</option>
            </select>
          </div>
        </div>
      </div>

      <!-- FAQ Table -->
<div class="overflow-x-auto shadow-lg rounded-xl">
  <table class="min-w-full divide-y divide-gray-200 bg-white" id="faqTable">
    <thead>
      <tr class="bg-leaf text-white font-bold text-sm uppercase tracking-wider">
        <th class="px-6 py-3 text-center rounded-tl-xl">No</th>
        <th class="px-6 py-3 text-left">Section</th>
        <th class="px-6 py-3 text-left">Question</th>
        <th class="px-6 py-3 text-left">Answer</th>
        <th class="px-6 py-3 text-left">Keywords</th>
        <th class="px-6 py-3 text-center rounded-tr-xl">Actions</th>
      </tr>
    </thead>
    <tbody class="divide-y divide-gray-100">
      @forelse($faqs as $index => $faq)
      <tr class="table-row-hover transition-all duration-200" 
          data-question="{{ strtolower($faq->question) }}"
          data-section="{{ strtolower($faq->section) }}">
        <td class="px-6 py-4 text-center text-sm text-gray-500">{{ $index + 1 }}</td>
        <td class="px-6 py-4 text-sm text-earth">{{ $faq->section }}</td>
        <td class="px-6 py-4 text-sm text-earth">{{ $faq->question }}</td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $faq->answer }}</td>
        <td class="px-6 py-4 text-sm text-gray-600">{{ $faq->keywords }}</td>
        <td class="px-6 py-4 text-center text-sm font-medium space-x-2">
          <a href="{{ route('admin.faq.edit', $faq->id) }}" class="text-leaf hover:text-earth transition duration-200">
            <i class="fa-solid fa-pen-to-square"></i>
          </a>
          <form action="{{ route('admin.faq.delete', $faq->id) }}" method="POST" class="inline" id="delete-form-{{ $faq->id }}">
            @csrf
            @method('DELETE')
            <button type="button" onclick="confirmDelete({{ $faq->id }})" class="text-terracotta hover:text-red-700 transition duration-200">
              <i class="fa-solid fa-trash"></i>
            </button>
          </form>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="px-6 py-12 text-center text-gray-500 text-xl font-medium">
          <i class="fa-solid fa-circle-question text-4xl mb-3 text-leaf/50"></i>
          <p>No FAQs available.</p>
          <a href="{{ route('admin.faq.create') }}" class="text-leaf hover:text-earth mt-2 inline-block text-base font-semibold">Add your first FAQ</a>
        </td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<!-- Pagination Controls -->
<div class="flex justify-end mt-4 mb-6 pr-4 select-none" id="paginationControls">
  <div class="flex items-center gap-2 bg-white shadow-md rounded-full px-3 py-2">
    <button id="prevPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full hover:bg-leaf hover:text-white transition shadow-sm disabled:opacity-40 disabled:cursor-not-allowed">
      <i class="fa-solid fa-arrow-left"></i>
    </button>

    <span id="pageIndicator" class="font-medium text-earth text-sm min-w-[100px] text-center">
      Page 1 of 1
    </span>

    <button id="nextPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full hover:bg-leaf hover:text-white transition shadow-sm disabled:opacity-40 disabled:cursor-not-allowed">
      <i class="fa-solid fa-arrow-right"></i>
    </button>
  </div>
</div>
    </div>
  </main>

  <footer class="py-4 text-center text-xs text-gray-400 mt-10">
    &copy; 2024 Yah Nursery FAQ Management. All rights reserved.
  </footer>

  <script>
    // Sidebar toggle function
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const main = document.getElementById('mainContent');
      sidebar.classList.toggle('hidden');
      main.classList.toggle('centered');
    }

    document.addEventListener('DOMContentLoaded', () => {
  const tbody = document.querySelector('#faqTable tbody');
  let rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.cells.length > 1); // ignore empty rows
  const ITEMS_PER_PAGE = 10;
  let currentPage = 1;

  const prevBtn = document.getElementById('prevPage');
  const nextBtn = document.getElementById('nextPage');
  const pageIndicator = document.getElementById('pageIndicator');

  function renderPage() {
    const totalPages = Math.ceil(rows.length / ITEMS_PER_PAGE) || 1;

    // hide all rows
    rows.forEach(row => row.style.display = 'none');

    // show only current page rows
    const start = (currentPage - 1) * ITEMS_PER_PAGE;
    const end = start + ITEMS_PER_PAGE;
    rows.slice(start, end).forEach((row, i) => {
      row.style.display = '';
      row.cells[0].textContent = start + i + 1;
    });

    pageIndicator.textContent = `Page ${currentPage} of ${totalPages}`;
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages;
  }

  prevBtn.addEventListener('click', () => {
    if (currentPage > 1) {
      currentPage--;
      renderPage();
    }
  });

  nextBtn.addEventListener('click', () => {
    if (currentPage < Math.ceil(rows.length / ITEMS_PER_PAGE)) {
      currentPage++;
      renderPage();
    }
  });

  // Filter Table
  const faqSearch = document.getElementById('faqSearch');
  const faqSort = document.getElementById('faqSort');

  function filterTable() {
    const searchTerm = faqSearch.value.toLowerCase();
    const sortValue = faqSort.value.toLowerCase();
    rows.forEach(row => {
      const question = row.dataset.question;
      const section = row.dataset.section;
      const matchSearch = question.includes(searchTerm);
      const matchSort = sortValue ? section === sortValue : true;
      row.style.display = (matchSearch && matchSort) ? '' : 'none';
    });

    // Update rows array to only visible rows after filter
    rows = Array.from(tbody.querySelectorAll('tr')).filter(r => r.style.display !== 'none' && r.cells.length > 1);
    currentPage = 1;
    renderPage();
  }

  faqSearch.addEventListener('keyup', filterTable);
  faqSort.addEventListener('change', filterTable);

  // Initial render
  renderPage();
});

    // Filter Table
    const faqSearch = document.getElementById('faqSearch');
    const faqSort = document.getElementById('faqSort');
    const tableBody = document.querySelector('#faqTable tbody');

    function filterTable() {
      const searchTerm = faqSearch.value.toLowerCase();
      const sortValue = faqSort.value.toLowerCase();
      const rows = tableBody.querySelectorAll('tr');
      let visibleRows = 0;
      let counter = 1;

      rows.forEach(row => {
        if (row.cells.length === 1) return;
        const question = row.dataset.question;
        const section = row.dataset.section;

        const matchSearch = question.includes(searchTerm);
        const matchSort = sortValue ? section === sortValue : true;

        if (matchSearch && matchSort) {
          row.style.display = '';
          row.cells[0].textContent = counter++;
          visibleRows++;
        } else {
          row.style.display = 'none';
        }
      });

      const noResultsRow = document.getElementById('no-search-results');
      if (noResultsRow) noResultsRow.remove();

      if (visibleRows === 0) {
        const newRow = tableBody.insertRow();
        newRow.id = 'no-search-results';
        const cell = newRow.insertCell();
        cell.colSpan = 6;
        cell.className = 'px-6 py-12 text-center text-gray-500 text-xl font-medium';
        cell.innerHTML = '<i class="fa-solid fa-magnifying-glass-minus text-4xl mb-3 text-terracotta/50"></i><p>No FAQs matched your filter.</p>';
      }
    }

    faqSearch.addEventListener('keyup', filterTable);
    faqSort.addEventListener('change', filterTable);

    function confirmDelete(id) {
      Swal.fire({
        title: 'Are you sure?',
        text: "This action cannot be undone!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#e3342f',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          document.getElementById('delete-form-' + id).submit();
        }
      });
    }
  </script>

</body>
</html>
