<?php

/**
 * User
 */
class User extends Model {

	/**
	 * Insert User
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'password' => md5($input['password']),
			'email' => $input['email'],
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		
		if(!$results = db::insert('user', $sql_values)){
			throw new Exception('Error processing request...');
		} else {
			return $results->insert_id;
			
		}	
	}

	/**
	 * Update User
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'password' => md5($input['password']),
			'email' => $input['email'],
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		if(!db::update('user', $sql_values, "WHERE user_id = {$this->user_id}")) {
			throw new Exception('Error processing request...');
		} else {
			// Return a new instance of this user as an object
			return new User($this->user_id);
		}
		

	}

	protected function remove(){

		$sql = "
			DELETE 
			FROM user
			WHERE user_id = {$this->user_id}
			";

		if(!db::execute($sql)) {
			throw new Exception('Error processing request...');	
		}
	}

	protected function retreive(){
		$sql = "SELECT * 
				FROM user
				WHERE user_id = {$this->user_id}";
		
		if(!$results = db::execute($sql)) {
			throw new Exception('Error processing request...');
		} else {
			return $results;
		}
	}

	public static function get_user($email, $password) {

		$sql = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}';";
		
		if(!$results = db::execute($sql)) {
			throw new Exception('Error processing request...');
		} else {
			return $results;
		}

	}

	

}