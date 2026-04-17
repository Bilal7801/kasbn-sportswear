@push('styles')
<style>
.why-section {
    padding: 100px 0; background: var(--dark-2);
    position: relative; overflow: hidden;
}
.why-section::before {
    content: 'WHY US';
    position: absolute; right: -20px; top: 50%;
    transform: translateY(-50%) rotate(90deg);
    font-family: var(--font-display); font-size: 140px;
    color: rgba(201,168,76,0.03); letter-spacing: 10px; pointer-events: none;
}
.why-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 64px; align-items: start; }
.why-features { display: flex; flex-direction: column; gap: 28px; margin-top: 32px; }
.why-feature {
    display: flex; gap: 20px; align-items: flex-start;
    padding: 20px; background: var(--dark-3);
    border-left: 3px solid var(--gold); transition: background 0.2s;
}
.why-feature:hover { background: var(--dark-4); }
.why-feature-icon {
    width: 44px; height: 44px;
    background: rgba(201,168,76,0.1);
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0; font-size: 18px; color: var(--gold);
}
.why-feature-title {
    font-family: var(--font-cond); font-size: 16px; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase; color: var(--white); margin-bottom: 6px;
}
.why-feature-desc { font-size: 14px; color: var(--muted); line-height: 1.6; }
.why-visual-stack { display: flex; flex-direction: column; gap: 16px; }
.why-visual-card { background: var(--dark-3); border: 1px solid rgba(201,168,76,0.1); padding: 28px; }
.why-visual-card-title {
    font-family: var(--font-cond); font-size: 13px;
    letter-spacing: 3px; text-transform: uppercase; color: var(--gold); margin-bottom: 12px;
}
.export-flags { display: flex; flex-wrap: wrap; gap: 8px; }
.export-flag {
    background: var(--dark-4); border: 1px solid rgba(201,168,76,0.15);
    padding: 6px 12px; font-size: 13px; color: var(--light);
    display: flex; align-items: center; gap: 6px;
}
@media (max-width: 768px) { .why-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@php
$features = [
    ['fa-factory','Direct Factory Pricing','No agent, no commission. Buy directly from our production facility and save 20–40% vs resellers.'],
    ['fa-palette','Full Custom & OEM','Custom colours, logos, labels and packaging. We become your silent manufacturer.'],
    ['fa-globe','DDP Worldwide Shipping','Delivered Duty Paid to USA, UK, EU, Middle East and Australia. We handle customs.'],
    ['fa-shield-alt','Quality Guarantee','Each order inspected before dispatch. We offer replacement or refund on any defective unit.'],
    ['fa-clock','Fast Turnaround','48hr samples. 15–25 day production for standard orders. Rush production available.'],
];
$countries = [
    ['🇺🇸','USA'],['🇬🇧','United Kingdom'],['🇩🇪','Germany'],
    ['🇦🇺','Australia'],['🇫🇷','France'],['🇨🇦','Canada'],
    ['🇸🇦','Saudi Arabia'],['🇦🇪','UAE'],['🇳🇱','Netherlands'],
    ['🇧🇷','Brazil'],['🇯🇵','Japan'],['🇿🇦','South Africa'],
];
@endphp

<section class="why-section" id="why-us">
    <div class="container">
        <div class="why-grid">
            <div>
                <div class="section-label fade-up">Manufacturer Advantage</div>
                <h2 class="section-title fade-up">WHY BUY<br><span>FROM US?</span></h2>
                <div class="divider fade-up"></div>
                <p class="fade-up" style="color:var(--muted);font-size:15px;line-height:1.75;max-width:440px;">
                    We are not middlemen. We are the factory. Direct from Sialkot — the city that manufactures 70% of the world's footballs — to your warehouse, with full custom capabilities and competitive wholesale pricing.
                </p>
                <div class="why-features">
                    @foreach($features as $f)
                    <div class="why-feature fade-up">
                        <div class="why-feature-icon"><i class="fas {{ $f[0] }}"></i></div>
                        <div>
                            <div class="why-feature-title">{{ $f[1] }}</div>
                            <div class="why-feature-desc">{{ $f[2] }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="why-visual-stack fade-up">
                <div class="why-visual-card">
                    <div class="why-visual-card-title"><i class="fas fa-globe" style="margin-right:8px"></i>We Export To</div>
                    <div class="export-flags">
                        @foreach($countries as $c)
                        <div class="export-flag">{{ $c[0] }} {{ $c[1] }}</div>
                        @endforeach
                    </div>
                </div>

                <div class="why-visual-card">
                    <div class="why-visual-card-title"><i class="fas fa-shipping-fast" style="margin-right:8px"></i>Accepted Payment Methods</div>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        @foreach(['T/T Bank Transfer','Letter of Credit (L/C)','PayPal','Western Union','Escrow / Alibaba Trade Assurance'] as $pay)
                        <span style="background:var(--dark-4);border:1px solid rgba(201,168,76,0.2);padding:6px 12px;font-size:12px;color:var(--light);">{{ $pay }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="why-visual-card">
                    <div class="why-visual-card-title"><i class="fas fa-box-open" style="margin-right:8px"></i>Minimum Order Quantities</div>
                    <table style="width:100%;border-collapse:collapse;font-size:14px;">
                        @foreach([['Sports Balls','500 pcs'],['Boxing Gloves','200 pairs'],['Sportswear Kits','100 pcs'],['Cricket Equipment','100 pcs'],['OEM / Custom','Negotiable']] as $moq)
                        <tr>
                            <td style="padding:8px 0;border-bottom:1px solid rgba(201,168,76,0.08);color:var(--light);">{{ $moq[0] }}</td>
                            <td style="padding:8px 0;border-bottom:1px solid rgba(201,168,76,0.08);color:var(--gold);font-family:var(--font-cond);font-weight:700;text-align:right;">{{ $moq[1] }}</td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
