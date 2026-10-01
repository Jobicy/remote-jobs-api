<?php
require __DIR__ . '/http.php';
$ids = [];
foreach (array_slice($argv, 1) as $argument) $ids = array_merge($ids, array_map('trim', explode(',', $argument)));
try {
    if (count($ids) < 1 || count($ids) > 100) throw new InvalidArgumentException('Usage: php examples/status.php ID[,ID...] (1–100 IDs)');
    foreach ($ids as $id) {
        if (!preg_match('/^[1-9][0-9]{0,15}$/D', $id) || strlen($id) === 16 && strcmp($id, '9007199254740991') > 0) throw new InvalidArgumentException('Invalid job ID');
    }
    $data = jobicy_request('https://jobicy.com/api/v2/remote-jobs/status?' . http_build_query(['ids' => implode(',', $ids)]));
    if (($data['success'] ?? false) !== true) throw new RuntimeException('Invalid status response');
    foreach ($data['jobs'] as $item) {
        if (!in_array($item['status'] ?? null, ['active', 'closed', 'unknown'], true)) throw new RuntimeException('Invalid job status');
        echo $item['id'] . ': ' . $item['status'] . "\n";
    }
} catch (Throwable $error) {
    fwrite(STDERR, $error->getMessage() . "\n");
    exit(1);
}
