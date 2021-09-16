<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- PHP code -->
<?php 
include('../vendor/autoload.php');
use Helper\Auth;
Auth::check();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">Add New User</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <!-- user add form -->
               <div class="container">
                    <div class="card">
                         <div class="card-body">
                              <form action="../_actions/admin_add_user.php" method="POST" enctype="multipart/form-data">
                                   <div class="form-group mb-3">
                                        <label for="">Admin Name</label>
                                        <input type="text" name="admin_name" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Admin Email</label>
                                        <input type="email" name="admin_email" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Admin Password</label>
                                        <input type="password" name="admin_password" class="form-control">
                                   </div>
                                   <div class="form-group mb-3">
                                        <label for="">Profile</label>
                                        <input type="file" name="admin_profile" class="form-control">
                                   </div>
                                   <input type="submit" value="Add User" class="btn btn-success">
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

<!-- sweet alert add success Message -->
<?php if(isset($_SESSION['user_add_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['user_add_fail'] ?>',
})
</script>
<?php endif;
unset($_SESSION['user_add_fail']);
?>

<!-- sweet alert image type error Message -->
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