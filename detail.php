<?php
session_start();
use Helpers\Time;
use Libs\Database\Article;
use Libs\Database\Comment;
use Libs\Database\MySQL;

include('vendor/autoload.php');
     $post_id = $_GET['post'];
     $table = new Article(new MySQL());
     $article = $table->detail($post_id);

     $commentTable = new Comment(new MySQL());
     $comments = $commentTable->getComment($article['id']);
?>
<?php include __DIR__. '/views/layouts/header.php' ?>
<div class="container">
     <div class="card mt-3">
          <div class="card-header">
               Article Detail
          </div>
          <div class="card-body">
               <h5 class="card-title"><?= $article['title'] ?></h5>
               <img src="_actions/photos/<?= $article['image'] ?>" class="img-fluid" alt="image">
               <p class="card-text mt-3"><?= $article['body'] ?></p>
               <div class="sub-title text-muted small">
                    By: <?= $article['user_name'] ?><br>
                    Last Update: <?= Time::diffForHumans(new DateTime($article['created_at']))?>
               </div>
               <a href="_actions/deleteArticle.php?id=<?= $article['id'] ?>&user_id=<?= $_SESSION['user']['id'] ?>"
                    class="btn btn-warning mt-3">Delete</a>
          </div>
     </div>

     <!-- comment div  -->
     <ul class="list-group mb-3 mt-3">
          <li class="list-group-item active">Comment <span class="badge bg-danger">
                    <?= count($comments) ?></span></li>
          <?php foreach($comments as $comment): ?>
          <li class="list-group-item">
               <div class="d-flex justify-content-between align align-items-center">
                    <span>
                         <span><?= $comment['content'] ?></span>
                         <span class="small text-primary"> By: <?= $comment['user_name'] ?> </span>
                         <span><a href="_actions/deleteComment.php?Cmtid=<?= $comment['id'] ?>&user_id=<?= $_SESSION['user']['id'] ?>&article_id=<?= $article['id'] ?>"
                                   type="button" class="btn-close btn-sm"></a></span>
                    </span>

               </div>
          </li>
          <?php endforeach; ?>
     </ul>
     <?php if(isset($_SESSION['user'])): ?>
     <form action="_actions/createComment.php" class="mb-5" method="POST">
          <div class="form-group">
               <input type="hidden" name="article_id" value="<?= $article['id'] ?>">
               <input type="hidden" name="user_id" value="<?= $_SESSION['user']['id'] ?>">
               <textarea class="form-control" placeholder="Comment" name="content"></textarea>
               <input type="submit" value="Comment" class="btn btn-info mt-3">
          </div>
     </form>
     <?php endif; ?>
</div>
<?php include __DIR__. '/views/layouts/footer.php' ?>