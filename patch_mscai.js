const fs = require('fs');
const path = require('path');

const destFile = path.join(__dirname, 'mscai.html');

let html = fs.readFileSync(destFile, 'utf8');

html = html.replace(/<div class="curri-lms-note reveal-up">[\s\S]*?<\/div>/, '');

fs.writeFileSync(destFile, html, 'utf8');
console.log('Fixed LMS issue');
