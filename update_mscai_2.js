const fs = require('fs');
const path = require('path');

const filePath = path.join(__dirname, 'mscai.html');
let html = fs.readFileSync(filePath, 'utf8');

// 1. ADD HERO TECH ANIMATIONS & STYLES
const newStyles = `
    <!-- Extra AI Tech Styles V2 -->
    <style>
        .hero-tech-overlay { position: absolute; inset: 0; pointer-events: none; overflow: hidden; z-index: 0; }
        .tech-line { position: absolute; background: linear-gradient(to bottom, transparent, rgba(171,14,0,0.6), transparent); width: 1px; height: 100%; top: -100%; animation: scan-line 3s infinite linear; }
        .line-1 { left: 15%; animation-delay: 0s; }
        .line-2 { left: 55%; animation-delay: 1.5s; width: 2px; background: linear-gradient(to bottom, transparent, rgba(59,130,246,0.3), transparent); }
        .line-3 { left: 85%; animation-delay: 0.7s; }
        @keyframes scan-line { 0% { top: -100%; } 100% { top: 100%; } }
        
        /* Cyber framing for Hero Image */
        .hero-photo-main { position: relative; }
        .hero-photo-main::before { content: ''; position: absolute; top: 10px; left: 10px; width: 40px; height: 40px; border-top: 3px solid rgba(171,14,0,0.8); border-left: 3px solid rgba(171,14,0,0.8); z-index: 10; transition: transform 0.3s ease; }
        .hero-photo-main::after { content: ''; position: absolute; bottom: 10px; right: 10px; width: 40px; height: 40px; border-bottom: 3px solid rgba(171,14,0,0.8); border-right: 3px solid rgba(171,14,0,0.8); z-index: 10; transition: transform 0.3s ease; }
        .hero-photo-main:hover::before { transform: translate(-5px, -5px); }
        .hero-photo-main:hover::after { transform: translate(5px, 5px); }

        /* Tech Cyber Panel for Pricing */
        .cyber-pricing-card {
            background: linear-gradient(145deg, #0b1120 0%, #171d2b 100%);
            border: 1px solid rgba(171, 14, 0, 0.4);
            border-radius: 1.5rem;
            padding: 40px;
            color: #f8fafc;
            position: relative;
            box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2), inset 0 0 20px rgba(171,14,0,0.05);
            overflow: hidden;
            margin: 0 auto;
        }
        .cyber-pricing-card::before {
            content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px;
            background: linear-gradient(90deg, transparent, #ef4444, #ab0e00, transparent);
        }
        .cyber-badge {
            display: inline-flex; align-items: center; gap: 8px; font-size: 0.75rem; 
            text-transform: uppercase; font-weight: 900; letter-spacing: 0.1em;
            background: rgba(171,14,0,0.2); border: 1px solid rgba(171,14,0,0.5);
            color: #fca5a5; padding: 6px 12px; border-radius: 99px; margin-bottom: 24px;
        }
        .cyber-tier-name { font-size: 2.2rem; font-weight: 900; margin: 0 0 8px; background: linear-gradient(135deg, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent;}
        .cyber-desc { color: #94a3b8; font-size: 0.95rem; margin: 0 0 32px; font-style: italic; }
        
        .cyber-features { list-style: none; padding: 0; margin: 0 0 36px; display: flex; flex-direction: column; gap: 16px; text-align: left; }
        .cyber-features li { display: flex; align-items: flex-start; gap: 12px; font-size: 0.95rem; color: #e2e8f0; }
        .cyber-features svg { flex-shrink: 0; filter: drop-shadow(0 0 4px rgba(239, 68, 68, 0.5)); margin-top:2px; }
        
        .cyber-btn {
            display: inline-flex; width: 100%; justify-content: center; padding: 16px;
            background: linear-gradient(90deg, #ab0e00, #ef4444); color: #fff !important;
            font-weight: 700; border-radius: 12px; transition: all 0.3s;
            box-shadow: 0 8px 20px rgba(171,14,0,0.3); text-decoration: none; font-size: 1.05rem;
        }
        .cyber-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(171,14,0,0.4); background: linear-gradient(90deg, #b91c1c, #f87171); }
        
        /* Node visual */
        .ai-floating-node { position: absolute; width: 60px; height: 60px; opacity: 0.6; pointer-events: none; z-index: 1; animation: float 6s ease-in-out infinite; }
        .node-1 { top: 20%; left: -20px; text-align: left; animation-delay: 1s;}
        .node-svg { filter: drop-shadow(0 0 8px rgba(239,68,68,0.6)); }
    </style>
</head>
`;
html = html.replace(/<\/head>/i, newStyles);

