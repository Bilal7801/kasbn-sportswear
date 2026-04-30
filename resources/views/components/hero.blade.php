@push('styles')
<style>
/* ===================== HERO — Same as login left panel ===================== */
.hero {
    min-height: 100vh;
    background: #e5e7eb;                /* Light gray panel background */
    position: relative;
    overflow: hidden;
    display: flex;
    align-items: center;
}

/* ── Grid overlay (black lines, same as login) ── */
.hero::before {
    content: '';
    position: absolute;
    inset: 0;
    z-index: 0;
    background-image:
        linear-gradient(rgba(0,0,0,0.1) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,0,0,0.1) 1px, transparent 1px);
    background-size: 56px 56px;
}

/* ── Scanning line effect ── */
.hero .scan-line {
    position: absolute;
    left: 0;
    right: 0;
    height: 2px;
    z-index: 1;
    background: linear-gradient(90deg, transparent, rgba(0,0,0,0.15), transparent);
    animation: lineScan 6s ease-in-out infinite;
    pointer-events: none;
}
@keyframes lineScan {
    0% { top: -100%; }
    100% { top: 200%; }
}

/* ── Radial glow ── */
.hero .hero-glow {
    position: absolute;
    bottom: -120px;
    right: -120px;
    z-index: 0;
    width: 500px;
    height: 500px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(0,0,0,0.03) 0%, transparent 70%);
    pointer-events: none;
}

/* ── Override body background for this page (if needed) ── */
body {
    background: #ffffff !important;       /* fallback for any dark theme */
}

/* ── Content wrapper (relative so it sits above overlays) ── */
.hero .container {
    position: relative;
    z-index: 2;
}

/* ── Eyebrow (like the form-eyebrow on login) ── */
.hero-eyebrow {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.1);
    padding: 6px 16px;
    font-family: var(--font-cond);
    font-size: 11px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #111827;             /* near black */
    margin-bottom: 24px;
}
.hero-eyebrow::before {
    content: '';
    width: 6px;
    height: 6px;
    background: #000000;
    border-radius: 50%;
    animation: pulse-ring 2s ease-out infinite;
}
/* Pulse ring animation (override gold to black) */
@keyframes pulse-ring {
    0% { transform: scale(1); opacity: 1; }
    100% { transform: scale(2.5); opacity: 0; }
}

/* ── Main title (like .left-tagline) ── */
.hero-title {
    font-family: var(--font-display);
    font-size: clamp(56px, 8vw, 96px);
    line-height: 0.9;
    letter-spacing: 2px;
    color: #111827;             /* near black */
    margin-bottom: 8px;
}
.hero-title .accent {
    display: block;
    background: linear-gradient(90deg, #111827 0%, #4b5563 40%, #111827 70%, #4b5563 100%);
    background-size: 200% auto;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: shimmer 3.5s linear infinite;
}
@keyframes shimmer {
    0% { background-position: -200% center; }
    100% { background-position: 200% center; }
}

/* ── Subtitle ── */
.hero-sub {
    font-family: var(--font-cond);
    font-size: clamp(20px, 3vw, 28px);
    font-weight: 300;
    letter-spacing: 4px;
    text-transform: uppercase;
    color: #4b5563;             /* medium gray */
    margin-bottom: 24px;
}

/* ── Description ── */
.hero-desc {
    font-size: 16px;
    line-height: 1.75;
    color: #4b5563;
    max-width: 480px;
    margin-bottom: 36px;
}

/* ── Buttons (black, same as login) ── */
.hero .btn-primary {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: #000000;
    color: #ffffff;
    font-family: var(--font-cond);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 14px 32px;
    border: none;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, transform 0.15s;
    clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
}
.hero .btn-primary:hover {
    background: #374151;
    transform: translateY(-2px);
}
.hero .btn-outline {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: transparent;
    color: #000000;
    border: 1px solid #000000;
    font-family: var(--font-cond);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 13px 31px;
    cursor: pointer;
    text-decoration: none;
    transition: background 0.2s, color 0.2s, transform 0.15s;
    clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
}
.hero .btn-outline:hover {
    background: #000000;
    color: #ffffff;
    transform: translateY(-2px);
}

/* ── Trust stats (like .left-stats) ── */
.hero-trust {
    display: flex;
    gap: 32px;
    flex-wrap: wrap;
    margin-bottom: 0;
}
.hero-trust-item {
    display: flex;
    flex-direction: column;
    gap: 2px;
}
.hero-trust-num {
    font-family: var(--font-display);
    font-size: 32px;
    color: #111827;             /* near black */
    line-height: 1;
}
.hero-trust-label {
    font-size: 11px;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #4b5563;
}

/* ── Cert chips (like .cert-chip) ── */
.hero-cert-chips {
    display: flex;
    gap: 10px;
    flex-wrap: wrap;
    margin-top: 32px;
}
.hero .chip {
    display: flex;
    align-items: center;
    gap: 7px;
    background: rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.1);
    padding: 7px 14px;
    font-family: var(--font-cond);
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #111827;
}
.hero .chip i {
    color: #111827;
    font-size: 11px;
}

