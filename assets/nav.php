<?php
use Libs\Database\MySQL;
use Libs\Database\Category;
 $table = new Category(new MySQL());
 $categories = $table->ShowCat();
?>

<nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
     <div class="container px-4 px-lg-5">
          <a class="navbar-brand" href="index.php">Blog</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
               aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
               Menu
               <i class="fas fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ms-auto py-4 py-lg-0">
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="index.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="about.html">About</a></li>
                    <li class="nav-item dropdown">
                         <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                              data-bs-toggle="dropdown" aria-expanded="false">
                              Category
                         </a>
                         <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <!-- php code foreach categories -->
                              <?php foreach($categories as $category): ?>
                              <li>
                                   <a class="dropdown-item" href="index.php?category=<?= $category['id'] ?>">
                                        <?= $category['cat_title'] ?>
                                   </a>
                              </li>
                              <?php endforeach ?>
                              <!-- php code end foreach categories -->
                         </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="contact.html">Contact</a></li>
               </ul>
          </div>
     </div>
</nav>