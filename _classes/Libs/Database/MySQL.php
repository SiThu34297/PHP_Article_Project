<?php 
namespace Libs\Database;

use PDO;
use PDOException;

class MySQL 
{
     private $db_host;
     private $db_name;
     private $db_user;
     private $db_pass;
     private $db;

     public function __construct($db_host = "localhost",$db_name="blog_cms",$db_user = "root", $db_pass = "")
     {
          $this->db_host = $db_host;
          $this->db_name = $db_name;
          $this->db_user = $db_user;
          $this->db_pass = $db_pass;
          $this->db = null;
     }

     public function connect()
     {
          try
          {
               $this->db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_user,$this->db_pass,
               [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
               ]);

               return $this->db;
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}