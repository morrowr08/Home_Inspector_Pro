<?php

/**
 * Base Controller
 */
abstract class BaseController {

	/**
	 * Controller View
	 */
	public $view;

	/**
	 * Controllers must implement these methods
	 */
	abstract protected function set_view();
	abstract protected function init();

	/**
	 * Constructor
	 */
	public function __construct() {
		ob_start();
		$this->set_view();
		$this->init();
	}

	/**
	 * Render
	 */
	protected function render() {
		echo $this->view;
	}

	/**
	 * Destructor (Render)
	 */
	public function __destruct() {
		$this->render();
	}

}