<?php

return [
    'debug' => env('OG_IMAGE_DEBUG', true), // disable caching og images for development

    'extension' => 'jpg', // jpg, png, webp

    'width' => 1200,
    'height' => 630,

    'chrome' => [
        'path' => env('CHROME_PATH', '/usr/bin/chromium-browser'),
        'flags' => [
            '--disable-dev-shm-usage',
            '--disable-gpu',
            '--disable-setuid-sandbox',
            '--disable-software-rasterizer',
            '--hide-scrollbars',
            '--mute-audio',
            '--no-sandbox',
        ],
    ],

    // The cache location to use.
    'storage' => [
        'disk' => 'public',
        'path' => 'og-images',
    ],

    'metatags' => [
        'og:title' => 'title',
        'og:description' => 'description',
        'og:type' => 'type',
        'og:url' => 'url',
    ],
];
