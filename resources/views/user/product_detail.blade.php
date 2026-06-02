{{-- product_detail.blade.php --}}
@extends('layouts.app')

@section('title', $product->name . ' – Premium Sportswear | KASBN')

@push('styles')
<style>
    /* ========== MAIN PRODUCT SECTION ========== */
    .product-detail-section {
        padding: 110px 10px 60px; /* extra top spacing from header */
        background: #ffffff;
    }

    .product-detail-container {
        max-width: 1500px;
        width: 92%;
        margin: 0 auto;
    }

    .product-detail-layout {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: start;
    }

    /* ========== PRODUCT IMAGE GALLERY ========== */
    .product-gallery {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .gallery-main {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        background: #f5f5f5;
        border-radius: 12px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .gallery-main img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .gallery-main:hover img {
        transform: scale(1.05);
    }

    .gallery-main i {
        font-size: 60px;
        color: #ddd;
    }

    .gallery-thumbnails {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
        gap: 12px;
    }

    .gallery-thumb {
        position: relative;
        aspect-ratio: 1;
        border-radius: 8px;
        overflow: hidden;
        cursor: pointer;
        border: 3px solid transparent;
        background: #f5f5f5;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .gallery-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .gallery-thumb:hover {
        border-color: #ff6b35;
        transform: scale(0.98);
    }

    .gallery-thumb.active {
        border-color: #ff6b35;
        box-shadow: 0 0 0 2px white, 0 0 0 4px #ff6b35;
    }

    .gallery-thumb i {
        font-size: 40px;
        color: #ddd;
    }

    /* ========== PRODUCT INFO SECTION ========== */
    .product-info {
        display: flex;
        flex-direction: column;
        gap: 26px;
    }

    .product-category-badge {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
        background: rgba(255, 107, 53, 0.1);
        padding: 8px 16px;
        border-radius: 50px;
        border: 1px solid rgba(255, 107, 53, 0.2);
    }

    .product-category-badge span {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ff6b35;
    }

    .product-detail-title {
        font-size: clamp(28px, 4vw, 48px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        line-height: 1.2;
        letter-spacing: -1px;
        margin: 0;
    }

    .product-rating {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 14px;
    }

    .product-rating .stars {
        display: flex;
        gap: 4px;
        color: #ff6b35;
    }

    .product-rating .rating-text {
        color: #666;
        font-weight: 600;
    }

    .product-stock-status {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        padding: 10px 14px;
        border-radius: 6px;
        width: fit-content;
    }

    .stock-in {
        background: rgba(34, 197, 94, 0.1);
        color: #22c55e;
        border: 1px solid rgba(34, 197, 94, 0.3);
    }

    .stock-low {
        background: rgba(217, 119, 6, 0.1);
        color: #d97706;
        border: 1px solid rgba(217, 119, 6, 0.3);
    }

    .stock-out {
        background: rgba(220, 38, 38, 0.1);
        color: #dc2626;
        border: 1px solid rgba(220, 38, 38, 0.3);
    }

    .product-pricing {
        padding: 24px;
        background: linear-gradient(135deg, #f5f5f5 0%, #fafafa 100%);
        border-radius: 12px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 24px;
    }

    .price-block {
        display: flex;
        flex-direction: column;
        gap: 6px;
    }

    .price-label {
        font-size: 11px;
        color: #888;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .price-value {
        font-size: 24px;
        font-weight: 900;
        color: #1a1a1a;
        line-height: 1.1;
    }

    .price-value.bulk {
        color: #ff6b35;
    }

    .price-old {
        font-size: 14px;
        color: #999;
        text-decoration: line-through;
        margin-top: 4px;
    }

    .product-description {
        display: flex;
        flex-direction: column;
        gap: 16px;
    }

    .description-label {
        font-size: 12px;
        color: #888;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 700;
    }

    .description-text {
        font-size: 15px;
        color: #555;
        line-height: 1.7;
        margin: 0;
    }

    .product-features {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 16px;
    }

    .feature-item {
        display: flex;
        align-items: flex-start;
        gap: 12px;
        padding: 14px;
        background: #f9f9f9;
        border-radius: 8px;
        border-left: 3px solid #ff6b35;
    }

    .feature-item i {
        color: #ff6b35;
        font-size: 14px;
        margin-top: 2px;
        flex-shrink: 0;
    }

    .feature-item span {
        font-size: 13px;
        color: #666;
        font-weight: 600;
        line-height: 1.5;
    }

    .product-actions {
        display: flex;
        flex-direction: column;
        gap: 14px;
    }

    .btn-enquiry {
        background: #ff6b35;
        color: white;
        border: none;
        padding: 18px 32px;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.3);
        width: 100%;
    }

    .btn-enquiry:hover {
        background: #ff5500;
        transform: translateY(-3px);
        box-shadow: 0 8px 25px rgba(255, 107, 53, 0.4);
    }

    .btn-secondary {
        background: transparent;
        color: #1a1a1a;
        border: 2px solid #ddd;
        padding: 16px 32px;
        font-size: 13px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        border-radius: 6px;
        cursor: pointer;
        transition: all 0.3s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
    }

    .btn-secondary:hover {
        border-color: #ff6b35;
        color: #ff6b35;
        background: rgba(255, 107, 53, 0.05);
    }

    /* ========== RELATED PRODUCTS SECTION ========== */
    .related-products-section {
        padding: 80px 10px;
        background: #f5f5f5;
        margin-top: 60px;
    }

    .related-products-container {
        max-width: 1500px;
        width: 92%;
        margin: 0 auto;
    }

    .section-header {
        text-align: center;
        margin-bottom: 50px;
    }

    .section-subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 700;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .section-title {
        font-size: clamp(32px, 5vw, 44px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: -1px;
        line-height: 1.2;
        margin: 0;
    }

    /* SAME STYLE AS product_page.blade.php CARDS */
    .related-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 25px;
    }

    .related-product-card {
        background: white;
        border-radius: 8px;
        overflow: hidden;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        cursor: pointer;
    }

    .related-product-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 24px rgba(0,0,0,0.12);
    }

    .related-product-card-img {
        height: 300px;
        background: #fcfcfc;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        border-bottom: 1px solid #f0f0f0;
    }

    .related-product-card-img img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        padding: 0;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .related-product-card:hover .related-product-card-img img {
        transform: scale(1.05);
    }

    .related-product-card-img i {
        font-size: 60px;
        color: #ddd;
    }

    .related-product-tag {
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

    .related-product-moq {
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

    .related-product-card-body {
        padding: 20px;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .related-product-name {
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

    .related-product-desc {
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

    .related-product-specs {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: auto;
        padding-top: 10px;
    }

    .related-product-spec {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #ff6b35;
        display: flex;
        align-items: center;
        gap: 5px;
        font-weight: 600;
    }

    .related-product-card-footer {
        border-top: 1px solid #eee;
        padding: 15px 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
        background: #fafafa;
    }

    .related-product-footer-pricing-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .related-product-price-label {
        font-size: 10px;
        color: #888;
        letter-spacing: 1px;
        text-transform: uppercase;
        font-weight: 600;
    }

    .related-product-retail-price {
        font-size: 14px;
        color: #555;
        font-weight: 700;
        text-decoration: line-through;
        margin-top: 2px;
    }

    .related-product-retail-price.no-strike {
        text-decoration: none;
        color: #1a1a1a;
        font-size: 16px;
    }

    .related-product-bulk-price {
        font-size: 18px;
        color: #ff6b35;
        font-weight: 900;
        margin-top: 2px;
    }

    .related-product-enquire {
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

    .related-product-enquire:hover {
        background: #ff6b35;
        transform: translateY(-2px);
    }

    /* ========== ENQUIRY SECTION ========== */
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

    /* ========== RESPONSIVE DESIGN ========== */
    @media (max-width: 1200px) {
        .product-detail-layout {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .related-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .product-features {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .product-detail-section {
            padding: 95px 10px 40px;
        }

        .product-detail-layout {
            gap: 30px;
        }

        .product-detail-title {
            font-size: 24px;
        }

        .product-pricing {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
        }

        .price-value {
            font-size: 20px;
        }

        .gallery-thumbnails {
            grid-template-columns: repeat(4, 1fr);
        }

        .related-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }

        .related-product-card-img {
            height: 260px;
        }

        .product-actions {
            gap: 10px;
        }

        .btn-enquiry,
        .btn-secondary {
            padding: 14px 24px;
            font-size: 12px;
        }

        .enquiry-card {
            padding: 40px 20px;
        }

        .form-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .input-group.full-width {
            grid-column: span 1;
        }

        .enquiry-submit-btn {
            width: 100%;
            justify-content: center;
        }

        .enquiry-footer-meta {
            gap: 15px;
            flex-direction: column;
            align-items: center;
        }
    }

    @media (max-width: 576px) {
        .product-detail-container {
            width: 95%;
        }

        .product-detail-section {
            padding: 90px 10px 30px;
        }

        .product-detail-title {
            font-size: 20px;
        }

        .product-pricing {
            padding: 16px;
        }

        .price-value {
            font-size: 18px;
        }

        .gallery-thumbnails {
            grid-template-columns: repeat(3, 1fr);
        }

        .related-grid {
            grid-template-columns: 1fr;
        }

        .section-title {
            font-size: 24px;
        }

        .related-product-card-img {
            height: 240px;
        }
    }
</style>
@endpush

@section('content')
    {{-- SEO only --}}
    @push('head')
        <meta name="description" content="{{ \Illuminate\Support\Str::limit(strip_tags($product->description ?? 'Premium sportswear designed for comfort, durability, and bulk customization.'), 155) }}">
        <meta name="keywords" content="{{ $product->keywords ?: implode(', ', array_filter([
            $product->name,
            $product->category?->name,
            'premium sportswear',
            'custom sportswear',
            'bulk order',
            'sports t-shirt'
        ])) }}">
        <meta property="og:title" content="{{ $product->name }} – Premium Sportswear | KASBN">
        <meta property="og:description" content="{{ \Illuminate\Support\Str::limit(strip_tags($product->description ?? 'Premium sportswear designed for comfort, durability, and bulk customization.'), 155) }}">
        @if($product->images && $product->images->isNotEmpty())
            <meta property="og:image" content="{{ asset('storage/' . $product->images->first()->image_path) }}">
        @endif
    @endpush

    <section class="product-detail-section">
        <div class="product-detail-container">
            <div class="product-detail-layout">
                <div class="product-gallery">
                    <div class="gallery-main" id="mainGallery">
                        @if($product->images && $product->images->count() > 0)
                            <img
                                src="{{ asset('storage/' . $product->images->first()->image_path) }}"
                                alt="{{ $product->name }}"
                                id="mainImage"
                            >
                        @else
                            <i class="fas fa-box"></i>
                        @endif
                    </div>

                    @if($product->images && $product->images->count() > 1)
                        <div class="gallery-thumbnails" id="thumbnailGallery">
                            @foreach($product->images->take(4) as $index => $image)
                                <div class="gallery-thumb @if($index === 0) active @endif" data-image="{{ asset('storage/' . $image->image_path) }}">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" alt="Product image {{ $index + 1 }}">
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="product-info">
                    <div class="product-category-badge">
                        <span>{{ $product->category?->name ?? 'Product' }}</span>
                    </div>

                    <h1 class="product-detail-title">{{ $product->name }}</h1>

                    <div class="product-rating">
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div>
                        <span class="rating-text">Premium Quality Assured</span>
                    </div>

                    @if($product->stock <= 0)
                        <div class="product-stock-status stock-out">
                            <i class="fas fa-times-circle"></i>
                            Out of Stock
                        </div>
                    @elseif($product->stock <= 5)
                        <div class="product-stock-status stock-low">
                            <i class="fas fa-exclamation-circle"></i>
                            Only {{ $product->stock }} Left in Stock
                        </div>
                    @else
                        <div class="product-stock-status stock-in">
                            <i class="fas fa-check-circle"></i>
                            In Stock ({{ $product->stock }} available)
                        </div>
                    @endif

                    <div class="product-pricing">
                        <div class="price-block">
                            <span class="price-label">Retail Price</span>
                            @if($product->bulk_price)
                                <div class="price-old">${{ number_format($product->price, 2) }}</div>
                            @endif
                            <div class="price-value" @if(!$product->bulk_price) style="color: #1a1a1a;" @endif>
                                ${{ number_format($product->price, 2) }}
                            </div>
                        </div>

                        @if($product->bulk_price)
                            <div class="price-block" style="text-align: right;">
                                <span class="price-label" style="color: #ff6b35;">Bulk Pricing</span>
                                <div class="price-value bulk">${{ number_format($product->bulk_price, 2) }}</div>
                                <span class="price-old" style="color: #ff6b35; text-decoration: none;">Per Unit (100+)</span>
                            </div>
                        @endif
                    </div>

                    @if($product->description)
                        <div class="product-description">
                            <span class="description-label">Description</span>
                            <p class="description-text">{{ $product->description }}</p>
                        </div>
                    @endif

                    <div class="product-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Quality Assured & Tested</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Custom Branding Available</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Global Shipping</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Bulk Order Support</span>
                        </div>
                    </div>

                    <div class="product-actions">
                        <button class="btn-enquiry" data-product="{{ $product->name }}" id="enquireBtn" type="button">
                            <i class="fas fa-envelope"></i>
                            Send Enquiry
                        </button>
                        <button class="btn-secondary" type="button" id="shareBtn">
                            <i class="fas fa-share-alt"></i>
                            Share Product
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($relatedProducts->count() > 0)
        <section class="related-products-section">
            <div class="related-products-container">
                <div class="section-header">
                    <div class="section-subtitle">
                        <span class="orange-accent-bar"></span> Explore More
                    </div>
                    <h2 class="section-title">Similar Products You Might Like</h2>
                </div>

                <div class="related-grid">
                    @foreach($relatedProducts as $related)
                        <a href="{{ route('product.show', $related->slug) }}" class="related-product-card">
                            <div class="related-product-card-img">
                                @if($related->images && $related->images->isNotEmpty())
                                    <img src="{{ asset('storage/' . $related->images->first()->image_path) }}" alt="{{ $related->name }}">
                                @else
                                    <i class="fas fa-box"></i>
                                @endif

                                <span class="related-product-tag">{{ $related->category?->name ?? 'Product' }}</span>

                                @if($related->stock <= 0)
                                    <span class="related-product-moq" style="background-color: #dc2626;">Out of stock</span>
                                @elseif($related->stock <= 5)
                                    <span class="related-product-moq" style="background-color: #d97706;">Low Stock</span>
                                @else
                                    <span class="related-product-moq">In Stock</span>
                                @endif
                            </div>

                            <div class="related-product-card-body">
                                <div class="related-product-name">{{ $related->name }}</div>

                                <div class="related-product-desc">
                                    {{ $related->description ?? 'Premium high-performance athletic apparel optimized for international team sports configuration and dynamic training loads.' }}
                                </div>

                                <div class="related-product-specs">
                                    <span class="related-product-spec"><i class="fas fa-check"></i> Quality Assured</span>
                                    <span class="related-product-spec"><i class="fas fa-check"></i> Custom Available</span>
                                </div>
                            </div>

                            <div class="related-product-card-footer">
                                <div class="related-product-footer-pricing-row">
                                    <div>
                                        <div class="related-product-price-label">Retail Price</div>
                                        <div class="related-product-retail-price @if(!$related->bulk_price) no-strike @endif">
                                            ${{ number_format($related->price, 2) }}
                                        </div>
                                    </div>

                                    @if($related->bulk_price)
                                        <div style="text-align: right;">
                                            <div class="related-product-price-label" style="color: #ff6b35;">Bulk Pricing</div>
                                            <div class="related-product-bulk-price">${{ number_format($related->bulk_price, 2) }}</div>
                                        </div>
                                    @endif
                                </div>

                                <span class="related-product-enquire">
                                    <i class="fas fa-eye"></i> View Product
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

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

                <form method="POST" action="{{ route('enquiry.store') }}" class="premium-enquiry-form">
                    @csrf
                    <input type="hidden" name="product_name" value="{{ $product->name }}">
                    <input type="hidden" name="product_slug" value="{{ $product->slug }}">

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
                                <option selected>{{ $product->name }}</option>
                                <option>Other Products</option>
                                <option>Custom Development</option>
                            </select>
                        </div>
                        <div class="input-group">
                            <i class="fas fa-layer-group input-icon"></i>
                            <input type="text" name="volume" placeholder="Estimated Volume (e.g., 250+ units)" required>
                        </div>
                    </div>

                    <div class="input-group full-width">
                        <i class="fas fa-sliders-h input-icon textarea-icon"></i>
                        <textarea name="specifications" id="specifications" rows="4" placeholder="Detail your requirements (sizing, customization, color preferences, quantity, delivery timeline, etc.)..."></textarea>
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

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Product',
            'name' => $product->name,
            'description' => strip_tags($product->description ?? ''),
            'brand' => [
                '@type' => 'Brand',
                'name' => 'KASBN',
            ],
            'offers' => [
                '@type' => 'Offer',
                'priceCurrency' => 'USD',
                'price' => $product->bulk_price ?? $product->price,
                'availability' => $product->stock > 0 ? 'https://schema.org/InStock' : 'https://schema.org/OutOfStock',
            ],
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const thumbnails = document.querySelectorAll('.gallery-thumb');
        const mainImage = document.getElementById('mainImage');
        const enquireBtn = document.getElementById('enquireBtn');
        const specsTextarea = document.getElementById('specifications');
        const shareBtn = document.getElementById('shareBtn');

        thumbnails.forEach(thumb => {
            thumb.addEventListener('click', function() {
                thumbnails.forEach(t => t.classList.remove('active'));
                this.classList.add('active');

                const imageUrl = this.getAttribute('data-image');
                if (mainImage && imageUrl) {
                    mainImage.src = imageUrl;
                }
            });
        });

        if (enquireBtn) {
            enquireBtn.addEventListener('click', function() {
                const productName = this.getAttribute('data-product');

                if (specsTextarea && productName) {
                    specsTextarea.value = `Hi, I am looking for a production run quotation on the following product: "${productName}". Please provide packaging configurations, customization limits, and lead times.`;
                }

                document.querySelector('#quick-enquiry')?.scrollIntoView({ behavior: 'smooth' });
            });
        }

        if (shareBtn) {
            shareBtn.addEventListener('click', async function() {
                const url = window.location.href;

                try {
                    if (navigator.share) {
                        await navigator.share({
                            title: document.title,
                            url: url
                        });
                    } else {
                        await navigator.clipboard.writeText(url);
                        this.innerHTML = '<i class="fas fa-check"></i> Link Copied';
                        setTimeout(() => {
                            this.innerHTML = '<i class="fas fa-share-alt"></i> Share Product';
                        }, 1500);
                    }
                } catch (error) {
                    console.log('Share cancelled or failed');
                }
            });
        }
    });
</script>
@endpush