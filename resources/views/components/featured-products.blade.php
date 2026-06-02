@push('styles')
<style>
    /* ========== FEATURED PRODUCTS ========== */
    .featured-products {
        padding: 80px 20px;
        background: #f9fafb;
        position: relative;
    }

    .featured-products::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #ddd, transparent);
    }

    .products-wrapper {
        max-width: 1200px;
        margin: 0 auto;
    }

    .products-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 50px;
        flex-wrap: wrap;
        gap: 30px;
    }

    .products-title-group {
        flex: 1;
        min-width: 300px;
    }

    .products-title-group .subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .products-title-group h2 {
        font-size: clamp(28px, 6vw, 48px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: -1px;
    }

    .view-all-link {
        color: #1a1a1a;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease-out;
    }

    .view-all-link:hover {
        color: #ff6b35;
        gap: 12px;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 30px;
    }

    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.8s ease-out;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .product-card:nth-child(1) { animation-delay: 0.1s; }
    .product-card:nth-child(2) { animation-delay: 0.2s; }
    .product-card:nth-child(3) { animation-delay: 0.3s; }
    .product-card:nth-child(4) { animation-delay: 0.4s; }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    .product-image-wrapper {
        position: relative;
        overflow: hidden;
        aspect-ratio: 1;
        background: #f0f0f0;
    }

    .product-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-card:hover .product-image {
        transform: scale(1.1);
    }

    .product-badge {
        position: absolute;
        top: 15px;
        right: 15px;
        background: #ff6b35;
        color: white;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        z-index: 2;
    }

    .product-info {
        padding: 20px;
    }

    .product-category {
        font-size: 11px;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #999;
        font-weight: 600;
        margin-bottom: 8px;
    }

    .product-name {
        font-size: 16px;
        font-weight: 700;
        color: #1a1a1a;
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 12px;
        font-size: 13px;
        color: #666;
    }

    .stars {
        color: #ffc107;
        letter-spacing: 2px;
    }

    .product-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .product-price {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .price {
        font-size: 18px;
        font-weight: 900;
        color: #1a1a1a;
    }

    .price-original {
        font-size: 14px;
        color: #ccc;
        text-decoration: line-through;
    }

    .add-to-cart {
        background: #1a1a1a;
        color: white;
        border: none;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        transition: all 0.3s ease-out;
    }

    .add-to-cart:hover {
        background: #ff6b35;
        transform: scale(1.1);
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .featured-products {
            padding: 60px 20px;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 15px;
        }

        .product-info {
            padding: 15px;
        }

        .product-name {
            font-size: 14px;
        }

        .price {
            font-size: 16px;
        }
    }
</style>
@endpush

<section class="featured-products">
    <div class="products-wrapper">
        <div class="products-header">
            <div class="products-title-group">
                <div class="subtitle">Best Sellers</div>
                <h2>Featured Products</h2>
            </div>
            <a href="{{ route('products') ?? '#' }}" class="view-all-link">
                View All <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="products-grid">
            <!-- Product 1 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=300&q=80" alt="Pro Training Shoes" class="product-image">
                    <span class="product-badge">-30%</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Running</div>
                    <div class="product-name">Pro Training Shoes</div>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                        <span>(248)</span>
                    </div>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="price">$129</span>
                            <span class="price-original">$185</span>
                        </div>
                        <button class="add-to-cart" title="Add to Cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 2 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=300&q=80" alt="Performance Jersey" class="product-image">
                    <span class="product-badge">-25%</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Football</div>
                    <div class="product-name">Performance Jersey</div>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                        <span>(182)</span>
                    </div>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="price">$69</span>
                            <span class="price-original">$92</span>
                        </div>
                        <button class="add-to-cart" title="Add to Cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 3 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=300&q=80" alt="Elite Sports Shorts" class="product-image">
                    <span class="product-badge">-40%</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Training</div>
                    <div class="product-name">Elite Sports Shorts</div>
                    <div class="product-rating">
                        <span class="stars">★★★★★</span>
                        <span>(315)</span>
                    </div>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="price">$49</span>
                            <span class="price-original">$82</span>
                        </div>
                        <button class="add-to-cart" title="Add to Cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Product 4 -->
            <div class="product-card">
                <div class="product-image-wrapper">
                    <img src="https://images.unsplash.com/photo-1516979187457-635ffe35ff49?w=300&q=80" alt="Basketball Pro Shoes" class="product-image">
                    <span class="product-badge">New</span>
                </div>
                <div class="product-info">
                    <div class="product-category">Basketball</div>
                    <div class="product-name">Basketball Pro Shoes</div>
                    <div class="product-rating">
                        <span class="stars">★★★★☆</span>
                        <span>(89)</span>
                    </div>
                    <div class="product-footer">
                        <div class="product-price">
                            <span class="price">$159</span>
                            <span class="price-original">$199</span>
                        </div>
                        <button class="add-to-cart" title="Add to Cart">
                            <i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
