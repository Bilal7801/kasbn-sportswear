@push('styles')
<style>
.testimonials-section { padding: 100px 0; background: var(--dark-2); }
.testimonials-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; margin-top: 52px; }
.testimonial-card {
    background: var(--dark-3); border: 1px solid rgba(201,168,76,0.12);
    padding: 32px; position: relative;
}
.testimonial-quote {
    font-size: 48px; color: rgba(201,168,76,0.2);
    font-family: Georgia, serif; line-height: 1; margin-bottom: 12px;
}
.testimonial-text {
    font-size: 15px; color: rgba(240,237,230,0.75);
    line-height: 1.7; margin-bottom: 24px; font-style: italic;
}
.testimonial-author { display: flex; align-items: center; gap: 14px; }
.testimonial-avatar {
    width: 44px; height: 44px; border-radius: 50%;
    background: rgba(201,168,76,0.1); border: 2px solid var(--gold);
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-cond); font-weight: 700; color: var(--gold); font-size: 16px;
}
.testimonial-name { font-family: var(--font-cond); font-size: 15px; font-weight: 700; color: var(--white); }
.testimonial-role { font-size: 12px; color: var(--muted); }
.testimonial-stars { color: var(--gold); font-size: 12px; letter-spacing: 2px; margin-bottom: 12px; }
.testimonial-flag { font-size: 18px; }
.client-logos {
    display: flex; gap: 20px; flex-wrap: wrap;
    justify-content: center; margin-top: 52px; padding-top: 40px;
    border-top: 1px solid rgba(201,168,76,0.1);
}
.client-logo {
    background: var(--dark-3); border: 1px solid rgba(201,168,76,0.12);
    padding: 16px 28px; font-family: var(--font-cond); font-size: 16px;
    font-weight: 700; letter-spacing: 2px; color: var(--muted);
    transition: color 0.2s, border-color 0.2s;
}
.client-logo:hover { color: var(--gold); border-color: rgba(201,168,76,0.4); }
@media (max-width: 768px) { .testimonials-grid { grid-template-columns: 1fr; } }
</style>
@endpush

@php
$testimonials = [
    ['MK','Marcus K.','Director, SportZone USA','🇺🇸','Excellent quality footballs — comparable to top European brands at a fraction of the cost. Repeat order every season. Reliable communication and on-time delivery every time.'],
    ['LB','Lena B.','Procurement, ProGear GmbH','🇩🇪','We order 2,000 boxing glove sets per year. The OEM service is flawless — they matched our colour pantones exactly and the packaging quality is premium.'],
    ['AH','Ahmed H.','Owner, SportMart UAE','🇦🇪','MOQ is reasonable, sampling process is fast, and the team responds on WhatsApp even late at night. Our go-to Sialkot supplier for 4 years now.'],
];
@endphp

<section class="testimonials-section" id="testimonials">
    <div class="container">
        <div class="fade-up">
            <div class="section-label">Buyer Reviews</div>
            <h2 class="section-title">WHAT OUR<br><span>CLIENTS SAY</span></h2>
        </div>
        <div class="testimonials-grid">
            @foreach($testimonials as $t)
            <div class="testimonial-card stagger fade-up">
                <div class="testimonial-stars">★★★★★</div>
                <div class="testimonial-quote">"</div>
                <div class="testimonial-text">{{ $t[4] }}</div>
                <div class="testimonial-author">
                    <div class="testimonial-avatar">{{ $t[0] }}</div>
                    <div>
                        <div class="testimonial-name">{{ $t[1] }} <span class="testimonial-flag">{{ $t[3] }}</span></div>
                        <div class="testimonial-role">{{ $t[2] }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="client-logos">
            <div class="section-label" style="width:100%;justify-content:center;margin-bottom:0">Trusted By Brands Worldwide</div>
            @foreach(['SportZone USA','ProGear GmbH','SportMart UAE','AllStar Australia','TopKick UK','Vito Sports Brazil','TeamKit Canada'] as $brand)
            <div class="client-logo">{{ $brand }}</div>
            @endforeach
        </div>
    </div>
</section>
