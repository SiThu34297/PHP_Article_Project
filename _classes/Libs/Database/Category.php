<?php 
namespace Libs\Database;

use PDOException;

class Category
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function ShowCat()
     {
          try
          {
               $query = "SELECT * FROM categories";

               $stmt = $this->db->query($query);

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function StoreCat($data)
     {
          try
          {
               $query = "INSERT INTO categories (cat_title) VALUES (:cat_title)";

               $stmt = $this->db->prepare($query);

               $stmt->execute([':cat_title'=>$data]);
               
               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function destroyCat($id)
     {
          try
          {
               $query = "DELETE FROM categories WHERE id = :id";

               $stmt = $this->db->prepare($query);

               $stmt->execute([':id'=>$id]);
               
               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function updateCat($id,$cat_title)
     {
          try
          {
               $query = "UPDATE categories SET cat_title = :cat_title WHERE id = :id";

               $stmt = $this->db->prepare($query);

               $stmt->execute([':id'=>$id , 'cat_title' => $cat_title]);
               
               return $stmt->rowCount();
               
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}