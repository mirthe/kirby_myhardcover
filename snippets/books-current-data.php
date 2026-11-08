<?php
$limit = $limit ?? 30;
$query_limit = max($limit, 30);
$cachesection = 'reading-' . $limit;
$shelf_filter = 2;

$localfile = __DIR__ . '/hardcover-current.json';
include_once __DIR__ . '/getbooks.php';
include_once __DIR__ . '/storefile.php';
$data = json_decode($response, true);
$books = $data['data']['me'][0]['user_books'] ?? [];
usort($books, static function ($a, $b) {
    $startDateOrder = strcmp(
        $b['first_started_reading_date'] ?? '',
        $a['first_started_reading_date'] ?? ''
    );

    return $startDateOrder !== 0
        ? $startDateOrder
        : strcmp($b['date_added'] ?? '', $a['date_added'] ?? '');
});
$books = array_slice($books, 0, $limit);
