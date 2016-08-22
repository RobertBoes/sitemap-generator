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

    /**
     * Add a video location tag to the sitemap
     * @param $url
     * @param array $videoData
     * @param Carbon|null $lastModified
     * @param null $changeFrequency
     * @param null $priority
     * @return $this
     */
    public function addVideoLocation($url, array $videoData, Carbon $lastModified = null, $changeFrequency = null, $priority = null) {
        $this->addSchemeByArray(VideoTag::getScheme(), false);
        $this->tags[] = new VideoTag($url, $videoData, $lastModified, $changeFrequency, $priority);
        return $this;
    }

    /**
     * Add a new VideoTag object to the sitemap
     * @param VideoTag $tag
     * @return $this
     */
    public function addVideoTag(VideoTag $tag) {
        $this->addSchemeByArray(VideoTag::getScheme(), false);
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
