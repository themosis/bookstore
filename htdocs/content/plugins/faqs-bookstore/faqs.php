<?php

/**
 * Plugin Name: Faqs
 * Plugin URI: http://www.domain.tld
 * Plugin Prefix: faqs
 * Plugin ID: faqs
 * Description: Plugin in order to manage a collection of faqs
 * Version: 1.0.0
 * Author: Themosis
 * Author URI: https://framework.themosis.com/
 * Text Domain: faqs
 * Domain Path: languages
 * Domain Var: FAQS_TD
 * License: GPL-2.0-or-later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

use Themosis\Core\Application;

/*
|--------------------------------------------------------------------------
| Bootstrap Plugin
|--------------------------------------------------------------------------
|
| We bootstrap the plugin. The following code is loading your plugin
| configuration and resources.
*/
$plugin = (Application::getInstance())->loadPlugin(__FILE__, 'config');

/*
|--------------------------------------------------------------------------
| Plugin i18n | l10n
|--------------------------------------------------------------------------
|
| Registers the "languages" directory for storing the plugin translations.
| The plugin text domain constant name is the plugin "Domain Var" header
| and its value the "Text Domain" header.
*/
load_themosis_plugin_textdomain(
    $plugin->getHeader('text_domain'),
    $plugin->getPath($plugin->getHeader('domain_path'))
);

/*
|--------------------------------------------------------------------------
| Plugin Assets Locations
|--------------------------------------------------------------------------
|
| You can define your plugin assets paths and URLs. You can add as many
| locations as you want. The key is your asset directory path and
| the value is its public URL.
*/
$plugin->assets([
    $plugin->getPath('dist') => $plugin->getUrl('dist')
]);

/*
|--------------------------------------------------------------------------
| Plugin Views
|--------------------------------------------------------------------------
|
| Register the plugin "views" directory. You can configure the list of
| view directories from the "config/prefix_plugin.php" configuration file.
*/
$plugin->views($plugin->config('plugin.views', []));

/*
|--------------------------------------------------------------------------
| Plugin Service Providers
|--------------------------------------------------------------------------
|
| Register the plugin "views" directory. You can configure the list of
| view directories from the "config/prefix_plugin.php" configuration file.
*/
$plugin->providers($plugin->config('plugin.providers', []));

/*
|--------------------------------------------------------------------------
| Plugin Includes
|--------------------------------------------------------------------------
|
| Auto includes files by providing one or more paths. By default, we setup
| an "inc" directory within the plugin. Use that "inc" directory to extend
| your WordPress application. Nested files are also included.
*/
$plugin->includes([
    $plugin->getPath('inc')
]);
