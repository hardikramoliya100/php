<?php

$A=0;
$_SESSION['hardik']=$A;
session_start();
session_destroy();
header("location:loging.php")

?>