<?php
/**
 * The template for displaying the Faculty / Expert Council page
 * Template Name: Premium Faculty Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/',
        '<!-- [BLOCKED: LANDINGPAGE_MBA/main.css] -->',
        $html
    );
    return $html;
});
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> prefix="og: https://ogp.me/ns#">

<head>
    <!-- Google Tag Manager -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());
        gtag('config', 'G-QKV7LKNLLH');
        gtag('config', 'AW-11205917800');
    </script>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hội đồng Chuyên môn | Đội ngũ Giảng viên IDEAS</title>

    <meta name="description"
        content="Đội ngũ Hội đồng Chuyên môn IDEAS – tập hợp những chuyên gia hàng đầu với nhiều năm kinh nghiệm thực tiễn trong các lĩnh vực quản trị kinh doanh, tài chính, công nghệ và giáo dục quốc tế." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Hội đồng Chuyên môn – Đội ngũ Giảng viên IDEAS" />
    <meta property="og:description"
        content="Gặp gỡ các chuyên gia, giáo sư và giảng viên hàng đầu của IDEAS – những người dẫn dắt chương trình MBA, DBA và MSc AI đẳng cấp quốc tế." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Main minified stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />

    <style>
        /* ══════════════════════════════════════
           FACULTY PAGE – PREMIUM LIGHT THEME
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f4f6fb;
            color: #111827;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(220, 38, 38, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(220, 38, 38, 0.04) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .faculty-hero {
            position: relative;
            padding: 160px 20px 90px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            background: #0f172a;
            border-bottom: 3px solid #dc2626;
        }

        .faculty-hero-bg {
            position: absolute;
            inset: -150px -10% auto;
            width: 120%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center top;
            filter: blur(1px);
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.75;
        }

        .faculty-hero-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(160deg, rgba(120, 8, 0, 0.88) 0%, rgba(6, 9, 22, 0.96) 70%);
            z-index: 2;
        }

        .faculty-hero-content {
            position: relative;
            z-index: 3;
            max-width: 800px;
            margin: 0 auto;
        }

        .faculty-hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.18);
            backdrop-filter: blur(12px);
            padding: 8px 20px;
            border-radius: 100px;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #fca5a5;
            margin-bottom: 24px;
        }

        .faculty-hero h1 {
            font-size: clamp(2.2rem, 5.5vw, 3.6rem);
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -0.025em;
            margin-bottom: 20px;
        }

        .faculty-hero h1 em {
            font-style: normal;
            background: linear-gradient(135deg, #ff6b6b, #ef4444);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .faculty-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.65);
            max-width: 620px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* Stats row */
        .hero-stats {
            display: flex;
            justify-content: center;
            gap: 48px;
            margin-top: 48px;
            flex-wrap: wrap;
        }

        .hero-stat {
            text-align: center;
        }

        .hero-stat-number {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            line-height: 1;
        }

        .hero-stat-number span {
            color: #f87171;
        }

        .hero-stat-label {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.45);
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
        }

        /* ── Section ─────────────────────── */
        .faculty-section {
            max-width: 1380px;
            margin: 0 auto;
            padding: 72px 24px 100px;
        }

        .section-header {
            text-align: center;
            margin-bottom: 48px;
        }

        .section-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.22);
            color: #ab0e00;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 16px;
        }

        .section-title {
            font-size: clamp(1.8rem, 3.5vw, 2.6rem);
            font-weight: 800;
            color: #0f172a;
            letter-spacing: -0.02em;
            line-height: 1.2;
            margin-bottom: 12px;
        }

        .section-title em {
            font-style: normal;
            color: #ab0e00;
        }

        .section-subtitle {
            color: #4b5563;
            font-size: 1rem;
            max-width: 540px;
            margin: 0 auto;
            line-height: 1.65;
        }

        /* ── Tabs ────────────────────────── */
        .tab-nav {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 52px;
            flex-wrap: wrap;
        }

        .tab-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 12px 28px;
            border-radius: 100px;
            border: 2px solid #e2e8f0;
            background: #ffffff;
            color: #4b5563;
            font-size: 0.92rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            font-family: inherit;
            box-shadow: 0 1px 4px rgba(0, 0, 0, 0.06);
        }

        .tab-btn:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            box-shadow: 0 4px 14px rgba(171, 14, 0, 0.15);
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.35);
        }

        .tab-btn .tab-count {
            background: rgba(255, 255, 255, 0.25);
            color: inherit;
            font-size: 0.74rem;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 100px;
            min-width: 22px;
            text-align: center;
        }

        .tab-btn:not(.active) .tab-count {
            background: #f1f5f9;
            color: #374151;
        }

        /* ── Faculty Grid – flex → last row centred ── */
        .faculty-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 22px;
            justify-content: center;
        }

        /* ── Card ────────────────────────── */
        .faculty-card {
            flex: 0 0 280px;
            max-width: 310px;
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            position: relative;
        }

        .faculty-card:hover {
            transform: translateY(-7px);
            box-shadow: 0 18px 45px rgba(0, 0, 0, 0.12), 0 0 0 1px rgba(171, 14, 0, 0.2);
            border-color: rgba(171, 14, 0, 0.4);
        }

        /* Card image wrap with red gradient overlay */
        .faculty-card-img-wrap {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: linear-gradient(135deg, #7f1d1d 0%, #b91c1c 100%);
        }

        .faculty-card-img-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 80px;
            background: linear-gradient(to top, rgba(220,38,38,0.18), transparent);
        }

        /* Red gradient accent on card top border */
        .faculty-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 3px;
            background: linear-gradient(90deg, #8c1000, #ab0e00, #8c1000);
            z-index: 2;
        }

        .faculty-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            transition: transform 0.5s ease;
        }

        .faculty-card:hover img {
            transform: scale(1.06);
        }

        /* Placeholder */
        .faculty-avatar-placeholder {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(135deg, #fff5f5 0%, #ffe4e4 100%);
            font-size: 3.5rem;
            color: #fca5a5;
        }

        /* Tag ribbon */
        .faculty-card-tag {
            position: absolute;
            top: 14px;
            left: 14px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            backdrop-filter: blur(8px);
            color: #ffffff;
            font-size: 0.67rem;
            font-weight: 700;
            padding: 4px 11px;
            border-radius: 100px;
            z-index: 5;
            max-width: calc(100% - 28px);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .faculty-card-body {
            padding: 18px 20px 14px;
        }

        .faculty-card-name {
            font-size: 1rem;
            font-weight: 700;
            color: #111827;
            margin-bottom: 5px;
            line-height: 1.35;
        }

        .faculty-card-job {
            font-size: 0.8rem;
            color: #4b5563;
            line-height: 1.55;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .faculty-card-footer {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 20px 18px;
        }

        .faculty-card-cta {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            font-size: 0.78rem;
            font-weight: 600;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.06);
            border: 1px solid rgba(171, 14, 0, 0.2);
            padding: 6px 14px;
            border-radius: 100px;
            transition: all 0.2s ease;
        }

        .faculty-card:hover .faculty-card-cta {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-color: #ab0e00;
        }

        .faculty-card-dots {
            display: flex;
            gap: 4px;
        }

        .faculty-card-dots span {
            width: 5px;
            height: 5px;
            border-radius: 50%;
            background: #e2e8f0;
        }

        .faculty-card-dots span:first-child { background: #ab0e00; }

        /* Fade-in animation */
        .faculty-card {
            opacity: 0;
            transform: translateY(24px);
            animation: cardIn 0.4s ease forwards;
        }

        @keyframes cardIn {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Modal ───────────────────────── */
        .faculty-modal-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4, 6, 14, 0.80);
            backdrop-filter: blur(10px);
            z-index: 9000;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .faculty-modal-overlay.open {
            opacity: 1;
            pointer-events: all;
        }

        .faculty-modal {
            background: #ffffff;
            border: 1px solid #e8ecf0;
            border-radius: 24px;
            max-width: 600px;
            width: 100%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 32px 80px rgba(0, 0, 0, 0.2);
            transform: scale(0.95) translateY(20px);
            transition: transform 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            scrollbar-width: thin;
            scrollbar-color: rgba(220,38,38,0.25) transparent;
        }

        .faculty-modal-overlay.open .faculty-modal {
            transform: scale(1) translateY(0);
        }

        .faculty-modal-header {
            position: relative;
            padding: 0;
            border-radius: 24px 24px 0 0;
            overflow: hidden;
        }

        .faculty-modal-cover {
            height: 220px;
            background: linear-gradient(135deg, #7f1d1d 0%, #b91c1c 50%, #450a0a 100%);
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .faculty-modal-cover-pattern {
            position: absolute;
            inset: 0;
            background-image:
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.1) 0%, transparent 55%),
                radial-gradient(circle at 80% 30%, rgba(255, 255, 255, 0.07) 0%, transparent 50%);
            pointer-events: none;
        }

        /* Avatar + name block centred inside red cover */
        .faculty-modal-avatar {
            position: relative;
            z-index: 5;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.35);
            object-fit: cover;
            object-position: center top;
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.35);
            background: #f1f5f9;
            display: block;
        }

        .faculty-modal-avatar-placeholder {
            position: relative;
            z-index: 5;
            width: 100px;
            height: 100px;
            border-radius: 50%;
            border: 3px solid rgba(255, 255, 255, 0.3);
            background: rgba(0, 0, 0, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.4rem;
            color: rgba(255, 255, 255, 0.6);
            box-shadow: 0 6px 24px rgba(0, 0, 0, 0.3);
        }

        /* Name shown inside cover below avatar */
        .faculty-modal-cover-name {
            position: relative;
            z-index: 5;
            font-size: 1.2rem;
            font-weight: 800;
            color: #ffffff;
            text-align: center;
            text-shadow: 0 2px 8px rgba(0, 0, 0, 0.4);
            letter-spacing: -0.015em;
            padding: 0 20px;
        }

        .faculty-modal-close {
            position: absolute;
            top: 14px;
            right: 14px;
            width: 34px;
            height: 34px;
            border-radius: 50%;
            background: rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: #ffffff;
            font-size: 0.95rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background 0.2s ease;
            z-index: 10;
        }

        .faculty-modal-close:hover {
            background: rgba(0, 0, 0, 0.55);
        }

        .faculty-modal-body {
            padding: 24px 32px 32px;
        }

        .faculty-modal-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.22);
            color: #ab0e00;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 12px;
        }

        /* Name no longer shown in body (shown in cover) */
        .faculty-modal-name {
            display: none;
        }

        .faculty-modal-job {
            color: #374151;
            font-size: 0.92rem;
            line-height: 1.65;
            margin-bottom: 20px;
            padding-bottom: 20px;
            border-bottom: 1px solid #f0f0f0;
            font-weight: 500;
        }

        .faculty-modal-des-title {
            font-size: 0.72rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #9ca3af;
            margin-bottom: 14px;
        }

        .faculty-modal-des {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .faculty-modal-des li {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            font-size: 0.91rem;
            color: #1f2937;
            line-height: 1.65;
        }

        .faculty-modal-des li i {
            color: #ab0e00;
            margin-top: 4px;
            flex-shrink: 0;
            font-size: 0.75rem;
        }

        /* Empty state (no des) */
        .faculty-modal-no-des {
            text-align: center;
            padding: 20px 0;
            color: #94a3b8;
            font-size: 0.9rem;
        }

        /* ── Empty tab state ───────────── */
        .faculty-empty {
            text-align: center;
            padding: 80px 20px;
            color: #94a3b8;
        }

        /* ── Contrast Overrides for Dark Backgrounds ── */
        body .faculty-hero h1 {
            color: #ffffff !important;
        }
        body .faculty-hero p {
            color: rgba(255, 255, 255, 0.85) !important;
        }
        body .faculty-hero-badge {
            color: #fca5a5 !important;
            background: rgba(255, 255, 255, 0.08) !important;
            border: 1px solid rgba(255, 255, 255, 0.18) !important;
        }

        /* ── Responsive ─────────────────── */
        /* ── Mobile horizontal carousel slider ── */
        .slider-dots {
            display: none;
            justify-content: center;
            gap: 8px;
            margin-top: 24px;
        }

        .slider-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #cbd5e1;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .slider-dot.active {
            background: #ab0e00;
            width: 24px;
            border-radius: 4px;
        }

        @media (max-width: 768px) {
            .faculty-hero {
                padding: 120px 20px 50px !important;
            }

            .hero-stats {
                flex-wrap: nowrap !important;
                gap: 12px !important;
                margin-top: 36px !important;
                width: 100% !important;
            }
            
            .hero-stat {
                flex: 1 1 33.33% !important;
            }

            .hero-stat-number {
                font-size: 1.6rem !important;
            }

            .hero-stat-label {
                font-size: 0.68rem !important;
                line-height: 1.3 !important;
            }

            .faculty-section {
                padding: 50px 20px 60px !important;
            }

            .faculty-grid {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none; /* Firefox */
                margin-left: -20px !important;
                margin-right: -20px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }

            .faculty-grid::-webkit-scrollbar {
                display: none; /* Chrome/Safari */
            }

            .faculty-card {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
            }

            .slider-dots {
                display: flex;
            }

            .faculty-modal-body {
                padding: 60px 22px 24px;
            }

            .tab-nav {
                gap: 6px;
            }

            .tab-btn {
                padding: 10px 18px;
                font-size: 0.85rem;
            }
        }

        /* Back to top integration */
        .back-to-top-btn.show {
            opacity: 1;
            pointer-events: all;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- ══ HEADER ══ -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- ══ HERO ══ -->
    <section class="faculty-hero" id="faculty-hero-top">
        <div class="faculty-hero-bg" id="faculty-parallax-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');"></div>
        <div class="faculty-hero-overlay"></div>
        <div class="faculty-hero-content">
            <div class="faculty-hero-badge">
                <i class="fa-solid fa-user-graduate"></i>
                Expert Council · Hội đồng Chuyên môn
            </div>
            <h1>Đội Ngũ <em>Chuyên Gia</em><br>Hàng Đầu Của IDEAS</h1>
            <p>Tập hợp những giáo sư, tiến sĩ và chuyên gia hàng đầu với nhiều năm kinh nghiệm thực tiễn trong quản trị
                kinh doanh, tài chính, công nghệ và giáo dục quốc tế.</p>
            <div class="hero-stats">
                <div class="hero-stat">
                    <div class="hero-stat-number">15<span>+</span></div>
                    <div class="hero-stat-label">Giảng viên cơ hữu</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">10<span>+</span></div>
                    <div class="hero-stat-label">Cố vấn quốc tế</div>
                </div>
                <div class="hero-stat">
                    <div class="hero-stat-number">25<span>+</span></div>
                    <div class="hero-stat-label">Năm kinh nghiệm tb.</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ══ MAIN CONTENT ══ -->
    <main class="faculty-section" id="faculty-main">

        <div class="section-header">
            <div class="section-badge">
                <i class="fa-solid fa-graduation-cap"></i>
                Hội đồng Chuyên môn
            </div>
            <h2 class="section-title">Gặp gỡ <em>Đội Ngũ Giảng Viên</em> của Chúng Tôi</h2>
            <p class="section-subtitle">Những chuyên gia dẫn dắt chương trình MBA, MSc AI và DBA đẳng cấp quốc tế tại
                IDEAS.</p>
        </div>

        <!-- Tab Navigation -->
        <div class="tab-nav" id="faculty-tabs" role="tablist">
            <button class="tab-btn active" id="tab-gv" data-tab="gv" role="tab" aria-selected="true">
                <i class="fa-solid fa-chalkboard-user"></i>
                Giảng viên
                <span class="tab-count" id="count-gv">15</span>
            </button>
            <button class="tab-btn" id="tab-cv" data-tab="cv" role="tab" aria-selected="false">
                <i class="fa-solid fa-globe"></i>
                Cố vấn Quốc tế
                <span class="tab-count" id="count-cv">15</span>
            </button>
        </div>

        <!-- Faculty Grid Container -->
        <div class="faculty-grid" id="faculty-grid" role="list"></div>

    </main>

    <!-- ══ MODAL ══ -->
    <div class="faculty-modal-overlay" id="faculty-modal-overlay" role="dialog" aria-modal="true"
        aria-labelledby="modal-name">
        <div class="faculty-modal" id="faculty-modal">
            <div class="faculty-modal-header">
                <div class="faculty-modal-cover">
                    <div class="faculty-modal-cover-pattern"></div>
                </div>
                <button class="faculty-modal-close" id="modal-close" aria-label="Đóng">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
            <div class="faculty-modal-body">
                <div class="faculty-modal-tag" id="modal-tag"></div>
                <div class="faculty-modal-name" id="modal-name"></div>
                <div class="faculty-modal-job" id="modal-job"></div>
                <div class="faculty-modal-des-title" id="modal-des-title">Kinh nghiệm & Chức vụ</div>
                <ul class="faculty-modal-des" id="modal-des"></ul>
            </div>
        </div>
    </div>

    <!-- ══ SCRIPTS ══ -->
    <script>
        // ── Faculty data ───────────────────────────────────────────────
        const FACULTY_DATA = {
            gv: [
                {
                    name: "Phạm Quang Vinh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt.jpg",
                    tag: "Tiến sĩ QTKD Hoa Kỳ",
                    job: "Viện trưởng IDEAS",
                    des: [
                        "Có hơn 25 năm kinh nghiệm trong lĩnh vực Marketing và Bảo Hiểm",
                        "Nhà sáng lập - Viện trưởng IDEAS",
                        "Giám đốc điều hành công ty cổ phần tư vấn du học TSSAC",
                        "Thành viên ban Quản trị Trung tâm Nghiên cứu, Tư vấn, Hỗ trợ, Sáng tạo Khoa học Kỹ thuật TP.HCM (R.i.C.H)",
                        "Phó chủ tịch Hội Khoa Học Phát triển nguồn nhân lực, nhân tài Việt Nam TP.HCM",
                        "Trưởng ban đối ngoại và hợp tác quốc tế Hội giáo dục nghề nghiệp TPHCM",
                    ]
                },
                {
                    name: "Dương Văn Thịnh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Thay-thinh.png",
                    tag: "Tiến sĩ QTKD Pháp",
                    job: "VERON Group - Vice President, AI Technology",
                    des: [
                        "Tiến sĩ, QTKD – chuyên ngành Nghiên cứu AI & Trung tâm dữ liệu (Ascencia, College de Paris – Pháp)",
                        "Thạc sĩ Quản lý điện tử (Innotech Pháp)",
                        "Sau đại học chuyên ngành Kinh tế (Đại học Kinh tế TP.HCM)",
                        "Cử nhân Pháp học",
                    ]
                },
                {
                    name: "Sơn Điền Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/NHP_1769-removebg-preview.png",
                    tag: "Tiến sĩ QTKD Pháp",
                    job: "Chủ tịch cty Sonha pharma, Q pharma. Đồng sáng lập và thành viên IDEAS.",
                    des: [
                        "20 năm kinh nghiệm trong lĩnh vực kinh doanh dược phẩm",
                        "5 năm trong lĩnh vực cung cấp dịch vụ giáo dục",
                    ]
                },
                {
                    name: "Trần Tâm Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/a-tam-anh-1.png",
                    tag: "Tiến sĩ QTKD Hoa Kỳ",
                    job: "Chịu trách nhiệm về chiến lược phát triển quốc tế, marketing và các hoạt động học thuật tại IDEAS.",
                    des: [
                        "Nhiều năm kinh nghiệm làm quản lý cấp cao các chương trình quốc tế – Khu vực AEC",
                    ]
                },
                {
                    name: "Trần Hoàng Hiệp",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-hoang-hiep.jpg",
                    tag: "Thạc sĩ QTKD MCFORD University",
                    job: "Phó Tổng giám đốc – Business Smart JSC",
                    des: [
                        "Hơn 31 năm kinh nghiệm kinh doanh",
                        "Chuyên gia tư vấn và triển khai các dự án quốc tế về phát triển năng lực tại Singapore, Malaysia, Myanmar",
                        "Tham gia Dự án Hiện đại hóa Ngân hàng trị giá 49 triệu USD do Ngân hàng Thế giới (WB) tài trợ",
                        "Giảng viên được chứng nhận cho chương trình [Lãnh đạo Thay đổi Táo bạo] của John Kotter (Đại học Harvard, Hoa Kỳ)",
                    ]
                },
                {
                    name: "Nguyễn Thị Minh Đoan",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/Doan.png",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên IDEAS",
                    des: [
                        "18 năm kinh nghiệm đảm nhiệm vị trí Giám đốc Đào tạo Bán hàng tại AIA, Prudential, Aviva VN",
                        "2 năm kinh nghiệm đảm nhiệm vị trí Trưởng phòng Nhân sự tại Ngân hàng Nam Á và Đại học Hoa Sen",
                    ]
                },
                {
                    name: "Mang Viên Hoàng Nhật",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2024/04/cNhat.png",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên IDEAS",
                    des: [
                        "25 năm kinh nghiệm trong lĩnh vực kinh doanh Dược Phẩm, Vaccine, Thiết Bị Y Tế",
                        "11 năm kinh nghiệm quản lý cấp cao tại GlaxoSmithKline (GSK), Roche, Menarini, Takeda",
                        "3 năm kinh nghiệm trong lĩnh vực giáo dục, giảng viên thỉnh giảng, diễn giả của Trường Đại Học",
                    ]
                },
                {
                    name: "Dương Trần Minh Đoàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/duong-tran-minh-doan.jpg",
                    tag: "Thạc sĩ QTKD Đại học Houston Clear Lake",
                    job: "Hiệu trưởng trường Trung cấp Công nghệ Thông tin Sài Gòn (SITC)",
                    des: [
                        "Hơn 27 năm làm việc tại các doanh nghiệp trong và ngoài nước",
                        "Hơn 12 năm kinh nghiệm thực chiến trong lĩnh vực tài chính – kế toán",
                        "Nhiều năm kinh nghiệm giảng dạy ở Đại học Quốc gia TPHCM, Đại học Hoa Sen, Đại học Broward",
                    ]
                },
                {
                    name: "Trần Thị Mai Anh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/tran-thi-mai-anh.jpg",
                    tag: "Thạc sĩ QTNNL, USA",
                    job: "Giám đốc Điều hành – Anpha Solutions and Training",
                    des: [
                        "Hơn 19 năm làm Giám đốc Nhân sự chiến lược tại Teko/VNLife, AAA, Circle K Việt Nam, Central Group",
                        "Hơn 20 năm là Giảng viên bộ môn Quản trị Nguồn Nhân lực và Chuyên gia Tư vấn",
                    ]
                },
                {
                    name: "Lê Sơn Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/lesonphong-1.jpg",
                    tag: "Thạc sĩ QTKD",
                    job: "Associate Counsel Le Nguyen Law Firm — HCMC",
                    des: [
                        "Giảng viên MBA - Đại học UBIS và Apollos (Hoa Kỳ)",
                        "Phó Chủ tịch - Viện Phát triển và Trao đổi Khoa học Ứng dụng (IDEAS)",
                        "Trưởng phòng Quản lý Rủi ro - Quy trình - Tuân thủ và AML - Tập đoàn Novaland",
                        "Thẩm phán Cao cấp - Tòa án Nhân dân TP. Hồ Chí Minh",
                    ]
                },
                {
                    name: "Đặng Quốc Phong",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Thạc sĩ Khoa học máy tính – VNUHCM",
                    job: "Giám đốc chương trình Kỹ thuật phần mềm – ĐH Gia Định",
                    des: [
                        "Chuyên gia công nghệ và giáo dục, nghiên cứu ML/AI và phương pháp nghiên cứu",
                        "Hỗ trợ nhiều sinh viên BA/MBA & DBA thực hiện các dự án nghiên cứu",
                        "Trưởng Dự án DEG của Nova Education Group (2021–2024)",
                    ]
                },
                {
                    name: "Nguyễn Anh Toàn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Thạc sĩ QTKD",
                    job: "Chuyên gia tư vấn đầu tư - Maybank Investment Bank VN",
                    des: [
                        "Cố vấn Tài chính - VinaCapital Fund Management JSC",
                        "Nhân viên Ngân hàng Đa năng - Citibank Việt Nam",
                        "Tư vấn cho Ban Quản lý - Chuỗi nhượng quyền cà phê JAVI",
                    ]
                },
                {
                    name: "Nguyễn Hoài Trung",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Thạc sĩ QTKD – Thạc sĩ Kỹ thuật Dầu khí",
                    job: "Cố vấn Phát triển Kinh doanh - Wecare 247",
                    des: [
                        "Hơn 16 năm kinh nghiệm trong Quản trị Kinh doanh, Vận hành, và Kỹ thuật Dầu khí",
                        "Giảng viên Hợp đồng - Đại học FPT & Viện Quản lý Kinh doanh Quốc tế",
                        "Kỹ sư chuyên môn cao với hơn 10 năm kinh nghiệm tại Schlumberger, Petronas, Petrovietnam",
                    ]
                },
                {
                    name: "Nguyễn Thanh Tuấn",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Tiến sĩ QTKD",
                    job: "Giảng viên",
                    des: [
                        "Hơn 20 năm kinh nghiệm giảng dạy tại các trường đại học trong nước và quốc tế",
                        "Chủ đề: PPNCKD, quản lý quốc tế, hành vi tổ chức, marketing strategy, HRM",
                    ]
                },
                {
                    name: "Nguyễn Thành Nhân",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2022/05/nguyen-thanh-nhan.jpg",
                    tag: "Thạc sĩ Phân tích KD & Chuyển đổi số",
                    job: "Phó Giám đốc CNTT - MSD (Pharmaceuticals & Healthcare)",
                    des: [
                        "Phó Giám đốc CNTT - MSD (Pharmaceuticals & Healthcare)",
                        "Trưởng bộ phận CNTT - Schneider Electric (Energy Management & Industrial Automation)",
                        "Quản lý danh mục dự án Industry 4.0 - Bosch (Automotive Manufacturing)",
                        "Kỹ sư hệ thống CNTT tại Intel (Semiconductor Manufacturing)",
                    ]
                },
            ],
            cv: [
                {
                    name: "Phạm Quang Vinh",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt.jpg",
                    tag: "DBA at Apollos University",
                    job: "Viện trưởng IDEAS",
                    des: [
                        "Có hơn 25 năm kinh nghiệm trong lĩnh vực Marketing và Bảo Hiểm",
                        "Nhà sáng lập - Viện trưởng IDEAS",
                        "Phó chủ tịch Hội Khoa Học Phát triển nguồn nhân lực, nhân tài Việt Nam TP.HCM",
                    ]
                },
                {
                    name: "Alexander Pulte",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "MBA from Columbia University",
                    job: "Professor and International Dean at the University of Business and International Studies in Geneva.",
                    des: [
                        "Executive roles at Sullivan & Cromwell, Asia Green Development Bank, and Screen Digest",
                        "Senior Media Analyst and Strategy Consultant across Asia, Europe, and the United States",
                        "Mentoring research in business strategy, cross-cultural management, and organizational development",
                    ]
                },
                {
                    name: "Carsten Ley",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Owner & Consultant",
                    job: "Asia PMO - Agile Project Management, OKR & CX Consulting South East Asia",
                    des: [
                        "VP Customer Experience & Customer Service | Lazada Group, Ho Chi Minh City",
                        "Head of Customer Experience | Home Credit Financial Institute, Vietnam",
                        "Business Lecturer for University of Greenwich",
                        "Marketing Lecturer for FPT School of Business & Technology (FSB)",
                    ]
                },
                {
                    name: "Marcel Enzler",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "EMBA in Brand & Marketing Management",
                    job: "AI specialist and Data Scientist",
                    des: [
                        "Hospitality: Campbell Grey Hotels (London), Hilton Group (Zurich), Poppys Group (India)",
                        "2014: Co-founded textile production management company",
                        "2016: Relocated to Switzerland; works as Marketing and Strategic Consultant",
                    ]
                },
                {
                    name: "Talha Saleem Ahmad",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "BSc/MSc/MSc",
                    job: "AI specialist and Data Scientist",
                    des: [
                        "Teaching Computing and Data Science at Gloucestershire College (UK) and WEIoT",
                        "Collaborating with GCHQ (UK Intelligence & Security Agency), driving innovation in AI and technology education",
                        "Leading AI and Data Science projects at InnovatiCS",
                    ]
                },
                {
                    name: "Vasyl Mostovyy",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "BSc/MSc/MSc",
                    job: "Military Institute of KNU T. Shevchenko",
                    des: [
                        "Over 20 years of teaching financial engineering, mathematical modeling for automated decision-making systems",
                        "Institute of Geophysics of the National Academy of Sciences of Ukraine",
                        "Institute of High Technologies of KNU T. Shevchenko",
                    ]
                },
                {
                    name: "Garilyn Vause",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Master of Analytical Finance | Emory University",
                    job: "Social Media Strategy Analyst | KPMG LLP",
                    des: [
                        "2023 - Present: Social Media Strategy Analyst | KPMG LLP",
                        "2019 - 2023: Social Media Marketing Strategist | Dive N' Dash",
                        "2018 - 2020: Digital Marketing Specialist | Bronzelens Film Festival",
                    ]
                },
                {
                    name: "Frank Lee Harper Jr.",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "BSc/MSc/MSc",
                    job: "Founder, CEO & CLO – Intelligent Systems Services LLC",
                    des: [
                        "30+ years of real-world learning and development experience to corporates, universities worldwide",
                        "Vice-Chancellor, Associate Professor of Agile Leadership & Project Management at Cambridge Corporate University (CCU)",
                        "Certified Agile Coach, Lean Six-Sigma Black & Green Belt",
                    ]
                },
                {
                    name: "Viola Krebs",
                    avatar: "https://static.wixstatic.com/media/ad92c7_b5271804f0454b11a7c7a08850a42adc~mv2.jpg/v1/fill/w_277,h_277,al_c,q_80,usm_0.66_1.00_0.01,enc_avif,quality_auto/Image-empty-state.jpg",
                    tag: "PhD in Sciences of Information and Communications – University of Strasbourg",
                    job: "Professor and lecturer in Technology",
                    des: [
                        "Professor and lecturer in Technology (Web, AI), Communications, International Business",
                        "Scientific Collaborator for the Geneva University Center for Computer Sciences (CUI)",
                        "Member of the University of Strasbourg Chair of UNESCO",
                        "Certified auditor for educational norms (ProCert: ISO, QSC, eduQua, In-Qualis)",
                    ]
                },
                {
                    name: "Nguyễn Chính Quang",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "Postdoctoral – Western Sydney University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Trần Ngọc Khang",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "DBA at Cambridge Corporate University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "De Lagarde, Olivier",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "DBA at Cambridge Corporate University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Cartwright, Phillip",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "PhD in Economics – University of Illinois, Urbana-Champaign, USA",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Chapuis, Jean-Michel",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "PhD in Management Science – Université de Bourgogne",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Ng, Kwan Keung Steven",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "DBA – University of South Australia",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Fung, Kwok Hung Lobo",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "PhD in Business Administration – Bulacan State University",
                    job: "Academic Advisor",
                    des: []
                },
                {
                    name: "Fung Man Kam Leo",
                    avatar: "https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png",
                    tag: "DBA – Southern Cross University, Australia",
                    job: "Academic Advisor",
                    des: []
                },
            ]
        };

        // Default avatar
        const DEFAULT_AVATAR = 'https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png';

        function isDefaultAvatar(url) {
            return url === DEFAULT_AVATAR || url.includes('logofavicon');
        }

        // ── Render grid ─────────────────────────────────────────────────
        const grid = document.getElementById('faculty-grid');
        let currentTab = 'gv';

        function renderGrid(type) {
            currentTab = type;
            const list = FACULTY_DATA[type];

            // Update counts
            document.getElementById('count-gv').textContent = FACULTY_DATA.gv.length;
            document.getElementById('count-cv').textContent = FACULTY_DATA.cv.length;

            // Clear grid
            grid.innerHTML = '';

            if (!list || list.length === 0) {
                grid.innerHTML = '<div class="faculty-empty"><i class="fa-solid fa-users-slash" style="font-size:3rem;margin-bottom:16px;display:block;"></i>Chưa có dữ liệu</div>';
                return;
            }

            list.forEach((person, idx) => {
                const card = document.createElement('div');
                card.className = 'faculty-card';
                card.setAttribute('role', 'listitem');
                card.setAttribute('tabindex', '0');
                card.style.animationDelay = `${Math.min(idx * 60, 600)}ms`;

                const hasRealAvatar = !isDefaultAvatar(person.avatar);

                card.innerHTML = `
                <div class="faculty-card-img-wrap">
                    <span class="faculty-card-tag">${person.tag}</span>
                    ${hasRealAvatar
                        ? `<img src="${person.avatar}" alt="${person.name}" loading="lazy" decoding="async">`
                        : `<div class="faculty-avatar-placeholder"><i class="fa-solid fa-user-tie"></i></div>`
                    }
                </div>
                <div class="faculty-card-body">
                    <div class="faculty-card-name">${person.name}</div>
                    <div class="faculty-card-job">${person.job}</div>
                </div>
                <div class="faculty-card-footer">
                    <span class="faculty-card-cta">
                        <i class="fa-solid fa-circle-info"></i>
                        Xem chi tiết
                    </span>
                    <div class="faculty-card-dots">
                        <span></span><span></span><span></span>
                    </div>
                </div>
            `;

                card.addEventListener('click', () => openModal(person));
                card.addEventListener('keydown', (e) => {
                    if (e.key === 'Enter' || e.key === ' ') { e.preventDefault(); openModal(person); }
                });

                grid.appendChild(card);
            });

            // Initialize mobile slider dots
            initMobileSliderDots();
        }

        function initMobileSliderDots() {
            let dotsContainer = document.getElementById('faculty-slider-dots');
            if (!dotsContainer) {
                dotsContainer = document.createElement('div');
                dotsContainer.id = 'faculty-slider-dots';
                dotsContainer.className = 'slider-dots';
                grid.parentNode.insertBefore(dotsContainer, grid.nextSibling);
            }
            dotsContainer.innerHTML = '';
            
            const cards = grid.querySelectorAll('.faculty-card');
            if (cards.length === 0) return;
            
            cards.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                dotsContainer.appendChild(dot);
            });
            
            grid.removeEventListener('scroll', handleGridScroll);
            grid.addEventListener('scroll', handleGridScroll);
            
            // Reset scroll position on switch tab
            grid.scrollLeft = 0;
        }

        function handleGridScroll() {
            const dotsContainer = document.getElementById('faculty-slider-dots');
            if (!dotsContainer) return;
            const scrollLeft = grid.scrollLeft;
            const firstCard = grid.querySelector('.faculty-card');
            if (!firstCard) return;
            const cardWidth = firstCard.offsetWidth + 16; // width + gap
            const activeIndex = Math.round(scrollLeft / cardWidth);
            
            const dots = dotsContainer.querySelectorAll('.slider-dot');
            dots.forEach((dot, idx) => {
                if (idx === activeIndex) {
                    dot.classList.add('active');
                } else {
                    dot.classList.remove('active');
                }
            });
        }

        // ── Modal ────────────────────────────────────────────────────────
        const overlay = document.getElementById('faculty-modal-overlay');
        const modalEl = document.getElementById('faculty-modal');
        const modalClose = document.getElementById('modal-close');

        function openModal(person) {
            const hasRealAvatar = !isDefaultAvatar(person.avatar);

            // Target: INSIDE .faculty-modal-cover so avatar is fully visible
            const cover = document.querySelector('.faculty-modal-cover');

            // Remove old avatar/placeholder/name elements from cover
            cover.querySelectorAll('.faculty-modal-avatar, .faculty-modal-avatar-placeholder, .faculty-modal-cover-name').forEach(el => el.remove());

            // Insert avatar inside cover
            if (hasRealAvatar) {
                const img = document.createElement('img');
                img.className = 'faculty-modal-avatar';
                img.id = 'modal-avatar';
                img.src = person.avatar;
                img.alt = person.name;
                cover.appendChild(img);
            } else {
                const ph = document.createElement('div');
                ph.className = 'faculty-modal-avatar-placeholder';
                ph.id = 'modal-avatar-placeholder';
                ph.innerHTML = '<i class="fa-solid fa-user-tie"></i>';
                cover.appendChild(ph);
            }

            // Name shown inside cover
            const coverName = document.createElement('div');
            coverName.className = 'faculty-modal-cover-name';
            coverName.textContent = person.name;
            cover.appendChild(coverName);

            document.getElementById('modal-tag').innerHTML = `<i class="fa-solid fa-certificate"></i> ${person.tag}`;
            document.getElementById('modal-name').textContent = person.name; // hidden via CSS but kept for a11y
            document.getElementById('modal-job').textContent = person.job;

            const desList = document.getElementById('modal-des');
            const desTitle = document.getElementById('modal-des-title');
            desList.innerHTML = '';

            if (person.des && person.des.length > 0) {
                desTitle.style.display = '';
                desList.style.display = '';
                person.des.forEach(line => {
                    const li = document.createElement('li');
                    li.innerHTML = `<i class="fa-solid fa-check-circle"></i><span>${line}</span>`;
                    desList.appendChild(li);
                });
            } else {
                desTitle.style.display = 'none';
                desList.style.display = 'none';
            }

            overlay.classList.add('open');
            document.body.style.overflow = 'hidden';
            modalEl.scrollTop = 0;
        }

        function closeModal() {
            overlay.classList.remove('open');
            document.body.style.overflow = '';
        }

        modalClose.addEventListener('click', closeModal);
        overlay.addEventListener('click', (e) => { if (e.target === overlay) closeModal(); });
        document.addEventListener('keydown', (e) => { if (e.key === 'Escape') closeModal(); });

        // ── Tabs ─────────────────────────────────────────────────────────
        document.querySelectorAll('.tab-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.tab-btn').forEach(b => {
                    b.classList.remove('active');
                    b.setAttribute('aria-selected', 'false');
                });
                btn.classList.add('active');
                btn.setAttribute('aria-selected', 'true');
                renderGrid(btn.dataset.tab);
            });
        });

        // ── Initial render ───────────────────────────────────────────────
        renderGrid('gv');

        // ── Parallax hero ────────────────────────────────────────────────
        const heroBg = document.getElementById('faculty-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', () => {
                if (!ticking) {
                    requestAnimationFrame(() => {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('faculty-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            const pct = scrollY / heroH;
                            heroBg.style.transform = `translate3d(0, ${scrollY * 0.35}px, 0) scale(1.15)`;
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>

    <!-- Script.min.js for header scroll hide, mobile menu, lenis -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script
        src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>"
        defer></script>

    <?php get_footer(); ?>
</body>

</html>