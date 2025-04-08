<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShopEase - Your One-Stop Shop</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom CSS */
        :root {
            --primary-color: #3a86ff;
            --secondary-color: #ff6b6b;
            --accent-color: #4ecdc4;
            --light-bg: #f8f9fa;
            --dark-bg: #212529;
        }
        
        /* Header styles */
        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color) !important;
        }
        
        .nav-link:hover {
            color: var(--primary-color) !important;
        }
        
        /* Hero section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://via.placeholder.com/1920x600');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 7rem 0;
        }
        
        .hero h1 {
            font-size: 3rem;
            font-weight: 700;
        }
        
        /* Featured products */
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            margin-bottom: 1.5rem;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .product-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .product-price {
            color: var(--secondary-color);
            font-weight: 700;
            font-size: 1.2rem;
        }
        
        /* Categories */
        .category-item {
            position: relative;
            overflow: hidden;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
        
        .category-item img {
            transition: transform 0.5s ease;
        }
        
        .category-item:hover img {
            transform: scale(1.05);
        }
        
        .category-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: rgba(0, 0, 0, 0.7);
            padding: 1rem;
            color: white;
        }
        
        /* Newsletter */
        .newsletter {
            background-color: var(--light-bg);
            padding: 3rem 0;
        }
        
        /* Footer */
        footer {
            background-color: var(--dark-bg);
            color: white;
            padding: 3rem 0 1rem;
        }
        
        .footer-links a {
            color: #ced4da;
            text-decoration: none;
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .social-icons a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
        }
        
        /* Badges */
        .badge-sale {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--secondary-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
        
        .badge-new {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: var(--accent-color);
            color: white;
            padding: 0.25rem 0.5rem;
            border-radius: 0.25rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="#">ShopEase</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Shop</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Categories
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Electronics</a></li>
                                <li><a class="dropdown-item" href="#">Clothing</a></li>
                                <li><a class="dropdown-item" href="#">Home & Kitchen</a></li>
                                <li><a class="dropdown-item" href="#">Beauty</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">All Categories</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contact</a>
                        </li>
                    </ul>
                    <form class="d-flex me-3">
                        <input class="form-control me-2" type="search" placeholder="Search products" aria-label="Search">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="d-flex">
                        <a href="#" class="btn btn-link text-dark">
                            <i class="fas fa-user"></i>
                        </a>
                        <a href="#" class="btn btn-link text-dark position-relative">
                            <i class="fas fa-heart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                2
                            </span>
                        </a>
                        <a href="#" class="btn btn-link text-dark position-relative">
                            <i class="fas fa-shopping-cart"></i>
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                3
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>
    </header>

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

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">ShopEase</h5>
                    <p>Your one-stop destination for all your shopping needs with the best prices and quality products.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-pinterest"></i></a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">Quick Links</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">Customer Service</h5>
                    <ul class="list-unstyled footer-links">
                        <li><a href="#">My Account</a></li>
                        <li><a href="#">Track Order</a></li>
                        <li><a href="#">Shipping Policy</a></li>
                        <li><a href="#">Returns & Exchanges</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
                    <h5 class="mb-3">Contact Us</h5>
                    <ul class="list-unstyled">
                        <li><i class="fas fa-map-marker-alt me-2"></i> 123 Main Street, City, Country</li>
                        <li><i class="fas fa-phone me-2"></i> +1 234 567 8900</li>
                        <li><i class="fas fa-envelope me-2"></i> info@shopease.com</li>
                    </ul>
                </div>
            </div>
            <hr class="my-4">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">&copy; 2025 ShopEase. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <img src="/api/placeholder/240/40" alt="Payment Methods" class="img-fluid">
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>