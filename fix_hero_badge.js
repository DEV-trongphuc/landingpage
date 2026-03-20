const fs = require('fs');
const path = require('path');

const file = path.join(__dirname, 'mscai.html');
let html = fs.readFileSync(file, 'utf8');

// 1. Fix hero badge
html = html.replace(
    /<div class="hero-badge">([\s\S]*?)<\/div>/,
    `<div class="hero-badge" style="background: rgba(255,255,255,0.95); color: #ab0e00; border: none; font-weight: 600; box-shadow: 0 4px 15px rgba(0,0,0,0.15);">
        <span class="badge-dot" style="background: #ab0e00; box-shadow: 0 0 8px rgba(171,14,0,0.5);"></span>
        <span>Đào tạo bởi Swiss UMEF – Geneva, Thụy Sĩ</span>
    </div>`
);

// 2. Fix accred strip
// Matches from "<!-- Accreditation logos strip -->" to the closing </div> of hero-accred-strip
html = html.replace(
    /<!-- Accreditation logos strip -->\s*<div class="hero-accred-strip" aria-label="Các tổ chức kiểm định">[\s\S]*?<div class="hero-cta"/,
    `<!-- Accreditation logos strip -->
                    <div class="hero-accred-strip" aria-label="Các tổ chức kiểm định" style="background: rgba(255, 255, 255, 0.95); border-radius: 12px; padding: 12px 20px; box-shadow: 0 8px 25px rgba(0,0,0,0.15); display: inline-flex; flex-direction: column; width: fit-content; max-width: 100%; box-sizing: border-box; backdrop-filter: blur(10px);">
                        <span class="hero-accred-label" style="color: #475569; font-weight: 700; font-size: 0.85rem; text-transform: uppercase;">Được kiểm định &amp; công nhận bởi</span>
                        <style>
                            .hero-accred-strip .hero-accred-logos { gap: 16px; align-items: center; margin-top: 8px; }
                            .hero-accred-strip .hero-accred-logos img { filter: none !important; opacity: 1 !important; }
                            @media (max-width: 768px) {
                                .hero-accred-strip .hero-accred-logos { flex-wrap: wrap; justify-content: center; }
                                .hero-accred-strip { text-align: center; align-items: center; margin: 0 auto; }
                            }
                        </style>
                        <div class="hero-accred-logos">
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2025/10/qs-1.webp" alt="QS Stars" class="accred-trigger" data-accred="qs" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef1.png" alt="Swiss Accreditation" class="accred-trigger" data-accred="sac" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef3.png" alt="Eduqua" class="accred-trigger" data-accred="eduqua" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef4.png" alt="IACBE" class="accred-trigger" data-accred="iacbe" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef5.png" alt="CHEA" class="accred-trigger" data-accred="chea" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/new_public/data_imgs/kdumef2.png" alt="ACBSP" class="accred-trigger" data-accred="acbsp" height="40" loading="lazy" />
                            <img decoding="async" src="https://ideas.edu.vn/wp-content/uploads/2023/12/vnanric.jpg" alt="VN-Naric" class="accred-trigger" data-accred="vnnaric" height="40" loading="lazy" />
                        </div>
                    </div>

                    <div class="hero-cta"`
);

// 3. Fix Floating Image padding or spacing to ensure it looks really clean
// wait, we can also ensure the "Nhận tư vấn lộ trình" button isn't overflowing.

fs.writeFileSync(file, html, 'utf8');
console.log('Fixed styling for badge and accred strip.');
