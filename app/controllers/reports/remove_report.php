<?php

// Controller
class Controller extends AppController {
	protected function init() {

	$report_id = $_GET['report_id'];
	$user_id = $_GET['user_id'];

	if ($user_id = Access::check()) {

		$sql = "
			DELETE 
			FROM report
			WHERE user_id = {$user_id}
			AND report_id = {$report_id}
		";

		db::execute($sql);

	}


	// Redirect back to dasboard page
	header("Location: /dashboard");
	exit();

	}
}
$controller = new Controller();
