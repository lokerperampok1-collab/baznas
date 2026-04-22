import re
import json
import os

file_path = r'C:\Users\mantap123\Downloads\donatur.txt'
output_path = r'e:\baznas\kurban-app\database\seeders\donors.json'

with open(file_path, 'r', encoding='utf-8') as f:
    content = f.read()

# Regular expression to match the donor blocks
# We'll look for blocks of donatur-info-bar
# Capture name, date, amount, and comment
pattern = re.compile(r'<div class="donatur-info-bar margin-bottom-20">.*?<p class="small-title-600">\s*(.*?)\s*</p>.*?<p class="small-label-grey-14">(.*?)</p>.*?<p class="blue-title-600 padding-top-12">Rp (.*?)</p>.*?<p style="padding: 0;margin: 0;">(.*?)</p>', re.DOTALL)

donors = []
for match in pattern.finditer(content):
    name = match.group(1).strip()
    # Normalize "Hamba Allah" or other common labels if needed, but here we keep them as is
    date = match.group(2).strip()
    amount_str = match.group(3).replace('.', '').strip()
    comment = match.group(4).strip()
    
    # Clean up comment if it has HTML entities
    comment = comment.replace('&amp;', '&').replace('&quot;', '"').replace('&#039;', "'")
    
    donors.append({
        'name': name,
        'date': date,
        'amount': int(amount_str),
        'comment': comment if comment else None
    })

# Write to JSON file
with open(output_path, 'w', encoding='utf-8') as f:
    json.dump(donors, f, indent=2)

print(f"Successfully extracted {len(donors)} donors to {output_path}")
