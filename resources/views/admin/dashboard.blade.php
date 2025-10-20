<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Professional Admin Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
<style>
  body {
    margin: 0;
    font-family: 'Poppins', sans-serif;
    background: #f4f6f9;
    display: flex;
  }

  /* Sidebar */
  .sidebar {
    width: 220px;
    background: #1f1a1a;
    color: #fff;
    height: 100vh;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 25px 15px;
    transition: all 0.3s ease;
    z-index: 100;
  }
  .sidebar.hidden {
    transform: translateX(-100%);
  }
  .sidebar h2 {
    margin: 0 0 30px;
    text-align: center;
    font-size: 22px;
    font-weight: 700;
    letter-spacing: 1px;
  }

  /* Sidebar Menu */
  .menu a, .menu .dropdown-toggle {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 12px 16px;
    margin: 6px 0;
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    font-size: 15px;
    cursor: pointer;
    transition: 0.3s;
  }
  .menu a:hover, .menu .dropdown-toggle:hover, .menu a.active {
    background: #16a085;
  }

  /* Dropdown */
  .dropdown-menu {
    display: none;
    flex-direction: column;
    padding-left: 20px;
    transition: all 0.3s;
  }
  .dropdown-menu a {
    padding: 8px 12px;
    font-size: 14px;
    color: #fff;
    border-radius: 6px;
    transition: background 0.2s;
  }
  .dropdown-menu a:hover {
    background: #16a085;
  }
  .dropdown-toggle span.arrow {
    transition: transform 0.3s;
  }
  .dropdown-toggle.active span.arrow {
    transform: rotate(90deg);
  }

  /* Logout Button */
  .logout-btn {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 12px 20px;
    background: #f8f9fa;
    border: none;
    border-radius: 10px;
    color: #d9534f;
    font-weight: 600;
    font-size: 15px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  .logout-btn:hover {
    background: #d9534f;
    color: #fff;
  }

  /* Main Content */
  .main {
    margin-left: 220px;
    padding: 40px 30px;
    flex: 1;
    transition: margin-left 0.3s ease;
    width: calc(100% - 220px);
  }
  .sidebar.hidden ~ .main {
    margin-left: 20px;
    width: calc(100% - 40px);
  }

  /* Top Controls */
  .top-controls {
    position: fixed;
    top: 15px;
    right: 15px;
    display: flex;
    align-items: center;
    gap: 10px;
    z-index: 200;
  }
  .toggle-btn, .calendar-btn {
    background: #1abc9c;
    border: none;
    color: #fff;
    font-size: 18px;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 6px;
    transition: 0.3s;
  }
  .toggle-btn:hover, .calendar-btn:hover {
    background: #16a085;
  }

  /* Calendar Popup */
  .calendar-popup {
    display: none;
    position: absolute;
    top: 45px;
    right: 0;
    background: #fff;
    padding: 12px 18px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    font-size: 14px;
    color: #2c3e50;
    white-space: nowrap;
    text-align: center;
  }
  .calendar-popup p {
    margin: 5px 0;
  }

  /* Dashboard Cards */
  .main h1 {
    margin: 0 0 25px;
    font-size: 28px;
    font-weight: 700;
    color: #2c3e50;
    border-bottom: 2px solid #ecf0f1;
    padding-bottom: 12px;
  }

  .overview {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
  }
  .card {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    transition: transform 0.2s;
  }
  .card:hover {
    transform: translateY(-4px);
  }
  .card h3 {
    margin: 0;
    font-size: 15px;
    color: #7f8c8d;
    font-weight: 500;
  }
  .card p {
    margin: 10px 0 0;
    font-size: 24px;
    font-weight: 600;
    color: #2c3e50;
  }

  /* Analytics Section */
  .analytics {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-bottom: 30px;
  }
  .chart, .target {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
  }
  .chart h3, .target h3 {
    margin-top: 0;
    font-size: 16px;
    color: #2c3e50;
    font-weight: 600;
  }
  .placeholder {
    height: 200px;
    background: linear-gradient(135deg, #e0f7f4, #d1f2eb);
    border-radius: 8px;
  }

  /* Products & Offers */
  .bottom {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
  }
  .products, .offers {
    background: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
  }
  .products h3, .offers h3 {
    margin-top: 0;
    font-size: 16px;
    color: #2c3e50;
    font-weight: 600;
  }
  .product-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(120px, 1fr));
    gap: 15px;
    margin-top: 15px;
  }
  .product {
    background: #f9f9f9;
    border-radius: 12px;
    padding: 10px;
    text-align: center;
    transition: transform 0.2s;
  }
  .product:hover {
    transform: translateY(-3px);
  }
  .product img {
    width: 100%;
    border-radius: 10px;
  }
  .product p {
    margin: 5px 0 0;
    font-size: 13px;
    font-weight: 500;
    color: #2c3e50;
  }
  .offers ul {
    margin: 10px 0 0;
    padding: 0;
    list-style: none;
  }
  .offers li {
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    font-size: 14px;
    color: #2c3e50;
  }
