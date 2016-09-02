<?php

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use RobertBoes\SitemapGenerator\XML\Scheme;

class News extends BaseExtension
{
    protected $title;
    protected $publicationName;
    protected $publicationLanguage;
    protected $publicationDate;

    /**
     * @var Scheme
     */
    protected static $scheme;
    protected static $schemeNamespace = 'xmlns:news';
    protected static $schemeUrl = 'http://www.google.com/schemas/sitemap-news/1.1';

    public function __construct($title, $publicationName, $publicationLanguage, Carbon $publicationDate)
    {
        $this->title = $title;
        $this->publicationName = $publicationName;
        $this->publicationLanguage = $publicationLanguage;
        $this->publicationDate = $publicationDate;
    }
}
