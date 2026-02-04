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
      background-color: #ffffffff;
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
      background: #3D4127;
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

  .container {
  display: flex;
  flex-direction: column; /* keep stacking items vertically */
  gap: 2.5rem;
  max-width: 1200px; /* limits width */
  margin: 0 auto;    /* centers horizontally */
  padding: 4rem 9rem; /* space inside container */
  width: 100%;
  box-sizing: border-box; /* ensures padding is included in width */
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
  /* Fancy button hover effect */
.shop-now-btn {
  background: linear-gradient(135deg, #06b6d4, #22c55e); /* teal to emerald */
  color: #fff;
  font-family: 'Dancing Script', cursive; /* fancy banner font */
  font-size: 1.125rem;
  font-weight: 700;
  padding: 0.75rem 2rem;
  border-radius: 16px;
  box-shadow: 0 6px 20px rgba(6, 182, 212, 0.4);
  transition: all 0.3s ease;
  position: relative;
  overflow: hidden;
}

.shop-now-btn::before {
  content: '';
  position: absolute;
  left: -50%;
  top: -50%;
  width: 200%;
  height: 200%;
  background: rgba(255, 255, 255, 0.2);
  transform: rotate(45deg) translateX(-100%);
  transition: all 0.5s ease;
}

.shop-now-btn:hover::before {
  transform: rotate(45deg) translateX(100%);
}

.shop-now-btn:hover {
  transform: scale(1.1) translateY(-3px);
  box-shadow: 0 10px 30px rgba(6, 182, 212, 0.6);
}

/* Banner text fancy fonts */
.banner-text h2 {
  font-family: 'Playfair Display', serif; /* elegant and professional */
  text-shadow: 0 2px 6px rgba(0,0,0,0.5);
}

.banner-text p {
  font-family: 'Montserrat', sans-serif;
  font-weight: 500;
  text-shadow: 0 1px 4px rgba(0,0,0,0.4);
}
/* From Uiverse.io by adamgiebl */ 
button {
  display: flex;
  align-items: center;
  font-family: inherit;
  cursor: pointer;
  font-weight: 500;
  font-size: 17px;
  padding: 0.8em 1.3em 0.8em 0.9em;
  color: white;
  background: #ad5389;
  background: linear-gradient(to right, #0f0c29, #302b63, #24243e);
  border: none;
  letter-spacing: 0.05em;
  border-radius: 16px;
}

button svg {
  margin-right: 3px;
  transform: rotate(30deg);
  transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
}

button span {
  transition: transform 0.5s cubic-bezier(0.76, 0, 0.24, 1);
}

button:hover svg {
  transform: translateX(5px) rotate(90deg);
}

button:hover span {
  transform: translateX(7px);
}
/* Olive green colors */
.bg-olive-700 { background-color: #556b2f; }
.hover\:bg-olive-600:hover { background-color: #6b8e23; }

/* Rocket bounce animation */
@keyframes bounceRocket {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-6px); }
}

.animate-bounceRocket {
  animation: bounceRocket 0.8s infinite;
}
/* Premium Button Glow Effect */
button:hover {
  transform: translateY(-2px);
}

button:active {
  transform: translateY(0);
  box-shadow: 0 2px 10px rgba(27, 67, 50, 0.15) inset;
}

/* Smooth color transition */
button {
  background-size: 200% auto;
}

button:hover {
  background-position: right center;
}
@keyframes arrowPulse {
  0%, 100% {
    transform: translateX(0);
    opacity: 0.8;
  }
  50% {
    transform: translateX(4px);
    opacity: 1;
  }
}
#pageNumbers button {
  border-radius: 9999px; /* fully rounded buttons */
  transition: all 0.3s ease;
  box-shadow: 0 2px 6px rgba(0,0,0,0.1);
}

#pageNumbers button:hover {
  transform: scale(1.05);
}

  </style>
</head>
<body>
<x-navbar />

<!-- 🌿 Clean & Professional Banner Slider -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- 🌿 Elegant Banner Slider -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<div class="relative w-full h-[550px] overflow-hidden font-[Poppins]">

  <!-- 🖼️ Slider Wrapper -->
  <div id="bannerSlider" class="flex transition-transform duration-700 ease-in-out h-full">
    
    <!-- 🌞 Slide 1 -->
    <div class="w-full flex-shrink-0 relative h-full">
      <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0">
        <source src="{{ asset('storage/video/b9.mp4') }}" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent z-10 pointer-events-none"></div>
      <div class="absolute inset-0 flex flex-col justify-center items-end pr-16 text-right text-white z-20 space-y-4">
        <h2 class="text-5xl md:text-7xl font-['Playfair_Display'] font-semibold drop-shadow-lg leading-tight">Summer Sale!</h2>
        <p class="text-lg md:text-2xl font-['Poppins'] italic">Up to <span class="font-semibold text-lime-200">50% off</span> selected plants.</p>
        <span 
    onclick="window.location='#shop'" 
    class="cursor-pointer text-xl md:text-2xl font-['Playfair_Display'] font-semibold tracking-wide underline decoration-lime-200 hover:decoration-lime-400 transition-all duration-300">
    Shop Now →
</span>
      </div>
    </div>

    <!-- 🌼 Slide 2 -->
    <div class="w-full flex-shrink-0 relative h-full">
  <!-- 🎥 Background video -->
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0">
    <source src="{{ asset('storage/video/b10.mp4') }}" type="video/mp4">
  </video>

  <!-- 🌫️ Overlay for contrast -->
  <div class="absolute inset-0 bg-gradient-to-r from-black/50 to-transparent z-10 pointer-events-none"></div>

  <!-- 📝 Text container (Left aligned) -->
  <div class="absolute inset-0 flex flex-col justify-center items-start pl-16 text-left text-white z-20 space-y-4">
    <h2 class="text-5xl md:text-7xl font-['Playfair_Display'] font-semibold drop-shadow-lg leading-tight">
      Exclusive Discounts!
    </h2>
    <p class="text-lg md:text-2xl font-['Poppins'] italic">
      Sign up today and enjoy free shipping.
    </p>
    <span 
    onclick="window.location='#shop'" 
    class="cursor-pointer text-xl md:text-2xl font-['Playfair_Display'] font-semibold tracking-wide underline decoration-lime-200 hover:decoration-lime-400 transition-all duration-300">
    Shop Now →
</span>
  </div>
</div>


    <!-- 🌸 Slide 3 -->
    <div class="w-full flex-shrink-0 relative h-full">
      <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover pointer-events-none z-0">
        <source src="{{ asset('storage/video/b11.mp4') }}" type="video/mp4">
      </video>
      <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent z-10 pointer-events-none"></div>
      <div class="absolute inset-0 flex flex-col justify-center items-center text-center text-white px-6 z-20 space-y-4">
        <h2 class="text-5xl md:text-7xl font-['Playfair_Display'] font-semibold drop-shadow-lg leading-tight">Limited Time Offer!</h2>
        <p class="text-lg md:text-2xl font-['Poppins'] italic">Get your favorite plants delivered to your door.</p>
        <span 
    onclick="window.location='#shop'" 
    class="cursor-pointer text-xl md:text-2xl font-['Playfair_Display'] font-semibold tracking-wide underline decoration-lime-200 hover:decoration-lime-400 transition-all duration-300">
    Shop Now →
</span>

      </div>
    </div>
  </div>

  <!-- ⚪ Dots + Arrows Bottom Center -->
<div class="absolute bottom-6 left-1/2 transform -translate-x-1/2 flex items-center space-x-4 z-30">

  <!-- ◀️ Prev -->
  <button id="prevSlide" class="bg-black/30 hover:bg-black/50 text-white rounded-full p-2 transition">
    <i class="fa-solid fa-chevron-left text-sm"></i>
  </button>

  <!-- ⚪ Dots -->
  <div class="flex space-x-2">
    <span class="dot w-3 h-3 rounded-full bg-white/40 border border-[#BAC095] cursor-pointer transition-all duration-300"></span>
    <span class="dot w-3 h-3 rounded-full bg-white/40 border border-[#BAC095] cursor-pointer transition-all duration-300"></span>
    <span class="dot w-3 h-3 rounded-full bg-white/40 border border-[#BAC095] cursor-pointer transition-all duration-300"></span>
  </div>

  <!-- ▶️ Next -->
  <button id="nextSlide" class="bg-black/30 hover:bg-black/50 text-white rounded-full p-2 transition">
    <i class="fa-solid fa-chevron-right text-sm"></i>
  </button>
</div>

</div>

<!-- FontAwesome for arrows -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

<!-- 🧠 Slider Script -->
<script>
  const slider = document.getElementById('bannerSlider');
  const dots = document.querySelectorAll('.dot');
  const totalSlides = dots.length;
  let currentSlide = 0;
  let autoSlideInterval;

  function updateSlider(index) {
    slider.style.transform = `translateX(-${index * 100}%)`;
    dots.forEach((dot, i) => {
      if (i === index) {
        dot.style.backgroundColor = '#BAC095';
        dot.style.transform = 'scale(1.2)';
      } else {
        dot.style.backgroundColor = 'rgba(255,255,255,0.4)';
        dot.style.transform = 'scale(1)';
      }
    });
  }

  function nextSlide() {
    currentSlide = (currentSlide + 1) % totalSlides;
    updateSlider(currentSlide);
  }

  function prevSlide() {
    currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
    updateSlider(currentSlide);
  }

  // Manual navigation
  document.getElementById('nextSlide').addEventListener('click', () => {
    nextSlide();
    resetAutoSlide();
  });

  document.getElementById('prevSlide').addEventListener('click', () => {
    prevSlide();
    resetAutoSlide();
  });

  // Dot click
  dots.forEach((dot, index) => {
    dot.addEventListener('click', () => {
      currentSlide = index;
      updateSlider(currentSlide);
      resetAutoSlide();
    });
  });

  // Auto rotation every 4 seconds
  function startAutoSlide() {
    autoSlideInterval = setInterval(nextSlide, 4000);
  }

  function resetAutoSlide() {
    clearInterval(autoSlideInterval);
    startAutoSlide();
  }

  updateSlider(currentSlide);
  startAutoSlide();
</script>

<!-- Sidebar Overlay -->
<div id="filterSidebarOverlay" class="fixed inset-0 bg-black/40 z-40 hidden"></div>

<!-- Slide-Out Sidebar -->
<div id="filterSidebar" class="fixed top-0 right-0 h-full w-80 bg-white shadow-xl z-50 transform translate-x-full transition-transform duration-300 flex flex-col">
  
  <!-- Header -->
  <div class="flex justify-between items-center p-4 border-b border-gray-200">
    <h3 class="text-[#242f1a] font-semibold">FILTER PRODUCTS</h3>
    <button id="closeFilterSidebar" class="text-gray-500 hover:text-gray-800 text-xl">&times;</button>
  </div>

  <!-- Sidebar Content -->
  <div class="p-4 flex-1 overflow-y-auto">

    <!-- Search -->
    <div class="mb-4 relative">
      <i class="fa fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      <input type="text" id="searchInput" placeholder="Search" class="pl-10 pr-3 py-2 rounded-lg border border-gray-300 w-full focus:outline-none focus:ring-2 focus:ring-[#3D4127]">
    </div>

    <!-- Categories -->
    <h3 class="font-semibold mb-2 text-gray-700">Categories</h3>
    <ul class="category-list space-y-1 mb-4">
      <li><button onclick="filterByCategory('all', this)" class="active w-full text-left px-3 py-1 rounded hover:bg-[#3D4127]">All Products</button></li>
      <li><button onclick="filterByCategory('indoor', this)" class="w-full text-left px-3 py-1 rounded hover:bg-[#3D4127]">Indoor Plants</button></li>
      <li><button onclick="filterByCategory('outdoor', this)" class="w-full text-left px-3 py-1 rounded hover:bg-[#3D4127]">Outdoor Plants</button></li>
      <li><button onclick="filterByCategory('pots', this)" class="w-full text-left px-3 py-1 rounded hover:bg-[#3D4127]">Pots</button></li>
      <li><button onclick="filterByCategory('fertilizers', this)" class="w-full text-left px-3 py-1 rounded hover:bg-[#3D4127]">Fertilizers</button></li>
    </ul>

    <!-- Price -->
    <h3 class="font-semibold mb-2 text-gray-700">Price</h3>
    <ul class="price-list space-y-1 mb-4">
      <li><button onclick="filterByPrice('all', this)" class="active w-full text-left px-3 py-1 rounded hover:bg-black-100">All Prices</button></li>
      <li><button onclick="filterByPrice('0-10', this)" class="w-full text-left px-3 py-1 rounded hover:bg-black-100">RM0 - RM10</button></li>
      <li><button onclick="filterByPrice('10-20', this)" class="w-full text-left px-3 py-1 rounded hover:bg-black-100">RM10 - RM20</button></li>
      <li><button onclick="filterByPrice('20-50', this)" class="w-full text-left px-3 py-1 rounded hover:bg-black-100">RM20 - RM50</button></li>
      <li><button onclick="filterByPrice('50-100', this)" class="w-full text-left px-3 py-1 rounded hover:bg-black-100">RM50 - RM100</button></li>
      <li><button onclick="filterByPrice('100+', this)" class="w-full text-left px-3 py-1 rounded hover:bg-black-100">RM100+</button></li>
    </ul>
  </div>

  
</div>

<div id="productSlider" class="shop-area w-full bg-white pt-8 md:pt-7 pb-16 md:pb-20 font-sans">

  <!-- Load Tailwind CSS components for modern icons (using Lucide) -->
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- 🌱 Shop Section Container: Focus on spacious, centered content -->
  <div class="container mx-auto flex flex-col w-full px-4 md:px-12 max-w-7xl">

    <!-- Header: Clean, minimalist separation -->
    <div class="flex items-center justify-between mb-6">
      <div class="flex flex-col">
        <h1 class="text-4xl md:text-5xl font-extrabold tracking-tight text-[#3D4127]"
            style="font-family: 'Playfair Display', serif;">
          Shop and get your products
        </h1>
        <p class="text-lg font-medium text-gray-500 mt-1">
          Showing all product found&nbsp;
          <span id="productCount"
                class="font-extrabold text-[#3D4127] transition-all duration-500 ease-in-out">
            0
          </span> results. Explore the collection.
        </p>
      </div>

      <!-- Right Column: Grid Toggles and Filter Button -->
      <div class="flex items-center space-x-4">

        <!-- Grid View Toggles - Now with explicit icons -->
        <div class="hidden md:flex items-center space-x-1 p-1 bg-gray-100 rounded-xl shadow-inner ">
          <button class="view-toggle-btn p-2 rounded-lg text-gray-600 transition-all hover:bg-gray-200"
                  data-cols="2" title="2 items per row">
            <!-- 2-Column Icon -->
            <i data-lucide="columns-2" class="w-5 h-5"></i>
          </button>
          <button class="view-toggle-btn p-2 rounded-lg text-gray-600 transition-all hover:bg-gray-200"
                  data-cols="3" title="3 items per row">
            <!-- 3-Column Icon -->
            <i data-lucide="columns-3" class="w-5 h-5"></i>
          </button>
          <button class="view-toggle-btn p-2 rounded-lg text-white bg-[#1b4332] transition-all hover:bg-[#3D4127]"
                  data-cols="4" title="4 items per row">
            <!-- 4-Column Icon (Custom SVG) -->
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
              <rect x="3" y="3" width="18" height="18" rx="2" stroke-width="2"></rect>
              <line x1="7.5" y1="3" x2="7.5" y2="21" stroke-width="1.5"></line>
              <line x1="12" y1="3" x2="12" y2="21" stroke-width="1.5"></line>
              <line x1="16.5" y1="3" x2="16.5" y2="21" stroke-width="1.5"></line>
            </svg>
          </button>
        </div>

        <!-- Filter Button -->
        <button id="openFilterSidebar"
          class="flex items-center gap-3 px-6 py-3 rounded-full font-bold text-white text-base
                 bg-[#3D4127] hover:bg-[#BAC095] shadow-lg shadow-[#2d6a4f]/30 
                 transition-all duration-300 transform hover:scale-[1.02] focus:ring-4 focus:ring-[#74c69d]">
          <svg class="w-5 h-5 animate-rocket-pulse" fill="currentColor" viewBox="0 0 24 24">
            <path d="M0 0h24v24H0z" fill="none"></path>
            <path d="M5 13c0-5.088 2.903-9.436 7-11.182C16.097 3.564 19 7.912 19 13
              c0 .823-.076 1.626-.22 2.403l1.94 1.832a.5.5 0 0 1 .095.603l-2.495 
              4.575a.5.5 0 0 1-.793.114l-2.234-2.234a1 1 0 0 0-.707-.293H9.414
              a1 1 0 0 0-.707.293l-2.234 2.234a.5.5 0 0 1-.793-.114l-2.495-4.575
              a.5.5 0 0 1 .095-.603l1.94-1.832C5.077 14.626 5 13.823 5 13z"/>
          </svg>
          <span>Filter Options</span>
        </button>
      </div>
      
    </div>
    
    <!-- Decorative Separator Line (Finer line) -->
    <div class="w-full h-px bg-gray-200 mb-4"></div>

    <!-- Product Grid: Base classes set for mobile (2) and tablet (3). Desktop classes handled by JS. -->
    <section id="productList"
      class="grid grid-cols-2 sm:grid-cols-3 gap-x-6 gap-y-10">
      
      @foreach($plants as $plant)
      <div
        class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 
               transition-all transform hover:-translate-y-1 duration-500 relative group"
        data-date="{{ $plant->created_at }}"
        data-name="{{ strtolower($plant->name) }}"
        data-price="{{ $plant->price }}"
        data-category="{{ strtolower($plant->category) }}">
        
        <!-- Product Image: Shorter aspect ratio (3:4) -->
        <div class="relative aspect-[3/4] bg-gray-50 overflow-hidden">
          <img src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}"
              class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

          <!-- Hover Overlay (Subtle) -->
          <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

          <!-- Wishlist Button (Smaller, less intrusive) -->
          @php
            $inWishlist = false;
            if (session()->has('customer_id')) {
                $inWishlist = \App\Models\Wishlist::where('customer_id', session('customer_id'))
                    ->where('plant_id', $plant->id)
                    ->exists();
            }
            $dataAttribute = $inWishlist ? 'true' : 'false';
            $iconClass = $inWishlist ? 'fa-solid text-red-500' : 'fa-regular text-gray-500';
          @endphp

          <button
            class="absolute top-3 right-3 bg-white/80 backdrop-blur-sm rounded-full p-2.5 text-gray-700 
                   hover:text-red-600 hover:bg-white transition duration-300 shadow-md z-10 wishlist-btn"
            data-plant-id="{{ $plant->id }}"
            data-in-wishlist="{{ $dataAttribute }}"
            title="Add to Wishlist">
            <i class="{{ $iconClass }} fa-heart text-lg"></i>
          </button>
        </div>

        <!-- Product Info: Compact and balanced -->
        <div class="p-4 flex flex-col justify-between">
          <div class="flex-grow">
            <!-- Name and Category: Clean alignment -->
            <span class="text-xs font-semibold uppercase text-gray-400 tracking-widest mb-1 block leading-none">
                {{ $plant->category ?? 'Item' }}
            </span>
            
            <h4 class="text-gray-900 text-xl font-semibold tracking-wide mb-2 transition-all duration-300 group-hover:text-[#1b4332]"
    style="font-family: 'Cinzel', serif; letter-spacing: 0.5px;">{{ $plant->name }}</h4>

            
            <!-- Price: Prominent but scaled down -->
            <p class="text-[#41532f] font-black text-xl">
              RM{{ number_format($plant->price, 2) }}
              @if($plant->old_price)
              <span class="text-gray-400 line-through text-sm ml-2 font-normal">
                RM{{ number_format($plant->old_price, 2) }}
              </span>
              @endif
            </p>
          </div>

          <form action="{{ route('plants.show', $plant->id) }}" method="GET" class="mt-4">

<button type="submit"
    class="group w-full py-2.5 rounded-lg text-sm font-semibold tracking-wide flex items-center justify-center gap-2
           text-white border border-[#636B2F]
           bg-gradient-to-r from-[#636B2F] to-[#8a9a6f]
           transition-all duration-500 ease-out shadow-sm hover:shadow-[0_6px_20px_rgba(138,154,111,0.4)]
           hover:from-[#a5af80] hover:to-[#6f7d54] hover:text-white
           focus:ring-2 focus:ring-[#BAC095]/50 focus:outline-none">
    <span>Show more</span>
    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-4 h-4 animate-[arrowPulse_1.8s_ease-in-out_infinite] transition-transform duration-300 group-hover:translate-x-2 group-hover:scale-110"
         fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
    </svg>
</button>

</form>

      </div>
      </div>
      @endforeach

      @if($plants->isEmpty())
      <p class="col-span-full text-center text-gray-500 py-20 text-xl italic bg-gray-50 rounded-xl shadow-inner border border-gray-100">
        No products found. We are always adding new collections!
      </p>
      @endif
    </section>
        <!-- Pagination -->
    <div id="pagination" class="flex justify-center items-center mt-10">
  <div id="pageNumbers" class="flex space-x-2 bg-white/80 backdrop-blur-md px-5 py-3 rounded-full shadow-md border border-gray-200">
  <div id="pageNumbers" class="flex space-x-2">
    <!-- Active Page -->
    <button class="px-3 py-1.5 rounded-full bg-[#040503] text-white font-semibold shadow-md hover:scale-105 transition duration-300">
      1
    </button>

    <!-- Other Pages -->
    <button class="px-3 py-1.5 rounded-full bg-[#3D4127] text-[#e7e7e7] font-medium hover:bg-[#636B2F] hover:text-white hover:scale-105 transition duration-300">
      2
    </button>

    <button class="px-3 py-1.5 rounded-full bg-[#3D4127] text-[#e7e7e7] font-medium hover:bg-[#636B2F] hover:text-white hover:scale-105 transition duration-300">
      3
    </button>
  </div>
</div>
  </div>
</div>
</div>
  
    <!-- ===== SHOP OUR COLLECTION (Luxury Redesign) ===== -->
    <section class="w-full bg-white py-24 rounded-[3rem] shadow-[0_-20px_80px_rgba(0,0,0,0.02)]">
        <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-12 fade-in-up">
            
            <!-- Main Title -->
            <div class="flex flex-col items-center mb-20 text-center">
                <span class="text-[#C9A227] text-[10px] font-bold tracking-[0.5em] uppercase mb-4">Discover More</span>
                <h1 class="elegant-title text-4xl sm:text-5xl text-[#3D4127] heading-font italic">
                    Shop Our Collection
                </h1>
                <div class="w-20 h-[1px] bg-[#C9A227] mt-8"></div>
            </div>

            <!-- Collection Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-12">
                
                <!-- Item 1: INDOOR PLANTS -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <a href="{{ route('shop.category', 'indoor') }}" class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-[#F8F7F3] shadow-lg hover:shadow-2xl transition-all duration-700 relative">
                        <img src="https://i.pinimg.com/736x/bf/2e/cb/bf2ecb701c452a6ac499a94c51f67170.jpg"
                             alt="Indoor plant"
                             class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-[1.1]">
                        
                        <!-- Premium Hover CTA -->
                        <div class="absolute inset-0 bg-[#3D4127]/30 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-700 flex items-center justify-center">
                            <span class="px-8 py-3 bg-white text-[#3D4127] text-[9px] font-bold tracking-[0.3em] uppercase rounded-full shadow-2xl hover:bg-[#3D4127] hover:text-white transition-all duration-300">
                                Explore
                            </span>
                        </div>
                    </a>
                    <div class="mt-8 text-center">
                        <p class="text-[11px] tracking-[0.4em] uppercase text-[#3D4127] font-bold mb-2 transition-all group-hover:tracking-[0.5em] duration-500">
                            Indoor Plants
                        </p>
                        <p class="text-[10px] text-gray-400 italic font-light">Elevated interior greens</p>
                    </div>
                </div>

                <!-- Item 2: OUTDOOR PLANTS -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <a href="{{ route('shop.category', 'outdoor') }}" class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-[#F8F7F3] shadow-lg hover:shadow-2xl transition-all duration-700 relative">
                        <img src="https://i.pinimg.com/1200x/c6/70/37/c6703719599bba00b0539d7291b42067.jpg"
                             alt="Outdoor plants"
                             class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-[1.1]">
                        <div class="absolute inset-0 bg-[#3D4127]/30 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-700 flex items-center justify-center">
                            <span class="px-8 py-3 bg-white text-[#3D4127] text-[9px] font-bold tracking-[0.3em] uppercase rounded-full shadow-2xl hover:bg-[#3D4127] hover:text-white transition-all duration-300">
                                Explore
                            </span>
                        </div>
                    </a>
                    <div class="mt-8 text-center">
                        <p class="text-[11px] tracking-[0.4em] uppercase text-[#3D4127] font-bold mb-2 transition-all group-hover:tracking-[0.5em] duration-500">
                            Outdoor Plants
                        </p>
                        <p class="text-[10px] text-gray-400 italic font-light">Hardy garden classics</p>
                    </div>
                </div>

                <!-- Item 3: POTS -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <a href="{{ route('shop.category', 'pots') }}" class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-[#F8F7F3] shadow-lg hover:shadow-2xl transition-all duration-700 relative">
                        <img src="https://i.pinimg.com/736x/17/d8/f9/17d8f9f8b89a6717863de423a92dd3c1.jpg"
                             alt="Modern pots"
                             class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-[1.1]">
                        <div class="absolute inset-0 bg-[#3D4127]/30 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-700 flex items-center justify-center">
                            <span class="px-8 py-3 bg-white text-[#3D4127] text-[9px] font-bold tracking-[0.3em] uppercase rounded-full shadow-2xl hover:bg-[#3D4127] hover:text-white transition-all duration-300">
                                Explore
                            </span>
                        </div>
                    </a>
                    <div class="mt-8 text-center">
                        <p class="text-[11px] tracking-[0.4em] uppercase text-[#3D4127] font-bold mb-2 transition-all group-hover:tracking-[0.5em] duration-500">
                            Vessels & Pots
                        </p>
                        <p class="text-[10px] text-gray-400 italic font-light">Artisan crafted ceramics</p>
                    </div>
                </div>

                <!-- Item 4: FERTILIZERS -->
                <div class="group flex flex-col items-center cursor-pointer">
                    <a href="{{ route('shop.category', 'fertilizers') }}" class="aspect-[4/5] w-full overflow-hidden rounded-2xl bg-[#F8F7F3] shadow-lg hover:shadow-2xl transition-all duration-700 relative">
                        <img src="https://pulpygarden.com/cdn/shop/products/IMG_0079-3_3024x.jpg?v=1660798526"
                             alt="Fertilizer"
                             class="w-full h-full object-cover transition-all duration-1000 group-hover:scale-[1.1]">
                        <div class="absolute inset-0 bg-[#3D4127]/30 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-700 flex items-center justify-center">
                            <span class="px-8 py-3 bg-white text-[#3D4127] text-[9px] font-bold tracking-[0.3em] uppercase rounded-full shadow-2xl hover:bg-[#3D4127] hover:text-white transition-all duration-300">
                                Explore
                            </span>
                        </div>
                    </a>
                    <div class="mt-8 text-center">
                        <p class="text-[11px] tracking-[0.4em] uppercase text-[#3D4127] font-bold mb-2 transition-all group-hover:tracking-[0.5em] duration-500">
                            Fertelizers
                        </p>
                        <p class="text-[10px] text-gray-400 italic font-light">Organic plant nutrition</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- JavaScript for Fade-in Animation -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in-up');
            
            // Set up Intersection Observer
            const observer = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                        observer.unobserve(entry.target); // Stop observing once visible
                    }
                });
            }, {
                root: null,
                rootMargin: '0px',
                threshold: 0.1 // Triggers when 10% of the element is visible
            });

            // Start observing the section
            elements.forEach(element => {
                observer.observe(element);
            });
        });
    </script>
     <style>
        /* Apply Inter as the default sans font */
        html { font-family: 'Inter', sans-serif; }
        /* Apply Playfair Display to the main header only */
        .elegant-title { font-family: 'Playfair Display', serif; }

        /* === Fade-in-up animation CSS === */
        .fade-in-up {
            opacity: 0;
            transform: translateY(40px);
            transition: opacity 1s cubic-bezier(0.25, 0.46, 0.45, 0.94), transform 1s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .fade-in-up.visible {
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'primary-text': '#333333',
                        'secondary-text': '#555555',
                        'bg-light': '#FFFFFF',
                    }
                }
            }
        }
    </script>
  <script>
// === Scroll animation for fade-in-up ===
document.addEventListener("DOMContentLoaded", () => {
  const elements = document.querySelectorAll('.fade-in-up');
  const observer = new IntersectionObserver(entries => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.2 });
  
  elements.forEach(el => observer.observe(el));
});
</script>

