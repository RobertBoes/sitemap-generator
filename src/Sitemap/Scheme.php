<?php

namespace RobertBoes\SitemapGenerator\Sitemap;

use RobertBoes\SitemapGenerator\Exceptions\SchemeException;

class Scheme
{
    private $namespace;
    private $location;

    public function __construct($namespace, $location)
    {
        if(!isset($namespace) || !isset($location)) {
            throw new SchemeException('Scheme or URL must be set');
        }
        $this->namespace = $namespace;
        $this->location = $location;
    }

    public function getNamespace() {
        return $this->namespace;
    }

    public function getLocation() {
        return $this->location;
    }
}
