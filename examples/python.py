import requests

response = requests.get(
    "https://jobicy.com/api/v2/remote-jobs",
    params={
        "count": 10
    }
)

response.raise_for_status()

jobs = response.json()

print(f"Found {len(jobs)} jobs")
print(jobs)
