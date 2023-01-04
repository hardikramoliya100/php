 <?php include "include/db.php" ?>
 <?php include "include/header.php" ?>

 <!-- Navigation -->
 <?php include "include/navigation.php" ?>


 <!-- Page Content -->
 <div class="container">

     <div class="row">

         <!-- Blog Entries Column -->
         <div class="col-md-8">

             <?php

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {

                        $query = "SELECT * FROM posts ";
                    }
                } else {

                    $query = "SELECT * FROM posts WHERE post_status='published'";
                }

                $total_post = mysqli_num_rows(mysqli_query($connection, $query));
                $total_post = ceil($total_post / 5);



                if (isset($_GET['page'])) {

                    $page = $_GET['page'];
                } else {

                    $page = "";
                }

                if ($page == "" || $page == 1) {

                    $page_1 = 0;
                } else {

                    $page_1 = ($page * 5) - 5;
                }

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {

                        $query = "SELECT * FROM posts LIMIT $page_1,5";
                    }
                } else {

                    $query = "SELECT * FROM posts WHERE post_status='published' LIMIT $page_1,5";
                }



                $posts_data = mysqli_query($connection, $query);

                if (!mysqli_num_rows($posts_data)) {

                    echo "<h1>NO POST</h1>";
                }

                while ($row = mysqli_fetch_assoc($posts_data)) {
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0, 100);
                    $post_status = $row['post_status'];


                ?>






                 <h2>
                     <a href="<?php echo $GLOBALS['url']; ?>post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                 </h2>
                 <p class="lead">
                     by <a href="author.php?author_name=<?php echo $post_author; ?>"><?php echo $post_author; ?></a>
                 </p>
                 <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                 <hr>
                 <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="500" height="200">
                 <hr>
                 <p><?php echo $post_content; ?></p>
                 <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                 <hr>
             <?php



                } ?>

         </div>

         <!-- Blog Sidebar Widgets Column -->


         <?php include "include/sidebar.php" ?>

     </div>
     <!-- /.row -->

     <hr>

     <ul class="pager">


         <?php


            for ($i = 1; $i <= $total_post; $i++) {

                if ($i == $page) {

                    echo "<li><a class='active_link' href='index.php?page={$i}'>$i</a></li>";
                } else {

                    echo "<li><a href='index.php?page={$i}'>$i</a></li>";
                }
            }

            ?>


     </ul>
     <!-- Modal -->
     <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
         <div class="modal-dialog" role="document">
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLongTitle">Shoe Errer</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body">
                     <p class="error"></p>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    
                 </div>
             </div>
         </div>
     </div>
     <!-- Footer -->

     
     
     <!-- unset($_SESSION['errorMessage']); -->
     
     
     <?php include "include/footer.php" ?>

     <?php if (isset($_SESSION['errorMessage'])) : $errormessege = $_SESSION["errorMessage"];?>

         <script>
            var messege = '<?php echo $errormessege; ?>';
            $('#exampleModalLong').modal('show');
            $('.error').html(messege);
         </script>

     <?php unset($_SESSION['errorMessage']); endif; ?>