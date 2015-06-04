<?php

class User extends  CI_Model {
  const TABLE = 'users';
  
  protected $id;
  protected $first_name;
  protected $last_name;
  protected $avatar;
  protected $email;
  protected $birthday;
  protected $position;
  protected $description;
  protected $work_start_date ;
  protected $password;
  protected $active;
  
  function __construct() {
    parent::__construct();
  }
  
  function __get($field_name) {
    if($field_name == 'db'){
      return parent::__get('db');
    }
    return $this->$field_name;
  }
  function __set($field_name, $field_value){
    $this->$field_name = $field_value;
  }

  function getUserByEmail($email)
  {
    $this -> db -> select('id');
    $this -> db -> from('users');
    $this -> db -> where('email', $email);
    $this -> db -> limit(1);

    $query = $this -> db -> get();

    if($query -> num_rows() == 1)
    {
      return $query->result();
    }
    else
    {
      return false;
    }
  }
  function load($id) {
  	$query = $this->db->get_where(self::TABLE,array('id' => $id));
  	
  	foreach ($query->result() as $key=>$value) {
  		$this->__set($key, $value);
  	}
  	
  	return $this;
  }

  function loadToArray($id){
    $query = $this->db->get_where(self::TABLE,array('id' => $id));

    foreach ($query->result() as $key=>$value) {
      $this->__set($key, $value);
    }

    return $query->row_array();
  }


  //#TODO validate $params 
  function save($id,$params) {
  	
  	$flag = true;
  	
  	try {
  		if(!empty($id)){
	  		$this->db->where('id', $id);
	  		$this->db->update(self::TABLE, $params);
  		}else{
  			$this->db->insert(self::TABLE, $params);
  			$id = $this->db->insert_id();
  		}
  	} catch (Exception $e) {
  		$flag = false;
  	}
    	
  	return $flag;
  }
  
}