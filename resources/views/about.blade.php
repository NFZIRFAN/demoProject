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
      background-color: #ffffffff;
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
      color: #636B2F;
      margin: 0;
    }

    .team-nav {
      background-color: #636B2F;
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
      background-color: #5b5e3dff;
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
@keyframes float {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-15px); }
}

.animate-float {
  animation: float 3s ease-in-out infinite;
}
  </style>
</head>

<body class="text-gray-800">
  <x-navbar />

 <!-- 🌿 BANNER SECTION - Refined Elegant Style -->
<section class="relative pt-48 pb-32 lg:pt-64 lg:pb-48 shadow-2xl bg-cover bg-center"
  style="background-image: url('{{ asset('storage/image/aboutBanner.jpeg') }}');">

  <!-- Dark Overlay for Text Readability -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Banner Text Content -->
  <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
    <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white tracking-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.8)]"
        style="font-family: 'Cormorant Garamond', serif; font-style: italic;">
      ABOUT US
    </h1>

    <p class="mt-6 text-2xl md:text-3xl text-[#BAC095]"
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
      <!-- Elegant Text Section -->
<div class="max-w-4xl mx-auto text-center md:text-left space-y-6 px-4 md:px-0">

  <!-- Title -->
  <h2 class="text-5xl md:text-6xl font-extrabold leading-tight tracking-tight text-gradient"
      style="font-family: 'Playfair Display', serif; background: linear-gradient(90deg, #2F5233, #6AA84F); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
    We design and nurture green spaces with love and precision.
  </h2>

  <!-- Paragraph 1 -->
  <p class="text-lg md:text-xl text-gray-700 leading-relaxed font-medium"
     style="font-family: 'Lora', serif;">
    For more than two decades, <span class="font-semibold text-green-700">Yah Nursery & Landscape</span> has been the cornerstone of nature-inspired living in Malaysia. 
    From vibrant indoor greenery to breathtaking outdoor creations, we cultivate <span class="italic text-green-600">beauty, harmony, and sustainability</span> with every leaf and bloom.
  </p>

  <!-- Paragraph 2 -->
  <p class="text-lg md:text-xl text-gray-700 leading-relaxed font-medium"
     style="font-family: 'Lora', serif;">
    Our purpose is simple: to bring the serenity of nature closer to your home, while supporting local plant growers 
    and promoting <span class="italic text-green-600">sustainable landscape practices</span> that nurture the earth for generations to come.
  </p>
</div>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Lora:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">


      <!-- Fancy Professional Button -->
<button class="mt-6 relative inline-flex items-center px-12 py-4 text-xl font-bold text-white rounded-full overflow-hidden group shadow-lg transition-all duration-500 transform hover:scale-105 hover:shadow-2xl"
        style="background: linear-gradient(90deg, #2F5233, #6AA84F); letter-spacing: 1px; font-family: 'Quicksand', sans-serif;">

  <!-- Hover shine effect -->
  <span class="absolute inset-0 bg-gradient-to-r from-white/30 via-white/50 to-white/30 opacity-0 group-hover:opacity-100 transition-opacity duration-500 animate-slide"></span>

  <!-- Button text -->
  <span class="relative z-10 flex items-center justify-center gap-2">
    Discover Our Story
  </span>
</button>

<!-- Optional keyframes for shine animation -->
<style>
@keyframes slide {
  0% { transform: translateX(-100%) }
  100% { transform: translateX(100%) }
}
.animate-slide {
  animation: slide 1s infinite;
}
</style>

    </div>

  <!-- Floating Image (Right Side) -->
<div class="md:w-full flex justify-center mt-10 md:mt-0 relative">
  <!-- Glowing background -->
  <div class="absolute w-[350px] h-[350px] bg-green-200/30 blur-3xl rounded-full top-10 right-10 animate-pulse"></div>

  <!-- Plant Image -->
  <img 
    src="{{ asset('storage/image/PLANTABOUT.png') }}" 
    alt="Yah Nursery 3D Plant"
    class="w-[600px] md:w-[700px] drop-shadow-2xl transform transition-transform duration-700 hover:scale-110 animate-float"
  />
</div>
</div>
</section>

<!-- Featured Projects (5 items total) -->
 <section class="bg-white py-12">
  
  <!-- Section Heading -->
  <div class="text-center mb-14">
    <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight"
        style="font-family: 'Playfair Display', serif; color:#2F5233;">
      The Decoration Place of Yah Nursery & Landscape
    </h2>

    <p class="mt-4 text-gray-600 text-lg max-w-2xl mx-auto"
       style="font-family: 'Lora', serif;">
      Discover our most inspiring landscaping transformations.
    </p>

    <!-- Soft Divider Line -->
    <div class="mt-6 w-24 h-1 bg-gradient-to-r from-green-700 to-green-400 mx-auto rounded-full"></div>
  </div>

  <!-- Image Grid -->
  <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-10 max-w-7xl mx-auto px-6">

    <!-- Single Card -->
    @foreach([
      ['Outdoor Garden Makeover', 'land1.jpeg'],
      ['Pot Garden Landscape', 'land2.jpeg'],
      ['Botanical Park Project', 'land3.jpeg'],
      ['Tropical Courtyard', 'land4.jpeg'],
      ['Indoor Courtyard', 'land5.jpeg'],
      ['Zen Garden Retreat', 'https://i.pinimg.com/1200x/0b/42/7b/0b427b1566944eac5c03a8a567d099f0.jpg']
    ] as $proj)

    <div class="group relative rounded-3xl overflow-hidden shadow-xl bg-white 
                hover:shadow-2xl hover:-translate-y-1 transition-all duration-700">

      <!-- Image -->
      <img src="{{ Str::startsWith($proj[1], 'http') ? $proj[1] : asset('storage/image/'.$proj[1]) }}"
           class="object-cover w-full h-[420px] group-hover:scale-110 transition-transform duration-[900ms] ease-out" />

      <!-- Overlay Gradient -->
      <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent 
                  opacity-0 group-hover:opacity-100 transition duration-500"></div>

      <!-- Title + Location (Centered) -->
      <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-center 
                  text-white opacity-0 group-hover:opacity-100 transition duration-700">
        <h3 class="text-2xl font-semibold drop-shadow-md tracking-wide"
            style="font-family: 'Playfair Display', serif;">
          {{ $proj[0] }}
        </h3>
        <p class="text-green-200 text-sm tracking-widest">SHAH ALAM</p>
      </div>
    </div>

    @endforeach

  </div>

