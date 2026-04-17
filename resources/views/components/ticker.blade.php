@push('styles')
<style>
.ticker-wrap { background: var(--gold); overflow: hidden; padding: 12px 0; }
.ticker-track {
    display: flex; white-space: nowrap;
    animation: ticker 30s linear infinite;
}
.ticker-item {
    font-family: var(--font-cond); font-size: 13px; font-weight: 700;
    letter-spacing: 3px; text-transform: uppercase; color: var(--dark);
    padding: 0 40px; display: flex; align-items: center; gap: 16px;
}
.ticker-item::before { content: '★'; font-size: 10px; }
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
