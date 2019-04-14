<?php

/**
 * Default post thumbnail size.
 */
Action::add('init', function () {
    set_post_thumbnail_size(620, 200, true);
});

Action::add('after_setup_theme', function () {
    add_theme_support('title-tag');
});
