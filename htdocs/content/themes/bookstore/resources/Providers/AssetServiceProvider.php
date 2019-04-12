<?php

namespace Theme\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Themosis\Support\Facades\Asset;

class AssetServiceProvider extends ServiceProvider
{
    /**
     * Register theme assets.
     */
    public function register()
    {
        $theme = $this->app->make('wp.theme');

        // CSS
        Asset::add('bookstore-main-styles', 'css/screen.min.css', [], $theme->getHeader('version'), 'all')->to();

        // JS
        Asset::add('bks-modernizr', 'js/library/modernizr.js', [], '2.7.1')->to();
        Asset::add('bks-main', 'js/theme.min.js', ['jquery'], $theme->getHeader('version'), true)->to();
    }

    /**
     * Share theme instance with all views.
     *
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {
        View::share('theme', $this->app->make('wp.theme'));
    }
}