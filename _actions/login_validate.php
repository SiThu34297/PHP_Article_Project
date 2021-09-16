<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\User;

$email = $_POST['email'];
$password = md5($_POST['password']);

$table = new User(new MySQL());

if($table)
{
     $success = $table->login($email,$password);

     if($success)
     {
          $_SESSION['user'] = $success;
          header('location: ../admin/index.php');
     }else
     {
          header('location: ../admin/login.php');
     }
}