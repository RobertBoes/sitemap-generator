<?php

namespace RobertBoes\SitemapGenerator;

use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @param ResponseFactory $response
     * @return void
     */
    public function boot(ResponseFactory $response)
    {
        $this->publishes([
            __DIR__.'/Config/sitemap-generator.php' => config_path('sitemap-generator.php'),
        ], 'config');

        $response->macro('sitemap', function ($view, array $data) use ($response) {
            return $response
                ->view($view, $data)
                ->header('Content-Type', 'text/xml');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/Config/sitemap-generator.php', 'sitemap-generator');

        // View
        $this->loadViewsFrom(__DIR__ . '/Views', 'sitemap-generator');

        $this->app->singleton(SitemapGenerator::class, SitemapGenerator::class);
    }
}