/* ── Right-side badges (recoloured) ── */
.hero-visual {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}
.hero-visual-ring {
    position: absolute;
    width: 420px;
    height: 420px;
    border-radius: 50%;
    border: 1px solid rgba(0,0,0,0.08);
    animation: float 6s ease-in-out infinite;
}
.hero-visual-ring:nth-child(2) {
    width: 300px;
    height: 300px;
    border-color: rgba(0,0,0,0.12);
    animation-delay: -2s;
}
@keyframes float {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-8px); }
}
.hero-badge-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 12px;
    z-index: 2;
    width: 100%;
    max-width: 380px;
}
.hero-badge {
    background: #f3f4f6;
    border: 1px solid #d1d5db;
    padding: 20px;
    text-align: center;
    clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
}
.hero-badge i {
    font-size: 28px;
    color: #000000;
    margin-bottom: 10px;
    display: block;
}
.hero-badge-title {
    font-family: var(--font-cond);
    font-size: 14px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    color: #111827;
    margin-bottom: 4px;
}
.hero-badge-sub {
    font-size: 12px;
    color: #4b5563;
}

/* ── Responsive ── */
@media (max-width: 768px) {
    .hero-content {
        grid-template-columns: 1fr;
        padding-top: 100px;
    }
    .hero-visual {
        display: none;
    }
}
</style>
@endpush

<section class="hero">
    {{-- Scanning line --}}
    <div class="scan-line"></div>
    {{-- Radial glow --}}
    <div class="hero-glow"></div>

    <div class="container">
        <div class="hero-content" style="display:grid; grid-template-columns:1fr 1fr; gap:64px; align-items:center; padding-top:80px;">
            {{-- Left side --}}
            <div>
                <div class="hero-eyebrow">Sialkot, Pakistan · Est. 1998</div>
                <div class="hero-title">
                    WORLD CLASS<br>
                    <span class="accent">SPORTS</span>
                    GOODS
                </div>
                <div class="hero-sub">Leather · Textile · Custom OEM</div>
                <p class="hero-desc">
                    Premium sports equipment manufactured in Sialkot — the sports goods capital of the world. Serving brands, distributors and retailers across 40+ countries with bulk orders, custom branding, and direct factory prices.
                </p>
                <div class="hero-actions" style="display:flex; gap:16px; flex-wrap:wrap; margin-bottom:48px;">
                    <a href="#enquiry" class="btn-primary"><i class="fas fa-paper-plane"></i> Request Bulk Quote</a>
                    <a href="#products" class="btn-outline"><i class="fas fa-th"></i> Browse Products</a>
                </div>
                <div class="hero-trust">
                    <div class="hero-trust-item">
                        <span class="hero-trust-num">40+</span>
                        <span class="hero-trust-label">Countries Served</span>
                    </div>
                    <div class="hero-trust-item">
                        <span class="hero-trust-num">10+</span>
                        <span class="hero-trust-label">Years Experience</span>
                    </div>
                    <div class="hero-trust-item">
                        <span class="hero-trust-num">50K+</span>
                        <span class="hero-trust-label">Units Exported</span>
                    </div>
                </div>
            </div>

            {{-- Right side (badges) --}}
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