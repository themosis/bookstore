<?php

return [

	/*
	* Edit this file to add widget sidebars to your theme. 
	* Place WordPress default settings for sidebars.
	* Add as many as you want, watch-out your commas!
	*/
	[
		'name'			=> 'Blog',
		'id'			=> 'blog-sidebar',
		'description'	=> 'Blog sidebar.',
		'before_widget'	=> '<div class="sidebar--widget"><div class="sidebar--widget__content">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'
    ]

];