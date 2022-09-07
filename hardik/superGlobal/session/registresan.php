<?php 

include('header.php');

if (isset($_POST['username'])) {

    if ($_POST['username'] !== '' && $_POST['password'] !== '' &&  $_POST['emailid'] !== '' &&  $_POST['number'] !== '') {
        
        setcookie("uname",$_POST['username'],time()+3600);
        setcookie("pass",$_POST['Password'],time()+3600);
        setcookie("email",$_POST['emailid'],time()+3600);
        setcookie("num",$_POST['number'],time()+3600);
        
        header("location:loging.php");

    } 
}

?>

<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4 text-center">
            <div class="card border-primary mb-3" ">
            <div class=" card-header">

                <h4>Registresan Page</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mt-2">
                        <input type="text" placeholder="Enter User Name" name="username" class="form-control" id="username">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Enter Email Id" name="emailid" class="form-control" id="emailid">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Enter Phone Number " name="number" class="form-control" id="number">
                    </div>
                    <div class="mt-2">
                        <input type="password" placeholder="Enter Password" name="Password" class="form-control" id="Password">
                    </div>
                    <div class="mt-2">
                        <input type="submit" name="btn-loging" class="btn btn-primary" value="Regist">
                        
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>