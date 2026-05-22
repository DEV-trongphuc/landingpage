import sys

sys.stdout.reconfigure(encoding='utf-8')

filepath = r"e:\landingpage-main\landingpage-main\fullbba.html"

with open(filepath, 'r', encoding='utf-8') as f:
    content = f.read()

lines = content.split('\n')
out = []

out.append("=== DETAILED INSPECTION OF fullbba.html ===")

# Let's find curriculum area
for idx, line in enumerate(lines):
    if 'id="chuong-trinh"' in line or 'class="curriculum-section"' in line:
        out.append(f"\n--- Curriculum Section (line {idx+1}) ---")
        for j in range(max(0, idx-5), min(len(lines), idx+150)):
            out.append(f"{j+1}: {lines[j]}")
        break

# Let's find fee area (e.g. searching for 'id="hoc-phi"' or similar sections)
for idx, line in enumerate(lines):
    if 'id="hoc-phi"' in line or 'class="fee-section"' in line or 'class="tuition-section"' in line:
        out.append(f"\n--- Fee Section (line {idx+1}) ---")
        for j in range(max(0, idx-5), min(len(lines), idx+150)):
            out.append(f"{j+1}: {lines[j]}")
        break

# If fee section wasn't found by id, let's search for "Học phí" and "CHF"
if not any("--- Fee Section" in l for l in out):
    for idx, line in enumerate(lines):
        if 'Học phí' in line and ('CHF' in line or 'đóng' in line):
            out.append(f"\n--- Fee Mention (line {idx+1}) ---")
            for j in range(max(0, idx-5), min(len(lines), idx+50)):
                out.append(f"{j+1}: {lines[j]}")
            break

# Write to file
with open(r"e:\landingpage-main\landingpage-main\scratch\fullbba_inspection.txt", "w", encoding="utf-8") as f:
    f.write("\n".join(out))
print("Inspection complete.")
