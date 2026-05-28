<?php
$cache = kirby()->cache('mirthe.myhardcover');
$cacheKey = 'hardcover-' . strtolower(option('mirthe.myhardcover.userid')) . '-' . $cachesection;
$response = $cache->get($cacheKey);
$force = isset($_GET['forcecache']);

if ($response === null || $force) {
    $previousResponse = $response;
    $endpoint = 'https://api.hardcover.app/v1/graphql';
    $ch = curl_init($endpoint);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Authorization: Bearer ' . option('mirthe.myhardcover.token'),
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode(['query' => $query]));

    $response = curl_exec($ch);
    $error = curl_errno($ch);
    curl_close($ch);

    if ($response !== false && $error === 0 && $response !== '') {
        $cache->set($cacheKey, $response, 2 * 3600);
    } else {
        $response = $previousResponse;
    }
}

if ($response === null) {
    $response = '[]';
}
?>

