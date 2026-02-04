<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Deals | Yah Nursery & Landscape</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fdfdfb;
        }

        .heading-font {
            font-family: 'Playfair Display', serif;
        }

        /* --- New Sophisticated Animations --- */

        /* Reveal Animation for Grid Items */
        @keyframes revealUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-reveal {
            animation: revealUp 0.8s cubic-bezier(0.2, 0.8, 0.2, 1) forwards;
            opacity: 0;
        }

        /* Floating Image Animation */
        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0); }
            50% { transform: translateY(-10px) rotate(1deg); }
        }

        .group:hover .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        /* Shimmer Effect for Badges */
        @keyframes shimmer {
            0% { transform: translateX(-100%) skewX(-20deg); }
            100% { transform: translateX(200%) skewX(-20deg); }
        }

        .shimmer-container {
            position: relative;
            overflow: hidden;
        }

        .shimmer-container::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 50%;
            height: 100%;
            background: linear-gradient(to right, transparent, rgba(255,255,255,0.4), transparent);
            animation: shimmer 2.5s infinite;
        }

        /* Sophisticated Badge Animation */
        @keyframes subtleGlow {
            0%, 100% { box-shadow: 0 0 15px rgba(201,162,39,0.3); transform: translateY(0); }
            50% { box-shadow: 0 0 25px rgba(201,162,39,0.5); transform: translateY(-2px); }
        }

        .trending-badge {
            animation: subtleGlow 3s infinite ease-in-out;
            backdrop-filter: blur(4px);
        }

        /* Glass effect for image containers */
        .glass-bg {
            background: linear-gradient(135deg, rgba(244, 246, 239, 0.8) 0%, rgba(230, 235, 218, 0.6) 100%);
        }

        /* Custom Ribbon Shape */
        .bestseller-ribbon {
            clip-path: polygon(0 0, 100% 0, 100% 100%, 50% 85%, 0 100%);
        }

        /* Staggered Delay Utilities */
        .delay-1 { animation-delay: 0.1s; }
        .delay-2 { animation-delay: 0.2s; }
        .delay-3 { animation-delay: 0.3s; }
        .delay-4 { animation-delay: 0.4s; }
    </style>
</head>

<body class="text-[#2D301F]">

<!-- NAVBAR (DO NOT TOUCH) -->
<x-navbar />

