const fs = require('fs');
const path = require('path');

const srcFile = path.join(__dirname, 'index.html');
const destFile = path.join(__dirname, 'mscai.html');

let html = fs.readFileSync(srcFile, 'utf8');

// --- 1. Meta & Text (Global) ---
html = html.replace(/<title>.*?<\/title>/, '<title>MSc AI Thụy Sĩ Trực Tuyến | Thạc Sĩ Trí Tuệ Nhân Tạo Swiss UMEF</title>');
html = html.replace(/MBA Thụy Sĩ/g, 'MSc AI Thụy Sĩ');
html = html.replace(/Thạc sĩ Quản trị Kinh doanh \(MBA\)/g, 'Thạc sĩ Khoa học về Trí tuệ Nhân tạo Ứng dụng (MSc AI)');
html = html.replace(/\bMBA\b/g, 'MSc AI');
html = html.replace(/Thạc Sĩ Quản Trị Kinh Doanh/g, 'Thạc Sĩ Khoa Học Về Trí Tuệ Nhân Tạo Ứng Dụng');
html = html.replace(/thạc sĩ quản trị kinh doanh/g, 'thạc sĩ khoa học về trí tuệ nhân tạo');
html = html.replace(/value="MSc AI Standard"/g, 'value="MSc AI"');
html = html.replace(/value="MSc AI High Quality"/g, 'value="MSc AI"');

