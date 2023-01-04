<?php

use function PHPSTORM_META\map;

include "../include/db.php"; ?>
<?php include "../include/header.php"; ?>

<?php

$token = $_GET['token'];
$email = $_GET['email'];

$query = "SELECT username,user_email FROM user WHERE token='$token'";

$userdata = mysqli_fetch_assoc(mysqli_query($connection, $query));




// echo $userdata['user_email'];

if (isset($_POST['password']) && isset($_POST['c_password'])) {
    if ($_POST['password'] == $_POST['c_password']) {

        $password = $_POST['password'];

        $hashpassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 10));

        mysqli_query($connection, "UPDATE user SET password ='$hashpassword',token='' WHERE user_email='$email'");

        header("location:../login.php");
    } else {
        echo "<h1>PLEASE ENTER SAME PASSWORD</h1>";
    }
} else {
    // echo "<h1>PLEASE ENTER FILED</h1>";
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

                            <h3><i class="fa fa-lock fa-4x"></i></h3>
                            <h2 class="text-center">Forgot Password?</h2>
                            <p>You can reset your password here.</p>
                            <div class="panel-body">

                                <form id="register-form" role="form" autocomplete="off" class="form" method="post">

                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="password" name="password" placeholder="Enter Password" class="form-control" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                            <input id="c_password" name="c_password" placeholder="Confirm Password" class="form-control" type="password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                                    </div>

                                    <div id="message">
                                        <h3>Password must contain the following:</h3>
                                        <p id="letter" class="invalid">A &nbsp<b>lowercase</b> letter</p>
                                        <p id="capital" class="invalid">A &nbsp<b>capital (uppercase)</b> letter</p>
                                        <p id="number" class="invalid">A &nbsp<b>number</b></p>
                                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                                    </div>


                                </form>

                            </div><!-- Body-->

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <hr>

    <?php include "../include/footer.php"; ?>

</div> <!-- /.container -->

<!-- <script>
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
// myInput.onblur = function() {
//   document.getElementById("message").style.display = "none";
// }

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
}

  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script> -->