</style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar" id="sidebar">
  <div>
    <h2>ADMIN</h2>
    <div class="menu">
      <a href="#" class="active">DASHBOARD</a>
      <a href="#">📊 ANALYTICS</a>

      <!-- Products Dropdown -->
      <div class="dropdown">
        <div class="dropdown-toggle">📦 PRODUCTS <span class="arrow">▸</span></div>
        <div class="dropdown-menu">
          <a href="{{ route(name: 'admin.plants.index') }}">List Products</a>
          <a href="{{ route(name: 'admin.plants.create') }}">Add Product</a>
        </div>
      </div>

      <!-- Orders Dropdown -->
      <div class="dropdown">
        <div class="dropdown-toggle">🛒 ORDERS <span class="arrow">▸</span></div>
        <div class="dropdown-menu">
          <a href="#">All Orders</a>
          <a href="#">Pending</a>
          <a href="#">Completed</a>
        </div>
      </div>

      <div class="dropdown">
        <div class="dropdown-toggle">👥 CUSTOMERS<span class="arrow">▸</span></div>
        <div class="dropdown-menu">
          <a href="{{ route(name: 'admin.customers.index') }}">List Customers</a>
        </div>
      </div>

      <!-- Admins Dropdown -->
      <div class="dropdown">
        <div class="dropdown-toggle">🔑 ADMINS <span class="arrow">▸</span></div>
        <div class="dropdown-menu">
          <a href="{{ route('admin.admins.index') }}">List Admins</a>
          <a href="{{ route('admin.admins.create') }}">Add Admin</a>
        </div>
      </div>

      <!-- Admins Dropdown -->
      <div class="dropdown">
        <div class="dropdown-toggle">⚙️ SETTINGS <span class="arrow">▸</span></div>
        <div class="dropdown-menu">
          <a href="{{ route('admin.settings') }}">General Settings</a>
          <form>
    <button type="submit" class="logout-btn">⏻ Logout</button>
  </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Top Controls -->
<div class="top-controls">
  <button class="toggle-btn" onclick="toggleSidebar()">☰</button>
  <div style="position: relative;">
    <button class="calendar-btn" onclick="toggleCalendar()">📅</button>
    <div id="calendar-popup" class="calendar-popup">
      <p id="date"></p>
      <p id="time"></p>
    </div>
  </div>
</div>

<!-- Main Content -->
<div class="main">
  <h1>Overview</h1>

  <div class="overview">
    <div class="card">
      <h3>Total Revenue</h3>
      <p>$82,650</p>
    </div>
    <div class="card">
      <h3>Total Orders</h3>
      <p>1,645</p>
    </div>
    <div class="card">
      <h3>Total Customers</h3>
      <p>1,462</p>
    </div>
    <div class="card">
      <h3>Pending Delivery</h3>
      <p>117</p>
    </div>
  </div>

  <div class="analytics">
    <div class="chart">
      <h3>Sales Analytics</h3>
      <div class="placeholder"></div>
    </div>
    <div class="target">
      <h3>Sales Target</h3>
      <div class="placeholder"></div>
    </div>
  </div>

  <div class="bottom">
    <div class="products">
      <h3>Top Selling Products</h3>
      <div class="product-grid">
        <div class="product">
          <img src="https://via.placeholder.com/120x100" alt="Product">
          <p>Air Jordan 8</p>
        </div>
        <div class="product">
          <img src="https://via.placeholder.com/120x100" alt="Product">
          <p>Nike Air Max</p>
        </div>
        <div class="product">
          <img src="https://via.placeholder.com/120x100" alt="Product">
          <p>Yeezy Boost</p>
        </div>
      </div>
    </div>
    <div class="offers">
      <h3>Current Offers</h3>
      <ul>
        <li>🔥 40% Discount Offer</li>
        <li>🎟️ 100 Taka Coupon</li>
        <li>🛒 Stock Out Sale</li>
      </ul>
    </div>
  </div>
</div>

<script>
  // Sidebar toggle
  function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("hidden");
  }

  // Dropdown functionality
  document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
    toggle.addEventListener('click', () => {
      toggle.classList.toggle('active');
      const menu = toggle.nextElementSibling;
      menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
    });
  });

  // Calendar toggle
  function toggleCalendar() {
    const popup = document.getElementById("calendar-popup");
    if (popup.style.display === "block") {
      popup.style.display = "none";
    } else {
      updateDateTime();
      popup.style.display = "block";
    }
  }

  // Update date and time
  function updateDateTime() {
    const today = new Date();
    const dateOptions = { weekday: "long", year: "numeric", month: "long", day: "numeric" };
    document.getElementById("date").innerText = today.toLocaleDateString("en-US", dateOptions);
    document.getElementById("time").innerText = today.toLocaleTimeString("en-US");
  }
  setInterval(updateDateTime, 1000);

  // Close popup when clicking outside
  document.addEventListener("click", function(e) {
    const calendarBtn = document.querySelector(".calendar-btn");
    const popup = document.getElementById("calendar-popup");
    if (!calendarBtn.contains(e.target) && !popup.contains(e.target)) {
      popup.style.display = "none";
    }
  });
</script>

</body>
</html>
