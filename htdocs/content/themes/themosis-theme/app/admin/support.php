<?php

/*-----------------------------------------------------------------------*/
// FAQ custom post type.
/*-----------------------------------------------------------------------*/
$faq = PostType::make('bks-faqs', 'FAQs', 'FAQ')->set(array(

    'supports'  => array('title', 'editor'),
    'public'    => false,
    'show_ui'   => true

));

/*-----------------------------------------------------------------------*/
// Set default title placeholder text.
/*-----------------------------------------------------------------------*/
$faq->setTitle('Enter your question here...');