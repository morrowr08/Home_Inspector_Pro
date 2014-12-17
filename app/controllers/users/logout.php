<?php

// Controller
class Controller extends AjaxController {
	protected function init() {

		Access::logout();
		header('Location: /');
	}
}

$controller = new Controller();