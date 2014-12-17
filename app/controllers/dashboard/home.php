<?php

// Controller
class Controller extends AppController {
	protected function init() {

			

		if ($user_id = Access::check()) {

			$sql = "
			SELECT * FROM report WHERE user_id = {$user_id}
			";
			$this->view->user_id = $user_id;

			$results = db::execute($sql);

		
			while ($row = $results->fetch_assoc()){
				$DVF = new DocumentViewFragment;
				$DVF->report_id = $row['report_id'];
				$DVF->user_id = $row['user_id'];
				$DVF->name = $row['first_name'] . ' ' . $row['last_name'];
				$DVF->address = $row['address'];
				$DVF->email = $row['email'];
				$DVF->document = $row['report_document'];
				$this->view->output .= $DVF->render();
			}

		}
	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<?php if (!Access::check()): ?>
	<?php require_once 'app/templates/login_message.php' ?>
	<?php header('Location: /login') ?>

<?php else: ?>

	<div class="dashboard">
		
		<div class="client-list">
			<table>
				<thead>
					<tr>
						<th>Name</th><th>Address</th><th>Email</th><th>Document</th>
					</tr>
				</thead>
				<tbody>
					<?php echo $output; ?>
				</tbody>
			</table>
		</div>

		<div class="create-inspection">
			<div>
				<form action="/reports/process_form" method="POST" enctype="multipart/form-data">
					<div>
						<input type="text" name="first_name" placeholder="First Name" pattern="^[A-Za-z]{1,20}$" required>
					</div>
					<div>
						<input type="text" name="last_name" placeholder="Last Name" pattern="^[A-Za-z]{1,20}$" required>
					</div>
					<div>
						<input type="text" name="address" placeholder="Address" pattern=".*" required>
					</div>
					<div>
						<input type="file" name="report_document" required>
					</div>
					<div>
						<input type="email" name="email" placeholder="Email" pattern="\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/i" required>
					</div>
					<div>
						<input type="tel" name="phone_number" placeholder="Phone Number" pattern="^[0-9]{10}" required>
					</div>
					<input type="hidden" name="user_id" value="<?php echo htmlentities($user_id) ?>">
					<!-- TODO make sure access codes aren't duplicated. -->
					<input type="hidden" name="access_code" value="<?php echo rand(10000,1000000); ?>"> 
					<div>
						<button>Create New Inspection</button>
					</div>
				</form>
			</div>
		</div>

	</div>

<?php endif ?>