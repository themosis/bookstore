<?php

/**
 * Plugin Name: Books Manager
 * Plugin URI: http://bookstore.dev/
 * Description: Bookstore custom plugin in order to handle a collection of books.
 * Version: 1.0.0
 * Author: Themosis
 * Author URI: http://framework.themosis.com/
 * Text Domain: books-manager
 * Domain Path: /languages
 */

/**
 * Use statements. Add any useful class import
 * below.
 */
use Composer\Autoload\ClassLoader;

/*
 * Default constants.
 */
defined('DS') ? DS : define('DS', DIRECTORY_SEPARATOR);

/*
 * Always define the following constant to help you handle
 * your plugin text domain. Make sure to define the same value as
 * the one defined in the plugin header comments text domain.
 *
 * Please update (search and replace) all constants calls found in this file.
 *
 * TODO: #1
 * TODO: #2 - Update plugin textdomain first argument below.
 */
defined('BOOKS_MANAGER_TD') ? BOOKS_MANAGER_TD : define('BOOKS_MANAGER_TD', 'books-manager');

/*
 * Plugin variables.
 * Configure your plugin.
 *
 * TODO: #3 - Define your own values.
 * TODO: #4 - Update the config files names located into the `resources/config` folder.
 * TODO: #5 - Update class namespaces.
 */
$vars = [
    'slug' => 'books-manager',
    'name' => 'Books Manager',
    'namespace' => 'dev.bookstore.books',
    'config' => 'dev_bookstore_books',
];

/*
 * Verify that the main framework is loaded.
 */
add_action('admin_notices', function () use ($vars) {
    if (!class_exists('\Themosis\Foundation\Application')) {
        printf('<div class="notice notice-error"><p>%s</p></div>', __('This plugin requires the Themosis framework in order to work.', BOOKS_MANAGER_TD));
    }

    /*
     * Define your plugin theme support key. Once defined, make sure to add the key
     * into your theme `supports.config.php` in order to remove this admin notice.
     */
    if (!current_theme_supports($vars['slug']) && current_user_can('switch_themes')) {
        printf('<div class="notice notice-warning"><p>%s<strong>%s</strong></p></div>', __('Your application do not handle the following plugin: ', BOOKS_MANAGER_TD), $vars['name']);
    }
});

/*
 * Setup the plugin paths.
 */
$paths['plugin.'.$vars['namespace']] = __DIR__.DS;
$paths['plugin.'.$vars['namespace'].'.resources'] = __DIR__.DS.'resources'.DS;
$paths['plugin.'.$vars['namespace'].'.admin'] = __DIR__.DS.'resources'.DS.'admin'.DS;

themosis_set_paths($paths);

/*
 * Setup plugin config files.
 */
container('config.finder')->addPaths([
    themosis_path('plugin.'.$vars['namespace'].'.resources').'config'.DS,
]);

/*
 * Autoloading.
 */
$loader = new ClassLoader();
$classes = container('config.factory')->get($vars['config'].'_loading');
foreach ($classes as $prefix => $path) {
    $loader->addPsr4($prefix, $path);
}
$loader->register();

/*
 * Register plugin public assets folder [dist directory].
 */
container('asset.finder')->addPaths([
    plugins_url('dist', __FILE__) => themosis_path('plugin.'.$vars['namespace']).'dist',
]);

/*
 * Register plugin views.
 */
container('view.finder')->addLocation(themosis_path('plugin.'.$vars['namespace'].'.resources').'views');

/*
 * Update Twig Loader registered paths.
 */
container('twig.loader')->setPaths(container('view.finder')->getPaths());

/*
 * Service providers.
 */
$providers = container('config.factory')->get($vars['config'].'_providers');

foreach ($providers as $provider) {
    container()->register($provider);
}

/*
 * Admin files autoloading.
 * I18n.
 */
container('action')->add('plugins_loaded', function () use ($vars) {

	/**
	 * I18n
	 * Todo: #2 - Replace constant below.
	 */
	load_plugin_textdomain(BOOKS_MANAGER_TD, false, trailingslashit(dirname(plugin_basename(__FILE__))).'languages');

    /*
     * Plugin admin files.
     * Autoload files in alphabetical order.
     */
    $loader = container('loader')->add([
        themosis_path('plugin.'.$vars['namespace'].'.admin'),
    ]);

    $loader->load();

});

/*
 * Add extra features below.
 */
