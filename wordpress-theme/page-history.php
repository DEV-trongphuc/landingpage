<?php
/**
 * The template for displaying the Institute History and Development page
 * Template Name: Premium Institute History Template
 */
global $wp;

// Dequeue unwanted old CSS styles (via WordPress API)
add_action('wp_enqueue_scripts', function() {
    global $wp_styles;
    if ($wp_styles && !empty($wp_styles->registered)) {
        foreach ($wp_styles->registered as $handle => $style) {
            if (isset($style->src) && strpos($style->src, 'LANDINGPAGE_MBA/main.css') !== false) {
                wp_dequeue_style($handle);
                wp_deregister_style($handle);
            }
        }
    }
}, 9999);

// Block unwanted styles via output buffering
ob_start(function($html) {
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
    <!-- Google Tag Manager / Global Site Tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-QKV7LKNLLH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'G-QKV7LKNLLH');
        gtag('config', 'AW-11205917800');
    </script>

    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lịch sử hình thành và phát triển Viện IDEAS | <?php bloginfo('name'); ?></title>
    
    <meta name="description" content="Lịch sử phát triển của Viện IDEAS từ tiền thân Viện IBM (2010), UBIS partner (2013), đến sự chuyển đổi tái định vị thương hiệu năm 2023 với mục tiêu 'Sáng tạo và đổi mới'.">
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Lịch sử hình thành và phát triển Viện IDEAS" />
    <meta property="og:description" content="Khám phá hành trình 15 năm kiến tạo và phát triển giáo dục sau đại học quốc tế chất lượng cao của Viện IDEAS." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Lịch sử hình thành và phát triển Viện IDEAS" />
    <meta name="twitter:description" content="Hành trình phát triển vượt bậc của Viện IDEAS trong hỗ trợ các chương trình Cử nhân, Thạc sĩ, Tiến sĩ chuẩn quốc tế." />
    <meta name="twitter:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" />
    
    <!-- Link the main minified style.css -->
    <?php 
    $css_path = get_stylesheet_directory() . '/common-assets/css/style.min.css';
    $css_version = file_exists($css_path) ? filemtime($css_path) : time();
    ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/style.min.css?v=<?php echo $css_version; ?>" />
    
    <style>
        /* Prevent overflow-x from breaking sticky elements */
        html, body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #0b0f19;
            color: #e2e8f0;
            background-image: 
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 45%),
                radial-gradient(circle at 85% 60%, rgba(185, 14, 0, 0.08) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* Hero Header */
        .history-hero {
            position: relative;
            background: #0b0f19;
            padding: 180px 20px 100px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            border-bottom: 2px solid rgba(171, 14, 0, 0.3);
        }

        .history-hero .counters-bg {
            position: absolute;
            top: -150px;
            left: -10%;
            width: 120%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            filter: blur(1px);
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.85;
        }

        .history-hero-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(171, 14, 0, 0.5);
            padding: 8px 18px;
            border-radius: 100px;
            color: #ab0e00;
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 20px;
            backdrop-filter: blur(10px);
        }

        .history-hero h1 {
            font-size: clamp(2.4rem, 6vw, 3.8rem);
            font-weight: 800;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.2;
            color: #ffffff;
        }

        .history-hero h1 span {
            background: linear-gradient(135deg, #ff0000, #ab0e00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .history-hero p {
            font-size: 1.15rem;
            color: #94a3b8;
            max-width: 700px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Timeline Section */
        .timeline-section {
            padding: 100px 20px;
            position: relative;
            max-width: 1200px;
            margin: 0 auto;
        }

        .timeline-container {
            position: relative;
            width: 100%;
            margin-top: 50px;
        }

        /* Timeline vertical line */
        .timeline-container::before {
            content: '';
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            width: 3px;
            background: linear-gradient(to bottom, #ab0e00 0%, #ff0000 50%, #ab0e00 100%);
            transform: translateX(-50%);
            box-shadow: 0 0 15px rgba(171, 14, 0, 0.4);
            border-radius: 2px;
        }

        /* Timeline items */
        .timeline-item {
            position: relative;
            width: 100%;
            margin-bottom: 80px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .timeline-item:nth-child(even) {
            justify-content: flex-start;
        }

        /* Center Dot */
        .timeline-dot {
            position: absolute;
            left: 50%;
            top: 40px;
            transform: translateX(-50%);
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #ff0000;
            border: 4px solid #0b0f19;
            box-shadow: 0 0 10px #ff0000;
            z-index: 10;
            transition: all 0.3s ease;
        }

        .timeline-item:hover .timeline-dot {
            background: #ffffff;
            box-shadow: 0 0 20px #ff0000;
            transform: translateX(-50%) scale(1.25);
        }

        /* Year indicator overlaying dot on desktop */
        .timeline-year-badge {
            position: absolute;
            left: 50%;
            top: -5px;
            transform: translateX(-50%);
            background: #ab0e00;
            color: #ffffff;
            font-size: 0.95rem;
            font-weight: 800;
            padding: 4px 14px;
            border-radius: 100px;
            z-index: 11;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            border: 1px solid rgba(255,255,255,0.1);
        }

        /* Timeline Content Card */
        .timeline-card {
            width: 45%;
            background: rgba(30, 41, 59, 0.45);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .timeline-item:hover .timeline-card {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.25);
            background: rgba(30, 41, 59, 0.65);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
        }

        .timeline-card-year {
            font-size: 1.4rem;
            font-weight: 800;
            color: #ff0000;
            margin-bottom: 8px;
            display: inline-block;
            background: linear-gradient(135deg, #ff0000, #ab0e00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .timeline-card h3 {
            font-size: 1.5rem;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .timeline-card p {
            color: #cbd5e1;
            font-size: 0.98rem;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        .timeline-card ul {
            list-style: none;
            padding: 0;
            margin: 0 0 20px 0;
        }

        .timeline-card ul li {
            position: relative;
            padding-left: 24px;
            margin-bottom: 10px;
            color: #94a3b8;
            font-size: 0.95rem;
            line-height: 1.5;
        }

        .timeline-card ul li i {
            position: absolute;
            left: 0;
            top: 4px;
            color: #ab0e00;
            font-size: 0.9rem;
        }

        /* Image styling */
        .timeline-images {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-top: 20px;
        }

        .timeline-images img {
            max-height: 160px;
            border-radius: 12px;
            object-fit: cover;
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease;
        }

        .timeline-images img:hover {
            transform: scale(1.05);
        }

        .timeline-images img.wlogo {
            max-height: 70px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px;
            object-fit: contain;
        }

        .timeline-images.wlogos {
            align-items: center;
        }

        /* Responsive breakpoints */
        @media (max-width: 992px) {
            .timeline-container::before {
                left: 30px;
            }

            .timeline-item {
                justify-content: flex-start;
                padding-left: 80px;
                margin-bottom: 60px;
            }

            .timeline-item:nth-child(even) {
                justify-content: flex-start;
            }

            .timeline-dot {
                left: 30px;
                top: 35px;
            }

            .timeline-year-badge {
                left: 30px;
                top: -15px;
            }

            .timeline-card {
                width: 100%;
                padding: 25px;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <header class="ideas_header" id="site-header">
        <div class="container header-inner">
            <a href="https://ideas.edu.vn/" class="logo" aria-label="Trang chủ IDEAS">
                <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp"
                    alt="Logo IDEAS Education - 15 năm thành lập" width="60" height="60" loading="eager"
                    fetchpriority="high">
            </a>
            <nav class="header-nav">
                <!-- Dropdown 1: Giới thiệu -->
                <div class="nav-dropdown">
                    <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        Giới thiệu
                        <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu-box simple-dropdown">
                        <a href="/he-thong-ho-tro-hoc-tap-lms-ideas" class="dropdown-item-simple">
                            <i class="fa-solid fa-layer-group"></i> <span>Hệ thống LMS</span>
                        </a>
                        <a href="/so-do-to-chuc" class="dropdown-item-simple">
                            <i class="fa-solid fa-sitemap"></i> <span>Cơ cấu tổ chức</span>
                        </a>
                        <a href="/doi-ngu-giang-vien" class="dropdown-item-simple">
                            <i class="fa-solid fa-user-graduate"></i> <span>Hội đồng chuyên môn</span>
                        </a>
                        <a href="/dong-su-kien" class="dropdown-item-simple">
                            <i class="fa-solid fa-clock"></i> <span>Dòng sự kiện</span>
                        </a>
                        <a href="/lich-su-hinh-thanh-va-phat-trien-vien-ideas" class="dropdown-item-simple">
                            <i class="fa-solid fa-landmark"></i> <span>Lịch sử phát triển</span>
                        </a>
                    </div>
                </div>

                <!-- Dropdown 2: Chương trình -->
                <div class="nav-dropdown">
                    <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        Chương trình
                        <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu-box">
                        <div class="dropdown-column">
                            <div class="dropdown-column-title">Thạc sĩ</div>
                            <a href="/mba" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1.png.webp"
                                    alt="Online MBA" decoding="async" loading="lazy" />
                                <div class="item-content">
                                    <div class="item-title">Online MBA</div>
                                    <div class="item-desc">Thạc sĩ QTKD Trực tuyến</div>
                                </div>
                            </a>
                            <a href="/emba" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba.png.webp"
                                    alt="Executive MBA" decoding="async" loading="lazy" />
                                <div class="item-content">
                                    <div class="item-title">Executive MBA</div>
                                    <div class="item-desc">Thạc sĩ điều hành QTKD trực tuyến</div>
                                </div>
                            </a>
                            <a href="/mscai" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai.png.webp" alt="Master AI"
                                    loading="lazy" decoding="async" />
                                <div class="item-content">
                                    <div class="item-title">Master AI (MSc AI)</div>
                                    <div class="item-desc">Thạc sĩ AI ứng dụng</div>
                                </div>
                            </a>
                            <a href="/mbainai" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai.webp" alt="MBA in AI"
                                    loading="lazy" decoding="async" />
                                <div class="item-content">
                                    <div class="item-title">MBA in AI</div>
                                    <div class="item-desc">Thạc sĩ QTKD Ứng dụng AI</div>
                                </div>
                            </a>
                        </div>
                        <div class="dropdown-column-divider"></div>
                        <div class="dropdown-column">
                            <div class="dropdown-column-title">Cử nhân</div>
                            <a href="/bba" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP.webp" alt="Top-up BBA"
                                    loading="lazy" decoding="async" />
                                <div class="item-content">
                                    <div class="item-title">Top-up BBA</div>
                                    <div class="item-desc">Liên thông Cử nhân 12 tháng</div>
                                </div>
                            </a>
                            <a href="/fullbba" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba.webp" alt="Full BBA"
                                    loading="lazy" decoding="async" />
                                <div class="item-content">
                                    <div class="item-title">Full BBA</div>
                                    <div class="item-desc">Cử nhân QTKD Thụy Sĩ</div>
                                </div>
                            </a>
                            <div class="dropdown-column-title" style="margin-top: 16px;">Tiến sĩ</div>
                            <a href="/dual-dba" class="dropdown-item">
                                <img class="item-avatar"
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5c9vyalfHcxNNvOrudO4IQ9qGHz8PC0GhVw&s" alt="Dual DBA"
                                    loading="lazy" decoding="async" />
                                <div class="item-content">
                                    <div class="item-title">Dual DBA</div>
                                    <div class="item-desc">Tiến sĩ song bằng Pháp & Anh</div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Dropdown 3: Chính sách -->
                <div class="nav-dropdown">
                    <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        Chính sách
                        <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu-box simple-dropdown">
                        <a href="/ho-tro-tai-chinh-sacombank" class="dropdown-item-simple">
                            <i class="fa-solid fa-circle-dollar-to-slot"></i> <span>Trả góp học phí</span>
                        </a>
                        <a href="/voucher" class="dropdown-item-simple">
                            <i class="fa-solid fa-ticket"></i> <span>IDEAS Voucher</span>
                        </a>
                        <a href="/cac-khoan-chi-phi" class="dropdown-item-simple">
                            <i class="fa-solid fa-file-invoice-dollar"></i> <span>Các khoản chi phí</span>
                        </a>
                        <a href="/ideas-ambassador" class="dropdown-item-simple">
                            <i class="fa-solid fa-user-graduate"></i> <span>IDEAS - Ambassador</span>
                        </a>
                    </div>
                </div>

                <!-- Dropdown 4: Bản tin -->
                <div class="nav-dropdown">
                    <button type="button" class="nav-link dropdown-toggle" aria-haspopup="true" aria-expanded="false">
                        Bản tin
                        <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </button>
                    <div class="dropdown-menu-box simple-dropdown">
                        <a href="/bai-viet" class="dropdown-item-simple">
                            <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                        </a>
                        <a href="/dong-su-kien#chuyen-di" class="dropdown-item-simple">
                            <i class="fa-solid fa-plane-departure"></i> <span>Chuyến đi</span>
                        </a>
                        <a href="/ideas-talk" class="dropdown-item-simple">
                            <i class="fa-solid fa-globe"></i> <span>Webinar</span>
                        </a>
                        <a href="/ideas-podcast-series-01" class="dropdown-item-simple">
                            <i class="fa-solid fa-microphone-lines"></i> <span>Podcast</span>
                        </a>
                    </div>
                </div>
                <div style="display:flex;align-items:center;gap:8px;">
                    <a href="/dat-lich" class="nav-cta">Nhận tư vấn</a>
                </div>
            </nav>
            <button class="hamburger" id="hamburger" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </header>

    <div class="mobile-overlay" id="mobile-overlay"></div>
    <div class="mobile-menu" id="mobile-menu" aria-hidden="true" data-lenis-prevent>
        <div class="mobile-menu-header">
            <a href="/" class="mobile-menu-logo" aria-label="Trang chủ IDEAS">
                <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp"
                    alt="Logo IDEAS Education - 15 năm thành lập" width="45" height="45" loading="lazy">
            </a>
            <button id="mobile-menu-close" class="mobile-menu-close" aria-label="Đóng menu">
                <svg width="20" height="20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"
                    xmlns="http://www.w3.org/2000/svg">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <!-- Mobile menu content matches archive.php dropdowns -->
        <div class="mobile-dropdown">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
                Giới thiệu
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="/he-thong-ho-tro-hoc-tap-lms-ideas"><i class="fa-solid fa-layer-group"></i> LMS</a>
                <a href="/so-do-to-chuc"><i class="fa-solid fa-sitemap"></i> Cơ cấu tổ chức</a>
                <a href="/doi-ngu-giang-vien"><i class="fa-solid fa-user-graduate"></i> Hội đồng chuyên môn</a>
                <a href="/dong-su-kien"><i class="fa-solid fa-clock"></i> Dòng sự kiện</a>
                <a href="/lich-su-hinh-thanh-va-phat-trien-vien-ideas"><i class="fa-solid fa-landmark"></i> Lịch sử phát triển</a>
            </div>
        </div>
        <div class="mobile-dropdown">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
                Chương trình
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="/mba"><i class="fa-solid fa-graduation-cap"></i> Online MBA</a>
                <a href="/emba"><i class="fa-solid fa-graduation-cap"></i> Executive MBA</a>
                <a href="/mscai"><i class="fa-solid fa-brain"></i> Master AI (MSc AI)</a>
                <a href="/mbainai"><i class="fa-solid fa-robot"></i> MBA in AI</a>
                <a href="/bba"><i class="fa-solid fa-user-tie"></i> Top-up BBA</a>
                <a href="/fullbba"><i class="fa-solid fa-user-graduate"></i> Full BBA</a>
                <a href="/dual-dba"><i class="fa-solid fa-award"></i> Dual DBA</a>
            </div>
        </div>
        <div class="mobile-dropdown">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
                Chính sách
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="/ho-tro-tai-chinh-sacombank"><i class="fa-solid fa-circle-dollar-to-slot"></i> Trả góp học phí</a>
                <a href="/voucher"><i class="fa-solid fa-ticket"></i> IDEAS Voucher</a>
                <a href="/cac-khoan-chi-phi"><i class="fa-solid fa-file-invoice-dollar"></i> Các khoản chi phí</a>
                <a href="/ideas-ambassador"><i class="fa-solid fa-user-graduate"></i> IDEAS Ambassador</a>
            </div>
        </div>
        <div class="mobile-dropdown">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
                Bản tin
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-menu">
                <a href="/bai-viet"><i class="fa-solid fa-newspaper"></i> Bài viết</a>
                <a href="/dong-su-kien#chuyen-di"><i class="fa-solid fa-plane-departure"></i> Chuyến đi</a>
                <a href="/ideas-talk"><i class="fa-solid fa-globe"></i> Webinar</a>
                <a href="/ideas-podcast-series-01"><i class="fa-solid fa-microphone-lines"></i> Podcast</a>
            </div>
        </div>
        <div style="padding:20px; margin-top:20px;">
            <a href="/dat-lich" class="nav-cta" style="display:block; text-align:center; width:100%;">Nhận tư vấn</a>
        </div>
    </div>

    <!-- Hero Area -->
    <section class="history-hero">
        <div class="counters-bg" style="background-image: linear-gradient(135deg, rgba(110, 8, 0, 0.96) 0%, rgba(8, 12, 21, 0.98) 100%), url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');"></div>
        <div class="container" style="position: relative; z-index: 3;">
            <div class="history-hero-badge">
                <i class="fa-solid fa-landmark"></i>
                Hành Trình Kiến Tạo
            </div>
            <h1>Hành Trình <span>Phát Triển</span></h1>
            <p>Hơn 15 năm kinh nghiệm đồng hành cùng học viên Việt Nam chinh phục các chương trình sau Đại học tại các trường đại học quốc tế danh tiếng.</p>
        </div>
    </section>

    <!-- Timeline Section -->
    <main class="timeline-section">
        <div class="timeline-container">
            
            <!-- 2010 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2010</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2010</span>
                    <h3>Tiền thân của Viện IDEAS là Viện IBM</h3>
                    <p>Thành lập Viện Quản lý Kinh doanh Quốc tế (Viện IBM) với sứ mệnh đào tạo đội ngũ nhà quản lý chuyên nghiệp, đáp ứng nhu cầu khắt khe của thị trường nhân lực chất lượng cao tại Việt Nam.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Đánh dấu cột mốc đầu tiên của Viện</li>
                        <li><i class="fa-solid fa-check"></i> Vượt qua khó khăn, khẳng định chất lượng & thương hiệu</li>
                        <li><i class="fa-solid fa-check"></i> Mở rộng hợp tác đào tạo quốc tế</li>
                    </ul>
                    <div class="timeline-images">
                        <img class="wlogo" src="https://static.ybox.vn/2015/12/IBM.png" alt="Viện IBM" />
                    </div>
                </div>
            </div>

            <!-- 2013 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2013</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2013</span>
                    <h3>Đối tác khoa học của trường Đại học UBIS</h3>
                    <p>Một bước ngoặt lớn trong đào tạo quản trị kinh doanh quốc tế tại Việt Nam khi Viện trở thành đối tác khoa học chính thức của Đại học UBIS (Thụy Sĩ) cho chương trình MBA Online.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Đạt kiểm định quốc tế uy tín: IACBE, CHEA</li>
                        <li><i class="fa-solid fa-check"></i> Thành viên tổ chức giáo dục hàng đầu EFMD, ECBE, AACSB</li>
                    </ul>
                    <div class="timeline-images">
                        <img src="https://images2.thanhnien.vn/528068263637045248/2023/4/19/hinh-1-1681901533615728171371.jpg" alt="Hợp tác UBIS" />
                    </div>
                </div>
            </div>

            <!-- 2016 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2016</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2016</span>
                    <h3>Đối tác khoa học chiến lược tại Châu Á</h3>
                    <p>Vị thế của Viện tiếp tục được củng cố vượt bậc khi được các trường Đại học Polonia (Ba Lan), Học viện Quản Lý và Luật St. Petersburg (Nga) và Học viện quản lý các dự án giáo dục (Nga) công nhận là đối tác khoa học quan trọng nhất tại Việt Nam và Châu Á.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Cung cấp chương trình đào tạo MBA chuẩn Châu Âu</li>
                        <li><i class="fa-solid fa-check"></i> Đáp ứng hoàn hảo nhu cầu học tập của học viên Việt Nam</li>
                    </ul>
                </div>
            </div>

            <!-- 2021 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2021</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2021</span>
                    <h3>Cột mốc hơn 1300 học viên MBA UBIS</h3>
                    <p>Liên kết thành công 48 khóa đào tạo MBA hợp tác cùng UBIS với tổng số hơn 1300 học viên tốt nghiệp và theo học. IDEAS đóng vai trò như một Local Service đồng hành hỗ trợ học vụ trọn vẹn.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Chương trình học trực tuyến tối ưu thời gian và chi phí</li>
                        <li><i class="fa-solid fa-check"></i> Hỗ trợ học vụ chu đáo, chuyên nghiệp suốt khóa học</li>
                    </ul>
                    <div class="timeline-images">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/ideas_ubis_2021.webp" alt="IDEAS UBIS 2021" />
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/16206769212.jpg" alt="Lễ tốt nghiệp UBIS" />
                    </div>
                </div>
            </div>

            <!-- 2022 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2022</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2022</span>
                    <h3>Chuyển đổi thành Viện IDEAS – Sáng tạo & Đổi mới</h3>
                    <p>Nhằm đáp ứng xu hướng toàn cầu và cống hiến mạnh mẽ hơn cho cộng đồng doanh nghiệp Việt Nam, Viện IBM chuyển đổi mô hình và đổi mới thương hiệu thành Viện Nghiên Cứu Phát triển và Trao đổi Khoa học Ứng dụng (Viện IDEAS).</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Hợp tác mở rộng các chương trình chất lượng cao mới: SBS Swiss Business School, Swiss UMEF, Ascencia Business School.</li>
                        <li><i class="fa-solid fa-check"></i> Đào tạo thực tiễn, định hướng tư duy khai phóng toàn diện.</li>
                    </ul>
                    <div class="timeline-images">
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/ideas-02.png" alt="Logo IDEAS" />
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/01/416256674_837845658141991_5379123310787471174_n.jpg" alt="Lễ tốt nghiệp Ascencia 2024" />
                    </div>
                </div>
            </div>

            <!-- 2024 Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2024</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2024</span>
                    <h3>Đối tác toàn diện của College de Paris và Swiss UMEF</h3>
                    <p>Viện IDEAS chính thức nâng tầm mối quan hệ chiến lược lên đối tác toàn diện của College de Paris (sở hữu Ascencia Business School) và trường Swiss UMEF tại Việt Nam, mở rộng các chương trình Thạc sĩ & Tiến sĩ quốc tế.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Hỗ trợ học vụ tối đa cho học viên học chương trình quốc tế</li>
                        <li><i class="fa-solid fa-check"></i> Tổ chức các đoàn lễ tốt nghiệp sang Thụy Sĩ, Pháp, Hoa Kỳ</li>
                    </ul>
                    <div class="timeline-images wlogos">
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/uploads/2023/07/Logo-Swiss-UMEF.webp" alt="Swiss UMEF" />
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/uploads/2024/03/Logo-Ascencia-Business-School-1.png" alt="Ascencia BS" />
                        <img class="wlogo" src="https://www.collegedeparis.fr/wp-content/uploads/2021/06/cdp-formation-continue.png" alt="College de Paris" />
                    </div>
                    <div class="timeline-images" style="margin-top: 15px;">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/11/8X1A9328-1-1.jpg" alt="Sự kiện ký kết" />
                        <img src="https://ideas.edu.vn/wp-content/uploads/2024/10/Totnghiepumef.jpg" alt="Lễ tốt nghiệp UMEF" />
                    </div>
                </div>
            </div>

            <!-- 2025+ Milestone -->
            <div class="timeline-item">
                <div class="timeline-year-badge">2025 +</div>
                <div class="timeline-dot"></div>
                <div class="timeline-card">
                    <span class="timeline-card-year">Năm 2025 +</span>
                    <h3>Nắm bắt xu thế mới trong thời đại AI</h3>
                    <p>Trước làn sóng trí tuệ nhân tạo (AI) định hình lại nền kinh tế toàn cầu, Viện IDEAS tiên phong tích cực ứng dụng AI và đưa chương trình Thạc sĩ Khoa học Trí tuệ Nhân tạo Ứng dụng (MSc AI) của Swiss UMEF về Việt Nam.</p>
                    <ul>
                        <li><i class="fa-solid fa-check"></i> Ký kết hợp tác chiến lược cùng trường ESTIAM (Pháp) vào ngày 26/02/2025</li>
                        <li><i class="fa-solid fa-check"></i> Mở rộng đào tạo đa dạng từ Cử nhân đến Thạc sĩ & Tiến sĩ công nghệ</li>
                    </ul>
                    <div class="timeline-images">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/AI.jpg" alt="Trí tuệ nhân tạo AI" />
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/uploads/2025/03/estiam.png" alt="ESTIAM Paris" />
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Custom Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.getElementById('hamburger');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileOverlay = document.getElementById('mobile-overlay');
            const closeBtn = document.getElementById('mobile-menu-close');

            if (hamburger && mobileMenu && mobileOverlay) {
                function openMenu() {
                    mobileMenu.classList.add('active');
                    mobileOverlay.classList.add('active');
                    mobileMenu.setAttribute('aria-hidden', 'false');
                    document.body.style.overflow = 'hidden';
                }

                function closeMenu() {
                    mobileMenu.classList.remove('active');
                    mobileOverlay.classList.remove('active');
                    mobileMenu.setAttribute('aria-hidden', 'true');
                    document.body.style.overflow = '';
                }

                hamburger.addEventListener('click', openMenu);
                closeBtn?.addEventListener('click', closeMenu);
                mobileOverlay.addEventListener('click', closeMenu);
            }

            // Mobile dropdown toggle
            const toggles = document.querySelectorAll('.mobile-dropdown-toggle');
            toggles.forEach(toggle => {
                toggle.addEventListener('click', function() {
                    const menu = this.nextElementSibling;
                    const isOpen = this.getAttribute('aria-expanded') === 'true';
                    
                    this.setAttribute('aria-expanded', !isOpen);
                    if (menu) {
                        menu.classList.toggle('active');
                    }
                });
            });
        });
    </script>

    <?php get_footer(); ?>
