import json
import os

transcript_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\08f1a347-f13b-41e2-94a5-5b5708f0bd3d\.system_generated\logs\transcript.jsonl"

targets = [
    "page-he-thong-ho-tro-hoc-tap-lms-ideas.php",
    "page-cac-khoan-chi-phi.php",
    "page-ideas-ambassador.php",
    "page-dong-su-kien.php",
    "page-history.php",
    "page-ho-tro-tai-chinh-sacombank.php",
    "page-ideas-podcast-series-01.php",
    "page-ideas-talk.php",
    "page-so-do-to-chuc.php"
]

found_versions = {t: [] for t in targets}

with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
    for line in f:
        try:
            data = json.loads(line)
            # We look for read_file or view_file tools or any mention of content
            # Let's check tool_calls and output
            # Check if target name is in the line
            for t in targets:
                if t in line:
                    found_versions[t].append(data)
        except Exception as e:
            continue

for t, entries in found_versions.items():
    print(f"File: {t} - Found {len(entries)} entries")
    # Let's see if we can find content length
