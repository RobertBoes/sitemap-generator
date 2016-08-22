<?php

namespace RobertBoes\SitemapGenerator\Tag;

use Carbon\Carbon;

class UrlTag extends BaseTag
{
    protected $changeFrequency;

    protected $priority;

    public function __construct($location, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        parent::__construct($location, $lastModified);
        $this->changeFrequency = $changeFrequency;
        $this->priority = $priority;
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
}
