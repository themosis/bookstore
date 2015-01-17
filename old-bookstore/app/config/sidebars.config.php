<?php defined('DS') or die('No direct script access.');

return array(

	/*
	* Edit this file to add widget sidebars to your theme. 
	* Place wordpress default settings for sidebars.
	* Add as many as you want, watchout your commas!
	*/
	array(

		'name'			=> 'Blog',
		'id'			=> 'blog-sidebar',
		'description'	=> 'Blog sidebar.',
		'before_widget'	=> '<div class="sidebar--widget"><div class="sidebar--widget__content">',
		'after_widget'	=> '</div></div>',
		'before_title'	=> '<h3>',
		'after_title'	=> '</h3>'

	)

);

?>