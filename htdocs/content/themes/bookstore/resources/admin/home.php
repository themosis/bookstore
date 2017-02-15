<?php

/**
 * Admin Home Page.
 * We define a custom field within a metabox in order to let the user
 * choose a book to promote on the home page.
 */
$home = (int) get_option('page_on_front');

if (themosis_is_post($home)) {
    $books = Books::find(['posts_per_page' => -1])->select()->get();

    // Metabox for the front page.
    Metabox::make(__('Promoted Book', THEME_TEXTDOMAIN), 'page')->set([
        Field::select('book-promo', [$books], [
            'title' => __('Book', THEME_TEXTDOMAIN),
            'info' => __('Select a book to promote on the home page.', THEME_TEXTDOMAIN),
        ])
    ]);
}

/*-----------------------------------------------------------------------*/
// Remove editor from home page.
/*-----------------------------------------------------------------------*/
Action::add('init', function () use ($home) {
    if (themosis_is_post($home)) {
        remove_post_type_support('page', 'editor');
    }
});
