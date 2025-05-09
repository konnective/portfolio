<!-- Featured Products -->
<section class="featured-products">
    <h2 class="section-title">FEATURED PRODUCTS</h2>
    <div class="products-grid">
        @forelse ($products as $item)
            <a href="{{ route('product-detail', $item->id) }}" class="product-card">
                <div class="product-image">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}">
                    <img src="{{ $item->image }}" alt="{{ $item->name }}" class="hover-image">
                </div>
                <div class="product-info">
                    <h3 class="product-title">{{ $item->name }}</h3>
                    <p class="product-price">${{ $item->price }}</p>
                </div>
            </a>
        @empty
            <p>No Products To Show</p>
        @endforelse
    </div>
</section>
