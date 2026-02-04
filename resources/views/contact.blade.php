<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Yah Nursery & Landscape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #ffffff;
            color: #333;
        }
        .hero-section {
            background-image: url('https://images.unsplash.com/photo-1518384950-84c98f98d895?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w0NTQ4NzZ8MHwxfHNlYXJjaHwyMHx8cGxhbnRzJTIwYmFja2dyb3VuZHxlbnwwfHx8fDE3MTUyNDEzNDB8MA&ixlib=rb-4.0.3&q=80&w=1080'); /* Placeholder image */
            background-size: cover;
            background-position: center;
            position: relative;
            padding: 8rem 0; /* Adjust vertical padding */
        }
        .hero-overlay {
            background-color: rgba(0, 0, 0, 0.4); /* Dark overlay */
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
        }
        .contact-info-icon {
            @apply flex items-center justify-center w-12 h-12 rounded-full bg-green-100 text-green-700;
        }
        .form-input {
            @apply w-full p-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 transition duration-150;
        }
        .form-textarea {
            @apply w-full p-3 border border-gray-300 rounded-md focus:ring-green-500 focus:border-green-500 resize-y min-h-[100px] transition duration-150;
        }
         /* Floating animation */
  @keyframes float-3d {
    0%, 100% { transform: translateY(0px) rotateY(0deg); }
    25% { transform: translateY(-15px) rotateY(5deg); }
    50% { transform: translateY(-25px) rotateY(-5deg); }
    75% { transform: translateY(-15px) rotateY(5deg); }
  }

  .animate-float {
    animation: float-3d 6s ease-in-out infinite;
  }
  @keyframes sparkle {
  0% { transform: translate(0,0) scale(1); opacity: 0.5; }
  50% { transform: translate(50px,50px) scale(1.5); opacity: 0.8; }
  100% { transform: translate(0,0) scale(1); opacity: 0.5; }
}
.animate-sparkle {
  animation: sparkle 2s linear infinite;
}
.animation-delay-200 {
  animation-delay: 0.2s;
}
body::-webkit-scrollbar {
  display: none; /* hides scrollbar in Chrome, Edge, Safari */
}
    </style>
</head>
<body>
  <x-navbar />

   <!-- 🌿 BANNER SECTION - Refined Elegant Style -->
<section class="relative pt-48 pb-32 lg:pt-64 lg:pb-48 shadow-2xl bg-cover bg-center"
  style="background-image: url('https://assets.zeezest.com/blogs/PROD_16x9%20banners_Low%20Light%20Plants_1643382442516.jpg');">

  <!-- Dark Overlay for Text Readability -->
  <div class="absolute inset-0 bg-black/50"></div>

  <!-- Banner Text Content -->
  <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
    <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white tracking-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.8)]"
        style="font-family: 'Cormorant Garamond', serif; font-style: italic;">
      Let's Connect
    </h1>

    <p class="mt-6 text-2xl md:text-3xl text-[#D4DE95]"
       style="font-family: 'Playfair Display', serif; font-style: italic;">
      Contact us if you have any curiosities
    </p>
  </div>
