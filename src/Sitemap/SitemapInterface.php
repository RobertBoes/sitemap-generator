<?php

namespace RobertBoes\SitemapGenerator\Sitemap;

interface SitemapInterface
{
    /**
     * Renders the sitemap
     * @return \Illuminate\Http\Response
     */
    public function render();
}