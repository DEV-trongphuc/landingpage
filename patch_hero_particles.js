const fs = require('fs');
const path = require('path');

const file = path.join(__dirname, 'mscai.html');
let html = fs.readFileSync(file, 'utf8');

// 1. Fix contrast of <p> tag inside hero-social-proof
html = html.replace(
    /(<div class="hero-social-proof"[^>]*>[\s\S]*?)<p>(.*?)<\/p>/,
    `$1<p style="color: rgba(255,255,255,0.9); margin-top: 0; margin-bottom: 0;">$2</p>`
);

// 2. Add AI Particles to the Hero Background
const particlesCss = `
<style>
    .ai-particles-container { position: absolute; inset: 0; overflow: hidden; pointer-events: none; z-index: 1; }
    .ai-particle { position: absolute; bottom: -10px; width: 4px; height: 4px; background: #fff; border-radius: 50%; box-shadow: 0 0 10px #fff, 0 0 20px #fca5a5; opacity: 0; animation: floatUp linear infinite; }
    @keyframes floatUp {
        0% { transform: translateY(0) scale(0.5); opacity: 0; }
        20% { opacity: 0.8; }
        80% { opacity: 0.8; }
        100% { transform: translateY(-100vh) scale(1.5); opacity: 0; }
    }
</style>
<div class="ai-particles-container">
    <div class="ai-particle" style="left: 10%; animation-duration: 15s; animation-delay: 0s;"></div>
    <div class="ai-particle" style="left: 20%; animation-duration: 12s; animation-delay: 2s; width: 6px; height: 6px;"></div>
    <div class="ai-particle" style="left: 30%; animation-duration: 18s; animation-delay: 5s;"></div>
    <div class="ai-particle" style="left: 40%; animation-duration: 22s; animation-delay: 1s; width: 3px; height: 3px;"></div>
    <div class="ai-particle" style="left: 50%; animation-duration: 14s; animation-delay: 7s;"></div>
    <div class="ai-particle" style="left: 60%; animation-duration: 20s; animation-delay: 3s; width: 6px; height: 6px;"></div>
    <div class="ai-particle" style="left: 70%; animation-duration: 17s; animation-delay: 9s;"></div>
    <div class="ai-particle" style="left: 80%; animation-duration: 11s; animation-delay: 4s; width: 3px; height: 3px;"></div>
    <div class="ai-particle" style="left: 90%; animation-duration: 19s; animation-delay: 6s;"></div>
    
    <!-- Data lines moving down -->
    <div style="position: absolute; top:0; left: 15%; width: 1px; height: 40px; background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.8), transparent); animation: lineDrop 8s infinite linear;"></div>
    <div style="position: absolute; top:0; left: 45%; width: 1px; height: 60px; background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.6), transparent); animation: lineDrop 12s infinite linear 4s;"></div>
    <div style="position: absolute; top:0; left: 75%; width: 1px; height: 50px; background: linear-gradient(to bottom, transparent, rgba(255,255,255,0.4), transparent); animation: lineDrop 10s infinite linear 2s;"></div>
    
    <style>
        @keyframes lineDrop {
            0% { transform: translateY(-100px); opacity: 0; }
            10% { opacity: 1; }
            90% { opacity: 1; }
            100% { transform: translateY(100vh); opacity: 0; }
        }
    </style>
</div>
`;

html = html.replace(
    /<div class="hero-grid"><\/div>/,
    `<div class="hero-grid"></div>\n${particlesCss}`
);

fs.writeFileSync(file, html, 'utf8');
console.log('Fixed contrast on text and added beautiful tech AI particles.');
