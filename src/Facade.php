<?php

namespace RobertBoes\SitemapGenerator;

class Facade extends \Illuminate\Support\Facades\Facade
{
    /**
     * {@inheritDoc}
     */
    protected static function getFacadeAccessor()
    {
        return SitemapGenerator::class;
    }
}
