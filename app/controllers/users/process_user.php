<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		
		//process api request for new user
		// need to add validation here
		$safe_values = Validator::validate($_POST);
		//check valuesif values are good
		if (!$safe_values['ERROR']) {//IF VALID DATA THEN

			$user = new User($safe_values);
			
			if (Access::login($user->email, $user->password)) {
				$this->view['logged_in'] = true;
			};
			

			
		} else {
			//return validation error
			$this->view['ERROR'] = $safe_values['ERROR'];
		}

	}
}
$controller = new Controller();
