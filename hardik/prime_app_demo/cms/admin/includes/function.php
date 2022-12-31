<?php

function insert_category()
{
    global $connection;
    if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title)) {
            echo "this fild shoud not be empty";
        } else {

            $query = "INSERT INTO category(cat_title) VALUE('{$cat_title}')  ";

            $category_query = mysqli_query($connection, $query);

            if (!$category_query) {
                die("QUERY FAILED" . mysqli_errno($connection));
            }
        }
    }
}
function selectAllCategories()
{
    global $connection;
    $query = "SELECT * FROM category";
    $category_data = mysqli_query($connection, $query);

    while ($row = mysqli_fetch_assoc($category_data)) {
        $cat_title = $row['cat_title'];
        $cat_id = $row['cat_id'];

        echo "<tr>";
        echo "<th>{$cat_id}</th>";
        echo "<th>{$cat_title}</th>";
        echo "<th><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger btn-sm' href='categories.php?delete={$cat_id}'>DELETE</a></th>";
        echo "<th><a class='btn btn-success btn-sm' href='categories.php?edit={$cat_id}'>EDIT</a></th>";
        echo "</tr>";
    }
}
function deleteCategory()
{
    global $connection;
    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];

        $query = "DELETE FROM category WHERE cat_id='{$delete_id}'";
        $delete_data = mysqli_query($connection, $query);

        header("location:categories.php");
    }
}
// function redirect($location){
//     return header(header:"Location".$location);
// }

function online_user()
{

    // if (isset($_GET['onlineuser'])) {

        global $connection;

        if (!$connection) {
            session_start();
            include("../../include/db.php");




            $session = session_id();
            $time = time();
            $time_in_second = 30;
            $time_out = $time - $time_in_second;

            $query = "SELECT * FROM user_online WHERE session = '$session'";

            $count = mysqli_num_rows(mysqli_query($connection, $query));

            if ($count == NULL) {

                $query = "INSERT INTO user_online(session,time) VALUE('$session','$time')";

                $insert_session = mysqli_query($connection, $query);
            } else {

                $query = "UPDATE user_online SET time='$time' WHERE session='$session'";

                $update_session = mysqli_query($connection, $query);
            }

            $query = "SELECT * FROM user_online WHERE time > '$time_out'";

            $count_online_user = mysqli_num_rows(mysqli_query($connection, $query));

            echo $count_online_user;
        }
    // }
}

online_user();
