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

    @yield('content')

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