<?php

// Controller
class Controller extends AppController {
	protected function init() {		

		if ($user_id = Access::check()) {

			$sql = "
			SELECT *, COUNT(read_comment) AS total_comments
			FROM comment, report
			WHERE read_comment = 0
			AND user_id = $user_id
			AND comment.report_id = report.report_id
			GROUP BY comment.report_id
			";
			$this->view->user_id = $user_id;
			$this->view->notifications = FALSE;

			$results = db::execute($sql);

			while ($row = $results->fetch_assoc()){
				$NVF = new NotificationViewFragment;
				$this->view->notifications = TRUE;
				$NVF->comment_id = $row['comment_id'];
				$NVF->report_id = $row['report_id'];
				$NVF->first_name = $row['first_name'];
				$NVF->last_name = $row['last_name'];
				$NVF->address = $row['address'];
				$NVF->customer_comment = $row['customer_comment'];
				$NVF->read_comment = $row['read_comment'];
				$NVF->total_comments = $row['total_comments'];
				$NVF->comment = $row['comment'];
				$this->view->output .= $NVF->render();
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

	<div class="notification-page">
		<div class="notification-content">
			<?php if(!$notifications) { ?>
				<div>No new notifications.</div>
			<?php } else { ?>
				<table>
					<thead>
						<tr>
							<th>Name</th><th>Address</th><th>Comments</th>
						</tr>
					</thead>
					<tbody>
						<?php echo $output; ?>
					</tbody>
				</table>
			<?php } ?>
		</div>
	</div>


<?php } ?>