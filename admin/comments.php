<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- PHP code to show comment in table -->
<?php 
     include('../vendor/autoload.php');
     use Libs\Database\Comment;
     use Libs\Database\MySQL;
     use Helper\Auth;
     Auth::check();
     $table = new Comment(new MySQL());
     $comments = $table->ShowCmt();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Comment</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <div class="container">
                    <table class="table table-bordered">
                         <thead>
                              <tr class="bg-secondary text-light">
                                   <th>User</th>
                                   <th>Email</th>
                                   <th>Post ID</th>
                                   <th>Content</th>
                                   <th>Date</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($comments as $comment): ?>
                              <tr>
                                   <td><?= $comment['comment_user'] ?></td>
                                   <td><?= $comment['comment_email'] ?></td>
                                   <td><?= $comment['comment_post_id'] ?></td>
                                   <td><?= $comment['comment_content'] ?></td>
                                   <td><?= date('d-m-y',strtotime($comment['comment_date'])) ?></td>
                                   <td><a href="../_actions/admin_delete_comment.php?delete=<?= $comment['id'] ?>"
                                             class="btn btn-sm btn-danger">Delete</a></td>
                              </tr>
                              <?php endforeach ?>
                         </tbody>
                    </table>
               </div>
          </main>
          <!-- content footer -->
          <?php include("assets/content_footer.php")?>
     </div>
</div>
<!-- footer -->
<?php include("assets/footer.php") ?>
<!-- sweet alert delete success Message -->
<?php if(isset($_SESSION['cmt_delete_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['cmt_delete_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['cmt_delete_success']);
?>