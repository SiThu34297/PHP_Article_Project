<?php session_start()?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
     <!-- Navbar Brand-->
     <a class="navbar-brand ps-3" href="index.php">Admin Management</a>
     <!-- Sidebar Toggle-->
     <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
          <i class="fas fa-bars"></i>
     </button>

     <!-- Navbar-->
     <ul class="navbar-nav ms-auto  me-3 ">
          <li class="nav-item dropdown">
               <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    <i>
                         <img src="https://ui-avatars.com/api/?name=<?= $_SESSION['user']['admin_name'] ?>"
                              alt="profile" width="42" class="rounded-circle">
                    </i></a>
               <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="../_actions/logout.php">Logout</a></li>
               </ul>
          </li>
     </ul>
</nav>