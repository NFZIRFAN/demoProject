<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Cart</title>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<meta name="csrf-token" content="{{ csrf_token() }}">
<style>
body { background: #f4f6f9; font-family: 'Inter', sans-serif; }
.summary-box {
  height: fit-content;
  position: sticky;
  top: 120px; /* pushes it below the navbar dropdown */
  z-index: 10; /* lower than navbar so dropdown overlaps */
}
.cart-box { position: relative; }
.cart-icon { position: absolute; top:1.5rem; right:1.5rem; font-size:1.75rem; color:#10b981; transition: transform 0.3s ease, color 0.3s ease; z-index:10; }
.cart-icon:hover { transform:scale(1.1); color:#059669; }
.cart-badge { position:absolute; top:-0.5rem; right:-0.5rem; background:#ef4444; color:white; font-size:0.75rem; padding:0.125rem 0.5rem; border-radius:9999px; font-weight:bold; line-height:1; }
input[type="number"]::-webkit-inner-spin-button, input[type="number"]::-webkit-outer-spin-button {-webkit-appearance:none;margin:0;}
input[type="number"] { -moz-appearance:textfield; }
table td, table th { color:black; }
/* ======= NAVBAR ======= */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(90deg, rgb(67, 50, 42), rgb(37, 65, 38));
      padding: 12px 40px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.15);
      position: sticky;
      top: 0;
      width: 100%;
      box-sizing: border-box;
      z-index: 1000;
    }

    .nav-left {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .logo-text {
      font-size: 20px;
      font-weight: 700;
      color: #fff;
      text-decoration: none;
      letter-spacing: 0.5px;
      transition: color 0.3s ease;
    }

    .logo-text:hover {
      color: #c8e6c9;
    }

    .nav-links {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
      padding: 0;
    }

    .nav-links li a {
      color: #fff;
      text-decoration: none;
      font-weight: 500;
      font-size: 15px;
      position: relative;
      transition: all 0.3s ease;
      padding: 5px 0;
    }

    .nav-links li a:hover {
      color: #c8e6c9;
    }

    /* Highlight for active page */
    .nav-links li a.active {
      color: #c8e6c9;
      font-weight: 600;
    }
    .nav-links li a.active::after {
      content: "";
      position: absolute;
      bottom: -5px;
      left: 0;
      width: 100%;
      height: 2px;
      background: #c8e6c9;
      border-radius: 2px;
      animation: slideIn 0.4s ease;
    }

    @keyframes slideIn {
      from { width: 0; }
      to { width: 100%; }
    }

/* === FOOTER === */
footer { 
  background: #fff; 
  color: #333; 
  margin-top: auto; 
  box-shadow: 0 -2px 6px rgba(0,0,0,0.05); 
}
footer .bottom-bar { 
  background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); /* Green gradient */
  color: white; 
  text-align: center; 
  padding: 8px; 
  font-size: 14px; 
  width: 100%; 
}
</style>
</head>
<body class="min-h-screen flex flex-col">

<x-navbar />

<div class="container max-w-7xl mx-auto p-4 md:p-8 flex flex-col lg:flex-row gap-8 flex-grow">

   <!-- Cart Items -->
<div class="cart-box flex-2 w-full lg:w-2/3 bg-white p-6 md:p-8 rounded-xl shadow-2xl">
    <a href="{{ route('cart.view') }}" class="cart-icon">
        <i class="fa fa-shopping-cart"></i>
        <span id="cart-count" class="cart-badge">{{ session('cart_count',0) }}</span>
    </a>
    <h2 class="text-3xl font-bold mb-2 border-b pb-3 flex items-center gap-2">
        <i class="fa fa-shopping-bag text-green-600"></i> Your Shopping Bag
    </h2>

    <!-- ✅ Show total number of items -->
    <p class="text-gray-600 mb-6">
        You have <span class="font-semibold text-emerald-600">{{ $cart->count() }}</span> item(s) in your cart.
    </p>

    @if($cart->count()>0)
    <div class="overflow-x-auto">
        <table id="cart-table" class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray-700">
                    <th class="px-3 py-3 text-left">No</th> <!-- ✅ Item Number Column -->
                    <th class="px-3 py-3 text-left">Image</th>
                    <th class="px-3 py-3 text-left">Name</th>
                    <th class="px-3 py-3 text-center">Price</th>
                    <th class="px-3 py-3 text-center">Quantity</th>
                    <th class="px-3 py-3 text-right">Subtotal</th>
                    <th class="px-3 py-3 text-center">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                @foreach($cart as $index => $item) <!-- ✅ Fix: include $index -->
                <tr data-id="{{ $item->id }}" class="hover:bg-green-50 transition duration-150">
                  <!-- ✅ Serial Number -->
                    <td class="p-3 text-center font-semibold text-gray-700">
                        {{ $index + 1 }}
                    </td>
                    <td class="p-3 text-center">
                        <img src="{{ asset('storage/'.$item->plant->image) }}" class="w-14 h-14 rounded-lg mx-auto shadow-md">
                    </td>
                    <td class="p-3 text-left font-medium text-gray-800">{{ $item->plant->name }}</td>
                    <td class="price p-3 text-center text-gray-700" data-price="{{ $item->plant->price }}">
                        RM {{ number_format($item->plant->price,2) }}
                    </td>
                    <td class="p-3 text-center">
                        <div class="flex justify-center items-center gap-2">
                            <button class="btn-decrement bg-gray-200 hover:bg-gray-300 px-2 rounded">-</button>
                            <input type="number" class="quantity w-16 text-center border border-gray-300 rounded-lg" value="{{ $item->quantity }}" min="1">
                            <button class="btn-increment bg-gray-200 hover:bg-gray-300 px-2 rounded">+</button>
                        </div>
                    </td>
                    <td class="subtotal p-3 text-right font-bold text-emerald-600">
                        RM {{ number_format($item->plant->price * $item->quantity,2) }}
                    </td>
                    <td class="p-3 text-center">
                        <button class="btn-remove bg-red-500 hover:bg-red-600 text-white py-2 px-4 rounded-lg shadow-md">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <!-- ✅ Modern Empty Cart Layout -->
    <div class="flex flex-col items-center justify-center py-16 px-6 border-2 border-dashed border-gray-300 rounded-xl bg-gray-50 shadow-inner">
        <i class="fa fa-shopping-cart text-gray-400 text-6xl mb-4"></i>
        <p class="text-2xl font-semibold text-gray-600 mb-2">Your cart is empty</p>
        <p class="text-gray-500 mb-6">Looks like you haven’t added anything yet.</p>
        <a href="{{ route('customer.dashboard') }}" 
           class="bg-emerald-500 hover:bg-emerald-600 text-white py-2 px-6 rounded-lg shadow-md transition-transform transform hover:scale-105">
           ⬅ Continue Shopping
        </a>
    </div>
    @endif
</div>



   <!-- Summary -->
@if($cart->count()>0)
<div class="summary-box w-full lg:w-1/3 bg-white p-6 md:p-8 rounded-xl shadow-2xl border border-gray-200">
    <h3 class="text-2xl font-bold mb-6 border-b pb-3 flex items-center gap-2">
        <i class="fa fa-receipt text-indigo-500"></i> Order Summary
    </h3>

    <!-- Cart Items Summary -->
    <div id="cart-items-list" class="space-y-3">
        @foreach($cart as $item)
        <div class="flex justify-between text-gray-700">
            <span class="font-medium">{{ $item->plant->name }} <span class="text-gray-500">(x{{ $item->quantity }})</span></span>
            <span class="font-semibold">RM {{ number_format($item->plant->price * $item->quantity,2) }}</span>
        </div>
        @endforeach
    </div>

    <!-- Grand Total -->
    <div class="flex justify-between font-extrabold text-xl mt-6 border-t pt-4 text-gray-900">
        <span>Grand Total:</span>
        <span id="cart-total" class="text-emerald-600">RM {{ number_format($total,2) }}</span>
    </div>

    <!-- ✅ Checkout Button -->
<form action="{{ route('checkout.show') }}" method="POST" class="mt-6">
    @csrf
    <button type="submit"
        class="w-full bg-emerald-500 hover:bg-emerald-600 text-white text-sm font-semibold py-3 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
        <i class="fa fa-credit-card mr-2"></i> Pay & Checkout
    </button>
</form>



    <!-- ✅ Action Buttons -->
    <div class="flex flex-col sm:flex-row gap-3 mt-4">
        <!-- Update Cart -->
        <button id="btn-update-cart" 
            class="flex-1 bg-indigo-500 hover:bg-indigo-600 text-white text-sm font-medium py-3 px-4 rounded-lg shadow-md transition-transform transform hover:scale-105">
            <i class="fa fa-sync-alt mr-1"></i> Update Cart
        </button>

        <!-- Continue Shopping -->
        <a href="{{ route('customer.dashboard') }}" 
            class="flex-1 bg-slate-500 hover:bg-slate-600 text-white text-sm font-medium py-3 px-4 rounded-lg text-center shadow-md transition-transform transform hover:scale-105">
            ⬅ Continue Shopping
        </a>
    </div>
</div>
@endif

</div>

<!-- FOOTER -->
<footer>
  <div class="bottom-bar">
    © 2025 Yah Nursery & Landscape. All Rights Reserved.
  </div>
</footer>

<script>
const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
// === Sync cart count with localStorage before leaving page ===
  document.querySelectorAll('a[href="{{ route('customer.dashboard') }}"]').forEach(link => {
    link.addEventListener('click', (e) => {
      const count = document.getElementById('cart-count')?.innerText || '0';
      localStorage.setItem('cart_count', count);

      // Dispatch event so navbar updates instantly (before redirect)
      window.dispatchEvent(new CustomEvent('cartUpdated', { detail: { count: count } }));
    });
  });

  // === On page load, make sure navbar reflects the correct count ===
  window.addEventListener('DOMContentLoaded', () => {
    const navbarBadge = document.getElementById('navbar-cart-count');
    const savedCount = localStorage.getItem('cart_count');
    if (navbarBadge && savedCount) navbarBadge.innerText = savedCount;
  });
// Increment / Decrement Buttons
document.querySelectorAll(".btn-increment").forEach(btn=>{
    btn.addEventListener("click", e=>{
        let input = e.target.closest("td").querySelector(".quantity");
        input.value = parseInt(input.value)+1;
    });
});
document.querySelectorAll(".btn-decrement").forEach(btn=>{
    btn.addEventListener("click", e=>{
        let input = e.target.closest("td").querySelector(".quantity");
        input.value = Math.max(1, parseInt(input.value)-1);
    });
});

// Remove Item
document.querySelectorAll(".btn-remove").forEach(btn=>{
    btn.addEventListener("click", e=>{
        let row = e.target.closest("tr");
        let id = row.dataset.id;
        Swal.fire({
            title:"Remove item?", text:"This plant will be removed from your cart.", icon:"warning",
            showCancelButton:true, confirmButtonColor:"#d33", cancelButtonText:"Cancel", confirmButtonText:"Yes, remove it!"
        }).then(result=>{
            if(result.isConfirmed){
                fetch(`/cart/remove/${id}`,{
                    method:"POST",
                    headers:{"Content-Type":"application/json","X-CSRF-TOKEN":csrfToken}
                }).then(res=>res.json()).then(data=>{
                    if (data.success) {
    row.remove();

    // ✅ Update both the cart view count & navbar cart count
    const cartBadge = document.getElementById("cart-count");
    const navbarBadge = document.getElementById("navbar-cart-count");

    if (cartBadge) cartBadge.innerText = data.cartCount;
    if (navbarBadge) navbarBadge.innerText = data.cartCount;

    // ✅ Update total dynamically
    const totalEl = document.getElementById("cart-total");
    if (totalEl) totalEl.innerText = "RM " + data.total.toFixed(2);

    Swal.fire("Removed!", "Item has been removed.", "success");

    // ✅ If no more items, reload to show empty cart state
    if (document.querySelectorAll("#cart-table tbody tr").length === 0) {
        location.reload();
    }
}

                });
            }
        });
    });
});

// Update Cart
document.getElementById("btn-update-cart")?.addEventListener("click",()=>{
    const quantities = {};
    document.querySelectorAll("#cart-table tbody tr").forEach(row=>{
        const id = row.dataset.id;
        const qty = parseInt(row.querySelector(".quantity").value);
        quantities[id]=qty;
    });
    fetch("{{ route('cart.updateAll') }}",{
        method:"POST",
        headers:{"Content-Type":"application/json","X-CSRF-TOKEN":csrfToken},
        body:JSON.stringify({quantities})
    }).then(res=>res.json()).then(data=>{
        if(data.success){
            document.querySelectorAll("#cart-table tbody tr").forEach(row=>{
                const price = parseFloat(row.querySelector("td[data-price]").dataset.price);
                const qty = parseInt(row.querySelector(".quantity").value);
                row.querySelector(".subtotal").innerText = "RM "+(price*qty).toFixed(2);
            });
            let list = document.getElementById("cart-items-list");
            list.innerHTML="";
            document.querySelectorAll("#cart-table tbody tr").forEach(row=>{
                const name = row.querySelector("td:nth-child(2)").innerText;
                const qty = row.querySelector(".quantity").value;
                const subtotal = row.querySelector(".subtotal").innerText;
                list.innerHTML+=`<div class="flex justify-between"><span>${name} (x${qty})</span><span>${subtotal}</span></div>`;
            });
            document.getElementById("cart-total").innerText="RM "+data.total.toFixed(2);
document.getElementById("cart-count").innerText = data.cartCount;
const navbarCount = document.getElementById("navbar-cart-count");
if (navbarCount) navbarCount.innerText = data.cartCount;
            Swal.fire("Updated!","Cart updated successfully.","success");
        }
    });
});
</script>
</body>
</html>
