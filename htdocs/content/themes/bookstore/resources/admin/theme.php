<?php

/**
 * Default post thumbnail size.
 */
add_action('init', function () {
    set_post_thumbnail_size(620, 200, true);
});

/**
 * Filter search results to only
 * look after the books posts.
 */
add_filter('pre_get_posts', function ($query) {
    if ($query->is_search && !is_admin()) {
        $query->set('post_type', ['bks-books']);
    }

    return $query;
});
