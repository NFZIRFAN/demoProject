<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $category }} Plants</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --color-primary: #3D4127;
            --color-accent: #636B2F;
        }
        .title-font { font-family: 'Playfair Display', serif; }
        .body-font { font-family: 'Inter', sans-serif; }
        .active-filter { background-color: var(--color-primary); color: white; }
        /* Hide scrollbar but allow scroll */
/* Hide scrollbar but still allow scroll */
body {
    overflow-y: scroll;       /* Allow vertical scrolling */
    -ms-overflow-style: none; /* IE and Edge */
    scrollbar-width: none;    /* Firefox */
}

body::-webkit-scrollbar {
    display: none;            /* Chrome, Safari, Opera */
}


    </style>
</head>
<body class="body-font text-gray-700 bg-white min-h-screen">

<x-navbar />

<!-- 🌿 Category Title Section -->
<section class="relative bg-gradient-to-r from-[#BAC095]/20 via-[#DDE2C6]/50 to-[#BAC095]/20 py-16 md:py-24 text-center border-b border-gray-100">
    <div class="container mx-auto px-8 max-w-4xl">
        <p class="text-sm tracking-wide text-gray-600 mb-4">
            <a href="/" class="hover:text-[var(--color-accent)] transition">Home</a>
            <span class="mx-2 text-gray-400">/</span>
            <a href="{{ route('shop.index') }}" class="hover:text-[var(--color-accent)] transition">Shop</a>
            <span class="mx-2 text-gray-400">/</span>
            <span class="font-semibold text-[var(--color-primary)]">{{ $category }}</span>
        </p>

        <!-- Main Title -->
        <h1 class="text-6xl md:text-7xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#3D4127] to-[#636B2F] mb-4 title-font">
            {{ $category }} Products
        </h1>

        <!-- Decorative Underline -->
        <div class="w-24 h-1 mx-auto bg-gradient-to-r from-[#3D4127] to-[#636B2F] rounded-full mb-6"></div>

        <!-- Subtitle / Description -->
        <p class="text-lg md:text-xl text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Explore our premium collection of <span class="font-semibold text-[var(--color-primary)]">{{ strtolower($category) }}</span> plants, carefully curated to bring life and elegance to your home and garden.
        </p>
    </div>
</section>


<!-- 🌱 Filter Section -->
<section class="py-6 bg-white border-b border-gray-100">
    <div class="container mx-auto px-4 md:px-12 max-w-7xl flex flex-wrap gap-4">
        <div class="flex items-center gap-2 flex-wrap">
            <span class="font-semibold text-gray-700">Filter by Price:</span>
            <button onclick="filterByPrice('all', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">All</button>
            <button onclick="filterByPrice('0-10', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">RM 0 - 10</button>
            <button onclick="filterByPrice('10-20', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">RM 10 - 20</button>
            <button onclick="filterByPrice('20-50', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">RM 20 - 50</button>
            <button onclick="filterByPrice('50-100', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">RM 50 - 100</button>
            <button onclick="filterByPrice('100+', this)" class="px-4 py-1 border rounded hover:bg-[#3D4127] hover:text-white">RM 100+</button>
        </div>
    </div>
</section>

<!-- 🌱 Product Grid -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4 md:px-12 max-w-7xl py-12">

      
       <!-- 🌿 Product Section Header -->
        <div class="mb-12 md:mb-16 text-left">
            <div class="mb-8">
  <!-- Main Title -->
  <h1 class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-[#3D4127] to-[#636B2F] tracking-wide title-font
             relative inline-block transition-transform duration-500 hover:scale-105">
    {{ strtoupper($category->name ?? ' COLLECTION') }}
    <!-- subtle shine effect -->
    <span class="absolute inset-0 bg-gradient-to-r from-white/30 via-white/10 to-white/30 opacity-0 hover:opacity-50 transition-opacity rounded-lg mix-blend-overlay"></span>
  </h1>

  <!-- Subtitle aligned left -->
  <p class="mt-2 text-lg md:text-xl text-gray-700 font-medium text-left max-w-3xl">
    Discover our premium selection of product carefully chosen to make your home and garden vibrant and healthy.
  </p>
</div>

         <!-- Decorative Underline -->
        <div class="w-20 h-1 bg-gradient-to-r from-[#3D4127] to-[#636B2F] rounded-full mt-4 mb-4"></div>

        <!-- Product Count -->
             <p class="text-lg md:text-xl text-gray-600 font-medium">
             Showing <span class="font-extrabold text-[#3D4127]" id="productCount">{{ $plants->count() }}</span> products.
             </p>
        </div>


        <!-- Centered Grid -->
        <div class="flex justify-center">
            <section id="productList" class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-6 max-w-[1400px]">
                @forelse($plants as $plant)
                @php
                    $inWishlist = false;
                    if(session()->has('customer_id')) {
                        $inWishlist = \App\Models\Wishlist::where('customer_id', session('customer_id'))
                            ->where('plant_id', $plant->id)
                            ->exists();
                    }
                @endphp

                <div class="bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl border border-gray-100 
                            transition-all transform hover:-translate-y-1 duration-500 relative group"
                     data-category="{{ strtolower($plant->category) }}"
                     data-price="{{ $plant->price }}"
                     data-name="{{ strtolower($plant->name) }}">

                    <div class="relative aspect-[3/4] bg-gray-50 overflow-hidden">
                        <img src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}"
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">

                        <div class="absolute inset-0 bg-black/5 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

              @php
    $inWishlist = false;
    $customerId = session('customer_id') ?? null;
    if($customerId) {
        $inWishlist = \App\Models\Wishlist::where('customer_id', $customerId)
            ->where('plant_id', $plant->id)
            ->exists();
    }
