<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard - Shop</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    body { background: #f4f6f9; color: #333; min-height: 100vh; display: flex; flex-direction: column; }

    /* 🌿 Modern Navbar */
header {
    background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); /* Green gradient */
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 12px 50px;
    color: white;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    position: sticky;
    top: 0;
    z-index: 1000;
}

/* 🌱 Logo */
header .logo {
    font-size: 24px;
    font-weight: bold;
    letter-spacing: 1.5px;
    color: #fff;
    text-transform: uppercase;
    display: flex;
    align-items: center;
    gap: 8px;
}
header .logo::before {
    content: "🌿"; /* Add a leaf icon */
    font-size: 22px;
}

/* 📌 Navigation */
nav ul {
    list-style: none;
    display: flex;
    gap: 28px;
    align-items: center;
    margin: 0;
    padding: 0;
}
nav ul li {
    position: relative;
}
nav ul li a,
nav ul li button {
    text-decoration: none;
    color: white;
    font-weight: 500;
    font-size: 15px;
    background: none;
    border: none;
    cursor: pointer;
    transition: all 0.3s ease;
    font-family: inherit;
    padding: 6px 10px;
    border-radius: 6px;
}
nav ul li a:hover,
nav ul li button:hover {
    background: rgba(255,255,255,0.15);
    color: #f1c40f;
    box-shadow: 0 2px 8px rgba(0,0,0,0.2);
}

/* 👤 Contact/Welcome Section */
header .contact {
    font-size: 14px;
    background: rgba(255,255,255,0.1);
    padding: 8px 14px;
    border-radius: 50px;
    display: flex;
    align-items: center;
    gap: 10px;
    transition: background 0.3s;
}
header .contact:hover {
    background: rgba(255,255,255,0.2);
}

