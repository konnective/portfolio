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
@include('frontend.new-store.products')
@include('frontend.new-store.news-letter')
@endsection