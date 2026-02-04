<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>YAH Nursery: Our Story and Mission</title>

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;900&display=swap');
    body {
      font-family: 'Inter', sans-serif;
      background-color: #ffffffff; /* Lighter background for a cleaner look */
      color: #1e293b;
    }

    /* Custom Banner Styling for Professional Look and Responsiveness */
    .banner-bg-style {
      background-image: url('https://www.ugaoo.com/cdn/shop/articles/adb4dbc475.jpg?v=1698751412');
      background-size: cover;
      background-position: center 75%;
    }

    /* Custom styles for professional headings */
    h2 {
      padding-bottom: 0.5rem;
    }

    /* Scrollbar for modal content */
    .modal-content-scroll {
        max-height: 80vh;
        overflow-y: auto;
    }
    body::-webkit-scrollbar {
  display: none; /* hides scrollbar in Chrome, Edge, Safari */
}
  </style>


  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
</head>
<body>
  <x-navbar />

  <!-- 🌿 BANNER SECTION - Enhanced Aesthetics -->
  <section class="banner-bg-style relative pt-48 pb-32 lg:pt-64 lg:pb-48  shadow-2xl">
    
    <!-- Dark Overlay for Text Readability and Contrast -->
    <div class="absolute inset-0 bg-black/50"></div>
    
    <!-- Banner Text Content -->
    <div class="relative z-10 max-w-6xl mx-auto px-6 text-center">
       <h1 class="text-6xl md:text-8xl lg:text-9xl font-bold text-white tracking-tight drop-shadow-[0_4px_12px_rgba(0,0,0,0.8)]"
        style="font-family: 'Cormorant Garamond', serif; font-style: italic;">
BLOG    </h1>
      <p class="mt-6 text-2xl md:text-3xl text-[#D4DE95]"
       style="font-family: 'Playfair Display', serif; font-style: italic;">
    Our Story & Mission    </p>
    </div>
  </section>

  <!-- MAIN CONTENT -->
  <div class="max-w-6xl mx-auto px-6 py-20">

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-16">

      <!-- LEFT COLUMN (Main Narrative - Founding Story & Services) -->
      <div class="lg:col-span-2 space-y-16">

        <!-- Section 1: Founding Story -->
        <section>
<h2 class="text-4xl mb-6" 
    style="font-family: 'Playfair Display', serif; color:#3D4127; font-weight:700; letter-spacing:1px;">
  The Genesis of Green: Our Founding Story
