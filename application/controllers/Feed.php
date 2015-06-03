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

}