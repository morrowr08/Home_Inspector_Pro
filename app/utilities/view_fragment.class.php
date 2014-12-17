<?php 
class ViewFragment {
	
	protected $values = [];
	
	// Fill Template
	public static function fill($record, $template) {
		$search_keys = array_keys($record);
		array_walk($search_keys, ['self', 'fixKeys']);
		$values = array_values($record);
		return str_replace($search_keys, $values, $template);
	}

	// Callback to fix keys with mustashes
	private static function fixKeys(&$search) {
		$search = '{{' . $search . '}}';
	}

	public function __set($property_name, $value){
		$this->values[$property_name] = $value;
	}

	public function render(){
		return $this->fill($this->values, $this->template);
	}

	//function to build template from a row and array of keys
	public static function build($row) {

		$class = get_called_class();
		$ViewFragment = new $class();

		foreach ($row as $key => $value) {
			$ViewFragment->$key = htmlentities($value);
		}

		return  $ViewFragment->render();
	}
}
