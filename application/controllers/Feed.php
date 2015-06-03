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
    $content = array("content"=>"feed.php");
    $this->load->view('layouts/bootstrap.php', $content);
  }

  /**
   * @param int $amount
   * @param bool $since
   */
  public function getRecentPosts($amount=10, $since = false){
    header('Content-Type: application/json');
    echo '
  [{ "userid" : 1,
     "post_id" : 1,
     "created_at" : "2015-06-01 10:10:10",
     "name" : "Yossi",
     "avatar" : "",
     "content" : "First post",
     "comments" : [
                         {
                          "user_id": 1,
                          "comment_id": 1,
                           "name": "Yossi",
                           "avatar": "",
                           "content": "First Comment" }]}]
';
  }

  public function savePost($userId, $content){

  }

  public function saveComment($userId, $postId, $content){

  }

  public function newBirthdayPost(){
    $this->load->model('User');
    $system_user_query = $this->User->db->getWhere('users',array('system',1));
    $system_user = $system_user_query->row_array();

    $today = new DateTime();
    $birthday_users_query = $this->User->db->where(array('MONTH(birthday)' => intval($today->format('m')), 'DAY(birthday)' => intval($today->format('d'))));
    $birthday_users = $birthday_users_query->result_array();
    $num_birthday_users = count($birthday_users);

    if($num_birthday_users > 0){
      $content = 'Happy birthday to ';
      $counter = 1;
      foreach($birthday_users as $user){
        if($counter > 1 && $counter == $num_birthday_users){
          $content .= 'and';
        } elseif ($counter > 1 && $counter < $num_birthday_users){
          $content .= ', ';
        }
        $content .= '<a href="/profile/' . $user['id'] . '">' . $user['first_name'] . ' ' . $user['last_name'] . '</a>';
      }
      $content .= '!';
      $this->savePost($system_user['id'],$content);
    }
  }

  public function getUpcomingBirthdays($numDays = 10){
    $today = new DateTime();
    $birthday_users_query = $this->User->db->where(array('MONTH(birthday)' => intval($today->format('m')), 'DAY(birthday)' => intval($today->format('d'))));
    $birthday_users = $birthday_users_query->result_array();
  }

}