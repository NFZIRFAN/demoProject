<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Yah Nursery & Landscape</title>
  @vite(entrypoints: ['resources/css/app.css', 'resources/js/app.js'])
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,400;1,700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    html { 
      scroll-behavior: smooth; }
    body { 
      color: white; min-height: 100vh; display: flex; flex-direction: column; margin: 0;  padding-top: 80px; /* match your header's height */
 }
   
      html, body {
  overflow-y: scroll; /* allow scrolling */
  scrollbar-width: none; /* hide scrollbar for Firefox */
}

html::-webkit-scrollbar,
body::-webkit-scrollbar {
  display: none; /* hide scrollbar for Chrome, Safari, Edge */
}

/* Header */
header.header {
  position: fixed;
  top: 20px;
  left: 0;
  right: 0;
  width: calc(100% - 40px);
  height: 70px;
  margin: 0 auto;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 40px;

  background: rgba(255, 255, 255, 0.1); /* default transparent */
  backdrop-filter: blur(12px);
  box-shadow: 0 6px 20px rgba(0,0,0,0.15);
  border-radius: 20px;
  overflow: visible; /* ✅ allow dropdown to show */
  transition: all 0.3s ease; /* smooth transition */
  z-index: 1000;
}

/* Shrinks and turns black when scrolling */
header.scrolled {
  top: 10px;
  height: 60px;
  padding: 0 30px;
  background: rgba(0, 0, 0, 0.9); /* turns black on scroll */
  box-shadow: 0 6px 20px rgba(0,0,0,0.3);
}


header.scrolled .logo-img {
  height: 50px;
}


/* ===================== */
/*   LEFT: Logo          */
/* ===================== */
.header-left {
  flex: 1; /* keeps it aligned left */
}

/* Adjust logo size */
.logo-img {
  height: 160px;
  object-fit: contain;
  transition: height 0.3s ease;
}

header.scrolled .logo-img {
  height: 80px; /* slightly smaller on scroll but still visible */
}

/* ===================== */
/*  CENTER: Navigation   */
/* ===================== */
.header-nav {
  flex: 2;
  display: flex;
  justify-content: center;
}

.header-nav ul {
  list-style: none;
  display: flex;
  gap: 40px;
  align-items: center;
}

.header-nav ul li a.nav-link {
  text-decoration: none;
  color: #ffffffcc;
  font-size: 18px;
  font-weight: 500;
  position: relative;
  transition: 0.3s;
}

.header-nav ul li a.nav-link:hover,
.header-nav ul li a.nav-link.active {
  color: #fff;
}

.header-nav ul li a.nav-link::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -3px;
  height: 2px;
  width: 0%;
  background: #fff;
  border-radius: 2px;
  transition: width 0.3s ease;
}

.header-nav ul li a.nav-link:hover::after,
.header-nav ul li a.nav-link.active::after {
  width: 100%;
}

/*   RIGHT: Login Text + Icon   */
.contact {
  flex: 1;
  display: flex;
  justify-content: flex-end;
  position: relative; /* ✅ anchor dropdown */
}
.dropdown-menu.show {
  display: flex;
}

.contact a {
  text-decoration: none;
  color: #ffffffcc; /* semi-transparent white */
  font-weight: 600;
  font-size: 17px;

  display: flex;
  align-items: center;
  gap: 8px; /* space between icon and text */
  
  padding: 0;
  background: none;
  border: none;
  border-radius: 0;

  transition: color 0.3s ease;
}

/* Icon animation: subtle lift on hover */
.contact a i {
  display: inline-block;
  transition: transform 0.3s ease;
}

.contact a:hover i {
  transform: translateY(-3px) rotate(-10deg);
}

/* Optional: gentle floating animation even without hover */
.contact a i {
  animation: floatIcon 2s ease-in-out infinite;
}

@keyframes floatIcon {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-2px); }
}

.contact a:hover {
  color: #fff; /* highlight text on hover */
}

header.scrolled .contact a {
  color: #ffffff; /* visible on black scroll header */
}

 /* Hero Section 1*/
.hero {
  position: relative;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
  padding-top: 70px;
  overflow: hidden;
}

.hero-video {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; /* ensures video fills the hero area */
  z-index: 0;
}

.hero-overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.5); /* overlay for readability */
  z-index: 1;
}

.hero-content {
  position: relative;
  z-index: 2;
  padding: 0 20px;
  color: white;
}

