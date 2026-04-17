<style>
.navbar {
    position: fixed;
    top: 0; left: 0; right: 0;
    z-index: 1000;
    transition: background 0.3s, box-shadow 0.3s;
    padding: 0;
}
.navbar.scrolled {
    background: rgba(10, 12, 16, 0.95);
    backdrop-filter: blur(12px);
    box-shadow: 0 1px 0 rgba(201, 168, 76, 0.2);
}
.nav-inner {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 24px;
    height: 72px;
    display: flex;
    align-items: center;
    justify-content: space-between;
}
.nav-logo {
    display: flex;
    align-items: center;
    gap: 12px;
    text-decoration: none;
}
.nav-logo-icon {
    width: 40px; height: 40px;
    background: var(--gold);
    display: flex; align-items: center; justify-content: center;
    clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
}
.nav-logo-icon i { color: var(--dark); font-size: 18px; }
.nav-logo-text {
    font-family: var(--font-cond);
    font-size: 22px; font-weight: 700;
    letter-spacing: 2px; color: var(--white); line-height: 1;
}
.nav-logo-sub {
    font-family: var(--font-body);
    font-size: 9px; letter-spacing: 3px;
    color: var(--gold); text-transform: uppercase;
}
.nav-links {
    display: flex; align-items: center;
    gap: 36px; list-style: none;
}
.nav-links a {
    font-family: var(--font-cond);
    font-size: 13px; font-weight: 600;
    letter-spacing: 2px; text-transform: uppercase;
    color: rgba(240,237,230,0.75);
    text-decoration: none;
    transition: color 0.2s;
    position: relative; padding-bottom: 4px;
}
.nav-links a::after {
    content: '';
    position: absolute; bottom: 0; left: 0;
    width: 0; height: 1px;
    background: var(--gold);
    transition: width 0.3s;
}
.nav-links a:hover { color: var(--gold); }
.nav-links a:hover::after { width: 100%; }

/* Nav right: login + CTA */
.nav-right {
    display: flex; align-items: center; gap: 16px;
}
.nav-login {
    font-family: var(--font-cond);
    font-size: 12px; font-weight: 600;
    letter-spacing: 2px; text-transform: uppercase;
    color: rgba(240,237,230,0.6);
    text-decoration: none;
    display: flex; align-items: center; gap: 7px;
    transition: color 0.2s;
    padding: 4px 0;
    border-bottom: 1px solid transparent;
    transition: color 0.2s, border-color 0.2s;
}
.nav-login:hover { color: var(--gold); border-color: rgba(201,168,76,0.4); }
.nav-login i { font-size: 13px; }

.nav-cta {
    font-family: var(--font-cond);
    font-size: 12px; font-weight: 700;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--dark); background: var(--gold);
    padding: 10px 22px; text-decoration: none;
    clip-path: polygon(0 0, calc(100% - 8px) 0, 100% 8px, 100% 100%, 8px 100%, 0 calc(100% - 8px));
    transition: background 0.2s;
}
.nav-cta:hover { background: var(--gold-light); }

.nav-hamburger {
    display: none; background: none; border: none;
    cursor: pointer; flex-direction: column; gap: 5px; padding: 4px;
}
.nav-hamburger span {
    display: block; width: 24px; height: 2px;
    background: var(--gold); transition: all 0.3s;
}
.mobile-menu {
    display: none;
    position: fixed; top: 72px; left: 0; right: 0;
    background: var(--dark-2);
    border-top: 1px solid rgba(201,168,76,0.2);
    padding: 24px; z-index: 999;
}
.mobile-menu.open { display: block; }
.mobile-menu ul { list-style: none; display: flex; flex-direction: column; gap: 16px; }
.mobile-menu a {
    font-family: var(--font-cond);
    font-size: 18px; font-weight: 600;
    letter-spacing: 2px; text-transform: uppercase;
    color: var(--light); text-decoration: none;
}
.mobile-menu a:hover { color: var(--gold); }
.mobile-menu-divider {
    height: 1px;
    background: rgba(201,168,76,0.15);
    margin: 8px 0;
}
@media (max-width: 900px) {
    .nav-links, .nav-right { display: none; }
    .nav-hamburger { display: flex; }
}
</style>

<nav class="navbar" id="navbar">
    <div class="nav-inner">
        <a href="#" class="nav-logo">
            <div class="nav-logo-icon"><i class="fas fa-trophy"></i></div>
            <div>
                <div class="nav-logo-text">SIALKOTPRO</div>
                <div class="nav-logo-sub">Sports Manufacturing</div>
            </div>
        </a>

        <ul class="nav-links">
            <li><a href="#products">Products</a></li>
            <li><a href="{{ route('why-us') }}">Why Us</a></li>
            <li><a href="#process">Process</a></li>
            <li><a href="#certifications">Certifications</a></li>
            <li><a href="#testimonials">Clients</a></li>
        </ul>

        <div class="nav-right">
            @auth
                <a href="{{ route('admin.enquiries.index') }}" class="nav-login">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display:inline">
                    @csrf
                    <button type="submit" class="nav-login" style="background:none;border:none;cursor:pointer;border-bottom:1px solid transparent;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            @else
                <a href="{{ route('user.login') }}" class="nav-login">
                    <i class="fas fa-user-circle"></i> Login
                </a>
            @endauth
            <a href="#enquiry" class="nav-cta">Request Quote</a>
        </div>

        <button class="nav-hamburger" id="hamburger" aria-label="Open menu">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<div class="mobile-menu" id="mobileMenu">
    <ul>
        <li><a href="#products" onclick="closeMobile()">Products</a></li>
        <li><a href="#why-us" onclick="closeMobile()">Why Us</a></li>
        <li><a href="#process" onclick="closeMobile()">Process</a></li>
        <li><a href="#certifications" onclick="closeMobile()">Certifications</a></li>
        <li><a href="#testimonials" onclick="closeMobile()">Clients</a></li>
        <li><a href="#enquiry" onclick="closeMobile()">Get Quote</a></li>
        <div class="mobile-menu-divider"></div>
        @auth
            <li><a href="{{ route('admin.enquiries.index') }}" onclick="closeMobile()"><i class="fas fa-th-large" style="margin-right:8px"></i>Dashboard</a></li>
        @else
            <li><a href="{{ route('user.login') }}" onclick="closeMobile()"><i class="fas fa-user-circle" style="margin-right:8px"></i>Login</a></li>
        @endauth

        
    </ul>
</div>

<script>
    window.addEventListener('scroll', () => {
        document.getElementById('navbar').classList.toggle('scrolled', window.scrollY > 40);
    });
    document.getElementById('hamburger').addEventListener('click', () => {
        document.getElementById('mobileMenu').classList.toggle('open');
    });
    function closeMobile() { document.getElementById('mobileMenu').classList.remove('open'); }
</script>
