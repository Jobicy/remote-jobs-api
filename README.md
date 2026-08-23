![API](https://img.shields.io/badge/API-v2-blue)
![MCP](https://img.shields.io/badge/MCP-supported-green)
![RSS](https://img.shields.io/badge/RSS-available-orange)

# Jobicy API, MCP & RSS Feeds

Add current remote jobs to applications, websites, AI agents, newsletters, research tools, internal dashboards, and automated workflows.

- No API key or account required
- Up to 100 jobs per request
- REST API with structured JSON
- MCP server for AI assistants, agents, and IDEs
- Filtered RSS feeds
- Embeddable widget and WordPress plugin

Full documentation and live API playground: [jobicy.com/jobs-rss-feed](https://jobicy.com/jobs-rss-feed)

## Working integration examples

Looking for complete, ready-to-run examples built with the Jobicy API?

Explore [Jobicy API Examples](https://github.com/Jobicy/jobicy-api-examples) for practical integrations including Node.js, Python, Next.js, Telegram, Discord, Slack, WordPress, n8n, Zapier, Make, and AI agents using MCP.

## Quick Start

Get the latest 100 remote jobs with cURL:

```bash
curl "https://jobicy.com/api/v2/remote-jobs?count=100"
```

Get Software Engineering jobs available in the USA with JavaScript:

```javascript
const response = await fetch(
  "https://jobicy.com/api/v2/remote-jobs?count=10&geo=usa&industry=engineering"
);

if (!response.ok) {
  throw new Error(`HTTP ${response.status}`);
}

const data = await response.json();
console.log(data.jobs);
```

Get Marketing jobs available in Europe with Python:

```python
import requests

response = requests.get(
    "https://jobicy.com/api/v2/remote-jobs",
    params={"count": 10, "geo": "europe", "industry": "marketing"},
    timeout=30,
)
response.raise_for_status()

jobs = response.json()["jobs"]
print(jobs)
```

## Contents

- [Remote Jobs API](#remote-jobs-api)
  - [Endpoint](#endpoint)
  - [Query Parameters](#query-parameters)
  - [Taxonomies](#taxonomies)
  - [Response Fields](#response-fields)
  - [API Examples](#api-examples)
  - [Production Recommendations](#production-recommendations)
- [MCP Server for AI Agents](#mcp-server-for-ai-agents)
  - [MCP Endpoints](#mcp-endpoints)
  - [MCP Configuration](#mcp-configuration)
  - [Available MCP Tools](#available-mcp-tools)
  - [Recommended Agent Workflow](#recommended-agent-workflow)
  - [Example Tool Calls](#example-tool-calls)
  - [Example Prompt for an AI Agent](#example-prompt-for-an-ai-agent)
- [RSS Feed](#rss-feed)
- [Embeddable Widget](#embeddable-widget)
- [WordPress Plugin](#wordpress-plugin)
- [IFTTT Applets](#ifttt-applets)
- [Fair Use](#fair-use)
- [License](#license)

## Remote Jobs API

The public Jobs API returns the latest remote listings available on [Jobicy](https://jobicy.com). It can be used for job discovery products, career tools, community websites, newsletters, research, internal applications, and prototypes.

### Endpoint

```http
GET https://jobicy.com/api/v2/remote-jobs
```

Authentication is not required.

### Query Parameters

All filters are optional and can be combined.

| Parameter | Type | Description |
| --- | --- | --- |
| `count` | integer | Number of jobs to return. Default: `100`; accepted range: `1–100`. |
| `geo` | string | Geographic eligibility slug, such as `usa`, `europe`, `apac`, or `anywhere`. |
| `industry` | string | Job category slug, such as `engineering`, `marketing`, or `data-science`. |
| `tag` | string | Keyword search across available job content. Accepted length: `3–50` characters. |

Example:

```text
https://jobicy.com/api/v2/remote-jobs?count=20&geo=usa&industry=marketing&tag=seo
```

### Taxonomies

Retrieve the current filter values before storing location or category slugs in a production integration:

```text
https://jobicy.com/api/v2/remote-jobs?get=locations
https://jobicy.com/api/v2/remote-jobs?get=industries
```

Use the returned `geoSlug` and `industrySlug` values instead of maintaining hardcoded taxonomy lists. Available locations and industries can change as Jobicy expands its coverage.

The following deprecated category slugs remain supported for backward compatibility:

| Deprecated slug | Current slug |
| --- | --- |
| `dev` | `engineering` |
| `e-commerce` | `management` |
| `video-audio-production` | `design-multimedia` |
| `translation-localization` | `copywriting` |
| `smm` | `marketing` |

### Response Fields

The response contains a `jobs` array. Each job can contain the following fields:

| Field | Type | Description |
| --- | --- | --- |
| `id` | integer | Unique Jobicy job ID. |
| `url` | string | Canonical Jobicy job URL. |
| `jobSlug` | string | Job identifier and URL slug. |
| `jobTitle` | string | Job title. |
| `companyName` | string | Company name. |
| `companyLogo` | string | Company logo URL when available. |
| `jobIndustry` | array | Job category names. |
| `jobType` | array | Employment types, such as `full-time`, `contract`, `part-time`, or `internship`. |
| `jobGeo` | string | Geographic employment restriction, or `Anywhere` when no region is specified. |
| `jobLevel` | string | Seniority level, or `Any` when no level is specified. |
| `jobExcerpt` | string | Job description excerpt of up to 55 words. |
| `jobDescription` | HTML string | Full job description in HTML. |
| `pubDate` | date-time | Publication date and time in ISO 8601 format. |
| `salaryMin` | number | Minimum salary when available. |
| `salaryMax` | number | Maximum salary when available. |
| `salaryCurrency` | string | ISO 4217 salary currency code when available. |
| `salaryPeriod` | string | Salary interval, such as `hourly`, `monthly`, or `yearly`, when available. |

Example job object:

```json
{
  "id": 123456,
  "url": "https://jobicy.com/jobs/example-role",
  "jobSlug": "example-role",
  "jobTitle": "Senior Product Designer",
  "companyName": "Example Company",
  "companyLogo": "https://example.com/logo.png",
  "jobIndustry": ["Creative & Design"],
  "jobType": ["full-time"],
  "jobGeo": "Anywhere",
  "jobLevel": "Senior",
  "jobExcerpt": "A short summary of the role and its main responsibilities.",
  "jobDescription": "<p>Complete HTML job description</p>",
  "pubDate": "2026-07-30T12:00:00+00:00",
  "salaryMin": 90000,
  "salaryMax": 125000,
  "salaryCurrency": "USD",
  "salaryPeriod": "yearly"
}
```

Optional fields can be absent or empty when an employer has not supplied the corresponding information.

### API Examples

Latest 20 jobs mentioning Python:

```text
https://jobicy.com/api/v2/remote-jobs?count=20&tag=python
```

Latest 15 jobs available in Canada:

```text
https://jobicy.com/api/v2/remote-jobs?count=15&geo=canada
```

Latest 30 Content & Editorial jobs available in the USA:

```text
https://jobicy.com/api/v2/remote-jobs?count=30&geo=usa&industry=copywriting
```

Latest 10 Customer Support & Success jobs:

```text
https://jobicy.com/api/v2/remote-jobs?count=10&industry=supporting
```

Latest 10 jobs explicitly available anywhere:

```text
https://jobicy.com/api/v2/remote-jobs?count=10&geo=anywhere
```

### Production Recommendations

- Check the HTTP status before parsing the response.
- Discover current filter slugs through the taxonomy endpoints.
- Treat salary and other optional fields as nullable.
- Treat `jobDescription` as HTML and sanitize it according to the security rules of your application before rendering it.
- Preserve the canonical Jobicy `url` when displaying or referencing a listing.
- Cache responses where appropriate and avoid unnecessary repeated requests.
- Handle an empty `jobs` array as a valid response and allow users to broaden their filters.
- Do not schedule automated polling more frequently than once per hour.

## MCP Server for AI Agents

The public Jobicy MCP server allows compatible AI assistants, autonomous agents, IDEs, and other MCP clients to discover valid filters and retrieve current remote job listings as structured tool results.

The recommended agent behavior is to discover valid taxonomy values first and then call `get_jobs` with only the filters required by the user.

### MCP Endpoints

Primary endpoint:

```text
https://jobicy.com/mcp
```

Discovery document:

```text
https://jobicy.com/.well-known/mcp.json
```

Legacy SSE endpoint:

```text
https://jobicy.com/mcp/sse
```

Use the primary endpoint for new integrations. The legacy SSE endpoint is provided for older clients that do not support the primary remote MCP transport.

### MCP Configuration

Many MCP clients accept a configuration similar to the following:

```json
{
  "mcpServers": {
    "jobicy-jobs": {
      "url": "https://jobicy.com/mcp"
    }
  }
}
```

The exact configuration location and property names can vary by client. Authentication credentials are not required for the public Jobicy MCP endpoint.

### Available MCP Tools

#### `get_jobs`

Returns current remote job listings.

| Parameter | Type | Required | Description |
| --- | --- | --- | --- |
| `count` | number | No | Number of listings to return. Range: `1–100`; default: `100`. |
| `geo` | string | No | Geographic region slug, such as `europe`, `usa`, `apac`, or `anywhere`. |
| `industry` | string | No | Job category slug, such as `engineering`, `marketing`, or `seo`. |
| `tag` | string | No | Keyword search across available job content. |

#### `get_taxonomies`

Returns current location or category values that can be used with `get_jobs`.

| Parameter | Type | Required | Description |
| --- | --- | --- | --- |
| `type` | string | Yes | Must be either `locations` or `industries`. |

### Recommended Agent Workflow

1. Interpret the user's requested role, skills, and geographic eligibility.
2. Call `get_taxonomies` with `type: "industries"` when an industry filter is needed.
3. Call `get_taxonomies` with `type: "locations"` when a geographic filter is needed.
4. Select exact returned slugs instead of inventing or guessing filter values.
5. Call `get_jobs` with the smallest useful `count` and only the required filters.
6. Present the job title, company, eligibility, employment type, salary when available, and canonical Jobicy URL.
7. If no jobs match, explain which filters were used and ask before broadening or removing a material constraint.

### Example Tool Calls

MCP clients display and transmit tool calls differently. The following examples show the intended tool names and arguments.

Discover valid industries:

```json
{
  "name": "get_taxonomies",
  "arguments": {
    "type": "industries"
  }
}
```

Discover valid locations:

```json
{
  "name": "get_taxonomies",
  "arguments": {
    "type": "locations"
  }
}
```

Find up to 10 Python engineering jobs available in Europe:

```json
{
  "name": "get_jobs",
  "arguments": {
    "count": 10,
    "geo": "europe",
    "industry": "engineering",
    "tag": "python"
  }
}
```

Find up to 5 SEO jobs without restricting the location:

```json
{
  "name": "get_jobs",
  "arguments": {
    "count": 5,
    "industry": "seo"
  }
}
```

### Example Prompt for an AI Agent

```text
Use the Jobicy MCP server to find up to 10 current remote Software Engineering jobs available to applicants in Europe that mention Python. Query the Jobicy taxonomy tools before applying filters. Return the title, company, location eligibility, employment type, salary when available, publication date, and canonical Jobicy link. Do not invent missing salary information or broaden the location restriction without asking me.
```

Recommended reusable agent instruction:

```text
When searching Jobicy, use get_taxonomies to discover valid location and industry slugs before calling get_jobs. Preserve the canonical Jobicy URL, distinguish missing values from confirmed values, sanitize HTML before rendering jobDescription, and state which filters were applied. If no results match, ask before removing a user constraint.
```

## RSS Feed

Jobicy provides a public RSS feed for readers, publishing workflows, and automation services that do not require a JSON integration.

### Feed URLs

Canonical feed for new integrations:

```text
https://jobicy.com/jobs/feed
```

Legacy feed retained for compatibility:

```text
https://jobicy.com/feed/job_feed
```

### RSS Parameters

The preferred RSS parameters match the REST API. Legacy parameter names remain supported.

| Preferred parameter | Legacy parameter | Description |
| --- | --- | --- |
| `industry` | `job_categories` | Category slug or comma-separated category slugs. |
| `type` | `job_types` | Employment type, such as `full-time`, `freelance`, `contract`, or `part-time`. |
| `tag` | `search_keywords` | Keyword search. |
| `geo` | `search_region` | Geographic eligibility slug. |

Retrieve current category and location slugs from:

```text
https://jobicy.com/api/v2/remote-jobs?get=industries
https://jobicy.com/api/v2/remote-jobs?get=locations
```

Example using the preferred parameters:

```text
https://jobicy.com/jobs/feed?industry=supporting&type=full-time&geo=usa
```

Output: Full-time Customer Support & Success jobs available in the USA.

Automated polling must not run more frequently than once per hour; a few checks per day are normally sufficient.

## Embeddable Widget

Add a live remote jobs search interface to a website without building an API client.

```html
<div id="jobicy-widget"></div>
<script>
window.jobicyWidgetConfig = {
  query: "Developer",
  theme: "light",
  autoSearch: true,
  limit: 10
};
</script>
<script src="https://jobicy.com/api/prod/wg.js"></script>
```

### Widget Options

| Option | Type | Description |
| --- | --- | --- |
| `query` | string | Default search term. |
| `theme` | string | Widget color theme: `light` or `dark`. |
| `autoSearch` | boolean | Whether to search automatically on load. |
| `limit` | integer | Number of jobs to display. Range: `1–100`. |

## WordPress Plugin

Use the official [Jobicy WordPress plugin](https://wordpress.org/plugins/jobicy/) to display current remote jobs on a WordPress website.

```text
[jobicy_jobs]
```

## IFTTT Applets

Jobicy applets can automatically publish new remote jobs to:

- LinkedIn
- X
- Facebook
- Telegram
- Slack
- Discord
- WordPress

Browse available applets: [ifttt.com/job](https://ifttt.com/job)

## Fair Use

The Jobicy API, MCP server, and RSS feeds are designed for websites, applications, newsletters, research tools, AI products, job boards, internal applications, and other services that help users discover remote work opportunities.

1. You may use Jobicy listings in your own products and user experiences without requesting individual permission.
2. Keep Jobicy as the original source and preserve the canonical Jobicy job URL when displaying a listing.
3. You may create your own interfaces, summaries, categories, search experiences, and additional context around listings.
4. Do not present Jobicy listings as your own original job postings or remove source attribution.
5. Cache responses where appropriate and do not run automated polling more frequently than once per hour.
6. Do not use Jobicy data to create spam networks, misleading job databases, or services that negatively affect employers, candidates, or platform stability.
7. Excessive requests, intentional overloading, content misrepresentation, or abusive activity may result in restricted access.

Normal integrations do not require a separate agreement. Contact Jobicy for high-volume commercial partnerships or custom data arrangements.

## License

The code and examples in this repository are available under the [MIT License](LICENSE).

The MIT License applies to the repository code and examples. It does not transfer ownership of Jobicy job listings, employer content, logos, or other third-party data. Use of data returned by Jobicy services remains subject to the [Fair Use](#fair-use) rules above.

## Why Jobicy?

- Curated remote jobs
- Worldwide coverage
- Structured JSON
- MCP support for AI agents
- Filtered RSS feeds
- Free public access
- No API key required

[![MCP Badge](https://lobehub.com/badge/mcp/jobicy-remote-jobs-api?style=plastic)](https://lobehub.com/mcp/jobicy-remote-jobs-api)
[![smithery badge](https://smithery.ai/badge/nycreatis/remote)](https://smithery.ai/servers/nycreatis/remote)
