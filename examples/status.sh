#!/usr/bin/env bash
set -euo pipefail
if [ "$#" -ne 1 ] || [ -z "$1" ]; then
  printf '%s\n' 'Usage: bash examples/status.sh ID[,ID...] (1–100 IDs)' >&2
  exit 1
fi
curl --fail-with-body --max-time 30 --get 'https://jobicy.com/api/v2/remote-jobs/status' --data-urlencode "ids=$1"
