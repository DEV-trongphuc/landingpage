const fs = require('fs');

// Update bba.html
let bba = fs.readFileSync('e:\\\\landingpage-main\\\\landingpage-main\\\\bba.html', 'utf8');
bba = bba.replace(
  /<label class=\"bk-program-card\">\s*<input type=\"radio\" name=\"bk-program\" value=\"MBA Standard\" \/>\s*<div class=\"bk-program-inner\">\s*<div class=\"bk-program-icon\">📘<\/div>\s*<div class=\"bk-program-name\">MBA Standard<\/div>\s*<div class=\"bk-program-desc\">Linh hoạt, tự học theo lịch<\/div>\s*<\/div>\s*<\/label>\s*<label class=\"bk-program-card\">\s*<input type=\"radio\" name=\"bk-program\" value=\"MBA High Quality\" \/>\s*<div class=\"bk-program-inner\">\s*<div class=\"bk-program-icon\">🎓<\/div>\s*<div class=\"bk-program-name\">MBA High Quality<\/div>\s*<div class=\"bk-program-desc\">Zoom trực tiếp với GV quốc tế<\/div>\s*<\/div>\s*<\/label>/,
  `<label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Top-up BBA" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">📘</div>
                                    <div class="bk-program-name">Top-up BBA</div>
                                    <div class="bk-program-desc">Cử nhân Quản trị Kinh doanh</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Chương trình Thạc sĩ" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🎓</div>
                                    <div class="bk-program-name">Chương trình Thạc sĩ</div>
                                    <div class="bk-program-desc">MBA / EMBA / MSc AI</div>
                                </div>
                            </label>`
);
fs.writeFileSync('e:\\\\landingpage-main\\\\landingpage-main\\\\bba.html', bba);

// Update mscai.html
let mscai = fs.readFileSync('e:\\\\landingpage-main\\\\landingpage-main\\\\mscai.html', 'utf8');
mscai = mscai.replace(
  /<label class=\"bk-program-card\">\s*<input type=\"radio\" name=\"bk-program\" value=\"MSc AI Standard\" \/>\s*<div class=\"bk-program-inner\">\s*<div class=\"bk-program-icon\">📘<\/div>\s*<div class=\"bk-program-name\">MSc AI Standard<\/div>\s*<div class=\"bk-program-desc\">Linh hoạt, tự học theo lịch<\/div>\s*<\/div>\s*<\/label>\s*<label class=\"bk-program-card\">\s*<input type=\"radio\" name=\"bk-program\" value=\"MSc AI High Quality\" \/>\s*<div class=\"bk-program-inner\">\s*<div class=\"bk-program-icon\">🎓<\/div>\s*<div class=\"bk-program-name\">MSc AI High Quality<\/div>\s*<div class=\"bk-program-desc\">Zoom trực tiếp với GV quốc tế<\/div>\s*<\/div>\s*<\/label>/,
  `<label class="bk-program-card">
                                <input type="radio" name="bk-program" value="MSc AI" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🤖</div>
                                    <div class="bk-program-name">MSc AI</div>
                                    <div class="bk-program-desc">Thạc sĩ Trí tuệ nhân tạo</div>
                                </div>
                            </label>
                            <label class="bk-program-card">
                                <input type="radio" name="bk-program" value="Quản trị (MBA/EMBA/BBA)" />
                                <div class="bk-program-inner">
                                    <div class="bk-program-icon">🎓</div>
                                    <div class="bk-program-name">Chương trình Quản trị</div>
                                    <div class="bk-program-desc">MBA / EMBA / BBA</div>
                                </div>
                            </label>`
);
fs.writeFileSync('e:\\\\landingpage-main\\\\landingpage-main\\\\mscai.html', mscai);
console.log('Update successful');
