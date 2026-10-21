<header class="site-header" id="header">
  <div class="container">
    <div class="header-inner">
      
      <?php /* Brand lockup with B-Universe Logo */ ?>
      <div class="brand-lockup">
        <a href="#home" class="brand-logo-link brand-logo-link-a" aria-label="B-Universe">
          <img src="<?= base_url('assets/img/buniverse-white.webp') ?>" alt="B-Universe" class="brand-logo-ids" style="height: 38px;">
        </a>
      </div>

      <?php /* Right Group: Navigation links */ ?>
      <div class="header-right-group">
        <nav class="site-nav" id="siteNav" aria-label="Main Navigation">
          <div class="mobile-nav-header">
            <button class="nav-close-btn" id="navCloseBtn" aria-label="Close navigation menu">&times;</button>
          </div>
          <?php
            $navItems = !empty($site['nav_items']) ? $site['nav_items'] : [
                ['label' => 'Home', 'url' => '#home'],
                ['label' => 'Event', 'url' => '#overview'],
                ['label' => 'News', 'url' => '#news'],
                ['label' => 'Gallery', 'url' => '#gallery'],
            ];
            foreach ($navItems as $idx => $item):
          ?>
            <a href="<?= esc($item['url']) ?>" class="nav-link <?= $idx === 0 ? 'active' : '' ?>">
              <?= esc($item['label']) ?>
            </a>
          <?php endforeach; ?>
          <?php if (!empty($site['cta_ticket_active'])): ?>
            <a href="<?= esc($site['ticket_url']) ?>" class="btn-ticket btn-ticket-mobile" data-track-ticket="true" target="_blank" rel="noopener noreferrer">
              <?= esc($site['cta_ticket_label'] ?? 'Get Tickets') ?>
            </a>
          <?php endif; ?>
        </nav>

        <?php if (!empty($site['cta_ticket_active'])): ?>
          <a href="<?= esc($site['ticket_url']) ?>" class="btn-ticket btn-ticket-desktop" data-track-ticket="true" target="_blank" rel="noopener noreferrer">
            <?= esc($site['cta_ticket_label'] ?? 'Get Tickets') ?>
          </a>
        <?php endif; ?>
        
        <button class="nav-toggle" id="navToggle" aria-label="Toggle navigation menu">
          <img src="<?= base_url('assets/img/hamburger.svg') ?>" alt="Menu" class="nav-toggle-icon" width="26" height="18">
        </button>
      </div>

    </div>
  </div>
</header>
