const fs = require('fs');
const path = require('path');

const files = [
    'wordpress-theme/single.php',
    'wordpress-theme/search.php',
    'wordpress-theme/page-ideas-talk.php',
    'wordpress-theme/page-ideas-podcast-series-01.php',
    'wordpress-theme/page-ideas-ambassador.php',
    'wordpress-theme/page-ho-tro-tai-chinh-sacombank.php',
    'wordpress-theme/page-history.php',
    'wordpress-theme/page-he-thong-ho-tro-hoc-tap-lms-ideas.php',
    'wordpress-theme/page-faculty.php',
    'wordpress-theme/page-dong-su-kien.php',
    'wordpress-theme/page-cac-khoan-chi-phi.php',
    'wordpress-theme/archive.php',
    'wordpress-theme/404.php',
    'singlepost.html',
    'index.html',
    'en/index.html'
];

const patterns = [
    // 1. Desktop dropdown item with class="dropdown-item-simple"
    /<a\s+href="[^"]*voucher"\s+class="dropdown-item-simple"[^>]*>[\s\S]*?<\/a>\s*/gi,
    /<a\s+class="dropdown-item-simple"\s+href="[^"]*voucher"[^>]*>[\s\S]*?<\/a>\s*/gi,
    
    // 2. Mobile dropdown item with class="mobile-dropdown-item-simple"
    /<a\s+href="[^"]*voucher"\s+class="mobile-dropdown-item-simple"[^>]*>[\s\S]*?<\/a>\s*/gi,
    /<a\s+class="mobile-dropdown-item-simple"\s+href="[^"]*voucher"[^>]*>[\s\S]*?<\/a>\s*/gi,
    
    // 3. Simple mobile link <a href="/voucher">...</a>
    /<a\s+href="[^"]*voucher"[^>]*>\s*<i\s+class="fa-solid\s+fa-ticket"><\/i>\s*IDEAS\s+Voucher\s*<\/a>\s*/gi,
    /<a\s+href="[^"]*voucher"[^>]*>[\s\S]*?<\/a>\s*/gi
];

const baseDir = path.resolve(__dirname, '..');

files.forEach(fileRelPath => {
    const filePath = path.join(baseDir, fileRelPath);
    if (!fs.existsSync(filePath)) {
        console.warn(`File not found: ${fileRelPath}`);
        return;
    }

    let content = fs.readFileSync(filePath, 'utf8');
    let original = content;

    patterns.forEach(pattern => {
        content = content.replace(pattern, '');
    });

    if (content !== original) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Successfully removed voucher link from: ${fileRelPath}`);
    } else {
        console.log(`No changes made to: ${fileRelPath} (pattern didn't match)`);
    }
});
