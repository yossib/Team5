<?php
class User {
	
	protected  $id;
	protected $name;
	protected $email;
	protected $birthday;
	protected $avatar;
	protected $position;
	protected $description;
	protected $work_start_date ;
	
	function __construct() {
		
	}
	
	function __get($field_name) {
		return this.$field_name;
	}
	function __set($field_name, $field_value){
		this.$field_name = $field_value;
	}

	
}