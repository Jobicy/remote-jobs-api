Looking to fill a remote job feed and want to use openings listed on Jobicy?

No problem! Our public rss feed can help you with that. Anyone can use the feed, all we ask is that you attribute the links back to Jobicy.com.

## Learning RSS
In this manual, you will find the basic information regarding Jobicy’s RSS working principles and how to use it.
RSS (Really Simple Syndication) – is a web feed that allows users and applications to access updates to websites in a standardized, computer-readable format

You can find our public RSS feed here for all jobs posted:

> https://jobicy.com/?feed=job_feed

Simple XML-version:
> https://jobicy.com/feed/newjobs

## Methods and objects
RSS Jobicy – This interface allows information to be received from the database jobicy.com. You do not need to know in detail how the base is constructed and from which table and field types it consists of. It is enough that API-request “knows” it. The request syntax and the type of data being returned are strictly determined by the service itself.

With this RSS, now you can build job apps with our data feed. Listings of jobs can be derived from the following endpoints:

## Url parameters:
` ?feed=job_feed ` * required

Sort by category:

` &job_categories=dev ` (category slug, eg. supporting, dev, marketing, business, design-multimedia, admin, engineering, accounting-finance, hr, management, copywriting)

Sort by job type:

` &job_types=contract ` (job type slug, eg. full-time, freelance, contract, part-time)

Sort by keywords:

` &search_keywords=designer ` (eg. designer)

Sort by location:

` &search_location=europe ` (eg. apac, usa, canada, europe, emea, uk)

Example query string:

> https://jobicy.com/?feed=job_feed&job_categories=dev&job_types=full-time

Here we display the latest 25 full-time developer jobs.

## What’s next?
You have now gotten acquainted with the basics of RSS Jobicy. The rest is up to you.

Of course, in real life, no one works with RSS in adjacent browser tabs. For this, different programming languages, SDK and code generators are used. The RSS working mechanism is very simple. The means of sending http-requests and handling responses from the server are practically provided in any environment. This means freedom of choice is constantly existent.
