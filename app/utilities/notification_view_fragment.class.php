<?php 

class NotificationViewFragment extends ViewFragment {

	private $template = '<tr><td>{{first_name}} {{last_name}}</td><td>{{address}}</td><td><a href="/update_notifications?report_id={{report_id}}&comment_id={{comment_id}}"><span>{{total_comments}} unread</span></a></td></tr>';
	protected $values = [];

	public function __set($name, $value) {
		$this->values[$name] = $value;
	}

	public function render(){
		return parent::fill($this->values, $this->template);
	}

}


