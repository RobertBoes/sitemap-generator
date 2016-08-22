<?php

return [
    'validation' => [
        'enabled' => false,//['sitemap'],
        'sitemap' => [
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd',
        ],
        'sitemapindex' => [
            'xmlns:xsi' => 'http://www.w3.org/2001/XMLSchema-instance',
            'xsi:schemaLocation' => 'http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/siteindex.xsd',
        ],
    ],

    'debug' => true,

    'cache' => [
        'enabled' => true,
        'lifetime' => 3600,
    ],
];