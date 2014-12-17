<?php

/**
 * report
 */
class Report extends Model {

	/**
	 * Insert report
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'user_id' => $input['user_id'],
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'address' => $input['address'],
			'report_document' => $input['report_document'],
			'access_code' => $input['access_code'],
			'email' => $input['email'],
			'phone_number' => $input['phone_number']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		
		if(!$results = db::insert('report', $sql_values)){
			throw new Exception('Error processing request...');
		} else {
			return $results->insert_id;
			
		}	
	}

	/**
	 * Update report
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'user_id' => $input['user_id'],
			'first_name' => $input['first_name'],
			'last_name' => $input['last_name'],
			'address' => $input['address'],
			'report_document' => $input['report_document'],
			'access_code' => $input['access_code'],
			'email' => $input['email'],
			'phone_number' => $input['phone_number']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		if(!db::update('report', $sql_values, "WHERE user_id = {$this->user_id}")) {
			throw new Exception('Error processing request...');
		} else {
			// Return a new instance of this report as an object
			return new report($this->report_id);
		}
		

	}

	protected function remove(){

		$sql = "
			DELETE 
			FROM report
			WHERE user_id = {$this->user_id}
			AND report_id = {$this->report_id}
			";

		if(!db::execute($sql)) {
			throw new Exception('Error processing request...');	
		}
	}

	// protected function retreive(){
	// 	$sql = "SELECT * 
	// 			FROM report
	// 			WHERE user_id = {$this->user_id}";
		
	// 	if(!$results = db::execute($sql)) {
	// 		throw new Exception('Error processing request...');
	// 	} else {
	// 		return $results;
	// 	}
	// }

	// public static function get_user($email, $password) {

	// 	$sql = "SELECT * FROM user WHERE email = '{$email}' AND password = '{$password}';";
		
	// 	if(!$results = db::execute($sql)) {
	// 		throw new Exception('Error processing request...');
	// 	} else {
	// 		return $results;
	// 	}

	// }

	

}