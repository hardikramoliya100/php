<?php

function escape($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, trim(($string)));
}

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

/*
    for select how many row in table
*/

function datacount($table)
{
    global $connection;

    $query = "SELECT * FROM " . $table;

    $data = mysqli_num_rows(mysqli_query($connection, $query));

    return $data;
}


function tabledata($table, $colem, $value)
{
    global $connection;

    $query = "SELECT * FROM $table WHERE $colem = '$value'";

    $data = mysqli_num_rows(mysqli_query($connection, $query));

    return $data;
}


function username_exist($username)
{
    global $connection;

    $query = "SELECT username FROM user WHERE username = '$username'";

    $data = mysqli_num_rows(mysqli_query($connection, $query));

    if ($data > 0) {
        return true;
    }else{
        
        return false;
    }

}

function email_exist($email)
{
    global $connection;

    $query = "SELECT user_email FROM user WHERE user_email = '$email'";

    $data = mysqli_num_rows(mysqli_query($connection, $query));

    if ($data > 0) {
        return true;
    }else{
        
        return false;
    }

}

// REGISTRASAN USER

function register_user($username,$password,$email)
{
    global $connection;


            $username = mysqli_real_escape_string($connection, $username);
            $password = mysqli_real_escape_string($connection, $password);
            $email = mysqli_real_escape_string($connection, $email);
    
            $password = password_hash($password , PASSWORD_BCRYPT ,array('cost'=>12));
    
            $query= "INSERT INTO `user` (`username`,`user_email`,`password`,`user_role`) VALUE ('$username','$email','$password','subscriber')";
        
            $insert_user = mysqli_query($connection,$query);
       

}

function email_exists($email){

    global $connection;


    $query = "SELECT user_email FROM user WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);


    if(mysqli_num_rows($result) > 0) {

        return true;

    } else {

        return false;

    }



}

// for login user

function login_user($username,$password)
{
    global $connection;

    $l_username=$_POST['username'];
    $l_password=$_POST['password'];

    $l_username = mysqli_real_escape_string($connection,$l_username); 
    $l_password = mysqli_real_escape_string($connection,$l_password); 

    
    $query = "SELECT * FROM user WHERE username='$l_username'";
    $login_user= mysqli_fetch_assoc(mysqli_query($connection,$query));
    
    $user_id = $login_user['user_id'];
    $username = $login_user['username'];
    $password = $login_user['password'];
    $user_firstname = $login_user['user_firstname'];
    $user_lastname = $login_user['user_lastname'];
    $user_role = $login_user['user_role'];
    $user_email = $login_user['user_email'];
    
    // $l_password= crypt($l_password,$password);

    if(password_verify($l_password,$password)){
        $_SESSION['user_id']=$user_id;
        $_SESSION['username']=$username;
        $_SESSION['user_firstname']=$user_firstname;
        $_SESSION['user_lastname']=$user_lastname;
        $_SESSION['user_role']=$user_role;
        if ($user_role == 'admin') {




            header("location:../admin");
        } else {
            header("location:../index.php");
        }
    }else{
        
       echo '<script>alert("anvalid Username and Password")</script>';
        header("location:../index.php");


        
    }

}

function login_users($username,$password)
{
    global $connection;

    $l_username=$_POST['username'];
    $l_password=$_POST['password'];

    $l_username = mysqli_real_escape_string($connection,$l_username); 
    $l_password = mysqli_real_escape_string($connection,$l_password); 

    
    $query = "SELECT * FROM user WHERE username='$l_username'";
    $login_user= mysqli_fetch_assoc(mysqli_query($connection,$query));
    
    $user_id = $login_user['user_id'];
    $username = $login_user['username'];
    $password = $login_user['password'];
    $user_firstname = $login_user['user_firstname'];
    $user_lastname = $login_user['user_lastname'];
    $user_role = $login_user['user_role'];
    $user_email = $login_user['user_email'];
    
    // $l_password= crypt($l_password,$password);

    if(password_verify($l_password,$password)){
        $_SESSION['user_id']=$user_id;
        $_SESSION['username']=$username;
        $_SESSION['user_firstname']=$user_firstname;
        $_SESSION['user_lastname']=$user_lastname;
        $_SESSION['user_role']=$user_role;
        if ($user_role == 'admin') {




            header("location:admin");
        } else {
            header("location:index.php");
        }
    }else{
        
       echo '<script>alert("anvalid Username and Password")</script>';
        header("location:index.php");


        
    }

}




function online_user()
{

    if (isset($_GET['onlineuser'])) {

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
    }
}

online_user();
