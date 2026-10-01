<?php

require __DIR__ . '/http.php';
try {
    $data = jobicy_request('https://jobicy.com/api/v2/remote-jobs?count=10');
    echo 'Found ' . count($data['jobs']) . " jobs\n";
    print_r($data['jobs']);
    echo 'Next cursor: ' . ($data['nextCursor'] ?? 'none') . "\n";
} catch (Throwable $error) {
    fwrite(STDERR, $error->getMessage() . "\n");
    exit(1);
}
