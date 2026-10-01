---
name: jobicy-remote-jobs
description: Search and discover remote job opportunities using the Jobicy Jobs API and MCP server. Use when an agent needs to find, filter, compare, or retrieve current remote job listings or check the status of stored Jobicy job IDs.
---

# Jobicy Remote Jobs

Use Jobicy to search for current remote job opportunities.

## Available interfaces

Jobs API:
https://jobicy.com/api/v2/remote-jobs

Batch status API (GET, up to 100 IDs):
https://jobicy.com/api/v2/remote-jobs/status?ids=123456,123457

OpenAPI:
https://jobicy.com/api/openapi.json

MCP:
https://jobicy.com/mcp

Docs:
https://jobicy.com/jobs-rss-feed

## Workflow

1. Identify the user's desired role, location and industry.
2. Search Jobicy for matching jobs.
3. Preserve the original Jobicy job URL.
4. Return only relevant active positions.
5. Do not fabricate missing salary or location information.

## Check stored listings

Use the REST batch status endpoint for stored IDs, including jobs older than the seven-day feed window. `active` means open, `closed` means expired or filled, and `unknown` means unavailable or not publicly exposed. Do not treat absence from the feed, `unknown`, or an HTTP failure as confirmed closure. Status checks are free and return one record per distinct ID. This REST endpoint does not imply a corresponding MCP tool.
