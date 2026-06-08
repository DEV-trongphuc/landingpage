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
                padding: 50px 16px;
            }
            .fee-section.first-section {
                padding-top: 110px;
            }
            .fee-table-wrap {
                padding: 30px 20px;
            }
            .fee-table-split {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            .fee-table-visual {
                max-width: 480px;
                margin: 0 auto;
                width: 100%;
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

    <!-- Generic Registration Popup Modal -->
    <div class="reg-modal" id="reg-modal" role="dialog" aria-modal="true" aria-hidden="true" style="display:none;">
        <div class="reg-modal-overlay" id="reg-modal-overlay"></div>
        <div class="reg-modal-container" data-lenis-prevent>
            <button class="reg-modal-close" id="reg-modal-close" aria-label="Đóng modal">✕</button>
            <div class="reg-modal-content">
                <header class="modal-form-header">
                    <div class="modal-badge">NHẬN TƯ VẤN 1:1</div>
                    <h3>Giải đáp &amp; Tư vấn <br><span class="gradient-text">Quy chế học phí</span></h3>
                    <p>Chuyên viên tư vấn học vụ sẽ liên hệ với bạn trong vòng 24h làm việc để hướng dẫn chi tiết.</p>
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
                        <textarea id="modal-message" name="message" placeholder="Ví dụ: Tôi muốn hỏi chi tiết về phí Canton, các đợt tốt nghiệp..." rows="3"></textarea>
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
                    <p>Cảm ơn bạn đã quan tâm. Chuyên viên tư vấn của IDEAS sẽ sớm liên hệ với bạn qua số điện thoại hoặc email đã cung cấp.</p>
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
                                <input type="radio" name="bk-program" value="Các khoản chi phí" checked />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💸</div>
                                    <div class="bk-program-name">Chi phí & Lệ phí</div>
                                    <div class="bk-program-desc">Tìm hiểu quy chế & lệ phí học vụ</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="MBA High Quality" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🎓</div>
                                    <div class="bk-program-name">MBA Thụy Sĩ</div>
                                    <div class="bk-program-desc">Chương trình Thạc sĩ QTKD</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chưa quyết định" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">💡</div>
                                    <div class="bk-program-name">Khác / Tư vấn thêm</div>
                                    <div class="bk-program-desc">Cần tư vấn định hướng học vụ</div>
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
        function showform(ctaSource = 'fees_cta') {
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
