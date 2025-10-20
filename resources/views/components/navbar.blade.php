 <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>

<header
  class="flex items-center justify-between py-3 px-8 bg-gradient-to-r from-[#43322A] to-[#254126] shadow-md sticky top-0 z-50 text-white font-poppins tracking-wide">

  <!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

<!-- 🌿 Logo -->
<a href="{{ route('customer.dashboard') }}" class="flex items-center gap-2 whitespace-nowrap">
  <i data-lucide="tree-deciduous" class="w-6 h-6 text-green-300"></i>
  <span class="text-3xl font-bold" style="font-family: 'Playfair Display', serif;">NURSERY</span>
</a>

   <!-- 🌐 Navigation -->
<nav class="flex-1 flex justify-center" style="font-family: 'Permanent Marker', cursive;">
  <ul class="flex space-x-10 text-white text-[15px] items-center">

    <li class="relative group">
      <a href="{{ route('customer.dashboard') }}" class="flex items-center gap-2 transition hover:text-green-300">
        HOME
      </a>
      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center 
                   {{ request()->routeIs('customer.dashboard') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
    </li>

    <li class="relative group">
      <a href="{{ route('about') }}" class="flex items-center gap-2 transition hover:text-green-300">
        ABOUT US
      </a>
      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center
                   {{ request()->routeIs('about') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
    </li>

    <li class="relative group">
      <a href="#" class="flex items-center gap-2 transition hover:text-green-300">
        TOP DEALS
      </a>
      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center
                   scale-x-0 group-hover:scale-x-100"></span>
    </li>

    <li class="relative group">
      <a href="{{ route('blog') }}" class="flex items-center gap-2 transition hover:text-green-300">
        BLOG
      </a>
      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center
                   {{ request()->routeIs('blog') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
    </li>

    <!-- 🪴 Category Dropdown -->
    <li class="group relative">
      <a href="javascript:void(0)" class="flex items-center gap-1 text-white transition hover:text-green-300" style="font-family: 'Permanent Marker', cursive;">
  CATEGORIES
  <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" class="ml-1 inline-block" viewBox="0 0 24 24">
    <path d="M12 16a1 1 0 0 1-.71-.29l-6-6a1 1 0 0 1 1.42-1.42l5.29 5.3 5.29-5.29a1 1 0 0 1 1.41 1.41l-6 6a1 1 0 0 1-.7.29z" fill="currentColor"/>
  </svg>
</a>

      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center
                   scale-x-0 group-hover:scale-x-100"></span>

      <ul class="absolute top-8 left-0 z-50 bg-white rounded-xl shadow-lg max-h-0 opacity-0 overflow-hidden transform scale-y-0
                 group-hover:opacity-100 group-hover:max-h-[700px] group-hover:scale-y-100 group-hover:pb-4 group-hover:pt-4 transition-all duration-700 ease-[cubic-bezier(0.23,1,0.32,1)] origin-top min-w-[230px]">
        <!-- Dropdown Items -->
        <li class="border-b border-gray-200 py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="leaf" class="w-5 h-5 text-green-500"></i> Houseplants
          </a>
        </li>
        <li class="border-b border-gray-200 py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="tree-pine" class="w-5 h-5 text-green-500"></i> Outdoor Plants
          </a>
        </li>
        <li class="border-b border-gray-200 py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="flower-2" class="w-5 h-5 text-green-500"></i> Specialty Plants
          </a>
        </li>
        <li class="border-b border-gray-200 py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="square" class="w-5 h-5 text-green-500"></i> Containers & Pots
          </a>
        </li>
        <li class="border-b border-gray-200 py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="sprout" class="w-5 h-5 text-green-500"></i> Soil & Fertilizers
          </a>
        </li>
        <li class="py-3 px-6">
          <a href="#" class="hover:text-green-600 text-gray-800 flex items-center gap-2">
            <i data-lucide="wrench" class="w-5 h-5 text-green-500"></i> Tools & Accessories
          </a>
        </li>
      </ul>
    </li>

    <li class="relative group">
      <a href="{{ route('contact') }}" class="flex items-center gap-2 transition hover:text-green-300">
        CONTACT
      </a>
      <span class="absolute bottom-[-3px] left-0 w-full h-0.5 bg-green-300 rounded-full transition-transform duration-300 origin-center
                   {{ request()->routeIs('contact') ? 'scale-x-100' : 'scale-x-0 group-hover:scale-x-100' }}"></span>
    </li>
  </ul>
</nav>


  <!-- ❤️ Wishlist / 🛒 Cart / 👤 Profile -->
  <div class="flex items-center space-x-5">

    <!-- ❤️ Wishlist -->
    <a href="{{ route('wishlist.index') }}" class="relative flex flex-col items-center justify-center text-white hover:text-gray-200 transition">
      <i data-lucide="heart" class="w-6 h-6"></i>
      <span class="text-xs font-semibold">Wishlist</span>
      @php
        use App\Models\Wishlist;
        $wishlistCount = session()->has('customer_id')
          ? Wishlist::where('customer_id', session('customer_id'))->count()
          : 0;
      @endphp
      <span id="wishlist-count"
      class="absolute -top-1 -right-2 bg-pink-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">
  {{ $wishlistCount }}
</span>

    </a>

    <!-- 🛒 Cart -->
    <a href="{{ route('cart.view') }}" class="relative flex flex-col items-center justify-center text-white hover:text-gray-200 transition">
      <i data-lucide="shopping-cart" class="w-6 h-6"></i>
      <span class="text-xs font-semibold">Cart</span>
      @php
        use App\Models\Cart;
        $cartCount = session()->has('customer_id')
          ? Cart::where('customer_id', session('customer_id'))->sum('quantity')
          : 0;
      @endphp
      @if($cartCount > 0)
          <span id="navbar-cart-count" class="absolute -top-1 -right-2 bg-red-500 text-white text-[10px] px-1.5 py-0.5 rounded-full font-bold">{{ $cartCount }}</span>
      @endif
    </a>

    <!-- 👤 Profile -->
    <div class="relative">
      <button id="profileButton" class="focus:outline-none">
        @if(isset($customer) && $customer->profile_picture)
          <img src="{{ asset('storage/' . $customer->profile_picture) }}" alt="Profile"
               class="w-10 h-10 rounded-full object-cover border-2 border-white hover:opacity-90 transition">
        @else
          <img src="https://via.placeholder.com/40" alt="Profile"
               class="w-10 h-10 rounded-full object-cover border-2 border-white hover:opacity-90 transition">
        @endif
      </button>

      <!-- Dropdown -->
      <div id="profileDropdown"
           class="hidden absolute right-0 mt-3 bg-white text-gray-700 rounded-lg shadow-lg w-48 py-2 border border-gray-100 transition-all duration-300 transform scale-95 opacity-0 origin-top-right">
        <div class="px-4 py-2 border-b border-gray-200">
          <p class="text-xs text-gray-500">Welcome back!</p>
          <p class="font-semibold text-sm">{{ $customer->firstname ?? 'Guest' }}</p>
        </div>
        <a href="{{ route('customer.profile') }}" class="block px-4 py-2 text-sm hover:bg-gray-50">My Profile</a>
        <a href="{{ route('customer.logout') }}" class="block px-4 py-2 text-sm text-red-500 hover:bg-gray-50">Logout</a>
      </div>
    </div>
  </div>
</header>

<!-- ✅ Scripts -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>
  document.addEventListener("DOMContentLoaded", () => {
    lucide.createIcons();

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

    document.addEventListener("click", () => {
      profileDropdown.classList.add("hidden", "opacity-0", "scale-95");
      profileDropdown.classList.remove("opacity-100", "scale-100");
    });
  });
</script>
<!-- ✅ Navbar Cart Update Script -->
<script>
document.addEventListener('DOMContentLoaded', function () {
    const navbarBadge = document.getElementById('navbar-cart-count');

    function updateCartCount() {
        fetch("{{ route('cart.count') }}")
            .then(res => res.json())
            .then(data => {
                if (navbarBadge) {
                    navbarBadge.innerText = data.count;
                    if (data.count > 0) {
                        navbarBadge.classList.remove('hidden');
                    } else {
                        navbarBadge.classList.add('hidden');
                    }
                    localStorage.setItem('cart_count', data.count);
                }
            });
    }

    updateCartCount();

    window.addEventListener('cartUpdated', function (e) {
        const count = e.detail.count;
        if (navbarBadge) {
            navbarBadge.innerText = count;
            if (count > 0) navbarBadge.classList.remove('hidden');
            localStorage.setItem('cart_count', count);
        }
    });

    document.querySelectorAll('nav a').forEach(link => {
        link.addEventListener('click', () => {
            setTimeout(updateCartCount, 200);
        });
    });

    const savedCount = localStorage.getItem('cart_count');
    if (savedCount && navbarBadge) {
        navbarBadge.innerText = savedCount;
        if (savedCount > 0) navbarBadge.classList.remove('hidden');
    }
});
</script>

