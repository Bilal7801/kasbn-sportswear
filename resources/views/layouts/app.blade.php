<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Premium sports goods manufacturer from Sialkot, Pakistan. Wholesale & bulk orders for leather footballs, gloves, boxing gear, and sportswear. ISO certified exporter.">
    <title>@yield('title', 'SialkotPro Sports — Bulk Sports Goods Manufacturer & Exporter')</title>

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:ital,wght@0,300;0,400;0,500;0,600;1,300&family=Barlow+Condensed:wght@400;600;700&display=swap"
        rel="stylesheet">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">



    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --gold: #000000;
            /* repurpose as primary accent */
            --gold-light: #4b5563;
            --gold-dim: #d1d5db;
            --dark: #ffffff;
            /* background now white */
            --dark-2: #f9fafb;
            --dark-3: #f3f4f6;
            --dark-4: #e5e7eb;
            --steel: #cbd5e1;
            --muted: #6b7280;
            --light: #111827;
            /* text near black */
            --white: #000000;
            /* headings black */
            --red-accent: #C0392B;
            --font-display: 'Bebas Neue', sans-serif;
            --font-cond: 'Barlow Condensed', sans-serif;
            --font-body: 'Barlow', sans-serif;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: var(--font-body);
            background: var(--dark);
            color: var(--light);
            overflow-x: hidden;
        }

        ::-webkit-scrollbar {
            width: 4px;
        }

        ::-webkit-scrollbar-track {
            background: var(--dark-2);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gold-dim);
            border-radius: 2px;
        }

        ::selection {
            background: var(--gold);
            color: var(--dark);
        }

        .gold {
            color: var(--gold);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes shimmer {
            0% {
                background-position: -200% center;
            }

            100% {
                background-position: 200% center;
            }
        }

        @keyframes pulse-ring {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            100% {
                transform: scale(2.5);
                opacity: 0;
            }
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-8px);
            }
        }

        @keyframes ticker {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-50%);
            }
        }

        .fade-up {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.7s ease, transform 0.7s ease;
        }

        .fade-up.visible {
            opacity: 1;
            transform: translateY(0);
        }

        .section-label {
            font-family: var(--font-cond);
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--gold);
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .section-label::before {
            content: '';
            display: inline-block;
            width: 24px;
            height: 1px;
            background: var(--gold);
        }

        .section-title {
            font-family: var(--font-display);
            font-size: clamp(36px, 5vw, 64px);
            line-height: 0.95;
            letter-spacing: 1px;
            color: var(--white);
        }

        .section-title span {
            color: var(--gold);
        }

        /* Override the gold span from the global layout */
        .process-section .section-title span {
            color: #000000 !important;
        }

        .btn-primary {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold);
            color: var(--dark);
            font-family: var(--font-cond);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 14px 32px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, transform 0.15s;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
        }

        .btn-primary:hover {
            background: var(--gold-light);
            transform: translateY(-2px);
        }

        .btn-outline {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: transparent;
            color: var(--gold);
            font-family: var(--font-cond);
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 13px 31px;
            border: 1px solid var(--gold);
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s, color 0.2s, transform 0.15s;
            clip-path: polygon(0 0, calc(100% - 10px) 0, 100% 10px, 100% 100%, 10px 100%, 0 calc(100% - 10px));
        }

        .btn-outline:hover {
            background: var(--gold);
            color: var(--dark);
            transform: translateY(-2px);
        }

        .divider {
            width: 60px;
            height: 2px;
            background: var(--gold);
            margin: 20px 0;
        }

        .shimmer-text {
            background: linear-gradient(90deg, var(--gold) 0%, var(--gold-light) 40%, var(--gold) 60%, var(--gold-light) 100%);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shimmer 3s linear infinite;
        }
    </style>

    @stack('styles')
</head>

<body>

    @include('components.navbar')

    @yield('content')

    @include('components.footer')

    {{-- WhatsApp Float --}}
    <a href="https://wa.me/923001234567?text=Hello%2C%20I%20am%20interested%20in%20bulk%20sports%20goods%20order."
        target="_blank" class="whatsapp-float" title="Chat on WhatsApp">
        <i class="fab fa-whatsapp"></i>
        <span class="whatsapp-label">Get Quote</span>
        <span class="whatsapp-ring"></span>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 28px;
            right: 28px;
            z-index: 9999;
            display: flex;
            align-items: center;
            gap: 10px;
            background: #25D366;
            color: #fff;
            padding: 14px 22px 14px 18px;
            border-radius: 50px;
            font-family: var(--font-cond);
            font-size: 15px;
            font-weight: 600;
            text-decoration: none;
            box-shadow: 0 4px 20px rgba(37, 211, 102, 0.4);
            transition: transform 0.2s;
        }

        .whatsapp-float:hover {
            transform: scale(1.05);
        }

        .whatsapp-float i {
            font-size: 22px;
        }

        .whatsapp-ring {
            position: absolute;
            inset: 0;
            border-radius: 50px;
            border: 2px solid #25D366;
            animation: pulse-ring 2s ease-out infinite;
        }

        @media (max-width: 600px) {
            .whatsapp-float {
                padding: 15px;
                border-radius: 50%;
            }

            .whatsapp-label {
                display: none;
            }
        }
    </style>

    {{-- Global scroll animation observer --}}
    <script>
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const el = entry.target;
                    if (el.classList.contains('stagger-parent')) {
                        el.querySelectorAll('.stagger').forEach((child, j) => {
                            setTimeout(() => {
                                child.style.opacity = '1';
                                child.style.transform = 'translateY(0)';
                            }, j * 100);
                        });
                    } else {
                        el.classList.add('visible');
                    }
                }
            });
        }, {
            threshold: 0.1
        });

        document.querySelectorAll('.fade-up, .stagger-parent').forEach(el => {
            if (el.classList.contains('stagger-parent')) {
                el.querySelectorAll('.stagger').forEach(child => {
                    child.style.opacity = '0';
                    child.style.transform = 'translateY(20px)';
                    child.style.transition = 'opacity 0.5s ease, transform 0.5s ease';
                });
            }
            observer.observe(el);
        });
    </script>

    @stack('scripts')
</body>

</html>
