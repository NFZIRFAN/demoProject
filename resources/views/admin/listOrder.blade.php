<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Professional Admin Dashboard - Customer Orders</title>

<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
:root {
    --color-accent: #3A7340;
    --color-primary-text: #1F2937;
    --color-secondary-text: #6B7280;
    --color-background-light: #F9FAFB;
    --color-sidebar-bg: #FFFFFF;
    --color-sidebar-hover: #ECFDF5;
}

body {
    margin: 0;
    font-family: 'Inter', sans-serif;
    background: var(--color-background-light);
    display: flex;
    overflow-x: hidden;
}

/* Sidebar */
.sidebar {
    width: 260px;
    background: var(--color-sidebar-bg);
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    border-right: 1px solid #E5E7EB;
    transition: transform 0.35s ease, width 0.35s ease;
    overflow-y: auto;
    z-index: 100;
    box-shadow: 4px 0 15px rgba(0,0,0,0.02);
}
.sidebar.hidden { transform: translateX(-100%); }
.sidebar::-webkit-scrollbar { width: 4px; }
.sidebar::-webkit-scrollbar-thumb { background-color: #D1D5DB; border-radius: 10px; }

.sidebar-header {
    text-align: center;
    padding: 40px 10px 30px;
    border-bottom: 1px solid #F3F4F6;
    display: flex;
    flex-direction: column;
    align-items: center;
}
.sidebar-logo {
    width: 80px;
    height: 80px;
    object-fit: contain;
    border-radius: 50%;
    margin-bottom: 12px;
    box-shadow: 0 0 0 3px var(--color-accent), 0 2px 5px rgba(0,0,0,0.1);
}
.sidebar-header h2 {
    font-size: 20px;
    font-weight: 700;
    color: var(--color-primary-text);
    letter-spacing: 2px;
    text-transform: uppercase;
}

.menu { padding: 15px; }
.menu a, .menu .dropdown-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 12px;
    margin: 4px 0;
    color: var(--color-primary-text);
    font-size: 15px;
    font-weight: 500;
    text-decoration: none;
    border-radius: 8px;
    cursor: pointer;
    transition: all 0.2s ease;
}
.menu a i, .menu .dropdown-toggle i { margin-right: 10px; width: 18px; color: var(--color-secondary-text); transition: color 0.2s ease; }
.menu a:hover, .menu .dropdown-toggle:hover { background: var(--color-sidebar-hover); color: var(--color-accent); }
.menu a:hover i, .menu .dropdown-toggle:hover i { color: var(--color-accent); }
.menu a.active, .menu a.active i {
    background: var(--color-accent);
    color: #ffffff !important;
    font-weight: 600;
    box-shadow: 0 4px 8px rgba(58, 115, 64, 0.2);
}
.menu a.active:hover { background: #306037; }

/* Dropdown */
.dropdown-menu { 
    display: none; 
    flex-direction: column; 
    padding-left: 10px;
    background: #F9FAFB;
    border-radius: 6px;
    margin-top: 2px;
    margin-bottom: 4px;
    border-left: 3px solid #E5E7EB;
}
.dropdown-menu a { 
    padding: 8px 12px 8px 25px;
    font-size: 14px;
    color: var(--color-secondary-text); 
}
.dropdown-menu a:hover { color: var(--color-accent); background: #F3F4F6; }
.dropdown-toggle.active + .dropdown-menu { display: flex; }
.dropdown-toggle span.arrow { transition: transform 0.3s ease; font-size: 1.2em; color: var(--color-secondary-text); }
.dropdown-toggle.active span.arrow { transform: rotate(90deg); }

/* Logout */
.logout-btn {
    width: 100%;
    margin-top: 15px;
    padding: 10px 12px;
    background: #FEE2E2;
    border: none;
    color: #B91C1C;
    font-weight: 600;
    border-radius: 8px;
    cursor: pointer;
    text-align: left;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}
.logout-btn:hover { background: #B91C1C; color: #fff; box-shadow: 0 4px 8px rgba(185, 28, 28, 0.3); }
.logout-btn i { margin-right: 10px; color: #B91C1C; }
.logout-btn:hover i { color: #fff; }

/* Top Controls */
.top-controls {
    position: fixed;
    top: 0;
    left: 260px;
    width: calc(100% - 260px);
    height: 64px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    z-index: 1000;
    transition: left 0.35s ease, width 0.35s ease;
    border-bottom: 1px solid #F3F4F6;
}
.sidebar.hidden ~ .top-controls { left: 0; width: 100%; }
.toggle-btn, .calendar-btn { background: none; border: none; cursor: pointer; font-size: 18px; padding: 8px 12px; border-radius: 8px; transition: 0.3s; }
.toggle-btn:hover, .calendar-btn:hover { background: #F3F4F6; color: var(--color-accent); }
.calendar-btn { display: flex; align-items: center; font-size: 15px; font-weight: 600; }
.calendar-btn i { margin-right: 8px; font-size: 16px; }
.live-date-time { font-size: 15px; font-weight: 500; color: var(--color-secondary-text); padding: 8px 12px; border: 1px solid #E5E7EB; border-radius: 6px; }
.calendar-popup { position: absolute; top: 40px; right: 0; width: 280px; background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: none; text-align: center; font-size: 14px; color: var(--color-primary-text); border: 1px solid #E5E7EB; }
.calendar-popup.open { display: block; }

/* Main Content */
.main {
    margin-left: 260px;
    padding: 84px 40px 40px;
    width: calc(100% - 260px);
    transition: all 0.35s ease;
}
.sidebar.hidden ~ .main { margin-left: 0; width: 100%; padding-top: 84px; }

/* Table */
.table-row-hover:hover { background-color: #f5fff5; transition: 0.2s; }

@media (max-width: 768px) {
    .sidebar { width: 220px; }
    .main { margin-left: 0; padding: 74px 20px 20px; width: 100%; }
    .top-controls { left: 0; width: 100%; }
}
@keyframes toastProgress {
    from { width: 100%; }
    to { width: 0%; }
}

.animate-toast-progress {
    animation: toastProgress 3s linear forwards;
}

</style>
</head>

<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
    <div class="sidebar-header">
        <img src="{{ asset('storage/image/logoYah.png') }}" alt="Admin Logo" class="sidebar-logo">
        <h2>ADMIN</h2>
    </div>

    <div class="menu">
        <a href="{{ route('admin.dashboard') }}" class="active"><i class="fa-solid fa-house"></i> Dashboard</a>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-box-open"></i> Products</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.plants.index') }}">List Products</a>
                <a href="{{ route('admin.plants.create') }}">Add Product</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-cart-shopping"></i> Orders</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.orders.index') }}">All Orders</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-circle-question"></i> FAQ</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.faq.index') }}">List FAQ</a>
                <a href="{{ route('admin.faq.create') }}">Add New FAQ</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-users"></i> Customers</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.customers.index') }}">List Customers</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-user-lock"></i> Admins</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.admins.index') }}">List Admins</a>
                <a href="{{ route('admin.admins.create') }}">Add Admin</a>
            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-truck"></i></i> Suppliers
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
               <a href="{{ route('admin.suppliers.index') }}">List Supplier</a>
                <a href="{{ route('admin.suppliers.create') }}">Add Supplier</a>
                <a href="{{ route('admin.reorder.history') }}">View history reorder</a>

            </div>
        </div>

        <div class="dropdown">
            <div class="dropdown-toggle"><div class="flex items-center"><i class="fa-solid fa-gear"></i> Settings</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.settings') }}">General Settings</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:block;">@csrf
                    <button type="submit" class="logout-btn"><i class="fa-solid fa-right-from-bracket"></i> Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Top Controls -->
<div class="top-controls">
    <button class="toggle-btn" onclick="toggleSidebar()"><i class="fa-solid fa-bars"></i></button>
    <div class="live-date-time" id="live-time-date">Loading...</div>
    <div class="calendar-container">
        <button class="calendar-btn" onclick="toggleCalendar()"><i class="fa-solid fa-calendar-days"></i> Today</button>
        <div id="calendar-popup" class="calendar-popup">
            <h3>System Clock</h3>
            <p id="full-date-display"></p>
            <p id="current-time-display"></p>
            <div class="last-refresh">Last refreshed: <span id="last-refresh-time"></span></div>
        </div>
    </div>
</div>

<!-- Main Content -->
<div class="main">
<!-- Add this in your <head> -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<!-- In your main content -->
<h1 class="text-4xl mb-6" style="font-family: 'Playfair Display', serif; color:#3A7340; font-weight:700; letter-spacing:2px; text-transform:uppercase;">
    CUSTOMER ORDERS DETAILS
</h1>
  <!-- Orders Table Section -->
<div class="w-full shadow-lg rounded-xl overflow-visible bg-white p-6">

  <!-- Filters and Buttons -->
  <div class="flex flex-col sm:flex-row sm:justify-between items-start sm:items-center gap-4 mb-6">
    
    <!-- Delivery Status Filter -->
    <select id="deliveryStatusFilter"
      class="px-4 py-2 border border-gray-300 rounded-xl shadow-sm text-sm hover:border-leaf bg-white transition-colors">
      <option value="">All Delivery Status</option>
      <option value="pending delivery">Pending Delivery</option>
      <option value="out for delivery">Out for Delivery</option>
      <option value="completed">Completed</option>
    </select>

    <!-- Buttons -->
    <div class="flex gap-3">
      <a href="{{ route('admin.dashboard') }}" class="inline-block">
        <button
          class="flex items-center justify-center px-5 py-2 border border-gray-300 rounded-full text-sm font-semibold text-earth hover:bg-green-50 transition-all shadow-md hover:shadow-lg">
          <i class="fa-solid fa-arrow-left-long mr-2"></i> Dashboard
        </button>
      </a>

      <a href="{{ route('admin.orders.index') }}" class="inline-block">
        <button
          class="flex items-center justify-center px-5 py-2 border border-leaf rounded-full text-sm font-semibold text-BLACK bg-leaf hover:bg-earth transition-all shadow-md hover:shadow-lg">
          <i class="fa-solid fa-table-list mr-2"></i> Orders List
        </button>
      </a>
    </div>
  </div>

  <!-- Orders Table -->
  <div class="overflow-x-auto">
    <table class="min-w-full divide-y divide-gray-200 rounded-xl shadow-sm" id="ordersTable">
      <thead>
        <tr class="bg-leaf text-BLACK font-bold text-sm uppercase tracking-wider">
          <th class="px-6 py-3 text-center rounded-tl-xl">No</th>
          <th class="px-6 py-3 text-left">Order No.</th>
          <th class="px-6 py-3 text-left">Customer</th>
          <th class="px-6 py-3 text-center">Total</th>
          <th class="px-6 py-3 text-center">Payment</th>
          <th class="px-6 py-3 text-left">Address</th>
          <th class="px-6 py-3 text-center">Delivery Status</th>
          <th class="px-6 py-3 text-center rounded-tr-xl">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100" id="orderBody">
        @foreach ($orders as $order)
        <tr class="table-row-hover transition-all duration-200 hover:bg-green-50" 
            data-delivery="{{ strtolower($order->delivery_status) }}">
          <td class="px-6 py-3 text-center text-sm font-semibold text-earth">{{ $loop->iteration }}</td>
          <td class="px-6 py-3 text-sm font-medium text-gray-700">{{ $order->order_number }}</td>
          <td class="px-6 py-3 text-sm">
            <div class="font-semibold text-gray-800">{{ $order->first_name }} {{ $order->last_name }}</div>
            <div class="text-xs text-gray-500">{{ $order->email }}</div>
          </td>
          <td class="px-6 py-3 text-sm font-medium text-leaf text-center">RM {{ number_format($order->total,2) }}</td>
          <td class="px-6 py-3 text-center">
            <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-terracotta/20 text-terracotta">
              {{ $order->payment_method }}
            </span>
          </td>
          <td class="px-6 py-3 text-sm text-gray-600">
            {{ $order->address_1 }}, {{ $order->city }}, {{ $order->state }} {{ $order->zip }}
          </td>

          <!-- Delivery Status Dropdown -->
          <td class="px-6 py-3 text-center">
            <select
              onchange="setDeliveryColor(this); updateDeliveryStatus({{ $order->id }}, this.value);"
              id="delivery-select-{{ $order->id }}"
              class="px-3 py-1 rounded-full border text-sm font-medium transition-colors shadow-sm">
              <option value="Pending Delivery" {{ $order->delivery_status=='Pending Delivery' ? 'selected' : '' }}>Pending Delivery</option>
              <option value="Out for Delivery" {{ $order->delivery_status=='Out for Delivery' ? 'selected' : '' }}>Out for Delivery</option>
              <option value="Completed" {{ $order->delivery_status=='Completed' ? 'selected' : '' }}>Completed</option>
            </select>
          </td>

          <!-- Actions -->
          <td class="px-6 py-3 text-center text-sm space-x-2">
            <a href="{{ route('order.invoice', $order->id) }}" class="text-leaf hover:text-earth transition">
              <i class="fa-solid fa-file-invoice"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

<!-- Scripts -->
<script>
  // Filter table by delivery status
  document.getElementById('deliveryStatusFilter')?.addEventListener('change', function () {
    const selectedStatus = this.value.toLowerCase();
    const rows = document.querySelectorAll('#orderBody tr');

    rows.forEach(row => {
      const rowStatus = row.getAttribute('data-delivery');
      row.style.display = !selectedStatus || rowStatus === selectedStatus ? '' : 'none';
    });
  });

  // Update delivery status via AJAX and update row data
  function updateDeliveryStatus(orderId, newStatus) {
    fetch(`/admin/orders/${orderId}/update-delivery`, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
        'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
      body: JSON.stringify({ delivery_status: newStatus })
    })
    .then(res => res.json())
    .then(data => {
      if (data.success) {
        const row = document.getElementById(`delivery-select-${orderId}`).closest('tr');
        row.setAttribute('data-delivery', newStatus.toLowerCase());
      } else {
        alert('Failed to update delivery status.');
      }
    })
    .catch(err => console.error(err));
  }

  // Set select color based on status
  function setDeliveryColor(select) {
    const status = select.value.toLowerCase();
    select.classList.remove('bg-yellow-100', 'bg-green-100', 'bg-blue-100', 'text-yellow-800', 'text-green-800', 'text-blue-800');

    if (status === 'pending delivery') {
      select.classList.add('bg-yellow-100', 'text-yellow-800');
    } else if (status === 'out for delivery') {
      select.classList.add('bg-blue-100', 'text-blue-800');
    } else if (status === 'completed') {
      select.classList.add('bg-green-100', 'text-green-800');
    }
  }

  // Initialize colors for all selects
  document.querySelectorAll('select[id^="delivery-select-"]').forEach(sel => setDeliveryColor(sel));
</script>



        <!-- Pagination -->
<div class="flex justify-end mt-6 select-none" id="paginationControls">
    <div class="flex items-center gap-2 bg-white shadow rounded-full px-4 py-2">
        <!-- Previous Button -->
        <button id="prevPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full 
                   hover:bg-leaf hover:text-white transition duration-300 disabled:opacity-40 disabled:cursor-not-allowed">
            <i class="fa-solid fa-arrow-left"></i>
        </button>

        <span id="pageIndicator" class="font-medium text-earth text-sm min-w-[110px] text-center">
            Page 1 of 1
        </span>

        <!-- Next Button -->
        <button id="nextPage" 
            class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-600 rounded-full 
                   hover:bg-leaf hover:text-white transition duration-300 disabled:opacity-40 disabled:cursor-not-allowed">
            <i class="fa-solid fa-arrow-right"></i>
        </button>
    </div>
</div>

    </div>
</div>
<!-- Toast Notification -->
<div id="toast"
     class="fixed top-6 right-6 z-[9999] hidden max-w-sm w-full bg-white border border-green-200 shadow-xl rounded-xl overflow-hidden">
    <div class="flex items-start gap-3 p-4">
        <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center rounded-full bg-green-100 text-green-600">
            <i class="fa-solid fa-check"></i>
        </div>

        <div class="flex-1">
            <p class="font-semibold text-gray-800" id="toast-title">Success</p>
            <p class="text-sm text-gray-600" id="toast-message"></p>
        </div>

        <button onclick="hideToast()" class="text-gray-400 hover:text-gray-600">
            <i class="fa-solid fa-xmark"></i>
        </button>
    </div>

    <!-- Progress bar -->
    <div class="h-1 bg-green-500 animate-toast-progress"></div>
</div>


<script>
// Sidebar toggle
function toggleSidebar() { document.getElementById("sidebar").classList.toggle("hidden"); }

// Dropdowns
const dropdowns = document.querySelectorAll('.dropdown-toggle');
dropdowns.forEach(toggle => {
    toggle.addEventListener('click', () => {
        dropdowns.forEach(other => { if(other!==toggle){ other.classList.remove('active'); other.nextElementSibling.style.display='none'; } });
        toggle.classList.toggle('active');
        const menu = toggle.nextElementSibling;
        menu.style.display = menu.style.display==='flex'?'none':'flex';
    });
});

// Calendar toggle & clock
function toggleCalendar() { document.getElementById('calendar-popup').classList.toggle('open'); }
function updateDateTime() {
    const now = new Date();
    const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
    const formattedDate = now.toLocaleDateString('en-MY', dateOptions);
    const formattedTime = now.toLocaleTimeString('en-MY', { hour12:true,hour:'2-digit',minute:'2-digit',second:'2-digit' });
    document.getElementById('live-time-date').innerHTML = `${formattedDate} – ${formattedTime}`;
    document.getElementById('full-date-display').textContent = formattedDate;
    document.getElementById('current-time-display').textContent = formattedTime;
    document.getElementById('last-refresh-time').textContent = formattedTime;
}
setInterval(updateDateTime, 1000);
updateDateTime();

// Delivery status update
function updateDeliveryStatus(orderId, status){
    fetch(`/admin/orders/update-delivery/${orderId}`,{
        method:"PUT",
        headers:{
            "Content-Type":"application/json",
            "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ delivery_status: status })
    })
    .then(res=>res.json())
    .then(data => {
    if (data.success) {
        showToast(
            "Delivery Status Updated",
            `Order #${orderId} is now marked as "${data.delivery_status}".`
        );
    }
})

    .catch(err=>console.error("Error:",err));
}
function setDeliveryColor(selectElement) {
    selectElement.classList.remove(
        "bg-green-100", "text-green-700",
        "bg-yellow-100", "text-yellow-700",
        "bg-blue-100", "text-blue-700"
    );

    switch (selectElement.value) {
        case "Pending Delivery":
            selectElement.classList.add("bg-yellow-100", "text-yellow-700");
            break;
        case "Out for Delivery":
            selectElement.classList.add("bg-blue-100", "text-blue-700");
            break;
        case "Completed":
            selectElement.classList.add("bg-green-100", "text-green-700");
            break;
    }
}
document.addEventListener("DOMContentLoaded", () => {
    // Apply delivery status colors
    const selects = document.querySelectorAll('select[id^="delivery-select-"]');
    selects.forEach(select => setDeliveryColor(select));
});


// Pagination
document.addEventListener("DOMContentLoaded",()=>{
    const tbody = document.querySelector("#ordersTable tbody");
    let rows = Array.from(tbody.querySelectorAll("tr"));
    const ITEMS_PER_PAGE = 10;
    let currentPage = 1;
    const prevBtn = document.getElementById("prevPage");
    const nextBtn = document.getElementById("nextPage");
    const pageIndicator = document.getElementById("pageIndicator");
    function renderPage(){
        const totalPages = Math.ceil(rows.length/ITEMS_PER_PAGE)||1;
        rows.forEach(row=>row.style.display="none");
        const start=(currentPage-1)*ITEMS_PER_PAGE;
        const end=start+ITEMS_PER_PAGE;
        rows.slice(start,end).forEach((row,i)=>{ row.style.display=""; row.cells[0].textContent=start+i+1; });
        pageIndicator.textContent=`Page ${currentPage} of ${totalPages}`;
        prevBtn.disabled=currentPage===1;
        nextBtn.disabled=currentPage===totalPages;
    }
    prevBtn.addEventListener("click",()=>{ if(currentPage>1){ currentPage--; renderPage(); } });
    nextBtn.addEventListener("click",()=>{ if(currentPage<Math.ceil(rows.length/ITEMS_PER_PAGE)){ currentPage++; renderPage(); } });
    renderPage();
});
</script>
<script>
async function fetchLiveOrders() {
    try {
        const response = await fetch("{{ route('admin.orders.live') }}");
        const data = await response.json();

        // --- Update Dashboard Cards ---
        document.querySelector('#pendingDeliveryCard').textContent = data.pendingDelivery;
        document.querySelector('#outForDeliveryCard').textContent = data.outForDelivery;
        document.querySelector('#completedDeliveryCard').textContent = data.completedDelivery;

        // --- Update Orders Table ---
        const tbody = document.querySelector("#ordersTable tbody");
        tbody.innerHTML = ""; // Clear current rows

        data.orders.forEach((order, index) => {
            const tr = document.createElement("tr");
            tr.className = "table-row-hover transition-all duration-200 hover:bg-green-50";

            tr.innerHTML = `
                <td class="px-6 py-3 text-center text-sm font-semibold text-earth">${index+1}</td>
                <td class="px-6 py-3 text-sm font-medium text-gray-700">${order.order_number}</td>
                <td class="px-6 py-3 text-sm">
                    <div class="font-semibold text-gray-800">${order.first_name} ${order.last_name}</div>
                    <div class="text-xs text-gray-500">${order.email}</div>
                </td>
                <td class="px-6 py-3 text-sm font-medium text-leaf text-center">RM ${parseFloat(order.total).toFixed(2)}</td>
                <td class="px-6 py-3 text-center">
                    <span class="px-3 py-1 inline-flex text-xs font-semibold rounded-full bg-terra/20 text-terra">${order.payment_method}</span>
                </td>
                <td class="px-6 py-3 text-sm text-gray-600">${order.address_1}, ${order.city}, ${order.state} ${order.zip}</td>
                <td class="px-6 py-3 text-center">
                    <select 
                        onchange="setDeliveryColor(this); updateDeliveryStatus(${order.id}, this.value);" 
                        id="delivery-select-${order.id}" 
                        class="px-3 py-1 rounded-full border text-sm font-medium">
                        <option value="Pending Delivery" ${order.delivery_status=='Pending Delivery'?'selected':''}>Pending Delivery</option>
                        <option value="Out for Delivery" ${order.delivery_status=='Out for Delivery'?'selected':''}>Out for Delivery</option>
                        <option value="Completed" ${order.delivery_status=='Completed'?'selected':''}>Completed</option>
                    </select>
                </td>
                <td class="px-6 py-3 text-center text-sm space-x-2">
                    <a href="/admin/orders/invoice/${order.id}" class="text-leaf hover:text-earth transition">
                        <i class="fa-solid fa-file-invoice"></i>
                    </a>
                </td>
            `;
            tbody.appendChild(tr);

            // Apply color for delivery select
            const selectEl = tr.querySelector('select');
            setDeliveryColor(selectEl);
        });

    } catch (error) {
        console.error('Error fetching live orders:', error);
    }
}

// Fetch every 10 seconds (safe interval)
setInterval(fetchLiveOrders, 10000);
fetchLiveOrders(); // initial load
</script>
<script>
function showToast(title, message) {
    const toast = document.getElementById('toast');
    document.getElementById('toast-title').textContent = title;
    document.getElementById('toast-message').textContent = message;

    toast.classList.remove('hidden');
    toast.classList.add('animate-fade-in');

    setTimeout(() => {
        hideToast();
    }, 3000);
}

function hideToast() {
    const toast = document.getElementById('toast');
    toast.classList.add('hidden');
}
</script>

</body>
</html>
