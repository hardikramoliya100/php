<table class="table table-bordered table-hover ">
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
            <th>Edit</th>
            <th>Delete</th>
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


        ?>

        <?php

        $query = "SELECT * FROM posts";
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

            echo "<tr>";
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
            echo "<td>$post_comment_count</td>";
            echo "<td>$post_date</td>";
            echo "<td><a href='posts.php?sourse=edit_post&p_id=$post_id'>EDIT</a></td>";
            echo "<td><a href='posts.php?delete=$post_id'>DELETE</a></td>";
            echo "</tr>";
        }

        ?>

    </tbody>
</table>

<a href=""></a>