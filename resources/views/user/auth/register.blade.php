{{-- register.blade.php — White Background with Gray Lines and Boxes --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account — KASBN Sportswear</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        @keyframes fadeInUp { from { opacity: 0; transform: translateY(30px); } to { opacity: 1; transform: translateY(0); } }
        @keyframes lineScan { 0% { top: -10%; } 100% { top: 110%; } }

        body {
            /* Changed to solid white background */
            background: #ffffff;
            font-family: system-ui, -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: flex-start;
            justify-content: center;
            padding: 80px 20px 120px;
            position: relative;
            overflow-x: hidden;
        }

        .body-grid {
            position: fixed; inset: 0;
            /* Changed grid lines to subtle gray */
            background-image:
                linear-gradient(rgba(0, 0, 0, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 0, 0, 0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none; z-index: 0;
        }

        .scan-line-bg {
            position: fixed; left: 0; right: 0; height: 1px; z-index: 1;
            /* Changed scan line to a soft gray */
            background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.15), transparent);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            animation: lineScan 8s cubic-bezier(0.4, 0, 0.2, 1) infinite;
            pointer-events: none;
        }

        /* ── LIGHT/GRAY STATS BOXES ── */
        .bg-stats {
            position: fixed;
            bottom: 40px;
            left: 40px;
            z-index: 2;
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            pointer-events: none;
        }
        .bg-stat-item {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            /* Gray border */
            border: 1px solid #e5e7eb;
            padding: 16px 24px;
            border-radius: 4px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.04);
            text-align: center;
            min-width: 100px;
        }
        .bg-stat-number {
            font-family: monospace;
            font-size: 24px;
            font-weight: 900;
            /* Dark text for visibility */
            color: #1a1a1a;
            line-height: 1;
        }
        .bg-stat-label {
            font-size: 10px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            /* Gray label text */
            color: #888888;
            margin-top: 4px;
        }

        /* ── LIGHT/GRAY CERTS BOXES ── */
        .bg-certs {
            position: fixed;
            bottom: 40px;
            right: 40px;
            z-index: 2;
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
            pointer-events: none;
        }
        .bg-cert-chip {
            display: flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            /* Gray border */
            border: 1px solid #e5e7eb;
            padding: 10px 16px;
            border-radius: 4px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            /* Gray text */
            color: #666666;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
        .bg-cert-chip i {
            color: #a0a0a0; /* Gray icons */
            font-size: 12px;
        }

        /* ── REGISTER CARD (unchanged structure, shadow adjusted slightly for contrast) ── */
        .register-container { position: relative; z-index: 3; width: 100%; max-width: 520px; margin: 0 auto; }
        .register-card {
            background: #ffffff; border: 1px solid #e5e7eb; border-top: 3px solid #ff6b35;
            border-radius: 12px; padding: 60px 50px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.06);
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .brand-row { display: flex; align-items: center; gap: 14px; margin-bottom: 35px; }
        .brand-hex { width: 44px; height: 44px; background: #ff6b35; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .brand-hex i { color: white; font-size: 18px; }
        .brand-name { font-size: 18px; font-weight: 900; letter-spacing: 2px; text-transform: uppercase; color: #1a1a1a; line-height: 1; }
        .brand-sub { font-size: 9px; letter-spacing: 3px; text-transform: uppercase; color: #666; font-weight: 600; }
        .auth-tag { font-size: 13px; letter-spacing: 4px; text-transform: uppercase; color: #ff6b35; font-weight: 700; margin-bottom: 20px; display: inline-flex; align-items: center; gap: 10px; background: rgba(255, 107, 53, 0.08); padding: 6px 16px; border-radius: 50px; border: 1px solid rgba(255, 107, 53, 0.2); }
        .orange-dot { width: 6px; height: 6px; background: #ff6b35; border-radius: 50%; display: inline-block; box-shadow: 0 0 8px #ff6b35; }
        .register-title { font-size: clamp(32px, 5vw, 40px); font-weight: 900; text-transform: uppercase; letter-spacing: -1px; color: #1a1a1a; margin-bottom: 8px; line-height: 1.1; }
        .register-sub { font-size: 14px; color: #666; margin-bottom: 35px; line-height: 1.6; }
        .input-group { position: relative; margin-bottom: 20px; }
        .input-icon { position: absolute; left: 16px; top: 19px; color: #999; font-size: 14px; transition: color 0.3s; z-index: 2; }
        .form-input { width: 100%; background: #f9fafb; border: 2px solid #e5e7eb; padding: 14px 16px 14px 45px; font-size: 14px; color: #1a1a1a; border-radius: 6px; transition: all 0.3s; outline: none; }
        .form-input:focus { border-color: #ff6b35; background: #fff; box-shadow: 0 0 0 3px rgba(255, 107, 53, 0.1); }
        .form-input:focus + .input-icon, .input-group:focus-within .input-icon { color: #ff6b35; }
        .form-input::placeholder { color: #aaa; }
        .pw-toggle { position: absolute; right: 14px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 14px; color: #999; z-index: 3; }
        .pw-toggle:hover { color: #ff6b35; }
        .terms-row { margin-bottom: 28px; }
        .terms-label { display: flex; align-items: center; gap: 10px; font-size: 13px; color: #555; cursor: pointer; user-select: none; }
        .terms-label input { display: none; }
        .check-box { width: 18px; height: 18px; border: 2px solid #ddd; background: #fff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all 0.2s; }
        .terms-label.checked .check-box { background: #ff6b35; border-color: #ff6b35; }
        .check-box i { font-size: 10px; color: white; display: none; }
        .terms-label.checked .check-box i { display: block; }
        .terms-label a { color: #1a1a1a; font-weight: 600; text-decoration: underline; }
        .btn-register { width: 100%; background: #ff6b35; color: white; border: none; padding: 16px; font-weight: 800; font-size: 13px; letter-spacing: 2px; text-transform: uppercase; cursor: pointer; border-radius: 6px; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); display: flex; align-items: center; justify-content: center; gap: 10px; box-shadow: 0 4px 15px rgba(255, 107, 53, 0.2); margin-top: 6px; }
        .btn-register:hover { background: #1a1a1a; color: #fff; transform: translateY(-2px); box-shadow: 0 12px 30px rgba(0, 0, 0, 0.15); }
        .divider { display: flex; align-items: center; gap: 12px; margin: 25px 0; color: #bbb; font-size: 11px; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; }
        .divider::before, .divider::after { content: ''; flex: 1; height: 1px; background: #eee; }
        .social-btns { display: flex; gap: 10px; }
        .btn-social { flex: 1; background: #fff; border: 1px solid #e5e7eb; color: #555; font-size: 12px; font-weight: 600; letter-spacing: 1px; text-transform: uppercase; padding: 12px; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 8px; border-radius: 4px; transition: all 0.3s; }
        .btn-social:hover { border-color: #ff6b35; color: #ff6b35; background: #fff9f5; transform: translateY(-1px); }
        .login-row { margin-top: 28px; text-align: center; font-size: 14px; color: #777; }
        .login-row a { font-weight: 700; letter-spacing: 1px; text-transform: uppercase; color: #1a1a1a; text-decoration: none; margin-left: 6px; }
        .login-row a:hover { color: #ff6b35; }
        
        /* Updated back link text color for light background */
        .back-link { position: fixed; top: 28px; left: 28px; display: flex; align-items: center; gap: 8px; font-size: 11px; font-weight: 700; letter-spacing: 2px; text-transform: uppercase; color: #666; text-decoration: none; z-index: 10; }
        .back-link:hover { color: #ff6b35; }

        @media (max-height: 700px) { body { padding-top: 100px; } }
        @media (max-width: 600px) {
            .register-card { padding: 40px 25px; }
            .bg-stats, .bg-certs { display: none; }
        }
    </style>
</head>
<body>
    <div class="body-grid"></div>
    <div class="scan-line-bg"></div>

    <!-- Light/Gray Stats Boxes -->
    <div class="bg-stats">
        <div class="bg-stat-item">
            <div class="bg-stat-number">150+</div>
            <div class="bg-stat-label">Active Clients</div>
        </div>
        <div class="bg-stat-item">
            <div class="bg-stat-number">45+</div>
            <div class="bg-stat-label">Export Markets</div>
        </div>
    </div>

    <!-- Light/Gray Cert Badges -->
    <div class="bg-certs">
        <div class="bg-cert-chip">
            <i class="fas fa-certificate"></i> ISO 9001:2015
        </div>
        <div class="bg-cert-chip">
            <i class="fas fa-shield-alt"></i> BSCI Certified
        </div>
    </div>

    <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Site</a>

    <div class="register-container">
        <div class="register-card">
            <div class="brand-row">
                <div class="brand-hex"><i class="fas fa-trophy"></i></div>
                <div>
                    <div class="brand-name">KASBN</div>
                    <div class="brand-sub">Sports Manufacturing</div>
                </div>
            </div>

            <div class="auth-tag">
                <span class="orange-dot"></span> Register
            </div>

            <div class="register-title">Create Account</div>
            <p class="register-sub">Join the elite network of sports manufacturers and unlock your dashboard.</p>

            <form id="registerForm" method="POST" action="#">
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" name="name" class="form-input" placeholder="Full Name" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" name="email" class="form-input" placeholder="you@company.com" required>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" name="password" id="password" class="form-input" placeholder="Password" required>
                    <button type="button" class="pw-toggle" data-target="password"><i class="fas fa-eye"></i></button>
                </div>
                <div class="input-group">
                    <i class="fas fa-check-circle input-icon"></i>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-input" placeholder="Confirm Password" required>
                    <button type="button" class="pw-toggle" data-target="password_confirmation"><i class="fas fa-eye"></i></button>
                </div>

                <div class="terms-row">
                    <label class="terms-label" id="termsLabel">
                        <input type="checkbox" name="terms" id="termsChk" required>
                        <div class="check-box"><i class="fas fa-check"></i></div>
                        <span>I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></span>
                    </label>
                </div>

                <button type="submit" class="btn-register">
                    <span>Create Account</span> <i class="fas fa-user-plus"></i>
                </button>

                <div class="divider">or sign up with</div>
                <div class="social-btns">
                    <a href="#" class="btn-social"><i class="fab fa-google"></i> Google</a>
                    <a href="#" class="btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                </div>
                <div class="login-row">
                    Already have an account? <a href="login.blade.php">Sign In</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.querySelectorAll('.pw-toggle').forEach(btn => {
            btn.addEventListener('click', () => {
                const targetId = btn.getAttribute('data-target');
                const input = document.getElementById(targetId);
                const icon = btn.querySelector('i');
                const isPass = input.type === 'password';
                input.type = isPass ? 'text' : 'password';
                icon.className = isPass ? 'fas fa-eye-slash' : 'fas fa-eye';
            });
        });
        const termsLabel = document.getElementById('termsLabel');
        const termsChk = document.getElementById('termsChk');
        termsLabel.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') return;
            termsLabel.classList.toggle('checked');
            termsChk.checked = termsLabel.classList.contains('checked');
        });
    </script>
</body>
</html>