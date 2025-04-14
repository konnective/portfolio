<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - ShopEase</title>
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
        
        /* Cart styles */
        .cart-item {
            border-bottom: 1px solid #dee2e6;
            padding: 1.5rem 0;
        }
        
        .cart-item:last-child {
            border-bottom: none;
        }
        
        .cart-item-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
        
        .cart-item-title {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        
        .cart-item-price {
            color: var(--secondary-color);
            font-weight: 700;
        }
        
        .cart-item-original-price {
            text-decoration: line-through;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .product-badge {
            background-color: var(--accent-color);
            color: white;
            font-size: 0.75rem;
            padding: 0.2rem 0.5rem;
            border-radius: 0.25rem;
            display: inline-block;
        }
        
        .quantity-selector {
            display: flex;
            align-items: center;
            width: 120px;
        }
        
        .quantity-selector input {
            text-align: center;
            border-left: 0;
            border-right: 0;
            width: 40px;
        }
        
        .quantity-selector button {
            border-color: #ced4da;
            background-color: #fff;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }
        
        .cart-summary {
            background-color: var(--light-bg);
            border-radius: 0.5rem;
            padding: 1.5rem;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.75rem;
        }
        
        .summary-total {
            font-weight: 700;
            font-size: 1.2rem;
            border-top: 1px solid #dee2e6;
            padding-top: 0.75rem;
            margin-top: 0.75rem;
        }
        
        .promo-code {
            margin-top: 1rem;
            margin-bottom: 1rem;
        }
        
        .save-for-later {
            color: var(--primary-color);
            text-decoration: none;
            margin-right: 1rem;
        }
        
        .save-for-later:hover {
            text-decoration: underline;
        }
        
        .remove-item {
            color: #6c757d;
            text-decoration: none;
        }
        
        .remove-item:hover {
            color: var(--secondary-color);
            text-decoration: underline;
        }
        
        /* Suggested items */
        .suggested-item-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .suggested-item-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
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
        
        /* Progress bar */
        .shipping-progress {
            height: 8px;
        }
        
        /* Payment methods */
        .payment-method {
            display: inline-block;
            margin-right: 0.5rem;
            margin-bottom: 0.5rem;
        }

        /* Mobile responsive improvements */
        @media (max-width: 767px) {
            .cart-item {
                padding: 1rem 0;
            }
            
            .cart-item-image {
                width: 80px;
                height: 80px;
            }
            
            .quantity-selector {
                width: 100px;
            }
            
            .checkout-security {
                margin-top: 1rem;
            }
        }

        /* Added features */
        .checkout-security {
            display: flex;
            align-items: center;
            margin-top: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid rgba(0,0,0,0.1);
        }

        .checkout-security i {
            color: var(--primary-color);
            font-size: 1.2rem;
            margin-right: 0.5rem;
        }

        .checkout-steps {
            margin-bottom: 2rem;
        }

        .step {
            text-align: center;
            position: relative;
        }

        .step-number {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            background-color: #dee2e6;
            color: #6c757d;
            margin-bottom: 0.5rem;
        }

        .step.active .step-number {
            background-color: var(--primary-color);
            color: white;
        }

        .step-line {
            position: absolute;
            top: 1rem;
            left: 50%;
            width: 100%;
            height: 2px;
            background-color: #dee2e6;
            transform: translateY(-50%);
            z-index: -1;
        }

        .step:first-child .step-line {
            display: none;
        }

        .recently-viewed {
            margin-top: 2rem;
        }

        .tooltip-inner {
            max-width: 200px;
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
                            <a class="nav-link" href="#">Home</a>
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

    <!-- Breadcrumb -->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
            </ol>
        </nav>
    </div>

    <!-- Checkout Steps -->
    <section class="container checkout-steps d-none d-md-block">
        <div class="row">
            <div class="col-md-3 step active">
                <div class="step-line"></div>
                <div class="step-number">1</div>
                <div class="step-title">Shopping Cart</div>
            </div>
            <div class="col-md-3 step">
                <div class="step-line"></div>
                <div class="step-number">2</div>
                <div class="step-title">Shipping</div>
            </div>
            <div class="col-md-3 step">
                <div class="step-line"></div>
                <div class="step-number">3</div>
                <div class="step-title">Payment</div>
            </div>
            <div class="col-md-3 step">
                <div class="step-line"></div>
                <div class="step-number">4</div>
                <div class="step-title">Confirmation</div>
            </div>
        </div>
    </section>

    <!-- Cart Section -->
    <section class="py-5">
        <div class="container">
            <h1 class="mb-4">Shopping Cart (3 items)</h1>
            
            <div class="row">
                <!-- Cart Items -->
                <div class="col-lg-8">
                    <!-- Free shipping progress -->
                    <div class="mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span>Spend $20 more to qualify for FREE shipping!</span>
                            <span>$80 / $100</span>
                        </div>
                        <div class="progress shipping-progress">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <!-- Cart Item 1 -->
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded" alt="Wireless Earbuds">
                            </div>
                            <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                                <h5 class="cart-item-title">Premium Wireless Earbuds</h5>
                                <span class="product-badge">New</span>
                                <div class="mt-2">
                                    <small class="text-muted">Color: Black</small>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="cart-item-price">$99.99</div>
                                <div class="cart-item-original-price">$129.99</div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="quantity-selector">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control form-control-sm" value="1" readonly>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-end">
                                <div class="cart-item-price mb-2">$99.99</div>
                                <div>
                                    <a href="#" class="save-for-later"><small>Save for later</small></a>
                                    <a href="#" class="remove-item"><small>Remove</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cart Item 2 -->
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded" alt="Smart Watch">
                            </div>
                            <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                                <h5 class="cart-item-title">Smart Watch</h5>
                                <span class="product-badge bg-danger">Sale</span>
                                <div class="mt-2">
                                    <small class="text-muted">Color: Silver</small>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="cart-item-price">$129.99</div>
                                <div class="cart-item-original-price">$159.99</div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="quantity-selector">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control form-control-sm" value="1" readonly>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-end">
                                <div class="cart-item-price mb-2">$129.99</div>
                                <div>
                                    <a href="#" class="save-for-later"><small>Save for later</small></a>
                                    <a href="#" class="remove-item"><small>Remove</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Cart Item 3 -->
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded" alt="Bluetooth Speaker">
                            </div>
                            <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                                <h5 class="cart-item-title">Bluetooth Speaker</h5>
                                <div class="mt-2">
                                    <small class="text-muted">Color: Blue</small>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="cart-item-price">$79.99</div>
                            </div>
                            <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                                <div class="quantity-selector">
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <input type="text" class="form-control form-control-sm" value="1" readonly>
                                    <button class="btn btn-sm btn-outline-secondary">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-2 text-end">
                                <div class="cart-item-price mb-2">$79.99</div>
                                <div>
                                    <a href="#" class="save-for-later"><small>Save for later</small></a>
                                    <a href="#" class="remove-item"><small>Remove</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <a href="#" class="btn btn-outline-primary">
                            <i class="fas fa-arrow-left me-2"></i> Continue Shopping
                        </a>
                        <button class="btn btn-primary">
                            Update Cart
                        </button>
                    </div>
                </div>
                
                <!-- Cart Summary -->
                <div class="col-lg-4 mt-4 mt-lg-0">
                    <div class="cart-summary">
                        <h4 class="mb-4">Order Summary</h4>
                        
                        <div class="summary-item">
                            <span>Subtotal</span>
                            <span>$309.97</span>
                        </div>
                        <div class="summary-item">
                            <span>Shipping</span>
                            <span>$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Tax</span>
                            <span>$24.80</span>
                        </div>
                        <div class="summary-item summary-total">
                            <span>Total</span>
                            <span>$334.77</span>
                        </div>
                        
                        <div class="promo-code">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Promo code">
                                <button class="btn btn-outline-secondary" type="button">Apply</button>
                            </div>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary btn-lg">
                                Proceed to Checkout
                            </button>
                        </div>
                        
                        <div class="mt-4">
                            <p class="mb-2"><strong>Payment Methods</strong></p>
                            <div class="payment-method">
                                <img src="/api/placeholder/50/30" alt="Visa">
                            </div>
                            <div class="payment-method">
                                <img src="/api/placeholder/50/30" alt="MasterCard">
                            </div>
                            <div class="payment-method">
                                <img src="/api/placeholder/50/30" alt="PayPal">
                            </div>
                            <div class="payment-method">
                                <img src="/api/placeholder/50/30" alt="ApplePay">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <p class="mb-2"><small>Need help? Call us at <strong>1-800-123-4567</strong></small></p>
                            <p><small>Free shipping on orders over $100</small></p>
                        </div>
                        
                        <!-- Added checkout security section -->
                        <div class="checkout-security">
                            <i class="fas fa-lock"></i>
                            <small>Secure checkout. All information is encrypted and transmitted securely.</small>
                        </div>
                    </div>
                    
                    <div class="mt-4">
                        <div class="alert alert-info" role="alert">
                            <i class="fas fa-info-circle me-2"></i> Items in your cart are not reserved. Check out now to guarantee your purchase.
                        </div>
                    </div>

                    <!-- Added estimated delivery section -->
                    <div class="mt-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Estimated Delivery</h5>
                                <p class="card-text">Standard Shipping (3-5 business days)</p>
                                <p class="small text-muted">Order before 2PM for same-day dispatch</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Saved for Later -->
    <section class="py-4">
        <div class="container">
            <h3 class="mb-3">Saved for Later (2 items)</h3>
            
            <div class="cart-item">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                        <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded" alt="Wireless Headphones">
                    </div>
                    <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                        <h5 class="cart-item-title">Wireless Headphones</h5>
                        <div class="mt-2">
                            <small class="text-muted">Color: Black</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                        <div class="cart-item-price">$149.99</div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-end">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-shopping-cart me-2"></i> Move to Cart
                        </button>
                        <a href="#" class="remove-item ms-2"><small>Remove</small></a>
                    </div>
                </div>
            </div>
            
            <div class="cart-item">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                        <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded" alt="Portable Charger">
                    </div>
                    <div class="col-lg-4 col-md-3 mb-3 mb-md-0">
                        <h5 class="cart-item-title">Portable Charger</h5>
                        <span class="product-badge bg-danger">Sale</span>
                        <div class="mt-2">
                            <small class="text-muted">Color: White</small>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 mb-3 mb-md-0">
                        <div class="cart-item-price">$49.99</div>
                        <div class="cart-item-original-price">$59.99</div>
                    </div>
                    <div class="col-lg-4 col-md-4 text-end">
                        <button class="btn btn-sm btn-primary">
                            <i class="fas fa-shopping-cart me-2"></i> Move to Cart
                        </button>
                        <a href="#" class="remove-item ms-2"><small>Remove</small></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Recently Viewed -->
    <section class="py-4 bg-light recently-viewed">
        <div class="container">
            <h3 class="mb-3">Recently Viewed</h3>
            <div class="row">
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Wireless Charging Pad">
                        <div class="card-body">
                            <h6 class="card-title">Wireless Charging Pad</h6>
                            <p class="card-text fw-bold">$39.99</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="USB-C Cable">
                        <div class="card-body">
                            <h6 class="card-title">USB-C Cable</h6>
                            <p class="card-text fw-bold">$14.99</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Phone Case">
                        <div class="card-body">
                            <h6 class="card-title">Phone Case</h6>
                            <p class="card-text fw-bold">$24.99</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-6 mb-4">
                    <div class="card">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Screen Protector">
                        <div class="card-body">
                            <h6 class="card-title">Screen Protector</h6>
                            <p class="card-text fw-bold">$19.99</p>
                            <button class="btn btn-sm btn-outline-primary w-100">Add to Cart</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- You Might Also Like -->
    <section class="py-5 bg-white">
        <div class="container">
            <h3 class="mb-4">You Might Also Like</h3>
            <div class="row">
                <!-- Suggested Item 1 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card suggested-item-card h-100">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Smart Home Hub">
                        <div class="card-body">
                            <h5 class="card-title">Smart Home Hub</h5>
                            <div class="d-flex align-items-center mb-2">
                                <div class="text-warning me-2">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <small class="text-muted">(42)</small>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="fw-bold text-primary">$89.99</span>
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-cart-plus