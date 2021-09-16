<div id="layoutSidenav_nav">
     <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
          <div class="sb-sidenav-menu">
               <div class="nav">
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-tachometer-alt"></i>
                         </div>
                         Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Management</div>
                    <!-- view all posts -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts"
                         aria-expanded="false" aria-controls="collapseLayouts">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-blog"></i>
                         </div>
                         Posts
                         <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                         </div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="posts.php">View All Posts</a>
                              <a class="nav-link" href="add_post.php">Add New Post</a>
                         </nav>
                    </div>
                    <!-- categories -->
                    <a class="nav-link" href="categories.php">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-list-alt"></i>
                         </div>
                         Categories
                    </a>
                    <!-- comments -->
                    <a class="nav-link" href="comments.php">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-comments"></i>
                         </div>
                         Comments
                    </a>
                    <!-- view all users -->
                    <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                         aria-expanded="false" aria-controls="collapsePages">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-users"></i>
                         </div>
                         Users
                         <div class="sb-sidenav-collapse-arrow">
                              <i class="fas fa-angle-down"></i>
                         </div>
                    </a>
                    <div class="collapse" id="collapsePages" aria-labelledby="headingOne"
                         data-bs-parent="#sidenavAccordion">
                         <nav class="sb-sidenav-menu-nested nav">
                              <a class="nav-link" href="users.php">View All Users</a>
                              <a class="nav-link" href="add_user.php">Add New Uses</a>
                         </nav>
                    </div>
                    <!-- profile -->
                    <a class="nav-link" href="profile.php">
                         <div class="sb-nav-link-icon">
                              <i class="fas fa-user-circle"></i>
                         </div>
                         Profile
                    </a>
               </div>
          </div>
          <div class="sb-sidenav-footer">
               <div class="small">Logged in as:</div>
               Start Bootstrap
          </div>
     </nav>
</div>