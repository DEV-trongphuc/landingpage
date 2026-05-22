import re

with open("e:/landingpage-main/landingpage-main/fullbba.html", "r", encoding="utf-8") as f:
    text = f.read()

# Search for scholarship section or tuition table
keywords = ["học bổng", "học phí", "CHÍNH SÁCH", "8.050", "8,050", "5.150", "2.900", "Lệ phí hồ sơ"]
out_lines = []
for word in keywords:
    matches = [m.start() for m in re.finditer(re.escape(word), text, re.IGNORECASE)]
    if matches:
        out_lines.append(f"Found '{word}': {len(matches)} times")
        for pos in matches[:3]:  # print first 3 matches
            line_no = text[:pos].count('\n') + 1
            line_start = text.rfind('\n', 0, pos) + 1
            line_end = text.find('\n', pos)
            if line_end == -1:
                line_end = len(text)
            out_lines.append(f"  Line {line_no}: {text[line_start:line_end].strip()}")

with open("e:/landingpage-main/landingpage-main/scratch/search_tuition_results.txt", "w", encoding="utf-8") as f:
    f.write("\n".join(out_lines))
