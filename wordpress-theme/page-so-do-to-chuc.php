<?php
/**
 * The template for displaying the Organization Chart page
 * Template Name: Premium Organization Chart Template
 */
global $wp;

// Block unwanted old theme styles via output buffering
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
    <title>Sơ đồ tổ chức & Cơ cấu nhân sự | Viện IDEAS</title>
    <meta name="description" content="Khám phá sơ đồ tổ chức của Viện IDEAS với đội ngũ điều hành chuyên nghiệp, hội đồng khoa học chuyên môn và các tư vấn viên tận tâm." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Sơ đồ tổ chức & Cơ cấu nhân sự | Viện IDEAS" />
    <meta property="og:description" content="Hành trình hỗ trợ học vụ chuyên nghiệp và bền vững với bộ máy nhân sự được tối ưu hóa toàn diện." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp" />
    <meta property="og:url" content="<?php echo esc_url(home_url(add_query_arg(array(), $wp->request))); ?>" />

    <!-- Google Fonts & FontAwesome -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
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
        :root {
            --line-color: rgba(148, 163, 184, 0.35); /* Faint gray-blue connector lines */
        }
        /* ══════════════════════════════════════
           ORGANIZATION CHART – PREMIUM LIGHT THEME
        ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #f4f6fb;
            color: #1e293b;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.04) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.03) 0%, transparent 45%),
                radial-gradient(rgba(171, 14, 0, 0.04) 1.5px, transparent 1.5px);
            background-size: 100% 100%, 100% 100%, 30px 30px;
            background-attachment: scroll, scroll, scroll;
            position: relative;
        }

        .bg-decorations {
            position: absolute;
            inset: 0;
            pointer-events: none;
            z-index: 0;
            overflow: hidden;
        }

        .bg-decor-icon {
            position: absolute;
            color: rgba(171, 14, 0, 0.035);
            pointer-events: none;
            user-select: none;
        }

        /* Hero Area */
        .org-hero {
            position: relative;
            padding: 130px 20px 70px;
            text-align: center;
        }

        .org-hero-badge {
            background: rgba(171, 14, 0, 0.07);
            border: 1px solid rgba(171, 14, 0, 0.22);
            padding: 8px 18px;
            border-radius: 100px;
            color: #ab0e00;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        .org-hero h1 {
            font-size: clamp(2.2rem, 5vw, 3rem);
            font-weight: 850;
            color: #0f172a;
            margin-bottom: 12px;
            letter-spacing: -0.02em;
        }

        .org-hero h1 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .org-hero p {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Tree Layout ───────────────────── */
        .org-tree-section {
            padding: 40px 20px 100px;
        }

        .org-tree-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
        }
        .canvas-viewport .org-tree-container {
            max-width: none !important;
            width: max-content !important;
        }

        /* Vertical Connector Line */
        .org-tree-line {
            width: 2px;
            height: 35px;
            background: var(--line-color);
            position: relative;
            z-index: 1;
        }

        .org-tree-line.sub-line {
            height: 25px;
        }

        /* Primary Executive Node */
        .org-node {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 4px 20px rgba(15, 23, 42, 0.03);
            text-align: center;
            position: relative;
            z-index: 10;
            transition: all 0.35s cubic-bezier(0.165, 0.84, 0.44, 1);
            width: 320px;
            box-sizing: border-box;
        }

        .org-node:hover {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.25);
            box-shadow: 0 12px 30px rgba(171, 14, 0, 0.08);
        }

        /* Node Link Specifics */
        a.org-node-link {
            text-decoration: none;
            display: flex;
            flex-direction: row;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            width: 320px;
            text-align: left;
            box-sizing: border-box;
        }

        a.org-node-link .org-node-arrow {
            font-size: 1.1rem;
            color: #94a3b8;
            transition: transform 0.3s ease, color 0.3s ease;
        }

        a.org-node-link:hover .org-node-arrow {
            transform: translateX(4px);
            color: #ab0e00;
        }

        /* Node Details */
        .org-node-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #f1f5f9;
            margin: 0 auto 12px;
            display: block;
            background: #f1f5f9;
        }

        a.org-node-link .org-node-avatar {
            margin: 0 16px 0 0;
            width: 60px;
            height: 60px;
        }

        .org-node-body-horizontal {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .org-node-avatar-placeholder {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff8a8a 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 1.4rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid #f1f5f9;
            margin: 0 auto 12px;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.12);
        }

        .org-node-role {
            font-size: 0.72rem;
            font-weight: 800;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin-bottom: 5px;
        }

        .org-node-name {
            font-size: 1.05rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 5px;
            line-height: 1.3;
        }

        .org-node-info {
            font-size: 0.8rem;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            margin-top: 5px;
        }

        a.org-node-link .org-node-info {
            justify-content: flex-start;
        }

        .org-node-info a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .org-node-info a:hover {
            color: #ab0e00;
        }

        /* ── Columns / Branches ────────────── */
        .org-branches {
            display: flex;
            justify-content: center;
            position: relative;
            width: 100%;
            gap: 32px;
        }

        .org-branch-col {
            display: flex;
            flex-direction: column;
            align-items: center;
            position: relative;
            flex: 0 0 auto;
            width: 320px;
            box-sizing: border-box;
        }

        .org-branch-col.has-consultants {
            width: 580px;
            flex: 0 0 auto;
            box-sizing: border-box;
        }

        .org-branch-col.has-sub-branches {
            width: auto;
            flex: 0 0 auto;
            max-width: none;
        }

        /* Desktop vertical connector to branches */
        .org-branch-col::before {
            content: '';
            width: 2px;
            height: 20px;
            background: var(--line-color);
            z-index: 1;
        }

        /* Desktop horizontal connector bar spanning columns center-to-center */
        .org-branch-col::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: var(--line-color);
            z-index: 1;
        }

        .org-branch-col:first-child::after {
            left: 50%;
        }

        .org-branch-col:last-child::after {
            right: 50%;
        }

        .consultant-avatar-placeholder {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff8a8a 0%, #ab0e00 100%);
            color: #ffffff;
            font-size: 1rem;
            font-weight: 800;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px solid #f1f5f9;
            flex-shrink: 0;
            box-shadow: 0 2px 6px rgba(171, 14, 0, 0.12);
        }

        .consultants-warning {
            grid-column: span 2;
            background: #fffbeb;
            border: 1px solid #fef3c7;
            border-radius: 12px;
            padding: 12px 16px;
            font-size: 0.8rem;
            color: #b45309;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            text-align: left;
            line-height: 1.4;
            box-shadow: 0 2px 8px rgba(217, 119, 6, 0.04);
            width: 100%;
            box-sizing: border-box;
        }

        .consultants-warning i {
            color: #d97706;
            font-size: 1.1rem;
            margin-top: 1px;
            flex-shrink: 0;
        }

        /* ── Consultants (Tư vấn viên) ───────── */
        .consultants-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 14px;
            width: 100%;
            margin-top: 10px;
        }

        .consultants-title {
            text-align: center;
            font-size: 0.74rem;
            font-weight: 800;
            color: #64748b;
            text-transform: uppercase;
            letter-spacing: 0.08em;
            margin: 8px 0 2px;
        }

        .consultant-card {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 14px 18px;
            display: flex;
            align-items: center;
            gap: 14px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.02);
            transition: all 0.3s ease;
            text-align: left;
        }

        .consultant-card:hover {
            transform: translateY(-3px);
            border-color: rgba(171, 14, 0, 0.2);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.06);
        }

        .consultant-avatar {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f1f5f9;
            flex-shrink: 0;
            background: #f1f5f9;
        }

        .consultant-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .consultant-name {
            font-size: 0.92rem;
            font-weight: 700;
            color: #0f172a;
            margin-bottom: 2px;
        }

        .consultant-role {
            font-size: 0.68rem;
            font-weight: 700;
            color: #ab0e00;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .consultant-info {
            font-size: 0.76rem;
            color: #64748b;
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 3px;
        }

        .consultant-info a {
            color: inherit;
            text-decoration: none;
            transition: color 0.2s;
        }

        .consultant-info a:hover {
            color: #ab0e00;
        }

        /* ── Responsive Styling ───────────── */
        @media (max-width: 992px) {
            .org-tree-section {
                padding: 20px 16px 80px;
            }

            .org-tree-container {
                align-items: stretch;
                padding-left: 36px;
            }

            /* Draw the single vertical trunk line */
            .org-tree-container::before {
                content: '';
                position: absolute;
                top: 46px; /* Aligns exactly with vertical center of first card */
                bottom: 46px; /* Aligns exactly with vertical center of last card */
                left: 12px;
                width: 2px;
                background: var(--line-color);
                z-index: 1;
            }

            /* Hide default spacer lines between levels */
            .org-tree-line {
                display: none !important;
            }

            /* Reset fixed widths outside canvas for vertical responsive stack */
            .org-tree-container .org-node {
                width: 100% !important;
                max-width: 100% !important;
            }
            .org-tree-container a.org-node-link {
                width: 100% !important;
                max-width: 100% !important;
            }
            .org-tree-container .org-branch-col {
                width: 100% !important;
                max-width: 100% !important;
                flex: 1 1 auto !important;
            }

            /* Flex layout to align avatar left and details right on mobile */
            .org-node:not(.org-node-link) {
                display: flex;
                align-items: center;
                text-align: left;
                padding: 16px 20px;
                max-width: 100%;
                width: 100%;
                margin-bottom: 24px;
                gap: 16px;
            }

            .org-node:not(.org-node-link) .org-node-avatar,
            .org-node:not(.org-node-link) .org-node-avatar-placeholder {
                margin: 0;
                width: 60px;
                height: 60px;
                flex-shrink: 0;
            }

            .org-node:not(.org-node-link) .org-node-avatar-placeholder {
                font-size: 1.15rem;
            }

            .org-node-body {
                display: flex;
                flex-direction: column;
                flex-grow: 1;
                gap: 4px;
                text-align: left;
            }

            .org-node:not(.org-node-link) .org-node-role,
            .org-node:not(.org-node-link) .org-node-name,
            .org-node:not(.org-node-link) .org-node-info {
                margin: 0;
            }

            .org-node:not(.org-node-link) .org-node-info {
                justify-content: flex-start;
            }

            /* Connector line from standard card to vertical trunk line */
            .org-node::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: -24px; /* Matches padding-left(36px) - trunk offset(12px) */
                width: 24px;
                height: 2px;
                background: var(--line-color);
                z-index: 2;
            }

            /* Flex layout and card sizing for links */
            a.org-node-link {
                max-width: 100%;
                width: 100%;
                padding: 16px 20px;
                margin-bottom: 24px;
            }

            a.org-node-link .org-node-avatar {
                margin: 0 16px 0 0;
                width: 60px;
                height: 60px;
            }

            /* Branches structure */
            .org-branches {
                flex-direction: column;
                align-items: stretch;
                gap: 0;
            }

            .org-branch-col {
                max-width: 100%;
                width: 100%;
                align-items: stretch;
            }

            .org-branch-col::before,
            .org-branch-col::after {
                display: none !important;
            }

            /* Nesting consultants sub-tree under Mai Nu card */
            .consultants-title {
                text-align: left;
                margin: 0 0 12px 24px;
                font-size: 0.72rem;
            }

            .consultants-grid {
                width: calc(100% - 24px);
                margin: 0 0 24px 24px;
                position: relative;
                padding-left: 20px;
                gap: 12px;
                display: flex !important;
                flex-direction: column !important;
            }

            /* Vertical sub-trunk inside consultants list */
            .consultants-grid::before {
                content: '';
                position: absolute;
                top: -10px;
                bottom: 40px; /* Aligns with vertical center of last consultant card */
                left: 0;
                width: 2px;
                background: var(--line-color);
                z-index: 1;
            }

            .consultant-card {
                position: relative;
                max-width: 100%;
            }

            /* Consultant card horizontal connector to sub-trunk */
            .consultant-card::before {
                content: '';
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                left: -20px;
                width: 20px;
                height: 2px;
                background: var(--line-color);
                z-index: 2;
            }

            .org-hero {
                padding: 110px 16px 40px !important;
            }
        }

        /* ── Canvas Viewport ───────────────── */
        .canvas-viewport {
            position: relative;
            width: 100%;
            height: 720px;
            border: 1px solid rgba(171, 14, 0, 0.08);
            border-radius: 28px;
            background-color: #f8fafc;
            overflow: hidden;
            cursor: grab;
            user-select: none;
            box-shadow: inset 0 2px 8px rgba(15, 23, 42, 0.04), 0 10px 30px rgba(0, 0, 0, 0.02);
            touch-action: none;
            margin: 0 auto;
            background-image: radial-gradient(rgba(171, 14, 0, 0.04) 1.5px, transparent 1.5px);
            background-size: 24px 24px;
        }

        .canvas-viewport:active {
            cursor: grabbing;
        }

        .canvas-content {
            position: absolute;
            top: 0;
            left: 0;
            transform-origin: 0 0;
            will-change: transform;
            padding: 80px 100px;
            box-sizing: border-box;
            display: inline-block;
        }

        body {
            background-attachment: fixed;
        }

        /* Floating canvas controls */
        .canvas-controls {
            position: absolute;
            bottom: 24px;
            right: 24px;
            display: flex;
            flex-direction: column;
            gap: 8px;
            z-index: 100;
        }

        .canvas-controls button {
            width: 44px;
            height: 44px;
            border-radius: 14px;
            border: 1px solid rgba(226, 232, 240, 0.9);
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
            color: #475569;
            font-size: 1.05rem;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.2s cubic-bezier(0.165, 0.84, 0.44, 1);
            outline: none;
        }

        .canvas-controls button:hover {
            background: #ffffff;
            color: #ab0e00;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(171, 14, 0, 0.14);
            border-color: rgba(171, 14, 0, 0.2);
        }

        .canvas-controls button:active {
            transform: translateY(0);
        }

        .org-branch-col.has-sub-branches {
            max-width: none;
            width: auto;
        }

        /* Inside canvas, preserve desktop horizontal layout on mobile */
        @media (max-width: 992px) {
            .canvas-viewport .org-tree-container {
                align-items: center;
                padding-left: 0;
            }
            .canvas-viewport .org-tree-container::before {
                display: none !important;
            }
            .canvas-viewport .org-tree-line {
                display: block !important;
            }
            .canvas-viewport .org-node:not(.org-node-link) {
                display: block;
                text-align: center;
                padding: 24px;
                width: 320px !important;
                margin-bottom: 0;
                gap: 0;
            }
            .canvas-viewport .org-node-body {
                text-align: center;
            }
            .canvas-viewport .org-node:not(.org-node-link) .org-node-info {
                justify-content: center;
            }
            .canvas-viewport .org-node::before {
                display: none !important;
            }
            .canvas-viewport .org-branches {
                flex-direction: row;
                align-items: flex-start;
                gap: 32px;
            }
            .canvas-viewport .org-branch-col {
                width: 320px !important;
                flex: 0 0 auto !important;
                align-items: center;
            }
            .canvas-viewport .org-branch-col.has-consultants {
                width: 580px !important;
                flex: 0 0 auto !important;
            }
            .canvas-viewport .org-branch-col.has-sub-branches {
                width: auto !important;
                flex: 0 0 auto !important;
            }
            .canvas-viewport .org-branch-col::before,
            .canvas-viewport .org-branch-col::after {
                display: block !important;
            }
            .canvas-viewport .consultants-grid::before {
                display: none !important;
            }
            .canvas-viewport .consultant-card::before {
                display: none !important;
            }
            .canvas-viewport .consultants-grid {
                width: 100%;
                margin: 10px 0 0 0;
                padding-left: 0;
                display: grid !important;
                grid-template-columns: repeat(2, 1fr) !important;
                gap: 14px;
            }

            /* main layout outside canvas */
            .org-tree-container .org-trunk-container {
                display: flex;
                flex-direction: column;
                height: auto;
                align-items: stretch;
                position: relative;
                width: 100%;
            }
            .org-tree-container .org-vertical-trunk {
                display: none !important;
            }
            .org-tree-container .org-side-branch-left {
                position: static !important;
                transform: none !important;
                display: block !important;
                width: 100% !important;
            }
            .org-tree-container .org-horizontal-connector {
                display: none !important;
            }

            /* Restore for canvas viewport on mobile */
            .canvas-viewport .org-trunk-container {
                display: flex !important;
                flex-direction: row !important;
                height: 140px !important;
                align-items: center !important;
                justify-content: center !important;
                position: relative !important;
                width: 100% !important;
            }
            .canvas-viewport .org-vertical-trunk {
                display: block !important;
                position: absolute !important;
                top: 0 !important;
                bottom: 0 !important;
                left: 50% !important;
                transform: translateX(-50%) !important;
                width: 2px !important;
                background: var(--line-color) !important;
                z-index: 1 !important;
            }
            .canvas-viewport .org-side-branch-left {
                position: absolute !important;
                right: calc(50% + 40px) !important;
                top: 50% !important;
                transform: translateY(-50%) !important;
                display: flex !important;
                align-items: center !important;
                z-index: 10 !important;
                width: auto !important;
            }
            .canvas-viewport .org-horizontal-connector {
                display: block !important;
                width: 40px !important;
                height: 2px !important;
                background: var(--line-color) !important;
            }
        }

        /* ── Advisory Council Custom Layout ── */
        .org-trunk-container {
            position: relative;
            width: 100%;
            height: 140px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .org-vertical-trunk {
            position: absolute;
            top: 0;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 2px;
            background: var(--line-color);
            z-index: 1;
        }

        .org-side-branch-left {
            position: absolute;
            right: calc(50% + 40px);
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            z-index: 10;
        }

        .org-horizontal-connector {
            width: 40px;
            height: 2px;
            background: #cbd5e1;
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Background Decorative Icons -->
    <div class="bg-decorations" aria-hidden="true">
        <i class="fa-solid fa-sitemap bg-decor-icon" style="top: 15%; left: 4%; transform: rotate(15deg); font-size: 8rem;"></i>
        <i class="fa-solid fa-users bg-decor-icon" style="top: 35%; right: 4%; transform: rotate(-20deg); font-size: 7.5rem;"></i>
        <i class="fa-solid fa-network-wired bg-decor-icon" style="top: 55%; left: 3%; transform: rotate(-10deg); font-size: 7rem;"></i>
        <i class="fa-solid fa-graduation-cap bg-decor-icon" style="top: 72%; right: 3%; transform: rotate(25deg); font-size: 8rem;"></i>
        <i class="fa-solid fa-award bg-decor-icon" style="top: 88%; left: 5%; transform: rotate(-15deg); font-size: 7.5rem;"></i>
    </div>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Section -->
    <section class="org-hero">
        <div class="org-hero-badge">
            <i class="fa-solid fa-sitemap"></i>
            Bộ máy nhân sự
        </div>
        <h1>Cơ Cấu Tổ Chức &amp; <span>Sơ Đồ Nhân Sự</span></h1>
        <p>Quy chế hoạt động khoa học, bộ máy quản lý tinh gọn cùng đội ngũ chuyên viên học vụ chuyên nghiệp đồng hành cùng học viên Viện IDEAS.</p>
    </section>

    <!-- Tree Flow Section -->
    <section class="org-tree-section">
        <div class="canvas-viewport" id="org-canvas-viewport">
            <!-- Floating Canvas Controls -->
            <div class="canvas-controls">
                <button type="button" id="btn-zoom-in" title="Phóng to"><i class="fa-solid fa-plus"></i></button>
                <button type="button" id="btn-zoom-out" title="Thu nhỏ"><i class="fa-solid fa-minus"></i></button>
                <button type="button" id="btn-zoom-reset" title="Đặt lại góc nhìn"><i class="fa-solid fa-arrows-to-eye"></i></button>
            </div>
            
            <div class="canvas-content" id="org-canvas-content">
                <div class="org-tree-container">
                    
                    <!-- LEVEL 1: Viện Trưởng -->
                    <div class="org-node">
                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/vientruong_avt.jpg" class="org-node-avatar" alt="Viện trưởng IDEAS - TS. Phạm Quang Vinh">
                        <div class="org-node-body">
                            <div class="org-node-role">Viện Trưởng</div>
                            <h3 class="org-node-name">TS. Phạm Quang Vinh</h3>
                            <div class="org-node-info">
                                <i class="fa-solid fa-envelope"></i>
                                <a href="mailto:vinhpq@ideas.edu.vn">vinhpq@ideas.edu.vn</a>
                            </div>
                        </div>
                    </div>

                    <!-- Trunk with Side Branch (Advisory Council) -->
                    <div class="org-trunk-container">
                        <!-- Vertical Trunk Line -->
                        <div class="org-vertical-trunk"></div>
                        
                        <!-- Side Branch: Hội đồng chuyên môn -->
                        <div class="org-side-branch-left">
                            <a href="/doi-ngu-giang-vien" title="Hội đồng chuyên môn Viện IDEAS" class="org-node org-node-link">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" class="org-node-avatar" alt="Hội đồng chuyên môn">
                                <div class="org-node-body-horizontal">
                                    <div class="org-node-role" style="margin-bottom:2px;">Hội đồng chuyên môn</div>
                                    <div class="org-node-name" style="margin-bottom:0; font-size:0.95rem;"><i class="fa-solid fa-user-group" style="font-size:0.85rem; color:#ab0e00; margin-right:4px;"></i> Giảng viên – cố vấn</div>
                                </div>
                                <i class="fa-solid fa-angle-right org-node-arrow"></i>
                            </a>
                            <!-- Horizontal perpendicular connector line -->
                            <div class="org-horizontal-connector"></div>
                        </div>
                    </div>

                    <!-- LEVEL 3: Division Heads (3 Columns) -->
                    <div class="org-branches">
                        
                        <!-- COLUMN 1: Mai Nữ & Departments -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/mainu_avt.jpg" class="org-node-avatar" alt="Trưởng phòng Kinh doanh - Mai Nữ">
                                <div class="org-node-body">
                                    <div class="org-node-role">Trưởng Khối</div>
                                    <h3 class="org-node-name">Mai Nữ</h3>
                                    <div class="org-node-role" style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;">Kinh Doanh &amp; Trải Nghiệm Học Viên</div>
                                    <div class="org-node-info">
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:info@ideas.edu.vn">info@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to departments -->
                            <div class="org-tree-line"></div>
                            
                            <div class="org-branches">
                                <!-- Department 1.1: Phòng Sale -->
                                <div class="org-branch-col has-consultants">
                                    <div class="org-node">
                                        <img src="https://ideas.edu.vn/wp-content/uploads/2025/04/mainu_avt.jpg" class="org-node-avatar" alt="Trưởng phòng Sale - Mai Nữ">
                                        <div class="org-node-body">
                                            <div class="org-node-role">Trưởng Phòng Sale</div>
                                            <h3 class="org-node-name">Mai Nữ</h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Line down to Sale Admin -->
                                    <div class="org-tree-line"></div>
                                    
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">TKL</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Sale Admin</div>
                                            <h3 class="org-node-name">Trần Khánh Linh</h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Line down to advisors -->
                                    <div class="org-tree-line sub-line"></div>
                                    <div class="consultants-title"><i class="fa-solid fa-headset" style="margin-right:4px; color:#ab0e00;"></i> Tư vấn viên tuyển sinh</div>
                                    
                                    <div class="consultants-grid">
                                        <div class="consultants-warning">
                                            <i class="fa-solid fa-triangle-exclamation"></i>
                                            <div>
                                                <strong>CẢNH BÁO:</strong> Cảnh giác với các số điện thoại lạ mạo danh là tư vấn viên tuyển sinh của Viện IDEAS.
                                            </div>
                                        </div>
                                        
                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cphuc.webp" class="consultant-avatar" alt="Lưu Phan Hoàng Phúc">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Lưu Phan Hoàng Phúc</h4>
                                                <span class="consultant-role">Tư vấn viên</span>
                                                <div class="consultant-info">
                                                    <i class="fa-solid fa-phone"></i>
                                                    <strong>*********017</strong>
                                                </div>
                                            </div>
                                        </article>
                                        
                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/cdan.webp" class="consultant-avatar" alt="Nguyễn Thị Linh Đan">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Thị Linh Đan</h4>
                                                <span class="consultant-role">Tư vấn viên</span>
                                                <div class="consultant-info">
                                                    <i class="fa-solid fa-phone"></i>
                                                    <strong>*********953</strong>
                                                </div>
                                            </div>
                                        </article>
                                        
                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/nhi_avt.jpg" class="consultant-avatar" alt="Lê Đinh Ý Nhi">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Lê Đinh Ý Nhi</h4>
                                                <span class="consultant-role">Tư vấn viên</span>
                                                <div class="consultant-info">
                                                    <i class="fa-solid fa-phone"></i>
                                                    <strong>*********486</strong>
                                                </div>
                                            </div>
                                        </article>
                                        
                                        <article class="consultant-card">
                                            <img src="https://ideas.edu.vn/wp-content/uploads/2025/09/uyen.webp" class="consultant-avatar" alt="Nguyễn Phương Uyên">
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Phương Uyên</h4>
                                                <span class="consultant-role">Tư vấn viên</span>
                                                <div class="consultant-info">
                                                    <i class="fa-solid fa-phone"></i>
                                                    <strong>*********935</strong>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                
                                <!-- Department 1.2: Phòng Học vụ -->
                                <div class="org-branch-col has-consultants">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">LHT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Trưởng Phòng Học Vụ</div>
                                            <h3 class="org-node-name">Lê Huyền Trâm</h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Line down to team members -->
                                    <div class="org-tree-line sub-line"></div>
                                    <div class="consultants-title"><i class="fa-solid fa-users" style="margin-right:4px; color:#ab0e00;"></i> Hỗ trợ học vụ</div>
                                    
                                    <div class="consultants-grid">
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">NHN</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Hiếu Ngân</h4>
                                                <span class="consultant-role">Hỗ trợ học vụ</span>
                                            </div>
                                        </article>
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">VTN</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Vũ Trí Nhân</h4>
                                                <span class="consultant-role">Hỗ trợ học vụ</span>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2: Phạm Thị Phương Lan -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <img src="https://ideas.edu.vn/wp-content/uploads/2025/03/phamthiphuonglan_avt.jpg" class="org-node-avatar" alt="Trưởng phòng Kế hoạch - Phạm Thị Phương Lan">
                                <div class="org-node-body">
                                    <div class="org-node-role">Trưởng Khối</div>
                                    <h3 class="org-node-name">Phạm Thị Phương Lan</h3>
                                    <div class="org-node-role" style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;">Quản Trị &amp; Hậu Cần</div>
                                    <div class="org-node-info">
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:lanptp@ideas.edu.vn">lanptp@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to sub-departments -->
                            <div class="org-tree-line"></div>
                            
                            <div class="org-branches">
                                <!-- Department 2.1: Nhân sự -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">DP</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Trưởng Phòng Nhân Sự</div>
                                            <h3 class="org-node-name">Nguyễn Thị Duy Phương</h3>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Department 2.2: Kế toán -->
                                <div class="org-branch-col">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">NPT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Trưởng Phòng Kế Toán</div>
                                            <h3 class="org-node-name">Nguyễn Phương Thảo</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 3: Võ Trùng Dương -->
                        <div class="org-branch-col has-sub-branches">
                            <div class="org-node">
                                <div class="org-node-avatar-placeholder">VTD</div>
                                <div class="org-node-body">
                                    <div class="org-node-role">Trưởng Khối</div>
                                    <h3 class="org-node-name">Võ Trùng Dương</h3>
                                    <div class="org-node-role" style="font-size:0.64rem; color:#64748b; margin-top:2px; font-weight:700;">Tăng Trưởng &amp; Công Nghệ</div>
                                    <div class="org-node-info">
                                        <i class="fa-solid fa-envelope"></i>
                                        <a href="mailto:duongvt@ideas.edu.vn">duongvt@ideas.edu.vn</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Line down to sub-branches -->
                            <div class="org-tree-line"></div>
                            
                            <div class="org-branches">
                                <!-- Sub-branch 3.1: Trịnh Đình Thanh -->
                                <div class="org-branch-col has-consultants">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">TDT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Teamlead Marketing</div>
                                            <h3 class="org-node-name">Trịnh Đình Thanh</h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Line down to team members -->
                                    <div class="org-tree-line sub-line"></div>
                                    <div class="consultants-title"><i class="fa-solid fa-users" style="margin-right:4px; color:#ab0e00;"></i> Nhân sự trực thuộc</div>
                                    
                                    <div class="consultants-grid">
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">TD</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Trần Ngọc Thùy Dương</h4>
                                                <span class="consultant-role">Content Marketing</span>
                                            </div>
                                        </article>
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">TKN</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Trần Kim Ngân</h4>
                                                <span class="consultant-role">Content Marketing</span>
                                            </div>
                                        </article>
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">HNT</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Huỳnh Nhật Thanh</h4>
                                                <span class="consultant-role">Designer</span>
                                            </div>
                                        </article>
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">HTP</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Huỳnh Trọng Phúc</h4>
                                                <span class="consultant-role">Digital / Developer</span>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                                
                                <!-- Sub-branch 3.2: Ngô Gia Thái -->
                                <div class="org-branch-col has-consultants">
                                    <div class="org-node">
                                        <div class="org-node-avatar-placeholder">NGT</div>
                                        <div class="org-node-body">
                                            <div class="org-node-role">Tech Lead</div>
                                            <h3 class="org-node-name">Ngô Gia Thái</h3>
                                        </div>
                                    </div>
                                    
                                    <!-- Line down to team members -->
                                    <div class="org-tree-line sub-line"></div>
                                    <div class="consultants-title"><i class="fa-solid fa-users" style="margin-right:4px; color:#ab0e00;"></i> Nhân sự trực thuộc</div>
                                    
                                    <div class="consultants-grid">
                                        <article class="consultant-card">
                                            <div class="consultant-avatar-placeholder">HCC</div>
                                            <div class="consultant-body">
                                                <h4 class="consultant-name">Nguyễn Phạm Hoàng Cương</h4>
                                                <span class="consultant-role">Helpdesk</span>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
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
                    <h3>Đăng ký tìm hiểu <br><span class="gradient-text">Hành Trình Học Tập</span></h3>
                    <p>Chuyên viên hỗ trợ học vụ sẽ liên hệ với bạn trong vòng 24h làm việc để tư vấn chi tiết.</p>
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
                        <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi quan tâm chương trình MBA..." rows="3"></textarea>
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
                                <input type="radio" name="bk-program" value="Cơ cấu tổ chức Viện" checked />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">👔</div>
                                    <div class="bk-program-name">Tổ chức Viện IDEAS</div>
                                    <div class="bk-program-desc">Tìm hiểu thông tin hoạt động</div>
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
        function showform(ctaSource = 'sodo_cta') {
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

    

    <!-- Form Lead Submission Handlers -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const forms = [
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
                        note_dat_lich: "Đăng ký từ trang Sơ đồ tổ chức",
                        chuong_trinh_dat_lich: "Cơ cấu tổ chức Viện IDEAS"
                    };

                    const webhookPayload = {
                        name: name,
                        phone: phone,
                        email: email,
                        source: "Landing_Org_Structure",
                        type: "org_page_registration",
                        tieng_anh: "",
                        hoc_van: "",
                        time_dat_lich: "",
                        chuong_trinh: "Cơ cấu tổ chức Viện IDEAS",
                        nhu_cau: "Đăng ký tư vấn học vụ từ trang sơ đồ tổ chức"
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

    <!-- Canvas Pan & Zoom Control Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const viewport = document.getElementById('org-canvas-viewport');
            const content = document.getElementById('org-canvas-content');
            
            if (!viewport || !content) return;

            let scale = 1.0;
            let panX = 0;
            let panY = 0;
            let isDragging = false;
            let startX = 0;
            let startY = 0;

            // Touch pinch zoom state
            let isPinching = false;
            let startDist = 0;
            let startScale = 1.0;
            let touchCenterX = 0;
            let touchCenterY = 0;

            function applyTransform() {
                content.style.transform = `translate(${panX}px, ${panY}px) scale(${scale})`;
            }

            function centerCanvas() {
                const vr = viewport.getBoundingClientRect();
                const rootNode = content.querySelector('.org-node');
                if (!rootNode) return;
                
                scale = 1.0;
                const rootOffsetLeft = rootNode.offsetLeft;
                const rootWidth = rootNode.offsetWidth;
                
                panX = (vr.width / 2) - (rootOffsetLeft + rootWidth / 2);
                panY = 60; // Margin from top
                
                applyTransform();
            }

            // Mouse Events for Panning
            viewport.addEventListener('mousedown', (e) => {
                if (e.target.closest('.org-node-link') || e.target.closest('a') || e.target.closest('button') || e.target.closest('.consultant-card')) {
                    return; // Prevent panning when clicking interactive links/buttons
                }
                isDragging = true;
                startX = e.clientX - panX;
                startY = e.clientY - panY;
                viewport.style.cursor = 'grabbing';
            });

            window.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                panX = e.clientX - startX;
                panY = e.clientY - startY;
                applyTransform();
            });

            window.addEventListener('mouseup', () => {
                if (isDragging) {
                    isDragging = false;
                    viewport.style.cursor = 'grab';
                }
            });

            // Touch Events for Mobile Panning & Pinch Zooming
            viewport.addEventListener('touchstart', (e) => {
                if (e.target.closest('.org-node-link') || e.target.closest('a') || e.target.closest('button') || e.target.closest('.consultant-card')) {
                    return;
                }
                if (e.touches.length === 1) {
                    isDragging = true;
                    isPinching = false;
                    startX = e.touches[0].clientX - panX;
                    startY = e.touches[0].clientY - panY;
                } else if (e.touches.length === 2) {
                    isDragging = false;
                    isPinching = true;
                    startDist = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    startScale = scale;
                    touchCenterX = (e.touches[0].clientX + e.touches[1].clientX) / 2;
                    touchCenterY = (e.touches[0].clientY + e.touches[1].clientY) / 2;
                }
            }, { passive: true });

            viewport.addEventListener('touchmove', (e) => {
                if (isDragging && e.touches.length === 1) {
                    panX = e.touches[0].clientX - startX;
                    panY = e.touches[0].clientY - startY;
                    applyTransform();
                } else if (isPinching && e.touches.length === 2) {
                    const dist = Math.hypot(
                        e.touches[0].clientX - e.touches[1].clientX,
                        e.touches[0].clientY - e.touches[1].clientY
                    );
                    const ratio = dist / startDist;
                    const newScale = Math.min(Math.max(0.3, startScale * ratio), 2.5);
                    
                    if (newScale !== scale) {
                        const vr = viewport.getBoundingClientRect();
                        const mx = touchCenterX - vr.left;
                        const my = touchCenterY - vr.top;
                        
                        const sRatio = newScale / scale;
                        panX = mx - (mx - panX) * sRatio;
                        panY = my - (my - panY) * sRatio;
                        scale = newScale;
                        
                        applyTransform();
                    }
                }
            }, { passive: true });

            viewport.addEventListener('touchend', () => {
                isDragging = false;
                isPinching = false;
            });

            // Wheel Zoom Event (centered at cursor)
            viewport.addEventListener('wheel', (e) => {
                if (!e.ctrlKey) {
                    // Normal wheel scroll behaves as normal page scroll
                    return;
                }
                e.preventDefault();
                const vr = viewport.getBoundingClientRect();
                const mx = e.clientX - vr.left;
                const my = e.clientY - vr.top;
                
                const factor = e.deltaY > 0 ? -0.1 : 0.1;
                const newScale = Math.min(Math.max(0.3, scale + factor), 2.5);
                
                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = mx - (mx - panX) * ratio;
                    panY = my - (my - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            }, { passive: false });

            // Button Control Handlers
            document.getElementById('btn-zoom-in')?.addEventListener('click', () => {
                const vr = viewport.getBoundingClientRect();
                const cx = vr.width / 2;
                const cy = vr.height / 2;
                const newScale = Math.min(Math.max(0.3, scale + 0.15), 2.5);
                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = cx - (cx - panX) * ratio;
                    panY = cy - (cy - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            });

            document.getElementById('btn-zoom-out')?.addEventListener('click', () => {
                const vr = viewport.getBoundingClientRect();
                const cx = vr.width / 2;
                const cy = vr.height / 2;
                const newScale = Math.min(Math.max(0.3, scale - 0.15), 2.5);
                if (newScale !== scale) {
                    const ratio = newScale / scale;
                    panX = cx - (cx - panX) * ratio;
                    panY = cy - (cy - panY) * ratio;
                    scale = newScale;
                    applyTransform();
                }
            });

            document.getElementById('btn-zoom-reset')?.addEventListener('click', centerCanvas);

            // Initial alignment
            window.addEventListener('load', () => {
                setTimeout(centerCanvas, 150);
            });
            setTimeout(centerCanvas, 150);

            // Re-center on window resize
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(centerCanvas, 150);
            });
        });
    </script>

    <?php get_footer(); ?>
</body>

</html>
