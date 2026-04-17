@push('styles')
<style>
.cert-section {
    padding: 80px 0; background: var(--dark-3);
    border-top: 1px solid rgba(201,168,76,0.1);
    border-bottom: 1px solid rgba(201,168,76,0.1);
}
.cert-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; margin-top: 48px; }
.cert-card {
    background: var(--dark-2); border: 1px solid rgba(201,168,76,0.15);
    padding: 28px 20px; text-align: center; transition: border-color 0.3s;
}
.cert-card:hover { border-color: var(--gold); }
.cert-card i { font-size: 36px; color: var(--gold); margin-bottom: 14px; display: block; }
.cert-name {
    font-family: var(--font-cond); font-size: 16px; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase; color: var(--white); margin-bottom: 6px;
}
.cert-desc { font-size: 13px; color: var(--muted); line-height: 1.5; }
@media (max-width: 1024px) { .cert-grid { grid-template-columns: repeat(2, 1fr); } }
</style>
@endpush

<section class="cert-section" id="certifications">
    <div class="container">
        <div class="fade-up" style="text-align:center;">
            <div class="section-label" style="justify-content:center">Trust & Compliance</div>
            <h2 class="section-title">CERTIFICATIONS &<br><span>COMPLIANCE</span></h2>
        </div>
        <div class="cert-grid fade-up">
            <div class="cert-card stagger">
                <i class="fas fa-certificate"></i>
                <div class="cert-name">ISO 9001:2015</div>
                <div class="cert-desc">International quality management system certification ensuring consistent product quality.</div>
            </div>
            <div class="cert-card stagger">
                <i class="fas fa-shield-alt"></i>
                <div class="cert-name">BSCI Certified</div>
                <div class="cert-desc">Business Social Compliance Initiative — ethical labour standards verified by third-party audit.</div>
            </div>
            <div class="cert-card stagger">
                <i class="fas fa-building"></i>
                <div class="cert-name">SCCI Member</div>
                <div class="cert-desc">Registered member of the Sialkot Chamber of Commerce and Industry since 1998.</div>
            </div>
            <div class="cert-card stagger">
                <i class="fas fa-leaf"></i>
                <div class="cert-name">Oeko-Tex Standard</div>
                <div class="cert-desc">Textile products tested and certified free from harmful substances. Safe for skin contact.</div>
            </div>
        </div>
    </div>
</section>
