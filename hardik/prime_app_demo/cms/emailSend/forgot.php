<?php include "../admin/includes/function.php"; ?>
<?php include "../include/db.php"; ?>
<?php include "../include/header.php"; ?>

<?php include "../include/navigation.php"; ?>

<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
ob_start();
require 'vendor/autoload.php';
$mail = new PHPMailer(true);



if (isset($_POST['email'])) {

    $email = $_POST['email'];

    $length = 50;

    $token = bin2hex(openssl_random_pseudo_bytes($length));

    if (email_exists($email)) {

        mysqli_query($connection, "UPDATE user SET token='$token' WHERE user_email='$email'");

        $mail->isSMTP();                            // Set mailer to use SMTP
        $mail->Host = 'smtp.mailtrap.io';              // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                     // Enable SMTP authentication
        $mail->Username   = '9e28d2e0ffae44';                     //SMTP username
        $mail->Password   = '4aec77b0ee4235';  // your password 2step varified 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 2525;     //587 is used for Outgoing Mail (SMTP) Server.
        $mail->setFrom('hardikramoliya100@gmail.com', 'Hardik');
        $mail->addAddress($_POST['email']);   // Add a recipient
        $mail->isHTML(true);  // Set email format to HTML
        $mail->CharSet = 'UTF-8';  // Set email format to HTML


        $mail->Subject = 'This is for reset your password';
        $mail->Body    = '<p>Please click to reset your password
        
        <a href="http://localhost/php/hardik/prime_app_demo/cms/emailSend/reset.php?email=' . $email . '&token=' . $token . '">here</a>
        
        
        
        
        </p>';



        if (!$mail->send()) {
            echo 'Message was not sent.';
            echo 'Mailer error: ' . $mail->ErrorInfo;
        } else {
            // echo 'Message has been sent.';
        }
    }
}


?>


<!-- Page Content -->
<div class="container">

    <div class="form-gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="text-center">

                            <?php if (!isset($_POST['email'])) :  ?>
                                <h3><i class="fa fa-lock fa-4x"></i></h3>
                                <h2 class="text-center">Forgot Password?</h2>
                                <p>You can reset your password here.</p>
                                <div class="panel-body">




                                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                                <input id="email" name="email" placeholder="email address" class="form-control" type="email">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                        </div>

                                        <input type="hidden" class="hide" name="token" id="token" value="">
                                    </form>

                                </div><!-- Body-->
                            <?php else :  ?>

                                <h1>Please Chack Your Mail</h1>
                            <?php endif;  ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "../include/footer.php"; ?>

</div> <!-- /.container -->