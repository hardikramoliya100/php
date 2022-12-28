<?php 
$query = "SELECT * FROM category WHERE cat_id='{$edit_id}'";
$category_edit = mysqli_query($connection, $query);

while ($row = mysqli_fetch_assoc($category_edit)) {
    $cat_title = $row['cat_title'];


?>

    <form action="" method="POST">
        <div class="form-group">
            <label for="cat_title">Edit Category</label>
            <input type="text" value="<?php if (isset($cat_title)) {
                                            echo "$cat_title";
                                        } ?>" class="form-control" name="cat_title">
        </div>


        <div class="form-group">
            <input type="submit" class="btn btn-primary" name="update" value="Update Category">
        </div>
    </form>
<?php                      }
?>

<?php
if (isset($_POST['update'])) {
    $cat_edit_title = $_POST['cat_title'];

    $query = "UPDATE category SET cat_title='{$cat_edit_title}' WHERE cat_id='{$edit_id}'";
    $update_cat = mysqli_query($connection, $query);

    if (!$update_cat) {
        die("QUERY FAILED" . mysqli_errno($connection));
    }

    header("location:categories.php");
}



?>