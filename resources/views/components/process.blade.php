{{-- process.blade.php --}}
@push('styles')
<style>
    /* ========== EXECUTION PROTOCOL SECTION (FULLY SYNCHRONISED WITH PRODUCT & WHY-US) ========== */
    .process-section { 
        padding: 120px 20px; /* matched to why-section */
        background: #ffffff; 
        position: relative;
        overflow: hidden;
    }

    /* EXACT SAME TECH GRID AS .hero-tech-grid AND .why-tech-grid */
    .process-tech-grid {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 107, 53, 0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 107, 53, 0.015) 1px, transparent 1px);
        background-size: 30px 30px;
        pointer-events: none;
        z-index: 1;
    }

    /* WATERMARK MIRRORS .hero-kinetic-watermark / .why-kinetic-watermark */
    .process-kinetic-watermark {
        position: absolute;
        top: 20px;
        right: -2%;
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

    /* ASYMMETRIC BRAND SLASH – IDENTICAL TECHNIQUE TO .hero-sport-slash / .why-sport-slash */
    .process-sport-slash {
        position: absolute;
        bottom: 0;
        left: 30%;
        width: 150px;
        height: 100%;
        background: linear-gradient(to top, rgba(255, 107, 53, 0.03), transparent);
        transform: skewX(-25deg);
        pointer-events: none;
        z-index: 1;
    }

    .process-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 3;
    }

    /* ========== HIGH-END EDITORIAL TYPOGRAPHY (LOCKED TO PRODUCT / WHY-US) ========== */
    .process-section .manifesto-tag {
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

    .process-section .orange-accent-dot {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px #ff6b35;
    }

    .process-section .section-title {
        font-size: clamp(38px, 5vw, 56px);
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -1px;
        color: #1a1a1a;
        text-transform: uppercase;
        margin-bottom: 20px;
        animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .process-section .section-title span {
        color: #ff6b35 !important;
        text-shadow: 0 0 30px rgba(255, 107, 53, 0.15);
    }

    .process-section .section-intro-text {
        font-size: 16px;
        line-height: 1.65;
        color: #666666;
        max-width: 600px;
        margin: 0 auto 70px auto;
    }

    /* ========== UTILITY ANIMATION CLASSES ========== */
    .fade-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    /* ========== TECHNICAL PIPELINE GRID ========== */
    .process-steps {
        display: grid; 
        grid-template-columns: repeat(5, 1fr);
        gap: 20px; 
        position: relative;
    }

    /* HIGH-TECH CONNECTING TRACE LINE */
    .process-steps::before {
        content: '';
        position: absolute; 
        top: 36px;
        left: 10%; 
        right: 10%;
        height: 1px;
        background: linear-gradient(90deg, transparent, rgba(26, 26, 26, 0.1), rgba(26, 26, 26, 0.1), transparent);
        z-index: 1;
    }

    /* ACTIVE ORANGE TRACE OVERLAY ON HOVER */
    .process-steps::after {
        content: '';
        position: absolute; 
        top: 36px;
        left: 10%; 
        width: 0;
        height: 1px;
        background: linear-gradient(90deg, #ff6b35, transparent);
        z-index: 1;
        transition: width 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .process-steps:hover::after {
        width: 80%;
    }

    .process-step { 
        text-align: center; 
        padding: 0 10px; 
        position: relative; 
        transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.8s ease-out backwards;
    }

    /* STAGGERED ENTRANCE ANIMATION */
    .process-step:nth-child(1) { animation-delay: 0.1s; }
    .process-step:nth-child(2) { animation-delay: 0.2s; }
    .process-step:nth-child(3) { animation-delay: 0.3s; }
    .process-step:nth-child(4) { animation-delay: 0.4s; }
    .process-step:nth-child(5) { animation-delay: 0.5s; }

    /* TACTICAL CIRCULAR NODE – UNIQUE TO PROCESS, BUT SAME HOVER PHYSICS */
    .process-step-num {
        width: 72px; 
        height: 72px;
        background: #ffffff;
        border: 2px solid #eaeaea;
        border-radius: 50%;
        display: flex; 
        align-items: center; 
        justify-content: center;
        font-family: monospace;
        font-weight: 900;
        font-size: 24px; 
        color: #cccccc;
        margin: 0 auto 25px; 
        position: relative; 
        z-index: 2;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        box-shadow: 0 4px 10px rgba(0,0,0,0.02);
    }

    .process-step:hover .process-step-num {
        border-color: #ff6b35;
        color: #ff6b35;
        background: #ffffff;
        box-shadow: 0 0 25px rgba(255, 107, 53, 0.15);
        transform: scale(1.05);
    }

    .process-step-title {
        font-size: 15px; 
        font-weight: 800;
        letter-spacing: 0.5px; 
        text-transform: uppercase; 
        color: #1a1a1a;
        margin-bottom: 12px;
        transition: color 0.3s ease;
    }

    .process-step:hover .process-step-title {
        color: #ff6b35;
    }

    .process-step-desc { 
        font-size: 13.5px; 
        color: #666666;
        line-height: 1.6; 
    }

    /* ========== KEYFRAMES CHOREOGRAPHY (MATCHED TO PRODUCT & WHY-US) ========== */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ========== RESPONSIVE SYSTEM MEDIA BREAKPOINTS ========== */
    @media (max-width: 1024px) {
        .process-steps { 
            grid-template-columns: repeat(3, 1fr); 
            gap: 40px 20px; 
        }
        .process-steps::before, 
        .process-steps::after { 
            display: none;
        }
        .process-section { padding: 80px 20px; }
    }

    @media (max-width: 768px) {
        .process-section .section-title { font-size: 32px; }
        .process-steps { 
            grid-template-columns: 1fr;
            gap: 40px; 
        }
        .process-step {
            padding: 0 20px;
        }
    }
</style>
@endpush

@php
$steps = [
    ['1','Submit Enquiry','Fill our enquiry form or WhatsApp us with your product requirements and quantities.'],
    ['2','Samples','We send physical samples within 3 to 7 days for your quality evaluation.'],
    ['3','Confirm Order','Agree specs, price and delivery terms. Pay deposit to begin production.'],
    ['4','Production','Your order manufactured under quality control with regular photo updates during production.'],
    ['5','Delivery','Your goods shipped DDP to your door. Full tracking and support until you receive your order.'],
];
@endphp

<section class="process-section" id="process">
    {{-- BACKGROUND DECORATIVE LAYERS (exact same technique as product & why-us) --}}
    <div class="process-tech-grid"></div>
    <div class="process-kinetic-watermark">WORKFLOW</div>
    <div class="process-sport-slash"></div>

    <div class="process-container">
        <div style="text-align:center; position: relative; z-index: 2;">
            <div class="manifesto-tag fade-up">
                <span class="orange-accent-dot"></span> Execution Protocol
            </div>
            <h2 class="section-title">ORDER <span>PROCESS</span></h2>
            <p class="section-intro-text fade-up">Simple, transparent, reliable. From initial blueprint to final deployment in 5 precision steps.</p>
        </div>
        
        <div class="process-steps">
            @foreach($steps as $s)
            <div class="process-step">
                <div class="process-step-num">{{ $s[0] }}</div>
                <div class="process-step-title">{{ $s[1] }}</div>
                <div class="process-step-desc">{{ $s[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>