<?php

return [
    'extension' => 'jpg', // jpg, png, webp
    'quality' => 100,
    'width' => 1200,
    'height' => 630,

    'chrome' => [
        'binary' => '/snap/bin/chromium',
        'flags' => [
            '--disable-gpu',
            '--disable-dev-shm-usage',
            '--no-sandbox',
            '--disable-software-rasterizer',
            '--disable-setuid-sandbox'
        ],
    ],

    // The cache location to use.
    'storage' => [
        'disk' => 'public',
        'path' => 'og-images',
    ],

    // Whether to use the browse URL instead of the HTML input.
    // This is slower, but makes fonts available.
    // Alternative: http
    'method' => 'html',

    'metatags' => [
        'og:title' => 'title',
        'og:description' => 'description',
        'og:type' => 'type',
        'og:url' => 'url',
    ],
];
