<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= esc($pageTitle ?? 'Undangan Resmi BeritaSatu Malam Apresiasi 2026') ?></title>
    
    <!-- Google Fonts: Manrope (Body & Headings) & Playfair Display (Serif Accent) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap" rel="stylesheet">

    <style>
        :root {
            /* Black Palette */
            --black-1: #ffffff;
            --black-2: #fcfcfc;
            --black-3: #f5f5f5;
            --black-4: #f0f0f0;
            --black-5: #d9d9d9;
            --black-6: #bfbfbf;
            --black-7: #8c8c8c;
            --black-8: #595959;
            --black-9: #454545;
            --black-10: #262626;
            --black-11: #1f1f1f;
            --black-12: #141414;
            --black-13: #000000;

            /* Red Palette */
            --red-1: #f7e7e7;
            --red-2: #ebc4c4;
            --red-3: #db9696;
            --red-4: #cb6565;
            --red-5: #bb3636;
            --red-6: #ac0a0a;
            --red-7: #920909;
            --red-8: #7a0707;
            --red-9: #620606;
            --red-10: #4d0505;

            /* Gold / Accent */
            --gold-6: #c8a15f;

            /* Semantic tokens */
            --bg-page: #090607;
            --bg-canvas: #0e090b;
            --bg-card: #191214;
            --bg-card-subtle: #24171a;
            --border-red: rgba(172, 10, 10, 0.35);
            --border-subtle: rgba(255, 255, 255, 0.08);

            --text-primary: #ffffff;
            --text-secondary: #d9d9d9;
            --text-muted: #8c8c8c;

            --navbar-bg: #004b84; /* Deep Ocean Blue from user reference */
            --navbar-active-bg: #f97316; /* Vibrant Orange Active Pill from reference */

            --font-sans: 'Manrope', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-serif: 'Playfair Display', Georgia, serif;
        }

        *, *::before, *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        html, body {
            height: 100%;
            width: 100%;
            background-color: var(--bg-page);
            color: var(--text-primary);
            font-family: var(--font-sans);
            overflow: hidden;
            -webkit-font-smoothing: antialiased;
        }

        /* Ambient desktop container */
        .page-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: radial-gradient(circle at 50% 20%, rgba(172, 10, 10, 0.15) 0%, rgba(9, 6, 7, 0.95) 70%);
        }

        /* Portrait Phone/App Container Frame */
        .invitation-frame {
            position: relative;
            width: 100%;
            max-width: 440px;
            height: 100%;
            max-height: 100%;
            background-color: var(--bg-canvas);
            box-shadow: 0 0 60px rgba(0, 0, 0, 0.85), 0 0 0 1px rgba(172, 10, 10, 0.25);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        @media (min-width: 768px) {
            .invitation-frame {
                height: 94vh;
                max-height: 880px;
                border-radius: 28px;
            }
        }

        /* Vertical Full-Slide Snap Container */
        .slides-viewport {
            flex: 1;
            width: 100%;
            height: 100%;
            overflow-y: scroll;
            overflow-x: hidden;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 74px; /* Space for the bottom navbar */
            box-sizing: border-box;
        }

        /* Hide Scrollbar for clean app experience */
        .slides-viewport::-webkit-scrollbar {
            display: none;
        }
        .slides-viewport {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* Individual Snap Slide / Section */
        .slide-section {
            width: 100%;
            min-height: 100%;
            scroll-snap-align: start;
            scroll-snap-stop: always;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 32px 24px;
            overflow-y: auto;
            background: transparent;
        }

        /* Decorative subtle wave / background overlay */
        .slide-section::before {
            content: '';
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 80% 10%, rgba(172, 10, 10, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 1;
        }

        .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 390px;
            margin: 0 auto;
        }

        /* Typography & Components */
        .tag-pill {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 4px 14px;
            border-radius: 50px;
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1.5px;
            text-transform: uppercase;
            background: rgba(172, 10, 10, 0.15);
            border: 1px solid rgba(172, 10, 10, 0.35);
            color: var(--red-4);
            margin-bottom: 14px;
        }

        .slide-title {
            font-size: 24px;
            font-weight: 800;
            line-height: 1.25;
            color: #ffffff;
            margin-bottom: 8px;
            letter-spacing: -0.3px;
        }
        .slide-title-serif {
            font-family: var(--font-serif);
            font-weight: 700;
        }

        .slide-desc {
            font-size: 13px;
            color: var(--text-secondary);
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .info-card {
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 14px;
            padding: 16px 18px;
            margin-bottom: 12px;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.35);
        }

        .card-red-accent {
            border-left: 3px solid var(--red-6);
        }

        /* ================= 1. COVER / OPENING SLIDE ================= */
        .cover-logos {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 16px;
            margin-bottom: 24px;
        }
        .brand-logo-main {
            height: 30px;
            width: auto;
            object-fit: contain;
        }

        .cover-hero-box {
            text-align: center;
            padding: 24px 16px;
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(36, 23, 26, 0.8) 0%, rgba(20, 13, 15, 0.95) 100%);
            border: 1px solid var(--border-red);
            margin-bottom: 24px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
        }

        .cover-guest-label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-muted);
            margin-bottom: 6px;
        }
        .cover-guest-name {
            font-size: 18px;
            font-weight: 800;
            color: #ffffff;
            line-height: 1.35;
            margin-bottom: 4px;
        }
        .cover-guest-inst {
            font-size: 12px;
            color: var(--red-4);
            font-weight: 500;
        }

        .btn-swipe-down {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 13px 20px;
            background: linear-gradient(135deg, var(--red-6) 0%, var(--red-8) 100%);
            color: #ffffff;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 0.5px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 18px rgba(172, 10, 10, 0.45);
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .btn-swipe-down:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 22px rgba(172, 10, 10, 0.65);
        }

        /* ================= 2. DETAIL ACARA SLIDE ================= */
        .event-detail-item {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            margin-bottom: 14px;
        }
        .event-detail-item:last-child {
            margin-bottom: 0;
        }
        .event-icon-box {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: rgba(172, 10, 10, 0.15);
            border: 1px solid var(--border-red);
            color: var(--red-4);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .event-detail-label {
            font-size: 11px;
            color: var(--text-muted);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 2px;
        }
        .event-detail-val {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.4;
        }

        /* ================= 3. RUNDOWN SLIDE ================= */
        .rundown-timeline {
            display: flex;
            flex-direction: column;
            gap: 10px;
            max-height: 360px;
            overflow-y: auto;
            padding-right: 4px;
        }
        .rundown-timeline::-webkit-scrollbar {
            width: 4px;
        }
        .rundown-timeline::-webkit-scrollbar-thumb {
            background: var(--red-8);
            border-radius: 4px;
        }
        .rundown-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 10px;
            padding: 10px 14px;
        }
        .rundown-time {
            font-size: 12px;
            font-weight: 700;
            color: var(--red-4);
            background: rgba(172, 10, 10, 0.15);
            padding: 4px 8px;
            border-radius: 6px;
            white-space: nowrap;
        }
        .rundown-title {
            font-size: 13px;
            font-weight: 600;
            color: #ffffff;
            line-height: 1.35;
        }

        /* ================= 4. MAPS SLIDE ================= */
        .maps-box {
            width: 100%;
            height: 220px;
            border-radius: 14px;
            overflow: hidden;
            border: 1px solid var(--border-red);
            margin-bottom: 14px;
            background: #1f1f1f;
        }
        .maps-box iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        .btn-maps-action {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 11px;
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-maps-action:hover {
            background: rgba(255, 255, 255, 0.15);
        }

        /* ================= 5. RSVP SLIDE ================= */
        .rsvp-option-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 14px;
        }
        .rsvp-label-card {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 12px;
            border-radius: 10px;
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            color: var(--text-secondary);
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-align: center;
        }
        .rsvp-label-card input {
            display: none;
        }
        .rsvp-label-card.active-attending {
            background: rgba(16, 185, 129, 0.15);
            border-color: #10b981;
            color: #10b981;
        }
        .rsvp-label-card.active-declined {
            background: rgba(239, 68, 68, 0.15);
            border-color: #ef4444;
            color: #ef4444;
        }
        .rsvp-textarea {
            width: 100%;
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 10px;
            padding: 12px;
            color: #ffffff;
            font-size: 13px;
            font-family: inherit;
            resize: none;
            margin-bottom: 14px;
            box-sizing: border-box;
        }
        .rsvp-textarea:focus {
            outline: none;
            border-color: var(--red-6);
        }

        /* ================= 6. CONTACT SLIDE ================= */
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            background: var(--bg-card);
            border: 1px solid var(--border-subtle);
            border-radius: 12px;
            margin-bottom: 10px;
        }
        .contact-name {
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
        }
        .contact-role {
            font-size: 11px;
            color: var(--text-muted);
            margin-top: 2px;
        }
        .btn-wa {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            border-radius: 50px;
            background: #25D366;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
        }

        /* ================= 7. THANK YOU SLIDE ================= */
        .thank-you-box {
            text-align: center;
            padding: 32px 20px;
            border-radius: 18px;
            background: linear-gradient(180deg, rgba(36, 23, 26, 0.7) 0%, rgba(20, 13, 15, 0.95) 100%);
            border: 1px solid var(--border-red);
        }
        .portal-logos-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 16px;
            margin-top: 24px;
            opacity: 0.75;
        }
        .portal-logo-item {
            height: 18px;
            object-fit: contain;
        }

        /* ================= BOTTOM NAVIGATION BAR (User Reference Gambar 1) ================= */
        .invitation-bottom-nav {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 64px;
            background-color: var(--navbar-bg);
            border-top: 1px solid rgba(255, 255, 255, 0.12);
            display: flex;
            align-items: center;
            justify-content: space-around;
            padding: 0 6px;
            z-index: 100;
            box-shadow: 0 -4px 18px rgba(0, 0, 0, 0.45);
        }

        .nav-tab-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            color: #ffffff;
            opacity: 0.75;
            padding: 6px 8px;
            border-radius: 8px;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.2s ease;
            flex: 1;
            min-width: 0;
        }

        .nav-tab-btn svg {
            width: 20px;
            height: 20px;
            stroke-width: 2;
        }

        .nav-tab-label {
            font-size: 10.5px;
            font-weight: 600;
            white-space: nowrap;
            letter-spacing: -0.2px;
        }

        /* Active State Pill from user reference (Vibrant Orange rounded block) */
        .nav-tab-btn.active {
            opacity: 1;
            background-color: var(--navbar-active-bg);
            color: #ffffff;
            border-radius: 12px;
            padding: 8px 6px;
        }
        .nav-tab-btn.active .nav-tab-label {
            font-weight: 700;
        }
    </style>
