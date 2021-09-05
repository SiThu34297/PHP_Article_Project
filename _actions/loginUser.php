<?php
session_start();
use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UserTable;

include("../vendor/autoload.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

$userTable = new UserTable(new MySQL());
if($userTable)
{
     $data = [
          ':email' => $email,
          ':password' => $password
     ];
     $success = $userTable->loginUser($data);
     if($success)
     {
          $_SESSION['user'] = $success;
          HTTP::redirect('/index.php');
     }else{
          $_SESSION['loginFail'] = "Email or Password invalid!";
          HTTP::redirect('/login.php','title=Login Page');
     }
}