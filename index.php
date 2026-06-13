<?php

Kirby::plugin('mirthe/myhardcover', [
    'options' => [
        'token' => option('hardcover.token'),
        'userid' => option('hardcover.userid'),
        'cache' => true
    ],
    'translations' => [
        'nl' => [
            'mirthe.myhardcover.pages' => 'blz'
        ],
        'en' => [
            'mirthe.myhardcover.pages' => 'pags'
        ]
    ],
    'snippets' => [
        'hardcover-books-read' => __DIR__ . '/snippets/books-read.php',
        'hardcover-books-currently-reading' => __DIR__ . '/snippets/books-current.php'
    ]
]);
