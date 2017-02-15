<?php

/**
 * Plugin autoloading configuration.
 */
return [
    'Dev\\Bookstore\\Books\\Services\\' => themosis_path('plugin.dev.bookstore.books.resources').'providers',
    'Dev\\Bookstore\\Books\\Models\\' => themosis_path('plugin.dev.bookstore.books.resources').'models',
    'Dev\\Bookstore\\Books\\Controllers\\' => themosis_path('plugin.dev.bookstore.books.resources').'controllers',
    'Dev\\Bookstore\\Books\\Facades\\' => themosis_path('plugin.dev.bookstore.books.resources').'facades'
];