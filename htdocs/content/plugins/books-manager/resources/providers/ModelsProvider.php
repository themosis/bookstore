<?php

namespace Dev\Bookstore\Books\Services;

use Dev\Bookstore\Books\Models\Books;
use Themosis\Foundation\ServiceProvider;

class ModelsProvider extends ServiceProvider
{
    /**
     * Bind our Books model to the service container.
     */
    public function register()
    {
        $this->app->bind('dev.bookstore.books.plugin.models.books', function () {
            return new Books(new \WP_Query());
        });
    }
}