<?php

namespace RobertBoes\SitemapGenerator\XML;

use Illuminate\Http\Request;
use Illuminate\Cache\Repository as Cache;
use RobertBoes\SitemapGenerator\Tag\BaseTag;

abstract class SitemapBase
{
    /**
     * @var Cache
     */
    protected $cache;

    /**
     * @var Request
     */
    protected $request;

    protected $tags = [];
    protected $schemas = [
        'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9'
    ];

    public function __construct(Cache $cache, Request $request) {
        $this->cache = $cache;
        $this->request = $request;
        $this->addValidationSchemas($this instanceof SitemapURLSet ? 'sitemap' : 'sitemapindex');
    }

    public function addTag(BaseTag $tag) {
        $this->tags[] = $tag;
    }

    protected function addScheme($namespace, $schemaLocation, $overwrite = false) {
        if(!key_exists($namespace, $this->schemas) || $overwrite) {
            $this->schemas[$namespace] = $schemaLocation;
        }
    }

    protected function addValidationSchemas($type) {
        $enabled = config('sitemap-generator.validation.enabled');
        if($enabled === true || (is_array($enabled) && in_array($type, $enabled))) {
            $validationSchemes = config('sitemap-generator.validation.'. $type);
            foreach($validationSchemes as $namespace => $schemaLocation) {
                $this->addScheme($namespace, $schemaLocation);
            }
        }
    }

    public function getSchemes() {
        $merged = [];
        foreach($this->schemas as $namespace => $schemaLocation) {
            $merged[] = $namespace . '="' . $schemaLocation . '"';
        }
        return implode(' ', $merged);
    }
}