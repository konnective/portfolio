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
            @forelse ($products as $item)
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
            @empty
                <p>No products to show !!</p>
            @endforelse
        </div>
    </div>
</section>