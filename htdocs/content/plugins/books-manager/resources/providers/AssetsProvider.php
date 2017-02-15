<?php

namespace Dev\Bookstore\Books\Services;

use Themosis\Facades\Asset;
use Themosis\Foundation\ServiceProvider;

class AssetsProvider extends ServiceProvider
{
    /**
     * Register plugin CSS asset.
     *
     */
    public function register()
    {
        Asset::add('books-manager-css', 'css/books-manager.min.css', false, '1.0.0', 'all')->to('admin');
    }
}