<!-- MAIN CONTENT -->
<main class="max-w-7xl mx-auto px-6 lg:px-8 py-16">

    <!-- Header Section -->
    <div class="relative mb-16 animate-reveal">
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4">
            <div class="space-y-2">
                <span class="text-[#C9A227] font-semibold tracking-widest text-xs uppercase block transform transition-all hover:translate-x-1 duration-300">Curated Collection</span>
                <h2 class="text-4xl md:text-5xl font-bold text-[#3D4127] heading-font flex items-center gap-4">
                    Most Purchased
                    <span class="h-[1px] w-20 bg-[#C9A227]/30 hidden md:block origin-left scale-x-0 transition-transform duration-1000 delay-500 animate-[scaleX_1s_forwards]"></span>
                </h2>
            </div>
            <p class="text-gray-500 max-w-xs text-sm leading-relaxed border-l-2 border-[#C9A227]/20 pl-4 italic">
                Our most sought-after botanical treasures, handpicked for your green sanctuary.
            </p>
        </div>
    </div>

    <!-- PRODUCTS GRID -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">

        @forelse($mostPurchased as $index => $plant)
        <div class="group relative bg-white rounded-[2rem] transition-all duration-700 hover:-translate-y-2 animate-reveal" 
             style="animation-delay: {{ $index * 0.1 }}s">
            
            <!-- Shadow Layer -->
            <div class="absolute inset-0 bg-black/[0.03] rounded-[2rem] blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>

            <!-- Card Container -->
            <div class="relative bg-white rounded-[2rem] border border-gray-100 overflow-hidden shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_20px_50px_rgba(61,65,39,0.1)] transition-all duration-500">
                
                <!-- TRENDING BADGE (Top Right) -->
                @if($plant->total_sold >= 5)
                <div class="absolute top-5 right-5 z-20">
                    <span class="trending-badge shimmer-container flex items-center gap-1.5 bg-[#C9A227] text-white text-[10px] font-bold px-3 py-1.5 rounded-full tracking-tighter uppercase">
                        <i class="fa-solid fa-bolt-lightning text-[8px]"></i>
                        Trending
                    </span>
                </div>
                @endif

                <!-- BESTSELLER RIBBON (Top Left) -->
                @if($plant->total_sold >= 10)
                <div class="absolute top-0 left-6 z-20 w-8 h-12 bg-[#3D4127] bestseller-ribbon flex items-center justify-center transform -translate-y-1 group-hover:translate-y-0 transition-transform duration-500">
                    <i class="fa-solid fa-award text-white text-sm"></i>
                </div>
                @endif

                <!-- IMAGE AREA -->
                <div class="relative glass-bg m-4 rounded-[1.5rem] aspect-square overflow-hidden flex items-center justify-center group-hover:shadow-inner transition-all duration-500">
                    <img src="{{ asset('storage/' . ($plant->image ?? 'default.png')) }}"
                         alt="{{ $plant->name }}"
                         class="w-4/5 h-4/5 object-contain transition-transform duration-700 group-hover:scale-110 group-hover:rotate-2 animate-float">

                    <!-- Hover Quick Actions -->
                    <div class="absolute inset-0 bg-[#3D4127]/20 backdrop-blur-[2px] opacity-0 group-hover:opacity-100 transition-all duration-500 flex items-center justify-center">
                        <a href="{{ route('plant.show', $plant->id ?? '#') }}"
                           class="bg-white text-[#3D4127] p-4 rounded-full shadow-xl transform scale-50 group-hover:scale-100 transition-all duration-500 hover:bg-[#3D4127] hover:text-white">
                            <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- CONTENT AREA -->
                <div class="px-6 pb-8 pt-2 text-center">
                    <div class="flex flex-col items-center">
                        <span class="text-[10px] uppercase tracking-[0.2em] text-[#C9A227] font-bold mb-1 opacity-0 group-hover:opacity-100 transition-opacity duration-500 translate-y-2 group-hover:translate-y-0">Yah Exclusive</span>
                        <h3 class="text-xl font-bold text-[#3D4127] heading-font leading-tight mb-2 group-hover:text-[#636B2F] transition-colors">
                            {{ $plant->name }}
                        </h3>
                        
                        <div class="flex items-center gap-3 mb-4">
                            <span class="text-lg font-bold text-[#3D4127]">RM {{ number_format($plant->price, 2) }}</span>
                            <span class="h-4 w-[1px] bg-gray-200"></span>
                            <div class="flex items-center gap-1 text-[11px] font-semibold text-gray-400">
                                <i class="fa-solid fa-leaf text-[#636B2F] group-hover:rotate-12 transition-transform"></i>
                                {{ $plant->total_sold }} Sold
                            </div>
                        </div>

                        <!-- Secondary Action -->
                        <a href="{{ route('plant.show', $plant->id ?? '#') }}" 
                           class="text-xs font-bold uppercase tracking-widest text-[#3D4127] border-b border-[#3D4127]/20 pb-1 hover:border-[#3D4127] transition-all group-hover:tracking-[0.15em] duration-300">
                            Discover More
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <div class="col-span-full flex flex-col items-center justify-center py-32 opacity-40 animate-reveal">
            <i class="fa-solid fa-seedling text-6xl mb-4 animate-bounce"></i>
            <p class="text-xl italic font-light">New collections arriving soon...</p>
        </div>
        @endforelse

    </div>

    <!-- RECOMMENDATION SECTION -->
    <section class="mt-32 relative animate-reveal delay-3">
        <!-- Decorative Background Element -->
        <div class="absolute -top-10 -left-10 w-64 h-64 bg-[#F4F6EF] rounded-full mix-blend-multiply filter blur-3xl opacity-70 -z-10 animate-pulse"></div>
        
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-12">
            <div>
                <h2 class="text-3xl font-bold text-[#3D4127] heading-font italic">Recommended For You</h2>
                <div class="h-1 w-12 bg-[#636B2F] mt-2 rounded-full transition-all duration-1000 group-hover:w-24"></div>
            </div>
            <p class="text-sm text-gray-400 font-medium">Personalized selections for your style</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            {{-- Using $recommendedProducts assuming it is passed from the controller --}}
            @foreach($recommendedProducts ?? $mostPurchased as $index => $plant)
            <div class="group bg-white/50 backdrop-blur-sm rounded-[1.5rem] border border-gray-100 p-4 hover:bg-white hover:shadow-xl transition-all duration-500 animate-reveal"
                 style="animation-delay: {{ 0.4 + ($index * 0.1) }}s">
                <div class="relative bg-gray-50 rounded-[1.2rem] overflow-hidden mb-4 aspect-square">
                    <img src="{{ asset('storage/' . ($plant->image ?? 'default.png')) }}"
                         alt="{{ $plant->name }}"
                         class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                    
                    <span class="absolute bottom-3 left-3 bg-white/90 backdrop-blur text-[#3D4127] text-[10px] font-bold px-3 py-1 rounded-full shadow-sm shimmer-container">
                        Handpicked
                    </span>
                </div>

                <div class="px-2">
                    <h3 class="text-md font-bold text-[#3D4127] mb-1 truncate group-hover:text-[#636B2F] transition-colors">{{ $plant->name }}</h3>
                    <p class="text-[#636B2F] font-bold text-sm mb-4">RM {{ number_format($plant->price, 2) }}</p>
                    
                    <a href="{{ route('plant.show', $plant->id ?? '#') }}"
                       class="w-full flex items-center justify-center gap-2 py-3 rounded-xl border border-[#3D4127] text-[#3D4127] text-xs font-bold uppercase tracking-wider hover:bg-[#3D4127] hover:text-white transition-all duration-300 relative overflow-hidden group/btn">
                        <span class="relative z-10">View Product</span>
                        <i class="fa-solid fa-chevron-right text-[10px] relative z-10 group-hover/btn:translate-x-1 transition-transform"></i>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
    </section>
</main>

<!-- FOOTER (DO NOT TOUCH) -->
<x-footer />
@include('components.chatbot')
</body>
</html>