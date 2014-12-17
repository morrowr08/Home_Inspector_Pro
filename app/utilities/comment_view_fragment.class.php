<?php 

class CommentViewFragment extends ViewFragment {

	private $template = '<tr><td>{{comment}}</td></tr>';
	protected $values = [];

	public function __set($name, $value) {
		$this->values[$name] = $value;
	}

	public function render(){
		return parent::fill($this->values, $this->template);
	}

}


