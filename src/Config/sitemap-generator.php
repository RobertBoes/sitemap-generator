<?php

return [
    /**
     * Cache
     * Set the sitemap-generator cache properties
     */
    'cache' => [
        'enabled' => true,
        'lifetime' => 3600,
    ],

    /**
     * Debug
     * A comment will be added to the generated sitemap which contains some debug information
     */
    'debug' => false,

    /**
     * Validation
     * Use this to enable validation schemes. These schemes will be added to the sitemaps so you can validate
     * your sitemap using for example w3.org, see http://www.sitemaps.org/protocol.html#validating
     * enabled: Boolean or array. The array should contain the types you want to validate (sitemap or sitemapindex)
     * validator name (sitemap/sitemapindex): Contains xmlns:xsi and xsi:schemaLocation
     */
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
];