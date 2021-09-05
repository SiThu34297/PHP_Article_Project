<?php

use Helpers\HTTP;
use Libs\Database\Article;
use Libs\Database\MySQL;

include('../vendor/autoload.php');

$table = new Article(new MySQL());
$id = $_GET['id'];
$user_id = $_GET['user_id'];

if($table)
{
     $success = $table->deleteArticle($id , $user_id);
     if($success)
     {
          HTTP::redirect('/index.php');
     }else{
          HTTP::redirect('/index.php');
     }
}