<!-- Custom Animations and Shadows -->
<style>
/* Custom Shadow for a premium look */
.shadow-2xl {
    box-shadow: 0 15px 30px -8px rgba(27, 67, 50, 0.15), 0 5px 10px -3px rgba(0, 0, 0, 0.03);
}

/* Custom Animation for the lively Rocket Icon (Retained) */
@keyframes rocket-pulse {
  0% { transform: translateY(0) rotate(0deg); opacity: 1; }
  25% { transform: translateY(-3px) rotate(-1deg); opacity: 0.95; }
  50% { transform: translateY(0) rotate(1deg); opacity: 1; }
  75% { transform: translateY(-2px) rotate(-0.5deg); opacity: 0.98; }
  100% { transform: translateY(0) rotate(0deg); opacity: 1; }
}
.animate-rocket-pulse {
  animation: rocket-pulse 2s infinite ease-in-out;
}
</style>
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@600;700&family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Initialize Lucide Icons
        lucide.createIcons();
        
        const productList = document.getElementById('productList');
        const viewButtons = document.querySelectorAll('.view-toggle-btn');
        
        // Classes to manage the desktop grid view
        const desktopGridClasses = [
            'lg:grid-cols-2', 'lg:grid-cols-3', 'lg:grid-cols-4',
            'xl:grid-cols-2', 'xl:grid-cols-3', 'xl:grid-cols-4'
        ];

        // Function to remove all desktop grid classes and set the new one
        function setGridColumns(cols) {
            const colsInt = parseInt(cols, 10);
            
            // Remove all existing desktop grid classes
            productList.classList.remove(...desktopGridClasses);

            // Add new desktop grid classes for large (lg) and extra-large (xl) screens
            const newClassLg = `lg:grid-cols-${colsInt}`;
            const newClassXl = `xl:grid-cols-${colsInt}`;
            
            productList.classList.add(newClassLg, newClassXl);

            // Update active button state styling
            viewButtons.forEach(btn => {
                const isActive = parseInt(btn.dataset.cols) === colsInt;
                
                // Toggle background color and text color for active/inactive state
                btn.classList.toggle('bg-[#BAC095]', isActive);
                btn.classList.toggle('text-black', isActive);
                btn.classList.toggle('text-gray-600', !isActive);
                btn.classList.toggle('hover:bg-[#3D4127]', !isActive);
                btn.classList.toggle('hover:bg-[#3D4127]', isActive);
                
                // Ensure SVG children inherit the current text color
                const icon = btn.querySelector('svg');
                if (icon) {
                    icon.setAttribute('stroke', isActive ? 'currentColor' : 'currentColor');
                }
            });
            
            // Persist the setting to local storage
            localStorage.setItem('productGridView', colsInt);
        }

        // Set up event listeners for view buttons
        viewButtons.forEach(button => {
            button.addEventListener('click', (event) => {
                // Read the desired column count from the data attribute
                const cols = event.currentTarget.dataset.cols;
                setGridColumns(cols);
            });
        });
        
        // --- Initialization on Load ---
        
        // Load preference or set default (4 columns)
        const savedView = localStorage.getItem('productGridView');
        const initialCols = savedView ? parseInt(savedView, 10) : 4;
        
        // Set initial view on load
        setGridColumns(initialCols);
        
    });
