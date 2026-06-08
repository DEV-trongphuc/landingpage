import json
import re

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

candidates = {t: [] for t in targets}

with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
    for line_idx, line in enumerate(f):
        try:
            data = json.loads(line)
        except Exception:
            continue
            
        step_idx = data.get('step_index', 0)
        stype = data.get('type')
        
        # 1. Check tool calls in MODEL responses (e.g. write_to_file)
        if 'tool_calls' in data:
            for tc in data['tool_calls']:
                args = tc.get('args', {})
                if not args:
                    continue
                # target file path could be in TargetFile
                target_file = args.get('TargetFile', '')
                # normalize path separators
                target_file = target_file.replace('\\', '/').lower()
                for t in targets:
                    if t.lower() in target_file:
                        code_content = args.get('CodeContent')
                        if code_content:
                            # Strip outer quotes if any
                            if code_content.startswith('"') and code_content.endswith('"'):
                                # Unescape it properly
                                try:
                                    code_content = json.loads(code_content)
                                except Exception:
                                    pass
                            candidates[t].append({
                                'step_idx': step_idx,
                                'source': 'tool_call_write',
                                'content': code_content,
                                'len': len(code_content)
                            })
                            
        # 2. Check VIEW_FILE step contents
        if stype == 'VIEW_FILE' and 'content' in data and data['content']:
            content = data['content']
            # Find which target file this is
            for t in targets:
                if t.lower() in content.lower():
                    # Extract contents. Typically VIEW_FILE output starts with header lines
                    # like "File Path: ...\nTotal Lines: ...\nShowing lines ... to ...\n..."
                    # Or similar format. Let's see if we can isolate the content.
                    # Let's save the whole raw content first.
                    candidates[t].append({
                        'step_idx': step_idx,
                        'source': 'view_file_output',
                        'content': content,
                        'len': len(content)
                    })

for t, list_cand in candidates.items():
    print(f"\n=================== File: {t} ===================")
    print(f"Found {len(list_cand)} candidates:")
    # sort by step_idx
    list_cand.sort(key=lambda x: x['step_idx'])
    for i, c in enumerate(list_cand):
        print(f"  [{i}] Step: {c['step_idx']}, Source: {c['source']}, Length: {c['len']}, Snippet: {repr(c['content'][:100])}")
