<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\User;

$table = new User(new MySQL());
$admin_id = $_POST['user_id'];
$admin_name = $_POST['admin_name'];
$admin_email = $_POST['admin_email'];
$admin_password = $_POST['admin_password'];
if($admin_password !== "")
{
     $admin_password = md5($_POST['admin_password']);
}

//image data from files
$image_name = $_FILES['admin_profile']['name'];
$image_type = $_FILES['admin_profile']['type'];
$image_tmp = $_FILES['admin_profile']['tmp_name'];
$image_error = $_FILES['admin_profile']['error'];

//old data
$old_data = $table->ShowUserByID($admin_id);

if($admin_name === $old_data['admin_name'] && $admin_email === $old_data['admin_email'] && $admin_password === '' && $image_name === '')
{
     header('location: ../admin/users.php');
}

if($admin_password === '' && $image_name === '')
{
     $data = [
          ":id" => $admin_id,
          ":admin_name" => $admin_name,
          ":admin_email" => $admin_email,
          ":admin_password" => $old_data['admin_password'],
          ":admin_profile" => $old_data['admin_profile']
     ];
     $success = $table->UpdateUser($data);
     if($success)
     {
          $_SESSION['user_edit_success'] = "Successfully Updated!";
          header('location: ../admin/users.php');
     }
}else if($admin_password === '')
{
     move_uploaded_file($image_tmp,"../admin/assets/profile/$image_name");
     $data = [
          ":id" => $admin_id,
          ":admin_name" => $admin_name,
          ":admin_email" => $admin_email,
          ":admin_password" => $old_data['admin_password'],
          ":admin_profile" => $image_name
     ];
     $success = $table->UpdateUser($data);
     if($success)
     {
          $_SESSION['user_edit_success'] = "Successfully Updated!";
          header('location: ../admin/users.php');
     }
}else if($image_name === '')
{
     $data = [
          ":id" => $admin_id,
          ":admin_name" => $admin_name,
          ":admin_email" => $admin_email,
          ":admin_password" => $admin_password,
          ":admin_profile" => $old_data['admin_profile']
     ];
     $success = $table->UpdateUser($data);
     if($success)
     {
          $_SESSION['user_edit_success'] = "Successfully Updated!";
          header('location: ../admin/users.php');
     }
}else{
     move_uploaded_file($image_tmp,"../admin/assets/profile/$image_name");
     $data = [
          ":id" => $admin_id,
          ":admin_name" => $admin_name,
          ":admin_email" => $admin_email,
          ":admin_password" => $admin_password,
          ":admin_profile" => $image_name
     ];
     $success = $table->UpdateUser($data);
     if($success)
     {
          $_SESSION['user_edit_success'] = "Successfully Updated!";
          header('location: ../admin/users.php');
     }
}