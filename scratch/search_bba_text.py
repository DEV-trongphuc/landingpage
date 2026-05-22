import re

bba_text_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\7e846789-6946-4b60-9306-7629037eeee5\scratch\bba_text.txt"
with open(bba_text_path, "r", encoding="utf-8") as f:
    text = f.read()

# Let's search for occurrences of "Statistics", "Applied", "Innovation", "Design Thinking" in the document
matches = []
for m in re.finditer(r"(Statistics Applied to Business|Innovation & Design Thinking|Design Thinking|Statistics)", text, re.IGNORECASE):
    start = max(0, m.start() - 50)
    end = min(len(text), m.end() + 50)
    matches.append(text[start:end].strip().replace('\n', ' '))

with open("e:/landingpage-main/landingpage-main/scratch/bba_subject_details.txt", "w", encoding="utf-8") as f_out:
    f_out.write("\n".join(matches))
