<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Orders | Yah Nursery</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
<style>
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8fcf8;
        padding-top: 100px; /* sticky navbar space */
        overflow-x: hidden; /* remove horizontal scroll */
    }
    .font-playfair { font-family: 'Playfair Display', serif; }

    /* Navbar & Footer full-width */
    .full-width-bar {
        width: 100vw !important;
        margin-left: calc(50% - 50vw) !important;
        margin-right: calc(50% - 50vw) !important;
    }

    #stickyNavbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 50;
        background-color: rgba(255,255,255,0.95);
        backdrop-filter: blur(6px);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table-row-hover:hover {
        background-color: #f3faf3;
        box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
        transform: translateY(-1px);
    }

    /* Pagination */
    .pagination-wrapper {
        display: flex;
        justify-content: flex-end;
        margin-top: 1.5rem;
    }
    .pagination-wrapper ul {
        display: flex;
        gap: 0.5rem;
    }
    .pagination-wrapper li span,
    .pagination-wrapper li a {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 2.5rem;
        height: 2.5rem;
        border-radius: 9999px;
        background-color: #f3f3f3;
        color: #4b5563;
        font-weight: 500;
        text-decoration: none;
        transition: all 0.2s ease;
    }
    .pagination-wrapper li span.active,
    .pagination-wrapper li a:hover {
        background-color: #a3ce3eff;
        color: #fff;
    }
    .pagination-wrapper li span.disabled {
        opacity: 0.4;
        cursor: not-allowed;
    }
    @keyframes bounce-left {
  0%, 100% { transform: translateX(0); }
  25% { transform: translateX(-3px); }
  50% { transform: translateX(-6px); }
  75% { transform: translateX(-3px); }
}
.icon-bounce {
  display: inline-block;
  animation: bounce-left 1s infinite;
}
</style>
</head>
<body class="bg-gray-100 min-h-screen">

<!-- ⭐ Sticky Navbar -->
<div id="stickyNavbar" class="full-width-bar">
    <x-navbar />
</div>
<!-- 🌿 Full-Width Video Banner -->
<div class="relative w-full h-[550px] overflow-hidden"> <!-- Increased height -->
    <video autoplay muted loop playsinline
           class="absolute top-0 left-0 w-full h-full object-cover z-0">
        <source src="{{ asset('storage/video/b14.mp4') }}" type="video/mp4">
        Your browser does not support the video tag.
    </video>
    <div class="absolute inset-0 bg-black/25 z-10"></div> <!-- overlay -->

    <!-- Centered Text -->
    <div class="relative z-20 flex flex-col justify-center items-center text-center h-full px-4">
        <!-- Title -->
        <h1 class="text-4xl md:text-5xl lg:text-6xl font-playfair font-extrabold text-white drop-shadow-lg">
    Welcome to Order History
</h1>

        
        <!-- Subtitle -->
        <p class="mt-4 text-lg md:text-xl lg:text-2xl font-light text-gray-100 max-w-3xl drop-shadow-md">
            Track your orders and enjoy fresh plants delivered directly to your doorstep
        </p>
    </div>
</div>


<!-- Top Buttons BELOW Banner -->
<div class="max-w-6xl mx-auto mt-6 mb-6 flex flex-col md:flex-row gap-4 md:gap-0
            justify-start md:justify-between items-start md:items-center px-4">
    <a href="{{ route('customer.dashboard') }}" 
       class="px-5 py-2.5 bg-gradient-to-r from-[#636B2F] via-[#BAC095] to-[#3D4127] text-white rounded-xl shadow-lg hover:opacity-90 transition flex items-center gap-2 font-semibold">
       <i class="fa-solid fa-arrow-left"></i> Back to Dashboard
    </a>

<!-- Animated video icon with hover effect -->
<video autoplay loop muted playsinline
       class="w-14 h-14 rounded-lg transition-transform duration-500 ease-in-out hover:scale-125 hover:-translate-y-2">
    <source src="https://cdn-icons-mp4.flaticon.com/512/15576/15576191.mp4" type="video/mp4">
    Your browser does not support the video tag.
