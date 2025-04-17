@extends('frontend.partials.layout')
@section('content')
    <!-- Breadcrumb -->
    <div class="container py-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Electronics</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Audio</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wireless Earbuds</li>
            </ol>
        </nav>
    </div>

    <!-- Product Section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!-- Product Images -->
                <div class="col-md-6 mb-4">
                    <div class="text-center mb-3">
                        <img src="/api/placeholder/500/500" class="img-fluid" alt="Wireless Earbuds" id="mainImage">
                    </div>
                    <div class="product-gallery d-flex justify-content-center">
                        <div class="mx-2">
                            <img src="/api/placeholder/100/100" class="img-thumbnail active" alt="Wireless Earbuds - Front"
                                onclick="document.getElementById('mainImage').src=this.src.replace('100/100', '500/500')">
                        </div>
                        <div class="mx-2">
                            <img src="/api/placeholder/100/100" class="img-thumbnail" alt="Wireless Earbuds - Side"
                                onclick="document.getElementById('mainImage').src=this.src.replace('100/100', '500/500')">
                        </div>
                        <div class="mx-2">
                            <img src="/api/placeholder/100/100" class="img-thumbnail" alt="Wireless Earbuds - Case"
                                onclick="document.getElementById('mainImage').src=this.src.replace('100/100', '500/500')">
                        </div>
                        <div class="mx-2">
                            <img src="/api/placeholder/100/100" class="img-thumbnail" alt="Wireless Earbuds - Lifestyle"
                                onclick="document.getElementById('mainImage').src=this.src.replace('100/100', '500/500')">
                        </div>
                    </div>
                </div>

                <!-- Product Details -->
                <div class="col-md-6">
                    <span class="product-badge">New Arrival</span>
                    <h1 class="mb-3">Premium Wireless Earbuds</h1>

                    <div class="d-flex align-items-center mb-3">
                        <div class="star-rating me-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="text-muted">4.5 (128 reviews)</span>
                    </div>

                    <div class="mb-3">
                        <span class="product-price me-2">$99.99</span>
                        <span class="original-price">$129.99</span>
                        <span class="ms-2 text-success">23% off</span>
                    </div>

                    <p class="mb-4">Experience crystal-clear sound with our latest wireless earbuds. Featuring
                        Bluetooth 5.2, active noise cancellation, and up to 30 hours of battery life with the charging
                        case.</p>

                    <div class="mb-4">
                        <h5>Color</h5>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="color" id="colorBlack" checked>
                                <label class="form-check-label" for="colorBlack">Black</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input" type="radio" name="color" id="colorWhite">
                                <label class="form-check-label" for="colorWhite">White</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="color" id="colorBlue">
                                <label class="form-check-label" for="colorBlue">Blue</label>
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <h5>Quantity</h5>
                        <div class="quantity-selector">
                            <button class="btn btn-outline-secondary" onclick="decrementQuantity()">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="text" class="form-control" id="quantity" value="1" readonly>
                            <button class="btn btn-outline-secondary" onclick="incrementQuantity()">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="d-grid gap-2 d-md-flex mb-4">
                        <button class="btn btn-primary btn-lg flex-grow-1">
                            <i class="fas fa-shopping-cart me-2"></i> Add to Cart
                        </button>
                        <button class="btn btn-outline-secondary btn-lg">
                            <i class="fas fa-heart"></i>
                        </button>
                    </div>

                    <div class="d-flex flex-wrap">
                        <div class="me-4 mb-3">
                            <i class="fas fa-truck text-primary"></i>
                            <span class="ms-2">Free shipping</span>
                        </div>
                        <div class="me-4 mb-3">
                            <i class="fas fa-box-open text-primary"></i>
                            <span class="ms-2">Easy returns</span>
                        </div>
                        <div class="mb-3">
                            <i class="fas fa-shield-alt text-primary"></i>
                            <span class="ms-2">1-year warranty</span>
                        </div>
                    </div>

                    <div class="alert alert-success mt-3" role="alert">
                        <i class="fas fa-check-circle me-2"></i> In stock and ready to ship
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Tabs -->
    <section class="py-4">
        <div class="container">
            <ul class="nav nav-tabs product-tabs mb-4" id="productTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                        data-bs-target="#description" type="button" role="tab" aria-controls="description"
                        aria-selected="true">Description</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="specifications-tab" data-bs-toggle="tab"
                        data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications"
                        aria-selected="false">Specifications</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                        type="button" role="tab" aria-controls="reviews" aria-selected="false">Reviews
                        (128)</button>
                </li>
            </ul>

            <div class="tab-content" id="productTabsContent">
                <!-- Description Tab -->
                <div class="tab-pane fade show active" id="description" role="tabpanel"
                    aria-labelledby="description-tab">
                    <div class="row">
                        <div class="col-md-8">
                            <h4>Product Overview</h4>
                            <p>Introducing our Premium Wireless Earbuds, the perfect companion for your audio needs.
                                These state-of-the-art earbuds combine cutting-edge technology with sleek design to
                                deliver an unparalleled listening experience.</p>

                            <p>The active noise cancellation technology effectively blocks out ambient noise, allowing
                                you to immerse yourself in your favorite music or podcasts without distractions. With
                                Bluetooth 5.2, enjoy stable and seamless connectivity with your devices.</p>

                            <h4 class="mt-4">Key Features</h4>
                            <ul class="product-features">
                                <li><strong>Active Noise Cancellation:</strong> Blocks out ambient noise for an
                                    immersive listening experience</li>
                                <li><strong>Long Battery Life:</strong> Up to 8 hours of playback on a single charge,
                                    and up to 30 hours with the charging case</li>
                                <li><strong>Bluetooth 5.2:</strong> Provides stable connectivity and seamless pairing
                                </li>
                                <li><strong>Touch Controls:</strong> Easily manage your music and calls with intuitive
                                    touch controls</li>
                                <li><strong>Water Resistant:</strong> IPX5 rating ensures protection against sweat and
                                    light rain</li>
                                <li><strong>Premium Sound Quality:</strong> 10mm dynamic drivers deliver rich bass and
                                    crystal-clear highs</li>
                                <li><strong>Built-in Microphones:</strong> Dual microphones with noise reduction for
                                    clear calls</li>
                            </ul>

                            <h4 class="mt-4">What's in the Box</h4>
                            <ul>
                                <li>Premium Wireless Earbuds</li>
                                <li>Charging Case</li>
                                <li>USB-C Charging Cable</li>
                                <li>3 Pairs of Ear Tips (S, M, L)</li>
                                <li>User Manual</li>
                                <li>Quick Start Guide</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <img src="/api/placeholder/400/400" class="img-fluid rounded" alt="Product Features">
                        </div>
                    </div>
                </div>

                <!-- Specifications Tab -->
                <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                    <h4>Technical Specifications</h4>
                    <table class="table product-specs">
                        <tbody>
                            <tr>
                                <td width="40%"><strong>Bluetooth Version</strong></td>
                                <td>5.2</td>
                            </tr>
                            <tr>
                                <td><strong>Driver Size</strong></td>
                                <td>10mm Dynamic Drivers</td>
                            </tr>
                            <tr>
                                <td><strong>Frequency Response</strong></td>
                                <td>20Hz - 20kHz</td>
                            </tr>
                            <tr>
                                <td><strong>Impedance</strong></td>
                                <td>32Ω</td>
                            </tr>
                            <tr>
                                <td><strong>Battery Life (Earbuds)</strong></td>
                                <td>Up to 8 hours</td>
                            </tr>
                            <tr>
                                <td><strong>Battery Life (with Case)</strong></td>
                                <td>Up to 30 hours</td>
                            </tr>
                            <tr>
                                <td><strong>Charging Time (Earbuds)</strong></td>
                                <td>1.5 hours</td>
                            </tr>
                            <tr>
                                <td><strong>Charging Time (Case)</strong></td>
                                <td>2 hours</td>
                            </tr>
                            <tr>
                                <td><strong>Water Resistance</strong></td>
                                <td>IPX5</td>
                            </tr>
                            <tr>
                                <td><strong>Controls</strong></td>
                                <td>Touch Controls</td>
                            </tr>
                            <tr>
                                <td><strong>Microphone</strong></td>
                                <td>Dual Microphones with Noise Reduction</td>
                            </tr>
                            <tr>
                                <td><strong>Charging Port</strong></td>
                                <td>USB-C</td>
                            </tr>
                            <tr>
                                <td><strong>Earbud Dimensions</strong></td>
                                <td>22 x 18 x 21 mm</td>
                            </tr>
                            <tr>
                                <td><strong>Case Dimensions</strong></td>
                                <td>60 x 45 x 25 mm</td>
                            </tr>
                            <tr>
                                <td><strong>Weight (Earbuds)</strong></td>
                                <td>5g each</td>
                            </tr>
                            <tr>
                                <td><strong>Weight (with Case)</strong></td>
                                <td>50g</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Reviews Tab -->
                <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                    <div class="row mb-4">
                        <div class="col-md-4">
                            <div class="d-flex align-items-center mb-3">
                                <h1 class="display-4 me-2">4.5</h1>
                                <div>
                                    <div class="star-rating mb-1">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </div>
                                    <span>Based on 128 reviews</span>
                                </div>
                            </div>

                            <div class="mb-3">
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">5</span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 75%"
                                            aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-2">75%</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">4</span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%"
                                            aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-2">15%</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">3</span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 6%"
                                            aria-valuenow="6" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-2">6%</span>
                                </div>
                                <div class="d-flex align-items-center mb-1">
                                    <span class="me-2">2</span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 3%"
                                            aria-valuenow="3" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-2">3%</span>
                                </div>
                                <div class="d-flex align-items-center">
                                    <span class="me-2">1</span>
                                    <div class="progress flex-grow-1" style="height: 10px;">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 1%"
                                            aria-valuenow="1" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                    <span class="ms-2">1%</span>
                                </div>
                            </div>

                            <button class="btn btn-primary w-100">Write a Review</button>
                        </div>

                        <div class="col-md-8">
                            <h4>Customer Reviews</h4>

                            <!-- Review 1 -->
                            <div class="review">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <h5 class="mb-0">Amazing Sound Quality</h5>
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="review-date">April 2, 2025</span>
                                </div>
                                <p class="mb-1"><strong>By John D. - Verified Purchase</strong></p>
                                <p>These earbuds are absolutely fantastic. The sound quality is exceptional with deep
                                    bass and clear highs. The noise cancellation works amazingly well, even in noisy
                                    environments. Battery life is as advertised, and the quick charging feature is super
                                    convenient. Highly recommend!</p>
                            </div>

                            <!-- Review 2 -->
                            <div class="review">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <h5 class="mb-0">Great for Workouts</h5>
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                    </div>
                                    <span class="review-date">March 27, 2025</span>
                                </div>
                                <p class="mb-1"><strong>By Sarah M. - Verified Purchase</strong></p>
                                <p>I've been using these earbuds for my daily workouts, and they stay in place
                                    perfectly. The water resistance is great for sweaty sessions, and the sound quality
                                    motivates me during tough workouts. The only minor issue is that the touch controls
                                    can be a bit sensitive sometimes. Overall, very happy with my purchase!</p>
                            </div>

                            <!-- Review 3 -->
                            <div class="review">
                                <div class="d-flex justify-content-between mb-2">
                                    <div>
                                        <h5 class="mb-0">Comfortable and Reliable</h5>
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star-half-alt"></i>
                                        </div>
                                    </div>
                                    <span class="review-date">March 15, 2025</span>
                                </div>
                                <p class="mb-1"><strong>By Michael R. - Verified Purchase</strong></p>
                                <p>I can wear these earbuds for hours without any discomfort. The multiple ear tip sizes
                                    helped me find the perfect fit. Connection is stable with no dropouts, and pairing
                                    is seamless. Call quality is also very good, with people on the other end hearing me
                                    clearly. Excellent value for the price!</p>
                            </div>

                            <div class="text-center mt-4">
                                <button class="btn btn-outline-primary">Load More Reviews</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Related Products -->
    <section class="py-5 bg-light">
        <div class="container">
            <h3 class="mb-4">You Might Also Like</h3>
            <div class="row">
                <!-- Related Product 1 -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card related-product h-100">
                        <img src="/api/placeholder/300/300" class="card-img-top" alt="Related Product 1">
                        <div class="card-body">
                            <h5 class="card-title">Bluetooth Speaker</h5>
                            <div class="star-rating mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="far fa-star"></i>
                            </div>
                            <p class="card-text fw-bold text-primary">$79.99</p>
                            <a href="#" class="btn btn-outline-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
    </section>
@endsection
