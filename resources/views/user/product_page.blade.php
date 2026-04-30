{{-- product_page.blade.php --}}
@extends('layouts.app')

@section('title', 'All Products – Premium Sports Goods Manufacturer | SialkotPro')

@push('styles')
<style>
    /* Product card specific styles (inherits layout CSS variables) */
    .products-section {
        padding: 100px 0;
        background: var(--dark);
    }

    .products-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 48px;
        flex-wrap: wrap;
        gap: 20px;
    }

    .products-filter {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
    }

    /* Search Input Styling */
    .search-container {
        position: relative;
        min-width: 280px;
    }

    .search-input {
        width: 100%;
        background: var(--dark-3);
        border: 1px solid rgba(201, 168, 76, 0.2);
        padding: 10px 15px 10px 40px;
        color: var(--white);
        font-family: var(--font-body);
        font-size: 13px;
        outline: none;
        transition: all 0.3s;
    }

    .search-input:focus {
        border-color: var(--gold);
        background: var(--dark-4);
    }

    .search-icon {
        position: absolute;
        left: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: var(--gold);
        font-size: 14px;
        pointer-events: none;
    }

    .filter-btn {
        background: transparent;
        border: 1px solid rgba(201, 168, 76, 0.25);
        color: var(--muted);
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
        background: var(--gold);
        color: var(--dark);
        border-color: var(--gold);
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
    }

    .product-card {
        background: var(--dark-3);
        border: 1px solid rgba(201, 168, 76, 0.12);
        overflow: hidden;
        transition: border-color 0.3s, transform 0.3s;
        cursor: pointer;
        position: relative;
    }

    .product-card:hover {
        border-color: rgba(201, 168, 76, 0.5);
        transform: translateY(-4px);
    }

    .product-card-img {
        height: 200px;
        background: var(--dark-4);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
    }

    .product-card-img i {
        font-size: 60px;
        color: rgba(201, 168, 76, 0.25);
        transition: color 0.3s, transform 0.3s;
    }

    .product-card:hover .product-card-img i {
        color: rgba(201, 168, 76, 0.5);
        transform: scale(1.1);
    }

    .product-tag {
        position: absolute;
        top: 12px;
        left: 12px;
        background: var(--gold);
        color: var(--dark);
        font-family: var(--font-cond);
        font-size: 10px;
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 4px 10px;
    }

    /* ========== MOQ badge – white text on black ========== */
    .product-moq {
        position: absolute;
        top: 12px;
        right: 12px;
        background: #000000 !important;
        color: #ffffff !important;
        border: 1px solid rgba(255, 255, 255, 0.3);
        font-family: var(--font-cond);
        font-size: 10px;
        letter-spacing: 1px;
        text-transform: uppercase;
        padding: 4px 8px;
    }

    .product-card-body {
        padding: 20px;
    }

    .product-name {
        font-family: var(--font-cond);
        font-size: 18px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--white);
        margin-bottom: 6px;
    }

    .product-desc {
        font-size: 13px;
        color: var(--muted);
        line-height: 1.5;
        margin-bottom: 16px;
    }

    .product-specs {
        display: flex;
        gap: 16px;
        flex-wrap: wrap;
        margin-bottom: 16px;
    }

    .product-spec {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: var(--gold);
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .product-spec i {
        font-size: 9px;
    }

    .product-card-footer {
        border-top: 1px solid rgba(201, 168, 76, 0.1);
        padding: 16px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-price-label {
        font-size: 11px;
        color: var(--muted);
        letter-spacing: 1px;
    }

    .product-price {
        font-family: var(--font-cond);
        font-size: 14px;
        color: var(--gold);
        font-weight: 700;
    }

    .product-enquire {
        background: none;
        border: 1px solid rgba(201, 168, 76, 0.3);
        color: var(--gold);
        font-family: var(--font-cond);
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        padding: 7px 14px;
        cursor: pointer;
        transition: all 0.2s;
        text-decoration: none;
    }

    .product-enquire:hover {
        background: var(--gold);
        color: var(--dark);
    }

    /* ========== Pagination styling ========== */
    .pagination-wrapper {
        margin-top: 48px;
        display: flex;
        justify-content: center;
        gap: 10px;
        flex-wrap: wrap;
    }
    .pagination-btn {
        background: var(--dark-3);
        border: 1px solid rgba(201,168,76,0.15);
        color: var(--muted);
        font-family: var(--font-cond);
        font-size: 13px;
        font-weight: 600;
        letter-spacing: 1px;
        padding: 10px 18px;
        cursor: pointer;
        transition: all 0.2s;
        text-transform: uppercase;
    }
    .pagination-btn:hover {
        background: var(--gold);
        color: var(--dark);
    }
    .pagination-btn.active {
        background: var(--gold);
        color: var(--dark);
        font-weight: 700;
        border-color: var(--gold);
    }
    .pagination-btn:disabled {
        opacity: 0.4;
        pointer-events: none;
    }

    /* Responsive */
    @media (max-width: 1024px) {
        .products-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .products-grid {
            grid-template-columns: 1fr;
        }
        .search-container {
            width: 100%;
        }
    }

    /* Page specific enquiry section (dark theme) */
    .page-enquiry {
        background: var(--dark-2);
        border-top: 1px solid rgba(201, 168, 76, 0.1);
        margin-top: 60px;
        padding: 60px 0;
    }

    .enquiry-card {
        background: var(--dark-3);
        border: 1px solid rgba(201, 168, 76, 0.15);
        padding: 40px;
        max-width: 700px;
        margin: 0 auto;
        text-align: center;
    }

    .enquiry-card .section-title {
        font-size: 32px;
        margin-bottom: 12px;
    }

    .inline-form {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 28px;
        justify-content: center;
    }

    .inline-form input,
    .inline-form select {
        background: var(--dark-4);
        border: 1px solid rgba(201, 168, 76, 0.2);
        padding: 12px 16px;
        font-family: var(--font-body);
        font-size: 14px;
        color: var(--light);
        min-width: 200px;
        flex: 1;
    }

    .inline-form button {
        background: var(--gold);
        color: var(--dark);
        border: none;
        padding: 12px 28px;
        font-family: var(--font-cond);
        font-weight: 700;
        letter-spacing: 2px;
        text-transform: uppercase;
        cursor: pointer;
        transition: 0.2s;
    }

    .inline-form button:hover {
        background: var(--gold-light);
    }
</style>
@endpush

@section('content')
    <section class="products-section" id="products-page">
        <div class="container">
            {{-- Page header / breadcrumb --}}
            <div class="fade-up" style="margin-bottom: 20px;">
                <div class="section-label">Our Catalogue</div>
                <h1 class="section-title">COMPLETE <span>PRODUCT RANGE</span></h1>
                <p class="gold" style="margin-top: 16px; max-width: 600px;">
                    Explore our premium sports goods – from hand-stitched footballs to custom team kits. 
                    All products are available for bulk orders, private label, and worldwide shipping.
                </p>
            </div>

            {{-- Filter + Search Bar --}}
            <div class="products-header fade-up">
                <div class="products-filter">
                    <button class="filter-btn active" data-filter="all">All</button>
                    <button class="filter-btn" data-filter="leather">Leather</button>
                    <button class="filter-btn" data-filter="textile">Textile</button>
                    <button class="filter-btn" data-filter="boxing">Boxing / MMA</button>
                    <button class="filter-btn" data-filter="oem">OEM / Custom</button>
                </div>

                <div class="search-container">
                    <i class="fas fa-search search-icon"></i>
                    <input type="text" id="productSearch" class="search-input" placeholder="Search by product name...">
                </div>
            </div>

            {{-- Products Grid (populated by JS) --}}
            <div class="products-grid stagger-parent" id="productsGrid">
                {{-- Products will be rendered by JavaScript --}}
            </div>

            {{-- Pagination Controls --}}
            <div class="pagination-wrapper fade-up" id="paginationContainer">
                {{-- Page buttons generated by JS --}}
            </div>
        </div>
    </section>

    {{-- Enquiry section --}}
    <section class="page-enquiry" id="quick-enquiry">
        <div class="container">
            <div class="enquiry-card fade-up">
                <div class="section-label" style="justify-content: center;">Request a Quote</div>
                <h2 class="section-title">READY TO ORDER? <span>GET BULK PRICING</span></h2>
                <p style="color: var(--muted); margin: 16px 0;">
                    Tell us your product, quantity, and destination. We’ll reply within 24 hours with a custom quote.
                </p>
                <form method="POST" action="#" class="inline-form">
                    @csrf
                    <input type="text" name="name" placeholder="Your name *" required>
                    <input type="email" name="email" placeholder="Email address *" required>
                    <select name="product_interest">
                        <option value="">I’m interested in...</option>
                        <option>Footballs</option>
                        <option>Boxing Gloves</option>
                        <option>Sportswear / Jerseys</option>
                        <option>Cricket Equipment</option>
                        <option>OEM / Private Label</option>
                    </select>
                    <button type="submit">Send Enquiry →</button>
                </form>
                <p style="font-size: 12px; color: var(--muted); margin-top: 20px;">
                    <i class="fas fa-lock"></i> Confidential & free – no obligation.
                </p>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    // ==================== PRODUCT DATA ====================
  
    const products = [
        {icon:'fa-football-ball',tag:'Leather',filter:'leather',name:'Match Footballs',desc:'FIFA-standard hand-stitched leather footballs. Size 3,4,5. Full custom logo & design.',moq:'MOQ: 500 pcs',specs:['Hand Stitched','Full Custom','FIFA Standard'],price:'From $4.50/pc'},
        {icon:'fa-boxing-glove',tag:'Boxing',filter:'boxing',name:'Boxing Gloves',desc:'Genuine leather & synthetic options. 8oz–18oz. Pro-grade padding, custom colors.',moq:'MOQ: 200 prs',specs:['Genuine Leather','Custom Design','OEM Branding'],price:'From $6.00/pr'},
        {icon:'fa-tshirt',tag:'Textile',filter:'textile',name:'Sports Jerseys',desc:'Sublimation-printed polyester kits. Club, national & custom designs. Full team sets.',moq:'MOQ: 100 pcs',specs:['Sublimation Print','Quick Dry Fabric','Custom Sizes'],price:'From $3.20/pc'},
        {icon:'fa-baseball-ball',tag:'Leather',filter:'leather',name:'Cricket Equipment',desc:'English willow & Kashmir willow bats, leather balls, pads, gloves. Tournament grade.',moq:'MOQ: 100 pcs',specs:['English Willow','Hand Crafted','Export Grade'],price:'From $8.00/pc'},
        {icon:'fa-hockey-puck',tag:'Leather',filter:'leather',name:'Hockey Goods',desc:'FIH-grade field hockey sticks and balls. Composite, fibreglass, wood options.',moq:'MOQ: 150 pcs',specs:['FIH Grade','Composite Available','Club Branding'],price:'From $5.00/pc'},
        {icon:'fa-paint-brush',tag:'OEM',filter:'oem',name:'Private Label / OEM',desc:'Your brand, our factory. Full product development, custom labels, hang tags, packaging.',moq:'MOQ: Varies',specs:['Private Label','Custom Packaging','Artwork Support'],price:'Get Custom Quote'},
        {icon:'fa-futbol',tag:'Leather',filter:'leather',name:'Rugby Balls',desc:'Premium hand-stitched leather rugby balls. Match quality, custom print available.',moq:'MOQ: 300 pcs',specs:['Hand Stitched','Water Resistant','Club Logo'],price:'From $5.50/pc'},
        {icon:'fa-hand-peace',tag:'Boxing',filter:'boxing',name:'MMA & Grappling Gloves',desc:'High-density foam, reinforced stitching. Ideal for training and competition.',moq:'MOQ: 100 prs',specs:['Vegan Leather','Breathable Mesh','Custom Colors'],price:'From $7.20/pr'},
        {icon:'fa-bicycle',tag:'Textile',filter:'textile',name:'Cycling Kits',desc:'Aero-fit jersey & bib shorts. Moisture-wicking fabric, custom sublimation.',moq:'MOQ: 50 sets',specs:['UPF 50+','Pro Fit','Team Design'],price:'From $12.00/set'},
    ];

    // ==================== PAGINATION SETUP ====================
    const itemsPerPage = 6; // 2 rows of 3 columns
    let currentPage = 1;
    let filteredProducts = [...products];

    // DOM elements
    const grid = document.getElementById('productsGrid');
    const paginationContainer = document.getElementById('paginationContainer');
    const searchInput = document.getElementById('productSearch');
    const filterBtns = document.querySelectorAll('.filter-btn');
    let activeFilter = 'all';

    // ==================== RENDER FUNCTIONS ====================
    function renderProductCard(product) {
        return `
            <div class="product-card stagger" data-filter="${product.filter}">
                <div class="product-card-img">
                    <i class="fas ${product.icon}"></i>
                    <span class="product-tag">${product.tag}</span>
                    <span class="product-moq">${product.moq}</span>
                </div>
                <div class="product-card-body">
                    <div class="product-name">${product.name}</div>
                    <div class="product-desc">${product.desc}</div>
                    <div class="product-specs">
                        ${product.specs.map(spec => `<span class="product-spec"><i class="fas fa-check"></i> ${spec}</span>`).join('')}
                    </div>
                </div>
                <div class="product-card-footer">
                    <div>
                        <div class="product-price-label">Bulk Price</div>
                        <div class="product-price">${product.price}</div>
                    </div>
                    <a href="#quick-enquiry" class="product-enquire">Enquire Now</a>
                </div>
            </div>
        `;
    }

    function renderPage(page) {
        const start = (page - 1) * itemsPerPage;
        const end = start + itemsPerPage;
        const pageItems = filteredProducts.slice(start, end);

        grid.innerHTML = pageItems.map(renderProductCard).join('');

        // Re‑attach enquire link smooth scroll (since they are new elements)
        document.querySelectorAll('.product-enquire').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector('#quick-enquiry');
                if (target) target.scrollIntoView({ behavior: 'smooth' });
            });
        });

        renderPagination();
    }

    function renderPagination() {
        const totalPages = Math.ceil(filteredProducts.length / itemsPerPage);
        if (totalPages <= 1) {
            paginationContainer.innerHTML = '';
            return;
        }

        let html = '';
        // Previous button
        html += `<button class="pagination-btn" ${currentPage === 1 ? 'disabled' : ''} data-page="prev"><i class="fas fa-chevron-left"></i></button>`;

        for (let i = 1; i <= totalPages; i++) {
            html += `<button class="pagination-btn ${i === currentPage ? 'active' : ''}" data-page="${i}">${i}</button>`;
        }

        // Next button
        html += `<button class="pagination-btn" ${currentPage === totalPages ? 'disabled' : ''} data-page="next"><i class="fas fa-chevron-right"></i></button>`;

        paginationContainer.innerHTML = html;

        // Add event listeners to page buttons
        paginationContainer.querySelectorAll('.pagination-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const pageAttr = this.getAttribute('data-page');
                if (pageAttr === 'prev') {
                    if (currentPage > 1) currentPage--;
                } else if (pageAttr === 'next') {
                    const total = Math.ceil(filteredProducts.length / itemsPerPage);
                    if (currentPage < total) currentPage++;
                } else {
                    currentPage = parseInt(pageAttr);
                }
                renderPage(currentPage);
            });
        });
    }

    function filterProducts() {
        const searchTerm = searchInput.value.toLowerCase();

        filteredProducts = products.filter(product => {
            const matchesSearch = product.name.toLowerCase().includes(searchTerm);
            const matchesCategory = activeFilter === 'all' || product.filter === activeFilter;
            return matchesSearch && matchesCategory;
        });

        currentPage = 1; // reset to first page after filter
        renderPage(currentPage);
    }

    // ==================== EVENT LISTENERS ====================
    // Filter buttons
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            filterBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');
            activeFilter = this.dataset.filter;
            filterProducts();
        });
    });

    // Search input
    searchInput.addEventListener('input', filterProducts);

    // Initial render
    renderPage(currentPage);
</script>
@endpush