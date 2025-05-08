<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NORTH | Contemporary Fashion</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Helvetica Neue', Arial, sans-serif;
        }
        
        body {
            color: #333;
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        img {
            max-width: 100%;
        }
        
        /* Header Styles */
        header {
            background-color: white;
            position: sticky;
            top: 0;
            z-index: 100;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        
        .announcement-bar {
            background-color: #212121;
            color: white;
            text-align: center;
            padding: 8px 0;
            font-size: 0.9rem;
        }
        
        .header-main {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 5%;
        }
        
        .logo {
            font-size: 2rem;
            font-weight: 700;
            letter-spacing: 3px;
        }
        
        .nav-links {
            display: flex;
            list-style: none;
        }
        
        .nav-links li {
            margin: 0 15px;
            font-weight: 500;
        }
        
        .nav-links li:hover {
            text-decoration: underline;
        }
        
        .header-icons {
            display: flex;
            gap: 20px;
        }
        
        .header-icons a {
            position: relative;
        }
        
        .header-icons .icon {
            font-size: 1.2rem;
        }
        
        .cart-count {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #212121;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 0.7rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        /* Hero Section */
        .hero {
            height: 80vh;
            background-image: url("/api/placeholder/1920/1080");
            background-size: cover;
            background-position: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
        }
        
        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3);
            z-index: 1;
        }
        
        .hero-content {
            z-index: 2;
            padding: 0 20px;
        }
        
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 20px;
            letter-spacing: 2px;
        }
        
        .hero p {
            font-size: 1.2rem;
            margin-bottom: 30px;
            max-width: 600px;
        }
        
        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: white;
            color: #212121;
            font-weight: 600;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .cta-button:hover {
            background-color: #212121;
            color: white;
        }
        
        /* Collections Section */
        .collections {
            padding: 80px 5%;
        }
        
        .section-title {
            text-align: center;
            font-size: 2rem;
            margin-bottom: 50px;
            letter-spacing: 1px;
        }
        
        .collection-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .collection-card {
            position: relative;
            height: 400px;
            overflow: hidden;
        }
        
        .collection-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .collection-card:hover img {
            transform: scale(1.05);
        }
        
        .collection-info {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(255, 255, 255, 0.9);
            padding: 20px;
            text-align: center;
        }
        
        .collection-info h3 {
            margin-bottom: 10px;
            font-size: 1.3rem;
        }
        
        .shop-link {
            font-weight: 600;
            display: inline-block;
            position: relative;
        }
        
        .shop-link::after {
            content: "";
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #333;
            transform: scaleX(0);
            transition: transform 0.3s ease;
            transform-origin: right;
        }
        
        .shop-link:hover::after {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        /* Featured Products */
        .featured-products {
            padding: 80px 5%;
            background-color: #f9f9f9;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .product-card {
            background-color: white;
            transition: transform 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        .product-image {
            height: 300px;
            position: relative;
            overflow: hidden;
        }
        
        .product-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .hover-image {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
            transition: opacity 0.5s ease;
        }
        
        .product-card:hover .hover-image {
            opacity: 1;
        }
        
        .product-info {
            padding: 20px;
            text-align: center;
        }
        
        .product-title {
            margin-bottom: 10px;
            font-weight: 500;
        }
        
        .product-price {
            font-weight: 600;
        }
        
        /* Newsletter */
        .newsletter {
            padding: 100px 5%;
            text-align: center;
            background-color: #ebebeb;
        }
        
        .newsletter-content {
            max-width: 600px;
            margin: 0 auto;
        }
        
        .newsletter h2 {
            margin-bottom: 20px;
        }
        
        .newsletter p {
            margin-bottom: 30px;
        }
        
        .email-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .email-input {
            flex: 1;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-right: none;
        }
        
        .subscribe-btn {
            padding: 0 25px;
            background-color: #212121;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .subscribe-btn:hover {
            background-color: #333;
        }
        
        /* Instagram Feed */
        .instagram-feed {
            padding: 80px 5%;
        }
        
        .instagram-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 10px;
        }
        
        .instagram-item {
            height: 200px;
            position: relative;
            overflow: hidden;
        }
        
        .instagram-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        
        .instagram-item:hover img {
            transform: scale(1.1);
        }
        
        .instagram-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .instagram-item:hover .instagram-overlay {
            opacity: 1;
        }
        
        /* Footer */
        footer {
            background-color: #212121;
            color: white;
            padding: 80px 5% 40px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 40px;
            margin-bottom: 60px;
        }
        
        .footer-column h3 {
            margin-bottom: 20px;
            font-size: 1.2rem;
            position: relative;
            padding-bottom: 10px;
        }
        
        .footer-column h3::after {
            content: "";
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: white;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 10px;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 20px;
        }
        
        .social-icons a {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background-color: #444;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease;
        }
        
        .social-icons a:hover {
            background-color: #666;
        }
        
        .footer-bottom {
            border-top: 1px solid #444;
            padding-top: 30px;
            text-align: center;
            font-size: 0.9rem;
            color: #ccc;
        }
        
        .payment-methods {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .header-main {
                flex-direction: column;
                gap: 20px;
            }
            
            .nav-links {
                margin: 15px 0;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .email-form {
                flex-direction: column;
            }
            
            .email-input {
                border-right: 1px solid #ddd;
                border-bottom: none;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
   
    <!-- Header -->
    <header>
        <div class="announcement-bar">
            Free shipping on orders over $100 | Express delivery available
        </div>
        <div class="header-main">
            <a href="#" class="logo">NORTH</a>
            <ul class="nav-links">
                <li><a href="#">New In</a></li>
                <li><a href="#">Women</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Collections</a></li>
                <li><a href="#">Sale</a></li>
            </ul>
            <div class="header-icons">
                <a href="#" class="icon">
                    <span>🔍</span>
                </a>
                <a href="#" class="icon">
                    <span>👤</span>
                </a>
                <a href="#" class="icon">
                    <span>❤️</span>
                </a>
                <a href="#" class="icon">
                    <span>🛒</span>
                    <span class="cart-count">2</span>
                </a>
            </div>
        </div>
    </header>

    @yield('content')
   
    <!-- Footer -->
    <footer>
        <div class="footer-content">
            <div class="footer-column">
                <h3>SHOP</h3>
                <ul class="footer-links">
                    <li><a href="#">New In</a></li>
                    <li><a href="#">Women</a></li>
                    <li><a href="#">Men</a></li>
                    <li><a href="#">Collections</a></li>
                    <li><a href="#">Sale</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>HELP</h3>
                <ul class="footer-links">
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Size Guide</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>ABOUT</h3>
                <ul class="footer-links">
                    <li><a href="#">Our Story</a></li>
                    <li><a href="#">Sustainability</a></li>
                    <li><a href="#">Careers</a></li>
                    <li><a href="#">Press</a></li>
                    <li><a href="#">Blog</a></li>
                </ul>
            </div>
            <div class="footer-column">
                <h3>CONNECT</h3>
                <p>Follow us on social media for style inspiration and updates.</p>
                <div class="social-icons">
                    <a href="#" aria-label="Instagram">📷</a>
                    <a href="#" aria-label="Facebook">👍</a>
                    <a href="#" aria-label="Twitter">🐦</a>
                    <a href="#" aria-label="Pinterest">📌</a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2025 NORTH. All Rights Reserved.</p>
            <div class="payment-methods">
                <span>💳</span>
                <span>💳</span>
                <span>💳</span>
                <span>💳</span>
            </div>
        </div>
    </footer>
</body>
</html>