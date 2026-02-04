<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $plant->name }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    :root{
      --green: #27ae60;
      --green-dark: #219150;
      --muted: #777;
      --card-bg: #ffffff;
      --surface: rgba(0,0,0,0.06);
    }
    *{ box-sizing: border-box; }
    
    /* --- CORE LAYOUT CHANGES FOR FIXED HEADER/FOOTER --- */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #ffffffff, #ffffffff);
      margin: 0;
      padding: 0; /* Removed body padding */
      color: #243130;
      
      /* Flexbox setup for true sticky layout */
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }
    /* Wrapper to contain all content and provide clearance for fixed elements */
    .content-main-wrapper {
      flex-grow: 1; /* Allows content to take up vertical space between header/footer */
      /* Clearance for fixed Navbar (approx 54px high) */
      padding-top: 64px; 
      /* Clearance for fixed Footer (approx 40px high) */
      padding-bottom: 52px; 
      /* Re-applying the original body's horizontal padding */
      padding-left: 40px; 
      padding-right: 40px;
      width: 100%;
      box-sizing: border-box;
    }
    
    /* Adjusting top-right cart position for fixed nav */
    #pageCartTop {
        top: 70px !important; /* Move down past the fixed navbar */
        right: 40px !important; /* Align with new content padding */
    }

    /* --- END CORE LAYOUT CHANGES --- */

    /* Card */
    .container {
      display:flex;
      gap:40px;
      background: var(--card-bg);
      padding:30px;
      border-radius:15px;
      box-shadow:0 10px 30px rgba(5,30,15,0.08);
      max-width:1100px;
      margin:30px auto; /* Added vertical margin for spacing */
      align-items:center;
      position: relative;
    }

    /* Image area */
    .image { flex:1; overflow:hidden; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.12); cursor:zoom-in; }
    .image img { width:100%; border-radius:12px; display:block; transition: transform .5s ease, box-shadow .5s ease; }
    .image img:hover { transform: scale(1.03); box-shadow:0 18px 40px rgba(10,40,20,0.14); }

    /* Details */
    .details { flex:1.2; display:flex; flex-direction:column; justify-content:center; position:relative; padding:8px 20px; }
    .details h2 { margin-bottom:10px; font-size:30px; color:#636B2F; }
    .price { font-size:24px; font-weight:700; color:#636B2F; margin-bottom:8px; }
    .old-price { text-decoration:line-through; color: gray; font-size:14px; margin-left:8px; font-weight:500; }
.description strong {
  font-family: 'Playfair Display', serif;
  font-weight: 700;
  color: #3D4127; /* dark brown for emphasis */
  display: block;
  margin-bottom: 6px;
  font-size: 16px;
}

.description span {
  font-family: 'Merriweather', serif; /* Secondary elegant serif for body */
  font-weight: 400;
  color: #4b5563;
  font-size: 15px;
}
.category {
  margin-bottom: 14px;
  font-size: 14px;
  color: #3D4127; /* Darker brown for elegance */
  font-family: 'Playfair Display', serif; /* Fancy serif font */
  font-weight: 500;
  letter-spacing: 0.5px;
  text-transform: uppercase; /* subtle premium style */
}

.category strong {
  font-weight: 700;
  color: #636B2F; /* Highlight key label with your accent green */
  margin-right: 4px;
}

    /* Form + Buttons - Fancy Upgrade */
.qty-box {
  display: flex;
  align-items: center;
  gap: 12px;
  margin-top: 12px; /* More spacing for elegance */
}

input[type="number"] {
  width: 90px;
  padding: 12px;
  border-radius: 12px;
  border: 1.5px solid #cbd5b1; /* subtle soft border */
  font-size: 15px;
  font-family: 'Poppins', sans-serif; /* modern and clean */
  text-align: center;
  color: #3D4127;
  outline: none;
  transition: all 0.3s ease;
}

input[type="number"]:focus {
  border-color: #636B2F;
  box-shadow: 0 4px 12px rgba(99,107,47,0.2);
}

/* Primary Buttons */
.btn {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  gap: 8px;
  padding: 12px 20px;
  background: linear-gradient(135deg, #636B2F, #3D4127);
  color: #fff;
  border: none;
  border-radius: 12px;
  font-size: 15px;
  font-family: 'Poppins', sans-serif;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 10px 18px rgba(39,174,96,0.15);
  transition: all 0.3s ease;
  text-decoration: none;
}

.btn:hover {
  background: linear-gradient(135deg, #3D4127, #636B2F);
  transform: translateY(-3px);
  box-shadow: 0 18px 30px rgba(34,139,77,0.18);
}

.btn:active {
  transform: translateY(1px);
  box-shadow: 0 6px 12px rgba(39,174,96,0.12);
}

.btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
  box-shadow: none;
  transform: none;
}


hr {
  border: none; 
  border-top: 1px solid #636B2F; /* thicker and matches your theme */
  margin: 22px 0;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.08); /* subtle depth */
}

   /* Floating Cart FAB in top-right of product details */
.cart-fab {
  position: absolute;
  top: -20px;
  right: 12px;
  display: inline-flex;
  align-items: center;
  gap: 12px;
  background: rgba(255, 255, 255, 0.95);
  padding: 10px 16px;
  border-radius: 999px;
  box-shadow: 0 10px 28px rgba(0, 0, 0, 0.12);
  border: 1px solid rgba(34, 139, 77, 0.08);
  backdrop-filter: blur(8px);
  transition: transform 0.2s ease, box-shadow 0.2s ease;
  cursor: pointer;
  z-index: 30;
}
.cart-fab:hover {
  transform: translateY(-6px) scale(1.05);
  box-shadow: 0 24px 48px rgba(0, 0, 0, 0.16);
}

/* Cart Icon inside FAB */
.cart-icon {
  width: 36px;
  height: 36px;
  display: grid;
  place-items: center;
  background: linear-gradient(135deg, #636B2F, #3D4127);
  color: white;
  border-radius: 50%;
  box-shadow: 0 8px 22px rgba(39, 174, 96, 0.2);
  font-size: 18px;
  transition: transform 0.18s ease, box-shadow 0.18s ease;
}
.cart-fab:hover .cart-icon {
  transform: rotate(-8deg) scale(1.08);
  box-shadow: 0 12px 26px rgba(39, 174, 96, 0.28);
}

/* Badge */
.cart-badge {
  display: inline-block;
  background: #ff3b30;
  color: white;
  padding: 5px 10px;
  border-radius: 999px;
  font-size: 13px;
  font-weight: 700;
  line-height: 1;
  min-width: 36px;
  text-align: center;
  box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);
  transition: transform 0.28s ease, box-shadow 0.28s ease;
}
.cart-badge::after {
  content: '';
  display: block;
  position: absolute;
  width: 8px;
  height: 8px;
  background: #fff;
  border-radius: 50%;
  top: 6px;
  right: 6px;
  box-shadow: 0 0 6px rgba(255, 255, 255, 0.6);
}

/* Optional: subtle bounce on add */
.cart-fab.added {
  animation: bounce 0.4s ease forwards;
}
@keyframes bounce {
  0% { transform: translateY(-6px) scale(1.05); }
  50% { transform: translateY(-12px) scale(1.12); }
  100% { transform: translateY(-6px) scale(1.05); }
}


    /* small ring pulse on update */
    .ring {
      position: relative;
    }
    .ring::after {
      content: "";
      position: absolute;
      inset: -6px;
      border-radius: 999px;
      background: radial-gradient(circle at center, rgba(34,139,77,0.08), transparent 40%);
      animation: ring 600ms ease;
      pointer-events: none;
    }
    @keyframes ring {
      0% { transform: scale(.7); opacity: 0.9; }
      60% { transform: scale(1.12); opacity: 0.45; }
      100% { transform: scale(1.4); opacity: 0; }
    }

    /* responsive tweaks */
    @media (max-width:900px){
      .container { flex-direction: column; padding:18px; margin: 20px auto; }
      .cart-fab { position: fixed; top: 12px; right: 12px; }
      .details{ padding: 12px 8px; }
      .content-main-wrapper {
        padding-left: 12px; 
        padding-right: 12px;
      }
      #pageCartTop {
          right: 12px !important; 
      }
    }

    /* ===========================
        MODAL IMAGE FULLSCREEN
        =========================== */
    .modal {
      display:none;
      position: fixed;
      z-index: 9999;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background: rgba(0,0,0,0.85);
      align-items: center;
      justify-content: center;
      cursor: zoom-out;
    }
    .modal img {
      max-width: 90%;
      max-height: 90%;
      border-radius:12px;
      transition: transform 0.3s ease;
      cursor: grab;
    }
    .modal .close {
      position:absolute;
      top:20px;
      right:20px;
      color:white;
      font-size:36px;
      font-weight:bold;
      cursor:pointer;
    }
    
  </style>
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
  <!-- ===== Navbar ===== -->
   <x-navbar />
   <!-- ===== Banner Video Section ===== -->
<!-- ===== Banner Video Section ===== -->
<section class="relative w-full h-[650px] md:h-[500px] lg:h-[600px] overflow-hidden">

  <!-- 🌿 Background Video -->
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover z-0">
    <source src="{{ asset('storage/video/b13.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- 🌫️ Soft Overlay -->
  <div class="absolute inset-0 bg-black/30 z-10"></div>

  <!-- ✨ Text Overlay -->
  <div class="absolute inset-0 flex flex-col items-center justify-center text-center z-20 px-6">
    <h1 class="text-4xl md:text-6xl lg:text-7xl font-serif font-extrabold text-white drop-shadow-2xl leading-tight"
        style="font-family: 'Playfair Display', serif; letter-spacing: 1px;">
      Product Information
    </h1>

    <p class="mt-5 md:mt-6 text-base md:text-xl lg:text-2xl text-white/90 font-serif max-w-2xl drop-shadow-md"
       style="font-family: 'Merriweather', serif; font-weight: 400; letter-spacing: 0.5px;">
      Exquisite Botanicals Handpicked to Elevate Your Space
    </p>

    <a href="#shop"
       class="mt-8 md:mt-10 inline-block px-8 py-4 md:px-10 md:py-5 bg-gradient-to-r from-[#636B2F] to-[#3D4127] text-white text-lg font-serif font-semibold rounded-full shadow-lg hover:from-[#3D4127] hover:to-[#636B2F] transition-all duration-300 transform hover:scale-105"
       style="font-family: 'Playfair Display', serif;">
      Explore Collection
    </a>
  </div>
</section>

  <style>
    /* Luxury Reveal Animation */
    @keyframes revealIn {
        from { 
            opacity: 0; 
            transform: translateY(40px) scale(0.98); 
            filter: blur(15px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0) scale(1); 
            filter: blur(0); 
        }
    }

    /* Subtle Continuous Floating */
    @keyframes floatingItem {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-10px); }
        100% { transform: translateY(0px); }
    }

    /* Shimmering Gold Sweep */
    @keyframes shimmerSweep {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }

    .treasure-reveal {
        opacity: 0;
        animation: revealIn 1.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .luxury-card {
        box-shadow: 0 10px 40px -10px rgba(0,0,0,0.02);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(229, 231, 235, 0.4);
        position: relative;
    }

    .luxury-main-container {
        background: #fdfdfb;
        border-radius: 3rem;
        box-shadow: 0 40px 100px -20px rgba(0,0,0,0.05);
        overflow: hidden;
        animation: floatingItem 8s ease-in-out infinite;
        /* Adjusted width for a more elegant, less "heavy" feel */
        max-width: 90%;
        margin: 0 auto;
    }

    .shimmer-text {
        background: linear-gradient(90deg, #3D4127 0%, #C9A227 50%, #3D4127 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shimmerSweep 5s linear infinite;
    }

    .glass-badge-luxury {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.4);
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
    }

    .btn-luxury-action {
        transition: all 0.5s cubic-bezier(0.23, 1, 0.32, 1);
        letter-spacing: 0.2em;
        position: relative;
        overflow: hidden;
    }

    .btn-luxury-action:hover {
        transform: translateY(-3px);
        box-shadow: 0 20px 40px rgba(61, 65, 39, 0.2);
    }

    .qty-input-luxury {
        border: 1px solid #e5e7eb;
        border-radius: 100px;
        padding: 0.75rem 1.25rem;
        outline: none;
        transition: all 0.3s;
        width: 70px;
        text-align: center;
        font-weight: 600;
    }

    .qty-input-luxury:focus {
        border-color: #C9A227;
        box-shadow: 0 0 0 3px rgba(201, 162, 39, 0.1);
    }
</style>

<div class="content-main-wrapper py-20 px-6">

    <div class="max-w-7xl mx-auto treasure-reveal">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-16 items-center">
            
            <!-- LEFT: PRODUCT IMAGE (Refined Scale) -->
            <div class="lg:col-span-5 flex justify-center">
                <div class="luxury-main-container group cursor-zoom-in relative">
                    <img id="plantImage" 
                         src="{{ asset('storage/'.$plant->image) }}" 
                         alt="{{ $plant->name }}"
                         class="w-full aspect-[4/5] object-cover transition-transform duration-1000 group-hover:scale-105">
                    
                    <div class="absolute bottom-6 left-6">
                        <span class="glass-badge-luxury text-[8px] font-bold tracking-[0.4em] uppercase px-5 py-2.5 rounded-full">
                            Artisan Perspective
                        </span>
                    </div>
                </div>
            </div>

            <!-- RIGHT: PRODUCT DETAILS -->
            <div class="lg:col-span-7 space-y-10">
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <span class="text-[#C9A227] text-[10px] font-bold tracking-[0.5em] uppercase">{{ $plant->category }}</span>
                        <div class="w-1 h-1 rounded-full bg-gray-200"></div>
                        <span class="text-gray-400 text-[10px] font-bold tracking-[0.5em] uppercase">Limited Heritage Series</span>
                    </div>
                    
                    <h2 class="text-5xl md:text-6xl text-[#3D4127] font-bold leading-tight" style="font-family: 'Playfair Display', serif;">
                        {{ $plant->name }}
                    </h2>
                    
                    <div class="flex items-center gap-6">
                        <p class="text-3xl font-light text-[#3D4127] tracking-tighter">RM{{ number_format($plant->price, 2) }}</p>
                        @if($plant->old_price)
                            <span class="text-lg text-gray-400 line-through opacity-50">RM{{ number_format($plant->old_price, 2) }}</span>
                        @endif
                    </div>
                </div>

                <div class="max-w-xl space-y-3">
                      <span class="text-[14px] font-bold tracking-[0.4em] uppercase text-[#C9A227]">
                      Description
                      </span>

                      <p class="text-gray-500 leading-relaxed font-light text-lg italic 
                          border-l-2 border-[#C9A227]/30 pl-6">
                                {{ $plant->description 
                                ?? 'An exquisite botanical specimen, thoughtfully cultivated and selected for its refined character, natural harmony, and enduring elegance—crafted to elevate any living space with quiet sophistication.' }}
                      </p>
                </div>
                <!-- Status & Quantity -->
                <div class="flex flex-wrap items-center gap-8 py-4">
                    <div class="flex items-center gap-3">
                        <span class="text-[14px] font-bold uppercase tracking-widest text-gray-400">Current Stock</span>
                        <span class="px-4 py-2 rounded-full text-[14px] font-bold text-white shadow-lg shadow-[#636B2F]/20" 
                              style="background: {{ $plant->stock_quantity <= $plant->reorder_level ? 'linear-gradient(135deg, #e74c3c, #c0392b)' : 'linear-gradient(135deg, #585d3dff, #1a1c11)' }}">
                            {{ $plant->stock_quantity }} Remaining
                        </span>
                    </div>
                </div>

                <!-- Plant Care (Glassmorphism) -->
                <div class="glass-badge-luxury p-8 rounded-[2.5rem] border border-[#C9A227]/10">
                    <h3 class="text-[#3D4127] font-bold text-lg mb-4 tracking-wide" style="font-family: 'Playfair Display', serif;">
                        Plant Care Instruction
                    </h3>
                    <p class="text-[#636B2F] text-sm leading-relaxed opacity-90">
                        {!! nl2br(e($plant->plant_care ?? 'Preserve the botanical integrity through gentle hydration and indirect celestial lighting.')) !!}
                    </p>
                </div>

                <!-- Form Action -->
                <form id="add-to-cart-form" class="flex flex-wrap items-center gap-6">
                    @csrf
                    <div class="relative">
                        <input type="number" name="quantity" id="quantity" value="1" min="1" class="qty-input-luxury">
                    </div>
                    <button id="addBtn" type="submit" class="flex-1 btn-luxury-action bg-[#3D4127] text-white px-10 py-5 rounded-full text-[10px] font-bold uppercase shadow-2xl hover:bg-[#2a2d1a] flex items-center justify-center gap-4">
                        <i class="fa fa-star-of-life text-[8px] opacity-40"></i>
                        Add to Cart
                    </button>
                </form>

                <!-- Trust Footer -->
                <div class="pt-8 border-t border-gray-100">
                    <p class="text-[14px] font-bold uppercase tracking-[0.4em] text-[#C9A227] mb-6">Secure Settlement</p>
                    <div class="flex items-center justify-between flex-wrap gap-4">
                        <div class="flex items-center gap-6  hover:opacity-100 transition-all duration-700">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4FcBbcO_E1YYtCUgTRdL3m0ClcZepAP1FYQ&s" 
                                 alt="ToyyibPay" style="height:24px;">
                        </div>
                        
                        <div class="flex gap-8">
                            <a href="{{ route('customer.dashboard') }}" class="group flex items-center gap-2 text-[14px] font-bold uppercase tracking-widest text-gray-400 no-underline hover:text-[#3D4127] transition-colors">
                                <span class="w-4 h-[4px] bg-gray-300 group-hover:w-8 transition-all"></span> Back
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FULLSCREEN MODAL -->
    <div id="imageModal" class="fixed inset-0 bg-black/95 z-[2000] hidden items-center justify-center p-10 backdrop-blur-xl">
        <span class="close absolute top-10 right-10 text-white text-4xl cursor-pointer transition-transform hover:scale-110">&times;</span>
        <img id="modalImage" class="max-w-[80%] max-h-[80%] object-contain rounded-2xl shadow-2xl border border-white/10" alt="zoomed image">
    </div>
</div>


<style>
    /* Luxury Reveal Animation */
    @keyframes revealIn {
        from { 
            opacity: 0; 
            transform: translateY(40px) scale(0.98); 
            filter: blur(15px); 
        }
        to { 
            opacity: 1; 
            transform: translateY(0) scale(1); 
            filter: blur(0); 
        }
    }

    /* Subtle Continuous Floating for Cards */
    @keyframes floatingCard {
        0% { transform: translateY(0px); }
        50% { transform: translateY(-8px); }
        100% { transform: translateY(0px); }
    }

    /* Shimmering Gold Sweep */
    @keyframes shimmerSweep {
        0% { background-position: -200% center; }
        100% { background-position: 200% center; }
    }

    .treasure-reveal {
        opacity: 0;
        animation: revealIn 1.4s cubic-bezier(0.16, 1, 0.3, 1) forwards;
    }

    .luxury-card {
        box-shadow: 0 10px 40px -10px rgba(0,0,0,0.02);
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        border: 1px solid rgba(229, 231, 235, 0.4);
        position: relative;
        /* Apply continuous floating with staggered start */
        animation: floatingCard 6s ease-in-out infinite;
    }

    /* Stagger the floating animation so they don't all move in perfect sync */
    .treasure-reveal:nth-child(even) .luxury-card {
        animation-delay: 1s;
    }

    .luxury-card:hover {
        transform: translateY(-15px) scale(1.02) !important; /* Override floating on hover */
        box-shadow: 0 40px 80px -20px rgba(61, 65, 39, 0.15);
        border: 1px solid rgba(193, 162, 39, 0.3);
        animation-play-state: paused; /* Stop floating when user interacts */
    }

    /* Decorative icon pulse */
    .icon-pulse {
        animation: pulse 2s infinite;
    }

    @keyframes pulse {
        0% { transform: scale(1); opacity: 0.5; }
        50% { transform: scale(1.2); opacity: 1; }
        100% { transform: scale(1); opacity: 0.5; }
    }

    .shimmer-text {
        background: linear-gradient(90deg, #3D4127 0%, #C9A227 50%, #3D4127 100%);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shimmerSweep 5s linear infinite;
    }

    .btn-treasure {
        position: relative;
        overflow: hidden;
        transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .btn-treasure::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
        transition: 0.6s;
    }

    .btn-treasure:hover::before {
        left: 100%;
    }
</style>

<section class="my-32 px-6 overflow-hidden">
    <!-- Section Header -->
    <div class="max-w-4xl mx-auto text-center mb-20 treasure-reveal">
        <span class="text-[#C9A227] text-[10px] font-bold tracking-[0.5em] uppercase mb-4 block">Tailored Selections</span>
        <h2 class="text-4xl md:text-5xl font-playfair font-bold text-[#3D4127] mb-6 leading-tight" style="font-family: 'Playfair Display', serif; letter-spacing: -0.02em;">
            Exquisite Botanical <span class="shimmer-text">Treasures</span> <br> <span class="italic font-light opacity-80">Handpicked for You</span>
        </h2>
        <div class="flex justify-center items-center gap-4">
            <div class="w-12 h-[1px] bg-gray-200"></div>
            <div class="w-2 h-2 rotate-45 border border-[#C9A227] icon-pulse"></div>
            <div class="w-12 h-[1px] bg-gray-200"></div>
        </div>
    </div>

    <!-- Treasures Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-10 max-w-7xl mx-auto">
        @foreach($recommended as $index => $rec)
        <div class="treasure-reveal" style="animation-delay: {{ $index * 0.2 }}s">
            <a href="{{ route('plants.show', $rec->id) }}" class="group block luxury-card bg-white rounded-[2.5rem] overflow-hidden h-full flex flex-col">
                
                <!-- Image Wrapper -->
                <div class="relative overflow-hidden aspect-[4/5] m-4 rounded-[2rem] bg-[#fdfdfb]">
                    <!-- Badge: Category (Minimalist Style) -->
                    <div class="absolute top-5 left-5 z-20">
                        <span class="bg-white/90 backdrop-blur-md text-[#3D4127] text-[8px] font-bold tracking-[0.3em] uppercase px-4 py-2 rounded-full shadow-sm">
                            {{ $rec->category }}
                        </span>
                    </div>

                    <img src="{{ asset('storage/'.$rec->image) }}" 
                         alt="{{ $rec->name }}" 
                         class="w-full h-full object-cover transition-all duration-1000 ease-out group-hover:scale-110 group-hover:rotate-2">
                    
                    <!-- Subtle Gradient Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-t from-[#3D4127]/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
                </div>
                
                <!-- Details -->
                <div class="px-8 pb-10 pt-4 flex flex-col items-center text-center">
                    <h3 class="text-xl font-playfair font-bold text-[#3D4127] mb-2 transition-colors duration-500 group-hover:text-[#636B2F]" style="font-family: 'Playfair Display', serif;">
                        {{ $rec->name }} 
                    </h3>

                    <div class="flex items-center gap-2 mb-6">
                        <div class="w-1 h-1 rounded-full bg-[#C9A227]"></div>
                        <p class="font-bold text-[#3D4127] text-lg">
                            RM{{ number_format($rec->price, 2) }}
                        </p>
                    </div>

                    <!-- CTA Button (Luxury Modern Style) -->
                    <button class="btn-treasure w-full py-4 px-6 bg-[#3D4127] text-white text-[9px] font-bold tracking-[0.3em] uppercase rounded-full shadow-xl transform transition-all duration-500 group-hover:bg-[#C9A227] group-hover:shadow-[#C9A227]/30 flex items-center justify-center gap-3">
                        <i class="fa fa-star-of-life text-[8px] opacity-50 group-hover:rotate-180 transition-transform duration-700"></i>
                        Reserve Treasure
                    </button>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>
<style>
  /* Luxury card hover effect */
  .group:hover img {
    transform: scale(1.12) rotate(2deg);
    box-shadow: 0 15px 40px rgba(0,0,0,0.18);
  }

  /* Badge shadow for depth */
  .group span {
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }

  /* Smooth button hover */
  .group button:hover {
    transform: translateY(-2px) scale(1.03);
    box-shadow: 0 12px 28px rgba(34,139,77,0.18);
  }
</style>



  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // ========== IMAGE ZOOM MODAL ==========
  const plantImage = document.getElementById("plantImage");
  const modal = document.getElementById("imageModal");
  const modalImg = document.getElementById("modalImage");
  const closeBtn = modal.querySelector('.close');

  plantImage.onclick = () => { modal.style.display = "flex"; modalImg.src = plantImage.src; resetView(); }
  closeBtn.onclick = () => { modal.style.display = "none"; }
  modal.onclick = (e) => { if(e.target === modal) modal.style.display = "none"; }

  let scale = 1, posX = 0, posY = 0, isDragging = false, startX, startY;
  modalImg.addEventListener("wheel", (e) => { 
    e.preventDefault(); 
    scale += e.deltaY < 0 ? 0.2 : -0.2; 
    if(scale < 0.4) scale = 0.4; 
    applyTransform(); 
  });
  modalImg.addEventListener("mousedown", (e) => { 
    isDragging = true; 
    startX = e.clientX - posX; 
    startY = e.clientY - posY; 
    modalImg.style.cursor = "grabbing"; 
  });
  window.addEventListener("mouseup", () => { 
    isDragging = false; 
    modalImg.style.cursor = "grab"; 
  });
  window.addEventListener("mousemove", (e) => { 
    if(!isDragging) return; 
    posX = e.clientX - startX; 
    posY = e.clientY - startY; 
    applyTransform(); 
  });
  modalImg.addEventListener("dblclick", resetView);
  function applyTransform(){ modalImg.style.transform = `translate(${posX}px, ${posY}px) scale(${scale})`; }
  function resetView(){ scale = 1; posX = 0; posY = 0; applyTransform(); }

  // ========= CART BADGE PERSISTENCE ==========
  const badge = document.getElementById("cart-count");
  const pageBadge = document.getElementById("page-cart-count");

  // Load saved cart count from localStorage
  function loadCartCount() {
    const saved = localStorage.getItem("cart_count");
    if (saved) {
      if (badge) badge.innerText = saved;
      if (pageBadge) pageBadge.innerText = saved;
    }
  }

  // Save cart count to localStorage
  function saveCartCount(count) {
    localStorage.setItem("cart_count", count);
    if (badge) badge.innerText = count;
    if (pageBadge) pageBadge.innerText = count;
  }

  // ========= Add to Cart AJAX ==========
  document.getElementById("add-to-cart-form").addEventListener("submit", function(e){
    e.preventDefault();
    const qtyInput = document.getElementById("quantity");
    let qty = parseInt(qtyInput.value) || 1;
    if(qty < 1) qty = 1;
    qtyInput.value = qty;
    const addBtn = document.getElementById("addBtn");
    addBtn.disabled = true;
    addBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Adding...';

    fetch("{{ route('cart.add', $plant->id) }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        "X-Requested-With": "XMLHttpRequest"
      },
      body: JSON.stringify({ quantity: qty })
    })
    .then(res => res.json())
    .then(data => {
      addBtn.disabled = false;
      addBtn.innerHTML = '<i class="fa fa-cart-plus"></i> Add to cart';

      if (data.success) {
        const newCount = data.cartCount ?? parseInt(localStorage.getItem("cart_count") || 0) + qty;
        saveCartCount(newCount);

        // ✅ Update navbar cart count immediately
        window.dispatchEvent(new CustomEvent("cartUpdated", { detail: { count: newCount } }));

        Swal.fire({ 
          toast: true, 
          position: 'top-end', 
          icon: 'success', 
          title: data.message || 'Added to cart!', 
          showConfirmButton: false, 
          timer: 1600 
        });
      } else {
        Swal.fire({ 
          icon: 'error', 
          title: 'Oops', 
          text: data.message || 'Failed to add item.' 
        });
      }
    })
    .catch(() => {
      addBtn.disabled = false;
      addBtn.innerHTML = '<i class="fa fa-cart-plus"></i> Add to cart';
      Swal.fire('Error', 'Unable to add item right now.', 'error');
    });
  });

  // ========= Keep badge synced ==========
  function syncTopCart() {
    const pageTop = document.getElementById('pageCartTop');
    if (window.innerWidth <= 900) { 
      if (pageTop) pageTop.style.display = 'block'; 
      if (pageBadge && badge) pageBadge.innerText = badge.innerText; 
    } else if (pageTop) {
      pageTop.style.display = 'none';
    }
  }

  window.addEventListener('resize', syncTopCart);
  window.addEventListener('load', () => {
    loadCartCount();
    syncTopCart();
  });

  // ========= Global cart update listener ==========
  document.addEventListener('DOMContentLoaded', function() {
    window.addEventListener("cartUpdated", function(e) {
      const count = e.detail.count;
      if (badge) badge.innerText = count;
      if (pageBadge) pageBadge.innerText = count;
      localStorage.setItem("cart_count", count);
    });
  });
</script>

<script src="https://unpkg.com/lucide@latest"></script>
<x-footer />
</body>
</html>
