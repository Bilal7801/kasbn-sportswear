<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SialkotPro Sports — Create Account</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Barlow:wght@300;400;500;600&family=Barlow+Condensed:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --gold:        #C9A84C;
  --gold-light:  #E8C97A;
  --gold-dim:    #7A6230;
  --gold-pale:   rgba(201,168,76,.08);
  --dark:        #0A0C10;
  --dark-2:      #111318;
  --dark-3:      #181B22;
  --dark-4:      #1E2229;
  --steel:       #2C3140;
  --muted:       #6B7280;
  --light:       #F0EDE6;
  --white:       #FFFFFF;
  --font-display:'Bebas Neue',sans-serif;
  --font-cond:   'Barlow Condensed',sans-serif;
  --font-body:   'Barlow',sans-serif;
}
html,body{height:100%}
body{font-family:var(--font-body);background:var(--dark);color:var(--light);
  display:flex;min-height:100vh;overflow-x:hidden}
::selection{background:var(--gold);color:var(--dark)}
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-track{background:var(--dark-2)}
::-webkit-scrollbar-thumb{background:var(--gold-dim);border-radius:2px}

/* ── ANIMATIONS ─────────────────────── */
@keyframes fadeIn{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes shimmer{0%{background-position:-200% center}100%{background-position:200% center}}
@keyframes float{0%,100%{transform:translateY(0)}50%{transform:translateY(-8px)}}
@keyframes lineScan{0%{top:-100%}100%{top:200%}}
@keyframes pulse{0%,100%{opacity:.4}50%{opacity:.8}}
@keyframes rotateHex{0%{transform:rotate(0deg)}100%{transform:rotate(360deg)}}

/* ── LEFT PANEL ─────────────────────── */
.left{
  width:52%;background:var(--dark-2);
  position:relative;overflow:hidden;
  display:flex;flex-direction:column;justify-content:space-between;padding:48px 56px;
}
/* grid overlay */
.left::before{
  content:'';position:absolute;inset:0;z-index:0;
  background-image:
    linear-gradient(rgba(201,168,76,.05) 1px,transparent 1px),
    linear-gradient(90deg,rgba(201,168,76,.05) 1px,transparent 1px);
  background-size:56px 56px;
}
/* scanning light effect */
.scan-line{
  position:absolute;left:0;right:0;height:2px;z-index:1;
  background:linear-gradient(90deg,transparent,rgba(201,168,76,.15),transparent);
  animation:lineScan 6s ease-in-out infinite;
  pointer-events:none;
}
/* radial glow */
.left-glow{
  position:absolute;bottom:-120px;right:-120px;z-index:0;
  width:500px;height:500px;border-radius:50%;
  background:radial-gradient(circle,rgba(201,168,76,.07) 0%,transparent 70%);
  pointer-events:none;
}
/* top-left glow */
.left-glow2{
  position:absolute;top:-80px;left:-80px;z-index:0;
  width:320px;height:320px;border-radius:50%;
  background:radial-gradient(circle,rgba(201,168,76,.05) 0%,transparent 65%);
  pointer-events:none;
}

.left-top{position:relative;z-index:2;animation:fadeIn .7s ease both}
.brand{display:flex;align-items:center;gap:14px;margin-bottom:0}
.brand-hex{
  width:44px;height:44px;background:var(--gold);
  clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.brand-hex i{color:var(--dark);font-size:18px}
.brand-name{font-family:var(--font-cond);font-size:22px;font-weight:700;letter-spacing:2px;color:var(--white);line-height:1}
.brand-sub{font-family:var(--font-body);font-size:9px;letter-spacing:3px;text-transform:uppercase;color:var(--gold)}

/* center hero text */
.left-center{position:relative;z-index:2;animation:fadeIn .7s .1s ease both}
.left-tagline{
  font-family:var(--font-display);
  font-size:clamp(56px,5.5vw,80px);
  line-height:.9;letter-spacing:1px;color:var(--white);
  margin-bottom:20px;
}
.left-tagline span{
  display:block;
  background:linear-gradient(90deg,var(--gold) 0%,var(--gold-light) 40%,var(--gold) 70%,var(--gold-light) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:shimmer 3.5s linear infinite;
}
.left-desc{font-size:14px;line-height:1.75;color:rgba(240,237,230,.55);max-width:360px;margin-bottom:36px}

/* stats row */
.left-stats{display:flex;gap:32px;flex-wrap:wrap}
.lst{display:flex;flex-direction:column;gap:2px}
.lst-n{font-family:var(--font-display);font-size:30px;color:var(--gold);line-height:1}
.lst-l{font-size:10px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--muted)}

/* bottom cert badges */
.left-bottom{position:relative;z-index:2;display:flex;gap:10px;flex-wrap:wrap;animation:fadeIn .7s .2s ease both}
.cert-chip{
  display:flex;align-items:center;gap:7px;
  background:var(--dark-3);border:1px solid rgba(201,168,76,.2);
  padding:7px 14px;
  font-family:var(--font-cond);font-size:11px;font-weight:600;letter-spacing:1.5px;
  text-transform:uppercase;color:rgba(240,237,230,.6);
}
.cert-chip i{color:var(--gold);font-size:11px}

/* vertical divider line */
.vdiv{
  position:absolute;top:0;right:0;bottom:0;width:1px;
  background:linear-gradient(to bottom,transparent,rgba(201,168,76,.3) 25%,rgba(201,168,76,.3) 75%,transparent);
  z-index:3;
}

/* ── RIGHT PANEL ─────────────────────── */
.right{
  width:48%;background:var(--dark);
  display:flex;align-items:center;justify-content:center;
  padding:40px 56px;position:relative;overflow-y:auto;
}
.right::before{
  content:'';position:absolute;top:-150px;left:-150px;
  width:400px;height:400px;border-radius:50%;
  background:radial-gradient(circle,rgba(201,168,76,.04) 0%,transparent 65%);
  pointer-events:none;
}

.form-wrap{width:100%;max-width:400px;animation:fadeIn .65s .15s ease both}

.form-header{margin-bottom:36px}
.form-eyebrow{
  font-family:var(--font-cond);font-size:11px;font-weight:700;
  letter-spacing:3px;text-transform:uppercase;color:var(--gold);
  display:flex;align-items:center;gap:8px;margin-bottom:10px;
}
.form-eyebrow::before{content:'';width:16px;height:1.5px;background:var(--gold)}
.form-title{font-family:var(--font-display);font-size:42px;letter-spacing:1px;color:var(--white);line-height:.95;margin-bottom:8px}
.form-sub{font-size:14px;color:var(--muted);font-weight:300}

/* form fields */
.field{margin-bottom:18px;position:relative}
.field-label{
  display:block;font-family:var(--font-cond);font-size:10px;font-weight:700;
  letter-spacing:2.5px;text-transform:uppercase;color:var(--muted);margin-bottom:8px;
}
.field-wrap{position:relative}
.field-icon{
  position:absolute;left:14px;top:50%;transform:translateY(-50%);
  font-size:14px;color:var(--muted);pointer-events:none;transition:color .2s;
}
.field-input{
  width:100%;background:var(--dark-3);
  border:1px solid rgba(201,168,76,.15);
  color:var(--light);font-family:var(--font-body);font-size:14px;
  padding:13px 16px 13px 42px;outline:none;
  transition:border-color .2s,background .2s;
  border-radius:2px;
}
.field-input:focus{border-color:var(--gold);background:var(--dark-4)}
.field-input:focus + .field-icon,
.field-wrap:focus-within .field-icon{color:var(--gold)}
.field-input::placeholder{color:var(--muted)}

/* password toggle */
.pw-toggle{
  position:absolute;right:14px;top:50%;transform:translateY(-50%);
  background:none;border:none;cursor:pointer;
  font-size:14px;color:var(--muted);padding:4px;transition:color .2s;
}
.pw-toggle:hover{color:var(--gold)}

/* terms checkbox (reusing same style as remember) */
.terms-row{display:flex;align-items:center;margin-bottom:24px}
.terms-label{display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13px;color:var(--muted);user-select:none}
.terms-label input[type=checkbox]{display:none}
.terms-label .check-box{
  width:16px;height:16px;border:1px solid rgba(201,168,76,.3);background:var(--dark-3);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s;
}
.terms-label input:checked ~ .check-box,
.terms-label.checked .check-box{background:var(--gold);border-color:var(--gold)}
.terms-label .check-box i{font-size:9px;color:var(--dark);display:none}
.terms-label.checked .check-box i{display:block}
.terms-label a{color:var(--gold);text-decoration:none;transition:color .2s}
.terms-label a:hover{color:var(--gold-light);text-decoration:underline}

/* register btn */
.btn-register{
  width:100%;background:var(--gold);color:var(--dark);
  font-family:var(--font-cond);font-weight:700;font-size:14px;
  letter-spacing:3px;text-transform:uppercase;border:none;
  padding:15px;cursor:pointer;
  clip-path:polygon(0 0,calc(100% - 12px) 0,100% 12px,100% 100%,12px 100%,0 calc(100% - 12px));
  transition:background .2s;position:relative;overflow:hidden;
}
.btn-register::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent 0%,rgba(255,255,255,.12) 50%,transparent 100%);
  transform:translateX(-100%);transition:transform .4s;
}
.btn-register:hover{background:var(--gold-light)}
.btn-register:hover::after{transform:translateX(100%)}
.btn-register i{margin-right:9px}

