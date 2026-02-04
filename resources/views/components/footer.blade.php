<!-- ===== LOGO CAROUSEL + CLEAN FOOTER WITH STICKY BOTTOM BAR ===== -->
<style>
/* --- Logo Carousel --- */
.carousel-wrapper {
    width: 100%;
    overflow: hidden;
    padding: 80px 0;
    background: linear-gradient(135deg, #ffffffff, #ffffff);
    display: flex;
    align-items: center;
}

#logo-wrapper {
    display: flex;
    width: 200%;
    animation: marquee 15s linear infinite;
    gap: 3rem;
    align-items: center;
}

.logo-item {
    flex-shrink: 0;
    width: calc(100% / 5);
    display: flex;
    justify-content: center;
    align-items: center;
    transition: transform 0.3s ease;
}

.logo-item img {
    max-height: 100px;
    object-fit: contain;
    
    transition: filter 0.3s ease, transform 0.3s ease, box-shadow 0.3s ease;
}

.logo-item img:hover {
    filter: grayscale(0%);
    transform: scale(1.1);
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
}

@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

#logo-wrapper:hover { animation-play-state: paused; }

/* --- Footer Styles --- */
footer {
    width: 100%;
    background: linear-gradient(135deg, #10150c, #10150c);
    color: #ddd;
    font-family: 'Poppins', sans-serif;
    padding: 60px 20px 60px; /* extra bottom padding to avoid overlap with sticky bar */
    position: relative;
    

}

.footer-flex {
    display: flex;
    flex-wrap: wrap;
    gap: 40px;
    max-width: 1400px;
    margin: auto;
}

/* Left: Featured Project */
.footer-left {
    flex: 1 1 300px;
    min-width: 280px;
}

.footer-left img {
    width: 150px;
    height: 150px;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    margin-bottom: 15px;
}

.footer-left p {
    margin: 5px 0;
    color: #ddd;
    line-height: 1.5;
    font-size: 14px;
}

/* Right: Other sections */
.footer-right {
    flex: 2 1 600px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 30px;
}

/* Footer headings */
footer h3 {
    font-size: 16px;
    font-weight: 600;
    color: #BAC095;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
    text-shadow: 0 1px 2px rgba(0,0,0,0.3);
}

footer p, footer ul li {
    font-size: 14px;
    margin-bottom: 8px;
    line-height: 1.6;
}

footer ul {
    list-style: none;
    padding: 0;
}

footer ul li a {
    text-decoration: none;
    color: #ddd;
    display: flex;
    align-items: center;
    gap: 8px;
    transition: all 0.3s ease;
}

footer ul li a:hover {
    color: #76c38f;
    transform: translateX(3px);
}

.social-links a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    color: #ddd;
    margin-right: 10px;
    font-size: 18px;
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: #333;
    transition: all 0.3s ease;
}

.social-links a:hover {
    color: #fff;
    background: #76c38f;
    transform: scale(1.2);
}

.footer-quote {
    font-style: italic;
    color: #aaa;
    border-left: 3px solid #76c38f;
    padding-left: 10px;
    line-height: 1.5;
}

/* Sticky Bottom Bar */
.bottom-bar {
    position: fixed;       /* Fixes it to the viewport */
    bottom: 0;             /* Always at the bottom */
    left: 0;               /* Align to left edge */
    width: 100%;           /* Full width */
    background: #0a0a0a;
    color: #bbb;
    text-align: center;
    padding: 15px 0;
    font-size: 13px;
    border-top: 1px solid #333;
    z-index: 9999;         /* Ensure it’s on top of all content */
}


/* Responsive */
@media (max-width: 768px) {
    .footer-flex {
        flex-direction: column;
    }
    .footer-left img { width: 120px; height: 120px; margin-bottom: 10px; }
}
.bottom-bar-text span {
    font-style: italic;
    font-weight: 600;
}

