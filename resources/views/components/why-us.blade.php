{{-- why-us.blade.php --}}
@push('styles')
<style>
    /* ========== BRAND MANIFESTO SECTION (FULLY SYNCHRONISED WITH PRODUCT PAGE) ========== */
    .why-section {
        padding: 120px 20px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    /* EXACT SAME TECH GRID AS .products-page-hero */
    .why-tech-grid {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 107, 53, 0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 107, 53, 0.015) 1px, transparent 1px);
        background-size: 30px 30px; /* matches hero-tech-grid */
        pointer-events: none;
        z-index: 1;
    }

    /* WATERMARK MIRRORS .hero-kinetic-watermark (size, stroke, opacity) */
    .why-kinetic-watermark {
        position: absolute;
        bottom: -20px;
        left: -2%;
        font-size: clamp(100px, 18vw, 240px);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: -5px;
        color: transparent;
        -webkit-text-stroke: 1px rgba(255, 107, 53, 0.025);
        user-select: none;
        pointer-events: none;
        z-index: 1;
        font-style: italic;
    }

    /* ASYMMETRIC SLASH IDENTICAL TO .hero-sport-slash */
    .why-sport-slash {
        position: absolute;
        top: 0;
        right: 40%;
        width: 150px;
        height: 100%;
        background: linear-gradient(to bottom, rgba(255, 107, 53, 0.03), transparent);
        transform: skewX(-25deg);
        pointer-events: none;
        z-index: 1;
    }

    .why-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 3;
    }

    .why-grid {
        display: grid;
        grid-template-columns: 1.1fr 0.9fr;
        gap: 60px;
        align-items: start;
    }

    /* PILL TAG – PERFECT MATCH FOR .products-hero-subtitle */
    .why-section .manifesto-tag {
        font-size: 13px;
        letter-spacing: 4px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 700;
        margin-bottom: 25px;
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: rgba(255, 107, 53, 0.1);
        padding: 6px 16px;
        border-radius: 50px;
        border: 1px solid rgba(255, 107, 53, 0.2);
    }

    /* ORANGE ACCENT DOT – same dimensions & glow as .orange-accent-bar */
    .why-section .orange-accent-dot {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px #ff6b35;
    }

    /* HEADLINE TYPOGRAPHY LOCKED TO .products-hero-title */
    .why-section .section-title {
        font-size: clamp(38px, 5vw, 56px);
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -1px;
        color: #1a1a1a;
        text-transform: uppercase;
        margin-bottom: 25px;
        animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .why-section .section-title span {
        color: #ff6b35 !important;
        text-shadow: 0 0 30px rgba(255, 107, 53, 0.15);
    }

    .why-section .section-intro-text {
        font-size: 16px;
        line-height: 1.65;
        color: #666666;
        margin-bottom: 45px;
    }

    /* FEATURE LIST – interactive feel reminiscent of product card hover */
    .why-features {
        display: flex;
        flex-direction: column;
    }

    .why-feature {
        display: grid;
        grid-template-columns: 50px 1fr;
        gap: 15px;
        padding: 25px 20px;
        border-top: 1px solid #f0f0f0;
        position: relative;
        border-radius: 4px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.8s ease-out;
    }

    .why-feature:last-child {
        border-bottom: 1px solid #f0f0f0;
    }

    .why-feature:hover {
        background: rgba(255, 107, 53, 0.02);
        transform: translateX(5px);
    }

    /* LEFT BORDER ACCENT – replicates the orange hover trace from product cards */
    .why-feature::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 3px;
        height: 0;
        background: #ff6b35;
        transition: height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .why-feature:hover::after {
        height: 100%;
    }

    .why-index {
        font-size: 13px;
        font-weight: 900;
        color: #cccccc;
        font-family: monospace;
        margin-top: 2px;
        transition: color 0.3s ease;
    }

    .why-feature:hover .why-index {
        color: #ff6b35;
    }

    .why-feature-title {
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #1a1a1a;
        margin-bottom: 6px;
    }

    .why-feature-desc {
        font-size: 14px;
        color: #666666;
        line-height: 1.55;
    }

    /* DARK GLASSMORPHIC CARD – inspired by .enquiry-card */
    .why-visual-stack {
        display: flex;
        flex-direction: column;
        background: rgba(20, 20, 20, 0.95); /* slightly transparent for depth */
        border: 1px solid rgba(255, 107, 53, 0.15);
        padding: 50px 35px;
        border-radius: 12px;
        position: relative;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        animation: fadeInUp 0.8s ease-out;
    }

    .why-visual-card {
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        padding: 30px 0;
    }

    .why-visual-card:first-child { padding-top: 0; }
    .why-visual-card:last-child  { border-bottom: none; padding-bottom: 0; }

    .why-visual-card-title {
        font-size: 11px;
        letter-spacing: 2.5px;
        text-transform: uppercase;
        color: #888888;
        margin-bottom: 20px;
        font-weight: 800;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .why-visual-card-title span {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px #ff6b35;
    }

    /* COUNTRY / PAYMENT CHIPS – exactly .hero-badge-item interactions */
    .export-flags, .payment-methods-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .export-flag, .payment-method {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.07);
        padding: 10px 16px;
        font-size: 12px;
        font-weight: 600;
        color: #e0e0e0;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        border-radius: 4px;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .export-flag:hover, .payment-method:hover {
        background: rgba(255, 107, 53, 0.05);
        border-color: rgba(255, 107, 53, 0.4);
        color: #ff6b35;
        transform: translateY(-3px); /* matches hero badge lift */
    }

    /* MOQ TABLE – clean industrial spec layout */
    .why-visual-card table {
        width: 100%;
        border-collapse: collapse;
    }

    .why-visual-card table td {
        padding: 14px 0;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        font-size: 13px;
        color: #b4b4b4;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .why-visual-card table tr:last-child td { border-bottom: none; }

    .why-visual-card table td:last-child {
        font-weight: 800;
        color: #ffffff;
        text-align: right;
        font-family: monospace;
        font-size: 13.5px;
    }

    /* ANIMATIONS (mirrored from product page) */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); } /* matched hero animation */
        to { opacity: 1; transform: translateY(0); }
    }

    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* RESPONSIVE BREAKPOINTS (aligned with product page grid logic) */
    @media (max-width: 1024px) {
        .why-grid {
            grid-template-columns: 1fr;
            gap: 60px;
        }
        .why-section { padding: 80px 20px; }
    }

    @media (max-width: 768px) {
        .why-visual-stack { padding: 40px 20px; }
        .why-feature { padding: 20px 10px; }
        .why-section .section-title { font-size: 32px; }
    }
