<?php include "db.php"; ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $username = mysqli_real_escape_string($connection,$username); 
    $password = mysqli_real_escape_string($connection,$password); 

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $login_user= mysqli_fetch_assoc(mysqli_query($connection,$query));

    

    if(!$login_user){
        echo '<script>alert("anvalid Username and Password")</script>';
        header("location:../index.php");
    }else{

        $user_id = $login_user['user_id'];
        $username = $login_user['username'];
        $password = $login_user['password'];
        $user_firstname = $login_user['user_firstname'];
        $user_lastname = $login_user['user_lastname'];
        $user_role = $login_user['user_role'];
        $user_email = $login_user['user_email'];

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
        
    }

   

}





?>
