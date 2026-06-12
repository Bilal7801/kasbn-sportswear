{{-- login.blade.php ── Fully Fixed Variant --}}
@extends('layouts.app')

@section('title', 'Login — SialkotPro Sports')

@push('styles')
<style>
    /* ── SCOPED LOGIN LAYOUT CONTAINER ── */
    .login-page-wrapper {
        position: relative;
        width: 100%;
        min-height: calc(100vh - 90px); /* Adjusts perfectly alongside master layout height */
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 100px 20px 80px 20px; /* Added explicit top padding to push card clear of the navbar */
        overflow: hidden;
        background: #ffffff;
    }

    /* Isolated grid layout blocks so they don't leak into header / footer blocks */
    .login-body-grid {
        position: absolute; 
        inset: 0;
        background-image:
            linear-gradient(rgba(0, 0, 0, 0.04) 1px, transparent 1px),
            linear-gradient(90deg, rgba(0, 0, 0, 0.04) 1px, transparent 1px);
        background-size: 40px 40px;
        pointer-events: none; 
        z-index: 1;
    }

    .login-scan-line {
        position: absolute; 
        left: 0; 
        right: 0; 
        height: 1px; 
        z-index: 2;
        background: linear-gradient(90deg, transparent, rgba(0, 0, 0, 0.12), transparent);
        animation: loginLineScan 8s cubic-bezier(0.4, 0, 0.2, 1) infinite;
        pointer-events: none;
    }

    @keyframes loginLineScan { 0% { top: -10%; } 100% { top: 110%; } }

    /* ── CARD STRUCTURING ── */
    .login-container { 
        position: relative; 
        z-index: 3; 
        width: 100%; 
        max-width: 380px; 
        margin: 0 auto; 
    }
    
    .login-card {
        background: #ffffff; 
        border: 1px solid #e5e7eb; 
        border-top: 4px solid #000000; /* Uses your primary style accent */
        border-radius: 8px; 
        padding: 35px 28px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.05);
    }

    /* Moved back-link to a safer relative offset layout structure */
    .back-link-wrapper {
        margin-bottom: 14px;
        display: block;
    }
    .back-link { 
        display: inline-flex; 
        align-items: center; 
        gap: 6px; 
        font-family: var(--font-cond); 
        font-size: 11px; 
        font-weight: 700; 
        letter-spacing: 1px; 
        text-transform: uppercase; 
        color: #777; 
        text-decoration: none; 
        transition: color 0.2s;
    }
    .back-link:hover { color: var(--gold-light); }

    /* ── BRANDING & TYPOGRAPHY ── */
    .brand-row { display: flex; align-items: center; gap: 10px; margin-bottom: 22px; }
    .brand-hex { width: 34px; height: 34px; background: #000000; clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%); display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
    .brand-hex i { color: white; font-size: 13px; }
    
    .brand-name { 
        font-family: var(--font-cond); 
        font-size: 18px; 
        font-weight: 700; 
        letter-spacing: 1px; 
        text-transform: uppercase; 
        color: #111827; 
        line-height: 1; 
    }
    .brand-sub { 
        font-family: var(--font-body); 
        font-size: 9px; 
        letter-spacing: 2px; 
        text-transform: uppercase; 
        color: #6b7280; 
        font-weight: 600; 
        margin-top: 2px; 
    }
    
    .auth-tag { font-family: var(--font-cond); font-size: 10px; letter-spacing: 2.5px; text-transform: uppercase; color: #111827; font-weight: 700; margin-bottom: 16px; display: inline-flex; align-items: center; gap: 6px; background: rgba(0, 0, 0, 0.05); padding: 4px 10px; border-radius: 50px; border: 1px solid rgba(0, 0, 0, 0.1); }
    .orange-dot { width: 5px; height: 5px; background: #111827; border-radius: 50%; display: inline-block; }
    
    .login-title { font-family: var(--font-display); font-size: 36px; font-weight: 400; text-transform: uppercase; letter-spacing: 0.5px; color: #000000; margin-bottom: 6px; line-height: 1; }
    .login-sub { font-family: var(--font-body); font-size: 13px; color: #6b7280; margin-bottom: 24px; line-height: 1.4; }
    
    /* ── FORM ELEMENTS ── */
    .input-group { position: relative; margin-bottom: 16px; width: 100%; }
    .input-label { display: block; font-family: monospace; font-size: 10.5px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; color: #6b7280; margin-bottom: 6px; }
    
    .input-wrapper { position: relative; width: 100%; }
    .input-icon { position: absolute; left: 12px; top: 50%; transform: translateY(-50%); color: #9ca3af; font-size: 12px; transition: color 0.3s; z-index: 2; pointer-events: none; }
    
    .form-input { width: 100%; background: #f9fafb; border: 2px solid #e5e7eb; padding: 11px 12px 11px 38px; font-family: var(--font-body); font-size: 13px; color: #111827; border-radius: 5px; transition: all 0.3s; outline: none; box-sizing: border-box; }
    .form-input:focus { border-color: #000000; background: #fff; box-shadow: 0 0 0 3px rgba(0, 0, 0, 0.05); }
    .form-input:focus + .input-icon, .input-group:focus-within .input-icon { color: #000000; }
    
    .pw-toggle { position: absolute; right: 10px; top: 50%; transform: translateY(-50%); background: none; border: none; cursor: pointer; font-size: 12px; color: #9ca3af; z-index: 3; padding: 4px; display: flex; align-items: center; justify-content: center; }
    .pw-toggle:hover { color: #000000; }
    
    .options-row { display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px; gap: 8px; width: 100%; }
    .remember-check { display: flex; align-items: center; gap: 6px; font-family: var(--font-body); font-size: 12px; color: #4b5563; cursor: pointer; user-select: none; }
    .remember-check input { display: none; }
    .check-box { width: 16px; height: 16px; border: 2px solid #d1d5db; background: #fff; display: flex; align-items: center; justify-content: center; flex-shrink: 0; transition: all 0.2s; border-radius: 3px; }
    .remember-check.checked .check-box { background: #000000; border-color: #000000; }
    .check-box i { font-size: 8px; color: white; display: none; }
    .remember-check.checked .check-box i { display: block; }
    
    .forgot-link { font-family: var(--font-cond); font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; color: #111827; text-decoration: none; font-size: 11px; }
    .forgot-link:hover { color: var(--gold-light); }
    
    /* ── BUTTONS & INTERACTION ── */
    .btn-login { width: 100%; background: #000000; color: white; border: none; padding: 13px; font-family: var(--font-cond); font-weight: 700; font-size: 14px; letter-spacing: 1.5px; text-transform: uppercase; cursor: pointer; border-radius: 5px; transition: all 0.3s ease; display: flex; align-items: center; justify-content: center; gap: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1); margin-top: 4px; }
    .btn-login:hover { background: #1f2937; transform: translateY(-1px); box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); }
    
    /* Changed class name completely to completely step around layout.app conflicts */
    .auth-divider { display: flex; align-items: center; gap: 10px; margin: 20px 0; color: #9ca3af; font-family: var(--font-cond); font-size: 11px; font-weight: 700; letter-spacing: 1px; text-transform: uppercase; width: 100%; height: auto !important; background: transparent !important; }
    .auth-divider::before, .auth-divider::after { content: ''; flex: 1; height: 1px; background: #e5e7eb; }
    
    .social-btns { display: flex; gap: 8px; width: 100%; }
    .btn-social { flex: 1; background: #fff; border: 1px solid #e5e7eb; color: #4b5563; font-family: var(--font-cond); font-size: 11px; font-weight: 600; letter-spacing: 0.5px; text-transform: uppercase; padding: 10px; text-align: center; text-decoration: none; display: flex; align-items: center; justify-content: center; gap: 6px; border-radius: 4px; transition: all 0.2s; }
    .btn-social:hover { border-color: #000000; color: #000000; background: #f9fafb; }
    
    .register-row { margin-top: 24px; text-align: center; font-family: var(--font-body); font-size: 13px; color: #6b7280; }
    .register-row a { font-family: var(--font-cond); font-weight: 700; letter-spacing: 0.5px; text-transform: uppercase; color: #000000; text-decoration: none; margin-left: 3px; }
    .register-row a:hover { color: var(--gold-light); }

    .error-message { color: #ef4444; font-family: monospace; font-size: 11px; font-weight: 600; letter-spacing: 0.5px; margin-top: 5px; display: block; }
</style>
@endpush

@section('content')
<div class="login-page-wrapper">
    <div class="login-body-grid"></div>
    <div class="login-scan-line"></div>

    <div class="login-container fade-up">
        <div class="back-link-wrapper">
            <a href="{{ url('/') }}" class="back-link"><i class="fas fa-arrow-left"></i> Back to Site</a>
        </div>
        
        <div class="login-card">
            <div class="brand-row">
                <div class="brand-hex"><i class="fas fa-trophy"></i></div>
                <div>
                    <div class="brand-name">SialkotPro</div>
                    <div class="brand-sub">Sports Manufacturing</div>
                </div>
            </div>

            <div class="auth-tag">
                <span class="orange-dot"></span> Authenticate
            </div>

            <div class="login-title">Secure Portal</div>
            <p class="login-sub">Access your deployment and tracking dashboard.</p>

            @if(session('success'))
                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 10px; border-radius: 5px; font-size: 12px; margin-bottom: 16px; display: flex; align-items: center; gap: 6px; font-weight: 500;">
                    <i class="fas fa-check-circle"></i> {{ session('success') }}
                </div>
            @endif

            <form id="loginForm" method="POST" action="{{ route('login') }}" autocomplete="off">
                @csrf

                <div class="input-group">
                    <label class="input-label">Identification</label>
                    <div class="input-wrapper">
                        <input type="text" name="email" class="form-input @error('email') is-invalid @enderror" placeholder="Enter user name" value="{{ old('email') }}" required autofocus autocomplete="off">
                        <i class="fas fa-envelope input-icon"></i>
                    </div>
                    @error('email')
                        <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="input-group">
                    <label class="input-label">Authorization Code</label>
                    <div class="input-wrapper">
                        <input type="password" id="password" name="password" class="form-input @error('password') is-invalid @enderror" placeholder="Enter password" required autocomplete="off">
                        <i class="fas fa-lock input-icon"></i>
                        <button type="button" class="pw-toggle" id="pwToggle"><i class="fas fa-eye"></i></button>
                    </div>
                    @error('password')
                        <span class="error-message"><i class="fas fa-exclamation-triangle"></i> {{ $message }}</span>
                    @enderror
                </div>

                <div class="options-row">
                    <label class="remember-check" id="rememberLabel">
                        <input type="checkbox" id="rememberChk" name="remember">
                        <div class="check-box"><i class="fas fa-check"></i></div>
                        <span>Remember device</span>
                    </label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt"></i> <span>Authenticate Session</span>
                </button>

                <div class="auth-divider">or authenticate with</div>
                
                <div class="social-btns">
                    <a href="#" class="btn-social"><i class="fab fa-google"></i> Google</a>
                    <a href="#" class="btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
                </div>

                <div class="register-row">
                    Require access? <a href="{{ route('register') }}">Create Account</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    const pwToggle = document.getElementById('pwToggle');
    const passwordInput = document.getElementById('password');
    
    pwToggle.addEventListener('click', (e) => {
        e.preventDefault();
        const isPassword = passwordInput.type === 'password';
        passwordInput.type = isPassword ? 'text' : 'password';
        const icon = pwToggle.querySelector('i');
        icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
    });

    const rememberLabel = document.getElementById('rememberLabel');
    const rememberChk = document.getElementById('rememberChk');
    
    if (rememberChk && rememberLabel) {
        rememberChk.addEventListener('change', (e) => {
            rememberLabel.classList.toggle('checked', e.target.checked);
        });
    }
</script>
@endpush