.hero h1 { font-size:34px; margin-bottom:10px; }
.hero p { font-size:16px; margin-bottom:18px; }
.hero .btn {
padding:10px 22px; background:rgba(163, 171, 46, 1); color:white; text-decoration:none; font-size:14px;
border-radius:30px; transition: background .3s, transform .2s; cursor:pointer;
}
.hero .btn:hover { background:rgba(69, 93, 24, 1); transform: scale(1.05); }


    /* Sections 2*/
    section { padding: 60px 40px; scroll-margin-top: 70px; }
    #about { color: #333; background: #f5f6fa; }
    section h2 { margin-bottom: 15px; font-size: 26px; }
    section p { font-size: 15px; line-height:1.6; color: #333; }

    /* Shared Layout for About */
    .section-flex { display:flex; flex-wrap:wrap; align-items:center; justify-content:center; gap:40px; max-width:1100px; margin:auto; }
    .section-flex .image img { width:320px; height:320px; border-radius:15px; object-fit:cover; box-shadow: 0 6px 18px rgba(0,0,0,0.15); }
    .section-flex .divider { width:2px; background:#ccc; height:280px; }
    .section-flex .text {
      flex:1; min-width:280px; padding:25px; background:white; border-radius:15px; box-shadow:0 6px 18px rgba(0,0,0,0.1);
    }
    .section-flex .text h2 { color:#2f8f2f; font-size:28px; margin-bottom:15px; }

    /* SECTION 3 */
  .hero-background {
    background-image: url('https://i.pinimg.com/1200x/51/50/04/515004dfc56fe9bf0a7c2201744bdda0.jpg');
    background-size: cover;
    background-position: center center;
    height: 70vh; /* smaller height */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    margin-bottom: 3rem; /* slightly reduced spacing below hero */
}

/* Transparent content box */
.content-box {
    position: relative;
    z-index: 10;
    background-color: rgba(255, 255, 255, 0.8); /* slightly more opaque for clarity */
    border-radius: 10px;
    max-width: 600px;
    width: 90%;
    padding: 2rem 1.5rem; /* smaller padding */
    text-align: center;
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(8px);
}

/* Headline */
.hero-title {
    font-family: 'Playfair Display', serif;
    font-size: 2.5rem; /* reduced from 3rem */
    color: #3D4127;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 0.8rem;
}

/* Subtitle */
.hero-subtitle {
    font-size: 1rem; /* reduced from 1.2rem */
    color: #4b4b4b;
    margin-bottom: 1.5rem;
}

/* CTA Button */
.hero-btn {
    padding: 0.8rem 2rem;
    background-color: #3D4127;
    color: #ffffff;
    font-size: 0.85rem;
    font-weight: 800;
    text-transform: uppercase;
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    border: none;
    cursor: pointer;
}

.hero-btn:hover {
    background-color: #636B2F;
    box-shadow: 0 8px 18px rgba(0,0,0,0.25);
}

/* Responsive adjustments */
@media (min-width: 640px) {
    .hero-title { font-size: 3rem; }
    .hero-subtitle { font-size: 1.1rem; }
}

@media (min-width: 1024px) {
    .hero-title { font-size: 3.5rem; }
    .hero-subtitle { font-size: 1.2rem; }
}
 .title-font {
    font-family: 'Playfair Display', serif;
  }

  .content-bg {
    background-color: #F7F6F4;
  }

  .h-section {
    min-height: 80vh;
  }

  /* Add slight motion on hover */
  img {
    transition: transform 0.4s ease, box-shadow 0.4s ease;
  }

  img:hover {
    transform: scale(1.03);
  }

    /* Blog Slider section 3 */
    #blog { background: linear-gradient(135deg,#ffffff); color:#333; text-align:center; }
    #blog h2 { font-size:28px; margin-bottom:25px; color:#2f8f2f; }
    .blog-slider { position:relative; max-width:1000px; margin:auto; overflow:hidden; border-radius:15px; }
    .blog-slides { display:flex; transition: transform .5s ease-in-out; }
    .blog-slides img { width:100%; flex-shrink:0; height:450px; object-fit:cover; border-radius:15px; }
    .blog-controls { position:absolute; top:10px; right:15px; display:flex; gap:8px; z-index:2; }
    .blog-btn { background: rgba(0,0,0,0.5); color:white; border:none; padding:8px 12px; border-radius:50%; cursor:pointer; font-size:14px; }
    .blog-btn:hover { background: rgba(0,0,0,0.7); }
    .blog-scrollbar { height:6px; background:#ccc; margin-top:10px; border-radius:3px; position:relative; overflow:hidden; }
    .blog-scrollbar-thumb { height:100%; width:33.33%; background:#2f8f2f; border-radius:3px; transition: transform .5s ease; }

    /* Team Section - make it look like the sample image */
    #team { background: #ffffffff; color: #333; text-align:center; padding: 60px 40px; }
    #team h2 { font-size: 34px; color: #636B2F; margin-bottom: 10px; }
    #team .heading-dots { display:flex; gap:10px; justify-content:center; margin-bottom:18px; }
    #team .heading-dots span {
      width:10px; height:10px; border-radius:50%; background:#2f8f2f; opacity:0.9;
      display:inline-block;
    }
    #team p.lead { max-width:900px; margin: 0 auto 36px; color:#6f7b71; font-size:15px; }

    /* Team slider wrapper */
    .team-wrap { position:relative; max-width:1100px; margin: auto; }

    /* team slider visible area (hide overflow) */
    .team-slider {
      overflow: hidden;
    }
    /* track for cards */
    .team-track {
      display:flex; gap: 30px; padding: 20px 0; transition: transform .5s cubic-bezier(.22,.9,.35,1);
      will-change: transform;
    }

    .team-member {
      position: relative;
      min-width: 300px; /* ensures 3 cards fit nicely on wide screen */
      width: 300px;
      border-radius: 12px;
      overflow: hidden;
      box-shadow: 0 8px 30px rgba(0,0,0,0.12);
      background:#f2f2f2;
    }
    .team-member img { display:block; width:100%; height: 360px; object-fit:cover; }

    /* bottom overlay with name & role */
    .team-info {
      position: absolute; bottom: 0; left: 0; right: 0;
      background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.55) 40%, rgba(0,0,0,0.75) 100%);
      color: #fff; padding: 22px 16px;
    }
.team-info h3 {
    font-family: 'Playfair Display', serif;
    font-size: 22px;
    font-weight: 700;
    margin-bottom: 6px;
    letter-spacing: 0.5px;
    color: #ffffffff; /* Elegant garden green */
    text-transform: uppercase;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
}
    .team-info p { font-size:14px; margin:0; opacity:0.95; }

    /* nav arrows outside (left/right) */
    .team-nav {
      position:absolute; top:50%; transform:translateY(-50%);
      background: #f6f9f6; color:#0b4a2f; border: none; width:48px; height:48px; border-radius:50%;
      box-shadow: 0 4px 14px rgba(0,0,0,0.08); cursor:pointer; display:flex; align-items:center; justify-content:center;
      font-size:20px;
    }
    .team-nav:hover { background:#eaf7ea; }
    .team-nav.prev { left: -70px; } /* placed outside to left */
    .team-nav.next { right: -70px; } /* placed outside to right */

    /* responsiveness */
    @media (max-width: 1100px) {
      .team-nav.prev { left: 6px; }
      .team-nav.next { right: 6px; }
      .team-member { min-width: 280px; width: 280px; }
    }
    @media (max-width: 900px) {
      header { padding: 10px 20px; }
      .hero { padding-top: 80px; }
      .team-member { min-width: 250px; width: 250px; }
      .team-nav.prev { left: 8px; } .team-nav.next { right: 8px; }
    }
    @media (max-width: 640px) {
      .section-flex { padding: 0 12px; gap:18px; }
      .team-track { gap: 18px; }
      .team-member { width: 230px; min-width:230px; }
      .team-nav.prev, .team-nav.next { display: none; } /* small screens will swipe */
    }
#customer-says {
  background: linear-gradient(135deg, #ffffffff, #ffffff);
  padding: 100px 20px;
  font-family: 'Poppins', sans-serif;
  text-align: center;
}

.section-title {
  font-family: 'Playfair Display', serif;
  font-size: 42px;
  font-weight: 800;
  color: #3D4127;
  margin-bottom: 10px;
  letter-spacing: 1px;
}

.divider {
  width: 100px;
  height: 4px;
  background: linear-gradient(to right, #3D4127, #7B9E46);
  margin: 0 auto 30px;
  border-radius: 2px;
}

.section-subtitle {
  font-size: 18px;
  color: #555;
  margin-bottom: 60px;
  max-width: 650px;
  margin-left: auto;
  margin-right: auto;
}

.reviews-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 35px;
  justify-items: center;
  max-width: 1200px;
  margin: 0 auto;
}

/* Review Card */
.review-card {
  background: #fff;
  border-radius: 20px;
  padding: 30px 25px;
  box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
  transition: all 0.3s ease;
  text-align: left;
  position: relative;
}

.review-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
}

.review-header {
  display: flex;
  align-items: center;
  gap: 15px;
  margin-bottom: 15px;
}

.review-avatar {
  width: 60px;
  height: 60px;
  border-radius: 50%;
  object-fit: cover;
  border: 3px solid #BAC095;
}

.review-name {
  font-size: 17px;
  font-weight: 700;
  color: #3D4127;
  margin: 0;
}

.review-stars {
  color: #FACC15; /* golden star color */
  font-size: 16px;
  letter-spacing: 1px;
}

.review-text {
  font-size: 15px;
  color: #555;
  line-height: 1.7;
  margin-bottom: 20px;
  font-style: italic;
  position: relative;
}

.review-text::before {
  content: "“";
  font-size: 45px;
  color: #BAC095;
  position: absolute;
  left: -10px;
  top: -15px;
  opacity: 0.3;
}

.review-date {
  font-size: 13px;
  color: #888;
  display: block;
  text-align: right;
}

        /* SECTION 4 */
    .team-slider::-webkit-scrollbar, .blog-slider::-webkit-scrollbar { display: none; }

     /* SECTION 4 */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffffff;
            line-height: 1.6;
        }

      
/* Flash Sale Background SECTION 5*/
#flash-sale {
  height: 70vh;
  display: flex;
  align-items: center;
  justify-content: center;
  position: relative;
  color: white;
  text-align: center;
}

