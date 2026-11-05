<?php
$limit = $limit ?? 30;
$cachesection = 'reading-' . $limit;
$shelf_filter = 2;

$localfile = __DIR__ . '/hardcover-current.json';
include_once __DIR__ . '/getbooks.php';
include_once __DIR__ . '/storefile.php';
$data = json_decode($response, true);
$books = $data['data']['me'][0]['user_books'] ?? [];
