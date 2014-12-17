<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		//validate user credentials here

		$user_id = $_POST['user_id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$address = $_POST['address'];
		$access_code = $_POST['access_code'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];


		if (!empty($report_id)) {

			$report = new Report($report_id);

			$this->view['user_id'] = htmlentities($report->user_id);
			$this->view['first_name'] = htmlentities($report->first_name);
			$this->view['last_name'] = htmlentities($report->last_name);
			$this->view['address'] = htmlentities($report->address);
			$this->view['access_code'] = htmlentities($report->access_code);
			$this->view['email'] = htmlentities($report->email);
			$this->view['phone_number'] = htmlentities($report->phone_number);
		} else {
			$this->view['report_id'] = FALSE;
		}
	}
}
$controller = new Controller();