/* divider */
.or-div{display:flex;align-items:center;gap:12px;margin:22px 0}
.or-div::before,.or-div::after{content:'';flex:1;height:1px;background:rgba(201,168,76,.12)}
.or-text{font-family:var(--font-cond);font-size:10px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--muted)}

/* social logins */
.social-row{display:flex;gap:10px}
.btn-social{
  flex:1;display:flex;align-items:center;justify-content:center;gap:8px;
  background:var(--dark-3);border:1px solid rgba(201,168,76,.12);
  color:rgba(240,237,230,.6);font-family:var(--font-cond);font-size:12px;
  font-weight:600;letter-spacing:1.5px;text-transform:uppercase;
  padding:11px;cursor:pointer;text-decoration:none;
  transition:border-color .2s,color .2s,background .2s;border-radius:2px;
}
.btn-social:hover{border-color:rgba(201,168,76,.35);color:var(--light);background:var(--dark-4)}
.btn-social i{font-size:15px}

/* login link */
.login-link{
  margin-top:28px;text-align:center;
  font-size:13px;color:var(--muted);
}
.login-link a{
  font-family:var(--font-cond);font-weight:700;font-size:12px;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--gold);text-decoration:none;margin-left:6px;
  transition:color .2s;
}
.login-link a:hover{color:var(--gold-light)}

