<?php

/**
 * application.php - Write your custom code below.
 */
/*-----------------------------------------------------------------------*/
// Default post thumbnail size
/*-----------------------------------------------------------------------*/
add_action('init', function()
{
    set_post_thumbnail_size(620, 200, true);
});