<?php

class Feed_model extends CI_Model {

  private static $all_users = array();

  public function __construct(){
    parent::__construct();
    $this->load->database();
    $this->_loadAllUsers();
  }

  public function getRecentPosts($count = 10, $since = false){
    if($since){
      $this->db->where('created_at > ',$since);
    } else {
      $this->db->limit($count);
    }
    $query = $this->db->get('posts');

    $posts = array();

    foreach($query->result_array() as $record){
      $post = clone $record;
      $user_record = self::$all_users[$post['user_id']];
      $post['first_name'] = $user_record['first_name'];
      $post['last_name'] = $user_record['last_name'];
      $post['avatar'] = $user_record['avatar'];
      $post['comments'] = array();
      $comments_query = $this->db->order_by('created_at','desc')->get_where('posts_comments',array('post_id',$post['id']));
      foreach($comments_query->result_array() as $comment_record){
        $comment = array('comment_id' => $comment_record['id'], 'user_id' => $comment_record['user_id']);
        $user_record = self::$all_users[$comment['user_id']];
        $comment['first_name'] = $user_record['first_name'];
        $comment['last_name'] = $user_record['last_name'];
        $comment['avatar'] = $user_record['avatar'];
        $post['comments'][] = $comment;
      }
      $posts[] = $post;
    }

    return $posts;
  }

  public function saveNewPost($userId, $content){
    $date = new DateTime();
    $data = array(
      'user_id' => $userId,
      'content' => $content,
      'created_at' => $date->format('Y-m-d H:i:s')
    );
    $this->db->insert('posts',$data);
  }

  public function saveNewComment($userId, $postId, $content){
    $date = new DateTime();
    $data = array(
      'user_id' => $userId,
      'post_id' => $postId,
      'content' => $content,
      'created_at' => $date->format('Y-m-d H:i:s')
    );
    $this->db->insert('posts_comments',$data);
  }

  private function _loadAllUsers(){
    $db_query = $this->db->get('users');
    foreach($db_query->result_array() as $row){
      self::$all_users[$row['id']] = $row;
    }
  }

} 