// Inject lines into hero bg
html = html.replace(
    /(<div class="hero-bg"[^>]*>)/s,
    `$1
        <div class="hero-tech-overlay">
            <div class="tech-line line-1"></div>
            <div class="tech-line line-2"></div>
            <div class="tech-line line-3"></div>
        </div>`
);

// Inject floating node into hero content
html = html.replace(
    /(<div class="hero-content reveal-up"[^>]*>)/s,
    `$1
        <div class="ai-floating-node node-1">
            <svg class="node-svg" width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="1.5"><polygon points="12 2 2 7 12 12 22 7 12 2"/><polyline points="2 17 12 22 22 17"/><polyline points="2 12 12 17 22 12"/></svg>
        </div>`
);


// 2. REWRITE COMPETENCY GRID with content from MScAI.md
const newCompetencies = `
<h2 class="section-title reveal-up" id="competency-headline" style="text-align: center; margin-bottom: 48px;">
    Đưa sự nghiệp lên một tầm cao mới bằng<br />
    <span class="gradient-text">Năng Lực Ra Quyết Định & Quản Trị AI</span>
</h2>

<div class="competency-grid reveal-up" aria-label="4 năng lực quản trị cốt lõi">
    <article class="competency-card ai-neon-box">
        <div class="comp-number">01</div>
        <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg></div>
        <h3 class="comp-title">Nhìn AI đúng vai trò trong kinh doanh</h3>
        <p class="comp-desc">Hiểu sâu sắc AI nên (và không nên) được sử dụng ở đâu trong quản lý, vận hành và ra quyết định chiến lược.</p>
    </article>
    <article class="competency-card ai-neon-box">
        <div class="comp-number">02</div>
        <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><rect x="3" y="3" width="18" height="18" rx="2" ry="2"/><line x1="12" y1="8" x2="12" y2="16"/><line x1="8" y1="12" x2="16" y2="12"/></svg></div>
        <h3 class="comp-title">Công cụ hỗ trợ lãnh đạo đắc lực</h3>
        <p class="comp-desc">Ứng dụng sức mạnh của AI để phân tích dữ liệu, tối ưu quy trình và củng cố vững chắc các quyết định chiến lược.</p>
    </article>
    <article class="competency-card ai-neon-box">
        <div class="comp-number">03</div>
        <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><circle cx="12" cy="12" r="10"/><path d="M12 8l4 4-4 4M8 12h8"/></svg></div>
        <h3 class="comp-title">Dẫn dắt bằng Tư duy Chiếc Lược</h3>
        <p class="comp-desc">Triển khai dự án AI đúng mục tiêu, đúng thời điểm, tránh đầu tư dàn trải theo xu hướng công nghệ nhất thời.</p>
    </article>
    <article class="competency-card ai-neon-box">
        <div class="comp-number">04</div>
        <div class="comp-icon"><svg width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div>
        <h3 class="comp-title">Kiểm soát Triển Khai và Rủi ro</h3>
        <p class="comp-desc">Làm việc hiệu quả với đội ngũ thuật, giám sát rủi ro bảo mật và tối ưu hóa tối đa nguồn lực đầu tư AI.</p>
    </article>
</div>
`;
// Replace the old competency section
html = html.replace(
    /<h2 class="section-title reveal-up" id="competency-headline"[^>]*>.*?<\/h2>[\s]*<div class="competency-grid[^>]*>.*?<\/div>/s,
    newCompetencies
);


