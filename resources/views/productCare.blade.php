<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $plant->name }} - Care Instructions</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex flex-col min-h-screen font-sans">

<x-navbar />

<div class="content-main-wrapper px-4 md:px-10 py-8">

  <div class="container flex flex-col md:flex-row gap-8 bg-white p-6 rounded-xl shadow-lg max-w-6xl mx-auto">
    
    <!-- Plant Image -->
    <div class="image flex-1 overflow-hidden rounded-lg shadow-md">
      <img src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}" class="w-full h-auto object-cover rounded-lg">
    </div>

    <!-- Plant Care & Products -->
    <div class="details flex-1 flex flex-col justify-start gap-4">
      <h2 class="text-3xl font-serif font-bold text-[#3D4127]">Plant Care: {{ $plant->name }}</h2>

      <p class="plant-care text-[#636B2F] text-lg mt-4">
        {!! nl2br(e($plant->plant_care ?? 'No care instructions available.')) !!}
      </p>

      <!-- Products of this plant -->
      <h3 class="text-2xl font-serif font-semibold mt-6 text-[#3D4127]">Products for {{ $plant->name }}</h3>
      <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mt-4">
        @foreach($plant->products as $product)
          <div class="p-4 border rounded-lg shadow-sm">
            <h4 class="font-bold text-lg">{{ $product->name }}</h4>
            <p class="text-[#636B2F]">Price: RM{{ number_format($product->price, 2) }}</p>
            <p class="text-[#636B2F] text-sm mt-1">{{ $product->description }}</p>
          </div>
        @endforeach
        @if($plant->products->isEmpty())
          <p class="text-gray-500 mt-2">No products available for this plant.</p>
        @endif
      </div>

      <a href="{{ route('customer.dashboard') }}" class="btn mt-6 bg-gray-600 text-white px-5 py-2 rounded-lg flex items-center gap-2">
        <i class="fa fa-arrow-left"></i> Back to Dashboard
      </a>
    </div>

  </div>

  <!-- Recommended Plants -->
  @if(isset($recommended) && $recommended->count() > 0)
  <section class="mt-16">
    <h2 class="text-3xl font-serif font-bold text-center text-[#3D4127] mb-6">You May Also Like</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 max-w-6xl mx-auto">
      @foreach($recommended as $rec)
        <a href="{{ route('plants.show', $rec->id) }}" class="group block bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden relative">
          <div class="overflow-hidden h-56">
            <img src="{{ asset('storage/'.$rec->image) }}" alt="{{ $rec->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
          </div>
          <div class="p-4 flex flex-col justify-between gap-2">
            <h3 class="text-lg font-serif font-semibold text-[#3D4127]">{{ $rec->name }}</h3>
            <p class="text-[#3D4127] font-bold">RM{{ number_format($rec->price, 2) }}</p>
          </div>
        </a>
      @endforeach
    </div>
  </section>
  @endif

</div>

<x-footer />

</body>
</html>
