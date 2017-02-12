<?php

namespace Tld\Domain\Plugin\Services;

use Themosis\Facades\Route;
use Themosis\Foundation\ServiceProvider;

class RoutingService extends ServiceProvider
{
    /**
     * Register plugin routes.
     * Define a custom namespace.
     */
    public function register()
    {
        Route::group([
            'namespace' => 'Dev\Bookstore\Books\Controllers'
        ], function () {
            require themosis_path('plugin.dev.bookstore.books.resources').'routes.php';
        });
    }
}