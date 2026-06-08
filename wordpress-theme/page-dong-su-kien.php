<?php
/**
 * The template for displaying the Events Timeline page
 * Template Name: Premium Events Timeline Template
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
    <title>Dòng Sự Kiện &amp; Hoạt Động | Viện IDEAS</title>

    <meta name="description"
        content="Theo dõi các hoạt động nổi bật, lễ tốt nghiệp, buổi hội thảo khoa học, lễ ký kết và các chuyến đi thực tế của cộng đồng học viên Viện IDEAS." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Dòng Sự Kiện &amp; Hoạt Động – Viện IDEAS" />
    <meta property="og:description"
        content="Xem lại các sự kiện đáng nhớ, cột mốc học thuật và các hoạt động thực tế quốc tế của học viên và giảng viên tại IDEAS." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/10/en2810.webp" />
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
           EVENTS PAGE – PREMIUM LIGHT THEME
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
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.04) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .events-hero {
            position: relative;
            padding: 165px 20px 105px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            background: #0a0d14;
        }

        .events-hero-bg {
            position: absolute;
            top: -150px;
            left: -5%;
            width: 110%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.35;
        }

        .events-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(8, 10, 18, 0.82) 0%,
                    rgba(100, 8, 0, 0.45) 55%,
                    rgba(8, 10, 18, 0.90) 100%),
                radial-gradient(ellipse at 50% 70%, rgba(171, 14, 0, 0.35) 0%, transparent 65%);
        }

        .events-hero .container {
            position: relative;
            z-index: 3;
            max-width: 800px;
            margin: 0 auto;
        }

        .events-hero-badge {
            background: rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(171, 14, 0, 0.4);
            padding: 8px 18px;
            border-radius: 100px;
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 22px;
            backdrop-filter: blur(12px);
        }

        .events-hero h1 {
            font-size: clamp(2.6rem, 6vw, 4rem);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.03em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 2px 20px rgba(0, 0, 0, 0.4);
        }

        .events-hero h1 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 60%, #ff3030 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .events-hero p {
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.72);
            max-width: 640px;
            margin: 0 auto;
            line-height: 1.7;
        }

        /* ── Main content area ─────────────── */
        .events-section {
            max-width: 1280px;
            margin: 0 auto;
            padding: 60px 20px 100px;
        }

        /* ── Categories filter tabs bar ────── */
        .events-filter-bar {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 50px;
            position: relative;
            z-index: 10;
        }

        .filter-btn {
            background: #ffffff;
            color: #4b5563;
            border: 1px solid #e2e8f0;
            padding: 11px 26px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
            font-family: inherit;
        }

        .filter-btn:hover {
            color: #ab0e00;
            border-color: rgba(171, 14, 0, 0.3);
            background: #fffafa;
            transform: translateY(-2px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.06);
        }

        .filter-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 5px 16px rgba(171, 14, 0, 0.32);
        }

        /* ── Event cards grid ──────────────── */
        .events-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            justify-content: center;
        }

        /* Centering grid elements & responsive width */
        .event-card {
            flex: 0 0 380px;
            max-width: 380px;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.04);
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            text-decoration: none;
            color: inherit;
        }

        @media (max-width: 768px) {
            .events-hero {
                padding: 120px 16px 45px !important;
            }
            .events-section {
                padding: 40px 16px 60px !important;
            }
            .events-grid {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none !important; /* Firefox */
                margin-left: -16px;
                margin-right: -16px;
                padding-left: 16px;
                padding-right: 16px;
            }
            .events-grid::-webkit-scrollbar {
                display: none !important; /* Chrome/Safari */
            }
            .event-card {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
            }
            .slider-dots {
                display: flex;
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
        }

        .event-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 50px rgba(15, 23, 42, 0.08), 0 0 0 1px rgba(171, 14, 0, 0.15);
            border-color: rgba(171, 14, 0, 0.35);
        }

        /* Red gradient top outline */
        .event-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #8c1000, #ab0e00, #ff4d4d, #ab0e00, #8c1000);
            z-index: 5;
        }

        /* Cover wrap */
        .event-card-img-wrap {
            position: relative;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            background: #f1f5f9;
        }

        .event-card-img-wrap::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            background: linear-gradient(to top, rgba(171, 14, 0, 0.08), transparent);
            z-index: 2;
        }

        .event-card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .event-card:hover .event-card-img-wrap img {
            transform: scale(1.05);
        }

        /* Category badge inside cover */
        .event-card-tag {
            position: absolute;
            top: 16px;
            left: 16px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 0.72rem;
            font-weight: 700;
            padding: 5px 12px;
            border-radius: 100px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.3);
            z-index: 3;
            letter-spacing: 0.02em;
        }

        /* Card Content Body */
        .event-card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .event-card-date {
            font-size: 0.82rem;
            font-weight: 700;
            color: #ab0e00;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.03em;
        }

        .event-card-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            line-height: 1.45;
            margin: 0 0 16px 0;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            height: 2.9em;
        }

        .event-card:hover .event-card-title {
            color: #ab0e00;
        }

        /* Meta details */
        .event-meta-list {
            display: flex;
            flex-direction: column;
            gap: 9px;
            margin-bottom: 24px;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
            flex-grow: 1;
        }

        .event-meta-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 0.85rem;
            color: #4b5563;
            line-height: 1.45;
        }

        .event-meta-item i {
            color: #ab0e00;
            margin-top: 3px;
            width: 16px;
            flex-shrink: 0;
            text-align: center;
            font-size: 0.9rem;
        }

        .event-meta-item span {
            font-weight: 700;
            color: #6b7280;
            margin-right: 2px;
        }

        /* Card CTA */
        .event-card-cta {
            margin-top: auto;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
            padding: 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 700;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.05);
            border: 1px solid rgba(171, 14, 0, 0.15);
            transition: all 0.25s ease;
        }

        .event-card:hover .event-card-cta {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.2);
        }

        /* Empty message */
        .empty-grid-msg {
            text-align: center;
            padding: 60px 0;
            color: #6b7280;
            font-weight: 500;
            width: 100%;
        }

        /* Swiper / Swish animation elements */
        .event-card {
            animation: cardFadeIn 0.5s ease backwards;
        }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ── Pagination ────────────────────── */
        .events-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 50px;
        }

        .pagination-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 44px;
            height: 44px;
            padding: 0 14px;
            border-radius: 12px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #4b5563;
            font-weight: 700;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.02);
            font-family: inherit;
        }

        .pagination-btn:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
        }

        .pagination-btn.active {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            border-color: #ab0e00;
            color: #ffffff;
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.25);
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            pointer-events: none;
        }

        /* ── Mobile Custom Dropdown Filters ──────────────── */
        .events-mobile-filters { display: none; }

        @media (max-width: 768px) {
            .events-filter-bar { display: none !important; }
            .events-mobile-filters {
                display: flex;
                gap: 12px;
                margin-bottom: 32px;
                position: relative;
                z-index: 30;
            }
            .emf-dropdown {
                flex: 1;
                position: relative;
            }
            .emf-trigger {
                width: 100%;
                display: flex;
                align-items: center;
                gap: 8px;
                padding: 11px 13px;
                background: #ffffff;
                border: 1.5px solid #e2e8f0;
                border-radius: 14px;
                font-family: inherit;
                font-size: 0.82rem;
                font-weight: 600;
                color: #374151;
                cursor: pointer;
                box-shadow: 0 2px 8px rgba(0,0,0,0.04);
                transition: all 0.25s ease;
                text-align: left;
                min-height: 46px;
            }
            .emf-trigger.open {
                border-color: rgba(171,14,0,0.5);
                box-shadow: 0 0 0 3px rgba(171,14,0,0.1), 0 4px 12px rgba(0,0,0,0.06);
            }
            .emf-trigger-icon {
                color: #ab0e00;
                font-size: 0.8rem;
                flex-shrink: 0;
                width: 16px;
                text-align: center;
            }
            .emf-trigger-label {
                flex: 1;
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: nowrap;
                font-size: 0.82rem;
                line-height: 1.2;
            }
            .emf-trigger-label small {
                display: block;
                font-size: 0.68rem;
                font-weight: 500;
                color: #9ca3af;
                margin-bottom: 1px;
            }
            .emf-trigger-arrow {
                color: #9ca3af;
                font-size: 0.7rem;
                transition: transform 0.25s ease;
                flex-shrink: 0;
            }
            .emf-trigger.open .emf-trigger-arrow {
                transform: rotate(180deg);
                color: #ab0e00;
            }
            .emf-panel {
                position: absolute;
                top: calc(100% + 6px);
                left: 0;
                min-width: 100%;
                background: #ffffff;
                border: 1.5px solid #e9eef5;
                border-radius: 16px;
                box-shadow: 0 16px 48px rgba(15,23,42,0.16), 0 4px 16px rgba(0,0,0,0.06);
                overflow: hidden;
                opacity: 0;
                transform: translateY(-8px) scale(0.97);
                pointer-events: none;
                transition: opacity 0.22s ease, transform 0.22s cubic-bezier(0.175,0.885,0.32,1.275);
                z-index: 100;
            }
            .emf-panel.open {
                opacity: 1;
                transform: translateY(0) scale(1);
                pointer-events: auto;
            }
            .emf-option {
                display: flex;
                align-items: center;
                gap: 10px;
                padding: 13px 16px;
                font-size: 0.86rem;
                font-weight: 600;
                color: #374151;
                cursor: pointer;
                transition: all 0.18s ease;
                border-bottom: 1px solid #f8fafc;
                position: relative;
            }
            .emf-option:last-child { border-bottom: none; }
            .emf-option i {
                color: #9ca3af;
                font-size: 0.82rem;
                width: 16px;
                text-align: center;
                flex-shrink: 0;
                transition: color 0.18s ease;
            }
            .emf-option:hover {
                background: rgba(171,14,0,0.04);
                color: #ab0e00;
            }
            .emf-option:hover i { color: #ab0e00; }
            .emf-option.active {
                background: linear-gradient(135deg,rgba(140,16,0,0.07) 0%,rgba(171,14,0,0.04) 100%);
                color: #ab0e00;
            }
            .emf-option.active i { color: #ab0e00; }
            .emf-option.active::after {
                content: '';
                position: absolute;
                right: 14px;
                width: 8px;
                height: 8px;
                background: #ab0e00;
                border-radius: 50%;
                box-shadow: 0 0 6px rgba(171,14,0,0.4);
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Area -->
    <section class="events-hero" id="events-hero-top">
        <div class="events-hero-bg" id="events-parallax-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/10/en2810.webp');"></div>
        <div class="events-hero-overlay"></div>
        <div class="container">
            <div class="events-hero-badge">
                <i class="fa-solid fa-calendar-days"></i>
                IDEAS Events
            </div>
            <h1>Dòng <span>Sự Kiện</span></h1>
            <p>Khám phá các hoạt động thực tế nổi bật gần đây, lễ tốt nghiệp danh giá, các buổi hội thảo khoa học và các
                chuyến đi kiến tập thực tế.</p>
        </div>
    </section>

    <!-- Main Section -->
    <main class="events-section">
        <!-- Filter Tabs Bar (desktop) -->
        <div class="events-filter-bar">
            <button class="filter-btn active" data-filter="TẤT CẢ">TẤT CẢ</button>
            <button class="filter-btn" data-filter="Workshop">Workshop</button>
            <button class="filter-btn" data-filter="Lễ tốt nghiệp">Lễ tốt nghiệp</button>
            <button class="filter-btn" data-filter="Chuyến đi">Chuyến đi</button>
            <button class="filter-btn" data-filter="Khác">Khác</button>
        </div>

        <!-- Mobile Dropdown Filters -->
        <div class="events-mobile-filters" id="events-mobile-filters">
            <!-- Category Dropdown -->
            <div class="emf-dropdown" id="emf-cat-wrap">
                <button class="emf-trigger" id="emf-cat-trigger" aria-haspopup="listbox" aria-expanded="false">
                    <span class="emf-trigger-icon"><i class="fa-solid fa-tag"></i></span>
                    <span class="emf-trigger-label">
                        <small>Loại sự kiện</small>
                        <span id="emf-cat-label">Tất cả</span>
                    </span>
                    <span class="emf-trigger-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>
                <div class="emf-panel" id="emf-cat-panel" role="listbox">
                    <div class="emf-option active" data-value="TẤT CẢ" role="option"><i class="fa-solid fa-layer-group"></i>Tất cả</div>
                    <div class="emf-option" data-value="Workshop" role="option"><i class="fa-solid fa-chalkboard-user"></i>Workshop</div>
                    <div class="emf-option" data-value="Lễ tốt nghiệp" role="option"><i class="fa-solid fa-graduation-cap"></i>Lễ tốt nghiệp</div>
                    <div class="emf-option" data-value="Chuyến đi" role="option"><i class="fa-solid fa-plane"></i>Chuyến đi</div>
                    <div class="emf-option" data-value="Khác" role="option"><i class="fa-solid fa-ellipsis"></i>Khác</div>
                </div>
            </div>
            <!-- Year Dropdown -->
            <div class="emf-dropdown" id="emf-year-wrap">
                <button class="emf-trigger" id="emf-year-trigger" aria-haspopup="listbox" aria-expanded="false">
                    <span class="emf-trigger-icon"><i class="fa-solid fa-calendar"></i></span>
                    <span class="emf-trigger-label">
                        <small>Năm</small>
                        <span id="emf-year-label">Tất cả</span>
                    </span>
                    <span class="emf-trigger-arrow"><i class="fa-solid fa-chevron-down"></i></span>
                </button>
                <div class="emf-panel" id="emf-year-panel" role="listbox">
                    <!-- Populated by JS -->
                </div>
            </div>
        </div>

        <!-- Cards Grid -->
        <div class="events-grid" id="events-grid-container">
            <!-- Rendered dynamically -->
        </div>

        <!-- Pagination -->
        <div class="events-pagination" id="events-pagination-container">
            <!-- Rendered dynamically -->
        </div>
    </main>

    <!-- EVENTS Data and Dynamic JS -->
    <script>
        const EVENTS = [
            {
                type: "IDEAS x GrowthVerse 2026",
                place: "SIHUB - Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp",
                for: "Swiss UMEF",
                name: "IDEAS",
                data: "21/04/2026",
                link: "https://www.facebook.com/share/p/18FBbmmySq/",
            },
            {
                type: "Webinar",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/04/event.webp",
                for: "Swiss UMEF",
                name: "MSc AI",
                data: "18/04/2026",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0LTM9ykp3UAi6J5M2fZJWaUYFoEYNprYNersCeBaf3mLuP3zVtDeSAMhMCtj954DZl",
            },
            {
                type: "Lễ tốt nghiệp",
                place: "Tp. Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2026/01/ltn27122025.webp",
                for: "Swiss UMEF",
                name: "MBA/EMBA",
                data: "27/12/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid034nzCDGcFVfz54M62b4Yod9iJ3mMx2eVNMXB33PpDeDSw6Xw1cZsH4oucpX2TogDcl?locale=vi_VN",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "MBA/EMBA/MSc AI",
                for: "Swiss UMEF",
                place: "Geneva - Thụy Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/ltnumef10202501.webp",
                data: "29/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "Chuyến đi Châu Âu",
                name: "Swiss UMEF",
                for: "Chuyến đi kết hợp với Lễ tốt nghiệp",
                place: "Pháp - Ý - Thụy Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/11/z7168028016898_a6b3673704a0f8fead78c7cde0d0c719.webp",
                data: "25/10/2025",
                link: "http://ideas.edu.vn/chuyen-di-thang-10-2025",
            },
            {
                type: "VDCA Conference 2025",
                name: "MBA/EMBA/MSc/Top-up BBA",
                for: "Kết nối giá trị & lan tỏa tri thức",
                place: "VDCA Conference",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/10/en2810.webp",
                data: "28/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02SX1tkwi6jWnjGh8FD1AJE2fy6YQxj29sD4s7V4U5xuqv8VWeqfKE5H5bygm85jCPl",
            },
            {
                type: "Orientation",
                name: "MSc AI",
                for: "Swiss UMEF",
                place: "Online - ZOOM",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/10/ort-msc-t10.webp",
                data: "02/10/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid065RLK6SL5N2pYzL2WwwREMW24HSM9etC6BETHMJrYUvrgWLsWL6t5y4x8gXLBi4sl",
            },
            {
                type: "Workshop - Coffee Talk",
                name: " AI in Learning - From Local to Global",
                for: "Everyone",
                place: "LYNK.THE VIBES - TP. HCM",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/wsoff16_8.jpg",
                data: "16/08/2025",
                link: "https://ideas.edu.vn/workshop-ai-in-learning-from-local-to-global",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Eden Star Hotel- Hồ Chí Minh",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/ltn72025.webp",
                data: "26/07/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02D6QV6Lwqbk6PWN3ToipRQJ3jV9AkFV9FcnAqQwsdf9wVBdNkHr5bHWaKPJtGojf2l?locale=vi_VN",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Global MBA - DBA",
                for: "Ascencia Business School",
                place: "Paris - Pháp",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/08/quangnon_cdp.webp",
                data: "02/07/2025",
                link: "https://www.linkedin.com/posts/college-de-paris-internationall_graduationceremony-collegedeparis-internationalstudents-activity-7351534584573902848-Aohn?utm_source=social_share_send&utm_medium=member_desktop_web&rcm=ACoAAE2CO4QB8War1r8xRIr7DEuSqFi_aID5Gv8",
            },
            {
                type: "Chuyến đi Pháp - Thuỵ Sĩ",
                name: "Ascencia Business School",
                for: "Chuyến đi kết hợp với Lễ tốt nghiệp",
                place: "Pháp - Thuỵ Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/07/cdpts_2.webp",
                data: "30/06/2025",
                link: "https://ideas.edu.vn/chuyen-di-phap-thuy-si",
            },
            {
                type: "Workshop",
                name: "VIBE CODING - Tự tạo ứng dụng bằng AI",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/06/WORSHOP-29-6-SIZE-16_9.png",
                data: "29/06/2025",
                link: "https://www.youtube.com/watch?v=CXCDUKsU-0I",
            },
            {
                type: "Workshop",
                name: "Giải mã AI - Những phương thức sáng tạo chưa từng được tiết lộ",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/IDEAS-TALK-25-5-1.png.webp",
                data: "25/05/2025",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid04xb45shGBrNbYxHQwLdS6dmbpNmrQ7JGEabd7RoKghsJojm6UP7QegFETux1XsWol",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Swiss UMEF",
                for: "UMEF trao bằng cho học viên Việt Nam",
                place: "Geneva - Thuỵ Sĩ",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/ltnumef52025-1.jpg",
                data: "06/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Chuyến đi Thuỵ Sĩ",
                name: "Swiss UMEF",
                for: "Chuyến đi kết hợp với Lễ trao bằng",
                place: "Swiss UMEF - Geneva",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/05/umef-tour52025-8.jpg.webp",
                data: "04/05/2025",
                link: "https://ideas.edu.vn/chuyen-di-thuy-si",
            },
            {
                type: "Workshop",
                name: "Bảo mật dữ liệu trong thời đại AI: Thách thức và giải pháp",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/04/ws-16-9.png",
                data: "20/04/2025",
                link: "https://ideas.edu.vn/bao-mat-du-lieu-trong-thoi-dai-ai-thach-thuc-va-giai-phap",
            },
            {
                type: "Workshop",
                name: "Ứng dụng AI chăm sóc khách hàng đa kênh",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshop233.jpg",
                data: "23/03/2025",
                link: "https://www.youtube.com/watch?v=mB0mDrgjVNs",
            },
            {
                type: "Workshop",
                name: "Sự Kết Hợp AI & Semiconductor",
                for: "IDEAS Talk",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/sukethopai.jpg",
                data: "09/03/2025",
                link: "https://www.youtube.com/watch?v=5cogIW22nFI",
            },
            {
                type: "Lễ ký kết",
                name: "Lễ ký kết giữa Estiam - IDEAS - TSSAC",
                for: "BBA & MBA",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/ShareImage-1.jpg",
                data: "26/02/2025",
                link: "https://www.facebook.com/photo?fbid=1107390047854216&set=a.547436477182912",
            },
            {
                type: "Orientation",
                name: "Orientation",
                for: "MSc AI",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.png",
                data: "16/02/2025",
                link: "https://www.facebook.com/ideas.edu.vn/videos/547173147650906",
            },
            {
                type: "Thesis Defense",
                name: "Buổi bảo vệ luận văn",
                for: "DBA - Ascencia",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/IMG_8514.jpg",
                data: "24/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid035TAEqoZxxAPFMqeCf9FhwGb7a2Mt1pS38GHvsrFCNjMhLd5hGneXDavxSGBKHosil",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/11/8X1A9328-1-1.jpg",
                data: "23/11/2024",
                link: "https://www.youtube.com/watch?si=gR-YOgFi2KQJftr9&v=hmVxOq5jkeM&feature=youtu.be",
            },
            {
                type: "Instruction",
                name: "Buổi hướng dẫn hệ thống học tập UMEF",
                for: "IDEAS - Swiss UMEF",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/buoihuongdan.jpg",
                data: "11/11/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02N7ZWkS7oXbCyta7gBob3mrtUUyftQWY9DiHxi7r3iXG9TuAQda8P41s1gx3ZbVx8l",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Swiss UMEF",
                for: "MBA/EMBA",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/Totnghiepumef.jpg",
                data: "26/10/2024",
                link: "https://www.youtube.com/watch?si=eJDfqKWc4HxT_TmS&v=fBf5YcaMxDY&feature=youtu.be",
            },
            {
                type: "Workshop - Offline",
                name: "Ứng dụng AI vào học tập, nghiên cứu và công việc",
                for: "IDEAS - Talk",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/workshopAI.jpg",
                data: "26/10/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0v1oLG26bZKVR3551ikuTwrd2552LgxQqBv9YTtKRgakRe2nZf1WyKjfXi554s1gMl",
            },
            {
                type: "Orientation",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/10/461779815_852230670439635_3180438795963466960_n.jpg",
                data: "29/09/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid0Wm4A4Jm42rgMAajQ31TSbp3jgyap1NrZEgJ8rWZh3yNciRePaUUr9Ay3dkGNbjrul",
            },
            {
                type: "Thesis Defense",
                name: "Ascencia Business School",
                for: "Global MBA",
                place: "Online Zoom",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2025/03/baoveluanvanglobalmba.jpg",
                data: "08/09/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid0PFdnFWGiTkKYKNgBEzVgv2M5RZqKRVyc9pZm1gKMoTbBgQGF7BJHQzsaMtD9df4kl",
            },
            {
                type: "Khởi động dự án",
                name: "Ứng dụng AI vào vận hành",
                for: "Viện IDEAS",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/08/Untitled-design.jpg",
                data: "16/08/2024",
                link: "https://ideas.edu.vn/tin-tuc-moi/vien-ideas-khoi-dong-du-an-ung-dung-ai-vao-van-hanh.html",
            },
            {
                type: "Workshop - Seminar",
                name: "MBA Quốc tế Mô thức 5.0",
                for: "IDEAS Talk",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/03/Hoi-thao-MBA-50-5.jpg",
                data: "24/03/2024",
                link: "https://ideas.edu.vn/su-kien-moi/hoi-thao-mba-quoc-te-mo-thuc-5-0-do-vien-ideas-to-chuc-da-dien-ra-thanh-cong-va-khep-lai-day-cam-xuc.html",
            },
            {
                type: "Lễ tốt nghiệp",
                name: "Ascencia Business School",
                for: "Global MBA/DBA",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/416256674_837845658141991_5379123310787471174_n.jpg",
                data: "06/01/2024",
                link: "https://www.facebook.com/ideas.edu.vn/posts/pfbid02uRUWP7AE5ithsMRnvDcKhgLRUS5JTJzWofcoFQsnXPQPTtG9WogjihFvAPHLrNNKl",
            },
            {
                type: "Thesis Defense",
                name: "Bảo vệ luận văn Tiến sĩ",
                for: "DBA - Ascencia",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2024/01/400944403_660729459589758_4740588263672831012_n.jpg",
                data: "20/11/2024",
                link: "https://www.facebook.com/globalmba.collegedeparis/posts/pfbid02f2zzNXEJQts7XZ7kMMmAVw84Le2JgMKQGJg2NP7V2LvKG6QWpyBdFGYu2LSvq1tQl",
            },
            {
                type: "Workshop",
                name: "Buổi giao lưu với Swiss UMEF",
                for: "MBA/EMBA",
                place: "Viện IDEAS",
                avatar: "https://ideas.edu.vn/wp-content/uploads/2023/07/umefws.webp",
                data: "18/06/2023",
                link: "https://www.facebook.com/embatructuyen/posts/pfbid0fzGmQrABPKxsS11VSwPqdL2jWkv9HvfSPsNo95foRDyPMHUDNt476R5UxdUzVdaxl",
            },
        ];

        const gridContainer = document.getElementById("events-grid-container");
        const paginationContainer = document.getElementById("events-pagination-container");
        const filterButtons = document.querySelectorAll(".events-filter-bar .filter-btn");

        const ITEMS_PER_PAGE = 15;
        let currentFilteredEvents = [...EVENTS];
        let currentPage = 1;
        let currentCategoryFilter = 'TẤT CẢ';
        let currentYearFilter = 'ALL';

        // Combined filter function
        const applyFilters = () => {
            let filtered = [...EVENTS];
            // Category
            if (currentCategoryFilter === 'Khác') {
                filtered = filtered.filter(e =>
                    !e.type.includes('Workshop') &&
                    !e.type.includes('Lễ tốt nghiệp') &&
                    !e.type.includes('Chuyến đi')
                );
            } else if (currentCategoryFilter !== 'TẤT CẢ') {
                filtered = filtered.filter(e => e.type.includes(currentCategoryFilter));
            }
            // Year
            if (currentYearFilter !== 'ALL') {
                filtered = filtered.filter(e => {
                    const parts = e.data.split('/');
                    return parts.length === 3 && parts[2] === currentYearFilter;
                });
            }
            currentFilteredEvents = filtered;
            currentPage = 1;
            displayEventsPage();
        };

        // Render page list & pagination buttons
        const displayEventsPage = () => {
            const list = currentFilteredEvents;
            if (list.length === 0) {
                gridContainer.innerHTML = `<p class="empty-grid-msg">Không tìm thấy sự kiện nào trong danh mục này.</p>`;
                paginationContainer.innerHTML = "";
                return;
            }

            const totalPages = Math.ceil(list.length / ITEMS_PER_PAGE);
            if (currentPage > totalPages) currentPage = totalPages;
            if (currentPage < 1) currentPage = 1;

            const startIndex = (currentPage - 1) * ITEMS_PER_PAGE;
            const endIndex = startIndex + ITEMS_PER_PAGE;
            const pageItems = list.slice(startIndex, endIndex);

            // Render cards
            gridContainer.innerHTML = pageItems.map((event, idx) => {
                let categoryTag = "Sự kiện";
                if (event.type.includes("Workshop")) {
                    categoryTag = "Workshop";
                } else if (event.type.includes("Lễ tốt nghiệp")) {
                    categoryTag = "Tốt nghiệp";
                } else if (event.type.includes("Chuyến đi")) {
                    categoryTag = "Chuyến đi";
                }

                const displayTitle = event.type.length > 70 ? event.type.substring(0, 67) + "..." : event.type;

                return `
                    <a href="${event.link}" target="_blank" class="event-card" style="animation-delay: ${idx * 40}ms">
                        <div class="event-card-img-wrap">
                            <span class="event-card-tag">${categoryTag}</span>
                            <img decoding="async" src="${event.avatar}" alt="${event.type}" loading="lazy" />
                        </div>
                        <div class="event-card-body">
                            <div class="event-card-date">
                                <i class="fa-regular fa-calendar-days"></i>
                                <span>${event.data}</span>
                            </div>
                            <h3 class="event-card-title">${displayTitle}</h3>
                            <div class="event-meta-list">
                                <div class="event-meta-item">
                                    <i class="fa-solid fa-graduation-cap"></i>
                                    <span>Chương trình:</span> ${event.name}
                                </div>
                                <div class="event-meta-item">
                                    <i class="fa-solid fa-circle-nodes"></i>
                                    <span>Đối tác:</span> ${event.for}
                                </div>
                                <div class="event-meta-item">
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span>Địa điểm:</span> ${event.place}
                                </div>
                            </div>
                            <div class="event-card-cta">
                                Xem chi tiết <i class="fa-solid fa-arrow-up-right-from-square"></i>
                            </div>
                        </div>
                    </a>
                `;
            }).join("");

            // Render pagination buttons
            if (totalPages <= 1) {
                paginationContainer.innerHTML = "";
                return;
            }

            let paginationHTML = "";
            
            // Prev button
            paginationHTML += `
                <button class="pagination-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
            `;

            // Number buttons
            for (let i = 1; i <= totalPages; i++) {
                paginationHTML += `
                    <button class="pagination-btn ${currentPage === i ? 'active' : ''}" onclick="goToPage(${i})">
                        ${i}
                    </button>
                `;
            }

            // Next button
            paginationHTML += `
                <button class="pagination-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>
            `;

            paginationContainer.innerHTML = paginationHTML;

            // Initialize mobile slider dots
            initMobileSliderDots();
        };

        function initMobileSliderDots() {
            let dotsContainer = document.getElementById('events-slider-dots');
            if (!dotsContainer) {
                dotsContainer = document.createElement('div');
                dotsContainer.id = 'events-slider-dots';
                dotsContainer.className = 'slider-dots';
                gridContainer.parentNode.insertBefore(dotsContainer, gridContainer.nextSibling);
            }
            dotsContainer.innerHTML = '';
            
            const cards = gridContainer.querySelectorAll('.event-card');
            if (cards.length === 0) return;
            
            cards.forEach((_, idx) => {
                const dot = document.createElement('span');
                dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                dotsContainer.appendChild(dot);
            });
            
            gridContainer.removeEventListener('scroll', handleGridScroll);
            gridContainer.addEventListener('scroll', handleGridScroll);
            
            // Reset scroll position on filter/page switch
            gridContainer.scrollLeft = 0;
        }

        function handleGridScroll() {
            const dotsContainer = document.getElementById('events-slider-dots');
            if (!dotsContainer) return;
            const scrollLeft = gridContainer.scrollLeft;
            const firstCard = gridContainer.querySelector('.event-card');
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

        // Go to page
        window.goToPage = (page) => {
            currentPage = page;
            displayEventsPage();
            
            // Scroll smoothly to start of filter bar
            const targetSection = document.querySelector('.events-filter-bar');
            if (targetSection) {
                window.scrollTo({
                    top: targetSection.offsetTop - 120,
                    behavior: 'smooth'
                });
            }
        };

        // Desktop button filter
        filterButtons.forEach(btn => {
            btn.addEventListener("click", function () {
                filterButtons.forEach(b => b.classList.remove("active"));
                this.classList.add("active");
                currentCategoryFilter = this.getAttribute("data-filter");
                applyFilters();
            });
        });

        // ── Mobile Dropdown Logic ─────────────────────────
        function setupEmfDropdown(triggerId, panelId, onSelect) {
            const trigger = document.getElementById(triggerId);
            const panel = document.getElementById(panelId);
            if (!trigger || !panel) return;

            trigger.addEventListener('click', (e) => {
                e.stopPropagation();
                const isOpen = panel.classList.contains('open');
                // Close all dropdowns
                document.querySelectorAll('.emf-panel').forEach(p => p.classList.remove('open'));
                document.querySelectorAll('.emf-trigger').forEach(t => {
                    t.classList.remove('open');
                    t.setAttribute('aria-expanded', 'false');
                });
                if (!isOpen) {
                    panel.classList.add('open');
                    trigger.classList.add('open');
                    trigger.setAttribute('aria-expanded', 'true');
                }
            });

            panel.querySelectorAll('.emf-option').forEach(opt => {
                opt.addEventListener('click', () => {
                    panel.querySelectorAll('.emf-option').forEach(o => o.classList.remove('active'));
                    opt.classList.add('active');
                    panel.classList.remove('open');
                    trigger.classList.remove('open');
                    trigger.setAttribute('aria-expanded', 'false');
                    onSelect(opt.dataset.value, opt.textContent.trim());
                });
            });
        }

        // Close dropdowns on outside click
        document.addEventListener('click', () => {
            document.querySelectorAll('.emf-panel').forEach(p => p.classList.remove('open'));
            document.querySelectorAll('.emf-trigger').forEach(t => {
                t.classList.remove('open');
                t.setAttribute('aria-expanded', 'false');
            });
        });

        // Initialize display
        document.addEventListener("DOMContentLoaded", () => {
            displayEventsPage();

            // Populate year dropdown from EVENTS data
            const years = [...new Set(EVENTS.map(e => {
                const parts = e.data.split('/');
                return parts.length === 3 ? parts[2] : null;
            }).filter(Boolean))].sort((a, b) => Number(b) - Number(a));

            const yearPanel = document.getElementById('emf-year-panel');
            if (yearPanel) {
                const allOpt = document.createElement('div');
                allOpt.className = 'emf-option active';
                allOpt.dataset.value = 'ALL';
                allOpt.setAttribute('role', 'option');
                allOpt.innerHTML = '<i class="fa-solid fa-infinity"></i>Tất cả';
                yearPanel.appendChild(allOpt);
                years.forEach(yr => {
                    const opt = document.createElement('div');
                    opt.className = 'emf-option';
                    opt.dataset.value = yr;
                    opt.setAttribute('role', 'option');
                    opt.innerHTML = `<i class="fa-solid fa-calendar-days"></i>${yr}`;
                    yearPanel.appendChild(opt);
                });
            }

            // Wire up mobile dropdowns
            setupEmfDropdown('emf-cat-trigger', 'emf-cat-panel', (value, label) => {
                document.getElementById('emf-cat-label').textContent = label;
                currentCategoryFilter = value;
                // Sync desktop buttons
                filterButtons.forEach(b => {
                    b.classList.toggle('active', b.getAttribute('data-filter') === value);
                });
                applyFilters();
            });

            setupEmfDropdown('emf-year-trigger', 'emf-year-panel', (value, label) => {
                document.getElementById('emf-year-label').textContent = label;
                currentYearFilter = value;
                applyFilters();
            });

            // Check URL hash for direct category selection
            if (window.location.hash === "#chuyen-di") {
                const targetBtn = Array.from(filterButtons).find(btn => btn.getAttribute("data-filter") === "Chuyến đi");
                if (targetBtn) targetBtn.click();
            }
        });
    </script>

    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('events-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('events-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            heroBg.style.transform = 'translate3d(0, ' + (scrollY * 0.35) + 'px, 0) scale(1.15)';
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>

    

    <!-- Script imports -->
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