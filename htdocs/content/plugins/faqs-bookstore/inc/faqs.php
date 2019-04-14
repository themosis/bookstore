<?php

// Register the FAQ custom post type.
PostType::make('th-faqs', __('FAQs', FAQS_TD), __('FAQ', FAQS_TD))
    ->setArguments([
        'public' => false,
        'show_ui' => true,
        'menu_icon' => 'dashicons-welcome-learn-more',
        'supports' => ['title', 'editor']
    ])
    ->setTitlePlaceholder(__('Enter your question here...', FAQS_TD))
    ->set();
