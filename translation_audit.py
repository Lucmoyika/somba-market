import re
from pathlib import Path

root = Path('resources/views')
regex = re.compile(r'>([^<>{}][^<>{}]*)<')
texts = {}
for path in sorted(root.rglob('*.blade.php')):
    text = path.read_text(encoding='utf-8')
    lines = []
    for m in regex.finditer(text):
        s = m.group(1).strip()
        if not s:
            continue
        if '{{' in s or '}}' in s or '@' in s:
            continue
        if re.search(r'^\s*$', s):
            continue
        if re.search(r'^(https?://|#|\{|\}|\$|\(|\)|\[|\]|<|>)', s):
            continue
        if re.match(r'^[0-9\W]+$', s):
            continue
        if 'aria-label' in s or 'class=' in s or 'placeholder=' in s:
            continue
        lines.append(s)
    if lines:
        texts[str(path)] = sorted(set(lines))
print(texts)
