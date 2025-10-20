<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Customer Dashboard - Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Dancing+Script:wght@600&family=Montserrat:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          fontFamily: { sans: ['Inter', 'sans-serif'] },
          colors: {
            'primary-green': '#1e6f1e',
            'soft-gray': '#f3f4f6',
          },
        },
      },
    };
  </script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <style>
    body {
      background-color: #f9fafb;
      font-family: 'Inter', sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
      color: #333;
      overflow-y: scroll; /* keeps layout consistent */
    }
    body::-webkit-scrollbar {
  display: none; /* hides scrollbar in Chrome, Edge, Safari */
}

    .container {
      flex: 1;
      display: flex;
      gap: 40px;
      padding: 30px 60px;
    }

    .sidebar {
      width: 220px;
      background: white;
      border-radius: 12px;
      box-shadow: 0 3px 10px rgba(0,0,0,0.1);
      padding: 20px;
      height: fit-content;
    }

    .sidebar h3 {
      font-size: 16px;
      margin-bottom: 15px;
      color: #2c3e50;
      border-bottom: 2px solid #2f8f2f;
      padding-bottom: 8px;
    }

    .category-list button, .price-list button {
      width: 100%;
      padding: 10px 12px;
      border: none;
      border-radius: 8px;
      background: #f4f6f9;
      cursor: pointer;
      text-align: left;
      font-size: 14px;
      color: #333;
      transition: all 0.3s;
    }

    .category-list button:hover, .price-list button:hover,
    .category-list button.active, .price-list button.active {
      background: #27ae60;
      color: white;
      font-weight: 600;
    }

    .search-bar {
      position: relative;
      margin-bottom: 20px;
      max-width: 400px;
    }

    .search-bar input {
      width: 100%;
      padding: 12px 15px 12px 45px;
      border: 1px solid #ccc;
      border-radius: 30px;
      outline: none;
      font-size: 14px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.08);
      transition: all 0.3s;
    }

    .search-bar input:focus {
      border-color: #2f8f2f;
      box-shadow: 0 3px 10px rgba(0,0,0,0.15);
    }

    .search-bar i {
      position: absolute;
      top: 50%;
      left: 15px;
      transform: translateY(-50%);
      color: #888;
    }
    
.sort-btn-name i {
  transition: color 0.3s ease;
}
/* ✅ Ensure banner always visible below navbar */
.banner-container {
  width: 100%;
  height: 100px;
  position: relative;
  overflow: hidden;
  flex-shrink: 0;
  z-index: 10;
}

.banner-container img {
  width: 100%;
  height: 100%;
  object-fit: cover;
}
 .banner-container {
    margin: 0 !important;
    padding: 0 !important;
  }

  /* Active indicator styling */
  .indicator.active {
    background-color: white;
    transform: scale(1.3);
  }
  /* ✅ Universal layout fixes */
  html, body {
    margin: 0;
    padding: 0;
    overflow-x: hidden; /* remove side scroll */
    scroll-behavior: smooth;
  }

  body {
    background-color: #f9fafb;
    font-family: 'Inter', sans-serif;
    color: #333;
  }

  /* ✅ Responsive main layout */
  .container {
    display: flex;
    flex: 1;
    gap: 2.5rem;
    max-width: 1280px; /* centered on wide screens */
    margin: 0 auto;
    padding: 2rem 1.5rem;
  }

  /* ✅ Sidebar responsive */
  .sidebar {
    width: 18rem; /* scales better than px */
    background: white;
    border-radius: 12px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    padding: 1.5rem;
    height: fit-content;
  }

  /* ✅ Banner fixes for full width on big screens */
  .banner-container {
    width: 100vw; /* spans entire viewport width */
    height: 40vh; /* responsive height */
    position: relative;
    overflow: hidden;
    margin: 0;
    padding: 0;
  }

  .banner-container > div {
    width: 100%;
    height: 100%;
  }

  /* ✅ Remove scrollbar */
  body::-webkit-scrollbar {
    display: none;
  }

  /* ✅ Fix product section overflow */
  .shop-area {
    flex: 1;
    min-width: 0; /* prevents overflow on large screens */
  }
  </style>
