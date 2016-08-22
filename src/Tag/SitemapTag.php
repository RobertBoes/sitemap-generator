<?php

namespace RobertBoes\SitemapGenerator\Tag;

use Carbon\Carbon;

class SitemapTag extends BaseTag
{

    /**
     * SitemapTag constructor.
     * @param string $location
     * @param Carbon $lastModified
     */
    public function __construct($location, Carbon $lastModified = null) {
        parent::__construct($location, $lastModified);
    }
}