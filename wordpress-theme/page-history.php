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
            background-color: #ffffff;
            color: #111827;
            background-image:
                radial-gradient(circle at 10% 20%, rgba(171, 14, 0, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 90% 70%, rgba(171, 14, 0, 0.04) 0%, transparent 45%),
                radial-gradient(rgba(15, 23, 42, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 26px 26px;
            background-attachment: scroll, scroll, fixed;
        }

        /* Hero Header */
        .history-hero {
            position: relative;
            padding: 180px 20px 110px;
            text-align: center;
            color: #ffffff;
            overflow: hidden;
            background: #0d0405;
        }

        /* Parallax background image */
        .history-hero-bg {
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

        /* Multi-layer gradient overlay (top-heavy dark, red glow bottom) */
        .history-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(13, 4, 5, 0.85) 0%,
                    rgba(80, 6, 0, 0.5) 60%,
                    rgba(13, 4, 5, 0.95) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.35) 0%, transparent 65%);
        }

        .history-hero .container {
            position: relative;
            z-index: 3;
        }

        .history-hero-badge {
            background: rgba(171, 14, 0, 0.25) !important;
            border: 1px solid rgba(171, 14, 0, 0.6) !important;
            padding: 8px 18px !important;
            border-radius: 100px !important;
            color: #ffffff !important;
            font-size: 0.82rem !important;
            font-weight: 700 !important;
            text-transform: uppercase !important;
            letter-spacing: 0.12em !important;
            display: inline-flex !important;
            align-items: center !important;
            gap: 8px !important;
            margin-bottom: 22px !important;
            backdrop-filter: blur(12px) !important;
        }

        .history-hero h1 {
            font-size: clamp(2.6rem, 6vw, 4rem) !important;
            font-weight: 800 !important;
            margin-bottom: 20px !important;
            letter-spacing: -0.03em !important;
            line-height: 1.15 !important;
            color: #ffffff !important;
            text-shadow: 0 2px 20px rgba(0,0,0,0.4) !important;
        }

        .history-hero h1 span {
            background: linear-gradient(135deg, #ff4444 0%, #ab0e00 60%, #ff3030 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .history-hero p {
            font-size: 1.1rem !important;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 640px !important;
            margin: 0 auto !important;
            line-height: 1.7 !important;
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
            box-shadow: 0 0 10px rgba(171, 14, 0, 0.15);
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
            border: 4px solid #ffffff;
            box-shadow: 0 0 8px rgba(171, 14, 0, 0.3);
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
            box-shadow: 0 4px 10px rgba(171, 14, 0, 0.25);
            border: 1px solid rgba(255,255,255,0.2);
        }

        /* Timeline Content Card */
        .timeline-card {
            width: 45%;
            background: #ffffff;
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid #e2e8f0;
            border-radius: 24px;
            padding: 35px;
            box-shadow: 0 10px 30px rgba(15, 23, 42, 0.04);
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            position: relative;
        }

        .timeline-item:hover .timeline-card {
            transform: translateY(-5px);
            border-color: rgba(171, 14, 0, 0.25);
            background: #ffffff;
            box-shadow: 0 15px 35px rgba(171, 14, 0, 0.08);
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
            color: #0f172a;
            margin-bottom: 16px;
            line-height: 1.3;
        }

        .timeline-card p {
            color: #475569;
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
            color: #475569;
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

        /* Image styling – 2 photos per row, 3 logos per row */
        .timeline-images {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-top: 20px;
        }

        /* Single image takes full width */
        .timeline-images img:only-child {
            grid-column: 1 / -1;
        }

        .timeline-images img {
            width: 100%;
            height: 160px;
            border-radius: 12px;
            object-fit: cover;
            border: 1px solid #e2e8f0;
            transition: transform 0.3s ease;
            display: block;
        }

        .timeline-images img:hover {
            transform: scale(1.04);
        }

        /* Logo grid – 3 per row */
        .timeline-images.wlogos {
            grid-template-columns: repeat(3, 1fr);
            align-items: center;
            justify-items: center;
        }

        .timeline-images img.wlogo {
            height: 70px;
            width: 100%;
            background: #f8fafc;
            padding: 10px 14px;
            object-fit: contain;
            border-radius: 10px;
            border: 1px solid #e2e8f0;
        }

        /* Single logo - still auto size */
        .timeline-images.wlogos img.wlogo:only-child {
            grid-column: auto;
            max-width: 200px;
            justify-self: start;
        }

        /* Mobile: stack to 1 column */
        @media (max-width: 600px) {
            .timeline-images {
                grid-template-columns: 1fr;
            }
            .timeline-images.wlogos {
                grid-template-columns: repeat(2, 1fr);
            }
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

            .history-hero {
                padding: 130px 16px 50px !important;
            }

            .timeline-section {
                padding: 50px 16px !important;
            }
        }
    </style>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>


    <!-- Hero Area -->
    <section class="history-hero" id="history-hero-top">
        <div class="history-hero-bg" id="history-parallax-bg"
            style="background-image: url('https://ideas.edu.vn/wp-content/uploads/2026/05/Kien-tao-2.webp');"></div>
        <div class="history-hero-overlay"></div>
        <div class="container">
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
                    <div class="timeline-images wlogos">
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
                    <div class="timeline-images wlogos">
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/ideas-02.png" alt="Logo IDEAS" />
                    </div>
                    <div class="timeline-images" style="margin-top: 15px;">
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
                    </div>
                    <div class="timeline-images wlogos" style="margin-top: 15px;">
                        <img class="wlogo" src="https://ideas.edu.vn/wp-content/uploads/2025/03/estiam.png" alt="ESTIAM Paris" />
                    </div>
                </div>
            </div>

        </div>
    </main>

    <!-- Parallax script for history hero -->
    <script>
        const historyBg = document.getElementById('history-parallax-bg');
        if (historyBg) {
            let ticking = false;
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(function() {
                        const scrollY = window.scrollY;
                        const heroH = document.getElementById('history-hero-top').offsetHeight;
                        if (scrollY < heroH + 200) {
                            historyBg.style.transform = 'translate3d(0, ' + (scrollY * 0.35) + 'px, 0) scale(1.15)';
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

    <?php get_footer(); ?>