</h2>          <p class="text-lg text-gray-600 leading-relaxed mb-6">
            YAH Nursery began with a simple, powerful conviction: that reconnecting people to nature should be accessible to everyone. 
            What started as a humble roadside plant stand has flourished into a <strong>full-service nursery and landscape design firm</strong>, trusted across Malaysia for over 20 years.
          </p>
          <p class="text-lg text-gray-600 leading-relaxed">
            We specialize in <strong>drought-tolerant and native species</strong> perfectly adapted to Malaysia’s tropical climate, ensuring longevity, sustainability, and beauty in every garden we touch.
          </p>
        </section>

        <!-- Quote -->
        <div class="pull-quote p-8 bg-emerald-50 rounded-2xl italic text-xl text-gray-700 shadow-lg border-l-8 border-[#BAC095]">
          <i data-lucide="quote" style="color: #3D4127;" class="w-8 h-8 text-emerald-600 mr-3 inline-block align-top"></i>
          "Our roots run deep where  we pair the finest plant stock with the practical knowledge to transform any space into a thriving, sustainable oasis."
        </div>

        <!-- Section 2: Integrated Services -->
        <section>
          <h2 class="text-4xl mb-6" 
    style="font-family: 'Playfair Display', serif; color:#3D4127; font-weight:700; letter-spacing:1px;">Beyond the Basics: Integrated Services</h2>
          <p class="text-lg text-gray-600 leading-relaxed mb-6">
            From soil analysis and irrigation design to large-scale landscape projects, YAH Nursery provides <strong>end-to-end solutions</strong>. 
            Whether you're a weekend gardener or a property developer, our expertise ensures every project thrives.
          </p>
          
          <!-- Inline Image with better styling -->
          <div class="my-12 rounded-2xl overflow-hidden shadow-2xl max-w-3xl mx-auto">
            <img 
              src="https://i.pinimg.com/736x/58/11/ff/5811ff82c9888b1d07dc88dc2a1c994f.jpg"
              alt="Landscape designer sketching garden plan"
              class="w-full h-[400px] object-cover transition-transform duration-700 hover:scale-105">
            <p class="p-3 text-center text-sm text-gray-500 bg-gray-50 italic">Crafting beautiful and responsible landscapes.</p>
          </div>
          
          <p class="text-lg text-gray-600 leading-relaxed">
            Our design studio crafts visually stunning and environmentally responsible landscapes combining creativity, science, and sustainability.
          </p>
        </section>
      </div>

      <!-- RIGHT COLUMN (Sidebar - Now includes Core Values and Promise) -->
      <aside class="space-y-10">

        <!-- Quick Take Card -->
        <div class="bg-[#3D4127] p-8 rounded-2xl shadow-2xl text-white">
          <h3 class="text-2xl font-bold mb-5 border-b pb-3 border-emerald-500">Quick Take: Why Partner With YAH</h3>
          <ul class="space-y-5 text-emerald-100">
            <li class="flex items-start">
              <i data-lucide="check-circle" class="w-6 h-6 mt-1 mr-3 text-emerald-300 flex-shrink-0"></i>
              <div>
                <p class="font-semibold text-lg text-white">Local Plant Acclimation</p>
                <span class="text-sm">Stock is grown locally to ensure immediate vitality in the Malaysian climate.</span>
              </div>
            </li>
            <li class="flex items-start">
              <i data-lucide="award" class="w-6 h-6 mt-1 mr-3 text-emerald-300 flex-shrink-0"></i>
              <div>
                <p class="font-semibold text-lg text-white">Certified Expertise</p>
                <span class="text-sm">Our team includes certified horticulturists and landscape architects.</span>
              </div>
            </li>
            <li class="flex items-start">
              <i data-lucide="shield" class="w-6 h-6 mt-1 mr-3 text-emerald-300 flex-shrink-0"></i>
              <div>
                <p class="font-semibold text-lg text-white">Eco Commitment</p>
                <span class="text-sm">Every project promotes biodiversity and responsible water usage.</span>
              </div>
            </li>
          </ul>
        </div>

        <!-- Real Image -->
        <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white">
          <img 
            src="https://i.pinimg.com/1200x/e5/c9/61/e5c961ebfffbf0f3a137eb902443c5bb.jpg"
            alt="Tropical plants displayed in nursery"
            class="w-full h-[300px] object-cover transition-transform duration-700 hover:scale-105">
        </div>

        <!-- Section 3: Core Values (MOVED) -->
        <div class="bg-[#BAC095] p-6 rounded-2xl shadow-xl border border-emerald-100">
            <h3 class="text-2xl font-extrabold mb-6 text-emerald-800 border-b border-emerald-100 pb-3">Our Core Values</h3>
            <div class="grid grid-cols-1 gap-6">
                
                <!-- Value 1 -->
                <div class="flex items-start space-x-3">
                    <i data-lucide="leaf" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1"></i>
                    <div>
                        <h4 class="font-bold text-gray-900">Sustainability First</h4>
                        <p class="text-gray-600 text-sm">Prioritizing water conservation and natural, regenerative methods.</p>
                    </div>
                </div>

                <!-- Value 2 -->
                <div class="flex items-start space-x-3">
                    <i data-lucide="sun" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1"></i>
                    <div>
                        <h4 class="font-bold text-gray-900">Local Expertise</h4>
                        <p class="text-gray-600 text-sm">Exclusive use of Malaysian native and climate-appropriate flora.</p>
                    </div>
                </div>

                <!-- Value 3 -->
                <div class="flex items-start space-x-3">
                    <i data-lucide="users" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1"></i>
                    <div>
                        <h4 class="font-bold text-gray-900">Client Collaboration</h4>
                        <p class="text-gray-600 text-sm">Working closely with clients to realize their unique vision.</p>
                    </div>
                </div>

                <!-- Value 4 -->
                <div class="flex items-start space-x-3">
                    <i data-lucide="graduation-cap" class="w-5 h-5 text-emerald-600 flex-shrink-0 mt-1"></i>
                    <div>
                        <h4 class="font-bold text-gray-900">Knowledge Sharing</h4>
                        <p class="text-gray-600 text-sm">Educating the community on responsible gardening practices.</p>
                    </div>
                </div>
            </div>
        </div>
      </aside>
    </div>
  </div>
  <!-- 📰 NEW BLOG SECTION -->
  <section class="bg-white py-20">
    <div class="max-w-6xl mx-auto px-6">
<h2 class="text-4xl mb-6 text-center" 
    style="font-family: 'Playfair Display', serif; color:#3D4127; font-weight:700; letter-spacing:1px;">
  OUR LATEST BLOG
