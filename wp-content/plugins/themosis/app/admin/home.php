<?php

/*-----------------------------------------------------------------------*/
// HOME PAGE CUSTOM DATAS
/*-----------------------------------------------------------------------*/
$home = get_page_by_path('home');

add_action('admin_init', function() use($home){

	if (!empty($home) && themosisIsPost($home->ID)) {
		
		/*-----------------------------------------------------------------------*/
		// PROMO METABOX
		/*-----------------------------------------------------------------------*/
		Metabox::make('Book promo', 'page')->set(array(

			Field::select('book-promo', array(Books::adminPromoBooks()), false, array('title' => 'Book', 'info' => 'Choose the book you want to promote on the home page.'))

		));
	}
});

add_action('init', function() use ($home){

	if (!empty($home) && themosisIsPost($home->ID)) {
		remove_post_type_support('page', 'editor');
	}

});

?>