</script>

<x-footer />

<!-- ✅ SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.addEventListener("DOMContentLoaded", () => {
  /* ---------------------------
     Selectors & Initial Setup
     --------------------------- */
  const wishlistCountElement = document.getElementById("wishlist-count");
  const searchInput = document.getElementById("searchInput");
  const productList = document.getElementById("productList");
  const productCountEl = document.getElementById("productCount");
  const prevBtn = document.getElementById("prevPage");
  const nextBtn = document.getElementById("nextPage");
  const pageNumbersContainer = document.getElementById("pageNumbers");
  if (!productList) return console.warn("No #productList element found.");
  const productCards = Array.from(productList.querySelectorAll("[data-name]"));

  let currentPage = 1;
  const itemsPerPage = 8;
  const totalPages = Math.max(1, Math.ceil(productCards.length / itemsPerPage));

  let activeCategory = "all";
  let activePrice = "all";

  /* ---------------------------
     Wishlist Count Update
     --------------------------- */
  async function updateWishlistCount() {
    try {
      const res = await fetch("{{ route('wishlist.count') }}", {
        method: "GET",
        headers: {
          Accept: "application/json",
          "X-CSRF-TOKEN": "{{ csrf_token() }}"
        }
      });
      if (!res.ok) throw new Error("Failed to fetch wishlist count");
      const data = await res.json();
      wishlistCountElement.textContent = data.count ?? "?";
    } catch (err) {
      console.error("Wishlist count error:", err);
    }
  }

  /* ---------------------------
     Wishlist Icons
     --------------------------- */
  function initializeWishlistIcons() {
    document.querySelectorAll(".wishlist-btn").forEach(btn => {
      const icon = btn.querySelector("i");
      if (btn.dataset.inWishlist === "true") {
        icon.classList.remove("fa-regular");
        icon.classList.add("fa-solid", "text-red-500");
      } else {
        icon.classList.remove("fa-solid", "text-red-500");
        icon.classList.add("fa-regular");
      }
    });
  }

  /* ---------------------------
     Wishlist Click Handling
     --------------------------- */
  function attachWishlistHandlers() {
  document.querySelectorAll(".wishlist-btn").forEach(btn => {
    if (btn.__hasWishlistHandler) return;
    btn.__hasWishlistHandler = true;

    btn.addEventListener("click", async function (e) {
      e.preventDefault();
      const plantId = this.dataset.plantId;
      const icon = this.querySelector("i");
      if (!plantId) return;

      // ✅ Prevent re-clicking while loading
      if (this.classList.contains("loading")) return;

      // ✅ NEW: Show popup if already in wishlist
      if (this.dataset.inWishlist === "true") {
        Swal.fire({
          icon: "info",
          title: "Item already in your wishlist 🌿",
          timer: 1500,
          toast: true,
          position: "top-end",
          showConfirmButton: false
        });
        return; // stop here, don't call API again
      }

      this.classList.add("loading");

      try {
        const res = await fetch("{{ route('wishlist.store') }}", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
            Accept: "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          body: JSON.stringify({ plant_id: plantId })
        });

        const data = await res.json();
        if (!res.ok) throw new Error(data.error || "Request failed");

        if (data.success) {
          icon.classList.replace("fa-regular", "fa-solid");
          icon.classList.add("text-red-500");
          this.dataset.inWishlist = "true";

          Swal.fire({
            icon: "success",
            title: "Added to Wishlist ❤️",
            timer: 1500,
            toast: true,
            position: "top-end",
            showConfirmButton: false
          });
        } else if (data.deleted) {
          icon.classList.replace("fa-solid", "fa-regular");
          icon.classList.remove("text-red-500");
          this.dataset.inWishlist = "false";

          Swal.fire({
            icon: "info",
            title: "Removed from Wishlist 💔",
            timer: 1500,
            toast: true,
            position: "top-end",
            showConfirmButton: false
          });
        }

        updateWishlistCount();
      } catch (err) {
        console.error("Wishlist error:", err);
      } finally {
        this.classList.remove("loading");
      }
    });
  });
}


  /* ---------------------------
     Filtering System
     --------------------------- */
  function computeFilteredProducts() {
    const q = (searchInput?.value || "").toLowerCase();
    return productCards.filter(card => {
      const name = (card.dataset.name || "").toLowerCase();
      const category = (card.dataset.category || "").toLowerCase();
      const price = parseFloat(card.dataset.price || "0");

      const matchSearch = name.includes(q);
      const matchCategory = activeCategory === "all" || category === activeCategory;
      let matchPrice = false;

      switch (activePrice) {
        case "all": matchPrice = true; break;
        case "0-10": matchPrice = price >= 0 && price <= 10; break;
        case "10-20": matchPrice = price > 10 && price <= 20; break;
        case "20-50": matchPrice = price > 20 && price <= 50; break;
        case "50-100": matchPrice = price > 50 && price <= 100; break;
        case "100+": matchPrice = price > 100; break;
      }

      return matchSearch && matchCategory && matchPrice;
    });
  }

  function animateCount(element, target) {
    let count = 0;
    const duration = 800;
    const interval = 15;
    const increment = target / (duration / interval);

    const counter = setInterval(() => {
      count += increment;
      if (count >= target) {
        element.textContent = target;
        clearInterval(counter);
      } else {
        element.textContent = Math.floor(count);
      }
    }, interval);
  }

  function refreshAfterFilter() {
    const filtered = computeFilteredProducts();
    productCards.forEach(card => (card.style.display = "none"));
    filtered.slice(0, itemsPerPage).forEach(card => (card.style.display = ""));
    if (productCountEl) animateCount(productCountEl, filtered.length);
    buildPagination(filtered.length);
    showPage(currentPage, filtered);
  }

  /* ---------------------------
     Pagination
     --------------------------- */
  function buildPagination(filteredCount = productCards.length) {
    if (!pageNumbersContainer) return;
    pageNumbersContainer.innerHTML = "";
    const totalFilteredPages = Math.max(1, Math.ceil(filteredCount / itemsPerPage));

    for (let i = 1; i <= totalFilteredPages; i++) {
      const btn = document.createElement("button");
      btn.textContent = i;
      btn.className =
"page-btn px-4 py-2 rounded-full border border-[#3D4127] bg-[#D4DE95] text-[#3D4127] hover:bg-[#3D4127] hover:text-[#D4DE95] transition duration-300 font-medium shadow-sm hover:shadow-md"
      btn.addEventListener("click", () => {
        currentPage = i;
        showPage(i, computeFilteredProducts());
        highlightCurrentPage(); // ✅ highlight the active page
      });
      pageNumbersContainer.appendChild(btn);
    }

    highlightCurrentPage(); // ✅ highlight on first render
  }

  function showPage(page, filtered = computeFilteredProducts()) {
    if (page < 1) page = 1;
    const totalFilteredPages = Math.ceil(filtered.length / itemsPerPage);
    if (page > totalFilteredPages) page = totalFilteredPages;

    productCards.forEach(card => (card.style.display = "none"));
    const start = (page - 1) * itemsPerPage;
    const end = page * itemsPerPage;
    filtered.slice(start, end).forEach(card => (card.style.display = ""));
  }

  function highlightCurrentPage() {
  const buttons = document.querySelectorAll(".page-btn");

  buttons.forEach((btn, index) => {
    // Remove any existing highlight first
    btn.classList.remove(
      "bg-black",
      "text-white",
      "shadow-lg",
      "scale-105",
      "border",
      "border-black"
    );

    // Reset inactive pages
    btn.classList.add("bg-transparent", "text-black");

    // If this is the current page, apply highlight
    if (index + 1 === currentPage) {
      btn.classList.add(
        "bg-black",
        "text-white",
        "shadow-lg",
        "scale-105",
        "rounded-full",
        "border",
        "border-black"
      );
      btn.classList.remove("bg-transparent", "text-black");
    }
  });
}
  /* ---------------------------
     Filter Event Handlers
     --------------------------- */
  window.filterByCategory = (category, btnEl) => {
    activeCategory = category;
    document.querySelectorAll(".category-list button").forEach(b => b.classList.remove("active", "bg-black-700", "text-white"));
    btnEl?.classList.add("active", "bg-black-700", "text-white");
    currentPage = 1;
    refreshAfterFilter();
  };

  window.filterByPrice = (price, btnEl) => {
    activePrice = price;
    document.querySelectorAll(".price-list button").forEach(b => b.classList.remove("active", "bg-black-700", "text-white"));
    btnEl?.classList.add("active", "bg-black-700", "text-white");
    currentPage = 1;
    refreshAfterFilter();
  };

  if (searchInput) searchInput.addEventListener("input", () => refreshAfterFilter());

  /* ---------------------------
     Filter Dropdown Toggle
     --------------------------- */
  const filterBtn = document.getElementById("filterDropdownBtn");
  const filterDropdown = document.getElementById("filterDropdown");
  if (filterBtn && filterDropdown) {
    filterBtn.addEventListener("click", (e) => {
      e.stopPropagation();
      filterDropdown.classList.toggle("hidden");
    });
    document.addEventListener("click", (e) => {
      if (!filterDropdown.contains(e.target) && e.target !== filterBtn) {
        filterDropdown.classList.add("hidden");
      }
    });
  }

  /* ---------------------------
     Sidebar Filter (Mobile)
     --------------------------- */
  const openBtn = document.getElementById("openFilterSidebar");
  const closeBtn = document.getElementById("closeFilterSidebar");
  const sidebar = document.getElementById("filterSidebar");
  const overlay = document.getElementById("filterSidebarOverlay");
  const applyBtn = document.getElementById("applyFilterBtn");

  function openSidebar() {
    sidebar?.classList.remove("translate-x-full");
    overlay?.classList.remove("hidden");
  }
  function closeSidebar() {
    sidebar?.classList.add("translate-x-full");
    overlay?.classList.add("hidden");
  }
  openBtn?.addEventListener("click", openSidebar);
  closeBtn?.addEventListener("click", closeSidebar);
  overlay?.addEventListener("click", closeSidebar);
  applyBtn?.addEventListener("click", () => {
    const sidebarSearchInput = document.getElementById("sidebarSearchInput");
    if (sidebarSearchInput && searchInput) searchInput.value = sidebarSearchInput.value;
    refreshAfterFilter();
    closeSidebar();
  });

  /* ---------------------------
     Initialize Everything
     --------------------------- */
  initializeWishlistIcons();
  attachWishlistHandlers();
  updateWishlistCount();
  buildPagination();
  showPage(1);
  if (productCountEl) animateCount(productCountEl, productCards.length);
});
</script>
@include('components.chatbot')

