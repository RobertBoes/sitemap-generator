<?php

namespace RobertBoes\SitemapGenerator\Tag;


use Carbon\Carbon;

class VideoTag extends UrlTag
{
    protected $thumbnailLocation;
    protected $title;
    protected $description;

    protected static $scheme = [
        'ns'  => 'xmlns:video',
        'url' => 'http://www.google.com/schemas/sitemap-video/1.1'
    ];

    public function __construct($location, array $videoData, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        parent::__construct($location, $lastModified, $changeFrequency, $priority);

        $this->thumbnailLocation = $videoData['thumbnail_loc'];
        $this->title = $videoData['title'];
        $this->description = $videoData['description'];
    }

    /**
     * Gets the scheme namespace and schema location
     * @return array
     */
    public static function getScheme() {
        return self::$scheme;
    }

    /**
     * Returns the schema namespace for this tag
     * @return string
     */
    public static function getSchemaNamespace() {
        return self::$scheme['ns'];
    }

    /**
     * Returns the schema location for this tag
     * @return string
     */
    public static function getSchemaLocation() {
        return self::$scheme['url'];
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
