<?php

namespace RobertBoes\SitemapGenerator\XML;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Cache\Repository as Cache;
use RobertBoes\SitemapGenerator\Tag\UrlTag;
use RobertBoes\SitemapGenerator\Tag\VideoTag;

class SitemapURLSet extends SitemapBase implements SitemapInterface
{

    public function __construct(Cache $cache, Request $request)
    {
        parent::__construct($cache, $request);
    }

    public function addLocation($url, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        $this->tags[] = new UrlTag($url, $lastModified, $changeFrequency, $priority);
        return $this;
    }

    public function addVideoLocation($url, array $videoData, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        $this->addScheme('xmlns:video', 'http://www.google.com/schemas/sitemap-video/1.1');
        $this->tags[] = new VideoTag($url, $videoData, $lastModified, $changeFrequency, $priority);
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
