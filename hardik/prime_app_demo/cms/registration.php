<?php include "include/db.php"; ?>
<?php include "include/header.php"; ?>
<?php include "admin/includes/function.php"; ?>
<?php

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];


    $error=[
        'username'=>'',
        'password'=>'',
        'email'=>''
    ];

    if(strlen($username) < 4){
        $error['username']='Username is to longer';
    }

    if($username == ''){
        $error['username']='Username cannot be empty';
    }
    
    if(username_exist($username)){
        $error['username']='Username Already Exist';
    }

    if(email_exist($email)){
        $error['email']='Email Already Exist, <a href="index.php">Please Login</a>';
    }
    
    if($email == ''){
        $error['email']='Email cannot be empty';
    }
    
    if($password == ''){
        $error['password']='Password cannot be empty';
    }


    foreach ($error as $key => $value) {
        
        if (empty($value)) {
            
            unset($error[$key]);
        }
    }

    
    if(empty($error)){
        
        
        register_user($username,$email,$password);
    }












    
    
    
    // if(!empty($username) && !empty($password) && !empty($email)){
        
    //     if (username_exist($username)) {
    //         echo "<script>alert('Username Already Exist!!!!')</script>";
            
    //     }else{

    //         $username = mysqli_real_escape_string($connection, $username);
    //         $password = mysqli_real_escape_string($connection, $password);
    //         $email = mysqli_real_escape_string($connection, $email);
    
    //         $password = password_hash($password , PASSWORD_BCRYPT ,array('cost'=>12));
    
    //         $query= "INSERT INTO `user` (`username`,`user_email`,`password`,`user_role`) VALUE ('$username','$email','$password','subscriber')";
        
    //         $insert_user = mysqli_query($connection,$query);
    //     }


    // }else{
    //     echo "<script>alert('Filed not be empty!!!!')</script>";
    // }

}

?>

<!-- Navigation -->

<?php include "include/navigation.php"; ?>


<!-- Page Content -->
<div class="container">

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <div class="form-wrap">
                        <h1>Register</h1>
                        <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                            </div>
                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="password" class="sr-only">Password</label>
                                <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                            </div>

                            <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                        </form>

                    </div>
                </div> <!-- /.col-xs-12 -->
            </div> <!-- /.row -->
        </div> <!-- /.container -->
    </section>


    <hr>



    <?php include "include/footer.php"; ?>