</head>
<body>
<x-navbar />
<!-- 🌿 Full-Width Moving Banner with Text Overlay (Stylized, Slider, & Indicators Fixed) -->
<div class="relative w-full h-[550px] overflow-hidden mt-8 mb-0 banner-container font-[Poppins]">
  <div id="bannerSlider" class="flex transition-transform duration-[1500ms] ease-in-out">

    <!-- Banner 1 (Left Text) -->
    <div 
      class="w-full h-[550px] flex items-center justify-start bg-cover bg-center flex-shrink-0 relative px-16"
      style="background-image: url('https://img.freepik.com/premium-vector/summer-sale-banner-design-with-tropical-leaves-background_336924-3909.jpg');"
    >
      <div class="absolute inset-0 bg-black/20"></div>
      <div class="relative text-white max-w-lg text-left">
        <h2 class="text-6xl font-[Playfair_Display] font-bold mb-4 drop-shadow-xl"></h2>
        <p class="text-xl md:text-2xl italic opacity-90"></p>
      </div>
    </div>

    <!-- Banner 2 (Right Text) -->
    <div 
      class="w-full h-[550px] flex items-center justify-end bg-cover bg-center flex-shrink-0 relative px-16"
      style="background-image: url('https://img.freepik.com/premium-vector/summer-sale-banner-design-with-tropical-leaves-background_336924-3788.jpg');"
    >
      <div class="absolute inset-0 bg-black/20"></div>
      <div class="relative text-white max-w-lg text-right">
        <h2 class="text-5xl font-[Dancing_Script] font-semibold mb-4 drop-shadow-xl"></h2>
        <p class="text-lg md:text-xl opacity-90"></p>
      </div>
    </div>

    <!-- Banner 3 (Center Text) -->
    <div 
      class="w-full h-[550px] flex items-center justify-center bg-cover bg-center flex-shrink-0 relative"
      style="background-image: url('https://i.pinimg.com/736x/1d/39/a0/1d39a01bfed7be0eba78b880894e6e43.jpg');"
    >
      <div class="absolute inset-0 bg-black/20"></div>
      <div class="relative text-center text-white px-6">
        <h2 class="text-6xl font-[Montserrat] font-extrabold mb-4 drop-shadow-2xl tracking-wide">GET OUR DISCOUNTS NOW!</h2>
        <p class="text-lg md:text-xl opacity-90">Sign up today and enjoy free shipping on your first order.</p>
      </div>
    </div>
  </div>

  <!-- ⏺️ Banner Indicators -->
  <div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-3 z-[60]">
    <button class="indicator w-4 h-4 rounded-full border-2 border-white bg-green-500 transition-all duration-300" onclick="setBanner(0)"></button>
    <button class="indicator w-4 h-4 rounded-full border-2 border-white bg-transparent hover:bg-green-300 transition-all duration-300" onclick="setBanner(1)"></button>
    <button class="indicator w-4 h-4 rounded-full border-2 border-white bg-transparent hover:bg-green-300 transition-all duration-300" onclick="setBanner(2)"></button>
  </div>
</div>
  

<div class="container">
  <aside class="sidebar w-[270px] bg-white p-6 rounded-2xl shadow-md border border-gray-100">

  <!-- 🕵️ Search inside sidebar -->
  <div class="search-bar mb-6">
    <i class="fa fa-search"></i>
    <input type="text" id="searchInput" placeholder="Search">
  </div>

  <!-- 🌿 Categories -->
  <h3 class="text-gray-800 font-semibold text-base mb-3 border-b border-gray-200 pb-1">Categories</h3>
  <ul class="category-list space-y-2 mb-6">
    <li><button onclick="filterByCategory('all', this)" class="active">All Products</button></li>
    <li><button onclick="filterByCategory('indoor', this)">Indoor Plants</button></li>
    <li><button onclick="filterByCategory('outdoor', this)">Outdoor Plants</button></li>
    <li><button onclick="filterByCategory('pots', this)">Pots</button></li>
    <li><button onclick="filterByCategory('fertilizers', this)">Fertilizers</button></li>
  </ul>
  <!-- 🔤 Sort by Name -->
<h3 class="text-gray-800 font-semibold text-base mb-3 border-b border-gray-200 pb-1">
  Sort by Name
</h3>

<div class="flex flex-col gap-3 mb-6">
  <button 
    onclick="sortByName('asc', this)" 
    class="sort-btn-name active flex items-center justify-between bg-[#27ae60] text-white transition-all duration-300 px-4 py-2 rounded-lg font-medium shadow-sm hover:bg-[#219150]">
    <span>A → Z</span>
    <i class="fa-solid fa-arrow-down-a-z"></i>
  </button>

  <button 
    onclick="sortByName('desc', this)" 
    class="sort-btn-name flex items-center justify-between bg-[#f4f6f9] text-gray-700 hover:bg-[#27ae60] hover:text-white transition-all duration-300 px-4 py-2 rounded-lg font-medium shadow-sm">
    <span>Z → A</span>
    <i class="fa-solid fa-arrow-down-z-a"></i>
  </button>
