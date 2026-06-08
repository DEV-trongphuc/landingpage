<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
global $wp;

// Dequeue unwanted old CSS styles (via WordPress API - catches enqueued styles)
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
    <title>404 - Không tìm thấy trang | <?php bloginfo('name'); ?></title>
    
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

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
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* 404 Section styling */
        .error-page-wrapper {
            min-height: calc(100vh - 90px);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 120px 20px 80px;
            position: relative;
            background: radial-gradient(circle at 80% 20%, rgba(171, 14, 0, 0.03) 0%, transparent 50%), 
                        radial-gradient(circle at 10% 80%, rgba(99, 58, 230, 0.03) 0%, transparent 50%),
                        #f8fafc;
            overflow: hidden;
        }

        .error-container {
            max-width: 650px;
            width: 100%;
            text-align: center;
            position: relative;
            z-index: 5;
            background: #ffffff;
            padding: 60px 40px;
            border-radius: 32px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 20px 50px rgba(15, 23, 42, 0.04);
        }

        @media (max-width: 768px) {
            .error-page-wrapper {
                padding: 110px 16px 60px !important;
            }
            .error-container {
                padding: 40px 20px;
                border-radius: 24px;
            }
        }

        /* Glowing Orbs */
        .error-orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            -webkit-filter: blur(80px);
            pointer-events: none;
            z-index: 1;
        }
        
        .error-orb-1 {
            width: 300px;
            height: 300px;
            background: rgba(171, 14, 0, 0.12);
            top: 10%;
            left: 20%;
        }

        .error-orb-2 {
            width: 250px;
            height: 250px;
            background: rgba(99, 58, 230, 0.08);
            bottom: 10%;
            right: 15%;
        }

        .error-code {
            font-size: clamp(6rem, 15vw, 9rem);
            font-weight: 900;
            line-height: 0.95;
            background: linear-gradient(135deg, #ab0e00 0%, #ff3600 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 24px;
            letter-spacing: -0.04em;
            display: inline-block;
            animation: pulse-gentle 3s infinite alternate;
        }

        @keyframes pulse-gentle {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.03);
            }
        }

        .error-container h1 {
            font-size: clamp(1.5rem, 4vw, 2rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: 16px;
            letter-spacing: -0.01em;
        }

        .error-container p {
            font-size: 1.05rem;
            color: #475569;
            line-height: 1.6;
            margin-bottom: 35px;
        }

        /* Search Form Custom */
        .error-search-form {
            max-width: 500px;
            margin: 0 auto 35px;
        }

        .error-search-wrap {
            display: flex;
            align-items: center;
            background: #f1f5f9;
            border: 1px solid #e2e8f0;
            border-radius: 100px;
            padding: 5px 5px 5px 18px;
            transition: all 0.3s ease;
        }

        .error-search-wrap:focus-within {
            background: #ffffff;
            border-color: #ab0e00;
            box-shadow: 0 0 0 4px rgba(171, 14, 0, 0.08);
        }

        .error-search-icon {
            color: #64748b;
            font-size: 1rem;
            margin-right: 10px;
            flex-shrink: 0;
        }

        .error-search-input {
            background: transparent;
            border: none;
            outline: none;
            color: #1e293b;
            font-size: 0.95rem;
            width: 100%;
            padding: 8px 0;
        }

        .error-search-btn {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            border: none;
            padding: 9px 20px;
            border-radius: 100px;
            font-weight: 600;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .error-search-btn:hover {
            opacity: 0.95;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.25);
        }

        /* CTA buttons */
        .error-actions {
            display: flex;
            gap: 16px;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .btn-404 {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.95rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .btn-404-primary {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.2);
        }

        .btn-404-primary:hover {
            opacity: 0.95;
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.3);
        }

        .btn-404-secondary {
            background: #ffffff;
            color: #1e293b;
            border: 1.5px solid #e2e8f0;
        }

        .btn-404-secondary:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-2px);
            background: #fffdfd;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- Main Header -->
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
        <div class="mobile-dropdown">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="false">
                Giới thiệu
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-content">
                <a href="/he-thong-ho-tro-hoc-tap-lms-ideas" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-layer-group"></i> <span>Hệ thống LMS</span>
                </a>
                <a href="/so-do-to-chuc" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-sitemap"></i> <span>Cơ cấu tổ chức</span>
                </a>
                <a href="/doi-ngu-giang-vien" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-user-graduate"></i> <span>Hội đồng chuyên môn</span>
                </a>
                <a href="/dong-su-kien" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-clock"></i> <span>Dòng sự kiện</span>
                </a>
                <a href="/lich-su-hinh-thanh-va-phat-trien-vien-ideas" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-landmark"></i> <span>Lịch sử phát triển</span>
                </a>
            </div>
        </div>
        <div class="mobile-dropdown expanded expanded-default">
            <button type="button" class="mobile-dropdown-toggle" aria-expanded="true">
                Chương trình
                <svg class="dropdown-arrow" width="10" height="6" viewBox="0 0 10 6" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
            </button>
            <div class="mobile-dropdown-content">
                <div class="mobile-dropdown-section">
                    <div class="mobile-section-title">Thạc sĩ</div>
                    <a href="/mba" class="mobile-dropdown-item">
                        <img class="item-avatar"
                            src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1.png.webp" alt="Online MBA"
                            loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Online MBA</div>
                            <div class="item-desc">Thạc sĩ QTKD Trực tuyến</div>
                        </div>
                    </a>
                    <a href="/emba" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba.png.webp"
                            alt="Executive MBA" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Executive MBA</div>
                            <div class="item-desc">Thạc sĩ điều hành QTKD trực tuyến</div>
                        </div>
                    </a>
                    <a href="/mscai" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai.png.webp"
                            alt="Master AI" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Master AI (MSc AI)</div>
                            <div class="item-desc">Thạc sĩ AI ứng dụng</div>
                        </div>
                    </a>
                    <a href="/mbainai" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai.webp"
                            alt="MBA in AI" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">MBA in AI</div>
                            <div class="item-desc">Thạc sĩ QTKD Ứng dụng AI</div>
                        </div>
                    </a>
                </div>
                <div class="mobile-dropdown-section">
                    <div class="mobile-section-title">Cử nhân &amp; Tiến sĩ</div>
                    <a href="/bba" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP.webp"
                            alt="Top-up BBA" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Top-up BBA</div>
                            <div class="item-desc">Liên thông Cử nhân 12 tháng</div>
                        </div>
                    </a>
                    <a href="/fullbba" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba.webp"
                            alt="Full BBA" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Full BBA</div>
                            <div class="item-desc">Cử nhân QTKD Thụy Sĩ</div>
                        </div>
                    </a>
                    <a href="/dual-dba" class="mobile-dropdown-item">
                        <img class="item-avatar" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5c9vyalfHcxNNvOrudO4IQ9qGHz8PC0GhVw&s"
                            alt="Dual DBA" loading="lazy" decoding="async" />
                        <div class="item-content">
                            <div class="item-title">Dual DBA</div>
                            <div class="item-desc">Tiến sĩ song bằng Pháp & Anh</div>
                        </div>
                    </a>
                </div>
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
            <div class="mobile-dropdown-content">
                <a href="/ho-tro-tai-chinh-sacombank" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-circle-dollar-to-slot"></i> <span>Trả góp học phí</span>
                </a>
                <a href="/cac-khoan-chi-phi" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-file-invoice-dollar"></i> <span>Các khoản chi phí</span>
                </a>
                <a href="/ideas-ambassador" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-user-graduate"></i> <span>IDEAS - Ambassador</span>
                </a>
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
            <div class="mobile-dropdown-content">
                <a href="/bai-viet" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-newspaper"></i> <span>Bài viết</span>
                </a>
                <a href="/dong-su-kien#chuyen-di" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-plane-departure"></i> <span>Chuyến đi</span>
                </a>
                <a href="/ideas-talk" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-globe"></i> <span>Webinar</span>
                </a>
                <a href="/ideas-podcast-series-01" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-microphone-lines"></i> <span>Podcast</span>
                </a>
            </div>
        </div>
        <a href="/dat-lich" class="nav-cta">Nhận tư vấn</a>
    </div>

    <!-- Main Content -->
    <div class="error-page-wrapper">
        <div class="error-orb error-orb-1"></div>
        <div class="error-orb error-orb-2"></div>
        
        <div class="error-container">
            <div class="error-code">404</div>
            <h1>Không Tìm Thấy Trang</h1>
            <p>Trang bạn đang tìm kiếm không tồn tại, đã bị xóa hoặc đã được di chuyển sang một đường dẫn khác. Hãy thử tìm kiếm bài viết bên dưới hoặc quay lại trang chủ.</p>
            
            <!-- Search bar -->
            <form role="search" method="get" class="error-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="error-search-wrap">
                    <i class="fa-solid fa-magnifying-glass error-search-icon"></i>
                    <input type="search" class="error-search-input" placeholder="Tìm kiếm thông tin trên website..." value="" name="s" required />
                    <button type="submit" class="error-search-btn">Tìm kiếm</button>
                </div>
            </form>

            <div class="error-actions">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn-404 btn-404-primary">
                    <i class="fa-solid fa-house"></i> Về trang chủ
                </a>
                <a href="/bai-viet" class="btn-404 btn-404-secondary">
                    <i class="fa-solid fa-newspaper"></i> Xem tin tức
                </a>
            </div>
        </div>
    </div>

    <!-- Script imports -->
    <?php 
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    
    <?php get_footer(); ?>
</body>
</html>
