<?php

use Helpers\HTTP;
use Libs\Database\Comment;
use Libs\Database\MySQL;

include('../vendor/autoload.php');

$id = $_GET['Cmtid'];
$user_id = $_GET['user_id'];
$article_id = $_GET['article_id'];

$table = new Comment(new MySQL());

if($table)
{
     $success = $table->deleteComment($id,$user_id);
     if($success)
     {
          HTTP::redirect('/detail.php',"post=$article_id");
     }else{
          HTTP::redirect('/detail.php',"post=$article_id");
     }
}