@push('styles')
<style>
    /* ========== COLLECTIONS SECTION ========== */
    .collections {
        padding: 80px 20px;
        background: white;
        position: relative;
    }

    .collections::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #ddd, transparent);
    }

    .collections-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .collections-header .subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .collections-header h2 {
        font-size: clamp(28px, 6vw, 48px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .collections-header p {
        font-size: 16px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .collections-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .collection-item {
        position: relative;
        overflow: hidden;
        border-radius: 12px;
        aspect-ratio: 1.2;
        cursor: pointer;
        animation: fadeInUp 0.8s ease-out;
    }

    .collection-item:nth-child(1) { animation-delay: 0.1s; }
    .collection-item:nth-child(2) { animation-delay: 0.2s; }
    .collection-item:nth-child(3) { animation-delay: 0.3s; }

    .collection-image {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .collection-item:hover .collection-image {
        transform: scale(1.08) rotate(1deg);
    }

    .collection-content {
        position: absolute;
        inset: 0;
        background: linear-gradient(180deg, rgba(0,0,0,0) 0%, rgba(0,0,0,0.7) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 40px;
        transition: all 0.3s ease-out;
        z-index: 1;
    }

    .collection-item:hover .collection-content {
        background: linear-gradient(135deg, rgba(255,107,53,0.3) 0%, rgba(0,0,0,0.8) 100%);
    }

    .collection-label {
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 700;
        margin-bottom: 10px;
    }

    .collection-title {
        font-size: 32px;
        font-weight: 900;
        color: white;
        text-transform: uppercase;
        letter-spacing: -0.5px;
        margin-bottom: 15px;
        line-height: 1.2;
    }

    .collection-description {
        font-size: 14px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 20px;
        line-height: 1.5;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-out;
    }

    .collection-item:hover .collection-description {
        opacity: 1;
        transform: translateY(0);
    }

    .collection-cta {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        color: #ff6b35;
        font-weight: 700;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-decoration: none;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-out;
    }

    .collection-item:hover .collection-cta {
        opacity: 1;
        transform: translateY(0);
        gap: 15px;
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
        .collections {
            padding: 60px 20px;
        }

        .collections-header h2 {
            font-size: 32px;
        }

        .collections-grid {
            grid-template-columns: 1fr;
        }

        .collection-item {
            aspect-ratio: 1.5;
        }

        .collection-title {
            font-size: 24px;
        }

        .collection-description {
            opacity: 1;
            transform: translateY(0);
            font-size: 13px;
        }

        .collection-cta {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

<section class="collections">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="collections-header">
            <div class="subtitle">Curated Collections</div>
            <h2>Discover New Styles</h2>
            <p>Explore our exclusive collections designed for every athlete and sports enthusiast</p>
        </div>

        <div class="collections-grid">
            <!-- Collection 1 - Summer Training -->
            <div class="collection-item">
                <img src="https://images.unsplash.com/photo-1552346154-5425766f2df3?w=500&h=600&fit=crop" alt="Summer Training Collection" class="collection-image">
                <div class="collection-content">
                    <span class="collection-label">New Arrival</span>
                    <h3 class="collection-title">Summer Training</h3>
                    <p class="collection-description">Stay cool and comfortable with our breathable training gear. Perfect for outdoor workouts and intense training sessions.</p>
                    <a href="#" class="collection-cta">
                        Explore <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Collection 2 - Professional Athletes -->
            <div class="collection-item">
                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=500&h=600&fit=crop" alt="Professional Athletes Collection" class="collection-image">
                <div class="collection-content">
                    <span class="collection-label">Premium</span>
                    <h3 class="collection-title">Pro Athletes</h3>
                    <p class="collection-description">Engineered for champions. Our professional-grade equipment is trusted by elite athletes worldwide.</p>
                    <a href="#" class="collection-cta">
                        Explore <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Collection 3 - Gym & Fitness -->
            <div class="collection-item">
                <img src="https://images.unsplash.com/photo-1534438327276-14e5300c3a48?w=500&h=600&fit=crop" alt="Gym & Fitness Collection" class="collection-image">
                <div class="collection-content">
                    <span class="collection-label">Best Sellers</span>
                    <h3 class="collection-title">Gym & Fitness</h3>
                    <p class="collection-description">Complete your fitness journey with our functional and stylish gym wear. Maximum performance, maximum style.</p>
                    <a href="#" class="collection-cta">
                        Explore <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
