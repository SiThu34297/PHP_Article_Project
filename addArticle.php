<?php include __DIR__. "/views/layouts/header.php" ?>

<style>
.card {
     max-width: 700px;
     margin: auto;
     background-color: #e3f2fd;
}
</style>
<div class="container">
     <div class="row">
          <div class="card mt-4">
               <div class="card-body">
                    <h5 class="card-title mb-4">Add Article</h5>
                    <!-- php code Photo Error  -->
                    <?php if(isset($_SESSION['photoError'])):?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <?= $_SESSION['photoError'] ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <?php
                         if(time() - $_SESSION['session_time_stamp'] > 5): 
                    ?>
                    <?php unset($_SESSION['photoError']) ?>
                    <?php endif; ?>
                    <!-- php code Type Error  -->
                    <?php if(isset($_SESSION['photoTypeError'])):?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                         <?= $_SESSION['photoTypeError'] ?>
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <?php
                         if(time() - $_SESSION['session_time_stamp'] > 5): 
                    ?>
                    <?php unset($_SESSION['photoTypeError']) ?>
                    <?php endif; ?>
                    <!-- php code  -->
                    <form action="_actions/createArticle.php" method="POST" enctype="multipart/form-data">
                         <input type="hidden" name="user_id" value=" <?= $_SESSION['user']['id'] ?> ">
                         <div class="mb-3">
                              <label>Title</label>
                              <input type="text" class="form-control" name="title">
                         </div>
                         <div class="mb-3">
                              <label>Body</label>
                              <textarea name="body" class="form-control"></textarea>
                         </div>
                         <div class="mb-3">
                              <label>Category</label>
                              <input type="text" class="form-control" name="category">
                         </div>
                         <div class="mb-3">
                              <label>Article Image</label>
                              <input type="file" class="form-control" name="photo">
                         </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?php include __DIR__. "/views/layouts/footer.php"?>