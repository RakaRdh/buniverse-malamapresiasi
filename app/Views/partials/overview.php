<section class="overview-section" id="overview">
  <div class="container">
    <div class="overview-grid">
      <div class="overview-left">
        <h2 class="section-title overview-title">
          <span>Overview</span>
        </h2>
        <div class="overview-body">
          <?php if (!empty($overview['intro'])): ?>
            <?php 
              $introParagraphs = array_filter(explode("\n\n", str_replace("\r\n", "\n", $overview['intro'])));
              if (empty($introParagraphs)) {
                  $introParagraphs = [$overview['intro']];
              }
            ?>
            <?php foreach ($introParagraphs as $p): ?>
              <p><?= nl2br(esc(trim($p))) ?></p>
            <?php endforeach; ?>
          <?php else: ?>
            <p>
              Tahun 2025 menjadi momentum penting bagi pembangunan nasional. Di tengah tantangan global dan dinamika nasional yang terus berkembang. Pemerintah daerah serta pelaku memainkan peran sentral dalam menjaga stabilitas ekonomi, mendorong inovasi, sekaligus mempercepat pembangunan yang inklusif dan berkelanjutan.
            </p>
          <?php endif; ?>
        </div>
      </div>
      <div class="overview-right">
        <div class="overview-img-wrap">
          <img src="<?= base_url('assets/img/overview.webp') ?>" alt="Overview BeritaSatu Malam Apresiasi" class="overview-img">
        </div>
      </div>
    </div>
  </div>
</section>
