<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\Category;
use Libs\Database\MySQL;

$id = $_GET['delete'];

$table = new Category(new MySQL());

if($table)
{
     $success = $table->destroyCat($id);

     if($success)
     {
          $_SESSION['cat_delete_success'] = "Successfully deleted!";
          header("location: ../admin/categories.php");
     }
}