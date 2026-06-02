@push('styles')
<style>
    /* ========== PREMIUM HERO BANNER ========== */
    .hero-banner {
        min-height: 100vh;
        
        /* --- FORCED FULL-WIDTH BREAKOUT TRICK --- */
        /* This breaks the section out of any narrow container grid */
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        /* ---------------------------------------- */

        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        padding: 80px 20px 40px;
    }

    .hero-banner::before {
        content: '';
        position: absolute;
        inset: 0;
        background: radial-gradient(circle at 30% 50%, rgba(255, 107, 53, 0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .hero-banner-content {
        position: relative;
        z-index: 2;
        text-align: center;
        max-width: 800px;
        animation: fadeInDown 1s ease-out;
    }

    .hero-banner-subtitle {
        font-size: 14px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 20px;
        animation: slideUp 0.8s ease-out 0.2s both;
    }

    .hero-banner h1 {
        font-size: clamp(36px, 8vw, 72px);
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: -1px;
        animation: slideUp 0.8s ease-out 0.4s both;
    }

    .hero-banner p {
        font-size: clamp(16px, 2vw, 20px);
        color: #e0e0e0;
        margin-bottom: 40px;
        line-height: 1.6;
        animation: slideUp 0.8s ease-out 0.6s both;
        font-weight: 300;
    }

    .hero-cta-buttons {
        display: flex;
        gap: 20px;
        justify-content: center;
        flex-wrap: wrap;
        animation: slideUp 0.8s ease-out 0.8s both;
    }

    .btn-primary-hero {
        background: #ff6b35;
        color: white;
        padding: 14px 40px;
        border: 2px solid #ff6b35;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-block;
    }

    .btn-primary-hero:hover {
        background: transparent;
        color: #ff6b35;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(255, 107, 53, 0.3);
    }

    .btn-secondary-hero {
        background: transparent;
        color: white;
        padding: 14px 40px;
        border: 2px solid white;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        text-decoration: none;
        display: inline-block;
    }

    .btn-secondary-hero:hover {
        background: white;
        color: #1a1a1a;
        transform: translateY(-2px);
        box-shadow: 0 10px 30px rgba(255, 255, 255, 0.2);
    }

    /* Hero Background Images Carousel */
    .hero-banner-bg {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        z-index: 1;
        opacity: 0.4;
    }

    .hero-image {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        object-fit: cover; /* Keeps image sharp and filling the screen */
        opacity: 0;
        animation: slideImages 20s ease-in-out infinite; /* Continuous looping loop */
    }

    .hero-image:nth-child(1) {
        animation-delay: 0s;
    }

    .hero-image:nth-child(2) {
        animation-delay: 7s;
    }

    .hero-image:nth-child(3) {
        animation-delay: 14s;
    }

    @keyframes slideImages {
        0% {
            opacity: 0;
            transform: scale(1.05);
        }
        10% {
            opacity: 1;
            transform: scale(1);
        }
        90% {
            opacity: 1;
            transform: scale(1);
        }
        100% {
            opacity: 0;
            transform: scale(0.95);
        }
    }

    @keyframes fadeInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Scroll Indicator */
    .scroll-indicator {
        position: absolute;
        bottom: 30px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 3;
        animation: bounce 2s infinite;
    }

    .scroll-indicator svg {
        width: 24px;
        height: 24px;
        stroke: white;
        stroke-width: 2;
        fill: none;
    }

    @keyframes bounce {
        0%, 100% {
            transform: translateX(-50%) translateY(0);
        }
        50% {
            transform: translateX(-50%) translateY(10px);
        }
    }

    @media (max-width: 768px) {
        .hero-banner {
            min-height: 80vh;
            padding: 60px 20px 30px;
            width: 100vw;
            margin-left: -50vw;
            margin-right: -50vw;
        }

        .hero-banner h1 {
            font-size: 36px;
        }

        .hero-banner p {
            font-size: 14px;
        }

        .hero-cta-buttons {
            gap: 10px;
        }

        .btn-primary-hero,
        .btn-secondary-hero {
            padding: 12px 24px;
            font-size: 12px;
        }
    }
</style>
@endpush

<section class="hero-banner">
    <div class="hero-banner-bg">
        <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=1200&q=80" alt="Premium Sports Gear" class="hero-image">
        <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=1200&q=80" alt="Athletic Equipment" class="hero-image">
        <img src="https://images.unsplash.com/photo-1556228578-8c89e6adf883?w=1200&q=80" alt="Sportswear Collection" class="hero-image">
    </div>

    <div class="hero-banner-content">
        <div class="hero-banner-subtitle">Welcome to KASBN</div>
        <h1>ELEVATE YOUR GAME</h1>
        <p>Premium athletic gear and sportswear crafted for champions. Experience the difference quality makes.</p>
        <div class="hero-cta-buttons">
            <a href="{{ route('products') ?? '#' }}" class="btn-primary-hero">Shop Now</a>
            <a href="#featured" class="btn-secondary-hero">Explore Collections</a>
        </div>
    </div>

    <div class="scroll-indicator">
        <svg viewBox="0 0 24 24">
            <path d="M12 5v14M5 12l7 7 7-7"></path>
        </svg>
    </div>
</section>