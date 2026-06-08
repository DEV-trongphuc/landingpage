<?php
/**
 * The template for displaying the LMS Learning Support page
 * Template Name: Premium LMS Template
 */
global $wp;

// Block unwanted old theme styles
ob_start(function ($html) {
    $html = preg_replace(
        '/<link[^>]+href=[\'"][^\'"]*LANDINGPAGE_MBA\/main\.css[^\'"]*[\'"][^>]*\/?>/i',
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
    <title>Hệ thống LMS &amp; Hệ sinh thái học tập toàn diện | Viện IDEAS</title>
    <meta name="description" content="Hệ thống hỗ trợ học tập LMS Moodle, IDEAS AI, và thư viện học thuật Cengage. Hỗ trợ học vụ chuyên nghiệp trọn vẹn dành cho học viên của Viện IDEAS." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Hệ thống LMS &amp; Hệ sinh thái học tập toàn diện | Viện IDEAS" />
    <meta property="og:description" content="Trải nghiệm học tập hiện đại 4.0 với hệ thống Moodle LMS, trợ lý AI thông minh và thư viện học tập toàn diện 24/7." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Main stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    
    <!-- Booking Modal stylesheet -->
    <?php
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <style>
        /* ══════════════════════════════════════
           LMS SYSTEM PAGE – PREMIUM THEME STYLES
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #0b0f19;
            color: #e2e8f0;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(185, 14, 0, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(185, 14, 0, 0.05) 0%, transparent 45%),
                radial-gradient(rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* Hero Header */
        .lms-hero {
            position: relative;
            padding: 200px 20px 100px;
            text-align: center;
            overflow: hidden;
            background: #07090e;
            min-height: 55vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .lms-hero-bg {
            position: absolute;
            inset: 0;
            z-index: 1;
            background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');
            background-size: cover;
            background-position: center;
            opacity: 0.12;
            will-change: transform;
            transform: scale(1.1);
        }

        .lms-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background: 
                linear-gradient(180deg, rgba(7, 9, 14, 0.8) 0%, rgba(7, 9, 14, 0.95) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 60%);
        }

        .lms-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
        }

        .lms-hero-badge {
            background: rgba(171, 14, 0, 0.18);
            border: 1px solid rgba(255, 77, 77, 0.3);
            padding: 8px 20px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .lms-hero h1 {
            font-size: clamp(2.6rem, 6vw, 4.2rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.4);
        }

        .lms-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .lms-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 750px;
            margin: 0 auto 36px;
            line-height: 1.65;
            font-weight: 500;
        }

        /* Stats indicators on Hero */
        .lms-hero-stats {
            display: flex;
            justify-content: center;
            gap: 24px;
            flex-wrap: wrap;
            margin-top: 30px;
        }

        .lms-stat-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 15px 25px;
            border-radius: 16px;
            backdrop-filter: blur(10px);
            min-width: 160px;
            text-align: center;
        }

        .lms-stat-num {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ff3b30;
            display: block;
            margin-bottom: 5px;
            background: linear-gradient(135deg, #ff6b6b, #ff3b30);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .lms-stat-lbl {
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
        }

        /* Ecosystem Section Styling */
        .ecosystem-section {
            padding: 100px 20px;
            background: #080a0f;
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
        }

        .eco-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(120px);
            z-index: 1;
            pointer-events: none;
            opacity: 0.25;
        }

        .eco-orb-1 {
            top: 10%;
            left: -10%;
            width: 400px;
            height: 400px;
            background: #ab0e00;
        }

        .eco-orb-2 {
            bottom: 15%;
            right: -10%;
            width: 450px;
            height: 450px;
            background: #ab0e00;
        }

        .eco-orb-3 {
            bottom: -5%;
            left: 20%;
            width: 350px;
            height: 350px;
            background: #4f46e5;
            opacity: 0.15;
        }

        .eco-inner {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            position: relative;
            z-index: 2;
        }

        .eco-header {
            text-align: center;
            max-width: 800px;
            margin: 0 auto 60px;
        }

        .eco-label-light {
            font-size: 0.8rem;
            font-weight: 800;
            color: #ef4444;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: inline-block;
        }

        .ecosystem-title {
            font-size: clamp(2.2rem, 5vw, 3.2rem);
            font-weight: 800;
            line-height: 1.25;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .eco-title-accent {
            background: linear-gradient(135deg, #ff6b6b, #ff3b30);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .ecosystem-sub {
            font-size: 1.05rem;
            color: #94a3b8;
            line-height: 1.6;
        }

        .ecosystem-grid-v2 {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 24px;
            margin-top: 40px;
        }

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
            background: #475569;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .slider-dot.active {
            background: #ff4d4d;
            width: 24px;
            border-radius: 4px;
        }

        /* ── Contrast Overrides for Dark Backgrounds ── */
        body .platform-text h3 {
            color: #ffffff !important;
        }
        body .platform-text p {
            color: #e2e8f0 !important; /* light gray for high contrast */
        }
        body .platform-features-list li {
            color: #f1f5f9 !important; /* light gray for high contrast */
        }
        body .platform-features-list li i {
            color: #ef4444 !important;
        }
        body .eco-card-v2-desc {
            color: #94a3b8 !important;
        }
        body .eco-card-v2-title {
            color: #ffffff !important;
        }
        body .lms-hero p {
            color: rgba(255, 255, 255, 0.9) !important;
        }

        @media (max-width: 768px) {
            .lms-hero {
                padding: 120px 20px 50px !important;
            }
            .ecosystem-section,
            .platform-details-section,
            .lms-form-section {
                padding: 60px 20px !important;
            }
            .platform-detail-row {
                margin-bottom: 60px !important;
                gap: 30px !important;
            }
            .platform-text h3 {
                font-size: 1.8rem !important;
            }
            .platform-visual {
                border-radius: 16px !important;
            }
            .ecosystem-grid-v2 {
                display: flex;
                flex-wrap: nowrap;
                overflow-x: auto;
                justify-content: flex-start;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;
                padding-bottom: 15px;
                gap: 16px;
                scrollbar-width: none !important; /* Firefox */
                margin-left: -20px !important;
                margin-right: -20px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
            }
            .ecosystem-grid-v2::-webkit-scrollbar {
                display: none !important; /* Chrome/Safari */
            }
            .eco-card-v2 {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
                padding: 24px 20px;
            }
            .slider-dots {
                display: flex;
            }
            /* Stats row in 1 single horizontal row on mobile */
            .lms-hero-stats {
                flex-wrap: nowrap !important;
                gap: 8px !important;
                margin-top: 24px !important;
                width: 100% !important;
                padding: 0 !important;
            }
            .lms-stat-card {
                min-width: 0 !important;
                flex: 1 1 33.33% !important;
                padding: 12px 6px !important;
                border-radius: 12px !important;
            }
            .lms-stat-num {
                font-size: 1.3rem !important;
            }
            .lms-stat-lbl {
                font-size: 0.65rem !important;
                line-height: 1.25 !important;
            }
        }

        .eco-card-v2 {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 30px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .eco-card-v2:hover {
            transform: translateY(-8px);
            background: rgba(255, 255, 255, 0.04);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .eco-card-v2-icon--logo {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.95);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
        }

        .eco-card-v2:hover .eco-card-v2-icon--logo {
            transform: scale(1.05) rotate(2deg);
        }

        .eco-card-v2-body {
            display: flex;
            flex-direction: column;
            gap: 12px;
        }

        .eco-card-v2-num {
            font-size: 0.9rem;
            font-weight: 800;
            color: #ab0e00;
            opacity: 0.8;
            letter-spacing: 0.05em;
        }

        .eco-card-v2-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #ffffff;
            line-height: 1.3;
        }

        .eco-card-v2-desc {
            font-size: 0.95rem;
            color: #94a3b8;
            line-height: 1.55;
        }

        /* Detail/Feature comparison layout for platforms */
        .platform-details-section {
            padding: 100px 20px;
            background: #0b0f19;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .platform-detail-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
            margin-bottom: 100px;
            max-width: 1200px;
            margin-left: auto;
            margin-right: auto;
        }

        .platform-detail-row:last-child {
            margin-bottom: 0;
        }

        .platform-detail-row.reverse {
            direction: rtl;
        }

        .platform-detail-row.reverse .platform-text {
            direction: ltr;
        }

        .platform-text {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .platform-text-badge {
            color: #ef4444;
            font-weight: 700;
            text-transform: uppercase;
            font-size: 0.82rem;
            letter-spacing: 1.5px;
            margin-bottom: 12px;
        }

        .platform-text h3 {
            font-size: 2.2rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 20px;
            line-height: 1.2;
        }

        .platform-text p {
            color: #94a3b8;
            line-height: 1.65;
            margin-bottom: 24px;
            font-size: 1rem;
        }

        .platform-features-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .platform-features-list li {
            display: flex;
            align-items: flex-start;
            gap: 12px;
            color: #cbd5e1;
            font-weight: 500;
            font-size: 0.95rem;
        }

        .platform-features-list li i {
            color: #ef4444;
            margin-top: 3px;
        }

        .platform-visual {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border: 1px solid rgba(255, 255, 255, 0.08);
            aspect-ratio: 16 / 10;
        }

        .platform-visual img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Lead Gen Form Section */
        .lms-form-section {
            padding: 80px 20px;
            background: linear-gradient(180deg, #0b0f19 0%, #07090e 100%);
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .lms-form-wrapper {
            max-width: 600px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        .lms-form-wrapper h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
        }

        .lms-form-wrapper p {
            color: #94a3b8;
            margin-bottom: 30px;
            font-size: 0.95rem;
        }

        @media (max-width: 992px) {
            .platform-detail-row,
            .platform-detail-row.reverse {
                grid-template-columns: 1fr;
                gap: 40px;
                direction: ltr;
            }
            .platform-detail-row.reverse .platform-text {
                direction: ltr;
            }
        }
        @media (max-width: 480px) {
            .lms-form-section {
                padding: 40px 16px;
            }
            .lms-form-wrapper {
                padding: 24px 16px;
                border-radius: 16px;
            }
            .lms-form-wrapper h3 {
                font-size: 1.35rem;
            }
            .lms-form-wrapper p {
                margin-bottom: 20px;
                font-size: 0.85rem;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Area -->
    <section class="lms-hero" id="lms-hero-top">
        <div class="lms-hero-bg" id="lms-parallax-bg"></div>
        <div class="lms-hero-overlay"></div>
        <div class="lms-hero-container">
            <div class="lms-hero-badge">
                <i class="fa-solid fa-laptop-code"></i>
                Công Nghệ Đào Tạo 4.0
            </div>
            <h1>Hệ thống LMS <br/> Cùng <span>hệ sinh thái học tập.</span></h1>
            <p>Đồng hành hỗ trợ học vụ chuyên nghiệp, giải pháp học tập số toàn diện giúp tối ưu hóa thời gian và nâng cao hiệu quả tiếp thu kiến thức cho học viên.</p>
            <button type="button" class="btn btn-primary" onclick="showform('lms-hero')">
                Trải nghiệm hệ thống ngay
                <svg width="18" height="18" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                </svg>
            </button>
            <div class="lms-hero-stats">
                <div class="lms-stat-card">
                    <span class="lms-stat-num">24/7</span>
                    <span class="lms-stat-lbl">Học Tập Chủ Động</span>
                </div>
                <div class="lms-stat-card">
                    <span class="lms-stat-num">1.000+</span>
                    <span class="lms-stat-lbl">Tài Liệu Cengage</span>
                </div>
                <div class="lms-stat-card">
                    <span class="lms-stat-num">100%</span>
                    <span class="lms-stat-lbl">Bổ Trợ Tiếng Việt</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Ecosystem Section (No Workshops/Advisors) -->
    <section class="ecosystem-section">
        <div class="eco-orb eco-orb-1" aria-hidden="true"></div>
        <div class="eco-orb eco-orb-2" aria-hidden="true"></div>
        <div class="eco-orb eco-orb-3" aria-hidden="true"></div>
        <div class="eco-inner">
            <div class="eco-header">
                <div class="eco-label-light">HỆ SINH THÁI HỌC TẬP</div>
                <h3 class="ecosystem-title">Hệ sinh thái học tập toàn diện<br /><span class="eco-title-accent">luôn đồng hành cùng bạn</span></h3>
                <p class="ecosystem-sub">IDEAS là đối tác tuyển sinh chính thức của Swiss UMEF, xây dựng hệ sinh thái học tập toàn diện cho người học Việt Nam.</p>
            </div>

            <div class="ecosystem-grid-v2">
                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo" style="--icon-clr:#ef4444;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/c/c6/Moodle-logo.svg/1280px-Moodle-logo.svg.png"
                            alt="Moodle logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <div class="eco-card-v2-num">01</div>
                        <h4 class="eco-card-v2-title">LMS Powered by Moodle</h4>
                        <p class="eco-card-v2-desc">Nền tảng học tập hiện đại, hỗ trợ video bài giảng, tài liệu và bài tập - truy cập 24/7 mọi lúc, mọi nơi.</p>
                    </div>
                </article>

                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo" style="--icon-clr:#a78bfa;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/02/Buffet-AI-R.webp"
                            alt="IDEAS AI Platform logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <div class="eco-card-v2-num">02</div>
                        <h4 class="eco-card-v2-title">IDEAS AI Platform</h4>
                        <p class="eco-card-v2-desc">Trợ lý AI hỗ trợ giải thích kiến thức, nghiên cứu tài liệu và tối ưu thời gian học tập hiệu quả.</p>
                    </div>
                </article>

                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo" style="--icon-clr:#34d399;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/89/Cengage-logo.svg/1280px-Cengage-logo.svg.png"
                            alt="Cengage logo" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <div class="eco-card-v2-num">03</div>
                        <h4 class="eco-card-v2-title">Thư viện Cengage</h4>
                        <p class="eco-card-v2-desc">Miễn phí truy cập hơn 1.000 đầu sách học thuật chuyên ngành kinh doanh và quản trị hàng đầu thế giới.</p>
                    </div>
                </article>

                <article class="eco-card-v2">
                    <div class="eco-card-v2-icon eco-card-v2-icon--logo" style="--icon-clr:#3b82f6;--icon-bg:rgba(255,255,255,0.95)">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/06/log_ideas.png"
                            alt="Chuyên đề" style="width:68px;height:auto;object-fit:contain;" loading="lazy" />
                    </div>
                    <div class="eco-card-v2-body">
                        <div class="eco-card-v2-num">04</div>
                        <h4 class="eco-card-v2-title">Lớp chuyên đề bổ trợ</h4>
                        <p class="eco-card-v2-desc">Các buổi chuyên đề cuối tuần cùng giảng viên và chuyên gia đầu ngành, kết nối kiến thức MBA với thực tiễn.</p>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Platform Details Section -->
    <section class="platform-details-section">
        <!-- Moodle LMS Detail -->
        <div class="platform-detail-row">
            <div class="platform-text">
                <span class="platform-text-badge">Nền tảng chính</span>
                <h3>LMS Powered by Moodle</h3>
                <p>Moodle là hệ thống quản lý học tập (LMS) phổ biến hàng đầu thế giới được sử dụng bởi các trường đại học danh tiếng. Tại IDEAS, hệ thống Moodle được cấu hình thông minh và trực quan hóa tối đa để đồng hành cùng học viên trong suốt chặng đường học tập:</p>
                <ul class="platform-features-list">
                    <li><i class="fa-solid fa-circle-check"></i> Xem video bài giảng ghi hình chất lượng cao mọi lúc mọi nơi.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Tải tài liệu học tập, giáo trình, slide bài giảng trực tiếp.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Nộp bài tập, theo dõi điểm số và nhận feedback trực tiếp từ giảng viên.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Diễn đàn trao đổi thảo luận giữa các học viên trong lớp học.</li>
                </ul>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/image-1-1.png" alt="LMS Moodle interface" loading="lazy" />
            </div>
        </div>

        <!-- AI Platform Detail -->
        <div class="platform-detail-row reverse">
            <div class="platform-text">
                <span class="platform-text-badge">Trợ lý học thuật 4.0</span>
                <h3>IDEAS AI Platform</h3>
                <p>Nền tảng hỗ trợ học vụ tích hợp mô hình ngôn ngữ lớn (LLM) thông minh được huấn luyện chuyên sâu cho môi trường học tập sau đại học, giúp học viên giải quyết nhanh chóng các khó khăn học thuật:</p>
                <ul class="platform-features-list">
                    <li><i class="fa-solid fa-circle-check"></i> Giải thích các thuật ngữ chuyên ngành kinh tế, tài chính bằng tiếng Việt.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Tóm tắt nội dung tài liệu tham khảo dài hàng trăm trang nhanh chóng.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Gợi ý hướng nghiên cứu và cấu trúc đề án luận văn tốt nghiệp.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Hoạt động 24/7 phản hồi tức thì giải tỏa áp lực tự học.</li>
                </ul>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/imgi_18_WS-8-edited.webp" alt="AI Platform interface" loading="lazy" />
            </div>
        </div>

        <!-- Cengage Detail -->
        <div class="platform-detail-row">
            <div class="platform-text">
                <span class="platform-text-badge">Thư viện số toàn cầu</span>
                <h3>Thư viện số Cengage</h3>
                <p>Cengage Learning là một trong những nhà xuất bản giáo dục lớn nhất thế giới. Học viên tại Viện IDEAS được cấp quyền truy cập miễn phí vào kho tàng tri thức số khổng lồ:</p>
                <ul class="platform-features-list">
                    <li><i class="fa-solid fa-circle-check"></i> Hơn 1.000+ đầu sách học thuật nguyên bản tiếng Anh chuyên ngành Kinh tế.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Các giáo trình cập nhật mới nhất phục vụ cho các môn học MBA/DBA.</li>
                    <li><i class="fa-solid fa-circle-check"></i> Đọc sách trực tuyến dễ dàng trên máy tính, máy tính bảng và điện thoại di động.</li>
                </ul>
            </div>
            <div class="platform-visual">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/maxresdefault.webp" alt="Cengage library access" loading="lazy" />
            </div>
        </div>
    </section>

    <!-- Consultation Registration Form -->
    <section class="lms-form-section">
        <div class="lms-form-wrapper">
            <h3>Đăng ký tìm hiểu &amp; Trải nghiệm hệ thống</h3>
            <p>Nhận tài khoản dùng thử hệ thống LMS Moodle và nhận tư vấn lộ trình học tập miễn phí từ chuyên viên học vụ Viện IDEAS.</p>
            <form class="cta-form" id="lms-register-form">
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="text" placeholder="Họ và tên của bạn" required style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="tel" placeholder="Số điện thoại" required style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <div class="form-group" style="margin-bottom: 20px; text-align: left;">
                    <input type="email" placeholder="Địa chỉ email" required style="width: 100%; padding: 14px 20px; border-radius: 12px; background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); color: #fff; font-size: 0.95rem;" />
                </div>
                <button type="submit" class="btn btn-primary btn-full" style="width: 100%; display: flex; justify-content: center; align-items: center; gap: 8px;">
                    Đăng ký tư vấn ngay
                    <i class="fa-solid fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </section>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('lms-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('lms-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            heroBg.style.transform = 'translate3d(0, ' + (scrollY * 0.3) + 'px, 0) scale(1.1)';
                        }
                        ticking = false;
                    });
                    ticking = true;
                }
            }, { passive: true });
        }
    </script>

    

    <!-- Form Lead Submission Handlers -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const forms = [
                document.getElementById('lms-register-form'),
                document.getElementById('modal-cta-form')
            ];

            forms.forEach(form => {
                if (!form) return;
                form.addEventListener('submit', async (e) => {
                    e.preventDefault();
                    
                    const nameInput = form.querySelector('input[placeholder*="Họ và tên"]');
                    const phoneInput = form.querySelector('input[placeholder*="Số điện thoại"]');
                    const emailInput = form.querySelector('input[placeholder*="email"]');
                    
                    const name = nameInput ? nameInput.value.trim() : '';
                    const phone = phoneInput ? phoneInput.value.trim() : '';
                    const email = emailInput ? emailInput.value.trim() : '';

                    if (!name || !phone || !email) {
                        alert('Vui lòng điền đầy đủ các thông tin bắt buộc.');
                        return;
                    }

                    // Prepare submission payloads
                    const payload = {
                        form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                        email: email,
                        firstName: name,
                        phoneNumber: phone,
                        time_dat_lich: "",
                        note_dat_lich: "Đăng ký từ trang LMS",
                        chuong_trinh_dat_lich: "LMS Moodle và Hệ sinh thái"
                    };

                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        source: "Landing_LMS_Ecosystem",
                        type: "lms_page_registration",
                        tieng_anh: "",
                        hoc_van: "",
                        time_dat_lich: "",
                        chuong_trinh: "LMS Moodle và Hệ sinh thái",
                        nhu_cau: "Đăng ký tư vấn và cấp tài khoản LMS Moodle / Trợ lý AI"
                    };

                    // Bind UTMs
                    const urlParams = new URLSearchParams(window.location.search);
                    const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                    utmParams.forEach(param => {
                        const val = urlParams.get(param);
                        if (val) webhookPayload[param] = val;
                    });

                    // Trigger request
                    const btn = form.querySelector('button[type="submit"]');
                    if (btn) {
                        btn.disabled = true;
                        btn.style.opacity = '0.7';
                    }

                    try {
                        const p1 = fetch("https://automation.ideas.edu.vn/mail_api/forms.php?route=submit", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(payload)
                        });

                        const p2 = fetch("https://open.domation.net/sale_data/webhook.php?token=tok_kjhbs32a", {
                            method: "POST",
                            headers: { "Content-Type": "application/json" },
                            body: JSON.stringify(webhookPayload)
                        });

                        await Promise.allSettled([p1, p2]);
                        
                        // Google Ads Conversion tracking
                        if (typeof window.gtag === 'function') {
                            window.gtag('event', 'conversion', {
                                'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                                'value': 1.0,
                                'currency': 'USD'
                            });
                        }

                        // Handle success
                        if (form.id === 'modal-cta-form') {
                            const successContainer = document.getElementById('modal-form-success');
                            if (successContainer) {
                                successContainer.classList.add('visible');
                                form.style.display = 'none';
                            }
                        } else {
                            alert('Đăng ký thành công! Chuyên viên học vụ sẽ liên hệ hỗ trợ bạn trong vòng 24h làm việc.');
                            form.reset();
                        }
                    } catch (error) {
                        console.error('Submission error:', error);
                        alert('Có lỗi xảy ra trong quá trình gửi thông tin. Vui lòng thử lại sau.');
                    } finally {
                        if (btn) {
                            btn.disabled = false;
                            btn.style.opacity = '1';
                        }
                    }
                });
            });

            // Ecosystem Card Slider Dots logic on Mobile
            const grid = document.querySelector('.ecosystem-grid-v2');
            if (grid) {
                const dotsContainer = document.createElement('div');
                dotsContainer.className = 'slider-dots';
                grid.parentNode.insertBefore(dotsContainer, grid.nextSibling);

                const cards = grid.querySelectorAll('.eco-card-v2');
                cards.forEach((_, idx) => {
                    const dot = document.createElement('span');
                    dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                    dotsContainer.appendChild(dot);
                });

                grid.addEventListener('scroll', () => {
                    const scrollLeft = grid.scrollLeft;
                    const firstCard = grid.querySelector('.eco-card-v2');
                    if (!firstCard) return;
                    const cardWidth = firstCard.offsetWidth + 16;
                    const activeIndex = Math.round(scrollLeft / cardWidth);

                    const dots = dotsContainer.querySelectorAll('.slider-dot');
                    dots.forEach((dot, idx) => {
                        if (idx === activeIndex) {
                            dot.classList.add('active');
                        } else {
                            dot.classList.remove('active');
                        }
                    });
                });
            }
        });
    </script>

    <!-- Script imports -->
    <?php
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    
    <!-- Booking Modal script import -->
    <?php
    define('BOOKING_MODAL_JS_LOADED', true);
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <?php get_footer(); ?>
