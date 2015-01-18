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
Route::get('page', array('about', 'uses' => 'about@index'));

// Help page
Route::get('page', array('help', 'uses' => 'help@index'));

// News page or the WordPress 'home' page
Route::get('home', function()
{
    return View::make('blog.news');
});

// Single post
Route::get('singular', array('post', function($post)
{
    return View::make('blog.post', array(
        'article'	=> $post,
        'news'		=> News::get(),
        'newspage'	=> get_page_by_path('news')
    ));
}));

// Search page
Route::get('search', function()
{
    return View::make('search', array('search' => $_GET['s']));
});
