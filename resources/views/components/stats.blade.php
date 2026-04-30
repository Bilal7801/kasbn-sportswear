@push('styles')
<style>
.stats-section {
    padding: 80px 0;
    background: var(--dark-2);
    border-bottom: 1px solid rgba(201,168,76,0.1);
}
.stats-grid {
    display: grid; grid-template-columns: repeat(4, 1fr);
    gap: 1px; background: rgba(201,168,76,0.1);
}
.stat-item { background: var(--dark-2); padding: 40px 32px; text-align: center; }
.stat-num {
    font-family: var(--font-display); font-size: 56px;
    line-height: 1; color: var(--gold); margin-bottom: 8px; display: block;
}
.stat-label {
    font-family: var(--font-cond); font-size: 12px;
    letter-spacing: 3px; text-transform: uppercase; color: var(--muted);
}
@media (max-width: 1024px) { .stats-grid { grid-template-columns: repeat(2, 1fr); } }
</style>
@endpush

<section class="stats-section">
    <div class="container">
        <div class="stats-grid fade-up">
            <div class="stat-item stagger"><span class="stat-num">50K+</span><span class="stat-label">Units Exported Annually</span></div>
            <div class="stat-item stagger"><span class="stat-num">40+</span><span class="stat-label">Countries We Export To</span></div>
            <div class="stat-item stagger"><span class="stat-num">250+</span><span class="stat-label">Active Product SKUs</span></div>
            <div class="stat-item stagger"><span class="stat-num">3-7 Days</span><span class="stat-label">Average Sample Lead Time</span></div>
        </div>
    </div>
</section>
