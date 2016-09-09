<?php

namespace RobertBoes\SitemapGenerator\Tag;

use Carbon\Carbon;
use RobertBoes\SitemapGenerator\Tag\Extension\BaseExtension;

class UrlTag extends BaseTag
{
    protected $changeFrequency;

    protected $priority;

    protected $extensions = [];

    public function __construct($location, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        parent::__construct($location, $lastModified);
        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
    }

    /**
     * @param $location
     * @param Carbon|null $lastModified
     * @param null $changeFrequency
     * @param null $priority
     * @return UrlTag
     */
    public static function create($location, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        return new UrlTag($location, $lastModified, $changeFrequency, $priority);
    }

    public function hasChangeFrequency() {
        return $this->changeFrequency !== null;
    }

    public function getChangeFrequency() {
        return $this->changeFrequency;
    }

    public function hasPriority() {
        return $this->priority !== null;
    }

    public function getPriority() {
        return $this->priority;
    }

    public function extensions()
    {
        return $this->extensions;
    }

    public function extend(BaseExtension $extension) {
        $this->extensions[] = $extension;
        return $this;
    }
}
