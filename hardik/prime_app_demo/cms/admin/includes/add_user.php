<?php
// include "include/db.php";

if (isset($_POST['add_user'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email	 = $_POST['user_email	'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $user_role = $_POST['user_role'];


    move_uploaded_file($user_image_temp, "images/$user_image");

    $query = "INSERT INTO `posts`(`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tage`, `post_status`) ";
    $query .= "VALUES ('$post_category_id', '$post_title', '$post_author', now(), '$post_image', '$post_content', '$post_tage', '$post_status')";

    $insert_post = mysqli_query($connection, $query);

    header("location:user.php");
}



?>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pousernamest_title">Username</label>
        <input type="text" class="form-control" name="username" required>
    </div>


    <div class="form-group">
        <label for="password">Password</label>
        <input type="text" class="form-control" name="password" required >
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" class="form-control" name="user_firstname" required>
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" class="form-control" name="user_lastname" required>
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" class="form-control" name="user_email" required>
    </div>

    <div class="form-group">
        <label for="image">User Image</label>
        <input type="file" name="user_image">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>
        <input type="text" class="form-control" name="user_role" required>
    </div>

   

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Public Post">
    </div>

</form>