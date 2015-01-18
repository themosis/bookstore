<?php

$about = get_page_by_path('about');

if (themosis_is_post($about->ID))
{
    /*-----------------------------------------------------------------------*/
    // TEAM METABOX
    /*-----------------------------------------------------------------------*/
    Metabox::make('Team', 'page')->set(array(

        Field::infinite('collaborators', array(
            Field::text('full-name', array('title' => 'Full name')),
            Field::text('job'),
            Field::media('pic')
        ), array('title' => 'Collaborateurs'))

    ));
}