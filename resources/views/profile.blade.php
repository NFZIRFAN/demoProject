<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>My Profile</title>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background: #f4f6f9;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
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

    /* ======= HEADER + PROFILE SECTION ======= */
    .profile-header {
      position: relative;
      width: 100%;
      height: 340px;
      background: #000;
      overflow: hidden;
    }
    .profile-header img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .profile-pic {
      width: 180px;
      height: 180px;
      border-radius: 50%;
      border: 5px solid #fff;
      overflow: hidden;
      background: #fff;
      box-shadow: 0 8px 20px rgba(0,0,0,0.25);
      margin: -80px 0 0 40px;
      position: relative;
      z-index: 10;
    }
    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .profile-details {
      max-width: 1000px;
      margin: 15px auto 20px;
      padding: 0 20px;
      text-align: left;
    }
    .profile-details h2 {
      margin: 0;
      font-size: 28px;
      font-weight: 700;
      color: #222;
    }
    .profile-details p {
      margin: 5px 0 0;
      font-size: 15px;
      font-weight: 500;
      color: #666;
    }
    .social-icons {
      margin-top: 12px;
      display: flex;
      gap: 12px;
    }
    .social-icons a {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 32px;
      height: 32px;
      border-radius: 50%;
      background: #fff;
      box-shadow: 0 3px 8px rgba(0,0,0,0.15);
      transition: all 0.3s ease;
    }
    .social-icons a img {
      width: 70%;
      height: 70%;
      object-fit: contain;
    }
    .social-icons a:hover {
      transform: translateY(-3px) scale(1.1);
      box-shadow: 0 6px 14px rgba(0,0,0,0.25);
    }

    .separator {
      max-width: 1000px;
      margin: 25px auto;
      border-bottom: 2px solid #ddd;
    }

    /* ======= MODERN INFO SECTION ======= */
    .profile-info {
      max-width: 1000px;
      margin: 0 auto 40px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 20px;
      padding: 40px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
      backdrop-filter: blur(10px);
      transition: all 0.3s ease;
    }

    .profile-info:hover {
      transform: translateY(-3px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.12);
    }

    .info-title {
      font-size: 20px;
      font-weight: 700;
      color: #2e7d32;
      margin-bottom: 25px;
      border-left: 5px solid #2e7d32;
      padding-left: 12px;
      letter-spacing: 0.5px;
    }

    .info-list {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 20px 25px;
    }

    .info-item {
      background: linear-gradient(145deg, #ffffff, #f7f9fc);
      border-radius: 14px;
      padding: 16px 20px;
      display: flex;
      flex-direction: column;
      box-shadow: 0 4px 10px rgba(0,0,0,0.05);
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
    }
    .info-item:hover {
      transform: translateY(-4px);
      border-left: 4px solid #4caf50;
      box-shadow: 0 10px 20px rgba(76, 175, 80, 0.15);
    }
    .info-item strong {
      color: #1b5e20;
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 0.8px;
      margin-bottom: 6px;
    }
    .info-item span {
      color: #333;
      font-size: 15px;
      font-weight: 500;
      letter-spacing: 0.3px;
    }

    .btn-group {
      margin-top: 35px;
      display: flex;
      justify-content: flex-end;
    }
    .btn {
      padding: 10px 22px;
      border-radius: 25px;
      border: none;
      cursor: pointer;
      font-size: 14px;
      font-weight: 600;
      text-decoration: none;
      color: #fff;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      transition: all 0.3s ease;
    }
    .btn-back {
      background: linear-gradient(135deg, #43a047, #66bb6a);
    }
    .btn-back:hover {
      background: linear-gradient(135deg, #2e7d32, #388e3c);
      transform: translateY(-2px);
    }

    /* ======= FOOTER ======= */
    footer { 
      background: #fff; 
      color: #333; 
      margin-top: auto; 
      box-shadow: 0 -2px 6px rgba(0,0,0,0.05); 
    }
    footer .bottom-bar { 
      background: linear-gradient(90deg,rgb(67, 50, 42),rgb(37, 65, 38));
      color: white; 
      text-align: center; 
      padding: 8px; 
      font-size: 14px; 
      width: 100%; 
    }
  </style>
</head>
<body>

<x-navbar />


<!-- ===== Header ===== -->
<div class="profile-header">
  <img src="{{ $customer->header_photo ? asset('storage/'.$customer->header_photo) : 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1920&q=80' }}" alt="Header Photo">
</div>

<!-- ===== Profile Picture ===== -->
<div class="profile-pic">
  @if($customer->profile_picture)
    <img src="{{ asset('storage/' . $customer->profile_picture) }}" alt="Profile Picture">
  @else
    <img src="https://via.placeholder.com/300" alt="Default Profile">
  @endif
</div>

<!-- ===== Name + Email ===== -->
<div class="profile-details">
  <h2>{{ $customer->firstname }} {{ $customer->lastname }}</h2>
  <p>{{ $customer->email }}</p>
  <div class="social-icons">
    <a href="https://www.instagram.com/accounts/login/" target="_blank">
      <img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram">
    </a>
    <a href="https://twitter.com/login" target="_blank">
      <img src="https://cdn-icons-png.flaticon.com/512/733/733579.png" alt="Twitter">
    </a>
    <a href="https://www.facebook.com/login/" target="_blank">
      <img src="https://cdn-icons-png.flaticon.com/512/733/733547.png" alt="Facebook">
    </a>
  </div>
</div>

<!-- ===== Separator ===== -->
<div class="separator"></div>

<!-- ===== Profile Info ===== -->
<div class="profile-info">
  <h3 class="info-title">Personal Information</h3>
  <div class="info-list">
    <div class="info-item"><strong>Phone</strong> <span>{{ $customer->phonenumber ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>IC Number</strong> <span>{{ $customer->icnumber ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>Age</strong> <span>{{ $customer->age ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>Address</strong> <span>{{ $customer->address ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>Postcode</strong> <span>{{ $customer->postcode ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>Relationship</strong> <span>{{ $customer->relationship ?? 'Not provided' }}</span></div>
    <div class="info-item"><strong>Occupation</strong> <span>{{ $customer->occupation ?? 'Not provided' }}</span></div>
  </div>

  <div class="btn-group">
    <a href="{{ route('customer.dashboard') }}" class="btn btn-back">Back</a>
  </div>

  
</div>

<!-- ===== Footer ===== -->
<footer>
  <div class="bottom-bar">
    © 2025 Yah Nursery & Landscape. All Rights Reserved.
  </div>
</footer>

</body>
</html>
