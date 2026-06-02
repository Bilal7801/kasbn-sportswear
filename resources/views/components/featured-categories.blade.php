@push('styles')
<style>
    /* ========== FEATURED CATEGORIES ========== */
    .featured-categories {
        padding: 80px 20px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
    }

    .featured-categories::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1px;
        background: linear-gradient(90deg, transparent, #ddd, transparent);
    }

    .section-header {
        text-align: center;
        margin-bottom: 60px;
        animation: fadeInUp 0.8s ease-out;
    }

    .section-header .subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .section-header h2 {
        font-size: clamp(28px, 6vw, 48px);
        font-weight: 900;
        color: #1a1a1a;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin-bottom: 20px;
    }

    .section-header p {
        font-size: 16px;
        color: #666;
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.6;
    }

    .categories-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 25px;
        max-width: 1200px;
        margin: 0 auto;
    }

    .category-card {
        position: relative;
        overflow: hidden;
        border-radius: 8px;
        aspect-ratio: 1;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.8s ease-out;
    }

    .category-card:nth-child(1) { animation-delay: 0.1s; }
    .category-card:nth-child(2) { animation-delay: 0.2s; }
    .category-card:nth-child(3) { animation-delay: 0.3s; }
    .category-card:nth-child(4) { animation-delay: 0.4s; }

    .category-card img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .category-card:hover img {
        transform: scale(1.08);
    }

    .category-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.8) 100%);
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        padding: 30px;
        transition: all 0.3s ease-out;
    }

    .category-card:hover .category-overlay {
        background: linear-gradient(135deg, rgba(255,107,53,0.5) 0%, rgba(0,0,0,0.8) 100%);
    }

    .category-name {
        font-size: 24px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-bottom: 10px;
    }

    .category-description {
        font-size: 13px;
        color: rgba(255, 255, 255, 0.9);
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-out;
    }

    .category-card:hover .category-description {
        opacity: 1;
        transform: translateY(0);
    }

    .category-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #ff6b35;
        font-weight: 600;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        margin-top: 15px;
        opacity: 0;
        transform: translateY(10px);
        transition: all 0.3s ease-out;
    }

    .category-card:hover .category-link {
        opacity: 1;
        transform: translateY(0);
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
        .featured-categories {
            padding: 60px 20px;
        }

        .categories-grid {
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
        }

        .category-card {
            aspect-ratio: 1.2;
        }

        .section-header h2 {
            font-size: 32px;
        }
    }
</style>
@endpush

<section class="featured-categories">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div class="section-header">
            <div class="subtitle">Shop by Category</div>
            <h2>Explore Our Collections</h2>
            <p>From running to basketball, cricket to football — we have everything for your sport</p>
        </div>

        <div class="categories-grid">
            <!-- Running & Training -->
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=400&h=400&fit=crop" alt="Running & Training">
                <div class="category-overlay">
                    <div class="category-name">Running</div>
                    <div class="category-description">Performance footwear & apparel</div>
                    <a href="#" class="category-link">
                        Shop <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Football -->
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=400&h=400&fit=crop" alt="Football">
                <div class="category-overlay">
                    <div class="category-name">Football</div>
                    <div class="category-description">Professional grade equipment</div>
                    <a href="#" class="category-link">
                        Shop <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Basketball -->
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1516979187457-635ffe35ff49?w=400&h=400&fit=crop" alt="Basketball">
                <div class="category-overlay">
                    <div class="category-name">Basketball</div>
                    <div class="category-description">Court dominating gear</div>
                    <a href="#" class="category-link">
                        Shop <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- Cricket -->
            <div class="category-card">
                <img src="https://images.unsplash.com/photo-1542909168-82412ba12e31?w=400&h=400&fit=crop" alt="Cricket">
                <div class="category-overlay">
                    <div class="category-name">Cricket</div>
                    <div class="category-description">Premium cricket equipment</div>
                    <a href="#" class="category-link">
                        Shop <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
