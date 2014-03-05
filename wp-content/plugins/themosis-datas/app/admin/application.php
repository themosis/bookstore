<?php

/*-----------------------------------------------------------------------*/
// COMMON ASSETS
/*-----------------------------------------------------------------------*/
// CSS
Asset::add('bookstore-main-styles', 'css/screen.css', false, '1.0', 'all');

// JS
Asset::add('bks-modernizr', 'js/vendor/modernizr.js', false, '2.7.1');

/*-----------------------------------------------------------------------*/
// CUSTOM IMAGE SIZES
/*-----------------------------------------------------------------------*/
add_action('init', function(){

	add_image_size('book-promo', 399, 435, true);	

});

/*-----------------------------------------------------------------------*/
// ADD SIZES TO MEDIA UPLOADER
/*-----------------------------------------------------------------------*/
add_filter('image_size_names_choose', function($mediaSizes){

	$sizes = array(
    	'book-promo' => __('Book promo', THEMOSISTHEME_TEXTDOMAIN)
	);

   return array_merge($mediaSizes, $sizes);
});