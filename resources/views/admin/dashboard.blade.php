<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<script src="https://cdn.tailwindcss.com"></script>

<style>
    /* VARIABLES */
    :root {
        --color-accent: #3A7340; /* Deep Professional Green */
        --color-primary-text: #1F2937;
        --color-secondary-text: #6B7280;
        --color-background-light: #F9FAFB;
        --color-sidebar-bg: #FFFFFF;
        --color-sidebar-hover: #ECFDF5; /* Very light green */
    }

    body {
        margin: 0;
        font-family: 'Inter', sans-serif; /* Modern, clean font */
        background: var(--color-background-light);
        display: flex;
        overflow-x: hidden;
    }

    /* ---------------------------------- */
    /* 1. SIDEBAR STYLES */
    /* ---------------------------------- */
    .sidebar {
        width: 260px; /* Slightly wider */
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
    .sidebar.hidden {
        transform: translateX(-100%);
    }
    .sidebar::-webkit-scrollbar { width: 4px; }
    .sidebar::-webkit-scrollbar-thumb { background-color: #D1D5DB; border-radius: 10px; }

   .sidebar-header {
    text-align: center;
    padding: 40px 10px 30px; /* Added more top padding */
    border-bottom: 1px solid #F3F4F6;
    display: flex;
    flex-direction: column;
    align-items: center; /* Center horizontally */
}

.sidebar-logo {
    width: 80px;       /* Bigger size */
    height: 80px;      /* Bigger size */
    object-fit: contain;
    border-radius: 50%;
    margin-bottom: 12px;
    box-shadow: 0 0 0 3px var(--color-accent), 0 2px 5px rgba(0,0,0,0.1);
}
.sidebar-header h2 {
    font-size: 20px;   /* Slightly bigger */
    font-weight: 700;
    color: var(--color-primary-text);
    letter-spacing: 2px;
    text-transform: uppercase;
}


    .menu { padding: 15px 15px; }
    .menu a,
    .menu .dropdown-toggle {
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

    .menu a i,
    .menu .dropdown-toggle i {
        margin-right: 10px;
        width: 18px;
        color: var(--color-secondary-text); /* Icon color */
        transition: color 0.2s ease;
    }

    /* Hover and Active States */
    .menu a:hover,
    .menu .dropdown-toggle:hover { 
        background: var(--color-sidebar-hover); 
        color: var(--color-accent);
    }
    .menu a:hover i,
    .menu .dropdown-toggle:hover i {
        color: var(--color-accent);
    }

    .menu a.active,
    .menu a.active i {
        background: var(--color-accent);
        color: #ffffff !important;
        font-weight: 600;
        box-shadow: 0 4px 8px rgba(58, 115, 64, 0.2);
    }
    .menu a.active:hover {
        background: #306037;
    }

    /* Dropdown Specifics (must work with existing JS) */
    .dropdown-menu { 
        display: none; 
        flex-direction: column; 
        padding-left: 10px;
        background: #F9FAFB; /* Submenu background */
        border-radius: 6px;
        margin-top: 2px;
        margin-bottom: 4px;
        border-left: 3px solid #E5E7EB;
    }
    .dropdown-menu a { 
        padding: 8px 12px 8px 25px; /* Indentation for submenu items */
        font-size: 14px; 
        color: var(--color-secondary-text); 
    }
    .dropdown-menu a:hover {
        color: var(--color-accent);
        background: #F3F4F6;
    }
    
    .dropdown-toggle.active + .dropdown-menu { display: flex; }
    .dropdown-toggle span.arrow { 
        transition: transform 0.3s ease; 
        font-size: 1.2em;
        font-weight: 400;
        color: var(--color-secondary-text);
    }
    .dropdown-toggle.active span.arrow { transform: rotate(90deg); }


    /* Logout Button Styling */
    .logout-btn {
        width: 100%;
        margin-top: 15px;
        padding: 10px 12px;
        background: #FEE2E2;
        border: none;
        color: #B91C1C; /* Red for logout action */
        font-weight: 600;
        border-radius: 8px;
        cursor: pointer;
        text-align: left;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }
    .logout-btn:hover { 
        background: #B91C1C; 
        color: #fff; 
        box-shadow: 0 4px 8px rgba(185, 28, 28, 0.3);
    }
    .logout-btn i {
        margin-right: 10px;
        color: #B91C1C;
    }
    .logout-btn:hover i {
        color: #fff;
    }


    /* ---------------------------------- */
    /* 2. TOP CONTROLS STYLES */
    /* ---------------------------------- */
    .main {
        margin-left: 260px; /* Match new sidebar width */
        padding: 84px 40px 40px; /* Adjusted padding to accommodate fixed top bar */
        width: calc(100% - 260px);
        transition: all 0.35s ease;
    }
    .sidebar.hidden ~ .main {
        margin-left: 0;
        width: 100%;
        padding-top: 84px;
    }

    .top-controls {
        position: fixed;
        top: 0;
        left: 260px; /* Match new sidebar width */
        right: 0;
        height: 64px;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        z-index: 1000;
        transition: left 0.35s ease;
        border-bottom: 1px solid #F3F4F6;
    }
    .sidebar.hidden ~ .top-controls { left: 0; }

    .toggle-btn, .calendar-btn {
        background: none;
        color: var(--color-primary-text);
        border: none;
        padding: 8px 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 18px;
        transition: 0.3s;
    }
    .toggle-btn:hover, .calendar-btn:hover { 
        background: #F3F4F6; 
        color: var(--color-accent);
    }
    .calendar-btn {
        display: flex;
        align-items: center;
        font-size: 15px;
        font-weight: 600;
    }
    .calendar-btn i { margin-right: 8px; font-size: 16px; }

    .live-date-time { 
        font-size: 15px; 
        font-weight: 500; 
        color: var(--color-secondary-text); 
        padding: 8px 12px;
        border: 1px solid #E5E7EB;
        border-radius: 6px;
    }

    .calendar-container { position: relative; }
    .calendar-popup {
        position: absolute;
        top: 40px;
        right: 0;
        width: 280px;
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        display: none;
        text-align: center;
        font-size: 14px;
        color: var(--color-primary-text);
        border: 1px solid #E5E7EB;
    }
    .calendar-popup h3 { margin: 0 0 10px; font-size: 18px; font-weight: 700; color: var(--color-accent); }
    .calendar-popup p { margin: 6px 0; font-size: 16px; }
    .last-refresh { margin-top: 15px; padding-top: 10px; border-top: 1px solid #F3F4F6; font-size: 12px; color: #9CA3AF; }
    .calendar-popup.open { display: block; }

    /* ---------------------------------- */
    /* 3. MAIN CONTENT STYLES */
    /* ---------------------------------- */
    .main h1 { 
        font-size: 24px; 
        font-weight: 700; 
        color: var(--color-primary-text); 
        border-bottom: 2px solid #E5E7EB; 
        padding-bottom: 15px; 
        margin-bottom: 30px; 
        letter-spacing: 0.5px;
    }
    .overview { display: grid; grid-template-columns: repeat(auto-fit, minmax(240px, 1fr)); gap: 25px; }
    .card { 
        background: #fff; 
        border-radius: 12px; 
        padding: 24px; 
        box-shadow: 0 6px 15px rgba(0,0,0,0.06); 
        transition: transform 0.2s, box-shadow 0.2s; 
        border: 1px solid #F3F4F6;
    }
    .card:hover { 
        transform: translateY(-5px); 
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .card h3 { 
        font-size: 14px; 
        color: var(--color-secondary-text); 
        font-weight: 600; 
        text-transform: uppercase;
        margin-bottom: 4px;
    }
    .card p { 
        font-size: 32px; 
        font-weight: 700; 
        color: var(--color-accent); 
        margin-top: 10px; 
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .sidebar { width: 220px; }
        .main { margin-left: 0; padding: 74px 20px 20px; width: 100%; }
        .top-controls { left: 0; }
        .toggle-btn { display: block; }
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
        <a href="#" class="active">
            <i class="fa-solid fa-house"></i> Dashboard
        </a>
        

        <!-- Products Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-box-open"></i> Products
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
                <a href="{{ route('admin.plants.index') }}">List Products</a>
                <a href="{{ route('admin.plants.create') }}">Add Product</a>
            </div>
        </div>

        <!-- Orders Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-cart-shopping"></i> Orders
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.orders.index') }}">All Orders</a>
            </div>
        </div>

        <!-- FAQ Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-circle-question"></i> FAQ
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
                <a href="{{ route('admin.faq.index') }}">List FAQ</a>
                <a href="{{ route('admin.faq.create') }}">Add New FAQ</a>
            </div>
        </div>

        <!-- Customers Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-users"></i> Customers
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
                <a href="{{ route('admin.customers.index') }}">List Customers</a>
            </div>
        </div>

        <!-- Admins Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-user-lock"></i> Admins
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
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
        <!-- Settings Dropdown -->
        <div class="dropdown">
            <div class="dropdown-toggle">
                <div style="display: flex; align-items: center;">
                    <i class="fa-solid fa-gear"></i> Settings
                </div>
                <span class="arrow">▸</span>
            </div>
            <div class="dropdown-menu">
                <!-- ROUTES PRESERVED -->
                <a href="{{ route('admin.settings') }}">General Settings</a>
                <form action="{{ route('admin.logout') }}" method="POST" style="display:block;">
                    <!-- @csrf placeholder preserved -->
                    @csrf
                    <button type="submit" class="logout-btn">
                         <i class="fa-solid fa-right-from-bracket"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Top Controls -->
<div class="top-controls">
    <button class="toggle-btn" onclick="toggleSidebar()">
        <i class="fa-solid fa-bars"></i>
    </button>
    <div class="live-date-time" id="live-time-date">Loading...</div>
    <div class="calendar-container">
        <button class="calendar-btn" onclick="toggleCalendar()">
             <i class="fa-solid fa-calendar-days"></i> Today
        </button>
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
<h1 class="text-4xl font-bold text-gray-800" style="font-family: 'Playfair Display', serif; background: linear-gradient(90deg, #000000ff, #059669); -webkit-background-clip: text; color: transparent;">
    OVERVIEW OF THE DASHBOARD ADMIN
</h1>    <div class="overview">
  <div class="overview grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-6">

    <!-- Total Orders -->
    <div class="bg-pink-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Orders</h3>
            <p class="mt-2 text-2xl font-bold text-gray-900">{{ $totalOrders }}</p>
        </div>
    </div>

    <!-- Total Customers -->
    <div class="bg-purple-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
        <div>
            <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Customers</h3>
            <p class="mt-2 text-2xl font-bold text-gray-900">{{ $totalCustomers }}</p>
        </div>
    </div>

    <!-- Pending Delivery -->
    <div class="bg-yellow-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
        <div>
            <h3 class="text-sm font-semibold text-yellow-700 uppercase">Pending Delivery</h3>
            <p id="pendingDeliveryCard" class="mt-2 text-2xl font-bold text-yellow-800">{{ $pendingDelivery }}</p>
        </div>
    </div>

    <!-- Out for Delivery -->
    <div class="bg-blue-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
        <div>
            <h3 class="text-sm font-semibold text-blue-700 uppercase">Out for Delivery</h3>
            <p id="outForDeliveryCard" class="mt-2 text-2xl font-bold text-blue-800">{{ $outForDelivery }}</p>
        </div>
    </div>

    <!-- Completed Delivery -->
    <div class="bg-green-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
        <div>
            <h3 class="text-sm font-semibold text-green-700 uppercase">Completed</h3>
            <p id="completedDeliveryCard" class="mt-2 text-2xl font-bold text-green-800">{{ $completedDelivery }}</p>
        </div>
    </div>

    <!-- Total Revenue -->
<div class="bg-red-50 shadow-lg rounded-2xl p-6 flex items-center justify-between hover:shadow-xl transition">
    <div>
        <h3 class="text-sm font-semibold text-gray-500 uppercase">Total Revenue</h3>
        <p class="mt-2 text-xl font-bold text-gray-900 flex items-center gap-1">
            <span>RM {{ number_format($totalRevenue, 2) }}</span>
        </p>
    </div>
</div>
</div>
</div>
@php
use App\Models\ReorderHistory;
use App\Models\Order;
use App\Models\Customer;
use Carbon\Carbon;

// 1️⃣ Monthly Reorder Activity (Bar)
$reorderByMonth = ReorderHistory::selectRaw("
        DATE_FORMAT(reorder_date, '%b %Y') as month,
        COUNT(*) as total
    ")
    ->groupBy('month')
    ->orderByRaw("MIN(reorder_date)")
    ->pluck('total', 'month')
    ->toArray();

// 2️⃣ Monthly Orders (Bar)
$ordersByMonth = Order::selectRaw("
        DATE_FORMAT(created_at, '%b %Y') as month,
        COUNT(*) as total
    ")
    ->groupBy('month')
    ->orderByRaw("MIN(created_at)")
    ->pluck('total', 'month')
    ->toArray();

// 3️⃣ Monthly Revenue (Histogram)
$revenueByMonth = Order::selectRaw("
        DATE_FORMAT(created_at, '%b %Y') as month,
        SUM(total) as total
    ")
    ->groupBy('month')
    ->orderByRaw("MIN(created_at)")
    ->pluck('total', 'month')
    ->toArray();
@endphp

<!-- Dashboard Charts Section -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6 font-sans">

   <!-- 1️⃣ Monthly Reorder Activity -->
   <div class="bg-white rounded-lg shadow-sm p-5 border-t-4 border-purple-500">
       <div class="flex items-center gap-2 mb-2">
           <!-- Animated Video Icon -->
           <video autoplay loop muted class="w-6 h-6 rounded-full">
               <source src="https://cdn-icons-mp4.flaticon.com/512/14183/14183424.mp4" type="video/mp4">
           </video>

           <h3 class="text-sm font-medium tracking-wide text-purple-700 uppercase">
               Monthly Reorder Activity
           </h3>
       </div>

       <canvas id="reorderChart" class="w-full h-36"></canvas>
       <p class="text-xs tracking-wide text-gray-400 mt-2 text-center">
           Reorders per month
       </p>
   </div>

   <!-- 2️⃣ Total Orders -->
   <div class="bg-white rounded-lg shadow-sm p-5 border-t-4 border-pink-500">
       <div class="flex items-center gap-2 mb-2">
           <!-- Animated Video Icon -->
           <video autoplay loop muted class="w-6 h-6 rounded-full">
               <source src="https://cdn-icons-mp4.flaticon.com/512/15575/15575664.mp4" type="video/mp4">
           </video>

           <h3 class="text-sm font-medium tracking-wide text-pink-700 uppercase">
               Total Orders
           </h3>
       </div>

       <canvas id="ordersChart" class="w-full h-36"></canvas>
       <p class="text-xs tracking-wide text-gray-400 mt-2 text-center">
           Orders per month
       </p>
   </div>

   <!-- 3️⃣ Monthly Revenue -->
   <div class="bg-white rounded-lg shadow-sm p-5 border-t-4 border-red-500">
       <div class="flex items-center gap-2 mb-2">
           <!-- Animated Video Icon -->
           <video autoplay loop muted class="w-6 h-6 rounded-full">
               <source src="https://cdn-icons-mp4.flaticon.com/512/19028/19028862.mp4" type="video/mp4">
           </video>

           <h3 class="text-sm font-medium tracking-wide text-red-700 uppercase">
               Monthly Revenue
           </h3>
       </div>

       <canvas id="revenueChart" class="w-full h-36"></canvas>
       <p class="text-xs tracking-wide text-gray-400 mt-2 text-center">
           Revenue generated per month (RM)
       </p>
   </div>

</div>


<!-- Charts JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // 1️⃣ Reorder Activity Bar
    const reorderCtx = document.getElementById('reorderChart').getContext('2d');
    const reorderGradient = reorderCtx.createLinearGradient(0,0,0,reorderCtx.canvas.height);
    reorderGradient.addColorStop(0,'#6366F1');
    reorderGradient.addColorStop(1,'#4F46E5');

    new Chart(reorderCtx, {
        type:'bar',
        data:{
            labels: @json(array_keys($reorderByMonth)),
            datasets:[{
                label:'Total Reorders',
                data:@json(array_values($reorderByMonth)),
                backgroundColor: reorderGradient,
                borderRadius: 8,
                maxBarThickness: 30
            }]
        },
        options:{ responsive:true, plugins:{ legend:{ display:false } } }
    });

    // 2️⃣ Total Orders (LINE)
    const ordersCtx = document.getElementById('ordersChart').getContext('2d');
    new Chart(ordersCtx,{
        type:'line',
        data:{
            labels:@json(array_keys($ordersByMonth)),
            datasets:[{
                label:'Orders',
                data:@json(array_values($ordersByMonth)),
                borderColor:'#EC4899',
                backgroundColor:'rgba(236,72,153,0.15)',
                fill:true,
                tension:0.35,
                pointRadius:4,
                pointHoverRadius:6,
                pointBackgroundColor:'#BE185D'
            }]
        },
        options:{
            responsive:true,
            plugins:{ legend:{ display:false } },
            scales:{ y:{ beginAtZero:true, ticks:{ stepSize:50 } } }
        }
    });

    // 3️⃣ Monthly Revenue (HISTOGRAM)
    const revenueCtx = document.getElementById('revenueChart').getContext('2d');
    new Chart(revenueCtx,{
        type:'bar',
        data:{
            labels:@json(array_keys($revenueByMonth)),
            datasets:[{
                label:'Revenue (RM)',
                data:@json(array_values($revenueByMonth)),
                backgroundColor:'#F87171',
                hoverBackgroundColor:'#EF4444',
                borderRadius:6,
                maxBarThickness:25
            }]
        },
        options:{
            responsive:true,
            plugins:{
                legend:{ display:false },
                tooltip:{
                    callbacks:{
                        label: ctx => 'RM ' + ctx.parsed.y.toLocaleString(undefined,{minimumFractionDigits:2})
                    }
                }
            },
            scales:{
                y:{
                    beginAtZero:true,
                    title:{ display:true, text:'RM', color:'#6B7280', font:{size:12, weight:'500'} },
                    ticks:{ callback:value => 'RM ' + value },
                    grid:{ color:'#F3F4F6', drawBorder:false }
                },
                x:{
                    grid:{ display:false },
                    ticks:{ color:'#6B7280', font:{size:12, weight:'500'} }
                }
            }
        }
    });

});
</script>


<!-- 🌿 Low Stock Product Section -->
<div class="mt-8">

<!-- Display success message -->
@if(session('success'))
    <div id="success-alert" 
         class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow-md mb-6 animate-fade-in">
        <strong>Success!</strong> {{ session('success') }}
    </div>

    <script>
        // Wait 3 seconds (3000ms) then fade out
        setTimeout(function() {
            const alert = document.getElementById('success-alert');
            if(alert) {
                alert.style.transition = 'opacity 0.5s ease-out';
                alert.style.opacity = '0';
                setTimeout(() => alert.remove(), 500); // remove from DOM after fade
            }
        }, 3000);
    </script>
@endif

<h1 class="text-4xl font-bold text-gray-800 flex items-center gap-3" 
    style="font-family: 'Playfair Display', serif; background: linear-gradient(90deg, #000000ff, #059669); -webkit-background-clip: text; color: transparent;">
    LOW PRODUCTS STOCK MONITOR :
    @if($lowStockCount > 0)
<span 
    id="lowStockAlert"
    class="ml-3 inline-block px-4 py-2 rounded-full bg-red-700 text-white font-bold text-sm animate-pulse shadow-lg cursor-pointer">
    ⚠ {{ $lowStockCount }} products are running low! Check inventory immediately.
</span>
@endif
</h1>

<script>
document.addEventListener('DOMContentLoaded', () => {
    @if($lowStockCount > 0)
    const beep = new Audio("https://actions.google.com/sounds/v1/alarms/beep_short.ogg");
    beep.loop = true;
    let alertTriggered = false;

    const alertEl = document.getElementById('lowStockAlert');

    const speakAlert = () => {
        if ('speechSynthesis' in window && !alertTriggered) {
            const msg = new SpeechSynthesisUtterance("{{ $lowStockCount }} products are running low! Check inventory immediately.");
            msg.lang = "en-US";

            // Try to use a female voice
            const voices = window.speechSynthesis.getVoices();
            const femaleVoice = voices.find(v => v.name.toLowerCase().includes('female') || v.name.toLowerCase().includes('zira') || v.name.toLowerCase().includes('susan'));
            if(femaleVoice) msg.voice = femaleVoice;

            window.speechSynthesis.speak(msg);
            alertTriggered = true;
        }
    };

    const startBeep = () => {
        beep.play().catch(() => {
            // If autoplay blocked, wait for first user interaction
            document.body.addEventListener('click', () => beep.play().catch(()=>{}), { once: true });
        });

        // Stop beep after 10 seconds
        setTimeout(() => {
            beep.pause();
            beep.currentTime = 0;
        }, 10000);
    };

    const triggerAlert = () => {
        speakAlert();
        startBeep();
    };

    // Trigger immediately on page load
    triggerAlert();

    // Badge click triggers voice again if needed
    alertEl.addEventListener('click', triggerAlert);
    @endif
});
</script>





<div class="overflow-x-auto rounded-2xl shadow-xl border border-gray-200 bg-white">
    <table class="min-w-full text-sm text-gray-700 border-collapse">

        <!-- Table Head -->
        <thead class="bg-gradient-to-r from-[#0F3D2E] to-[#145A32] text-white">
            <tr>
                 <th class="px-6 py-4 text-center font-semibold uppercase tracking-wider border-r border-white/20">
                     No.
                </th>
                <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider border-r border-white/20">
                    Product Name
                </th>
                <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider border-r border-white/20">
                    Category
                </th>
                <th class="px-6 py-4 text-center font-semibold uppercase tracking-wider border-r border-white/20">
                    Stock
                </th>
                <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider border-r border-white/20">
                    Stock Status
                </th>
                <th class="px-6 py-4 text-center font-semibold uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>

        <!-- Table Body -->
        <tbody class="divide-y divide-gray-200">
            @forelse($lowStockPlants as $plant)
            <tr class="group hover:bg-gray-50 transition-all duration-200">

             <!-- Number Column -->
                <td class="px-6 py-5 text-center font-semibold text-gray-600 border-r border-gray-100">
                    {{ $loop->iteration }}
                 </td>

                <td class="px-6 py-5 font-medium text-gray-900 border-r border-gray-100">
                    {{ $plant->name }}
                </td>

                <td class="px-6 py-5 font-medium text-gray-900 border-r border-gray-100">
                    {{ $plant->category }}
                </td>

                <td class="px-6 py-5 text-center font-semibold text-gray-800 border-r border-gray-100">
                    {{ $plant->stock_quantity }}
                </td>

                <td class="px-6 py-5 border-r border-gray-100">
                    <span class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full
                        bg-red-100 text-red-700 text-xs font-semibold">
                        <i class="fa-solid fa-triangle-exclamation"></i>
                        Low Stock
                    </span>
                </td>

                <td class="px-6 py-5 text-center">
                    <button
                        class="reorder-btn px-5 py-2 rounded-full font-semibold text-sm
                               bg-gradient-to-r from-amber-500 to-yellow-500
                               text-white shadow-md hover:shadow-lg
                               hover:from-amber-600 hover:to-yellow-600
                               transition-all duration-200"
                        data-id="{{ $plant->id }}">
                        Confirm Reorder
                    </button>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="px-6 py-12 text-center text-gray-400 italic">
                    All products are sufficiently stocked. No action required.
                </td>
            </tr>
            @endforelse
        </tbody>

    </table>
</div>


<!-- Include Moment.js for date formatting -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

<!-- Reorder Modal -->
<div id="reorderModal"
     class="fixed inset-0 bg-black/60 backdrop-blur-sm hidden
            flex items-center justify-center z-50">

    <div class="bg-white rounded-2xl w-full max-w-lg p-8 relative shadow-2xl">

        <!-- Header -->
        <div class="flex items-center justify-between mb-6 border-b pb-4">
            <h2 class="text-2xl font-bold text-gray-900 tracking-wide">
                Reorder Product
            </h2>
            <button id="closeModal"
                    class="text-gray-400 hover:text-gray-600 transition">
                <i class="fa-solid fa-xmark text-xl"></i>
            </button>
        </div>

        <form id="reorderForm" method="POST" class="space-y-4">
            @csrf

            <input type="hidden" name="plant_id" id="plant_id">
            <input type="hidden" name="supplier" id="supplier_hidden">
            <input type="hidden" name="delivery_date" id="delivery_date_hidden">

            <!-- Field -->
            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                    Product Name
                </label>
                <input id="product_name" readonly
                       class="w-full px-4 py-2.5 bg-gray-100 rounded-lg
                              text-gray-800 font-medium cursor-not-allowed">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                        Current Stock
                    </label>
                    <input id="current_stock" readonly
                           class="w-full px-4 py-2.5 bg-gray-100 rounded-lg
                                  text-gray-800 font-semibold text-center">
                </div>

                <div>
                    <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                        EOQ Quantity
                    </label>
                    <input id="reorder_qty" readonly
                           class="w-full px-4 py-2.5 bg-gray-100 rounded-lg
                                  text-gray-900 font-bold text-center">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                    Supplier
                </label>
                <input id="supplier_name" readonly
                       class="w-full px-4 py-2.5 bg-gray-100 rounded-lg
                              text-gray-800">
            </div>

            <div>
                <label class="block text-xs font-semibold text-gray-500 uppercase mb-1">
                    Expected Delivery (Days)
                </label>
                <input id="delivery_time" readonly
                       class="w-full px-4 py-2.5 bg-gray-100 rounded-lg
                              text-gray-800 text-center">
            </div>

            <!-- Footer -->
            <div class="flex justify-end gap-3 pt-6 border-t mt-6">
                <button type="submit"
                        class="px-6 py-2.5 rounded-full
                               bg-gradient-to-r from-green-600 to-green-700
                               text-white font-semibold
                               hover:from-green-700 hover:to-green-800
                               shadow-lg transition">
                    Confirm Reorder
                </button>
            </div>
        </form>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const reorderBtns = document.querySelectorAll('.reorder-btn');
    const modal = document.getElementById('reorderModal');
    const closeModal = document.getElementById('closeModal');

    reorderBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const plantId = this.dataset.id;

            fetch(`/admin/reorder-data/${plantId}`)
                .then(res => res.json())
                .then(data => {
                    console.log("Fetched data:", data);

                    document.getElementById('plant_id').value = plantId;
                    document.getElementById('product_name').value = data.name;
                    document.getElementById('current_stock').value = data.stock;
                    document.getElementById('reorder_qty').value = data.eoq;
                    document.getElementById('supplier_name').value = data.supplier_name;
                    document.getElementById('supplier_hidden').value = data.supplier_name;
                    document.getElementById('delivery_time').value = data.delivery_time;

                    let expectedDate = new Date();
                    expectedDate.setDate(expectedDate.getDate() + parseInt(data.delivery_time));
                    document.getElementById('delivery_date_hidden').value = expectedDate.toISOString().slice(0,10);

                    document.getElementById('reorderForm').action = `/admin/reorder/${plantId}`;
                    modal.classList.remove('hidden');
                })
                .catch(err => console.error("Fetch error:", err));
        });
    });

    closeModal.addEventListener('click', () => modal.classList.add('hidden'));
});
</script>

<BR>
<!-- 🌿 Most Purchased Products Section -->
<!-- Refined H1 with a premium editorial feel -->
<div class="mb-12">
    <span class="text-[14px] uppercase tracking-[0.5em] text-[#B8860B] font-bold mb-3 block">Premium Collection</span>
   <h1 class="text-4xl md:text-5xl font-light tracking-tight text-gray-900 flex items-center gap-4"
    style="font-family: 'Playfair Display', serif;">
        TOP BEST SELLING PRODUCTS
    </h1>
    <div class="h-px w-20 bg-[#B8860B] mt-4"></div>
</div>

<!-- TOP BEST-SELLING Section -->
<div class="mt-4 w-full">
    <!-- Sophisticated Architectural Container -->
    <div class="relative bg-[#FCFBFA] rounded-[3rem] p-8 sm:p-14 overflow-hidden border border-gray-100 shadow-[0_30px_80px_rgba(0,0,0,0.02)]">
        
        <!-- Decorative subtle pattern/glow -->
        <div class="absolute -top-24 -right-24 w-96 h-96 bg-[#064E3B]/5 rounded-full blur-[100px]"></div>

        <!-- Header: Elegant and balanced -->
        <div class="relative z-10 flex flex-col md:flex-row justify-between items-start md:items-end mb-16 w-full gap-6">
            <div class="flex flex-col gap-2">
                <h2 class="text-3xl md:text-4xl font-serif text-gray-900 tracking-tight leading-tight">
                    The Season's Favorites
                </h2>
                <p class="text-base text-gray-400 font-light tracking-wide">
                    Lifestyle essentials for every space.                
                </p>
            </div>
            <div class="h-px flex-grow mx-8 bg-gray-100 hidden md:block mb-4"></div>
        </div>

        <!-- Plants Grid (Structure preserved as requested) -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 w-full relative z-10">
            @foreach($mostPurchased as $plant)
            <div class="group relative flex flex-col h-full transition-all duration-700">
                
                <!-- Product Image: Elevated "Floating" style -->
                <div class="relative w-full aspect-[4/5] mb-8 flex items-center justify-center overflow-hidden rounded-[2.5rem] bg-white shadow-[0_10px_30px_rgba(0,0,0,0.03)] group-hover:shadow-[0_25px_50px_rgba(6,78,59,0.1)] transition-all duration-700">
                    <!-- Luxury Badge -->
                    <div class="absolute top-6 left-6 z-20">
                        <span class="text-[9px] font-bold text-[#B8860B] uppercase tracking-[0.3em] bg-white/80 backdrop-blur-md px-3 py-1.5 rounded-full border border-[#B8860B]/20">Best Seller</span>
                    </div>

                    <!-- Plant Image -->
                    <img src="{{ asset('storage/' . ($plant->image ?? 'default.png')) }}" 
                         alt="{{ $plant->plant_name }}" 
                         class="w-3/4 h-3/4 object-contain transition-all duration-1000 group-hover:scale-110 group-hover:-rotate-2">
                    
                    <!-- Hover Overlay Detail -->
                    <div class="absolute inset-0 border-[1px] border-transparent group-hover:border-[#064E3B]/10 rounded-[2.5rem] transition-all duration-700"></div>
                </div>

                <!-- Plant Info: High-End Typography -->
                <div class="flex flex-col flex-grow text-left px-2">
                    <span class="text-[10px] text-[#B8860B] font-bold uppercase tracking-[0.2em] mb-2">Botanical Archive</span>
                    
                    <h3 class="text-xl font-serif text-gray-900 tracking-tight mb-3 group-hover:text-[#064E3B] transition-colors duration-300">
                        {{ $plant->plant_name }}
                    </h3>
                    
                    <div class="mt-auto flex items-end justify-between border-b border-gray-50 pb-4">
                        <div class="flex flex-col">
                            <span class="text-[9px] text-gray-400 uppercase tracking-widest mb-1">Price</span>
                            <p class="text-gray-900 font-medium text-lg">RM {{ number_format($plant->price, 2) }}</p>
                        </div>
                        
                        <!-- Elegant "Details" Circle -->
                        <div class="w-10 h-10 rounded-full border border-gray-100 flex items-center justify-center group-hover:bg-[#064E3B] group-hover:border-[#064E3B] transition-all duration-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                            </svg>
                        </div>
                    </div>

                    <!-- Sophisticated Status Bar -->
                    <div class="mt-4 flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full bg-[#B8860B]"></div>
                            <span class="text-[10px] text-gray-400 font-medium uppercase tracking-[0.15em]">{{ $plant->total_sold }} Sold</span>
                        </div>
                        <span class="text-[9px] text-emerald-600 font-bold uppercase tracking-tighter">In Stock</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</div>


<script>
    // Sidebar toggle
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("hidden");
    }

    // Dropdown accordion
    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(toggle => {
        toggle.addEventListener('click', () => {
            dropdowns.forEach(other => {
                if (other !== toggle) {
                    other.classList.remove('active');
                    other.nextElementSibling.style.display = 'none';
                }
            });
            toggle.classList.toggle('active');
            const menu = toggle.nextElementSibling;
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        });
    });

    // Calendar toggle
    function toggleCalendar() {
        const popup = document.getElementById("calendar-popup");
        popup.style.display = popup.style.display === "block" ? "none" : "block";
    }

    // Live clock
    function updateDateTime() {
        const now = new Date();
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = now.toLocaleDateString('en-MY', dateOptions);
        const formattedTime = now.toLocaleTimeString('en-MY', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });

        document.getElementById('live-time-date').innerHTML = `${formattedDate} – ${formattedTime}`;
        document.getElementById('full-date-display').textContent = formattedDate;
        document.getElementById('current-time-display').textContent = formattedTime;
        document.getElementById('last-refresh-time').textContent = formattedTime;
    }
    setInterval(updateDateTime, 1000);
    updateDateTime();

    // Delivery select colors
    function setDeliveryColor(selectEl) {
        selectEl.classList.remove(
            "bg-green-100", "text-green-700",
            "bg-yellow-100", "text-yellow-700",
            "bg-blue-100", "text-blue-700"
        );

        switch (selectEl.value) {
            case "Pending Delivery":
                selectEl.classList.add("bg-yellow-100", "text-yellow-700");
                break;
            case "Out for Delivery":
                selectEl.classList.add("bg-blue-100", "text-blue-700");
                break;
            case "Completed":
                selectEl.classList.add("bg-green-100", "text-green-700");
                break;
        }
    }

    // Update delivery status via AJAX
    async function updateDeliveryStatus(orderId, status) {
        try {
            const response = await fetch(`/admin/orders/update-delivery/${orderId}`, {
                method: "PUT",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ delivery_status: status })
            });
            const data = await response.json();
            if (data.success) {
                alert(`Order ${orderId} updated to ${data.delivery_status}`);
            }
        } catch (err) {
            console.error("Error updating delivery status:", err);
        }
    }

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

        // Always newest first
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

            // Apply delivery status colors
            const selectEl = tr.querySelector('select');
            setDeliveryColor(selectEl);
        });

    } catch (error) {
        console.error('Error fetching live orders:', error);
    }
}

// Refresh every 10 seconds
setInterval(fetchLiveOrders, 10000);
fetchLiveOrders(); // Initial load


</script>


</body>
</html>