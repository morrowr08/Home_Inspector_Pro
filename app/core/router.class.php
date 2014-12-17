<?php

/**
 * Router
 */
class Router {

	// Save Routes
	private static $routes = [];

	/**
	 * Route the current request
	 */
	public static function route() {

		// Get Path and Method
		list($path, $q) = explode('?', $_SERVER['REQUEST_URI']);
		$path = self::clean_path($path);
		
		// Find File in Routes
		$file = self::$routes[$path];

		// Get File if Exists
		if (!empty($file) && file_exists(ROOT . $file)) {
			include(ROOT . $file);
			exit();
		} else {
			echo $path . ' Doesn\'t exist';
			http_response_code('404');
			exit();
		}

	}

	/**
	 * Add Route
	 */
	public static function add($path, $file) {
		$path = self::clean_path($path);
		self::$routes[$path] = $file;
	}

	/**
	 * Clean Path
	 */
	private static function clean_path($path) {
		return '/' . strtolower(trim($path, '/'));
	}

}