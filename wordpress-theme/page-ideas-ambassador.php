<?php
/**
 * The template for displaying the Ideas Ambassador page
 * Template Name: Premium Ideas Ambassador Template
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
    <title>IDEAS Ambassador – Chương trình Đại sứ Thương hiệu | Viện IDEAS</title>

    <meta name="description"
        content="Chương trình Đại sứ IDEAS - Lan tỏa tri thức, xây dựng cộng đồng học thuật và nhận những đặc quyền tài trợ học phí, vé máy bay sang Châu Âu." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="IDEAS Ambassador – Chương trình Đại sứ Thương hiệu" />
    <meta property="og:description"
        content="Đồng hành lan tỏa giáo dục chuẩn quốc tế cùng Viện IDEAS. Tích lũy tín chỉ học thuật quy đổi quà tặng, học bổng và các chuyến đi Châu Âu giá trị." />
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
    define('BOOKING_MODAL_CSS_LOADED', true);
    $bk_css_path = get_stylesheet_directory() . '/common-assets/css/booking-modal.min.css';
    $bk_css_version = file_exists($bk_css_path) ? filemtime($bk_css_path) : time();
    ?>
    <link rel="stylesheet"
        href="<?php echo get_stylesheet_directory_uri(); ?>/common-assets/css/booking-modal.min.css?v=<?php echo $bk_css_version; ?>" />

    <style>
        /* ══════════════════════════════════════
           AMBASSADOR PAGE – PREMIUM THEME STYLES
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
        .amb-hero {
            position: relative;
            padding: 180px 20px 110px;
            overflow: hidden;
            background: #0d0405;
            min-height: 65vh;
            display: flex;
            align-items: center;
        }

        .amb-hero-bg {
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

        .amb-hero-overlay {
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

        .amb-hero-container {
            position: relative;
            z-index: 3;
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            justify-content: flex-start;
            text-align: left;
        }

        .amb-hero-content {
            color: #ffffff;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            text-align: left;
            max-width: 700px;
        }

        .amb-hero-badge {
            background: rgba(171, 14, 0, 0.25) !important;
            border: 1px solid rgba(255, 77, 77, 0.5) !important;
            padding: 8px 20px !important;
            border-radius: 100px !important;
            color: #ffffff !important;
            font-size: 0.82rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.12em !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            margin-bottom: 24px !important;
            backdrop-filter: blur(12px) !important;
        }

        .amb-hero h1 {
            font-size: clamp(2.8rem, 6vw, 4.4rem) !important;
            font-weight: 900 !important;
            margin-bottom: 20px !important;
            letter-spacing: -0.02em !important;
            line-height: 1.1 !important;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
        }

        .amb-hero h1 span {
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 50%, #ab0e00 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .amb-hero p {
            font-size: 1.2rem !important;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 650px !important;
            margin-bottom: 36px !important;
            line-height: 1.6 !important;
            font-weight: 500 !important;
            letter-spacing: 0.02em !important;
        }

        .amb-hero-btn {
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

        .amb-hero-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 40px rgba(171, 14, 0, 0.4);
            background: #ab0e00;
            color: #ffffff !important;
            border-color: #ab0e00;
        }

        @media (max-width: 1024px) {
            .amb-hero-container {
                justify-content: center;
                text-align: center;
            }
            .amb-hero-content {
                align-items: center;
                text-align: center;
                margin: 0 auto;
            }
        }

        /* ── Sections ──────────────────────── */
        .amb-section {
            padding: 90px 20px;
        }

        .amb-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .amb-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .amb-section-tag {
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

        .amb-section-title {
            font-size: clamp(2rem, 4vw, 2.6rem);
            font-weight: 800;
            color: #111827;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .amb-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .amb-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Intro ─────────────────────────── */
        .amb-intro-split {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 60px;
            align-items: center;
        }

        .amb-intro-desc {
            font-size: 1.1rem;
            line-height: 1.7;
            color: #374151;
            margin-bottom: 30px;
        }

        .amb-intro-desc span {
            font-weight: 700;
            color: #ab0e00;
        }

        .amb-goals-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
            margin-bottom: 30px;
        }

        .amb-goal-card {
            display: flex;
            gap: 20px;
            background: #ffffff;
            padding: 22px 24px;
            border-radius: 18px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border-left: 4px solid #ab0e00;
            transition: all 0.3s ease;
            align-items: flex-start;
        }

        .amb-goal-card:hover {
            transform: translateX(6px);
            box-shadow: 0 10px 30px rgba(171, 14, 0, 0.08);
        }

        .amb-goal-icon-box {
            width: 46px;
            height: 46px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(171, 14, 0, 0.25);
        }

        .amb-goal-info h4 {
            font-size: 1.15rem;
            font-weight: 700;
            color: #111827;
            margin: 0 0 6px 0;
        }

        .amb-goal-info p {
            font-size: 0.92rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.5;
        }

        .amb-intro-meta {
            background: #fff8f7;
            border: 1px dashed rgba(171, 14, 0, 0.3);
            border-radius: 12px;
            padding: 14px 20px;
            font-size: 0.9rem;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .amb-intro-meta i {
            color: #ab0e00;
        }

        .amb-intro-visual {
            position: relative;
        }

        .amb-intro-img {
            width: 100%;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            object-fit: cover;
            aspect-ratio: 4 / 5;
        }

        .amb-intro-floating-badge {
            position: absolute;
            bottom: 24px;
            left: 24px;
            background: #ffffff;
            border-radius: 100px;
            padding: 10px 24px;
            font-size: 0.9rem;
            font-weight: 700;
            color: #ab0e00;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 8px;
            border: 1px solid #f3f4f6;
        }

        @media (max-width: 991px) {
            .amb-intro-split {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            .amb-intro-visual {
                max-width: 480px;
                margin: 0 auto;
                width: 100%;
            }
        }

        /* ── Credit Table ───────────────────── */
        .amb-table-section {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            padding: 50px;
        }

        .amb-table-split {
            display: grid;
            grid-template-columns: 0.85fr 1.15fr;
            gap: 50px;
            align-items: center;
        }

        .amb-table-visual img {
            width: 100%;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(15, 23, 42, 0.05);
        }

        .amb-table-responsive {
            width: 100%;
            overflow-x: auto;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
        }

        .amb-table-custom {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.95rem;
            text-align: left;
        }

        .amb-table-custom th {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            padding: 18px 24px;
            font-weight: 700;
            font-size: 0.92rem;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .amb-table-custom td {
            padding: 15px 24px;
            border-bottom: 1px solid #f1f5f9;
            color: #374151;
            font-weight: 500;
        }

        .amb-table-custom tbody tr {
            background: #ffffff;
            transition: all 0.2s ease;
        }

        .amb-table-custom tbody tr:hover {
            background: #fff8f7;
        }

        .amb-table-custom tbody tr:nth-child(even) {
            background: #f8fafc;
        }

        .amb-table-custom tbody tr:nth-child(even):hover {
            background: #fff8f7;
        }

        .amb-pts-badge {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 4px 14px;
            border-radius: 100px;
            background: #ffedec;
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.92rem;
            border: 1px solid rgba(171, 14, 0, 0.15);
        }

        .amb-pts-badge.high {
            background: #fff2e6;
            color: #ea580c;
            border-color: rgba(234, 88, 12, 0.15);
        }

        .amb-pts-badge.top {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.2);
        }

        @media (max-width: 991px) {
            .amb-table-section {
                padding: 30px 20px;
            }
            .amb-table-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .amb-table-visual {
                max-width: 400px;
                margin: 0 auto;
            }
        }

        /* ── Rank Tiers ────────────────────── */
        .amb-tiers-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .amb-tier-row {
            background: #ffffff;
            border-radius: 20px;
            padding: 24px 30px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            border-left: 6px solid #cbd5e1;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
            display: grid;
            grid-template-columns: 240px 1fr;
            gap: 30px;
            align-items: center;
        }

        .amb-tier-row:hover {
            transform: translateX(8px);
            box-shadow: 0 12px 30px rgba(15, 23, 42, 0.06);
            border-color: rgba(15, 23, 42, 0.08);
        }

        .amb-tier-row.tier-gan-ket { border-left-color: #94a3b8; }
        .amb-tier-row.tier-lan-toa { border-left-color: #10b981; }
        .amb-tier-row.tier-tien-phong { border-left-color: #f97316; }
        .amb-tier-row.tier-kim-cuong { border-left-color: #06b6d4; }
        .amb-tier-row.tier-master { 
            border-left-color: #ab0e00; 
            background: linear-gradient(90deg, #fff9f9 0%, #ffffff 100%);
            box-shadow: 0 4px 24px rgba(171, 14, 0, 0.04);
        }

        .amb-tier-row.tier-master:hover {
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.09);
        }

        .amb-tier-top-badge {
            position: absolute;
            top: -12px;
            right: 30px;
            background: linear-gradient(135deg, #ffd700 0%, #b8860b 100%);
            color: #000000;
            font-size: 0.72rem;
            font-weight: 800;
            padding: 3px 14px;
            border-radius: 100px;
            box-shadow: 0 4px 10px rgba(184, 134, 11, 0.25);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .amb-tier-profile {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .amb-tier-icon-wrap {
            width: 52px;
            height: 52px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .tier-gan-ket .amb-tier-icon-wrap { background: #f1f5f9; color: #64748b; }
        .tier-lan-toa .amb-tier-icon-wrap { background: #ecfdf5; color: #10b981; }
        .tier-tien-phong .amb-tier-icon-wrap { background: #fff7ed; color: #f97316; }
        .tier-kim-cuong .amb-tier-icon-wrap { background: #ecfeff; color: #06b6d4; }
        .tier-master .amb-tier-icon-wrap { background: #fff1f2; color: #ab0e00; }

        .amb-tier-title {
            font-size: 1.25rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0;
        }

        .amb-tier-points-range {
            font-size: 0.82rem;
            color: #64748b;
            font-weight: 700;
            margin-top: 4px;
            text-transform: uppercase;
            letter-spacing: 0.02em;
        }

        .amb-tier-benefits-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px 24px;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .amb-tier-benefits-list li {
            font-size: 0.92rem;
            color: #475569;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            line-height: 1.4;
        }

        .amb-tier-benefits-list li i {
            color: #ab0e00;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .amb-tier-row {
                grid-template-columns: 1fr;
                gap: 16px;
                padding: 24px;
            }
            .amb-tier-benefits-list {
                flex-direction: column;
                gap: 8px;
            }
        }

        /* ── Split How & Commit ────────────── */
        .amb-split-layout {
            display: grid;
            grid-template-columns: 1.05fr 0.95fr;
            gap: 60px;
        }

        .amb-flow-box h3,
        .amb-commit-box h3 {
            font-size: 1.8rem;
            font-weight: 800;
            color: #111827;
            margin-bottom: 24px;
        }

        .amb-steps-col {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .amb-step-card {
            display: flex;
            gap: 18px;
            background: #ffffff;
            padding: 22px;
            border-radius: 16px;
            box-shadow: 0 4px 15px rgba(15, 23, 42, 0.02);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .amb-step-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.06);
            border-color: rgba(171, 14, 0, 0.12);
        }

        .amb-step-num-circle {
            width: 38px;
            height: 38px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.1rem;
            flex-shrink: 0;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.2);
        }

        .amb-step-info h5 {
            font-size: 1.05rem;
            font-weight: 700;
            color: #1e293b;
            margin: 0 0 6px 0;
        }

        .amb-step-info p {
            font-size: 0.9rem;
            color: #4b5563;
            margin: 0;
            line-height: 1.6;
        }

        .amb-commit-checklist {
            display: flex;
            flex-direction: column;
            gap: 18px;
            margin-bottom: 36px;
        }

        .amb-commit-item {
            display: flex;
            gap: 12px;
            font-size: 0.96rem;
            line-height: 1.55;
            color: #374151;
            font-weight: 600;
        }

        .amb-commit-item i {
            color: #ab0e00;
            font-size: 1.1rem;
            margin-top: 2px;
        }

        .amb-commit-cta-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff !important;
            padding: 16px 36px;
            border-radius: 100px;
            font-weight: 800;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            box-shadow: 0 8px 25px rgba(171, 14, 0, 0.3);
            border: none;
            width: 100%;
            max-width: 280px;
            text-align: center;
        }

        .amb-commit-cta-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.4);
            filter: brightness(1.1);
        }

        @media (max-width: 991px) {
            .amb-split-layout {
                grid-template-columns: 1fr;
                gap: 50px;
            }
            .amb-commit-cta-btn {
                max-width: 100%;
            }
        }

        /* ── News Articles ─────────────────── */
        .amb-news-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .amb-news-card {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            text-decoration: none;
            color: inherit;
        }

        .amb-news-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .amb-news-img-box {
            width: 100%;
            aspect-ratio: 16 / 9;
            overflow: hidden;
            position: relative;
            background: #f1f5f9;
        }

        .amb-news-img-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .amb-news-card:hover .amb-news-img-box img {
            transform: scale(1.04);
        }

        .amb-news-hover-overlay {
            position: absolute;
            inset: 0;
            background: rgba(171, 14, 0, 0.25);
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 1.5rem;
        }

        .amb-news-card:hover .amb-news-hover-overlay {
            opacity: 1;
        }

        .amb-news-body {
            padding: 24px;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .amb-news-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: #ffedec;
            color: #ab0e00;
            font-size: 0.75rem;
            font-weight: 700;
            padding: 4px 12px;
            border-radius: 100px;
            width: fit-content;
            margin-bottom: 12px;
            letter-spacing: 0.02em;
        }

        .amb-news-body h4 {
            font-size: 1.15rem;
            font-weight: 800;
            color: #1e293b;
            line-height: 1.45;
            margin: 0 0 12px 0;
            transition: color 0.3s ease;
        }

        .amb-news-card:hover .amb-news-body h4 {
            color: #ab0e00;
        }

        .amb-news-body p {
            font-size: 0.9rem;
            color: #4b5563;
            line-height: 1.6;
            margin: 0 0 20px 0;
            flex-grow: 1;
        }

        .amb-news-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-top: 1px solid #f1f5f9;
            padding-top: 16px;
            font-size: 0.82rem;
            color: #94a3b8;
            font-weight: 600;
        }

        .amb-news-readmore {
            color: #ab0e00;
            display: flex;
            align-items: center;
            gap: 4px;
            font-weight: 700;
            transition: all 0.2s ease;
        }

        .amb-news-card:hover .amb-news-readmore {
            gap: 8px;
        }

        @media (max-width: 768px) {
            .amb-hero {
                padding: 130px 16px 50px !important;
                min-height: auto !important;
            }
            .amb-section {
                padding: 50px 16px !important;
            }
            .amb-news-grid {
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
            .amb-news-grid::-webkit-scrollbar {
                display: none; /* Chrome/Safari */
            }
            .amb-news-card {
                flex: 0 0 280px;
                max-width: 280px;
                scroll-snap-align: center;
            }
            .slider-dots {
                display: none;
                justify-content: center;
                gap: 8px;
                margin-top: 24px;
            }
            .slider-dots {
                display: flex;
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
        <section class="amb-hero" id="amb-hero-top">
            <div class="amb-hero-bg" id="amb-parallax-bg" style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2025/11/Co-di-hoc-ko-nguoi-dep-1.webp');"></div>
            <div class="amb-hero-overlay"></div>
            <div class="amb-hero-container">
                <div class="amb-hero-content">
                    <div class="amb-hero-badge"><i class="fa-solid fa-star"></i> Chương trình đặc biệt</div>
                    <h1>IDEAS <br><span>AMBASSADOR</span></h1>
                    <p>Lan tỏa tri thức · Xây dựng cộng đồng · Tôn vinh cống hiến. Chương trình Đại sứ Thương hiệu kết nối tri thức chuẩn quốc tế và nâng cánh tài năng Việt.</p>
                    <a class="amb-hero-btn" onclick="showform('amb_hero_top')"><i class="fa-solid fa-headset"></i> Tìm hiểu ngay</a>
                </div>
            </div>
        </section>

        <!-- SECTION 1: ABOUT PROGRAM -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-intro-split">
                    <div class="amb-intro-text">
                        <span class="amb-section-tag"><i class="fa-solid fa-graduation-cap"></i> Về chương trình</span>
                        <h2 class="amb-section-title">IDEAS – <span>Ambassador</span></h2>
                        <p class="amb-intro-desc">Chương trình Đại sứ IDEAS được xây dựng nhằm <span>chia sẻ giá trị</span>, lan tỏa tri thức và thúc đẩy sự phát triển của giáo dục sau đại học. Chúng tôi hướng đến một môi trường học thuật và xã hội tích cực, nơi mỗi cá nhân thuộc cộng đồng IDEAS đều có cơ hội đóng góp và nhận lại những quyền lợi xứng đáng.</p>
                        
                        <div class="amb-goals-list">
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><i class="fa-solid fa-network-wired"></i></div>
                                <div class="amb-goal-info">
                                    <h4>Xây dựng cộng đồng</h4>
                                    <p>Tạo ra mạng lưới kết nối mạnh mẽ, hỗ trợ nhau trong học tập và phát triển sự nghiệp.</p>
                                </div>
                            </div>
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><i class="fa-solid fa-bullhorn"></i></div>
                                <div class="amb-goal-info">
                                    <h4>Lan tỏa giáo dục</h4>
                                    <p>Mở rộng cơ hội tiếp cận giáo dục chất lượng quốc tế chuẩn Châu Âu cho nhiều người hơn.</p>
                                </div>
                            </div>
                            <div class="amb-goal-card">
                                <div class="amb-goal-icon-box"><i class="fa-solid fa-trophy"></i></div>
                                <div class="amb-goal-info">
                                    <h4>Tôn vinh cống hiến</h4>
                                    <p>Vinh danh và trao thưởng xứng đáng đối với những đóng góp tích cực của bạn.</p>
                                </div>
                            </div>
                        </div>

                        <div class="amb-intro-meta">
                            <i class="fa-solid fa-clock"></i>
                            <span><b>Thời gian áp dụng:</b> Từ 11/11/2025 | Tích lũy liên tục trong vòng 03 năm</span>
                        </div>
                    </div>
                    
                    <div class="amb-intro-visual">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/Co-di-hoc-ko-nguoi-dep-1.webp" alt="IDEAS Ambassador Program" class="amb-intro-img" />
                        <div class="amb-intro-floating-badge">
                            <i class="fa-solid fa-medal"></i>
                            <span>Đại sứ Uy tín IDEAS</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 2: CREDIT SCORING TABLE -->
        <section class="amb-section" style="background-color: #ffffff;">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><i class="fa-solid fa-coins"></i> Cơ chế tích điểm</span>
                    <h2 class="amb-section-title">Bảng Tích Tín Chỉ <span>Học Thuật</span> IDEAS</h2>
                    <p class="amb-section-subtitle">Mỗi hoạt động bạn tham gia đều được ghi nhận và tích lũy thành Tín chỉ học thuật IDEAS – chìa khóa mở ra những đặc quyền hấp dẫn.</p>
                </div>

                <div class="amb-table-section">
                    <div class="amb-table-split">
                        <div class="amb-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/11/IDEAS-AMBASSADOR-4.webp" alt="IDEAS Ambassador Credit Table" />
                        </div>
                        <div class="amb-table-responsive">
                            <table class="amb-table-custom">
                                <thead>
                                    <tr>
                                        <th>Hoạt động tham gia</th>
                                        <th style="width:140px; text-align:center;">Tín chỉ tích lũy</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Tham gia sự kiện trực tuyến (Online Webinar)</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge">2 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Giới thiệu khách hàng tiềm năng liên hệ tư vấn</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge">2 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Chia sẻ bài viết truyền thông #IDEAS trên trang cá nhân</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge">5 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Tham gia sự kiện trực tiếp (Offline Workshop)</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge">5 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Quay video chia sẻ trải nghiệm & cảm nhận về khóa học</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high">10 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Đánh giá chất lượng học thuật và đóng góp chuyên sâu</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high">15 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Giới thiệu một học viên đăng ký nhập học thành công</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge high">20 điểm</span></td>
                                    </tr>
                                    <tr>
                                        <td>Hoàn thành chương trình học Topup / Master / DBA</td>
                                        <td style="text-align:center;"><span class="amb-pts-badge top">30 điểm</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 3: RANK TIERS -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><i class="fa-solid fa-ranking-star"></i> Hạng mức</span>
                    <h2 class="amb-section-title">Hạng Mức & <span>Quyền Lợi Đặc Biệt</span></h2>
                    <p class="amb-section-subtitle">Tích lũy tín chỉ để nâng hạng đại sứ và mở khóa các chính sách tài trợ đặc biệt từ Viện IDEAS.</p>
                </div>

                <div class="amb-tiers-list">
                    <!-- Tier 1 -->
                    <div class="amb-tier-row tier-gan-ket">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><i class="fa-solid fa-link"></i></div>
                            <div>
                                <h4 class="amb-tier-title">Gắn kết</h4>
                                <div class="amb-tier-points-range">10 – 99 điểm</div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><i class="fa-solid fa-gift"></i> Nhận quà tặng độc quyền hàng năm</li>
                            <li><i class="fa-solid fa-coins"></i> Quỹ hỗ trợ tri thức: <b>100 CHF</b>/học viên</li>
                        </ul>
                    </div>

                    <!-- Tier 2 -->
                    <div class="amb-tier-row tier-lan-toa">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><i class="fa-solid fa-signal"></i></div>
                            <div>
                                <h4 class="amb-tier-title">Lan tỏa</h4>
                                <div class="amb-tier-points-range">100 – 299 điểm</div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><i class="fa-solid fa-gift"></i> Nhận quà tặng độc quyền hàng năm</li>
                            <li><i class="fa-solid fa-coins"></i> Quỹ hỗ trợ tri thức: <b>200 CHF</b>/học viên</li>
                            <li><i class="fa-solid fa-percent"></i> Ưu đãi giảm thêm <b>200 CHF</b> cho người được giới thiệu</li>
                        </ul>
                    </div>

                    <!-- Tier 3 -->
                    <div class="amb-tier-row tier-tien-phong">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><i class="fa-solid fa-rocket"></i></div>
                            <div>
                                <h4 class="amb-tier-title">Tiên phong</h4>
                                <div class="amb-tier-points-range">300 – 599 điểm</div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><i class="fa-solid fa-gift"></i> Nhận quà tặng độc quyền hàng năm</li>
                            <li><i class="fa-solid fa-coins"></i> Quỹ hỗ trợ tri thức: <b>250 CHF</b>/học viên</li>
                            <li><i class="fa-solid fa-percent"></i> Ưu đãi giảm thêm <b>200 CHF</b> cho người được giới thiệu</li>
                        </ul>
                    </div>

                    <!-- Tier 4 -->
                    <div class="amb-tier-row tier-kim-cuong">
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><i class="fa-solid fa-gem"></i></div>
                            <div>
                                <h4 class="amb-tier-title">Kim Cương</h4>
                                <div class="amb-tier-points-range">600 – 999 điểm</div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><i class="fa-solid fa-gift"></i> Nhận quà tặng độc quyền hàng năm</li>
                            <li><i class="fa-solid fa-ticket"></i> Voucher DBA 5.000 EUR / MSc AI 2.500 CHF / Hỗ trợ 50% EMBA</li>
                            <li><i class="fa-solid fa-coins"></i> Quỹ hỗ trợ tri thức: <b>250 CHF</b>/học viên</li>
                            <li><i class="fa-solid fa-percent"></i> Giảm thêm <b>15% học phí</b> cho người được giới thiệu</li>
                        </ul>
                    </div>

                    <!-- Tier 5 -->
                    <div class="amb-tier-row tier-master">
                        <div class="amb-tier-top-badge"><i class="fa-solid fa-crown"></i> Hạng Cao Nhất</div>
                        <div class="amb-tier-profile">
                            <div class="amb-tier-icon-wrap"><i class="fa-solid fa-crown"></i></div>
                            <div>
                                <h4 class="amb-tier-title" style="color: #ab0e00;">Master</h4>
                                <div class="amb-tier-points-range">≥ 1.000 điểm</div>
                            </div>
                        </div>
                        <ul class="amb-tier-benefits-list">
                            <li><i class="fa-solid fa-gift"></i> Nhận quà tặng độc quyền hàng năm</li>
                            <li><i class="fa-solid fa-ticket"></i> Voucher DBA 5.000 EUR / MSc AI 2.500 CHF / Hỗ trợ 60% EMBA</li>
                            <li><i class="fa-solid fa-plane"></i> Tặng <b>01 cặp vé máy bay</b> khứ hồi sang Châu Âu</li>
                            <li><i class="fa-solid fa-coins"></i> Quỹ hỗ trợ tri thức: <b>300 CHF</b>/học viên</li>
                            <li><i class="fa-solid fa-percent"></i> Giảm thêm <b>25% học phí</b> cho người được giới thiệu</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 4: HOW TO JOIN & COMMITMENTS -->
        <section class="amb-section" style="background-color: #ffffff;">
            <div class="amb-container-width">
                <div class="amb-split-layout">
                    <!-- Steps -->
                    <div class="amb-flow-box">
                        <span class="amb-section-tag"><i class="fa-solid fa-map-signs"></i> Tham gia</span>
                        <h3>Hướng Dẫn <span>Tham Gia</span></h3>
                        <div class="amb-steps-col">
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">1</div>
                                <div class="amb-step-info">
                                    <h5>Chia sẻ &amp; Kết nối</h5>
                                    <p>Đại sứ chia sẻ trải nghiệm học tập thực tế và Mã Đại Sứ (SĐT của bạn) cho học viên tiềm năng, hoặc tham gia tích cực các sự kiện do IDEAS tổ chức.</p>
                                </div>
                            </div>
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">2</div>
                                <div class="amb-step-info">
                                    <h5>Ghi nhận &amp; Tích lũy</h5>
                                    <p>Hệ thống tự động ghi nhận các đóng góp của đại sứ và cập nhật điểm tích lũy trực tiếp trên hệ thống học vụ của Viện.</p>
                                </div>
                            </div>
                            <div class="amb-step-card">
                                <div class="amb-step-num-circle">3</div>
                                <div class="amb-step-info">
                                    <h5>Quy đổi Quyền lợi</h5>
                                    <p>Sử dụng điểm tín chỉ tích lũy được để quy đổi sang học bổng, phần thưởng giá trị hoặc trao tặng thẻ hỗ trợ tri thức cho người thân.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Commitments -->
                    <div class="amb-commit-box" style="display: flex; flex-direction: column; justify-content: space-between;">
                        <div>
                            <span class="amb-section-tag"><i class="fa-solid fa-certificate"></i> Cam kết</span>
                            <h3>Cam Kết Từ <span>Viện IDEAS</span></h3>
                            <div class="amb-commit-checklist">
                                <div class="amb-commit-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Đảm bảo tính minh bạch, chính xác tuyệt đối trong việc ghi nhận điểm và xếp hạng đại sứ.</span>
                                </div>
                                <div class="amb-commit-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Tôn vinh và vinh danh đóng góp của đại sứ qua các sự kiện, giải thưởng niên giám và danh sách công bố chính thức.</span>
                                </div>
                                <div class="amb-commit-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Tạo mọi điều kiện hỗ trợ tối đa để hội viên phát triển năng lực bản thân và mở rộng mạng lưới quan hệ xã hội.</span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="amb-commit-cta-btn" onclick="showform('amb_commit_sec')"><i class="fa-solid fa-headset"></i> Đăng ký tư vấn</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- SECTION 5: BLOG NEWS ARTICLES -->
        <section class="amb-section">
            <div class="amb-container-width">
                <div class="amb-section-title-wrap">
                    <span class="amb-section-tag"><i class="fa-solid fa-newspaper"></i> Tin tức</span>
                    <h2 class="amb-section-title">Bài Viết <span>Nổi Bật</span></h2>
                    <p class="amb-section-subtitle">Tìm hiểu chi tiết hơn các bài phân tích chuyên sâu về vai trò và sự phát triển của cộng đồng đại sứ.</p>
                </div>

                <div class="amb-news-grid">
                    <!-- Article 1 -->
                    <a href="https://ideas.edu.vn/tin-tuc-moi/dai-su-thuong-hieu-ideas-ambassador.html" target="_blank" class="amb-news-card">
                        <div class="amb-news-img-box">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/Cover-Blog-4.webp" alt="Đại sứ thương hiệu IDEAS Ambassador" loading="lazy" />
                            <div class="amb-news-hover-overlay"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                        </div>
                        <div class="amb-news-body">
                            <span class="amb-news-tag"><i class="fa-solid fa-tag"></i> Ambassador</span>
                            <h4>Đại Sứ Thương Hiệu IDEAS Ambassador</h4>
                            <p>Tìm hiểu vai trò Đại sứ thương hiệu IDEAS – cơ hội tuyệt vời để chia sẻ tri thức, mở rộng mối quan hệ và nhận những quyền lợi đặc quyền hấp dẫn từ cộng đồng học thuật.</p>
                            <div class="amb-news-footer">
                                <span><i class="fa-solid fa-calendar"></i> Năm 2026</span>
                                <span class="amb-news-readmore">Đọc chi tiết <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>

                    <!-- Article 2 -->
                    <a href="https://ideas.edu.vn/tin-tuc-moi/ideas-ambassador-2026-quy-dau-tu-nhan-tai.html" target="_blank" class="amb-news-card">
                        <div class="amb-news-img-box">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2026/03/final-2.webp" alt="IDEAS Ambassador 2026 – Quỹ đầu tư nhân tài" loading="lazy" />
                            <div class="amb-news-hover-overlay"><i class="fa-solid fa-arrow-up-right-from-square"></i></div>
                        </div>
                        <div class="amb-news-body">
                            <span class="amb-news-tag"><i class="fa-solid fa-tag"></i> Quỹ Nhân Tài</span>
                            <h4>IDEAS Ambassador 2026 – Quỹ Đầu Tư Nhân Tài</h4>
                            <p>Khám phá thông tin chi tiết về Quỹ đầu tư nhân tài IDEAS Ambassador 2026 – nơi vinh danh các cống hiến vượt bậc và bồi đắp nguồn nhân lực cấp cao cho tương lai.</p>
                            <div class="amb-news-footer">
                                <span><i class="fa-solid fa-calendar"></i> Năm 2026</span>
                                <span class="amb-news-readmore">Đọc chi tiết <i class="fa-solid fa-arrow-right"></i></span>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>
    </main>



    <!-- Parallax Hero Background Scroll Handler -->
    <script>
        const heroBg = document.getElementById('amb-parallax-bg');
        if (heroBg) {
            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    requestAnimationFrame(function () {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('amb-hero-top').offsetHeight;
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