</head>
<body>

<div class="page-wrapper">
    <div class="invitation-frame">

        <!-- Vertical Snap Slides -->
        <div class="slides-viewport" id="slidesViewport">

            <!-- 1. COVER / OPENING SLIDE -->
            <section class="slide-section" id="section-opening" data-index="0" data-label="Opening">
                <div class="slide-content" style="text-align: center;">
                    <div class="cover-logos">
                        <img src="<?= base_url('assets/img/buniverse-white.webp') ?>" alt="B-Universe" class="brand-logo-main">
                        <div style="width: 1px; height: 18px; background: rgba(255,255,255,0.25);"></div>
                        <img src="<?= base_url('assets/img/brtst.webp') ?>" alt="BeritaSatu" class="brand-logo-main">
                    </div>

                    <div class="tag-pill">Official E-Invitation</div>

                    <h1 class="slide-title" style="font-size: 26px; margin-bottom: 4px;">
                        BERITASATU<br>
                        <span style="color: var(--red-4);">MALAM APRESIASI</span> 2026
                    </h1>
                    <p style="font-size: 12px; color: var(--text-muted); margin-bottom: 24px;">
                        <?= esc($event['theme'] ?? 'Menggerakkan Perubahan, Menginspirasi Negeri') ?>
                    </p>

                    <div class="cover-hero-box">
                        <div class="cover-guest-label">Kepada Yth. Tamu Undangan</div>
                        <div class="cover-guest-name"><?= esc($guest['name'] ?? 'Bapak / Ibu Tamu Undangan') ?></div>
                        <div class="cover-guest-inst">
                            <?= esc($guest['institution'] ?: ($guest['position'] ?: 'Tamu Undangan VIP')) ?>
                        </div>
                    </div>

                    <button type="button" class="btn-swipe-down" onclick="scrollToSection('section-acara')">
                        <span>Buka Detail Undangan</span>
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="6 9 12 15 18 9"></polyline></svg>
                    </button>
                </div>
            </section>

            <!-- 2. DETAIL ACARA SLIDE -->
            <section class="slide-section" id="section-acara" data-index="1" data-label="Acara">
                <div class="slide-content">
                    <div class="tag-pill">Detail Pelaksanaan</div>
                    <h2 class="slide-title">Waktu & Tempat</h2>
                    <p class="slide-desc">Kami mengundang kehadiran Bapak/Ibu pada malam penganugerahan dan apresiasi nasional.</p>

                    <div class="info-card card-red-accent">
                        <div class="event-detail-item">
                            <div class="event-icon-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                            </div>
                            <div>
                                <div class="event-detail-label">Hari & Tanggal</div>
                                <div class="event-detail-val">Kamis, 20 November 2026</div>
                            </div>
                        </div>

                        <div class="event-detail-item">
                            <div class="event-icon-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            </div>
                            <div>
                                <div class="event-detail-label">Waktu Acara</div>
                                <div class="event-detail-val">18:00 WIB &ndash; Selesai</div>
                            </div>
                        </div>

                        <div class="event-detail-item">
                            <div class="event-icon-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </div>
                            <div>
                                <div class="event-detail-label">Lokasi Acara</div>
                                <div class="event-detail-val">Ballroom 1, Hotel Mulia Senayan</div>
                                <div style="font-size: 11px; color: var(--text-muted); margin-top: 2px;">Jl. Asia Afrika, Gelora, Jakarta Pusat</div>
                            </div>
                        </div>

                        <div class="event-detail-item">
                            <div class="event-icon-box">
                                <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                            </div>
                            <div>
                                <div class="event-detail-label">Dresscode</div>
                                <div class="event-detail-val">Batik Lengan Panjang / Formal Suite</div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 3. RUNDOWN SLIDE -->
            <section class="slide-section" id="section-rundown" data-index="2" data-label="Rundown">
                <div class="slide-content">
                    <div class="tag-pill">Susunan Acara</div>
                    <h2 class="slide-title">Rundown Kegiatan</h2>
                    <p class="slide-desc">Agenda perayaan dan penganugerahan BeritaSatu Malam Apresiasi 2026.</p>

                    <div class="rundown-timeline">
                        <div class="rundown-item">
                            <div class="rundown-time">17.30 - 18.30</div>
                            <div class="rundown-title">Registrasi Tamu VIP, Red Carpet & Welcoming Cocktail</div>
                        </div>
                        <div class="rundown-item">
                            <div class="rundown-time">18.30 - 18.45</div>
                            <div class="rundown-title">Opening Act: Tarian Tradisional Kontemporer & Lagu Indonesia Raya</div>
                        </div>
                        <div class="rundown-item">
                            <div class="rundown-time">18.45 - 19.00</div>
                            <div class="rundown-title">Welcoming Speech oleh Management B-Universe</div>
                        </div>
                        <div class="rundown-item">
                            <div class="rundown-time">19.00 - 19.45</div>
                            <div class="rundown-title">Sesi Penganugerahan Kategori Governance & Sektor Publik</div>
                        </div>
                        <div class="rundown-item">
                            <div class="rundown-time">19.45 - 20.30</div>
                            <div class="rundown-title">Sesi Penganugerahan Kategori Private Sectors & Korporasi</div>
                        </div>
                        <div class="rundown-item">
                            <div class="rundown-time">20.30 - 21.30</div>
                            <div class="rundown-title">Gala Dinner, Special Musical Performance & Sesi Foto Bersama</div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- 4. MAPS SLIDE -->
            <section class="slide-section" id="section-maps" data-index="3" data-label="Maps">
                <div class="slide-content">
                    <div class="tag-pill">Petunjuk Lokasi</div>
                    <h2 class="slide-title">Peta Lokasi Gedung</h2>
                    <p class="slide-desc">Hotel Mulia Senayan, Ballroom 1, Jakarta Pusat.</p>

                    <div class="maps-box">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3888517539423!2d106.79727567499026!3d-6.212340393775647!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14d8721c439%3A0xe5c3513eb1796c82!2sHotel%20Mulia%20Senayan%2C%20Jakarta!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                    <a href="https://maps.google.com/?q=Hotel+Mulia+Senayan+Jakarta" target="_blank" rel="noopener noreferrer" class="btn-maps-action">
                        <svg viewBox="0 0 24 24" width="16" height="16" fill="none" stroke="currentColor"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                        <span>Buka Penunjuk Arah Google Maps</span>
                    </a>
                </div>
            </section>

            <!-- 5. RSVP SLIDE -->
            <section class="slide-section" id="section-rsvp" data-index="4" data-label="RSVP">
                <div class="slide-content">
                    <div class="tag-pill">Konfirmasi Kehadiran</div>
                    <h2 class="slide-title">RSVP Tamu Undangan</h2>
                    <p class="slide-desc">Mohon konfirmasi kesediaan kehadiran Bapak/Ibu untuk reservasi kursi kehormatan.</p>

                    <form id="rsvpForm" onsubmit="handleRsvpSubmit(event)">
                        <input type="hidden" name="invitation_code" value="<?= esc($guest['invitation_code'] ?? '') ?>">

                        <div class="rsvp-option-group">
                            <label class="rsvp-label-card <?= ($guest['rsvp_status'] ?? '') === 'attending' ? 'active-attending' : '' ?>" id="labelAttending">
                                <input type="radio" name="rsvp_status" value="attending" <?= ($guest['rsvp_status'] ?? '') === 'attending' ? 'checked' : '' ?> onchange="updateRsvpSelection()">
                                <span>Hadir</span>
                            </label>
                            <label class="rsvp-label-card <?= ($guest['rsvp_status'] ?? '') === 'declined' ? 'active-declined' : '' ?>" id="labelDeclined">
                                <input type="radio" name="rsvp_status" value="declined" <?= ($guest['rsvp_status'] ?? '') === 'declined' ? 'checked' : '' ?> onchange="updateRsvpSelection()">
                                <span>Berhalangan</span>
                            </label>
                        </div>

                        <textarea 
                            name="notes" 
                            class="rsvp-textarea" 
                            rows="3" 
                            placeholder="Catatan / ucapan selamat untuk acara (opsional)..."><?= esc($guest['notes'] ?? '') ?></textarea>

                        <button type="submit" id="btnSubmitRsvp" class="btn-swipe-down" style="padding: 12px 20px;">
                            <span>Kirim Konfirmasi Kehadiran</span>
                        </button>
                    </form>

                    <div id="rsvpAlert" style="display:none; font-size:12px; padding:10px 14px; border-radius:8px; margin-top:14px; text-align:center;"></div>
                </div>
            </section>

            <!-- 6. CONTACT PERSON SLIDE -->
            <section class="slide-section" id="section-contact" data-index="5" data-label="Contact">
                <div class="slide-content">
                    <div class="tag-pill">Layanan Informasi</div>
                    <h2 class="slide-title">Hubungi Panitia</h2>
                    <p class="slide-desc">Apabila Bapak/Ibu memerlukan informasi lebih lanjut mengenai protokoler dan reservasi.</p>

                    <div class="contact-item">
                        <div>
                            <div class="contact-name">Sekretariat Panitia</div>
                            <div class="contact-role">Protokoler & Konfirmasi Kehadiran VIP</div>
                        </div>
                        <a href="https://wa.me/6281212678789?text=Halo%20Panitia%20Malam%20Apresiasi%202026" target="_blank" rel="noopener noreferrer" class="btn-wa">
                            <span>WhatsApp</span>
                        </a>
                    </div>

                    <div class="contact-item">
                        <div>
                            <div class="contact-name">Liaison Officer (LO)</div>
                            <div class="contact-role">Pendampingan Tamu & Penjemputan</div>
                        </div>
                        <a href="https://wa.me/628118000000?text=Halo%20LO%20Malam%20Apresiasi%202026" target="_blank" rel="noopener noreferrer" class="btn-wa">
                            <span>WhatsApp</span>
                        </a>
                    </div>
                </div>
            </section>

            <!-- 7. THANK YOU SLIDE -->
            <section class="slide-section" id="section-thanks" data-index="6" data-label="Thank You">
                <div class="slide-content">
                    <div class="thank-you-box">
                        <div class="tag-pill" style="margin-bottom: 12px;">Sampai Jumpa</div>
                        <h2 class="slide-title slide-title-serif" style="font-size: 28px; margin-bottom: 8px;">Terima Kasih</h2>
                        <p style="font-size: 13px; color: var(--text-secondary); line-height: 1.6; margin-bottom: 16px;">
                            Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran serta partisipasi Bapak/Ibu sekalian.
                        </p>
                        <div style="font-size: 12px; font-weight: 700; color: var(--red-4);">
                            BeritaSatu Media Holdings &bull; B-Universe
                        </div>

                        <div class="portal-logos-row">
                            <img src="<?= base_url('assets/img/brtstdc.webp') ?>" alt="Beritasatu.com" class="portal-logo-item">
                            <img src="<?= base_url('assets/img/btv.webp') ?>" alt="BTV" class="portal-logo-item">
                            <img src="<?= base_url('assets/img/investor.webp') ?>" alt="Investor Daily" class="portal-logo-item">
                            <img src="<?= base_url('assets/img/jg.webp') ?>" alt="Jakarta Globe" class="portal-logo-item">
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- Sticky Bottom Navigation Bar (Matching User Reference Gambar 1) -->
        <nav class="invitation-bottom-nav" id="bottomNav">
            <a href="javascript:void(0)" class="nav-tab-btn active" data-target="section-opening" onclick="scrollToSection('section-opening')">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M10 20v-6h4v6h5v-8h3L12 3 2 12h3v8z"/></svg>
                <span class="nav-tab-label">Opening</span>
            </a>
            <a href="javascript:void(0)" class="nav-tab-btn" data-target="section-acara" onclick="scrollToSection('section-acara')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line><polyline points="9 16 11 18 15 14"></polyline></svg>
                <span class="nav-tab-label">Acara</span>
            </a>
            <a href="javascript:void(0)" class="nav-tab-btn" data-target="section-rundown" onclick="scrollToSection('section-rundown')">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"></rect><line x1="7" y1="8" x2="17" y2="8"></line><line x1="7" y1="12" x2="17" y2="12"></line><line x1="7" y1="16" x2="13" y2="16"></line></svg>
                <span class="nav-tab-label">Rundown</span>
            </a>
            <a href="javascript:void(0)" class="nav-tab-btn" data-target="section-maps" onclick="scrollToSection('section-maps')">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                <span class="nav-tab-label">Maps</span>
            </a>
            <a href="javascript:void(0)" class="nav-tab-btn" data-target="section-rsvp" onclick="scrollToSection('section-rsvp')">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"/></svg>
                <span class="nav-tab-label">RSVP</span>
            </a>
        </nav>

    </div>
