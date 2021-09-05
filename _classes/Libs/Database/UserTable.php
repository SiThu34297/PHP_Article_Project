<?php
namespace Libs\Database;

use PDOException;

class UserTable 
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function create($data)
     {
          try 
          {
               $query = "INSERT INTO users (user_name,email,password) VALUES (:user_name,:email,:password)";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function loginUser($data)
     {
          try
          {
               $query = "SELECT * FROM users WHERE email = :email AND password = :password";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $stmt->fetch();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}