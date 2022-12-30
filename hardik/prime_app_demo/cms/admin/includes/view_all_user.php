<table class="table table-bordered table-hover ">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>Firtsname</th>
            <th>Lastname</th>
            <th>Email</th>
            <th>Image</th>
            <th>Role</th>
          
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php


        if (isset($_GET['admin'])) {
            $user_role = $_GET['admin'];
            $query = "UPDATE user SET user_role='admin' WHERE user_id='{$user_role}'";
            $edit_role = mysqli_query($connection, $query);

            header("location:user.php");
        }
        if (isset($_GET['subscriber'])) {
            $user_role = $_GET['subscriber'];
            $query = "UPDATE user SET user_role='subscriber' WHERE user_id='{$user_role}'";
            $edit_role = mysqli_query($connection, $query);

            header("location:user.php");
        }

        if (isset($_GET['delete'])) {
            $user_delete = $_GET['delete'];

            $query = "DELETE FROM user WHERE user_id='{$user_delete}'";
            $delete_data = mysqli_query($connection, $query);


            header("location:user.php");
        }


        ?>

        <?php

        $query = "SELECT * FROM user";
        $user_data = mysqli_query($connection, $query);

        while ($row = mysqli_fetch_assoc($user_data)) {
            $user_id   = $row['user_id'];
            $username = $row['username'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


            echo "<tr>";
            echo "<td>$user_id </td>";
            echo "<td>$username</td>";

            echo "<td>$user_firstname</td>";
            echo "<td>$user_lastname</td>";
            echo "<td>$user_email</td>";
            echo "<td><img width='40px' src='images/$user_image' alt=''></td>";
            echo "<td>$user_role</td>";

            // echo "<td><a href='user.php?admin=$user_id'>Admin</a></td>";
            // echo "<td><a href='user.php?subscriber=$user_id'>Subscriber</a></td>";



            echo "<td><a class='btn btn-warning btn-sm' href='user.php?sourse=edit_user&u_id=$user_id'>EDIT</a></td>";
            echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-danger btn-sm' href='user.php?delete=$user_id'>DELETE</a></td>";
            echo "</tr>";
        }

        ?>

    </tbody  >
</table>