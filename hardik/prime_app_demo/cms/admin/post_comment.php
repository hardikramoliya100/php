<?php include "includes/header.php"; ?>

<div id="wrapper">


    <?php include "includes/navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Welcom Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                    <?php include "../include/db.php"; ?>

                    <table class="table table-bordered table-hover ">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Author</th>
                                <th>Comment</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>In Respons To</th>
                                <th>Date</th>
                                <th>Change Status</th>
                                <!-- <th>Unapprove</th> -->
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_GET['unapprove'])) {
                                $p_id = $_GET['p_id'];
                                $comment_status = $_GET['unapprove'];
                                $query = "UPDATE comments SET comment_status='unapproved' WHERE comment_id='{$comment_status}'";
                                $edit_status = mysqli_query($connection, $query);
                                
                                header("location:post_comment.php?p_id=$p_id");
                            }
                            if (isset($_GET['approve'])) {
                                $p_id = $_GET['p_id'];
                                $comment_status = $_GET['approve'];
                                $query = "UPDATE comments SET comment_status='approved' WHERE comment_id='{$comment_status}'";
                                $edit_status = mysqli_query($connection, $query);

                                header("location:post_comment.php?p_id=$p_id");
                            }
                            
                            if (isset($_GET['delete'])) {
                                $p_id = $_GET['p_id'];
                                $comment_delete = $_GET['delete'];

                                $query = "SELECT * FROM comments WHERE comment_id='$comment_delete'";
                                $select_comment_data = mysqli_fetch_assoc(mysqli_query($connection, $query));
                                $the_post_id = $select_comment_data['comment_post_id'];


                                $query = "UPDATE posts SET post_comment_count = post_comment_count - 1 ";
                                $query .= "WHERE post_id ='$the_post_id'";

                                $add_commnet_count = mysqli_query($connection, $query);



                                $query = "DELETE FROM comments WHERE comment_id='{$comment_delete}'";
                                $delete_data = mysqli_query($connection, $query);


                                header("location:post_comment.php?p_id=$p_id");
                            }


                            ?>

                            <?php

                            if(isset($_GET['p_id'])){

                                $p_id = $_GET['p_id'];
                            }
                            $query = "SELECT * FROM comments WHERE comment_post_id ='$p_id'";
                            $comment_data = mysqli_query($connection, $query);

                            while ($row = mysqli_fetch_assoc($comment_data)) {
                                $comment_id = $row['comment_id'];
                                $comment_post_id = $row['comment_post_id'];
                                $comment_author = $row['comment_author'];
                                $comment_email = $row['comment_email'];
                                $comment_content = $row['comment_content'];
                                $comment_status = $row['comment_status'];
                                $comment_date = $row['comment_date'];


                                echo "<tr>";
                                echo "<td>$comment_id</td>";
                                echo "<td>$comment_author</td>";
                                echo "<td>$comment_content</td>";
                                echo "<td>$comment_email</td>";

                                // $query = "SELECT * FROM category WHERE cat_id='{$post_category_id}'";
                                // $category_edit = mysqli_query($connection, $query);

                                // while ($row = mysqli_fetch_assoc($category_edit)) {
                                //     $cat_title = $row['cat_title'];

                                //     echo "<td>$cat_title</td>";
                                // }



                                echo "<td>$comment_status</td>";

                                $query = "SELECT * FROM posts WHERE post_id='$comment_post_id'";

                                $post_data = mysqli_query($connection, $query);

                                while ($row = mysqli_fetch_assoc($post_data)) {
                                    $post_id = $row['post_id'];
                                    $post_title = $row['post_title'];

                                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                                }






                                echo "<td>$comment_date</td>";

                                if ($comment_status == 'unapproved') {
                                    echo "<td><a href='post_comment.php?approve=$comment_id&p_id=$post_id'>Approve</a></td>";
                                } else {

                                    echo "<td><a href='post_comment.php?unapprove=$comment_id&p_id=$post_id'>Unapprove</a></td>";
                                    // echo "<td><a href='post_comment.php?unapprove=edit_post&p_id=$post_id>Unapprove</a></td>";
                                }

                                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger btn-sm' href='post_comment.php?delete=$comment_id&p_id=$post_id'>DELETE</a></td>";
                                echo "</tr>";
                            }

                            ?>

                        </tbody>
                    </table>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/footer.php" ?>