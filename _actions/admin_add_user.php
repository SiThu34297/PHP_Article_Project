<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\User;

//data from post data
$admin_name = $_POST['admin_name'];
$admin_email = $_POST['admin_email'];
$admin_password = md5($_POST['admin_password']);

//image data from files
$image_name = $_FILES['admin_profile']['name'];
$image_type = $_FILES['admin_profile']['type'];
$image_tmp = $_FILES['admin_profile']['tmp_name'];
$image_error = $_FILES['admin_profile']['error'];

$table = new User(new MySQL());
if($admin_name === '' or $admin_email === '' or $admin_password === '' or $image_error)
{
     $_SESSION['user_add_fail'] = "Fill All Field!";
     header("location: ../admin/add_user.php");
}else
{
     if($image_type === 'image/jpeg' or $image_type === 'image/jpg' or $image_type === 'image/png')
     {
          move_uploaded_file($image_tmp,"../admin/assets/profile/$image_name");
          $data = [
               ":admin_name" => $admin_name,
               ":admin_email" => $admin_email,
               ":admin_password" => $admin_password,
               ":admin_profile" => $image_name
          ];
          $success = $table->StoreUser($data);
          if($success)
          {
               $_SESSION['user_add_success'] = "Successfully Added!";
               header('location: ../admin/users.php');
          }
     }else
     {
          $_SESSION['admin_image_fail'] = "Image File Type Error!";
          header("location: ../admin/add_user.php");
     }
}