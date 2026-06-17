<?php

$url = 'https://jobicy.com/api/v2/remote-jobs?count=10';

$response = file_get_contents($url);

if ($response === false) {
    die('Failed to fetch jobs');
}

$jobs = json_decode($response, true);

echo 'Found ' . count($jobs) . " jobs\n";

print_r($jobs);
