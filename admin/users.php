<!-- header -->
<?php include("assets/header.php") ?>
<!-- navbar -->
<?php include("assets/nav.php") ?>
<!-- PHP Code to show user data -->
<?php 
     include("../vendor/autoload.php");
     use Libs\Database\User;
     use Libs\Database\MySQL;
     use Helper\Auth;
     Auth::check();
     $table = new User(new MySQL());
     $users = $table->ShowUser();
?>
<!-- main content -->
<div id="layoutSidenav">
     <!-- sidebar -->
     <?php include("assets/sidebar.php") ?>
     <!-- admin panel container -->
     <div id="layoutSidenav_content">
          <main>
               <div class="container-fluid px-4">
                    <h1 class="mt-4">View All Users</h1>
                    <ol class="breadcrumb mb-4">
                         <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
               </div>
               <div class="container">
                    <table class="table table-bordered">
                         <thead>
                              <tr class="bg-secondary text-light">
                                   <th>Name</th>
                                   <th>Email</th>
                                   <th>Actions</th>
                              </tr>
                         </thead>
                         <tbody>
                              <?php foreach($users as $user): ?>
                              <tr>
                                   <td> <?= $user['admin_name'] ?> </td>
                                   <td> <?= $user['admin_email'] ?> </td>
                                   <td>
                                        <a href="edit_user.php?user=<?= $user['id'] ?>"
                                             class="btn btn-sm btn-warning">Edit</a>
                                        <a href="../_actions/admin_user_delete.php?delete=<?= $user['id']?>"
                                             class="btn btn-sm btn-danger">Delete</a>
                                   </td>
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

<!-- sweet alert user add success Message -->
<?php if(isset($_SESSION['user_add_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['user_add_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['user_add_success']);
?>

<!-- sweet alert user edit success Message -->
<?php if(isset($_SESSION['user_edit_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['user_edit_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['user_edit_success']);
?>

<!-- sweet alert user edit fail Message -->
<?php if(isset($_SESSION['user_edit_fail'])): ?>
<script>
Swal.fire({
     icon: 'error',
     title: '<?= $_SESSION['user_edit_fail'] ?>',
})
</script>
<?php endif;
unset($_SESSION['user_edit_fail']);
?>

<!-- sweet alert user delete success Message -->
<?php if(isset($_SESSION['user_delete_success'])): ?>
<script>
Swal.fire({
     icon: 'success',
     title: '<?= $_SESSION['user_delete_success'] ?>',
})
</script>
<?php endif;
unset($_SESSION['user_delete_success']);
?>