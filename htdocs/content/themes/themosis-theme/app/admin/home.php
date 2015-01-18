<?php

/*-----------------------------------------------------------------------*/
// Home/Front page.
/*-----------------------------------------------------------------------*/
$home = (int)get_option('page_on_front');

if (themosis_is_post($home))
{
    $books = new Books();

    // Metabox for the front page.
    Metabox::make('Book promo', 'page')->set(array(

        Field::select('book-promo', array($books->published()), false, array(
            'title' => 'Book',
            'info'  => 'Choose a book to promote on the home page.'
        ))

    ));
}

/*-----------------------------------------------------------------------*/
// Remove editor from home page.
/*-----------------------------------------------------------------------*/
add_action('init', function() use($home)
{
    if (themosis_is_post($home))
    {
        remove_post_type_support('page', 'editor');
    }
});