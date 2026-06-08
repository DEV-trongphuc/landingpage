import json

transcript_path = r"C:\Users\AD\.gemini\antigravity-ide\brain\08f1a347-f13b-41e2-94a5-5b5708f0bd3d\.system_generated\logs\transcript.jsonl"

with open(transcript_path, 'r', encoding='utf-8', errors='ignore') as f:
    for line in f:
        try:
            data = json.loads(line)
            if data.get('step_index') == 5007:
                print("Step 5007 details:")
                print(json.dumps(data, indent=2))
        except Exception as e:
            continue
