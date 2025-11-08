<?php use Kirby\Toolkit\Str;

$shelf_filter = 3;
$limit = 30;

$localfile =  __DIR__ . "/hardcover-read.json";
include_once ('getbooks.php');
include_once ('storefile.php');
$data = json_decode($response, true);
$books = $data['data']['me']['0']['user_books'] ?? [];
include_once ('showbooks.php');
