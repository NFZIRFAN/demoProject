<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About Us | Yah Nursery & Landscape</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Unique Elegant Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&family=Cormorant+Garamond:ital,wght@1,600&display=swap" rel="stylesheet">

  <style>
    body {
      font-family: 'Inter', sans-serif;
      background-color: #fafdf9;
      overflow-x: hidden;
    }

    /* Hero Banner */
    .hero-section {
      background-image: url('https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1400&q=80');
      background-size: cover;
      background-position: center;
      position: relative;
      height: 75vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .hero-overlay {
      position: absolute;
      inset: 0;
      background: rgba(0, 0, 0, 0.45);
    }

    .section-title {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      letter-spacing: 0.5px;
    }

    /* Team Section (formerly Top Deals) */
    #team {
      text-align: center;
      padding: 90px 40px;
      background-color: #ffffff;
    }

    #team h2 {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 3rem;
      font-weight: 700;
      color: #2b6b3e;
      margin-bottom: 0.5rem;
      letter-spacing: 1px;
    }

    .heading-dots {
      display: flex;
      justify-content: center;
      gap: 6px;
      margin-bottom: 20px;
    }

    .heading-dots span {
      width: 10px;
      height: 10px;
      background-color: #2b6b3e;
      border-radius: 50%;
    }

    #team p.lead {
      max-width: 700px;
      margin: 0 auto 50px;
      color: #567d5b;
      font-size: 1.1rem;
      line-height: 1.6;
    }

    .team-wrap {
      position: relative;
      max-width: 1000px;
      margin: 0 auto;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .team-slider {
      overflow: hidden;
      width: 90%;
    }

    .team-track {
      display: flex;
      transition: transform 0.6s ease;
      gap: 20px;
    }

    .team-member {
      min-width: calc(33.333% - 20px);
      background-color: #e9f7ee;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s ease;
    }

    .team-member:hover {
      transform: translateY(-5px);
    }

    .team-member img {
      width: 100%;
      height: 280px;
      object-fit: cover;
    }

    .team-info {
      padding: 15px;
      background-color: #ffffff;
    }

    .team-info h3 {
      font-family: 'Cormorant Garamond', serif;
      font-style: italic;
      font-size: 1.4rem;
      color: #2b6b3e;
      margin: 0;
    }

    .team-nav {
      background-color: #2b6b3e;
      color: white;
      border: none;
      font-size: 2rem;
      cursor: pointer;
      border-radius: 50%;
      width: 45px;
      height: 45px;
      text-align: center;
      transition: background 0.3s;
    }

    .team-nav:hover {
      background-color: #1d472a;
    }

    .prev { margin-right: 15px; }
    .next { margin-left: 15px; }

    @media (max-width: 900px) {
      .team-member { min-width: calc(50% - 20px); }
    }

    @media (max-width: 600px) {
      .team-member { min-width: 100%; }
    }
    body::-webkit-scrollbar {
  display: none; /* hides scrollbar in Chrome, Edge, Safari */
}
  </style>
</head>

<body class="text-gray-800">
  <x-navbar />

  <!-- 🌿 BANNER SECTION - Refined Elegant Style -->
<section class="relative pt-48 pb-32 lg:pt-64 lg:pb-48 shadow-2xl bg-cover bg-center"
  style="background-image: url('https://plus.unsplash.com/premium_photo-1683134285765-87d4d565efa1?ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MXx8bGl2aW5nJTIwcm9vbSUyMHBsYW50c3xlbnwwfHwwfHx8MA%3D%3D&fm=jpg&q=60&w=3000');">

  <!-- Dark Overlay for Text Readability -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Banner Text Content -->
  <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
    <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white tracking-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.8)]"
        style="font-family: 'Cormorant Garamond', serif; font-style: italic;">
      Yah Nursery & Landscape Sdn Bhd
    </h1>

    <p class="mt-6 text-2xl md:text-3xl text-emerald-200"
       style="font-family: 'Playfair Display', serif; font-style: italic;">
      Nurturing Nature with Passion and Purpose
    </p>
  </div>
</section>

<!-- Include Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@1,600;1,700&family=Playfair+Display:ital,wght@1,600&display=swap" rel="stylesheet">



 <!-- 🌿 ABOUT SECTION -->
