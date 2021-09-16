<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- category form database php code -->
<?php 
use Libs\Database\Category;
use Libs\Database\MySQL;
use Helper\Auth;
Auth::check();
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
                    <h1 class="mt-4">Add New Categories</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
          </main>
          <!-- Add Categories Form -->
          <div class="container">
               <div class="row">
                    <div class="col-12">
                         <div class="card">
                              <div class="card-body">
                                   <form action="../_actions/admin_add_category.php" method="POST"
                                        id="category_validation">
                                        <div class="form-group mb-3">
                                             <label>Category Name</label>
                                             <input type="text" name="cat_title" class="form-control">
                                        </div>
                                        <input type="submit" value="Add Category" class="btn btn-secondary">
                                   </form>
                                   <!-- category edit form  -->
                                   <?php if(isset($_GET['edit'])): ?>
                                   <form action="../_actions/admin_edit_category.php" method="POST" class="mt-3">
                                        <div class="form-group mb-3">
                                             <label>Category Name</label>
                                             <input type="hidden" name="cat_id" class="form-control"
                                                  value="<?= $_GET['edit'] ?>">
                                             <input type="text" name="cat_title" class="form-control">
                                        </div>
                                        <input type="submit" value="Update Category" class="btn btn-secondary">
                                        <a href="javascript:history.back()" class="btn btn-primary">BACK</a>
                                   </form>
                                   <?php endif ?>
                              </div>
                         </div>
                    </div>
                    <div class="col-12">
                         <table class="table table-bordered mt-4">
                              <tr class="bg-secondary text-light">
                                   <th>ID</th>
                                   <th>Category Title</th>
                                   <th>Action</th>
                              </tr>
                              <!-- php loop categories code -->
                              <?php foreach($categories as $category): ?>
                              <tr>
                                   <td><?= $category['id'] ?></td>
                                   <td><?= $category['cat_title'] ?></td>
                                   <td>
                                        <a href="../_actions/admin_delete_category.php?delete=<?= $category['id']?>"
                                             class="btn btn-sm btn-danger">Delete</a>
                                        <a href="categories.php?edit=<?= $category['id'] ?>"
                                             class="btn btn-sm btn-warning">Edit</a>
                                   </td>
                              </tr>
                              <?php endforeach; ?>
                              <!-- end loop -->
                         </table>
                    </div>
               </div>
          </div>
          <!-- content footer -->
          <?php include("assets/content_footer.php") ?>
     </div>
</div>
<!-- footer -->
<?php include("assets/footer.php") ?>

<!-- sweet alert add success Message -->
<?php if(isset($_SESSION['cat_add_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['cat_add_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['cat_add_success']);
?>

<!-- sweet alert delete success Message -->
<?php if(isset($_SESSION['cat_delete_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['cat_delete_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['cat_delete_success']);
?>

<!-- sweet alert update success Message -->
<?php if(isset($_SESSION['cat_update_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['cat_update_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['cat_update_success']);
?>

<!-- sweet alert Error Message -->
<?php  if(isset($_SESSION['cat_add_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['cat_add_fail'] ?>',
})
</script>
<?php endif; ?>
<?php unset($_SESSION["cat_add_fail"]) ?>