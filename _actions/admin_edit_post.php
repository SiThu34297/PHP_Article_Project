<?php
session_start();
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\Post;

$id = $_POST['post_id'];

$table = new Post(new MySQL());
$post = $table->ShowPostByID($id);
//old value
$old_post_image = $post['post_image'];
//post
$post_title = $_POST['post_title'];
$post_subtitle = $_POST['post_subtitle'];
$post_content = $_POST['post_content'];
$post_author = $_POST['post_author'];
$post_cat_id = $_POST['post_category'];

//file
$image_name = $_FILES['post_image']['name'];
$image_tmp = $_FILES['post_image']['tmp_name'];
$image_error = $_FILES['post_image']['error'];
$image_type = $_FILES['post_image']['type'];

if($post_title === '' || $post_subtitle === '' || $post_content === '' || $post_author === '')
{
     $_SESSION['post_edit_fail'] = "Fill All Filed!";
     header("location: ../admin/edit_post.php?edit=$id");
}else
{
     if($image_type === 'image/jpeg' or $image_type === 'image/jpg' or $image_type === 'image/png')
     {
          move_uploaded_file($image_tmp,"../admin/assets/img/$image_name");
          $data = [
               ':id' => $id,
               ':post_title' => $post_title,
               ':post_subtitle' => $post_subtitle,
               ':post_content' => $post_content,
               ':post_author' => $post_author,
               ':post_image' => $image_name,
               ':post_cat_id' => $post_cat_id
          ];
          if($table)
          {
               $success = $table->UpdatePost($data);
               if($success)
               {
                    $_SESSION['post_edit_success'] = "Successfully Updated!";
                    header('location: ../admin/posts.php');
               }
          }
     }
}

if($image_error)
{
     $data = [
          ':id' => $id,
          ':post_title' => $post_title,
          ':post_subtitle' => $post_subtitle,
          ':post_content' => $post_content,
          ':post_author' => $post_author,
          ':post_image' => $old_post_image,
          ':post_cat_id' => $post_cat_id,
     ];
     if($table)
     {
          $success = $table->UpdatePost($data);
          if($success)
          {
               $_SESSION['post_edit_success'] = "Successfully Update!";
               header('location: ../admin/posts.php');
          }
     }
}