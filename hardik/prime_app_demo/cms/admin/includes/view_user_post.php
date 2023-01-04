<?php include("delete_model.php"); ?>
<?php

if(isset($_POST['export'])){
    $obj->exportdata();
}

?>


<form action="" method="post">



    <table class="table table-bordered table-hover ">


        <div class="col-xs-4">
            <a class="btn btn-primary" href="">Import</a>
            <!-- <a class="btn btn-primary" href="">Export</a> -->
            <form action="userdata.php" method="post"><input class="btn btn-primary" type="submit" value="Export" name="export"></form>

        </div>

        <thead>
            <tr>

                <th>Id</th>
                <th>Author</th>
                <th>Title</th>
                <th>category</th>
                <th>Status</th>
                <th>Image</th>
                <th>Tage</th>
                <th>Comment</th>
                <th>Date</th>
                <th>View Post</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            <?php

            if (isset($_GET['delete'])) {
                $post_delete = $_GET['delete'];

                $obj->deletepost($post_delete);

                header("location:userdata.php");
            }

            if (isset($_GET['reset'])) {
                $post_reset = $_GET['reset'];
                $obj->resetview($post_reset);

                header("location:userdata.php");
            }


            ?>

            <?php
            $posts_data = $obj->fechdata();


            while ($row = mysqli_fetch_assoc($posts_data)) {
                $post_id = $row['post_id'];
                $post_category_id = $row['post_category_id'];
                $post_title = $row['post_title'];
                $post_author = $row['post_author'];
                $post_date = $row['post_date'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];
                $post_tage = $row['post_tage'];
                $post_comment_count = $row['post_comment_count'];
                $post_status = $row['post_status'];
                $post_view_count = $row['post_view_count'];

                echo "<tr>";
            ?>
                >
            <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                $category_edit = $obj->fechcategorydata($post_category_id);


                while ($row = mysqli_fetch_assoc($category_edit)) {
                    $cat_title = $row['cat_title'];

                    echo "<td>$cat_title</td>";
                }



                echo "<td>$post_status</td>";
                echo "<td><img width='100' src='../images/$post_image' alt=''></td>";
                echo "<td>$post_tage</td>";
                echo "<td><a href='post_comment.php?p_id=$post_id'>$post_comment_count</a></td>";
                echo "<td>$post_date</td>";
                echo "<td><a class='btn btn-success btn-sm' href='../post.php?p_id={$post_id}'>VIEW</a></td>";
                echo "<td><a class='btn btn-warning btn-sm' href='posts.php?sourse=edit_post&p_id=$post_id'>EDIT</a></td>";
                echo "<td><a rel='$post_id' class='btn btn-danger btn-sm delete_link' href='javascript:void(0)'>DELETE</a></td>";
                // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger btn-sm ' href='posts.php?delete=$post_id'>DELETE</a></td>";
                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to reset'); \" href='userdata.php?reset=$post_id'>$post_view_count</a></td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>
</form>


<script>
    $(document).ready(function() {

        $('.delete_link').on('click', function() {
            var id = $(this).attr("rel");
            var delete_url = "userdata.php?delete=" + id + "";
            $(".model_delete_link").attr("href", delete_url);

            $("#exampleModal").modal('show');

        });


    });
</script>