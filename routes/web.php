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

// About page.
Route::any('template', ['about', 'uses' => 'PageController@about']);

// Help page.
Route::any('page', ['help', 'uses' => 'PageController@help']);

// Blog page.
Route::any('home', 'BlogController@index');

// Blog single post.
Route::any('single', 'BlogController@single');

// Blog archive.
Route::any('archive', 'BlogController@index');

// Book search.
Route::any('search', 'BookController@search');

// Generic page.
Route::any('page', 'PageController@page');
