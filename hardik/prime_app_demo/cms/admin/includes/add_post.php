<?php
// include "include/db.php";

if (isset($_POST['creat_post'])) {

    $post_title = $_POST['post_title'];

    if ($_POST['post_user'] == '') {
        
        $post_author = $_POST['post_author'];
    }else{
        
        $post_author = $_POST['post_user'];

    }

//  echo $post_author;
//  exit;

    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tage = $_POST['post_tage'];
    $post_content = $_POST['post_content'];
    $post_date = date('d-m-y');
    // $post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tage`, `post_status`) ";
    $query .= "VALUES ('$post_category_id', '$post_title', '$post_author',now(), '$post_image', '$post_content', '$post_tage', '$post_status')";

    $insert_post = mysqli_query($connection, $query);

    $post_id = mysqli_insert_id($connection);

    echo "<p class='bg-success'>Post Update.<a href='../post.php?p_id={$post_id}'>View Post</a>  or  <a href='posts.php'>More Post</a></p>";


    // header("location:posts.php");
}










?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" class="form-control" name="post_title" required>
    </div>

    <div class="form-group">
        <label for="post_category_id">Post category id</label>
        <select class="form-control" style="width: 20%;" name="post_category_id" id="">
            <?php

            $query = "SELECT * FROM category";
            $category_data = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($category_data)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                echo "<option value='$cat_id'>$cat_title</option>";
            }

            ?>
        </select>
    </div>
    
    <div class="form-group">
        <label for="">Post Author</label>


        <select class="form-control" style="width: 20%;" name="post_user" id="">
            <?php
              echo "<option value=''>--------</option>";
    
            $query = "SELECT * FROM user";
            $user_data = mysqli_query($connection, $query);
    
            while ($row = mysqli_fetch_assoc($user_data)) {
                $user_id = $row['user_id'];
                $username = $row['username'];
                echo "<option value='$username'>$username</option>";
            }
    
            ?>
        </select>


        <h5>or</h5>


        <input type="text" class="form-control" name="post_author" >
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" style="width: 20%;" name="post_status" id="">

            


            <option value="draft">Draft</option>
            <option value="published">published</option>

        </select>
        <!-- <input type="text" class="form-control" name="post_status" required> -->
    </div>

    <div class="form-group">
        <label for="image">Post Image</label>
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tage">Post tage</label>
        <input type="text" class="form-control" name="post_tage" required>
    </div>

    <div class="form-group">
        <label for="post_content">Post Contnt</label>
        <textarea name="post_content" class="form-control" id="summernote" cols="30" rows="10" required></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-success" name="creat_post" value="Public Post">
    </div>

</form>