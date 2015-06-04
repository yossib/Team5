<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User');
	}

	// index.php/user/edit/20/0
	public function index($limit, $offset)
	{
		$query = $this->User->db->get_where('users', array('active' => true), $limit, $offset);
		$users = $query->result();
		
		$this->load->view('user/list.php');
	}
	// index.php/user/edit/123
	public function edit($id)
	{   
		
		$query = $this->User->db->get_where('users', array('id' => $id), $limit, $offset);
		$user = $query->result();
		
		$this->load->view('user/edit.php');
	}
	// index.php/user/view/123
	public function view($id)
	{
	
		$query = $this->User->db->get_where('users', array('id' => $id), $limit, $offset);
		$user = $query->result();
	
		$this->load->view('user/view.php');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */