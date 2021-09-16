    <!-- session -->
    <?php session_start()?>
    <!-- header -->
    <?php include("assets/header.php") ?>
    <!-- Navigation-->
    <?php include("assets/nav.php") ?>
    <!-- PHP Code for post by id -->
    <?php
    use Libs\Database\Comment;
    use Libs\Database\MySQL;
    use Libs\Database\Post;
    $table = new Post(new MySQL());
    $cmtTable = new Comment(new MySQL());
    $id = $_GET['post'];
    $post = $table->ShowPostByID($id);
    $comments = $cmtTable->ShowCmtByPostID($id);
    ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('admin/assets/img/<?= $post['post_image'] ?>')">
         <div class="container position-relative px-4 px-lg-5">
              <div class="row gx-4 gx-lg-5 justify-content-center">
                   <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                             <h1>
                                  <?= $post['post_title'] ?>
                             </h1>
                             <h2 class="subheading">
                                  <?= $post['post_subtitle'] ?>
                             </h2>
                             <span class="meta">
                                  Posted by
                                  <a href="#!">
                                       <?= $post['post_author'] ?>
                                  </a>
                                  on <?= date('d F, Y',strtotime($post['post_date'] ))?>
                             </span>
                        </div>
                   </div>
              </div>
         </div>
    </header>
    <!-- Post Content-->
    <article class="mb-4">
         <div class="container px-4 px-lg-5">
              <div class="row gx-4 gx-lg-5 justify-content-center">
                   <div class="col-md-10 col-lg-8 col-xl-7">
                        <p>
                             <?= $post['post_content'] ?>
                        </p>

                        <a href="#!"><img class="img-fluid" src="admin/assets/img/<?= $post['post_image'] ?>"
                                  alt="image" /></a>
                   </div>
              </div>
         </div>
    </article>
    <hr class="my-4">
    <!-- comment box -->
    <div class="comment-container mb-5">
         <div class="container px-4 px-lg-5">
              <div class="row gx-4 gx-lg-5 justify-content-center">
                   <div class="col-md-10 col-lg-8 col-xl-7">
                        <!-- comment box -->
                        <div id="comment-box">

                        </div>
                        <!-- comment form -->
                        <h1 class="mt-4">Leave A Comment</h1>
                        <p>Your email address will not be published. Required fields are marked *</p>
                        <form id="comment-form">
                             <input type="hidden" name="post_id" id="post_id" value="<?= $post['id'] ?>">
                             <div class="form-group mb-3">
                                  <label for="">Comment</label>
                                  <textarea name="comment_content" cols="30" rows="5" class="form-control"
                                       id="comment_content"></textarea>
                             </div>
                             <div class="row">
                                  <div class="col">
                                       <div class="form-group mb-3">
                                            <label for="">Name</label>
                                            <input type="text" name="comment_user" class="form-control"
                                                 id="comment_user">
                                       </div>
                                  </div>
                                  <div class="col">
                                       <div class="form-group mb-3">
                                            <label for="">Email</label>
                                            <input type="email" name="comment_email" class="form-control"
                                                 id="comment_email">
                                       </div>
                                  </div>
                             </div>
                             <input type="submit" value="Post Comment" class="btn btn-lg btn-success" id="cmtBtn">
                        </form>
                   </div>
              </div>
         </div>
    </div>
    <!-- Footer-->
    <?php include("assets/footer.php") ?>
    <!--comment ajax jquery js  -->
    <script>
$(document).ready(function() {
     let id = <?= $id ?>;
     $("#cmtBtn").on("click", function(e) {
          e.preventDefault();
          let post_id = $("#post_id").val();
          let comment_content = $("#comment_content").val();
          let comment_user = $("#comment_user").val();
          let comment_email = $("#comment_email").val();
          $.ajax({
               url: "_actions/comment_add.php",
               type: "POST",
               data: {
                    post_id: post_id,
                    comment_content: comment_content,
                    comment_user: comment_user,
                    comment_email: comment_email,
               },
               success: function(data) {
                    loadData();
                    if (data === "success") {
                         $("#comment-form").trigger("reset");
                         Swal.fire({
                              icon: "success",
                              text: "Comment Send Successful!",
                         });
                    } else {
                         Swal.fire({
                              icon: "error",
                              text: "Comment Can't Send!",
                         });
                    }
               },
          });
     });

     function loadData() {
          $.ajax({
               url: "_actions/get_comment.php",
               type: "POST",
               data: {
                    id: id
               },
               success: function(data) {
                    $("#comment-box").html(data);
               },
          });
     }
     loadData();
});
let title = document.querySelector("title");
title.innerHTML = "Post Page";
    </script>