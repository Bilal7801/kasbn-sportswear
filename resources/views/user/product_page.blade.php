{{-- product_page.blade.php --}}
@extends('layouts.app')

@section('title', 'Shop All Products – Premium Sportswear | KASBN')

@push('styles')
<style>
    /* ========== PREMIUM HERO BANNER SECTION ========== */
    .products-page-hero {
        min-height: 520px;
        background: linear-gradient(rgba(15, 15, 15, 0.85), rgba(26, 26, 26, 0.95)),
                    url('https://images.unsplash.com/photo-1517838277536-f5f99be501cd?q=80&w=1600&auto=format&fit=crop') center/cover no-repeat;
        background-color: #121212;
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 100px 20px 60px;
    }

    .hero-tech-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 255, 255, 0.02) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 255, 255, 0.02) 1px, transparent 1px);
        background-size: 30px 30px;
        pointer-events: none;
        z-index: 1;
    }

    .hero-kinetic-watermark {
        position: absolute;
        bottom: -10px;
        right: -5%;
        font-size: clamp(100px, 18vw, 240px);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: -5px;
        color: transparent;
        -webkit-text-stroke: 1px rgba(255, 255, 255, 0.03);
        user-select: none;
        pointer-events: none;
        z-index: 1;
        font-style: italic;
    }

    .hero-sport-slash {
        position: absolute;
        top: 0;
        right: 25%;
        width: 150px;
        height: 100%;
        background: linear-gradient(to bottom, rgba(255, 107, 53, 0.08), transparent);
        transform: skewX(-25deg);
        pointer-events: none;
        z-index: 1;
    }

    .products-hero-content {
        position: relative;
        z-index: 3;
        text-align: center;
        max-width: 850px;
        animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .products-hero-subtitle {
        font-size: 13px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #ffffff;
        font-weight: 700;
        margin-bottom: 20px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 107, 53, 0.1);
        padding: 6px 16px;
        border-radius: 50px;
        border: 1px solid rgba(255, 107, 53, 0.2);
    }

    .orange-accent-bar {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px #ff6b35;
    }

    .products-hero-title {
        font-size: clamp(38px, 6vw, 62px);
        font-weight: 900;
        line-height: 1.15;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: -1px;
    }

    .highlight-orange {
        color: #ff6b35;
        text-shadow: 0 0 30px rgba(255, 107, 53, 0.2);
    }

    .products-hero-description {
        font-size: 17px;
        color: #cccccc;
        max-width: 650px;
        margin: 0 auto 40px;
        line-height: 1.6;
    }

    .hero-feature-badges {
        display: flex;
        justify-content: center;
        gap: 25px;
        flex-wrap: wrap;
        margin-top: 20px;
    }

    .hero-badge-item {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        padding: 12px 20px;
        border-radius: 6px;
        display: flex;
        align-items: center;
        gap: 10px;
        backdrop-filter: blur(5px);
        transition: all 0.3s ease;
    }

    .hero-badge-item:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.3);
        transform: translateY(-3px);
    }

    .hero-badge-item i {
        color: #ff6b35;
        font-size: 14px;
    }

    .hero-badge-item span {
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #e0e0e0;
    }

    .hero-bottom-fade {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 60px;
        background: linear-gradient(to top, #ffffff, transparent);
        z-index: 2;
    }

    /* ========== PRODUCTS CORE CATALOG SECTION ========== */
    .products-section {
        padding: 80px 20px;
        background: #ffffff;
    }

    .catalog-container {
        max-width: 1500px;
        width: 92%;
        margin: 0 auto;
    }

    .products-top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 50px;
        flex-wrap: wrap;
        gap: 30px;
    }

    .products-title {
        font-size: 24px;
        font-weight: 700;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .products-filter {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
    }

    .filter-btn {
        background: transparent;
        border: 2px solid #ddd;
        color: #666;
        font-weight: 600;
        font-size: 13px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 10px 22px;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .filter-btn:hover {
        border-color: #ff6b35;
        color: #ff6b35;
    }

    .filter-btn.active {
        background: #ff6b35;
        color: white;
        border-color: #ff6b35;
    }

    .search-container {
        position: relative;
        width: 100%;
        max-width: 350px;
    }

    .search-input {
        width: 100%;
        background: white;
        border: 2px solid #ddd;
        padding: 12px 15px 12px 40px;
        color: #1a1a1a;
        font-size: 14px;
        outline: none;
        border-radius: 4px;
        transition: all 0.3s ease-out;
    }

    .search-input:focus {
        border-color: #ff6b35;
        box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1);
    }

    .search-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #ff6b35;
        font-size: 16px;
        pointer-events: none;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }

    /* CHANGED: card is now a DIV, not an anchor */
    .product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        animation: fadeInUp 0.8s ease-out;
    }

    .product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    /* This is the clickable product area */
    .product-main-link {
        text-decoration: none;
        color: inherit;
        display: flex;
        flex-direction: column;
        flex-grow: 1;
    }

    .product-card-img {
        height: 300px;
        background: #fcfcfc;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid #f0f0f0;
    }

    .product-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        padding: 0;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .product-main-link:hover .product-card-img img {
        transform: scale(1.05);
    }

    .product-card-img i {
        font-size: 60px;
        color: #ddd;
    }

    .product-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: #ff6b35;
        color: white;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 6px 12px;
        border-radius: 3px;
        z-index: 2;
    }

    .product-moq {
        position: absolute;
        top: 12px;
        right: 12px;
        background: rgba(0, 0, 0, 0.8);
        color: white;
        border: 1px solid rgba(255, 255, 255, 0.3);
        font-size: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 5px 10px;
        border-radius: 3px;
        z-index: 2;
    }

    .product-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .product-name {
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        color: #1a1a1a;
        margin-bottom: 10px;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        height: 44px;
    }

    .product-desc {
        font-size: 13px;
        color: #666;
        line-height: 1.5;
        margin-bottom: 15px;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
        flex-grow: 1;
    }

    .product-specs {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: auto;
        padding-top: 10px;
    }

    .product-spec {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ff6b35;
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 600;
    }

    .product-card-footer {
        border-top: 1px solid #eee;
        padding: 15px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: #fafafa;
    }

    .product-footer-pricing-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .product-price-label {
        font-size: 10px;
        color: #888;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .product-retail-price {
        font-size: 14px;
        color: #555;
        font-weight: 700;
        text-decoration: line-through;
        margin-top: 2px;
    }

    .product-retail-price.no-strike {
        text-decoration: none;
        color: #1a1a1a;
        font-size: 16px;
    }

    .product-bulk-price {
        font-size: 18px;
        color: #ff6b35;
        font-weight: 900;
        margin-top: 2px;
    }

    /* CHANGED: button instead of anchor */
    .product-enquire {
        background: #1a1a1a;
        color: white;
        border: none;
        font-size: 12px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 11px 16px;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s ease-out;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 6px;
        font-weight: 600;
        width: 100%;
    }

    .product-enquire:hover {
        background: #ff6b35;
        transform: translateY(-2px);
    }

    /* ========== PAGINATION WRAPPER & FRAMEWORK RESET ========== */
    .pagination-wrapper {
        margin-top: 60px;
        display: flex;
        justify-content: center;
        width: 100%;
    }

    .pagination-wrapper nav {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        width: 100%;
    }

    .pagination-wrapper nav > div:first-child.flex {
        display: none !important;
    }

    .pagination-wrapper nav > div:last-child {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 15px;
        width: 100%;
    }

    @media (min-width: 768px) {
        .pagination-wrapper nav {
            flex-direction: row;
            justify-content: space-between;
        }
        .pagination-wrapper nav > div:last-child {
            flex-direction: row;
            width: auto;
        }
    }

    .pagination-wrapper p,
    .pagination-wrapper nav p {
        font-size: 13px;
        color: #666666;
        margin: 0;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .pagination-wrapper svg {
        width: 14px !important;
        height: 14px !important;
        display: inline-block;
        vertical-align: middle;
    }

    .pagination-wrapper nav span.relative.z-0 {
        display: inline-flex;
        border-radius: 4px;
        overflow: hidden;
        border: 1px solid #dddddd;
        box-shadow: 0 2px 5px rgba(0,0,0,0.03);
    }

    .pagination-wrapper nav a,
    .pagination-wrapper nav span[aria-current="page"],
    .pagination-wrapper nav span[aria-disabled="true"] {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        padding: 10px 16px;
        background: #ffffff;
        color: #1a1a1a;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        border-right: 1px solid #dddddd;
        border-top: none;
        border-bottom: none;
        border-left: none;
        transition: all 0.2s ease-in-out;
    }

    .pagination-wrapper nav a:last-child,
    .pagination-wrapper nav span:last-child {
        border-right: none;
    }

    .pagination-wrapper nav a:hover {
        background: #fafafa;
        color: #ff6b35;
    }

    .pagination-wrapper nav span[aria-current="page"] {
        background: #ff6b35;
        color: #ffffff;
    }

    .pagination-wrapper nav span[aria-disabled="true"] {
        background: #fdfdfd;
        color: #cccccc;
        cursor: not-allowed;
    }

    /* ========== HIGH-OCTANE CUSTOM QUOTE SECTION ========== */
    .page-enquiry {
        background: linear-gradient(135deg, #0e0e0e 0%, #1a1a1a 100%);
        padding: 100px 20px;
        color: white;
        position: relative;
        overflow: hidden;
    }

    .enquiry-tech-grid {
        position: absolute;
        inset: 0;
        background-image:
            linear-gradient(rgba(255, 107, 53, 0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 107, 53, 0.015) 1px, transparent 1px);
        background-size: 25px 25px;
        pointer-events: none;
        z-index: 1;
    }

    .enquiry-kinetic-watermark {
        position: absolute;
        top: -20px;
        left: -2%;
        font-size: clamp(120px, 20vw, 280px);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: -6px;
        color: transparent;
        -webkit-text-stroke: 1px rgba(255, 107, 53, 0.025);
        user-select: none;
        pointer-events: none;
        z-index: 1;
        font-style: italic;
    }

    .enquiry-sport-slash {
        position: absolute;
        bottom: 0;
        left: 20%;
        width: 200px;
        height: 100%;
        background: linear-gradient(to top, rgba(255, 107, 53, 0.04), transparent);
        transform: skewX(-20deg);
        pointer-events: none;
        z-index: 1;
    }

    .enquiry-card {
        background: rgba(20, 20, 20, 0.6);
        border: 1px solid rgba(255, 107, 53, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        padding: 60px 40px;
        max-width: 850px;
        margin: 0 auto;
        border-radius: 12px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        position: relative;
        z-index: 3;
    }

    .enquiry-subtitle {
        font-size: 11px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 700;
        margin-bottom: 15px;
        display: inline-flex;
        align-items: center;
        gap: 8px;
    }

    .enquiry-card h2 {
        font-size: clamp(28px, 5vw, 42px);
        font-weight: 900;
        text-transform: uppercase;
        margin-bottom: 15px;
        letter-spacing: -1px;
        line-height: 1.15;
    }

    .enquiry-card h2 span {
        color: #ff6b35;
        text-shadow: 0 0 25px rgba(255, 107, 53, 0.2);
    }

    .enquiry-card p {
        color: #b4b4b4;
        margin-bottom: 40px;
        font-size: 15px;
        line-height: 1.6;
        max-width: 650px;
    }

    .premium-enquiry-form {
        text-align: left;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 20px;
        margin-bottom: 20px;
    }

    .input-group {
        position: relative;
    }

    .input-group.full-width {
        grid-column: span 2;
    }

    .input-group input,
    .input-group select,
    .input-group textarea {
        width: 100%;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        padding: 14px 16px 14px 45px;
        font-size: 14px;
        color: white;
        border-radius: 6px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .input-group textarea {
        padding-top: 14px;
        resize: vertical;
    }

    .input-group select {
        appearance: none;
        -webkit-appearance: none;
        cursor: pointer;
    }

    .input-icon {
        position: absolute;
        left: 16px;
        top: 19px;
        color: rgba(255, 255, 255, 0.3);
        font-size: 14px;
        transition: color 0.3s ease;
    }

    .input-icon.textarea-icon {
        top: 18px;
    }

    .input-group input:focus,
    .input-group select:focus,
    .input-group textarea:focus {
        background: rgba(255, 107, 53, 0.03);
        border-color: rgba(255, 107, 53, 0.5);
        outline: none;
        box-shadow: 0 0 15px rgba(255, 107, 53, 0.1);
    }

    .input-group input:focus + .input-icon,
    .input-group select:focus + .input-icon,
    .input-group textarea:focus + .input-icon {
        color: #ff6b35;
    }

    .enquiry-submit-btn {
        background: #ff6b35;
        color: white;
        border: none;
        padding: 16px 40px;
        font-weight: 800;
        letter-spacing: 2px;
        text-transform: uppercase;
        cursor: pointer;
        border-radius: 6px;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        font-size: 13px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        margin-top: 10px;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2);
    }

    .enquiry-submit-btn:hover {
        background: #ffffff;
        color: #121212;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255, 255, 255, 0.15);
    }

    .enquiry-footer-meta {
        display: flex;
        justify-content: center;
        gap: 30px;
        margin-top: 40px;
        border-top: 1px solid rgba(255, 255, 255, 0.06);
        padding-top: 25px;
        flex-wrap: wrap;
    }

    .enquiry-footer-meta span {
        font-size: 11px;
        color: #888;
        letter-spacing: 1px;
        text-transform: uppercase;
        display: flex;
        align-items: center;
        gap: 6px;
    }

    .enquiry-footer-meta span i {
        color: #ff6b35;
    }

    /* ========== RESPONSIVE SCALING BREAKPOINTS ========== */
    @media (max-width: 1400px) {
        .catalog-container { width: 95%; }
    }

    @media (max-width: 1200px) {
        .products-grid { grid-template-columns: repeat(3, 1fr); }
    }

    @media (max-width: 992px) {
        .products-page-hero { min-height: 460px; padding-top: 80px; }
        .hero-badge-item { padding: 10px 14px; width: 100%; max-width: 280px; justify-content: center; }
        .products-hero-title { font-size: 32px; }
        .products-top-bar { gap: 15px; }
        .products-filter { flex: 1; min-width: 100%; }
        .products-grid { grid-template-columns: repeat(2, 1fr); gap: 15px; }

        .enquiry-card { padding: 40px 20px; }
        .form-grid { grid-template-columns: 1fr; gap: 15px; }
        .input-group.full-width { grid-column: span 1; }
        .enquiry-submit-btn { width: 100%; justify-content: center; }
        .enquiry-footer-meta { gap: 15px; flex-direction: column; align-items: center; }
    }

    @media (max-width: 576px) {
        .products-grid { grid-template-columns: 1fr; }
        .products-section { padding: 60px 20px; }
        .products-top-bar { flex-direction: column; gap: 20px; }
        .products-title { width: 100%; }
    }
</style>
@endpush

@section('content')
<section class="products-page-hero">
    <div class="hero-tech-grid"></div>
    <div class="hero-kinetic-watermark">KASBN PRO</div>
    <div class="hero-sport-slash"></div>

    <div class="products-hero-content">
        <div class="products-hero-subtitle">
            <span class="orange-accent-bar"></span> Engineered Performance
        </div>
        <h1 class="products-hero-title">
            Elite Sportswear <br>
            <span class="highlight-orange">Without Compromise</span>
        </h1>
        <p class="products-hero-description">
            Explore our industrial-grade athletic collections. Built for maximum durability, custom team branding, and elite global distribution.
        </p>

        <div class="hero-feature-badges">
            <div class="hero-badge-item">
                <i class="fas fa-bolt"></i>
                <span>Moisture-Wicking Tech</span>
            </div>
            <div class="hero-badge-item">
                <i class="fas fa-shield-alt"></i>
                <span>Reinforced Stitching</span>
            </div>
            <div class="hero-badge-item">
                <i class="fas fa-globe"></i>
                <span>Global Bulk Supply</span>
            </div>
        </div>
    </div>
    <div class="hero-bottom-fade"></div>
</section>

<section class="products-section">
    <div class="catalog-container">
        <div class="products-top-bar">
            <div class="products-title">Shop All</div>
            <div class="products-filter">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="footwear">Footwear</button>
                <button class="filter-btn" data-filter="apparel">Apparel</button>
                <button class="filter-btn" data-filter="equipment">Equipment</button>
                <button class="filter-btn" data-filter="accessories">Accessories</button>
            </div>
            <div class="search-container">
                <i class="fas fa-search search-icon"></i>
                <input type="text" id="productSearch" class="search-input" placeholder="Search products...">
            </div>
        </div>

        <div class="products-grid" id="productsGrid">
            @forelse ($products as $product)
                <div class="product-card" data-category="{{ strtolower($product->category?->name ?? 'uncategorized') }}">
                    <a href="{{ route('product.show', $product->slug) }}" class="product-main-link">
                        <div class="product-card-img">
                            @if($product->images && $product->images->isNotEmpty())
                                <img src="{{ asset('storage/' . $product->images->first()->image_path) }}" alt="{{ $product->name }}">
                            @else
                                <i class="fas fa-box"></i>
                            @endif

                            <span class="product-tag">{{ $product->category?->name ?? 'Product' }}</span>

                            @if($product->stock <= 0)
                                <span class="product-moq" style="background-color: #dc2626;">Out of stock</span>
                            @elseif($product->stock <= 5)
                                <span class="product-moq" style="background-color: #d97706;">Low Stock</span>
                            @else
                                <span class="product-moq">In Stock</span>
                            @endif
                        </div>

                        <div class="product-card-body">
                            <div class="product-name">{{ $product->name }}</div>

                            <div class="product-desc">
                                {{ $product->description ?? 'Premium high-performance athletic apparel optimized for international team sports configuration and dynamic heavy training loads.' }}
                            </div>

                            <div class="product-specs">
                                <span class="product-spec"><i class="fas fa-check"></i> Quality Assured</span>
                                <span class="product-spec"><i class="fas fa-check"></i> Custom Available</span>
                            </div>
                        </div>
                    </a>

                    <div class="product-card-footer">
                        <div class="product-footer-pricing-row">
                            <div>
                                <div class="product-price-label">Retail Price</div>
                                <div class="product-retail-price @if(!$product->bulk_price) no-strike @endif">
                                    ${{ number_format($product->price, 2) }}
                                </div>
                            </div>

                            @if($product->bulk_price)
                                <div style="text-align: right;">
                                    <div class="product-price-label" style="color: #ff6b35;">Bulk Pricing</div>
                                    <div class="product-bulk-price">${{ number_format($product->bulk_price, 2) }}</div>
                                </div>
                            @endif
                        </div>

                        <button
                            type="button"
                            class="product-enquire"
                            data-product="{{ $product->name }}"
                        >
                            <i class="fas fa-envelope"></i> Enquire Now
                        </button>
                    </div>
                </div>
            @empty
                <div style="grid-column: 1/-1; text-align: center; padding: 60px 20px;">
                    <i class="fas fa-inbox" style="font-size: 48px; color: #ddd; margin-bottom: 20px;"></i>
                    <p style="color: #999; font-size: 16px;">No products available at the moment.</p>
                </div>
            @endforelse
        </div>

        @if ($products->hasPages())
            <div class="pagination-wrapper">
                {{ $products->links() }}
            </div>
        @endif
    </div>
</section>

<section class="page-enquiry" id="quick-enquiry">
    <div class="enquiry-tech-grid"></div>
    <div class="enquiry-kinetic-watermark">RFQ PRO</div>
    <div class="enquiry-sport-slash"></div>

    <div style="max-width: 1200px; margin: 0 auto; position: relative; z-index: 3;">
        <div class="enquiry-card">
            <div class="enquiry-subtitle">
                <span class="orange-accent-bar"></span> Direct Factory Channel
            </div>
            <h2>Get Your Custom Quote <br><span>Within 24 Hours</span></h2>
            <p>Connect directly with our manufacturing division. Submit your design notes, material preferences, or breakdown volumes below for optimized corporate B2B pricing.</p>

            <form method="POST" action="#" class="premium-enquiry-form">
                @csrf
                <div class="form-grid">
                    <div class="input-group">
                        <i class="fas fa-user input-icon"></i>
                        <input type="text" name="name" placeholder="Contact Name / Corporate Entity" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-envelope input-icon"></i>
                        <input type="email" name="email" placeholder="Business Email Address" required>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-cubes input-icon"></i>
                        <select name="product_interest" id="product_interest" required>
                            <option value="" disabled selected>Target Gear Segment...</option>
                            <option>Footwear Lineup</option>
                            <option>Apparel & Compression Kits</option>
                            <option>Technical Equipment</option>
                            <option>Team Accessories</option>
                            <option>Custom Tailored Development</option>
                        </select>
                    </div>
                    <div class="input-group">
                        <i class="fas fa-layer-group input-icon"></i>
                        <input type="text" name="volume" placeholder="Estimated Volume (e.g., 250+ units)" required>
                    </div>
                </div>

                <div class="input-group full-width">
                    <i class="fas fa-sliders-h input-icon textarea-icon"></i>
                    <textarea name="specifications" id="specifications" rows="4" placeholder="Detail your required features here (e.g., specific sizing arrays, custom embroidery placements, color swatches, or moisture-control fabric weight profiles)..."></textarea>
                </div>

                <button type="submit" class="enquiry-submit-btn">
                    <span>Initialize RFQ</span> <i class="fas fa-bolt"></i>
                </button>
            </form>

            <div class="enquiry-footer-meta">
                <span><i class="fas fa-lock"></i> Encrypted Secure Data</span>
                <span><i class="fas fa-shipping-fast"></i> Global Freight Logistics</span>
                <span><i class="fas fa-shield-alt"></i> Premium Standard Audited</span>
            </div>
        </div>
    </div>
</section>
@endsection

@push('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const filterBtns = document.querySelectorAll('.filter-btn');
        const searchInput = document.getElementById('productSearch');
        const productCards = document.querySelectorAll('.product-card');
        const specsTextarea = document.getElementById('specifications');

        function filterCatalog() {
            const activeBtn = document.querySelector('.filter-btn.active');
            const activeFilter = activeBtn ? activeBtn.getAttribute('data-filter').toLowerCase() : 'all';
            const searchQuery = searchInput.value.toLowerCase().trim();

            productCards.forEach(card => {
                const productName = card.querySelector('.product-name')?.textContent.toLowerCase() || '';
                const productCategory = (card.getAttribute('data-category') || '').toLowerCase();

                const matchesCategory = (activeFilter === 'all') || productCategory.includes(activeFilter);
                const matchesSearch = productName.includes(searchQuery) || productCategory.includes(searchQuery);

                card.style.display = (matchesCategory && matchesSearch) ? 'flex' : 'none';
            });
        }

        filterBtns.forEach(btn => {
            btn.addEventListener('click', function () {
                filterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                filterCatalog();
            });
        });

        searchInput.addEventListener('input', filterCatalog);

        document.querySelectorAll('.product-enquire').forEach(button => {
            button.addEventListener('click', function () {
                const targetProductName = this.getAttribute('data-product');

                if (targetProductName && specsTextarea) {
                    specsTextarea.value = `Hi, I am looking for a production run quotation on the following product: "${targetProductName}". Please provide packaging configurations, customization limits, and lead times.`;
                }

                document.querySelector('#quick-enquiry').scrollIntoView({ behavior: 'smooth' });
            });
        });
    });
</script>
@endpush