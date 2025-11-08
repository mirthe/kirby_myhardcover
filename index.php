<?php

Kirby::plugin('mirthe/myhardcover', [
    'options' => [
        'token' => option('hardcover.token'),
        'userid' => option('hardcover.userid')
    ],
    'snippets' => [
        'hardcover-books-read' => __DIR__ . '/snippets/books-read.php',
        'hardcover-books-currently-reading' => __DIR__ . '/snippets/books-current.php'
    ]
]);
