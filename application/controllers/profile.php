<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->model('User');
  }

  public function view($id){
  	if (!empty($id)){
	  	$user = $this->User->load($id);
	  	
	    $content = array("content"=>"profile_view.php");
	    $this->load->view('layouts/layout_two_coll.php', $content);
  	}else {
  		//#TODO redirect 
  	}
  }
  
  public function edit($id){
    $post = $this->input->post();
   
    if(!empty($post)){
    	$isSaved= $this->User->save($id,$post);
    	$user = $this->User->load($id);
    }
    
  	$content = array("content"=>"profile_edit.php");
  	$this->load->view('layouts/layout_two_coll.php', $content);
  }
  
} 