<?php

use Dev\Bookstore\Books\Models\Books;
use Theme\Models\Posts;

/*
 * Define your routes and which views to display
 * depending on the query.
 *
 * Based on WordPress conditional tags from the WordPress Codex
 * http://codex.wordpress.org/Conditional_Tags
 *
 */

/**
 * Custom routes.
 *
 * None defined for this project but if you want to add custom routes,
 * ALWAYS put them before the WordPress ones.
 */

/**
 * WordPress routes.
 */

/*
 * Default archive pages.
 *
 * @param \WP_Post $post
 * @param \WP_Query $query
 *
 * @return string
 */
Route::match(['get', 'post'], 'archive', function ($post, \WP_Query $query) {
    return view('twig.blog.news', [
        'articles' => $query->get_posts(),
        'title' => get_the_archive_title()
    ]);
});

/*
 * Search books page.
 *
 * @param \WP_Post $post
 * @param \WP_Query $query
 *
 * @return string
 */
Route::match(['get', 'post'], 'search', function($post, \WP_Query $query)
{
    return view('twig.books.search', [
        'books' => $query->get_posts(),
        'searched_terms' => Input::get('s')
    ]);
});