/* error state */
.field-error{
  font-size:11px;color:#F87171;margin-top:6px;
  display:none;align-items:center;gap:5px;
  font-family:var(--font-cond);letter-spacing:.5px;
}
.field-error i{font-size:10px}
.field.has-error .field-input{border-color:rgba(248,113,113,.5)}
.field.has-error .field-error{display:flex}

/* back to site link */
.back-link{
  position:absolute;top:28px;left:28px;
  display:flex;align-items:center;gap:7px;
  font-family:var(--font-cond);font-size:11px;font-weight:600;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--muted);text-decoration:none;transition:color .2s;z-index:10;
}
.back-link:hover{color:var(--gold)}
.back-link i{font-size:10px;transition:transform .2s}
.back-link:hover i{transform:translateX(-3px)}

/* responsive */
@media(max-width:900px){
  body{flex-direction:column}
  .left{width:100%;min-height:auto;padding:36px 28px;flex-direction:row;align-items:center;flex-wrap:wrap;gap:20px}
  .left-center,.left-bottom{display:none}
  .left-top{margin-bottom:0}
  .vdiv{display:none}
  .right{width:100%;padding:36px 28px;align-items:flex-start;min-height:auto}
  .back-link{position:static;margin-bottom:20px;display:inline-flex}
}
</style>
</head>
<body>

<!-- LEFT PANEL (same as login, with tailored signup messaging) -->
<div class="left">
  <div class="scan-line"></div>
  <div class="left-glow"></div>
  <div class="left-glow2"></div>

  <div class="left-top">
    <div class="brand">
      <div class="brand-hex"><i class="fas fa-trophy"></i></div>
      <div>
        <div class="brand-name">SIALKOTPRO</div>
        <div class="brand-sub">Sports Manufacturing</div>
      </div>
    </div>
  </div>

  <div class="left-center">
    <div class="left-tagline">
      JOIN THE<br>
      <span>ELITE NETWORK</span><br>
      OF MAKERS
    </div>
    <p class="left-desc">
      Get access to real‑time trade insights, order management, and premium buyer connections. Become part of Pakistan’s leading sports manufacturing ecosystem.
    </p>
    <div class="left-stats">
      <div class="lst"><span class="lst-n">150+</span><span class="lst-l">Active Clients</span></div>
      <div class="lst"><span class="lst-n">45+</span><span class="lst-l">Export Markets</span></div>
      <div class="lst"><span class="lst-n">500+</span><span class="lst-l">Manufacturers</span></div>
    </div>
  </div>

  <div class="left-bottom">
    <div class="cert-chip"><i class="fas fa-certificate"></i>ISO 9001:2015</div>
    <div class="cert-chip"><i class="fas fa-shield-alt"></i>BSCI Certified</div>
    <div class="cert-chip"><i class="fas fa-building"></i>SCCI Member</div>
  </div>

  <div class="vdiv"></div>
