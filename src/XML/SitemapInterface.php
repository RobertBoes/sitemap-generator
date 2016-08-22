<?php

namespace RobertBoes\SitemapGenerator\XML;

interface SitemapInterface
{
    /**
     * Renders the sitemap
     * @return \Illuminate\Http\Response
     */
    public function render();
}