// --- 2. Inject CSS for Hero AI & Pricing AI & Competency ---
const aiStyles = `
    <!-- AI Tech Styles V3 -->
    <style>
        .ai-tech-bg { position: absolute; inset: 0; background-image: radial-gradient(rgba(171, 14, 0, 0.15) 1px, transparent 1px); background-size: 20px 20px; pointer-events: none; z-index: 0; }
        .ai-neon-box { position: relative; }
        .ai-neon-box::before { content: ""; position: absolute; inset: -1px; background: linear-gradient(45deg, #ab0e00, transparent, #ef4444); z-index: -1; border-radius: inherit; padding: 2px; -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0); -webkit-mask-composite: xor; mask-composite: exclude; }
        
        /* Dark AI Hero */
        #hero-banner { background: #050b14; color: #f8fafc; padding: 120px 0 80px; position: relative; overflow: hidden; }
        #hero-banner::before { content: ''; position: absolute; inset: 0; background: radial-gradient(circle at 100% 0%, rgba(171,14,0,0.15) 0%, transparent 50%), radial-gradient(circle at 0% 100%, rgba(59,130,246,0.1) 0%, transparent 50%); }
        .hero-tech-grid { position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 40px 40px; }
        #hero-headline { color: #fff; }
        .ai-hero-title-small { display: block; font-family: 'Courier New', monospace; font-size: 1.1rem; letter-spacing: 2px; color: #ef4444; margin-bottom: 12px; text-transform: uppercase; }
        .ai-hero-title-big { font-family: 'Inter', sans-serif; font-size: clamp(2.5rem, 5vw, 4.5rem); font-weight: 900; line-height: 1.1; margin-bottom: 24px; text-transform: uppercase; background: linear-gradient(90deg, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .ai-hero-desc { color: #94a3b8; font-size: 1.15rem; line-height: 1.6; max-width: 500px; margin-bottom: 32px; }
        
        /* CSS Art Hero Right Side */
        .ai-core-container { position: relative; width: 100%; display: flex; align-items: center; justify-content: center; height: 500px; }
        .ai-core { width: 340px; height: 340px; border-radius: 50%; background: radial-gradient(circle at 30% 30%, rgba(239, 68, 68, 0.4) 0%, rgba(171, 14, 0, 0.1) 50%, transparent 70%); box-shadow: 0 0 120px rgba(171,14,0,0.3); position: relative; animation: pulseCore 6s infinite ease-in-out; }
        .ai-core::before { content: ''; position: absolute; inset: 15px; border: 2px dashed rgba(239,68,68,0.3); border-radius: 50%; animation: spin 24s linear infinite; }
        .ai-core::after { content: ''; position: absolute; inset: 40px; border: 1px solid rgba(59,130,246,0.2); border-radius: 50%; animation: spin 16s linear infinite reverse; }
        .ai-core-center { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 120px; height: 120px; background: rgba(17, 24, 39, 0.8); border: 2px solid rgba(239,68,68,0.8); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: inset 0 0 30px rgba(239,68,68,0.5), 0 0 50px rgba(239,68,68,0.4); z-index: 10;}
        @keyframes pulseCore { 0%, 100% { transform: scale(1); } 50% { transform: scale(1.05); } }
        @keyframes spin { 100% { transform: rotate(360deg); } }

        /* Dark Badges */
        .ai-hero-badges { display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 32px; }
        .ai-hero-badge { display: inline-flex; align-items: center; gap: 8px; font-size: 0.9rem; font-weight: 500; color: #cbd5e1; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); padding: 8px 16px; border-radius: 99px; }

        /* AI Quote */
        .ai-quote-box { background: rgba(171,14,0,0.15); border-left: 4px solid #ef4444; padding: 16px 20px; color: #fff; font-style: italic; font-weight: 500; font-size: 1.05rem; margin-top: 32px; border-radius: 0 8px 8px 0; max-width: 500px; }

        /* Cyber Panel for Pricing */
        .cyber-pricing-card {
            background: linear-gradient(145deg, #0b1120 0%, #171d2b 100%); border: 1px solid rgba(171, 14, 0, 0.4); border-radius: 1.5rem; padding: 40px; color: #f8fafc; position: relative; box-shadow: 0 16px 48px rgba(0, 0, 0, 0.2), inset 0 0 20px rgba(171,14,0,0.05); overflow: hidden; margin: 0 auto; max-width: 600px; text-align: left;
        }
        .cyber-pricing-card::before { content: ''; position: absolute; top: 0; left: 0; width: 100%; height: 4px; background: linear-gradient(90deg, transparent, #ef4444, #ab0e00, transparent); }
        .cyber-badge { display: inline-flex; align-items: center; gap: 8px; font-size: 0.75rem; text-transform: uppercase; font-weight: 900; letter-spacing: 0.1em; background: rgba(171,14,0,0.2); border: 1px solid rgba(171,14,0,0.5); color: #fca5a5; padding: 6px 12px; border-radius: 99px; margin-bottom: 24px; }
        .cyber-tier-name { font-size: 2.2rem; font-weight: 900; margin: 0 0 8px; background: linear-gradient(135deg, #fff, #cbd5e1); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }
        .cyber-desc { color: #94a3b8; font-size: 0.95rem; margin: 0 0 32px; font-style: italic; }
        .cyber-features { list-style: none; padding: 0; margin: 0 0 36px; display: flex; flex-direction: column; gap: 16px; }
        .cyber-features li { display: flex; align-items: flex-start; gap: 12px; font-size: 0.95rem; color: #e2e8f0; }
        .cyber-btn { display: inline-flex; width: 100%; justify-content: center; padding: 16px; background: linear-gradient(90deg, #ab0e00, #ef4444); color: #fff !important; font-weight: 700; border-radius: 12px; transition: all 0.3s; box-shadow: 0 8px 20px rgba(171,14,0,0.3); text-decoration: none; font-size: 1.05rem; }
        .cyber-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(171,14,0,0.4); background: linear-gradient(90deg, #b91c1c, #f87171); }
    </style>
</head>
`;
html = html.replace(/<\/head>/i, aiStyles);


