<?php 
namespace Libs\Database;

use PDOException;

class Comment 
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function ShowCmt()
     {
          try
          {
               $query = "SELECT * FROM comments";

               $stmt = $this->db->query($query);

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function ShowCmtByPostID($id)
     {
          try
          {
               $query = "SELECT * FROM comments WHERE comments.comment_post_id = :id";

               $stmt = $this->db->prepare($query);
               
               $stmt->execute([':id' => $id]);
               
               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function StoreCmt($data)
     {
          try
          {
               $query = "INSERT INTO comments(comment_user,comment_email,comment_post_id,comment_content) VALUES (:comment_user,:comment_email,:comment_post_id,:comment_content)";

               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function DeleteCmt($id)
     {
          try
          {
               $query = "DELETE FROM comments WHERE id = :id";

               $stmt = $this->db->prepare($query);
               
               $stmt->execute([':id'=>$id]);

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}