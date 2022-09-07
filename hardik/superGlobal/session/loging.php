<?php
require_once('header.php');

if (isset($_POST['username'])) {

    if (($_POST['username'] == $_COOKIE['uname'] || $_POST['username'] == $_COOKIE['email'] ||  $_POST['username'] == $_COOKIE['num']  )  && $_POST['password'] == $_COOKIE['pass']) {
  
      
    
     $A=1;
     $_SESSION['hardik']=$A;
        
        header("location:about.php");

    } else {
        echo "invalid user";
    }
}


?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4 text-center">
            <div class="card border-primary mb-3" ">
            <div class=" card-header">

                <h4>loging page</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mt-2">
                        <input type="text" placeholder="Enter User Name" name="username" class="form-control" id="username">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Enter Password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mt-2">
                        <input type="submit" name="btn-loging" class="btn btn-primary" value="Loging">
                        <input type="reset" class="btn btn-danger" value="cancel">
                    </div>

                    <div>
                        <a href="registresan.php">Don't Have Account</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>