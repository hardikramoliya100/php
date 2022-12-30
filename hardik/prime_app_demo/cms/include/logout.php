<?php include "db.php"; ?>
<?php session_start(); ?>
<?php

session_destroy();

header("location:../index.php");




?>
