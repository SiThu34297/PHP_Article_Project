<?php 
session_start();
//database 
include("../vendor/autoload.php");
use Libs\Database\MySQL;
use Libs\Database\Post;

$table = new Post(new MySQL());
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

if($post_title === '' || $post_subtitle === '' || $post_content === '' || $post_author === '' || $post_cat_id === '0' || $image_error)
{
     $_SESSION['post_add_fail'] = "Fill All Filed!";
     header("location: ../admin/add_post.php");
}else
{
     if($image_type === 'image/jpeg' or $image_type === 'image/jpg' or $image_type === 'image/png')
     {
          move_uploaded_file($image_tmp,"../admin/assets/img/$image_name");
          $data = [
               ':post_title' => $post_title,
               ':post_subtitle' => $post_subtitle,
               ':post_content' => $post_content,
               ':post_author' => $post_author,
               ':post_image' => $image_name,
               ':post_cat_id' => $post_cat_id,
          ];
          if($table)
          {
               $success = $table->StorePost($data);
               if($success)
               {
                    $_SESSION['post_add_success'] = "Successfully Added!";
                    header('location: ../admin/posts.php');
               }
          }
     }else
     {
          $_SESSION['post_image_fail'] = "Image Type Error!";
          header("location: ../admin/add_post.php");
     }
}