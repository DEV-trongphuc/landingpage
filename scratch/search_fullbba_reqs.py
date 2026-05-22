import sys

sys.stdout.reconfigure(encoding='utf-8')

filepath = r"e:\landingpage-main\landingpage-main\fullbba.html"

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

lines = content.split('\n')
for idx, line in enumerate(lines):
    if 'điều kiện' in line.lower() or 'đối tượng' in line.lower():
        print(f"Line {idx+1}: {line.strip()}")
