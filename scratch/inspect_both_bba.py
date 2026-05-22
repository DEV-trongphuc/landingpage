import re
import sys

sys.stdout.reconfigure(encoding='utf-8')

with open(r"e:\landingpage-main\landingpage-main\bba.html", 'r', encoding='utf-8') as f:
    bba_content = f.read()

bba_lines = bba_content.split('\n')
print("=== BBA.HTML TITLE AND TOP-UP SEARCH ===")
for idx, line in enumerate(bba_lines[:50]):
    if '<title>' in line:
        print(f"BBA Title: {line.strip()}")
        break

topups = [line.strip() for line in bba_lines if 'top-up' in line.lower()]
print(f"BBA.HTML has {len(topups)} 'Top-up' references. First 5:")
for t in topups[:5]:
    print(f"- {t}")

with open(r"e:\landingpage-main\landingpage-main\fullbba.html", 'r', encoding='utf-8') as f:
    fullbba_content = f.read()

fullbba_lines = fullbba_content.split('\n')
print("\n=== FULLBBA.HTML TITLE AND TOP-UP SEARCH ===")
for idx, line in enumerate(fullbba_lines[:50]):
    if '<title>' in line:
        print(f"FullBBA Title: {line.strip()}")
        break
