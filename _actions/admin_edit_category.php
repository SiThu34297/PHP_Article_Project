<?php

use Libs\Database\Category;
use Libs\Database\MySQL;

session_start();
include("../vendor/autoload.php");

$id = $_POST['cat_id'];
$cat_title = $_POST['cat_title'];

$table = new Category(new MySQL());

if($cat_title === '')
{
     
}else
{
     if($table)
     {
          $success = $table->updateCat($id,$cat_title);
          if($success)
          {
               $_SESSION['cat_update_success'] = "Successfully Updated!";
               header("location: ../admin/categories.php");
          }
     }
}