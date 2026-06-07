import os
import re

dir_path = "e:/landingpage-main/landingpage-main"

for root, dirs, files in os.walk(dir_path):
    if ".git" in root or ".gemini" in root or "node_modules" in root:
        continue
    for file in files:
        if file.endswith(".html"):
            file_path = os.path.join(root, file)
            with open(file_path, "r", encoding="utf-8") as f:
                content = f.read()
            
            # Find all <a elements where text contains "Uy tín" or "Accreditation"
            links_found = []
            for m in re.finditer(r'<a\s+[^>]*href="([^"]+)"[^>]*>(.*?)</a>', content, re.IGNORECASE | re.DOTALL):
                href = m.group(1)
                inner_html = m.group(2)
                # Check for Uy tín or Accreditation
                if "Uy tín" in inner_html or "Accreditation" in inner_html or "accred" in href:
                    links_found.append((href, inner_html.strip().replace("\n", " ")[:30]))
                    
            # Find proof section ID
            proof_section_id = "Not Found"
            proof_match = re.search(r'<section[^>]*class="[^"]*proof-section[^"]*"[^>]*id="([^"]+)"', content)
            if proof_match:
                proof_section_id = proof_match.group(1)
            
            # Print if there is a mismatch
            rel_path = os.path.relpath(file_path, dir_path)
            # Check if any link doesn't match the proof section id
            mismatches = []
            for href, text in links_found:
                if href.startswith("#") and href != f"#{proof_section_id}":
                    mismatches.append(href)
            
            if mismatches or proof_section_id != "Not Found":
                print(f"{rel_path}: ProofSecID={proof_section_id}, Links={links_found}, Mismatches={mismatches}")
