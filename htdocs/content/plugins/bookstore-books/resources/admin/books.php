<?php

use Themosis\Facades\Field;
use Themosis\Facades\Metabox;
use Themosis\Facades\PostType;

/*
 * Register books custom post type.
 */
$books = PostType::make('bks-books', __("Books", BOOKS_MANAGER_TD), __("Book", BOOKS_MANAGER_TD))->set([
    'public' => true,
    'rewrite' => [
        'slug' => 'books',
    ],
    'supports' => ['title', 'editor', 'excerpt', 'thumbnail'],
    'menu_icon' => 'dashicons-book',
    'labels' => [
        'menu_name' => __("Books Manager", BOOKS_MANAGER_TD)
    ]
]);

/*
 * Add custom metabox in order to handle books information.
 */
$infos = Metabox::make(__("Informations", BOOKS_MANAGER_TD), $books->get('name'))->set([
    Field::text('author'),
    Field::media('promo-image', [
        'title' => __("Promo Image", BOOKS_MANAGER_TD),
        'info' => __("Image used on the home page in order to promote the book.", BOOKS_MANAGER_TD),
    ]),
    Field::color('color', [
        'info' => __("Please choose a book highlight color.", BOOKS_MANAGER_TD)
    ])
]);

/*
 * Sanitize custom fields values.
 */
$infos->validate([
    'author' => ['textfield', 'min:5'],
    'color' => ['color'],
]);
