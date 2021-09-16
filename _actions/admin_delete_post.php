<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\Post;

$id = $_GET['delete'];

$table = new Post(new MySQL());

if($table)
{
     $success = $table->destroyPost($id);
     if($success)
     {
          $_SESSION['post_delete_success'] = 'Successfully deleted!';
          header("location: ../admin/posts.php");
     }
}