@push('styles')
    <style>
        /* ── Section Background ── */
        .why-section {
            padding: 150px 0;
            background: #ffffff;
            /* pure white, matching right panel */
            position: relative;
            overflow: hidden;
        }

        /* Large watermark text */
        .why-section::before {
           
            position: absolute;
            right: -20px;
            top: 50%;
            transform: translateY(-50%) rotate(90deg);
            font-family: var(--font-display);
            font-size: 140px;
            color: rgba(0, 0, 0, 0.03);
            /* black at 3% opacity */
            letter-spacing: 10px;
            pointer-events: none;
        }

        /* ── Grid ── */
        .why-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 64px;
            align-items: start;
        }

        /* ── Override global gold labels / titles / dividers ── */
        .why-section .section-label {
            color: #000000;
            /* black */
        }

        .why-section .section-label::before {
            background: #000000;
            /* black line */
        }

        .why-section .section-title span {
            color: #000000 !important;
            /* black, not gold */
        }

        .why-section .divider {
            background: #000000;
            /* black divider */
        }

        /* ── Description text ── */
        .why-section p {
            color: #4b5563;
            /* medium grey (--text-secondary) */
            font-size: 15px;
            line-height: 1.75;
            max-width: 440px;
        }

        /* ── Feature Cards ── */
        .why-features {
            display: flex;
            flex-direction: column;
            gap: 28px;
            margin-top: 32px;
        }

        .why-feature {
            display: flex;
            gap: 20px;
            align-items: flex-start;
            padding: 20px;
            background: #f3f4f6;
            /* light grey panel (input background) */
            border-left: 3px solid #000000;
            /* black accent border */
            transition: background 0.2s;
        }

        .why-feature:hover {
            background: #e5e7eb;
            /* slightly darker grey on hover */
        }

        .why-feature-icon {
            width: 44px;
            height: 44px;
            background: rgba(0, 0, 0, 0.05);
            /* black with low opacity */
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 18px;
            color: #000000;
            /* black icons */
        }

        .why-feature-title {
            font-family: var(--font-cond);
            font-size: 16px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: #111827;
            /* near black */
            margin-bottom: 6px;
        }

        .why-feature-desc {
            font-size: 14px;
            color: #4b5563;
            /* medium grey */
            line-height: 1.6;
        }

        /* ── Right-side Visual Stack ── */
        .why-visual-stack {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .why-visual-card {
            background: #f3f4f6;
            /* light grey card */
            border: 1px solid #d1d5db;
            /* light border */
            padding: 28px;
        }

        .why-visual-card-title {
            font-family: var(--font-cond);
            font-size: 13px;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #000000;
            /* black */
            margin-bottom: 12px;
            font-weight: 700;
        }

        /* Export flags */
        .export-flags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
        }

        .export-flag {
            background: #e5e7eb;
            /* slightly darker grey */
            border: 1px solid #d1d5db;
            padding: 6px 12px;
            font-size: 13px;
            color: #111827;
            /* near black */
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* Payment methods */
        .why-visual-card .payment-method {
            background: #e5e7eb;
            border: 1px solid #d1d5db;
            padding: 6px 12px;
            font-size: 12px;
            color: #111827;
        }

        /* MOQ Table */
        .why-visual-card table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .why-visual-card table td {
            padding: 8px 0;
            border-bottom: 1px solid #d1d5db;
            color: #111827;
        }

        .why-visual-card table td:last-child {
            font-family: var(--font-cond);
            font-weight: 700;
            color: #000000;
            /* black for quantities */
            text-align: right;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .why-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
@endpush

@php
    $features = [
        [
            'fa-factory',
            'Direct Factory Pricing',
            'No agent, no commission. Buy directly from our production facility and save 20–40% vs resellers.',
        ],
        [
            'fa-palette',
            'Full Custom & OEM',
            'Custom colours, logos, labels and packaging. We become your silent manufacturer.',
        ],
        [
            'fa-globe',
            'Worldwide Shipping',
            'Delivered globally via sea, air or express courier. We handle all logistics and documentation.',
        ],
        [
            'fa-shield-alt',
            'Quality Guarantee',
            'Each order inspected before dispatch. We offer replacement or refund on any defective unit.',
        ],
        [
            'fa-clock',
            'Fast Turnaround',
            '3 to 5 days for samples. 15–30 day production for standard orders. Rush production available.',
        ],
    ];
    $countries = [
        ['🇺🇸', 'USA'],
        ['🇬🇧', 'United Kingdom'],
        ['🇩🇪', 'Germany'],
        ['🇦🇺', 'Australia'],
        ['🇫🇷', 'France'],
        ['🇨🇦', 'Canada'],
        ['🇸🇦', 'Saudi Arabia'],
        ['🇦🇪', 'UAE'],
        ['🇳🇱', 'Netherlands'],
        ['🇧🇷', 'Brazil'],
        ['🇯🇵', 'Japan'],
        ['🇿🇦', 'South Africa'],
    ];
@endphp

<section class="why-section" id="why-us">
    <div class="container">
        <div class="why-grid">
            <div>
                <div class="section-label fade-up" style="font-weight: bold; font-size: 14px">Manufacturer Advantage</div>
                <h2 class="section-title fade-up">WHY BUY<br><span>FROM US?</span></h2>
                <div class="divider fade-up"></div>
                <p class="fade-up">
                    We are not middlemen. We are the factory. Direct from Sialkot — the city that manufactures 70% of
                    the world's footballs — to your warehouse, with full custom capabilities and competitive wholesale
                    pricing.
                </p>
                <div class="why-features">
                    @foreach ($features as $f)
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
                    <div class="why-visual-card-title"><i class="fas fa-globe" style="margin-right:8px"></i>We Export To
                    </div>
                    <div class="export-flags">
                        @foreach ($countries as $c)
                            <div class="export-flag">{{ $c[0] }} {{ $c[1] }}</div>
                        @endforeach
                    </div>
                </div>

                <div class="why-visual-card">
                    <div class="why-visual-card-title"><i class="fas fa-shipping-fast"
                            style="margin-right:8px;"></i>Accepted Payment Methods</div>
                    <div style="display:flex;gap:10px;flex-wrap:wrap;">
                        @foreach (['T/T Bank Transfer', 'Letter of Credit (L/C)', 'Western Union'] as $pay)
                            <span class="payment-method">{{ $pay }}</span>
                        @endforeach
                    </div>
                </div>

                <div class="why-visual-card">
                    <div class="why-visual-card-title"><i class="fas fa-box-open" style="margin-right:8px"></i>Minimum
                        Order Quantities</div>
                    <table>
                        @foreach ([['Boxing Kits', '200 pcs'], ['Sportswear Kits', '100 pairs'], ['Gym Kits and Hoodies', '200 pcs'], ['OEM / Custom', 'Negotiable']] as $moq)
                            <tr>
                                <td>{{ $moq[0] }}</td>
                                <td>{{ $moq[1] }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
