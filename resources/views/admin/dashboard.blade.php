<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modern Admin Dashboard</title>
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
      width: 200px;
      background:rgba(31, 10, 10, 0.95);
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
      transform: translateX(-100%); /* hide fully */
    }

    .sidebar h2 {
      margin: 0 0 30px;
      text-align: center;
      font-size: 20px;
      font-weight: 600;
    }

    .menu a {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
      margin: 5px 0;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      transition: 0.3s;
      font-size: 14px;
    }
    .menu a:hover,
    .menu a.active {
      background: #16a085;
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
    .logout-btn .icon {
      font-size: 18px;
    }
    .logout-btn:hover {
      background: #d9534f;
      color: #fff;
    }

    /* Main */
.main {
  margin-left: 220px; /* add a bit more spacing (instead of 200px) */
  padding: 40px 30px; /* increase top padding for nicer breathing space */
  flex: 1;
  transition: margin-left 0.3s ease, padding 0.3s ease;
  width: calc(100% - 220px);
  box-sizing: border-box;
}

.sidebar.hidden ~ .main {
  margin-left: 20px; /* leave some margin when sidebar is hidden */
  width: calc(100% - 40px);
}


    /* Top buttons */
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

    .main h1 {
      margin: 0;
      font-size: 26px;
      font-weight: 700;
      color: #2c3e50;
      padding-bottom: 12px;
      border-bottom: 2px solid #ecf0f1;
      margin-bottom: 25px;
      letter-spacing: 0.5px;
    }

    /* Overview Cards */
    .overview {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 20px;
      margin-bottom: 30px;
    }
    .card {
      background: #fff;
      border-radius: 12px;
      padding: 20px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .card h3 {
      margin: 0;
      font-size: 14px;
      color: #7f8c8d;
      font-weight: 500;
    }
    .card p {
      margin: 10px 0 0;
      font-size: 22px;
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
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .chart h3, .target h3 {
      margin-top: 0;
      font-size: 16px;
      color: #2c3e50;
      font-weight: 600;
    }
    .placeholder {
      height: 180px;
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
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
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
      border-radius: 10px;
      padding: 10px;
      text-align: center;
    }
    .product img {
      width: 100%;
      border-radius: 8px;
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
        <a href="#" class="active">🏠 <span>Dashboard</span></a>
        <a href="#">📊 <span>Analytics</span></a>
        <a href="{{ route(name: 'admin.plants.index') }}">📦 <span>Products</span></a>
        <a href="#">🛒 <span>Orders</span></a>
        <a href="{{ route('admin.customers.index') }}">👥 <span>Customers</span></a>
        <a href="{{ route('admin.admins.index') }}">🔑 <span>Admins</span></a>
        <a href="{{ route('admin.settings') }}" class="nav-link">⚙️ Settings</a>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin-top: 10px;">
          @csrf
          <button type="submit" class="logout-btn">
            <span class="icon">⏻</span> <span>Logout</span>
          </button>
        </form>
      </div>
    </div>
  </div>

  <!-- Top Controls -->
  <div class="top-controls">
    <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

    <!-- Calendar -->
    <div style="position: relative;">
      <button class="calendar-btn" onclick="toggleCalendar()">📅</button>
      <div id="calendar-popup" class="calendar-popup">
        <p id="date"></p>
        <p id="time"></p>
      </div>
    </div>
  </div>

  <!-- Main -->
  <div class="main">
    <h1>Overview</h1>

    <!-- Overview Cards -->
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

    <!-- Analytics -->
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

    <!-- Products and Offers -->
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

    // Update clock every second
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
