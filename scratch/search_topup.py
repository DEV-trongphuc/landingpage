import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

filepath = r"e:\landingpage-main\landingpage-main\fullbba.html"

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

lines = content.split('\n')
out = []

print("Searching for 'Top-up' in fullbba.html...")
for idx, line in enumerate(lines):
    if 'top-up' in line.lower():
        print(f"Line {idx+1}: {line.strip()}")
