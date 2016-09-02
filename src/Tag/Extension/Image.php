<?php

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use Carbon\Carbon;
use RobertBoes\SitemapGenerator\XML\Scheme;

class Image extends BaseExtension
{
    protected $location;

    /**
     * @var Scheme
     */
    protected static $scheme;
    protected static $schemeNamespace = 'xmlns:image';
    protected static $schemeUrl = 'http://www.google.com/schemas/sitemap-image/1.1';

    public function __construct($location)
    {
        $this->location = $location;
    }
}