</div>

<!-- RIGHT PANEL: SIGNUP FORM -->
<div class="right">
  <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Site</a>

  <div class="form-wrap">
    <div class="form-header">
      <div class="form-eyebrow">Start Free</div>
      <div class="form-title">CREATE ACCOUNT</div>
      <div class="form-sub">Join SialkotPro Sports and unlock your manufacturing dashboard.</div>
    </div>

    <form id="registerForm" method="POST" action="#" novalidate>
        {{-- {{ route('register') }} --}}
      @csrf

      <!-- Full Name -->
      <div class="field" id="nameField">
        <label class="field-label">Full Name</label>
        <div class="field-wrap">
          <input type="text" id="name" name="name" class="field-input" placeholder="Ahmed Raza" autocomplete="name" value="{{ old('name') }}">
          <i class="fas fa-user field-icon"></i>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="nameErr">Full name is required.</span></div>
      </div>

      <!-- Email -->
      <div class="field" id="emailField">
        <label class="field-label">Email Address</label>
        <div class="field-wrap">
          <input type="email" id="email" name="email" class="field-input" placeholder="you@company.com" autocomplete="email" value="{{ old('email') }}">
          <i class="fas fa-envelope field-icon"></i>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="emailErr">Please enter a valid email address.</span></div>
      </div>

      <!-- Password -->
      <div class="field" id="passField">
        <label class="field-label">Password</label>
        <div class="field-wrap">
          <input type="password" id="password" name="password" class="field-input" placeholder="••••••••" autocomplete="new-password">
          <i class="fas fa-lock field-icon"></i>
          <button type="button" class="pw-toggle" data-target="password" tabindex="-1" aria-label="Toggle password visibility">
            <i class="fas fa-eye"></i>
          </button>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="passErr">Password must be at least 8 characters.</span></div>
      </div>

      <!-- Confirm Password -->
      <div class="field" id="confirmField">
        <label class="field-label">Confirm Password</label>
        <div class="field-wrap">
          <input type="password" id="password_confirmation" name="password_confirmation" class="field-input" placeholder="••••••••" autocomplete="new-password">
          <i class="fas fa-check-circle field-icon"></i>
          <button type="button" class="pw-toggle" data-target="password_confirmation" tabindex="-1" aria-label="Toggle password visibility">
            <i class="fas fa-eye"></i>
          </button>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="confirmErr">Passwords do not match.</span></div>
      </div>

      <!-- Terms & Conditions Checkbox -->
      <div class="terms-row">
        <label class="terms-label" id="termsLabel">
          <input type="checkbox" name="terms" id="termsChk" value="1">
          <div class="check-box"><i class="fas fa-check"></i></div>
          <span>I agree to the <a href="#" target="_blank">Terms of Service</a> and <a href="#" target="_blank">Privacy Policy</a></span>
        </label>
      </div>

      <!-- Submit Button -->
      <button type="submit" class="btn-register">
        <i class="fas fa-user-plus"></i> Create Account
      </button>

      <!-- Divider -->
      <div class="or-div"><span class="or-text">or sign up with</span></div>

      <!-- Social -->
      <div class="social-row">
        <a href="#" class="btn-social"><i class="fab fa-google"></i> Google</a>
        <a href="#" class="btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
      </div>

      <!-- Login Link -->
      <div class="login-link">
        Already have an account?
        <a href="{{ route('user.login') }}">Sign In</a>
      </div>
    </form>
  </div>
</div>

<script>
// ========================
// 1. PASSWORD TOGGLES (both fields)
// ========================
document.querySelectorAll('.pw-toggle').forEach(btn => {
  btn.addEventListener('click', (e) => {
    const targetId = btn.getAttribute('data-target');
    const input = document.getElementById(targetId);
    if (!input) return;
    const icon = btn.querySelector('i');
    const isPassword = input.type === 'password';
    input.type = isPassword ? 'text' : 'password';
    icon.className = isPassword ? 'fas fa-eye-slash' : 'fas fa-eye';
  });
});

