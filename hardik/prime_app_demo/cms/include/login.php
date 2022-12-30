<?php include "db.php"; ?>
<?php session_start(); ?>
<?php

if(isset($_POST['login'])){
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
    
    $l_password= crypt($l_password,$password);

    if($l_username !== $username && $l_password !== $password
     ){
        echo '<script>alert("anvalid Username and Password")</script>';
        header("location:../index.php");
    }else{



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
