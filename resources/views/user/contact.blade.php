{{-- resources/views/user/contact.blade.php --}}
@extends('layouts.app')

@section('title', 'Contact Us — SialkotPro Sports')

@push('styles')
<style>
    /* ==================== CONTACT PAGE – WHITE & GREY THEME ==================== */
    .contact-page {
        padding: 100px 0;
        background: #ffffff;
        position: relative;
        overflow: hidden;
        min-height: 80vh;
    }

    /* Rotated "CONTACT" watermark on the right side */
    .contact-page::before {
     
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
        font-family: 'Bebas Neue', sans-serif;
        font-size: 140px;
        color: rgba(0,0,0,0.03);
        letter-spacing: 10px;
        pointer-events: none;
        z-index: 0;
    }

    .contact-page .container {
        position: relative;
        z-index: 2;
    }

    /* ---- Grid ---- */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1.4fr;
        gap: 64px;
        align-items: start;
    }

    /* ---- Override global heading colours inside this section ---- */
    .contact-page .section-label {
        color: #000000 !important;
    }
    .contact-page .section-label::before {
        background: #000000 !important;
    }
    .contact-page .section-title {
        color: #111827 !important;
    }
    .contact-page .section-title span {
        color: #000000 !important;
    }
    .contact-page .divider {
        background: #000000 !important;
    }

    .contact-desc {
        font-size: 15px;
        line-height: 1.75;
        color: #4b5563;
        margin-bottom: 32px;
    }

    /* ---- Contact Info Items ---- */
    .contact-info-item {
        display: flex;
        gap: 14px;
        align-items: flex-start;
        padding: 20px 0;
        border-bottom: 1px solid #e5e7eb;
    }
    .contact-info-icon {
        width: 40px; height: 40px;
        background: rgba(0,0,0,0.05);
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000000;
        font-size: 16px;
        flex-shrink: 0;
    }
    .contact-info-title {
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 13px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #000000;
        margin-bottom: 4px;
    }
    .contact-info-val {
        font-size: 14px;
        color: #111827;
    }

    /* ---- Form Card ---- */
    .contact-form-card {
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        padding: 40px;
    }
    .contact-form-title {
        font-family: 'Bebas Neue', sans-serif;
        font-size: 32px;
        color: #111827;
        margin-bottom: 6px;
    }
    .contact-form-sub {
        font-size: 14px;
        color: #4b5563;
        margin-bottom: 28px;
        padding-bottom: 24px;
        border-bottom: 1px solid #d1d5db;
    }

    .form-group {
        margin-bottom: 18px;
    }
    .form-label {
        display: block;
        font-family: 'Barlow Condensed', sans-serif;
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #111827;
        margin-bottom: 8px;
    }
    .form-control {
        width: 100%;
        background: #ffffff;
        border: 1px solid #d1d5db;
        color: #111827;
        font-family: 'Barlow', sans-serif;
        font-size: 14px;
        padding: 12px 16px;
        outline: none;
        transition: border-color 0.2s;
        border-radius: 2px;
    }
    .form-control:focus {
        border-color: #000000;
    }
    textarea.form-control {
        resize: vertical;
        min-height: 120px;
    }

    .btn-submit {
        width: 100%;
        background: #000000;
        color: #ffffff;
        font-family: 'Barlow Condensed', sans-serif;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 3px;
        text-transform: uppercase;
        border: none;
        padding: 16px;
        cursor: pointer;
        transition: background 0.2s;
        margin-top: 8px;
        clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
    }
    .btn-submit:hover {
        background: #374151;
    }

    .form-note {
        font-size: 12px;
        color: #4b5563;
        margin-top: 12px;
        text-align: center;
    }
    .form-note i {
        color: #000000;
        margin-right: 6px;
    }

    /* ---- Responsive ---- */
    @media (max-width: 768px) {
        .contact-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="contact-page">
    <div class="container">
        <div class="contact-grid">
            {{-- Left Column – Contact Info --}}
            <div class="fade-up">
                <div class="section-label">Get in Touch</div>
                <h2 class="section-title">LET'S<br><span>TALK</span></h2>
                <div class="divider"></div>
                <p class="contact-desc">
                    Have a project in mind, need a quote, or just want to say hello?  
                    We’d love to hear from you. Reach out and we’ll respond within 24 hours.
                </p>

                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div>
                        <div class="contact-info-title">Address</div>
                        <div class="contact-info-val">Sialkot, Punjab, Pakistan</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fas fa-phone"></i></div>
                    <div>
                        <div class="contact-info-title">Phone</div>
                        <div class="contact-info-val">+92 300 1234567</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fas fa-envelope"></i></div>
                    <div>
                        <div class="contact-info-title">Email</div>
                        <div class="contact-info-val">export@sialkotpro.com</div>
                    </div>
                </div>
                <div class="contact-info-item">
                    <div class="contact-info-icon"><i class="fas fa-clock"></i></div>
                    <div>
                        <div class="contact-info-title">Business Hours</div>
                        <div class="contact-info-val">Mon–Sat: 9 AM – 6 PM (PKT)</div>
                    </div>
                </div>
            </div>

            {{-- Right Column – Contact Form --}}
            <div class="contact-form-card fade-up">
                <div class="contact-form-title">SEND A MESSAGE</div>
                <div class="contact-form-sub">Fill in the form and we’ll get back to you quickly.</div>

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Full Name *</label>
                        <input type="text" name="name" class="form-control" placeholder="John Smith" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" placeholder="john@company.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="How can we help?">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Message *</label>
                        <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your requirements..." required></textarea>
                    </div>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-paper-plane" style="margin-right:10px"></i>
                        Send Message
                    </button>
                    <div class="form-note">
                        <i class="fas fa-lock"></i> Your details are safe and confidential.
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection