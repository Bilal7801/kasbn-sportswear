@push('styles')
<style>
    /* ========== HERO CTA SECTION ========== */
    .hero-cta {
        min-height: 500px;
        background: linear-gradient(135deg, #ff6b35 0%, #ff8552 100%);
        position: relative;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 80px 20px;
        color: white;
    }

    .hero-cta::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(255,255,255,0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255,255,255,0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .hero-cta-content {
        position: relative;
        z-index: 1;
        text-align: center;
        max-width: 700px;
        animation: fadeInUp 0.8s ease-out;
    }

    .hero-cta-tag {
        display: inline-block;
        background: rgba(255,255,255,0.2);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        letter-spacing: 1px;
        text-transform: uppercase;
        margin-bottom: 20px;
        backdrop-filter: blur(10px);
    }

    .hero-cta h2 {
        font-size: clamp(36px, 8vw, 56px);
        font-weight: 900;
        line-height: 1.2;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: -1px;
    }

    .hero-cta p {
        font-size: 18px;
        line-height: 1.6;
        margin-bottom: 30px;
        color: rgba(255,255,255,0.95);
        font-weight: 300;
    }

    .cta-countdown {
        display: flex;
        gap: 20px;
        justify-content: center;
        margin: 40px 0;
        flex-wrap: wrap;
    }

    .countdown-item {
        background: rgba(255,255,255,0.1);
        padding: 20px;
        border-radius: 8px;
        backdrop-filter: blur(10px);
        min-width: 90px;
    }

    .countdown-number {
        font-size: 28px;
        font-weight: 900;
        display: block;
        margin-bottom: 5px;
    }

    .countdown-label {
        font-size: 11px;
        letter-spacing: 1px;
        text-transform: uppercase;
        opacity: 0.9;
    }

    .hero-cta-btn {
        background: white;
        color: #ff6b35;
        padding: 16px 48px;
        border: none;
        font-size: 14px;
        font-weight: 700;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        border-radius: 4px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        text-decoration: none;
        box-shadow: 0 10px 30px rgba(0,0,0,0.2);
    }

    .hero-cta-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 40px rgba(0,0,0,0.3);
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
        .hero-cta {
            min-height: 400px;
            padding: 60px 20px;
        }

        .hero-cta h2 {
            font-size: 32px;
        }

        .hero-cta p {
            font-size: 16px;
        }

        .cta-countdown {
            gap: 10px;
        }

        .countdown-item {
            min-width: 70px;
            padding: 15px;
        }

        .countdown-number {
            font-size: 20px;
        }
    }
</style>
@endpush

<section class="hero-cta" id="featured">
    <div class="hero-cta-content">
        <span class="hero-cta-tag">⚡ Limited Time Offer</span>
        <h2>Summer Collection Sale</h2>
        <p>Get up to 40% off on selected premium sportswear and athletic gear. Don't miss out on the best deals of the season!</p>
        
        <div class="cta-countdown">
            <div class="countdown-item">
                <span class="countdown-number">05</span>
                <span class="countdown-label">Days</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number">14</span>
                <span class="countdown-label">Hours</span>
            </div>
            <div class="countdown-item">
                <span class="countdown-number">32</span>
                <span class="countdown-label">Minutes</span>
            </div>
        </div>

        <a href="{{ route('products') ?? '#' }}" class="hero-cta-btn">Shop Sale Now</a>
    </div>
</section>
