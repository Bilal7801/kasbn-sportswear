{{-- resources/views/user/enquiry.blade.php --}}
@extends('layouts.app')

@section('title', 'Sportswear Enquiry')

@push('styles')
<style>
    /* ── Page background & watermark positioning ── */
    .enquiry-page {
        padding: 90px 0 70px;
        background: #ffffff;
        position: relative;
        overflow: hidden;
        min-height: 100vh;
        width: 100%;
    }

    /* Large rotated ENQUIRY watermark on the right */
    .enquiry-page::before {
        content: 'ENQUIRY';
        position: absolute;
        right: -20px;
        top: 50%;
        transform: translateY(-50%) rotate(90deg);
        font-family: var(--font-display);
        font-size: 140px;
        color: rgba(0,0,0,0.03);
        letter-spacing: 10px;
        pointer-events: none;
        z-index: 0;
    }

    .enquiry-page .container {
        width: 100%;
        max-width: 100%;
        padding-left: 24px;
        padding-right: 24px;
        margin: 0 auto;
    }

    /* ── Form card ── */
    .enquiry-card {
        width: 100%;
        max-width: 1100px;
        margin: 0 auto;
        background: #f3f4f6;
        border: 1px solid #d1d5db;
        padding: 56px;
        border-radius: 2px;
        position: relative;
        z-index: 2;
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
    }

    .enquiry-title {
        font-family: var(--font-display);
        font-size: 36px;
        color: #111827;
        margin-bottom: 6px;
    }

    .enquiry-subtitle {
        font-size: 14px;
        color: #4b5563;
        margin-bottom: 24px;
        padding-bottom: 24px;
        border-bottom: 1px solid #d1d5db;
    }

    /* ── Product details box ── */
    .product-summary {
        background: #ffffff;
        border: 1px solid #d1d5db;
        padding: 18px;
        border-radius: 2px;
        margin-bottom: 28px;
    }

    .product-summary-title {
        font-family: var(--font-cond);
        font-size: 12px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #111827;
        margin-bottom: 14px;
    }

    .product-summary-inner {
        display: grid;
        grid-template-columns: 120px 1fr;
        gap: 16px;
        align-items: start;
    }

    .product-summary-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 2px;
        border: 1px solid #e5e7eb;
        background: #fff;
    }

    .product-summary-image-placeholder {
        width: 120px;
        height: 120px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #f9fafb;
        border: 1px solid #e5e7eb;
        border-radius: 2px;
        color: #9ca3af;
        font-size: 28px;
    }

    .product-summary-info {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .product-summary-name {
        font-family: var(--font-display);
        font-size: 22px;
        color: #111827;
        line-height: 1.2;
        margin: 0;
    }

    .product-summary-meta {
        font-size: 14px;
        color: #4b5563;
        line-height: 1.5;
    }

    .product-summary-meta strong {
        color: #111827;
    }

    .product-summary-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        width: fit-content;
        margin-top: 6px;
        font-size: 13px;
        color: #000000;
        text-decoration: none;
        font-weight: 600;
    }

    .product-summary-link:hover {
        text-decoration: underline;
    }

    /* ── Two-column row ── */
    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-label {
        display: block;
        font-family: var(--font-cond);
        font-size: 11px;
        letter-spacing: 2px;
        text-transform: uppercase;
        color: #111827;
        margin-bottom: 8px;
    }

    .form-label .required {
        color: #e74c3c;
    }

    .form-control {
        width: 100%;
        background: #ffffff;
        border: 1px solid #d1d5db;
        color: #111827;
        font-family: var(--font-body);
        font-size: 14px;
        padding: 12px 16px;
        outline: none;
        transition: border-color 0.2s;
        border-radius: 2px;
        appearance: none;
        -webkit-appearance: none;
    }

    .form-control:focus {
        border-color: #000000;
    }

    .form-control::placeholder {
        color: #9ca3af;
    }

    select.form-control {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23000000' stroke-width='1.5' fill='none'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 16px center;
        padding-right: 44px;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    /* ── Submit button ── */
    .btn-submit {
        width: 100%;
        background: #000000;
        color: #ffffff;
        font-family: var(--font-cond);
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

    .btn-submit:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    /* ── Alert box ── */
    .alert {
        margin-bottom: 20px;
        padding: 16px;
        border-radius: 2px;
        text-align: center;
        font-size: 14px;
        font-weight: 500;
        border: 1px solid transparent;
    }

    .alert-success {
        background: #f0fdf4;
        color: #166534;
        border-color: #166534;
    }

    .alert-error {
        background: #fef2f2;
        color: #991b1b;
        border-color: #991b1b;
    }

    .alert-warning {
        background: #fffbeb;
        color: #92400e;
        border-color: #92400e;
    }

    /* Note at bottom */
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

    @media (max-width: 640px) {
        .enquiry-page .container {
            padding-left: 14px;
            padding-right: 14px;
        }

        .enquiry-card {
            padding: 28px 18px;
            max-width: 100%;
        }

        .form-row {
            grid-template-columns: 1fr;
        }

        .product-summary-inner {
            grid-template-columns: 1fr;
        }

        .product-summary-image,
        .product-summary-image-placeholder {
            width: 100%;
            height: 220px;
        }
    }
</style>
@endpush

@section('content')
@php
    $hasProduct = !empty($product_name);
@endphp

<div class="enquiry-page">
    <div class="container">
        <div class="enquiry-card">
            <h2 class="enquiry-title">GET A QUOTE</h2>
            <p class="enquiry-subtitle">
                Fill in your requirements and we'll send a full price list within 24 hours.
            </p>

            @if($hasProduct)
                <div class="product-summary">
                    <div class="product-summary-title">Product Details</div>
                    <div class="product-summary-inner">
                        @if(!empty($product_image))
                            <img class="product-summary-image" src="{{ $product_image }}" alt="{{ $product_name }}">
                        @else
                            <div class="product-summary-image-placeholder">
                                <i class="fas fa-box"></i>
                            </div>
                        @endif

                        <div class="product-summary-info">
                            <h3 class="product-summary-name">{{ $product_name }}</h3>

                            @if(!empty($product_category))
                                <div class="product-summary-meta">
                                    <strong>Category:</strong> {{ $product_category }}
                                </div>
                            @endif

                            @if(!empty($product_price))
                                <div class="product-summary-meta">
                                    <strong>Price:</strong> ${{ number_format((float) $product_price, 2) }}
                                </div>
                            @endif

                            @if(!empty($product_slug))
                                <a class="product-summary-link" href="{{ route('product.show', $product_slug) }}">
                                    <i class="fas fa-eye"></i> View product page
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <div id="alertBox" class="hidden"></div>

            <form id="enquiryForm" action="{{ route('enquiry.store') }}" method="POST">
                @csrf

                <input type="hidden" name="product_name" value="{{ $product_name ?? '' }}">
                <input type="hidden" name="product_slug" value="{{ $product_slug ?? '' }}">
                <input type="hidden" name="product_image" value="{{ $product_image ?? '' }}">
                <input type="hidden" name="product_price" value="{{ $product_price ?? '' }}">
                <input type="hidden" name="product_category" value="{{ $product_category ?? '' }}">

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Full Name <span class="required">*</span></label>
                        <input type="text" name="name" required class="form-control" placeholder="John Smith">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Company Name</label>
                        <input type="text" name="company" class="form-control" placeholder="Your Company Ltd">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Email Address <span class="required">*</span></label>
                        <input type="email" name="email" required class="form-control" placeholder="john@company.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Phone / WhatsApp</label>
                        <input type="text" name="phone" class="form-control" placeholder="+1 555 000 0000">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Country <span class="required">*</span></label>
                        <select name="country" required class="form-control">
                            <option value="">Select Country</option>
                            <option value="US">United States 🇺🇸</option>
                            <option value="GB">United Kingdom 🇬🇧</option>
                            <option value="DE">Germany 🇩🇪</option>
                            <option value="FR">France 🇫🇷</option>
                            <option value="AU">Australia 🇦🇺</option>
                            <option value="CA">Canada 🇨🇦</option>
                            <option value="AE">UAE 🇦🇪</option>
                            <option value="SA">Saudi Arabia 🇸🇦</option>
                            <option value="NL">Netherlands 🇳🇱</option>
                            <option value="ES">Spain 🇪🇸</option>
                            <option value="IT">Italy 🇮🇹</option>
                            <option value="TR">Turkey 🇹🇷</option>
                            <option value="CN">China 🇨🇳</option>
                            <option value="JP">Japan 🇯🇵</option>
                            <option value="ZA">South Africa 🇿🇦</option>
                            <option value="BR">Brazil 🇧🇷</option>
                            <option value="NG">Nigeria 🇳🇬</option>
                            <option value="KE">Kenya 🇰🇪</option>
                            <option value="EG">Egypt 🇪🇬</option>
                            <option value="PL">Poland 🇵🇱</option>
                            <option value="SE">Sweden 🇸🇪</option>
                            <option value="NO">Norway 🇳🇴</option>
                            <option value="DK">Denmark 🇩🇰</option>
                            <option value="MX">Mexico 🇲🇽</option>
                            <option value="AR">Argentina 🇦🇷</option>
                            <option value="SG">Singapore 🇸🇬</option>
                            <option value="MY">Malaysia 🇲🇾</option>
                            <option value="NZ">New Zealand 🇳🇿</option>
                            <option value="OT">Other 🌍</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Product Category <span class="required">*</span></label>
                        <select name="product_category" class="form-control" required>
                            <option value="">Select Category</option>
                            <option value="Footballs / Soccer Balls">Footballs / Soccer Balls</option>
                            <option value="Boxing & MMA Gloves">Boxing & MMA Gloves</option>
                            <option value="Cricket Equipment">Cricket Equipment</option>
                            <option value="Hockey Equipment">Hockey Equipment</option>
                            <option value="Sportswear / Jerseys">Sportswear / Jerseys</option>
                            <option value="Rugby Balls">Rugby Balls</option>
                            <option value="Volleyball / Basketball">Volleyball / Basketball</option>
                            <option value="OEM / Custom Product">OEM / Custom Product</option>
                            <option value="Multiple Categories">Multiple Categories</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label">Estimated Quantity</label>
                        <select name="quantity" class="form-control">
                            <option value="">Select Range</option>
                            <option value="100–500 units">100–500 units</option>
                            <option value="500–1,000 units">500–1,000 units</option>
                            <option value="1,000–5,000 units">1,000–5,000 units</option>
                            <option value="5,000–10,000 units">5,000–10,000 units</option>
                            <option value="10,000+ units">10,000+ units</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Custom Branding?</label>
                        <select name="custom_branding" class="form-control">
                            <option value="no">No — Standard Products</option>
                            <option value="logo">Yes — Logo Only</option>
                            <option value="full">Yes — Full Custom Design</option>
                            <option value="oem">Yes — Full OEM / Private Label</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Additional Requirements / Message <span class="required">*</span></label>
                    <textarea name="message" rows="4" required class="form-control"
                        placeholder="Tell us about your specific requirements — sizes, materials, colours, certifications needed, delivery timeline, etc."></textarea>
                </div>

                <button type="submit" id="submitBtn" class="btn-submit">
                    <i class="fas fa-paper-plane" style="margin-right:10px"></i>
                    Send Enquiry — Get Free Quote
                </button>

                <div class="form-note">
                    <i class="fas fa-lock"></i> Your enquiry is private and confidential. We never share your data.
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    document.getElementById('enquiryForm').addEventListener('submit', function(e) {
        e.preventDefault();

        const form = this;
        const btn = document.getElementById('submitBtn');
        const alertBox = document.getElementById('alertBox');
        const formData = new FormData(form);

        btn.disabled = true;
        btn.textContent = 'Submitting...';
        alertBox.className = 'hidden';
        alertBox.textContent = '';

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Accept': 'application/json',
            },
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alertBox.className = 'alert alert-success';
                alertBox.textContent = '✅ ' + data.message;
                form.reset();
            } else {
                let errors = '';
                if (data.errors) {
                    Object.values(data.errors).forEach(err => {
                        errors += err[0] + ' ';
                    });
                }
                alertBox.className = 'alert alert-warning';
                alertBox.textContent = '⚠️ ' + (errors || data.message || 'Please check your inputs.');
            }
        })
        .catch(error => {
            alertBox.className = 'alert alert-error';
            alertBox.textContent = '❌ Something went wrong. Please try again.';
        })
        .finally(() => {
            btn.disabled = false;
            btn.textContent = 'Send Enquiry — Get Free Quote';
            alertBox.scrollIntoView({ behavior: 'smooth', block: 'center' });
        });
    });
</script>
@endpush