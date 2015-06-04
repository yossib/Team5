<?php

class Event extends CI_Controller {

  public function view($id = null){
    if(!$id){
      $events = $this->db->select('events.*, users.first_name as first_name, users.last_name as last_name')->from('events')->join('users','events.created_by = users.id')->where(array('end_time > ' => date('Y-m-d H:i:s')))->get();
      $content = array("content"=>"event_list.php","content_data"=>array('events' => $events->result_array()),"title" => 'Events');
      $this->load->view('layouts/bootstrap.php', $content);
    } else {
      $event_query = $this->db->get_where('events',array('id' => $id));
      $event = $event_query->row_array();
      $attendees = $this->db->from('event_attendees')->join('users','event_attendees.user_id = users.id')->where(array('event_attendees.event_id' => $id))->get();
      $event['attendees'] = $attendees->result_array();
      $userData = array();
      if($this->session->userdata('logged_in')){
        $userData = $this->session->userdata('logged_in');
      }
      $content = array("content"=>"event_view.php","content_data"=>$event, "title" => $event['short_description'], 'userData' => $userData);
      $this->load->view('layouts/bootstrap.php', $content);
    }
  }
  
  public function edit($id = null){
    $post = $this->input->post();

    if(!empty($post)){
      if(!empty($id)){
        $this->db->where('id', $id);
        $this->db->update('events', $post);
      }else{
        $userData = $this->session->userdata('logged_in');
        $post['created_by'] = $userData['id'];
        $this->db->insert('events', $post);
        $id = $this->db->insert_id();
        $attendee_data = array('event_id' => $id, 'user_id' => $userData['id']);
        $this->db->insert('event_attendees', $attendee_data);
      }
    }

    $data = array();
    if($id){
      $query = $this->db->get_where('events',array('id' => $id));
      $data = $query->row_array();
    }
    $data["content"] ="event_edit.php";
    $this->load->view('layouts/bootstrap.php', $data);
  }

  public function join($id,$join){
    if($this->session->userdata('logged_in')){
      $userData = $this->session->userdata('logged_in');
      $data = array('event_id' => $id, 'user_id' => $userData['id']);
      if($join){
        $this->db->insert('event_attendees',$data);
      } else {
        $this->db->delete('event_attendees',$data);
      }
    }
    redirect('event/' . $id);
  }

} 