// --- 3. Replace Hero Entirely ---
const aiHeroHtml = `
<section class="hero" id="hero-banner">
    <div class="hero-tech-grid"></div>
    <div class="container hero-container" style="position: relative; z-index: 2; display: flex; align-items: center; gap: 40px;">
        
        <div class="hero-content reveal-up" style="flex: 1;">
            <span class="ai-hero-title-small">/// Chương trình Thạc sĩ Khoa học về</span>
            <h1 class="ai-hero-title-big">Trí Tuệ Nhân Tạo<br/><span style="color:#ef4444">Ứng Dụng (MSc AI)</span></h1>
            
            <p class="ai-hero-desc">MSc AI của <strong>Swiss UMEF</strong> được thiết kế dành cho nhà quản lý và lãnh đạo doanh nghiệp muốn hiểu - ứng dụng - quản trị AI ở cấp độ chiến lược, không phải để trở thành lập trình viên.</p>
            
            <div class="ai-hero-badges">
                <div class="ai-hero-badge"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg> 16–18 tháng</div>
                <div class="ai-hero-badge"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><polyline points="8 21 12 17 16 21"/></svg> 100% Trực tuyến</div>
                <div class="ai-hero-badge"><svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg> Bằng cấp Thụy Sĩ</div>
            </div>

            <div class="hero-actions" style="margin-top: 32px">
                <a href="#dang-ky" class="btn btn-primary" id="hero-cta" style="background:#ef4444;">Nhận Tư vấn Lộ trình MSc AI
                    <svg width="20" height="20" fill="none" viewBox="0 0 24 24" aria-hidden="true"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
                <a href="#chuong-trinh" class="btn btn-outline" style="color:#fff; border-color: rgba(255,255,255,0.3)">Xem cấu trúc chương trình</a>
            </div>

            <div class="ai-quote-box">
                "AI không lấy công việc của bạn. Người hiểu AI thì có."
            </div>
        </div>

        <div class="hero-visual reveal-up" style="flex: 1; display: none; /* Blocked to flex conditionally */ justify-content: center;">
            <div class="ai-core-container">
                <div class="ai-core">
                    <div class="ai-core-center">
                        <svg width="48" height="48" viewBox="0 0 24 24" fill="none" stroke="#ef4444" stroke-width="1.5"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/><line x1="2" y1="12" x2="22" y2="12"/></svg>
                    </div>
                </div>
            </div>
        </div>
        <!-- Unhide via CSS media query to keep mobile clean -->
        <style>@media(min-width: 992px){ .hero-visual { display: flex !important; } }</style>
    </div>
</section>
`;
html = html.replace(/<section class="hero" id="hero-banner">[\s\S]*?<\/section>/, aiHeroHtml);


// --- 4. Pain Section ---
html = html.replace(
    /(<h2 class="pain-headline"[^>]*>).*?(<\/h2>)/s,
    `$1
        Doanh nghiệp của bạn có đang<br />
        <span class="pain-headline-accent">đối mặt với rào cản AI này?</span>
    $2`
);
const newPainCards = `
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">01</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div>
                            <p>AI được sử dụng rời rạc, không gắn với <strong>hệ thống vận hành tổng thể</strong></p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">02</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg></div>
                            <p>Không có <strong>tư duy chiến lược</strong> về AI trong việc quản lý và ra quyết định</p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">03</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
                            <p>Đốt ngân sách vào AI nhưng không tạo ra <strong>đầu ra kinh doanh</strong> rõ ràng</p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">04</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
                            <p>Vận hành thiếu kiểm soát, gây <strong>rủi ro về uy tín, pháp lý và tài chính</strong></p>
                        </div>
                    </div>
                    <div class="pain-card-v2 ai-neon-box">
                        <div class="pain-card-num">05</div>
                        <div class="pain-card-body">
                            <div class="pain-card-icon"><svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"/></svg></div>
                            <p>Chỉ áp dụng AI giải quyết các tác vụ rời rạc mà thiếu hệ thống để <strong>chuyển đổi quy trình</strong></p>
                        </div>
                    </div>`;
