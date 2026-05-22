import sys

sys.stdout.reconfigure(encoding='utf-8')

filepath = r"e:\landingpage-main\landingpage-main\mbainai.html"

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

lines = content.split('\n')
for idx in range(4950, min(len(lines), 5150)):
    print(f"{idx+1}: {lines[idx]}")
