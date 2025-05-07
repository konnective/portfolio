<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart | NORTH</title>
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
            background-color: #fafafa;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        img {
            max-width: 100%;
        }
        
        button {
            cursor: pointer;
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
        
        /* Page Title */
        .page-title {
            text-align: center;
            padding: 40px 0;
            background-color: white;
            border-bottom: 1px solid #eee;
        }
        
        .page-title h1 {
            font-size: 2.5rem;
            font-weight: 600;
            letter-spacing: 2px;
        }
        
        /* Main Content Layout */
        .cart-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 50px 20px;
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
        }
        
        /* Cart Items */
        .cart-items {
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        
        .cart-header {
            display: grid;
            grid-template-columns: 3fr 1fr 1fr 1fr;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
            font-weight: 600;
        }
        
        .cart-header-product {
            text-align: left;
        }
        
        .cart-header-quantity, .cart-header-price, .cart-header-subtotal {
            text-align: center;
        }
        
        .cart-item {
            display: grid;
            grid-template-columns: 3fr 1fr 1fr 1fr;
            padding: 25px 0;
            border-bottom: 1px solid #eee;
            align-items: center;
        }
        
        .cart-item-info {
            display: flex;
            align-items: center;
            gap: 20px;
        }
        
        .cart-item-image {
            width: 100px;
            height: 120px;
        }
        
        .cart-item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .cart-item-details h3 {
            margin-bottom: 5px;
            font-weight: 500;
        }
        
        .cart-item-variant {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 10px;
        }
        
        .cart-item-remove {
            color: #666;
            text-decoration: underline;
            font-size: 0.9rem;
            background: none;
            border: none;
            padding: 0;
            cursor: pointer;
            transition: color 0.3s ease;
        }
        
        .cart-item-remove:hover {
            color: #212121;
        }
        
        .cart-item-quantity {
            text-align: center;
        }
        
        .quantity-selector {
            display: inline-flex;
            align-items: center;
            border: 1px solid #ddd;
            border-radius: 3px;
        }
        
        .quantity-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: none;
            font-size: 1.2rem;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: background-color 0.3s ease;
        }
        
        .quantity-btn:hover {
            background-color: #f5f5f5;
        }
        
        .quantity-input {
            width: 40px;
            height: 32px;
            border: none;
            border-left: 1px solid #ddd;
            border-right: 1px solid #ddd;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .quantity-input::-webkit-inner-spin-button,
        .quantity-input::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
        
        .cart-item-price, .cart-item-subtotal {
            text-align: center;
            font-weight: 500;
        }
        
        .item-price-original {
            text-decoration: line-through;
            color: #999;
            font-size: 0.9rem;
            font-weight: normal;
            margin-bottom: 3px;
        }
        
        .item-price-discounted {
            color: #d9534f;
        }
        
        /* Empty Cart */
        .empty-cart {
            text-align: center;
            padding: 50px 0;
        }
        
        .empty-cart-icon {
            font-size: 4rem;
            margin-bottom: 20px;
            color: #ccc;
        }
        
        .empty-cart h2 {
            margin-bottom: 20px;
        }
        
        .empty-cart p {
            margin-bottom: 30px;
            color: #666;
        }
        
        .continue-shopping {
            display: inline-block;
            padding: 12px 25px;
            background-color: #212121;
            color: white;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        
        .continue-shopping:hover {
            background-color: #333;
        }
        
        /* Cart Actions */
        .cart-actions {
            display: flex;
            justify-content: space-between;
            padding-top: 30px;
        }
        
        .coupon-form {
            display: flex;
            gap: 10px;
        }
        
        .coupon-input {
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 3px;
            width: 200px;
        }
        
        .update-cart {
            padding: 12px 20px;
            background: none;
            border: 1px solid #212121;
            color: #212121;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .update-cart:hover {
            background-color: #212121;
            color: white;
        }
        
        .apply-coupon {
            padding: 12px 20px;
            background-color: #212121;
            color: white;
            border: none;
            font-weight: 500;
            transition: background-color 0.3s ease;
        }
        
        .apply-coupon:hover {
            background-color: #333;
        }
        
        /* Cart Summary */
        .cart-summary {
            background-color: white;
            border-radius: 4px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            padding: 30px;
            position: sticky;
            top: 100px;
        }
        
        .summary-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .summary-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }
        
        .summary-label {
            color: #666;
        }
        
        .summary-value {
            font-weight: 500;
        }
        
        .summary-discount {
            color: #d9534f;
        }
        
        .summary-total {
            font-size: 1.2rem;
            font-weight: 600;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .checkout-btn {
            display: block;
            width: 100%;
            padding: 15px;
            margin-top: 20px;
            background-color: #212121;
            color: white;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }
        
        .checkout-btn:hover {
            background-color: #333;
        }
        
        .checkout-btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        
        .payment-options {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 20px;
        }
        
        .payment-option {
            width: 40px;
            height: 25px;
            opacity: 0.7;
            transition: opacity 0.3s ease;
        }
        
        .payment-option:hover {
            opacity: 1;
        }
        
        /* Free Shipping Progress */
        .shipping-progress {
            background-color: #f5f5f5;
            padding: 20px;
            border-radius: 4px;
            margin-top: 30px;
        }
        
        .shipping-message {
            text-align: center;
            margin-bottom: 15px;
            font-weight: 500;
        }
        
        .progress-container {
            width: 100%;
            height: 8px;
            background-color: #ddd;
            border-radius: 4px;
            overflow: hidden;
            position: relative;
        }
        
        .progress-bar {
            height: 100%;
            background-color: #4caf50;
            position: absolute;
            top: 0;
            left: 0;
            transition: width 0.5s ease;
        }
        
        /* Recently Viewed */
        .recently-viewed {
            padding: 50px 5%;
            background-color: white;
        }
        
        .section-title {
            text-align: center;
            font-size: 1.8rem;
            margin-bottom: 30px;
        }
        
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
        }
        
        .product-card {
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
            padding: 15px;
            text-align: center;
        }
        
        .product-title {
            margin-bottom: 10px;
            font-weight: 500;
        }
        
        .product-price {
            font-weight: 600;
        }
        
        /* Footer */
        footer {
            background-color: #212121;
            color: white;
            padding: 80px 5% 40px;
            margin-top: 50px;
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
        @media (max-width: 992px) {
            .cart-container {
                grid-template-columns: 1fr;
            }
            
            .cart-summary {
                position: static;
            }
        }
        
        @media (max-width: 768px) {
            .header-main {
                flex-direction: column;
                gap: 20px;
            }
            
            .nav-links {
                margin: 15px 0;
            }
            
            .cart-header {
                display: none;
            }
            
            .cart-item {
                grid-template-columns: 1fr;
                gap: 15px;
                text-align: center;
            }
            
            .cart-item-info {
                flex-direction: column;
            }
            
            .cart-item-quantity, .cart-item-price, .cart-item-subtotal {
                text-align: center;
                padding: 10px 0;
                border-top: 1px solid #eee;
            }
            
            .cart-item-quantity::before, .cart-item-price::before, .cart-item-subtotal::before {
                content: attr(data-title);
                font-weight: 600;
                margin-right: 5px;
            }
            
            .cart-actions {
                flex-direction: column;
                gap: 15px;
            }
            
            .coupon-form {
                width: 100%;
            }
            
            .coupon-input {
                flex: 1;
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
                    <span class="cart-count">3</span>
                </a>
            </div>
        </div>
    </header>

    <!-- Page Title -->
    <div class="page-title">
        <h1>SHOPPING CART</h1>
    </div>

    <!-- Main Content -->
    <div class="cart-container">
        <!-- Cart Items Section -->
        <div class="cart-items">
            <div class="cart-header">
                <div class="cart-header-product">Product</div>
                <div class="cart-header-quantity">Quantity</div>
                <div class="cart-header-price">Price</div>
                <div class="cart-header-subtotal">Subtotal</div>
            </div>

            <!-- Cart Item 1 -->
            <div class="cart-item">
                <div class="cart-item-info">
                    <div class="cart-item-image">
                        <img src="/api/placeholder/200/240" alt="Organic Cotton Cardigan">
                    </div>
                    <div class="cart-item-details">
                        <h3>Organic Cotton Cardigan</h3>
                        <div class="cart-item-variant">Navy / M</div>
                        <button class="cart-item-remove">Remove</button>
                    </div>
                </div>
                <div class="cart-item-quantity" data-title="Quantity:">
                    <div class="quantity-selector">
                        <button class="quantity-btn">-</button>
                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                        <button class="quantity-btn">+</button>
                    </div>
                </div>
                <div class="cart-item-price" data-title="Price:">
                    $129.00
                </div>
                <div class="cart-item-subtotal" data-title="Subtotal:">
                    $129.00
                </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="cart-item">
                <div class="cart-item-info">
                    <div class="cart-item-image">
                        <img src="/api/placeholder/200/240" alt="Linen Blend Shirt">
                    </div>
                    <div class="cart-item-details">
                        <h3>Linen Blend Shirt</h3>
                        <div class="cart-item-variant">White / L</div>
                        <button class="cart-item-remove">Remove</button>
                    </div>
                </div>
                <div class="cart-item-quantity" data-title="Quantity:">
                    <div class="quantity-selector">
                        <button class="quantity-btn">-</button>
                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                        <button class="quantity-btn">+</button>
                    </div>
                </div>
                <div class="cart-item-price" data-title="Price:">
                    <div class="item-price-original">$89.00</div>
                    <div class="item-price-discounted">$69.00</div>
                </div>
                <div class="cart-item-subtotal" data-title="Subtotal:">
                    $69.00
                </div>
            </div>

            <!-- Cart Item 3 -->
            <div class="cart-item">
                <div class="cart-item-info">
                    <div class="cart-item-image">
                        <img src="/api/placeholder/200/240" alt="Leather Belt">
                    </div>
                    <div class="cart-item-details">
                        <h3>Leather Belt</h3>
                        <div class="cart-item-variant">Black / One Size</div>
                        <button class="cart-item-remove">Remove</button>
                    </div>
                </div>
                <div class="cart-item-quantity" data-title="Quantity:">
                    <div class="quantity-selector">
                        <button class="quantity-btn">-</button>
                        <input type="number" class="quantity-input" value="1" min="1" max="10">
                        <button class="quantity-btn">+</button>
                    </div>
                </div>
                <div class="cart-item-price" data-title="Price:">
                    $59.00
                </div>
                <div class="cart-item-subtotal" data-title="Subtotal:">
                    $59.00
                </div>
            </div>

            <!-- Cart Actions -->
            <div class="cart-actions">
                <div class="coupon-form">
                    <input type="text" class="coupon-input" placeholder="Coupon code">
                    <button class="apply-coupon">Apply Coupon</button>
                </div>
                <button class="update-cart">Update Cart</button>
            </div>
        </div>

        <!-- Cart Summary -->
        <div class="cart-summary">
            <h2 class="summary-title">Order Summary</h2>
            
            <div class="summary-row">
                <div class="summary-label">Subtotal</div>
                <div class="summary-value">$257.00</div>
            </div>
            
            <div class="summary-row">
                <div class="summary-label">Discount</div>
                <div class="summary-value summary-discount">-$20.00</div>
            </div>
            
            <div class="summary-row">
                <div class="summary-label">Shipping</div>
                <div class="summary-value">Free</div>
            </div>
            
            <div class="summary-row summary-total">
                <div class="summary-label">Total</div>
                <div class="summary-value">$237.00</div>
            </div>
            
            <button class="checkout-btn">Proceed to Checkout</button>
            
            <div class="payment-options">
                <span class="payment-option">💳</span>
                <span class="payment-option">💳</span>
                <span class="payment-option">💳</span>
                <span class="payment-option">💳</span>
            </div>
            
            <!-- Free Shipping Progress -->
            <div class="shipping-progress">
                <div class="shipping-message">
                    You've qualified for free shipping!
                </div>
                <div class="progress-container">
                    <div class="progress-bar" style="width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Empty Cart (hidden by default, show when cart is empty) -->
    <div class="cart-container" style="display: none;">
        <div class="cart-items">
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <h2>Your Cart is Empty</h2>
                <p>Looks like you haven't added anything to your cart yet.</p>
                <a href="#" class="continue-shopping">Continue Shopping</a>
            </div>
        </div>
    </div>

    <!-- Recently Viewed Products -->
    <div class="recently-viewed">
        <h2 class="section-title">RECENTLY VIEWED</h2>
        <div class="products-grid">
            <div class="product-card">
                <div class="product-image">
                    <img src="/api/placeholder/500/600" alt="Relaxed Fit Jeans">
                    <img src="/api/placeholder/500/600" alt="Relaxed Fit Jeans Alternate" class="hover-image">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Relaxed Fit Jeans</h3>
                    <p class="product-price">$129.00</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="/api/placeholder/500/600" alt="Cotton T-Shirt">
                    <img src="/api/placeholder/500/600" alt="Cotton T-Shirt Alternate" class="hover-image">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Cotton T-Shirt</h3>
                    <p class="product-price">$49.00</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="/api/placeholder/500/600" alt="Wool Blend Coat">
                    <img src="/api/placeholder/500/600" alt="Wool Blend Coat Alternate" class="hover-image">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Wool Blend Coat</h3>
                    <p class="product-price">$249.00</p>
                </div>
            </div>
            <div class="product-card">
                <div class="product-image">
                    <img src="/api/placeholder/500/600" alt="Canvas Sneakers">
                    <img src="/api/placeholder/500/600" alt="Canvas Sneakers Alternate" class="hover-image">
                </div>
                <div class="product-info">
                    <h3 class="product-title">Canvas Sneakers</h3>
                    <p class="product-price">$89.00</p>
                </div>
            </div>
        </div>
    </div>

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