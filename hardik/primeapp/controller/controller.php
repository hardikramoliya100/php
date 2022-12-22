<?php
session_start();
include_once("model/modal.php");

class Controller extends Model
{
    public function __construct()
    {
        parent::__construct();
        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {

                case '/Registration':
                    include_once("view/header.php");
                    include_once("view/Registration.php");
                    include_once("view/footer.php");
                    // print_r($_FILES['profile_pic']);
                    // exit;
                    if (isset($_POST['save'])) {
                        if ($_POST['username'] != $_POST['password']) {
                            $name = ($_POST["username"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                              echo "<script>alert('Invalid username format') </script>";
                              header("location:Registration");
                            }
                            $fname = ($_POST["firstname"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$fname)) {
                                echo "<script>alert('Invalid firstname format') </script>";
                                header("location:Registration");
                            }
                            $lname = ($_POST["lastname"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$lname)) {
                                echo "<script>alert('Invalid lastname format') </script>";
                                header("location:Registration");
                            }
                            
                            $email =($_POST["email"]);
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                                
                                echo "<script>alert('Invalid email format') </script>";
                                
                                header("location:Registration");
                            }
                            $password = $_POST["password"];
                            if (strpos($password,$name) !== false) {
                                echo 'Username found in the password';
                                echo "<script>alert('Username found in the password') </script>";
                            }


                            if (isset($_FILES['profile_pic'])) {

                                if ($_FILES['profile_pic']['size'] < 20284189) {

                                    $tmp_name = $_FILES['profile_pic']['tmp_name'];

                                    $img_name = $_FILES['profile_pic']['name'];
                                    $rand1 = rand(10000, 100000);
                                    $ext = pathinfo($_FILES['profile_pic']['name'], PATHINFO_EXTENSION);
                                    $name = $rand1 . date("d_m_y_h_i_s_A") . "." . $ext;
                                    move_uploaded_file($tmp_name, "uploads/$name");
                                } else {
                                    $name = "default.jpg";
                                }
                            } else {

                                $name = "default.jpg";
                            }

                            $data = $this->insert($_POST, $name);
                        } else {
                            echo "<script>alert('password should not contain username') </script>";
                        }
                    }
                    break;

                case '/login':
                    include_once("view/header.php");
                    include_once("view/login.php");
                    include_once("view/footer.php");
                    if (isset($_POST['login'])) {
                        if ($_POST['username'] != "" &&  $_POST['password'] != "") {

                            $LoginData = $this->login($_POST['username'], $_POST['password']);

                            $this->addlog($LoginData['id']);
                            

                            
                            if (isset($LoginData['id'])) {
                                $_SESSION['userdata'] = $LoginData;

                                header("location:dashboard");
                            } else {
                                echo "<script>alert('Invelid User !!!!') </script>";
                            }
                        } else {
                            echo "<script>alert('User name and password is Required !!!!') </script>";
                        }
                    }

                    break;
                case '/dashboard':
                    include_once("view/header.php");
                    include_once("view/Dashbord.php");
                    include_once("view/footer.php");


                    break;
                case '/logout':

                    session_destroy();

                    header("location:login");


                    break;

                default:

                    break;
            }
        }else{
            header("location:login");
        }
    }
}

$obj = new Controller;
