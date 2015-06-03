<?php
class User extends  CI_Model {
  
  protected $id;
  protected $first_name;
  protected $last_name;
  protected $avatar;
  protected $email;
  protected $birthday;
  protected $position;
  protected $description;
  protected $work_start_date ;
  protected $type;
  protected $password;
  protected $active;
  
  function __construct() {
    parent::__construct();
  }
  
  function __get($field_name) {
    return $this->$field_name;
  }
  function __set($field_name, $field_value){
    $this->$field_name = $field_value;
  }

}