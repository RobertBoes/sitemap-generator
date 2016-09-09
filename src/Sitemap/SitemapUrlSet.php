<?php

namespace RobertBoes\SitemapGenerator\Sitemap;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository as Cache;
use RobertBoes\SitemapGenerator\Tag\BaseTag;
use RobertBoes\SitemapGenerator\Tag\UrlTag;
use RobertBoes\SitemapGenerator\Tag\VideoTag;

class SitemapUrlSet extends SitemapBase implements SitemapInterface
{

    public function __construct(Cache $cache, Request $request)
    {
        parent::__construct($cache, $request);
    }

    /**
     * Add a location to the sitemap
     * @param string $url
     * @param Carbon|null $lastModified
     * @param string|null $changeFrequency
     * @param string|null $priority
     * @return $this
     */
    public function addLocation($url, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        $this->tags[] = new UrlTag($url, $lastModified, $changeFrequency, $priority);
        return $this;
    }

    public function addTag(BaseTag $tag) {
        $this->tags[] = $tag;
        return $this;
    }

    /**
     * Renders the sitemap
     * @return \Illuminate\Http\Response
     */
    public function render()
    {
        return response()->sitemap('sitemap-generator::urlset', ['tags' => $this->tags, 'schemas' => $this->getSchemes()]);
    }
}
