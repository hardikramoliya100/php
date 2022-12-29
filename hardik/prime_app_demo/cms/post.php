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

            if (isset($_GET['p_id'])) {

                $the_post_id = $_GET['p_id'];
            }

            $query = "SELECT * FROM posts WHERE post_id =' $the_post_id'";
            $posts_data = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>





                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="" width="500" height="200">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
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