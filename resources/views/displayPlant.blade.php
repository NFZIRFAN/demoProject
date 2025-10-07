<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>{{ $plant->name }}</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    :root{
      --green: #27ae60;
      --green-dark: #219150;
      --muted: #777;
      --card-bg: #ffffff;
      --surface: rgba(0,0,0,0.06);
    }
    *{ box-sizing: border-box; }
    
    /* --- CORE LAYOUT CHANGES FOR FIXED HEADER/FOOTER --- */
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #f0f4f8, #e8f5e9);
      margin: 0;
      padding: 0; /* Removed body padding */
      color: #243130;
      
      /* Flexbox setup for true sticky layout */
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    /* Fixed Header/Navbar */
    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); /* Green gradient */
      padding: 12px 40px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.2);
      position: fixed; /* STICKY HEADER */
      top: 0;
      left: 0;
      width: 100%;
      max-width: none;
      box-sizing: border-box;
      z-index: 1000;
    }

    /* Fixed Footer */
    footer { 
      background: #fff; 
      color: #333; 
      box-shadow: 0 -2px 8px rgba(0,0,0,0.2); 
      position: fixed; /* STICKY FOOTER */
      bottom: 0;
      left: 0;
      width: 100%;
      z-index: 999;
    }
    
    /* Wrapper to contain all content and provide clearance for fixed elements */
    .content-main-wrapper {
      flex-grow: 1; /* Allows content to take up vertical space between header/footer */
      /* Clearance for fixed Navbar (approx 54px high) */
      padding-top: 64px; 
      /* Clearance for fixed Footer (approx 40px high) */
      padding-bottom: 52px; 
      /* Re-applying the original body's horizontal padding */
      padding-left: 40px; 
      padding-right: 40px;
      width: 100%;
      box-sizing: border-box;
    }
    
    /* Adjusting top-right cart position for fixed nav */
    #pageCartTop {
        top: 70px !important; /* Move down past the fixed navbar */
        right: 40px !important; /* Align with new content padding */
    }

    /* --- END CORE LAYOUT CHANGES --- */

    /* Card */
    .container {
      display:flex;
      gap:40px;
      background: var(--card-bg);
      padding:30px;
      border-radius:15px;
      box-shadow:0 10px 30px rgba(5,30,15,0.08);
      max-width:1100px;
      margin:30px auto; /* Added vertical margin for spacing */
      align-items:center;
      position: relative;
    }

    /* Image area */
    .image { flex:1; overflow:hidden; border-radius:12px; box-shadow:0 6px 20px rgba(0,0,0,0.12); cursor:zoom-in; }
    .image img { width:100%; border-radius:12px; display:block; transition: transform .5s ease, box-shadow .5s ease; }
    .image img:hover { transform: scale(1.03); box-shadow:0 18px 40px rgba(10,40,20,0.14); }

    /* Details */
    .details { flex:1.2; display:flex; flex-direction:column; justify-content:center; position:relative; padding:8px 20px; }
    .details h2 { margin-bottom:10px; font-size:30px; color:#223134; }
    .price { font-size:24px; font-weight:700; color:var(--green); margin-bottom:8px; }
    .old-price { text-decoration:line-through; color: gray; font-size:14px; margin-left:8px; font-weight:500; }
    .description { margin:14px 0; color:#4b5563; line-height:1.6; font-size:15px; }
    .category { margin-bottom:14px; color:var(--muted); font-size:14px; }

    /* Form + buttons */
    .qty-box { display:flex; align-items:center; gap:12px; margin-top:6px; }
    input[type="number"] { width:86px; padding:10px; border-radius:8px; border:1px solid #ddd; font-size:15px; text-align:center; }
    .btn { display:inline-flex; align-items:center; gap:8px; padding:12px 18px; background:var(--green); color:#fff; border:none; border-radius:10px; cursor:pointer; font-size:15px; box-shadow: 0 10px 18px rgba(39,174,96,0.12); transition: transform .15s ease, box-shadow .15s ease; text-decoration:none; }
    .btn:active{ transform: translateY(1px); }
    .btn:disabled{ opacity:.6; cursor:not-allowed; transform:none; box-shadow:none; }
    .btn:hover{ background:var(--green-dark); transform:translateY(-3px); box-shadow: 0 18px 30px rgba(34,139,77,0.12); }

    hr { border:none; border-top:1px solid #eee; margin:22px 0; }

    /* Cart floating FAB in top-right of details */
    .cart-fab {
      position: absolute;
      top: -20px;
      right: 8px;
      display:inline-flex;
      align-items:center;
      gap:10px;
      background: linear-gradient(180deg, rgba(255,255,255,0.9), rgba(255,255,255,0.8));
      padding:8px 12px;
      border-radius:999px;
      box-shadow: 0 8px 22px rgba(10,30,20,0.12);
      border: 1px solid rgba(34,139,77,0.06);
      backdrop-filter: blur(6px);
      transition: transform .18s ease, box-shadow .18s ease;
      cursor: pointer;
      z-index: 30;
    }
    .cart-fab:hover{ transform: translateY(-4px) scale(1.02); box-shadow: 0 22px 40px rgba(10,30,20,0.14); }

    .cart-icon {
      width:30px;
      height:30px;
      display:inline-grid;
      place-items:center;
      background: linear-gradient(180deg, var(--green), var(--green-dark));
      color:white;
      border-radius:50%;
      box-shadow: 0 8px 18px rgba(39,174,96,0.18);
      font-size:18px;
      transition: transform .16s ease;
    }
    .cart-fab:hover .cart-icon { transform: rotate(-6deg) scale(1.04); }

    /* badge */
    .cart-badge {
      display:inline-block;
      background: #ff3b30;
      color:white;
      padding:4px 8px;
      border-radius:999px;
      font-size:13px;
      font-weight:700;
      line-height:1;
      min-width:34px;
      text-align:center;
      box-shadow: 0 6px 14px rgba(0,0,0,0.12);
      transition: transform .28s ease, box-shadow .28s ease;
    }

    /* small ring pulse on update */
    .ring {
      position: relative;
    }
    .ring::after {
      content: "";
      position: absolute;
      inset: -6px;
      border-radius: 999px;
      background: radial-gradient(circle at center, rgba(34,139,77,0.08), transparent 40%);
      animation: ring 600ms ease;
      pointer-events: none;
    }
    @keyframes ring {
      0% { transform: scale(.7); opacity: 0.9; }
      60% { transform: scale(1.12); opacity: 0.45; }
      100% { transform: scale(1.4); opacity: 0; }
    }

    /* responsive tweaks */
    @media (max-width:900px){
      .container { flex-direction: column; padding:18px; margin: 20px auto; }
      .cart-fab { position: fixed; top: 12px; right: 12px; }
      .details{ padding: 12px 8px; }
      .content-main-wrapper {
        padding-left: 12px; 
        padding-right: 12px;
      }
      #pageCartTop {
          right: 12px !important; 
      }
    }

    /* ===========================
        MODAL IMAGE FULLSCREEN
        =========================== */
    .modal {
      display:none;
      position: fixed;
      z-index: 9999;
      top:0;
      left:0;
      width:100%;
      height:100%;
      background: rgba(0,0,0,0.85);
      align-items: center;
      justify-content: center;
      cursor: zoom-out;
    }
    .modal img {
      max-width: 90%;
      max-height: 90%;
      border-radius:12px;
      transition: transform 0.3s ease;
      cursor: grab;
    }
    .modal .close {
      position:absolute;
      top:20px;
      right:20px;
      color:white;
      font-size:36px;
      font-weight:bold;
      cursor:pointer;
    }
    .hero-header {
      width: 100%;
      height: 260px;
      background: url("https://images.unsplash.com/photo-1501004318641-b39e6451bec6?auto=format&fit=crop&w=1200&q=80") no-repeat center center/cover;
      position: relative;
      border-radius: 0 0 18px 18px;
      box-shadow: 0 4px 16px rgba(0,0,0,0.15);
      margin-bottom: 28px;
    }
    .hero-overlay {
      width: 100%;
      height: 100%;
      background: rgba(0,0,0,0.45);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: #fff;
      text-align: center;
      border-radius: 0 0 18px 18px;
    }
    .hero-overlay h1 {
      font-size: 34px;
      margin: 0;
      font-weight: 700;
      letter-spacing: 1px;
    }
    .hero-overlay p {
      font-size: 16px;
      margin-top: 10px;
      font-weight: 400;
    }
    
    footer .bottom-bar { 
      background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38)); /* Green gradient */
      color: white; 
      text-align: center; 
      padding: 8px; 
      font-size: 14px; 
      width: 100%; 
    }
    
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
  </style>
</head>
<body>
  <!-- ===== Navbar ===== -->
<x-navbar />
  <!-- CONTENT WRAPPER -->
  <div class="content-main-wrapper">
    <!-- top-right cart badge (Adjusted position to clear fixed navbar) -->
    <div id="pageCartTop" style="position:fixed; top:70px; right:40px; z-index:1000; display:none;">
      <a href="{{ route('cart.view') }}" aria-label="View cart" title="View cart" style="text-decoration:none; display:inline-flex; align-items:center; gap:8px;">
        <div class="cart-icon" style="width:40px;height:40px;font-size:16px;"><i class="fa fa-shopping-cart"></i></div>
        <div id="page-cart-count" class="cart-badge">{{ session('cart_count', 0) }}</div>
      </a>
    </div>

    <div class="container" role="region" aria-label="Product details">
      <div class="image">
        <img id="plantImage" src="{{ asset('storage/'.$plant->image) }}" alt="{{ $plant->name }}">
      </div>

      <div class="details">
        <a href="{{ route('cart.view') }}" class="cart-fab" id="localCartFab" title="View cart" role="button" aria-label="View cart">
          <div class="cart-icon" aria-hidden="true"><i class="fa fa-shopping-cart"></i></div>
          <div id="cart-count" class="cart-badge" aria-live="polite">{{ session('cart_count', 0) }}</div>
        </a>

        <h2>{{ $plant->name }}</h2>
        <p class="price">
          RM{{ number_format($plant->price, 2) }}
          @if($plant->old_price)
            <span class="old-price">RM{{ number_format($plant->old_price, 2) }}</span>
          @endif
        </p>

        
        <p class="description"><strong>Description:</strong> {{ $plant->description ?? 'No description available.' }}</p>
        <!-- ✅ Stock Quantity Display -->
        <div style="margin-top:15px; font-size:15px; font-weight:500; color:#2c3e50;">
        <span style="margin-right:8px;">Quantity Left:</span>
        <span 
        style="
          display:inline-block;
          min-width:60px;
          text-align:center;
          padding:6px 14px;
          border-radius:999px;
          font-size:14px;
          font-weight:600;
          background: linear-gradient(135deg, 
          {{ $plant->stock_quantity <= $plant->reorder_level ? '#e74c3c' : '#3498db' }}, 
          {{ $plant->stock_quantity <= $plant->reorder_level ? '#c0392b' : '#2980b9' }}
          );
          color:#fff;
          box-shadow:0 3px 8px rgba(0,0,0,0.2);
        ">
      {{ $plant->stock_quantity }}
    </span>
  </div>

        <p class="category"><strong>Category:</strong> {{ $plant->category }}</p>

        <form id="add-to-cart-form" aria-label="Add to cart form">
          @csrf
          <div class="qty-box">
            <input type="number" name="quantity" id="quantity" value="1" min="1" aria-label="Quantity">
            <button id="addBtn" type="submit" class="btn" aria-live="polite">
              <i class="fa fa-cart-plus" style="font-size:14px;"></i> Add to cart
            </button>
          </div>
        </form>

        <hr>

        <div class="payment">
          <p>Guaranteed Safe Checkout</p>
          <img src="https://upload.wikimedia.org/wikipedia/commons/0/04/Visa.svg" alt="Visa" style="height:28px; margin-right:8px;">
          <img src="https://upload.wikimedia.org/wikipedia/commons/3/30/American_Express_logo.svg" alt="AmEx" style="height:28px;">
        </div>

        <div style="margin-top:20px;">
          <a href="{{ route('customer.dashboard') }}" class="btn" style="background:#7b8a7b;">
            <i class="fa fa-arrow-left"></i> Back to Dashboard
          </a>
        </div>
      </div>
    </div>

    <!-- FULLSCREEN MODAL -->
    <div id="imageModal" class="modal">
      <span class="close">&times;</span>
      <img id="modalImage" alt="zoomed image">
    </div>

  </div> <!-- END .content-main-wrapper -->

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  // ========== IMAGE ZOOM MODAL ==========
  const plantImage = document.getElementById("plantImage");
  const modal = document.getElementById("imageModal");
  const modalImg = document.getElementById("modalImage");
  const closeBtn = modal.querySelector('.close');

  plantImage.onclick = () => { modal.style.display = "flex"; modalImg.src = plantImage.src; resetView(); }
  closeBtn.onclick = () => { modal.style.display = "none"; }
  modal.onclick = (e) => { if(e.target === modal) modal.style.display = "none"; }

  let scale = 1, posX = 0, posY = 0, isDragging=false, startX, startY;
  modalImg.addEventListener("wheel", (e) => { e.preventDefault(); scale += e.deltaY < 0 ? 0.2 : -0.2; if(scale < 0.4) scale = 0.4; applyTransform(); });
  modalImg.addEventListener("mousedown", (e) => { isDragging = true; startX = e.clientX - posX; startY = e.clientY - posY; modalImg.style.cursor = "grabbing"; });
  window.addEventListener("mouseup", () => { isDragging = false; modalImg.style.cursor = "grab"; });
  window.addEventListener("mousemove", (e) => { if(!isDragging) return; posX = e.clientX - startX; posY = e.clientY - startY; applyTransform(); });
  modalImg.addEventListener("dblclick", resetView);
  function applyTransform(){ modalImg.style.transform = `translate(${posX}px, ${posY}px) scale(${scale})`; }
  function resetView(){ scale=1; posX=0; posY=0; applyTransform(); }

  // ========= CART BADGE PERSISTENCE ==========
  const badge = document.getElementById("cart-count");
  const pageBadge = document.getElementById("page-cart-count");

  // Load saved cart count from localStorage
  function loadCartCount() {
    const saved = localStorage.getItem("cart_count");
    if (saved) {
      badge.innerText = saved;
      pageBadge.innerText = saved;
    }
  }

  // Save cart count to localStorage
  function saveCartCount(count) {
    localStorage.setItem("cart_count", count);
    badge.innerText = count;
    pageBadge.innerText = count;
  }

  // ========= Add to Cart AJAX ==========
  document.getElementById("add-to-cart-form").addEventListener("submit", function(e){
    e.preventDefault();
    const qtyInput = document.getElementById("quantity");
    let qty = parseInt(qtyInput.value) || 1;
    if(qty < 1) qty = 1;
    qtyInput.value = qty;
    const addBtn = document.getElementById("addBtn");
    addBtn.disabled = true;
    addBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Adding...';

    fetch("{{ route('cart.add', $plant->id) }}", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
        "X-Requested-With": "XMLHttpRequest"
      },
      body: JSON.stringify({ quantity: qty })
    })
    .then(res => res.json())
    .then(data => {
      addBtn.disabled = false;
      addBtn.innerHTML = '<i class="fa fa-cart-plus"></i> Add to cart';

      if(data.success){
        const newCount = data.cartCount ?? parseInt(localStorage.getItem("cart_count") || 0) + qty;
        saveCartCount(newCount);
        Swal.fire({ toast:true, position:'top-end', icon:'success', title: data.message || 'Added to cart!', showConfirmButton:false, timer:1600 });
      } else {
        Swal.fire({ icon:'error', title:'Oops', text:data.message || 'Failed to add item.' });
      }
    })
    .catch(() => {
      addBtn.disabled=false;
      addBtn.innerHTML='<i class="fa fa-cart-plus"></i> Add to cart';
      Swal.fire('Error','Unable to add item right now.','error');
    });
  });

  // ========= Keep badge synced ==========
  function syncTopCart(){
    const pageTop=document.getElementById('pageCartTop');
    if(window.innerWidth <= 900){ 
      pageTop.style.display='block'; 
      pageBadge.innerText = badge.innerText; 
    }
    else pageTop.style.display='none';
  }

  window.addEventListener('resize', syncTopCart);
  window.addEventListener('load', () => {
    loadCartCount();
    syncTopCart();
  });
</script>

  <!-- Fixed Footer -->
  <footer>
    <div class="bottom-bar">
      © 2025 Yah Nursery & Landscape. All Rights Reserved.
    </div>
  </footer>
</body>
</html>
