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
                    <h5 class="card-title mb-4">Register Your Account</h5>
                    <form action="_actions/createUser.php" method="POST">
                         <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">User Name</label>
                              <input type="text" class="form-control" name="userName" required>
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Email address</label>
                              <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                   aria-describedby="emailHelp" required>
                              <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                         </div>
                         <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Password</label>
                              <input type="password" class="form-control" id="exampleInputPassword1" name="password"
                                   required>
                         </div>
                         <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
               </div>
          </div>
     </div>
</div>
<?php include __DIR__. "/views/layouts/footer.php"?>