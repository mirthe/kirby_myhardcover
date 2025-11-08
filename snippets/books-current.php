<?php use Kirby\Toolkit\Str;

$shelf_filter = 2;
$limit = 3;

$localfile =  __DIR__ . "/hardcover-current.json";
include_once ('getbooks.php');
include_once ('storefile.php');
$data = json_decode($response, true);
$books = $data['data']['me']['0']['user_books'] ?? [];
include_once ('showbooks-compact.php');
