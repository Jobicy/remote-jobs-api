<?php
function jobicy_request($url) {
    $context = stream_context_create(['http' => [
        'timeout' => 30,
        'ignore_errors' => true,
        'header' => "Accept: application/json\r\nUser-Agent: Jobicy-API-Example/php\r\n",
    ]]);
    $body = file_get_contents($url, false, $context);
    if ($body === false) throw new RuntimeException('Request failed');
    $status = 0;
    foreach ($http_response_header ?? [] as $header) {
        if (preg_match('/^HTTP\/\S+\s+(\d{3})/', $header, $matches)) $status = (int) $matches[1];
    }
    if ($status !== 200) throw new RuntimeException('HTTP ' . $status);
    $data = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($data) || !isset($data['jobs']) || !is_array($data['jobs'])) throw new RuntimeException('Invalid API response');
    return $data;
}
