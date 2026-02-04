<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add FAQ | Yah Nursery</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');

    body {
      font-family: 'Inter', sans-serif;
      background-color: #f4f4f0;
      margin: 0;
    }

    input:focus, textarea:focus, select:focus {
      border-color: #2F8F2F;
      box-shadow: 0 0 0 3px rgba(47, 143, 47, 0.3);
      outline: none;
    }

    .form-card {
      border-top: 4px solid #2F8F2F;
      transition: all 0.3s ease;
      max-width: 900px;
      margin: auto;
    }

    .form-card:hover {
      box-shadow: 0 8px 25px rgba(0,0,0,0.1);
      transform: translateY(-2px);
    }

    h1 {
      font-family: 'Playfair Display', serif;
    }
  </style>

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            leaf: '#2F8F2F',
            terracotta: '#D47551',
            earth: '#543310',
          },
          fontFamily: {
            sans: ['Inter', 'sans-serif'],
            serif: ['Playfair Display', 'serif'],
          },
        },
      },
    }
  </script>
</head>

<body class="min-h-screen flex flex-col">

  <!-- Sidebar -->
  <x-sidebarAdmin />

  <!-- Main Content -->
  <main class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 flex justify-center">

    <!-- Add FAQ Card -->
    <div class="bg-white rounded-2xl shadow-2xl p-10 form-card w-full">

      <!-- Header -->
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 border-b pb-4">
        <h1 class="text-4xl font-serif font-bold text-earth mb-4 md:mb-0">Add New FAQ</h1>
        <a href="{{ route('admin.faq.index') }}">
          <button class="flex items-center px-5 py-3 bg-leaf text-white font-semibold rounded-full text-sm hover:bg-earth transition duration-200 shadow-md">
            <i class="fa-solid fa-list mr-2"></i> View FAQs
          </button>
        </a>
      </div>

      <!-- FAQ Form -->
      <form action="{{ route('admin.faq.store') }}" method="POST" class="space-y-8">
        @csrf

        <div class="grid grid-cols-12 gap-6 items-center">
          <!-- Section -->
          <label class="col-span-12 sm:col-span-3 font-semibold text-earth text-lg">Section</label>
          <div class="col-span-12 sm:col-span-9">
            <select name="section" class="w-full border border-gray-300 rounded-2xl p-4 text-base shadow-sm hover:border-leaf" required>
              <option value="">-- Select Section --</option>
              <option value="Plant-related Questions">Plant-related Questions</option>
              <option value="Fertilizer-related Questions">Fertilizer-related Questions</option>
              <option value="Ordering & Delivery Questions">Ordering & Delivery Questions</option>
              <option value="Product & Website Info">Product & Website Info</option>
              <option value="Care & Support Questions">Care & Support Questions</option>
            </select>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-6 items-center">
          <!-- Question -->
          <label class="col-span-12 sm:col-span-3 font-semibold text-earth text-lg">Question</label>
          <div class="col-span-12 sm:col-span-9">
            <input type="text" name="question" class="w-full border border-gray-300 rounded-2xl p-4 text-base shadow-sm hover:border-leaf" required>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-6 items-start">
          <!-- Answer -->
          <label class="col-span-12 sm:col-span-3 font-semibold text-earth text-lg pt-2">Answer</label>
          <div class="col-span-12 sm:col-span-9">
            <textarea name="answer" rows="6" class="w-full border border-gray-300 rounded-2xl p-4 text-base shadow-sm hover:border-leaf" required></textarea>
          </div>
        </div>

        <div class="grid grid-cols-12 gap-6 items-center">
          <!-- Keywords -->
          <label class="col-span-12 sm:col-span-3 font-semibold text-earth text-lg">Keywords</label>
          <div class="col-span-12 sm:col-span-9">
            <input type="text" name="keywords" class="w-full border border-gray-300 rounded-2xl p-4 text-base shadow-sm hover:border-leaf" placeholder="e.g. indoor, watering, sunlight">
          </div>
        </div>

        <!-- Buttons -->
        <div class="flex flex-col sm:flex-row justify-between gap-4 pt-6 border-t">
          <a href="{{ route('admin.faq.index') }}" class="w-full sm:w-auto flex justify-center px-8 py-3 border border-gray-300 rounded-full text-earth font-semibold text-sm hover:bg-gray-100">
            <i class="fa-solid fa-arrow-left-long mr-2"></i> Back to List
          </a>
          <button type="submit" class="w-full sm:w-auto flex justify-center px-8 py-3 bg-leaf text-white font-semibold rounded-full text-sm hover:bg-earth shadow-md">
            <i class="fa-solid fa-plus mr-2"></i> Add FAQ
          </button>
        </div>

      </form>
    </div>
  </main>

  <footer class="py-4 text-center text-xs text-gray-400 mt-10">
    &copy; 2024 Yah Nursery FAQ Management. All rights reserved.
  </footer>

</body>
</html>
