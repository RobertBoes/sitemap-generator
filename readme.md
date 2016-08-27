# Laravel Sitemap Generator #

This sitemap generator can help you make sitemaps for your websites quick and easy. 
This package is based on [dwightwatson/sitemap](https://github.com/dwightwatson/sitemap), but contains a number of different features and implementations.

## Installation ##
Add this package via composer
```
composer require robertboes/sitemap-generator
```

Add the service provider to your ```app/config/app.php```:
```php
'providers' => [
    ...
    RobertBoes\SitemapGenerator\ServiceProvider::class,
];
```

Add the facade to your ```app/config/app.php```:
```php
'aliases' => [
    ...
    RobertBoes\SitemapGenerator\Facade::class,
];
```

## Usage ##

### Creating sitemaps ###
A sitemap can be generated in multiple ways. This way it should serve the needs of many websites.

#### Basic example ####
This could be very useful for static URL's
```php
<?php
namespace app\Http\Controllers

use SitemapGenerator;

class SitemapController extends Controller {

    public function index() {
        $newestPostCreatedAt = Post::orderBy('created_at', 'desc')->first()->created_at;
    
        $map = SitemapGenerator::sitemap();
        $map->addLocation(route('home'));
        $map->addLocation(route('posts'), $newestPostCreatedAt, 'weekly');
        $map->addLocation(route('contact', null, null, '0.9'));
        return $map->render();
    }
}
```

It's also possible to link all the functions like this:
```php
public function index() {
    return SitemapGenerator::sitemap()
        ->addLocation(route('home'))
        ->addLocation(route('faq', null, null, '0.9'))
        ->render();
}
public function posts() {
    SitemapGenerator::sitemap()
        ->addLocation(route('post', ['id' => 1]))
        ->addLocation(route('post', ['id' => 2]));
    
    return SitemapGenerator::sitemap()->render();
}
```




#### Video sitemaps ####
//TODO

### Creating a sitemap index ###
For larger websites it's usefull to seperate the sitemap in multiple files, for example if you're hosting a website which serves lots of video's.


## Config ##
Publish the config with the artisan command:
```
php artisan config:publish robertboes/sitemap-generator
```
See the config file ```app/config/sitemap-generator.php``` for more details on configuration

## Todo's etc. ##

Initial commit

TODO:
- Finish initial version
- Readme
- Tests
- ...
