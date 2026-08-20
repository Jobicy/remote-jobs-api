![API](https://img.shields.io/badge/API-v2-blue)
![MCP](https://img.shields.io/badge/MCP-supported-green)
![RSS](https://img.shields.io/badge/RSS-available-orange)
[![MCP Badge](https://lobehub.com/badge/mcp/jobicy-remote-jobs-api?style=plastic)](https://lobehub.com/mcp/jobicy-remote-jobs-api)

# Jobicy API, MCP & RSS Feeds

The public Jobs API returns the latest remote listings available on [Jobicy](https://jobicy.com). Use it for job discovery products, research tools, community websites, internal dashboards, and prototypes.

## Quick Start

Get the latest 10 remote jobs:

```bash
curl "https://jobicy.com/api/v2/remote-jobs?count=10"
```

Get Sales jobs from the USA:

```bash
curl "https://jobicy.com/api/v2/remote-jobs?count=10&geo=usa&industry=seller"
```

## Contents

- [Remote Jobs API](#remote-jobs-api)
  - [Query Parameters](#query-parameters)
  - [Taxonomies](#taxonomies)
  - [Response Fields](#response-fields)
  - [API Examples](#api-examples)
- [MCP Server](#mcp-server)
  - [Available Tools](#available-tools)
  - [MCP Configuration Example](#mcp-configuration-example)
- [RSS Feed](#rss-feed)
- [Embeddable Widget](#embeddable-widget)
- [WordPress Plugin](#wordpress-plugin)
- [IFTTT Applets](#ifttt-applets)
- [Fair Use and Restrictions](#fair-use-and-restrictions)

Looking to enhance your job board, application, AI agent, or website with high-quality remote job opportunities?

Jobicy provides remote job data through:

- REST API
- MCP Server for AI agents and IDEs
- RSS Feed
- Embeddable Widget
- WordPress Plugin

## [Remote Jobs API](https://jobicy.com/api/v2/remote-jobs)

**Endpoint**

```http
GET https://jobicy.com/api/v2/remote-jobs
```

The API provides access to the latest remote job listings from distributed companies across multiple job categories and regions.

### Query Parameters

| Parameter | Description |
| --- | --- |
| `count` | Number of listings to return. Default: `100`; range: `1–100`. |
| [`geo`](https://jobicy.com/api/v2/remote-jobs?get=locations) | Filter by geographic region slug. Omit to search all regions. |
| [`industry`](https://jobicy.com/api/v2/remote-jobs?get=industries) | Filter by job category slug. Omit to search all categories. |
| `tag` | Search job titles and descriptions. Length: `3–50` characters. |

Example:

```text
https://jobicy.com/api/v2/remote-jobs?count=20&geo=usa&industry=marketing&tag=seo
```

### Taxonomies

Retrieve the currently available filter values:

```text
https://jobicy.com/api/v2/remote-jobs?get=locations
https://jobicy.com/api/v2/remote-jobs?get=industries
```

Clients should use the returned `geoSlug` and `industrySlug` values instead of maintaining hardcoded taxonomy lists.

The following deprecated category slugs remain supported for backward compatibility:

| Deprecated slug | Current slug |
| --- | --- |
| `dev` | `engineering` |
| `e-commerce` | `management` |
| `video-audio-production` | `design-multimedia` |
| `translation-localization` | `copywriting` |
| `smm` | `marketing` |

### Response Fields

Each item in the `jobs` array can contain:

| Field | Description |
| --- | --- |
| `id` | Unique Jobicy job ID. |
| `url` | Original Jobicy job URL. |
| `jobSlug` | Job identifier and URL slug. |
| `jobTitle` | Job title. |
| `companyName` | Company name. |
| `companyLogo` | Company logo URL. |
| `jobIndustry` | Array of job category names. |
| `jobType` | Array of employment types, such as Full-Time, Contract, Part-Time, or Internship. |
| `jobGeo` | Geographic employment restriction, or `Anywhere` when no region is specified. |
| `jobLevel` | Seniority level, or `Any` when no level is specified. |
| `jobExcerpt` | Job description excerpt of up to 55 words. |
| `jobDescription` | Full job description in HTML. |
| `pubDate` | Publication date and time in ISO 8601 format. |
| `salaryMin` | Minimum salary, when available. |
| `salaryMax` | Maximum salary, when available. |
| `salaryCurrency` | ISO 4217 salary currency code, when available. |
| `salaryPeriod` | Salary period, such as hourly, monthly, or yearly, when available. |

### API Examples

Latest 20 Python jobs:

```text
https://jobicy.com/api/v2/remote-jobs?count=20&tag=python
```

Latest 15 jobs from Canada:

```text
https://jobicy.com/api/v2/remote-jobs?count=15&geo=canada
```

Latest 30 Content & Editorial jobs from the USA:

```text
https://jobicy.com/api/v2/remote-jobs?count=30&geo=usa&industry=copywriting
```

Latest 10 Customer Support & Success jobs:

```text
https://jobicy.com/api/v2/remote-jobs?count=10&industry=supporting
```

---

## MCP Server

The Jobicy MCP server allows AI assistants, IDEs, and autonomous agents to access Jobicy job listings in real time.

### MCP Endpoint

```text
MCP Endpoint:
https://jobicy.com/mcp
Discovery:
https://jobicy.com/.well-known/mcp.json
Legacy SSE:
https://jobicy.com/mcp/sse
```

### Available Tools

#### `get_jobs`

Returns remote job listings.

Parameters:

```text
count (number, optional) - Number of listings to return (range: 1-100, default: 100)
geo (string, optional) - Filter by geographic region slug (e.g., "europe", "usa", "apac")
industry (string, optional) - Filter by job category slug (e.g., "engineering", "marketing", "seo")
tag (string, optional) - Search keyword for job titles and descriptions
```

#### `get_taxonomies`

Returns available filtering values.

Parameters:

```text
type (string, required) - Must be either "locations" or "industries"
```

AI clients should query `get_taxonomies` first to discover valid `geoSlug` and `industrySlug` values before filtering jobs.

### MCP Configuration Example

```json
{
  "mcpServers": {
    "jobicy-jobs": {
      "url": "https://jobicy.com/mcp"
    }
  }
}
```

---

## RSS Feed

Jobicy provides a public RSS feed containing remote job listings.

### Feed URLs

Canonical feed:

```text
https://jobicy.com/jobs/feed
```

Legacy feed URL:

```text
https://jobicy.com/feed/job_feed
```

### RSS Parameters

The preferred RSS parameters match the REST API. Legacy parameter names remain supported.

| Preferred parameter | Legacy parameter | Description |
| --- | --- | --- |
| `industry` | `job_categories` | Job category slug or comma-separated category slugs. |
| `type` | `job_types` | Employment type, such as `full-time`, `freelance`, `contract`, or `part-time`. |
| `tag` | `search_keywords` | Keyword search. |
| `geo` | `search_region` | Geographic region slug. |

Available canonical category slugs:

```text
admin-support, copywriting, supporting, technical-support, cybersecurity, data-science, design-multimedia, web-app-design, admin, education, accounting-finance, healthcare, hr, legal, marketing, business, seller, seo, management, project-management, engineering, qa-testing
```

Available employment types:

```text
full-time, freelance, contract, part-time
```

Common region slugs:

```text
apac, emea, latam, argentina, australia, austria, belgium, brazil, bulgaria, canada, china, hong-kong, costa-rica, croatia, cyprus, czechia, denmark, estonia, europe, finland, france, germany, greece, hungary, ireland, israel, italy, japan, latvia, lithuania, mexico, netherlands, new-zealand, norway, philippines, poland, portugal, romania, serbia, singapore, slovakia, slovenia, south-korea, spain, sweden, switzerland, thailand, turkiye, united-arab-emirates, uk, ukraine, usa, vietnam
```

Example using the preferred parameters:

```text
https://jobicy.com/jobs/feed?industry=supporting&type=full-time&geo=usa
```

Example using the legacy parameters:

```text
https://jobicy.com/feed/job_feed?job_categories=supporting&job_types=full-time&search_region=usa
```

Both examples return full-time Customer Support & Success jobs available in the USA.

---

## Embeddable Widget

Add a live remote jobs widget to any website.

```html
<div id="jobicy-widget"></div>
<script>
window.jobicyWidgetConfig = {
  query: 'Developer',
  theme: 'light',
  autoSearch: true,
  limit: 10
};
</script>
<script src="https://jobicy.com/api/prod/wg.js"></script>
```

### Widget Options

| Option | Description |
| --- | --- |
| `query` | Default search term. |
| `theme` | Widget color theme: `light` or `dark`. |
| `autoSearch` | Whether to search automatically on load. |
| `limit` | Number of jobs to display (`1–100`). |

---

## WordPress Plugin

Use the official [WordPress plugin](https://wordpress.org/plugins/jobicy/) to display Jobicy remote jobs on your website.

Shortcode:

```text
[jobicy_jobs]
```

Plugin URL:

```text
https://wordpress.org/plugins/jobicy/
```

---

## IFTTT Applets

Automatically publish new remote jobs to:

- LinkedIn
- Twitter/X
- Facebook
- Telegram
- Slack
- Discord
- WordPress

Browse available applets: [https://ifttt.com/job](https://ifttt.com/job)

---

## Fair Use and Restrictions

1. API, RSS, and MCP access are provided to help distribute Jobicy job listings.
2. Do not redistribute listings to competing job aggregation platforms such as Google Jobs, LinkedIn, Jooble, and similar services.
3. Job listings are intentionally published with a 3-hour delay.
4. Polling feeds more than once per hour is discouraged.
5. Excessive requests may result in restricted access.

Access may be restricted if:

- You intentionally overload the service.
- You modify or misrepresent the original content.
- Your activity negatively impacts platform stability.

---

## Why Jobicy?

- Curated remote jobs
- Worldwide coverage
- REST API
- MCP support
- RSS feeds
- Free public access