</div>

<script>
// Section scroll helper
function scrollToSection(sectionId) {
    const el = document.getElementById(sectionId);
    if (el) {
        el.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

// Active navbar sync via IntersectionObserver
const viewport = document.getElementById('slidesViewport');
const sections = document.querySelectorAll('.slide-section');
const navButtons = document.querySelectorAll('.nav-tab-btn');

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            const currentId = entry.target.id;
            navButtons.forEach(btn => {
                if (btn.getAttribute('data-target') === currentId) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }
    });
}, {
    root: viewport,
    threshold: 0.55
});

sections.forEach(sec => observer.observe(sec));

// Smooth touch swipe & mouse drag helper
let startY = 0;
let isScrolling = false;

viewport.addEventListener('touchstart', (e) => {
    startY = e.touches[0].clientY;
}, { passive: true });

viewport.addEventListener('touchend', (e) => {
    if (isScrolling) return;
    const diff = startY - e.changedTouches[0].clientY;
    // Gesture threshold of 40px
    if (Math.abs(diff) > 40) {
        isScrolling = true;
        const currentScroll = viewport.scrollTop;
        const h = viewport.clientHeight;
        const target = diff > 0 ? currentScroll + h : currentScroll - h;
        viewport.scrollTo({ top: target, behavior: 'smooth' });
        setTimeout(() => { isScrolling = false; }, 400);
    }
}, { passive: true });

