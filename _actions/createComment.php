<?php

use Helpers\HTTP;
use Libs\Database\Comment;
use Libs\Database\MySQL;

include("../vendor/autoload.php");

$user_id = $_POST['user_id'];
$content = $_POST['content'];
$article_id = $_POST['article_id'];

$table = new Comment(new MySQL());

if($table)
{
     $data = [
          ':user_id' => $user_id,
          ':content' => $content,
          ':article_id' => $article_id
     ];
     $success = $table->createComment($data);
     
     if($success)
     {
          HTTP::redirect('/detail.php',"post=$article_id");
     }
}