<footer class="footer-self">
  <div class="container">
    <div class="footer-self-grid">
      {{-- Brand --}}
      <div class="footer-self-col">
        <div class="footer-self-brand">
          <div class="footer-self-logo">
            <i class="fas fa-trophy"></i>
          </div>
          <div>
            <div class="footer-self-logo-text">SIALKOTPRO</div>
            <div class="footer-self-logo-sub">FORTE &amp; BRANDED ITEMS</div>
          </div>
        </div>
        <p class="footer-self-desc">
          Premium sports goods directly from Sialkot. ISO 9001:2015 &amp; BSCI certified. Exporting to 40+ countries.
        </p>
        <div class="footer-self-social">
          <a href="#" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
          <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="#" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        </div>
      </div>

      {{-- Quick Links --}}
      <div class="footer-self-col">
        <h4 class="footer-self-heading">Quick Links</h4>
        <ul class="footer-self-links">
          <li><a href="{{ route('products') }}">Products</a></li>
          <li><a href="#why-us">Why Us</a></li>
          <li><a href="#process">Process</a></li>
          <li><a href="#certifications">Certifications</a></li>
          <li><a href="#enquiry">Get Quote</a></li>
        </ul>
      </div>

      {{-- Contact --}}
      <div class="footer-self-col">
        <h4 class="footer-self-heading">Contact</h4>
        <ul class="footer-self-contact">
          <li><i class="fas fa-map-marker-alt"></i> Sialkot, Punjab, Pakistan</li>
          <li><i class="fas fa-phone"></i> +92 300 1234567</li>
          <li><i class="fas fa-envelope"></i> export@sialkotpro.com</li>
          <li><i class="fas fa-clock"></i> Mon–Sat: 9 AM – 6 PM (PKT)</li>
        </ul>
      </div>
    </div>

    <div class="footer-self-bottom">
      <p>&copy; {{ date('Y') }} SialkotPro Sports. All rights reserved.</p>
      <div>
        <a href="#">Privacy Policy</a> <span>|</span> <a href="#">Terms of Service</a>
      </div>
    </div>
  </div>
</footer>

<style>
/* Scoped Footer Styles */
.footer-self {
  background: #0A0C10;
  border-top: 3px solid #C9A84C;
  padding-top: 60px;
  font-family: 'Barlow', sans-serif;
  color: #F0EDE6;
  margin-top: 50px;
}

.footer-self-grid {
  display: grid;
  grid-template-columns: 2fr 1fr 1fr;
  gap: 40px;
  padding-bottom: 40px;
}

.footer-self-brand {
  display: flex;
  align-items: center;
  gap: 14px;
  margin-bottom: 18px;
}
.footer-self-logo {
  width: 40px; height: 40px;
  background: #C9A84C;
  clip-path: polygon(50% 0%, 100% 25%, 100% 75%, 50% 100%, 0% 75%, 0% 25%);
  display: flex; align-items: center; justify-content: center;
}
.footer-self-logo i {
  color: #0A0C10;
  font-size: 16px;
}
.footer-self-logo-text {
  font-family: 'Barlow Condensed', sans-serif;
  font-size: 20px; font-weight: 700;
  letter-spacing: 2px;
  color: #FFFFFF;
  line-height: 1;
}
.footer-self-logo-sub {
  font-family: 'Barlow', sans-serif;
  font-size: 9px; letter-spacing: 3px;
  text-transform: uppercase;
  color: #C9A84C;
}
.footer-self-desc {
  font-size: 13px;
  line-height: 1.6;
  color: #6B7280;
  margin-bottom: 18px;
  max-width: 320px;
}

.footer-self-social {
  display: flex;
  gap: 12px;
}
.footer-self-social a {
  display: flex; align-items: center; justify-content: center;
  width: 36px; height: 36px;
  background: #181B22;
  border: 1px solid rgba(201,168,76,0.15);
  color: #C9A84C;
  transition: background 0.2s, color 0.2s;
  font-size: 14px;
  text-decoration: none;
}
.footer-self-social a:hover {
  background: #C9A84C;
  color: #0A0C10;
}

.footer-self-heading {
  font-family: 'Barlow Condensed', sans-serif;
  font-size: 15px; font-weight: 700;
  letter-spacing: 2px; text-transform: uppercase;
  color: #FFFFFF;
  margin-bottom: 20px;
  position: relative;
  padding-bottom: 10px;
}
.footer-self-heading::after {
  content: '';
  position: absolute; bottom: 0; left: 0;
  width: 30px; height: 2px;
  background: #C9A84C;
}

.footer-self-links {
  list-style: none;
  display: flex; flex-direction: column; gap: 12px;
}
.footer-self-links a {
  font-size: 14px;
  color: #6B7280;
  text-decoration: none;
  transition: color 0.2s;
  display: inline-flex; align-items: center; gap: 8px;
}
.footer-self-links a::before {
  content: '▸';
  font-size: 10px;
  color: #C9A84C;
}
.footer-self-links a:hover {
  color: #C9A84C;
}

.footer-self-contact {
  list-style: none;
  display: flex; flex-direction: column; gap: 12px;
}
.footer-self-contact li {
  font-size: 14px;
  color: #6B7280;
  display: flex; align-items: flex-start; gap: 10px;
}
.footer-self-contact i {
  color: #C9A84C;
  font-size: 14px;
  width: 16px; text-align: center;
  margin-top: 2px;
}

.footer-self-bottom {
  border-top: 1px solid rgba(201,168,76,0.08);
  padding: 20px 0;
  display: flex;
  justify-content: space-between;
  align-items: center;
  flex-wrap: wrap;
  gap: 10px;
  font-size: 13px;
  color: #6B7280;
}
.footer-self-bottom a {
  color: #6B7280;
  text-decoration: none;
}
.footer-self-bottom a:hover {
  color: #C9A84C;
}
.footer-self-bottom span {
  margin: 0 6px;
  color: #2C3140;
}

@media (max-width: 800px) {
  .footer-self-grid {
    grid-template-columns: 1fr;
  }
}
</style>