<?php

// Controller
class Controller extends AjaxController {
	protected function init() {

		if(isset($_FILES['report_document'])) {
			$report_document = $_FILES['report_document'];
			
			// File Properties
			$file_name = $report_document['name'];
			$file_tmp = $report_document['tmp_name'];
			$file_size = $report_document['size'];
			$file_error = $report_document['error'];

			// File extension
			$file_ext = explode('.', $file_name);
			$file_ext = strtolower(end($file_ext));

			// Allowed files
			$allowed = ['doc', 'docx', 'pdf'];

			// Checks to see if file extension is allowed
			if(in_array($file_ext, $allowed)){
				if($file_error === 0){
					if($file_size <= (1024 * 1024 * 9)){

						$file_name_new = uniqid('', TRUE) . '.' . $file_ext;
						$file_destination = 'pdf/' . $file_name_new;
						$_POST['report_document'] = '../pdf/' . $file_name_new;
						
						if(move_uploaded_file($file_tmp, $file_destination)){
							$upload_message = 'File upload successfull';
						} else {
							$upload_message = 'File upload unsuccessful';
						}
					} else {
						// TODO error file size
						$upload_message = 'File size too large';
					}
				} else {
					// TODO error file error
					$upload_message = 'File error';
				}
			} else {
				// TODO file extension allowed
				$upload_message = 'File type not allowed. Only .txt, .doc, .docx, & .pdf are accepted.';
			}
		}

		//Update report
		if ($_POST['report_id']) {
			$report = new Report($_POST['report_id']);
			$report->update($_POST);
		// Insert new report
		} else {
			$report = new Report($_POST);
					// Email client link to report page
		$to = $_POST['email'];
		$to_phone = $_POST['phone_number'] . '@vtext.com';
		$report_id = $report->report_id;
		$name = $_POST['first_name'] . ' ' . $_POST['last_name'];
		$access_code = $_POST['access_code'];
		$address = $_POST['address'];
		$subject = 'Inspection report for ' . $address;
		$message = <<<EMAIL
Hello $name,

I have provided a link to your inspection report for address: $address. 

Click http://hip.com/client_report?report_id=$report_id&access_code=$access_code to view your report. 

Please feel free to leave any comments you may have about the report and I will get back to you at my earliest convienence. 

Thank you for your business, 

Michael Morrow
Home Inspector
morrowmish@cox.net
(623)853-5369
EMAIL;

$message_phone = <<<EMAIL
Hello $name,

Your inspection report is ready to view: http://hip.com/client_report?report_id=$report_id&access_code=$access_code
EMAIL;

mail($to, $subject, $message) . mail($to_phone, 'Inspection', $message_phone);

		}

		//  Redirect back to dasboard page
		header("Location: /dashboard");
		exit();
		
	}
}
$controller = new Controller();


