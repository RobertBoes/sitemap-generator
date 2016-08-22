<?php

namespace RobertBoes\SitemapGenerator;

use Illuminate\Http\Request;
use Illuminate\Cache\Repository as Cache;
use RobertBoes\SitemapGenerator\XML\SitemapIndex;
use RobertBoes\SitemapGenerator\XML\SitemapURLSet;

class SitemapGenerator
{
    /**
     * @var \Illuminate\Cache\Repository
     */
    protected $cache;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * @var SitemapURLSet
     */
    protected $urlSet;

    /**
     * @var SitemapIndex
     */
    protected $index;

    /**
     * SitemapGenerator constructor.
     * @param Cache $cache
     * @param Request $request
     */
    public function __construct(Cache $cache, Request $request)
    {
        $this->cache = $cache;
        $this->request = $request;

        $this->urlSet = new SitemapURLSet($cache, $request);
        $this->index = new SitemapIndex($cache, $request);
    }

    /**
     * Creates a sitemap
     * @return SitemapURLSet
     */
    public function sitemap() {
        return $this->urlSet;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function renderSitemap() {
        return $this->urlSet->render();
    }

    /**
     * Creates a sitemap index
     * This is used to link to other sitemaps
     * @return SitemapIndex
     */
    public function sitemapIndex(){
        return $this->index;
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function renderSitemapIndex() {
        return $this->index->render();
    }
}