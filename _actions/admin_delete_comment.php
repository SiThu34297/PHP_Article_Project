<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\Comment;
use Libs\Database\MySQL;


$id = $_GET['delete'];
$table = new Comment(new MySQL());

if($table)
{
     $success = $table->DeleteCmt($id);
     if($success)
     {
          $_SESSION['cmt_delete_success'] = "Successfully Deleted!";
          header("location: ../admin/comments.php");
     }
}