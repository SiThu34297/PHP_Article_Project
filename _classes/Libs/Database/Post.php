<?php 
namespace Libs\Database;

use PDOException;

class Post 
{
     private $db = null;

     public function __construct(MySQL $db)
     {
          $this->db = $db->connect();
     }

     public function ShowPost()
     {
          try
          {
               $query = "SELECT posts.* , categories.cat_title FROM posts INNER JOIN categories ON posts.post_cat_id = categories.id";
               
               $stmt = $this->db->query($query);

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function ShowPostByCatID($id)
     {
          try
          {
               $query = "SELECT posts.* , categories.cat_title FROM posts INNER JOIN categories ON posts.post_cat_id = categories.id WHERE posts.post_cat_id = $id ";
               
               $stmt = $this->db->prepare($query);
               $stmt->execute();
               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     public function ShowPostByID($id)
     {
          try
          {
               $query = "SELECT * FROM posts WHERE id = $id";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->fetch();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
     
     public function StorePost($data)
     {
          try
          {
               $query = "INSERT INTO posts(post_title,post_subtitle,post_content, post_author,post_date,post_image,post_cat_id) VALUES (:post_title,:post_subtitle,:post_content,:post_author,NOW(),:post_image,:post_cat_id)";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $this->db->lastInsertId();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function destroyPost($id)
     {
          try
          {
               $query = "DELETE FROM posts WHERE id = $id";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function UpdatePost($data)
     {
          try
          {
               $query = "UPDATE posts SET post_title = :post_title,post_subtitle = :post_subtitle,post_content = :post_content, post_author = :post_author,post_date = NOW(),post_image = :post_image,post_cat_id = :post_cat_id WHERE id = :id";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute($data);

               return $stmt->rowCount();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }

     public function Pagination($page_first_result,$result_pre_page)
     {
          try
          {
               $query = "SELECT * FROM posts ORDER BY id DESC LIMIT $page_first_result,$result_pre_page";
               
               $stmt = $this->db->prepare($query);

               $stmt->execute();

               return $stmt->fetchAll();
          }catch(PDOException $e)
          {
               return $e->getMessage();
          }
     }
}