<!-- header -->
<?php include("assets/header.php")?>
<!-- Navigation-->
<?php include("assets/nav.php") ?>
<!-- Page Header-->
<?php include("assets/banner.php") ?>
<!-- PHP Posts Code -->
<?php
use Libs\Database\MySQL;
use Libs\Database\Post;

$table = new Post(new MySQL());
$post_count = $table->ShowPost();
if(isset($_GET['category']))
{
     $id = $_GET['category'];
     $catPosts = $table->ShowPostByCatID($id);
}
// for pagination
//determine which page number visitor is currently on  
if (!isset ($_GET['page']) ) {  
     $page = 1;  
} else {  
     $page = $_GET['page'];  
}
//post pre page
$post_pre_page = 3;
//determine the sql LIMIT starting number for the results on the displaying page  
$page_first_result = ($page-1) * $post_pre_page;    

$posts = $table->Pagination($page_first_result,$post_pre_page);

$number_of_result = count($post_count);

$number_of_page = ceil($number_of_result/$post_pre_page);

?>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
     <div class="row gx-4 gx-lg-5 justify-content-center">
          <div class="col-md-10 col-lg-8 col-xl-10">
               <!-- to show category PHP  -->
               <?php if(isset($_GET['category'])): ?>
               <!-- condition cat id have or not -->
               <?php if(empty($catPosts)):?>
               <!-- if no post with category id -->
               <h2 class="post-title text-warning">
                    There is no post for this category!
               </h2>
               <?php else: ?>
               <!-- Post preview-->
               <?php foreach($catPosts as $catPost):?>
               <div class="post-preview">
                    <a href="post.php?post=<?= $catPost['id']?>">
                         <h2 class="post-title">
                              <?= $catPost['post_title'] ?>
                         </h2>
                         <h3 class="post-subtitle">
                              <?= $catPost['post_subtitle'] ?>
                         </h3>
                    </a>
                    <p class="post-meta">
                         Posted by
                         <a href="#!">
                              <?= $catPost['post_author'] ?>
                         </a>
                         on <?= date('d F, Y',strtotime($catPost['post_date'] ))?>
                    </p>
               </div>
               <?php endforeach ?>
               <!-- Divider-->
               <hr class="my-4" />
               <?php endif; ?>
               <!-- condition cat id have or not code end -->
               <?php else: ?>
               <!-- PHP code foreach posts -->
               <?php foreach($posts as $post): ?>
               <!-- Post preview-->
               <div class="post-preview">
                    <a href="post.php?post=<?= $post['id']?>">
                         <h2 class="post-title">
                              <?= $post['post_title'] ?>
                         </h2>
                         <h3 class="post-subtitle">
                              <?= $post['post_subtitle'] ?>
                         </h3>
                    </a>
                    <p class="post-meta">
                         Posted by
                         <a href="#!">
                              <?= $post['post_author'] ?>
                         </a>
                         on <?= date('d F, Y',strtotime($post['post_date'] ))?>
                    </p>
               </div>
               <!-- Divider-->
               <hr class="my-4" />
               <?php endforeach ?>
               <!-- end PHP code foreach -->
               <?php endif; ?>
               <!-- pagination -->
               <nav aria-label="Page navigation example">
                    <ul class="pagination">
                         <?php for($page = 1;$page <= $number_of_page;$page++): ?>
                         <li class="page-item"><a class="page-link" href="index.php?page=<?= $page ?>"><?= $page ?></a>
                         </li>
                         <?php endfor ?>
                    </ul>
               </nav>
          </div>
     </div>
</div>
<!-- Footer-->
<?php include("assets/footer.php") ?>

<script>
let title = document.querySelector("title");
title.innerHTML = "Media Page";
</script>