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

        @media (max-width: 768px) {
            .lms-hero {
                padding: 130px 16px 50px;
            }
            .lms-section,
            .platform-section,
            .detail-section {
                padding: 50px 16px;
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
                scrollbar-width: none; /* Firefox */
                margin-left: -16px;
                margin-right: -16px;
                padding-left: 16px;
                padding-right: 16px;
            }
            .ecosystem-grid-v2::-webkit-scrollbar {
                display: none; /* Chrome/Safari */
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
            <h1>Hệ Thống LMS &amp; <span>Hệ Sinh Thái Học Tập</span></h1>
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

    <!-- Modal structures -->
    <div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
        <div class="reg-modal-overlay" id="reg-modal-overlay"></div>
        <div class="reg-modal-container" data-lenis-prevent>
            <button class="reg-modal-close" id="reg-modal-close" aria-label="Đóng modal">✕</button>
            <div class="reg-modal-content">
                <header class="modal-form-header">
                    <div class="modal-badge">NHẬN TƯ VẤN 1:1</div>
                    <h3>Đăng ký trải nghiệm <br><span class="gradient-text">Hệ thống học tập</span></h3>
                    <p>Chuyên viên hỗ trợ học vụ sẽ liên hệ với bạn trong vòng 24h làm việc để cấp tài khoản và hướng dẫn.</p>
                </header>

                <form class="cta-form modal-form" id="modal-cta-form" novalidate>
                    <div class="form-group">
                        <label for="modal-fullname">Họ và tên *</label>
                        <input type="text" id="modal-fullname" name="fullname" placeholder="Họ và tên của bạn" required />
                        <span class="form-error" id="modal-fullname-error"></span>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="modal-phone">Số điện thoại *</label>
                            <input type="tel" id="modal-phone" name="phone" placeholder="Số điện thoại" required />
                            <span class="form-error" id="modal-phone-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="modal-email">Email *</label>
                            <input type="email" id="modal-email" name="email" placeholder="Địa chỉ email" required />
                            <span class="form-error" id="modal-email-error"></span>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="modal-education">Trình độ học vấn *</label>
                            <select id="modal-education" name="education" required>
                                <option value="">-- Chọn trình độ --</option>
                                <option value="highschool">THPT</option>
                                <option value="college">Cao đẳng</option>
                                <option value="bachelor">Cử nhân</option>
                                <option value="master">Thạc sĩ</option>
                                <option value="other">Khác</option>
                            </select>
                            <span class="form-error" id="modal-education-error"></span>
                        </div>
                        <div class="form-group">
                            <label for="modal-english">Trình độ Tiếng Anh *</label>
                            <select id="modal-english" name="english" required>
                                <option value="">-- Chọn trình độ --</option>
                                <option value="below-5.0">Dưới IELTS 5.0</option>
                                <option value="5.0-5.5">IELTS 5.0 - 5.5</option>
                                <option value="6.0-plus">IELTS 6.0+</option>
                                <option value="other">Khác / Chưa thi</option>
                            </select>
                            <span class="form-error" id="modal-english-error"></span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="modal-message">Nội dung bạn muốn chia sẻ / thời gian có thể nghe tư vấn 1:1</label>
                        <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi muốn hỏi cách đăng nhập, sử dụng AI..." rows="3"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary btn-full" id="modal-form-submit-btn" aria-label="Gửi đăng ký tư vấn">
                        <span>Gửi thông tin đăng ký</span>
                        <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div class="modal-zalo-section">
                        <div class="modal-zalo-divider">
                            <span>Hoặc chọn cách liên hệ</span>
                        </div>
                        <div class="modal-zalo-row">
                            <a href="https://zalo.me/3857867121882640296" target="_blank" class="modal-zalo-btn" aria-label="Chat Zalo với IDEAS">
                                <img decoding="async" src="https://cdn-1.webcatalog.io/catalog/zalo-oa/zalo-oa-icon-unplated.png?v=1780553812775" alt="Zalo Logo IDEAS" width="20" height="20" loading="lazy">
                                <span>Chat Zalo với IDEAS</span>
                            </a>
                            <button type="button" class="modal-booking-btn" id="modal-open-booking" aria-label="Đặt lịch hẹn tư vấn">
                                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" aria-hidden="true">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <span>Đặt lịch tư vấn</span>
                            </button>
                        </div>
                    </div>

                    <p class="form-privacy">Cam kết bảo mật thông tin</p>
                </form>

                <div class="modal-form-success" id="modal-form-success">
                    <div class="success-circle">
                        <svg viewBox="0 0 52 52" class="checkmark">
                            <circle cx="26" cy="26" r="25" fill="none" class="checkmark__circle" />
                            <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="checkmark__check" />
                        </svg>
                    </div>
                    <h3>Gửi thông tin thành công!</h3>
                    <p>Cảm ơn bạn đã quan tâm. Chuyên viên của IDEAS sẽ liên hệ trong thời gian sớm nhất.</p>
                    <button type="button" class="btn btn-primary btn-full" style="margin-top: 32px;" onclick="closeRegModal()">Quay lại trang</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Booking Modal - Đặt lịch tư vấn -->
    <div class="bk-modal" id="bk-modal" role="dialog" aria-modal="true" aria-hidden="true" aria-labelledby="bk-title">
        <div class="bk-overlay" id="bk-overlay"></div>
        <div class="bk-container" data-lenis-prevent role="document">
            <button class="bk-close" id="bk-close" aria-label="Đóng modal">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
                    <line x1="18" y1="6" x2="6" y2="18" />
                    <line x1="6" y1="6" x2="18" y2="18" />
                </svg>
            </button>

            <!-- Progress bar -->
            <div class="bk-progress">
                <div class="bk-progress-track">
                    <div class="bk-progress-fill" id="bk-progress-fill"></div>
                </div>
                <div class="bk-steps-label">
                    <span class="bk-step-lbl active" data-step="1">Thông tin</span>
                    <span class="bk-step-lbl" data-step="2">Chọn lịch</span>
                    <span class="bk-step-lbl" data-step="3">Xác nhận</span>
                </div>
            </div>

            <!-- STEP 1: Personal Info -->
            <div class="bk-step" id="bk-step-1">
                <div class="bk-step-header">
                    <div class="bk-header-icon">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div>
                        <div class="bk-step-badge">BƯỚC 1 / 3</div>
                        <h2 class="bk-step-title" id="bk-title">Thông tin của bạn</h2>
                        <p class="bk-step-sub">Điền thông tin để chuyên viên chuẩn bị buổi tư vấn phù hợp nhất</p>
                    </div>
                </div>

                <form class="bk-form" id="bk-form-1" novalidate>
                    <div class="bk-field">
                        <label for="bk-name">Họ và tên <span class="bk-required">*</span></label>
                        <div class="bk-input-wrap">
                            <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                            <input type="text" id="bk-name" name="bk-name" placeholder="Nguyễn Văn A" autocomplete="name" required />
                        </div>
                        <span class="bk-err" id="bk-name-err"></span>
                    </div>

                    <div class="bk-row-2">
                        <div class="bk-field">
                            <label for="bk-phone">Số điện thoại <span class="bk-required">*</span></label>
                            <div class="bk-input-wrap">
                                <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <input type="tel" id="bk-phone" name="bk-phone" placeholder="0912 345 678" autocomplete="tel" required />
                            </div>
                            <span class="bk-err" id="bk-phone-err"></span>
                        </div>
                        <div class="bk-field">
                            <label for="bk-email">Email <span class="bk-required">*</span></label>
                            <div class="bk-input-wrap">
                                <svg class="bk-input-icon" width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <input type="email" id="bk-email" name="bk-email" placeholder="email@company.com" autocomplete="email" required />
                            </div>
                            <span class="bk-err" id="bk-email-err"></span>
                        </div>
                    </div>

                    <div class="bk-row-2">
                        <div class="bk-field">
                            <label for="bk-edu">Trình độ học vấn <span class="bk-required">*</span></label>
                            <div class="bk-select-wrap">
                                <select id="bk-edu" name="bk-edu" required>
                                    <option value="">-- Chọn trình độ --</option>
                                    <option value="highschool">THPT</option>
                                    <option value="college">Cao đẳng</option>
                                    <option value="bachelor">Cử nhân</option>
                                    <option value="master">Thạc sĩ</option>
                                    <option value="other">Khác</option>
                                </select>
                            </div>
                            <span class="bk-err" id="bk-edu-err"></span>
                        </div>
                        <div class="bk-field">
                            <label for="bk-eng">Trình độ Tiếng Anh <span class="bk-required">*</span></label>
                            <div class="bk-select-wrap">
                                <select id="bk-eng" name="bk-eng" required>
                                    <option value="">-- Chọn trình độ --</option>
                                    <option value="below-5.0">Dưới IELTS 5.0</option>
                                    <option value="5.0-5.5">IELTS 5.0 – 5.5</option>
                                    <option value="6.0-plus">IELTS 6.0+</option>
                                    <option value="other">Khác / Chưa thi</option>
                                </select>
                            </div>
                            <span class="bk-err" id="bk-eng-err"></span>
                        </div>
                    </div>

                    <div class="bk-field">
                        <label>Chương trình quan tâm <span class="bk-required">*</span></label>
                        <div class="bk-program-grid" id="bk-program-grid">
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Hệ sinh thái LMS" checked />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💻</div>
                                    <div class="bk-program-name">Hệ sinh thái LMS</div>
                                    <div class="bk-program-desc">Trải nghiệm hệ thống Moodle & AI</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chương trình Thạc sĩ" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🎓</div>
                                    <div class="bk-program-name">Chương trình Thạc sĩ</div>
                                    <div class="bk-program-desc">MBA / EMBA / MBA in AI / MSc AI</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chưa quyết định" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💡</div>
                                    <div class="bk-program-name">Chưa quyết định</div>
                                    <div class="bk-program-desc">Cần tư vấn để lựa chọn</div>
                                </div>
                            </label>
                        </div>
                        <span class="bk-err" id="bk-program-err"></span>
                    </div>

                    <button type="button" class="bk-btn-next" id="bk-next-1" aria-label="Sang bước tiếp theo: chọn lịch">
                        Tiếp theo - Chọn lịch
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </form>
            </div>

            <!-- STEP 2: Date & Time -->
            <div class="bk-step bk-hidden" id="bk-step-2">
                <div class="bk-step-header">
                    <div class="bk-header-icon">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2" />
                            <line x1="16" y1="2" x2="16" y2="6" />
                            <line x1="8" y1="2" x2="8" y2="6" />
                            <line x1="3" y1="10" x2="21" y2="10" />
                        </svg>
                    </div>
                    <div>
                        <div class="bk-step-badge">BƯỚC 2 / 3</div>
                        <h2 class="bk-step-title">Chọn ngày &amp; giờ</h2>
                        <p class="bk-step-sub">Chọn thời gian phù hợp để chuyên viên gọi tư vấn cho bạn</p>
                    </div>
                </div>

                <div class="bk-calendar-wrap">
                    <div class="bk-cal-header">
                        <button type="button" class="bk-cal-nav" id="bk-cal-prev" aria-label="Tháng trước">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                            </svg>
                        </button>
                        <span class="bk-cal-month-label" id="bk-cal-month-label"></span>
                        <button type="button" class="bk-cal-nav" id="bk-cal-next" aria-label="Tháng tiếp theo">
                            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                            </svg>
                        </button>
                    </div>
                    <div class="bk-cal-weekdays">
                        <span>T2</span><span>T3</span><span>T4</span><span>T5</span><span>T6</span><span>T7</span><span>CN</span>
                    </div>
                    <div class="bk-cal-grid" id="bk-cal-grid"></div>
                </div>

                <div class="bk-time-section" id="bk-time-section">
                    <div class="bk-time-label">
                        <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <circle cx="12" cy="12" r="10" />
                            <polyline points="12 6 12 12 16 14" />
                        </svg>
                        <span id="bk-selected-date-label">Vui lòng chọn ngày trước</span>
                    </div>
                    <div class="bk-time-grid" id="bk-time-grid"></div>
                    <span class="bk-err" id="bk-time-err"></span>
                </div>

                <div class="bk-step-actions">
                    <button type="button" class="bk-btn-back" id="bk-back-2" aria-label="Quay lại bước trước">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                        Quay lại
                    </button>
                    <button type="button" class="bk-btn-next" id="bk-next-2" aria-label="Sang bước tiếp theo: xem xác nhận">
                        Xem xác nhận
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- STEP 3: Confirm -->
            <div class="bk-step bk-hidden" id="bk-step-3">
                <div class="bk-step-header">
                    <div class="bk-header-icon">
                        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                        </svg>
                    </div>
                    <div>
                        <div class="bk-step-badge">BƯỚC 3 / 3</div>
                        <h2 class="bk-step-title">Xác nhận lịch hẹn</h2>
                        <p class="bk-step-sub">Vui lòng kiểm tra kỹ các thông tin trước khi xác nhận đặt lịch</p>
                    </div>
                </div>

                <div class="bk-confirm-summary">
                    <div class="bk-confirm-item-data">
                        <span class="bk-confirm-lbl">Lịch tư vấn</span>
                        <div class="bk-confirm-val">
                            <i class="fa-regular fa-calendar-check"></i>
                            <span id="bk-confirm-date">-</span> &nbsp;lúc&nbsp;
                            <span id="bk-confirm-time">-</span>
                        </div>
                    </div>
                    <div class="bk-confirm-grid">
                        <div class="bk-confirm-cell">
                            <span class="bk-confirm-lbl">Họ và tên</span>
                            <span class="bk-confirm-val" id="bk-confirm-name">-</span>
                        </div>
                        <div class="bk-confirm-cell">
                            <span class="bk-confirm-lbl">Số điện thoại</span>
                            <span class="bk-confirm-val" id="bk-confirm-phone">-</span>
                        </div>
                        <div class="bk-confirm-cell">
                            <span class="bk-confirm-lbl">Email</span>
                            <span class="bk-confirm-val" id="bk-confirm-email" style="word-break: break-all;">-</span>
                        </div>
                        <div class="bk-confirm-cell">
                            <span class="bk-confirm-lbl">Chương trình</span>
                            <span class="bk-confirm-val" id="bk-confirm-program">-</span>
                        </div>
                    </div>
                </div>

                <div class="bk-step-actions">
                    <button type="button" class="bk-btn-back" id="bk-back-3" aria-label="Quay lại bước trước">
                        <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 12H5M12 19l-7-7 7-7" />
                        </svg>
                        Quay lại
                    </button>
                    <button type="button" class="bk-btn-next" id="bk-confirm-btn" aria-label="Xác nhận lịch hẹn">
                        Xác nhận đặt lịch
                        <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14M12 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- SUCCESS STATE -->
            <div class="bk-step bk-hidden" id="bk-step-success">
                <div class="bk-success-icon-box">
                    <svg viewBox="0 0 52 52" class="bk-checkmark">
                        <circle cx="26" cy="26" r="25" fill="none" class="bk-checkmark-circle" />
                        <path fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" class="bk-checkmark-check" />
                    </svg>
                </div>
                <h2 class="bk-success-title">Đặt lịch thành công!</h2>
                <p class="bk-success-sub">Thông tin lịch hẹn của bạn đã được ghi nhận. Chuyên viên sẽ gọi cho bạn theo khung giờ đăng ký.</p>

                <div class="bk-success-details">
                    <div class="bk-success-details-row">
                        <span>Học viên:</span>
                        <strong id="bk-success-name">-</strong>
                    </div>
                    <div class="bk-success-details-row">
                        <span>Ngày hẹn:</span>
                        <strong id="bk-success-date">-</strong>
                    </div>
                    <div class="bk-success-details-row">
                        <span>Khung giờ:</span>
                        <strong id="bk-success-time">-</strong>
                    </div>
                </div>

                <button type="button" class="bk-btn-done" id="bk-done-btn">Hoàn tất</button>
            </div>
        </div>
    </div>

    <!-- Script compatibility wrappers for showform -->
    <script>
        function showform(ctaSource = 'lms_cta') {
            if (typeof window.openRegModal === 'function') {
                window.openRegModal(ctaSource);
            } else {
                const regModal = document.getElementById('reg-modal');
                if (regModal) {
                    regModal.style.display = 'flex';
                    setTimeout(function() {
                        regModal.classList.add('open');
                        regModal.setAttribute('aria-hidden', 'false');
                    }, 10);
                }
            }
        }
        function closeRegModal() {
            if (typeof window.closeRegModal === 'function') {
                window.closeRegModal();
            } else {
                const regModal = document.getElementById('reg-modal');
                if (regModal) {
                    regModal.classList.remove('open');
                    regModal.setAttribute('aria-hidden', 'true');
                    setTimeout(function() {
                        regModal.style.display = 'none';
                    }, 400);
                }
            }
        }
    </script>

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
    $bk_js_path = get_stylesheet_directory() . '/common-assets/js/booking-modal.min.js';
    $bk_js_version = file_exists($bk_js_path) ? filemtime($bk_js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/booking-modal.min.js?v=<?php echo $bk_js_version; ?>" defer></script>

    <?php get_footer(); ?>