</video>


</div>


<!-- 🔥 Page Title -->
<div class="max-w-6xl mx-auto mb-6 border-b border-gray-200 pb-3 px-4">
    <h1 class="text-5xl font-playfair font-extrabold text-gray-800 tracking-tight">My Orders</h1>
    <p class="text-gray-500 text-lg mt-2 font-light">Track your recent purchases and delivery updates from Yah Nursery.</p>
</div>

<!-- 🔥 Orders Table / Empty State -->
<div class="max-w-6xl mx-auto bg-white rounded-3xl shadow-2xl p-8 mb-10 border border-gray-100 px-4">

@if($orders->isEmpty())
    <div class="text-center py-16">
        <i class="fa-solid fa-leaf text-6xl text-green-500 mb-4"></i>
        <p class="text-gray-500 text-xl font-medium">You haven't placed any orders yet.</p>
        <a href="/" class="mt-6 inline-block px-8 py-3 bg-green-600 text-white rounded-full shadow-xl hover:bg-green-700 transition font-semibold text-lg">
            Start Shopping Now
        </a>
    </div>
@else
{{-- 🖥️ DESKTOP TABLE --}}
<div class="hidden md:block overflow-x-auto">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-[#BAC095] text-left text-[#3D4127] font-bold uppercase text-xs tracking-wider">
                <th class="py-4 px-4 border-b-2 border-[#636B2F]">Order #</th>
                <th class="py-4 px-4 border-b-2 border-[#636B2F]">Date</th>
                <th class="py-4 px-4 border-b-2 border-[#636B2F]">Total</th>
                <th class="py-4 px-4 border-b-2 border-[#636B2F]">Delivery Status</th>
                <th class="py-4 px-4 border-b-2 border-[#636B2F] text-center">Receipt</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr class="table-row-hover transition">
                <td class="py-4 px-4 font-semibold text-[#3D4127]">
                    {{ $order->order_number }}
                </td>
                <td class="py-4 px-4 text-[#636B2F]">
                    {{ $order->created_at->format('d M Y') }}
                </td>
                <td class="py-4 px-4 font-bold text-[#3D4127]">
                    RM {{ number_format($order->total, 2) }}
                </td>
                <td class="py-4 px-4">
                    <span class="px-3 py-1 rounded-full text-sm font-semibold
                        @if($order->delivery_status=='Completed') bg-green-100 text-green-700
                        @elseif($order->delivery_status=='Out for Delivery') bg-blue-100 text-blue-700
                        @elseif($order->delivery_status=='Pending Delivery') bg-yellow-100 text-yellow-700
                        @else bg-gray-100 text-gray-700 @endif">
                        {{ $order->delivery_status ?? 'Not Updated' }}
                    </span>
                </td>
                <td class="py-4 px-4 text-center">
                    <a href="{{ route('order.invoice', $order->id) }}"
                       class="inline-flex items-center gap-2 text-[#3D4127] hover:text-[#636B2F] font-medium">
                        <i class="fa-solid fa-file-invoice-dollar"></i>
                        View Receipt
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- 📱 MOBILE CARDS --}}
<div class="md:hidden space-y-4">
    @foreach($orders as $order)
    <div class="bg-white rounded-2xl shadow border border-gray-100 p-4">

        <div class="flex justify-between items-start">
            <div>
                <p class="text-xs text-gray-500">Order #</p>
                <p class="font-semibold text-[#3D4127]">
                    {{ $order->order_number }}
                </p>
            </div>

            <span class="px-3 py-1 rounded-full text-xs font-semibold
                @if($order->delivery_status=='Completed') bg-green-100 text-green-700
                @elseif($order->delivery_status=='Out for Delivery') bg-blue-100 text-blue-700
                @elseif($order->delivery_status=='Pending Delivery') bg-yellow-100 text-yellow-700
                @else bg-gray-100 text-gray-700 @endif">
                {{ $order->delivery_status ?? 'Not Updated' }}
            </span>
        </div>

        <div class="mt-3 text-sm text-gray-600 space-y-1">
            <p><span class="font-medium">Date:</span> {{ $order->created_at->format('d M Y') }}</p>
            <p><span class="font-medium">Total:</span> RM {{ number_format($order->total, 2) }}</p>
        </div>

        <a href="{{ route('order.invoice', $order->id) }}"
           class="mt-4 inline-flex items-center justify-center gap-2 w-full
                  px-4 py-2 rounded-xl bg-[#636B2F] text-white font-semibold">
            <i class="fa-solid fa-file-invoice-dollar"></i>
            View Receipt
        </a>

    </div>
    @endforeach
</div>


@if($orders->hasPages())
<div class="pagination-wrapper mt-4">
    <ul class="flex gap-2 justify-center items-center">

        {{-- Previous Arrow --}}
        @php $prevSetPage = max(1, $orders->currentPage() - 3); @endphp
        <li>
            @if($orders->currentPage() > 1)
                <a href="{{ $orders->url($prevSetPage) }}" 
                   class="px-3 py-1 rounded-full bg-[#636B2F] text-white hover:bg-[#636B2F] transition">
                    <i class="fa-solid fa-arrow-left"></i>
                </a>
            @else
                <span class="px-3 py-1 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fa-solid fa-arrow-left"></i>
                </span>
            @endif
        </li>

        {{-- Page Numbers (3 at a time) --}}
        @php
            $totalPages = $orders->lastPage();
            $currentPage = $orders->currentPage();
            $startPage = floor(($currentPage - 1) / 3) * 3 + 1;
            $endPage = min($startPage + 2, $totalPages);
        @endphp

        @for($page = $startPage; $page <= $endPage; $page++)
            @if($page == $currentPage)
                <li>
                    <span class="px-3 py-1 rounded-full !bg-[#636B2F] !text-white font-bold">
                        {{ $page }}
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $orders->url($page) }}" 
                       class="px-3 py-1 rounded-full bg-gray-200 text-gray-700 hover:bg-[#636B2F] hover:text-white transition">
                        {{ $page }}
                    </a>
                </li>
            @endif
        @endfor

        {{-- Next Arrow --}}
        @php $nextSetPage = min($totalPages, $startPage + 3); @endphp
        <li>
            @if($orders->hasMorePages())
                <a href="{{ $orders->url($nextSetPage) }}" 
                   class="px-3 py-1 rounded-full bg-[#636B2F] text-white hover:bg-[#636B2F] transition">
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
            @else
                <span class="px-3 py-1 rounded-full bg-gray-200 text-gray-400 cursor-not-allowed">
                    <i class="fa-solid fa-arrow-right"></i>
                </span>
            @endif
        </li>

    </ul>
</div>
@endif




@endif
</div>

<!-- 🔥 Auto Delivery Status Fetch -->
<script>
setInterval(() => {
    fetch('/orders/delivery-statuses')
    .then(res => res.json())
    .then(data => {
        data.forEach(order => {
            const badge = document.getElementById(`delivery-badge-${order.id}`);
            if (!badge) return;
            badge.textContent = order.delivery_status ?? "Not Updated";
            badge.className = "px-3 py-1 rounded-full text-sm font-semibold whitespace-nowrap";
            if (order.delivery_status === "Completed") badge.classList.add("bg-green-100","text-green-700");
            else if (order.delivery_status === "Out for Delivery") badge.classList.add("bg-blue-100","text-blue-700");
            else if (order.delivery_status === "Pending Delivery") badge.classList.add("bg-yellow-100","text-yellow-700");
            else badge.classList.add("bg-gray-100","text-gray-700");
        });
    });
}, 5000);
</script>

<!-- ⭐ Footer -->
<div class="full-width-bar bg-white mt-12 shadow-inner">
    <x-footer />
</div>
@include('components.chatbot')
</body>
</html>
