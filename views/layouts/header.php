<?php 
     session_start();
     $user = $_SESSION['user'];
?>
<!doctype html>
<html lang="en">

<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

     <title>
          <?php 
          $title = "Home Page";
               if(!empty($_GET['title'])){
                    $title =  $_GET['title'];
               }
               echo $title;
          ?>
     </title>
</head>

<body>

     <nav class="navbar sticky-top  navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
          <div class="container">
               <a class="navbar-brand" href="index.php">
                    Article Blog
               </a>
               <?php if(isset($_SESSION['user'])): ?>
               <a href="./addArticle.php?title=Add Article" class="nav-link text-danger"> +Add Article</a>
               <?php elseif(!isset($_SESSION['user'])): ?>
               <span class="text-danger">Log In To Add Article</span>
               <?php endif; ?>

               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                         <?php if(isset($_SESSION['user'])):?>
                         <li class="nav-item">
                              <div class="dropdown">
                                   <button class="btn btn-secondary dropdown-toggle btn-sm" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        <?= $_SESSION['user']['user_name'] ?>
                                   </button>
                                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item"
                                                  href="/../php_blog_project/_actions/logout.php">Logout</a>
                                        </li>
                                   </ul>
                              </div>
                         </li>
                         <?php elseif(!isset($_SESSION['user']) ): ?>
                         <li class="nav-item">
                              <a class="nav-link active" href="login.php?title=Login Page">Login</a>
                         </li>
                         <li class="nav-item">
                              <a class="nav-link" href="register.php?title=Register Page">Register</a>
                         </li>
                         <?php endif; ?>
                    </ul>
               </div>
          </div>
     </nav><!-- navbar end  -->