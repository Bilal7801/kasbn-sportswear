@push('styles')
<style>
    /* ========== NEWSLETTER SECTION ========== */
    .newsletter {
        padding: 80px 20px;
        background: linear-gradient(135deg, #1a1a1a 0%, #2d2d2d 100%);
        position: relative;
        overflow: hidden;
        color: white;
    }

    .newsletter::before {
        content: '';
        position: absolute;
        inset: 0;
        background-image: 
            radial-gradient(circle at 20% 50%, rgba(255,107,53,0.1) 0%, transparent 50%),
            radial-gradient(circle at 80% 80%, rgba(255,107,53,0.1) 0%, transparent 50%);
        pointer-events: none;
        z-index: 0;
    }

    .newsletter-container {
        max-width: 800px;
        margin: 0 auto;
        text-align: center;
        position: relative;
        z-index: 1;
        animation: fadeInUp 0.8s ease-out;
    }

    .newsletter-subtitle {
        font-size: 12px;
        letter-spacing: 3px;
        text-transform: uppercase;
        color: #ff6b35;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .newsletter h2 {
        font-size: clamp(32px, 8vw, 48px);
        font-weight: 900;
        text-transform: uppercase;
        letter-spacing: -1px;
        margin-bottom: 20px;
        line-height: 1.2;
    }

    .newsletter p {
        font-size: 18px;
        color: rgba(255, 255, 255, 0.9);
        margin-bottom: 40px;
        line-height: 1.6;
        font-weight: 300;
    }

    .newsletter-form {
        display: flex;
        gap: 0;
        max-width: 500px;
        margin: 0 auto;
        border-radius: 6px;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    }

    .newsletter-input {
        flex: 1;
        padding: 16px 25px;
        border: none;
        font-size: 14px;
        background: white;
        color: #1a1a1a;
        outline: none;
        font-family: inherit;
    }

    .newsletter-input::placeholder {
        color: #999;
    }

    .newsletter-submit {
        padding: 16px 35px;
        background: #ff6b35;
        color: white;
        border: none;
        font-weight: 700;
        font-size: 14px;
        letter-spacing: 1px;
        text-transform: uppercase;
        cursor: pointer;
        transition: all 0.3s ease-out;
        white-space: nowrap;
    }

    .newsletter-submit:hover {
        background: #ff5520;
        transform: translateX(2px);
    }

    .newsletter-terms {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.7);
        margin-top: 25px;
        line-height: 1.5;
    }

    .newsletter-terms a {
        color: #ff6b35;
        text-decoration: none;
        font-weight: 600;
    }

    .newsletter-terms a:hover {
        text-decoration: underline;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (max-width: 768px) {
        .newsletter {
            padding: 60px 20px;
        }

        .newsletter h2 {
            font-size: 32px;
        }

        .newsletter p {
            font-size: 16px;
        }

        .newsletter-form {
            flex-direction: column;
        }

        .newsletter-input,
        .newsletter-submit {
            width: 100%;
        }

        .newsletter-input {
            border-bottom: 1px solid #ddd;
        }
    }
</style>
@endpush

<section class="newsletter">
    <div class="newsletter-container">
        <div class="newsletter-subtitle">Stay Updated</div>
        <h2>Join Our Community</h2>
        <p>Subscribe to get exclusive deals, new arrivals, and insider tips delivered directly to your inbox.</p>

        <form class="newsletter-form" id="newsletter-form">
            <input 
                type="email" 
                class="newsletter-input" 
                placeholder="Enter your email" 
                required
            >
            <button type="submit" class="newsletter-submit">Subscribe</button>
        </form>

        <p class="newsletter-terms">
            We respect your privacy. Unsubscribe at any time. 
            <a href="#privacy">Privacy Policy</a> • 
            <a href="#terms">Terms of Service</a>
        </p>
    </div>
</section>

@push('scripts')
<script>
    document.getElementById('newsletter-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('input[type="email"]').value;
        alert('Thank you for subscribing! Check your email for exclusive offers.');
        this.reset();
    });
</script>
@endpush