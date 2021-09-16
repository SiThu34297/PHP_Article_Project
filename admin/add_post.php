<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- php code for category -->
<?php 
     use Libs\Database\Category;
     use Libs\Database\MySQL;
     use Helper\Auth;
     Auth::check();
     include("../vendor/autoload.php");
     $table = new Category(new MySQL());
     $categories = $table->ShowCat();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Add New Post</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <!-- Add New Post Form -->
               <div class="container">
                    <div class="card">
                         <div class="card-body">
                              <form action="../_actions/admin_add_post.php" method="POST" enctype="multipart/form-data">
                                   <div class="form-group mb-3">
                                        <label for="">Post Title</label>
                                        <input type="text" name="post_title" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Post Subtitle</label>
                                        <input type="text" name="post_subtitle" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Post Content</label>
                                        <textarea name="post_content" class="form-control"></textarea>
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Post Author</label>
                                        <input type="text" name="post_author" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Post Image</label>
                                        <input type="file" name="post_image" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Post Category</label>
                                        <select name="post_category" class="form-control">
                                             <option value="0">--SELECT CATEGORY--</option>
                                             <!-- PHP code to show category -->
                                             <?php foreach($categories as $category): ?>
                                             <option value="<?= $category['id'] ?>">
                                                  <?= $category['cat_title'] ?>
                                             </option>
                                             <?php endforeach ?>
                                        </select>
                                   </div>
                                   <input type="submit" value="Add Post" class="btn btn-success">
                              </form>
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
<!-- sweet alert Error Message -->
<?php  if(isset($_SESSION['post_add_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['post_add_fail'] ?>',
})
</script>
<?php endif; ?>
<?php unset($_SESSION["post_add_fail"]) ?>

<!-- sweet alert Error Message -->
<?php  if(isset($_SESSION['post_image_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['post_image_fail'] ?>',
})
</script>
<?php endif; ?>
<?php unset($_SESSION["post_image_fail"]) ?>

<!-- check editor -->
<script>
CKEDITOR.replace('post_content');
</script>