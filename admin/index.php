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
                    <h1 class="mt-4">Welcome to <?= $_SESSION['user']['admin_name'] ?></h1>
               </div>
               <div class="container mt-5">
                    <div class="row">
                         <div class="col-lg-3 col-md-4">
                              <div class="card border-primary mt-3">
                                   <div class="card-body bg-primary text-white">
                                        <p class="card-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <i class="fas fa-file-alt fa-5x"></i>
                                             <p>
                                                  <span class="fs-1 fw-bold">
                                                       <?= count($posts) ?>
                                                  </span><br>
                                                  <span>Posts</span>
                                             </p>
                                        </div>
                                        </p>
                                   </div>
                                   <a class="card-footer list-group-item list-group-item-action" href="posts.php">
                                        <div class="d-flex justify-content-between align-items-center text-primary">
                                             <span>View Detail</span>
                                             <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                   </a>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-4">
                              <div class="card border-success mt-3">
                                   <div class="card-body bg-success text-white">
                                        <p class="card-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <i class="fas fa-comments fa-5x"></i>
                                             <p>
                                                  <span class="fs-1 fw-bold">
                                                       <?= count($comments) ?>
                                                  </span><br>
                                                  <span>Comments</span>
                                             </p>
                                        </div>
                                        </p>
                                   </div>
                                   <a class="card-footer list-group-item list-group-item-action" href="comments.php">
                                        <div class="d-flex justify-content-between align-items-center text-success">
                                             <span>View Detail</span>
                                             <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                   </a>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-4">
                              <div class="card border-warning mt-3">
                                   <div class="card-body bg-warning text-white">
                                        <p class="card-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <i class="fas fa-users fa-5x"></i>
                                             <p>
                                                  <span class="fs-1 fw-bold">
                                                       <?= count($users) ?>
                                                  </span><br>
                                                  <span>Users</span>
                                             </p>
                                        </div>
                                        </p>
                                   </div>
                                   <a class="card-footer list-group-item list-group-item-action" href="users.php">
                                        <div class="d-flex justify-content-between align-items-center text-warning">
                                             <span>View Detail</span>
                                             <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                   </a>
                              </div>
                         </div>
                         <div class="col-lg-3 col-md-4">
                              <div class="card border-danger mt-3">
                                   <div class="card-body bg-danger text-white">
                                        <p class="card-text">
                                        <div class="d-flex justify-content-between align-items-center">
                                             <i class="fas fa-list-alt fa-5x"></i>
                                             <p>
                                                  <span class="fs-1 fw-bold">
                                                       <?= count($categories) ?>
                                                  </span><br>
                                                  <span>Categories</span>
                                             </p>
                                        </div>
                                        </p>
                                   </div>
                                   <a class="card-footer list-group-item list-group-item-action" href="categories.php">
                                        <div class="d-flex justify-content-between align-items-center text-danger">
                                             <span>View Detail</span>
                                             <i class="fas fa-arrow-circle-right"></i>
                                        </div>
                                   </a>
                              </div>
                         </div>
                    </div>
               </div>
               <div class="container">
                    <div class="row">
                         <div class="col-12">
                              <div class="card mt-5">
                                   <div class="card-body">
                                        <canvas id="chBar"></canvas>
                                   </div>
                              </div>
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

<!-- chart -->
<script>
var chBar = document.getElementById("chBar");

var myChart = new Chart(chBar, {
     type: 'bar',
     data: {
          labels: ['Posts', 'Comments', 'Users', 'Categories'],
          datasets: [{
               label: 'Dataset',
               data: [<?= count($posts) ?>, <?= count($comments) ?>, <?= count($users) ?>,
                    <?= count($categories) ?>
               ],
               backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
               ],
               borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
               ],
               borderWidth: 1
          }]
     },
     options: {
          scales: {
               y: {
                    beginAtZero: true
               }
          }
     }
});
</script>