<?php
/**
 * Footer for Malam Apresiasi 2026
 * Structure based on Gambar 4:
 * 1. Base color: Black (#090607 / #000000)
 * 2. Background: bg.webp mirrored vertically and horizontally
 * 3. Top Row:
 *    - Left: buniverse-white.webp logo + Navigation links (HOME, EVENT, NEWS, GALLERY)
 *    - Right: Circle social icons (Facebook, X / Twitter, Instagram, YouTube, TikTok)
 * 4. Divider line
 * 5. Media Brands Row:
 *    - btv.webp, brtst.webp, brtstdc.webp, investor.webp, id.webp, jg.webp, datasatu.webp
 * 6. Bottom Row:
 *    - Copyright © 2026
 */
$socials = !empty($site['socials']) ? $site['socials'] : [];
$fbUrl = !empty($socials['facebook']) ? $socials['facebook'] : 'https://facebook.com';
$xUrl = !empty($socials['twitter']) ? $socials['twitter'] : (!empty($socials['x']) ? $socials['x'] : 'https://x.com/btvidofficial');
$igUrl = !empty($socials['instagram']) ? $socials['instagram'] : 'https://instagram.com';
$ytUrl = !empty($socials['youtube']) ? $socials['youtube'] : 'https://youtube.com';
$ttUrl = !empty($socials['tiktok']) ? $socials['tiktok'] : 'https://tiktok.com';
?>

<footer class="site-footer map-footer">
  <div class="container map-footer-container">
    
    <!-- Top Row: Logo + Nav Links (Left) and Social Icons (Right) -->
    <div class="map-footer-top-row">
      
      <div class="map-footer-left-group">
        <!-- B-Universe White Logo -->
        <a href="#home" class="map-footer-logo-link" aria-label="B-Universe Home">
          <img src="<?= base_url('assets/img/buniverse-white.webp') ?>" alt="B-Universe" class="map-footer-logo">
        </a>

        <!-- Footer Nav Links -->
        <nav class="map-footer-nav" aria-label="Footer Navigation">
          <a href="#home" class="map-footer-nav-link">HOME</a>
          <a href="#overview" class="map-footer-nav-link">OVERVIEW</a>
          <a href="#about-us" class="map-footer-nav-link">ABOUT US</a>
          <a href="#categories" class="map-footer-nav-link">CATEGORIES</a>
          <a href="#schedule" class="map-footer-nav-link">SCHEDULE</a>
        </nav>
      </div>

      <!-- Social Media Circle Buttons (FB, X, IG, YT, TikTok) -->
      <div class="map-footer-socials">
        <!-- Facebook -->
        <a href="<?= esc($fbUrl) ?>" target="_blank" rel="noopener noreferrer" class="map-social-btn" aria-label="Facebook">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
          </svg>
        </a>

        <!-- X (formerly Twitter) -->
        <a href="<?= esc($xUrl) ?>" target="_blank" rel="noopener noreferrer" class="map-social-btn" aria-label="X">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
            <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
          </svg>
        </a>

        <!-- Instagram -->
        <a href="<?= esc($igUrl) ?>" target="_blank" rel="noopener noreferrer" class="map-social-btn" aria-label="Instagram">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
            <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
            <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
          </svg>
        </a>

        <!-- YouTube -->
        <a href="<?= esc($ytUrl) ?>" target="_blank" rel="noopener noreferrer" class="map-social-btn" aria-label="YouTube">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
            <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
          </svg>
        </a>

        <!-- TikTok -->
        <a href="<?= esc($ttUrl) ?>" target="_blank" rel="noopener noreferrer" class="map-social-btn" aria-label="TikTok">
          <svg viewBox="0 0 24 24" width="18" height="18" fill="currentColor">
            <path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-5.2 1.74 2.89 2.89 0 0 1 2.31-4.64c.29 0 .58.04.86.11V9.42a6.37 6.37 0 0 0-.86-.06A6.34 6.34 0 0 0 3.1 15.7a6.34 6.34 0 0 0 10.82 4.48 6.27 6.27 0 0 0 1.86-4.51v-6.6a8.16 8.16 0 0 0 4.77 1.52v-3.4a4.85 4.85 0 0 1-.96-.5z"/>
          </svg>
        </a>
      </div>

    </div>

    <!-- Divider Line -->
    <div class="map-footer-divider"></div>

    <!-- Media Partners Brands Row: btv, brtst, brtstdc, investor, id, jg, datasatu -->
    <div class="map-footer-brands-row">
      <div class="map-brand-item">
        <a href="https://btv.id/" target="_blank"><img src="<?= base_url('assets/img/btv.webp') ?>" alt="BTV" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://www.beritasatu.com/btv-live-streaming" target="_blank"><img src="<?= base_url('assets/img/brtst.webp') ?>" alt="BeritaSatu" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://www.beritasatu.com" target="_blank"><img src="<?= base_url('assets/img/brtstdc.webp') ?>" alt="BeritaSatu.com" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://subscribe.investor.id/" target="_blank"><img src="<?= base_url('assets/img/id.webp') ?>" alt="Investor Daily Indonesia" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://www.investor.id" target="_blank"><img src="<?= base_url('assets/img/investor.webp') ?>" alt="Investor.id" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://www.jakartaglobe.id" target="_blank"><img src="<?= base_url('assets/img/jg.webp') ?>" alt="Jakarta Globe" class="map-brand-logo"></a>
      </div>
      <div class="map-brand-item">
        <a href="https://www.datasatu.com" target="_blank"><img src="<?= base_url('assets/img/datasatu.webp') ?>" alt="DataSatu.com" class="map-brand-logo"></a>
      </div>
    </div>

    <!-- Bottom Copyright Row -->
    <div class="map-footer-bottom-row">
      <p class="map-copyright">Copyright &copy; 2026</p>
    </div>

  </div>
</footer>
