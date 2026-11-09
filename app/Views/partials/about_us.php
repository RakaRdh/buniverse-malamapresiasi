<section class="about-us-section" id="about-us">
  <div class="container">
    <div class="about-us-header">
      <h2 class="section-title about-us-title">
        <span>Beritasatu Malam Apresiasi 2026</span>
      </h2>
    </div>

    <div class="about-us-grid">
      <div class="about-us-left">
        <div class="about-us-body">
          <?php if (!empty($overview['paragraphs'])): ?>
            <?php foreach ($overview['paragraphs'] as $p): ?>
              <p><?= nl2br(esc(trim($p))) ?></p>
            <?php endforeach; ?>
          <?php elseif (!empty($overview['content'])): ?>
            <?php 
              $contentParagraphs = array_filter(explode("\n\n", str_replace("\r\n", "\n", $overview['content'])));
              if (empty($contentParagraphs)) {
                  $contentParagraphs = [$overview['content']];
              }
            ?>
            <?php foreach ($contentParagraphs as $p): ?>
              <p><?= nl2br(esc(trim($p))) ?></p>
            <?php endforeach; ?>
          <?php else: ?>
            <p>
              Beritasatu.com kembali menggelar Malam Apresiasi Beritasatu. Apresiasi yang sudah digelar sejak tahun 2022 ini menjadi momentum penting bagi pembangunan nasional. Di tengah tantangan global dan dinamika nasional yang terus berkembang. Pemerintah daerah serta pelaku memainkan peran sentral dalam menjaga stabilitas ekonomi, mendorong inovasi, sekaligus mempercepat pembangunan yang inklusif dan berkelanjutan.
            </p>
            <p>
              Penghargaan ini diselenggarakan sebagai bentuk apresiasi atas dedikasi, inovasi, dan pencapaian para kepala daerah, pelaku industri serta para pemimpin yang telah menunjukkan kinerja luar biasa di bidangnya. Mereka telah berhasil menciptakan dampak nyata yang dirasakan oleh masyarakat sekaligus sukses juga menjadi agen perubahan.
            </p>
          <?php endif; ?>
        </div>
      </div>

      <div class="about-us-right">
        <div class="about-us-img-wrap">
          <img src="<?= base_url('assets/img/bsma.webp') ?>" alt="BeritaSatu Malam Apresiasi 2026" class="about-us-img">
        </div>
      </div>
    </div>

    <?php /* Banner Statistik yang dibungkus about-stats.webp plek ketiplek dengan ESG */ ?>
    <div class="about-stats-banner" id="aboutStatsRow">
      <div class="about-stats-inner">
        <h3 class="about-stats-heading">Menggerakkan Perubahan Melalui Prestasi Nyata</h3>
        <div class="about-stats-grid">
          <div class="about-stat-col">
            <div class="map-stat-number" data-target="8" data-prefix="">8</div>
            <div class="about-stat-label">CATEGORIES</div>
          </div>
          <div class="about-stat-col">
            <div class="map-stat-number" data-target="27" data-prefix="&plusmn; ">&plusmn; 27</div>
            <div class="about-stat-label">WINNERS</div>
          </div>
          <div class="about-stat-col">
            <div class="map-stat-number" data-target="150" data-prefix="&plusmn;">&plusmn;150</div>
            <div class="about-stat-label">AUDIENCES</div>
          </div>
        </div>
      </div>
    </div>

  </div>
</section>
