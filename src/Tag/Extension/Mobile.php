<?php

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use RobertBoes\SitemapGenerator\XML\Scheme;

class Mobile extends BaseExtension
{
    /**
     * @var Scheme
     */
    protected static $scheme;
    protected static $schemeNamespace = 'xmlns:news';
    protected static $schemeUrl = 'http://www.google.com/schemas/sitemap-news/1.1';

    public function __construct()
    {

    }
}
