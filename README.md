<div class="rich-text no-hover-links">

Looking to fill a remote job feed and want to use openings listed on Jobicy?

No problem! Our public API/RSS feeds can help you with that. Anyone can use the feed, all we ask is that you attribute the links back to Jobicy.com.

## [Remote Jobs API Feed](https://jobicy.com/api/v2/remote-jobs)

This API provides access to the latest 50 remote job listings from a diverse range of industries and companies. It’s a valuable resource for developers looking to integrate remote job data into their applications, websites, or research projects. Please read the guidelines and instructions below to understand how to effectively use the API.

To retrieve the latest 50 remote job listings, use the following API call:

<pre>GET https://jobicy.com/api/v2/remote-jobs</pre>

<pre>Query Parameters (optional):
  count - Number of listings to return (default: 50, range: 1-50)  
  jobGeo - Filter by job region (default: all regions)  
  keyWord - Search by job title and description (default: all jobs)
  
Eg: https://jobicy.com/api/v2/remote-jobs?count=5&jobGeo=usa&keyWord=seo</pre>

The API response is structured in JSON format with the following main components:

<pre>{
  <span>"friendlyNotice"</span>: <span>"..."</span>,
  <span>"jobCount"</span>: <span>50</span>,
  <span>"jobs"</span>:
  [
    {
     <small>// Unique Job ID</small>
     <span>"id"</span>: <span>12345</span>,

     <small>// Job link</small>
     <span>"url"</span>: <span>"https://jobicy.com/jobs/senior-designer"</span>,

     <small>// Job title</small>
     <span>"jobTitle"</span>: <span>"Senior Designer"</span>,

     <small>// Company name</small>
     <span>"companyName"</span>: <span>"ABC"</span>,

     <small>// Company logo link</small>
     <span>"companyLogo"</span>: <span>"https://jobicy.com/data/img/ABC-logo.jpg"</span>,

     <small>// Job function (category)</small>
     <span>"jobCategory"</span>: <span>"Design"</span>,

     <small>// Job type (full-time, contract, part-time or internship)</small>
     <span>"jobType"</span>: <span>"full-time"</span>,

     <small>// Geographic restriction for employment, or Anywhere</small>
     <span>"jobGeo"</span>: <span>"Anywhere"</span>, 

     <small>// Seniority level, or Any</small>
     <span>"jobLevel"</span>: <span>"Senior"</span>, 

     <small>// Excerpt job description (max 55 characters)</small>
     <span>"jobExcerpt"</span>: <span>"We're looking for a designer ..."</span>, 

     <small>// Full job description (HTML)</small>
     <span>"jobDescription"</span>: <span>"&lt;p&gt;We're looking for a designer ..."</span>, 

     <small>// Publication date and time (UTC+00:00)</small>
     <span>"pubDate"</span>: <span>"2017-04-13T16:11:04"</span>,
    },
    ...
  ]
}</pre>

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

## [Remote Jobs XML feed](https://jobicy.com/feed/newjobs)

Returns the 500 most recently published remote jobs:

`https://jobicy.com/feed/newjobs`

## What’s next?

You have now gotten acquainted with the basics of RSS Jobicy. The rest is up to you.

Of course, in real life, no one works with RSS in adjacent browser tabs. For this, different programming languages, SDK and code generators are used. The RSS working mechanism is very simple. The means of sending http-requests and handling responses from the server are practically provided in any environment. This means freedom of choice is constantly existent.

<div id="message" class="notification error mt0">We’re grateful you’re incorporating the Jobicy Feeds in your work! It’s important to mention that we provide API/RSS/XML access primarily for the purpose of enabling the wider distribution of our job listings. We kindly request that you refrain from distributing Jobicy’s job listings to any external job platforms, such as Jooble, Google Jobs, and LinkedIn, among others. Our job postings are intentionally published with a 12-hour delay to ensure that Jobicy is recognized as the original source on various channels. Additionally, there’s no necessity to frequently poll for job data. Accessing the Feed to retrieve Jobicy job information just a few times daily should suffice since our data doesn’t change more rapidly than this. Please be aware that we may restrict access in response to excessive querying.</div>

## Fair Use

We may implement restrictive measures and notify you and/or your service provider if:

*   you intentionally overload feeds (please limit feed checks to no more than once per hour);
*   you alter or misrepresent the content of the original response during import;
*   we determine that your actions are interfering with the functionality of our systems.

## IFTTT Applets

Automatically post new remote job on:  
[LinkedIn](https://ifttt.com/applets/WvFM4Jpb-remote-jobs-to-linkedin), [Twitter](https://ifttt.com/applets/nHeCvE97-remote-jobs-to-twitter), [Facebook](https://ifttt.com/applets/DqNhfbgB-remote-jobs-to-facebook-page), [Telegram](https://ifttt.com/applets/Lk6wm9Y2-remote-jobs-to-telegram-channel), [Slack](https://ifttt.com/applets/WnYGa6h4-remote-jobs-to-slack), [Discord](https://ifttt.com/applets/QCUp6qbP-remote-jobs-to-discord) and [WordPress](https://ifttt.com/applets/pT9ByQsY-remote-jobs-to-wordpress-post).

</div>
