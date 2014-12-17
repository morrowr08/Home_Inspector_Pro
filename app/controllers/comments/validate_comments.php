<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		//validate user credentials here

		$report_id = $_POST['report_id'];
		$customer_comment = $_POST['customer_comment'];
		$read = $_POST['read'];
		$comment = $_POST['comment'];



		if (!empty($comment_id)) {

			$comment = new Comment($comment_id);

			$this->view['report_id'] = htmlentities($comment->report_id);
			$this->view['customer_comment'] = htmlentities($comment->customer_comment);
			$this->view['read'] = htmlentities($comment->read);
			$this->view['comment'] = htmlentities($comment->comment);
		} else {
			$this->view['comment_id'] = FALSE;
		}
	}
}
$controller = new Controller();
