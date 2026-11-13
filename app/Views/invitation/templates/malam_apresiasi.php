<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?= esc($pageTitle ?? 'Undangan Resmi BeritaSatu Malam Apresiasi 2026') ?></title>

    <!-- Google Fonts: Manrope (Body & Headings) & Playfair Display (Serif Accent) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&family=Playfair+Display:ital,wght@0,600;0,700;0,800;1,600&display=swap"
        rel="stylesheet">



    <!-- AOS (Animate On Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Simplex Noise CDN for Cascading Wave Effect -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplex-noise/2.4.0/simplex-noise.min.js"></script>

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

            /* BSA Primary Palette */
            --bsa-primary-1: #fce6e6;
            --bsa-primary-2: #f9c2c2;
            --bsa-primary-3: #f49292;
            --bsa-primary-4: #ef5f5f;
            --bsa-primary-5: #ea2f2f;
            --bsa-primary-6: #e50101;
            --bsa-primary-7: #c30101;
            --bsa-primary-8: #a30101;
            --bsa-primary-9: #830101;
            --bsa-primary-10: #670000;

            /* BSA Secondary Palette */
            --bsa-secondary-1: #f5e6e6;
            --bsa-secondary-2: #e7c2c2;
            --bsa-secondary-3: #d39192;
            --bsa-secondary-4: #bf5e5f;
            --bsa-secondary-5: #ab2e2f;
            --bsa-secondary-6: #990001;
            --bsa-secondary-7: #820001;
            --bsa-secondary-8: #6d0001;
            --bsa-secondary-9: #570001;
            --bsa-secondary-10: #450000;

            /* BSA Secondary 2 Palette */
            --bsa-secondary-2-1: #f1e6e6;
            --bsa-secondary-2-2: #ddc2c2;
            --bsa-secondary-2-3: #c39191;
            --bsa-secondary-2-4: #a75e5e;
            --bsa-secondary-2-5: #8c2e2e;
            --bsa-secondary-2-6: #730000;
            --bsa-secondary-2-7: #620000;
            --bsa-secondary-2-8: #520000;
            --bsa-secondary-2-9: #420000;
            --bsa-secondary-2-10: #340000;

            /* Blue Palette remapped to BSA Secondary */
            --blue-1: var(--bsa-secondary-1);
            --blue-2: var(--bsa-secondary-2);
            --blue-3: var(--bsa-secondary-3);
            --blue-4: var(--bsa-secondary-4);
            --blue-5: var(--bsa-secondary-5);
            --blue-6: var(--bsa-secondary-6);
            --blue-7: var(--bsa-secondary-7);
            --blue-8: var(--bsa-secondary-8);
            --blue-9: var(--bsa-secondary-9);
            --blue-10: var(--bsa-secondary-10);

            /* Backward-compatible Red Tokens mapped to BSA Secondary */
            --red-1: var(--bsa-secondary-1);
            --red-2: var(--bsa-secondary-2);
            --red-3: var(--bsa-secondary-3);
            --red-4: var(--bsa-secondary-4);
            --red-5: var(--bsa-secondary-5);
            --red-6: var(--bsa-secondary-6);
            --red-7: var(--bsa-secondary-7);
            --red-8: var(--bsa-secondary-8);
            --red-9: var(--bsa-secondary-9);
            --red-10: var(--bsa-secondary-10);

            /* Accent Tokens */
            --border-red: rgba(171, 46, 47, 0.45);
            --border-subtle: rgba(255, 255, 255, 0.1);
            --text-primary: #ffffff;
            --text-secondary: #d9d9d9;
            --text-muted: #8c8c8c;

            --font-sans: 'Manrope', -apple-system, BlinkMacSystemFont, sans-serif;
            --font-serif: 'Playfair Display', Georgia, serif;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            -webkit-tap-highlight-color: transparent;
        }

        html,
        body {
            width: 100%;
            height: 100%;
            height: 100dvh;
            overflow: hidden;
            background: #000000;
            font-family: var(--font-sans);
            color: var(--text-primary);
        }

        /* Outer Fullscreen Container: Gradient dari #000000 (atas) ke #450000 (bawah) */
        .invitation-wrapper {
            width: 100%;
            height: 100%;
            height: 100dvh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(180deg, #000000 0%, #450000 100%);
            position: relative;
        }

        /* Mobile Frame Simulator with Pure Dark Base */
        .invitation-container {
            width: 100%;
            max-width: 440px;
            height: 100%;
            height: 100dvh;
            position: relative;
            background: #000000;
            box-shadow: 0 0 50px rgba(0, 0, 0, 0.9);
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }

        /* Slides Viewport (Vertical Scroll Snap) - Covers full height down to the edge */
        .slides-viewport {
            width: 100%;
            height: 100%;
            height: 100dvh;
            overflow-y: scroll;
            overflow-x: hidden;
            scroll-snap-type: y mandatory;
            scroll-behavior: smooth;
            -webkit-overflow-scrolling: touch;
            padding-bottom: 0;
            box-sizing: border-box;
            background: #000000;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .slides-viewport.is-locked {
            overflow: hidden !important;
            overflow-y: hidden !important;
            touch-action: none;
            scroll-snap-type: none;
        }

        .slides-viewport::-webkit-scrollbar {
            display: none;
        }

        /* Individual Snap Slide:
           Fills 100% of dynamic viewport seamlessly, background flows under floating navbar */
        .slide-section {
            width: 100%;
            height: 100%;
            height: 100dvh;
            min-height: 100%;
            min-height: 100dvh;
            scroll-snap-align: start;
            scroll-snap-stop: always;
            position: relative;
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: clamp(14px, 2.5vh, 24px) clamp(14px, 4vw, 20px) clamp(74px, 10vh, 84px);
            box-sizing: border-box;
            overflow-y: hidden;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .slide-section::-webkit-scrollbar {
            display: none;
        }

        /* Sequential vertical background progression (Section 0 to 5) */
        #section-cover {
            background: #000000;
        }

        #section-detail {
            background: linear-gradient(180deg, #000000 0%, #450000 100%);
        }

        #section-rundown {
            background: linear-gradient(180deg, #450000 0%, #6d0001 100%);
        }

        #section-rsvp {
            background: linear-gradient(180deg, #6d0001 0%, #990001 100%);
        }

        #section-contact {
            background: linear-gradient(180deg, #990001 0%, #ab2e2f 100%);
        }

        #section-gratitude {
            background: linear-gradient(180deg, #ab2e2f 0%, #450000 100%);
        }

        .slide-content {
            position: relative;
            z-index: 2;
            width: 100%;
            max-width: 395px;
            margin: 0 auto;
        }

        /* Section Headings */
        .slide-section-title {
            font-size: clamp(20px, 3vh, 26px);
            font-weight: 800;
            color: #ffffff;
            text-align: center;
            margin-bottom: clamp(10px, 1.8vh, 22px);
            letter-spacing: -0.5px;
        }

        /* ================= 1. COVER SECTION ================= */
        .cover-header-logo {
            position: absolute;
            top: clamp(14px, 2.5vh, 24px);
            left: 20px;
            z-index: 10;
        }

        .cover-header-logo img {
            height: clamp(26px, 3.5vh, 32px);
            width: auto;
            object-fit: contain;
            filter: drop-shadow(0 2px 8px rgba(0, 0, 0, 0.5));
        }

        .cover-hero-center {
            text-align: center;
            margin-bottom: clamp(12px, 2vh, 22px);
            margin-top: 4px;
        }

        .cover-hero-img {
            max-width: 360px;
            width: 94%;
            max-height: clamp(200px, 32vh, 280px);
            height: auto;
            margin: 0 auto;
            display: block;
            filter: drop-shadow(0 8px 25px rgba(0, 0, 0, 0.7));
            object-fit: contain;
        }

        .cover-salutation-text {
            font-size: clamp(13px, 1.8vh, 15px);
            font-weight: 500;
            color: #f5f5f5;
            text-align: center;
            margin-bottom: clamp(8px, 1.4vh, 14px);
            letter-spacing: 0.3px;
        }

        /* Glassmorphism Guest Card: Container BSA Secondary-5 #ab2e2f opacity 25% + backdrop-filter glass */
        .cover-guest-card {
            background: rgba(171, 46, 47, 0.25);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(171, 46, 47, 0.45);
            border-radius: 14px;
            padding: clamp(12px, 2vh, 18px) 16px;
            text-align: center;
            margin-bottom: clamp(10px, 1.6vh, 16px);
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .cover-guest-name {
            font-size: clamp(15px, 2.2vh, 18px);
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 4px;
            letter-spacing: -0.2px;
        }

        .cover-guest-role {
            font-size: clamp(12px, 1.6vh, 13px);
            font-weight: 500;
            color: #f0f0f0;
            line-height: 1.4;
        }

        /* Buka Undangan Button */
        .btn-open-invitation {
            display: block;
            width: 100%;
            background: #ab2e2f;
            color: #ffffff;
            font-size: clamp(13px, 1.8vh, 15px);
            font-weight: 700;
            text-align: center;
            padding: clamp(10px, 1.6vh, 14px) 20px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 18px rgba(171, 46, 47, 0.55);
            transition: transform 0.2s ease, background 0.2s ease;
        }

        .btn-open-invitation:active {
            transform: scale(0.98);
            background: #990001;
        }

        /* ================= 2. DETAIL SECTION (Waktu & Tempat) ================= */
        .detail-info-list {
            display: flex;
            flex-direction: column;
            gap: clamp(10px, 1.8vh, 16px);
            margin-bottom: clamp(12px, 2vh, 20px);
        }

        .detail-info-row {
            display: flex;
            align-items: flex-start;
            gap: 12px;
        }

        .detail-icon-box {
            width: clamp(38px, 5vh, 44px);
            height: clamp(38px, 5vh, 44px);
            border-radius: 10px;
            background: transparent;
            border: 1.5px solid #ab2e2f;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            color: #ab2e2f;
        }

        .detail-icon-box svg {
            width: clamp(18px, 2.5vh, 20px);
            height: clamp(18px, 2.5vh, 20px);
            stroke: #ab2e2f;
            stroke-width: 2;
        }

        .detail-text-col {
            flex: 1;
        }

        .detail-info-label {
            font-size: clamp(14px, 2vh, 16px);
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
        }

        .detail-info-sub {
            font-size: clamp(11.5px, 1.6vh, 13px);
            font-weight: 400;
            color: var(--text-secondary);
            margin-top: 2px;
            line-height: 1.35;
        }

        .maps-iframe-wrapper {
            width: 100%;
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid var(--border-red);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            height: clamp(160px, 24vh, 220px);
            background: #141414;
        }

        .maps-iframe-wrapper iframe {
            width: 100%;
            height: 100%;
            border: 0;
            display: block;
        }

        /* ================= 3. RUNDOWN SECTION ================= */
        .rundown-table-card {
            background: rgba(69, 0, 0, 0.75);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border-radius: 16px;
            border: 1px solid rgba(171, 46, 47, 0.5);
            overflow: hidden;
            width: 100%;
            max-height: clamp(370px, 58vh, 500px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.6);
            display: flex;
            flex-direction: column;
        }

        .rundown-table-header {
            display: grid;
            grid-template-columns: 92px 1fr;
            padding: 12px 16px;
            background: linear-gradient(90deg, rgba(171, 46, 47, 0.85) 0%, rgba(153, 0, 1, 0.85) 100%);
            font-weight: 700;
            font-size: 13.5px;
            color: #ffffff;
            border-bottom: 1px solid rgba(171, 46, 47, 0.5);
            letter-spacing: 0.3px;
            flex-shrink: 0;
        }

        .rundown-table-body {
            display: flex;
            flex-direction: column;
            overflow-y: auto;
            -webkit-overflow-scrolling: touch;
            max-height: 100%;
            scrollbar-width: thin;
            scrollbar-color: #ab2e2f rgba(109, 0, 1, 0.6);
        }

        /* Custom Red Scrollbar for Webkit / Mobile Chrome */
        .rundown-table-body::-webkit-scrollbar {
            width: 6px;
        }

        .rundown-table-body::-webkit-scrollbar-track {
            background: rgba(109, 0, 1, 0.6);
        }

        .rundown-table-body::-webkit-scrollbar-thumb {
            background: #ab2e2f;
            border-radius: 6px;
        }

        .rundown-table-body::-webkit-scrollbar-thumb:hover {
            background: #bf5e5f;
        }

        .rundown-row {
            display: grid;
            grid-template-columns: 92px 1fr;
            padding: 10px 16px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            align-items: center;
            gap: 12px;
        }

        .rundown-row:last-child {
            border-bottom: none;
        }

        .rundown-time {
            font-size: 12.5px;
            font-weight: 700;
            color: #ffffff;
            font-variant-numeric: tabular-nums;
            white-space: nowrap;
            letter-spacing: -0.2px;
        }

        .rundown-desc {
            font-size: 12.5px;
            font-weight: 500;
            color: #f5f5f5;
            line-height: 1.4;
            word-break: break-word;
        }

        .rundown-desc-main {
            display: inline;
        }

        .rundown-desc-sub {
            display: inline;
            font-size: 11px;
            color: #d1d5db;
            margin-left: 3px;
        }

        /* ================= 4. RSVP SECTION ================= */
        .rsvp-desc-text {
            font-size: 13px;
            color: #e5e5e5;
            text-align: center;
            line-height: 1.5;
            margin-bottom: 22px;
        }

        .rsvp-option-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-bottom: 14px;
        }

        .rsvp-label-card {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 14px 10px;
            border-radius: 12px;
            background: rgba(69, 0, 0, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
        }

        .rsvp-label-card input {
            display: none;
        }

        .rsvp-label-card.active-attending {
            background: rgba(16, 185, 129, 0.25);
            border-color: #10b981;
            color: #10b981;
            box-shadow: 0 4px 14px rgba(16, 185, 129, 0.3);
        }

        .rsvp-label-card.active-declined {
            background: rgba(239, 68, 68, 0.25);
            border-color: #ef4444;
            color: #ef4444;
            box-shadow: 0 4px 14px rgba(239, 68, 68, 0.3);
        }

        .rsvp-textarea {
            width: 100%;
            background: rgba(69, 0, 0, 0.65);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 12px 14px;
            color: #ffffff;
            font-size: 13px;
            font-family: inherit;
            resize: none;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        .rsvp-textarea:focus {
            outline: none;
            border-color: var(--bsa-secondary-5, #ab2e2f);
        }

        .btn-submit-rsvp {
            width: 100%;
            background: #ab2e2f;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
            padding: 14px 20px;
            border-radius: 12px;
            border: none;
            cursor: pointer;
            box-shadow: 0 4px 16px rgba(171, 46, 47, 0.4);
            transition: transform 0.2s ease;
        }

        .btn-submit-rsvp:active {
            transform: scale(0.98);
        }

        /* ================= 5. CONTACT SECTION ================= */
        .contact-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 16px;
            background: rgba(69, 0, 0, 0.6);
            backdrop-filter: blur(8px);
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
            font-size: 12px;
            margin-top: 2px;
        }

        .btn-wa {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 14px;
            border-radius: 50px;
            background: #25D366;
            color: #ffffff;
            font-size: 12px;
            font-weight: 700;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(37, 211, 102, 0.35);
        }

        /* ================= 6. GRATITUDE / THANK YOU SECTION ================= */
        .gratitude-box {
            text-align: center;
            padding: 28px 20px;
            border-radius: 18px;
            background: rgba(69, 0, 0, 0.6);
            backdrop-filter: blur(10px);
            border: 1px solid var(--border-red);
        }

        .gratitude-title {
            font-size: 26px;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            letter-spacing: -0.5px;
            font-family: var(--font-sans);
        }

        .gratitude-desc {
            font-size: 13px;
            color: #e5e5e5;
            line-height: 1.6;
            margin-bottom: 18px;
            font-family: var(--font-sans);
        }

        .gratitude-company {
            font-size: 13px;
            font-weight: 700;
            color: #ffffff;
            font-family: var(--font-sans);
        }

        .portal-logos-row {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap;
            gap: 14px 18px;
            margin-top: 24px;
            padding: 10px 4px;
        }

        .portal-logo-item {
            height: 20px;
            max-width: 110px;
            object-fit: contain;
            filter: drop-shadow(0 2px 6px rgba(0, 0, 0, 0.4));
        }

        /* ================= FLOATING MUTE BUTTON ================= */
        .btn-audio-mute {
            position: absolute;
            bottom: 78px;
            right: 18px;
            width: 42px;
            height: 42px;
            border-radius: 50%;
            background: rgba(69, 0, 0, 0.85);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            border: 1.5px solid #ab2e2f;
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            z-index: 1000;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.5);
            transition: bottom 0.4s cubic-bezier(0.16, 1, 0.3, 1), transform 0.2s ease, background 0.2s ease;
        }

        .btn-audio-mute.navbar-hidden {
            bottom: 20px;
        }

        .btn-audio-mute:active {
            transform: scale(0.92);
        }

        .btn-audio-mute svg {
            width: 19px;
            height: 19px;
            fill: none;
            stroke: #ffffff;
            stroke-width: 2;
        }

        /* ================= FLOATING NAVBAR (4 Items in View Window) ================= */
        .floating-navbar-wrap {
            position: absolute;
            bottom: 14px;
            left: 14px;
            right: 14px;
            height: 56px;
            background: rgba(69, 0, 0, 0.9);
            backdrop-filter: blur(14px);
            -webkit-backdrop-filter: blur(14px);
            border: 1px solid rgba(171, 46, 47, 0.4);
            border-radius: 18px;
            z-index: 999;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            display: flex;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            pointer-events: none;
            transform: translateY(35px);
            transition: opacity 0.45s cubic-bezier(0.16, 1, 0.3, 1), transform 0.45s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.45s;
        }

        .floating-navbar-wrap.is-visible {
            opacity: 1;
            visibility: visible;
            pointer-events: auto;
            transform: translateY(0);
        }

        .floating-navbar-track {
            display: flex;
            width: 150%;
            /* 6 items total, each 25% of viewport container -> 4 items visible exactly */
            height: 100%;
            transition: transform 0.4s cubic-bezier(0.25, 1, 0.5, 1);
        }

        .nav-item-btn {
            flex: 0 0 25%;
            /* exactly 4 items per 100% window */
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 3px;
            color: #d1d5db;
            text-decoration: none;
            cursor: pointer;
            position: relative;
            transition: color 0.25s ease;
            user-select: none;
        }

        .nav-item-btn svg {
            width: 17px;
            height: 17px;
            stroke-width: 2;
        }

        .nav-item-label {
            font-size: 10px;
            font-weight: 600;
            white-space: nowrap;
            letter-spacing: -0.2px;
        }

        .nav-item-btn.active {
            color: #ffffff;
        }

        .nav-item-btn.active::after {
            content: '';
            position: absolute;
            bottom: 4px;
            width: 20px;
            height: 3px;
            border-radius: 2px;
            background: #ab2e2f;
            box-shadow: 0 0 8px #ab2e2f;
        }

        /* ================= RSVP MODALS ================= */
        .rsvp-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.75);
            backdrop-filter: blur(8px);
            -webkit-backdrop-filter: blur(8px);
            z-index: 999999;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s cubic-bezier(0.16, 1, 0.3, 1), visibility 0.3s;
        }

        .rsvp-modal-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        .rsvp-modal-card {
            background: #141414;
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 20px;
            padding: 28px 24px;
            width: 100%;
            max-width: 340px;
            text-align: center;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.8), 0 0 40px rgba(171, 46, 47, 0.25);
            transform: scale(0.92);
            transition: transform 0.3s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
        }

        .rsvp-modal-overlay.active .rsvp-modal-card {
            transform: scale(1);
        }

        .rsvp-modal-icon {
            width: 56px;
            height: 56px;
            border-radius: 50%;
            margin: 0 auto 16px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .rsvp-spinner {
            width: 44px;
            height: 44px;
            border: 3px solid rgba(171, 46, 47, 0.25);
            border-top-color: #ab2e2f;
            border-radius: 50%;
            animation: rsvpSpin 0.8s linear infinite;
            margin: 0 auto 16px;
        }

        @keyframes rsvpSpin {
            to {
                transform: rotate(360deg);
            }
        }

        .rsvp-modal-title {
            font-size: 17px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 8px;
        }

        .rsvp-modal-desc {
            font-size: 13px;
            color: #a3a3a3;
            line-height: 1.5;
            margin-bottom: 20px;
        }

        .btn-modal-close {
            background: linear-gradient(135deg, #ab2e2f, #990001);
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 50px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s;
        }

        .btn-modal-close:hover {
            opacity: 0.9;
        }

        /* ================= CASCADING CORNER WAVES CANVAS ================= */
        .wave-corner-canvas {
            position: absolute;
            pointer-events: none;
            z-index: 1; /* Di bawah konten slide (z-index: 2), di atas background slide */
            will-change: transform;
            /* Mask linear horizontal: memudarkan ujung awal dan akhir kanvas secara bertahap agar tidak ada garis potong patah */
            mask-image: linear-gradient(to right, transparent 0%, black 18%, black 82%, transparent 100%);
            -webkit-mask-image: linear-gradient(to right, transparent 0%, black 18%, black 82%, transparent 100%);
        }

        /* Pojok Kanan Atas (Top-Right Corner Wave) - Miring 45 derajat & ujung memudar mulus tanpa patah */
        .wave-canvas-top-right {
            top: -110px;
            right: -120px;
            width: 640px;
            height: 280px;
            transform: rotate(45deg);
            transform-origin: center center;
            opacity: 0.95;
        }

        /* Pojok Kiri Bawah (Bottom-Left Corner Wave) - Miring 45 derajat & ujung memudar mulus tanpa patah */
        .wave-canvas-bottom-left {
            bottom: -110px;
            left: -120px;
            width: 640px;
            height: 280px;
            transform: rotate(45deg);
            transform-origin: center center;
            opacity: 0.95;
        }

        @media (max-width: 480px) {
            .wave-canvas-top-right {
                width: 580px;
                height: 260px;
                top: -95px;
                right: -105px;
                transform: rotate(45deg);
            }
            .wave-canvas-bottom-left {
                width: 580px;
                height: 260px;
                bottom: -95px;
                left: -105px;
                transform: rotate(45deg);
            }
        }
    </style>
</head>

<body>

    <div class="invitation-wrapper">
        <div class="invitation-container">

            <!-- Cascading Waves Corner Elements (Pojok Kanan Atas & Pojok Kiri Bawah) -->
            <canvas id="waveCanvasTopRight" class="wave-corner-canvas wave-canvas-top-right"></canvas>
            <canvas id="waveCanvasBottomLeft" class="wave-corner-canvas wave-canvas-bottom-left"></canvas>

            <!-- Audio Element (Audio MAP, default 30% volume) -->
            <audio id="invitationAudio" src="<?= base_url('assets/audio/audio_map.mpeg') ?>" loop
                preload="auto"></audio>

            <!-- Vertical Snap Viewport: Exactly 6 Sections (Locked on Cover until Buka Undangan) -->
            <div class="slides-viewport is-locked" id="slidesViewport">

                <!-- 1. COVER SECTION -->
                <section class="slide-section" id="section-cover" data-index="0" data-label="Cover">
                    <!-- B-Universe Logo di kiri atas -->
                    <div class="cover-header-logo" data-aos="fade-down" data-aos-duration="1200">
                        <img src="<?= base_url('assets/img/buniverse-white.webp') ?>" alt="B-Universe">
                    </div>

                    <div class="slide-content">
                        <!-- Elemen cover-hero.webp di tengah -->
                        <div class="cover-hero-center" data-aos="zoom-in" data-aos-duration="1300">
                            <img src="<?= base_url('assets/img/cover-hero.webp') ?>" alt="BeritaSatu Malam Apresiasi"
                                class="cover-hero-img">
                        </div>

                        <!-- Kepada Yang Terhormat -->
                        <div class="cover-salutation-text" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="150">Kepada Yang Terhormat :</div>

                        <!-- Container Tamu Merah #AC0A0A opacity 25% + Glass Effect -->
                        <div class="cover-guest-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="250">
                            <div class="cover-guest-name"><?= esc($guest['name'] ?? 'Tamu Undangan Terhormat') ?></div>
                            <div class="cover-guest-role">
                                <?= esc($guest['position'] ?: 'Tamu VIP') ?><?= !empty($guest['institution']) ? ' &bull; ' . esc($guest['institution']) : '' ?>
                            </div>
                        </div>

                        <!-- Button Buka Undangan (#AC0A0A opacity 100%) -->
                        <button type="button" class="btn-open-invitation" data-aos="fade-up" data-aos-duration="1200"
                            data-aos-delay="350" onclick="handleOpenInvitation()">
                            Buka Undangan
                        </button>
                    </div>
                </section>

                <!-- 2. DETAIL ACARA SECTION (Waktu & Tempat) -->
                <section class="slide-section" id="section-detail" data-index="1" data-label="Detail">
                    <div class="slide-content">
                        <h2 class="slide-section-title" data-aos="fade-down" data-aos-duration="1200">Waktu & Tempat</h2>

                        <div class="detail-info-list" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            <!-- Tanggal -->
                            <div class="detail-info-row">
                                <div class="detail-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg>
                                </div>
                                <div class="detail-text-col">
                                    <div class="detail-info-label">
                                        <?= !empty($scheduleDay['event_date']) ? date('d F Y', strtotime($scheduleDay['event_date'])) : 'Kamis, 20 November 2026' ?>
                                    </div>
                                    <div class="detail-info-sub">Malam Penganugerahan</div>
                                </div>
                            </div>

                            <!-- Waktu -->
                            <div class="detail-info-row">
                                <div class="detail-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <circle cx="12" cy="12" r="10"></circle>
                                        <polyline points="12 6 12 12 16 14"></polyline>
                                    </svg>
                                </div>
                                <div class="detail-text-col">
                                    <div class="detail-info-label">18.00 WIB &ndash; Selesai</div>
                                    <div class="detail-info-sub">Registrasi & Welcoming Dinner</div>
                                </div>
                            </div>

                            <!-- Lokasi -->
                            <div class="detail-info-row">
                                <div class="detail-icon-box">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                        <circle cx="12" cy="10" r="3"></circle>
                                    </svg>
                                </div>
                                <div class="detail-text-col">
                                    <div class="detail-info-label">Hotel Mulia Senayan</div>
                                    <div class="detail-info-sub">Grand Ballroom, Jl. Asia Afrika No.6, Gelora, Jakarta
                                        Pusat</div>
                                </div>
                            </div>
                        </div>

                        <!-- Google Maps Iframe -->
                        <div class="maps-iframe-wrapper" data-aos="zoom-in" data-aos-duration="1200"
                            data-aos-delay="200">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.3679507916427!2d106.79448197475055!3d-6.215110593772825!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f14bba661065%3A0x40c7383d6eb0bab5!2sHotel%20Mulia!5e0!3m2!1sid!2sid!4v1793082515756!5m2!1sid!2sid"
                                allowfullscreen="" loading="lazy"
                                referrerpolicy="strict-origin-when-cross-origin"></iframe>
                        </div>
                    </div>
                </section>

                <!-- 3. RUNDOWN SECTION -->
                <section class="slide-section" id="section-rundown" data-index="2" data-label="Rundown">
                    <div class="slide-content">
                        <h2 class="slide-section-title" data-aos="fade-down" data-aos-duration="1200">Rundown</h2>

                        <div class="rundown-table-card" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">
                            <div class="rundown-table-header">
                                <div>Waktu</div>
                                <div>Acara</div>
                            </div>
                            <div class="rundown-table-body">
                                <?php if (!empty($scheduleSessions)): ?>
                                    <?php foreach ($scheduleSessions as $session): ?>
                                        <div class="rundown-row">
                                            <div class="rundown-time">
                                                <?= date('H:i', strtotime($session['start_time'])) ?> WIB
                                            </div>
                                            <div class="rundown-desc">
                                                <span class="rundown-desc-main"><?= esc($session['title']) ?></span>
                                                <?php if (!empty($session['subtitle'])): ?>
                                                    <span class="rundown-desc-sub">(<?= esc($session['subtitle']) ?>)</span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <!-- Fallback Sessions if DB is empty -->
                                    <div class="rundown-row">
                                        <div class="rundown-time">18:00 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">Registrasi, Dinner & Band
                                                Performance</span></div>
                                    </div>
                                    <div class="rundown-row">
                                        <div class="rundown-time">19:00 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">Pembukaan MC & Lagu
                                                Kebangsaan</span></div>
                                    </div>
                                    <div class="rundown-row">
                                        <div class="rundown-time">19:10 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">Welcoming Speech & VT
                                                Apresiasi</span></div>
                                    </div>
                                    <div class="rundown-row">
                                        <div class="rundown-time">19:25 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">Keynote Speech &
                                                Penyerahan Apresiasi</span></div>
                                    </div>
                                    <div class="rundown-row">
                                        <div class="rundown-time">20:10 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">BeritaSatu Malam Apresiasi
                                                Awarding Session</span></div>
                                    </div>
                                    <div class="rundown-row">
                                        <div class="rundown-time">21:00 WIB</div>
                                        <div class="rundown-desc"><span class="rundown-desc-main">Closing, Networking &
                                                Special Performance</span></div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- 4. RSVP SECTION -->
                <section class="slide-section" id="section-rsvp" data-index="3" data-label="RSVP">
                    <div class="slide-content">
                        <h2 class="slide-section-title" data-aos="fade-down" data-aos-duration="1200">RSVP</h2>
                        <p class="rsvp-desc-text" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100">Mohon
                            konfirmasi kesediaan kehadiran Bapak/Ibu untuk reservasi kursi kehormatan.</p>

                        <form id="rsvpForm" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="200"
                            onsubmit="handleRsvpSubmit(event)">
                            <input type="hidden" name="invitation_code"
                                value="<?= esc($guest['invitation_code'] ?? '') ?>">

                            <div class="rsvp-option-group">
                                <label
                                    class="rsvp-label-card <?= ($guest['rsvp_status'] ?? '') === 'attending' ? 'active-attending' : '' ?>"
                                    id="labelAttending">
                                    <input type="radio" name="rsvp_status" value="attending" <?= ($guest['rsvp_status'] ?? '') === 'attending' ? 'checked' : '' ?> onchange="updateRsvpSelection()">
                                    <span>Hadir</span>
                                </label>
                                <label
                                    class="rsvp-label-card <?= ($guest['rsvp_status'] ?? '') === 'declined' ? 'active-declined' : '' ?>"
                                    id="labelDeclined">
                                    <input type="radio" name="rsvp_status" value="declined" <?= ($guest['rsvp_status'] ?? '') === 'declined' ? 'checked' : '' ?> onchange="updateRsvpSelection()">
                                    <span>Berhalangan</span>
                                </label>
                            </div>

                            <textarea name="notes" class="rsvp-textarea" rows="3"
                                placeholder="Catatan / ucapan selamat untuk acara (opsional)..."><?= esc($guest['notes'] ?? '') ?></textarea>

                            <button type="submit" id="btnSubmitRsvp" class="btn-submit-rsvp">
                                <span>Kirim Konfirmasi Kehadiran</span>
                            </button>
                        </form>
                    </div>
                </section>

                <!-- 5. CONTACT SECTION -->
                <section class="slide-section" id="section-contact" data-index="4" data-label="Contact">
                    <div class="slide-content">
                        <h2 class="slide-section-title" data-aos="fade-down" data-aos-duration="1200">Contact</h2>
                        <p class="rsvp-desc-text" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="100"
                            style="margin-bottom:18px;">Apabila Bapak/Ibu memerlukan informasi lebih lanjut mengenai
                            protokoler dan reservasi.</p>

                        <div class="contact-item" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="150">
                            <div>
                                <div class="contact-name">Sekretariat B-Universe</div>
                                <div class="contact-role">Protokoler & Konfirmasi Kehadiran VIP</div>
                            </div>
                            <a href="https://wa.me/6281212678789?text=Halo%20Panitia%20Malam%20Apresiasi%202026"
                                target="_blank" class="btn-wa">
                                WhatsApp
                            </a>
                        </div>

                        <div class="contact-item" data-aos="fade-up" data-aos-duration="1200" data-aos-delay="250">
                            <div>
                                <div class="contact-name">Liaison Officer</div>
                                <div class="contact-role">Pendampingan Tamu & Penjemputan</div>
                            </div>
                            <a href="https://wa.me/6281212678789?text=Halo%20Protokoler%20Malam%20Apresiasi%202026"
                                target="_blank" class="btn-wa">
                                WhatsApp
                            </a>
                        </div>
                    </div>
                </section>

                <!-- 6. GRATITUDE / THANK YOU SECTION -->
                <section class="slide-section" id="section-gratitude" data-index="5" data-label="Gratitude">
                    <div class="slide-content">
                        <div class="gratitude-box" data-aos="zoom-in" data-aos-duration="1300">
                            <h2 class="gratitude-title">Terima Kasih</h2>
                            <p class="gratitude-desc">
                                Merupakan suatu kehormatan dan kebahagiaan bagi kami atas kehadiran serta partisipasi
                                Bapak/Ibu sekalian dalam BeritaSatu Malam Apresiasi 2026.
                            </p>
                            <div class="gratitude-company">
                                BeritaSatu Media Holdings &bull; B-Universe
                            </div>

                            <!-- All 7 Media Partner & Brand Logos matching Footer -->
                            <div class="portal-logos-row" data-aos="fade-up" data-aos-duration="1200"
                                data-aos-delay="200">
                                <img src="<?= base_url('assets/img/btv.webp') ?>" alt="BTV" class="portal-logo-item">
                                <img src="<?= base_url('assets/img/brtst.webp') ?>" alt="BeritaSatu"
                                    class="portal-logo-item">
                                <img src="<?= base_url('assets/img/brtstdc.webp') ?>" alt="BeritaSatu.com"
                                    class="portal-logo-item">
                                <img src="<?= base_url('assets/img/id.webp') ?>" alt="Investor Daily Indonesia"
                                    class="portal-logo-item">
                                <img src="<?= base_url('assets/img/investor.webp') ?>" alt="Investor.id"
                                    class="portal-logo-item">
                                <img src="<?= base_url('assets/img/jg.webp') ?>" alt="Jakarta Globe"
                                    class="portal-logo-item">
                                <img src="<?= base_url('assets/img/datasatu.webp') ?>" alt="DataSatu.com"
                                    class="portal-logo-item">
                            </div>
                        </div>
                    </div>
                </section>

            </div>

            <!-- Mute / Unmute Button (Top Right of Floating Navbar) -->
            <button type="button" class="btn-audio-mute navbar-hidden" id="btnAudioMute" title="Mute/Unmute Audio"
                onclick="toggleAudioMute()">
                <!-- Speaker Icon -->
                <svg id="iconAudioPlaying" viewBox="0 0 24 24" style="display:none;">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                    <path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path>
                </svg>
                <!-- Muted Icon (Default) -->
                <svg id="iconAudioMuted" viewBox="0 0 24 24">
                    <polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon>
                    <line x1="23" y1="9" x2="17" y2="15"></line>
                    <line x1="17" y1="9" x2="23" y2="15"></line>
                </svg>
            </button>

            <!-- Floating Navbar with 4-Item Window Track -->
            <div class="floating-navbar-wrap">
                <div class="floating-navbar-track" id="navbarTrack">
                    <a href="javascript:void(0)" class="nav-item-btn active" data-index="0" data-target="section-cover"
                        onclick="scrollToSectionByIndex(0)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                        </svg>
                        <span class="nav-item-label">Cover</span>
                    </a>
                    <a href="javascript:void(0)" class="nav-item-btn" data-index="1" data-target="section-detail"
                        onclick="scrollToSectionByIndex(1)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polyline points="12 6 12 12 16 14"></polyline>
                        </svg>
                        <span class="nav-item-label">Detail</span>
                    </a>
                    <a href="javascript:void(0)" class="nav-item-btn" data-index="2" data-target="section-rundown"
                        onclick="scrollToSectionByIndex(2)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="3" y="3" width="18" height="18" rx="2"></rect>
                            <line x1="7" y1="8" x2="17" y2="8"></line>
                            <line x1="7" y1="12" x2="17" y2="12"></line>
                            <line x1="7" y1="16" x2="13" y2="16"></line>
                        </svg>
                        <span class="nav-item-label">Rundown</span>
                    </a>
                    <a href="javascript:void(0)" class="nav-item-btn" data-index="3" data-target="section-rsvp"
                        onclick="scrollToSectionByIndex(3)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2z"></path>
                        </svg>
                        <span class="nav-item-label">RSVP</span>
                    </a>
                    <a href="javascript:void(0)" class="nav-item-btn" data-index="4" data-target="section-contact"
                        onclick="scrollToSectionByIndex(4)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path
                                d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                            </path>
                        </svg>
                        <span class="nav-item-label">Contact</span>
                    </a>
                    <a href="javascript:void(0)" class="nav-item-btn" data-index="5" data-target="section-gratitude"
                        onclick="scrollToSectionByIndex(5)">
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                            </path>
                        </svg>
                        <span class="nav-item-label">Gratitude</span>
                    </a>
                </div>
            </div>

            <!-- RSVP Loading Modal (Menyimpan...) -->
            <div class="rsvp-modal-overlay" id="rsvpLoadingModal">
                <div class="rsvp-modal-card">
                    <div class="rsvp-spinner"></div>
                    <div class="rsvp-modal-title">Menyimpan Konfirmasi...</div>
                    <div class="rsvp-modal-desc">Mohon tunggu sebentar, sistem sedang mencatat reservasi kehadiran Anda.
                    </div>
                </div>
            </div>

            <!-- RSVP Result Modal (Berhasil / Gagal) -->
            <div class="rsvp-modal-overlay" id="rsvpResultModal">
                <div class="rsvp-modal-card">
                    <div class="rsvp-modal-icon" id="rsvpResultIcon"></div>
                    <div class="rsvp-modal-title" id="rsvpResultTitle">Konfirmasi Berhasil</div>
                    <div class="rsvp-modal-desc" id="rsvpResultMessage"></div>
                    <button type="button" class="btn-modal-close" onclick="closeRsvpResultModal()">Tutup</button>
                </div>
            </div>

        </div>
    </div>

    <!-- AOS (Animate On Scroll) JS Library -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Init AOS with duration 1200 as requested
        AOS.init({
            duration: 1200,
            once: true,
            easing: 'ease-out-cubic',
            offset: 20
        });

        // Audio Setup: Default 30% volume
        const audio = document.getElementById('invitationAudio');
        const iconPlaying = document.getElementById('iconAudioPlaying');
        const iconMuted = document.getElementById('iconAudioMuted');
        let isAudioPlaying = false;

        if (audio) {
            audio.volume = 0.3; // Default 30% volume
        }

        function playAudio() {
            if (!audio) return;
            audio.play().then(() => {
                isAudioPlaying = true;
                if (iconPlaying) iconPlaying.style.display = 'block';
                if (iconMuted) iconMuted.style.display = 'none';
            }).catch(() => {
                // Autoplay policy: will trigger on click
            });
        }

        function pauseAudio() {
            if (!audio) return;
            audio.pause();
            isAudioPlaying = false;
            if (iconPlaying) iconPlaying.style.display = 'none';
            if (iconMuted) iconMuted.style.display = 'block';
        }

        function toggleAudioMute() {
            if (isAudioPlaying) {
                pauseAudio();
            } else {
                playAudio();
            }
        }

        let isInvitationOpened = false;

        const viewport = document.getElementById('slidesViewport');
        const sections = Array.from(document.querySelectorAll('.slide-section'));
        const navItems = Array.from(document.querySelectorAll('.nav-item-btn'));
        const navbarTrack = document.getElementById('navbarTrack');

        // Smoothly scroll to section within viewport
        function scrollToSectionByIndex(index) {
            const sec = sections[index];
            if (!sec || !viewport) return;

            sec.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        // Buka Undangan Action: Unlock Scroll + Fullscreen + Reveal Navbar + Scroll to Section Detail + Auto-Play Audio
        function handleOpenInvitation() {
            isInvitationOpened = true;
            playAudio();

            // Unlock viewport scrolling
            if (viewport) {
                viewport.classList.remove('is-locked');
            }

            // Reveal Floating Navbar & position mute button
            const navbarWrap = document.querySelector('.floating-navbar-wrap');
            if (navbarWrap) {
                navbarWrap.classList.add('is-visible');
            }
            const btnMute = document.getElementById('btnAudioMute');
            if (btnMute) {
                btnMute.classList.remove('navbar-hidden');
            }

            // Function to perform exact align scroll to Detail section
            const triggerScrollToDetail = () => {
                requestAnimationFrame(() => {
                    scrollToSectionByIndex(1);
                });
            };

            // Request Fullscreen if supported
            const docEl = document.documentElement;
            if (docEl.requestFullscreen) {
                docEl.requestFullscreen().then(() => {
                    setTimeout(triggerScrollToDetail, 120);
                }).catch(() => {
                    triggerScrollToDetail();
                });
            } else if (docEl.webkitRequestFullscreen) {
                docEl.webkitRequestFullscreen();
                setTimeout(triggerScrollToDetail, 120);
            } else if (docEl.msRequestFullscreen) {
                docEl.msRequestFullscreen();
                setTimeout(triggerScrollToDetail, 120);
            } else {
                triggerScrollToDetail();
            }
        }

        // Prevent wheel / touch swipe while on cover before invitation is opened
        if (viewport) {
            const preventScrollOnCover = (e) => {
                if (!isInvitationOpened) {
                    e.preventDefault();
                }
            };
            viewport.addEventListener('wheel', preventScrollOnCover, { passive: false });
            viewport.addEventListener('touchmove', preventScrollOnCover, { passive: false });
        }

        /*
         * Sliding Window Navbar (4 Items Visible in Track)
         * Logic Mapping:
         * Index 0 (Cover)     -> items visible: 0, 1, 2, 3 (Cover active)    -> window offset 0
         * Index 1 (Detail)    -> items visible: 0, 1, 2, 3 (Detail active)   -> window offset 0
         * Index 2 (Rundown)   -> items visible: 0, 1, 2, 3 (Rundown active)  -> window offset 0
         * Index 3 (RSVP)      -> items visible: 1, 2, 3, 4 (RSVP active)     -> window offset 1 (shifts -25%)
         * Index 4 (Contact)   -> items visible: 2, 3, 4, 5 (Contact active)  -> window offset 2 (shifts -50%)
         * Index 5 (Gratitude) -> items visible: 2, 3, 4, 5 (Gratitude active)-> window offset 2 (shifts -50%)
         */
        function updateNavbarWindow(activeIndex) {
            const navbarWrap = document.querySelector('.floating-navbar-wrap');
            const btnMute = document.getElementById('btnAudioMute');
            
            // Show navbar if user scrolled past cover (or if already opened)
            if (navbarWrap) {
                if (activeIndex > 0 || isInvitationOpened) {
                    navbarWrap.classList.add('is-visible');
                    if (btnMute) btnMute.classList.remove('navbar-hidden');
                } else {
                    navbarWrap.classList.remove('is-visible');
                    if (btnMute) btnMute.classList.add('navbar-hidden');
                }
            }

            let shiftPercent = 0;
            if (activeIndex <= 2) {
                shiftPercent = 0;
            } else if (activeIndex === 3) {
                shiftPercent = -25;
            } else {
                shiftPercent = -50;
            }

            if (navbarTrack) {
                navbarTrack.style.transform = `translateX(${shiftPercent}%)`;
            }

            navItems.forEach((btn, idx) => {
                if (idx === activeIndex) {
                    btn.classList.add('active');
                } else {
                    btn.classList.remove('active');
                }
            });
        }

        // Active section observer & Per-section AOS trigger
        const animatedSections = new Set();
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const index = parseInt(entry.target.getAttribute('data-index') || '0', 10);
                    updateNavbarWindow(index);

                    // Animate items inside section on first entrance
                    if (!animatedSections.has(index)) {
                        animatedSections.add(index);
                        const aosItems = entry.target.querySelectorAll('[data-aos]');
                        aosItems.forEach(el => {
                            el.classList.add('aos-animate');
                        });
                    }
                }
            });
        }, {
            root: viewport,
            threshold: 0.35
        });

        sections.forEach(sec => observer.observe(sec));

        // RSVP Radio Selection
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

        // RSVP Ajax Handler & Custom Modals
        let rsvpModalTimer = null;

        function showRsvpLoadingModal() {
            const m = document.getElementById('rsvpLoadingModal');
            if (m) m.classList.add('active');
        }

        function hideRsvpLoadingModal() {
            const m = document.getElementById('rsvpLoadingModal');
            if (m) m.classList.remove('active');
        }

        function showRsvpResultModal(title, message, isSuccess) {
            const modal = document.getElementById('rsvpResultModal');
            const titleEl = document.getElementById('rsvpResultTitle');
            const descEl = document.getElementById('rsvpResultMessage');
            const iconEl = document.getElementById('rsvpResultIcon');

            if (!modal) return;

            titleEl.textContent = title;
            descEl.textContent = message;

            if (isSuccess) {
                iconEl.style.background = 'rgba(16, 185, 129, 0.15)';
                iconEl.style.color = '#10b981';
                iconEl.innerHTML = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2.5"><polyline points="20 6 9 17 4 12"></polyline></svg>';
            } else {
                iconEl.style.background = 'rgba(239, 68, 68, 0.15)';
                iconEl.style.color = '#ef4444';
                iconEl.innerHTML = '<svg viewBox="0 0 24 24" width="28" height="28" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            }

            modal.classList.add('active');

            if (rsvpModalTimer) clearTimeout(rsvpModalTimer);
            rsvpModalTimer = setTimeout(() => {
                closeRsvpResultModal();
            }, 4500);
        }

        function closeRsvpResultModal() {
            const modal = document.getElementById('rsvpResultModal');
            if (modal) modal.classList.remove('active');
            if (rsvpModalTimer) clearTimeout(rsvpModalTimer);
        }

        function handleRsvpSubmit(e) {
            e.preventDefault();
            const form = e.target;
            const btn = document.getElementById('btnSubmitRsvp');
            const formData = new FormData(form);

            btn.disabled = true;
            showRsvpLoadingModal();

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
                    hideRsvpLoadingModal();

                    if (res.status === 'success') {
                        showRsvpResultModal('Konfirmasi Berhasil', res.message, true);
                    } else {
                        showRsvpResultModal('Gagal Menyimpan', res.message, false);
                    }
                })
                .catch(err => {
                    btn.disabled = false;
                    hideRsvpLoadingModal();
                    showRsvpResultModal('Terjadi Kesalahan', 'Gagal menghubungi server, silakan periksa koneksi internet Anda.', false);
                });
        }

        // ================= CASCADING CORNER WAVES ENGINE =================
        // Standalone SimplexNoise fallback (Stefan Gustavson algorithm)
        (function() {
            if (typeof window.SimplexNoise === 'undefined') {
                window.SimplexNoise = class {
                    constructor(randomOrSeed = Math.random) {
                        const random = typeof randomOrSeed === 'function' ? randomOrSeed : () => Math.random();
                        this.p = new Uint8Array(256);
                        for (let i = 0; i < 256; i++) this.p[i] = i;
                        for (let i = 255; i > 0; i--) {
                            const n = Math.floor((i + 1) * random());
                            const q = this.p[i];
                            this.p[i] = this.p[n];
                            this.p[n] = q;
                        }
                        this.perm = new Uint8Array(512);
                        this.permMod12 = new Uint8Array(512);
                        for (let i = 0; i < 512; i++) {
                            this.perm[i] = this.p[i & 255];
                            this.permMod12[i] = (this.perm[i] % 12);
                        }
                    }
                    noise3D(xin, yin, zin) {
                        const grad3 = [
                            [1,1,0],[-1,1,0],[1,-1,0],[-1,-1,0],
                            [1,0,1],[-1,0,1],[1,0,-1],[-1,0,-1],
                            [0,1,1],[0,-1,1],[0,1,-1],[0,-1,-1]
                        ];
                        const F3 = 1.0 / 3.0;
                        const G3 = 1.0 / 6.0;
                        const s = (xin + yin + zin) * F3;
                        const i = Math.floor(xin + s);
                        const j = Math.floor(yin + s);
                        const k = Math.floor(zin + s);
                        const t = (i + j + k) * G3;
                        const X0 = i - t;
                        const Y0 = j - t;
                        const Z0 = k - t;
                        const x0 = xin - X0;
                        const y0 = yin - Y0;
                        const z0 = zin - Z0;
                        let i1, j1, k1, i2, j2, k2;
                        if (x0 >= y0) {
                            if (y0 >= z0) { i1=1; j1=0; k1=0; i2=1; j2=1; k2=0; }
                            else if (x0 >= z0) { i1=1; j1=0; k1=0; i2=1; j2=0; k2=1; }
                            else { i1=0; j1=0; k1=1; i2=1; j2=0; k2=1; }
                        } else {
                            if (y0 < z0) { i1=0; j1=0; k1=1; i2=0; j2=1; k2=1; }
                            else if (x0 < z0) { i1=0; j1=1; k1=0; i2=0; j2=1; k2=1; }
                            else { i1=0; j1=1; k1=0; i2=1; j2=1; k2=0; }
                        }
                        const x1 = x0 - i1 + G3, y1 = y0 - j1 + G3, z1 = z0 - k1 + G3;
                        const x2 = x0 - i2 + 2.0 * G3, y2 = y0 - j2 + 2.0 * G3, z2 = z0 - k2 + 2.0 * G3;
                        const x3 = x0 - 1.0 + 3.0 * G3, y3 = y0 - 1.0 + 3.0 * G3, z3 = z0 - 1.0 + 3.0 * G3;
                        const ii = i & 255, jj = j & 255, kk = k & 255;
                        let t0 = 0.6 - x0*x0 - y0*y0 - z0*z0, n0 = 0.0;
                        if (t0 > 0) {
                            t0 *= t0;
                            const gi0 = this.permMod12[ii + this.perm[jj + this.perm[kk]]];
                            n0 = t0 * t0 * (grad3[gi0][0]*x0 + grad3[gi0][1]*y0 + grad3[gi0][2]*z0);
                        }
                        let t1 = 0.6 - x1*x1 - y1*y1 - z1*z1, n1 = 0.0;
                        if (t1 > 0) {
                            t1 *= t1;
                            const gi1 = this.permMod12[ii + i1 + this.perm[jj + j1 + this.perm[kk + k1]]];
                            n1 = t1 * t1 * (grad3[gi1][0]*x1 + grad3[gi1][1]*y1 + grad3[gi1][2]*z1);
                        }
                        let t2 = 0.6 - x2*x2 - y2*y2 - z2*z2, n2 = 0.0;
                        if (t2 > 0) {
                            t2 *= t2;
                            const gi2 = this.permMod12[ii + i2 + this.perm[jj + j2 + this.perm[kk + k2]]];
                            n2 = t2 * t2 * (grad3[gi2][0]*x2 + grad3[gi2][1]*y2 + grad3[gi2][2]*z2);
                        }
                        let t3 = 0.6 - x3*x3 - y3*y3 - z3*z3, n3 = 0.0;
                        if (t3 > 0) {
                            t3 *= t3;
                            const gi3 = this.permMod12[ii + 1 + this.perm[jj + 1 + this.perm[kk + 1]]];
                            n3 = t3 * t3 * (grad3[gi3][0]*x3 + grad3[gi3][1]*y3 + grad3[gi3][2]*z3);
                        }
                        return 32.0 * (n0 + n1 + n2 + n3);
                    }
                };
            }
        })();

        class CascadingCornerWave {
            constructor(canvasId, options = {}) {
                this.canvas = document.getElementById(canvasId);
                if (!this.canvas) return;
                this.ctx = this.canvas.getContext('2d');
                this.noise = new SimplexNoise();
                this.timeOffset = options.timeOffset || 0;
                this.xCount = options.xCount || 35;
                this.yCount = options.yCount || 80;
                this.timeStep = options.timeStep || 0.01;
                this.speed = options.speed || 0.0001;

                this.init();
            }

            init() {
                this.resize();
                window.addEventListener('resize', () => this.resize());
                this.animate = this.animate.bind(this);
                requestAnimationFrame(this.animate);
            }

            resize() {
                const rect = this.canvas.getBoundingClientRect();
                const dpr = Math.min(window.devicePixelRatio || 1, 2);
                this.width = rect.width || 320;
                this.height = rect.height || 200;
                this.canvas.width = this.width * dpr;
                this.canvas.height = this.height * dpr;
                this.ctx.setTransform(1, 0, 0, 1, 0, 0);
                this.ctx.scale(dpr, dpr);
            }

            animate(timestamp) {
                const ctx = this.ctx;
                const width = this.width;
                const height = this.height;
                const width_half = width / 2;
                const height_half = height / 2;

                const TAU = Math.PI * 2;
                const THIRD = 1 / 3;
                const TWO_THIRDS = 2 / 3;
                const ZERO = 0;
                const ONE = 1;
                const map = (val, in_min, in_max, out_min, out_max) => (val - in_min) * (out_max - out_min) / (in_max - in_min) + out_min;

                // Hitung posisi scroll viewport (0 = paling atas/Cover, 1 = paling bawah/Gratitude)
                let scrollRatio = 0;
                const viewportEl = document.getElementById('slidesViewport');
                if (viewportEl) {
                    const maxScroll = (viewportEl.scrollHeight - viewportEl.clientHeight) || 1;
                    scrollRatio = Math.max(0, Math.min(1, viewportEl.scrollTop / maxScroll));
                }

                // Interpolasi Warna: Merah Anggun BSA di awal -> Hitam di paling bawah (tidak terlalu pekat)
                // Color A: dari Merah Utama BSA Primary-6 (#e50101 -> 229, 1, 1) ke Hitam (#0f0f0f -> 15, 15, 15)
                const rA = Math.round(229 + (15 - 229) * scrollRatio);
                const gA = Math.round(1 + (15 - 1) * scrollRatio);
                const bA = Math.round(1 + (15 - 1) * scrollRatio);
                const colorA = `rgba(${rA}, ${gA}, ${bA}, ${0.85 - 0.05 * scrollRatio})`;

                // Color B: dari Merah Anggun BSA Secondary-5 (#ab2e2f -> 171, 46, 47) ke Hitam (#000000 -> 0, 0, 0)
                const rB = Math.round(171 + (0 - 171) * scrollRatio);
                const gB = Math.round(46 + (0 - 46) * scrollRatio);
                const bB = Math.round(47 + (0 - 47) * scrollRatio);
                const colorB = `rgba(${rB}, ${gB}, ${bB}, ${0.75 - 0.05 * scrollRatio})`;

                // Color C: dari Merah Terang Lembut BSA Primary-4 (#ef5f5f -> 239, 95, 95) ke Hitam (#050505 -> 5, 5, 5)
                const rC = Math.round(239 + (5 - 239) * scrollRatio);
                const gC = Math.round(95 + (5 - 95) * scrollRatio);
                const bC = Math.round(95 + (5 - 95) * scrollRatio);
                const colorC = `rgba(${rC}, ${gC}, ${bC}, ${0.80 - 0.05 * scrollRatio})`;

                // Highlight stroke: dari Rose-Red Glow lembut (255, 175, 175) saat di atas, ke Hitam (0, 0, 0) saat di bawah
                // Memberikan pendar translusen anggun, tidak membuat pekat kaku
                const hlR = Math.round(255 + (0 - 255) * scrollRatio);
                const hlG = Math.round(175 + (0 - 175) * scrollRatio);
                const hlB = Math.round(175 + (0 - 175) * scrollRatio);
                const highlightColor = `rgba(${hlR}, ${hlG}, ${hlB}, ${0.70 + 0.15 * scrollRatio})`;

                let xCount = this.xCount;
                let yCount = this.yCount;
                let iXCount = 1 / (xCount - 1);
                let iYCount = 1 / (yCount - 1);
                let time = (timestamp + this.timeOffset) * this.speed;
                let timeStep = this.timeStep;

                ctx.save();
                // Clear frame transparan
                ctx.clearRect(0, 0, width, height);

                // Origin at center
                ctx.translate(width_half, height_half);

                let grad = ctx.createLinearGradient(-width, 0, width, height);
                let t = time % 1;
                grad.addColorStop(map(t, 0, 1, THIRD, ZERO), colorA);
                grad.addColorStop(map(t, 0, 1, TWO_THIRDS, THIRD), colorB);
                grad.addColorStop(map(t, 0, 1, ONE, TWO_THIRDS), colorC);

                // Multi-layered parametric simplex wave lines
                ctx.beginPath();
                for (let j = 0; j < yCount; j++) {
                    let tj = j * iYCount;
                    let c = Math.cos(tj * TAU + time) * 0.1;
                    for (let i = 0; i < xCount; i++) {
                        let ti = i * iXCount;
                        let n = this.noise.noise3D(ti, time, c);
                        let y = n * height_half;
                        let x = ti * (width + 120) - width_half - 60;
                        if (i === 0) {
                            ctx.moveTo(x, y);
                        } else {
                            ctx.lineTo(x, y);
                        }
                    }
                    time += timeStep;
                }

                // Di atas (background gelap): gunakan 'lighter' agar berdimensi pendar cahaya anggun
                // Di bawah (background merah solid): gunakan 'source-over' agar hitam tegas terlihat di atas merah
                ctx.globalCompositeOperation = scrollRatio > 0.45 ? 'source-over' : 'lighter';

                ctx.filter = 'blur(0px)';
                ctx.strokeStyle = grad;
                ctx.lineWidth = 2.6;
                ctx.stroke();

                ctx.filter = 'blur(0px)';
                ctx.strokeStyle = highlightColor;
                ctx.lineWidth = 1.0;
                ctx.stroke();

                ctx.restore();

                requestAnimationFrame(this.animate);
            }
        }

        // Inisialisasi gelombang di Pojok Kanan Atas dan Pojok Kiri Bawah Layar
        window.addEventListener('DOMContentLoaded', () => {
            new CascadingCornerWave('waveCanvasTopRight', {
                timeOffset: 0,
                xCount: 35,
                yCount: 80,
                timeStep: 0.01,
                speed: 0.0001
            });

            new CascadingCornerWave('waveCanvasBottomLeft', {
                timeOffset: 4800,
                xCount: 35,
                yCount: 80,
                timeStep: 0.01,
                speed: 0.0001
            });
        });
    </script>

</body>

</html>