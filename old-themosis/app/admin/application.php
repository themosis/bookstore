<?php

/*-----------------------------------------------------------------------*/
// COMMON ASSETS
/*-----------------------------------------------------------------------*/
// CSS
Asset::add('bookstore-main-styles', 'css/screen.css', false, '1.0', 'all');

// JS
Asset::add('bks-modernizr', 'js/vendor/modernizr.js', false, '2.7.1');
Asset::add('bks-main', 'js/main.js', array('jquery'), '1.0', true);

/*-----------------------------------------------------------------------*/
// CUSTOM IMAGE SIZES
/*-----------------------------------------------------------------------*/
add_action('init', function(){

	add_image_size('book-promo', 399, 435, true);
	add_image_size('book-featured-image', 266, 146, true);
	add_image_size('member-pic', 104, 104, true);

	// Default featured image size
	set_post_thumbnail_size(620, 200, true);

});

/*-----------------------------------------------------------------------*/
// ADD SIZES TO MEDIA UPLOADER
/*-----------------------------------------------------------------------*/
add_filter('image_size_names_choose', function($mediaSizes){

	$sizes = array(
    	'book-promo' 			=> __('Book promo', THEMOSISTHEME_TEXTDOMAIN),
    	'book-featured-image' 	=> __('Book featured image', THEMOSISTHEME_TEXTDOMAIN),
    	'member-pic' 			=> __('Team profile', THEMOSISTHEME_TEXTDOMAIN)
	);

   return array_merge($mediaSizes, $sizes);
});

/*-----------------------------------------------------------------------*/
// FILTER SEARCH RESULTS
/*-----------------------------------------------------------------------*/
function bks_searchfilter($query) {

    if ($query->is_search && !is_admin() ) {
        $query->set('post_type',array('bks-books'));
    }

	return $query;
}

add_filter('pre_get_posts','bks_searchfilter');