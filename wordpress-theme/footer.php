<?php
/**
 * The template for displaying the footer
 * Used by: get_footer()
 * Applies to: all pages (homepage, single posts, archives, etc.)
 */

// Prevent duplicate footer execution across wrapper page setups
if (defined('IDEAS_FOOTER_RENDERED')) {
    return;
}
define('IDEAS_FOOTER_RENDERED', true);
?>

    <!-- Footer -->
    <footer class="ideas_footer">
        <div class="footer-columns-wrap">
            <!-- Column 1: Logo, description, social icons -->
            <div class="footer-col-about">
                <img src="https://ideas.edu.vn/wp-content/uploads/2026/06/Logo_IDEAS_Slg.webp" alt="IDEAS Logo"
                    class="footer-logo-ideas" loading="eager" fetchpriority="high" decoding="async" />
                <p class="footer-desc-ideas">IDEAS – Đồng hành hỗ trợ học vụ chuyên nghiệp cho các chương trình Cử nhân,
                    Thạc sĩ, Tiến sĩ chuẩn Quốc tế, mở ra cơ hội thăng tiến và hội nhập toàn cầu.</p>
                <div class="ideas_follow_new">
                    <a target="_blank" href="https://zalo.me/3857867121882640296" class="social-icon zalo"
                        rel="nofollow noopener noreferrer" title="Zalo" aria-label="Zalo IDEAS">
                        <img loading="lazy" src="https://hidosport.vn/wp-content/uploads/2023/09/zalo-icon.png"
                            alt="Zalo" decoding="async" />
                    </a>
                    <a target="_blank" href="https://www.facebook.com/ideas.edu.vn/" class="social-icon facebook"
                        rel="nofollow noopener noreferrer" title="Facebook" aria-label="Facebook IDEAS">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a target="_blank" href="https://www.youtube.com/c/Vi%E1%BB%87nIDEAS" class="social-icon youtube"
                        rel="nofollow noopener noreferrer" title="YouTube" aria-label="YouTube IDEAS">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a target="_blank" href="https://www.linkedin.com/company/ideasinstitute/"
                        class="social-icon linkedin" rel="nofollow noopener noreferrer" title="LinkedIn" aria-label="LinkedIn IDEAS">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>
                    <a target="_blank" href="https://www.tiktok.com/@ideas_institute" class="social-icon tiktok"
                        rel="nofollow noopener noreferrer" title="TikTok" aria-label="TikTok IDEAS">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>
            </div>

            <!-- Column 2: Danh mục chính -->
            <div class="footer-col-links">
                <h4>Danh Mục Chính</h4>
                <a href="/">Trang chủ</a>
                <a href="/doi-ngu-giang-vien">Hội đồng chuyên môn</a>
                <a href="/so-do-to-chuc">Cơ cấu tổ chức</a>
                <a href="/dong-su-kien">Dòng sự kiện</a>
            </div>

            <!-- Column 3: Các chương trình -->
            <div class="footer-col-links">
                <h4>Các Chương Trình</h4>
                <a href="/bba">Cử nhân Top-up BBA</a>
                <a href="/fullbba">Cử nhân Full BBA</a>
                <a href="/mba">Thạc sĩ Online MBA</a>
                <a href="/emba">Thạc sĩ Executive MBA</a>
                <a href="/mbainai">Thạc sĩ MBA in AI</a>
                <a href="/mscai">Thạc sĩ MSc AI</a>
                <a href="/dual-dba">Tiến sĩ Dual DBA</a>
            </div>

            <!-- Column 4: Liên hệ -->
            <div class="footer-col-contact">
                <h4>Liên hệ</h4>
                <p class="contact-item">
                    <i class="fa-solid fa-phone"></i>
                    <span>028 2244 2244</span>
                </p>
                <p class="contact-item">
                    <i class="fa-solid fa-envelope"></i>
                    <span>info@ideas.edu.vn</span>
                </p>
                <p class="contact-item">
                    <i class="fa-solid fa-file-invoice"></i>
                    <span>MST: 0318949449</span>
                </p>
            </div>
        </div>

        <div class="footer-divider-line"></div>

        <!-- Middle Row: Address & Badges -->
        <div class="footer-middle-row">
            <div class="footer-addresses">
                <p class="address-item">
                    <i class="fa-solid fa-location-dot"></i>
                    <span><strong>Văn phòng:</strong> Tầng 4, Tòa nhà Hải Âu, 39B Trường Sơn, Phường Tân Sơn Nhất, TP.HCM</span>
                </p>
            </div>
            <div class="footer-badges">
                <a href="https://www.dmca.com/Protection/Status.aspx?ID=dc41cd4b-8163-4a8c-aee1-e3b1b7ad5643&refurl=https://ideas.edu.vn/"
                    title="DMCA.com Protection Status" class="dmca-badge-new" rel="nofollow noopener noreferrer">
                    <img loading="lazy"
                        src="https://images.dmca.com/Badges/dmca_protected_sml_120n.png?ID=dc41cd4b-8163-4a8c-aee1-e3b1b7ad5643"
                        alt="DMCA.com Protection Status" decoding="async" />
                </a>
            </div>
        </div>

        <!-- Bottom Row: Copyright & Scroll to top -->
        <div class="footer-bottom-row">
            <p class="copyright-text">© <span class="copyright-year"><?php echo date('Y'); ?></span> IDEAS - Đồng hành cùng tri thức toàn cầu.</p>
            <div class="footer-bottom-right">
                <div class="footer-bottom-links">
                    <a target="_blank" href="/dieu-khoan-su-dung">
                        <i class="fa-solid fa-lock"></i>
                        <span>Điều khoản - bảo mật</span>
                    </a>
                    <span class="divider">|</span>
                    <a target="_blank" href="/trach-nhiem-mien-tru">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Trách nhiệm miễn trừ</span>
                    </a>
                </div>
            </div>
        </div>
    </footer>

    <!-- CSS transition overrides for scroll-hiding site header -->
    <style>
        #site-header {
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1), background-color 0.3s ease !important;
        }
        #site-header.hide {
            transform: translateY(-100%) !important;
        }
    </style>

    <!-- Studio Freight Lenis for ultra-smooth momentum scrolling (120Hz optimization) -->
    <script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.36/dist/lenis.min.js"></script>
    <script>
        // Only initialize Lenis on desktop/tablet to avoid weird native scroll friction on mobile touch
        if (window.innerWidth > 768) {
            window.lenis = new Lenis({
                duration: 1.2,
                easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
                direction: 'vertical',
                gestureDirection: 'vertical',
                smooth: true,
                mouseMultiplier: 1,
                smoothTouch: false,
                infinite: false,
            });

            function raf(time) {
                lenis.raf(time);
                requestAnimationFrame(raf);
            }

            requestAnimationFrame(raf);

            // Integrate Lenis with custom anchor link scrolling
            document.querySelectorAll('a[href^="#"]:not([href="#dang-ky"])').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetAttr = this.getAttribute('href');
                    if (targetAttr === '#') return;
                    const target = document.querySelector(targetAttr);
                    if (target) {
                        lenis.scrollTo(target, {
                            offset: -80,
                            duration: 1.2,
                            immediate: false
                        });
                    }
                });
            });
        }
    </script>

    <?php get_template_part('shared-modals'); ?>

<?php wp_footer(); ?>
</body>
</html>
