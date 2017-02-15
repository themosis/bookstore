<?php

namespace Dev\Bookstore\Books\Facades;

use Themosis\Facades\Facade;

class Books extends Facade
{
    /**
     * Facade in order to retrieve anywhere from
     * the theme the Books Model instance which is
     * bound to the container from this plugin service
     * provider.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'dev.bookstore.books.plugin.models.books';
    }
}