<section class="py-24 bg-white">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">

    <!-- Text Content -->
    <div class="space-y-6">
      <h2 class="text-5xl font-extrabold text-green-800 section-title leading-tight">
        We design and nurture green spaces with love and precision.
      </h2>
      <p class="text-lg text-gray-600 leading-relaxed">
        For more than two decades, Yah Nursery & Landscape has been the cornerstone of nature-inspired living in Malaysia. 
        From vibrant indoor greenery to breathtaking outdoor creations, we cultivate beauty, harmony, and sustainability 
        with every leaf and bloom.
      </p>
      <p class="text-lg text-gray-600 leading-relaxed">
        Our purpose is simple to bring the serenity of nature closer to your home, while supporting local plant growers 
        and promoting sustainable landscape practices that nurture the earth for generations to come.
      </p>

      <button class="mt-6 relative inline-flex items-center px-8 py-4 text-lg font-semibold border-2 border-green-700 text-green-700 rounded-full overflow-hidden group transition-all duration-300">
        <span class="absolute inset-0 bg-green-700 transition-transform duration-300 scale-x-0 group-hover:scale-x-100 origin-left"></span>
        <span class="relative z-10 group-hover:text-white">Discover Our Story</span>
      </button>
    </div>

    <!-- Floating Image (Right Side) -->
    <div class="md:w-1/2 flex justify-center mt-10 md:mt-0 relative">
      <div class="absolute w-[250px] h-[250px] bg-green-200/30 blur-3xl rounded-full top-10 right-10 animate-pulse"></div>
      <img 
        src="{{ asset('storage/image/PLANTPEOPLE.png') }}" 
        alt="Yah Nursery 3D Plant"
        class="w-[460px] md:w-[550px] drop-shadow-2xl transform hover:scale-110 transition-transform duration-700 animate-float"
      />
    </div>

  </div>
</section>


<!-- 🌳 WHY CHOOSE US SECTION -->
<section class="py-24 bg-green-50">
  <div class="max-w-7xl mx-auto px-6 lg:px-12 grid lg:grid-cols-2 gap-16 items-center">

    <!-- Floating Logo (Left Side) -->
    <div class="md:w-1/2 flex justify-center mt-10 md:mt-0 relative order-1 lg:order-none">
      <div class="absolute w-[280px] h-[280px] bg-green-300/40 blur-3xl rounded-full top-10 left-10 animate-pulse"></div>
      <img 
        src="{{ asset('storage/image/logo.png') }}" 
        alt="Yah Nursery Logo"
        class="w-[500px] md:w-[600px] drop-shadow-2xl transform hover:scale-110 transition-transform duration-700 animate-float"
      />
    </div>

    <!-- Text Content -->
    <div class="space-y-8">
      <h2 class="text-4xl font-bold text-green-800 section-title">Why Choose Yah Nursery?</h2>
      <p class="text-lg text-gray-600">We offer nature-inspired solutions built on experience, innovation, and genuine care.</p>

      <ul class="space-y-6">
        <li class="flex items-start">
          <span class="bg-green-700 text-white p-3 rounded-full mr-4 text-lg">✅</span>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">Experienced Team</h3>
            <p class="text-gray-500">Over two decades of hands-on expertise in horticulture, design, and sustainable landscaping.</p>
          </div>
        </li>

        <li class="flex items-start">
          <span class="bg-green-700 text-white p-3 rounded-full mr-4 text-lg">🌱</span>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">Eco-Friendly Practices</h3>
            <p class="text-gray-500">Committed to sustainability through organic materials, smart irrigation, and low-waste methods.</p>
          </div>
        </li>

        <li class="flex items-start">
          <span class="bg-green-700 text-white p-3 rounded-full mr-4 text-lg">🌼</span>
          <div>
            <h3 class="text-xl font-semibold text-gray-800">Customized Designs</h3>
            <p class="text-gray-500">Every garden and outdoor space is uniquely tailored to reflect your lifestyle and environment.</p>
          </div>
        </li>
      </ul>
    </div>

  </div>
</section>

<!-- Add subtle float animation -->
<style>
  @keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
  }
  .animate-float {
    animation: float 5s ease-in-out infinite;
  }
