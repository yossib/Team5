<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
    $this->load->library('input');
    $this->load->library('session');
    $this->load->helper(array('form', 'url'));
    $this->load->library('form_validation');
    $this->load->library('security');
  }

  public function view($id){
  	if (!empty($id)){
	  	$data =  $this->User->load($id);
	  	
	    $data["content"] ="profile_view.php";
	    $this->load->view('layouts/layout_two_coll.php', $data);
  	}else {
  		//#TODO redirect 
  	}
  }
  
  public function edit($id){
    $post = $this->input->post();
   
    if(!empty($post)){
    	$isSaved= $this->User->save($id,$post);
    	$data = $this->User->load($id);
    }
    
  	$data["content"] ="profile_edit.php";
  	$this->load->view('layouts/layout_two_coll.php', $data);
  }
  
} 