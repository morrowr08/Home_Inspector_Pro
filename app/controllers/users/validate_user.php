<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		//validate user credentials here

		$email = $_POST['email'];
		$password = md5($_POST['password']);


		if (!empty($user_id)) {

			$user = new User($user_id);

			$this->view['user_id'] = htmlentities($user->user_id);
			$this->view['email'] = htmlentities($user->email);
			$this->view['first_name'] = htmlentities($user->first_name);
			$this->view['last_name'] = htmlentities($user->last_name);
		} else {
			$this->view['user_id'] = FALSE;
		}
	}
}
$controller = new Controller();