</div>

  <!-- 💰 Sort by Price -->
  <h3 class="text-gray-800 font-semibold text-base mb-3 border-b border-gray-200 pb-1">Sort by Price</h3>
  <ul class="price-list space-y-2 mb-6">
    <li><button onclick="filterByPrice('all', this)" class="active">All Prices</button></li>
    <li><button onclick="filterByPrice('0-10', this)">RM0 - RM10</button></li>
    <li><button onclick="filterByPrice('10-20', this)">RM10 - RM20</button></li>
    <li><button onclick="filterByPrice('20-50', this)">RM20 - RM50</button></li>
    <li><button onclick="filterByPrice('50-100', this)">RM50 - RM100</button></li>
    <li><button onclick="filterByPrice('100+', this)">RM100+</button></li>
  </ul>

  <!-- ⏰ Sort by New Arrivals -->
  <h3 class="text-gray-800 font-semibold text-base mb-3 border-b border-gray-200 pb-1">New Arrivals</h3>
  <div class="flex flex-col gap-3 mb-6">
    <button 
      onclick="sortByNewArrivals(this)" 
      class="sort-btn-new flex items-center justify-between bg-[#f4f6f9] hover:bg-[#27ae60] hover:text-white transition-all duration-300 text-gray-700 px-4 py-2 rounded-lg font-medium shadow-sm">
      <span>Newest Added</span>
      <i class="fa-solid fa-clock text-gray-500 group-hover:text-white"></i>
    </button>
    <p class="text-xs text-gray-500 leading-snug ml-1">
      Displays the most recently added plants first.
    </p>
  </div>

</aside>

  <!-- Shop Area -->
  <div class="shop-area w-full">

   <!-- 🧾 Product Count -->




    <!-- 🌱 Product Section -->
    <section id="productList" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 p-6 bg-gray-50 rounded-xl">
      @foreach($plants as $plant)
      <div
        class="bg-white rounded-2xl shadow-md overflow-hidden transition transform hover:-translate-y-1 hover:shadow-2xl duration-300 relative"
        data-date="{{ $plant->created_at }}"
        data-name="{{ strtolower($plant->name) }}"
        data-price="{{ $plant->price }}"
        data-category="{{ strtolower($plant->category) }}">

        <!-- 🪴 Product Image with Wishlist Icon -->
        <div class="relative aspect-[4/5] bg-soft-gray overflow-hidden">
          <img src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}"
            class="w-full h-full object-cover hover:scale-110 transition-transform duration-500">

          <!-- ❤️ Wishlist Icon -->
          <button
            class="absolute top-3 right-3 bg-white bg-opacity-80 rounded-full p-2 text-gray-700 hover:text-red-500 hover:bg-opacity-100 transition duration-300 shadow-md wishlist-btn"
            data-plant-id="{{ $plant->id }}"
            title="Add to Wishlist">
            <i class="fa-regular fa-heart text-lg"></i>
          </button>
        </div>

        <!-- 🌿 Product Info -->
        <div class="p-5 flex flex-col justify-between h-[200px]">
          <div>
            <h4 class="font-semibold text-gray-900 text-lg truncate">{{ $plant->name }}</h4>
            <p class="text-green-700 font-bold text-base mt-1">
              RM{{ number_format($plant->price, 2) }}
              @if($plant->old_price)
              <span class="text-gray-400 line-through text-xs ml-1">
                RM{{ number_format($plant->old_price, 2) }}
              </span>
              @endif
            </p>
          </div>

          <form action="{{ route('plants.show', $plant->id) }}" method="GET" class="mt-4">
            <button type="submit"
              class="w-full bg-primary-green text-white py-2.5 rounded-full font-medium hover:bg-green-800 transition">
              Show more
            </button>
          </form>
        </div>
      </div>
      @endforeach

      @if($plants->isEmpty())
      <p class="col-span-full text-center text-gray-500 py-6">
        No plants available yet. Please check back later 🌱
      </p>
      @endif
    </section>
  </div>
</div>

<x-footer />

