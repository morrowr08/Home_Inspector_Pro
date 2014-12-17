<?php

// Controller
class Controller extends AjaxController {
	protected function init() {
		//Validation 

		$report_id = $_GET['report_id'];


		if ($user_id = Access::check()) {

			// Update comment
			if ($_POST['comment_id']) {
				$comment = new Comment($_POST['comment_id']);
				$comment->update($_POST);
			// Insert new comment
			} else {
				$_POST['read_comment'] = 1;
				$comment = new Comment($_POST);
			}

		} else {
			// Update comment
			if ($_POST['comment_id']) {
				$comment = new Comment($_POST['comment_id']);
				$comment->update($_POST);
			// Insert new comment
			} else {
				$_POST['read_comment'] = 0;
				$comment = new Comment($_POST);
			}
		}

		//  Redirect back to dasboard page
		header("Location: " . $_SERVER['HTTP_REFERER']);
		exit();

	}
}
$controller = new Controller();


