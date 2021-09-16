<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- Post Data PHP code -->
<?php 
     use Libs\Database\MySQL;
     use Libs\Database\Post;
     use Helper\Auth;
     Auth::check();
     include("../vendor/autoload.php");
     $table = new Post(new MySQL());
     $posts = $table->ShowPost();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">View All Posts</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <!-- post table -->
               <div class="container-fluid">
                    <table class="table table-bordered">
                         <thead>
                              <tr class="bg-secondary text-light">
                                   <th>Title</th>
                                   <th>Subtitle</th>
                                   <th>Author</th>
                                   <th>Date</th>
                                   <th>Image</th>
                                   <th>Category</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <!-- PHP code foreach for posts table -->
                              <?php foreach($posts as $post): ?>
                              <tr>
                                   <td> <?= $post['post_title'] ?> </td>
                                   <td> <?= $post['post_subtitle'] ?> </td>
                                   <td> <?= $post['post_author'] ?> </td>
                                   <td> <?= date('d-m-Y',strtotime($post['post_date']) )?> </td>
                                   <td> <?= $post['post_image'] ?> </td>
                                   <td> <?= $post['cat_title'] ?> </td>
                                   <td>
                                        <a href="edit_post.php?edit=<?= $post['id'] ?>"
                                             class="btn btn-sm btn-warning">Edit</a>
                                        <a href="../_actions/admin_delete_post.php?delete=<?= $post['id']?>"
                                             class="btn btn-sm btn-danger my-3">Delete</a>
                                   </td>
                              </tr>
                              <?php endforeach; ?>
                              <!-- end for each PHP Code -->
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

<!-- sweet alert add success Message -->
<?php if(isset($_SESSION['post_add_success'])): ?>
<script>
const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
})
Toast.fire({
     icon: 'success',
     title: '<?= $_SESSION['post_add_success'] ?>'
})
</script>
<?php endif;unset($_SESSION['post_add_success']);?>

<!-- sweet alert edit success Message -->
<?php if(isset($_SESSION['post_edit_success'])): ?>
<script>
const Toast = Swal.mixin({
     toast: true,
     position: 'top-end',
     showConfirmButton: false,
     timer: 3000,
     timerProgressBar: true,
     didOpen: (toast) => {
          toast.addEventListener('mouseenter', Swal.stopTimer)
          toast.addEventListener('mouseleave', Swal.resumeTimer)
     }
})
Toast.fire({
     icon: 'success',
     title: '<?= $_SESSION['post_edit_success'] ?>'
})
</script>
<?php endif;unset($_SESSION['post_edit_success']);?>

<!-- sweet alert delete Message -->
<?php  if(isset($_SESSION['post_delete_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['post_delete_success'] ?>',
})
</script>
<?php endif;unset($_SESSION["post_delete_success"]);?>