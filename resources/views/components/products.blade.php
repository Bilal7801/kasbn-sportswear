{{-- resources/views/user/products.blade.php --}}
@extends('layouts.app')

@section('title', 'Products')

@push('styles')
<style>
    /* ── Override body for THIS page only ── */
    body {
        background: #ffffff !important;
        color: #111827 !important;
    }
    ::-webkit-scrollbar-track { background: #f3f4f6 !important; }
    ::-webkit-scrollbar-thumb { background: #9ca3af !important; }
    ::selection { background: #000000; color: #ffffff; }

    /* ── Section background + WATERMARK ── */
    .products-section {
        padding: 100px 0;
        background: #ffffff;
        position: relative;          /* needed for watermark positioning */
        overflow: hidden;            /* keep the watermark inside */
    }

    /* Giant vertical "PRODUCTS" watermark – exactly like ENQUIRY */
    .products-section::before {
        content: 'PRODUCTS';
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
        font-family: var(--font-display);
        font-size: 140px;
        color: rgba(0,0,0,0.03);
        letter-spacing: 10px;
        pointer-events: none;
        z-index: 0;
    }

    /* Ensure the container sits above the watermark */
    .products-section .container {
        position: relative;
        z-index: 2;
    }

    /* ── Force all global classes used in this section ── */
    .products-section .section-label,
    .section-label {
        color: #000000 !important;
    }
    .products-section .section-label::before,
    .section-label::before {
        background: #000000 !important;
    }

    .products-section .section-title,
    .section-title {
        color: #111827 !important;
    }
    .products-section .section-title span,
    .section-title span {
        color: #000000 !important;
    }

    /* Filter buttons */
    .products-filter { display: flex; gap: 8px; flex-wrap: wrap; }
    .filter-btn {
        background: transparent;
        border: 1px solid #d1d5db;
        color: #4b5563;
        font-family: var(--font-cond);
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 8px 18px;
        cursor: pointer;
        transition: all 0.2s;
    }
    .filter-btn:hover,
    .filter-btn.active {
        background: #000000;
        color: #ffffff;
        border-color: #000000;
    }

    /* Grid & Cards */
    .products-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .product-card {
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        overflow: hidden;
        transition: border-color 0.3s, transform 0.3s;
        cursor: pointer;
        position: relative;
    }
    .product-card:hover { border-color: #000000; transform: translateY(-4px); }
    .product-card-img {
        height: 200px;
        background: #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }
    .product-card-img i { font-size: 60px; color: rgba(0,0,0,0.1); transition: color 0.3s, transform 0.3s; }
    .product-card:hover .product-card-img i { color: rgba(0,0,0,0.3); transform: scale(1.1); }

    /* Tag (top left) */
    .product-tag {
        position: absolute; top: 12px; left: 12px;
        background: #000000; color: #ffffff;
        font-family: var(--font-cond); font-size: 10px; font-weight: 700;
        letter-spacing: 2px; text-transform: uppercase; padding: 4px 10px;
    }

    /* MOQ badge (top right) – WHITE text forced */
    .product-moq {
        position: absolute; top: 12px; right: 12px;
        background: #000000;                     /* solid black background */
        color: #ffffff !important;               /* WHITE text, overrides any global */
        border: none;                            /* no border needed */
        font-family: var(--font-cond); font-size: 10px; letter-spacing: 1px;
        text-transform: uppercase; padding: 4px 8px;
    }

    .product-card-body { padding: 20px; }
    .product-name {
        font-family: var(--font-cond); font-size: 18px; font-weight: 700;
        letter-spacing: 1px; text-transform: uppercase; color: #111827; margin-bottom: 6px;
    }
    .product-desc { font-size: 13px; color: #4b5563; line-height: 1.5; margin-bottom: 16px; }
    .product-specs { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 16px; }
    .product-spec { font-size: 11px; letter-spacing: 1px; text-transform: uppercase; color: #111827; display: flex; align-items: center; gap: 5px; }
    .product-spec i { font-size: 9px; color: #000000; }

    .product-card-footer {
        border-top: 1px solid #d1d5db;
        padding: 16px 20px;
        display: flex; justify-content: space-between; align-items: center;
    }
    .product-price-label { font-size: 11px; color: #4b5563; letter-spacing: 1px; }
    .product-price { font-family: var(--font-cond); font-size: 14px; color: #000000; font-weight: 700; }
    .product-enquire {
        background: none; border: 1px solid #000000; color: #000000;
        font-family: var(--font-cond); font-size: 11px; letter-spacing: 2px;
        text-transform: uppercase; padding: 7px 14px; cursor: pointer;
        transition: all 0.2s; text-decoration: none;
    }
    .product-enquire:hover { background: #000000; color: #ffffff; }

    @media (max-width: 1024px) { .products-grid { grid-template-columns: repeat(2, 1fr); } }
    @media (max-width: 600px) { .products-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@php
    $products = [
        [
            'icon' => 'fa-football-ball',
            'tag' => 'Leather',
            'filter' => 'leather',
            'name' => 'Match Footballs',
            'desc' =>
                'FIFA-standard hand-stitched leather footballs. Available in size 3, 4, 5. Full custom logo & design.',
            'moq' => 'MOQ: 500 pcs',
            'specs' => ['Hand Stitched', 'Full Custom', 'FIFA Standard'],
            'price' => 'From $4.50/pc',
        ],
        [
            'icon' => 'fa-boxing-glove',
            'tag' => 'Boxing',
            'filter' => 'boxing',
            'name' => 'Boxing Gloves',
            'desc' => 'Genuine leather and synthetic options. 8oz–18oz. Pro-grade padding with custom colour ways.',
            'moq' => 'MOQ: 200 prs',
            'specs' => ['Genuine Leather', 'Custom Design', 'OEM Branding'],
            'price' => 'From $6.00/pr',
        ],
        [
            'icon' => 'fa-tshirt',
            'tag' => 'Textile',
            'filter' => 'textile',
            'name' => 'Sports Jerseys',
            'desc' => 'Sublimation-printed polyester kits. Club, national & custom designs. Full team sets available.',
            'moq' => 'MOQ: 100 pcs',
            'specs' => ['Sublimation Print', 'Quick Dry Fabric', 'Custom Sizes'],
            'price' => 'From $3.20/pc',
        ],
        [
            'icon' => 'fa-baseball-ball',
            'tag' => 'Leather',
            'filter' => 'leather',
            'name' => 'Cricket Equipment',
            'desc' => 'English willow & Kashmir willow bats, leather balls, pads and gloves. Tournament grade.',
            'moq' => 'MOQ: 100 pcs',
            'specs' => ['English Willow', 'Hand Crafted', 'Export Grade'],
            'price' => 'From $8.00/pc',
        ],
        [
            'icon' => 'fa-hockey-puck',
            'tag' => 'Leather',
            'filter' => 'leather',
            'name' => 'Hockey Goods',
            'desc' => 'FIH-grade field hockey sticks and balls. Composite, fibreglass and wood options available.',
            'moq' => 'MOQ: 150 pcs',
            'specs' => ['FIH Grade', 'Composite Available', 'Club Branding'],
            'price' => 'From $5.00/pc',
        ],
        [
            'icon' => 'fa-paint-brush',
            'tag' => 'OEM',
            'filter' => 'oem',
            'name' => 'Private Label / OEM',
            'desc' => 'Your brand, our factory. Full product development, custom labels, hang tags, and packaging.',
            'moq' => 'MOQ: Varies',
            'specs' => ['Private Label', 'Custom Packaging', 'Artwork Support'],
            'price' => 'Get Custom Quote',
        ],
    ];
@endphp

<section class="products-section">
    <div class="container">
        <div class="products-header fade-up">
            <div>
                <div class="section-label">Product Catalogue</div>
                <h2 class="section-title">WHAT WE<br><span>MANUFACTURE</span></h2>
            </div>
            <div class="products-filter">
                <button class="filter-btn active" data-filter="all">All</button>
                <button class="filter-btn" data-filter="leather">Leather</button>
                <button class="filter-btn" data-filter="textile">Textile</button>
                <button class="filter-btn" data-filter="boxing">Boxing / MMA</button>
                <button class="filter-btn" data-filter="oem">OEM / Custom</button>
            </div>
        </div>

        <div class="products-grid stagger-parent">
            @foreach ($products as $p)
                <div class="product-card stagger" data-filter="{{ $p['filter'] }}">
                    <div class="product-card-img">
                        <i class="fas {{ $p['icon'] }}"></i>
                        <span class="product-tag">{{ $p['tag'] }}</span>
                        <span class="product-moq">{{ $p['moq'] }}</span>
                    </div>
                    <div class="product-card-body">
                        <div class="product-name">{{ $p['name'] }}</div>
                        <div class="product-desc">{{ $p['desc'] }}</div>
                        <div class="product-specs">
                            @foreach ($p['specs'] as $spec)
                                <span class="product-spec"><i class="fas fa-check"></i> {{ $spec }}</span>
                            @endforeach
                        </div>
                    </div>
                    <div class="product-card-footer">
                        <div>
                            <div class="product-price-label">Bulk Price</div>
                            <div class="product-price">{{ $p['price'] }}</div>
                        </div>
                        <a href="#enquiry" class="product-enquire">Enquire Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

@push('scripts')
    <script>
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                const filter = this.dataset.filter;
                document.querySelectorAll('.product-card').forEach(card => {
                    card.style.display = (filter === 'all' || card.dataset.filter === filter) ?
                        'block' : 'none';
                });
            });
        });
    </script>
@endpush