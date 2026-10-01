import requests

response = requests.get(
    "https://jobicy.com/api/v2/remote-jobs",
    params={
        "count": 10
    },
    timeout=30,
)

response.raise_for_status()

data = response.json()
jobs = data["jobs"]

print(f"Found {len(jobs)} jobs")
print(jobs)
print("Next cursor:", data.get("nextCursor"))
