@extends('frontend.new-store.template')
@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-content">
        <h1>SUMMER COLLECTION 2025</h1>
        <p>Discover timeless essentials designed for modern living. Sustainable fashion that lasts beyond seasons.</p>
        <a href="#" class="cta-button">SHOP NOW</a>
    </div>
</section>

<!-- Collections Section -->
<section class="collections">
    <h2 class="section-title">OUR COLLECTIONS</h2>
    <div class="collection-grid">
        <div class="collection-card">
            <img src="/api/placeholder/600/800" alt="Women's Collection">
            <div class="collection-info">
                <h3>Women's Collection</h3>
                <a href="#" class="shop-link">SHOP NOW</a>
            </div>
        </div>
        <div class="collection-card">
            <img src="/api/placeholder/600/800" alt="Men's Collection">
            <div class="collection-info">
                <h3>Men's Collection</h3>
                <a href="#" class="shop-link">SHOP NOW</a>
            </div>
        </div>
        <div class="collection-card">
            <img src="/api/placeholder/600/800" alt="Accessories">
            <div class="collection-info">
                <h3>Accessories</h3>
                <a href="#" class="shop-link">SHOP NOW</a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Products -->
<section class="featured-products">
    <h2 class="section-title">FEATURED PRODUCTS</h2>
    <div class="products-grid">
        <div class="product-card">
            <div class="product-image">
                <img src="/api/placeholder/500/600" alt="Organic Cotton T-Shirt">
                <img src="/api/placeholder/500/600" alt="Organic Cotton T-Shirt Alternate" class="hover-image">
            </div>
            <div class="product-info">
                <h3 class="product-title">Organic Cotton T-Shirt</h3>
                <p class="product-price">$49.00</p>
            </div>
        </div>
        <div class="product-card">
            <div class="product-image">
                <img src="/api/placeholder/500/600" alt="Linen Blend Shirt">
                <img src="/api/placeholder/500/600" alt="Linen Blend Shirt Alternate" class="hover-image">
            </div>
            <div class="product-info">
                <h3 class="product-title">Linen Blend Shirt</h3>
                <p class="product-price">$89.00</p>
            </div>
        </div>
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
                <img src="/api/placeholder/500/600" alt="Merino Wool Sweater">
                <img src="/api/placeholder/500/600" alt="Merino Wool Sweater Alternate" class="hover-image">
            </div>
            <div class="product-info">
                <h3 class="product-title">Merino Wool Sweater</h3>
                <p class="product-price">$149.00</p>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter -->
<section class="newsletter">
    <div class="newsletter-content">
        <h2>JOIN OUR NEWSLETTER</h2>
        <p>Sign up for our newsletter and receive 10% off your first order. Stay updated with new arrivals and exclusive offers.</p>
        <form class="email-form">
            <input type="email" class="email-input" placeholder="Your email address" required>
            <button type="submit" class="subscribe-btn">SUBSCRIBE</button>
        </form>
    </div>
</section>

<!-- Instagram Feed -->
<section class="instagram-feed">
    <h2 class="section-title">FOLLOW US @NORTHCLOTHING</h2>
    <div class="instagram-grid">
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 243</span>
            </div>
        </div>
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 187</span>
            </div>
        </div>
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 319</span>
            </div>
        </div>
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 276</span>
            </div>
        </div>
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 152</span>
            </div>
        </div>
        <div class="instagram-item">
            <img src="/api/placeholder/400/400" alt="Instagram Post">
            <div class="instagram-overlay">
                <span>❤️ 208</span>
            </div>
        </div>
    </div>
</section>
@endsection