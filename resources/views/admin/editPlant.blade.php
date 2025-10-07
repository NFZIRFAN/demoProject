<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Plant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');

        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4;
        }

        .text-leaf { color: #2F8F2F; }
        .bg-leaf { background-color: #2F8F2F; }
        .bg-earth { background-color: #543310; }
        .bg-terracotta { background-color: #D47551; }
        .border-terracotta { border-color: #D47551; }
        .text-earth { color: #543310; }

        input:focus, textarea:focus, select:focus {
            border-color: #2F8F2F;
            box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.4);
            outline: none;
        }

        .btn-hover-grow:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    },
                    colors: {
                        leaf: '#2F8F2F',
                        earth: '#543310',
                        terracotta: '#D47551',
                        sun: '#F1C40F',
                    },
                }
            }
        }
    </script>
</head>
<body class="bg-gradient-to-br from-green-50 to-white text-gray-800 min-h-screen flex justify-center items-center p-4 transition-all duration-300">

    <div class="w-full max-w-2xl bg-white rounded-3xl shadow-2xl overflow-hidden p-8 border-t-8 border-leaf transform transition-all duration-500">
        <h2 class="text-4xl font-serif font-bold text-center mb-2 text-leaf drop-shadow-sm">✏ Edit Plant</h2>
        <p class="text-center text-sm text-gray-500 mb-6">Update the details of the plant below.</p>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
                <ul class="list-disc list-inside mb-0 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.plants.update', $plant->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Plant Name -->
                    <div class="form-group">
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-1">🌿 Plant Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" value="{{ old('name', $plant->name) }}" required>
                    </div>

                    <!-- Price -->
                    <div class="form-group">
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-1">💰 Price (RM)</label>
                        <input type="number" id="price" step="0.01" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" value="{{ old('price', $plant->price) }}" required>
                    </div>
                    
                    <!-- Reorder Level -->
                    <div class="form-group">
                        <label for="reorder_level" class="block text-sm font-medium text-gray-700 mb-1">🔄 Reorder Level</label>
                        <input type="number" id="reorder_level" name="reorder_level" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" value="{{ old('reorder_level', $plant->reorder_level) }}" required>
                    </div>

                    <!-- Category -->
                    <div class="form-group">
                        <label for="category" class="block text-sm font-medium text-gray-700 mb-1">🏷 Category</label>
                        <input type="text" id="category" name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" value="{{ old('category', $plant->category) }}" required>
                    </div>

                    <!-- Description -->
                    <div class="form-group md:col-span-2">
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-1">📝 Description</label>
                        <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" >{{ old('description', $plant->description) }}</textarea>
                    </div>
                </div>

                <!-- Right Column (Image and Start Quantity) -->
                <div class="space-y-6">
                    <!-- Start Quantity -->
                    <div class="form-group">
                        <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-1">📦 Start Quantity</label>
                        <input type="number" id="stock_quantity" name="stock_quantity" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" value="{{ old('stock_quantity', $plant->stock_quantity) }}" required>
                    </div>

                    <!-- Plant Image -->
                    <div class="form-group">
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">🖼 Plant Image</label>
                        @if($plant->image)
                            <img src="{{ asset('storage/' . $plant->image) }}" class="mb-2 w-full h-48 object-cover rounded-lg shadow-sm" alt="Current Plant Image">
                        @endif
                        <div class="flex items-center w-full bg-white px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300 focus-within:border-leaf focus-within:ring-3 focus-within:ring-leaf focus-within:ring-opacity-40">
                            <span id="fileNameDisplay" class="flex-grow text-sm text-gray-500 italic truncate mr-4">
                                {{ $plant->image ? basename($plant->image) : 'No file chosen' }}
                            </span>
                            <label class="cursor-pointer bg-leaf hover:bg-earth text-white font-semibold py-1.5 px-4 rounded-full transition-all duration-300 text-sm">
                                Choose File
                                <input type="file" id="image" name="image" class="hidden">
                            </label>
                        </div>
                        <small class="text-xs text-gray-400 mt-1 block">Leave empty if you don’t want to change the image.</small>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex flex-col md:flex-row justify-between items-center pt-4">
                <a href="{{ route('admin.plants.index') }}" class="w-full md:w-auto flex justify-center items-center px-6 py-3 border border-leaf text-sm font-semibold rounded-full text-leaf hover:bg-leaf hover:text-white transition-all duration-300 btn-hover-grow mb-4 md:mb-0">
                    <i class="fa-solid fa-clipboard-list mr-2"></i> Back to Plant List
                </a>
                <button type="submit" class="w-full md:w-auto flex justify-center items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-full shadow-lg text-white bg-leaf hover:bg-earth transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-leaf btn-hover-grow md:ml-4">
                    <i class="fa-solid fa-save mr-2"></i> Update Plant
                </button>
            </div>
        </form>
    </div>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Update file name display on file selection
            document.getElementById('image').addEventListener('change', function(e) {
                const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
                document.getElementById('fileNameDisplay').textContent = fileName;
            });
        });
    </script>

</body>
</html>
