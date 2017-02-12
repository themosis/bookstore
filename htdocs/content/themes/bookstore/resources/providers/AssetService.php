<?php

namespace Theme\Providers;

use Themosis\Facades\Asset;
use Themosis\Foundation\ServiceProvider;

class AssetService extends ServiceProvider
{
    /**
     * Register theme assets.
     */
    public function register()
    {
        // CSS
        Asset::add('bookstore-main-styles', 'css/screen.min.css', false, '1.0', 'all');

        // JS
        Asset::add('bks-modernizr', 'js/library/modernizr.js', false, '2.7.1');
        Asset::add('bks-main', 'js/theme.min.js', array('jquery'), '1.0', true);
    }
}