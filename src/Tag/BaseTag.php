<?php

namespace RobertBoes\SitemapGenerator\Tag;

use Carbon\Carbon;

class BaseTag
{
    /**
     * @var string
     */
    protected $location;

    /**
     * @var Carbon
     */
    protected $lastModified;


    /**
     * BaseTag constructor.
     * @param string $location
     * @param Carbon $lastModified
     */
    public function __construct($location, Carbon $lastModified = null) {
        $this->location = $location;
        $this->lastModified = $lastModified;
    }

    /**
     * @return string
     */
    public function getLocation() {
        return htmlspecialchars($this->location, ENT_XML1);
    }

    /**
     * @return bool
     */
    public function hasLastModified() {
        return $this->lastModified !== null;
    }

    /**
     * @return string
     */
    public function getLastModified() {
        return $this->lastModified->toW3cString();
    }
}