</h2>
      <!-- Featured Blog Post Area (Matches the top part of your reference image) -->
      <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 bg-[#D4DE95] p-8 rounded-3xl shadow-xl mb-16">
        
        <!-- Text Content -->
<div class="max-w-xl mx-auto text-center py-12 px-6">
  <h3 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6">
    Discover Sustainable Reads
  </h3>
 <!-- Paragraph with fancy font -->
<p class="text-lg md:text-xl text-gray-700 leading-relaxed mb-8" style="font-family: 'Playfair Display', serif;">
  Explore curated landscaping tips, plant care guides, and sustainability trends to inspire your next garden project. Our posts bring the joy of green living directly to your screen.
</p>
  <!-- Read More button -->
  <button 
    onclick="openModal(1)" 
    class="px-10 py-3 bg-[#636B2F] text-white font-semibold rounded-full shadow-lg hover:from-green-600 hover:to-green-700 transition duration-300">
    Read Our Featured Article
  </button>
</div>


        <!-- Image -->
        <div class="rounded-2xl overflow-hidden shadow-2xl">
          <!-- Placeholder image matching the vibe of the nursery -->
          <img 
            src="https://i.pinimg.com/736x/1d/bc/cd/1dbccd8633209f3c235a456cad236a9c.jpg"
            alt="Sustainable Gardening Concept"
            class="w-full h-full object-cover">
        </div>
      </div>

      <!-- Blog Grid (Matches the bottom part of your reference image) -->
      <div id="blog-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <!-- Blog Cards will be injected here by JavaScript -->
      </div>
    </div>
  </section>

  <!-- 🪴 MODAL STRUCTURE (Hidden by default) -->
  <div id="blog-modal" class="fixed inset-0 bg-black bg-opacity-70 z-50 flex justify-center items-center hidden transition-opacity duration-300">
    <!-- Modal Content -->
    <div class="bg-white rounded-xl shadow-2xl w-full max-w-3xl m-4 transform transition-all duration-300 scale-95 opacity-0" id="modal-content-container">
        
        <!-- Header -->
        <div class="p-6 border-b border-gray-200 flex justify-between items-center bg-emerald-600 rounded-t-xl">
            <h3 id="modal-title" class="text-3xl font-bold text-white"></h3>
            <button onclick="closeModal()" class="text-white hover:text-emerald-200 transition">
                <i data-lucide="x" class="w-8 h-8"></i>
            </button>
        </div>

        <!-- Body -->
        <div class="modal-content-scroll p-6 space-y-4">
            <p id="modal-date" class="text-sm text-gray-500 font-medium"></p>
            <div id="modal-image-container" class="rounded-lg overflow-hidden my-4 shadow-md">
                <!-- Image will be injected here -->
            </div>
            <p id="modal-summary" class="text-lg italic text-gray-700 border-l-4 border-emerald-400 pl-4"></p>
            <div id="modal-full-content" class="text-gray-600 leading-relaxed pt-4">
                <!-- Full content will be injected here -->
            </div>
        </div>

        <!-- Footer -->
        <div class="p-4 border-t border-gray-200 text-right">
            <button onclick="closeModal()" class="px-6 py-2 bg-gray-200 text-gray-700 font-semibold rounded-lg hover:bg-gray-300 transition">
                Close
            </button>
        </div>
    </div>
  </div>


  <!-- Lucide Icons Init & JavaScript Logic -->
  <script>
    lucide.createIcons();

    const blogPosts = [
        {
            id: 1,
            title: "The Ultimate Guide to Tropical Plant Care",
            summary: "Discover the secrets to nurturing exotic flora in Malaysia's humid climate, covering watering, light, and soil needs for vibrant growth.",
            date: "20 September 2024",
            image: "https://i.pinimg.com/736x/08/3f/cd/083fcdf61e80c556bb9515b2ceb0995e.jpg",
            fullContent: "Maintaining tropical plants requires attention to humidity and drainage. Always ensure your pots have excellent drainage to prevent root rot, which is the number one killer of indoor tropical species. Fertilize sparingly during the growing season with a slow-release granular fertilizer high in nitrogen to encourage lush foliage. The ideal indoor temperature range is $20^\circ \text{C}$ to $30^\circ \text{C}$. For added humidity, use a pebble tray or a small humidifier, especially during dry periods. We recommend misting leaves daily to mimic a tropical environment. Remember, consistent care beats occasional intense effort.",
            featured: true,
        },
        {
            id: 2,
            title: "Designing a Low-Maintenance Malaysian Garden",
            summary: "Learn how to select native, drought-tolerant species that minimize water usage and weeding, giving you more time to enjoy your outdoor space.",
            date: "15 August 2024",
            image: "https://i.pinimg.com/736x/50/0b/36/500b366944a3398a4b0155dcddeb1144.jpg",
            fullContent: "The key to low maintenance is planting smartly. Focus on species like *Alocasia*, *Zamia*, and certain types of palms that are naturally adapted to local conditions. Grouping plants with similar watering needs (hydrozoning) is crucial for efficient irrigation. Finally, a thick layer of organic mulch will suppress weeds, retain soil moisture, and naturally enrich the soil over time. This reduces the need for constant human intervention.",
            featured: false,
        },
        {
            id: 3,
            title: "Sustainable Landscaping: The YAH Approach",
            summary: "We break down our eco-friendly practices, from compost production to using biodegradable nursery packaging.",
            date: "01 July 2024",
            image: "https://i.pinimg.com/1200x/eb/9c/be/eb9cbea167e464617264991404dbf532.jpg",
            fullContent: "Our sustainability model centers on a closed-loop system. We recycle all green waste back into nutrient-rich compost, reducing our landfill contribution to near zero. We also strictly avoid chemical pesticides, preferring natural biological controls and integrated pest management (IPM). This commitment ensures our plants are healthy, and our environmental footprint is minimal, supporting a healthier ecosystem.",
            featured: false,
        },
        {
            id: 4,
            title: "The Best Flowering Trees for Small Gardens",
            summary: "A curated list of beautiful, compact flowering trees that thrive in urban settings without overwhelming small spaces.",
            date: "10 June 2024",
            image: "https://i.pinimg.com/1200x/26/bf/7f/26bf7f65a2138bc6cde3718cb17e3ed0.jpg",
            fullContent: "For small Malaysian gardens, consider the *Plumeria* (Frangipani) for its scent and manageable size, or the dwarf *Lagerstroemia* (Crepe Myrtle). These trees offer spectacular seasonal blooms and do not develop extensive, damaging root systems, making them perfect for terraces or patios. Always check the final size of the species before planting to avoid future structural conflicts.",
            featured: false,
        },
    ];

    const blogGrid = document.getElementById('blog-grid');
    const modal = document.getElementById('blog-modal');
    const modalContentContainer = document.getElementById('modal-content-container');
    
    // Function to render the blog cards
    function renderBlogGrid() {
        blogPosts.forEach(post => {
            const card = document.createElement('div');
            card.className = 'bg-white rounded-xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300 transform hover:-translate-y-1 border border-gray-100';
            
            card.innerHTML = `
                <img src="${post.image.replace('600x400', '400x250')}" alt="${post.title}" class="w-full h-40 object-cover">
                <div class="p-5 space-y-3">
                    <h4 class="text-lg font-bold text-gray-900">${post.title}</h4>
                    <p class="text-xs text-gray-500">${post.date}</p>
                    <button onclick="openModal(${post.id})" class="text-blue-600 font-semibold text-sm hover:text-blue-800 transition duration-150 flex items-center">
                        Read more <i data-lucide="arrow-right" class="w-4 h-4 ml-1"></i>
                    </button>
                </div>
            `;
            blogGrid.appendChild(card);
        });
        // Re-initialize Lucide icons for the newly added content
        lucide.createIcons();
    }

    // Function to open the modal and populate content
    function openModal(postId) {
        const post = blogPosts.find(p => p.id === postId);
        if (!post) return;

        // Populate modal content
        document.getElementById('modal-title').textContent = post.title;
        document.getElementById('modal-date').textContent = `Published on: ${post.date}`;
        document.getElementById('modal-summary').textContent = post.summary;
        document.getElementById('modal-full-content').innerHTML = post.fullContent; // Use innerHTML for text with markdown/latex

        document.getElementById('modal-image-container').innerHTML = `
            <img src="${post.image}" alt="${post.title}" class="w-full h-64 object-cover">
        `;

        // Display modal
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modalContentContainer.classList.remove('scale-95', 'opacity-0');
            modalContentContainer.classList.add('scale-100', 'opacity-100');
        }, 10);
    }

    // Function to close the modal
    function closeModal() {
        modalContentContainer.classList.remove('scale-100', 'opacity-100');
        modalContentContainer.classList.add('scale-95', 'opacity-0');
        modal.classList.remove('opacity-100');
        
        setTimeout(() => {
            modal.classList.add('hidden');
        }, 300); // Match transition duration
    }

    // Render the grid when the page loads
    document.addEventListener('DOMContentLoaded', renderBlogGrid);
  </script>
  
  <x-footer />
</body>
</html>