</section>

   <section class="bg-white py-24">
  <div class="max-w-7xl mx-auto px-6 lg:px-8 space-y-32">

    <!-- Row 1: Image Left, Form Right -->
    <div class="grid md:grid-cols-2 gap-16 items-center">
      <!-- Left: Floating Image with Glow -->
      <div class="relative flex justify-center md:justify-start w-full">
        <div class="absolute w-80 h-80 bg-green-200/20 blur-3xl rounded-full -top-10 right-10 animate-pulse"></div>
        <img
          src="{{ asset('storage/image/contact.png') }}"
          alt="Yah Nursery Plant"
          class="w-64 md:w-96 lg:w-[500px] drop-shadow-2xl rounded-2xl transform hover:scale-110 transition-transform duration-700 animate-float"
        />
      </div>

      <!-- Right: Contact Form Card -->
      <div class="bg-gray-50 rounded-3xl p-10 shadow-xl border border-gray-200">
        <h2 class="text-4xl font-bold text-gray-800 mb-8">Send us a Message</h2>
       <form action="#" method="POST" class="space-y-6 max-w-lg mx-auto">

  <!-- Name Field -->
  <div class="relative">
    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Name*</label>
    <input type="text" id="name" name="name" placeholder="Your Name" required
      class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition duration-300 shadow-sm placeholder-gray-400"/>
  </div>

  <!-- Email Field -->
  <div class="relative">
    <label for="email_form" class="block text-sm font-semibold text-gray-700 mb-2">Email*</label>
    <input type="email" id="email_form" name="email" placeholder="Enter your email" required
      class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition duration-300 shadow-sm placeholder-gray-400"/>
  </div>

  <!-- Phone Field -->
  <div class="relative">
    <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">Phone*</label>
    <input type="tel" id="phone" name="phone" placeholder="Enter your phone number" required
      class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition duration-300 shadow-sm placeholder-gray-400"/>
  </div>

  <!-- Message Field -->
  <div class="relative">
    <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">Message</label>
    <textarea id="message" name="message" placeholder="Your message here..." 
      class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:border-green-500 focus:ring-2 focus:ring-green-200 focus:outline-none transition duration-300 shadow-sm placeholder-gray-400 resize-y min-h-[120px]"></textarea>
  </div>

   <button class="relative inline-block px-8 py-3 font-semibold text-blue-600 border-2 border-blue-600 rounded-lg overflow-hidden group cursor-pointer transition-all duration-300 shadow-md hover:shadow-xl">
  <!-- Hover Gradient Overlay -->
  <span class="absolute inset-0 bg-gradient-to-r from-blue-400 via-blue-600 to-blue-500 opacity-0 group-hover:opacity-100 transition-opacity duration-500"></span>

  <!-- Sparkle Animation -->
  <span class="absolute -top-10 -left-10 w-6 h-6 bg-white rounded-full opacity-50 blur-xl animate-sparkle"></span>
  <span class="absolute -bottom-10 -right-10 w-6 h-6 bg-white rounded-full opacity-50 blur-xl animate-sparkle animation-delay-200"></span>
  
  <!-- Button Text -->
  <span class="relative z-10 group-hover:text-white text-sm">Submit</span>
</button>

</form>
      </div>
    </div>
</section>

    <!-- Get In Touch Section -->
<section aria-labelledby="get-in-touch" class="py-16">
    <div class="w-full px-6 sm:px-8 lg:px-12">

        <!-- Features Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 text-center">

            <!-- Feature 1: Phone -->
            <div class="flex flex-col items-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-white border border-gray-100">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4 transition-transform duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.134l-2.54 1.542a4 4 0 006.002 6.002l1.542-2.54a1 1 0 011.134-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-900 mb-2">Phone</h3>
                <p class="text-sm text-green-700 max-w-xs">018-3824046</p>
            </div>

            <!-- Feature 2: Email -->
            <div class="flex flex-col items-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-white border border-gray-100">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4 transition-transform duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8m-2 4v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-900 mb-2">Email</h3>
                <p class="text-sm text-green-700 max-w-xs">yahNursery@gmail.com</p>
            </div>

            <!-- Feature 3: Address -->
            <div class="flex flex-col items-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-white border border-gray-100">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4 transition-transform duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-900 mb-2">Address</h3>
                <p class="text-sm text-green-700 max-w-xs">Kebun Bunga, Jalan Pangsun Tiga 27/12c,<br>
        Seksyen 27, Taman Bunga Negara,<br>
        40000 Shah Alam, Selangor</p>
            </div>

            <!-- Feature 4: Open Hours -->
            <div class="flex flex-col items-center p-6 rounded-xl hover:shadow-lg transition duration-300 bg-white border border-gray-100">
                <div class="flex items-center justify-center w-16 h-16 rounded-full bg-lime-100 mb-4 transition-transform duration-300 hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-green-800" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h3 class="text-lg font-semibold text-green-900 mb-2">Open Hours</h3>
                <p class="text-sm text-green-700 max-w-xs">Mon - Sat: 9:00 AM - 6:00 PM</p>
            </div>

        </div>

    </div>
</section>
<x-footer />
</body>
</html>
