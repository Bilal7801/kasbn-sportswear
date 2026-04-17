@push('styles')
<style>
/* ===================== HERO ===================== */
.hero {
    min-height: 100vh;
    background: var(--dark);
    position: relative;
    display: flex; align-items: center;
    overflow: hidden;
}
.hero-bg {
    position: absolute; inset: 0;
    background:
        radial-gradient(ellipse 60% 80% at 70% 50%, rgba(201,168,76,0.06) 0%, transparent 70%),
        radial-gradient(ellipse 40% 60% at 20% 80%, rgba(201,168,76,0.04) 0%, transparent 60%);
}
.hero-grid-overlay {
    position: absolute; inset: 0;
    background-image:
        linear-gradient(rgba(201,168,76,0.04) 1px, transparent 1px),
        linear-gradient(90deg, rgba(201,168,76,0.04) 1px, transparent 1px);
    background-size: 60px 60px;
}
.hero-content {
    position: relative; z-index: 2;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 64px;
    align-items: center;
    padding-top: 80px;
}
.hero-eyebrow {
    display: inline-flex; align-items: center; gap: 10px;
    background: rgba(201,168,76,0.1);
    border: 1px solid rgba(201,168,76,0.3);
    padding: 6px 16px;
    font-family: var(--font-cond);
    font-size: 11px; letter-spacing: 3px; text-transform: uppercase;
    color: var(--gold); margin-bottom: 24px;
}
.hero-eyebrow::before {
    content: ''; width: 6px; height: 6px;
    background: var(--gold); border-radius: 50%;
    animation: pulse-ring 2s ease-out infinite;
}
.hero-title {
    font-family: var(--font-display);
    font-size: clamp(56px, 8vw, 96px);
    line-height: 0.9; letter-spacing: 2px;
    color: var(--white); margin-bottom: 8px;
}
.hero-title .accent { color: var(--gold); }
.hero-sub {
    font-family: var(--font-cond);
    font-size: clamp(20px, 3vw, 28px); font-weight: 300;
    letter-spacing: 4px; text-transform: uppercase;
    color: rgba(240,237,230,0.5); margin-bottom: 24px;
}
.hero-desc {
    font-size: 16px; line-height: 1.75;
    color: rgba(240,237,230,0.65);
    max-width: 480px; margin-bottom: 36px;
}
.hero-actions { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 48px; }
.hero-trust { display: flex; gap: 32px; flex-wrap: wrap; }
.hero-trust-item { display: flex; flex-direction: column; gap: 2px; }
.hero-trust-num {
    font-family: var(--font-display); font-size: 32px;
    color: var(--gold); line-height: 1;
}
.hero-trust-label { font-size: 11px; letter-spacing: 2px; text-transform: uppercase; color: var(--muted); }
.hero-visual {
    position: relative; display: flex;
    align-items: center; justify-content: center;
}
.hero-visual-ring {
    position: absolute; width: 420px; height: 420px;
    border-radius: 50%; border: 1px solid rgba(201,168,76,0.15);
    animation: float 6s ease-in-out infinite;
}
.hero-visual-ring:nth-child(2) {
    width: 300px; height: 300px;
    border-color: rgba(201,168,76,0.25); animation-delay: -2s;
}
.hero-badge-grid {
    display: grid; grid-template-columns: 1fr 1fr;
    gap: 12px; z-index: 2; width: 100%; max-width: 380px;
}
.hero-badge {
    background: var(--dark-3); border: 1px solid rgba(201,168,76,0.2);
    padding: 20px; text-align: center;
    clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
}
.hero-badge i { font-size: 28px; color: var(--gold); margin-bottom: 10px; display: block; }
.hero-badge-title {
    font-family: var(--font-cond); font-size: 14px;
    font-weight: 700; letter-spacing: 1px; text-transform: uppercase;
    color: var(--white); margin-bottom: 4px;
}
.hero-badge-sub { font-size: 12px; color: var(--muted); }
@media (max-width: 768px) {
    .hero-content { grid-template-columns: 1fr; padding-top: 100px; }
    .hero-visual { display: none; }
}
</style>
@endpush

<section class="hero">
    <div class="hero-bg"></div>
    <div class="hero-grid-overlay"></div>
    <div class="container">
        <div class="hero-content">
            <div>
                <div class="hero-eyebrow">Sialkot, Pakistan · Est. 1998</div>
                <div class="hero-title">
                    WORLD CLASS<br>
                    <span class="accent">SPORTS</span><br>
                    GOODS
                </div>
                <div class="hero-sub">Leather · Textile · Custom OEM</div>
                <p class="hero-desc">
                    Premium sports equipment manufactured in Sialkot — the sports goods capital of the world. Serving brands, distributors and retailers across 40+ countries with bulk orders, custom branding, and direct factory prices.
                </p>
                <div class="hero-actions">
                    <a href="#enquiry" class="btn-primary"><i class="fas fa-paper-plane"></i> Request Bulk Quote</a>
                    <a href="#products" class="btn-outline"><i class="fas fa-th"></i> Browse Products</a>
                </div>
                <div class="hero-trust">
                    <div class="hero-trust-item">
                        <span class="hero-trust-num shimmer-text">40+</span>
                        <span class="hero-trust-label">Countries Served</span>
                    </div>
                    <div class="hero-trust-item">
                        <span class="hero-trust-num shimmer-text">25+</span>
                        <span class="hero-trust-label">Years Experience</span>
                    </div>
                    <div class="hero-trust-item">
                        <span class="hero-trust-num shimmer-text">500K+</span>
                        <span class="hero-trust-label">Units Exported</span>
                    </div>
                </div>
            </div>

            <div class="hero-visual">
                <div class="hero-visual-ring"></div>
                <div class="hero-visual-ring"></div>
                <div class="hero-badge-grid">
                    <div class="hero-badge">
                        <i class="fas fa-football-ball"></i>
                        <div class="hero-badge-title">Leather Sports</div>
                        <div class="hero-badge-sub">Footballs, Gloves, Mitts</div>
                    </div>
                    <div class="hero-badge">
                        <i class="fas fa-tshirt"></i>
                        <div class="hero-badge-title">Sportswear</div>
                        <div class="hero-badge-sub">Jerseys, Kits, Uniforms</div>
                    </div>
                    <div class="hero-badge">
                        <i class="fas fa-fist-raised"></i>
                        <div class="hero-badge-title">Boxing & MMA</div>
                        <div class="hero-badge-sub">Gloves, Guards, Bags</div>
                    </div>
                    <div class="hero-badge">
                        <i class="fas fa-certificate"></i>
                        <div class="hero-badge-title">OEM / Custom</div>
                        <div class="hero-badge-sub">Your Brand, Our Factory</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
