<?php

/**
 * App Controller
 */
abstract class AppController extends BaseController {

	/**
	 * Set View
	 */
	protected function set_view() {
		$this->view = new DefaultView();
	}

	/**
	 * Render
	 */
	protected function render() {

		// Catch Output Buffer
		$this->view->main_content = trim(ob_get_contents());
		ob_end_clean();

		// Render View
		parent::render();
	}

}