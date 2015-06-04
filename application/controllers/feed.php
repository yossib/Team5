<?php
/**
 * Created by PhpStorm.
 * User: yossi
 * Date: 6/3/15
 * Time: 6:38 PM
 */

class Feed extends CI_Controller{

  /**
   * ToDo:Return the feed template
   */
  public function index(){
		if($this->session->userdata('logged_in')){

		}else{
//			redirect('http://localhost/auth/session/google');
		}
    $upcomingBirthdays = $this->_getUpcomingBirthdays();
    $content = array("content"=>"feed.php","content_data"=>array('upcomingBirthdays' => $upcomingBirthdays));
    $this->load->view('layouts/bootstrap.php', $content);
  }

  /**
   * @param int $amount
   * @param bool $since
   */
  public function getRecentPosts($amount=10, $since = false){
    $this->load->model('feed_model');
    $feed = $this->feed_model;
    /* @var $feed Feed_model */
    $posts = $feed->getRecentPosts();
    $posts = array_reverse($posts);
    header('Content-Type: application/json');
    echo json_encode($posts);
  }

  public function savePost(){
		$userId = $this->input->post('userId');
		$content = $this->input->post('content');
    $this->load->model('feed_model');
    $feed = $this->feed_model;
    /* @var $feed Feed_model */
    $feed->saveNewPost($userId, $content);
		header('Content-Type: application/json');
		echo json_encode(array("userId" => $userId, "content" => $content));
	}

	public function saveComment(){
		$userId = $this->input->post('userId');
		$postId = $this->input->post('postId');
		$content = $this->input->post('content');
		header('Content-Type: application/json');
        $this->load->model('feed_model');
        $feed = $this->feed_model;
        /* @var $feed Feed_model */
        $feed->saveNewComment($userId,$postId, $content);
		echo json_encode(array("userId" => $userId,"postId" => $postId, "content" => $content));
	}

  public function newBirthdayPost(){
    $this->load->model('feed_model');
    $this->load->database();
    $admin_user_query = $this->db->get_where('users',array('email' => 'admin@somoto.net'));
    $admin_user = $admin_user_query->row_array();

    $today = new DateTime();
    $birthday_users_query = $this->db->get_where('users',array('MONTH(birthday)' => intval($today->format('m')), 'DAY(birthday)' => intval($today->format('d'))));
    $birthday_users = $birthday_users_query->result_array();
    $num_birthday_users = count($birthday_users);

    if($num_birthday_users > 0){
      $content = 'Happy birthday to ';
      $counter = 1;
      foreach($birthday_users as $user){
        if($counter > 1 && $counter == $num_birthday_users){
          $content .= ' and ';
        } elseif ($counter > 1 && $counter < $num_birthday_users){
          $content .= ', ';
        }
        $content .= '<a href="/profile/' . $user['id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '</a>';
        $counter++;
      }
      $content .= '!';
      $this->feed_model->saveNewPost($admin_user['id'],$content);
    }
  }

  private function _getUpcomingBirthdays($numDays = 10){
    $this->load->database();
    $date = new DateTime();
    $users = array();
    for($i=0;$i<=$numDays;$i++){
      $this->db->where(array('MONTH(birthday)' => intval($date->format('m')), 'DAY(birthday)' => intval($date->format('d'))));
      $birthday_users_query = $this->db->get('users');
      $users = array_merge($users,$birthday_users_query->result_array());
      $date->modify('1 day');
    }
    return $users;
  }

}