<?php

/**
 * comment
 */
class Comment extends Model {

	/**
	 * Insert comment
	 */
	protected function insert($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'report_id' => $input['report_id'],
			'customer_comment' => $input['customer_comment'],
			'read_comment' => $input['read_comment'],
			'comment' => $input['comment']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Insert
		
		if(!$results = db::insert('comment', $sql_values)){
			throw new Exception('Error processing request...');
		} else {
			return $results->insert_id;
			
		}	
	}

	/**
	 * Update comment
	 */
	public function update($input) {

		// Note that Server Side validation is not being done here
		// and should be implemented by you

		// Prepare SQL Values
		$sql_values = [
			'comment_id' => $input['comment_id'],
			'report_id' => $input['report_id'],
			'customer_comment' => $input['customer_comment'],
			'comment' => $input['comment']
		];

		// Ensure values are encompassed with quote marks
		$sql_values = db::auto_quote($sql_values);

		// Update
		if(!db::update('comment', $sql_values, "WHERE comment_id = {$this->comment_id}")) {
			throw new Exception('Error processing request...');
		} else {
			// Return a new instance of this comment as an object
			return new comment($this->report_id);
		}
		

	}

	protected function remove(){

		$sql = "
			DELETE 
			FROM comment
			WHERE comment_id = {$this->comment_id}
			AND report_id = {$this->report_id}
			";

		if(!db::execute($sql)) {
			throw new Exception('Error processing request...');	
		}
	}

}