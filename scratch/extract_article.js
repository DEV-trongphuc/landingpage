const fs = require('fs');
const path = require('path');

// Locate content.md in brain directory
const stepPath = 'C:\\Users\\AD\\.gemini\\antigravity-ide\\brain\\08f1a347-f13b-41e2-94a5-5b5708f0bd3d\\.system_generated\\steps\\1014\\content.md';

if (fs.existsSync(stepPath)) {
  const content = fs.readFileSync(stepPath, 'utf8');
  
  // Find article container: ultp-builder-container
  const regex = /<div class="ultp-builder-container[\s\S]*?<\/div>\s*<\/div>\s*<\/div>/g;
  const match = content.match(regex);
  if (match) {
    console.log("Found match length:", match[0].length);
    fs.writeFileSync('scratch/extracted_article.html', match[0], 'utf8');
  } else {
    // Write the body
    const bodyMatch = content.match(/<body[\s\S]*?<\/body>/);
    if (bodyMatch) {
      console.log("Found body instead, length:", bodyMatch[0].length);
      fs.writeFileSync('scratch/extracted_article.html', bodyMatch[0], 'utf8');
    } else {
      console.log("No body found");
    }
  }
} else {
  console.log("File does not exist:", stepPath);
}
