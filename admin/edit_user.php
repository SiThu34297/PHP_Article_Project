<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- PHP code to take post data form $_GET id  -->
<?php 
     include("../vendor/autoload.php");
     use Libs\Database\User;
     use Libs\Database\MySQL; 
     use Helper\Auth;
     Auth::check();
     $id = $_GET['user'];
     $table = new User(new MySQL());
     $user = $table->ShowUserByID($id);
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit User</h1>
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
                                        <form action="../_actions/admin_edit_user.php" method="POST"
                                             enctype="multipart/form-data">
                                             <input type="hidden" name="user_id" value="<?= $user['id'] ?>">
                                             <div class="form-group mb-3">
                                                  <label for="">Admin Name</label>
                                                  <input type="text" name="admin_name" class="form-control"
                                                       value="<?= $user['admin_name'] ?>">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Admin Email</label>
                                                  <input type="email" name="admin_email" class="form-control"
                                                       value="<?= $user['admin_email'] ?>">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Admin Password</label>
                                                  <input type="password" name="admin_password" class="form-control">
                                             </div>
                                             <div class="form-group mb-3">
                                                  <label for="">Profile</label>
                                                  <input type="file" name="admin_profile" class="form-control">
                                                  <img src="assets/profile/<?= $user['admin_profile'] ?>"
                                                       class="img-thumbnail mt-2" alt="image" width="200">
                                             </div>
                                             <input type="submit" value="Update User" class="btn btn-secondary">
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

<!-- sweet alert user edit fail Message -->
<?php if(isset($_SESSION['admin_image_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['admin_image_fail'] ?>',
})
</script>
<?php endif;
unset($_SESSION['admin_image_fail']);
?>