<?php 
namespace Libs\Database;

use PDO;
use PDOException;

class Article 
{
     private $db = null;

     public  function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function createArticle($data)
     {
          try 
          {
               $query = "INSERT INTO articles (title,body,image,category_name,user_id) VALUES (:title,:body,:image,:category,:user_id)";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $this->db->lastInsertId();

          }catch(PDOException $e){
               return $e->getMessage();
          }
     }

     public function getArticle()
     {
          try
          {
               $query = "SELECT articles.*,users.user_name FROM articles INNER JOIN users ON articles.user_id = users.id";

               $stmt = $this->db->query($query);

               return $stmt->fetchAll();
               
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function detail($id)
     {
          try
          {
               $query = "SELECT articles.*,users.user_name FROM articles INNER JOIN users ON articles.user_id = users.id  WHERE articles.id = $id";

               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->fetch();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function deleteArticle($id , $user_id)
     {
          try 
          {
               $query = "DELETE FROM articles WHERE id = $id AND user_id = $user_id";

               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}