<?php 
namespace Libs\Database;

use PDO;
use PDOException;

class Comment 
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function createComment($data)
     {
          try
          {
               $query = "INSERT INTO comment (content,user_id,article_id) VALUES (:content,:user_id,:article_id)";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function getComment($id)
     {
          try
          {
               $query = "SELECT comment.* , users.user_name FROM comment INNER JOIN users ON comment.user_id = users.id WHERE comment.article_id = $id";

               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function deleteComment($id , $user_id)
     {
          try
          {
               $query = "DELETE FROM comment WHERE id = $id AND user_id = $user_id";

               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}