</section>

  <!-- OUR TEAM -->
<section id="team" class="bg-white py-16">
  <div class="max-w-7xl mx-auto px-6 text-center">

     <h2 class="text-4xl md:text-5xl font-extrabold tracking-tight"
        style="font-family: 'Playfair Display', serif; color:#2F5233;">
      The staff of Yah Nursery & Landscape
    </h2>

    <!-- Dots -->
    <div class="flex justify-center gap-2 my-4">
      <span class="w-3 h-3 bg-green-500 rounded-full"></span>
      <span class="w-3 h-3 bg-green-300 rounded-full"></span>
      <span class="w-3 h-3 bg-green-500 rounded-full"></span>
    </div>

    <!-- Subtitle -->
    <p class="text-gray-600 max-w-xl mx-auto mb-12">
      Our team combines passion, skill, and creativity to nurture nature with precision and care.
    </p>

    <!-- Slider -->
    <div class="relative flex items-center">

      <!-- Prev Button -->
      <button id="teamPrev" 
              class="team-nav prev absolute left-0 z-10 bg-white shadow-lg w-10 h-10 rounded-full flex items-center justify-center text-xl text-gray-600 hover:bg-green-500 hover:text-white transition">
        ‹
      </button>

      <!-- Slider Container -->
      <div class="team-slider overflow-hidden mx-12">
        <div id="teamTrack" class="team-track flex gap-8 transition-transform duration-500">

          <!-- Member -->
          <div class="team-member group bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
            <div class="overflow-hidden rounded-xl">
              <img src="https://i.pinimg.com/736x/a2/89/67/a289672bf61fe0d5dfbe2a3b4fc3fbbc.jpg" 
                   class="w-64 h-72 object-cover rounded-xl group-hover:scale-105 transition duration-500">
            </div>
            <div class="team-info mt-4">
              <h3 class="text-lg font-semibold text-gray-800">SITI HAZARINA</h3>
            </div>
          </div>

          <div class="team-member group bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
            <div class="overflow-hidden rounded-xl">
              <img src="https://i.pinimg.com/736x/75/0e/ac/750eac3f997ac76002cbff3e8688d99f.jpg" 
                   class="w-64 h-72 object-cover rounded-xl group-hover:scale-105 transition duration-500">
            </div>
            <div class="team-info mt-4">
              <h3 class="text-lg font-semibold text-gray-800">SITI AISYAH</h3>
            </div>
          </div>

          <div class="team-member group bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
            <div class="overflow-hidden rounded-xl">
              <img src="https://i.pinimg.com/736x/24/fc/00/24fc000fd37ee9cef0efb4ebdc123a1d.jpg"
                   class="w-64 h-72 object-cover rounded-xl group-hover:scale-105 transition duration-500">
            </div>
            <div class="team-info mt-4">
              <h3 class="text-lg font-semibold text-gray-800">NUR KHADIJAH</h3>
            </div>
          </div>

          <div class="team-member group bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
            <div class="overflow-hidden rounded-xl">
              <img src="https://i.pinimg.com/1200x/3d/35/37/3d35373636d6cc0b013b70a6126aeb91.jpg"
                   class="w-64 h-72 object-cover rounded-xl group-hover:scale-105 transition duration-500">
            </div>
            <div class="team-info mt-4">
              <h3 class="text-lg font-semibold text-gray-800">QHAIREEN QISTINA</h3>
            </div>
          </div>

          <div class="team-member group bg-white rounded-xl shadow-md hover:shadow-xl transition p-4">
            <div class="overflow-hidden rounded-xl">
              <img src="https://i.pinimg.com/736x/c2/8a/93/c28a93611a907931ceec2b8bd4969894.jpg"
                   class="w-64 h-72 object-cover rounded-xl group-hover:scale-105 transition duration-500">
            </div>
            <div class="team-info mt-4">
              <h3 class="text-lg font-semibold text-gray-800">FAROUQ AHMAD</h3>
            </div>
          </div>

        </div>
      </div>

      <!-- Next Button -->
      <button id="teamNext" 
              class="team-nav next absolute right-0 z-10 bg-white shadow-lg w-10 h-10 rounded-full flex items-center justify-center text-xl text-gray-600 hover:bg-green-500 hover:text-white transition">
        ›
      </button>

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
