@extends('frontend.partials.layout')
@section('content')
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
                            <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <!-- Cart Item 1 -->
                    <div class="cart-item">
                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-3 mb-3 mb-md-0">
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded"
                                    alt="Wireless Earbuds">
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
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded"
                                    alt="Smart Watch">
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
                                <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded"
                                    alt="Bluetooth Speaker">
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
                            <i class="fas fa-info-circle me-2"></i> Items in your cart are not reserved. Check out now to
                            guarantee your purchase.
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
                        <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded"
                            alt="Wireless Headphones">
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
                        <img src="/api/placeholder/100/100" class="img-fluid cart-item-image rounded"
                            alt="Portable Charger">
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
@endsection
