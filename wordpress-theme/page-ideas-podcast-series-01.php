<?php
/**
 * The template for displaying the Ideas Podcast Series 01 page
 * Template Name: Premium Ideas Podcast Template
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
    <title>Ideas Podcast Series 01 – Vượt rào cản tiếng Anh | Viện IDEAS</title>

    <meta name="description"
        content="Chuỗi Podcast chia sẻ phương pháp vượt qua rào cản tiếng Anh bằng cách ứng dụng AI trong học tập và nghiên cứu học thuật." />
    <link rel="icon" href="https://ideas.edu.vn/wp-content/uploads/2023/04/logofavicon.png" sizes="32x32" />

    <meta property="og:type" content="article" />
    <meta property="og:title" content="Ideas Podcast Series 01 – Vượt rào cản tiếng Anh" />
    <meta property="og:description"
        content="Lắng nghe các giải pháp, lời khuyên thực tế từ đội ngũ chuyên gia về cách kết hợp tư duy độc lập và Trí Tuệ Nhân Tạo." />
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
           IDEAS PODCAST – PREMIUM DARK THEME
           ══════════════════════════════════════ */
        html,
        body {
            overflow-x: clip !important;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            background-color: #080405;
            color: #f3f4f6;
            background-image:
                radial-gradient(circle at 15% 20%, rgba(185, 14, 0, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 85% 65%, rgba(185, 14, 0, 0.1) 0%, transparent 50%),
                radial-gradient(rgba(255, 255, 255, 0.04) 1px, transparent 1px);
            background-size: 100% 100%, 100% 100%, 28px 28px;
            background-attachment: scroll, scroll, fixed;
        }

        /* ── Hero ──────────────────────────── */
        .podcast-hero {
            position: relative;
            padding: 180px 20px 90px;
            overflow: hidden;
            background: #0d0405;
            min-height: 45vh;
            display: flex;
            align-items: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }

        .podcast-hero-bg {
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
            opacity: 0.25;
        }

        .podcast-hero-overlay {
            position: absolute;
            inset: 0;
            z-index: 2;
            background:
                linear-gradient(180deg,
                    rgba(13, 4, 5, 0.9) 0%,
                    rgba(80, 6, 0, 0.4) 60%,
                    rgba(8, 4, 5, 1) 100%),
                radial-gradient(ellipse at 50% 50%, rgba(171, 14, 0, 0.25) 0%, transparent 70%);
        }

        .podcast-hero-container {
            position: relative;
            z-index: 3;
            max-width: 900px;
            margin: 0 auto;
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .podcast-hero-badge {
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.35);
            padding: 8px 22px;
            border-radius: 100px;
            color: #ffcccc;
            font-size: 0.8rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
            backdrop-filter: blur(12px);
        }

        .podcast-hero h1 {
            font-size: clamp(2.6rem, 5.5vw, 4rem);
            font-weight: 900;
            margin-bottom: 20px;
            letter-spacing: -0.02em;
            line-height: 1.15;
            color: #ffffff !important;
            text-shadow: 0 4px 20px rgba(0, 0, 0, 0.6);
        }

        .podcast-hero h1 span {
            background: linear-gradient(135deg, #ff8e8e 0%, #ff4f4f 100%) !important;
            -webkit-background-clip: text !important;
            -webkit-text-fill-color: transparent !important;
            background-clip: text !important;
        }

        .podcast-hero p {
            font-size: 1.15rem;
            color: rgba(255, 255, 255, 0.95) !important;
            max-width: 650px;
            margin-bottom: 0;
            line-height: 1.6;
            font-weight: 500;
            letter-spacing: 0.01em;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        /* ── Theater Section ────────────────── */
        .theater-section {
            padding: 80px 20px;
            background: transparent;
            position: relative;
            z-index: 5;
        }

        .theater-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1.8fr 1.2fr;
            gap: 30px;
        }

        @media (max-width: 992px) {
            .theater-container {
                grid-template-columns: 1fr;
                gap: 24px;
            }
        }

        @media (max-width: 768px) {
            .podcast-hero {
                padding: 130px 20px 50px !important;
                min-height: auto;
            }
            .podcast-hero h1 {
                font-size: 2.2rem;
                line-height: 1.2;
            }
            .podcast-hero p {
                font-size: 1rem;
                margin-bottom: 24px;
            }
            .theater-section {
                padding: 40px 20px !important;
            }
            .player-column {
                gap: 16px;
            }
            .player-meta-card {
                padding: 20px 16px;
            }
            .playlist-column {
                max-height: 380px;
            }
            .playlist-header {
                padding: 18px 20px;
            }
            .playlist-scroll {
                padding: 10px;
            }
            .podcast-coop {
                padding: 50px 20px !important;
            }
            .coop-sub {
                margin-bottom: 24px;
                font-size: 0.95rem;
            }
            .coop-grid {
                gap: 24px;
            }
        }

        .player-column {
            display: flex;
            flex-direction: column;
            gap: 24px;
        }

        .video-player-box {
            position: relative;
            width: 100%;
            aspect-ratio: 16 / 9;
            border-radius: 20px;
            overflow: hidden;
            background: #000000;
            box-shadow: 
                0 25px 60px rgba(0, 0, 0, 0.85), 
                0 0 40px rgba(171, 14, 0, 0.15);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: border-color 0.3s ease;
        }

        .video-player-box:hover {
            border-color: rgba(255, 59, 48, 0.3);
        }

        .video-player-box video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: 0;
            object-fit: contain;
            background: #000000;
        }

        .player-meta-card {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(16px);
            border-radius: 20px;
            padding: 30px;
            color: #ffffff;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
        }

        .player-meta-card h2 {
            font-size: 1.6rem;
            font-weight: 800;
            margin: 12px 0;
            line-height: 1.35;
            letter-spacing: -0.01em;
            color: #ffffff;
        }

        .meta-tag {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 14px;
            background: rgba(171, 14, 0, 0.2);
            border: 1px solid rgba(255, 77, 77, 0.3);
            color: #ffcccc;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            border-radius: 8px;
        }

        .meta-row {
            display: flex;
            gap: 24px;
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            font-weight: 500;
            margin-top: 8px;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .meta-item i {
            color: #ff3b30;
        }

        /* Playlist Styling */
        .playlist-column {
            background: rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            display: flex;
            flex-direction: column;
            height: 100%;
            max-height: 620px;
            overflow: hidden;
            box-shadow: 0 20px 45px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 992px) {
            .playlist-column {
                max-height: 420px;
            }
        }

        .playlist-header {
            padding: 24px 28px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255, 255, 255, 0.01);
        }

        .playlist-header h3 {
            margin: 0;
            font-size: 1.15rem;
            font-weight: 800;
            color: #ffffff;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .playlist-header h3 i {
            color: #ff3b30;
        }

        .video-count-badge {
            font-size: 0.82rem;
            font-weight: 700;
            background: rgba(255, 255, 255, 0.08);
            padding: 5px 12px;
            border-radius: 100px;
            color: rgba(255, 255, 255, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        .playlist-scroll {
            overflow-y: auto;
            flex-grow: 1;
            padding: 14px;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* IE and Edge */
        }

        .playlist-scroll::-webkit-scrollbar {
            display: none; /* Chrome, Safari and Opera */
        }

        .playlist-items {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .playlist-items li {
            padding: 12px 14px;
            border-radius: 12px;
            background: rgba(255, 255, 255, 0.01);
            border: 1px solid rgba(255, 255, 255, 0.03);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .playlist-items li:hover {
            background: rgba(171, 14, 0, 0.1);
            border-color: rgba(171, 14, 0, 0.25);
            transform: translateY(-2px);
        }

        .playlist-items li.active {
            background: rgba(171, 14, 0, 0.16);
            border-color: rgba(255, 59, 48, 0.35);
            box-shadow: 0 10px 20px rgba(171, 14, 0, 0.15);
        }

        .playlist-items li p.title {
            margin: 0;
            font-size: 0.88rem;
            font-weight: 700;
            color: #e5e7eb;
            line-height: 1.4;
            transition: color 0.2s ease;
        }

        .playlist-items li.active p.title {
            color: #ff6b6b;
        }

        .playlist-items li p.details {
            margin: 0;
            font-size: 0.78rem;
            color: rgba(255, 255, 255, 0.45);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .playlist-items li p.details span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .playlist-items li p.details i {
            color: #ff3b30;
        }

        /* ── Cooperation Section ────────────── */
        .podcast-coop {
            padding: 85px 20px;
            background: transparent;
            position: relative;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
        }

        .coop-container {
            max-width: 900px;
            margin: 0 auto;
            text-align: center;
        }

        .coop-title {
            font-size: clamp(1.8rem, 4vw, 2.2rem);
            font-weight: 800;
            color: #ffffff;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 12px;
        }

        .coop-title i {
            color: #ff3b30;
        }

        .coop-title b {
            color: #ff3b30;
            background: linear-gradient(135deg, #ff6b6b 0%, #ff3b30 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .coop-sub {
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.05rem;
            margin-bottom: 45px;
        }

        .coop-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 36px;
            flex-wrap: wrap;
        }

        .coop-card {
            background: #ffffff;
            padding: 22px 48px;
            border-radius: 20px;
            box-shadow: 
                0 15px 35px rgba(0, 0, 0, 0.6), 
                0 0 25px rgba(255, 255, 255, 0.02);
            border: 1px solid rgba(255, 255, 255, 0.08);
            transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 95px;
        }

        .coop-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 45px rgba(171, 14, 0, 0.35);
            border-color: rgba(255, 59, 48, 0.5);
        }

        .coop-card img {
            max-height: 52px;
            max-width: 190px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .coop-card:hover img {
            transform: scale(1.03);
        }
    </style>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <!-- Site Header -->
        <!-- Shared Header & Mobile Menu -->
    <?php get_template_part('shared-header'); ?>

    <div class="mobile-overlay" id="mobile-overlay"></div>

    <main id="content">
        <!-- Hero Section -->
        <section class="podcast-hero">
            <div class="podcast-hero-overlay"></div>
            <div class="podcast-hero-container">
                <span class="podcast-hero-badge">
                    <i class="fa-solid fa-microphone-lines"></i> Podcast Series 01
                </span>
                <h1>Vượt rào cản tiếng Anh <br><span>bằng cách ứng dụng AI</span></h1>
                <p>Khám phá cách thức sử dụng Trí Tuệ Nhân Tạo để khắc phục rào cản ngoại ngữ, nâng cao hiệu suất học tập chuẩn quốc tế cùng Viện IDEAS</p>
            </div>
        </section>

        <!-- Theater Player Section -->
        <section class="theater-section">
            <div class="theater-container">
                <!-- Left: Video Player -->
                <div class="player-column">
                    <div class="video-player-box">
                        <video controls id="main_video" preload="metadata" playsinline></video>
                    </div>
                    
                    <div class="player-meta-card">
                        <span class="meta-tag" id="current-video-type">Podcast Video</span>
                        <h2 id="current-video-title">Đang tải video...</h2>
                        <div class="meta-row">
                            <div class="meta-item">
                                <i class="fa-regular fa-clock"></i>
                                <span id="current-video-duration">-</span>
                            </div>
                            <div class="meta-item">
                                <i class="fa-solid fa-headphones"></i>
                                <span>Âm thanh chất lượng cao</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right: Playlist Sidebar -->
                <div class="playlist-column">
                    <div class="playlist-header">
                        <h3><i class="fa-solid fa-headphones"></i> Danh sách phát</h3>
                        <span class="video-count-badge" id="video-count">0 videos</span>
                    </div>
                    <div class="playlist-scroll" data-lenis-prevent>
                        <ul class="playlist-items" id="playlist-list">
                            <!-- Populated dynamically -->
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Cooperation Block -->
        <section class="podcast-coop">
            <div class="coop-container">
                <h2 class="coop-title"><i class="fa-solid fa-handshake-simple"></i> Đơn vị <b>Đồng hành</b></h2>
                <p class="coop-sub">Các đơn vị tài trợ học thuật và đồng sản xuất chương trình Podcast</p>
                
                <div class="coop-grid">
                    <a class="coop-card" href="https://chiefaiofficer.vn/" target="_blank" rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://chiefaiofficer.vn/wp-content/uploads/2025/05/cao-logo-1.png" alt="Chief AI Officer Logo" />
                    </a>
                    <a class="coop-card" href="https://ideas.edu.vn/" target="_blank" rel="nofollow noopener noreferrer">
                        <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/ideas-02.png" alt="Viện IDEAS Logo" />
                    </a>
                </div>
            </div>
        </section>
    </main>



    



    <!-- Podcast Playlist and Player Controller Script -->
    <script>
        const podcast_data = {
            series1: {
                name: "Vượt rào cản tiếng Anh",
                name_sub: "#bằng cách ứng dụng AI trong học tập",
                data: [
                    {
                        type: "Podcast Video",
                        duration: "2:03",
                        title: "Không giỏi tiếng Anh - Bạn không đơn độc",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/07/podcast_1.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:40",
                        title: "Bạn không cần hiểu hết, chỉ cần hiểu đúng với sự trợ giúp của AI",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_003_3593813510926577v.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "3:07",
                        title: "AI chỉ hỗ trợ, không thay thế việc tư duy",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/video-podcast-3.mp4",
                    },
                    {
                        type: "Podcast Video",
                        duration: "2:01",
                        title: "Bạn có đang sử dụng AI vô thức",
                        video: "https://ideas.edu.vn/wp-content/uploads/2025/08/FSave.com_Facebook_Media_002_1076359851223438v.mp4",
                    },
                ],
            },
        };

        document.addEventListener("DOMContentLoaded", function () {
            const videoElement = document.querySelector("#main_video");
            const listElement = document.querySelector("#playlist-list");
            const lenElement = document.querySelector("#video-count");

            // Meta items elements
            const metaTitle = document.querySelector("#current-video-title");
            const metaDuration = document.querySelector("#current-video-duration");
            const metaType = document.querySelector("#current-video-type");

            const videos = podcast_data.series1.data;

            // Update video count badge
            if (lenElement) lenElement.textContent = `${videos.length} videos`;

            // Populate playlist
            if (listElement) {
                listElement.innerHTML = videos
                    .map((item, index) => `
                        <li data-index="${index}" class="${index === 0 ? "active" : ""}">
                            <p class="title">${index + 1}. ${item.title}</p>
                            <p class="details">
                                <span><i class="fa-solid fa-play"></i> ${item.duration}</span>
                                <span>${item.type}</span>
                            </p>
                        </li>
                    `).join("");
            }

            // Update metadata display function
            function updateMeta(index) {
                const video = videos[index];
                if (metaTitle) metaTitle.textContent = video.title;
                if (metaDuration) metaDuration.textContent = video.duration;
                if (metaType) metaType.textContent = video.type;
            }

            // Load first video initially
            if (videoElement && videos[0]) {
                videoElement.src = videos[0].video;
                updateMeta(0);
                
                // Autoplay with caution (browser behavior handling)
                setTimeout(() => {
                    videoElement.play().catch(() => {
                        console.warn("Browser blocked autoplay. User interaction required.");
                    });
                }, 500);
            }

            // Handle switching tracks on playlist click
            if (listElement) {
                listElement.addEventListener("click", function (e) {
                    const li = e.target.closest("li");
                    if (!li) return;

                    const index = parseInt(li.dataset.index, 10);
                    
                    if (videoElement) {
                        videoElement.src = videos[index].video;
                        videoElement.play();
                    }
                    updateMeta(index);

                    // Update active class state
                    document.querySelectorAll("#playlist-list li").forEach((el) => {
                        el.classList.remove("active");
                    });
                    li.classList.add("active");
                });
            }
        });
    </script>

    <!-- Main scripts minified imports -->
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
