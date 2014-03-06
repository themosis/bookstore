<?php

/*-----------------------------------------------------------------------*/
// ABOUT PAGE CUSTOM DATAS
/*-----------------------------------------------------------------------*/
$about = get_page_by_path('about');

if (themosisIsPost($about->ID)) {

	/*-----------------------------------------------------------------------*/
	// TEAM METABOX
	/*-----------------------------------------------------------------------*/
	Metabox::make('Team', 'page')->set(array(

		Field::infinite('collaborators', array(

			Field::text('full-name', array('title' => 'Full name')),
			Field::text('job'),
			Field::media('pic', array('info' => 'Select <b>Team</b> size for the image.'))

		), array('title' => 'Members', 'info' => 'Set your collaborator list.'))

	));

}

?>