<?php
/**
 * The template for displaying the Cac Khoan Chi Phi page
 * Template Name: Premium Program Fees Template
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
    <title>Các khoản chi phí & Lệ phí học vụ | Viện IDEAS</title>

    <meta name="description"
        content="Bảng tổng hợp chi tiết các khoản phí dịch vụ, lệ phí thi lại, học lại và quy định học vụ áp dụng cho chương trình đào tạo của Swiss UMEF." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Các khoản chi phí & Lệ phí học vụ - Viện IDEAS" />
    <meta property="og:description"
        content="Xem bảng lệ phí chi tiết các hoạt động học vụ (Recheck, Retake, Redo, Lễ tốt nghiệp...) dành cho học viên chương trình Swiss UMEF." />
    <meta property="og:image" content="https://ideas.edu.vn/wp-content/uploads/2023/07/Logo-Swiss-UMEF.webp" />
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
           PROGRAM FEES – PREMIUM THEME STYLES
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



        /* ── Sections ──────────────────────── */
        .fee-section {
            padding: 90px 20px;
        }

        .fee-section.first-section {
            padding-top: 130px;
        }

        .fee-container-width {
            max-width: 1200px;
            margin: 0 auto;
            width: 100%;
        }

        .fee-section-title-wrap {
            text-align: center;
            margin-bottom: 60px;
        }

        .fee-section-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(171, 14, 0, 0.06);
            color: #ab0e00;
            padding: 6px 16px;
            border-radius: 100px;
            font-size: 0.78rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            margin-bottom: 16px;
            border: 1px solid rgba(171, 14, 0, 0.1);
        }

        .fee-section-title {
            font-size: clamp(1.8rem, 4vw, 2.5rem);
            font-weight: 850;
            color: #0f172a;
            margin: 0 0 16px 0;
            letter-spacing: -0.02em;
        }

        .fee-section-title span {
            color: #ab0e00;
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .fee-section-subtitle {
            font-size: 1.05rem;
            color: #4b5563;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* ── Modern Table Layout ────────────── */
        .fee-table-wrap {
            background: #ffffff;
            border-radius: 28px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.03);
            border: 1px solid #e2e8f0;
            padding: 50px;
            margin-top: 20px;
            position: relative;
            overflow: hidden;
        }

        .fee-table-wrap::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, #8c1000 0%, #ab0e00 50%, #ff6b6b 100%);
        }

        .fee-table-split {
            display: grid;
            grid-template-columns: 0.95fr 1.05fr;
            gap: 60px;
            align-items: center;
        }

        .fee-table-visual {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            background: #f8fafc;
            border-radius: 20px;
            padding: 40px 30px;
            border: 1px dashed #e2e8f0;
            transition: all 0.3s ease;
        }

        .fee-table-visual:hover {
            border-color: rgba(171, 14, 0, 0.3);
            transform: translateY(-2px);
        }

        .fee-partner-logo {
            max-width: 160px;
            height: auto;
            margin-bottom: 24px;
        }

        .fee-partner-title {
            font-size: 1.4rem;
            font-weight: 800;
            color: #1e293b;
            margin: 0 0 10px 0;
        }

        .fee-partner-desc {
            font-size: 0.92rem;
            color: #64748b;
            line-height: 1.6;
            margin: 0 0 24px 0;
            max-width: 320px;
        }

        .fee-table-highlights {
            display: flex;
            flex-direction: column;
            gap: 12px;
            width: 100%;
        }

        .fee-hl-item {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #ffffff;
            padding: 12px 18px;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(15, 23, 42, 0.01);
            font-size: 0.9rem;
            font-weight: 600;
            color: #334155;
            border: 1px solid #f1f5f9;
        }

        .fee-hl-item i {
            color: #ab0e00;
            font-size: 1.05rem;
        }

        .fee-table-responsive {
            width: 100%;
            overflow-x: auto;
        }

        .fee-table-custom {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        .fee-table-custom th {
            background: #f8fafc;
            padding: 18px 24px;
            font-size: 0.82rem;
            font-weight: 800;
            color: #475569;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid #e2e8f0;
        }

        .fee-table-custom td {
            padding: 18px 24px;
            font-size: 0.96rem;
            color: #334155;
            border-bottom: 1px solid #f1f5f9;
            font-weight: 600;
            transition: background-color 0.2s ease;
        }

        .fee-table-custom tr:last-child td {
            border-bottom: none;
        }

        .fee-table-custom tr:hover td {
            background-color: #fffbfb;
        }

        .fee-badge {
            background: rgba(171, 14, 0, 0.08);
            border: 1px solid rgba(171, 14, 0, 0.18);
            padding: 6px 16px;
            border-radius: 100px;
            color: #ab0e00;
            font-weight: 800;
            font-size: 0.88rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .fee-badge.highlight {
            background: linear-gradient(135deg, #8c1000 0%, #ab0e00 100%);
            color: #ffffff;
            border: none;
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.15);
        }

        .fee-badge.simple {
            background: #f1f5f9;
            border-color: #cbd5e1;
            color: #475569;
        }

        @media (max-width: 991px) {
            .fee-section {
                padding-top: 100px !important;
                padding-left: 20px !important;
                padding-right: 20px !important;
                padding-bottom: 50px !important;
            }
            .fee-section.first-section {
                padding-top: 100px !important;
            }
            .fee-table-wrap {
                padding: 24px 16px !important;
                border-radius: 20px !important;
            }
            .fee-table-split {
                grid-template-columns: 1fr;
                gap: 32px;
            }
            .fee-table-visual {
                max-width: 480px;
                margin: 0 auto;
                width: 100%;
                padding: 24px 16px !important;
            }
            .fee-hl-item {
                padding: 10px 12px !important;
                font-size: 0.82rem !important;
                gap: 8px !important;
                text-align: left;
            }
            .fee-table-custom th,
            .fee-table-custom td {
                padding: 12px 8px !important;
                font-size: 0.88rem !important;
            }
            .fee-badge {
                padding: 4px 10px !important;
                font-size: 0.8rem !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- MAIN SECTION (No Hero) -->
    <main class="ideas_main" style="gap:0; background:none;">
        <!-- SECTION: FEES TABLE -->
        <section class="fee-section" style="padding-top: 130px;">
            <div class="fee-container-width">
                <div class="fee-section-title-wrap">
                    <span class="fee-section-tag"><i class="fa-solid fa-coins"></i> Lệ phí học vụ</span>
                    <h2 class="fee-section-title">Chi Tiết <span>Các Khoản Phí</span> Swiss UMEF</h2>
                    <p class="fee-section-subtitle">Áp dụng cho học viên tham gia học tập các chương trình cử nhân, thạc sĩ và tiến sĩ liên kết Thụy Sĩ tại Viện IDEAS.</p>
                </div>

                <div class="fee-table-wrap">
                    <div class="fee-table-split">
                        <!-- Left Column: Partner Info -->
                        <div class="fee-table-visual">
                            <img src="https://ideas.edu.vn/wp-content/uploads/2023/07/Logo-Swiss-UMEF.webp" alt="Swiss UMEF Logo" class="fee-partner-logo" />
                            <h4 class="fee-partner-title">Swiss UMEF University</h4>
                            <p class="fee-partner-desc">Trường Đại học chuẩn quốc tế được công nhận bởi Hội đồng Kiểm định Thụy Sĩ (Swiss Accreditation Council).</p>
                            
                            <div class="fee-table-highlights">
                                <div class="fee-hl-item">
                                    <i class="fa-solid fa-circle-info"></i>
                                    <span>Đơn vị tiền tệ tính bằng Franc Thụy Sĩ (CHF)</span>
                                </div>
                                <div class="fee-hl-item">
                                    <i class="fa-solid fa-circle-check"></i>
                                    <span>Công khai, minh bạch theo chuẩn kiểm định</span>
                                </div>
                                <div class="fee-hl-item">
                                    <i class="fa-solid fa-shield-halved"></i>
                                    <span>Áp dụng thống nhất trong toàn bộ khóa học</span>
                                </div>
                            </div>
                        </div>

                        <!-- Right Column: Table Content -->
                        <div class="fee-table-responsive">
                            <table class="fee-table-custom">
                                <thead>
                                    <tr>
                                        <th>Loại phí học vụ</th>
                                        <th style="width:170px; text-align:center;">Lệ phí</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Phí phúc khảo bài thi (Recheck)</td>
                                        <td style="text-align:center;"><span class="fee-badge">200 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí thi lại môn học (Retake)</td>
                                        <td style="text-align:center;"><span class="fee-badge">200 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí học lại môn học (Redo)</td>
                                        <td style="text-align:center;"><span class="fee-badge">300 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lệ phí Canton &amp; Lãnh sự Thụy Sĩ</td>
                                        <td style="text-align:center;">
                                            <span class="fee-badge highlight">~400 CHF</span>
                                            <div style="font-size:0.75rem; color:#64748b; font-weight:600; margin-top:4px;">(dự kiến, tùy đợt)</div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lệ phí chuyển đổi chương trình học</td>
                                        <td style="text-align:center;"><span class="fee-badge">350 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td>Phí quản lý hành chính (Administration fee)</td>
                                        <td style="text-align:center;"><span class="fee-badge">150 CHF</span></td>
                                    </tr>
                                    <tr>
                                        <td>Lệ phí tham dự Lễ Tốt Nghiệp</td>
                                        <td style="text-align:center;"><span class="fee-badge simple">Tùy từng đợt</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>





    

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
