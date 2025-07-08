@extends('frontend.store.partials.layout')
@section('content')
<style>
    button {
        cursor: pointer;
    }
     /* Breadcrumb */
    .breadcrumb {
        padding: 20px 5%;
        font-size: 0.9rem;
        color: #666;
        border-bottom: 1px solid #eee;
    }
    
    .breadcrumb a:hover {
        text-decoration: underline;
    }
    
    /* Product Section */
    .product-container {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
        padding: 50px 5%;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    /* Product Images */
    .product-images {
        display: grid;
        grid-template-columns: 100px 1fr;
        gap: 20px;
    }
    
    .image-thumbnails {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .thumbnail {
        width: 100px;
        height: 120px;
        cursor: pointer;
        border: 2px solid transparent;
        transition: border-color 0.3s ease;
    }
    
    .thumbnail img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    .thumbnail.active {
        border-color: #212121;
    }
    
    .main-image {
        height: 600px;
    }
    
    .main-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Product Info */
    .product-info h1 {
        font-size: 2rem;
        margin-bottom: 10px;
    }
    
    .product-price {
        font-size: 1.5rem;
        font-weight: 600;
        margin-bottom: 20px;
    }
    
    .product-rating {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }
    
    .stars {
        color: #f0c14b;
        margin-right: 10px;
    }
    
    .review-count {
        color: #666;
        text-decoration: underline;
        cursor: pointer;
    }
    
    .product-description {
        margin-bottom: 30px;
    }
    
    /* Color Options */
    .color-options {
        margin-bottom: 30px;
    }
    
    .option-title {
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .colors {
        display: flex;
        gap: 10px;
    }
    
    .color-option {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        cursor: pointer;
        transition: transform 0.3s ease;
        position: relative;
    }
    
    .color-option:hover {
        transform: scale(1.1);
    }
    
    .color-option.selected {
        box-shadow: 0 0 0 2px white, 0 0 0 3px #212121;
    }
    
    .navy {
        background-color: #0a2342;
    }
    
    .black {
        background-color: #212121;
    }
    
    .beige {
        background-color: #d8c3a5;
    }
    
    .olive {
        background-color: #61892f;
    }
    
    /* Size Options */
    .size-options {
        margin-bottom: 30px;
    }
    
    .sizes {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }
    
    .size-option {
        min-width: 50px;
        padding: 10px;
        text-align: center;
        border: 1px solid #ddd;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    
    .size-option:hover {
        border-color: #212121;
    }
    
    .size-option.selected {
        background-color: #212121;
        color: white;
        border-color: #212121;
    }
    
    .size-option.out-of-stock {
        color: #999;
        cursor: not-allowed;
        position: relative;
    }
    
    .size-option.out-of-stock::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        height: 1px;
        background-color: #999;
        transform: rotate(-10deg);
    }
    
    .size-guide {
        margin-top: 10px;
        color: #666;
        text-decoration: underline;
        cursor: pointer;
        display: inline-block;
    }
    
    /* Quantity Selector */
    .quantity-selector {
        display: flex;
        align-items: center;
        margin-bottom: 30px;
    }
    
    .quantity-btn {
        width: 40px;
        height: 40px;
        border: 1px solid #ddd;
        background: white;
        font-size: 1.2rem;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .quantity-input {
        width: 60px;
        height: 40px;
        border: 1px solid #ddd;
        border-left: none;
        border-right: none;
        text-align: center;
        font-size: 1rem;
    }
    
    .quantity-input::-webkit-inner-spin-button,
    .quantity-input::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    /* Add to Cart and Wishlist */
    .product-actions {
        display: flex;
        gap: 15px;
        margin-bottom: 30px;
    }
    
    .add-to-cart {
        flex: 1;
        padding: 15px;
        background-color: #212121;
        color: white;
        border: none;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    
    .add-to-cart:hover {
        background-color: #333;
    }
    
    .add-to-wishlist {
        width: 50px;
        height: 50px;
        border: 1px solid #ddd;
        background: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 1.5rem;
        transition: background-color 0.3s ease;
    }
    
    .add-to-wishlist:hover {
        background-color: #f5f5f5;
    }
    
    /* Product Details */
    .product-details {
        margin-bottom: 30px;
    }
    
    .detail-item {
        display: flex;
        margin-bottom: 10px;
    }
    
    .detail-label {
        width: 120px;
        font-weight: 600;
    }
    
    /* Shipping Info */
    .shipping-info {
        display: flex;
        gap: 20px;
        margin-bottom: 30px;
    }
    
    .shipping-item {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .shipping-icon {
        font-size: 1.5rem;
    }
    
    /* Share */
    .share-product {
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .share-label {
        font-weight: 600;
    }
    
    .share-icons {
        display: flex;
        gap: 10px;
    }
    
    .share-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background-color: #f5f5f5;
        display: flex;
        justify-content: center;
        align-items: center;
        transition: background-color 0.3s ease;
    }
    
    .share-icon:hover {
        background-color: #ddd;
    }
    
    /* Tabs */
    .product-tabs {
        padding: 50px 5%;
        max-width: 1400px;
        margin: 0 auto;
    }
    
    .tabs-header {
        display: flex;
        border-bottom: 1px solid #ddd;
        margin-bottom: 30px;
    }
    
    .tab-button {
        padding: 15px 30px;
        background: none;
        border: none;
        font-size: 1rem;
        font-weight: 600;
        position: relative;
        transition: color 0.3s ease;
    }
    
    .tab-button:hover {
        color: #666;
    }
    
    .tab-button.active {
        color: #212121;
    }
    
    .tab-button.active::after {
        content: "";
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 3px;
        background-color: #212121;
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
    }
    
    /* Description Tab */
    .description-content {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 50px;
    }
    
    .description-text p {
        margin-bottom: 20px;
    }
    
    .description-image {
        height: 400px;
    }
    
    .description-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    
    /* Size Guide Tab */
    .size-table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 30px;
    }
    
    .size-table th, .size-table td {
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    
    .size-table th {
        background-color: #f5f5f5;
        font-weight: 600;
    }
    
    .size-note {
        color: #666;
        margin-top: 20px;
    }
    
    /* Reviews Tab */
    .reviews-summary {
        display: flex;
        gap: 50px;
        margin-bottom: 40px;
    }
    
    .average-rating {
        text-align: center;
    }
    
    .rating-number {
        font-size: 3rem;
        font-weight: 600;
        margin-bottom: 10px;
    }
    
    .rating-stars {
        font-size: 1.5rem;
        color: #f0c14b;
        margin-bottom: 10px;
    }
    
    .total-reviews {
        color: #666;
    }
    
    .rating-breakdown {
        flex: 1;
    }
    
    .rating-bar {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }
    
    .rating-label {
        width: 30px;
    }
    
    .rating-progress {
        flex: 1;
        height: 8px;
        background-color: #eee;
        margin: 0 10px;
        position: relative;
    }
    
    .rating-progress-fill {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        background-color: #f0c14b;
    }
    
    .rating-count {
        width: 30px;
        text-align: right;
        color: #666;
    }
    
    .review-list {
        margin-top: 40px;
    }
    
    .review-item {
        padding: 20px 0;
        border-bottom: 1px solid #eee;
    }
    
    .review-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    .reviewer-name {
        font-weight: 600;
    }
    
    .review-date {
        color: #666;
    }
    
    .review-rating {
        color: #f0c14b;
        margin-bottom: 10px;
    }
    
    .verified-badge {
        display: inline-block;
        background-color: #e5f3ea;
        color: #267d4e;
        padding: 3px 8px;
        font-size: 0.8rem;
        border-radius: 3px;
        margin-left: 10px;
    }
    
    .write-review {
        display: inline-block;
        margin-top: 30px;
        padding: 12px 25px;
        background-color: #212121;
        color: white;
        font-weight: 600;
        transition: background-color 0.3s ease;
    }
    
    .write-review:hover {
        background-color: #333;
    }
    
    /* Related Products */
    .related-products {
        padding: 50px 5%;
        background-color: #f9f9f9;
    }
    
    .section-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 40px;
    }
    
    .products-slider {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
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
        height: 350px;
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
    
    .product-badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #212121;
        color: white;
        padding: 5px 10px;
        font-size: 0.8rem;
    }
    
    .product-info {
        padding: 20px;
    }
    
    .product-title {
        margin-bottom: 10px;
        font-weight: 500;
    }
    
    .product-price {
        font-weight: 600;
    }
    
    .product-colors {
        display: flex;
        gap: 5px;
        margin-top: 10px;
    }
    
    .color-dot {
        width: 15px;
        height: 15px;
        border-radius: 50%;
        border: 1px solid #ddd;
    }
    
    /* Recently Viewed */
    .recently-viewed {
        padding: 50px 5%;
    }
    @media (max-width: 992px) {
        .product-container {
            grid-template-columns: 1fr;
        }
        
        .description-content {
            grid-template-columns: 1fr;
        }
    }
    
    @media (max-width: 768px) {
        .product-images {
            grid-template-columns: 1fr;
        }
        
        .image-thumbnails {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            order: 2;
        }
        
        .thumbnail {
            width: 100%;
            height: auto;
            aspect-ratio: 1/1;
        }
        
        .main-image {
            height: auto;
            aspect-ratio: 3/4;
            order: 1;
        }
        
        .product-actions {
            flex-direction: column;
        }
        
        .reviews-summary {
            flex-direction: column;
            gap: 30px;
        }
    }
</style>
<div class="breadcrumb">
    <a href="#">Home</a> / <a href="#">Women</a> / <a href="#">Knitwear</a> / Organic Cotton Cardigan
</div>

    <!-- Product Section -->
<div class="product-container">
    <!-- Product Images -->
    <div class="product-images">
        <div class="image-thumbnails">
            <div class="thumbnail active">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=300&fit=crop"
                data-full="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=960&h=800&fit=crop" 
                alt="Organic Cotton Cardigan Thumbnail 1">
            </div>
            <div class="thumbnail">
                <img src="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=400&h=300&fit=crop"
                data-full="https://images.unsplash.com/photo-1549298916-b41d501d3772?w=960&h=800&fit=crop" 
                class="thumnail-img"
                alt="Organic Cotton Cardigan Thumbnail 2">
            </div>
            <div class="thumbnail">
                <img src="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=400&h=300&fit=crop"
                data-full="https://images.unsplash.com/photo-1614252369475-531eba835eb1?w=960&h=800&fit=crop"
                class="thumnail-img"
                alt="Organic Cotton Cardigan Thumbnail 3">
            </div>
            <div class="thumbnail">
                <img src="https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=400&h=300&fit=crop"
                data-full="https://images.unsplash.com/photo-1560769629-975ec94e6a86?w=960&h=800&fit=crop"
                class="thumnail-img"
                alt="Organic Cotton Cardigan Thumbnail 4">
            </div>
        </div>
        <div class="main-image">
            <img id="mainImage" src="https://images.unsplash.com/photo-1582897085656-c636d006a246?w=960&h=800&fit=crop" alt="Organic Cotton Cardigan">
        </div>
    </div>

    <!-- Product Info -->
    <div class="product-info">
        <h1>Organic Cotton Cardigan</h1>
        <div class="product-price">$129.00</div>
        <div class="product-rating">
            <div class="stars">★★★★★</div>
            <div class="review-count">36 Reviews</div>
        </div>
        <div class="product-description">
            <p>Our bestselling cardigan crafted from 100% organic cotton. This versatile piece features a relaxed fit with a button-up front, perfect for layering throughout the seasons. The soft, breathable fabric ensures all-day comfort while maintaining its shape wear after wear.</p>
        </div>

        <!-- Color Options -->
        <div class="color-options">
            <div class="option-title">Color: Navy</div>
            <div class="colors">
                <div class="color-option navy selected"></div>
                <div class="color-option black"></div>
                <div class="color-option beige"></div>
                <div class="color-option olive"></div>
            </div>
        </div>

        <!-- Size Options -->
        <div class="size-options">
            <div class="option-title">Size: M</div>
            <div class="sizes">
                <div class="size-option">XS</div>
                <div class="size-option">S</div>
                <div class="size-option selected">M</div>
                <div class="size-option">L</div>
                <div class="size-option out-of-stock">XL</div>
            </div>
            <a href="#" class="size-guide">Size Guide</a>
        </div>

        <!-- Quantity Selector -->
        <div class="quantity-selector">
            <button class="quantity-btn">-</button>
            <input type="number" class="quantity-input" value="1" min="1" max="10">
            <button class="quantity-btn">+</button>
        </div>

        <!-- Product Actions -->
        <div class="product-actions">
            <button class="add-to-cart">ADD TO CART</button>
            <button class="add-to-wishlist">❤️</button>
        </div>

        <!-- Product Details -->
        <div class="product-details">
            <div class="detail-item">
                <div class="detail-label">Material:</div>
                <div class="detail-value">100% Organic Cotton</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Style:</div>
                <div class="detail-value">Button-up Cardigan</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">Fit:</div>
                <div class="detail-value">Regular Fit</div>
            </div>
            <div class="detail-item">
                <div class="detail-label">SKU:</div>
                <div class="detail-value">CAR-ORG-2025-NVY</div>
            </div>
        </div>

        <!-- Shipping Info -->
        <div class="shipping-info">
            <div class="shipping-item">
                <div class="shipping-icon">🚚</div>
                <div class="shipping-text">Free Shipping</div>
            </div>
            <div class="shipping-item">
                <div class="shipping-icon">🔄</div>
                <div class="shipping-text">30-Day Returns</div>
            </div>
        </div>

        <!-- Share -->
        <div class="share-product">
            <div class="share-label">Share:</div>
            <div class="share-icons">
                <a href="#" class="share-icon">📷</a>
                <a href="#" class="share-icon">👍</a>
                <a href="#" class="share-icon">🐦</a>
                <a href="#" class="share-icon">📌</a>
            </div>
        </div>
    </div>
</div>

<!-- Product Tabs -->
<div class="product-tabs">
    <div class="tabs-header">
        <button class="tab-button active" data-tab="description">Description</button>
        <button class="tab-button" data-tab="size-guide">Size Guide</button>
        <button class="tab-button" data-tab="reviews">Reviews (36)</button>
        <button class="tab-button" data-tab="shipping">Shipping & Returns</button>
    </div>

    <!-- Description Tab -->
    <div class="tab-content active" id="description">
        <div class="description-content">
            <div class="description-text">
                <p>Our Organic Cotton Cardigan is the perfect addition to any wardrobe. Made from premium 100% organic cotton, this cardigan offers exceptional softness and breathability while being kind to the environment.</p>
                
                <p>The relaxed fit and classic button-up front design make it easy to layer over any outfit. Features include ribbed cuffs and hem for added durability, two front patch pockets, and a V-neckline that flatters all body types.</p>
                
                <p>This versatile piece transitions effortlessly from season to season, making it a true wardrobe staple. The fine-gauge knit provides just the right amount of warmth without bulk, ideal for year-round wear.</p>
                
                <p>Our organic cotton is GOTS certified, ensuring the highest standards of environmental and social responsibility throughout the production process.</p>
                
                <p><strong>Features:</strong></p>
                <ul>
                    <li>100% GOTS certified organic cotton</li>
                    <li>Button-up front</li>
                    <li>Two front patch pockets</li>
                    <li>Ribbed cuffs and hem</li>
                    <li>V-neckline</li>
                    <li>Regular fit</li>
                    <li>Machine washable</li>
                </ul>
            </div>
            <div class="description-image">
                <img src="/api/placeholder/700/900" alt="Organic Cotton Cardigan - Lifestyle Image">
            </div>
        </div>
    </div>
</div>
@include('frontend.store.products')
@include('frontend.store.news-letter')
@endsection
<script>

    $('.thumbnail img').click(function() {
        $('.thumbnail').removeClass('active');
        $(this).closest('.thumbnail').addClass('active');

        var fullImageUrl = $(this).data('full');
        
        $('#mainImage').fadeOut(200, function() {
        $(this).attr('src', fullImageUrl).fadeIn(200);
        });
    });

    $('.main-image').hover(
        function() {
            $(this).find('#mainImage').css('transform', 'scale(1.05)');
        },
        function() {
            $(this).find('#mainImage').css('transform', 'scale(1)');
        }
    );

</script>