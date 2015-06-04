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
      $data["content_data"] =  $this->User->loadToArray($id);
      $data["title"] = $data["content_data"]["first_name"] . ' ' . $data["content_data"]["last_name"];
      $data['content_data']['edit'] = false;
      if($this->session->userdata('logged_in')){
        $userData = $this->session->userdata('logged_in');
        if($userData['id'] == $id){
          $data['content_data']['edit'] = true;
        }
      }
      $data["content"] ="profile_view.php";
      if(!empty($userData)){
        $data["userData"] = $userData;
      }
      $this->load->view('layouts/bootstrap.php', $data);
    }else {
      //#TODO redirect 
    }
  }
  
  public function edit($id){
    $post = $this->input->post();
   
    if(!empty($post)){
      $isSaved= $this->User->save($id,$post);
    }

    $data = $this->User->loadToArray($id);
    $data["content"] ="profile_edit.php";
    $this->load->view('layouts/bootstrap.php', $data);
  }
  
} 