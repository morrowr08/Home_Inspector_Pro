<?php

// Controller
class Controller extends AppController {
	protected function init() {
		
		// Send a variable to the main view
		// $this->view->welcome = 'Welcome to MVC';

		// Send a variable to a sub view
		// $this->view->primary_header->welcome = 'Welcome Student!';

	}
}
$controller = new Controller();

// Extract Main Controller Vars
extract($controller->view->vars);

?>

<!-- This is hidden until something goes wrong with account creation -->
	<div class="create_user_error_message">
		<h2>Oops, something went wrong creating your account.</h2>
		<ul>
			<li>Your first name must be between 1 and 20 letters.</li>
			<li>Your last name must be between 1 and 20 letters.</li>
			<li>Your email must be a valid email address.</li>	
			<li>Your password must be between 6 and 20 characters, starting with a letter and no special characters.</li>
		</ul>
	</div>

<!-- user creates account -->
	<div class="create-user">
		<h1>Create Account</h1>
		<form action="/login" method="post">
		<div>
			<label>First Name</label><input type="text" name="first_name" placeholder="first name" required><br>
		</div>
		<div>
			<label>Last Name</label><input type="text" name="last_name" placeholder="last name" required><br>
		</div>
		<div>
			<label>Email</label><input type="text" name="email" placeholder="e-mail" required><br>
		</div>
		<div>
			<label>Password</label><input type="password" name="password" placeholder="password" required><br>
		</div>
		<div>
			<button>Create Account</button>
		</div>
		<div>
			<input type="checkbox" name="accept" value="1" required class="accept"> I accept the <a href="#" title="">Terms and Conditions</a></div>
		</form>
	</div>
