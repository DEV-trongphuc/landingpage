const fs = require('fs');
const path = require('path');

const mscaiFile = path.join(__dirname, 'mscai.html');
const indexFile = path.join(__dirname, 'index.html');

let mscaiHtml = fs.readFileSync(mscaiFile, 'utf8');
let indexHtml = fs.readFileSync(indexFile, 'utf8');

// 1. Extract the whole hero section from index.html
const heroMatch = indexHtml.match(/<section class="hero" id="trang-chu"[\s\S]*?<\/section>/);
if (!heroMatch) {
    console.error('Could not find hero section in index.html');
    process.exit(1);
}

let newHero = heroMatch[0];

// 2. Inject Dark Red Gradient BG and Dark Mode Text fixes
newHero = newHero.replace(
    /<div class="hero-bg">/,
    `<div class="hero-bg" style="background: linear-gradient(135deg, #4a0400 0%, #ab0e00 40%, #ef4444 100%);">
        <div style="position: absolute; top: -10%; left: -5%; width: 50vw; height: 50vw; background: radial-gradient(circle, rgba(255,255,255,0.08), transparent 70%); border-radius: 50%; filter: blur(40px);"></div>
        <div style="position: absolute; inset: 0; background-image: linear-gradient(rgba(255,255,255,0.03) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px); background-size: 40px 40px; z-index: 1;"></div>`
);

// Fix colors for dark mode context
newHero = newHero.replace(/<div class="hero-content reveal-up">/, '<div class="hero-content reveal-up" style="color: #fff;">');

// 3. Replace text content for typography matching the user's request (but for AI)
newHero = newHero.replace(
    /<h1 class="hero-headline"[^>]*>[\s\S]*?<\/h1>/,
    `<h1 class="hero-headline" id="hero-headline">
        <span class="hero-hl-small" style="color: #fff; font-size: 1.2rem; letter-spacing: 2px;">Chương trình</span>
        <em class="hero-hl-big" style="color: #fff; text-shadow: 0 4px 15px rgba(0,0,0,0.3); line-height: 1.1; margin: 8px 0;">Thạc sĩ Khoa học về<br/>Trí Tuệ Nhân Tạo</em>
        <span class="hero-hl-small" style="color: #fca5a5; font-size: clamp(1.4rem, 4vw, 2.5rem); margin-top: 12px; display: block; filter: brightness(1.2);">Ứng dụng (MSc AI)</span>
    </h1>`
);

newHero = newHero.replace(
    /<p class="hero-sub">[\s\S]*?<\/p>/,
    `<p class="hero-sub" style="color: rgba(255,255,255,0.9); font-size: 1.15rem; line-height: 1.6; max-width: 600px;">
        MSc AI của <strong>Swiss UMEF</strong> thiết kế dành cho nhà quản lý và lãnh đạo doanh nghiệp muốn <strong>hiểu - ứng dụng - quản trị AI</strong> ở cấp độ chiến lược, vượt ra khỏi ranh giới của một lập trình viên.
    </p>`
);

newHero = newHero.replace(/Đào tạo bởi Swiss UMEF – Geneva, Thụy Sĩ/, 'Đào tạo bởi Swiss UMEF – Geneva, Thụy Sĩ');
newHero = newHero.replace(/MBA Thụy Sĩ/g, 'MSc AI Thụy Sĩ');
newHero = newHero.replace(/MBA Swiss UMEF/g, 'MSc AI Swiss UMEF');
newHero = newHero.replace(/xem bằng MBA mẫu/i, 'Xem bằng MSc AI mẫu');
newHero = newHero.replace(/Nhận Tư vấn lộ trình MBA/i, 'Nhận Tư vấn lộ trình MSc AI');

// Add styles overrides onto the elements that might be strictly black
newHero = newHero.replace(
    /<div class="info-badge">/g, 
    '<div class="info-badge" style="color: #fff; border-color: rgba(255,255,255,0.3); background: rgba(0,0,0,0.2);">'
);

newHero = newHero.replace(
    /<span class="hero-accred-label">/,
    '<span class="hero-accred-label" style="color: rgba(255,255,255,0.8);">'
);

newHero = newHero.replace(
    /<div class="hero-social-proof">/,
    '<div class="hero-social-proof" style="color: #fff;">'
);

// We need to invert or whiten the accred logos if they are black images?
// We will just add a CSS filter to the accred-logos container to make them white
newHero = newHero.replace(
    /<div class="hero-accred-logos">/,
    `<style>.hero-accred-logos img { filter: brightness(0) invert(1); opacity: 0.9; }</style>
     <div class="hero-accred-logos" style="background: transparent;">`
);

// We should also replace the main CTA button to be white background with red text so it pops
newHero = newHero.replace(
    /id="hero-main-cta"/,
    'id="hero-main-cta" style="background: #fff; color: #ab0e00; border: none; box-shadow: 0 8px 25px rgba(0,0,0,0.2);"'
);

// Make the ghost button white line
newHero = newHero.replace(
    /<a href="#chung-minh" class="btn btn-ghost">/,
    '<a href="#chung-minh" class="btn btn-ghost" style="color: #fff; border-color: rgba(255,255,255,0.4);">'
);

// Inject back into mscai.html
mscaiHtml = mscaiHtml.replace(/<section class="hero" id="trang-chu"[\s\S]*?<\/section>/, newHero);

fs.writeFileSync(mscaiFile, mscaiHtml, 'utf8');
console.log('Hero Reverted to Original Layout Structure with AI Content, Red Gradient, and Dark Mode Fixes.');
