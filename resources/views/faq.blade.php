<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support Center | Yah Nursery & Landscape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600;700&display=swap" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; }

        /* Chat Animation */
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(20px) scale(0.95); }
            to { opacity: 1; transform: translateY(0) scale(1); }
        }
        .chat-animate { animation: slideIn 0.3s cubic-bezier(0.16, 1, 0.3, 1); }

        /* Custom Scrollbar */
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .chat-scroll::-webkit-scrollbar { width: 5px; }
        .chat-scroll::-webkit-scrollbar-track { background: #f1f1f1; }
        .chat-scroll::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 5px; }
        .chat-scroll::-webkit-scrollbar-thumb:hover { background: #9ca3af; }

        /* Typing dot animation */
        .typing-dot { animation: typing 1.4s infinite ease-in-out both; }
        .typing-dot:nth-child(1) { animation-delay: -0.32s; }
        .typing-child:nth-child(2) { animation-delay: -0.16s; }
        @keyframes typing {
            0%, 80%, 100% { transform: scale(0); }
            40% { transform: scale(1); }
        }

        /* FAQ Details */
        details summary::-webkit-details-marker { display: none; }
        details summary:after { content: '▸'; float: right; transition: transform 0.2s; }
        details[open] summary:after { transform: rotate(90deg); }
    </style>
</head>
<body class="bg-slate-50 text-slate-800">

<x-navbar />

<!-- HERO SECTION -->
<div class="relative overflow-hidden">
    <img src="https://i.pinimg.com/1200x/87/b1/d1/87b1d17bb072e98281415bf24e6abf99.jpg"
         class="absolute inset-0 w-full h-full object-cover brightness-75">
    <div class="max-w-4xl mx-auto py-32 px-6 relative text-center">
        <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-white"
            style="font-family: 'Playfair Display', serif;">
            How can we help you grow?
        </h1>
        <p class="mt-4 text-lg text-gray-200">
            Find answers to your questions about plants, orders, and services.
        </p>

        <!-- Search Bar -->
        <div class="mt-10 max-w-xl mx-auto relative">
            <span class="absolute left-4 top-3.5 text-gray-400">
                <i data-lucide="search" class="w-5 h-5"></i>
            </span>
            <input type="text" id="faq-search" placeholder="Search your question..."
                   class="w-full pl-12 pr-4 py-3 rounded-2xl bg-white/70 backdrop-blur-md shadow-lg border border-white/40
                   focus:ring-2 focus:ring-emerald-500 focus:outline-none transition-all">
        </div>
    </div>
</div>

  <!-- FAQ SECTION WITH LEFT ICONS/QUESTIONS AND RIGHT IMAGE -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">

        <!-- LEFT SIDE: Categories + FAQ -->
        <div class="space-y-8">

            <!-- MAIN CATEGORY ICONS -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Category 1 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center mb-4">
                        <video src="https://cdn-icons-mp4.flaticon.com/512/15309/15309735.mp4" autoplay loop muted playsinline class="w-full h-full object-contain"></video>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-center">Shipping & Delivery</h3>
                </div>

                <!-- Category 2 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center mb-4">
                        <video src="https://cdn-icons-mp4.flaticon.com/512/15366/15366182.mp4" autoplay loop muted playsinline class="w-full h-full object-contain"></video>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-center">Plant Care Guide</h3>
                </div>

                <!-- Category 3 -->
                <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition flex flex-col items-center">
                    <div class="w-12 h-12 rounded-full overflow-hidden flex items-center justify-center mb-4">
                        <video src="https://cdn-icons-mp4.flaticon.com/512/12147/12147190.mp4" autoplay loop muted playsinline class="w-full h-full object-contain"></video>
                    </div>
                    <h3 class="font-semibold text-gray-900 text-center">Returns & Refunds</h3>
                </div>
            </div>

            <!-- FAQ QUESTIONS WITH ICON NEXT TO TITLE -->
            <div id="faq-left">
                <div class="flex items-center mb-6">
                    <h2 class="text-3xl font-bold text-gray-900 mr-4" style="font-family: 'Playfair Display', serif;">
                        Common Questions
                    </h2>
                    <!-- Video Icon -->
                    <div class="w-16 h-16">
                        <video src="https://cdn-icons-mp4.flaticon.com/512/15370/15370728.mp4" autoplay loop muted playsinline 
                               class="w-full h-full object-contain rounded-lg shadow-md"></video>
                    </div>
                </div>

                <div id="faq-list" class="space-y-4">
                    @php
                        $faqs = \App\Models\FAQ::latest()->take(5)->get();
                    @endphp

                    @foreach($faqs as $faq)
                        <details class="group border border-gray-300 rounded-lg overflow-hidden bg-white shadow-sm transition">
                            <summary class="cursor-pointer px-4 py-3 font-medium text-gray-900 group-open:bg-green-50 transition" 
                                     style="font-family: 'Playfair Display', serif;">
                                {{ $faq->question }}
                            </summary>
                            <div class="px-4 py-3 text-gray-700 bg-gray-50">
                                {!! $faq->answer !!}
                            </div>
                        </details>
                    @endforeach
                </div>
            </div>

        </div>

        <!-- RIGHT SIDE: IMAGE -->
        <div>
           <img src="https://i.pinimg.com/1200x/e3/17/d6/e317d64c48a77d12cb16d42b3f920d4e.jpg" >
          </div>

    </div>
</div>



<!-- FAQ Search Filter -->
<script>
    const faqSearchInput = document.getElementById('faq-search');
    const faqDetails = document.querySelectorAll('#faq-list details');

    faqSearchInput.addEventListener('input', () => {
        const query = faqSearchInput.value.toLowerCase();
        faqDetails.forEach(detail => {
            const question = detail.querySelector('summary').innerText.toLowerCase();
            detail.style.display = question.includes(query) ? 'block' : 'none';
        });
    });
</script>


<x-footer />

</body>
</html>
