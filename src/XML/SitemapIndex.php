<?php

namespace RobertBoes\SitemapGenerator\XML;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository as Cache;
use RobertBoes\SitemapGenerator\Tag\SitemapTag;

class SitemapIndex extends SitemapBase implements SitemapInterface
{

    public function __construct(Cache $cache, Request $request)
    {
        parent::__construct($cache, $request);
    }

    public function addLocation($url, Carbon $lastModified = null){
        $this->tags[] = new SitemapTag($url, $lastModified);
        return $this;
    }

    /**
     * Renders the sitemap
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->sitemap('sitemap-generator::sitemapindex', ['tags' => $this->tags]);
    }
}