<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\User;

$id = $_GET['delete'];
$table = new User(new MySQL());
$session_id = $_SESSION['user']['id'];
if($table)
{
     if($id === $session_id)
     {
          $success = $table->DestroyUser($id);
          if($success)
          {
               $_SESSION['user_delete_success'] = "Successfully Deleted!";
               header("location: ../admin/users.php");
          }
     }else{
          header("location: ../admin/users.php");
     }
}