import re
import sys
import requests

ids = [value.strip() for argument in sys.argv[1:] for value in argument.split(",")]
if not 1 <= len(ids) <= 100:
    raise SystemExit("Usage: python examples/status.py ID[,ID...] (1–100 IDs)")
if any(not re.fullmatch(r"[1-9][0-9]{0,15}", value) or int(value) > 9007199254740991 for value in ids):
    raise SystemExit("Invalid job ID")
response = requests.get(
    "https://jobicy.com/api/v2/remote-jobs/status",
    params={"ids": ",".join(ids)},
    timeout=30,
)
response.raise_for_status()
data = response.json()
if data.get("success") is not True or not isinstance(data.get("jobs"), list):
    raise ValueError("Invalid status response")
for item in data["jobs"]:
    if item.get("status") not in ("active", "closed", "unknown"):
        raise ValueError("Invalid job status")
    print(f"{item['id']}: {item['status']}")
