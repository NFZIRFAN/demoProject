<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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
    .main {
    margin-left: 260px; /* sidebar width */
    padding: 90px 20px 20px;  /* FIX → push content BELOW top bar */
    transition: margin-left 0.3s ease;
}

    /* SIDEBAR */
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
    .menu a i, .menu .dropdown-toggle i {
        margin-right: 10px;
        width: 18px;
        color: var(--color-secondary-text);
        transition: color 0.2s ease;
    }
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

    /* MAIN CONTENT */
    .main {
        margin-left: 260px;
        padding: 84px 40px 40px;
        width: calc(100% - 260px);
        transition: all 0.35s ease;
    }
    .sidebar.hidden ~ .main { margin-left: 0; width: 100%; padding-top: 84px; }

   .top-controls {
    position: fixed;
    top: 0;
    left: 260px;
    width: calc(100% - 260px);  /* ✔ FIX WIDTH */
    height: 64px;
    background: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.04);
    z-index: 1000;
    transition: left 0.35s ease, width 0.35s ease; /* ✔ Smooth open/close */
    border-bottom: 1px solid #F3F4F6;
}

    .sidebar.hidden ~ .top-controls { left: 0; }

    .toggle-btn, .calendar-btn { background: none; border: none; cursor: pointer; font-size: 18px; padding: 8px 12px; border-radius: 8px; transition: 0.3s; }
    .toggle-btn:hover, .calendar-btn:hover { background: #F3F4F6; color: var(--color-accent); }
    .calendar-btn { display: flex; align-items: center; font-size: 15px; font-weight: 600; }
    .calendar-btn i { margin-right: 8px; font-size: 16px; }

    .live-date-time { font-size: 15px; font-weight: 500; color: var(--color-secondary-text); padding: 8px 12px; border: 1px solid #E5E7EB; border-radius: 6px; }
    .calendar-popup { position: absolute; top: 40px; right: 0; width: 280px; background: #fff; border-radius: 12px; padding: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.1); display: none; text-align: center; font-size: 14px; color: var(--color-primary-text); border: 1px solid #E5E7EB; }
    .calendar-popup.open { display: block; }

    @media (max-width: 768px) {
        .sidebar { width: 220px; }
        .main { margin-left: 0; padding: 74px 20px 20px; width: 100%; }
        .top-controls { left: 0; }
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

        <!-- Products -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-box-open"></i> Products</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.plants.index') }}">List Products</a>
                <a href="{{ route('admin.plants.create') }}">Add Product</a>
            </div>
        </div>

        <!-- Orders -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-cart-shopping"></i> Orders</div><span class="arrow">▸</span></div>
             <div class="dropdown-menu">
        <a href="{{ route('admin.orders.index') }}">All Orders</a>
    </div>
        </div>

        <!-- FAQ -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-circle-question"></i> FAQ</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.faq.index') }}">List FAQ</a>
                <a href="{{ route('admin.faq.create') }}">Add New FAQ</a>
            </div>
        </div>

        <!-- Customers -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-users"></i> Customers</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.customers.index') }}">List Customers</a>
            </div>
        </div>

        <!-- Admins -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-user-lock"></i> Admins</div><span class="arrow">▸</span></div>
            <div class="dropdown-menu">
                <a href="{{ route('admin.admins.index') }}">List Admins</a>
                <a href="{{ route('admin.admins.create') }}">Add Admin</a>
            </div>
        </div>

        <!-- Suppliers -->
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
        <!-- Settings -->
        <div class="dropdown">
            <div class="dropdown-toggle"><div style="display:flex;align-items:center;"><i class="fa-solid fa-gear"></i> Settings</div><span class="arrow">▸</span></div>
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
    <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<div class="flex items-center gap-3">
    <h1 class="text-4xl font-bold text-gray-800" 
        style="font-family: 'Playfair Display', serif; 
               background: linear-gradient(90deg, #000000ff, #059605ff); 
               -webkit-background-clip: text; 
               color: transparent;">
        WELCOME TO ADMIN DASHBOARD
    </h1>
    <!-- Lively Icon Video -->
    <video autoplay loop muted playsinline class="w-12 h-12">
        <source src="https://cdn-icons-mp4.flaticon.com/512/17905/17905666.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>


</div>

<script>
    // Sidebar toggle (Script logic preserved)
    function toggleSidebar() {
        document.getElementById("sidebar").classList.toggle("hidden");
    }

    // Dropdown accordion (Script logic preserved)
    const dropdowns = document.querySelectorAll('.dropdown-toggle');
    dropdowns.forEach(toggle => {
        toggle.addEventListener('click', () => {
            // Close other dropdowns
            dropdowns.forEach(other => {
                if (other !== toggle) {
                    other.classList.remove('active');
                    other.nextElementSibling.style.display = 'none';
                }
            });
            // Toggle current dropdown
            toggle.classList.toggle('active');
            const menu = toggle.nextElementSibling;
            menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
        });
    });

    // Calendar toggle (Script logic preserved)
    function toggleCalendar() {
        document.getElementById('calendar-popup').classList.toggle('open');
    }

    // 🕒 Update both live time and popup clock
    function updateDateTime() {
        const now = new Date();

        // Format for live date-time (with seconds)
        const dateOptions = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        const formattedDate = now.toLocaleDateString('en-MY', dateOptions);
        const formattedTime = now.toLocaleTimeString('en-MY', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });

        // Update live display (top)
        document.getElementById('live-time-date').innerHTML = `${formattedDate} – ${formattedTime}`;

        // Update calendar popup
        document.getElementById('full-date-display').textContent = formattedDate;
        document.getElementById('current-time-display').textContent = formattedTime;

        // Last refresh
        document.getElementById('last-refresh-time').textContent = now.toLocaleTimeString('en-MY', { hour12: true, hour: '2-digit', minute: '2-digit', second: '2-digit' });
    }

    // Calendar toggle
    function toggleCalendar() {
        const popup = document.getElementById("calendar-popup");
        popup.style.display = popup.style.display === "block" ? "none" : "block";
    }

    // Run clock every second
    setInterval(updateDateTime, 1000);
    updateDateTime();
</script>

</body>
</html>
