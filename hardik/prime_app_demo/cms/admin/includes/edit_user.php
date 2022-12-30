<?php

if (isset($_GET['u_id'])) {
    $u_id = $_GET['u_id'];

    $query = "SELECT * FROM user WHERE user_id='$u_id'";
    $user_data = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($user_data)) {
        $username = $row['username'];
        $password = $row['password'];
        $user_firstname = $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email    = $row['user_email'];
        $user_role = $row['user_role'];
        $user_image = $row['user_image'];
    }
}


if (isset($_POST['edit_user'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_email    = $_POST['user_email'];
    $old_image = $_POST['old_image'];

    $user_image = $_FILES['image']['name'];
    $user_image_temp = $_FILES['image']['tmp_name'];

    $user_role = $_POST['user_role'];


    move_uploaded_file($user_image_temp, "images/$user_image");

    if (empty($user_image)) {
        $user_image = $old_image;
    }


    $query = "SELECT randslot FROM user";
    $select_randslot = mysqli_query($connection, $query);

    $row = mysqli_fetch_array($select_randslot);
    $salt = $row['randslot'];
    $password = crypt($password, $salt);





    $query = "UPDATE `user` SET `username` = '$username', `password` = '$password', `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname',
     `user_email` = '$user_email', `user_image` = '$user_image', `user_role` = '$user_role' WHERE `user_id` = '$u_id';";

    $update_user = mysqli_query($connection, $query);

    if ($_SESSION['user_role'] == 'admin') {
        if ($user_role == 'subcraibar' && $_SESSION['user_id'] == $u_id) {
            session_destroy();
            header("location:../index.php");
        }
    }

    header("location:user.php");
}


?>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="pousernamest_title">Username</label>
        <input type="text" value="<?php echo $username; ?>" class="form-control" name="username" required>
    </div>


    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" value="<?php echo $password; ?>" class="form-control" name="password" required>
    </div>

    <div class="form-group">
        <label for="user_firstname">Firstname</label>
        <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname" required>
    </div>

    <div class="form-group">
        <label for="user_lastname">Lastname</label>
        <input type="text" value="<?php echo $user_lastname; ?>" class="form-control" name="user_lastname" required>
    </div>

    <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" value="<?php echo $user_email; ?>" class="form-control" name="user_email" required>
    </div>

    <div class="form-group">
        <!-- <label for="image">User Image</label> -->
        <img src="images/<?php echo $user_image; ?>" width="50px" alt="">
        <input type="file" name="image">
        <input type="hidden" name="old_image" value="<?php echo $user_image; ?>">
    </div>

    <div class="form-group">
        <label for="user_role">Role</label>

        <select class="form-control" style="width: 20%;" name="user_role" id="">

            <?php

            if ($user_role == 'admin') {

                echo "<option value='admin' >Admin</option>";
            } else {

                echo "<option value='subcraibr' >Subcraibar</option>";
            }
            ?>


            <option value="admin">Admin</option>
            <option value="subcraibar">subcraibar</option>

        </select>
    </div>



    <div class="form-group">
        <input type="submit" class="btn btn-warning" name="edit_user" value="Edit User">
    </div>

</form>