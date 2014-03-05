<?php defined('DS') or die('No direct script access.');

/*
* Define your routes and which views to display
* depending of the query.
*
* Based on WordPress conditional tags from the WordPress Codex
* http://codex.wordpress.org/Conditional_Tags 
*
*/
// The front page
Route::is('front', function(){

    return View::make('pages.home');

});

// The books page
Route::only('postTypeArchive', 'bks-books', function(){

	return View::make('pages.books');

});

// Single book page
Route::only('singular', 'bks-books', function(){

	return View::make('pages.book');

});

// About page
Route::only('page', 'about', function(){

	return View::make('pages.about');

});