/* 🖼 Profile Pic */
header .contact img {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #fff;
}

    /* Layout */
    .container { flex: 1; padding: 30px 60px; display: flex; gap: 40px; }

    /* Sidebar Categories */
    .sidebar { width: 220px; background: white; border-radius: 12px; box-shadow: 0 3px 10px rgba(0,0,0,0.1); padding: 20px; height: fit-content; }
    .sidebar h3 { font-size: 16px; margin-bottom: 15px; color: #2c3e50; border-bottom: 2px solid #2f8f2f; padding-bottom: 8px; }
    .category-list, .price-list { list-style: none; padding: 0; }
    .category-list li, .price-list li { margin: 10px 0; }
    .category-list button, .price-list button {
      width: 100%; padding: 10px 12px; border: none; border-radius: 8px; background: #f4f6f9; cursor: pointer; text-align: left; font-size: 14px; color: #333; transition: all 0.3s; position: relative;
    }
    .category-list button:hover, .price-list button:hover { background: #27ae60; color: white; transform: translateX(4px); box-shadow: 0 4px 12px rgba(0,0,0,0.12); }
    .category-list button.active, .price-list button.active { background: #27ae60; color: white; font-weight: 600; box-shadow: inset 4px 0 #1e6f1e; }

    /* Main Shop Area */
    .shop-area { flex: 1; }

    /* Search Bar */
    .search-bar { position: relative; margin-bottom: 20px; max-width: 400px; }
    .search-bar input { width: 100%; padding: 12px 15px 12px 45px; border: 1px solid #ccc; border-radius: 30px; outline: none; font-size: 14px; box-shadow: 0 2px 6px rgba(0,0,0,0.08); transition: all 0.3s; }
    .search-bar input:focus { border-color: #2f8f2f; box-shadow: 0 3px 10px rgba(0,0,0,0.15); }
    .search-bar i { position: absolute; top: 50%; left: 15px; transform: translateY(-50%); color: #888; }

   @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap');

/* Product Grid - Exactly 4 per row */
.products { 
    display: grid; 
    grid-template-columns: repeat(4, 1fr); /* ✅ Exactly 4 cards per row */
    gap: 28px; 
    padding: 30px;
    font-family: 'Inter', sans-serif;
}

/* Product Card */
.product-card { 
    background: white; 
    border-radius: 16px; 
    overflow: hidden; 
    box-shadow: 0 4px 10px rgba(0,0,0,0.06); 
    transition: transform 0.3s, box-shadow 0.3s; 
    display: flex; 
    flex-direction: column; 
    cursor: pointer;
}

.product-card:hover { 
    transform: translateY(-8px); 
    box-shadow: 0 12px 24px rgba(0,0,0,0.12); 
}

/* Product Image */
.product-card img { 
    width: 100%; 
    height: 250px; /* taller space for plants */
    object-fit: contain; /* ✅ show the whole image */
    padding: 20px;       /* add spacing so image doesn’t touch edges */
    background:rgb(255, 255, 255); /* subtle background for consistency */
    transition: transform 0.4s ease;
    border-bottom: none; /* remove the dividing line for a cleaner look */
}

.product-card:hover img { 
    transform: scale(1.05); /* subtle zoom */
}


/* Product Info */
.product-info { 
    padding: 16px; 
    text-align: center; 
    flex: 1; 
    display: flex; 
    flex-direction: column; 
    justify-content: space-between;
}

.product-info h4 { 
    font-size: 17px; 
    margin-bottom: 8px; 
    color: #2c3e50; 
    font-weight: 600; 
    line-height: 1.4;
}

.product-info .price { 
    font-size: 16px; 
    font-weight: 700; 
    color: #1e6f1e; /* professional green */
    margin-top: 4px;
}

.product-info .old-price { 
    font-size: 13px; 
    margin-left: 6px; 
    color: #999; 
    text-decoration: line-through; 
}
/* Product Image Wrapper (fixes uniform size) */
.product-card .image-wrapper {
    width: 100%;
    height: 240px;              /* ✅ fixed uniform height for all images */
    display: flex;
    justify-content: center;
    align-items: center;
    background: #f8f8f8;        /* light background for elegance */
    padding: 15px;
    overflow: hidden;
    border-bottom: 1px solid #eee;
}

/* Product Image */
.product-card img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;        /* ✅ ensures the full plant is visible */
    transition: transform 0.4s ease;
}

.product-card:hover img {
    transform: scale(1.08);     /* subtle zoom effect on hover */
}

/* Buy Button */
.btn-buy { 
    margin-top: 14px; 
    padding: 10px 18px; 
    font-size: 14px; 
    font-weight: 600; 
    background: #2c3e50; 
    color: white; 
    border: none; 
    border-radius: 10px; 
    cursor: pointer; 
    transition: all 0.3s ease; 
}

.btn-buy:hover { 
    background: #1e6f1e; 
    transform: translateY(-2px) scale(1.05); 
}


    /* Footer */
    footer { background: #fff; color: #333; margin-top: auto; box-shadow: 0 -2px 6px rgba(0,0,0,0.05); }
    footer .bottom-bar { background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); color: white; text-align: center; padding: 8px; font-size: 14px; width: 100%; }

    @media (max-width: 992px) {
      .container { flex-direction: column; }
      .sidebar { width: 100%; order: 2; }
      .shop-area { order: 1; }
      .search-bar { width: 100%; }
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <header>
    <div class="logo">YAH NURSERY </div>
    <nav>
      <ul>
        <li><a href="{{ route('customer.dashboard') }}">HOME</a></li>
        <li><a href="#">TOP DEALS</a></li>
        <li><a href="{{ route('customer.profile') }}">PROFILE</a></li>
        <li>
          <a href="{{ route('cart.view') }}">
            <i class="fa fa-shopping-cart"></i> CART 
            @php
                use App\Models\Cart;
                $cartCount = 0;
                if(session()->has('customer_id')) {
                    $cartCount = Cart::where('customer_id', session('customer_id'))->count();
                }
            @endphp
            @if($cartCount > 0)
                <span style="background:red;color:white;padding:2px 6px;border-radius:50%;font-size:12px;">
                    {{ $cartCount }}
                </span>
            @endif
          </a>
        </li>
        <li>
          <a href="{{ route('customer.logout') }}" 
   class="text-gray-700 hover:text-green-600 font-medium transition duration-200">
   LOGOUT
</a>

        </li>
      </ul>
    </nav>
    <div class="contact">
    @if($customer && $customer->profile_picture)
    <img src="{{ asset('storage/' . $customer->profile_picture) }}" 
         alt="Profile" 
         style="width:32px;height:32px;border-radius:50%;object-fit:cover;margin-right:8px;vertical-align:middle;">
@else
    <img src="https://via.placeholder.com/32" alt="Profile" 
         style="width:32px;height:32px;border-radius:50%;object-fit:cover;margin-right:8px;vertical-align:middle;">
@endif
WELCOME, {{ $customer ? $customer->firstname : 'Guest' }}

</div>

  </header>

  <!-- Main Content -->
  <div class="container">
    <!-- Sidebar -->
    <aside class="sidebar">
      <h3>Categories</h3>
      <ul class="category-list">
        <li><button onclick="filterByCategory('all', this)" class="active">All Products</button></li>
        <li><button onclick="filterByCategory('indoor', this)">Indoor Plants</button></li>
        <li><button onclick="filterByCategory('outdoor', this)">Outdoor Plants</button></li>
        <li><button onclick="filterByCategory('pots', this)">Pots</button></li>
        <li><button onclick="filterByCategory('fertilizers', this)">Fertilizers</button></li>
      </ul>

      <h3>Sort by Price</h3>
      <ul class="price-list">
        <li><button onclick="filterByPrice('all', this)" class="active">All Prices</button></li>
        <li><button onclick="filterByPrice('0-10', this)">RM0 - RM10</button></li>
        <li><button onclick="filterByPrice('10-20', this)">RM10 - RM20</button></li>
        <li><button onclick="filterByPrice('20-50', this)">RM20 - RM50</button></li>
        <li><button onclick="filterByPrice('50-100', this)">RM50 - RM100</button></li>
        <li><button onclick="filterByPrice('100+', this)">RM100+</button></li>
      </ul>
    </aside>

    <!-- Shop Area -->
    <div class="shop-area">
      <div class="search-bar">
        <i class="fa fa-search"></i>
        <input type="text" id="searchInput" placeholder="Search plants by name...">
      </div>

      <section class="products" id="productList">
    @foreach($plants as $plant)
      <div class="product-card" 
           data-name="{{ strtolower($plant->name) }}" 
           data-price="{{ $plant->price }}"
           data-category="{{ strtolower($plant->category) }}">

        <!-- ✅ Image Wrapper Added -->
        <div class="image-wrapper">
            <img src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}">
        </div>

        <div class="product-info">
          <h4>{{ $plant->name }}</h4>
          <p>
            <span class="price">RM{{ number_format($plant->price, 2) }}</span>
            @if($plant->old_price)
              <span class="old-price">RM{{ number_format($plant->old_price, 2) }}</span>
            @endif
          </p>
          <form action="{{ route('plants.show', $plant->id) }}" method="GET">
            <button type="submit" class="btn-buy">Show more</button>
          </form>
        </div>
      </div>
    @endforeach

    @if($plants->isEmpty())
      <p style="grid-column: 1/-1; text-align:center; color:gray;">
        No plants available yet. Please check back later 🌱
      </p>
    @endif
</section>

    </div>
  </div>

  <!-- Footer -->
  <footer>
    <div class="bottom-bar">
      © 2025 Yah Nursery & Landscape. All Rights Reserved.
    </div>
  </footer>

  <script>
    const searchInput = document.getElementById('searchInput');
    const products = document.querySelectorAll('#productList .product-card');
    const categoryButtons = document.querySelectorAll('.category-list button');
    const priceButtons = document.querySelectorAll('.price-list button');

    window.activeCategory = 'all';
    window.activePrice = 'all';

    function filterProducts() {
      const query = searchInput.value.toLowerCase().trim();

      products.forEach(card => {
        const name = card.getAttribute('data-name');
        const price = parseFloat(card.getAttribute('data-price'));
        const category = card.getAttribute('data-category');
        let show = true;

        // Search filter
        if (!name.includes(query)) show = false;

        // Category filter
        if (window.activeCategory !== 'all' && category !== window.activeCategory) show = false;

        // Price filter
        if (window.activePrice !== 'all') {
          if (window.activePrice.includes('-')) {
            const [min, max] = window.activePrice.split('-').map(Number);
            if (price < min || price > max) show = false;
          } else if (window.activePrice === '100+' && price < 100) show = false;
        }

        card.style.display = show ? 'flex' : 'none';
      });
    }

    function filterByCategory(cat, btn) {
      window.activeCategory = cat;
      categoryButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      filterProducts();
    }

    function filterByPrice(price, btn) {
      window.activePrice = price;
      priceButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      filterProducts();
    }

    searchInput.addEventListener('input', filterProducts);
  </script>
</body>
</html>