// ========================
// 2. TERMS CHECKBOX STYLE
// ========================
const termsLabel = document.getElementById('termsLabel');
const termsChk = document.getElementById('termsChk');
termsLabel.addEventListener('click', (e) => {
  // Prevent toggle if clicking on inner links
  if (e.target.tagName === 'A') return;
  termsLabel.classList.toggle('checked');
  termsChk.checked = termsLabel.classList.contains('checked');
});

// ========================
// 3. CLIENT-SIDE VALIDATION
// ========================
const form = document.getElementById('registerForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const confirmInput = document.getElementById('password_confirmation');

// Helper: clear error
function clearFieldError(fieldId) {
  document.getElementById(fieldId).classList.remove('has-error');
}

function showFieldError(fieldId, messageId, message) {
  const fieldDiv = document.getElementById(fieldId);
  fieldDiv.classList.add('has-error');
  if (messageId) {
    const msgSpan = document.getElementById(messageId);
    if (msgSpan) msgSpan.innerText = message;
  }
}

form.addEventListener('submit', (e) => {
  e.preventDefault();
  let valid = true;

  // Reset errors
  ['nameField', 'emailField', 'passField', 'confirmField'].forEach(f => clearFieldError(f));

  // Name validation
  const name = nameInput.value.trim();
  if (!name) {
    showFieldError('nameField', 'nameErr', 'Full name is required.');
    valid = false;
  } else if (name.length < 2) {
    showFieldError('nameField', 'nameErr', 'Name must be at least 2 characters.');
    valid = false;
  }

  // Email validation
  const email = emailInput.value.trim();
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email) {
    showFieldError('emailField', 'emailErr', 'Email address is required.');
    valid = false;
  } else if (!emailPattern.test(email)) {
    showFieldError('emailField', 'emailErr', 'Please enter a valid email address.');
    valid = false;
  }

  // Password validation
  const password = passwordInput.value;
  if (!password) {
    showFieldError('passField', 'passErr', 'Password is required.');
    valid = false;
  } else if (password.length < 8) {
    showFieldError('passField', 'passErr', 'Password must be at least 8 characters.');
    valid = false;
  }

  // Confirm password match
  const confirm = confirmInput.value;
  if (!confirm) {
    showFieldError('confirmField', 'confirmErr', 'Please confirm your password.');
    valid = false;
  } else if (password !== confirm) {
    showFieldError('confirmField', 'confirmErr', 'Passwords do not match.');
    valid = false;
  }

  // Terms checkbox
  if (!termsChk.checked) {
    // Show custom inline error for terms (no dedicated field, add temporary message)
    let termsError = document.querySelector('.terms-error');
    if (!termsError) {
      termsError = document.createElement('div');
      termsError.className = 'field-error';
      termsError.style.marginTop = '8px';
      termsError.style.marginBottom = '0';
      termsError.innerHTML = '<i class="fas fa-exclamation-circle"></i><span>You must agree to the Terms & Privacy Policy.</span>';
      document.querySelector('.terms-row').after(termsError);
    } else {
      termsError.style.display = 'flex';
    }
    valid = false;
  } else {
    const existingErr = document.querySelector('.terms-error');
    if (existingErr) existingErr.style.display = 'none';
  }

  // If all valid, submit form
  if (valid) {
    form.submit();
  }
});

// ========================
// 4. LIVE ERROR CLEARING
// ========================
nameInput.addEventListener('input', () => clearFieldError('nameField'));
emailInput.addEventListener('input', () => clearFieldError('emailField'));
passwordInput.addEventListener('input', () => clearFieldError('passField'));
confirmInput.addEventListener('input', () => {
  clearFieldError('confirmField');
  // Also clear mismatch when user types again
  if (passwordInput.value === confirmInput.value) {
    clearFieldError('confirmField');
  }
});

// Remove terms error when checkbox is checked
termsChk.addEventListener('change', () => {
  const err = document.querySelector('.terms-error');
  if (err && termsChk.checked) err.style.display = 'none';
});

// Prefill terms checkbox visual if old input had it checked (for validation edge)
if (termsChk.checked) termsLabel.classList.add('checked');
</script>
</body>
</html>