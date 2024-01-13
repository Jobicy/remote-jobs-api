<div class="rich-text no-hover-links">

Looking to fill a remote job feed and want to use openings listed on Jobicy?

No problem! Our public API/RSS feeds can help you with that. Anyone can use the feed, all we ask is that you attribute the links back to Jobicy.com.

## [Remote Jobs API Feed](https://jobicy.com/api/v2/remote-jobs)

This API provides access to the latest 50 remote job listings from a diverse range of industries and companies. It’s a valuable resource for developers looking to integrate remote job data into their applications, websites, or research projects. Please read the guidelines and instructions below to understand how to effectively use the API.

To retrieve the latest 50 remote job listings, use the following API call:

<pre>GET https://jobicy.com/api/v2/remote-jobs</pre>

<pre>Query Parameters (optional):
  count - Number of listings to return (default: 50, range: 1-50)  
  geo - Filter by job region (default: all regions) 
  sector - Filter by job category (default: all categories)
  tag - Search by job title and description (default: all jobs)
  
Eg: https://jobicy.com/api/v2/remote-jobs?count=20&amp;geo=usa&amp;sector=marketing&amp;tag=seo</pre>

Predefined query parameters: [geo](https://jobicy.com/api/v2/remote-jobs?get=locations) | [sectors](https://jobicy.com/api/v2/remote-jobs?get=sectors)

The API response is structured in JSON format with the following main components:

<pre>
 "id": Unique Job ID,
 "url": Job link,
 "jobTitle": Job title,
 "companyName": Company name,
 "companyLogo": Company logo link,
 "jobSector": Job function (sector),
 "jobType": Job type (full-time, contract, part-time or internship)
 "jobGeo": Geographic restriction for employment (or Anywhere if not applicable), 
 "jobLevel": Seniority level (or Any if not applicable), 
 "jobExcerpt": Excerpt job description (max 55 characters), 
 "jobDescription": Full job description (HTML), 
 "pubDate": Publication date and time (UTC+00:00),
 "annualSalaryMin": Annual min salary (if applicable),
 "annualSalaryMax": Annual max salary (if applicable),
 "salaryCurrency": ISO 4217 salary currency code (if applicable)
</pre>

## API Calls Examples
Get the 20 latest remote jobs with the keyword "Python" from any region:
<pre>https://jobicy.com/api/v2/remote-jobs?count=20&amp;tag=python</pre>
Get the 15 latest remote jobs from Canada:
<pre>https://jobicy.com/api/v2/remote-jobs?count=15&amp;geo=canada</pre>
Get the 30 latest remote jobs in the Copywriting category from USA:
<pre>https://jobicy.com/api/v2/remote-jobs?count=30&amp;geo=usa&amp;sector=copywriting</pre>
Get the 10 latest remote jobs in the Customer Support category from any region:
<pre>https://jobicy.com/api/v2/remote-jobs?count=10&amp;sector=supporting</pre>

## [Remote Jobs RSS feed](https://jobicy.com/?feed=job_feed)

In this manual, you will find the basic information regarding Jobicy’s RSS working principles and how to use it.  
[RSS (Really Simple Syndication)](https://en.wikipedia.org/wiki/RSS) – is a web feed that allows users and applications to access updates to websites in a standardized, computer-readable format

Most of the jobs are for people from the Americas (USA, Canada and LATAM) and Europe/EMEA. Keep this in mind if your main audience is from other regions. You can find our public [RSS](https://jobicy.com/?feed=job_feed&posts_per_page=20) feed here for all jobs posted:

<pre id="rss">RSS Feed: https://jobicy.com/?feed=job_feed</pre>

RSS Jobicy – This interface allows information to be received from the database jobicy.com. You do not need to know in detail how the base is constructed and from which table and field types it consists of. It is enough that API-request “knows” it. The request syntax and the type of data being returned are strictly determined by the service itself.

With this RSS, now you can build job apps with our data feed. Listings of jobs can be derived from the following endpoints:

#### RSS Url parameters:

<pre>
 ?feed=job_feed (required)
 &job_categories=... (eg. supporting, dev, marketing..)
 &job_types=... (eg. full-time, freelance, contract..)
 &search_keywords=... (eg. designer)
 &search_region=... (eg. Canada, UK, USA, Europe)</pre>

Example query string:

`https://jobicy.com/?feed=job_feed&job_categories=supporting&job_types=full-time&search_region=USA`

Response: Full-time Customer Service jobs in the U.S. region.

## What’s next?

You have now gotten acquainted with the basics of RSS Jobicy. The rest is up to you.

Of course, in real life, no one works with RSS in adjacent browser tabs. For this, different programming languages, SDK and code generators are used. The RSS working mechanism is very simple. The means of sending http-requests and handling responses from the server are practically provided in any environment. This means freedom of choice is constantly existent.

## Fair Use and Restrictions

At Jobicy, we are thankful for your engagement with our Feeds and would like to provide some guidelines to ensure the best use of our resources:

1. Appreciation for Integration: We are grateful for your incorporation of Jobicy Feeds into your projects.
2. Primary Purpose of API/RSS Access: Our API/RSS access is primarily intended to facilitate the wider distribution of our job listings.
3. Distribution Limitations: We request that our job listings not be distributed to external job platforms such as Jooble, Google Jobs, LinkedIn, and others.
4. Publication Timing: To maintain our position as the original source, our job postings are intentionally published with a 6-hour delay.
5. Access Frequency: Frequent polling for job data is unnecessary. Accessing the Feed a few times a day is sufficient, as our job information does not change more rapidly than this.
6. Excessive Querying: Please be aware that excessive querying of our Feed may lead to restricted access.

We may implement restrictive measures and notify you and/or your service provider if:

* you intentionally overload feeds (please limit feed checks to no more than once per hour);
* you alter or misrepresent the content of the original response during import;
* we determine that your actions are interfering with the functionality of our systems.
We appreciate your cooperation and adherence to these guidelines to ensure a beneficial partnership.

## IFTTT Applets

Automatically post new remote job on:  
[LinkedIn](https://ifttt.com/applets/WvFM4Jpb-remote-jobs-to-linkedin), [Twitter](https://ifttt.com/applets/nHeCvE97-remote-jobs-to-twitter), [Facebook](https://ifttt.com/applets/DqNhfbgB-remote-jobs-to-facebook-page), [Telegram](https://ifttt.com/applets/Lk6wm9Y2-remote-jobs-to-telegram-channel), [Slack](https://ifttt.com/applets/WnYGa6h4-remote-jobs-to-slack), [Discord](https://ifttt.com/applets/QCUp6qbP-remote-jobs-to-discord) and [WordPress](https://ifttt.com/applets/pT9ByQsY-remote-jobs-to-wordpress-post).

</div>
