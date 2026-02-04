<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;700&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #fcfcfc;
        }
        /* Custom styles for hover/interaction effects */
        .card-hover {
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.05), 0 1px 2px 0 rgba(0, 0, 0, 0.02);
        }
        .card-hover:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            transform: translateY(-4px);
        }
    </style>
</head>

<body class="text-gray-800">
    <x-navbar />
    <main class="max-w-7xl mx-auto pt-16 pb-20 px-4 sm:px-6 lg:px-8">
        <!-- Main Wishlist Header Section -->
        <div class="mb-12 border-b border-gray-200 pb-4">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-gray-900 tracking-tight" 
                style="font-family: 'Playfair Display', serif;">
                Your Personal Wishlist
            </h1>
            <p class="text-lg text-gray-500 mt-2">
                Products you've saved. Ready when you are.
            </p>
        </div>

        @if ($wishlists->isEmpty())
            <!-- 🌿 HIGH-END EMPTY STATE -->
            <div class="text-center bg-white p-16 sm:p-24 rounded-3xl border border-gray-100 max-w-2xl mx-auto mt-12 shadow-lg">
                <div class="mb-6">
                    <i data-lucide="leaf" class="w-12 h-12 text-emerald-500 mx-auto stroke-[1.5]"></i>
                </div>
                <h2 class="text-3xl font-bold mb-4 text-gray-900">Start Curating Your Garden.</h2>
                <p class="text-gray-600 mb-8 max-w-md mx-auto leading-relaxed">
                    It's time to find your favorites. Browse our collection and click the heart icon to add plants and accessories here.
                </p>
                <a href="{{ route('customer.dashboard') }}" 
                   class="inline-flex items-center justify-center bg-gray-900 text-white px-8 py-3 rounded-lg font-semibold text-base 
                          shadow-xl hover:bg-emerald-600 transition duration-300 transform hover:scale-[1.01] ease-in-out">
                    <span class="mr-2">Explore the Shop</span>
                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                </a>
            </div>
        @else
            <!-- Wishlist Content Header -->
            <div class="flex justify-between items-center mb-6">
                 <p class="text-xl font-medium text-gray-600">
                    Showing <span id="item-count-display" class="font-bold text-gray-900">{{ count($wishlists) }}</span> items total
                </p>
                <!-- Sort button remains static placeholder -->
                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-900 transition duration-150">
                    <i data-lucide="arrow-down-up" class="w-4 h-4 mr-1"></i>
                    Sort By: Date Added
                </button>
            </div>
            
            <!-- Products Grid Container -->
            <div id="wishlist-items-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 xl:grid-cols-4 gap-8">
                @foreach ($wishlists as $wishlist)
                    <!-- ✨ ULTRA-PREMIUM PRODUCT CARD (Item for pagination to target) -->
                    <div class="wishlist-item bg-white rounded-xl card-hover overflow-hidden cursor-pointer">
                        
                        <!-- Image Container -->
                        <div class="relative overflow-hidden aspect-square">
                            <img src="{{ asset('storage/' . $wishlist->plant->image) }}" 
                                alt="{{ $wishlist->plant->name }}" 
                                onerror="this.onerror=null; this.src='https://placehold.co/600x600/F1F5F9/64748B?text=Plant+Image';"
                                class="h-full w-full object-cover transition duration-500 hover:scale-[1.05]">
                        </div>

                        <div class="p-4 border-t border-gray-100">
                            <!-- Product Name & Price -->
                            <div class="flex items-start justify-between mb-3">
                                <div class="truncate pr-2">
                                    <h3 class="text-lg font-semibold text-gray-900 truncate" title="{{ $wishlist->plant->name }}">
                                        {{ $wishlist->plant->name }}
                                    </h3>
                                    
                                </div>
                                <p class="text-xl font-bold text-gray-900 shrink-0">
                                    RM {{ number_format($wishlist->plant->price, 2) }}
                                </p>
                            </div>
                            
                            <!-- Action Buttons - Stacked for Mobile, Subtly styled -->
                            <div class="flex flex-col space-y-2 pt-2">
                                <!-- Primary Action: View/Add to Cart (Mock) -->
                                <a href="{{ route('plant.show', $wishlist->plant->id) }}" 
                                    class="w-full text-center bg-[#636B2F] text-white px-4 py-2.5 rounded-lg font-medium text-sm 
                                            hover:bg-[#3D4127] transition duration-200 flex items-center justify-center space-x-2"> 
                                    <i data-lucide="shopping-bag" class="w-4 h-4"></i>
                                    <span>View & Purchase</span>
                                </a>

                                <!-- Secondary Action: Remove -->
                                <a href="{{ route('wishlist.remove', $wishlist->id) }}" 
                                    class="w-full text-center text-sm py-2.5 rounded-lg font-medium 
                                            text-red-600 border border-gray-200 hover:bg-red-50 hover:border-red-300 transition duration-200 flex items-center justify-center space-x-2"> 
                                    <i data-lucide="x" class="w-4 h-4"></i>
                                    <span>Remove Item</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- /ULTRA-PREMIUM PRODUCT CARD -->
                @endforeach
            </div>

            <!-- Pagination Control Area -->
            <div id="pagination-controls" class="mt-12 flex justify-center">
                <!-- Pagination buttons will be inserted here by JavaScript -->
            </div>
        @endif
    </main>
    
    <!-- Client-Side Pagination Logic and Icon Initialization -->
    <script>
        const ITEMS_PER_PAGE = 8;
        let currentPage = 1;
        
        // This function will run once the full HTML list of items is loaded by the server
        function initializePagination() {
            const items = Array.from(document.querySelectorAll('.wishlist-item'));
            const totalItems = items.length;
            
            // Do nothing if there are no items or 8 or fewer items
            if (totalItems === 0 || totalItems <= ITEMS_PER_PAGE) {
                return; 
            }

            const totalPages = Math.ceil(totalItems / ITEMS_PER_PAGE);
            const controlsContainer = document.getElementById('pagination-controls');

            // --- Function to Display the Correct Page ---
            function showPage(page) {
                currentPage = page;
                const startIndex = (page - 1) * ITEMS_PER_PAGE;
                const endIndex = startIndex + ITEMS_PER_PAGE;

                items.forEach((item, index) => {
                    if (index >= startIndex && index < endIndex) {
                        item.style.display = ''; // Show item
                    } else {
                        item.style.display = 'none'; // Hide item
                    }
                });
                
                // Update active button state
                document.querySelectorAll('.page-btn').forEach(btn => {
                    const pageNumber = parseInt(btn.getAttribute('data-page'));
                    if (pageNumber === currentPage) {
                        // Active state: Dark background
                        btn.classList.add('bg-gray-900', 'text-white');
                        btn.classList.remove('bg-white', 'text-gray-700', 'hover:bg-gray-100');
                    } else {
                        // Inactive state: White background
                        btn.classList.add('bg-white', 'text-gray-700', 'hover:bg-gray-100');
                        btn.classList.remove('bg-gray-900', 'text-white');
                    }
                });

                // Update navigation button states
                document.getElementById('prev-btn').disabled = currentPage === 1;
                document.getElementById('next-btn').disabled = currentPage === totalPages;
                
                // Scroll to top of the grid for better UX
                document.getElementById('wishlist-items-grid')?.scrollIntoView({ behavior: 'smooth' });
            }

            // --- Function to Render Controls ---
            function renderControls() {
                let html = `
                    <nav class="flex items-center space-x-1 p-2 rounded-full border border-gray-200 bg-white shadow-xl">
                        <!-- Previous Button -->
                        <button id="prev-btn" data-direction="-1"
                                class="page-nav-btn p-2 rounded-full text-gray-500 hover:bg-gray-100 transition disabled:opacity-50 disabled:cursor-not-allowed">
                            <i data-lucide="chevron-left" class="w-5 h-5"></i>
                        </button>
                        
                        <!-- Page Number Buttons -->
                        <div id="page-number-group" class="flex space-x-1">
                `;
                
                for (let i = 1; i <= totalPages; i++) {
                    html += `
                        <button data-page="${i}"
                                class="page-btn w-10 h-10 rounded-full text-sm font-semibold transition duration-150 
                                       bg-white text-gray-700 hover:bg-gray-100 border border-transparent">
                            ${i}
                        </button>
                    `;
                }

                html += `
                        </div>
                        <!-- Next Button -->
                        <button id="next-btn" data-direction="1"
                                class="page-nav-btn p-2 rounded-full text-gray-500 hover:bg-gray-100 transition disabled:opacity-50 disabled:cursor-not-allowed">
                            <i data-lucide="chevron-right" class="w-5 h-5"></i>
                        </button>
                    </nav>
                `;
                
                controlsContainer.innerHTML = html;

                // Add event listeners
                document.querySelectorAll('.page-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => showPage(parseInt(e.currentTarget.getAttribute('data-page'))));
                });
                
                document.querySelectorAll('.page-nav-btn').forEach(btn => {
                    btn.addEventListener('click', (e) => {
                        const direction = parseInt(e.currentTarget.getAttribute('data-direction'));
                        showPage(currentPage + direction);
                    });
                });
            }
            
            // --- Initialization ---
            renderControls();
            showPage(1); // Show the first page by default
        }

        document.addEventListener('DOMContentLoaded', () => {
            lucide.createIcons();
            // Wait for icons to be created, then initialize pagination
            setTimeout(initializePagination, 50); 
        });
    </script>
    
    <!-- SweetAlerts remain the same -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Item Removed!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: 'top-end',
                background: '#f0fdf4',
                color: '#166534',
                customClass: { container: 'mt-16' }
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 2000,
                toast: true,
                position: 'top-end',
                background: '#fef2f2',
                color: '#b91c1c',
                customClass: { container: 'mt-16' }
            });
        </script>
    @endif
    <x-footer />
</body>
</html>