@endphp

<button class="wishlist-btn absolute top-3 right-3 bg-white/80 backdrop-blur-sm rounded-full p-2.5 
               hover:text-red-600 hover:bg-white transition duration-300 shadow-md z-10"
        data-plant-id="{{ $plant->id }}"
        data-in-wishlist="{{ $inWishlist ? 'true' : 'false' }}"
        title="Add to Wishlist">
    <i class="{{ $inWishlist ? 'fa-solid text-red-500' : 'fa-regular text-gray-500' }} fa-heart text-lg"></i>
</button>

                    </div>

                    <div class="p-4 flex flex-col justify-between">
                        <div class="flex-grow">
                            <span class="text-xs font-semibold uppercase text-gray-400 tracking-widest mb-1 block">
                                {{ $plant->category ?? 'Item' }}
                            </span>
                            <h4 class="text-gray-900 text-xl font-semibold tracking-wide mb-2 transition-all duration-300 group-hover:text-[#1b4332]"
                                style="font-family: 'Cinzel', serif; letter-spacing: 0.5px;">
                                {{ $plant->name }}
                            </h4>
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
                @empty
                <p class="col-span-full text-center text-gray-500 py-20 text-xl italic bg-gray-50 rounded-xl shadow-inner border border-gray-100">
                    No products found in this category.
                </p>
                @endforelse
            </section>
        </div>
    </div>
</section>


<x-footer />
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener("DOMContentLoaded", () => {

    // Price filter logic
    const productList = document.getElementById("productList");
    const productCards = Array.from(productList.querySelectorAll("[data-price]"));
    const productCountEl = document.getElementById("productCount");

    let activePrice = 'all';
    
    function updateProductDisplay() {
        let filtered = productCards.filter(card => {
            const price = parseFloat(card.dataset.price || 0);
            switch(activePrice){
                case '0-10': return price >= 0 && price <= 10;
                case '10-20': return price > 10 && price <= 20;
                case '20-50': return price > 20 && price <= 50;
                case '50-100': return price > 50 && price <= 100;
                case '100+': return price > 100;
                default: return true;
            }
        });

        filtered.sort((a,b)=> parseFloat(a.dataset.price)-parseFloat(b.dataset.price));

        productCards.forEach(card => card.style.display = 'none');
        filtered.forEach(card => card.style.display = '');

        if(productCountEl) productCountEl.textContent = filtered.length;
    }

    window.filterByPrice = (price, btnEl) => {
        activePrice = price;
        document.querySelectorAll('section button').forEach(b => b.classList.remove('active-filter'));
        btnEl.classList.add('active-filter');
        updateProductDisplay();
    };

    // Wishlist button logic
    document.addEventListener("click", async (e) => {
        const btn = e.target.closest(".wishlist-btn");
        if(!btn) return;

        const icon = btn.querySelector("i");
        const plantId = btn.dataset.plantId;
        if(!plantId) return;
        if(btn.classList.contains("loading")) return;

        btn.classList.add("loading");

        try {
            const res = await fetch("{{ route('wishlist.store') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "Accept": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ plant_id: plantId })
            });

            const data = await res.json();

            if(res.ok && data.success) {
                icon.classList.replace(btn.dataset.inWishlist === "true" ? 'fa-solid':'fa-regular', btn.dataset.inWishlist === "true" ? 'fa-regular':'fa-solid');
                icon.classList.toggle('text-red-500');
                btn.dataset.inWishlist = btn.dataset.inWishlist === "true" ? "false":"true";

                Swal.fire({
                    icon: btn.dataset.inWishlist === "true" ? 'success':'info',
                    title: btn.dataset.inWishlist === "true" ? 'Added to wishlist ❤️':'Removed from wishlist 💔',
                    timer:1500,
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false
                });

                // Update navbar wishlist count
                window.dispatchEvent(new CustomEvent('wishlistUpdated', { detail:{ count: data.count } }));

            } else {
                Swal.fire({
                    icon:'error',
                    title: data.message || 'Failed',
                    timer:1500,
                    toast:true,
                    position:'top-end',
                    showConfirmButton:false
                });
            }
        } catch(err){
            console.error(err);
        } finally{
            btn.classList.remove('loading');
        }
    });

});
</script>
@include('components.chatbot')
</body>
</html>