html = html.replace(/<div class="pain-cards[^>]*>[\s\S]*?<\/div>\s*<!-- Stat \+ Trends -->/s, `<div class="pain-cards reveal-up">${newPainCards}</div><!-- Stat + Trends -->`);


// --- 5. Fix Solution & Remove Competencies Properly ---
html = html.replace(
    /<h2 class="section-title"[^>]*id="solution-headline"[^>]*>[\s\S]*?<\/h2>/,
    `<h2 class="section-title" id="solution-headline" style="margin-bottom:16px">Học để quản trị AI<br /><span class="gradient-text">Không phải để lập trình AI</span></h2>`
);
html = html.replace(/ThS\. Quản trị Kinh doanh \(MBA\)/g, 'Thạc sĩ Khoa học về Trí tuệ Nhân tạo Ứng dụng (MSc AI)');

// This regex carefully matches exact competency grid to replace with NEW the 4 benefits
const oldCompRegex = /<div class="competency-grid"[^>]*>[\s\S]*?<\/div>[\s]*<div class="scroll-dots"/s;
const newCompetencies = `
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
        <h3 class="comp-title">Biến AI thành công cụ lãnh đạo</h3>
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
        <p class="comp-desc">Làm việc hiệu quả chuyên sâu với đội ngũ kỹ thuật, giám sát rủi ro bảo mật và tối ưu nguồn lực.</p>
    </article>
</div>
<div class="scroll-dots"`;

html = html.replace(oldCompRegex, newCompetencies);

// Replace competency title text directly just in case
html = html.replace(/Trở thành nhà quản lý toàn diện với<br \/>/g, 'Đưa sự nghiệp lên một tầm cao mới bằng<br />');
html = html.replace(/<span class="gradient-text">4 năng lực cốt lõi<\/span>/g, '<span class="gradient-text">Năng Lực Ra Quyết Định & Quản Trị AI</span>');


// --- 6. Remove the broken curriculum note ---
// The line is: <div class="curri-note reveal-up"> .... LMS Powered by Moodle... </div>
html = html.replace(/<div class="curri-note reveal-up">[\s\S]*?<\/div>/, '');


// --- 7. Curriculum Subject Replaces ---
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
html = html.replace(/<div class="curriculum-grid[^>]*>[\s\S]*?<\/div>\s*<div class="curri-thesis/s, `${newCurriculumGrid}<div class="curri-thesis`);

html = html.replace(
    /(<div class="curri-thesis[^>]*>).*?(<\/div>\s*<\/div>)/s,
    `$1
        <div class="curri-thesis-icon"><svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/><line x1="8" y1="10" x2="16" y2="10"/><line x1="8" y1="14" x2="12" y2="14"/></svg></div>
        <div>
            <strong>Capstone Project: Dự án thực tiễn cuối khoá</strong>
            <p>Ứng dụng các kiến thức cốt lõi vào bài toán thực tiễn của doanh nghiệp dưới sự tư vấn của hội đồng AI hàng đầu.</p>
        </div>
    $2`
);


// --- 8. Retain existing SacomBanner from index.html (before I delete pricing section)
const oldSacomMatch = html.match(/<!-- Sacombank installment banner -->[\s\S]*?<\/div>\s*<\/div>\s*<\/section>/);


// --- 9. Clean Redesign Pricing ---
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
                        <p class="cyber-desc">Tương tác trực tiếp - Học 100% bằng Tiếng Anh cùng chuyên gia quốc tế</p>
                        
                        <ul class="cyber-features">
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Học trực tiếp qua Zoom với Giảng viên quốc tế Thụy Sĩ</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Truy cập toàn bộ Học liệu, và kho Case study Thực tiễn</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Tham gia Cộng đồng Lãnh đạo AI và kết nối doanh nghiệp</li>
                            <li><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#fca5a5" stroke-width="2.5"><polyline points="20 6 9 17 4 12"/></svg> Sử dụng trọn đời Hệ sinh thái IDEAS LMS & IDEAS AI Platform</li>
                        </ul>
                        <div style="text-align: center;">
                            <a href="#dang-ky" class="cyber-btn" id="standard-cta">Tư vấn Học phí & Nhận ưu đãi</a>
                        </div>
                    </div>

                    ${oldSacomMatch ? oldSacomMatch[0] : '</div></section>'}
`;
html = html.replace(/<div class="pricing-section[^>]*>[\s\S]*?<\/section>/, modernPricingHtml);


fs.writeFileSync(destFile, html, 'utf8');
console.log('Build Final Complete.');
