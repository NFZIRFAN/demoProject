<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Plant</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f0fdf4; /* A very light green background */
        }

        /* Consistent color and font theme */
        .text-leaf { color: #2F8F2F; }
        .bg-leaf { background-color: #2F8F2F; }
        .bg-earth { background-color: #543310; }
        .bg-terracotta { background-color: #D47551; }
        .border-terracotta { border-color: #D47551; }
        .text-earth { color: #543310; }
        
        /* Custom focus ring for inputs */
        input:focus, textarea:focus, select:focus {
            border-color: #2F8F2F;
            box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.4);
            outline: none;
        }

        /* Button hover effect */
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

    <div class="w-full max-w-lg bg-white rounded-3xl shadow-2xl overflow-hidden p-8 border-t-8 border-leaf transform transition-all duration-500">
        <h2 class="text-4xl font-serif font-bold text-center mb-2 text-leaf drop-shadow-sm">Add New Plant</h2>
        <p class="text-center text-sm text-gray-500 mb-6">Complete the form below to add a new plant to the inventory.</p>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg mb-4" role="alert">
                <ul class="list-disc list-inside mb-0 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg mb-4" role="alert">
                {{ session('success') }}
            </div>
        @endif
        
        <form action="{{ route('admin.plants.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Plant Name -->
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Plant Name</label>
                <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" placeholder="e.g., Fiddle Leaf Fig" value="{{ old('name') }}" required>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Price (RM)</label>
                <input type="number" id="price" step="0.01" name="price" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" placeholder="0.00" value="{{ old('price') }}" required>
            </div>

            <!-- Description -->
            <div class="form-group">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Description</label>
                <textarea id="description" name="description" rows="3" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" placeholder="A brief description of the plant...">{{ old('description') }}</textarea>
            </div>

            <!-- Stock Quantity -->
            <div class="form-group">
                <label for="stock_quantity" class="block text-sm font-medium text-gray-700 mb-1">Stock Quantity</label>
                <input type="number" id="stock_quantity" name="stock_quantity" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" placeholder="0" value="{{ old('stock_quantity') }}" required>
            </div>

            <!-- Reorder Level -->
            <div class="form-group">
                <label for="reorder_level" class="block text-sm font-medium text-gray-700 mb-1">Reorder Level</label>
                <input type="number" id="reorder_level" name="reorder_level" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" placeholder="0" value="{{ old('reorder_level') }}" required>
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select id="category" name="category" class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm transition-all duration-300" required>
                    <option value="">-- Select Category --</option>
                    <option value="Indoor" {{ old('category')=='Indoor' ? 'selected' : '' }}>Indoor</option>
                    <option value="Outdoor" {{ old('category')=='Outdoor' ? 'selected' : '' }}>Outdoor</option>
                    <option value="Pots" {{ old('category')=='Pots' ? 'selected' : '' }}>Pots</option>
                    <option value="Fertilizers" {{ old('category')=='Fertilizers' ? 'selected' : '' }}>Fertilizers</option>
                </select>
            </div>

            <!-- Plant Image -->
            <div class="form-group">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Plant Image</label>
                <div class="flex items-center w-full px-4 py-1.5 border border-gray-300 rounded-lg shadow-sm transition-all duration-300">
                    <label class="cursor-pointer bg-leaf hover:bg-earth text-white font-semibold py-1.5 px-4 rounded-full transition-all duration-300 text-sm">
                        Choose File
                        <input type="file" id="image" name="image" class="hidden" required>
                    </label>
                    <span id="fileNameDisplay" class="ml-4 text-sm text-gray-500 italic truncate">No file chosen</span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="w-full flex justify-center items-center px-6 py-3 border border-transparent text-sm font-semibold rounded-full shadow-lg text-white bg-leaf hover:bg-earth transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-leaf btn-hover-grow">
                <i class="fa-solid fa-plus-circle mr-2"></i> Add Plant
            </button>
        </form>

        <!-- View Plant List Button -->
        <a href="{{ route('admin.plants.index') }}" class="mt-4 block">
            <button type="button" class="w-full flex justify-center items-center px-6 py-3 border border-leaf text-sm font-semibold rounded-full text-leaf hover:bg-leaf hover:text-white transition-all duration-300 btn-hover-grow">
                <i class="fa-solid fa-clipboard-list mr-2"></i> View Plant List
            </button>
        </a>
    </div>
    
    <script>
        // Update file name display on file selection
        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = e.target.files[0] ? e.target.files[0].name : 'No file chosen';
            document.getElementById('fileNameDisplay').textContent = fileName;
        });
    </script>

</body>
</html>
