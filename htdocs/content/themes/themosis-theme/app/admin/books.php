<?php

/*-----------------------------------------------------------------------*/
// Custom post type - bks-books
/*-----------------------------------------------------------------------*/
$books = PostType::make('bks-books', 'Books', 'Book')->set(array(

    'rewrite'   => array(
        'slug'      => 'books'
    ),
    'supports'  => array('title', 'editor', 'excerpt', 'thumbnail')

));

/*-----------------------------------------------------------------------*/
// Book informations
/*-----------------------------------------------------------------------*/
$infos = Metabox::make('Informations', $books->getSlug())->set(array(

    Field::text('author'),
    Field::media('promo-image', array(
        'title' => 'Image promotion',
        'info'  => 'Image used on home page in order to promote the book.'
    )),
    Field::text('color', array(
        'info'  => 'Insert a hexadecimal color value: <b>#cdcdcd</b>'
    ))

));

/*-----------------------------------------------------------------------*/
// Book info validation
/*-----------------------------------------------------------------------*/
$infos->validate(array(
    'author'    => array('textfield', 'min:5'),
    'color'     => array('color')
));