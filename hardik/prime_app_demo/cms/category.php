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

            if (isset($_GET['cat_id'])) {

                $the_cat_id = $_GET['cat_id'];
            }

            if (isset($_SESSION['user_role'])) {
                if ($_SESSION['user_role'] == 'admin') {

                    $query = "SELECT * FROM posts WHERE post_category_id='$the_cat_id'";
                }
            } else {

                // $query = "SELECT * FROM posts WHERE post_status='published' LIMIT $page_1,5";
                $query = "SELECT * FROM posts WHERE post_category_id='$the_cat_id' AND post_status='published'";
            }

            $posts_data = mysqli_query($connection, $query);

            if(!mysqli_num_rows($posts_data)){

                echo "<h1>NO POST</h1>";
            }

            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'],0,100);

            ?>





                

                <!-- First Blog Post -->
                <h2>
                    <a href="<?php echo $GLOBALS['url']; ?>post/<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="/php/hardik/prime_app_demo/cms/images/<?php echo $post_image; ?>" alt="" width="500" height="200">
                <hr>
                <p><?php echo $post_content; ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
            <?php }  ?>

        </div>

        <!-- Blog Sidebar Widgets Column -->


        <?php include "include/sidebar.php" ?>

    </div>
    <!-- /.row -->

    <hr>

    <!-- Footer -->
    <?php include "include/footer.php" ?>