<!-- ✅ SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const wishlistButtons = document.querySelectorAll(".wishlist-btn");
  const wishlistCountElement = document.getElementById("wishlist-count");
  const searchInput = document.getElementById("searchInput");
  const productList = document.getElementById("productList");
  const productCards = productList.querySelectorAll("[data-name]");
  let activeCategory = "all";
  let activePrice = "all";

  // ✅ Update Wishlist Count
  async function updateWishlistCount() {
    try {
      const res = await fetch("{{ route('wishlist.count') }}");
      const data = await res.json();
      if (wishlistCountElement && typeof data.count === "number") {
        wishlistCountElement.textContent = data.count;
        wishlistCountElement.style.display = data.count > 0 ? "inline" : "none";
      }
    } catch (err) {
      console.error("Failed to update wishlist count:", err);
    }
  }

  // ✅ Wishlist Add Function
  wishlistButtons.forEach((btn) => {
    btn.addEventListener("click", async function () {
      const plantId = this.dataset.plantId;

      try {
        const res = await fetch("{{ route('wishlist.store') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}",
          },
          body: JSON.stringify({ plant_id: plantId }),
        });

        const data = await res.json();

        if (data.success) {
          Swal.fire({
            icon: "success",
            title: "Added to Wishlist ❤️",
            text: "This plant has been added successfully!",
            timer: 1500,
            showConfirmButton: false,
            toast: true,
            position: "top-end",
          });
          await updateWishlistCount();
        } else if (data.exists) {
          Swal.fire({
            icon: "info",
            title: "Already in Wishlist 🌿",
            text: data.message,
            timer: 1500,
            showConfirmButton: false,
            toast: true,
            position: "top-end",
          });
        } else if (data.error) {
          Swal.fire({
            icon: "warning",
            title: "Login Required",
            text: data.error,
          });
        }
      } catch (err) {
        Swal.fire({
          icon: "error",
          title: "Oops!",
          text: "Something went wrong. Try again later.",
        });
      }
    });
  });

  // ✅ Filtering Logic
  function filterProducts() {
    const searchTerm = searchInput.value.toLowerCase();

    productCards.forEach((card) => {
      const name = card.dataset.name;
      const price = parseFloat(card.dataset.price);
      const category = card.dataset.category;

      let matchSearch = name.includes(searchTerm);
      let matchCategory = activeCategory === "all" || category === activeCategory;
      let matchPrice = false;

      switch (activePrice) {
        case "all":
          matchPrice = true;
          break;
        case "0-10":
          matchPrice = price >= 0 && price <= 10;
          break;
        case "10-20":
          matchPrice = price > 10 && price <= 20;
          break;
        case "20-50":
          matchPrice = price > 20 && price <= 50;
          break;
        case "50-100":
          matchPrice = price > 50 && price <= 100;
          break;
        case "100+":
          matchPrice = price > 100;
          break;
      }

      if (matchSearch && matchCategory && matchPrice) {
        card.style.display = "block";
      } else {
        card.style.display = "none";
      }
    });
  }

  // ✅ Category Filter
  window.filterByCategory = (category, btn) => {
    activeCategory = category;
    document.querySelectorAll(".category-list button").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    filterProducts();
  };

  // ✅ Price Filter
  window.filterByPrice = (price, btn) => {
    activePrice = price;
    document.querySelectorAll(".price-list button").forEach(b => b.classList.remove("active"));
    btn.classList.add("active");
    filterProducts();
  };

  // ✅ Search Input
  searchInput.addEventListener("input", filterProducts);

  // ✅ Initial Load
  updateWishlistCount();
});
// ✅ Sort by Name (with hover highlight + sorting)
function sortByName(order, button) {
  const productList = document.getElementById("productList");
  const products = Array.from(productList.children);

  // ✅ Remove highlight from all name sort buttons
  document.querySelectorAll('.sort-btn-name').forEach(btn => {
    btn.classList.remove('active', 'bg-[#27ae60]', 'text-white');
    btn.classList.add('bg-[#f4f6f9]', 'text-gray-700');
  });

  // ✅ Highlight the clicked button
  button.classList.add('active', 'bg-[#27ae60]', 'text-white');
  button.classList.remove('bg-[#f4f6f9]', 'text-gray-700');

  // ✅ Sort products by name
  products.sort((a, b) => {
    const nameA = a.dataset.name.toLowerCase();
    const nameB = b.dataset.name.toLowerCase();
    return order === 'asc' ? nameA.localeCompare(nameB) : nameB.localeCompare(nameA);
  });

  // ✅ Re-append sorted elements
  products.forEach(p => productList.appendChild(p));
}


  // Add active styling
  document.addEventListener('DOMContentLoaded', () => {
    const style = document.createElement('style');
    style.textContent = `
      .sort-btn-new.active {
        background-color: #27ae60 !important;
        color: white !important;
        transform: scale(1.02);
        box-shadow: 0 4px 10px rgba(39,174,96,0.3);
      }
    `;
    document.head.appendChild(style);
  });
 const slider = document.getElementById("bannerSlider");
  const indicators = document.querySelectorAll(".indicator");
  let index = 0;
  const total = indicators.length;

  function setBanner(i) {
    index = i;
    updateBanner();
  }

  function updateBanner() {
    slider.style.transform = `translateX(-${index * 100}%)`;
    indicators.forEach((btn, idx) => {
      btn.classList.toggle("bg-white", idx === index);
      btn.classList.toggle("bg-transparent", idx !== index);
    });
  }

  // Auto slide every 5 seconds
  setInterval(() => {
    index = (index + 1) % total;
    updateBanner();
  }, 5000);

  updateBanner();
</script>
</script>



</body>
</html>
