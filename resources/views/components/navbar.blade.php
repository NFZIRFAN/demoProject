<!-- ==========================================================
🌿 YAH NURSERY & LANDSCAPE HEADER (Organized + Explained)
========================================================== -->

<!-- ✅ Lucide Icons -->
<script src="https://unpkg.com/lucide@latest"></script>

<!-- ✅ Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<!-- ✅ Google Font for the logo -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<!-- ==========================================================
🌸 HEADER WRAPPER
========================================================== -->
<!-- ==========================================================
🌿 YAH NURSERY & LANDSCAPE HEADER (Professional Clean Version)
========================================================== -->
<!-- ==========================================================
🌿 YAH NURSERY & LANDSCAPE HEADER (Glassmorphism + Sticky)
========================================================== -->
<header class="sticky top-0 z-50 bg-white shadow-md font-poppins relative overflow-visible">
  <div class="max-w-7xl mx-auto flex flex-col items-center py-4 px-8 text-gray-800">
    

    <!-- 🌿 Top Row: Search | Logo | Icons -->
    <div class="w-full flex justify-between items-center mb-5">

      <!-- 🔍 Search Bar (Left) -->
<form action="{{ route('customer.dashboard') }}" method="GET"
        class="flex-1 md:flex md:w-1/3 flex items-center pr-2 md:pr-12 gap-2 min-w-0">
        <!-- 🍔 Mobile Menu Button -->
<button type="button" id="mobileMenuBtn"
        class="md:hidden text-2xl text-gray-700 mr-2">
  <i class="fa-solid fa-bars"></i>
</button>
<span class="md:hidden font-bold text-lg text-[#3D4127]">
  YAH
