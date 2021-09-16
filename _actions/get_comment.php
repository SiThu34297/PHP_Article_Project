<?php
include('../vendor/autoload.php');
use Libs\Database\Comment;
use Libs\Database\MySQL;

$table = new Comment(new MySQL());
$id = $_POST['id'];
$comments = $table->ShowCmtByPostID($id);
?>
<?php foreach($comments as $comment):?>
<div class="box">
     <span>
          <span class="fw-bold"> <?= $comment['comment_user'] ?> </span> <br>
          <span> <?= date('d F, Y h:i A',strtotime($comment['comment_date'])) ?> </span>
     </span>
     <p> <?= $comment['comment_content'] ?> </p>
     <hr class="my-4">
</div>
<?php endforeach ?>