const fs = require('fs');
const path = require('path');

const filePath = path.join(__dirname, 'mscai.html');
let html = fs.readFileSync(filePath, 'utf8');

// 1. Meta & Title
html = html.replace(/<title>.*?<\/title>/, '<title>MSc AI Thụy Sĩ Trực Tuyến | Thạc Sĩ Trí Tuệ Nhân Tạo Swiss UMEF</title>');
html = html.replace(/MBA Thụy Sĩ/g, 'MSc AI Thụy Sĩ');
html = html.replace(/Thạc sĩ Quản trị Kinh doanh \(MBA\)/g, 'Thạc sĩ Khoa học về Trí tuệ Nhân tạo Ứng dụng (MSc AI)');
html = html.replace(/\bMBA\b/g, 'MSc AI');
html = html.replace(/Thạc Sĩ Quản Trị Kinh Doanh/g, 'Thạc Sĩ Khoa Học Về Trí Tuệ Nhân Tạo Ứng Dụng');
html = html.replace(/thạc sĩ quản trị kinh doanh/g, 'thạc sĩ khoa học về trí tuệ nhân tạo');

// 2. Add AI styles to the head
const aiStyles = `
    <!-- AI Tech Styles -->
    <style>
        .ai-tech-bg { position: absolute; inset: 0; background-image: radial-gradient(rgba(171, 14, 0, 0.15) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; z-index: 0; }
        .hero-bg, .pain-section, .cta-section { position: relative; overflow: hidden; }
        .hero-bg::after, .pain-section::after, .cta-section::after { content: ""; position: absolute; inset: 0; background: linear-gradient(90deg, rgba(171, 14, 0, 0.05) 1px, transparent 1px), linear-gradient(0deg, rgba(171, 14, 0, 0.05) 1px, transparent 1px); background-size: 40px 40px; pointer-events: none; z-index: 0; opacity: 0.5; }
        .ai-neon-box { position: relative; }
        .ai-neon-box::before { content: ""; position: absolute; inset: -1px; background: linear-gradient(45deg, #ab0e00, transparent, #ef4444); z-index: -1; border-radius: inherit; padding: 2px; -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); -webkit-mask-composite: xor; mask-composite: exclude; }
        .proof-card-inner { z-index: 2; position: relative; }
    </style>
</head>
`;
html = html.replace(/<\/head>/i, aiStyles);

// 3. Hero Section (Hook)
html = html.replace(
    /(<h1.*?id="hero-headline"[^>]*>).*?(<\/h1>)/s,
    `$1
        <span class="hero-hl-small">Chương trình</span>
        <em class="hero-hl-big">Thạc sĩ khoa học về</em>
        <span class="hero-hl-small">Trí Tuệ Nhân Tạo Ứng Dụng <span class="gradient-text">(MSc AI)</span></span>
    $2`
);
html = html.replace(
    /(<p class="hero-sub"[^>]*>).*?(<\/p>)/s,
    `$1
        MSc AI của <strong>Swiss UMEF</strong> được thiết kế dành cho nhà quản lý và lãnh đạo doanh nghiệp muốn hiểu - ứng dụng - quản trị AI ở cấp độ chiến lược.
    $2`
);

// Add AI quotes below hero buttons
html = html.replace(
    /(<div class="hero-social-proof"[^>]*>)/s,
    `<div class="ai-quote" style="margin-top:20px; padding: 16px; border-left: 4px solid #ab0e00; background: rgba(171, 14, 0, 0.05); font-style: italic; font-weight: 500; font-size: 1.1em;">
        "AI không lấy công việc của bạn. Người hiểu AI thì có."
    </div>
    $1`
);

// 4. Pain Section
html = html.replace(
    /(<h2 class="pain-headline"[^>]*>).*?(<\/h2>)/s,
    `$1
        Doanh nghiệp của bạn có đang<br />
        <span class="pain-headline-accent">sử dụng AI theo cách này?</span>
    $2`
);
html = html.replace(
    /(<p class="pain-sub"[^>]*>).*?(<\/p>)/s,
    `$1Nếu bạn chỉ đầu tư AI theo xu hướng, hiệu quả cho doanh nghiệp gần như không thể tạo ra.$2`
);

// Rewrite the 5 Pain Cards
const newPainCards = `
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">01</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
                            </div>
                            <p>AI được sử dụng rời rạc, không gắn với <strong>hệ thống vận hành</strong></p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">02</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
                            </div>
                            <p>Không có <strong>tư duy chiến lược</strong> về AI trong quản lý và ra quyết định</p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">03</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg>
                            </div>
                            <p>Đốt ngân sách vào AI nhưng không tạo ra <strong>đầu ra kinh doanh</strong> rõ ràng</p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">04</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>
                            </div>
                            <p>Vận hành thiếu kiểm soát, gây <strong>rủi ro về uy tín, pháp lý và tài chính</strong></p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">05</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon">
                                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg>
                            </div>
                            <p>Chỉ sử dụng AI để <strong>xử lý các tác vụ cơ bản</strong> nhanh hơn</p>
                        </div>
                    </div>`;
