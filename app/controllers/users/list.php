<?php

// Controller
class Controller extends AppController {
	protected function init() {

		// SQL
		$sql = "
			SELECT *
			FROM user
			";

		// Execute
		$results = db::execute($sql);
		
		// Loop Rows
		while ($row = $results->fetch_assoc()) {
			$this->view->users .= '<p>' . $row['first_name'] . '</p>';
		}

	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<div class="users">
	<?php echo $users; ?>
</div>