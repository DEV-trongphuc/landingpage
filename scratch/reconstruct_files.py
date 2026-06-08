import json
import re
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

def clean_arg(val):
    if isinstance(val, str):
        if val.startswith('"') and val.endswith('"'):
            try:
                return json.loads(val)
            except Exception:
                return val[1:-1]
    return val

# Let's collect all tool calls in chronological order
all_steps = []
with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
    for line in f:
        try:
            data = json.loads(line)
            if 'step_index' in data:
                all_steps.append(data)
        except Exception:
            continue

# Sort steps chronologically
all_steps.sort(key=lambda x: x.get('step_index', 0))

file_contents = {}

for target in targets:
    print(f"\nReconstructing {target}...")
    current_content = None
    
    for step in all_steps:
        step_idx = step.get('step_index')
        # We only care about MODEL steps that contain tool calls
        if 'tool_calls' not in step:
            continue
            
        for tc in step['tool_calls']:
            name = tc.get('name')
            args = tc.get('args', {}) or {}
            
            # Check if this tool call targets our file
            target_file = clean_arg(args.get('TargetFile', ''))
            if not target_file:
                continue
            target_file = target_file.replace('\\', '/').lower()
            if target.lower() not in target_file:
                continue
                
            if name == 'write_to_file':
                code_content = clean_arg(args.get('CodeContent'))
                overwrite = args.get('Overwrite')
                if overwrite == 'true' or overwrite is True or current_content is None:
                    current_content = code_content
                    print(f"  Step {step_idx}: write_to_file (size: {len(current_content) if current_content else 0})")
                    
            elif name == 'replace_file_content':
                if current_content is None:
                    print(f"  Step {step_idx}: WARNING: replace_file_content called but current_content is None")
                    continue
                target_content = clean_arg(args.get('TargetContent', ''))
                replacement_content = clean_arg(args.get('ReplacementContent', ''))
                
                # Replace the target content
                # Make sure we handle exact matches
                if target_content in current_content:
                    current_content = current_content.replace(target_content, replacement_content, 1)
                    print(f"  Step {step_idx}: replace_file_content (success)")
                else:
                    # Let's try to normalize line endings and try again
                    cc_norm = current_content.replace('\r\n', '\n')
                    tc_norm = target_content.replace('\r\n', '\n')
                    rc_norm = replacement_content.replace('\r\n', '\n')
                    if tc_norm in cc_norm:
                        cc_norm = cc_norm.replace(tc_norm, rc_norm, 1)
                        current_content = cc_norm
                        print(f"  Step {step_idx}: replace_file_content (success with normalization)")
                    else:
                        print(f"  Step {step_idx}: ERROR: TargetContent not found in current_content!")
                        # Print target content snippet
                        print(f"    TargetContent snippet: {repr(target_content[:100])}")
                        
            elif name == 'multi_replace_file_content':
                if current_content is None:
                    print(f"  Step {step_idx}: WARNING: multi_replace_file_content called but current_content is None")
                    continue
                chunks = args.get('ReplacementChunks', [])
                if isinstance(chunks, str):
                    try:
                        chunks = json.loads(chunks)
                    except Exception:
                        pass
                print(f"  Step {step_idx}: multi_replace_file_content with {len(chunks)} chunks")
                for chunk in chunks:
                    target_content = clean_arg(chunk.get('TargetContent', ''))
                    replacement_content = clean_arg(chunk.get('ReplacementContent', ''))
                    if target_content in current_content:
                        current_content = current_content.replace(target_content, replacement_content, 1)
                    else:
                        cc_norm = current_content.replace('\r\n', '\n')
                        tc_norm = target_content.replace('\r\n', '\n')
                        rc_norm = replacement_content.replace('\r\n', '\n')
                        if tc_norm in cc_norm:
                            cc_norm = cc_norm.replace(tc_norm, rc_norm, 1)
                            current_content = cc_norm
                        else:
                            print(f"    ERROR: Chunk TargetContent not found!")
                            print(f"      TargetContent snippet: {repr(target_content[:100])}")
                            
    if current_content:
        file_contents[target] = current_content
        print(f"Reconstructed {target} successfully. Size: {len(current_content)}")
    else:
        print(f"Failed to reconstruct {target}")

# Let's write the reconstructed files to a scratch folder to verify them
os.makedirs('scratch/reconstructed', exist_ok=True)
for target, content in file_contents.items():
    with open(f'scratch/reconstructed/{target}', 'w', encoding='utf-8') as f:
        f.write(content)
print("Done writing to scratch/reconstructed/")
