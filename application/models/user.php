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
  const TABLE = 'users';

  function __construct() {
    parent::__construct();
  }

  function __set($field_name, $field_value){
    $this->$field_name = $field_value;
  }

  function getUserByEmail($email)
  {
    $this->db->select('id, first_name, last_name, avatar');
    $this->db->from('users');
    $this->db->where('email', $email);
    $this->db->limit(1);

    $query = $this->db->get();

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
  	$query = $this->db->getWhere(self::TABLE,array('id' => $id));
  	
  	foreach ($query->result() as $key=>$value) {
  		$this->__set($key, $value);
  	}
  	
  	return $this;
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