<?php 
namespace Libs\Database;

use PDO;
use PDOException;

class MySQL 
{
     private $db_host;
     private $db_username;
     private $db_pass;
     private $db_name;
     private $db;
     private $db_options = [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
     ];

     public function __construct($db_host="localhost",$db_username="root",$db_pass="",$db_name="php_blog_project")
     {
          $this->db_host = $db_host;
          $this->db_username = $db_username;
          $this->db_pass = $db_pass;
          $this->db_name = $db_name;
          $this->db = null;
     }

     public function connect()
     {
          try{
               $this->db = new PDO("mysql:host=$this->db_host;dbname=$this->db_name",$this->db_username,$this->db_pass,$this->db_options);
               
               return $this->db;
          }catch (PDOException $e)
          {
               return $e->getMessage();
          }
     }
}