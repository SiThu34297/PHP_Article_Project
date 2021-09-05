<?php
include("../vendor/autoload.php");

use Helpers\HTTP;
use Libs\Database\MySQL;
use Libs\Database\UserTable; 

$userName = $_POST['userName'];
$email = $_POST['email'];
$password = md5($_POST['password']);

$userTable = new UserTable(new MySQL());
if($userTable)
{
     $data = [
          ':user_name' => $userName,
          ':email' => $email,
          ':password' => $password
     ];
     $success = $userTable->create($data);
     if($success)
     {
          session_start();
          $_SESSION['loginsuccess'] = "Account Created Successful!Please Log In";
          HTTP::redirect('/login.php','title=Login Page');
     }
}