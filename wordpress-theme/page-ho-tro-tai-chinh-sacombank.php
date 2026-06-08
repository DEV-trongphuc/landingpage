<?php
/**
 * The template for displaying the Sacombank installment support page
 * Template Name: Premium Sacombank Installment Template
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
    <title>Hỗ Trợ Tài Chính Sacombank – Trả Góp Học Phí 0% | Viện IDEAS</title>

    <meta name="description"
        content="Chương trình hỗ trợ tài chính liên kết giữa Viện IDEAS và Sacombank. Trả góp học phí lãi suất 0% từ 12 - 24 tháng cho chương trình MBA." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Hỗ Trợ Tài Chính Sacombank – Trả Góp Học Phí 0%" />
    <meta property="og:description"
        content="Đồng hành cùng học viên vững bước học thuật. Hỗ trợ tài chính trước để thanh toán học phí MBA linh hoạt và an tâm." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2024/09/tra_gop_scb.png" />
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
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <style>
        /* ══════════════════════════════════════
           SACOMBANK PAGE – PREMIUM THEME STYLES
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
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.03) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .scb-hero {
            position: relative;
            padding: 180px 20px 110px;
            overflow: hidden;
            background: #0d0405;
            min-height: 65vh;
            display: flex;
            align-items: center;
        }

        .scb-hero-bg {
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
            opacity: 0.35;
        }

        .scb-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(13, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.5) 60%,
                    rgba(13, 4, 5, 0.95) 100%),
                radial-gradient(ellipse at 30% 50%, rgba(171, 14, 0, 0.3) 0%, transparent 65%);
        }

        .scb-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            text-align: left;
        }

        .scb-hero-content {
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 700px;
            width: 100%;
        }

        .scb-hero-badge {
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

        .scb-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.45);
        }

        .scb-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .scb-hero p.hero-subtitle {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.92) !important;
            max-width: 650px;
            margin-bottom: 32px;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.02em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* Hero Stats Grid */
        .scb-hero-stats {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px;
            width: 100%;
            max-width: 650px;
            margin-bottom: 36px;
        }

        .scb-stat-card {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(12px);
            border-radius: 16px;
            padding: 16px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            transition: all 0.3s ease;
        }

        .scb-stat-card:hover {
            background: rgba(255, 255, 255, 0.18);
            border-color: rgba(255, 77, 77, 0.35);
            transform: translateY(-2px);
        }

        .scb-stat-num {
            font-size: 1.25rem;
            font-weight: 800;
            color: #ff6b6b;
            letter-spacing: -0.01em;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .scb-stat-num i {
            font-size: 1.1rem;
        }

        .scb-stat-lbl {
            font-size: 0.82rem;
            color: rgba(255, 255, 255, 0.95);
            font-weight: 600;
            line-height: 1.3;
        }

        .scb-hero-btn {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            background: #ffffff;
            color: #ab0e00 !important;
            padding: 15px 36px;
            border-radius: 100px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);
            text-decoration: none;
            border: 1px solid #ffffff;
        }

        .scb-hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(171, 14, 0, 0.4);
            background: #ab0e00;
            color: #ffffff !important;
            border-color: #ab0e00;
        }

        .scb-hero-img-wrap {
            position: relative;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            aspect-ratio: 4 / 3;
            background: #1e1e1e;
            transform: rotate(1deg);
            transition: all 0.5s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .scb-hero-img-wrap:hover {
            transform: scale(1.03) rotate(0deg);
            box-shadow: 0 30px 70px rgba(171, 14, 0, 0.3);
        }

        .scb-hero-img-wrap img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.95);
        }

        @media (max-width: 1024px) {
            .scb-hero-container {
                justify-content: center;
                text-align: center;
            }
            .scb-hero-content {
                align-items: center;
                text-align: center;
                max-width: 100%;
            }
            .scb-hero-stats {
                margin: 0 auto 30px;
            }
        }

        @media (max-width: 768px) {
            .scb-hero {
                padding: 120px 20px 60px !important;
                min-height: auto;
            }
            .scb-section {
                padding: 50px 20px !important;
            }
            .scb-hero-stats {
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 8px !important;
                margin: 0 auto 24px !important;
            }
            .scb-stat-card {
                padding: 10px 6px !important;
                border-radius: 12px !important;
            }
            .scb-stat-num {
                font-size: 0.95rem !important;
                gap: 4px !important;
            }
            .scb-stat-num i {
                font-size: 0.85rem !important;
            }
            .scb-stat-lbl {
                font-size: 0.62rem !important;
                line-height: 1.25 !important;
            }
        }

        @media (max-width: 480px) {
            .scb-hero-stats {
                grid-template-columns: repeat(3, 1fr) !important;
                gap: 8px !important;
            }
        }

        /* ── Sections ──────────────────────── */
        .scb-section {
            padding: 90px 20px;
            width: 100%;
            box-sizing: border-box;
        }

        .scb-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            box-sizing: border-box;
        }

        .scb-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .scb-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            border: 1px solid rgba(171, 14, 0, 0.15);
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.82rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 16px;
        }

        .scb-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .scb-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .scb-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Benefits Split ─────────────────── */
        .scb-benefits-split {
            display: grid;
            grid-template-columns: 0.9fr 1.1fr;
            gap: 50px;
            align-items: center;
        }

        .scb-benefits-visual {
            position: relative;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.05);
            background: #ffffff;
            border: 1px solid #e2e8f0;
            padding: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .scb-benefits-visual img {
            max-width: 100%;
            height: auto;
            border-radius: 12px;
            transition: transform 0.5s ease;
        }

        .scb-benefits-visual:hover img {
            transform: scale(1.03);
        }

        .scb-benefits-content h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 24px;
            letter-spacing: -0.015em;
        }

        .scb-benefits-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 30px;
        }

        .scb-benefit-item {
            display: flex;
            gap: 16px;
            align-items: flex-start;
        }

        .scb-benefit-item i {
            color: #ab0e00;
            font-size: 1.15rem;
            margin-top: 3px;
            background: rgba(171, 14, 0, 0.06);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .scb-benefit-text h4 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 4px 0;
        }

        .scb-benefit-text p {
            font-size: 0.92rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.5;
        }

        @media (max-width: 991px) {
            .scb-benefits-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .scb-benefits-visual {
                max-width: 480px;
                margin: 0 auto;
            }
        }

        /* ── Fee Conversion Table ──────────────── */
        .scb-table-section {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            padding: 50px;
        }

        .scb-table-split {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 50px;
            align-items: center;
        }

        .scb-table-visual img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        }

        .scb-table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .scb-table-custom {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            text-align: left;
        }

        .scb-table-custom th {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            padding: 18px 24px;
            font-weight: 700;
            font-size: 0.92rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .scb-table-custom td {
            padding: 18px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-weight: 600;
            font-size: 0.92rem;
        }

        .scb-table-custom tbody tr {
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .scb-table-custom tbody tr:hover {
            background: #fff8f7;
        }

        .scb-table-custom tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .scb-table-custom tbody tr:nth-child(even):hover {
            background: #fff8f7;
        }

        .scb-fee-formula {
            color: #ab0e00;
            font-weight: 700;
            background: #ffedec;
            padding: 6px 14px;
            border-radius: 100px;
            font-size: 0.85rem;
            border: 1px solid rgba(171, 14, 0, 0.12);
            display: inline-block;
        }

        @media (max-width: 991px) {
            .scb-table-section {
                padding: 30px 20px;
            }
            .scb-table-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .scb-table-visual {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        /* ── Card Comparison ─────────────────── */
        .scb-cards-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .scb-card-item {
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid #e2e8f0;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }

        .scb-card-item:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .scb-card-header {
            background: #fcfcfd;
            border-bottom: 1px solid #f1f5f9;
            padding: 30px;
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .scb-card-img-box {
            width: 130px;
            flex-shrink: 0;
            filter: drop-shadow(0 8px 16px rgba(0, 0, 0, 0.15));
            transition: transform 0.4s ease;
        }

        .scb-card-item:hover .scb-card-img-box {
            transform: rotate(-3deg) scale(1.05);
        }

        .scb-card-img-box img {
            width: 100%;
            height: auto;
            display: block;
        }

        .scb-card-title-wrap {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .scb-card-badge {
            font-size: 0.72rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #ab0e00;
            background: rgba(171, 14, 0, 0.06);
            padding: 4px 10px;
            border-radius: 4px;
            width: fit-content;
        }

        .scb-card-name {
            font-size: 1.35rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
        }

        .scb-card-limit {
            font-size: 0.92rem;
            color: #64748b;
            font-weight: 700;
        }

        .scb-card-body {
            padding: 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .scb-card-details {
            list-style: none;
            padding: 0;
            margin: 0 0 30px 0;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .scb-card-details li {
            font-size: 0.92rem;
            color: #475569;
            font-weight: 500;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }

        .scb-card-details li.detail-title {
            font-weight: 700;
            font-size: 0.85rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin-top: 10px;
            color: #ab0e00;
            border-bottom: 1px dashed rgba(171, 14, 0, 0.15);
            padding-bottom: 4px;
        }

        .scb-card-details li.detail-title i {
            color: #ab0e00;
            background: none;
            width: auto;
            height: auto;
        }

        .scb-card-details li i {
            font-size: 0.9rem;
            margin-top: 4px;
            flex-shrink: 0;
        }

        .scb-card-details li i.fa-shield-halved {
            color: #0284c7;
        }

        .scb-card-details li i.fa-gift {
            color: #ea580c;
        }

        .scb-card-details li strong {
            color: #1e293b;
            font-weight: 700;
        }

        .scb-card-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff !important;
            padding: 14px 28px;
            border-radius: 100px;
            font-weight: 700;
            font-size: 0.92rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 6px 20px rgba(171, 14, 0, 0.25);
            border: none;
            width: 100%;
            text-align: center;
            text-decoration: none;
        }

        .scb-card-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(171, 14, 0, 0.35);
            filter: brightness(1.1);
        }

        @media (max-width: 991px) {
            .scb-cards-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }
            .scb-card-header {
                padding: 24px;
            }
            .scb-card-body {
                padding: 24px;
            }
        }

        @media (max-width: 576px) {
            .scb-card-header {
                flex-direction: column;
                align-items: center;
                text-align: center;
                gap: 16px;
                padding: 20px;
            }
            .scb-card-title-wrap {
                align-items: center;
                text-align: center;
            }
            .scb-card-body {
                padding: 20px;
            }
        }

        /* ── Steps Timeline ───────────────────── */
        .scb-timeline-inner {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            position: relative;
        }

        /* Connecting line for timeline */
        .scb-timeline-inner::after {
            content: '';
            position: absolute;
            top: 50px;
            left: 12.5%;
            width: 75%;
            height: 3px;
            background: #e2e8f0;
            z-index: 1;
        }

        .scb-timeline-step {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            z-index: 2;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        }

        .scb-timeline-step:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.08);
            border-color: rgba(171, 14, 0, 0.15);
        }

        .scb-step-icon-wrap {
            width: 72px;
            height: 72px;
            background: #ffffff;
            border: 4px solid #f8fafc;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06);
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .scb-timeline-step:hover .scb-step-icon-wrap {
            transform: scale(1.05);
            box-shadow: 0 10px 24px rgba(171, 14, 0, 0.15);
            border-color: #ffedec;
        }

        .scb-step-icon-wrap img {
            width: 40px;
            height: auto;
        }

        .scb-timeline-step h4 {
            font-size: 1.05rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 10px 0;
            line-height: 1.4;
        }

        .scb-timeline-step p {
            font-size: 0.88rem;
            color: #64748b;
            margin: 0;
            line-height: 1.5;
            font-weight: 500;
        }

        @media (max-width: 991px) {
            .scb-timeline-inner {
                grid-template-columns: 1fr 1fr;
                gap: 24px;
            }
            .scb-timeline-inner::after {
                display: none;
            }
        }

        @media (max-width: 768px) {
            .scb-cards-grid {
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
            .scb-cards-grid::-webkit-scrollbar {
                display: none; /* Chrome/Safari */
            }
            .scb-card-item {
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
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- MAIN HERO SECTION -->
    <main class="ideas_main" style="gap:0; background:none;">
        <section class="scb-hero" id="scb-hero-top">
            <div class="scb-hero-bg" id="scb-parallax-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/04/recap_growverth.webp');"></div>
            <div class="scb-hero-overlay"></div>
            <div class="scb-hero-container">
                <div class="scb-hero-content">
                    <div class="scb-hero-badge"><i class="fa-solid fa-circle-dollar-to-slot"></i> HỖ TRỢ TRẢ GÓP HỌC PHÍ 0%</div>
                    <h1>IDEAS <br><span>SACOMBANK</span></h1>
                    <p class="hero-subtitle">An tâm tài chính – Vững vàng chinh phục chương trình MBA. Chương trình liên kết hỗ trợ tài chính đặc quyền từ đối tác chiến lược Sacombank.</p>
                    
                    <div class="scb-hero-stats">
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><i class="fa-solid fa-coins"></i> 250M</span>
                            <span class="scb-stat-lbl">Học phí chương trình MBA tích hợp</span>
                        </div>
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><i class="fa-solid fa-calendar-check"></i> 24 Th</span>
                            <span class="scb-stat-lbl">Thời gian trả góp linh hoạt tối đa</span>
                        </div>
                        <div class="scb-stat-card">
                            <span class="scb-stat-num"><i class="fa-solid fa-hand-holding-dollar"></i> 5.9M</span>
                            <span class="scb-stat-lbl">Trả góp hàng tháng chỉ từ (VND)</span>
                        </div>
                    </div>
                    
                    <a class="scb-hero-btn" onclick="showform('Trả góp Sacombank - Hero CTA')"><i class="fa-solid fa-headset"></i> Nhận tư vấn trả góp</a>
                </div>

            </div>
        </section>

        <!-- SECTION 1: BENEFITS OF THE PROGRAM -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-benefits-split">
                    <div class="scb-benefits-visual">
                        <img src="https://www.sacombank.com.vn/content/dam/sacombank/images/homepage-dn---the-dn/Homepage%20DN_Sp%20noi%20bat_New_13.04.png" alt="Thẻ tín dụng doanh nghiệp cá nhân Sacombank" />
                    </div>
                    <div class="scb-benefits-content">
                        <span class="scb-section-tag"><i class="fa-solid fa-credit-card"></i> Đặc quyền</span>
                        <h3>Lợi ích vượt trội <span>khi mở thẻ</span></h3>
                        <div class="scb-benefits-list">
                            <div class="scb-benefit-item">
                                <i class="fa-solid fa-hand-holding-hand"></i>
                                <div class="scb-benefit-text">
                                    <h4>Ngân hàng hỗ trợ thanh toán trước</h4>
                                    <p>Học viên được ngân hàng Sacombank ứng vốn hoàn tất học phí ngay tại thời điểm nhập học để được kích hoạt tài khoản LMS chính thức.</p>
                                </div>
                            </div>
                            <div class="scb-benefit-item">
                                <i class="fa-solid fa-percent"></i>
                                <div class="scb-benefit-text">
                                    <h4>Học phí trả góp lãi suất 0%</h4>
                                    <p>Hỗ trợ chia nhỏ học phí trả góp theo nhiều kỳ hạn linh động mong muốn (3, 6, 9, 12, 18, hoặc 24 tháng) với lãi suất 0%.</p>
                                </div>
                            </div>
                            <div class="scb-benefit-item">
                                <i class="fa-solid fa-circle-check"></i>
                                <div class="scb-benefit-text">
                                    <h4>Hưởng trọn ưu đãi từ hai phía</h4>
                                    <p>Học viên mở thẻ vừa nhận chính sách quà tặng từ Sacombank vừa giữ nguyên các chương trình ưu đãi hiện hành của Viện IDEAS/TSSAC.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: CONVERSION FEE TABLE -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><i class="fa-solid fa-table"></i> Biểu phí</span>
                    <h2 class="scb-section-title">Phí Chuyển Đổi <span>Trả Góp</span> Sacombank</h2>
                    <p class="scb-section-subtitle">Chi tiết biểu phí dịch vụ chuyển đổi trả góp 0% áp dụng cho chủ thẻ tín dụng quốc tế Sacombank.</p>
                </div>

                <div class="scb-table-section">
                    <div class="scb-table-split">
                        <div class="scb-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" alt="IDEAS Sacombank Finance Support" />
                        </div>
                        <div class="scb-table-responsive">
                            <table class="scb-table-custom">
                                <thead>
                                    <tr>
                                        <th style="width: 30%;">Kỳ hạn (tháng)</th>
                                        <th style="width: 70%;">Phí chuyển đổi áp dụng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><strong>3 tháng</strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula">0,4%/tháng</span> x kỳ hạn x số tiền thanh toán
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>6 tháng</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>9 tháng</strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula">0,45%/tháng</span> x kỳ hạn x số tiền thanh toán
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>12 tháng</strong></td>
                                    </tr>
                                    <tr>
                                        <td><strong>18 tháng</strong></td>
                                        <td rowspan="2" style="vertical-align: middle;">
                                            <span class="scb-fee-formula">0,5%/tháng</span> x kỳ hạn x số tiền thanh toán
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><strong>24 tháng</strong></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: CARD COMPARISON GRID -->
        <section class="scb-section">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><i class="fa-solid fa-id-card"></i> Lựa chọn thẻ</span>
                    <h2 class="scb-section-title">So Sánh Dòng Thẻ <span>Tín Dụng</span> Sacombank</h2>
                    <p class="scb-section-subtitle">Hai dòng thẻ tín dụng quốc tế Visa được học viên tin dùng phổ biến để đăng ký hỗ trợ trả học phí.</p>
                </div>

                <div class="scb-cards-grid">
                    <!-- Visa Platinum Card -->
                    <div class="scb-card-item">
                        <div class="scb-card-header">
                            <div class="scb-card-img-box">
                                <img src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Plantinum%20Cashback_contactless-01.png" alt="Sacombank Visa Platinum Cashback" />
                            </div>
                            <div class="scb-card-title-wrap">
                                <span class="scb-card-badge">Phổ biến</span>
                                <h4 class="scb-card-name">Visa Platinum</h4>
                                <span class="scb-card-limit">Hạn mức từ 40M - 100M VND</span>
                            </div>
                        </div>
                        <div class="scb-card-body">
                            <ul class="scb-card-details">
                                <li class="detail-title"><i class="fa-solid fa-circle-info"></i> Thông tin phí thường niên</li>
                                <li>
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Phí thường niên năm 1: thu 100% <strong>(599.000đ)</strong></span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Miễn/giảm phí thường niên từ năm thứ 2 trở đi:</span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <i class="fa-solid fa-circle-chevron-right" style="font-size: 0.75rem; color: #ab0e00;"></i>
                                    <span>Doanh số giao dịch thanh toán <strong>400trđ/năm</strong>: Miễn 100% PTN</span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <i class="fa-solid fa-circle-chevron-right" style="font-size: 0.75rem; color: #ab0e00;"></i>
                                    <span>Doanh số giao dịch thanh toán <strong>300trđ/năm</strong>: Giảm 50% PTN</span>
                                </li>
                                
                                <li class="detail-title"><i class="fa-solid fa-gift"></i> Quyền lợi &amp; Đối tác liên kết</li>
                                <li>
                                    <i class="fa-solid fa-gift"></i>
                                    <span>Hoàn 600.000 VND khi lần đầu mở thẻ &amp; chi tiêu hóa đơn từ 2.000.000 VND trong 30 ngày.</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-gift"></i>
                                    <span>Ưu đãi giảm giá đặc quyền tại CGV, Agoda, Zara, Klook, Xanh SM, Grab, Starbucks, Kichi Kichi, Gogi House...</span>
                                </li>
                            </ul>
                            <button class="scb-card-btn" onclick="showform('Trả góp Sacombank - Visa Platinum')"><i class="fa-solid fa-headset"></i> Đăng ký mở thẻ Visa Platinum</button>
                        </div>
                    </div>

                    <!-- Visa Signature Card -->
                    <div class="scb-card-item">
                        <div class="scb-card-header">
                            <div class="scb-card-img-box">
                                <img src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Signature_contactless-01.png" alt="Sacombank Visa Signature" />
                            </div>
                            <div class="scb-card-title-wrap">
                                <span class="scb-card-badge" style="background-color: #fef3c7; color: #d97706;">Cao cấp</span>
                                <h4 class="scb-card-name">Visa Signature</h4>
                                <span class="scb-card-limit">Hạn mức từ 100M VND trở lên</span>
                            </div>
                        </div>
                        <div class="scb-card-body">
                            <ul class="scb-card-details">
                                <li class="detail-title"><i class="fa-solid fa-circle-info"></i> Thông tin phí thường niên</li>
                                <li>
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Phí thường niên năm 1: thu 100% <strong>(1.499.000đ)</strong></span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Miễn/giảm phí thường niên từ năm thứ 2 trở đi:</span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <i class="fa-solid fa-circle-chevron-right" style="font-size: 0.75rem; color: #ab0e00;"></i>
                                    <span>Doanh số giao dịch thanh toán <strong>400trđ/năm</strong>: Miễn 100% PTN</span>
                                </li>
                                <li style="padding-left: 20px;">
                                    <i class="fa-solid fa-circle-chevron-right" style="font-size: 0.75rem; color: #ab0e00;"></i>
                                    <span>Doanh số giao dịch thanh toán <strong>300trđ/năm</strong>: Giảm 50% PTN</span>
                                </li>

                                <li class="detail-title"><i class="fa-solid fa-gift"></i> Quyền lợi &amp; Đối tác liên kết</li>
                                <li>
                                    <i class="fa-solid fa-gift"></i>
                                    <span>Tích lũy dặm Sacombank để quy đổi vé máy bay nhiều hãng hàng không, đổi ngang dặm Vietnam Airlines, đổi phí thường niên...</span>
                                </li>
                                <li>
                                    <i class="fa-solid fa-gift"></i>
                                    <span>Miễn phí 1 phần đồ ăn tại Starbucks. Giảm 25% - 50% tại chuỗi nhà hàng ẩm thực Á/Âu cao cấp: Nén Light, Bờm, Jumbo, Coco, Tre, Stoker...</span>
                                </li>
                            </ul>
                            <button class="scb-card-btn" onclick="showform('Trả góp Sacombank - Visa Signature')"><i class="fa-solid fa-headset"></i> Đăng ký mở thẻ Visa Signature</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: REGISTRATION TIMELINE -->
        <section class="scb-section" style="background-color: #ffffff;">
            <div class="scb-container-width">
                <div class="scb-section-title-wrap">
                    <span class="scb-section-tag"><i class="fa-solid fa-route"></i> Quy trình</span>
                    <h2 class="scb-section-title">Quy Trình <span>Đăng Ký</span> &amp; Nhập Học</h2>
                    <p class="scb-section-subtitle">Chỉ với 4 bước đơn giản, học viên có thể hoàn tất đăng ký trả góp học phí và bắt đầu chương trình MBA.</p>
                </div>

                <div class="scb-timeline-inner">
                    <!-- Step 1 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon4.png" alt="Bước 1 Tiếp nhận hồ sơ" />
                        </div>
                        <h4>1. Tiếp nhận hồ sơ</h4>
                        <p>Học viên cung cấp CCCD, Số điện thoại và số tiền học phí mong muốn làm thủ tục trả góp.</p>
                    </div>

                    <!-- Step 2 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon3.png" alt="Bước 2 Xác nhận ngân hàng" />
                        </div>
                        <h4>2. Ngân hàng xác nhận</h4>
                        <p>Sacombank tiếp nhận thông tin và kiểm tra sơ bộ điều kiện cấp hạn mức tín dụng cho học viên.</p>
                    </div>

                    <!-- Step 3 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon1.png" alt="Bước 3 Xử lý hồ sơ" />
                        </div>
                        <h4>3. Xử lý &amp; Phát hành</h4>
                        <p>Chuyên viên tín dụng liên hệ, hướng dẫn học viên ký hồ sơ phát hành thẻ tận nơi nhanh chóng.</p>
                    </div>

                    <!-- Step 4 -->
                    <div class="scb-timeline-step">
                        <div class="scb-step-icon-wrap">
                            <img src="https://ideas.edu.vn/wp-content/new_public/data_imgs/icon2.png" alt="Bước 4 Thanh toán học phí" />
                        </div>
                        <h4>4. Thanh toán học phí</h4>
                        <p>Thực hiện thanh toán gói học qua thẻ, IDEAS kích hoạt tài khoản LMS chính thức bắt đầu học ngay.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('scb-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('scb-hero-top').offsetHeight;
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
</body>

</html>
