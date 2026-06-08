import json

transcript_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\08f1a347-f13b-41e2-94a5-5b5708f0bd3d\.system_generated\logs\transcript.jsonl"

count = 0
with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
    for line in f:
        try:
            data = json.loads(line)
            if data.get('step_index') in [8, 9]:
                print(f"Step {data.get('step_index')}, Type: {data.get('type')}, Status: {data.get('status')}")
                if 'content' in data:
                    print("Content length:", len(data['content']) if data['content'] else 0)
                    if data['content']:
                        print("Content snippet:", data['content'][:150])
                if 'tool_calls' in data:
                    print("Tool calls:", [tc.get('name') for tc in data['tool_calls']])
        except Exception as e:
            continue

