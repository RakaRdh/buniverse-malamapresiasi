<?php
/**
 * Event Schedule Section for Malam Apresiasi
 * Layout without Speaker tabs.
 * Header bar matching Gambar 3:
 * Red vertical bar + Event Schedule
 * Dark rounded container with Calendar, Pin, and Clock icons from database
 * Rundown item style matching IDS/EMF (Gambar 2):
 * - Left column: Pill waktu berwarna merah dengan icon clock (e.g. 18:00 WIB)
 * - Right column: Title session, Subtitle, dan Speaker card ber-background merah rounded
 * - Divider baris tipis di antara item rundown (border-bottom)
 * - Tanpa room pill
 */

// Format event date
$eventDateStr = !empty($site['dates']) ? $site['dates'] : 'KAMIS, 20 NOVEMBER 2026';
if (!empty($schedule['day_1']['label'])) {
    $eventDateStr = strtoupper($schedule['day_1']['label']);
} elseif (!empty($schedule['day_1']['date'])) {
    $ts = strtotime($schedule['day_1']['date']);
    if ($ts !== false) {
        $dayNames = [
            'Sunday' => 'MINGGU', 'Monday' => 'SENIN', 'Tuesday' => 'SELASA',
            'Wednesday' => 'RABU', 'Thursday' => 'KAMIS', 'Friday' => 'JUMAT', 'Saturday' => 'SABTU'
        ];
        $monthNames = [
            'January' => 'JANUARI', 'February' => 'FEBRUARI', 'March' => 'MARET',
            'April' => 'APRIL', 'May' => 'MEI', 'June' => 'JUNI',
            'July' => 'JULI', 'August' => 'AGUSTUS', 'September' => 'SEPTEMBER',
            'October' => 'OKTOBER', 'November' => 'NOVEMBER', 'December' => 'DESEMBER'
        ];
        $dayEn = date('l', $ts);
        $monthEn = date('F', $ts);
        $dayId = $dayNames[$dayEn] ?? strtoupper($dayEn);
        $monthId = $monthNames[$monthEn] ?? strtoupper($monthEn);
        $eventDateStr = $dayId . ', ' . date('j', $ts) . ' ' . $monthId . ' ' . date('Y', $ts);
    }
}

// Format venue
$eventVenue = !empty($site['venue']) ? strtoupper($site['venue']) : 'BALLROOM 1, HOTEL MULIA SENAYAN';

// Items list from database schedule day_1
$scheduleItems = !empty($schedule['day_1']['items']) ? $schedule['day_1']['items'] : (!empty($schedule['day_1']['sessions']) ? $schedule['day_1']['sessions'] : []);

// Format time: ambil dari jadwal jam pertama banget di data schedule
$eventTime = '';
if (!empty($scheduleItems)) {
    // Cari waktu mulai paling awal dari sesi pertama yang memiliki waktu
    foreach ($scheduleItems as $sess) {
        if (!empty($sess['start_time'])) {
            $st = str_replace(':', '.', substr(trim($sess['start_time']), 0, 5));
            $eventTime = $st . ' WIB';
            break;
        } elseif (!empty($sess['time'])) {
            // Jika format time e.g. "06:00 PM - 07:00 PM" atau "18:00 WIB"
            $tParts = explode('-', $sess['time']);
            $firstPart = trim($tParts[0]);
            $eventTime = $firstPart;
            break;
        }
    }
}
if (empty($eventTime)) {
    $eventTime = '18.00 WIB';
}
?>

<section class="schedule-section map-schedule-section" id="schedule">
  <div class="container">
    
    <!-- 1. Header with Red Accent Bar (Gambar 3) -->
    <div class="map-schedule-header">
      <div class="map-schedule-title-bar">
        <span class="map-schedule-red-bar"></span>
        <h2 class="map-schedule-title">Event Schedule</h2>
      </div>
    </div>

    <!-- 2. Dark Rounded Info Bar: Date, Venue, Time (Gambar 3) -->
    <div class="map-schedule-info-bar">
      <div class="map-info-item">
        <span class="map-info-icon">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
            <line x1="16" y1="2" x2="16" y2="6"></line>
            <line x1="8" y1="2" x2="8" y2="6"></line>
            <line x1="3" y1="10" x2="21" y2="10"></line>
          </svg>
        </span>
        <span class="map-info-text"><?= esc($eventDateStr) ?></span>
      </div>

      <div class="map-info-item">
        <span class="map-info-icon">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5a2.5 2.5 0 0 1 0-5 2.5 2.5 0 0 1 0 5z"/>
          </svg>
        </span>
        <span class="map-info-text"><?= esc($eventVenue) ?></span>
      </div>

      <div class="map-info-item">
        <span class="map-info-icon">
          <svg viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"></circle>
            <polyline points="12 6 12 12 16 14"></polyline>
          </svg>
        </span>
        <span class="map-info-text"><?= esc($eventTime) ?></span>
      </div>
    </div>

    <!-- 3. Schedule Rundown List (Style IDS & EMF per Gambar 2) -->
    <div class="schedule-list map-schedule-list">
      <?php if (!empty($scheduleItems)): ?>
        <?php foreach ($scheduleItems as $item): 
          // Format single start time or range
          $timeDisplay = '';
          if (!empty($item['start_time'])) {
              $timeDisplay = substr($item['start_time'], 0, 5) . ' WIB';
          } elseif (!empty($item['time'])) {
              $timeDisplay = $item['time'];
          }
        ?>
          <div class="schedule-row map-schedule-row <?= !empty($item['is_break']) ? 'is-break' : '' ?>">
            
            <!-- Kolom Waktu (Kiri): Pill Merah bulat lonjong -->
            <div class="schedule-meta-col map-meta-col">
              <div class="schedule-time map-schedule-time">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <circle cx="12" cy="12" r="10"></circle>
                  <polyline points="12 6 12 12 16 14"></polyline>
                </svg>
                <span><?= esc($timeDisplay) ?></span>
              </div>
            </div>

            <!-- Kolom Konten (Kanan): Judul, Subtitle, Speaker Card -->
            <div class="schedule-content-col map-content-col">
              <h3 class="session-title map-session-title">
                <span class="session-title-main"><?= esc($item['title'] ?? '') ?></span>
              </h3>

              <?php if (!empty($item['subtitle'])): ?>
                <div class="session-subtitle map-session-subtitle">
                  <?= esc($item['subtitle']) ?>
                </div>
              <?php endif; ?>

              <?php if (!empty($item['speakers'])): ?>
                <div class="plenary-speaker-grid map-speaker-grid">
                  <?php foreach ($item['speakers'] as $spk): ?>
                    <?= view('partials/schedule/speaker_card', ['speaker' => $spk]) ?>
                  <?php endforeach; ?>
                </div>
              <?php endif; ?>
            </div>

          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <div class="map-schedule-empty">
          <p>Rundown jadwal sedang dipersiapkan.</p>
        </div>
      <?php endif; ?>
    </div>

  </div>
</section>
