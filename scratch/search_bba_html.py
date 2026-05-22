import re

with open("e:/landingpage-main/landingpage-main/bba.html", "r", encoding="utf-8") as f:
    text = f.read()

matches = re.findall(r'<ul class="curri-subjects">.*?</ul>', text, re.DOTALL)
out = [f"Matches in bba.html: {len(matches)}"]
for i, m in enumerate(matches):
    out.append(f"Match {i}: {m}")

with open("e:/landingpage-main/landingpage-main/scratch/search_bba_html_results.txt", "w", encoding="utf-8") as f_out:
    f_out.write("\n".join(out))
