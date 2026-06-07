import os
import re

dir_path = "e:/landingpage-main/landingpage-main"

# Regex pattern for address with flexible whitespaces and newlines
pattern_text = re.compile(
    r"Tầng\s+4,\s+Tòa\s+nhà\s+Hải\s+Âu,\s+39B\s+Trường\s+Sơn,\s+Phường\s+2,\s+Quận\s+Tân\s+Bình,\s*(?:\r?\n\s*)?TP\.HCM",
    re.IGNORECASE | re.UNICODE
)

replacement_text = "Tầng 4, Tòa nhà Hải Âu, 39B Trường Sơn, Phường Tân Sơn Nhất, TP.HCM"

schema_pattern = re.compile(
    r'"addressLocality":\s*"Phường\s+2,\s+Quận\s+Tân\s+Bình"',
    re.IGNORECASE | re.UNICODE
)

schema_replacement = '"addressLocality": "Phường Tân Sơn Nhất"'

for root, dirs, files in os.walk(dir_path):
    # Skip .git or .gemini directories if any
    if ".git" in root or ".gemini" in root or "node_modules" in root:
        continue
    for file in files:
        if file.endswith(".html") or file.endswith(".html.bak"):
            file_path = os.path.join(root, file)
            with open(file_path, "r", encoding="utf-8") as f:
                content = f.read()
            
            new_content = pattern_text.sub(replacement_text, content)
            new_content = schema_pattern.sub(schema_replacement, new_content)
            
            if new_content != content:
                with open(file_path, "w", encoding="utf-8") as f:
                    f.write(new_content)
                print(f"Updated: {file_path}")
