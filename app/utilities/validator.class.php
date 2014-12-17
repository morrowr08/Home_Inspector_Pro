<?php 
Class Validator {

	protected static $regs = [
	//customer login validation
		'first_name' => '/^[A-Za-z]{1,20}$/',
		'last_name' => '/^[A-Za-z]{1,20}$/',
		'password' => '/[a-zA-Z0-9]{6,20}/',
		'email' => '/\b[\w\.-]+@[\w\.-]+\.\w{2,4}\b/i',
		'user_id' => '/[0-9]{1,2}/',
		'address' => '.*',
		'phone_number' => '^[0-9]{10}',
		'comments' => '.*',
		'accept' => '/1/',

	];

	public static function validate($fields) {
		// print_r($fields);
		// die();
		$valid = [];
		$errors = [];

		foreach ($fields as $key => $value) {
			if (preg_match(self::$regs[$key], $value)) {
				$valid[$key] = $value;
			} else {
				$errors['ERROR'] = $key . ' ' . $value;
				$errors[$key] = $value; 
			}
		}

		if (empty($errors)) {
			return $valid;
		} else {
			return $errors;
		}
	}
	

} 
?>