<div id="toastContainer" class="hidden"></div>


<script>
document.addEventListener('DOMContentLoaded', () => {

    function showToast(message, type = 'success') {
    const toast = document.createElement('div');

    toast.className = `
        w-full max-w-xl mx-6
        px-8 py-6 rounded-[3rem]
        shadow-[0_40px_120px_rgba(0,0,0,0.35)]
        border
        flex items-center gap-10
        transition-all duration-700 ease-out
        scale-90 opacity-0
        ${type === 'success'
            ? 'bg-white border-[#C9A227]/30 text-[#3D4127]'
            : 'bg-white border-red-300 text-red-700'}
    `;

    toast.innerHTML = `
        <!-- Icon -->
        <div class="flex-shrink-0 w-24 h-24 rounded-full
                    ${type === 'success' ? 'bg-[#3D4127] text-white' : 'bg-red-500 text-white'}
                    flex items-center justify-center shadow-2xl">
            <i class="fas ${type === 'success' ? 'fa-check' : 'fa-times'} text-4xl"></i>
        </div>

        <!-- Content -->
        <div class="flex-1 space-y-4">
            <p class="text-sm font-bold tracking-[0.5em] uppercase text-[#C9A227]">
                Payment Successful
            </p>

            <h2 class="text-3xl md:text-4xl font-light leading-tight">
                ${message}
            </h2>

            <p class="text-gray-500 text-lg font-light">
                Thank you for trusting Yah Nursery & Landscape.
            </p>
        </div>

        <!-- Close -->
        <button class="text-gray-400 hover:text-[#3D4127] transition text-3xl">
            &times;
        </button>
    `;

    toast.querySelector('button').addEventListener('click', () => closeToast());

    function closeToast() {
        toast.classList.add('opacity-0', 'scale-90');
        setTimeout(() => {
            toast.remove();
        }, 400);
    }

    // CENTERED CONTAINER
    const container = document.getElementById('toastContainer');
    container.innerHTML = '';
    container.classList.remove('hidden');

    container.style.position = 'fixed';
    container.style.top = '50%';
    container.style.left = '50%';
    container.style.transform = 'translate(-50%, -50%)';
    container.style.zIndex = '9999';
    container.style.display = 'flex';
    container.style.justifyContent = 'center';
    container.style.alignItems = 'center';

    container.appendChild(toast);

    requestAnimationFrame(() => {
        toast.classList.remove('opacity-0', 'scale-90');
        toast.classList.add('opacity-100', 'scale-100');
    });

    setTimeout(closeToast, 6000);
}


    @if(session('success'))
        showToast("{{ session('success') }}", 'success');
    @endif

});
</script>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>
