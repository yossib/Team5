<?php

class Profile extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }

  public function view($id){
    $user = $this->User->db->getWhere('users',array('id' => $id))->result();
    $content = array("content"=>"profile_view.php");
    $this->load->view('layouts/layout_two_coll.php', $content);
  }
  
  public function edit($id){
    $post = $this->input->post();
   
    if(!empty($post)){
    	$this->User->db->where('id', $id);
    	$this->User->db->update('users', $post);
    }
    
    $user = $this->User->db->getWhere('users',array('id' => $id))->result();
  	$content = array("content"=>"profile_edit.php");
  	$this->load->view('layouts/layout_two_coll.php', $content);
  }
  
} 