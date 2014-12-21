<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		$report_id = $_GET['report_id'];
		$comment_id = $_GET['comment_id'];

		if ($user_id = Access::check()) {
			
			$sql = "
				SELECT * FROM report WHERE user_id = {$user_id} AND report_id = {$report_id} LIMIT 1
			";

			$this->view->report_id = $report_id;

			$results = db::execute($sql);

			while ($row = $results->fetch_assoc()){
				$DVF = new DocumentViewFragment;
				$DVF->report_id = $row['report_id'];
				$DVF->user_id = $row['user_id'];
				$DVF->name = $row['first_name'] . ' ' . $row['last_name'];
				$DVF->address = $row['address'];
				$DVF->email = $row['email'];
				$DVF->phone_number = $row['phone_number'];
				$DVF->document = $row['report_document'];
				$this->view->document = $row['report_document'];
				$this->view->report_id = $row['report_id'];
				$this->view->name = $row['first_name'] . ' ' . $row['last_name'];
				$this->view->address = $row['address'];
				$this->view->email = $row['email'];
				$this->view->phone_number = $row['phone_number'];
				$this->view->output .= $DVF->render();
			}

			$comments = "
				SELECT * FROM comment WHERE report_id = {$report_id}
			";

			$comment_results = db::execute($comments);

			while ($row = $comment_results->fetch_assoc()) {
				$CVF = new CommentViewFragment;
				$CVF->comment_id = $row['comment_id'];
				$CVF->report_id = $row['report_id'];
				$CVF->customer_comment = $row['customer_comment'];
				$CVF->comment = $row['comment'];
				$this->view->comment_output .= $CVF->render();
			}	

		}
	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);
?>

<?php if (!Access::check()) { ?>
	<?php require_once 'app/templates/login_message.php' ?>
	<?php header('Location: /login') ?>

<?php } else { ?>

<div class="report">

	<aside>
		<table>
			<thead>
				<tr>
					<th><h2>Client Info</h2></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Name: <?php echo $name; ?></td>
				</tr>
				<tr>
					<td>Address: <?php echo $address; ?></td>
				</tr>
				<tr>
					<td>Email: <?php echo $email; ?></td>
				</tr>
				<tr>
					<td>Number: <?php echo $phone_number; ?></td>
				</tr>
			</tbody>
		</table>
			<span>Click <a href="<?php echo $document; ?>" target="_blank">here</a> to view inspection report.</span>

			<p class="delete-report"><a href="/reports/remove_report?report_id=<?php echo $report_id ?>">Delete Report</a></p>
	</aside>

	<div>
		<form action="/comments/process_form" method="POST">
			<textarea name="comment" rows="4" cols="50" placeholder="Type comment here" pattern="/.*/"></textarea>
			<input type="hidden" name="report_id" value="<?php echo htmlentities($report_id); ?>">
			<div><button>Submit Comment</button></div>
		</form>	
		<div class="view_comments">
			<table>
				<tbody>
					<?php echo $comment_output ?>
				</tbody>
			</table>
		</div>
	</div>

</div>

<?php } ?>