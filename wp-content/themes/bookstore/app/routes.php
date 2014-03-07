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
Route::is('front', 'home@index');

// The books page
Route::only('postTypeArchive', 'bks-books', 'books@index');

// Single book page
Route::only('singular', 'bks-books', function(){

	return View::make('pages.book');

});

// About page
Route::only('page', 'about', function(){

	return View::make('pages.about');

});

// Help page
Route::only('page', 'help', function(){

	return View::make('pages.help');

});

// News page or the WordPress 'home' page
Route::is('home', function(){

	return View::make('blog.news');

});

// Single post
Route::only('singular', 'post', function(){

	return View::make('blog.post');

});