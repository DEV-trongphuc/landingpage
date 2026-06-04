const fs = require('fs');
const path = require('path');

// Nhận tham số phiên bản từ dòng lệnh nếu có (ví dụ: node update-versions.js 4.4 hoặc node update-versions.js timestamp)
const targetVersion = process.argv[2];

// Quét thư mục hiện tại để tìm các tệp HTML
// Quét thư mục hiện tại và thư mục /en để tìm các tệp HTML
const getHtmlFiles = (dir) => {
    let results = [];
    const list = fs.readdirSync(dir);
    list.forEach(file => {
        const filePath = path.join(dir, file);
        const stat = fs.statSync(filePath);
        if (stat && stat.isDirectory()) {
            if (file === 'en') {
                results = results.concat(getHtmlFiles(filePath));
            }
        } else if (file.endsWith('.html')) {
            results.push(filePath);
        }
    });
    return results;
};

const filePaths = getHtmlFiles(__dirname);
console.log(`Tìm thấy ${filePaths.length} tệp HTML cần xử lý.`);

filePaths.forEach(filePath => {
    const file = path.relative(__dirname, filePath);
    let content = fs.readFileSync(filePath, 'utf8');
    let hasChanges = false;
    const replacements = [];

    // Regex tìm các đường dẫn tài nguyên trong common-assets (cả CSS và JS) có hoặc không có tham số ?v= và hỗ trợ cả ../
    const regex = /(href|src)="(\.\.\/)?common-assets\/((?:css|js)\/[\w.-]+\.(?:css|js))(?:\?v=([\w.]+))?"/g;

    const newContent = content.replace(regex, (match, attr, dotdot, assetPath, currentVersion) => {
        let newVersion;

        if (targetVersion) {
            // Nếu người dùng truyền version cụ thể hoặc dùng từ khóa 'timestamp'
            newVersion = targetVersion === 'timestamp' ? Date.now().toString() : targetVersion;
        } else if (currentVersion) {
            // Tự động tăng phiên bản số ở phần tử cuối
            const parts = currentVersion.split('.');
            if (parts.length > 0 && !isNaN(parts[parts.length - 1])) {
                const lastIdx = parts.length - 1;
                parts[lastIdx] = (parseInt(parts[lastIdx], 10) + 1).toString();
                newVersion = parts.join('.');
            } else {
                newVersion = '1.0';
            }
        } else {
            // Nếu tài nguyên chưa có version (?v=) thì gán mặc định là 1.0
            newVersion = '1.0';
        }

        // Map to minified version if exists
        let mappedAssetPath = assetPath;
        if (!assetPath.includes('.min.')) {
            const minPath = assetPath.replace(/\.(css|js)$/, '.min.$1');
            const absoluteMinPath = path.join(__dirname, 'common-assets', minPath);
            if (fs.existsSync(absoluteMinPath)) {
                mappedAssetPath = minPath;
            }
        }

        const prefix = dotdot || '';
        const oldRef = `${attr}="${prefix}common-assets/${assetPath}${currentVersion ? `?v=${currentVersion}` : ''}"`;
        const newRef = `${attr}="${prefix}common-assets/${mappedAssetPath}?v=${newVersion}"`;

        if (oldRef !== newRef) {
            hasChanges = true;
            replacements.push(`${prefix}common-assets/${assetPath} -> ${prefix}common-assets/${mappedAssetPath} (${currentVersion || 'không có'} -> ${newVersion})`);
            return newRef;
        }

        return match;
    });

    if (hasChanges) {
        fs.writeFileSync(filePath, newContent, 'utf8');
        console.log(`\nĐã cập nhật ${file}:`);
        replacements.forEach(rep => console.log(`  - ${rep}`));
    } else {
        console.log(`Không có thay đổi hoặc không tìm thấy tài nguyên cần cập nhật trong ${file}`);
    }
});

console.log('\nHoàn thành cập nhật phiên bản tài nguyên!');
