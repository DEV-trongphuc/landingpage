const fs = require('fs');
const path = require('path');

const destFile = path.join(__dirname, 'mscai.html');

let html = fs.readFileSync(destFile, 'utf8');

const newHeroHtml = `
<section class="hero" id="trang-chu" aria-labelledby="hero-headline">
    <div class="hero-tech-bg" aria-hidden="true" style="position: absolute; inset: 0; background: linear-gradient(135deg, #6c0a02 0%, #ab0e00 40%, #ef4444 100%); overflow: hidden; z-index: 0;">
        <!-- Glowing animated orbs for tech feel -->
        <div style="position: absolute; top: 10%; left: -5%; width: 400px; height: 400px; background: radial-gradient(circle, rgba(255,255,255,0.15), transparent 70%); border-radius: 50%; filter: blur(40px);"></div>
        <div style="position: absolute; bottom: -20%; right: -10%; width: 600px; height: 600px; background: radial-gradient(circle, rgba(0,0,0,0.3), transparent 70%); border-radius: 50%; filter: blur(60px);"></div>
        
        <!-- Grid overlay -->
        <div style="position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.05) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.05) 1px, transparent 1px); background-size: 30px 30px; z-index: 1;"></div>
    </div>

    <div class="container hero-layout" style="position: relative; z-index: 2; display: flex; align-items: center; gap: 40px; padding: 120px 0 80px;">
        <!-- LEFT: Text -->
        <div class="hero-content reveal-up" style="flex: 1; color: #fff;">
            
            <div style="display: inline-flex; align-items: center; gap: 8px; font-family: 'Courier New', monospace; font-size: 0.95rem; font-weight: 700; letter-spacing: 2px; color: #fca5a5; margin-bottom: 16px; border: 1px solid rgba(255,255,255,0.2); padding: 4px 12px; border-radius: 99px; background: rgba(0,0,0,0.2);">
                <span style="width: 8px; height: 8px; background: #fff; border-radius: 50%; box-shadow: 0 0 10px #fff; animation: pulse 2s infinite;"></span>
                HỆ THỐNG ĐÀO TẠO THỤY SĨ
            </div>

            <h1 id="hero-headline" style="font-family: 'Inter', sans-serif; font-size: clamp(2.5rem, 5vw, 4rem); font-weight: 900; line-height: 1.15; margin-bottom: 24px; text-transform: uppercase;">
                Thạc sĩ Khoa học về<br/>
                <span style="color: #fff; text-shadow: 0 4px 20px rgba(0,0,0,0.3);">Trí Tuệ Nhân Tạo Ứng Dụng <br/>(MSc AI)</span>
            </h1>

            <p style="font-size: 1.15rem; line-height: 1.6; color: rgba(255,255,255,0.9); max-width: 550px; margin-bottom: 32px;">
                MSc AI của <strong>Swiss UMEF</strong> thiết kế dành cho nhà quản lý và lãnh đạo doanh nghiệp muốn hiểu - ứng dụng - quản trị AI ở cấp độ chiến lược.
            </p>

            <div style="display: flex; flex-wrap: wrap; gap: 12px; margin-bottom: 36px;">
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.95rem; background: rgba(0,0,0,0.2); padding: 8px 16px; border-radius: 8px; border-left: 3px solid #fff;">
                    16–18 tháng
                </div>
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.95rem; background: rgba(0,0,0,0.2); padding: 8px 16px; border-radius: 8px; border-left: 3px solid #fff;">
                    100% Trực tuyến
                </div>
                <div style="display: flex; align-items: center; gap: 8px; font-weight: 600; font-size: 0.95rem; background: rgba(0,0,0,0.2); padding: 8px 16px; border-radius: 8px; border-left: 3px solid #fff;">
                    Bằng cấp Thụy Sĩ
                </div>
            </div>

            <div class="hero-actions" style="margin-bottom: 32px;">
                <a href="#dang-ky" class="btn" style="background: #fff; color: #ab0e00; box-shadow: 0 8px 25px rgba(0,0,0,0.2); border: none;">Đánh giá mức độ phù hợp ngay</a>
            </div>

            <div style="background: rgba(0,0,0,0.25); border-left: 4px solid #fca5a5; padding: 16px 20px; font-style: italic; font-weight: 500; font-size: 1.1rem; border-radius: 0 8px 8px 0; max-width: 500px;">
                “AI không lấy công việc của bạn. Người hiểu AI thì có.”
            </div>
            
        </div>

        <!-- RIGHT: AI Graphic Content -->
        <!-- Will hide on small screens to maintain clean layout -->
        <style>@media(max-width: 991px){ .hero-ai-sculpture { display: none !important; } } @keyframes flyNodes { 0% { transform: translateY(0px); } 50% { transform: translateY(-15px); } 100% { transform: translateY(0px); } }</style>
        
        <div class="hero-ai-sculpture reveal-up" style="flex: 1; display: flex; justify-content: center; position: relative;">
            
            <div style="position: relative; width: 400px; height: 400px;">
                <!-- Glowing core -->
                <div style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); width: 220px; height: 220px; background: radial-gradient(circle, rgba(255,255,255,0.8) 0%, rgba(255,255,255,0) 70%); box-shadow: 0 0 100px rgba(255,255,255,0.4); border-radius: 50%; animation: pulse 4s infinite alternate;"></div>
                
                <!-- Orbiting Rings -->
                <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; border: 2px dashed rgba(255,255,255,0.4); border-radius: 50%; animation: spin 20s linear infinite;"></div>
                <div style="position: absolute; top: 20px; left: 20px; right: 20px; bottom: 20px; border: 1px solid rgba(255,255,255,0.2); border-radius: 50%; animation: spin 15s linear infinite reverse;"></div>
                <div style="position: absolute; top: 60px; left: 60px; right: 60px; bottom: 60px; border: 2px solid rgba(255,255,255,0.6); border-radius: 50%; animation: spin 30s linear infinite;"></div>
                
                <!-- Floating Node Icon -->
                <div style="position: absolute; top:50%; left:50%; transform:translate(-50%, -50%); z-index: 10;">
                    <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#ab0e00" stroke-width="1.5" style="background:#fff; border-radius:50%; padding: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.3); animation: flyNodes 5s infinite ease-in-out;">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/><line x1="2" y1="12" x2="22" y2="12"/>
                    </svg>
                </div>
            </div>

        </div>
    </div>
</section>
`;

html = html.replace(/<section class="hero" id="trang-chu".*?<\/section>/s, newHeroHtml);

fs.writeFileSync(destFile, html, 'utf8');
console.log('Hero Red Gradient Complete.');
