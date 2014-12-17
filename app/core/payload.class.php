<?php

/**
 * Payload
 */
class Payload {

	/**
	 * Payload Variables
	 */
	private static $settings;


	/****************************************
	  SETTINGS
	*****************************************/

	/**
	 * Set Setting
	 */
	public static function add($name, $value) {
		self::$settings[$name] = ($value === 0) ? '0' : $value;	
	}
	
	/**
	 * Get Settings
	 */
	public static function get_settings() {
		self::add('live_site', LIVE_SITE);
		return json_encode(self::$settings);
	}

}