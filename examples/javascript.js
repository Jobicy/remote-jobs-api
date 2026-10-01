async function getJobs() {
  const response = await fetch(
    'https://jobicy.com/api/v2/remote-jobs?count=10',
    { signal: AbortSignal.timeout(15000) }
  );
  if (!response.ok) throw new Error(`HTTP ${response.status}`);
  const data = await response.json();
  if (!Array.isArray(data.jobs)) throw new Error('Invalid jobs response');
  console.log(`Found ${data.jobs.length} jobs`);
  console.log(data.jobs);
  console.log('Next cursor:', data.nextCursor);
}

getJobs().catch((error) => {
  console.error(error.message);
  process.exitCode = 1;
});
