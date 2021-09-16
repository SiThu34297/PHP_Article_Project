<!-- header -->
<?php include("assets/header.php")?>
<!-- navbar -->
<?php include("assets/nav.php"); ?>
<!-- php code -->
<?php 
include('../vendor/autoload.php');
use Helper\Auth;
use Libs\Database\Category;
use Libs\Database\Comment;
use Libs\Database\MySQL;
use Libs\Database\Post;
use Libs\Database\User;

Auth::check();
//posts data
$post_table = new Post(new MySQL());
$posts = $post_table->ShowPost();
//comments data
$cmt_table = new Comment(new MySQL());
$comments = $cmt_table->ShowCmt();
//users data
$user_table = new User(new MySQL());
$users = $user_table->ShowUser();
//categories data
$cat_table = new Category(new MySQL());
$categories = $cat_table->ShowCat();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Profile</h1>
               </div>
               <!-- list group to show profile -->
               <div class="container">
                    <div class="row mt-4">
                         <!-- <div class="col-2"></div> -->
                         <div class="col-md-6">
                              <ul class="list-group">
                                   <li class="list-group-item bg-primary text-white">
                                        <span class="fs-4"><img
                                                  src="assets/profile/<?= $_SESSION['user']['admin_profile'] ?>"
                                                  class="img-thumbnail" width="100" alt="profile"></span>
                                   </li>
                                   <li class="list-group-item bg-primary text-white">
                                        <span class="fw-bold fs-3">Name -</span>
                                        <span class="fs-4"><?= $_SESSION['user']['admin_name'] ?></span>
                                   </li>
                                   <li class="list-group-item bg-primary text-white">
                                        <span class="fw-bold fs-3">Email -</span>
                                        <span class="fs-4"><?= $_SESSION['user']['admin_email'] ?></span>
                                   </li>
                              </ul>
                         </div>
                    </div>
               </div>
          </main>
          <!-- content footer -->
          <?php include("assets/content_footer.php")?>
     </div>
</div>
<!-- footer -->
<?php include("assets/footer.php") ?>