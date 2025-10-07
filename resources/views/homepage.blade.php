<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Yah Nursery & Landscape</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins:wght@400;500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    html { scroll-behavior: smooth; }
    body { color: white; min-height: 100vh; display: flex; flex-direction: column; margin: 0; }

    /* Top Navbar */
    header {
      position: fixed; top: 0; width: 100%;
      background: rgba(0,0,0,0.7);
      display: flex; justify-content: space-between; align-items: center;
      padding: 12px 40px; z-index: 1000;
    }
    header .logo { font-size: 18px; font-weight: bold; color: #fff; }
    nav ul { list-style: none; display:flex; gap:18px; align-items:center; }
    nav ul li a { text-decoration:none; color:#fff; font-weight:500; font-size:14px; transition: color .3s; }
    nav ul li a:hover { color:#f1c40f; }
    header .contact a { color:#fff; margin-left:8px; text-decoration:none; font-size:14px; }

    /* Hero Section */
    .hero {
      height: 85vh;
      background: url('https://jeffries.com.au/wp-content/uploads/2022/11/shutterstock_1924361366.jpg') no-repeat center center/cover;
      display:flex; flex-direction:column; justify-content:center; align-items:center;
      text-align:center; position:relative; padding-top:70px;
    }
    .hero::after { content:""; position:absolute; top:0; left:0; right:0; bottom:0; background: rgba(0,0,0,0.5); z-index:1; }
    .hero-content { position:relative; z-index:2; padding:0 20px; }
    .hero h1 { font-size:34px; margin-bottom:10px; }
    .hero p { font-size:16px; margin-bottom:18px; }
    .hero .btn {
      padding:10px 22px; background:rgb(49,67,56); color:white; text-decoration:none; font-size:14px;
      border-radius:30px; transition: background .3s, transform .2s; cursor:pointer;
    }
    .hero .btn:hover { background:rgb(210, 213, 211); transform: scale(1.05); }

    /* Sections */
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

    /* Blog Slider (kept as-is) */
    #blog { background: linear-gradient(135deg,#ffffff,rgb(255, 255, 255)); color:#333; text-align:center; }
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
    #team { background: #fff; color: #333; text-align:center; padding: 60px 40px; }
    #team h2 { font-size: 34px; color: #0f6a3a; margin-bottom: 10px; }
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
    .team-info h3 { font-size:20px; margin-bottom:6px; font-weight:700; }
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

    /* Customer Says Section styling kept similar */
    #customer-says {  background: linear-gradient(135deg,#ffffff,rgb(198, 198, 198)); color:#333; text-align:center; padding:60px 40px; scroll-margin-top:70px; }
    #customer-says h2 { font-size:26px; color:#000; margin-bottom:30px; }
    .testimonials { display:grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap:25px; max-width:1000px; margin:auto; }
    .testimonial { background:white; padding:22px; border-radius:15px; box-shadow: 0 6px 15px rgba(0,0,0,0.1); text-align:center; transition: transform .3s ease; }
    .testimonial:hover { transform: translateY(-5px); }
    .testimonial p { font-size:14px; line-height:1.5; margin-bottom:12px; font-style: italic; color:#555; }
    .testimonial h4 { font-size:15px; font-weight:700; color:#2f8f2f; }

    /* Footer kept same visual */
    footer { width:100%; background: rgb(39,34,34); color:#ddd; }
    footer .footer-container { display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:30px; padding:35px 40px 15px; max-width:1100px; margin:auto; }
    footer h3 { margin-bottom:12px; font-size:15px; font-weight:bold; color:#76c38f; display:flex; align-items:center; gap:6px; }
    footer p, footer ul li { font-size:13px; margin-bottom:6px; line-height:1.5; }
    footer ul { list-style:none; padding:0; }
    footer ul li a { text-decoration:none; color:#ddd; transition:color .3s; font-size:13px; }
    footer ul li a:hover { color:#76c38f; }
    .social-links a { color:#ddd; margin-right:12px; font-size:18px; transition: .3s; }
    .social-links a:hover { color:#76c38f; }
    .bottom-bar { width:100%; background:#111; color:#bbb; text-align:center; padding:10px 0; font-size:12px; border-top:1px solid #333; }

    /* hide native scrollbar for team track on WebKit */
    .team-slider::-webkit-scrollbar, .blog-slider::-webkit-scrollbar { display: none; }

     /* General styling for the body */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f8f8;
            line-height: 1.6;
        }

        /* The main container for the entire section */
        #blog {
            padding: 60px 20px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* Title and subtitle styling */
        .subtitle {
            font-size: 16px;
            color: #555;
            margin-bottom: 5px;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 600;
            color: #2e8b57; /* A nice shade of green for the subtitle */
        }
        #blog h2 {
            font-size: 38px;
            color: #333;
            margin-bottom: 50px;
            font-weight: bold;
        }

        /* Container for the service items and central image */
        .services-container {
            display: flex;
            justify-content: center;
            align-items: flex-start; /* Align items to the top for a cleaner look */
            flex-wrap: wrap; /* Allows items to wrap on smaller screens */
            gap: 40px;
            max-width: 1200px;
            margin: 0 auto;
        }

        /* Container for the service columns on the left and right */
        .service-column {
            display: flex;
            flex-direction: column;
            gap: 40px;
            flex: 1; /* Allow columns to grow and shrink */
            max-width: 350px;
        }

        /* Style for each individual service item */
        .service-item {
            display: flex;
            flex-direction: column; /* This is the key change to stack icon and text */
            align-items: center;
            text-align: center;
        }

        /* The green circular icon background */
        .service-icon {
            background-color: #2e8b57; /* Green color for icons */
            border-radius: 50%;
            width: 70px;
            height: 70px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 15px; /* Added margin to separate icon and text */
            flex-shrink: 0; /* Prevents the icon circle from shrinking */
        }

        /* Icon image styling */
        .service-icon img {
            width: 35px;
            height: 35px;
            filter: invert(100%); /* Makes icons white */
        }

        /* Text content for each service */
        .service-content h3 {
            margin: 0;
            font-size: 22px;
            color: #333;
            font-weight: bold;
        }
        .service-content p {
            font-size: 15px;
            color: #777;
            margin-top: 5px;
        }

        /* The central circular image */
        .central-image {
            flex-shrink: 0;
            width: 350px; 
            height: 350px; /* Fixed height for a perfect circle */
            margin: 0 40px;
        }
        .central-image img {
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image fills the circle */
            border-radius: 50%; /* This is what makes the image a circle */
            box-shadow: 0 8px 24px rgba(0,0,0,0.15); /* Adds a subtle shadow for depth */
            transition: transform 0.3s ease-in-out; /* Adds a smooth transition for the hover effect */
        }
        
        /* Hover effect for the central image */
        .central-image img:hover {
            transform: scale(1.05); /* Scales the image up by 5% on hover */
        }

        /* Responsive adjustments for smaller screens */
        @media (max-width: 900px) {
            .services-container {
                flex-direction: column;
                align-items: center;
            }
            .central-image {
                margin: 40px 0;
            }
            .service-column {
                width: 100%;
                align-items: center;
            }
            .service-item {
                width: 90%;
            }
        }
       /* Flash Sale Background */
#flash-sale {
  background: url('https://img.pikbest.com/wp/202343/dark-green-leaves-natural-create-a-captivating-background-texture_9969560.jpg!w700wp') no-repeat center center/cover;
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
  color: #f4d03f; /* Gold-ish */
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
  background: linear-gradient(45deg,rgb(65, 111, 84),rgb(74, 109, 89));
  border: none;
  border-radius: 50px;
  color: white;
  font-size: 18px;
  text-decoration: none;
  cursor: pointer;
  display: inline-block;
  position: relative;
  overflow: hidden;
  transition: all 0.4s ease;
  box-shadow: 0 4px 15px rgba(25, 24, 24, 0.3);
}

/* Button Hover Effects */
.flash-btn:hover {
  background: linear-gradient(45deg,rgb(189, 117, 62),rgb(144, 144, 23));
  transform: scale(1.08);
  box-shadow: 0 6px 25px rgba(206, 219, 211, 0.6);
}

/* Glowing Border Animation */
.flash-btn::before {
  content: "";
  position: absolute;
  top: -2px; left: -2px; right: -2px; bottom: -2px;
  border-radius: 50px;
  background: linear-gradient(90deg,rgb(200, 111, 33),rgb(63, 112, 84),rgb(66, 106, 83));
  z-index: -1;
  background-size: 200%;
  animation: glowing 3s linear infinite;
  opacity: 0;
  transition: opacity 0.3s ease-in-out;
}

.flash-btn:hover::before {
  opacity: 1;
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
    background: #ffffff;
    color: #333333;
    padding: 40px 30px 30px 30px;
    border-radius: 16px;
    max-width: 400px;
    width: 90%;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    text-align: center;
    font-family: 'Inter', 'Poppins', sans-serif; /* Clean modern font */
    transition: transform 0.3s ease, opacity 0.3s ease;
  }

  .popup-box h2 {
    margin-bottom: 12px;
    font-size: 24px;
    font-weight: 600;
    color: #2c3e50;
  }

  .popup-box p {
    font-size: 15px;
    line-height: 1.6;
    color: #555;
    margin-bottom: 28px;
  }

  /* Buttons Container */
  .popup-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    flex-wrap: wrap;
    margin-bottom: 10px;
  }

  /* Clean Login Button */
  .login-btn {
    background: #ffffff;
    border: 2px solid #2c3e50;
    color: #2c3e50;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    text-decoration: none; /* remove underline */
    transition: all 0.25s ease;
  }
  .login-btn:hover {
    background: #2c3e50;
    color: #fff;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
  }

  /* Clean Signup Button */
  .signup-btn {
    background: #2c3e50;
    color: #ffffff;
    border: none;
    padding: 12px 28px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 15px;
    text-decoration: none; /* remove underline */
    transition: all 0.25s ease;
  }
  .signup-btn:hover {
    background: #1a252f;
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0,0,0,0.1);
  }

  /* Clean Close Button */
  .close-btn {
    position: absolute;
    top: 12px;
    right: 12px;
    background: #f0f0f0;
    border: none;
    font-size: 18px;
    font-weight: bold;
    color: #555;
    cursor: pointer;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.25s ease;
    box-shadow: 0 2px 6px rgba(0,0,0,0.1);
  }
  .close-btn:hover {
    background: #2c3e50;
    color: #fff;
    transform: scale(1.1);
    box-shadow: 0 6px 12px rgba(0,0,0,0.15);
  }

  @media (max-width: 500px) {
    .popup-box {
      padding: 30px 20px 25px 20px;
    }
    .popup-buttons a {
      padding: 10px 22px;
      font-size: 14px;
    }
  }
.visit-nursery {
  background-color: #f9fafb;
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
  color: #222;
  font-weight: 700;
  margin-bottom: 10px;
}

.subtitle {
  color: #666;
  font-size: 1rem;
  margin-bottom: 25px;
}

.info-card {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0,0,0,0.06);
  padding: 25px;
}

.info-card h3 {
  font-size: 1.2rem;
  font-weight: 600;
  color: #222;
  margin-bottom: 10px;
}

.info-card hr {
  border: none;
  border-top: 1px solid #eee;
  margin: 10px 0 20px;
}

.info-item {
  display: flex;
  align-items: flex-start;
  gap: 12px;
  margin-bottom: 18px;
  color: #444;
}

.icon {
  font-size: 1.2rem;
  color: #2d6a4f;
  margin-top: 4px;
}

.direction-btn {
  display: inline-flex;
  align-items: center;
  gap: 8px;
  background-color: #2d6a4f;
  color: #fff;
  padding: 10px 18px;
  border-radius: 8px;
  text-decoration: none;
  font-weight: 500;
  margin-top: 10px;
  transition: background 0.3s;
}

.direction-btn:hover {
  background-color: #40916c;
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
  </style>
</head>
<body>
  <!-- Top Navbar -->
  <header>
    <div class="logo">NURSERY 🌿</div>
    <nav>
      <ul>
        <li><a href="#home">HOME</a></li>
        <li><a href="#about">ABOUT</a></li>
        <li><a href="#flash-sale">SALES</a></li>
        <li><a href="#blog">BLOG</a></li>
        <li><a href="#visit">VISIT</a></li>
        <li><a href="#team">PLANT</a></li>
        <li><a href="#customer-says">CONTACT</a></li>
      </ul>
    </nav>
    <div class="contact">
      <a href="{{ route('customer.register') }}">Sign up</a> |
      <a href="{{ route('customer.login') }}">Login</a>
    </div>
  </header>

  <!-- Hero Section -->
  <div class="hero" id="home">
    <div class="hero-content">
      <h1>YAH NURSERY AND LANDSCAPE SDN BHD</h1>
      <p>SHAH ALAM</p>
      <a href="#" class="btn" onclick="openPopup(event)">SHOP NOW</a>
    </div>
  </div>

  <!-- About Section -->
  <section id="about" style="background: linear-gradient(135deg,rgb(233, 230, 230),rgb(255, 255, 255));">
    <div class="section-flex">
      <div class="image">
        <img src="https://reklr.com/wp-content/uploads/2024/07/y2.jpg" alt="Yah Nursery">
      </div>
      <div class="divider"></div>
      <div class="text">
        <h2>About Yah Nursery</h2>
        <p>
          Yah Nursery and Landscape Sdn Bhd has been providing a wide variety of indoor and outdoor plants for over 20 years.
          Our mission is to educate customers, especially beginners, on proper plant care while offering high-quality products for homes and gardens.
          We specialize in unique offerings such as sunflowers from Cameron Highlands and special three-month flowering plants that require dedicated care.
        </p>
      </div>
    </div>
  </section>
<!-- 🌿 FLASH SALE SECTION -->
<section id="flash-sale">
  <div class="flash-overlay">
    <h2>Flash Sale: Up to 50% Off On Select Items!</h2>
    <p>Don’t miss out on our flash sale event! For a limited time, enjoy up to 50% off on a selection of our best-selling products.</p>
    <a href="#sales" class="flash-btn">Go get yours !</a>
  </div>
</section>
  
<!-- The section with the ID "blog" remains the same for navigation -->
<section id="blog">
    <p class="subtitle">ADVANTAGES</p>
    <h2>Why Choose Us</h2>
    
    <div class="services-container">
        <!-- Left Column -->
        <div class="service-column">
            <div class="service-item">
                <div class="service-icon">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/leaf.png" alt="Leaf icon">
                </div>
                <div class="service-content">
                    <h3>Expert Planting</h3>
                    <p>"We professionally handle every step of the planting process, so your new greenery can immediately begin to thrive in its new home."</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/full-moon.png" alt="Growth icon">
                </div>
                <div class="service-content">
                    <h3>Full Growth Support</h3>
                    <p>"From the first leaf to full bloom, we provide continuous monitoring and care to ensure your plants stay vibrant and healthy season after season."</p>
                </div>
            </div>
        </div>

        <!-- Central Circular Image -->
        <div class="central-image">
            <img src="https://reklr.com/wp-content/uploads/2024/07/y1.jpg" alt="A beautiful plant in a vase">
        </div>

        <!-- Right Column -->
        <div class="service-column">
            <div class="service-item">
                <div class="service-icon">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/water.png" alt="Watering can icon">
                </div>
                <div class="service-content">
                    <h3>Watering Guidance</h3>
                    <p>"Learn to provide the perfect amount of moisture for your plants with our expert guidance, ensuring they get exactly what they need to flourish."</p>
                </div>
            </div>
            <div class="service-item">
                <div class="service-icon">
                    <img src="https://img.icons8.com/ios-filled/50/ffffff/sprout.png" alt="Care icon">
                </div>
                <div class="service-content">
                    <h3>Personalized Care</h3>
                    <p>"Because every plant is unique, we create a specialized care plan tailored to your botanical collection's individual needs and environment."</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ===== Visit Our Nursery Section ===== -->
<section id="visit" class="visit-nursery">
  <div class="visit-container">
    <!-- Left: Contact Info -->
    <div class="contact-card">
      <h2>Visit Our Nursery</h2>
      <p class="subtitle">Come see our plants in person and get expert advice</p>

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
            (555) 123-4567
          </div>
        </div>

        <div class="info-item">
          <i class="fas fa-envelope icon"></i>
          <div>
            <strong>Email</strong><br>
            info@yahnursery.com
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

  <!-- Team Section (new, matches your requested visual) -->
  <section id="team">
    <h2>TOP DEALS</h2>
    <div class="heading-dots" aria-hidden="true">
      <span></span><span></span><span></span>
    </div>
    <p class="lead">We at Yah Nursery are proud to offer carefully designed landscapes crafted to suit our clients’ preferences while prioritizing sustainability.</p>

    <div class="team-wrap">
      <!-- left nav (outside) -->
      <button class="team-nav prev" id="teamPrev" aria-label="Previous team" onclick="teamPrev()">‹</button>

      <!-- slider viewport -->
      <div class="team-slider" id="teamSliderViewport">
        <div class="team-track" id="teamTrack">
          <!-- Replace these images with real team photos if you have them -->
          <div class="team-member">
            <img src="https://img.freepik.com/free-photo/ai-generated-sunflowers_23-2150681826.jpg?semt=ais_incoming&w=740&q=80" alt="Sunflower">
            <div class="team-info">
              <h3>Sunflower</h3>
            </div>
          </div>

          <div class="team-member">
            <img src="https://w0.peakpx.com/wallpaper/597/64/HD-wallpaper-plant-in-glass-vase-brown-flower-nature-petaled-vertical-white.jpg" alt="Bill Clarkson">
            <div class="team-info">
              <h3>Spiral Aloe</h3>
            </div>
          </div>

          <div class="team-member">
            <img src="https://hevagifts.com.my/cdn/shop/files/Soledat-white-calla-lilies-in-vase-delviery-malaysia_1600x.jpg?v=1741918024" alt="John Dwyne">
            <div class="team-info">
              <h3>Lillies flower</h3>
            </div>
          </div>

          <!-- extra members so sliding shows movement -->
          <div class="team-member">
            <img src="https://vintagerevivals.com/wp-content/uploads/2019/04/Everything-You-Need-to-Know-About-Snake-Plants-13.jpg" alt="Aisyah">
            <div class="team-info">
              <h3>Snake plants</h3>
            </div>
          </div>

          <div class="team-member">
            <img src="https://media.houseandgarden.co.uk/photos/64bff5f4d6a55acd0397054e/3:4/w_748%2Cc_limit/Screenshot%25202023-07-25%2520at%252017.17.10.png" alt="Mei Ling">
            <div class="team-info">
              <h3>Pothos</h3>
            </div>
          </div>

          <div class="team-member">
            <img src="https://glasswingshop.com/cdn/shop/products/8D2A2069.jpg?v=1595400475&width=533" alt="Mei Ling">
            <div class="team-info">
              <h3>Zamioculcas zamiifolia</h3>
            </div>
          </div>
        </div>
      </div>

      <!-- right nav (outside) -->
      <button class="team-nav next" id="teamNext" aria-label="Next team" onclick="teamNext()">›</button>
    </div>
  </section>

  <!-- What Customer Says Section -->
  <section id="customer-says">
    <h2>💬 What customer says ?</h2>
    <div style="width:250px;height:3px;background:#27ae60;margin:0 auto 30px;border-radius:2px;"></div>

    <div class="testimonials">
      <div class="testimonial">
        <p>"Beautiful plants and very helpful staff! My garden has never looked better."</p>
        <h4>- Aisyah</h4>
      </div>
      <div class="testimonial">
        <p>"I love their unique flowers from Cameron Highlands. Worth every visit!"</p>
        <h4>- Farid</h4>
      </div>
      <div class="testimonial">
        <p>"Great customer service and excellent quality. Highly recommended!"</p>
        <h4>- Mei Ling</h4>
      </div>
      <div class="testimonial">
        <p>"Affordable prices, healthy plants, and friendly advice every time I shop here."</p>
        <h4>- Kumar</h4>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer id="footer">
    <div class="footer-container">
      <div>
        <h3><i class="fa-solid fa-headset"></i> Contact Us</h3>
        <p><i class="fa-solid fa-user"></i> Mrs Nur Nabilah</p>
        <p><i class="fa-solid fa-phone"></i> 018-3824046</p>
        <p><i class="fa-solid fa-envelope"></i> yahNursery@gmail.com</p>
        <p><i class="fa-solid fa-clock"></i> Hours: 9.30am - 6.30pm</p>
      </div>
      <div>
        <h3><i class="fa-solid fa-map-location-dot"></i> Address</h3>
        <p>Kebun Bunga, Jalan Pangsun Tiga 27/12c,<br>
        Seksyen 27, Taman Bunga Negara,<br>
        40000 Shah Alam, Selangor</p>
      </div>
      <div>
        <h3><i class="fa-solid fa-user-shield"></i> Administrator</h3>
        <ul>
          <li><a href="{{ route('admin.login') }}"><i class="fa-solid fa-right-to-bracket"></i> Admin Login</a></li>
        </ul>
      </div>

      <div>
        <h3><i class="fa-solid fa-share-nodes"></i> Follow Us</h3>
        <div class="social-links">
          <ul>
            <li><a href="https://m.facebook.com/profile.php?id=128819877773025" target="_blank"><i class="fab fa-facebook"></i> Facebook</a></li>
            <li><a href="https://www.instagram.com/yahnursery_official/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="bottom-bar">🌱 Powered by Yah Nursery © 2025</div>
  </footer>

<div id="popupOverlay">
  <div class="popup-box">
    <button class="close-btn" onclick="closePopup()">×</button>
    <h2>Welcome to Yah Nursery!</h2>
    <p>Please <strong>log in</strong> or <strong>sign up</strong> to start shopping.</p>
    <div class="popup-buttons">
      <a href="{{ route('customer.login') }}" class="login-btn">Log In</a>
      <a href="{{ route('customer.register') }}" class="signup-btn">Sign Up</a>
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

</body>
</html>
