<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		// Email client link to report page
		$to = $_POST['email'];
		$report_id = $_POST['report_id'];
		$name = $_POST['first_name'] . ' ' . $_POST['last_name'];
		$access_code = $_POST['access_code'];
		$address = $_POST['address'];
		$subject = 'Inspection report for ' . $address;
		$message = <<<EMAIL

		Hello $name,

		I have provided a link to your inspection report for address: $address. 

		Please click <a href="http://hip.com/client_report?report_id=$report_id&access_code=$access_code">here</a> to view your report. 

		Please feel free to leave any comments you may have about the report and I will get back to you at my earliest convienence. 
		
		Thank you for your business, 

		Michael Morrow
		Home Inspector
		morrowmish@cox.net
		(623)853-5369

EMAIL;

if($_POST) {
	mail($to, $subject, $message);
}

	 // Redirect back to dasboard page
	// header("Location: /dashboard");



	}
}
$controller = new Controller();


