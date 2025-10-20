<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Wishlist</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
        }
        .remove-btn {
            @apply text-red-500 hover:text-red-700 transition duration-150;
        }
    </style>
</head>

<body class="text-gray-800">
      <x-navbar />
    <main class="max-w-6xl mx-auto py-12 px-4 sm:px-6 lg:px-8">
        @if ($wishlists->isEmpty())
            <div class="text-center bg-white p-12 sm:p-20 rounded-2xl shadow-xl border border-gray-200">
                <div class="text-5xl mb-4 text-emerald-400">🌱</div>
                <h2 class="text-2xl font-bold mb-3 text-gray-900">Your Wishlist is Empty!</h2>
                <p class="text-gray-600 mb-6 max-w-md mx-auto">
                    Add your favorite plants, seeds, or gardening tools here so you don't forget them when shopping later.
                </p>
                <a href="{{ route('customer.dashboard') }}" class="mt-4 inline-block bg-emerald-600 text-white px-8 py-3 rounded-full font-semibold shadow-lg hover:bg-emerald-700 transition transform hover:scale-[1.02]">
                    Start Shopping Now
                </a>
            </div>
        @else
            <h2 class="text-xl font-semibold mb-6 text-gray-900">Products You Love ({{ count($wishlists) }} items)</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($wishlists as $wishlist)
                    <div class="bg-white rounded-2xl shadow-xl overflow-hidden transform hover:scale-[1.02] transition duration-300 border border-gray-100">
                        <img src="{{ asset('storage/' . $wishlist->plant->image) }}" 
                             alt="{{ $wishlist->plant->name }}" 
                             onerror="this.onerror=null; this.src='https://placehold.co/600x400/D1FAE5/065F46?text=Plant+Image';"
                             class="h-56 w-full object-cover aspect-video"> 
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-1 text-gray-900 truncate">{{ $wishlist->plant->name }}</h3>
                            <p class="text-2xl font-extrabold text-red-500 mb-4">
                                RM {{ number_format($wishlist->plant->price, 2) }}
                            </p>
                            <div class="flex flex-col space-y-3">
                                <a href="{{ route('plant.show', $wishlist->plant->id) }}" 
                                        class="w-full text-center bg-emerald-500 text-white px-4 py-2.5 rounded-full font-medium hover:bg-emerald-600 transition shadow-md"> 
                                            View Product Details
                                        </a>

                                <a href="{{ route('wishlist.remove', $wishlist->id) }}" 
                                   class="w-full text-center text-sm remove-btn border border-gray-300 py-2 rounded-full hover:bg-red-50 hover:border-red-500"> 
                                    Remove from Wishlist
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </main>

    <!-- ✅ SweetAlert for Flash Messages -->
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                showConfirmButton: false,
                timer: 1800,
                background: '#ecfdf5',
                color: '#065f46'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '{{ session('error') }}',
                showConfirmButton: false,
                timer: 1800,
                background: '#fef2f2',
                color: '#991b1b'
            });
        </script>
    @endif
    <x-footer />
</body>
</html>
