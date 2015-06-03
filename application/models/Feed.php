<?php

class Feed_model extends CI_Model {

  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function getRecentPosts($count = 10, $since = false){
    $this->db->select('
      posts.id as post_id,
      posts.user_id as user_id,
      posts.created_at as created_at,
      users.first_name as first_name,
      users.last_name as last_name,
      users.avatar as avatar,
      posts.content as content,
      ')->from('posts')->join('users', 'posts.user_id = users.id')->order_by('created_at','desc');
    if($since){
      $this->db->where('created_at > ',$since);
    } else {
      $this->db->limit($count);
    }
    $query = $this->db->get();

    $posts = array();
    foreach($query->result_array() as $record){
      $post = $record;
      $post['comments'] = array();
      $this->db->select('
        posts_comments.id as comment_id,
        posts_comments.user_id as user_id,
        posts_comments.created_at as created_at,
        users.first_name as first_name,
        users.last_name as last_name,
        users.avatar as avatar,
        posts_comments.content as content,
      ')->from('posts_comments')->join('users', 'posts_comments.user_id = users.id')->where('post_id',$post['post_id'])->order_by('created_at','desc');
      $comments_query = $this->db->get();
      foreach($comments_query->result_array() as $comment_record){
        $post['comments'][] = $comment_record;
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

}