</span>


        <div class="relative w-full group">
          <input type="text" name="search" placeholder="Search ..."
                 class="w-full border border-gray-300 rounded-full py-2.5 px-4 pl-11 text-sm transition-all duration-300
                        focus:outline-none focus:ring-2 focus:ring-[#3D4127] focus:border-[#3D4127]
                        group-hover:shadow-md hover:shadow-sm hover:border-[#3D4127]">
<button type="button" class="absolute left-4 top-2.5 text-[#636B2F] transition-all duration-300 group-hover:scale-110 pointer-events-none">
            <i class="fa-solid fa-search"></i>
          </button>
        </div>
      </form>


      <!-- 🌸 Centered Logo -->
<div class="hidden md:flex w-1/3 justify-center mx-8">
        <span class="text-2xl font-extrabold bg-gradient-to-r from-[#3D4127] via-[#636B2F] to-[#3D4127]
                     bg-clip-text text-transparent drop-shadow-sm text-center transition-all duration-500"
              style="font-family: 'Playfair Display', serif;">
          YAH NURSERY & LANDSCAPE
        </span>
      </div>

      <!-- ❤️ Wishlist | 🛒 Cart | 👤 Profile -->
<div class="flex justify-end items-center gap-3 md:gap-6
            md:w-1/3 flex-shrink-0">

        <!-- Wishlist -->
        <a href="{{ route('wishlist.index') }}" class="relative flex items-center justify-center hover:text-[#636B2F] transition">
          <div class="relative">
            <i class="fa-solid fa-heart text-xl"></i>
            <span id="wishlist-count"
                  class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 bg-pink-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
              @php
                use App\Models\Wishlist;
                $wishlistCount = session()->has('customer_id')
                  ? Wishlist::where('customer_id', session('customer_id'))->count()
                  : 0;
              @endphp
              {{ $wishlistCount }}
            </span>
          </div>
        </a>

        <!-- Cart -->
        <a href="{{ route('cart.view') }}" class="relative flex items-center justify-center hover:text-[#636B2F] transition">
          <div class="relative">
            <i class="fa-solid fa-cart-shopping text-xl"></i>
            <span id="navbar-cart-count"
                  class="absolute top-0 right-0 translate-x-1/2 -translate-y-1/2 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
              @php
                use App\Models\Cart;
                $cartCount = session()->has('customer_id')
                  ? Cart::where('customer_id', session('customer_id'))->sum('quantity')
                  : 0;
              @endphp
              {{ $cartCount }}
            </span>
          </div>
        </a>

        <!-- Profile -->
        <div class="relative">
          <button id="profileButton" class="focus:outline-none flex items-center justify-center">
            @if(isset($customer) && $customer->profile_picture)
              <img src="{{ asset('storage/' . $customer->profile_picture) }}" 
                   alt="Profile" 
                   class="w-8 h-8 md:w-10 md:h-10 rounded-full object-cover border-2 border-gray-200 hover:scale-105 transition">
            @else
<i class="fa-solid fa-user-circle text-xl md:text-2xl">
            @endif
          </button>

          <!-- Dropdown -->
          <div id="profileDropdown" 
     class="hidden absolute right-0 mt-3 bg-white text-gray-700 rounded-lg shadow-lg w-48 py-2 border border-gray-100 
            transition-all duration-300 transform scale-95 opacity-0 origin-top-right z-[9999]">

            <div class="px-4 py-2 border-b border-gray-200">
              <p class="text-xs text-gray-500">Welcome back!</p>
              <p class="font-semibold text-sm">{{ $customer->firstname ?? 'Guest' }}</p>
            </div>
            <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-50">
              <i class="fa-solid fa-user mr-2 text-[#636B2F]"></i> My Profile
            </a>
            <a href="{{ route('customer.logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-50">
              <i class="fa-solid fa-right-from-bracket mr-2 text-red-500"></i> Logout
            </a>
          </div>
        </div>
      </div>
    </div>

   <!-- 🧭 NAVIGATION BELOW LOGO -->
<nav id="mainNav"
     class="mt-2 border-t border-gray-200 pt-3
            hidden md:block
            absolute md:static
            top-full left-0 w-full
            bg-white
            z-50">
<ul class="flex flex-col md:flex-row items-center md:justify-center
           space-y-4 md:space-y-0 md:space-x-10
           text-[15px] text-gray-700 tracking-wide uppercase">



    <!-- HOME -->
<li class="relative flex items-center">
      <a href="{{ route('customer.dashboard') }}" 
         class="font-bold relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                {{ request()->routeIs('customer.dashboard') ? 'text-[#636B2F] after:w-full' : '' }}
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 hover:after:w-full">
        Home
      </a>
    </li>

    <!-- CATEGORIES DROPDOWN -->
    <li class="relative group">
      <a href="javascript:void(0)" 
         class="font-bold flex items-center gap-1 relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 group-hover:after:w-full">
        Categories
        <i class="fa-solid fa-chevron-down text-xs ml-1"></i>
      </a>

      <ul class="absolute top-full mt-3 left-0 bg-white rounded-lg shadow-lg border border-gray-100
           opacity-0 invisible group-hover:opacity-100 group-hover:visible
           transform scale-y-0 group-hover:scale-y-100 transition-all duration-300
           origin-top min-w-[200px] z-50">

        <li><a href="{{ route('shop.category', 'indoor') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Indoor Plants</a></li>
        <li><a href="{{ route('shop.category', 'outdoor') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Outdoor Plants</a></li>
        <li><a href="{{ route('shop.category', 'pots') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Pots</a></li>
        <li><a href="{{ route('shop.category', 'fertilizers') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Fertilizers</a></li>
      </ul>
    </li>

    <!-- TOP DEALS -->
<li class="relative flex items-center">
      <a href="{{ route('top-deals') }}" 
         class="font-bold relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                {{ request()->routeIs('top-deals') ? 'text-[#636B2F] after:w-full' : '' }}
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 hover:after:w-full">
        Top Deals
      </a>
    </li>

    <!-- FAQ -->
<li class="relative flex items-center">
      <a href="{{ route('faq.page') }}" 
         class="font-bold relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                {{ request()->routeIs('faq.page') ? 'text-[#636B2F] after:w-full' : '' }}
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 hover:after:w-full">
        FAQ
      </a>
    </li>

    <!-- EXPLORE DROPDOWN -->
    <li class="relative group">
      <a href="javascript:void(0)" 
         class="font-bold flex items-center gap-1 relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 group-hover:after:w-full">
        Explore
        <i class="fa-solid fa-chevron-down text-xs ml-1"></i>
      </a>

      <ul class="absolute top-full mt-3 left-0 bg-white rounded-lg shadow-lg border border-gray-100
           opacity-0 invisible group-hover:opacity-100 group-hover:visible
           transform scale-y-0 group-hover:scale-y-100 transition-all duration-300
           origin-top min-w-[200px] z-50">

        <li><a href="{{ route('about') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">About Us</a></li>
        <li><a href="{{ route('blog') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Blog</a></li>
        <li><a href="{{ route('contact') }}" class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">Contact</a></li>
      </ul>
    </li>

    <!-- ORDERS DROPDOWN -->
    <li class="relative group">
      <a href="javascript:void(0)" 
         class="font-bold flex items-center gap-1 relative pb-2 transition-all duration-300 hover:text-[#636B2F]
                after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[2px] after:w-0 after:bg-[#636B2F] after:transition-all after:duration-300 group-hover:after:w-full">
        Orders
        <i class="fa-solid fa-chevron-down text-xs ml-1"></i>
      </a>

      <ul class="absolute top-full mt-3 left-0 bg-white rounded-lg shadow-lg border border-gray-100
           opacity-0 invisible group-hover:opacity-100 group-hover:visible
           transform scale-y-0 group-hover:scale-y-100 transition-all duration-300
           origin-top min-w-[200px] z-50">

        <li>
          <a href="{{ route('orders.history') }}" 
             class="font-bold block px-5 py-2.5 hover:bg-[#F8F9F4] hover:text-[#636B2F]">
            View Orders
          </a>
        </li>
      </ul>
    </li>

  </ul>
</nav>

  </div>
</header>

<!-- ==========================================================
🧠 PROFILE DROPDOWN SCRIPT
========================================================== -->
<script>
document.addEventListener("DOMContentLoaded", () => {
  const profileButton = document.getElementById("profileButton");
  const profileDropdown = document.getElementById("profileDropdown");

  profileButton?.addEventListener("click", (e) => {
    e.stopPropagation();
    profileDropdown.classList.toggle("hidden");
    if (!profileDropdown.classList.contains("hidden")) {
      profileDropdown.classList.remove("opacity-0", "scale-95");
      profileDropdown.classList.add("opacity-100", "scale-100");
    } else {
      profileDropdown.classList.remove("opacity-100", "scale-100");
      profileDropdown.classList.add("opacity-0", "scale-95");
    }
  });

  // Close dropdown on outside click
  document.addEventListener("click", () => {
    profileDropdown.classList.add("hidden", "opacity-0", "scale-95");
    profileDropdown.classList.remove("opacity-100", "scale-100");
  });
});
</script>

<!-- ==========================================================
🛒 CART COUNT AUTO-UPDATE SCRIPT
========================================================== -->
<script>
document.addEventListener('DOMContentLoaded', function () {
  const navbarBadge = document.getElementById('navbar-cart-count');

  async function updateCartCount() {
    const res = await fetch("{{ route('cart.count') }}");
    const data = await res.json();
    if (navbarBadge) {
      navbarBadge.innerText = data.count;
      
      localStorage.setItem('cart_count', data.count);
    }
  }

  updateCartCount();

  // Listen for manual updates from other scripts
  window.addEventListener('cartUpdated', (e) => {
    const count = e.detail.count;
    navbarBadge.innerText = count;
    if (count > 0) navbarBadge.classList.remove('hidden');
    localStorage.setItem('cart_count', count);
  });
});
</script>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const wishlistCountEl = document.getElementById("wishlist-count");

    // Listen for wishlist update events
    window.addEventListener("wishlistUpdated", function(e) {
        const newCount = e.detail.count;

        if (wishlistCountEl) {
            wishlistCountEl.textContent = newCount;

            // Animation effect (optional but sexy)
            wishlistCountEl.classList.add("scale-125");
            setTimeout(() => wishlistCountEl.classList.remove("scale-125"), 200);
        }
    });
});
</script>
<script>
document.addEventListener("DOMContentLoaded", () => {
  const btn = document.getElementById("mobileMenuBtn");
  const nav = document.getElementById("mainNav");
  const icon = btn.querySelector("i");

  btn.addEventListener("click", () => {
    nav.classList.toggle("hidden");
    icon.classList.toggle("fa-bars");
    icon.classList.toggle("fa-xmark");
  });
});
</script>
