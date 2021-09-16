<?php
session_start();
use Libs\Database\Comment;
use Libs\Database\MySQL;

include('../vendor/autoload.php');

$post_id = $_POST['post_id'];
$comment_content = $_POST['comment_content'];
$comment_user = $_POST['comment_user'];
$comment_email = $_POST['comment_email'];

$table = new Comment(new MySQL());

if($table)
{
     if($comment_user === '' || $comment_email === '' || $comment_content === '')
     {
          echo "fail";
     }else{
          $data = [
               ':comment_user' => $comment_user,
               ':comment_email' => $comment_email,
               ':comment_post_id' => $post_id,
               ':comment_content' => $comment_content
          ];
          $success = $table->StoreCmt($data);
          if($success)
          {
               echo "success";
          }
     }
}