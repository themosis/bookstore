<?php

/**
 * Application routes.
 */
// Front/Home page.
Route::any('/', 'PageController@front');

// Books archive page.
Route::any('postTypeArchive', ['bks-books', 'uses' => 'BookController@archive']);

// Book singular page.
Route::any('singular', ['bks-books', 'uses' => 'BookController@single']);