// 3. REDESIGN PRICING SECTION
const modernPricingHtml = `
                <div class="pricing-section reveal-up" id="bang-gia" style="text-align: center;">
                    <div class="section-label" style="margin: 0 auto 1.5rem; display: table;">HỌC PHÍ & LỘ TRÌNH TÀI CHÍNH</div>
                    <h3 class="pricing-title" style="text-align: center; font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 900; color: #0f172a; margin-bottom: 32px; line-height: 1.2;">
                        Đầu tư thông minh cho<br /><span style="color:#ab0e00">Tương lai Quản trị Công nghệ</span>
                    </h3>
                    
                    <div class="cyber-pricing-card" aria-label="Gói High Quality">
                        <div class="cyber-badge">
                            <span style="width:6px;height:6px;border-radius:50%;background:#ef4444;box-shadow:0 0 8px #ef4444;"></span>
                            ĐƯỢC LỰA CHỌN NHIỀU NHẤT
                        </div>
                        <h4 class="cyber-tier-name">MSc AI High Quality</h4>
                        <p class="cyber-desc">Tương tác trực tiếp — Học 100% bằng Tiếng Anh cùng chuyên gia quốc tế</p>
                        
                        <ul class="cyber-features">
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Học trực tiếp qua Zoom với Giảng viên quốc tế Thụy Sĩ</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Truy cập toàn bộ Học liệu, và kho Case study Thực tiễn</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Tham gia Cộng đồng Lãnh đạo AI và kết nối doanh nghiệp</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Sử dụng trọn đời Hệ sinh thái IDEAS LMS & IDEAS AI Platform</li>
                        </ul>
                        <a href="#dang-ky" class="cyber-btn" id="standard-cta">Tư vấn Học phí & Nhận ưu đãi</a>
                    </div>

                    <!-- Sacombank installment banner -->
                    <div class="sacom-banner" aria-label="Hỗ trợ trả góp Sacombank" style="margin-top: 40px; border: 1px solid rgba(171,14,0,0.1); background: #fff;">
                        <div class="sacom-left">
                            <div class="sacom-cards">
                                <img decoding="async" src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Plantinum%20Cashback_contactless-01.png" alt="Sacombank Visa Platinum Cashback" class="sacom-card-img sacom-card-back" loading="lazy" />
                                <img decoding="async" src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Signature_contactless-01.png" alt="Sacombank Visa Signature" class="sacom-card-img sacom-card-front" loading="lazy" />
                            </div>
                            <div class="sacom-logo-area">
                                <div class="sacom-logo-text">SACOMBANK</div>
                                <div class="sacom-tag" style="color:#0f172a; border: 1px solid rgba(15,23,42,0.2);">Đối tác tài chính</div>
                            </div>
                        </div>
                        <div class="sacom-right">
                            <div class="sacom-headline" style="color:#0f172a;">Hỗ trợ trả góp <span class="sacom-highlight" style="background:#ab0e00; color:#fff; padding:2px 8px; border-radius:4px;">12 – 24 tháng</span></div>
                            <p class="sacom-sub" style="color:#475569;">Thanh toán học phí linh hoạt qua thẻ tín dụng Sacombank Visa — lãi suất ưu đãi, không cần thế chấp</p>
                        </div>
                    </div>
                </div>
`;
html = html.replace(/<div class="pricing-section[^>]*>.*?<\/div>\s*<\/div>\s*<\/section>/s, `${modernPricingHtml}</div></section>`);

fs.writeFileSync(filePath, html, 'utf8');
console.log('Update Phase 2 Complete.');
