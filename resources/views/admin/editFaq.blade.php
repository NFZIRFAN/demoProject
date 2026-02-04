<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Edit FAQ | Yah Nursery Admin</title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<script src="https://cdn.tailwindcss.com"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Inter:wght@400;500;600&display=swap');

body { font-family: 'Inter', sans-serif; background-color: #f4f4f0; margin:0; }

input:focus, textarea:focus, select:focus {
  border-color: #2F8F2F;
  box-shadow: 0 0 0 3px rgba(47,143,47,0.4);
  outline: none;
}

#mainContent {
  transition: margin 0.4s ease, max-width 0.4s ease;
  max-width: calc(100% - 16rem);
  margin-left: 16rem;
}

#mainContent.centered {
  margin-left: auto;
  margin-right: auto;
  max-width: 100%;
}

.card-container {
  background-color: #fff;
  border-top: 4px solid #2F8F2F;
  border-radius: 1rem;
  padding: 2rem;
  width: 100%;
}

.section-title {
  font-family: 'Playfair Display', serif;
  font-weight: 700;
  font-size: 1.5rem;
  color: #2F8F2F;
  margin-top: 1.5rem;
  margin-bottom: 0.75rem;
  border-bottom: 1px dashed #2F8F2F40;
  padding-bottom: 0.25rem;
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

<body class="min-h-screen flex flex-col">

<!-- Sidebar -->
<x-sidebarAdmin id="sidebar" />

<!-- Main Content -->
<main id="mainContent" class="flex-1 p-4 sm:p-6 lg:p-8">

  <div class="card-container">

    <!-- Header -->
    <div class="mb-6 border-b pb-4">
      <h1 class="text-3xl font-serif font-bold text-earth mb-2">Edit FAQ</h1>
      <p class="text-gray-600 text-sm">Update the FAQ details below</p>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
    <div class="bg-green-100 border-l-4 border-leaf text-green-700 p-4 rounded-lg shadow-sm mb-6" role="alert">
      <p class="font-bold">Success!</p>
      <p class="text-sm">{{ session('success') }}</p>
    </div>
    @endif

    <!-- Form -->
    <form action="{{ route('admin.faq.update', $faq->id) }}" method="POST" class="space-y-6">
      @csrf
      @method('PUT')

      <!-- Section -->
      <div>
        <label class="block font-semibold mb-2">Section</label>
        <select name="section" class="w-full border border-gray-300 rounded-lg p-3 text-sm shadow-sm focus:ring-0" required>
          <option value="">-- Select Section --</option>
          <option value="Plant-related Questions" {{ $faq->section == 'Plant-related Questions' ? 'selected' : '' }}>Plant-related Questions</option>
          <option value="Fertilizer-related Questions" {{ $faq->section == 'Fertilizer-related Questions' ? 'selected' : '' }}>Fertilizer-related Questions</option>
          <option value="Ordering & Delivery Questions" {{ $faq->section == 'Ordering & Delivery Questions' ? 'selected' : '' }}>Ordering & Delivery Questions</option>
          <option value="Product & Website Info" {{ $faq->section == 'Product & Website Info' ? 'selected' : '' }}>Product & Website Info</option>
          <option value="Care & Support Questions" {{ $faq->section == 'Care & Support Questions' ? 'selected' : '' }}>Care & Support Questions</option>
        </select>
      </div>

      <!-- Question -->
      <div>
        <label class="block font-semibold mb-2">Question</label>
        <input type="text" name="question" class="w-full border border-gray-300 rounded-lg p-3 text-sm shadow-sm focus:ring-0" value="{{ $faq->question }}" required>
      </div>

      <!-- Answer -->
      <div>
        <label class="block font-semibold mb-2">Answer</label>
        <textarea name="answer" class="w-full border border-gray-300 rounded-lg p-3 text-sm shadow-sm focus:ring-0" rows="4" required>{{ $faq->answer }}</textarea>
      </div>

      <!-- Keywords -->
      <div>
        <label class="block font-semibold mb-2">Keywords (optional)</label>
        <input type="text" name="keywords" class="w-full border border-gray-300 rounded-lg p-3 text-sm shadow-sm focus:ring-0" value="{{ $faq->keywords }}">
      </div>

      <!-- Buttons -->
      <div class="flex flex-col sm:flex-row justify-start gap-3">
        <a href="{{ route('admin.faq.index') }}" class="w-full sm:w-auto flex justify-center px-6 py-3 border border-gray-300 rounded-full text-earth font-semibold text-sm hover:bg-gray-100 transition duration-200">
          <i class="fa-solid fa-arrow-left-long mr-2"></i> Cancel
        </a>
        <button type="submit" class="w-full sm:w-auto flex justify-center px-6 py-3 bg-leaf text-white font-semibold rounded-full text-sm hover:bg-earth transition duration-200 shadow-md">
          <i class="fa-solid fa-floppy-disk mr-2"></i> Update FAQ
        </button>
      </div>
    </form>

  </div>
</main>

<footer class="py-4 text-center text-xs text-gray-400 border-t mt-6">
  &copy; 2024 Yah Nursery Admin. All rights reserved.
</footer>

<script>
  // Sidebar toggle function
  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const main = document.getElementById('mainContent');
    sidebar.classList.toggle('hidden');
    main.classList.toggle('centered');
  }
</script>

</body>
</html>
