<?php

include ("delete_model.php");

if (isset($_POST['checkBoxArray'])) {

    $bulkoption = $_POST['bulkoption'];

    foreach ($_POST['checkBoxArray'] as $checkboxdata) {

        switch ($bulkoption) {
            case 'published':

                $query = "UPDATE posts SET post_status = '{$bulkoption}' WHERE post_id='{$checkboxdata}'";
                mysqli_query($connection, $query);

                break;

            case 'draft':
                $query = "UPDATE posts SET post_status = '{$bulkoption}' WHERE post_id='{$checkboxdata}'";
                mysqli_query($connection, $query);
                break;

            case 'delete':
                $query = "DELETE FROM posts WHERE post_id='{$checkboxdata}'";
                mysqli_query($connection, $query);
                
                break;
                
                case 'clone':
                    
                    
                    
                    $query = "SELECT * FROM posts WHERE post_id='{$checkboxdata}'";
                    $posts_data = mysqli_query($connection,$query);
                    
                    
                    while ($row = mysqli_fetch_assoc($posts_data)) {
                        // $post_id = $row['post_id'];
                        $post_category_id = $row['post_category_id'];
                        $post_title = $row['post_title'];
                        $post_author = $row['post_author'];
                        $post_date = $row['post_date'];
                        $post_image = $row['post_image'];
                        $post_content = $row['post_content'];
                        $post_tage = $row['post_tage'];
                        // $post_comment_count = $row['post_comment_count'];
                        $post_status = $row['post_status'];
                    }
                    
                    $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tage`, `post_status`) ";
                    $query .= "VALUES ('$post_category_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tage', '$post_status')";
                    mysqli_query($connection, $query);
                    
                    break;

            default:
                # code...
                break;
        }
    }
}




?>


<form action="" method="post">



    <table class="table table-bordered table-hover ">

        <div class="col-xs-4" id="bulkoption">
            <select class="form-control" name="bulkoption" id="">
                <option value="">Select Option</option>
                <option value="published">Published</option>
                <option value="draft">Draft</option>
                <option value="delete">Delete</option>
                <option value="clone">Clone</option>
            </select>

        </div>
        <div class="col-xs-4">
            <input type="submit" name="submit" class="btn btn-success" value="Apply">
            <a class="btn btn-primary" href="posts.php?sourse=add_post">Add New</a>

        </div>


        <thead>
            <tr>
                <th><input type="checkbox" id="selectAllBox"></th>
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
                $query = "DELETE FROM posts WHERE post_id='{$post_delete}'";
                $delete_data = mysqli_query($connection, $query);

                header("location:posts.php");
            }

            if (isset($_GET['reset'])) {
                $post_delete = $_GET['reset'];
                $query = "UPDATE posts SET post_view_count=0 WHERE post_id='{$post_delete}'";
                $delete_data = mysqli_query($connection, $query);

                header("location:posts.php");
            }


            ?>

            <?php

            $query = "SELECT * FROM posts ORDER BY post_id DESC";
            $posts_data = mysqli_query($connection, $query);

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
                <td><input type='checkbox' class='checkBox' name='checkBoxArray[]' value="<?php echo $post_id; ?>"></td>
            <?php
                echo "<td>$post_id</td>";
                echo "<td>$post_author</td>";
                echo "<td>$post_title</td>";

                $query = "SELECT * FROM category WHERE cat_id='{$post_category_id}'";
                $category_edit = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($category_edit)) {
                    $cat_title = $row['cat_title'];

                    echo "<td>$cat_title</td>";
                }



                echo "<td>$post_status</td>";
                echo "<td><img width='100' src='../images/$post_image' alt=''></td>";
                echo "<td>$post_tage</td>";
                echo "<td><a href='post_comment.php?p_id=$post_id'>$post_comment_count</a></td>";

                $newDate = date("d-m-Y", strtotime($post_date));


                echo "<td>$newDate</td>";
                echo "<td><a class='btn btn-success btn-sm' href='../post.php?p_id={$post_id}'>VIEW</a></td>";
                echo "<td><a class='btn btn-warning btn-sm' href='posts.php?sourse=edit_post&p_id=$post_id'>EDIT</a></td>";
                echo "<td><a rel='$post_id' class='btn btn-danger btn-sm delete_link' href='javascript:void(0)'>DELETE</a></td>";
                // echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger btn-sm ' href='posts.php?delete=$post_id'>DELETE</a></td>";
                echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to reset'); \" href='posts.php?reset=$post_id'>$post_view_count</a></td>";
                echo "</tr>";
            }

            ?>

        </tbody>
    </table>
</form>

<script>

    $(document).ready(function(){

        $('.delete_link').on('click',function(){
            var id = $(this).attr("rel");
            var delete_url = "posts.php?delete="+id+"";
            $(".model_delete_link").attr("href",delete_url);

            $("#exampleModal").modal('show');

        });


    });

</script>