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
  /* Grayscale Palette */
  --bg-main:       #ffffff; /* Pure white right panel */
  --bg-panel:      #e5e7eb; /* Light Gray left panel */
  --bg-input:      #f3f4f6; /* Input field background */
  --bg-input-focus:#ffffff; /* Input focus state */

  --text-primary:  #000000; /* Pitch black for headings */
  --text-secondary:#4b5563; /* Medium gray for icons/subtext */
  --text-dark:     #111827; /* Near black for left side text */
  
  --accent:        #000000; /* Black for buttons */
  --accent-hover:  #374151; /* Dark gray for button hover */

  --border:        #d1d5db; /* Light borders */
  --line-color:    rgba(0,0,0,0.1); /* Black lines for grid */

  --font-display:'Bebas Neue',sans-serif;
  --font-cond:   'Barlow Condensed',sans-serif;
  --font-body:   'Barlow',sans-serif;
}
html,body{height:100%}
body{font-family:var(--font-body);background:var(--bg-main);color:var(--text-primary);
  display:flex;min-height:100vh;overflow-x:hidden}
::selection{background:var(--accent);color:white}
::-webkit-scrollbar{width:4px}
::-webkit-scrollbar-track{background:var(--bg-panel)}
::-webkit-scrollbar-thumb{background:var(--text-secondary);border-radius:2px}

/* ── ANIMATIONS ─────────────────────── */
@keyframes fadeIn{from{opacity:0;transform:translateY(16px)}to{opacity:1;transform:translateY(0)}}
@keyframes shimmer{0%{background-position:-200% center}100%{background-position:200% center}}
@keyframes lineScan{0%{top:-100%}100%{top:200%}}

/* ── LEFT PANEL ─────────────────────── */
.left{
  width:52%;background:var(--bg-panel);
  position:relative;overflow:hidden;
  display:flex;flex-direction:column;justify-content:space-between;padding:48px 56px;
}
/* grid overlay (BLACK LINES) */
.left::before{
  content:'';position:absolute;inset:0;z-index:0;
  background-image:
    linear-gradient(var(--line-color) 1px,transparent 1px),
    linear-gradient(90deg,var(--line-color) 1px,transparent 1px);
  background-size:56px 56px;
}
/* scanning line (BLACK) */
.scan-line{
  position:absolute;left:0;right:0;height:2px;z-index:1;
  background:linear-gradient(90deg,transparent,rgba(0,0,0,0.15),transparent);
  animation:lineScan 6s ease-in-out infinite;
  pointer-events:none;
}
/* subtle radial glow */
.left-glow{
  position:absolute;bottom:-120px;right:-120px;z-index:0;
  width:500px;height:500px;border-radius:50%;
  background:radial-gradient(circle,rgba(0,0,0,0.03) 0%,transparent 70%);
  pointer-events:none;
}

.left-top{position:relative;z-index:2;animation:fadeIn .7s ease both}
.brand{display:flex;align-items:center;gap:14px;margin-bottom:0}
.brand-hex{
  width:44px;height:44px;background:var(--accent);
  clip-path:polygon(50% 0%,100% 25%,100% 75%,50% 100%,0% 75%,0% 25%);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.brand-hex i{color:white;font-size:18px}
.brand-name{font-family:var(--font-cond);font-size:22px;font-weight:700;letter-spacing:2px;color:var(--text-dark);line-height:1}
.brand-sub{font-family:var(--font-body);font-size:9px;letter-spacing:3px;text-transform:uppercase;color:var(--text-secondary)}

/* hero text */
.left-center{position:relative;z-index:2;animation:fadeIn .7s .1s ease both}
.left-tagline{
  font-family:var(--font-display);
  font-size:clamp(56px,5.5vw,80px);
  line-height:.9;letter-spacing:1px;color:var(--text-dark);
  margin-bottom:20px;
}
.left-tagline span{
  display:block;
  background:linear-gradient(90deg,var(--text-dark) 0%,var(--text-secondary) 40%,var(--text-dark) 70%,var(--text-secondary) 100%);
  background-size:200% auto;
  -webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;
  animation:shimmer 3.5s linear infinite;
}
.left-desc{font-size:14px;line-height:1.75;color:var(--text-secondary);max-width:360px;margin-bottom:36px}

/* stats */
.left-stats{display:flex;gap:32px;flex-wrap:wrap}
.lst{display:flex;flex-direction:column;gap:2px}
.lst-n{font-family:var(--font-display);font-size:30px;color:var(--text-dark);line-height:1}
.lst-l{font-size:10px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--text-secondary)}

/* bottom badges */
.left-bottom{position:relative;z-index:2;display:flex;gap:10px;flex-wrap:wrap;animation:fadeIn .7s .2s ease both}
.cert-chip{
  display:flex;align-items:center;gap:7px;
  background:rgba(0,0,0,0.05);border:1px solid rgba(0,0,0,0.1);
  padding:7px 14px;
  font-family:var(--font-cond);font-size:11px;font-weight:600;letter-spacing:1.5px;
  text-transform:uppercase;color:var(--text-dark);
}
.cert-chip i{color:var(--text-dark);font-size:11px}

