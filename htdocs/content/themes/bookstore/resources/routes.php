<?php

/*
 * Define your routes and which views to display
 * depending of the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

/**
 * WordPress routes
 */
/*
 * Home page.
 */
Route::match(['get', 'post'], 'front', 'Pages@home');

// The books page
Route::get('postTypeArchive', array('bks-books', 'uses' => 'Books@archive'));

// Single book page
Route::get('singular', array('bks-books', 'uses' => 'Books@single'));

// About page
Route::get('page', array('about', 'uses' => 'Pages@about'));

// Help page
Route::get('page', array('help', 'uses' => 'Pages@help'));

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
    return View::make('search');
});
