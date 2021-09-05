<?php

use Libs\Database\Article;
use Libs\Database\MySQL;
use Helpers\Time;
include('vendor/autoload.php');

     $articleTable = new Article(new MySQL());
     $articles = $articleTable->getArticle();
?>

<?php include __DIR__ .'/views/layouts/header.php' ?>
<div class="container">
     <!-- php code Add success  -->
     <?php 
               session_start();
               if(isset($_SESSION['AddArticleSuccess'])):
     ?>
     <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
          <?= $_SESSION['AddArticleSuccess'] ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>
     <?php endif; ?>
     <?php
          if(time() - $_SESSION['session_time_stamp'] > 5): 
          ?>
     <?php unset($_SESSION['AddArticleSuccess']) ?>
     <?php endif; ?>
     <!-- php code  -->
     <div class="row row-cols-1 row-cols-md-2 g-3 mb-5 mt-2">
          <?php foreach($articles as $article): ?>
          <div class="col">
               <div class="card h-100">
                    <img src="_actions/photos/<?= $article['image']?>" class="img-thumbnail" alt="image">
                    <div class="card-body">
                         <h5 class="card-title"><?= $article['title'] ?></h5>
                         <p class="card-text"><?= $article['body'] ?></p>
                    </div>
                    <div class="card-footer">
                         <div class="d-flex justify-content-between">
                              <small class="text-muted">
                                   Post By: <?= $article['user_name'] ?>
                                   <?= Time::diffForHumans(new DateTime($article['created_at']))?>
                              </small>
                              <a href="detail.php?post=<?= $article['id'] ?>" class="card-lik">View Detail &raquo;</a>
                         </div>
                    </div>
               </div>
          </div>
          <?php endforeach ?>
     </div>

</div>

<?php  include __DIR__ .'/views/layouts/footer.php' ?>