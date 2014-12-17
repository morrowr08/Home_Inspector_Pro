<?php 

class DocumentViewFragment extends ViewFragment {

	private $template = '<tr><td>{{name}}</td><td>{{address}}</td><td>{{email}}</td><td><a href="/inspector_report?report_id={{report_id}}">Report Info</a></td></tr>';
	protected $values = [];

	public function __set($name, $value) {
		$this->values[$name] = $value;
	}

	public function render(){
		return parent::fill($this->values, $this->template);
	}

}