.bottom-bar-text strong {
    font-weight: bold;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(20px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Optional hover sparkle effect */
.bottom-bar-text:hover {
    text-shadow: 0 0 10px #fff, 0 0 20px #76c38f, 0 0 30px #27ae60;
    transition: all 0.3s ease;
}
/* Make selected supplier logos bigger */
.logo-large img {
  max-height: 400px;   /* increase size */
  transform: scale(1.1);
}

/* Extra hover effect for big logos */
.logo-large img:hover {
  transform: scale(1.25);
}

</style>

<!-- ===== Logo Carousel ===== -->
<div class="carousel-wrapper">
    <div id="logo-wrapper">
<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier1.png') }}" alt="Client 1">
</div>

<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier2.png') }}" alt="Client 2">
</div>
<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier1.png') }}" alt="Client 3">
</div>

<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier2.png') }}" alt="Client 4">
</div>
<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier1.png') }}" alt="Client 5">
</div>
<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier2.png') }}" alt="Client 6">
</div>
<div class="logo-item logo-large">
  <img src="{{ asset('storage/image/supplier1.png') }}" alt="Client 7">
</div>
    </div>
</div>

<!-- ===== Footer ===== -->
<footer>
    <div class="footer-flex">
        <!-- Featured Project Left -->
        <div class="footer-left">
<img 
  src="{{ asset('storage/image/logoYah.png') }}" 
  alt="Featured Project"
  class="p-2 rounded-lg"
  style="background-color: #BAC095;"
>
            <p><strong>Yah Nursery & Landscape</strong></p>
            <p>Over 20 years of quality indoor & outdoor plants. </p>
            <p>Sunflowers, seasonal flowers, and expert gardening advice.</p>
        </div>

        <!-- Other Footer Sections Right -->
        <div class="footer-right">
            <div>
                <h3><i class="fa-solid fa-map-location-dot"></i> Address</h3>
                <p>Kebun Bunga, Jalan Pangsun Tiga 27/12c,<br>
                   Seksyen 27, Taman Bunga Negara,<br>
                   40000 Shah Alam, Selangor</p>
            </div>

            <div>
                <h3><i class="fa-solid fa-headset"></i> Contact Us</h3>
                <p><i class="fa-solid fa-user"></i> Mrs Nur Nabilah</p>
                <p><i class="fa-solid fa-phone"></i> 018-3824046</p>
                <p><i class="fa-solid fa-envelope"></i> yahNursery@gmail.com</p>
                <p><i class="fa-solid fa-clock"></i> 9.30am - 6.30pm</p>
            </div>

            <div>
                <h3><i class="fa-solid fa-link"></i> Quick Links</h3>
                <ul>
                    <li><a href="#"><i class="fa-solid fa-house"></i> Home</a></li>
                    <li><a href="#"><i class="fa-solid fa-leaf"></i> Shop Plants</a></li>
                    <li><a href="#"><i class="fa-solid fa-info-circle"></i> About Us</a></li>
                    <li><a href="#"><i class="fa-solid fa-envelope"></i> Contact</a></li>
                </ul>
            </div>

            <div>
                <h3><i class="fa-solid fa-share-nodes"></i> Social Media</h3>
                <div class="social-links">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                    <a href="#"><i class="fab fa-whatsapp"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div>
                <h3><i class="fa-solid fa-newspaper"></i> News</h3>
                <ul class="news-list">
                    <li><a href="#">10 Tips for Indoor Plants</a></li>
                    <li><a href="#">New Arrivals: Exotic Flowers</a></li>
                    <li><a href="#">Yah Nursery at Garden Expo 2025</a></li>
                </ul>
            </div>

            <div>
                <h3><i class="fa-solid fa-quote-left"></i> Quote</h3>
                <p class="footer-quote">
                    "Gardening adds years to your life and life to your years." 🌿
                </p>
            </div>

            <div>
                <h3><i class="fa-solid fa-user-shield"></i> Administrator</h3>
                <ul>
                    <li><a href="{{ route('admin.login') }}"><i class="fa-solid fa-right-to-bracket"></i> Admin Login</a></li>
                </ul>
            </div>
                <div class="bottom-bar-text"><span>Powered by <strong>Yah Nursery</strong></span> © 2025 </div>

        </div>
    </div>
   
</footer>
