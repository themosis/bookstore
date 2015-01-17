<?php

/**
 * application.php - Write your custom code below.
 */
/*-----------------------------------------------------------------------*/
// Global assets
/*-----------------------------------------------------------------------*/
// CSS
Asset::add('bookstore-main-styles', 'css/screen.css', false, '1.0', 'all');

// JS
Asset::add('bks-modernizr', 'js/library/modernizr.js', false, '2.7.1');
Asset::add('bks-main', 'js/main.js', array('jquery'), '1.0', true);

/*-----------------------------------------------------------------------*/
// Default post thumbnail size
/*-----------------------------------------------------------------------*/
add_action('init', function()
{
    set_post_thumbnail_size(620, 200, true);
});

/*-----------------------------------------------------------------------*/
// Filter search results
/*-----------------------------------------------------------------------*/
add_filter('pre_get_posts', function($query)
{
    if ($query->is_search && !is_admin())
    {
        $query->set('post_type',array('bks-books'));
    }

    return $query;
});