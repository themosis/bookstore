<?php
/*-----------------------------------------------------------------------*/
// HELP PAGE CUSTOM DATAS
/*-----------------------------------------------------------------------*/
$help = get_page_by_path('help');

if (!empty($help) && themosisIsPost($help->ID)) {

	/*-----------------------------------------------------------------------*/
	// TEAM METABOX
	/*-----------------------------------------------------------------------*/
	Metabox::make('Infos', 'page')->set(array(

		Field::text('help-text', array('title' => 'Text', 'info' => 'Tip text.'))
		
	));

}

add_action('init', function() use ($help){

	if (!empty($help) && themosisIsPost($help->ID)) {
		remove_post_type_support('page', 'editor');
	}

});

/*-----------------------------------------------------------------------*/
// FAQs CUSTOM POST TYPE
/*-----------------------------------------------------------------------*/
PostType::make('bks-faqs', 'FAQs')->set(array(

	'supports'	=> array('title', 'editor')

));

/*-----------------------------------------------------------------------*/
// FAQs DEFAULT TITLE PLACEHOLDER
/*-----------------------------------------------------------------------*/
function bks_change_title($title){

	$screen = get_current_screen();
	 
	if ('bks-faqs' == $screen->post_type ){
		$title = 'Enter the question here';
	}
	 
	return $title;
}
 
add_filter('enter_title_here', 'bks_change_title');

?>