html = html.replace(/<div class="pain-cards[^>]*>.*?<\/div>\s*<!-- Stat \+ Trends -->/s, `<div class="pain-cards reveal-up">${newPainCards}</div><!-- Stat + Trends -->`);

// Pain Warning Stats update
html = html.replace(/<div class="pain-stat-number">.*?<\/div>/, '<div class="pain-stat-number">30<span>%</span></div>');
html = html.replace(
    /<div class="pain-stat-text">.*?<\/div>/s,
    `<div class="pain-stat-text">
        <p>Khoảng <strong>30% dự án Generative AI bị dừng lại</strong> vì không chứng minh được giá trị kinh tế.</p>
        <p class="pain-stat-source">*Đừng để doanh nghiệp của bạn “có AI” nhưng chưa thực sự chuyển đổi.</p>
    </div>`
);

// 5. Solution Section
html = html.replace(
    /(<h2 class="section-title"[^>]*id="solution-headline"[^>]*>).*?(<\/h2>)/s,
    `$1
        Học để quản trị AI<br />
        <span class="gradient-text">Không phải để lập trình AI</span>
    $2`
);
html = html.replace(
    /(<p class="sol-v2-desc"[^>]*>).*?(<\/p>)/s,
    `$1
        MSc AI Swiss UMEF không đào tạo để bạn có thể tạo ra một “con AI”, mà giúp bạn <strong>Hiểu AI đúng bản chất</strong>, ra quyết định dựa trên dữ liệu, dẫn dắt đội ngũ kỹ thuật và tối ưu đầu tư AI.
    $2`
);
html = html.replace(
    /<div class="sol-v2-tagline">.*?<\/div>/s,
    `<div class="sol-v2-tagline">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"/></svg>
        <p><strong>Giúp bạn biến AI thành công cụ hỗ trợ lãnh đạo mạnh mẽ và quản trị hệ thống AI hiệu quả.</strong></p>
    </div>`
);

// 6. Curriculum Section
html = html.replace(
    /(<h2 class="section-title"[^>]*id="curriculum-headline"[^>]*>).*?(<\/h2>)/s,
    `$1
        12 môn học + Capstone Project<br />
        <span class="gradient-text">Chuẩn Trí tuệ Nhân tạo Ứng dụng</span>
    $2`
);

const newCurriculumGrid = `
                <div class="curriculum-grid reveal-up">
                    <div class="curri-pillar ai-neon-box">
                        <div class="curri-pillar-header">
                            <span class="curri-pillar-num">I</span>
                            <span class="curri-pillar-title">Nền tảng Công nghệ</span>
                        </div>
                        <ul class="curri-subjects">
                            <li><span class="curri-dot"></span>AI & Machine Learning</li>
                            <li><span class="curri-dot"></span>Computer Vision</li>
                            <li><span class="curri-dot"></span>Internet of Things (IoT)</li>
                            <li><span class="curri-dot"></span>Reinforcement Learning</li>
                        </ul>
                    </div>
                    <div class="curri-pillar ai-neon-box">
                        <div class="curri-pillar-header">
                            <span class="curri-pillar-num">II</span>
                            <span class="curri-pillar-title">Dữ liệu & Phân tích</span>
                        </div>
                        <ul class="curri-subjects">
                            <li><span class="curri-dot"></span>Big Data Analytics</li>
                            <li><span class="curri-dot"></span>Economic Forecasting with AI</li>
                            <li><span class="curri-dot"></span>Algorithmic Trading</li>
                        </ul>
                    </div>
                    <div class="curri-pillar ai-neon-box">
                        <div class="curri-pillar-header">
                            <span class="curri-pillar-num">III</span>
                            <span class="curri-pillar-title">Chiến lược Quản trị</span>
                        </div>
                        <ul class="curri-subjects">
                            <li><span class="curri-dot"></span>AI in Business Decision Making</li>
                            <li><span class="curri-dot"></span>Change Management for AI</li>
                            <li><span class="curri-dot"></span>Global AI Policy & Regulation</li>
                        </ul>
                    </div>
                    <div class="curri-pillar ai-neon-box">
                        <div class="curri-pillar-header">
                            <span class="curri-pillar-num">IV</span>
                            <span class="curri-pillar-title">Đổi mới & Triển khai</span>
                        </div>
                        <ul class="curri-subjects">
                            <li><span class="curri-dot"></span>AI Innovation & Entrepreneurship</li>
                            <li><span class="curri-dot"></span>Advanced AI Project Management</li>
                        </ul>
                    </div>
                </div>
`;
html = html.replace(/<div class="curriculum-grid[^>]*>.*?<\/div>\s*<div class="curri-thesis/s, `${newCurriculumGrid}<div class="curri-thesis`);

html = html.replace(
    /(<div class="curri-thesis[^>]*>).*?(<\/div>\s*<\/div>)/s,
    `$1
        <div class="curri-thesis-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg></div>
        <div>
            <strong>Capstone Project: Dự án tốt nghiệp (Triển khai ứng dụng thực tế)</strong>
            <p>Áp dụng các mô hình và chiến lược AI vào 1 bài toán kinh doanh cụ thể, triển khai ứng dụng thực tế dưới sự hướng dẫn của chuyên gia đầu ngành.</p>
        </div>
    $2`
);

// 7. Pricing Section - Limit to 1 type "High Quality" and Installment Support
const pricingSectionHtml = `
                <div class="pricing-section reveal-up" id="bang-gia" style="text-align: center;">
                    <div class="section-label" style="margin: 0 auto 1.5rem; display: table;">HỌC PHÍ & LỘ TRÌNH TÀI CHÍNH</div>
                    <h3 class="pricing-title" style="text-align: center; font-size: clamp(1.8rem, 3.5vw, 2.5rem); font-weight: 900; color: #0f172a; margin-bottom: 12px; line-height: 1.2;">
                        Đầu tư thông minh cho<br /><span style="color:#ab0e00">Tương lai Quản trị Công nghệ</span>
                    </h3>
                    
                    <div class="pricing-grid-v2" style="grid-template-columns: 1fr; max-width: 600px; margin: 0 auto;">
                        <article class="pricing-card-v2 pcv2-featured ai-neon-box" aria-label="Gói High Quality">
                            <div class="pcv2-badge">Được lựa chọn nhiều nhất</div>
                            <div class="pcv2-header">
                                <div class="pcv2-tier">MSc AI High Quality</div>
                                <p class="pcv2-desc">Tương tác trực tiếp — Học 100% bằng Tiếng Anh</p>
                            </div>
                            <div class="pcv2-divider"></div>
                            <ul class="pcv2-features">
                                <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Học trực tiếp qua Zoom với Giảng viên quốc tế</li>
                                <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Truy cập toàn bộ Học liệu, Case study Thực tiễn</li>
                                <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Tham gia Cộng đồng Lãnh đạo AI</li>
                                <li><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"/></svg> Hệ sinh thái IDEAS LMS & Buffet AI</li>
                            </ul>
                            <a href="#dang-ky" class="btn pcv2-btn-featured" id="standard-cta">Tư vấn Học phí ngay</a>
                        </article>
                    </div>

                    <!-- Sacombank installment banner -->
                    <div class="sacom-banner" aria-label="Hỗ trợ trả góp Sacombank">
                        <div class="sacom-left">
                            <div class="sacom-cards">
                                <img decoding="async" src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Plantinum%20Cashback_contactless-01.png" alt="Sacombank Visa Platinum Cashback" class="sacom-card-img sacom-card-back" loading="lazy" />
                                <img decoding="async" src="https://www.sacombank.com.vn/content/dam/sacombank/images/the-new/the-tin-dung/Visa%20Credit%20Signature_contactless-01.png" alt="Sacombank Visa Signature" class="sacom-card-img sacom-card-front" loading="lazy" />
                            </div>
                            <div class="sacom-logo-area">
                                <div class="sacom-logo-text">SACOMBANK</div>
                                <div class="sacom-tag">Đối tác tài chính</div>
                            </div>
                        </div>
                        <div class="sacom-right">
                            <div class="sacom-headline">Hỗ trợ trả góp <span class="sacom-highlight">12 – 24 tháng</span></div>
                            <p class="sacom-sub">Thanh toán học phí linh hoạt qua thẻ tín dụng Sacombank Visa — lãi suất ưu đãi, không cần thế chấp</p>
                        </div>
                    </div>
                </div>
`;
html = html.replace(/<div class="pricing-section[^>]*>.*?<\/div>\s*<\/div>\s*<\/section>/s, `${pricingSectionHtml}</div></section>`);


// 8. CTA Section
html = html.replace(
    /(<h2 class="cta-headline"[^>]*id="cta-headline"[^>]*>).*?(<\/h2>)/s,
    `$1
        AI SẼ TIẾP TỤC PHÁT TRIỂN.<br />
        <span class="cta-gradient underline-highlight">BẠN CÓ ĐỦ TỰ TIN</span><br />
        DẪN DẮT AI CHO DOANH NGHIỆP KHÔNG?
    $2`
);
// Gmac replace
html = html.replace(
    /(<p class="quote-body"[^>]*>).*?(<\/p>)/s,
    `$1“72% lãnh đạo cấp cao đang tham gia các chương trình đào tạo AI bài bản để biết cách quản trị chiến lược.”<br/> - Theo khảo sát của edX.$2`
);

// Form program options
html = html.replace(/value="MBA Standard"/g, 'value="MSc AI Standard"');
html = html.replace(/value="MBA High Quality"/g, 'value="MSc AI High Quality"');

fs.writeFileSync(filePath, html, 'utf8');
console.log('Update Complete.');
