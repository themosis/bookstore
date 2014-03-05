<?php

/*-----------------------------------------------------------------------*/
// HOME PAGE CUSTOM DATAS
/*-----------------------------------------------------------------------*/
$home = get_page_by_path('home');

if (themosisIsPost($home->ID)) {
	
	/*-----------------------------------------------------------------------*/
	// PROMO METABOX
	/*-----------------------------------------------------------------------*/
	Metabox::make('Book promo', 'page')->set(array(

		Field::select('book-promo', array(bks_getPromoBooks()), false, array('title' => 'Book', 'info' => 'Choose the book you want to promote on the home page.'))

	));
}

add_action('init', function() use ($home){

	if (themosisIsPost($home->ID)) {
		remove_post_type_support('page', 'editor');
	}

});

?>