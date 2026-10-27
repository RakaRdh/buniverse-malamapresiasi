<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= esc($pageTitle ?? 'Undangan Resmi BeritaSatu Malam Apresiasi 2026') ?></title>
    
    <!-- Google Fonts: Playfair Display (Serif Luxury) & Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,500;0,600;0,700;1,400&family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg-outer: #050913;
            --bg-card: #0a1122;
            --gold-primary: #d4af37;
            --gold-gradient: linear-gradient(135deg, #f7df84 0%, #d4af37 50%, #997819 100%);
            --gold-subtle: rgba(212, 175, 55, 0.15);
            --text-gold: #f3cf65;
            --text-main: #f1f5f9;
            --text-muted: #94a3b8;
            --font-serif: 'Playfair Display', Georgia, serif;
            --font-sans: 'Plus Jakarta Sans', -apple-system, sans-serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            background-color: var(--bg-outer);
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(212, 175, 55, 0.08) 0%, transparent 40%),
                radial-gradient(circle at 90% 80%, rgba(21, 36, 64, 0.6) 0%, transparent 50%);
            color: var(--text-main);
            font-family: var(--font-sans);
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Portrait Mobile Container Frame for Desktop */
        .invitation-viewport {
            width: 100%;
            max-width: 440px;
            min-height: 100vh;
            background-color: var(--bg-card);
            box-shadow: 0 0 70px rgba(0, 0, 0, 0.85), 0 0 0 1px rgba(212, 175, 55, 0.22);
            position: relative;
            overflow-y: auto;
            scroll-behavior: smooth;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 768px) {
            body {
                padding: 24px 0;
            }
            .invitation-viewport {
                height: 94vh;
                min-height: 720px;
                border-radius: 28px;
            }
        }

        /* Ambient Glow & Floating Audio Button */
        .audio-toggle-btn {
            position: fixed;
            bottom: 24px;
            right: 24px;
            z-index: 999;
            width: 44px;
            height: 44px;
            border-radius: 50%;
            background: var(--gold-gradient);
            border: none;
            color: #080d1a;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: 0 4px 18px rgba(212, 175, 55, 0.45);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .audio-toggle-btn:hover {
            transform: scale(1.08);
            box-shadow: 0 6px 24px rgba(212, 175, 55, 0.65);
        }

        /* 1. SECTION: COVER / EMBLEM */
        .section-cover {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;
            padding: 48px 24px 36px;
            text-align: center;
            background: linear-gradient(180deg, #0d162b 0%, #080d19 100%);
            position: relative;
        }
        .cover-emblem {
            font-size: 11px;
            letter-spacing: 4px;
            text-transform: uppercase;
            color: var(--text-gold);
            font-weight: 700;
            border-bottom: 1px solid var(--gold-subtle);
            padding-bottom: 8px;
            margin-bottom: 16px;
        }
        .cover-title {
            font-family: var(--font-serif);
            font-size: 32px;
            font-weight: 700;
            line-height: 1.25;
            color: #ffffff;
            margin-bottom: 8px;
            text-shadow: 0 2px 10px rgba(0,0,0,0.5);
        }
        .cover-theme {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
            max-width: 320px;
            margin: 0 auto 32px;
        }

        .guest-greeting-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.3);
            border-radius: 16px;
            padding: 24px 20px;
            width: 100%;
            margin-bottom: 32px;
            backdrop-filter: blur(8px);
        }
        .guest-intro {
            font-size: 12px;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            color: var(--text-muted);
            margin-bottom: 8px;
        }
        .guest-name {
            font-family: var(--font-serif);
            font-size: 22px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
            line-height: 1.35;
        }
        .guest-institution {
            font-size: 13px;
            color: var(--text-gold);
            font-weight: 500;
        }

        .btn-open-invitation {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: var(--gold-gradient);
            color: #060a14;
            font-weight: 700;
            font-size: 14px;
            letter-spacing: 0.5px;
            padding: 14px 32px;
            border-radius: 50px;
            text-decoration: none;
            box-shadow: 0 8px 24px rgba(212, 175, 55, 0.4);
            cursor: pointer;
            border: none;
            transition: transform 0.2s ease;
        }
        .btn-open-invitation:hover {
            transform: translateY(-2px);
        }

        /* 2. SECTION: EVENT DETAILS & COUNTDOWN */
        .section-details {
            padding: 40px 24px;
            background: #080d19;
            border-top: 1px solid rgba(255,255,255,0.06);
        }
        .section-header {
            text-align: center;
            margin-bottom: 28px;
        }
        .section-header h2 {
            font-family: var(--font-serif);
            font-size: 24px;
            color: #fff;
            margin-bottom: 6px;
        }
        .section-header p {
            font-size: 13px;
            color: var(--text-muted);
        }

        .info-card {
            background: rgba(255, 255, 255, 0.025);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 16px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        .info-icon {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            background: var(--gold-subtle);
            color: var(--gold-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .info-content h4 {
            font-size: 15px;
            font-weight: 600;
            color: #fff;
            margin-bottom: 4px;
        }
        .info-content p {
            font-size: 13px;
            color: var(--text-muted);
            line-height: 1.5;
        }

        /* Countdown Grid */
        .countdown-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 10px;
            margin: 24px 0;
            text-align: center;
        }
        .countdown-box {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.2);
            border-radius: 10px;
            padding: 12px 6px;
        }
        .countdown-num {
            font-size: 22px;
            font-weight: 700;
            color: var(--text-gold);
            font-family: monospace;
        }
        .countdown-lbl {
            font-size: 10px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 2px;
        }

        /* 3. SECTION: RUNDOWN */
        .rundown-timeline {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-top: 20px;
        }
        .rundown-item {
            display: flex;
            gap: 16px;
            position: relative;
            padding-left: 20px;
            border-left: 2px solid rgba(212, 175, 55, 0.3);
        }
        .rundown-item::before {
            content: '';
            position: absolute;
            left: -6px;
            top: 2px;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: var(--gold-primary);
        }
        .rundown-time {
            font-size: 12px;
            font-weight: 700;
            color: var(--text-gold);
            min-width: 90px;
        }
        .rundown-desc {
            font-size: 13px;
            color: #cbd5e1;
            line-height: 1.4;
        }

        /* 4. SECTION: RSVP FORM */
        .section-rsvp {
            padding: 40px 24px 60px;
            background: linear-gradient(180deg, #080d19 0%, #0d162b 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }
        .rsvp-form-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(212, 175, 55, 0.25);
            border-radius: 16px;
            padding: 24px;
        }
        .rsvp-radio-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 20px;
        }
        .rsvp-radio-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 12px 10px;
            cursor: pointer;
            font-size: 13px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .rsvp-radio-label:has(input:checked) {
            border-color: var(--gold-primary);
            background: var(--gold-subtle);
            color: var(--text-gold);
        }
        .rsvp-textarea {
            width: 100%;
            background: rgba(0, 0, 0, 0.35);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 10px;
            color: #fff;
            padding: 12px 14px;
            font-family: inherit;
            font-size: 13px;
            resize: vertical;
            outline: none;
            margin-bottom: 20px;
        }
        .rsvp-textarea:focus {
            border-color: var(--gold-primary);
        }

        .btn-submit-rsvp {
            width: 100%;
            background: var(--gold-gradient);
            color: #060a14;
            font-weight: 700;
            font-size: 14px;
            padding: 13px 20px;
            border-radius: 10px;
            border: none;
            cursor: pointer;
            transition: transform 0.2s;
        }
        .btn-submit-rsvp:hover {
            transform: translateY(-1px);
        }

        .status-badge-current {
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .status-badge-attending {
            background: rgba(16, 185, 129, 0.15);
            color: #10b981;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }
        .status-badge-declined {
            background: rgba(239, 68, 68, 0.15);
            color: #ef4444;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .status-badge-pending {
            background: rgba(245, 158, 11, 0.15);
            color: #f59e0b;
            border: 1px solid rgba(245, 158, 11, 0.3);
        }
    </style>
</head>
<body>

    <!-- Audio Element (B-Universe Theme / Hymne) -->
    <audio id="bgMusic" loop preload="none">
        <source src="https://assets.mixkit.co/music/preview/mixkit-serene-view-443.mp3" type="audio/mp3">
    </audio>

    <!-- Floating Audio Play/Pause Button -->
    <button type="button" class="audio-toggle-btn" id="btnAudioToggle" title="Nyalakan / Matikan Musik" style="display:none;">
        <svg id="iconMusicPlay" viewBox="0 0 24 24" width="20" height="20" fill="currentColor">
            <path d="M8 5v14l11-7z"/>
        </svg>
        <svg id="iconMusicPause" viewBox="0 0 24 24" width="20" height="20" fill="currentColor" style="display:none;">
            <path d="M6 19h4V5H6v14zm8-14v14h4V5h-4z"/>
        </svg>
    </button>

    <!-- Portrait Mobile Frame Container -->
    <div class="invitation-viewport" id="invitationViewport">
        
        <!-- SECTION 1: COVER -->
        <section class="section-cover" id="secCover">
            <div>
                <div class="cover-emblem">B-UNIVERSE OFFICIAL INVITATION</div>
                <h1 class="cover-title"><?= esc($event['title'] ?? 'BERITASATU MALAM APRESIASI 2026') ?></h1>
                <p class="cover-theme"><?= esc($event['theme'] ?? 'Menggerakkan Perubahan, Menginspirasi Negeri') ?></p>
            </div>

            <!-- Personalized Greeting Box -->
            <div class="guest-greeting-box">
                <div class="guest-intro">Kepada Yth. Bapak / Ibu</div>
                <div class="guest-name"><?= esc($guest['name']) ?></div>
                <div class="guest-institution">
                    <?= esc($guest['position'] ? $guest['position'] . ', ' : '') ?><?= esc($guest['institution'] ?: 'Tamu Kehormatan VIP') ?>
                </div>
            </div>

            <div>
                <button type="button" class="btn-open-invitation" id="btnOpenInvitation">
                    <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                    <span>Buka Undangan</span>
                </button>
            </div>
        </section>

        <!-- SECTION 2: EVENT DETAILS -->
        <section class="section-details" id="secDetails">
            <div class="section-header">
                <h2>Waktu & Tempat</h2>
                <p>Informasi pelaksanaan acara resmi</p>
            </div>

            <!-- Countdown Timer -->
            <div class="countdown-grid" id="countdownGrid">
                <div class="countdown-box">
                    <div class="countdown-num" id="cdDays">00</div>
                    <div class="countdown-lbl">Hari</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-num" id="cdHours">00</div>
                    <div class="countdown-lbl">Jam</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-num" id="cdMinutes">00</div>
                    <div class="countdown-lbl">Menit</div>
                </div>
                <div class="countdown-box">
                    <div class="countdown-num" id="cdSeconds">00</div>
                    <div class="countdown-lbl">Detik</div>
                </div>
            </div>

            <!-- Date Card -->
            <div class="info-card">
                <div class="info-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                </div>
                <div class="info-content">
                    <h4>Jum'at, 20 November 2026</h4>
                    <p>Pukul 18.30 WIB s/d Selesai<br>Dress code: Formal / Batik Elegan</p>
                </div>
            </div>

            <!-- Venue Card -->
            <div class="info-card">
                <div class="info-icon">
                    <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg>
                </div>
                <div class="info-content">
                    <h4>Grand Ballroom, Hotel Mulia Senayan</h4>
                    <p>Jl. Asia Afrika Senayan, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, DKI Jakarta 10270</p>
                    <a href="https://maps.google.com/?q=Hotel+Mulia+Senayan+Jakarta" target="_blank" style="display:inline-block; margin-top:8px; color:var(--text-gold); font-size:12px; font-weight:600; text-decoration:none;">
                        Buka Petunjuk Google Maps &rarr;
                    </a>
                </div>
            </div>

            <!-- Section 3: Rundown -->
            <div style="margin-top: 36px;">
                <div class="section-header">
                    <h2>Susunan Acara</h2>
                    <p>Agenda perhelatan Malam Apresiasi</p>
                </div>

                <div class="rundown-timeline">
                    <div class="rundown-item">
                        <div class="rundown-time">18.30 – 19.15</div>
                        <div class="rundown-desc">Registrasi Tamu Undangan, Welcome Drink & Executive Networking</div>
                    </div>
                    <div class="rundown-item">
                        <div class="rundown-time">19.15 – 19.30</div>
                        <div class="rundown-desc">Opening Ceremony, Lagu Indonesia Raya & Tarian Sambutan Nusantara</div>
                    </div>
                    <div class="rundown-item">
                        <div class="rundown-time">19.30 – 19.50</div>
                        <div class="rundown-desc">Sambutan Executive Chairman B-Universe & Keynote Address</div>
                    </div>
                    <div class="rundown-item">
                        <div class="rundown-time">19.50 – 21.00</div>
                        <div class="rundown-desc">Penganugerahan Penghargaan Malam Apresiasi 2026 (Kategori Pemerintah & Korporasi)</div>
                    </div>
                    <div class="rundown-item">
                        <div class="rundown-time">21.00 – 21.30</div>
                        <div class="rundown-desc">Gala Dinner, Special Musical Performance & Foto Bersama</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: RSVP FORM -->
        <section class="section-rsvp" id="secRsvp">
            <div class="section-header">
                <h2>Konfirmasi Kehadiran</h2>
                <p>Mohon berkenan mengonfirmasi kehadiran Anda</p>
            </div>

            <div class="rsvp-form-card">
                <!-- Current Status Feedback -->
                <div id="rsvpCurrentStatus">
                    <?php if ($guest['rsvp_status'] === 'attending'): ?>
                        <div class="status-badge-current status-badge-attending">
                            ✓ Status Anda: <strong>Hadir (Attending)</strong>
                        </div>
                    <?php elseif ($guest['rsvp_status'] === 'declined'): ?>
                        <div class="status-badge-current status-badge-declined">
                            ✕ Status Anda: <strong>Berhalangan Hadir</strong>
                        </div>
                    <?php else: ?>
                        <div class="status-badge-current status-badge-pending">
                            ⏳ Status Anda: <strong>Belum Konfirmasi</strong>
                        </div>
                    <?php endif; ?>
                </div>

                <?php if ($isEventEnded): ?>
                    <div style="text-align:center; padding:16px; color:var(--text-muted); font-size:13px; line-height:1.6;">
                        Masa konfirmasi kehadiran telah ditutup karena perhelatan acara telah selesai diselenggarakan.<br>
                        Terima kasih atas perhatian dan dukungan Anda.
                    </div>
                <?php else: ?>
                    <form id="rsvpForm" onsubmit="handleRsvpSubmit(event)">
                        <input type="hidden" name="invitation_code" value="<?= esc($guest['invitation_code']) ?>">
                        
                        <div class="rsvp-radio-group">
                            <label class="rsvp-radio-label">
                                <input type="radio" name="rsvp_status" value="attending" <?= $guest['rsvp_status'] === 'attending' ? 'checked' : '' ?> required>
                                <span>Hadir</span>
                            </label>
                            <label class="rsvp-radio-label">
                                <input type="radio" name="rsvp_status" value="declined" <?= $guest['rsvp_status'] === 'declined' ? 'checked' : '' ?> required>
                                <span>Berhalangan</span>
                            </label>
                        </div>

                        <label style="display:block; font-size:12px; color:var(--text-muted); margin-bottom:6px;">Pesan, Doa, atau Catatan Khusus:</label>
                        <textarea name="notes" class="rsvp-textarea" rows="3" placeholder="Tuliskan ucapan atau catatan untuk panitia..."><?= esc($guest['notes'] ?? '') ?></textarea>

                        <button type="submit" class="btn-submit-rsvp" id="btnSubmitRsvp">
                            Simpan Konfirmasi
                        </button>
                    </form>
                <?php endif; ?>
            </div>

            <div style="text-align:center; margin-top:36px; font-size:11px; color:#64748b; line-height:1.6;">
                B-Universe Media Holdings &bull; BeritaSatu Media<br>
                Official Digital Invitation &copy; 2026
            </div>
        </section>

    </div>

    <!-- Interactive Script -->
    <script>
        const bgMusic = document.getElementById('bgMusic');
        const btnOpen = document.getElementById('btnOpenInvitation');
        const btnAudio = document.getElementById('btnAudioToggle');
        const iconPlay = document.getElementById('iconMusicPlay');
        const iconPause = document.getElementById('iconMusicPause');

        let isPlaying = false;

        function toggleAudio() {
            if (!bgMusic) return;
            if (isPlaying) {
                bgMusic.pause();
                iconPlay.style.display = 'block';
                iconPause.style.display = 'none';
                isPlaying = false;
            } else {
                bgMusic.play().then(() => {
                    iconPlay.style.display = 'none';
                    iconPause.style.display = 'block';
                    isPlaying = true;
                }).catch(e => console.log('Audio playback prevented:', e));
            }
        }

        btnOpen?.addEventListener('click', () => {
            // Scroll down smoothly to details
            document.getElementById('secDetails').scrollIntoView({ behavior: 'smooth' });

            // Trigger audio on first legal user interaction
            btnAudio.style.display = 'flex';
            if (!isPlaying) {
                toggleAudio();
            }
        });

        btnAudio?.addEventListener('click', toggleAudio);

        // Countdown Timer to 20 November 2026 18:30:00 WIB (+07:00)
        const targetDate = new Date('2026-11-20T18:30:00+07:00').getTime();
        function updateCountdown() {
            const now = new Date().getTime();
            const distance = targetDate - now;

            if (distance < 0) {
                document.getElementById('cdDays').textContent = '00';
                document.getElementById('cdHours').textContent = '00';
                document.getElementById('cdMinutes').textContent = '00';
                document.getElementById('cdSeconds').textContent = '00';
                return;
            }

            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);

            document.getElementById('cdDays').textContent = String(days).padStart(2, '0');
            document.getElementById('cdHours').textContent = String(hours).padStart(2, '0');
            document.getElementById('cdMinutes').textContent = String(minutes).padStart(2, '0');
            document.getElementById('cdSeconds').textContent = String(seconds).padStart(2, '0');
        }
        setInterval(updateCountdown, 1000);
        updateCountdown();

        // AJAX RSVP Submission
        async function handleRsvpSubmit(e) {
            e.preventDefault();
            const btn = document.getElementById('btnSubmitRsvp');
            btn.disabled = true;
            btn.textContent = 'Menyimpan...';

            const formData = new FormData(e.target);

            try {
                const resp = await fetch('<?= base_url('invitation/rsvp') ?>', {
                    method: 'POST',
                    body: formData,
                    headers: { 'X-Requested-With': 'XMLHttpRequest' }
                });
                const res = await resp.json();

                alert(res.message);

                if (res.status === 'success') {
                    const statusBox = document.getElementById('rsvpCurrentStatus');
                    if (res.rsvp_status === 'attending') {
                        statusBox.innerHTML = '<div class="status-badge-current status-badge-attending">✓ Status Anda: <strong>Hadir (Attending)</strong></div>';
                    } else {
                        statusBox.innerHTML = '<div class="status-badge-current status-badge-declined">✕ Status Anda: <strong>Berhalangan Hadir</strong></div>';
                    }
                }
            } catch (err) {
                alert('Gagal mengirim konfirmasi: ' + err);
            } finally {
                btn.disabled = false;
                btn.textContent = 'Simpan Konfirmasi';
            }
        }
    </script>
</body>
</html>
