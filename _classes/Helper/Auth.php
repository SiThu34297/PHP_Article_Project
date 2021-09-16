<?php 
namespace Helper;
class Auth 
{
     static function check()
     {
          if(isset($_SESSION['user'])){
               return $_SESSION['user'];
          }else{
               header('location: ../admin/login.php');
          }
     }
}