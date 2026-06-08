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

# We want to find the latest valid full content for each file.
# Let's inspect the history of operations for each file.

for target in targets:
    print(f"\n=================== Operations for {target} ===================")
    ops = []
    with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
        for line in f:
            if target.lower() in line.lower():
                try:
                    data = json.loads(line)
                except Exception:
                    continue
                
                step_idx = data.get('step_index')
                stype = data.get('type')
                
                # Check tool calls
                if 'tool_calls' in data:
                    for tc in data['tool_calls']:
                        args = tc.get('args', {}) or {}
                        # Normalize target file in args
                        tf = args.get('TargetFile', '').replace('\\', '/').lower()
                        if target.lower() in tf:
                            ops.append({
                                'step': step_idx,
                                'type': 'tool_call',
                                'name': tc.get('name'),
                                'args': args
                            })
                
                # Check tool outputs
                if stype == 'VIEW_FILE' and 'content' in data and data['content']:
                    # Ensure it is actually this file being viewed
                    if target.lower() in data['content'].lower():
                        ops.append({
                            'step': step_idx,
                            'type': 'view_file_output',
                            'len': len(data['content']),
                            'content': data['content']
                        })
                elif stype == 'WRITE_TO_FILE' and 'content' in data and data['content']:
                    if target.lower() in data['content'].lower():
                        ops.append({
                            'step': step_idx,
                            'type': 'write_to_file_output',
                            'content': data['content']
                        })
                elif stype == 'REPLACE_FILE_CONTENT' and 'content' in data and data['content']:
                    if target.lower() in data['content'].lower():
                        ops.append({
                            'step': step_idx,
                            'type': 'replace_file_content_output',
                            'content': data['content']
                        })
    
    # Let's print summary of ops
    for op in ops[:40]: # limit to first 40 to avoid long output
        if op['type'] == 'tool_call':
            print(f"  Step {op['step']}: Tool Call {op['name']} (args keys: {list(op['args'].keys())})")
        elif op['type'] == 'view_file_output':
            # print first line of content
            first_line = op['content'].split('\n')[0] if op['content'] else ''
            print(f"  Step {op['step']}: View File Output (len: {op['len']}) - {first_line[:80]}")
        else:
            print(f"  Step {op['step']}: {op['type']}")
    if len(ops) > 40:
        print(f"  ... and {len(ops) - 40} more operations")
