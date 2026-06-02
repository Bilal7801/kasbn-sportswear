@push('styles')
<style>
    /* ========== BRAND VALUES SECTION ========== */
    .brand-values {
        padding: 80px 20px;
        background: linear-gradient(135deg, #f9fafb 0%, #f3f4f6 100%);
        position: relative;
    }

    .brand-values::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #ddd, transparent);
    }

    .brand-values-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .brand-values-header {
        text-align: center;
        margin-bottom: 70px;
    }

    .brand-values-header .subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .brand-values-header h2 {
        font-size: clamp(28px, 6vw, 48px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .brand-values-header p {
        font-size: 16px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .values-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 40px;
    }

    .value-card {
        text-align: center;
        animation: fadeInUp 0.8s ease-out;
    }

    .value-card:nth-child(1) { animation-delay: 0.1s; }
    .value-card:nth-child(2) { animation-delay: 0.2s; }
    .value-card:nth-child(3) { animation-delay: 0.3s; }
    .value-card:nth-child(4) { animation-delay: 0.4s; }

    .value-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 25px;
        background: #ff6b35;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
        color: white;
        transition: all 0.3s ease-out;
        box-shadow: 0 10px 30px rgba(255, 107, 53, 0.2);
    }

    .value-card:hover .value-icon {
        transform: translateY(-8px) scale(1.1);
        box-shadow: 0 15px 40px rgba(255, 107, 53, 0.4);
    }

    .value-title {
        font-size: 20px;
        font-weight: 700;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 15px;
    }

    .value-description {
        font-size: 15px;
        color: #666;
        line-height: 1.6;
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
        .brand-values {
            padding: 60px 20px;
        }

        .brand-values-header h2 {
            font-size: 32px;
        }

        .values-grid {
            gap: 30px;
        }

        .value-icon {
            width: 60px;
            height: 60px;
            font-size: 28px;
        }

        .value-title {
            font-size: 16px;
        }

        .value-description {
            font-size: 14px;
        }
    }
</style>
@endpush

<section class="brand-values">
    <div class="brand-values-container">
        <div class="brand-values-header">
            <div class="subtitle">Why Choose Us</div>
            <h2>Premium Quality Guaranteed</h2>
            <p>We're committed to delivering excellence in every product and every customer experience</p>
        </div>

        <div class="values-grid">
            <!-- Quality -->
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-medal"></i>
                </div>
                <h3 class="value-title">Premium Quality</h3>
                <p class="value-description">Crafted with the finest materials and strict quality control. Each product meets international standards.</p>
            </div>

            <!-- Innovation -->
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-rocket"></i>
                </div>
                <h3 class="value-title">Innovation</h3>
                <p class="value-description">Cutting-edge technology and design. We continuously innovate to bring you the best athletic gear.</p>
            </div>

            <!-- Affordability -->
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-tag"></i>
                </div>
                <h3 class="value-title">Best Prices</h3>
                <p class="value-description">Direct from manufacturer pricing. Get premium quality at unbeatable prices without middlemen.</p>
            </div>

            <!-- Customer Support -->
            <div class="value-card">
                <div class="value-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="value-title">24/7 Support</h3>
                <p class="value-description">Dedicated customer service team ready to help. Your satisfaction is our priority.</p>
            </div>
        </div>
    </div>
</section>
