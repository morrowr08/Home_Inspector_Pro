<?php 
Class Access {

	
	public static function login($email, $password) {

		//if user is returned, assign userid and call set session.
		if ($user_data = self::get_user($email, $password)) {
			self::set_session($user_data);
			return $user_data['user_id'];
		} else {
			return false;
		}
	}

	//get user by username and password
	private static function get_user($email, $password) {

		$user = User::get_user($email, $password);
		$user_data = $user->fetch_assoc();

		//return user data array
		return $user_data;
	}

	// set user id and first name in session array
	private static function set_session($user_data) {
		
		$_SESSION['user_id'] = $user_data['user_id'];
		$_SESSION['first_name'] = $user_data['first_name'];
	}

	public static function check() {
		if ($user_id = $_SESSION['user_id']) {
			return $user_id;
		} else {
			return false;
		}
	}

	public static function logout() {
		session_unset();
		session_destroy();
	}










}