@extends('frontend.partials.layout')
@section('content')
    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1>Spring Collection 2025</h1>
                    <p class="lead mb-4">Discover our latest products with amazing discounts</p>
                    <a href="#" class="btn btn-primary btn-lg">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="py-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-md-8">
                    <h2>Featured Products</h2>
                </div>
                <div class="col-md-4 text-end">
                    <a href="#" class="btn btn-link text-dark">View All <i class="fas fa-arrow-right"></i></a>
                </div>
            </div>
            <div class="row">
                <!-- Product 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card product-card">
                        <div class="position-relative">
                            <img src="/api/placeholder/300/300" class="card-img-top" alt="Product 1">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="card-body">
                            <h5 class="product-title">Wireless Earbuds</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">$99.99</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card product-card">
                        <div class="position-relative">
                            <img src="/api/placeholder/300/300" class="card-img-top" alt="Product 2">
                            <span class="badge-sale">Sale</span>
                        </div>
                        <div class="card-body">
                            <h5 class="product-title">Smart Watch</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <span class="product-price">$129.99</span>
                                    <span class="text-decoration-line-through text-muted ms-2">$159.99</span>
                                </div>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card product-card">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Product 3">
                        <div class="card-body">
                            <h5 class="product-title">Portable Charger</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">$49.99</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product 4 -->
                <div class="col-md-3 col-sm-6">
                    <div class="card product-card">
                        <div class="position-relative">
                            <img src="/api/placeholder/300/300" class="card-img-top" alt="Product 4">
                            <span class="badge-new">New</span>
                        </div>
                        <div class="card-body">
                            <h5 class="product-title">Bluetooth Speaker</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="product-price">$79.99</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-shopping-cart"></i> Add
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Banner -->
    <section class="py-4 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Limited Time Offer</h3>
                    <p class="lead mb-0">Get 20% off on all products with code: SPRING25</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <a href="#" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="py-5">
        <div class="container">
            <h2 class="mb-4">Shop by Category</h2>
            <div class="row">
                <!-- Category 1 -->
                <div class="col-md-4">
                    <div class="category-item">
                        <img src="/api/placeholder/400/300" class="img-fluid w-100" alt="Electronics">
                        <div class="category-overlay">
                            <h4 class="mb-0">Electronics</h4>
                            <a href="#" class="text-white">Shop Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Category 2 -->
                <div class="col-md-4">
                    <div class="category-item">
                        <img src="/api/placeholder/400/300" class="img-fluid w-100" alt="Clothing">
                        <div class="category-overlay">
                            <h4 class="mb-0">Clothing</h4>
                            <a href="#" class="text-white">Shop Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- Category 3 -->
                <div class="col-md-4">
                    <div class="category-item">
                        <img src="/api/placeholder/400/300" class="img-fluid w-100" alt="Home & Kitchen">
                        <div class="category-overlay">
                            <h4 class="mb-0">Home & Kitchen</h4>
                            <a href="#" class="text-white">Shop Now <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-3">
                        <i class="fas fa-truck fa-3x text-primary mb-3"></i>
                        <h5>Free Shipping</h5>
                        <p class="mb-0">On orders over $50</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-3">
                        <i class="fas fa-undo fa-3x text-primary mb-3"></i>
                        <h5>Easy Returns</h5>
                        <p class="mb-0">30 day return policy</p>
                    </div>
                </div>
                <div class="col-md-3 mb-4 mb-md-0">
                    <div class="p-3">
                        <i class="fas fa-lock fa-3x text-primary mb-3"></i>
                        <h5>Secure Payment</h5>
                        <p class="mb-0">100% secure checkout</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="p-3">
                        <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                        <h5>24/7 Support</h5>
                        <p class="mb-0">Dedicated support</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter -->
    <section class="newsletter">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 text-center">
                    <h3>Subscribe to Our Newsletter</h3>
                    <p class="mb-4">Get updates on new products and exclusive offers</p>
                    <form class="row g-3 justify-content-center">
                        <div class="col-md-8">
                            <input type="email" class="form-control form-control-lg" placeholder="Your email address">
                        </div>
                        <div class="col-md-auto">
                            <button type="submit" class="btn btn-primary btn-lg">Subscribe</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