.vdiv{
  position:absolute;top:0;right:0;bottom:0;width:1px;
  background:linear-gradient(to bottom,transparent,rgba(0,0,0,0.1) 25%,rgba(0,0,0,0.1) 75%,transparent);
  z-index:3;
}

/* ── RIGHT PANEL ─────────────────────── */
.right{
  width:48%;background:var(--bg-main);
  display:flex;align-items:center;justify-content:center;
  padding:40px 56px;position:relative;overflow-y:auto;
}

.form-wrap{width:100%;max-width:400px;animation:fadeIn .65s .15s ease both; z-index:2;}

.form-header{margin-bottom:32px}
.form-eyebrow{
  font-family:var(--font-cond);font-size:11px;font-weight:700;
  letter-spacing:3px;text-transform:uppercase;color:var(--text-secondary);
  display:flex;align-items:center;gap:8px;margin-bottom:10px;
}
.form-eyebrow::before{content:'';width:16px;height:1.5px;background:var(--accent)}
.form-title{font-family:var(--font-display);font-size:42px;letter-spacing:1px;color:var(--text-primary);line-height:.95;margin-bottom:8px}
.form-sub{font-size:14px;color:var(--text-secondary);font-weight:300}

/* form fields */
.field{margin-bottom:16px;position:relative}
.field-label{
  display:block;font-family:var(--font-cond);font-size:10px;font-weight:700;
  letter-spacing:2.5px;text-transform:uppercase;color:var(--text-primary);margin-bottom:8px;
}
.field-wrap{position:relative}
.field-icon{
  position:absolute;left:14px;top:50%;transform:translateY(-50%);
  font-size:14px;color:var(--text-secondary);pointer-events:none;transition:color .2s;
}
.field-input{
  width:100%;background:var(--bg-input);
  border:1px solid var(--border);
  color:var(--text-primary);font-family:var(--font-body);font-size:14px;
  padding:13px 16px 13px 42px;outline:none;
  transition:border-color .2s,background .2s;
  border-radius:2px;
}
.field-input:focus{border-color:var(--accent);background:var(--bg-input-focus)}
.field-input:focus + .field-icon,
.field-wrap:focus-within .field-icon{color:var(--accent)}

/* password toggle */
.pw-toggle{
  position:absolute;right:14px;top:50%;transform:translateY(-50%);
  background:none;border:none;cursor:pointer;
  font-size:14px;color:var(--text-secondary);padding:4px;
}
.pw-toggle:hover{color:var(--text-primary)}

/* terms checkbox */
.terms-row{display:flex;align-items:center;margin-bottom:24px}
.terms-label{display:flex;align-items:center;gap:10px;cursor:pointer;font-size:13px;color:var(--text-secondary);user-select:none}
.terms-label input[type=checkbox]{display:none}
.check-box{
  width:16px;height:16px;border:1px solid var(--border);background:var(--bg-input);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;transition:all .2s;
}
.terms-label.checked .check-box{background:var(--accent);border-color:var(--accent)}
.check-box i{font-size:9px;color:white;display:none}
.terms-label.checked .check-box i{display:block}
.terms-label a{color:var(--text-primary);text-decoration:none;font-weight:600}
.terms-label a:hover{text-decoration:underline}

/* register btn */
.btn-register{
  width:100%;background:var(--accent);color:white;
  font-family:var(--font-cond);font-weight:700;font-size:14px;
  letter-spacing:3px;text-transform:uppercase;border:none;
  padding:15px;cursor:pointer;
  clip-path:polygon(0 0,calc(100% - 12px) 0,100% 12px,100% 100%,12px 100%,0 calc(100% - 12px));
  transition:background .2s;
}
.btn-register:hover{background:var(--accent-hover)}
.btn-register i{margin-right:9px}

/* divider */
.or-div{display:flex;align-items:center;gap:12px;margin:22px 0}
.or-div::before,.or-div::after{content:'';flex:1;height:1px;background:var(--border)}
.or-text{font-family:var(--font-cond);font-size:10px;font-weight:600;letter-spacing:2px;text-transform:uppercase;color:var(--text-secondary)}

/* social logins */
.social-row{display:flex;gap:10px}
.btn-social{
  flex:1;display:flex;align-items:center;justify-content:center;gap:8px;
  background:transparent;border:1px solid var(--border);
  color:var(--text-secondary);font-family:var(--font-cond);font-size:12px;
  font-weight:600;letter-spacing:1.5px;text-transform:uppercase;
  padding:11px;cursor:pointer;text-decoration:none;
  transition:all .2s;border-radius:2px;
}
.btn-social:hover{border-color:var(--text-primary);color:var(--text-primary);background:var(--bg-input)}

/* login link */
.login-link{
  margin-top:28px;text-align:center;
  font-size:13px;color:var(--text-secondary);
}
.login-link a{
  font-family:var(--font-cond);font-weight:700;font-size:12px;
  letter-spacing:1.5px;text-transform:uppercase;
  color:var(--text-primary);text-decoration:none;margin-left:6px;
}
.login-link a:hover{text-decoration:underline}

