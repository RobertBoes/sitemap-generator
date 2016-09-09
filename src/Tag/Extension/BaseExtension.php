<?php
/**
 * Created by PhpStorm.
 * User: Robert
 * Date: 2-9-2016
 * Time: 09:10
 */

namespace RobertBoes\SitemapGenerator\Tag\Extension;


use RobertBoes\SitemapGenerator\Sitemap\Scheme;

abstract class BaseExtension
{
    protected static $scheme;
    protected static $schemeNamespace;
    protected static $schemeUrl;

    /**
     * Gets the Scheme object which contains the namespace and url
     * @return Scheme
     */
    public function scheme() {
        return isset(self::$scheme) ? self::$scheme : new Scheme(self::$schemeNamespace, self::$schemeUrl);
    }

    public function getView() {
        $reflection = new \ReflectionClass($this);
        return strtolower( $reflection->getShortName() );
    }
}
