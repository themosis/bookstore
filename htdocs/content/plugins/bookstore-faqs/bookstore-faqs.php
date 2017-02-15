<?php

/**
 * Plugin Name: Bookstore Faqs
 * Plugin URI: http://bookstore.dev/
 * Description: Bookstore FAQs.
 * Version: 1.0.0
 * Author: Themosis
 * Author URI: http://framework.themosis.com/
 * Text Domain: bookstore-faqs
 * Domain Path: /languages
 */

/**
 * Example of a minimalist plugin using some of the framework API
 * and the Composer auto-loader.
 */
use Composer\Autoload\ClassLoader;
use Themosis\Facades\PostType;

/**
 * Plugin textdomain.
 */
defined('BOOKSTORE_FAQS_TD') ? BOOKSTORE_FAQS_TD : define('BOOKSTORE_FAQS_TD', 'bookstore-faqs');

/**
 * Autoload our plugin custom classes.
 */
$loader = new ClassLoader();
$loader->addPsr4('Dev\\Bookstore\\Faqs\\', plugin_dir_path(__FILE__).'src');
$loader->register();

/**
 * FAQs custom post type.
 * The custom post type is private as we don't want to generate permalinks for it
 * and simply use a default page with a dedicated template.
 */
add_action('plugins_loaded', function () {

    $faqs = PostType::make('bks-faqs', __("Faqs", BOOKSTORE_FAQS_TD), __("Faq", BOOKSTORE_FAQS_TD))->set([
        'supports'  => ['title', 'editor'],
        'public'    => false,
        'show_ui'   => true,
        'menu_icon' => 'dashicons-welcome-learn-more'
    ]);

    /*
     * Define a custom placeholder title for faqs.
     */
    $faqs->setTitle(__("Enter your question here...", BOOKSTORE_FAQS_TD));

});