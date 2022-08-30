<?php
require_once('header.php');

if (isset($_POST['username'])) {

    if ($_POST['UserName'] == "tops" && $_POST['password'] == '123') {

        $_SESSION['UserName'] = $_POST['username'];
        $_SESSION['UserData'] = array("uname" => $_POST['username'], "pass" => $_POST['password']);
        header("location:home.php");

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
                        <input type="text" placeholder="Enter User Name" name="usrename" class="form-control" id="username">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Enter Password" name="password" class="form-control" id="password">
                    </div>
                    <div class="mt-2">
                        <input type="submit" name="btn-loging" class="btn btn-primary" value="Loging">
                        <input type="reset" class="btn btn-danger" value="cancel">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>