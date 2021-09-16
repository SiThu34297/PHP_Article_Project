<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- PHP code to take post data form $_GET id  -->
<?php 
     include("../vendor/autoload.php");
     use Libs\Database\Post;
     use Libs\Database\Category;
     use Libs\Database\MySQL;
     use Helper\Auth;
     Auth::check();
     $id = $_GET['edit'];
     $table = new Post(new MySQL());
     $catTable = new Category(new MySQL());
     $post = $table->ShowPostByID($id);
     $categories = $catTable->ShowCat();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Post</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <div class="container">
                    <div class="row">
                         <div class="col-12">
                              <div class="card">
                                   <div class="card-body">
                                        <!-- edit form -->
                                        <form action="../_actions/admin_edit_post.php" method="POST"
                                             enctype="multipart/form-data">
                                             <input type="hidden" name="post_id" value="<?= $id ?>">
                                             <div class="form-group mb-3">
                                                  <label for="">Post Title</label>
                                                  <input type="text" name="post_title" class="form-control"
                                                       value="<?= $post['post_title'] ?>">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Post Subtitle</label>
                                                  <input type="text" name="post_subtitle" class="form-control"
                                                       value="<?= $post['post_subtitle'] ?>">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Post Content</label>
                                                  <textarea name="post_content"
                                                       class="form-control"><?= $post['post_content'] ?></textarea>
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Post Author</label>
                                                  <input type="text" name="post_author" class="form-control"
                                                       value="<?= $post['post_author'] ?>">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Post Image</label>
                                                  <input type="file" name="post_image" class="form-control">
                                                  <img src="assets/img/<?= $post['post_image'] ?>"
                                                       class="img-thumbnail mt-2" alt="image" width="200">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Post Category</label>
                                                  <select name="post_category" class="form-control">
                                                       <!-- PHP code to show category -->
                                                       <?php foreach($categories as $category):?>
                                                       <option value="<?= $category['id'] ?>">
                                                            <?= $category['cat_title'] ?>
                                                       </option>
                                                       <?php endforeach ?>
                                                  </select>
                                             </div>
                                             <input type="submit" value="Update Post" class="btn btn-secondary">
                                             <a href="javascript:history.back()" class="btn btn-info">Back</a>
                                        </form>
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

<!-- sweet alert Error Message -->
<?php  if(isset($_SESSION['post_edit_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['post_edit_fail'] ?>',
})
</script>
<?php endif; ?>
<?php unset($_SESSION["post_edit_fail"]) ?>

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