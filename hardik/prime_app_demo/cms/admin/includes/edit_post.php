<?php

if(isset($_GET['p_id'])){
    $p_id=$_GET['p_id'];

    $query = "SELECT * FROM posts WHERE post_id='$p_id'";
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
}

}


if(isset($_POST['update_post'])){

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id = $_POST['post_category_id'];
    $post_status = $_POST['post_status'];
    $old_image = $_POST['old_image'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tage = $_POST['post_tage'];
    $post_content = $_POST['post_content'];

    move_uploaded_file($post_image_temp,"../images/$post_image");

    if(empty($post_image)){
        $post_image = $old_image;
    }

    $query = "UPDATE `posts` SET `post_category_id` = '$post_category_id', `post_title` = '$post_title', `post_author` = '$post_author', `post_date` = now(), `post_image` = '$post_image', `post_content` = '$post_content', `post_tage` = '$post_tage',  `post_status` = '$post_status' WHERE `post_id` = '$p_id';";

    $update_post = mysqli_query($connection,$query); 

  
    echo "<p class='bg-success'>Post Update.<a href='../post.php?p_id={$post_id}'>View Post</a>  or  <a href='posts.php'>Edit more Post</a></p>";
    // header("location:posts.php");
}


?>
<a href="../posts.php?p_id={$post_id}"></a>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="post_title">Post Title</label>
        <input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
    </div>

    <div class="form-group">
        <label for="post_category_id">Post category</label>
        
        <select class="form-control" style="width: 20%;" name="post_category_id" id="">
            <?php
            
            $query = "SELECT * FROM category";
            $category_data = mysqli_query($connection, $query);
        
            while ($row = mysqli_fetch_assoc($category_data)) {
                $cat_title = $row['cat_title'];
                $cat_id = $row['cat_id'];
                ?>

                 <option value='<?php echo $cat_id; ?>' selected='<?php if ($post_category_id == $cat_id) {
                                        echo "selected";
                                    } ?>'><?php echo $cat_title; ?></option>
               
               <?php
            }
            
            ?>
        </select>
    </div>

    <div class="form-group">
        <label for="post_author">Post Author</label>
        <input type="text" value="<?php echo $post_author; ?>" class="form-control" name="post_author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <select class="form-control" style="width: 20%;" name="post_status" id="">

            <?php

            if ($post_status == 'draft') {

                echo "<option value='draft' >Draft</option>";
            } else {

                echo "<option value='published' >Published</option>";
            }
            ?>


            <option value="draft">Draft</option>
            <option value="published">published</option>

        </select>
    </div>

    <div class="form-group">
        <!-- <label for="image">Post Image</label> -->
        <img src="../images/<?php echo $post_image; ?>" width="100" alt="">
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="<?php echo $post_image; ?>">
    </div>

    <div class="form-group">
        <label for="post_tage">Post tage</label>
        <input type="text" value="<?php echo $post_tage; ?>" class="form-control" name="post_tage">
    </div>

    <div class="form-group">
        <label for="post_content">Post Contnt</label>
        <textarea name="post_content"  class="form-control" id="summernote" cols="30" rows="10"><?php echo $post_content; ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning" name="update_post" value="Update Post">
    </div>

</form>