<?php

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use RobertBoes\SitemapGenerator\Sitemap\Scheme;

class Mobile extends BaseExtension
{
    /**
     * @var Scheme
     */
    protected static $scheme;
    protected static $schemeNamespace = 'xmlns:mobile';
    protected static $schemeUrl = 'http://www.google.com/schemas/sitemap-mobile/1.1';

    public function __construct()
    {

    }
}
