@push('styles')
<style>
.process-section { padding: 100px 0; background: var(--dark); }
.process-steps {
    display: grid; grid-template-columns: repeat(5, 1fr);
    gap: 0; margin-top: 60px; position: relative;
}
.process-steps::before {
    content: '';
    position: absolute; top: 36px;
    left: calc(10% + 20px); right: calc(10% + 20px);
    height: 1px;
    background: linear-gradient(90deg, var(--gold) 0%, rgba(201,168,76,0.3) 100%);
}
.process-step { text-align: center; padding: 0 12px; position: relative; }
.process-step-num {
    width: 72px; height: 72px;
    background: var(--dark-3); border: 2px solid var(--gold); border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display); font-size: 28px; color: var(--gold);
    margin: 0 auto 20px; position: relative; z-index: 2;
}
.process-step-title {
    font-family: var(--font-cond); font-size: 14px; font-weight: 700;
    letter-spacing: 1px; text-transform: uppercase; color: var(--white); margin-bottom: 8px;
}
.process-step-desc { font-size: 13px; color: var(--muted); line-height: 1.5; }
@media (max-width: 1024px) {
    .process-steps { grid-template-columns: repeat(3, 1fr); gap: 20px; }
    .process-steps::before { display: none; }
}
@media (max-width: 600px) { .process-steps { grid-template-columns: 1fr 1fr; } }
</style>
@endpush

@php
$steps = [
    ['1','Submit Enquiry','Fill our enquiry form or WhatsApp us with your product requirements and quantities.'],
    ['2','Free Samples','We send physical samples within 48 hours for your quality evaluation. Sample cost refunded on order.'],
    ['3','Confirm Order','Agree specs, price and delivery terms. Pay deposit to begin production.'],
    ['4','Production','Your order manufactured under quality control with regular photo updates during production.'],
    ['5','Delivery','Your goods shipped DDP to your door. Full tracking and customs handled by us.'],
];
@endphp

<section class="process-section" id="process">
    <div class="container">
        <div class="fade-up" style="text-align:center;margin-bottom:0">
            <div class="section-label" style="justify-content:center">How It Works</div>
            <h2 class="section-title">ORDER <span>PROCESS</span></h2>
            <p style="color:var(--muted);font-size:15px;margin-top:12px;">Simple, transparent, reliable. From enquiry to delivery in 5 steps.</p>
        </div>
        <div class="process-steps fade-up">
            @foreach($steps as $s)
            <div class="process-step stagger">
                <div class="process-step-num">{{ $s[0] }}</div>
                <div class="process-step-title">{{ $s[1] }}</div>
                <div class="process-step-desc">{{ $s[2] }}</div>
            </div>
            @endforeach
        </div>
    </div>
</section>
