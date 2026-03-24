const fs = require('fs');
const path = require('path');

const destFile = path.join(__dirname, 'mscai.html');

let html = fs.readFileSync(destFile, 'utf8');

const updatedHero = `
<section class="hero" id="trang-chu" aria-labelledby="hero-headline">
    <div class="hero-tech-bg" aria-hidden="true" style="position: absolute; inset: 0; background: linear-gradient(135deg, #6c0a02 0%, #a00b00 40%, #e02424 100%); overflow: hidden; z-index: 0;">
        <div style="position: absolute; top: -10%; right: -5%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%); border-radius: 50%; filter: blur(40px);"></div>
        
        <!-- Grid overlay -->
        <div style="position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.04) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.04) 1px, transparent 1px); background-size: 40px 40px; z-index: 1;"></div>
    </div>

    <!-- Desktop Flexbox Layout CSS -->
    <style>
        .hero-layout-ai {
            position: relative; z-index: 2; padding: 100px 0 60px;
            display: flex; align-items: center; gap: 40px;
            color: #fff;
        }
        .hero-ai-left { flex: 0 0 55%; padding-right: 20px; text-align: left; }
        .hero-ai-right { flex: 0 0 45%; position: relative; }
        
        .ai-title-badge {
            display: inline-flex; align-items: center; gap: 8px; font-family: 'Courier New', monospace; font-size: 0.95rem; font-weight: 700; letter-spacing: 2px; color: #fca5a5; margin-bottom: 20px; border: 1px solid rgba(255,255,255,0.2); padding: 6px 16px; border-radius: 99px; background: rgba(0,0,0,0.2); text-transform: uppercase;
        }
        .ai-title-badge .dot {
            width: 8px; height: 8px; background: #fff; border-radius: 50%; box-shadow: 0 0 10px #fff; animation: pulse 2s infinite;
        }
        
        .ai-main-title {
            font-family: 'Inter', sans-serif; font-size: clamp(2.2rem, 4.5vw, 3.8rem); font-weight: 900; line-height: 1.2; margin-bottom: 24px; text-transform: uppercase;
            text-shadow: 0 4px 15px rgba(0,0,0,0.3); word-break: break-word;
        }
        
        .ai-desc-text {
            font-size: 1.15rem; line-height: 1.6; color: rgba(255,255,255,0.9); margin-bottom: 32px;
        }
        
        .ai-features-row {
            display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 36px;
        }
        
        .ai-feature-pill {
            display: inline-flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.95rem; background: rgba(0,0,0,0.25); padding: 8px 16px; border-radius: 8px; border-left: 3px solid #fff;
        }
        
        .ai-cta-block {
            margin-bottom: 32px;
        }
        .ai-btn-primary {
            display: inline-block; background: #fff; color: #ab0e00; font-weight: 700; padding: 16px 32px; border-radius: 12px; box-shadow: 0 8px 25px rgba(0,0,0,0.2); text-decoration: none; font-size: 1.1rem; transition: transform 0.2s;
        }
        .ai-btn-primary:hover {
            transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,0.3);
        }
        
        .ai-quote-box {
            background: rgba(0,0,0,0.2); border-left: 4px solid #fca5a5; padding: 16px 24px; font-style: italic; font-weight: 500; font-size: 1.1rem; border-radius: 0 8px 8px 0; max-width: 500px; line-height: 1.5;
        }

        .ai-hero-img-wrapper {
            position: relative;
            transform: translateY(0px);
            animation: floatImg 6s ease-in-out infinite;
        }
        .ai-hero-img-wrapper img {
            width: 100%; max-width: 500px; height: auto; display: block; margin: 0 auto;
            border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.4);
            border: 1px solid rgba(255,255,255,0.1);
        }

        @keyframes floatImg {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }

        @media (max-width: 991px) {
            .hero-layout-ai { flex-direction: column; padding: 80px 0 60px; text-align: center; }
            .hero-ai-left { flex: 1 1 100%; padding-right: 0; text-align: center; }
            .hero-ai-right { flex: 1 1 100%; margin-top: 40px; }
            .ai-features-row { justify-content: center; }
            .ai-quote-box { margin: 0 auto; text-align: left; }
            .ai-main-title { font-size: 2.2rem; }
        }
    </style>

    <div class="container hero-layout-ai">
        <!-- LEFT: Text -->
        <div class="hero-ai-left reveal-up">
            
            <div class="ai-title-badge">
                <span class="dot"></span>
                Hệ thống đào tạo Thụy Sĩ
            </div>

            <h1 class="ai-main-title">
                Thạc sĩ Khoa học về<br/>
                <span style="color: #cbd5e1;">Trí Tuệ Nhân Tạo Ứng Dụng (MSc AI)</span>
            </h1>

            <p class="ai-desc-text">
                MSc AI của <strong>Swiss UMEF</strong> thiết kế dành cho nhà quản lý và lãnh đạo doanh nghiệp muốn <strong>hiểu - ứng dụng - quản trị AI</strong> ở cấp độ chiến lược, vượt ra khỏi ranh giới của một lập trình viên.
            </p>

            <div class="ai-features-row">
                <div class="ai-feature-pill">16–18 tháng</div>
                <div class="ai-feature-pill">100% Trực tuyến</div>
                <div class="ai-feature-pill">Bằng cấp Thụy Sĩ</div>
            </div>

            <div class="ai-cta-block">
                <a href="#dang-ky" class="ai-btn-primary">Đánh giá mức độ phù hợp ngay</a>
            </div>

            <div class="ai-quote-box">
                “AI không lấy công việc của bạn. Người hiểu AI thì có.”
            </div>
            
        </div>

        <!-- RIGHT: Image GraphicContent -->
        <div class="hero-ai-right reveal-up">
            <div class="ai-hero-img-wrapper">
                <img src="ai_master_hero.png" alt="MSc AI Swiss UMEF Hero Image" />
            </div>
        </div>
        
    </div>
</section>
`;

html = html.replace(/<section class="hero" id="trang-chu".*?<\/section>/s, updatedHero);

fs.writeFileSync(destFile, html, 'utf8');
console.log('Fixed Hero CSS & Grid Layout. Reinserted new AI graphic image.');
