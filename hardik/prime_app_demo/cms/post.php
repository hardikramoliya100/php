<?php include "include/db.php" ?>
<?php

if (isset($_POST['liked'])) {

    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];

    $query = "SELECT * FROM posts WHERE post_id='$post_id'";
    $postresult = mysqli_query($connection, $query);
    $post = mysqli_fetch_array($postresult);

    $like = $_POST['liked'];

    mysqli_query($connection, "UPDATE posts SET likes=likes+1 WHERE post_id='$post_id'");

    mysqli_query($connection, "INSERT INTO likes(user_id,post_id) VALUE('$user_id','$post_id')");

    $data = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM likes WHERE post_id='$post_id'"));
    print_r($data);
    return $data;
}

if (isset($_POST['unliked'])) {
    
    $post_id = $_POST['post_id'];
    $user_id = $_POST['user_id'];
    
    // $query = "SELECT * FROM posts WHERE post_id='$post_id'";
    // $postresult = mysqli_query($connection, $query);
    // $post = mysqli_fetch_array($postresult);
    
    // $like = $_POST['liked'];
    
    mysqli_query($connection, "UPDATE posts SET likes=likes-1 WHERE post_id='$post_id'");
    
    mysqli_query($connection, "DELETE FROM likes WHERE user_id='$user_id' AND post_id='$post_id'");
    
    $data = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM likes WHERE post_id='$post_id'"));
    
    print_r($data);
    return $data;
}

?>
<?php include "include/header.php" ?>

<!-- Navigation -->
<?php include "include/navigation.php" ?>


<!-- <script>alert('itwork')</script> -->

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php

            if (isset($_GET['p_id'])) {

                $the_post_id = $_GET['p_id'];
            }

            $query = "UPDATE posts SET post_view_count = post_view_count + 1 ";
            $query .= "WHERE post_id ='$the_post_id'";
            mysqli_query($connection, $query);

            $query = "SELECT * FROM posts WHERE post_id =' $the_post_id'";
            $posts_data = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>







                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="/php/hardik/prime_app_demo/cms/images/<?php echo $post_image; ?>" alt="" width="500" height="200">
                <hr>
                <p><?php echo $post_content; ?></p>

                <hr>

                <?php


                if (isset($_SESSION['user_id'])) {

                    $user_id = $_SESSION['user_id'];



                    $like_result = mysqli_query($connection, "SELECT * FROM likes WHERE post_id='$the_post_id'");

                    if (mysqli_num_rows($like_result) >= 1) { ?>


                        <div class="row">
                            <p class="pull-right"><span class="glyphicon glyphicon-thumbs-up"></span> <input type="button" id="event" value="Unlike" onclick="unlike(<?php echo $the_post_id; ?>,<?php echo $user_id; ?>)"></p>
                            
                        </div>
                    <?php
                    } else { ?>
                        <div class="row">
                            <p class="pull-right"><span class="glyphicon glyphicon-thumbs-up"></span> <input type="button" value="Like" id="event"  onclick="like(<?php echo $the_post_id; ?>,<?php echo $user_id; ?>)"></p>
                        </div>

                    <?php

                    }


                    ?>


                <?php
                } else {
                    echo "You Need login for Like ";
                }


                $how_many_like = mysqli_num_rows(mysqli_query($connection, "SELECT * FROM likes WHERE post_id='$the_post_id'"));

                ?>

                <div class="row">
                    <p class="pull-right total-like">Like:<?php echo $how_many_like; ?></p>
                </div>
                <div class="clearfix"></div>







            <?php }  ?>

            <?php


            if (isset($_POST['creat_comment'])) {

                $the_post_id = $_GET['p_id'];
                $comment_author = $_POST['comment_author'];
                $comment_email = $_POST['comment_email'];
                $comment_content = $_POST['comment_content'];

                $query = "INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                $query .= "VALUES ('$the_post_id','$comment_author','$comment_email','$comment_content','unapproved',now())";

                $insert_comment = mysqli_query($connection, $query);

                $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 ";
                $query .= "WHERE post_id ='$the_post_id'";

                $add_commnet_count = mysqli_query($connection, $query);

                // redirect(location:"cms/post.php?p_id=$the_post_id");
            }

            ?>

            <div class="well">

                <h4>Leave a comment</h4>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="comment_author">Author</label>
                        <input type="text" class="form-control" name="comment_author" required>
                    </div>
                    <div class="form-group">
                        <label for="comment_email">Email</label>
                        <input type="email" class="form-control" name="comment_email" required>
                    </div>
                    <div class="form-group">
                        <label for="comment_content">Comment</label>
                        <textarea name="comment_content" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="creat_comment" class="btn btn-primary">Comment</button>
                    </div>

                </form>
            </div>

            <hr>

            <?php

            $query = "SELECT * FROM comments WHERE comment_post_id='$the_post_id' ";
            $query .= "AND comment_status='approved' ";
            $query .= "ORDER BY comment_id DESC ";

            $select_comment = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_comment)) {
                $comment_author = $row['comment_author'];
                $comment_content = $row['comment_content'];
                $comment_date = $row['comment_date'];
            ?>


                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-body"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content; ?>
                    </div>
                </div>


            <?php } ?>











        </div>

        <!-- Blog Sidebar Widgets Column -->


        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>







    <!-- Footer -->
    <?php include "include/footer.php" ?>

    <script>
        $(document).ready(function() {
                    
                    
                    
        });

        function unlike(post_id, user_id) {
            
            $('#event').attr("onclick","like("+post_id+","+user_id+")");
            $('#event').attr("value","Like");

            $.ajax({

                url: "/php/hardik/prime_app_demo/cms/post.php?p_id=<?php echo $the_post_id; ?>",
                type: "POST",
                data: {
                    'unliked': 1,
                    'post_id': post_id,
                    'user_id': user_id
                },
                success: function(response) {

                    $('.total-like').html('Like:'+response);
                }
                
            });
            
            
        }
        
        function like(post_id, user_id) {
            $('#event').attr("onclick","unlike("+post_id+","+user_id+")");
            $('#event').attr("value","Unlike");

            
            $.ajax({
                
                 url: "/php/hardik/prime_app_demo/cms/post.php?p_id=<?php echo $the_post_id; ?>",
                 type: "POST",
                 data: {
                     'liked': 1,
                     'post_id': post_id,
                     'user_id': user_id
                    },
                    success:function(response){

                        $('.total-like').html('Like:'+response);
                    }
                    
                });


        }


    </script>