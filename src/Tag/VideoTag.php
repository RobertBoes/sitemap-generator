<?php

namespace RobertBoes\SitemapGenerator\Tag;


use Carbon\Carbon;

class VideoTag extends UrlTag
{
    protected $thumbnailLocation;
    protected $title;
    protected $description;

    public function __construct($location, array $videoData, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        parent::__construct($location, $lastModified, $changeFrequency, $priority);

        $this->thumbnailLocation = $videoData['thumbnail_loc'];
        $this->title = $videoData['title'];
        $this->description = $videoData['description'];
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
