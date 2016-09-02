<?php

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use RobertBoes\SitemapGenerator\XML\Scheme;

class Video extends BaseExtension
{
    protected $thumbnailLocation;
    protected $title;
    protected $description;

    /**
     * @var Scheme
     */
    protected static $scheme;
    protected static $schemeNamespace = 'xmlns:video';
    protected static $schemeUrl = 'http://www.google.com/schemas/sitemap-video/1.1';

    public function __construct($thumbnail_loc, $title, $description, array $videoData) {
        $this->thumbnailLocation = $thumbnail_loc;
        $this->title = $title;
        $this->description = $description;
    }

    public function getThumbnailLocation() {
        return htmlspecialchars($this->thumbnailLocation, ENT_XML1);
    }

    public function getTitle() {
        return htmlspecialchars($this->title, ENT_XML1);
    }

    public function getDescription() {
        return htmlspecialchars($this->description, ENT_XML1);
    }
}
