<?php session_start(); ?>
<?php include "db.php"; ?>
<?php include "../admin/includes/function.php"; ?>
<?php

if(isset($_POST['login'])){

    
    // $l_username=$_POST['username'];
    // $l_password=$_POST['password'];

    login_user($_POST['username'],$_POST['password']);

   

}





?>