/* back to site link */
.back-link{
  position:absolute;top:28px;left:28px;
  display:flex;align-items:center;gap:7px;
  font-family:var(--font-cond);font-size:11px;font-weight:600;
  letter-spacing:2px;text-transform:uppercase;
  color:var(--text-secondary);text-decoration:none;transition:color .2s;z-index:10;
}
.back-link:hover{color:var(--text-primary)}

/* responsive */
@media(max-width:900px){
  body{flex-direction:column}
  .left{width:100%;min-height:auto;padding:36px 28px;flex-direction:row;align-items:center;flex-wrap:wrap;gap:20px}
  .left-center,.left-bottom{display:none}
  .vdiv{display:none}
  .right{width:100%;padding:36px 28px;align-items:flex-start}
  .back-link{position:static;margin-bottom:20px}
}
</style>
</head>
<body>

<div class="left">
  <div class="scan-line"></div>
  <div class="left-glow"></div>
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
    <div class="left-tagline">JOIN THE<br><span>ELITE NETWORK</span>OF MAKERS</div>
    <p class="left-desc">Get access to real‑time trade insights, order management, and premium buyer connections.</p>
    <div class="left-stats">
      <div class="lst"><span class="lst-n">150+</span><span class="lst-l">Active Clients</span></div>
      <div class="lst"><span class="lst-n">45+</span><span class="lst-l">Export Markets</span></div>
    </div>
  </div>
  <div class="left-bottom">
    <div class="cert-chip"><i class="fas fa-certificate"></i>ISO 9001:2015</div>
    <div class="cert-chip"><i class="fas fa-shield-alt"></i>BSCI Certified</div>
  </div>
  <div class="vdiv"></div>
</div>

<div class="right">
  <a href="/" class="back-link"><i class="fas fa-arrow-left"></i> Back to Site</a>
  <div class="form-wrap">
    <div class="form-header">
      <div class="form-eyebrow">Start Free</div>
      <div class="form-title">CREATE ACCOUNT</div>
      <div class="form-sub">Join SialkotPro Sports and unlock your manufacturing dashboard.</div>
    </div>

    <form id="registerForm" method="POST" action="#" novalidate>
      @csrf
      <div class="field" id="nameField">
        <label class="field-label">Full Name</label>
        <div class="field-wrap">
          <input type="text" id="name" name="name" class="field-input" placeholder="Ahmed Raza">
          <i class="fas fa-user field-icon"></i>
        </div>
      </div>
      <div class="field" id="emailField">
        <label class="field-label">Email Address</label>
        <div class="field-wrap">
          <input type="email" id="email" name="email" class="field-input" placeholder="you@company.com">
          <i class="fas fa-envelope field-icon"></i>
        </div>
      </div>
      <div class="field" id="passField">
        <label class="field-label">Password</label>
        <div class="field-wrap">
          <input type="password" id="password" name="password" class="field-input" placeholder="••••••••">
          <i class="fas fa-lock field-icon"></i>
          <button type="button" class="pw-toggle" data-target="password"><i class="fas fa-eye"></i></button>
        </div>
      </div>
      <div class="field" id="confirmField">
        <label class="field-label">Confirm Password</label>
        <div class="field-wrap">
          <input type="password" id="password_confirmation" name="password_confirmation" class="field-input" placeholder="••••••••">
          <i class="fas fa-check-circle field-icon"></i>
          <button type="button" class="pw-toggle" data-target="password_confirmation"><i class="fas fa-eye"></i></button>
        </div>
      </div>
      <div class="terms-row">
        <label class="terms-label" id="termsLabel">
          <input type="checkbox" name="terms" id="termsChk">
          <div class="check-box"><i class="fas fa-check"></i></div>
          <span>I agree to the <a href="#">Terms</a> and <a href="#">Privacy Policy</a></span>
        </label>
      </div>
      <button type="submit" class="btn-register"><i class="fas fa-user-plus"></i> Create Account</button>
      <div class="or-div"><span class="or-text">or sign up with</span></div>
      <div class="social-row">
        <a href="#" class="btn-social"><i class="fab fa-google"></i> Google</a>
        <a href="#" class="btn-social"><i class="fab fa-linkedin-in"></i> LinkedIn</a>
      </div>
      <div class="login-link">Already have an account? <a href="{{ route('user.login') }}">Sign In</a></div>
    </form>
  </div>
</div>

<script>
// Password toggle
document.querySelectorAll('.pw-toggle').forEach(btn => {
  btn.addEventListener('click', () => {
    const input = document.getElementById(btn.getAttribute('data-target'));
    const icon = btn.querySelector('i');
    const isPass = input.type === 'password';
    input.type = isPass ? 'text' : 'password';
    icon.className = isPass ? 'fas fa-eye-slash' : 'fas fa-eye';
  });
});

// Terms checkbox
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