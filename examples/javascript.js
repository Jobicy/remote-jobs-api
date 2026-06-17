async function getJobs() {
  try {
    const response = await fetch(
      'https://jobicy.com/api/v2/remote-jobs?count=10'
    );

    const jobs = await response.json();

    console.log(`Found ${jobs.length} jobs`);
    console.log(jobs);
  } catch (error) {
    console.error('Error fetching jobs:', error);
  }
}

getJobs();