#flash-sale::before {
  content: "";
  position: absolute;
  top: 0; left: 0; right: 0; bottom: 0;
  background: rgba(20, 20, 20, 0.55); /* dark overlay for readability */
}

/* Flash Overlay */
.flash-overlay {
  position: relative;
  z-index: 2;
  max-width: 800px;
  padding: 20px;
}

.flash-overlay h2 {
  font-size: 42px;
  font-weight: 700;
  margin-bottom: 20px;
  font-family: 'Playfair Display', serif;  /* Elegant title */
  color: #D4DE95; /* Gold-ish */
}

.flash-overlay p {
  font-size: 18px;
  margin-bottom: 30px;
  line-height: 1.5;
  font-family: 'Poppins', sans-serif; /* Clean text */
  color: #ecf0f1; /* Light gray */
}

/* Flash Button with Cool Effect */
.flash-btn {
  padding: 14px 32px;
  background: linear-gradient(45deg, #636B2F, #BAC095);
  border: none;
  border-radius: 50px;
  color: #3D4127;
  font-size: 18px;
  text-decoration: none;
  cursor: pointer;
  display: inline-block;
  position: relative;
  overflow: hidden;
  transition: all 0.4s ease;
  box-shadow: 0 4px 15px rgba(25, 24, 24, 0.3);
  font-weight: 600;
}

/* Button Hover Effects */
.flash-btn:hover {
  background: linear-gradient(45deg, #BAC095, #636B2F);
  transform: scale(1.08);
  box-shadow: 0 6px 25px rgba(206, 219, 211, 0.6);
  color: #3D4127;
}

/* Glowing Border Animation */
.flash-btn::before {
  content: "";
  position: absolute;
  top: -2px; left: -2px; right: -2px; bottom: -2px;
  border-radius: 50px;
  background: linear-gradient(90deg, #636B2F, #BAC095, #3D4127);
  z-index: -1;
  background-size: 200%;
  animation: glowing 3s linear infinite;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}

.flash-btn:hover::before {
  opacity: 1;
}

/* Keyframes for glowing animation */
@keyframes glowing {
  0% { background-position: 0 0; }
  50% { background-position: 200% 0; }
  100% { background-position: 0 0; }
}

/* Glow Animation */
@keyframes glowing {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}
/* Popup Overlay */
#popupOverlay {
  display: none;           /* must be hidden initially */
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.45);
  justify-content: center;
  align-items: center;
  z-index: 9999;
}
 /* Popup Box */
.popup-box {
  position: relative;
  background: linear-gradient(145deg, #dfe5b8, #cdd59b);
  color: #2c2c2c;
  padding: 42px 34px 32px;
  border-radius: 20px;
  max-width: 420px;
  width: 90%;
  box-shadow: 0 20px 45px rgba(0, 0, 0, 0.25);
  text-align: center;
  font-family: 'Poppins', 'Inter', sans-serif;
  animation: softFloat 0.5s ease;
}

/* Title */
.popup-box h2 {
  margin-bottom: 14px;
  font-size: 26px;
  font-weight: 600;
  letter-spacing: 0.4px;
  color: #2f3320;
}

/* Description */
.popup-box p {
  font-size: 15px;
  line-height: 1.7;
  color: #4b4b3f;
  margin-bottom: 34px;
}

/* Buttons Container */
.popup-buttons {
  display: flex;
  justify-content: center;
  gap: 16px;
  flex-wrap: wrap;
}

/* Luxury Base Button */
.popup-buttons a {
  padding: 13px 30px;
  border-radius: 30px;
  font-size: 14.5px;
  font-weight: 500;
  letter-spacing: 0.4px;
  text-decoration: none;
  transition: all 0.35s ease;
}

/* Elegant Login Button */
.login-btn {
  background: rgba(255, 255, 255, 0.85);
  color: #2f3320;
  border: 1.5px solid rgba(47, 51, 32, 0.5);
  backdrop-filter: blur(6px);
}

.login-btn:hover {
  background: #3d4127;
  color: #e6edb8;
  transform: translateY(-3px);
  box-shadow: 0 10px 20px rgba(61, 65, 39, 0.4);
}

/* Premium Signup Button */
.signup-btn {
  background: linear-gradient(135deg, #3d4127, #2f3320);
  color: #f6f8e6;
  box-shadow: 0 10px 25px rgba(47, 51, 32, 0.5);
}

.signup-btn:hover {
  transform: translateY(-3px);
  box-shadow: 0 14px 30px rgba(47, 51, 32, 0.6);
}

/* Close Button */
.close-btn {
  position: absolute;
  top: 14px;
  right: 14px;
  background: rgba(255, 255, 255, 0.7);
  border: none;
  font-size: 18px;
  font-weight: bold;
  color: #444;
  cursor: pointer;
  width: 38px;
  height: 38px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.3s ease;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}

.close-btn:hover {
  background: #3d4127;
  color: #e6edb8;
  transform: rotate(90deg) scale(1.1);
}

/* Animation */
@keyframes softFloat {
  from {
    opacity: 0;
    transform: translateY(20px) scale(0.97);
  }
  to {
    opacity: 1;
    transform: translateY(0) scale(1);
  }
}

/* Mobile */
@media (max-width: 500px) {
  .popup-box {
    padding: 32px 22px 26px;
  }
}


/* SECTION 7 */
.visit-nursery {
  background-color: #ffffff; /* keep white background */
  padding: 80px 40px;
  display: flex;
  justify-content: center;
}

.visit-container {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 40px;
  max-width: 1100px;
  width: 100%;
  align-items: start;
}

.contact-card h2 {
  font-size: 2rem;
  color: #3D4127; /* dark combo color for headings */
  font-weight: 700;
  margin-bottom: 10px;
}

.subtitle {
  color: #636B2F; /* green combo color for subtitles */
  font-size: 1rem;
  margin-bottom: 25px;
}

.info-card {
  background: #ffffffff; /* soft green card background */
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.06);
  padding: 25px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.info-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 20px rgba(0,0,0,0.12);
}

.info-card h3 {
  font-size: 1.2rem;
  font-weight: 600;
  color: #3D4127; /* dark color for subheadings */
  margin-bottom: 10px;
}

.info-card hr {
  border: none;
  border-top: 1px solid #3D4127; /* divider in dark combo color */
  margin: 10px 0 20px;
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  margin-bottom: 18px;
  color: #3D4127;
}

.icon {
  font-size: 1.2rem;
  color: #636B2F;
  margin-top: 4px;
}

.direction-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background: linear-gradient(45deg, #636B2F, #3D4127);
  color: #BAC095;
  padding: 10px 18px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  margin-top: 10px;
  transition: all 0.3s ease;
}

.direction-btn:hover {
  background: linear-gradient(45deg, #3D4127, #636B2F);
  transform: scale(1.05);
  color: #BAC095;
}

.map-container iframe {
  width: 100%;
  height: 450px;
  border: none;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.08);
}


@media (max-width: 900px) {
  .visit-container {
    grid-template-columns: 1fr;
  }
  .map-container iframe {
    height: 300px;
  }
}

/* Custom styles for professional headings */
h2 {
      padding-bottom: 0.5rem;
    }

/* Scrollbar for modal content */
.modal-content-scroll {
        max-height: 80vh;
        overflow-y: auto;
    }
 /* Custom gradient background for the new hero section */
.hero-bg-gradient {
      background: linear-gradient(135deg, #e0f2f1 0%, #b2f5ea 50%, #f7f9fa 100%);
    }

/* Custom styles for 3D card/image display */
.plant-display-container {
        position: relative;
        perspective: 1000px;
    }

/* Applied directly to the image container for the 3D effect */
.plant-3d-card {
        transition: transform 0.5s ease-out, box-shadow 0.5s ease-out;
        /* Slight 3D tilt and elevation */
        transform: rotateY(10deg) rotateX(5deg) scale(1.05); 
        box-shadow: 0 40px 60px rgba(0, 0, 0, 0.3); 
        border: 4px solid #ffffff; /* White border for emphasis */
    }

/* Custom button style to match the aesthetic */
.cta-button {
        background: linear-gradient(90deg, #10b981 0%, #059669 100%);
        box-shadow: 0 10px 20px rgba(16, 185, 129, 0.4);
        transition: all 0.3s ease;
    }

    .cta-button:hover {
        background: linear-gradient(90deg, #059669 0%, #047857 100%);
        transform: translateY(-2px);
    }
    @keyframes float {
  0%, 100% { transform: translateY(0px); }
  50% { transform: translateY(-14px); }
}
.animate-float {
  animation: float 4.5s ease-in-out infinite;
}
 button:hover {
    transform: scale(1.07);
    box-shadow: 0 10px 25px rgba(47, 82, 51, 0.35);
  }

  button:active {
    transform: scale(0.95);
    box-shadow: 0 6px 15px rgba(47, 82, 51, 0.25);
  }

  button:focus {
    outline: none;
  }
 /* Dropdown wrapper */
.dropdown {
  position: relative;
}

/* Login trigger button */
.login-trigger {
  background: none;
  border: none;
  color: #ffffffcc;
  font-weight: 600;
  font-size: 17px;
  display: flex;
  align-items: center;
  gap: 6px;
  cursor: pointer;
}

/* Dropdown menu */
.dropdown-menu {
  position: absolute;
  right: 0;
  top: 130%;
  background: #ffffff;
  border-radius: 8px;
  min-width: 190px;
  box-shadow: 0 12px 30px rgba(0,0,0,0.18);
  display: none;
  flex-direction: column;
  overflow: hidden;
  z-index: 9999;
}

/* Dropdown items */
/* Dropdown items highlight */
.dropdown-menu a {
  padding: 12px 16px;
  text-decoration: none;
  color: #333;
  font-size: 14px;
  display: flex;
  align-items: center;
  gap: 10px;
  transition: all 0.3s ease; /* smooth hover effect */
  border-radius: 6px; /* rounded corners for hover highlight */
}

.dropdown-menu a:hover {
  background: #b0a3a3ff; /* light gray highlight */
  color: #000;          /* text becomes darker */
}

/* Keep dropdown text dark even when header is scrolled */
header.scrolled .dropdown-menu a {
  color: #333 !important;
}
header.scrolled .dropdown-menu a:hover {
  background: #f5f5f5;
  color: #000;
}
@media (max-width: 768px) {

  /* Hide nav by default on mobile */
  .header-nav {
    display: none;       /* hides it, but still exists in HTML */
    position: absolute;
    top: 100%;
    left: 0;
    width: 100%;
    background: rgba(0,0,0,0.95);
    border-radius: 16px;
    padding: 20px 0;
  }

  /* Show nav when active */
  .header-nav.active {
    display: block;
    z-index: 1100; /* make sure it appears above other elements */
  }

  /* Stack menu items vertically */
  .header-nav ul {
    flex-direction: column;
    gap: 20px;
    align-items: center;
  }

  /* Hamburger button visible only on mobile */
  .mobile-menu-btn {
    display: block;
    background: none;
    border: none;
    font-size: 26px;
    color: #fff;
    cursor: pointer;
  }
}

/* Desktop stays unchanged */
@media (min-width: 769px) {
  .mobile-menu-btn {
    display: none;
  }
}
  </style>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
<header class="header">
  <button class="mobile-menu-btn" id="mobileMenuBtn">
  <i class="fa-solid fa-bars"></i>
</button>
  <!-- LEFT: Logo -->
  <div class="header-left">
    <img 
      src="{{ asset('storage/image/YAH.png') }}" 
      class="logo-img"
      alt="Yah Nursery Logo"
    >
  </div>

  <!-- CENTER: Navigation -->
  <nav class="header-nav">
    <ul>
      <li><a href="#home" class="nav-link active">HOME</a></li>
      <li><a href="#team" class="nav-link">PLANT</a></li>
      <li><a href="#blog" class="nav-link">BLOG</a></li>
      <li><a href="#customer-says" class="nav-link">FEEDBACK</a></li>
      <li><a href="#visit" class="nav-link">LOCATION</a></li>
    </ul>
  </nav>

<!-- RIGHT: Login Dropdown -->
<div class="contact dropdown">
  <button id="loginBtn" class="login-trigger" type="button">
    <i class="fa-solid fa-user"></i> LOGIN
    <i class="fa-solid fa-caret-down"></i>
  </button>

  <div id="loginMenu" class="dropdown-menu">
    <a href="{{ route('customer.login') }}">
      <i class="fa-solid fa-user"></i> Customer Login
    </a>
    <a href="{{ route('admin.login') }}">
      <i class="fa-solid fa-right-to-bracket"></i> Admin Login
    </a>
  </div>
</div>

</header>
<script>
  const btn = document.getElementById('loginBtn');
  const menu = document.getElementById('loginMenu');

  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    menu.style.display = menu.style.display === 'flex' ? 'none' : 'flex';
  });

  document.addEventListener('click', () => {
    menu.style.display = 'none';
  });
</script>
<script>
document.addEventListener('DOMContentLoaded', () => {
  const mobileBtn = document.getElementById('mobileMenuBtn');
  const nav = document.querySelector('.header-nav');
  const navLinks = nav.querySelectorAll('a.nav-link'); // all nav links

  // Toggle nav on hamburger click
  mobileBtn.addEventListener('click', () => {
    nav.classList.toggle('active');
  });

  // Close nav if clicked outside
  document.addEventListener('click', (e) => {
    if (!nav.contains(e.target) && !mobileBtn.contains(e.target)) {
      nav.classList.remove('active');
    }
  });

  // Close nav when any link is clicked
  navLinks.forEach(link => {
    link.addEventListener('click', () => {
      nav.classList.remove('active');
    });
  });
});
</script>



<script>
  const header = document.querySelector('header.header');

window.addEventListener('scroll', () => {
  if (window.scrollY > 50) {
    header.classList.add('scrolled');
  } else {
    header.classList.remove('scrolled');
  }
});
</script>

<!-- Hero Section 1-->
<div class="hero" id="home">
  <!-- Background Video -->
  <video autoplay muted loop playsinline class="hero-video">
    <source src="{{ asset('storage/video/b6.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- Overlay -->
  <div class="hero-overlay"></div>

<!-- Hero Content -->
<div class="hero-content text-center flex flex-col justify-center items-center h-screen px-6">
  
  <!-- Welcome Text -->
  <span class="hero-welcome">
    Welcome to
  </span>

  <!-- Brand Name with Metallic Shimmer -->
  <h1 class="brand-title">
    YAH NURSERY & LANDSCAPE SDN BHD
  </h1>

  <!-- Location -->
  <h3 class="hero-location">
    Shah Alam
  </h3>

  <!-- Premium CTA Button -->
  <a href="#" 
     class="btn-luxe" 
     onclick="openPopup(event)">
    SHOP NOW
  </a>

</div>

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&family=Cormorant+Garamond:ital,wght@0,500;1,500&family=Montserrat:wght@300;600&display=swap" rel="stylesheet">

<style>
body {
  margin: 0;
  background-color: #ffffff; /* Dark luxury base */
  font-family: 'Montserrat', sans-serif;
  overflow-x: hidden;
}

/* Welcome Text */
.hero-welcome {
  display: block;
  font-family: 'Cormorant Garamond', serif;
  font-size: 2rem;
  color: rgba(255,255,255,0.85);
  font-style: italic;
  letter-spacing: 2px;
  margin-bottom: -15px;
  text-shadow: 1px 1px 5px rgba(255,255,255,0.2);
  opacity: 0;
  transform: translateY(20px);
  animation: fadeUp 1.2s ease-out forwards;
}

/* Brand Title with Metallic Shimmer */
.brand-title {
  font-family: 'Cinzel', serif;
  font-size: 4.5rem;
  font-weight: 700;
  text-transform: uppercase;
  background: linear-gradient(120deg, #ffffff 20%, #d4af37 40%, #f9e29b 50%, #d4af37 60%, #ffffff 80%);
  background-size: 200% auto;
  color: #fff;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 0 8px rgba(212,175,55,0.5), 0 0 20px rgba(255,255,255,0.1);
  margin: 1rem 0;
  opacity: 0;
  transform: translateY(30px);
  animation: fadeUp 1.5s ease-out forwards 0.3s, shimmer 4s linear infinite;
}

/* Location */
.hero-location {
  font-family: 'Montserrat', sans-serif;
    color: #ffffff; 
  font-weight: 700;
  letter-spacing: 12px;
  text-transform: uppercase;
  margin-bottom: 2rem;
  opacity: 0;
  animation: fadeUp 1.3s ease-out forwards 0.8s;
}

/* Premium CTA Button */
.btn-luxe {
  display: inline-block;
  padding: 1rem 3rem;
  font-family: 'Cinzel', serif;
  font-size: 1rem;
  font-weight: 700;
  letter-spacing: 3px;
  color: white;
  border: 2px solid #d4af37;
  background: transparent;
  position: relative;
  overflow: hidden;
  cursor: pointer;
  text-transform: uppercase;
  text-shadow: 0 0 5px rgba(212,175,55,0.4);
  opacity: 0;
  animation: fadeUp 1.5s ease-out forwards 1.2s, shimmer 4s linear infinite;
  transition: all 0.5s ease;
  border-radius: 50px;
}

.btn-luxe:hover {
  color: #0a0c0a;
  background: #d4af37;
  box-shadow: 0 0 25px rgba(212,175,55,0.5), 0 0 50px rgba(255,255,255,0.1);
}

.btn-luxe::before {
  content: '';
  position: absolute;
  top: 0;
  left: -100%;
  width: 100%;
  height: 100%;
  background: linear-gradient(
      120deg,
      transparent,
      rgba(255,255,255,0.3),
      transparent
  );
  transition: 0.6s;
}

.btn-luxe:hover::before {
  left: 100%;
}

/* Animations */
@keyframes fadeUp {
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes shimmer {
  to {
    background-position: 200% center;
  }
}

/* Responsive */
@media (max-width: 768px) {
  .brand-title { font-size: 2.5rem; }
  .hero-welcome { font-size: 1.5rem; }
  .hero-location { letter-spacing: 6px; font-size: 0.8rem; }
  .btn-luxe { font-size: 0.9rem; padding: 0.8rem 2rem; }
}
</style>


</div>
<!-- ===== SPLIT-SCREEN SHOWCASE SECTION ===== -->
<section class="h-section flex flex-col lg:flex-row w-full overflow-hidden bg-white">

  <!-- LEFT COLUMN -->
  <div class="content-bg lg:w-3/5 w-full flex flex-col justify-center items-center p-10 sm:p-16">
    <div class="max-w-md w-full text-center">

      <!-- Pre-title -->
      <p class="text-sm font-normal text-gray-500 tracking-widest mb-3 title-font">
       PERFECT FOR OUTDOORS AND INDOORS 
      </p>

      <!-- Main Title -->
      <h1 class="title-font text-3xl sm:text-4xl lg:text-5xl font-semibold text-[#636B2F] tracking-wide mb-8">
       Environment in Yah Nursery & Landscape
      </h1>
      <BR>

<a href="{{ route('customer.login') }}" 
   class="flash-btn px-6 py-3 rounded-full font-bold bg-[#BAC095] hover:bg-[#636B2F] transition-all duration-300"
   style="color: #ffffff !important;">
  Shop our products    
</a>
 
</div>
    <BR>
 <!-- Image Grid: A & B -->
<div class="mt-12 flex justify-center gap-12 max-w-lg w-full">
    <!-- Image A -->
    <div
      class="w-1/2 aspect-[4/3] rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
      <img
        src="{{ asset('storage/image/HOMEPAGE_IMAGEA.jpeg') }}"
        alt="Outdoor ceramic plant pot"
        class="w-full h-full object-cover"
        onerror="this.onerror=null;this.src='https://placehold.co/400x300/E8E6E3/6B805F?text=Image+A'">
    </div>

  <!-- Image B -->
  <div
    class="w-1/2 aspect-[4/3] rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
    <img
      src="{{ asset('storage/image/HOMEPAGE_IMAGEB.jpeg') }}"
      alt="Collection of small outdoor pots"
      class="w-full h-full object-cover"
      onerror="this.onerror=null;this.src='https://placehold.co/400x300/E8E6E3/6B805F?text=Image+B'">
  </div>
</div>


  </div>
<div class="lg:w-2/5 w-full relative overflow-hidden rounded-xl shadow-lg banner-slider-portrait" style="height: 80vh; max-height: 800px;">
  <div class="banner-track-portrait">
    <video class="banner-slide-portrait" autoplay muted loop playsinline preload="auto">
      <source src="{{ asset('storage/video/v1.mov') }}" type="video/mp4">
    </video>

    <video class="banner-slide-portrait" autoplay muted loop playsinline preload="auto">
      <source src="{{ asset('storage/video/v2.mov') }}" type="video/mp4">
    </video>

    <video class="banner-slide-portrait" autoplay muted loop playsinline preload="auto">
      <source src="{{ asset('storage/video/v3.mov') }}" type="video/mp4">
    </video>
  </div>
</div>

<style>
  /* ===== Mobile responsive for Image Grid (no stacking) ===== */
@media (max-width: 768px) {
  .mt-12.flex {
    flex-direction: row;        /* keep images in one row */
    justify-content: center;    /* center the grid */
    gap: 12px;                  /* keep gap between images */
    max-width: 95%;             /* small padding from left/right edges */
    margin: 16px auto 0 auto;   /* auto horizontal margin to center */
  }

  .mt-12.flex > div {
    width: 48%;                 /* keep two images side by side */
    aspect-ratio: 4 / 3;        /* maintain original aspect ratio */
  }

  .mt-12.flex img {
    object-fit: cover;          /* ensure image fills container nicely */
    width: 100%;
    height: 100%;
    border-radius: 16px;        /* keep rounded corners */
  }
}

  /* Mobile responsive for the video slider */
@media (max-width: 768px) {
  .banner-slider-portrait {
    width: 100%;        /* full width on mobile */
    height: 40vh;       /* shrink height for phones */
    max-height: 400px;  /* optional maximum height */
    margin-top: 20px;   /* spacing if needed */
  }

  .banner-track-portrait {
    flex-direction: column; /* keep videos stacked for slider */
  }

  .banner-slide-portrait {
    height: 100%;       /* fill the new height */
    width: 100%;
    object-fit: cover;  /* keep aspect ratio, crop if needed */
    object-position: center;
  }
}

.banner-slider-portrait {
  position: relative;
  width: 100%;
  overflow: hidden;
  border-radius: 16px;
  background: #000; /* Black background prevents white flashes */
}

.banner-track-portrait {
  display: flex;
  flex-direction: column;
  height: 100%; /* Changed to 100% for better scaling */
  transition: transform 1s cubic-bezier(0.4, 0, 0.2, 1);
  will-change: transform;
}

.banner-slide-portrait {
  flex: 0 0 100%;
  width: 100%;
  height: 100%;
  /* This is the magic property for "fitting" */
  object-fit: cover; 
  /* Adjust 'center' to 'top' if faces are being cut off */
  object-position: center; 
  display: block;
}
</style>
<script>
const slidesPortrait = document.querySelectorAll('.banner-slide-portrait');
const trackPortrait = document.querySelector('.banner-track-portrait');
let currentIndexPortrait = 0;

function nextSlidePortrait() {
  currentIndexPortrait = (currentIndexPortrait + 1) % slidesPortrait.length;
  trackPortrait.style.transform = `translateY(-${currentIndexPortrait * 100}%)`;
}

// Auto-slide every 5 seconds
setInterval(nextSlidePortrait, 5000);
</script>

</section>

   <!-- Team Section (new, matches your requested visual) -->
  <section id="team">
<h2 class="text-4xl md:text-5xl lg:text-6xl font-extrabold leading-tight mb-4 text-[#636B2F]" 
    style="font-family: 'Playfair Display', serif; letter-spacing: 2px; text-transform: uppercase; text-shadow: 1px 1px 3px rgba(0,0,0,0.2);">
    TOP PLANT COLLECTIONS
</h2>

    <div style="width: 120px; height: 4px; background-color: #000000ff; margin: 0 auto 30px; border-radius: 3px;"></div>

<p class="lead text-lg md:text-xl lg:text-2xl text-[#4A4F2D] max-w-3xl mx-auto text-center" 
   style="font-family: 'Merriweather', serif; line-height: 1.8; letter-spacing: 0.5px; text-shadow: 1px 1px 2px rgba(0,0,0,0.2);">
    We at Yah Nursery are proud to offer carefully designed landscapes crafted to suit our clients’ preferences while prioritizing sustainability.
</p>

    <div class="team-wrap">
      <!-- left nav (outside) -->

      <!-- slider viewport -->
      <div class="team-slider" id="teamSliderViewport">
        <div class="team-track" id="teamTrack">
          <!-- Replace these images with real team photos if you have them -->
          <div class="team-member">
            <img 
            src="{{ asset('storage/image/bungakertas.png') }}">
            <div class="team-info">
              <h3>BUNGA KERTAS</h3>
            </div>
          </div>

          <div class="team-member">
            <img 
            src="{{ asset('storage/image/bungakekwa.png') }}">
            <div class="team-info">
              <h3>BUNGA KEKWA</h3>
            </div>
          </div>

          <div class="team-member">
            <img 
            src="{{ asset('storage/image/monstera.png') }}">
            <div class="team-info">
              <h3>MONSTERA</h3>
            </div>
          </div>

          <!-- extra members so sliding shows movement -->
          <div class="team-member">
            <img 
            src="{{ asset('storage/image/episcia.png') }}">
            <div class="team-info">
              <h3>EPISCIA</h3>
            </div>
          </div>

          <div class="team-member">
            <img 
            src="{{ asset('storage/image/bonsai.png') }}">
            <div class="team-info">
              <h3>BONSAI GINSENG</h3>
            </div>
          </div>

          <div class="team-member">
            <img 
            src="{{ asset('storage/image/keladi.png') }}">
            <div class="team-info">
              <h3>KELADI</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- right nav (outside) -->
    </div>
  </section>
  
<section class="hero-background">
    <div class="content-box">
        <h1 class="hero-title">BRING LIFE TO SPACE</h1>
        <p class="hero-subtitle">Designer pots, timeless appeal</p>
<a href="{{ route('customer.login') }}" 
   class="flash-btn px-6 py-3 rounded-full font-bold bg-[#BAC095] hover:bg-[#636B2F] transition-all duration-300"
   style="color: #ffffff !important;">
  Browse designer pots  
</a>    
  </div>
</section>
<!-- Add Font Awesome for icons -->
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500&display=swap" rel="stylesheet">

<!-- 🌿 Yah Nursery & Landscape Section -->
<section id="blog" class="relative bg-white py-20 px-8 md:px-16 flex flex-col md:flex-row items-center justify-center gap-16 rounded-3xl shadow-lg overflow-visible">

  <!-- Decorative background glow -->
  <div class="absolute top-0 left-0 w-80 h-80 bg-green-200/20 blur-3xl rounded-full -z-10"></div>
  <div class="absolute bottom-0 right-0 w-96 h-96 bg-yellow-100/20 blur-3xl rounded-full -z-10"></div>

  <!-- 🌿 Text Section -->
  <div class="md:w-1/2 text-center flex flex-col items-center space-y-8 px-4">

    <!-- Fancy Title -->
<h1 class="text-6xl md:text-7xl font-extrabold leading-tight tracking-wide text-center md:text-left">
  <span style="
      font-family: 'Playfair Display', serif;
      background: linear-gradient(90deg, #636B2F, #BAC095);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.15);
      letter-spacing: 1px;
    ">
    NURSERY
  </span>
  <span style="
      display:block;
      font-family: 'Great Vibes', cursive;
      font-size: 1.3em;
      color:#597341;
      text-shadow: 1px 1px 5px rgba(106,168,79,0.4);
      margin-top: -8px;
    ">
    In Malaysia
  </span>
</h1>

<!-- Add in <head> -->
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Great+Vibes&display=swap" rel="stylesheet">


    <!-- Subtitle -->
    <h2 class="text-lg md:text-xl leading-relaxed max-w-2xl"
        style="font-family: 'Quicksand', sans-serif; color:#4C4C4C;">
      Bringing <span style="color:#6AA84F; font-weight:600;">nature</span> closer to your home for over 
      <span style="color:#2F5233; font-weight:700;">20 years</span>. Discover our exclusive collection of 
      indoor and outdoor plants from radiant 
      <span style="font-style:italic; color:#B86B45;">sunflowers</span> to the rare 
      <span style="font-style:italic; color:#B86B45;">three-month flower</span> of Cameron Highlands.
    </h2>

   <!-- 🌿 Large Elegant Description -->
<p class="text-3xl md:text-5xl max-w-5xl mx-auto md:mx-0 leading-snug text-center md:text-left"
   style="
      font-family: 'Cormorant Garamond', serif;
      color:#3A3A3A;
      font-style: italic;
      line-height: 1.6;
      letter-spacing: 0.8px;
    ">
   Beautify your space with 
   <span style="color:#6AA84F; font-weight:700;">Yah Nursery</span>, 
   where every plant tells a story of 
   <span style="color:#2F5233; font-weight:700;">growth</span>, 
   <span style="color:#2F5233; font-weight:700;">care</span>, and 
   <span style="color:#2F5233; font-weight:700;">life</span>.
</p>

  <BR>
<a href="{{ route('customer.login') }}" 
       class="flash-btn px-6 py-3 rounded-full text-[#3D4127] bg-[#BAC095] hover:bg-[#636B2F] transition-all duration-300 font-semibold">
       Explore more
    </a>
  </div>

  <!-- 🌾 Image Section -->
  <div class="md:w-1/2 flex justify-center relative">
    <div class="absolute w-[400px] h-[400px] bg-green-200/30 blur-3xl rounded-full top-10 right-10 animate-pulse"></div>
    <img 
      src="{{ asset('storage/image/logoYah.png') }}" 
      alt="Yah Nursery 3D Plant"
      class="w-[750px] md:w-[800px] drop-shadow-2xl transform hover:scale-105 transition-transform duration-700 animate-float"
    />
  </div>
</section>

<!-- 🌿 FLASH SALE SECTION -->
<section id="flash-sale" class="relative h-[500px] md:h-[600px] overflow-hidden">
  
  <!-- 🎥 Background Video -->
  <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('storage/video/b7.mp4') }}" type="video/mp4">
    Your browser does not support the video tag.
  </video>

  <!-- 🌿 Overlay for text readability -->
  <div class="flash-overlay absolute inset-0 bg-[#3D4127]/70 flex flex-col justify-center items-center text-center px-6 md:px-12">
    <h2 class="text-4xl md:text-5xl font-extrabold text-[#BAC095] mb-4"
        style="font-family: 'Playfair Display', serif;">
      Flash Sale: Up to 50% Off On Select Items!
    </h2>
    <p class="text-lg md:text-xl text-[#BAC095] mb-6 max-w-2xl">
      Don’t miss out on our flash sale event! For a limited time, enjoy up to 50% off on a selection of our best-selling products.
    </p>
    <a href="{{ route('customer.login') }}" 
       class="flash-btn px-6 py-3 rounded-full text-[#3D4127] bg-[#BAC095] hover:bg-[#636B2F] transition-all duration-300 font-semibold">
       Go get yours !
    </a>
  </div>

</section>


<!-- 💬 CUSTOMER REVIEWS SECTION -->
<section id="customer-says">
  <h2 class="section-title">WHAT OUR CUSTOMERS SAY</h2>
  <div class="divider"></div>
  <p class="section-subtitle">
    Hear from real customers who love shopping with Yah Nursery & Landscape 🌱
  </p>

  <div class="reviews-container">
    <!-- Review 1 -->
    <div class="review-card">
      <div class="review-header">
        <img src="https://reklr.com/wp-content/uploads/2024/07/y2.jpg" alt="Customer 1" class="review-avatar">
        <div>
          <h4 class="review-name">Nur Rina</h4>
          <div class="review-stars">⭐⭐⭐⭐⭐</div>
        </div>
      </div>
      <p class="review-text">
        “The plants I bought here are healthy and beautiful! Great service and fast delivery. I’ll definitely buy again.”
      </p>
      <span class="review-date">2 weeks ago</span>
    </div>

    <!-- Review 2 -->
    <div class="review-card">
      <div class="review-header">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQYxFeZ5DLhZvrU--pSyUF8TeAO3e1JVSuKxA&s" alt="Customer 2" class="review-avatar">
        <div>
          <h4 class="review-name">Muhd Khairul</h4>
          <div class="review-stars">⭐⭐⭐⭐</div>
        </div>
      </div>
      <p class="review-text">
        “Very happy with the landscaping advice I got! My garden looks amazing now. Highly recommended for beginners!”
      </p>
      <span class="review-date">1 month ago</span>
    </div>

    <!-- Review 3 -->
    <div class="review-card">
      <div class="review-header">
        <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTjmrtlf53mxuCJOo7jXqJzmaKMnle-uDUvZg&s" alt="Customer 3" class="review-avatar">
        <div>
          <h4 class="review-name">Siti Aisyah</h4>
          <div class="review-stars">⭐⭐⭐⭐⭐</div>
        </div>
      </div>
      <p class="review-text">
        “I love the variety of indoor plants. Staff are friendly and knowledgeable — made my home feel alive!”
      </p>
      <span class="review-date">3 weeks ago</span>
    </div>

    <!-- Review 4 -->
    <div class="review-card">
      <div class="review-header">
        <img src="https://reklr.com/wp-content/uploads/2024/07/y1.jpg" alt="Customer 4" class="review-avatar">
        <div>
          <h4 class="review-name">Nora Danish</h4>
          <div class="review-stars">⭐⭐⭐⭐⭐</div>
        </div>
      </div>
      <p class="review-text">
        “Excellent quality and affordable prices. My outdoor garden never looked better. Truly love Yah Nursery!”
      </p>
      <span class="review-date">5 days ago</span>
    </div>
  </div>
</section>


<!-- ===== Visit Our Nursery Section ===== -->
<section id="visit" class="visit-nursery">
  <div class="visit-container">
    <!-- Left: Contact Info -->
    <div class="contact-card">
      <h2>VISIT OUR NURSERY</h2>
      <p class="subtitle">Come and see our plants in person and get expert advice</p>

      <div class="info-card">
        <h3>Contact Information</h3>
        <hr>
        <div class="info-item">
          <i class="fas fa-map-marker-alt icon"></i>
          <div>
            <strong>Address</strong><br>
            Kebun Bunga, Jalan Pangsun Tiga 27/12c, Sek 27, <br>
            Taman Bunga Negara, 40000 Shah Alam, Selangor
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-phone icon"></i>
          <div>
            <strong>Phone</strong><br>
            018-3824046
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-envelope icon"></i>
          <div>
            <strong>Email</strong><br>
            yahNursery@gmail.com
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-clock icon"></i>
          <div>
            <strong>Hours</strong><br>
            Mon–Sat: 8AM–6PM, Sun: 9AM–5PM
          </div>
        </div>

        <a href="https://www.google.com/maps/dir/?api=1&destination=Kebun+Bunga,+Jalan+Pangsun+Tiga+27%2F12c,+Sek+27,+Taman+Bunga+Negara,+40000+Shah+Alam,+Selangor"
           target="_blank" class="direction-btn">
          <i class="fas fa-directions"></i> Get Directions
        </a>
      </div>
    </div>
    <!-- Right: Map -->
    <div class="map-container">
      <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3982.088266243254!2d101.55348797480365!3d3.012718896933176!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc530681ef8f0b%3A0xd1c263f8f7fbc94e!2sKebun%20Bunga%2C%20Jalan%20Pangsun%20Tiga%2027%2F12c%2C%20Sek%2027%2C%20Taman%20Bunga%20Negara%2C%2040000%20Shah%20Alam%2C%20Selangor!5e0!3m2!1sen!2smy!4v1698650000000!5m2!1sen!2smy"
        allowfullscreen=""
        loading="lazy">
      </iframe>
    </div>
  </div>
</section>

<x-footer />

<div id="popupOverlay">
  <div class="popup-box">
    <button class="close-btn" onclick="closePopup()">×</button>

    <h2>Welcome to Yah Nursery</h2>
    <p>
      Discover premium plants and greenery.<br>
      Please <strong>log in</strong> or <strong>sign up</strong> to continue.
    </p>

    <div class="popup-buttons">
      <a href="{{ route('customer.login') }}" class="btn login-btn">Log In</a>
      <a href="{{ route('customer.register') }}" class="btn signup-btn">Sign Up</a>
    </div>
  </div>
</div>


  <script>
  function openPopup(event) {
  event.preventDefault();                   // prevent link default
  document.getElementById('popupOverlay').style.display = 'flex'; // show popup
}

function closePopup() {
  document.getElementById('popupOverlay').style.display = 'none'; // hide popup
}

/* Team slider logic - Continuous Infinite Scroll */
(function() {
  const viewport = document.getElementById('teamSliderViewport');
  const track = document.getElementById('teamTrack');
  const prevBtn = document.getElementById('teamPrev');
  const nextBtn = document.getElementById('teamNext');

  // Duplicate slides for seamless infinite loop
  track.innerHTML += track.innerHTML;

  // Get card width
  function getCardWidth() {
    const card = track.querySelector('.team-member');
    if (!card) return 320;
    const style = window.getComputedStyle(card);
    const marginRight = parseFloat(style.marginRight || 0);
    return Math.round(card.getBoundingClientRect().width + marginRight);
  }

  // Move by one card
  function moveBy(direction) {
    const cw = getCardWidth();
    viewport.scrollBy({ left: direction * cw, behavior: 'smooth' });
  }

  // Button controls
  window.teamPrev = function() { moveBy(-1); };
  window.teamNext = function() { moveBy(1); };

  // Swipe/drag support
  let isDown = false, startX, scrollLeft;
  viewport.addEventListener('pointerdown', (e) => {
    isDown = true;
    viewport.style.scrollBehavior = 'auto';
    startX = e.pageX - viewport.offsetLeft;
    scrollLeft = viewport.scrollLeft;
  });
  window.addEventListener('pointerup', () => {
    if (!isDown) return;
    isDown = false;
    viewport.style.scrollBehavior = 'smooth';
  });
  viewport.addEventListener('pointermove', (e) => {
    if (!isDown) return;
    e.preventDefault();
    const x = e.pageX - viewport.offsetLeft;
    const walk = (startX - x);
    viewport.scrollLeft = scrollLeft + walk;
  });

  // Continuous auto-scroll
  let speed = 1; // pixels per frame
  function animate() {
    viewport.scrollLeft += speed;

    // Reset scroll when reaching halfway (because we duplicated the content)
    if (viewport.scrollLeft >= track.scrollWidth / 2) {
      viewport.scrollLeft = 0;
    }

    requestAnimationFrame(animate);
  }

  animate(); // start animation
})();
</script>
<script>
  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll("nav ul li a");

  window.addEventListener("scroll", () => {
    let current = "";

    sections.forEach(section => {
      const sectionTop = section.offsetTop - 80; // adjust if your navbar has height
      const sectionHeight = section.clientHeight;
      if (pageYOffset >= sectionTop && pageYOffset < sectionTop + sectionHeight) {
        current = section.getAttribute("id");
      }
    });

    navLinks.forEach(link => {
      link.classList.remove("active");
      if (link.getAttribute("href") === `#${current}`) {
        link.classList.add("active");
      }
    });
  });
</script>

</body>
<script src="../node_modules/flowbite/dist/flowbite.min.js"></script>
</html>