</style>

  <!-- Our Team -->
  <section id="team">
    <h2>MEET OUR TEAM</h2>
    <div class="heading-dots"><span></span><span></span><span></span></div>
    <p class="lead">Our team combines passion, skill, and creativity to nurture nature with precision and care.</p>

    <div class="team-wrap">
      <button class="team-nav prev" id="teamPrev">‹</button>
      <div class="team-slider">
        <div class="team-track" id="teamTrack">
          <div class="team-member">
            <img src="https://i.pinimg.com/736x/a2/89/67/a289672bf61fe0d5dfbe2a3b4fc3fbbc.jpg" alt="Sunflower">
            <div class="team-info"><h3>SITI HAZARINA</h3></div>
          </div>
          <div class="team-member">
            <img src="https://i.pinimg.com/736x/75/0e/ac/750eac3f997ac76002cbff3e8688d99f.jpg" alt="Spiral Aloe">
            <div class="team-info"><h3>SITI AISYAH</h3></div>
          </div>
          <div class="team-member">
            <img src="https://i.pinimg.com/736x/24/fc/00/24fc000fd37ee9cef0efb4ebdc123a1d.jpg" alt="Lillies Flower">
            <div class="team-info"><h3>NUR KHADIJAH</h3></div>
          </div>
          <div class="team-member">
            <img src="https://i.pinimg.com/1200x/3d/35/37/3d35373636d6cc0b013b70a6126aeb91.jpg" alt="Snake Plant">
            <div class="team-info"><h3>QHAIREEN QISTINA</h3></div>
          </div>
          <div class="team-member">
            <img src="https://i.pinimg.com/736x/c2/8a/93/c28a93611a907931ceec2b8bd4969894.jpg" alt="Pothos">
            <div class="team-info"><h3>FAROUQ AHMAD</h3></div>
          </div>
        </div>
      </div>
      <button class="team-nav next" id="teamNext">›</button>
    </div>
  </section>

  <!-- Featured Projects (5 items total) -->
  <section class="py-24 bg-green-50 text-center">
    <h2 class="text-4xl font-bold text-green-800 section-title">FEATURED PROJECTS</h2>
    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
      Discover our most inspiring landscaping transformations.
    </p>

    <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-10 max-w-6xl mx-auto px-6">
      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/1200x/40/21/43/402143fcf7b3e2a3019d65d007dbcf85.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Urban Garden Makeover</h3>
          <p class="text-green-200 text-sm">Kuala Lumpur</p>
        </div>
      </div>

      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/736x/69/53/f9/6953f99347a1e66918d86b69d8fb4e19.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Eco Resort Landscape</h3>
          <p class="text-green-200 text-sm">Langkawi Island</p>
        </div>
      </div>

      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/736x/ed/14/db/ed14db14c9ae13b92ef44bed99bdf1aa.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Botanical Park Project</h3>
          <p class="text-green-200 text-sm">Cameron Highlands</p>
        </div>
      </div>

      <!-- Extra Projects -->
      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/736x/b5/91/a8/b591a8278f194cc691b34000a6e04c40.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Tropical Courtyard</h3>
          <p class="text-green-200 text-sm">Penang</p>
        </div>
      </div>
    
      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/736x/89/c8/ed/89c8ed372bb04d43759c02832c1d05a9.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Tropical Courtyard</h3>
          <p class="text-green-200 text-sm">Penang</p>
        </div>
      </div>
      
      <div class="group relative rounded-3xl overflow-hidden shadow-lg">
        <img src="https://i.pinimg.com/1200x/0b/42/7b/0b427b1566944eac5c03a8a567d099f0.jpg" class="object-cover w-full h-[400px] group-hover:scale-110 transition-transform duration-700" />
        <div class="absolute inset-0 bg-gradient-to-t from-green-900/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-500"></div>
        <div class="absolute bottom-6 left-6 text-white opacity-0 group-hover:opacity-100 transition duration-500">
          <h3 class="text-2xl font-semibold">Zen Garden Retreat</h3>
          <p class="text-green-200 text-sm">Ipoh</p>
        </div>
      </div>
    </div>
  </section>

  <x-footer />

  <script>
    const track = document.getElementById("teamTrack");
    const prev = document.getElementById("teamPrev");
    const next = document.getElementById("teamNext");
    const totalItems = document.querySelectorAll(".team-member").length;
    const visibleItems = 3;
    let index = 0;

    function updateSlider() {
      const move = index * (100 / visibleItems);
      track.style.transform = `translateX(-${move}%)`;
    }

    next.addEventListener("click", () => {
      if (index < totalItems - visibleItems) {
        index++;
        updateSlider();
      }
    });

    prev.addEventListener("click", () => {
      if (index > 0) {
        index--;
        updateSlider();
      }
    });
  </script>
</body>
</html>
