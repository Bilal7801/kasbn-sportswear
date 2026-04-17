<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>SialkotPro Sports — Login</title>
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
  padding:40px 56px;position:relative;overflow:hidden;
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

/* options row */
.field-opts{display:flex;justify-content:space-between;align-items:center;margin-bottom:24px}
.remember{display:flex;align-items:center;gap:8px;cursor:pointer;font-size:13px;color:var(--muted);user-select:none}
.remember input[type=checkbox]{display:none}
.check-box{
  width:16px;height:16px;border:1px solid rgba(201,168,76,.3);background:var(--dark-3);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s;
}
.remember input:checked ~ .check-label .check-box,
.remember.checked .check-box{background:var(--gold);border-color:var(--gold)}
.check-box i{font-size:9px;color:var(--dark);display:none}
.remember.checked .check-box i{display:block}
.forgot{
  font-family:var(--font-cond);font-size:12px;font-weight:600;
  letter-spacing:1.5px;text-transform:uppercase;color:var(--gold-dim);
  text-decoration:none;transition:color .2s;
}
.forgot:hover{color:var(--gold)}

/* submit btn */
.btn-login{
  width:100%;background:var(--gold);color:var(--dark);
  font-family:var(--font-cond);font-weight:700;font-size:14px;
  letter-spacing:3px;text-transform:uppercase;border:none;
  padding:15px;cursor:pointer;
  clip-path:polygon(0 0,calc(100% - 12px) 0,100% 12px,100% 100%,12px 100%,0 calc(100% - 12px));
  transition:background .2s;position:relative;overflow:hidden;
}
.btn-login::after{
  content:'';position:absolute;inset:0;
  background:linear-gradient(90deg,transparent 0%,rgba(255,255,255,.12) 50%,transparent 100%);
  transform:translateX(-100%);transition:transform .4s;
}
.btn-login:hover{background:var(--gold-light)}
.btn-login:hover::after{transform:translateX(100%)}
.btn-login i{margin-right:9px}

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

/* register link */
.register-link{
  margin-top:28px;text-align:center;
  font-size:13px;color:var(--muted);
}
.register-link a{
  font-family:var(--font-cond);font-weight:700;font-size:12px;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--gold);text-decoration:none;margin-left:6px;
  transition:color .2s;
}
.register-link a:hover{color:var(--gold-light)}

/* error / success state */
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

/* ── RESPONSIVE ─────────────────────── */
@media(max-width:900px){
  body{flex-direction:column}
  .left{width:100%;min-height:auto;padding:36px 28px;flex-direction:row;align-items:center;flex-wrap:wrap;gap:20px}
  .left-center,.left-bottom{display:none}
  .left-top{margin-bottom:0}
  .vdiv{display:none}
  .right{width:100%;padding:36px 28px;align-items:flex-start;min-height:auto}
  .back-link{position:static;margin-bottom:20px}
}
</style>
</head>
<body>

<!-- LEFT PANEL -->
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
      WORLD CLASS<br>
      <span>SPORTS</span><br>
      GOODS
    </div>
    <p class="left-desc">
      Manage your enquiries, orders and export operations from one secure dashboard. Built for serious manufacturers.
    </p>
    <div class="left-stats">
      <div class="lst"><span class="lst-n">40+</span><span class="lst-l">Countries</span></div>
      <div class="lst"><span class="lst-n">500K</span><span class="lst-l">Units / Year</span></div>
      <div class="lst"><span class="lst-n">25yr</span><span class="lst-l">Experience</span></div>
    </div>
  </div>

  <div class="left-bottom">
    <div class="cert-chip"><i class="fas fa-certificate"></i>ISO 9001:2015</div>
    <div class="cert-chip"><i class="fas fa-shield-alt"></i>BSCI Certified</div>
    <div class="cert-chip"><i class="fas fa-building"></i>SCCI Member</div>
  </div>

  <div class="vdiv"></div>
</div>

