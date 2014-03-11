<?php defined('DS') or die('No direct script access.');

/*
* Define your routes and which views to display
* depending of the query.
*
* Based on Wordpress conditional tags from the Wordpress Codex
* http://codex.wordpress.org/Conditional_Tags 
*
*/
// The front page
Route::is('front', 'home@index');

// The books page
Route::only('postTypeArchive', 'bks-books', 'books@index');

// Single book page
Route::only('singular', 'bks-books', 'book@index');

// About page
Route::only('page', 'about', 'about@index');

// Help page
Route::only('page', 'help', 'help@index');

// News page or the WordPress 'home' page
Route::is('home', function(){

	return View::make('blog.news');

});

// Single post
Route::only('singular', 'post', function(){

	global $post;

	// Get latest news
	$query = new WP_Query(array(

		'post_type' 		=> 'post',
		'posts_per_page'	=> 2

	));

	$results = $query->get_posts();

	return View::make('blog.post', array(
		'article'	=> $post,
		'news'		=> $results,
		'newspage'	=> get_page_by_path('news')
	));

});

// Search page
Route::is('search', function(){

	return View::make('search', array('search' => $_GET['s']));

});