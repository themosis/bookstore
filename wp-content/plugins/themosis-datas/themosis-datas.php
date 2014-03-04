<?php
/*
Plugin Name: Themosis-Datas
Plugin URI: http://www.themosis.com/
Description: Site specific plugin. Used to handle the datas of the application. Must be used with the core Themosis plugin.
Version: 1.0
Author: Julien Lambé
Author URI: http://www.jlambe.be/en/
License: GPLv2
*/
/*----------------------------------------------------
| Define some globals used along the framework.
|
|
|
|
|
|---------------------------------------------------*/

// The directory separator
defined('DS') ? DS : define('DS', '/');

// Textdomain
defined('THEMOSISDATA_TEXTDOMAIN') ? THEMOSISDATA_TEXTDOMAIN : define('THEMOSISDATA_TEXTDOMAIN', 'ThemosisDatas');

/*----------------------------------------------------
| Datas Class.
|
|
|
|
|
|---------------------------------------------------*/
if (!class_exists('THFWK_ThemosisDatas')) {
    class THFWK_ThemosisDatas
    {
        /**
         * The core plugin directory name. This is
         * the only dependency for the datas in order
         * to check if the core plugin is installed and
         * activated.
         * Change only this property if you have changed
         * the core plugin folder's name.
         * (Default name is: themosis-core)
         *
        */
        const coreDirectory = 'themosis-core';

        /**
    	 * Data plugin instance
    	*/
    	private static $instance = null;

    	/**
         * Data plugin path
    	*/
    	private $path = '';

    	/**
         * Data plugin folder name
    	*/
    	private $dirName = '';

        /**
         * Avoid user to instantiate the class
        */
        private function __construct()
        {
            $this->path = realpath(__DIR__.DS.'themosis-datas.php');

            $this->dirName = $this->setDirName(__DIR__);
        }

        /**
         * Set the plugin directory property. This property
         * is used as 'key' in order to retrieve the plugins
         * informations.
         *
         * @param string
         * @return string
        */
        private function setDirName($path)
        {
        	$dirName = explode('plugins', $path);
        	$dirName = substr($dirName[1], 1);

        	return $dirName;
        }

        /**
    	 * Init the datas class.
    	*/
    	public static function getInstance()
    	{
    		if (is_null(static::$instance)) {
    	    	static::$instance = new static();
    	    }
    	 	return static::$instance;
    	}

    	/**
         * Check if the core plugin is active or not
         * Return TRUE if active, FALSE if not.
         * Only give the filename.php as a parameter.
         *
         * @param string - the plugin filename ('filename.php')
         * @return boolean
    	*/
    	public function isCoreActive($filename)
    	{
    		$loaded = is_plugin_active($this::coreDirectory.DS.$filename);

    		return $loaded;
    	}

    	/**
         * GETTER - Allow the user to retrieve the plugin path
         * in order to perform activation or deactivation
         * of the plugin.
         *
         * @return string
    	*/
    	public function getPath()
    	{
    		return $this->path;
    	}

    	/**
         * GETTER - The user can retrieve the plugin informations
         * (Name, Plugin URI, Author,...)
         *
         * @return array
    	*/
    	public function getInfos()
    	{
    	    $infos = get_plugin_data(__FILE__);

    		return $infos;
    	}

    }
}

/**
 * Helper function to retrieve the path.
 *
 * @param string
*/
function themosis_path($name){
	return $GLOBALS['themosis_paths'][$name];
}

/*----------------------------------------------------
| When plugins are loaded, check if core Themosis plugin
| is active or not.
|
|
|
|
|
|---------------------------------------------------*/
add_action('admin_init', function(){

    // Return the unique instance of the datas class
	$datas = THFWK_ThemosisDatas::getInstance();

	// Check if Themosis Core plugin is active
	/*
     * If not active, deactivate the datas plugin. Else
     * make core classes accessible (alias) and parse the
     * application datas. (outside the 'plugins_loaded' hook)
	*/
	if (!$datas->isCoreActive('themosis.php')) {

        // Core is not active, so deactivate the datas plugin.
        deactivate_plugins($datas->getPath());

        /**
         * Display a message to explain why the plugin is automatically
         * deactivated.
        */
        add_action('admin_notices', function() use ($datas){

            $infos = $datas->getInfos();

            ?>
                <div id="message" class="error">
                    <p><?php _e("You first need to activate the <b>Themosis</b> (core) plugin in order to activate <b>{$infos['Name']}</b> plugin.", THEMOSISDATA_TEXTDOMAIN); ?></p>
                </div>
            <?php
        });

	}

});

/*----------------------------------------------------
| Once the theme is setup, we can work with the framework.
| The code below define all framework paths needed to run
| the framework.
|
|
|
|
|
|---------------------------------------------------*/
add_action('after_setup_theme', function(){

    /**
    * Define all framework paths
    * These are real paths, not URLs to the framework files.
    * These paths are extensibles with the help of Wordpress
    * filters.
    */
    // All framework paths
    $paths = apply_filters('themosis_framework_paths', array());

    // System path - Core framework directory
    $corePath = explode('plugins', __DIR__);
    $corePath = $corePath[0].'plugins'.DS.THFWK_ThemosisDatas::coreDirectory.DS.'src'.DS.'Themosis';

    $paths['sys'] = realpath($corePath).DS;

    // Website datas - This plugin app folder
    $paths['datas'] = realpath(__DIR__.DS.'app').DS;

    // Register globally the paths
    foreach ($paths as $name => $path) {
       if(!isset($GLOBALS['themosis_paths'][$name])){
           $GLOBALS['themosis_paths'][$name] = $path;
       }
    }

    /*----------------------------------------------------
    | Awake from the dead - Make core framework classes
    | available to the App plugin and the Theme.
    |
    |
    |
    |
    |
    |---------------------------------------------------*/
    $datas = THFWK_ThemosisDatas::getInstance();

    if (isset($GLOBALS['THFWK_Themosis'])) {

        require_once themosis_path('sys').'Core'.DS.'Start.php';

    }

});

?>