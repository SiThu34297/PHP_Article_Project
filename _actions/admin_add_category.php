<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\Category;
use Libs\Database\MySQL;

$cat_title = $_POST['cat_title'];

if($cat_title === '')
{
     $_SESSION['cat_add_fail'] = "Fill Category Field!";
     header("location: ../admin/categories.php");
}else{
     $table = new Category(new MySQL());
     $success = $table->StoreCat($cat_title);
     if($success)
     {
          $_SESSION['cat_add_success'] = "Successfully Added!";
          header("location: ../admin/categories.php");
     }
}