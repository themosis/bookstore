<?php

// Book custom post type
PostType::make('bks-books', 'Books')->set(array(

	'rewrite'	=> array(
		'slug'	=> 'books'
		)

));