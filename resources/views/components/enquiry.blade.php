@push('styles')
<style>
.enquiry-section {
    padding: 100px 0; background: var(--dark);
    position: relative; overflow: hidden;
}
.enquiry-section::before {
    content: '';
    position: absolute; top: -200px; right: -200px;
    width: 600px; height: 600px; border-radius: 50%;
    background: radial-gradient(circle, rgba(201,168,76,0.05) 0%, transparent 70%);
    pointer-events: none;
}
.enquiry-grid { display: grid; grid-template-columns: 1fr 1.4fr; gap: 64px; align-items: start; }
.enquiry-info-item {
    display: flex; gap: 14px; align-items: flex-start;
    padding: 20px 0; border-bottom: 1px solid rgba(201,168,76,0.08);
}
.enquiry-info-icon {
    width: 40px; height: 40px;
    background: rgba(201,168,76,0.1);
    display: flex; align-items: center; justify-content: center;
    color: var(--gold); font-size: 16px; flex-shrink: 0;
}
.enquiry-info-title {
    font-family: var(--font-cond); font-size: 13px;
    letter-spacing: 2px; text-transform: uppercase; color: var(--gold); margin-bottom: 4px;
}
.enquiry-info-val { font-size: 14px; color: var(--light); }
.enquiry-form {
    background: var(--dark-3); border: 1px solid rgba(201,168,76,0.15); padding: 40px;
}
.enquiry-form-title { font-family: var(--font-display); font-size: 32px; color: var(--white); margin-bottom: 6px; }
.enquiry-form-sub {
    font-size: 14px; color: var(--muted); margin-bottom: 28px;
    padding-bottom: 24px; border-bottom: 1px solid rgba(201,168,76,0.1);
}
.form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
.form-group { margin-bottom: 16px; }
.form-label {
    display: block; font-family: var(--font-cond); font-size: 11px;
    letter-spacing: 2px; text-transform: uppercase; color: var(--muted); margin-bottom: 8px;
}
.form-control {
    width: 100%; background: var(--dark-4);
    border: 1px solid rgba(201,168,76,0.15); color: var(--light);
    font-family: var(--font-body); font-size: 14px; padding: 12px 16px;
    outline: none; transition: border-color 0.2s;
    appearance: none; -webkit-appearance: none;
}
.form-control:focus { border-color: var(--gold); }
.form-control::placeholder { color: var(--muted); }
select.form-control {
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23C9A84C' stroke-width='1.5' fill='none'/%3E%3C/svg%3E");
    background-repeat: no-repeat; background-position: right 16px center; padding-right: 44px;
}
textarea.form-control { resize: vertical; min-height: 100px; }
.form-submit {
    width: 100%; background: var(--gold); color: var(--dark);
    font-family: var(--font-cond); font-weight: 700; font-size: 14px;
    letter-spacing: 3px; text-transform: uppercase; border: none;
    padding: 16px; cursor: pointer; transition: background 0.2s; margin-top: 8px;
}
.form-submit:hover { background: var(--gold-light); }
.form-note { font-size: 12px; color: var(--muted); margin-top: 12px; text-align: center; }
.form-note i { color: var(--gold); margin-right: 6px; }
@media (max-width: 768px) {
    .enquiry-grid { grid-template-columns: 1fr; }
    .form-row { grid-template-columns: 1fr; }
}
</style>
@endpush

<section class="enquiry-section" id="enquiry">
    <div class="container">
        <div class="enquiry-grid">
            <div class="fade-up">
                <div class="section-label">Get a Quote</div>
                <h2 class="section-title">START YOUR<br><span>BULK ORDER</span></h2>
                <div class="divider"></div>
                <p style="color:var(--muted);font-size:15px;line-height:1.75;margin-bottom:32px;">
                    Send us your requirements — product type, quantity, delivery destination, and any custom branding needs. We'll reply within 24 hours with a full quotation.
                </p>

                @if(session('success'))
                <div style="background:rgba(201,168,76,0.1);border:1px solid var(--gold);padding:16px;margin-bottom:24px;font-size:14px;color:var(--gold);">
                    <i class="fas fa-check-circle" style="margin-right:8px"></i>{{ session('success') }}
                </div>
                @endif

                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon"><i class="fas fa-envelope"></i></div>
                    <div><div class="enquiry-info-title">Email</div><div class="enquiry-info-val">export@sialkotpro.com</div></div>
                </div>
                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon"><i class="fab fa-whatsapp"></i></div>
                    <div><div class="enquiry-info-title">WhatsApp</div><div class="enquiry-info-val">+92 300 1234567</div></div>
                </div>
                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon"><i class="fas fa-clock"></i></div>
                    <div><div class="enquiry-info-title">Response Time</div><div class="enquiry-info-val">Within 24 hours on business days</div></div>
                </div>
                <div class="enquiry-info-item">
                    <div class="enquiry-info-icon"><i class="fas fa-file-alt"></i></div>
                    <div><div class="enquiry-info-title">Free Samples</div><div class="enquiry-info-val">Available — cost refunded on confirmed order</div></div>
                </div>
            </div>

            <div class="enquiry-form fade-up">
                <div class="enquiry-form-title">GET A QUOTE</div>
                <div class="enquiry-form-sub">Fill in your requirements and we'll send a full price list within 24 hours.</div>

                <form method="POST" action="{{ route('enquiry.store') }}">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Full Name *</label>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="John Smith" required>
                            @error('name')<span style="font-size:12px;color:#e74c3c;">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Company Name</label>
                            <input type="text" class="form-control" name="company" value="{{ old('company') }}" placeholder="Your Company Ltd">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Email Address *</label>
                            <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="john@company.com" required>
                            @error('email')<span style="font-size:12px;color:#e74c3c;">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label class="form-label">Phone / WhatsApp</label>
                            <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" placeholder="+1 555 000 0000">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Country *</label>
                            <select class="form-control" name="country" required>
                                <option value="">Select Country</option>
                                @foreach(['United States','United Kingdom','Germany','Australia','Canada','UAE','Saudi Arabia','France','Netherlands','Other'] as $c)
                                <option {{ old('country') === $c ? 'selected' : '' }}>{{ $c }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Product Category *</label>
                            <select class="form-control" name="product_category" required>
                                <option value="">Select Category</option>
                                @foreach(['Footballs / Soccer Balls','Boxing & MMA Gloves','Cricket Equipment','Hockey Equipment','Sportswear / Jerseys','Rugby Balls','Volleyball / Basketball','OEM / Custom Product','Multiple Categories'] as $cat)
                                <option {{ old('product_category') === $cat ? 'selected' : '' }}>{{ $cat }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label class="form-label">Estimated Quantity</label>
                            <select class="form-control" name="quantity">
                                <option value="">Select Range</option>
                                @foreach(['100–500 units','500–1,000 units','1,000–5,000 units','5,000–10,000 units','10,000+ units'] as $qty)
                                <option {{ old('quantity') === $qty ? 'selected' : '' }}>{{ $qty }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Custom Branding?</label>
                            <select class="form-control" name="custom_branding">
                                <option value="no">No — Standard Products</option>
                                <option value="logo">Yes — Logo Only</option>
                                <option value="full">Yes — Full Custom Design</option>
                                <option value="oem">Yes — Full OEM / Private Label</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Additional Requirements / Message</label>
                        <textarea class="form-control" name="message" placeholder="Tell us about your specific requirements — sizes, materials, colours, certifications needed, delivery timeline, etc.">{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="form-submit">
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
</section>