<!-- RIGHT PANEL -->
<div class="right">
  <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Site</a>

  <div class="form-wrap">
    <div class="form-header">
      <div class="form-eyebrow">Secure Access</div>
      <div class="form-title">SIGN IN</div>
      <div class="form-sub">Welcome back. Enter your credentials to access your dashboard.</div>
    </div>

    <form id="loginForm" novalidate>
      @csrf

      <!-- Email -->
      <div class="field" id="emailField">
        <label class="field-label">Email Address</label>
        <div class="field-wrap">
          <input
            type="email"
            id="email"
            name="email"
            class="field-input"
            placeholder="you@company.com"
            autocomplete="email"
          >
          <i class="fas fa-envelope field-icon"></i>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="emailErr">Please enter a valid email address.</span></div>
      </div>

      <!-- Password -->
      <div class="field" id="passField">
        <label class="field-label">Password</label>
        <div class="field-wrap">
          <input
            type="password"
            id="password"
            name="password"
            class="field-input"
            placeholder="••••••••••••"
            autocomplete="current-password"
          >
          <i class="fas fa-lock field-icon"></i>
          <button type="button" class="pw-toggle" id="pwToggle" tabindex="-1" aria-label="Toggle password visibility">
            <i class="fas fa-eye" id="pwIcon"></i>
          </button>
        </div>
        <div class="field-error"><i class="fas fa-exclamation-circle"></i><span id="passErr">Password is required.</span></div>
      </div>

      <!-- Options -->
      <div class="field-opts">
        <label class="remember" id="rememberLabel">
          <input type="checkbox" name="remember" id="rememberChk">
          <div class="check-box"><i class="fas fa-check"></i></div>
          <span style="margin-left:2px">Remember me</span>
        </label>
        <a href="#" class="forgot">Forgot Password?</a>
        {{-- {{ route('password.request') }} --}}
      </div>

      <!-- Submit -->
      <button type="submit" class="btn-login">
        <i class="fas fa-sign-in-alt"></i> Sign In to Dashboard
      </button>

      <!-- Divider -->
      <div class="or-div"><span class="or-text">or continue with</span></div>

      <!-- Social -->
      <div class="social-row">
        <a href="#" class="btn-social"><i class="fab fa-google"></i> Google</a>
        <a href="#" class="btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
      </div>

      <!-- Register -->
      <div class="register-link">
        Don't have an account?
        <a href="{{ route('user.signup') }}">Create Account</a>
        
      </div>
    </form>
  </div>
</div>

<script>
// Password toggle
const pwToggle = document.getElementById('pwToggle')
const pwInput  = document.getElementById('password')
const pwIcon   = document.getElementById('pwIcon')
pwToggle.addEventListener('click', () => {
  const show = pwInput.type === 'password'
  pwInput.type = show ? 'text' : 'password'
  pwIcon.className = show ? 'fas fa-eye-slash' : 'fas fa-eye'
})

// Remember me checkbox
const remLabel = document.getElementById('rememberLabel')
const remChk   = document.getElementById('rememberChk')
remLabel.addEventListener('click', () => {
  remLabel.classList.toggle('checked')
  remChk.checked = remLabel.classList.contains('checked')
})

// Client-side validation
const form = document.getElementById('loginForm')
form.addEventListener('submit', e => {
  e.preventDefault()
  let valid = true

  const email    = document.getElementById('email')
  const password = document.getElementById('password')
  const emailF   = document.getElementById('emailField')
  const passF    = document.getElementById('passField')

  // reset
  emailF.classList.remove('has-error')
  passF.classList.remove('has-error')

  if (!email.value || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
    emailF.classList.add('has-error')
    valid = false
  }
  if (!password.value || password.value.length < 6) {
    passF.classList.add('has-error')
    document.getElementById('passErr').textContent = password.value
      ? 'Password must be at least 6 characters.'
      : 'Password is required.'
    valid = false
  }

  if (valid) {
    // Submit the form for real in Laravel
    form.submit()
  }
})

// Clear error on typing
document.getElementById('email').addEventListener('input',   () => document.getElementById('emailField').classList.remove('has-error'))
document.getElementById('password').addEventListener('input', () => document.getElementById('passField').classList.remove('has-error'))
</script>
</body>
</html>
