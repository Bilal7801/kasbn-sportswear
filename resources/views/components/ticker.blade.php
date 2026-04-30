@push('styles')
<style>
.ticker-wrap {
    background: #f3f4f6;                /* light grey background */
    overflow: hidden;
    padding: 12px 0;
    border-top: 1px solid #d1d5db;      /* optional subtle top border */
    border-bottom: 1px solid #d1d5db;   /* optional subtle bottom border */
}
.ticker-track {
    display: flex;
    white-space: nowrap;
    animation: ticker 30s linear infinite;
}
.ticker-item {
    font-family: var(--font-cond);
    font-size: 13px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: #111827;                     /* near-black text */
    padding: 0 40px;
    display: flex;
    align-items: center;
    gap: 16px;
}
.ticker-item::before {
    content: '★';
    font-size: 10px;
    color: #000000;                     /* black star */
}
/* Keep the ticker animation keyframes (already defined in layout) */
</style>
@endpush

@php
$items = [
    'ISO 9001:2015 Certified','BSCI Compliant Factory','Free Samples Available',
    'Custom Branding & OEM','MOQ from 100 Units','DDP Worldwide Shipping',
    'Letter of Credit Accepted','Sialkot Chamber Member',
    'Export to 40+ Countries','Halal & Ethical Production',
];
@endphp

<div class="ticker-wrap">
    <div class="ticker-track">
        @foreach(array_merge($items, $items) as $item)
            <span class="ticker-item">{{ $item }}</span>
        @endforeach
    </div>
</div>