</style>
@endpush

@php
    $features = [
        [
            'Direct Factory Pricing',
            'No middlemen markups, no hidden broker premiums. Sourcing directly from our production core optimizes your total landed cost by 20–40%.',
        ],
        [
            'Full Custom & OEM Specification',
            'Engineered completely around your blueprints. Tailor custom performance textiles, brand matrices, sizing arrays, and specialised tooling packaging.',
        ],
        [
            'Streamlined Global Freight Logistics',
            'Consolidated international distribution pipelines. Dispatched seamlessly via secure ocean lanes, scheduled air freight, or priority door-to-door express systems.',
        ],
        [
            'Industrial Quality Guarantee',
            'Multi-tier quality inspections actively enforced before sealing. We back our manufacturing lines with complete batch alignment protection.',
        ],
        [
            'Accelerated Prototyping Pipeline',
            'Dynamic design engineering turnarounds delivered in 3 to 5 working days. Mass production lines fully optimized for high-velocity distribution.',
        ],
    ];

    $countries = [
        ['🇺🇸', 'USA'], ['🇬🇧', 'UK'], ['🇩🇪', 'DE'], ['🇦🇺', 'AUS'], 
        ['🇫🇷', 'FR'], ['🇨🇦', 'CAN'], ['🇸🇦', 'KSA'], ['🇦🇪', 'UAE'], 
        ['🇳🇱', 'NL'], ['🇧🇷', 'BR'], ['🇯🇵', 'JPN'], ['🇿🇦', 'RSA']
    ];
@endphp

<section class="why-section" id="why-us">
    {{-- BACKGROUND DECORATIVE LAYERS (exact same technique as product page) --}}
    <div class="why-tech-grid"></div>
    <div class="why-kinetic-watermark">KASBN MFG</div>
    <div class="why-sport-slash"></div>
    
    <div class="why-container">
        <div class="why-grid">
            
            {{-- LEFT: MANIFESTO + FEATURES --}}
            <div>
                <div class="manifesto-tag">
                    <span class="orange-accent-dot"></span> Factory Blueprint
                </div>
                <h2 class="section-title">Own the source.<br><span>Dominate the market.</span></h2>
                <p class="section-intro-text">
                    We don’t negotiate margins with agents. We operate the machinery. 
                    Strategically engineered in Sialkot—the absolute global epicenter of performance athletic gear—
                    we route cutting-edge apparel directly from our manufacturing floors to your corporate distribution networks.
                </p>
                
                <div class="why-features">
                    @foreach ($features as $index => $f)
                        <div class="why-feature">
                            <div class="why-index">0{{ $index + 1 }}</div>
                            <div>
                                <div class="why-feature-title">{{ $f[0] }}</div>
                                <div class="why-feature-desc">{{ $f[1] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- RIGHT: DARK TECH CARDS (identical vibe to enquiry card) --}}
            <div class="why-visual-stack">
                
                {{-- Global Shipping --}}
                <div class="why-visual-card">
                    <div class="why-visual-card-title">
                        <span></span> Global Logistics Grid
                    </div>
                    <div class="export-flags">
                        @foreach ($countries as $c)
                            <div class="export-flag">
                                <span>{{ $c[0] }}</span> <span>{{ $c[1] }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Payment Methods --}}
                <div class="why-visual-card">
                    <div class="why-visual-card-title">
                        <span></span> Settlement Protocols
                    </div>
                    <div class="payment-methods-grid">
                        @foreach (['T/T Bank Transfer', 'Letter of Credit (L/C)', 'Western Union Secure'] as $pay)
                            <span class="payment-method">{{ $pay }}</span>
                        @endforeach
                    </div>
                </div>

                {{-- MOQ Reference --}}
                <div class="why-visual-card">
                    <div class="why-visual-card-title">
                        <span></span> Minimum Operational Allocations (MOQ)
                    </div>
                    <table>
                        @foreach ([
                            ['Boxing Combat Equipment', '200 Pcs / Array'], 
                            ['Sportswear Uniform Systems', '100 Pairs / Style'], 
                            ['Athletic Fleeces & Hoodies', '200 Pcs / Color'], 
                            ['OEM Specialty Development', 'Negotiable Terms']
                        ] as $moq)
                            <tr>
                                <td>{{ $moq[0] }}</td>
                                <td>{{ $moq[1] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                
            </div>
        </div>
    </div>
</section>