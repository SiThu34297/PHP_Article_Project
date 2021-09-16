<?php 
namespace Libs\Database;

use PDOException;

class User 
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function ShowUser()
     {
          try
          {
               $query = "SELECT * FROM users";

               $stmt = $this->db->query($query);

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function StoreUser($data)
     {
          try
          {
               $query = "INSERT INTO users (admin_name,admin_email,admin_password,admin_profile) VALUES (:admin_name,:admin_email,:admin_password,:admin_profile)";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);
               
               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function ShowUserByID($id)
     {
          try
          {
               $query = "SELECT * FROM users WHERE id = :id";

               $stmt = $this->db->prepare($query);

               $stmt->execute([':id' => $id]);

               return $stmt->fetch();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function UpdateUser($data)
     {
          try
          {
               $query = "UPDATE users SET admin_name = :admin_name,admin_email = :admin_email,admin_password = :admin_password,admin_profile = :admin_profile WHERE id = :id";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);
               
               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function DestroyUser($id)
     {
          try
          {
               $query = "DELETE FROM users WHERE id = :id";

               $stmt = $this->db->prepare($query);
               $stmt->execute([':id' => $id]);

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function login($email,$password)
     {
          try
          {
               $query = "SELECT * FROM users WHERE admin_email = :email AND admin_password = :password";

               $stmt = $this->db->prepare($query);

               $stmt->execute([':email' => $email ,':password' => $password ]);

               return $stmt->fetch();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}