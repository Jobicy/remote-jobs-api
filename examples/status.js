async function main() {
  const ids = process.argv.slice(2).flatMap((value) => value.split(","));
  if (!ids.length || ids.length > 100) throw new Error("Usage: node examples/status.js ID[,ID...] (1–100 IDs)");
  for (const value of ids) {
    if (!/^[1-9][0-9]*$/.test(value.trim()) || !Number.isSafeInteger(Number(value))) throw new Error("Invalid job ID");
  }
  const url = new URL("https://jobicy.com/api/v2/remote-jobs/status");
  url.searchParams.set("ids", ids.map((id) => id.trim()).join(","));
  const response = await fetch(url, { signal: AbortSignal.timeout(15000) });
  if (!response.ok) throw new Error(`HTTP ${response.status}`);
  const data = await response.json();
  if (data.success !== true || !Array.isArray(data.jobs)) throw new Error("Invalid status response");
  for (const item of data.jobs) {
    if (!["active", "closed", "unknown"].includes(item.status)) throw new Error("Invalid job status");
    console.log(`${item.id}: ${item.status}`);
  }
}

main().catch((error) => {
  console.error(error.message);
  process.exitCode = 1;
});
