<?php

/**
 * Default post thumbnail size.
 */
Action::add('init', function () {
    set_post_thumbnail_size(620, 200, true);
});

/**
 * Filter search results to only
 * look after the books posts.
 */
Filter::add('pre_get_posts', function ($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', ['bks-books']);
    }

    return $query;
});

Action::add('after_setup_theme', function () {
    add_theme_support('title-tag');
});
