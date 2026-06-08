<?php
/**
 * The template for displaying search results pages
 */
global $wp;
global $wp_query;

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
    <title>Kết quả tìm kiếm cho: <?php echo esc_attr(get_search_query()); ?> | <?php bloginfo('name'); ?></title>
    
    <meta name="description" content="Kết quả tìm kiếm cho từ khóa <?php echo esc_attr(get_search_query()); ?> tại website IDEAS.">
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Kết quả tìm kiếm: <?php echo esc_attr(get_search_query()); ?> | IDEAS" />
    <meta property="og:description" content="Kết quả tìm kiếm cho từ khóa <?php echo esc_attr(get_search_query()); ?> tại website IDEAS." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />
    
    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="Kết quả tìm kiếm: <?php echo esc_attr(get_search_query()); ?> | IDEAS" />
    <meta name="twitter:description" content="Kết quả tìm kiếm cho từ khóa <?php echo esc_attr(get_search_query()); ?> tại website IDEAS." />
    <meta name="twitter:image" content="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp" />

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

        /* Modern Archive UI/UX Styles */
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f8fafc;
            color: #1e293b;
        }

        /* Hero Header */
        .blog-archive-hero {
            background: #0f172a;
            padding: 140px 20px 90px;
            text-align: center;
            position: relative;
            color: #ffffff;
            overflow: hidden;
            border-bottom: 4px solid #ab0e00;
        }
        
        .counters-bg {
            position: absolute;
            top: -150px;
            left: -10%;
            width: 120%;
            height: calc(100% + 300px);
            background-size: cover;
            background-position: center;
            filter: blur(1.5px);
            will-change: transform;
            transform: translate3d(0, 0, 0) scale(1.15);
            z-index: 1;
            opacity: 0.85;
        }

        /* Search bar styles */
        .archive-search-form {
            max-width: 600px;
            margin: 30px auto 0;
            position: relative;
            z-index: 5;
        }

        .search-input-wrap {
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-radius: 100px;
            padding: 6px 6px 6px 20px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
        }

        .search-input-wrap:focus-within {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.45);
            box-shadow: 0 10px 35px rgba(171, 14, 0, 0.25);
        }

        .search-icon {
            color: rgba(255, 255, 255, 0.65);
            font-size: 1.1rem;
            margin-right: 12px;
            flex-shrink: 0;
        }

        .search-input {
            background: transparent;
            border: none;
            outline: none;
            color: #ffffff;
            font-size: 1rem;
            width: 100%;
            padding: 8px 0;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .search-btn {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            border: none;
            padding: 10px 24px;
            border-radius: 100px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s ease;
            white-space: nowrap;
        }

        .search-btn:hover {
            opacity: 0.95;
            transform: scale(1.02);
            box-shadow: 0 4px 15px rgba(171, 14, 0, 0.4);
        }

        .blog-archive-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3rem);
            font-weight: 800;
            margin-bottom: 16px;
            letter-spacing: -0.02em;
            position: relative;
            z-index: 3;
            color: #ffffff;
        }
        .blog-archive-hero p {
            font-size: 1.05rem;
            color: rgba(255, 255, 255, 0.85);
            max-width: 650px;
            margin: 0 auto;
            position: relative;
            z-index: 3;
            line-height: 1.5;
        }

        /* Main layout wrapper */
        .post-layout-wrapper {
            max-width: 1320px;
            margin: 50px auto 80px;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 350px;
            gap: 40px;
        }

        @media (max-width: 992px) {
            .post-layout-wrapper {
                grid-template-columns: 1fr;
                margin: 40px auto;
                gap: 30px;
            }
        }

        /* Featured Post Card Style */
        .blog-featured-card {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
            display: grid;
            grid-template-columns: 1.25fr 1fr;
            overflow: hidden;
            margin-bottom: 40px;
            transition: all 0.4s ease;
            text-decoration: none;
            color: inherit;
        }
        .blog-featured-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
        }
        .blog-featured-card .featured-img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16 / 10;
        }
        .blog-featured-card .featured-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .blog-featured-card:hover .featured-img-wrap img {
            transform: scale(1.025);
        }
        .blog-featured-card .featured-body {
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }
        .featured-tag {
            background: #fef2f2;
            color: #ab0e00;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 16px;
        }
        .blog-featured-card h2 {
            font-size: 1.75rem;
            font-weight: 800;
            color: #0f172a;
            line-height: 1.35;
            margin-bottom: 16px;
            transition: color 0.3s ease;
        }
        .blog-featured-card:hover h2 {
            color: #ab0e00;
        }
        .blog-featured-card p {
            color: #475569;
            font-size: 0.95rem;
            line-height: 1.6;
            margin-bottom: 24px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-featured-card .meta-row {
            display: flex;
            gap: 16px;
            color: #64748b;
            font-size: 0.85rem;
        }

        /* Post Grid */
        .blog-grid-inner {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 30px;
        }
        
        .blog-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.02);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s ease;
            text-decoration: none;
            color: inherit;
        }
        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.15);
        }
        .blog-card .card-img-wrap {
            position: relative;
            overflow: hidden;
            aspect-ratio: 16 / 9;
            background: #f1f5f9;
        }
        .blog-card .card-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .blog-card:hover .card-img-wrap img {
            transform: scale(1.03);
        }
        .blog-card .card-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }
        .blog-card .card-tag {
            color: #ab0e00;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
        }
        .blog-card h3 {
            font-size: 1.15rem;
            font-weight: 700;
            line-height: 1.4;
            color: #0f172a;
            margin-bottom: 12px;
            transition: color 0.3s ease;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card:hover h3 {
            color: #ab0e00;
        }
        .blog-card p {
            color: #475569;
            font-size: 0.88rem;
            line-height: 1.6;
            margin-bottom: 20px;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        .blog-card .card-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: #64748b;
            margin-top: auto;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
        }
        .blog-card .read-more {
            color: #ab0e00;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
            transition: gap 0.2s;
        }
        .blog-card:hover .read-more {
            gap: 10px;
        }

        /* Modern Pagination */
        .blog-pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 50px;
        }
        .blog-pagination a,
        .blog-pagination span {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
            padding: 0 12px;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
            background: #ffffff;
            color: #475569;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .blog-pagination a:hover {
            border-color: #ab0e00;
            color: #ab0e00;
            transform: translateY(-1px);
        }
        .blog-pagination span.current {
            background: #ab0e00;
            border-color: #ab0e00;
            color: #ffffff;
        }

        @media (max-width: 992px) {
            .blog-featured-card {
                grid-template-columns: 1fr;
            }
            .blog-featured-card .featured-body {
                padding: 30px;
            }
            .blog-grid-inner {
                grid-template-columns: 1fr;
            }
        }

        /* Sidebar Styling */
        aside {
            position: sticky;
            top: 90px;
            align-self: start;
            max-height: calc(100vh - 120px);
            overflow-y: auto;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
            transition: top 0.3s ease, max-height 0.3s ease;
        }

        aside::-webkit-scrollbar {
            width: 0 !important;
            height: 0 !important;
            display: none !important;
        }

        .sidebar-wrapper {
            display: flex;
            flex-direction: column;
            gap: 30px;
        }

        .sidebar-widget {
            background: #ffffff;
            border-radius: 20px;
            padding: 30px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
        }

        .widget-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 20px;
            position: relative;
            padding-bottom: 12px;
            border-bottom: 2px solid #f1f5f9;
        }

        .widget-title::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -2px;
            width: 40px;
            height: 2px;
            background: #ab0e00;
        }

        /* Sidebar Form inputs */
        .ideas-widget-form {
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .ideas-widget-form input,
        .ideas-widget-form select,
        .ideas-widget-form textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            font-size: 0.9rem;
            font-family: inherit;
            color: #1e293b;
            background: #f8fafc;
            outline: none;
            transition: all 0.2s ease;
        }

        .ideas-widget-form input:focus,
        .ideas-widget-form select:focus,
        .ideas-widget-form textarea:focus {
            border-color: #ab0e00;
            background: #ffffff;
            box-shadow: 0 0 0 3px rgba(171, 14, 0, 0.08);
        }

        .ideas-widget-form button {
            background: var(--grad-primary, linear-gradient(135deg, #ab0e00, #ff3600));
            color: #ffffff;
            border: none;
            padding: 14px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: transform 0.2s, opacity 0.2s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            margin-top: 8px;
        }

        .ideas-widget-form button:hover {
            opacity: 0.95;
            transform: translateY(-1px);
        }

        .sidebar-course-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .sidebar-course-item {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            transition: all 0.2s;
            padding: 8px;
            border-radius: 10px;
        }

        .sidebar-course-item:hover {
            background: #f8fafc;
        }

        .sidebar-course-img {
            width: 60px;
            height: 60px;
            border-radius: 8px;
            object-fit: cover;
        }

        .sidebar-course-title {
            font-size: 0.92rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 2px;
        }

        .sidebar-course-desc {
            font-size: 0.78rem;
            color: #64748b;
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <?php get_template_part('header-new'); // Or whatever custom header call blankslate uses ?>
    
    <!-- If blankslate doesn't use header-new, fallback to default header markup -->
    <?php
    // In blankslate, the header markup is typically in header.php which is loaded by default
    // Our template already contains the full premium responsive header so we do not call get_header()
    // to avoid duplicating menus and tags.
    ?>
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
                <a href="/voucher" class="mobile-dropdown-item-simple">
                    <i class="fa-solid fa-ticket"></i> <span>IDEAS Voucher</span>
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

    <!-- Banner Hero Area -->
    <section class="blog-archive-hero">
        <div class="counters-bg" style="background-image: linear-gradient(135deg, rgba(185, 14, 0, 0.92) 0%, rgba(15, 23, 42, 0.9) 100%), url('https://ideas.edu.vn/wp-content/uploads/2026/01/ltn27122025.webp');"></div>
        <div class="container" style="position: relative; z-index: 3;">
            <h1>Kết quả tìm kiếm</h1>
            <p>Tìm thấy <?php echo $wp_query->found_posts; ?> bài viết khớp với từ khóa: "<strong><?php echo esc_html(get_search_query()); ?></strong>"</p>
            
            <!-- Search bar -->
            <form role="search" method="get" class="archive-search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <div class="search-input-wrap">
                    <i class="fa-solid fa-magnifying-glass search-icon"></i>
                    <input type="search" class="search-input" placeholder="Tìm kiếm bài viết..." value="<?php echo get_search_query(); ?>" name="s" required />
                    <button type="submit" class="search-btn">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </section>

    <!-- Main Content Layout -->
    <div class="post-layout-wrapper">
        <main>
            <?php
            if (have_posts()) {
                echo '<div class="blog-grid-inner">';
                while (have_posts()) : the_post();
                    $post_img = get_the_post_thumbnail_url(get_the_ID(), 'medium_large');
                    if (!$post_img) {
                        $content = get_the_content();
                        preg_match_all('/<img.+?src=[\'"]([^\'"]+)[\'"].*?>/i', $content, $matches);
                        $post_img = isset($matches[1][0]) ? $matches[1][0] : 'https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp';
                    }
                    
                    $excerpt = get_the_excerpt();
                    if (empty($excerpt)) {
                        $excerpt = wp_strip_all_tags(wp_trim_words(get_the_content(), 22));
                    }
                    ?>
                    <a href="<?php the_permalink(); ?>" class="blog-card">
                        <div class="card-img-wrap skeleton">
                            <img src="<?php echo esc_url($post_img); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" onload="this.parentElement.classList.remove('skeleton')">
                        </div>
                        <div class="card-body">
                            <?php
                            $categories = get_the_category();
                            if (!empty($categories)) {
                                echo '<span class="card-tag">' . esc_html($categories[0]->name) . '</span>';
                            }
                            ?>
                            <h3><?php the_title(); ?></h3>
                            <p><?php echo esc_html($excerpt); ?></p>
                            <div class="card-meta">
                                <span><i class="fa-regular fa-calendar-days" style="color:#ab0e00; margin-right:4px;"></i> <?php echo get_the_date('d/m/Y'); ?></span>
                                <span class="read-more">Đọc tiếp <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                    <?php
                endwhile;
                echo '</div>'; // End Grid

                // Render Modern Pagination
                $pagination_links = paginate_links(array(
                    'type'      => 'array',
                    'prev_text' => '<i class="fa-solid fa-chevron-left"></i>',
                    'next_text' => '<i class="fa-solid fa-chevron-right"></i>',
                ));
                
                if (!empty($pagination_links)) {
                    echo '<div class="blog-pagination">';
                    foreach ($pagination_links as $link) {
                        echo $link;
                    }
                    echo '</div>';
                }
            } else {
                ?>
                <p style="text-align: center; padding: 60px 0; color: #64748b; font-weight: 500;">Không tìm thấy bài viết phù hợp với từ khóa của bạn.</p>
                <?php
            }
            ?>
        </main>

        <!-- Sidebar Section -->
        <aside>
            <div class="sidebar-wrapper">
                
                <!-- Quick Register Consultation Widget (Parity with single.php) -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Đăng ký tư vấn lộ trình</h3>
                    <form class="ideas-widget-form">
                        <input type="text" placeholder="Họ và tên của bạn" required>
                        <input type="email" placeholder="Địa chỉ Email" required>
                        <input type="tel" placeholder="Số điện thoại" required>
                        <select required>
                            <option value="" disabled selected hidden>Chương trình quan tâm</option>
                            <option value="Top-up BBA">Top-up BBA (Cử nhân liên thông 12 tháng)</option>
                            <option value="Full BBA">Full BBA (Cử nhân QTKD 3 năm)</option>
                            <option value="Online MBA">Online MBA (Thạc sĩ QTKD)</option>
                            <option value="Executive MBA">Executive MBA (Thạc sĩ điều hành)</option>
                            <option value="MBA in AI">MBA in AI (Thạc sĩ QTKD Ứng dụng AI)</option>
                            <option value="MSc AI">MSc AI (Thạc sĩ AI ứng dụng)</option>
                            <option value="Dual DBA">Dual DBA (Tiến sĩ song bằng Pháp & Anh)</option>
                        </select>
                        <textarea rows="3" placeholder="Ghi chú về kinh nghiệm, nhu cầu của bạn..."></textarea>
                        <button type="submit"><i class="fa-solid fa-paper-plane"></i> Đăng ký ngay</button>
                    </form>
                </div>

                <!-- Suggested Programs Widget -->
                <div class="sidebar-widget">
                    <h3 class="widget-title">Chương trình đào tạo</h3>
                    <div class="sidebar-course-list">
                        <a href="/bba" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/02/TOPUP.webp" alt="Top-up BBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Top-up BBA</h4>
                                <p class="sidebar-course-desc">Liên thông Cử nhân 12 tháng</p>
                            </div>
                        </a>
                        <a href="/fullbba" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/online_bba.webp" alt="Full BBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Full BBA</h4>
                                <p class="sidebar-course-desc">Cử nhân QTKD Thụy Sĩ</p>
                            </div>
                        </a>
                        <a href="/mba" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/online-mba-1.png.webp" alt="Online MBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Online MBA</h4>
                                <p class="sidebar-course-desc">Thạc sĩ QTKD Trực tuyến</p>
                            </div>
                        </a>
                        <a href="/emba" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/emba.png.webp" alt="Executive MBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Executive MBA</h4>
                                <p class="sidebar-course-desc">Thạc sĩ điều hành QTKD</p>
                            </div>
                        </a>
                        <a href="/mbainai" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/mba_in_ai.webp" alt="MBA in AI" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">MBA in AI</h4>
                                <p class="sidebar-course-desc">Thạc sĩ QTKD Ứng dụng AI</p>
                            </div>
                        </a>
                        <a href="/mscai" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/mscai.png.webp" alt="MSc AI" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Master AI (MSc AI)</h4>
                                <p class="sidebar-course-desc">Thạc sĩ AI ứng dụng</p>
                            </div>
                        </a>
                        <a href="/dual-dba" class="sidebar-course-item">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/10/Dual-DBA.webp" alt="Dual DBA" class="sidebar-course-img">
                            <div>
                                <h4 class="sidebar-course-title">Dual DBA</h4>
                                <p class="sidebar-course-desc">Tiến sĩ song bằng Pháp & Anh</p>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </aside>
    </div>

    <!-- Script imports -->
    <?php 
    $js_path = get_stylesheet_directory() . '/common-assets/js/script.min.js';
    $js_version = file_exists($js_path) ? filemtime($js_path) : time();
    ?>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/js/script.min.js?v=<?php echo $js_version; ?>" defer></script>
    
    <!-- Sidebar Sticky Alignment Script on Scroll -->
    <script>
        let lastScrollTop = 0;
        window.addEventListener('scroll', () => {
            const asideEl = document.querySelector('aside');
            const header = document.getElementById('site-header');
            if (!asideEl) return;
            
            let st = window.pageYOffset || document.documentElement.scrollTop;
            let headerHidden = false;
            
            if (header) {
                if (header.classList.contains('nav-up') || header.classList.contains('hidden')) {
                    headerHidden = true;
                } else {
                    const rect = header.getBoundingClientRect();
                    if (rect.bottom <= 0) {
                        headerHidden = true;
                    }
                }
            } else {
                if (st > lastScrollTop && st > 150) {
                    headerHidden = true;
                } else if (st < lastScrollTop) {
                    headerHidden = false;
                }
            }
            
            if (headerHidden) {
                asideEl.style.top = '20px';
                asideEl.style.maxHeight = 'calc(100vh - 40px)';
            } else {
                asideEl.style.top = '90px';
                asideEl.style.maxHeight = 'calc(100vh - 120px)';
            }
            
            lastScrollTop = st <= 0 ? 0 : st;
        }, { passive: true });

        // Sidebar inline form submission logic (parity with single.php)
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.querySelector('.ideas-widget-form');
            if (!form) return;
            
            form.addEventListener('submit', async (e) => {
                e.preventDefault();
                
                const name = form.querySelector('input[type="text"]').value.trim();
                const email = form.querySelector('input[type="email"]').value.trim();
                const phone = form.querySelector('input[type="tel"]').value.trim();
                const program = form.querySelector('select').value;
                const note = form.querySelector('textarea').value.trim();
                
                if (!name || !email || !phone || !program) {
                    alert('Vui lòng điền đầy đủ các thông tin bắt buộc.');
                    return;
                }
                
                let sourceVal = "Landing_Blog_Search";
                let chuongTrinhVal = program;
                
                // Prefill source mapping based on selected program
                if (program.startsWith("Top-up BBA")) {
                    sourceVal = "Landing_BBA_Topup";
                    chuongTrinhVal = "Online Top-up BBA";
                } else if (program.startsWith("Full BBA")) {
                    sourceVal = "Landing_BBA_Full";
                    chuongTrinhVal = "Online Full BBA";
                } else if (program.startsWith("Online MBA")) {
                    sourceVal = "Landing_MBA";
                    chuongTrinhVal = "Online MBA";
                } else if (program.startsWith("Executive MBA")) {
                    sourceVal = "Landing_EMBA";
                    chuongTrinhVal = "Online EMBA";
                } else if (program.startsWith("MBA in AI")) {
                    sourceVal = "Landing_MBA_AI";
                    chuongTrinhVal = "Online MBA in AI";
                } else if (program.startsWith("MSc AI")) {
                    sourceVal = "Landing_MSc_AI";
                    chuongTrinhVal = "Online MSc AI";
                } else if (program.startsWith("Dual DBA")) {
                    sourceVal = "Landing_Dual_DBA";
                    chuongTrinhVal = "Online Dual DBA";
                }

                // Core API Submission (Payload 1)
                const payload = {
                    form_id: "4fe1eeb0570742a1fdde61af6fc0680c",
                    email: email,
                    firstName: name,
                    phoneNumber: phone,
                    time_dat_lich: "",
                    note_dat_lich: note ? `${program} | ${note}` : program,
                    chuong_trinh_dat_lich: chuongTrinhVal
                };
                
                // Webhook Submission (Payload 2)
                const webhookPayload = {
                    name: name,
                    phone: phone,
                    email: email,
                    source: sourceVal,
                    type: "tu_van_inline",
                    tieng_anh: "",
                    hoc_van: "",
                    time_dat_lich: "",
                    chuong_trinh: chuongTrinhVal,
                    nhu_cau: note ? `Đăng ký từ sidebar: ${program} - ${note}` : `Đăng ký từ sidebar: ${program}`
                };
                
                // Bind UTM parameters
                const urlParams = new URLSearchParams(window.location.search);
                const utmParams = ['utm_campaign', 'utm_source', 'utm_medium', 'utm_content', 'utm_term'];
                utmParams.forEach(param => {
                    const val = urlParams.get(param);
                    if (val) webhookPayload[param] = val;
                });
                
                const btn = form.querySelector('button[type="submit"]');
                const origText = btn.innerHTML;
                btn.disabled = true;
                btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Đang gửi...';
                
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
                
                try {
                    await Promise.allSettled([p1, p2]);
                    
                    // Trigger Google Ads Conversion event
                    if (typeof window.gtag === 'function') {
                        window.gtag('event', 'conversion', {
                            'send_to': 'AW-11205917800/mdXJCOTL-bccEOj4st8p',
                            'value': 1.0,
                            'currency': 'VND'
                        });
                        console.log('Google Ads Conversion Event measured.');
                    }
                    
                    alert('Đăng ký tư vấn thành công! IDEAS sẽ sớm liên hệ với bạn.');
                    form.reset();
                } catch (err) {
                    console.error('Submission failed:', err);
                    alert('Đã xảy ra sự cố khi đăng ký. Vui lòng liên hệ hotline.');
                } finally {
                    btn.disabled = false;
                    btn.innerHTML = origText;
                }
            });
        });
    </script>
    <?php get_footer(); ?>
</body>
</html>
