<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

// The front page
Route::get('front', 'PagesController@home');

// The books page
Route::get('postTypeArchive', array('bks-books', 'uses' => 'BooksController@archive'));

// Single book page
Route::get('singular', array('bks-books', 'uses' => 'BooksController@single'));

// About page
Route::get('page', array('about', 'uses' => 'PagesController@about'));

// Help page
Route::get('page', array('help', 'uses' => 'PagesController@help'));

// News/blog page
Route::get('home', function()
{
    return View::make('blog.news');
});

// Single post
Route::get('singular', array('post', function()
{
    return View::make('blog.post');
}));

// Search page
Route::get('search', function()
{
    return View::make('search', array('search' => $_GET['s']));
});
