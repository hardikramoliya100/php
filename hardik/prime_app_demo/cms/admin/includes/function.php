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
        echo "<th><a href='categories.php?delete={$cat_id}'>DELETE</a></th>";
        echo "<th><a href='categories.php?edit={$cat_id}'>EDIT</a></th>";
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
