<?php
/*
Plugin Name: Themosis
Plugin URI: http://themosis.com/
Description: A framework for WordPress developers.
Version: 1.0
Author: Julien Lambé
Author URI: http://jlambe.be/en/
License: GPLv2
*/

/**
 * Define some globals used along the framework.
*/
/*----------------------------------------------------*/
// The directory separator
/*----------------------------------------------------*/
defined('DS') ? DS : define('DS', '/');

class THFWK_Themosis
{
	/**
	 * Framework bootstrap instance
	*/
	private static $instance = null;

	/**
	 * Framework version
	*/
	private $version = 1.0;

	/**
	 * Framework plugin directory name
	 * NOTE: Update this value if you want to change the plugin
	 * directory name.
	*/
	private $dir = 'themosis-core';

	private function __construct()
	{
		$this->load();
	}

	/**
	 * Init the framework classes
	*/
	public static function getInstance()
	{
		if (is_null(static::$instance)) {
	    	static::$instance = new static();
	    }
	 	return static::$instance;
	}

	/**
	 * Load the framework classes
	*/
	private function load()
	{
		require 'vendor/autoload.php';
	}

	/**
	 * Get the plugin directory name
	 *
	 * @return string
	*/
	public function getDir()
	{
		return $this->dir;
	}
}

/**
 * Load the main class
*/
add_action('plugins_loaded', function(){

	$GLOBALS['THFWK_Themosis'] = THFWK_Themosis::getInstance();

});

?>