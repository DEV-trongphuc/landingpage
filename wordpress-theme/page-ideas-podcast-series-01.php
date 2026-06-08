<?php
/**
 * The template for displaying the Ideas Podcast Series 01 page
 * Template Name: Premium Ideas Podcast Template
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
    <title>Ideas Podcast Series 01 – Vượt rào cản tiếng Anh | Viện IDEAS</title>

    <meta name="description"
        content="Chuỗi Podcast chia sẻ phương pháp vượt qua rào cản tiếng Anh bằng cách ứng dụng AI trong học tập và nghiên cứu học thuật." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Ideas Podcast Series 01 – Vượt rào cản tiếng Anh" />
    <meta property="og:description"
        content="Lắng nghe các giải pháp, lời khuyên thực tế từ đội ngũ chuyên gia về cách kết hợp tư duy độc lập và Trí Tuệ Nhân Tạo." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2025/11/Co-di-hoc-ko-nguoi-dep-1.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />

    <!-- Main minified stylesheet -->
    <?php
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    
    <!-- Booking Modal stylesheet -->
    <?php
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <style>
        /* ══════════════════════════════════════
           IDEAS PODCAST – PREMIUM DARK THEME
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #080405;
            color: #f3f4f6;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 85% 65%, rgba(185, 14, 0, 0.1) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .podcast-hero {
            position: relative;
            padding: 180px 20px 90px;
            overflow: hidden;
            background: #0d0405;
            min-height: 45vh;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .podcast-hero-bg {
            position: absolute;
            top: -150px;
            left: -5%;
            width: 110%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.1);
            z-index: 1;
            opacity: 0.25;
        }

        .podcast-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(13, 4, 5, 0.9) 0%,
                    rgba(80, 6, 0, 0.4) 60%,
                    rgba(8, 4, 5, 1) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 70%);
        }

        .podcast-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .podcast-hero-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.35);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .podcast-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
        }

        .podcast-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .podcast-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.8);
            max-width: 650px;
            margin-bottom: 0;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        /* ── Theater Section ────────────────── */
        .theater-section {
            padding: 80px 20px;
            background: transparent;
            position: relative;
            z-index: 5;
        }

        .theater-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 30px;
        }

        @media (max-width: 992px) {
            .theater-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        @media (max-width: 768px) {
            .podcast-hero {
                padding: 130px 16px 50px;
                min-height: auto;
            }
            .podcast-hero h1 {
                font-size: 2.2rem;
                line-height: 1.2;
            }
            .podcast-hero p {
                font-size: 1rem;
                margin-bottom: 24px;
            }
            .theater-section {
                padding: 40px 16px;
            }
            .player-column {
                gap: 16px;
            }
            .player-meta-card {
                padding: 20px 16px;
            }
            .playlist-column {
                max-height: 380px;
            }
            .playlist-header {
                padding: 18px 20px;
            }
            .playlist-scroll {
                padding: 10px;
            }
            .podcast-coop {
                padding: 50px 16px;
            }
            .coop-sub {
                margin-bottom: 24px;
                font-size: 0.95rem;
            }
            .coop-grid {
                gap: 24px;
            }
        }

        .player-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .video-player-box {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 20px;
            overflow: hidden;
            background: #000000;
            box-shadow: 
                0 25px 60px rgba(0, 0, 0, 0.85), 
                0 0 40px rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: border-color 0.3s ease;
        }

        .video-player-box:hover {
            border-color: rgba(255, 59, 48, 0.3);
        }

        .video-player-box video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            object-fit: contain;
            background: #000000;
        }

        .player-meta-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 30px;
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .player-meta-card h2 {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 12px 0;
            line-height: 1.35;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .meta-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.3);
            color: #ffcccc;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-radius: 8px;
        }

        .meta-row {
            display: flex;
            gap: 24px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-item i {
            color: #ff3b30;
        }

        /* Playlist Styling */
        .playlist-column {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
            max-height: 620px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 992px) {
            .playlist-column {
                max-height: 420px;
            }
        }

        .playlist-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.01);
        }

        .playlist-header h3 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .playlist-header h3 i {
            color: #ff3b30;
        }

        .video-count-badge {
            font-size: 0.82rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.08);
            padding: 5px 12px;
            border-radius: 100px;
            color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .playlist-scroll {
            overflow-y: auto;
            flex-grow: 1;
            padding: 14px;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .playlist-scroll::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }

        .playlist-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .playlist-items li {
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.03);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .playlist-items li:hover {
            background: rgba(171, 14, 0, 0.1);
            border-color: rgba(171, 14, 0, 0.25);
            transform: translateY(-2px);
        }

        .playlist-items li.active {
            background: rgba(171, 14, 0, 0.16);
            border-color: rgba(255, 59, 48, 0.35);
            box-shadow: 0 10px 20px rgba(171, 14, 0, 0.15);
        }

        .playlist-items li p.title {
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #e5e7eb;
            line-height: 1.4;
            transition: color 0.2s ease;
        }

        .playlist-items li.active p.title {
            color: #ff6b6b;
        }

        .playlist-items li p.details {
            margin: 0;
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.45);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .playlist-items li p.details span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .playlist-items li p.details i {
            color: #ff3b30;
        }

        /* ── Cooperation Section ────────────── */
        .podcast-coop {
            padding: 85px 20px;
            background: transparent;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .coop-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .coop-title {
            font-size: clamp(1.8rem, 4vw, 2.2rem);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .coop-title i {
            color: #ff3b30;
        }

        .coop-title b {
            color: #ff3b30;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .coop-sub {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.05rem;
            margin-bottom: 45px;
        }

        .coop-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 36px;
            flex-wrap: wrap;
        }

        .coop-card {
            background: #ffffff;
            padding: 22px 48px;
            border-radius: 20px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.6), 
                0 0 25px rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95px;
        }

        .coop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.35);
            border-color: rgba(255, 59, 48, 0.5);
        }

        .coop-card img {
            max-height: 52px;
            max-width: 190px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .coop-card:hover img {
            transform: scale(1.03);
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <main id="content">
        <!-- Hero Section -->
        <section class="podcast-hero">
            <div class="podcast-hero-overlay"></div>
            <div class="podcast-hero-container">
                <span class="podcast-hero-badge">
                    <i class="fa-solid fa-microphone-lines"></i> Podcast Series 01
                </span>
                <h1>Vượt rào cản tiếng Anh <br><span>bằng cách ứng dụng AI</span></h1>
                <p>Khám phá cách thức sử dụng Trí Tuệ Nhân Tạo để khắc phục rào cản ngoại ngữ, nâng cao hiệu suất học tập chuẩn quốc tế cùng Viện IDEAS</p>
            </div>
        </section>

        <!-- Theater Player Section -->
        <section class="theater-section">
            <div class="theater-container">
                <!-- Left: Video Player -->
                <div class="player-column">
                    <div class="video-player-box">
                        <video controls id="main_video" preload="metadata" playsinline></video>
                    </div>
                    
                    <div class="player-meta-card">
                        <span class="meta-tag" id="current-video-type">Podcast Video</span>
                        <h2 id="current-video-title">Đang tải video...</h2>
                        <div class="meta-row">
                            <div class="meta-item">
                                <i class="fa-regular fa-clock"></i>
                                <span id="current-video-duration">-</span>
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-headphones"></i>
                                <span>Âm thanh chất lượng cao</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Playlist Sidebar -->
                <div class="playlist-column">
                    <div class="playlist-header">
                        <h3><i class="fa-solid fa-headphones"></i> Danh sách phát</h3>
                        <span class="video-count-badge" id="video-count">0 videos</span>
                    </div>
                    <div class="playlist-scroll" data-lenis-prevent>
                        <ul class="playlist-items" id="playlist-list">
                            <!-- Populated dynamically -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cooperation Block -->
        <section class="podcast-coop">
            <div class="coop-container">
                <h2 class="coop-title"><i class="fa-solid fa-handshake-simple"></i> Đơn vị <b>Đồng hành</b></h2>
                <p class="coop-sub">Các đơn vị tài trợ học thuật và đồng sản xuất chương trình Podcast</p>
                
                <div class="coop-grid">
                    <a class="coop-card" href="https://chiefaiofficer.vn/" target="_blank" rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://chiefaiofficer.vn/wp-content/uploads/2025/05/cao-logo-1.png" alt="Chief AI Officer Logo" />
                    </a>
                    <a class="coop-card" href="https://ideas.edu.vn/" target="_blank" rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/ideas-02.png" alt="Viện IDEAS Logo" />
                    </a>
                </div>
            </div>
        </section>
    </main>

    <!-- Generic Registration Popup Modal -->
    <div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
        <div class="reg-modal-overlay" id="reg-modal-overlay"></div>
        <div class="reg-modal-container" data-lenis-prevent>
            <button class="reg-modal-close" id="reg-modal-close" aria-label="Đóng modal">✕</button>
            <div class="reg-modal-content">
                <header class="modal-form-header">
                    <div class="modal-badge">NHẬN TƯ VẤN 1:1</div>
                    <h3>Đăng ký tham khảo <br><span class="gradient-text">Tài liệu &amp; Khóa học AI</span></h3>
                    <p>Điền thông tin bên dưới, chuyên viên tư vấn sẽ liên hệ chia sẻ cẩm nang ứng dụng AI và giải đáp thắc mắc.</p>
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
                        <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi muốn tư vấn về chương trình thạc sĩ MBA ứng dụng AI..." rows="3"></textarea>
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
                    <p>Cảm ơn bạn đã quan tâm. Chuyên viên tư vấn của IDEAS sẽ sớm liên hệ với bạn để tư vấn và gửi tài liệu.</p>
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
                                <input type="radio" name="bk-program" value="Podcast Series 01" checked />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🎙️</div>
                                    <div class="bk-program-name">Podcast Series 01</div>
                                    <div class="bk-program-desc">Tư vấn tài liệu học tập AI</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="MBA High Quality" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">📘</div>
                                    <div class="bk-program-name">MBA Thụy Sĩ</div>
                                    <div class="bk-program-desc">Thạc sĩ Quản trị kinh doanh</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chưa quyết định" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💡</div>
                                    <div class="bk-program-name">Khác / Tư vấn thêm</div>
                                    <div class="bk-program-desc">Định hướng AI & MBA</div>
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
                        <button type="button" class="bk-cal-next" id="bk-cal-next" aria-label="Tháng tiếp theo">
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
        function showform(ctaSource = 'podcast_cta') {
            if (typeof window.openRegModal === 'function') {
                window.openRegModal(ctaSource);
            } else {
                const regModal = document.getElementById('reg-modal');
                if (regModal) {
                    regModal.style.display = 'flex';
                    setTimeout(function() {
                        regModal.classList.add('open');
                        regModal.setAttribute('aria-hidden', 'false');
                        if (typeof window.lockScroll === 'function') window.lockScroll();
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
                        if (typeof window.unlockScroll === 'function') window.unlockScroll();
                    }, 400);
                }
            }
        }
    </script>

    



    <!-- Podcast Playlist and Player Controller Script -->
    <script>
        const podcast_data = {
            series1: {
                name: "Vượt rào cản tiếng Anh",
                name_sub: "#bằng cách ứng dụng AI trong học tập",
                data: [
                    {
                        type: "Podcast Video",
                        duration: "2:03",
                        title: "Không giỏi tiếng Anh - Bạn không đơn độc",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/07/podcast_1.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:40",
                        title: "Bạn không cần hiểu hết, chỉ cần hiểu đúng với sự trợ giúp của AI",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_003_3593813510926577v.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "3:07",
                        title: "AI chỉ hỗ trợ, không thay thế việc tư duy",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/video-podcast-3.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:01",
                        title: "Bạn có đang sử dụng AI vô thức",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_002_1076359851223438v.mp4",
                    },
                ],
            },
        };

        document.addEventListener("DOMContentLoaded", function () {
            const videoElement = document.querySelector("#main_video");
            const listElement = document.querySelector("#playlist-list");
            const lenElement = document.querySelector("#video-count");

            // Meta items elements
            const metaTitle = document.querySelector("#current-video-title");
            const metaDuration = document.querySelector("#current-video-duration");
            const metaType = document.querySelector("#current-video-type");

            const videos = podcast_data.series1.data;

            // Update video count badge
            if (lenElement) lenElement.textContent = `${videos.length} videos`;

            // Populate playlist
            if (listElement) {
                listElement.innerHTML = videos
                    .map((item, index) => `
                        <li data-index="${index}" class="${index === 0 ? "active" : ""}">
                            <p class="title">${index + 1}. ${item.title}</p>
                            <p class="details">
                                <span><i class="fa-solid fa-play"></i> ${item.duration}</span>
                                <span>${item.type}</span>
                            </p>
                        </li>
                    `).join("");
            }

            // Update metadata display function
            function updateMeta(index) {
                const video = videos[index];
                if (metaTitle) metaTitle.textContent = video.title;
                if (metaDuration) metaDuration.textContent = video.duration;
                if (metaType) metaType.textContent = video.type;
            }

            // Load first video initially
            if (videoElement && videos[0]) {
                videoElement.src = videos[0].video;
                updateMeta(0);
                
                // Autoplay with caution (browser behavior handling)
                setTimeout(() => {
                    videoElement.play().catch(() => {
                        console.warn("Browser blocked autoplay. User interaction required.");
                    });
                }, 500);
            }

            // Handle switching tracks on playlist click
            if (listElement) {
                listElement.addEventListener("click", function (e) {
                    const li = e.target.closest("li");
                    if (!li) return;

                    const index = parseInt(li.dataset.index, 10);
                    
                    if (videoElement) {
                        videoElement.src = videos[index].video;
                        videoElement.play();
                    }
                    updateMeta(index);

                    // Update active class state
                    document.querySelectorAll("#playlist-list li").forEach((el) => {
                        el.classList.remove("active");
                    });
                    li.classList.add("active");
                });
            }
        });
    </script>

    <!-- Main scripts minified imports -->
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
</body>

</html>
