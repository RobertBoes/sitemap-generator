<?php

namespace RobertBoes\SitemapGenerator\Sitemap;

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

    /**
     * The default schemes that will always be added
     * @var array
     */
    protected $schemas = [
        'xmlns' => 'http://www.sitemaps.org/schemas/sitemap/0.9',
        'xmlns:mobile' => 'http://www.google.com/schemas/sitemap-mobile/1.1',
        'xmlns:video' => 'http://www.google.com/schemas/sitemap-video/1.1'
    ];

    public function __construct(Cache $cache, Request $request) {
        $this->cache = $cache;
        $this->request = $request;
        $this->addValidationSchemas($this instanceof SitemapUrlSet ? 'sitemap' : 'sitemapindex');
    }

    /**
     * Add a tag to the sitemap
     * @param BaseTag $tag
     */
    public function addTag(BaseTag $tag) {
        $this->tags[] = $tag;
    }

    /**
     * @param Scheme $scheme
     * @param bool $overwrite
     */
    protected function addScheme(Scheme $scheme, $overwrite = false) {
        if(!key_exists($scheme->getNamespace(), $this->schemas) || $overwrite) {
            $this->schemas[$scheme->getNamespace()] = $scheme->getLocation();
        }
    }
    /**
     * Add a new scheme with array. The array contains a namespace and location
     * Scheme looks like ['ns' => '...', 'url' => '...']
     * @param array $scheme
     * @param bool $overwrite
     */
    protected function addSchemeByArray($scheme, $overwrite = false) {
        $this->addScheme(new Scheme($scheme['ns'], $scheme['url']), $overwrite);
    }

    /**
     * Add a new namespace with scheme location to the sitemap
     * This is used by video tags for example
     * @param $namespace
     * @param $schemaLocation
     * @param bool $overwrite
     */
    protected function addSchemeByName($namespace, $schemaLocation, $overwrite = false) {
        $this->addScheme(new Scheme($namespace, $schemaLocation), $overwrite);
    }

    protected function addValidationSchemas($type) {
        $enabled = config('sitemap-generator.validation.enabled');
        if($enabled === true || (is_array($enabled) && in_array($type, $enabled))) {
            $validationSchemes = config('sitemap-generator.validation.'. $type);
            foreach($validationSchemes as $namespace => $schemaLocation) {
                $this->addScheme(new Scheme($namespace, $schemaLocation));
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