// RSVP Selection Highlighting
function updateRsvpSelection() {
    const attendingRadio = document.querySelector('input[name="rsvp_status"][value="attending"]');
    const declinedRadio = document.querySelector('input[name="rsvp_status"][value="declined"]');
    const labelAtt = document.getElementById('labelAttending');
    const labelDec = document.getElementById('labelDeclined');

    if (attendingRadio && attendingRadio.checked) {
        labelAtt.classList.add('active-attending');
        labelDec.classList.remove('active-declined');
    } else if (declinedRadio && declinedRadio.checked) {
        labelDec.classList.add('active-declined');
        labelAtt.classList.remove('active-attending');
    }
}

// AJAX RSVP Submit
function handleRsvpSubmit(e) {
    e.preventDefault();
    const form = e.target;
    const btn = document.getElementById('btnSubmitRsvp');
    const alertBox = document.getElementById('rsvpAlert');
    const formData = new FormData(form);

    btn.disabled = true;
    btn.textContent = 'Menyimpan...';

    fetch('<?= base_url('invitation/rsvp') ?>', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest'
        }
    })
    .then(r => r.json())
    .then(res => {
        btn.disabled = false;
        btn.textContent = 'Kirim Konfirmasi Kehadiran';
        alertBox.style.display = 'block';
        if (res.status === 'success') {
            alertBox.style.background = 'rgba(16, 185, 129, 0.2)';
            alertBox.style.color = '#10b981';
            alertBox.style.border = '1px solid rgba(16, 185, 129, 0.4)';
            alertBox.textContent = res.message;
        } else {
            alertBox.style.background = 'rgba(239, 68, 68, 0.2)';
            alertBox.style.color = '#ef4444';
            alertBox.style.border = '1px solid rgba(239, 68, 68, 0.4)';
            alertBox.textContent = res.message;
        }
    })
    .catch(err => {
        btn.disabled = false;
        btn.textContent = 'Kirim Konfirmasi Kehadiran';
        alertBox.style.display = 'block';
        alertBox.style.background = 'rgba(239, 68, 68, 0.2)';
        alertBox.style.color = '#ef4444';
        alertBox.style.border = '1px solid rgba(239, 68, 68, 0.4)';
        alertBox.textContent = 'Terjadi kesalahan jaringan, silakan coba lagi.';
    });
}
</script>

</body>
</html>
