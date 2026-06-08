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
            color: #ffffff;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        .scb-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .scb-hero p.hero-subtitle {
            font-size: 1.15rem;
            color: #ffffff;
            max-width: 650px;
            margin-bottom: 32px;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.02em;
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

        @media (max-width: 480px) {
            .scb-hero-stats {
                grid-template-columns: 1fr;
                gap: 12px;
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

        @media (max-width: 768px) {
            .scb-hero {
                padding: 120px 16px 60px;
                min-height: auto;
            }
            .scb-section {
                padding: 50px 16px;
            }
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
                                    src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT5c9vyalfHcxNNvOrudO4IQ9qGHz8PC0GhVw&s"
                                    alt="Dual DBA" loading="lazy" decoding="async" />
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
                    <a onclick="showform('sacombank_header')" class="nav-cta" style="cursor:pointer;">Nhận tư vấn trả góp</a>
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
                <a href="/mscai"><i class="fa-solid fa-graduation-cap"></i> MSc AI</a>
                <a href="/mbainai"><i class="fa-solid fa-graduation-cap"></i> MBA in AI</a>
                <a href="/bba"><i class="fa-solid fa-graduation-cap"></i> Top-up BBA</a>
                <a href="/fullbba"><i class="fa-solid fa-graduation-cap"></i> Full BBA</a>
                <a href="/dual-dba"><i class="fa-solid fa-graduation-cap"></i> Dual DBA</a>
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
                <a href="/cac-khoan-chi-phi"><i class="fa-solid fa-file-invoice-dollar"></i> Các khoản chi phí</a>
                <a href="/ideas-ambassador"><i class="fa-solid fa-user-graduate"></i> IDEAS - Ambassador</a>
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
        <div style="padding: 20px;">
            <a onclick="document.getElementById('mobile-menu').classList.remove('active'); document.getElementById('mobile-overlay').classList.remove('active'); document.body.style.overflow = ''; showform('sacombank_mobile_header')" class="nav-cta" style="display: block; text-align: center; cursor:pointer;">Nhận tư vấn trả góp</a>
        </div>
    </div>

    <!-- MAIN HERO SECTION -->
    <main class="ideas_main" style="gap:0; background:none;">
        <section class="scb-hero" id="scb-hero-top">
            <div class="scb-hero-bg" id="scb-parallax-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');"></div>
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

    <!-- Generic Registration Popup Modal -->
    <div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
        <div class="reg-modal-overlay" id="reg-modal-overlay"></div>
        <div class="reg-modal-container" data-lenis-prevent>
            <button class="reg-modal-close" id="reg-modal-close" aria-label="Đóng modal">✕</button>
            <div class="reg-modal-content">
                <header class="modal-form-header">
                    <div class="modal-badge">NHẬN TƯ VẤN TRẢ GÓP</div>
                    <h3>Đăng ký hỗ trợ <br><span class="gradient-text">Tài chính Sacombank</span></h3>
                    <p>Chuyên viên tài chính của IDEAS sẽ liên hệ trong vòng 24 giờ để hỗ trợ thủ tục mở thẻ.</p>
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
                        <label for="modal-message">Nội dung bạn quan tâm / Ghi chú cho chuyên viên tư vấn</label>
                        <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi muốn tư vấn mở thẻ tín dụng Visa Platinum để trả góp học phí MBA..." rows="3"></textarea>
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
                    <p>Cảm ơn bạn đã đăng ký. Ban tư vấn tài chính của IDEAS sẽ sớm liên hệ với bạn qua số điện thoại hoặc email đã cung cấp.</p>
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
                                <input type="radio" name="bk-program" value="Trả góp Sacombank" checked />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💳</div>
                                    <div class="bk-program-name">Trả góp Sacombank</div>
                                    <div class="bk-program-desc">Tư vấn mở thẻ trả góp 0%</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="MBA High Quality" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">📘</div>
                                    <div class="bk-program-name">MBA Thụy Sĩ</div>
                                    <div class="bk-program-desc">Chương trình Thạc sĩ QTKD</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chưa quyết định" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💡</div>
                                    <div class="bk-program-name">Khác / Tư vấn thêm</div>
                                    <div class="bk-program-desc">Cần tư vấn định hướng thêm</div>
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
        function showform(ctaSource = 'sacombank_cta') {
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

    <!-- Custom Menu Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
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
                toggle.addEventListener('click', function () {
                    const menu = this.nextElementSibling;
                    const isOpen = this.getAttribute('aria-expanded') === 'true';

                    this.setAttribute('aria-expanded', !isOpen);
                    if (menu) {
                        menu.classList.toggle('active');
                    }
                });
            });

            // Sacombank Card Grid Slider Dots
            const scbGrid = document.querySelector('.scb-cards-grid');
            if (scbGrid) {
                const cards = scbGrid.querySelectorAll('.scb-card-item');
                if (cards.length > 0) {
                    const dotsContainer = document.createElement('div');
                    dotsContainer.className = 'slider-dots';
                    scbGrid.parentNode.insertBefore(dotsContainer, scbGrid.nextSibling);
                    
                    cards.forEach((_, idx) => {
                        const dot = document.createElement('span');
                        dot.className = `slider-dot ${idx === 0 ? 'active' : ''}`;
                        dotsContainer.appendChild(dot);
                    });
                    
                    const dots = dotsContainer.querySelectorAll('.slider-dot');
                    scbGrid.addEventListener('scroll', () => {
                        const scrollLeft = scbGrid.scrollLeft;
                        const firstCard = scbGrid.querySelector('.scb-card-item');
                        if (!firstCard) return;
                        const cardWidth = firstCard.offsetWidth + 16; // width + gap
                        const activeIndex = Math.round(scrollLeft / cardWidth);
                        dots.forEach((dot, idx) => {
                            if (idx === activeIndex) {
                                dot.classList.add('active');
                            } else {
                                dot.classList.remove('active');
                            }
                        });
                    });
                }
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
</body>

</html>
