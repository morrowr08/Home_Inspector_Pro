<?php

// Controller
class Controller extends AppController {
	protected function init() {

		// More code could go here depending on what you want to do with this page

	}

}
$controller = new Controller();

// Extract Main Controler Vars
extract($controller->view->vars);

?>

<form class="reptile-form" action="register/process_form">
	<input type="text" name="first_name" title="First Name" required>
	<input type="text" name="last_name" title="Last Name" required>
	<input type="email" name="email" title="Email" required maxlength="100">
	<input type="password" name="password" title="Password" required>
	<button type="submit">Submit</button>
</form>