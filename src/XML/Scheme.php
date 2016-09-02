<?php

namespace RobertBoes\SitemapGenerator\XML;


class Scheme
{
    private $scheme;
    private $url;

    public function __construct($scheme, $url)
    {
        $this->scheme = $scheme;
        $this->url = $url;
    }

    public function scheme() {
        return $this->scheme;
    }

    public function url() {
        return $this->url;
    }
}
