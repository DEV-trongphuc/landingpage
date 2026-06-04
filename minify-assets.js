const fs = require('fs');
const path = require('path');

function minifyCSS(css) {
  return css
    .replace(/\/\*[\s\S]*?\*\//g, '') // remove block comments
    .replace(/\s+/g, ' ')             // collapse whitespace
    .replace(/\s*([{};:,])\s*/g, '$1') // remove spaces around symbols
    .replace(/;}/g, '}')               // remove trailing semicolons before closing brace
    .trim();
}

function minifyJS(js) {
  // First, remove block comments
  let clean = js.replace(/\/\*[\s\S]*?\*\//g, '');
  
  // Parse line by line to strip single-line comments safely
  const lines = clean.split(/\r?\n/);
  const processedLines = lines.map(line => {
    let trimmed = line.trim();
    if (trimmed.startsWith('//')) {
      return '';
    }
    
    let inQuote = false;
    let quoteChar = '';
    let isComment = false;
    let commentIndex = -1;
    
    for (let i = 0; i < trimmed.length; i++) {
      const char = trimmed[i];
      // Track string boundaries to avoid stripping comments inside quotes
      if ((char === '"' || char === "'" || char === '`') && (i === 0 || trimmed[i - 1] !== '\\')) {
        if (!inQuote) {
          inQuote = true;
          quoteChar = char;
        } else if (char === quoteChar) {
          inQuote = false;
        }
      }
      
      // Look for comment starter // when outside quotes
      if (!inQuote && char === '/' && i < trimmed.length - 1 && trimmed[i + 1] === '/') {
        const prefix = trimmed.substring(Math.max(0, i - 6), i);
        if (prefix.endsWith('http:') || prefix.endsWith('https:')) {
          // It's a URL, skip it
          i++;
          continue;
        }
        isComment = true;
        commentIndex = i;
        break;
      }
    }
    
    if (isComment) {
      trimmed = trimmed.substring(0, commentIndex).trim();
    }
    return trimmed;
  });
  
  // Join back and remove consecutive empty lines
  return processedLines.filter(l => l.length > 0).join('\n');
}

const assets = [
  { type: 'css', src: 'common-assets/css/style.css', dist: 'common-assets/css/style.min.css' },
  { type: 'css', src: 'common-assets/css/booking-modal.css', dist: 'common-assets/css/booking-modal.min.css' },
  { type: 'js', src: 'common-assets/js/script.js', dist: 'common-assets/js/script.min.js' },
  { type: 'js', src: 'common-assets/js/booking-modal.js', dist: 'common-assets/js/booking-modal.min.js' },
  { type: 'js', src: 'common-assets/js/variables.js', dist: 'common-assets/js/variables.min.js' },
  { type: 'js', src: 'common-assets/js/variables-en.js', dist: 'common-assets/js/variables-en.min.js' }
];

assets.forEach(asset => {
  const srcPath = path.join(__dirname, asset.src);
  const distPath = path.join(__dirname, asset.dist);
  
  if (fs.existsSync(srcPath)) {
    const raw = fs.readFileSync(srcPath, 'utf8');
    let minified = '';
    
    if (asset.type === 'css') {
      minified = minifyCSS(raw);
    } else {
      minified = minifyJS(raw);
    }
    
    fs.writeFileSync(distPath, minified, 'utf8');
    
    const rawSize = Buffer.byteLength(raw, 'utf8');
    const minSize = Buffer.byteLength(minified, 'utf8');
    const savings = ((1 - minSize / rawSize) * 100).toFixed(1);
    
    console.log(`Minified ${asset.src} -> ${asset.dist}`);
    console.log(`  Size: ${(rawSize / 1024).toFixed(1)} KB -> ${(minSize / 1024).toFixed(1)} KB (${savings}% savings)`);
  } else {
    console.log(`Asset not found: ${srcPath}`);
  }
});
