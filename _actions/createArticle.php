<?php
session_start();
use Helpers\HTTP;
use Libs\Database\Article;
use Libs\Database\MySQL;

include('../vendor/autoload.php');

$user_id = $_POST['user_id'];
$title = $_POST['title'];
$body = $_POST['body'];
$category = $_POST['category'];

$photo_name = $_FILES['photo']['name'];
$error = $_FILES['photo']['error'];
$tmp = $_FILES['photo']['tmp_name'];
$type = $_FILES['photo']['type'];

$articleTable = new Article(new MySQL());
if($articleTable)
{
     if($error){
          $_SESSION['photoError'] = "Can't upload photo";
          $_SESSION['session_time_stamp'] = time();
          HTTP::redirect('/addArticle.php');
     }
     if($type === "image/jpeg" or $type === "image/jpg" or $type === "image/png"){
          move_uploaded_file($tmp , "photos/$photo_name");
          $data = [
               ':title' => $title,
               ':body' => $body,
               ':image' => $photo_name,
               ':category' => $category,
               ":user_id" => $user_id
          ];
          $success = $articleTable->createArticle($data);
          if($success)
          {
               $_SESSION['AddArticleSuccess'] = "Article Added.";
               $_SESSION['session_time_stamp'] = time();
               HTTP::redirect('/index.php');
          }
     }else{
          $_SESSION['photoTypeError'] = "Photo Type Error!";
          HTTP::redirect('/addArticle.php');
     }
}