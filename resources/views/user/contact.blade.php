{{-- resources/views/user/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us — SialkotPro Sports')

@push('styles')
<style>
    /* ==================== SECURE COMMUNICATIONS SECTION (FULLY SYNCHRONISED) ==================== */
    .contact-page {
        padding: 120px 20px; /* matched to why-us / process */
        background: #ffffff;
        position: relative;
        overflow: hidden;
        min-height: 80vh;
    }

    /* EXACT SAME TECH GRID AS HERO, WHY-US, PROCESS */
    .contact-tech-grid {
        position: absolute;
        inset: 0;
        background-image: 
            linear-gradient(rgba(255, 107, 53, 0.015) 1px, transparent 1px),
            linear-gradient(90deg, rgba(255, 107, 53, 0.015) 1px, transparent 1px);
        background-size: 30px 30px;
        pointer-events: none;
        z-index: 1;
    }

    /* WATERMARK — SIZE, STROKE, OPACITY PERFECTLY MATCHED */
    .contact-kinetic-watermark {
        position: absolute;
        top: 20%;
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

    /* ASYMMETRIC BRAND SLASH — IDENTICAL TECHNIQUE TO OTHER SECTIONS */
    .contact-sport-slash {
        position: absolute;
        top: 0;
        right: 30%;
        width: 150px;
        height: 100%;
        background: linear-gradient(to bottom, rgba(255, 107, 53, 0.03), transparent);
        transform: skewX(-25deg);
        pointer-events: none;
        z-index: 1;
    }

    .contact-container {
        max-width: 1200px;
        margin: 0 auto;
        position: relative;
        z-index: 3;
    }

    /* ---- Grid ---- */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.1fr;
        gap: 80px;
        align-items: start;
    }

    /* ========== HIGH-END EDITORIAL TYPOGRAPHY (LOCKED TO WHY-US / PROCESS) ========== */
    .contact-page .manifesto-tag {
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

    .contact-page .orange-accent-dot {
        width: 6px;
        height: 6px;
        background: #ff6b35;
        border-radius: 50%;
        display: inline-block;
        box-shadow: 0 0 8px #ff6b35;
    }

    .contact-page .section-title {
        font-size: clamp(38px, 5vw, 56px);
        font-weight: 900;
        line-height: 1.1;
        letter-spacing: -1px;
        color: #1a1a1a;
        text-transform: uppercase;
        margin-bottom: 25px;
        animation: fadeInDown 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .contact-page .section-title span {
        color: #ff6b35 !important;
        text-shadow: 0 0 30px rgba(255, 107, 53, 0.15);
    }

    .contact-page .section-intro-text {
        font-size: 16px;
        line-height: 1.65;
        color: #666666;
        margin-bottom: 45px;
    }

    /* ---- Industrial Contact Info List (matches why-feature style exactly) ---- */
    .contact-features {
        display: flex;
        flex-direction: column;
    }

    .contact-info-item {
        display: grid;
        grid-template-columns: 45px 1fr;
        gap: 15px;
        padding: 20px;
        border-top: 1px solid #f0f0f0;
        position: relative;
        border-radius: 4px;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        animation: fadeInUp 0.8s ease-out backwards;
    }

    .contact-info-item:nth-child(1) { animation-delay: 0.1s; }
    .contact-info-item:nth-child(2) { animation-delay: 0.2s; }
    .contact-info-item:nth-child(3) { animation-delay: 0.3s; }
    .contact-info-item:nth-child(4) { animation-delay: 0.4s; border-bottom: 1px solid #f0f0f0; }

    .contact-info-item:hover {
        background: rgba(255, 107, 53, 0.02);
        transform: translateX(5px);
    }

    .contact-info-item::after {
        content: '';
        position: absolute;
        top: 0; left: 0;
        width: 3px; height: 0;
        background: #ff6b35;
        transition: height 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .contact-info-item:hover::after { height: 100%; }

    .contact-info-icon {
        width: 45px; height: 45px;
        background: #ffffff;
        border: 1px solid #eaeaea;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #cccccc;
        font-size: 16px;
        transition: all 0.3s ease;
    }

    .contact-info-item:hover .contact-info-icon {
        border-color: #ff6b35;
        color: #ff6b35;
        box-shadow: 0 4px 15px rgba(255, 107, 53, 0.15);
    }

    .contact-info-title {
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        color: #999999;
        margin-bottom: 4px;
        font-family: monospace;
    }

    .contact-info-val {
        font-size: 15px;
        color: #1a1a1a;
        font-weight: 600;
    }

    /* ========== DARK GLASSMORPHIC FORM CARD (mirrors enquiry-card from product page) ========== */
    .contact-form-card {
        background: rgba(20, 20, 20, 0.95);
        border: 1px solid rgba(255, 107, 53, 0.15);
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        padding: 50px 40px;
        border-radius: 12px;
        position: relative;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 0.8s ease-out;
    }

    /* Removed previous top-edge glow to match enquiry card exactly */

    .contact-form-title {
        font-size: 24px;
        font-weight: 900;
        color: #ffffff;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .contact-form-sub {
        font-size: 14px;
        color: #888888;
        margin-bottom: 30px;
        padding-bottom: 25px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.05);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-label {
        display: block;
        font-size: 11px;
        font-family: monospace;
        letter-spacing: 1px;
        text-transform: uppercase;
        color: #999999;
        margin-bottom: 8px;
        font-weight: 600;
    }

    /* Technical Input Fields – identical to enquiry form inputs */
    .form-control {
        width: 100%;
        background: rgba(255, 255, 255, 0.02);
        border: 1px solid rgba(255, 255, 255, 0.08);
        color: #ffffff;
        font-size: 14px;
        padding: 14px 16px;
        outline: none;
        transition: all 0.3s ease;
        border-radius: 6px; /* matched to enquiry inputs */
    }

    .form-control::placeholder {
        color: #555555;
    }

    .form-control:focus {
        border-color: #ff6b35;
        background: rgba(255, 107, 53, 0.03);
        box-shadow: 0 0 15px rgba(255, 107, 53, 0.1);
    }

    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    /* Precision Strike Button – hover matches enquiry-submit-btn exactly */
    .btn-submit {
        width: 100%;
        background: #ff6b35;
        color: #ffffff;
        font-weight: 800;
        font-size: 14px;
        letter-spacing: 2px;
        text-transform: uppercase;
        border: none;
        padding: 18px;
        cursor: pointer;
        transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        margin-top: 10px;
        clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 12px, 100% 100%, 12px 100%, 0 calc(100% - 12px));
        position: relative;
    }

    .btn-submit:hover {
        background: #ffffff;
        color: #121212;
        transform: translateY(-3px);
        box-shadow: 0 12px 30px rgba(255, 255, 255, 0.15);
    }

    .form-note {
        font-size: 12px;
        color: #666666;
        margin-top: 16px;
        text-align: center;
        font-family: monospace;
    }
    .form-note i {
        color: #ff6b35;
        margin-right: 6px;
    }

    /* ========== UTILITY ANIMATION CLASS ========== */
    .fade-up {
        animation: fadeInUp 0.8s ease-out forwards;
    }

    /* ========== KEYFRAMES (matched to all sections: -30px/30px) ========== */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-30px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(30px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* ========== RESPONSIVE SYSTEM ========== */
    @media (max-width: 1024px) {
        .contact-grid { gap: 40px; }
        .contact-page { padding: 80px 20px; } /* aligned with why-us/process */
        .contact-form-card { padding: 40px 30px; }
    }

    @media (max-width: 768px) {
        .contact-grid { grid-template-columns: 1fr; }
        .contact-page .section-title { font-size: 32px; }
        .contact-form-card { padding: 35px 20px; }
    }
</style>
@endpush

@section('content')
<div class="contact-page">
    <div class="contact-tech-grid"></div>
    <div class="contact-kinetic-watermark">COMMUNICATIONS</div>
    <div class="contact-sport-slash"></div>

    <div class="contact-container">
        <div class="contact-grid">
            
            {{-- Left Column – Contact Info --}}
            <div>
                <div class="manifesto-tag fade-up">
                    <span class="orange-accent-dot"></span> Secure Comm-Link
                </div>
                <h2 class="section-title fade-up">LET'S<br><span>TALK</span></h2>
                <p class="section-intro-text fade-up">
                    Have a custom project in mind, need a production quote, or require immediate supply chain assistance? Our technical team operates on rapid-response protocols. Reach out and we’ll dispatch a response within 24 hours.
                </p>

                <div class="contact-features">
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <div class="contact-info-title">Headquarters</div>
                            <div class="contact-info-val">Sialkot, Punjab, Pakistan</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <div class="contact-info-title">Direct Line</div>
                            <div class="contact-info-val">+92 300 1234567</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <div class="contact-info-title">Global Email</div>
                            <div class="contact-info-val">export@sialkotpro.com</div>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                        <div>
                            <div class="contact-info-title">Operational Hours</div>
                            <div class="contact-info-val">Mon–Sat: 9 AM – 6 PM (PKT)</div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Column – Dark Glassmorphic Form Card (mirrors enquiry-card) --}}
            <div class="contact-form-card">
                <div class="contact-form-title">Dispatch Message</div>
                <div class="contact-form-sub">Initiate a secure inquiry. All fields marked with (*) are mandatory.</div>

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Authorized Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="John Smith" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Secure Email *</label>
                        <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subject Protocol</label>
                        <input type="text" name="subject" class="form-control" placeholder="Manufacturing Inquiry / Quote">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Transmission Details *</label>
                        <textarea name="message" class="form-control" placeholder="Outline your technical specifications, MOQs, or supply requirements here..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane" style="margin-right:10px"></i>
                        Transmit Request
                    </button>
                    <div class="form-note">
                        <i class="fas fa-shield-alt"></i> End-to-end encrypted. Your data remains strictly confidential.
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endsection