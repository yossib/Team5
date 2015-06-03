<?php

class Profile extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }

  public function view($id){
    $user = $this->User->db->getWhere('users',array('id' => $id))->result();
    $content = array("content"=>"profile.php");
    $this->load->view('layouts/bootstrap.php', $content);
  }

} 