<?php
session_start();
include_once("model/model.php");

class Controller extends Model
{
    public $base_url = "";
    function __construct()
    {
        ob_start();
        parent::__construct();
        $AeeofReq = explode("/", $_SERVER['REQUEST_URI']);
        $this->base_url = $_SERVER['REQUEST_SCHEME'] . "://" . $_SERVER['SERVER_NAME'] . "/" . $AeeofReq[1] . "/" . $AeeofReq[2] . "/" . $AeeofReq[3];
        $this->base_url_asset = $this->base_url . "/assets";


        if (isset($_SERVER['PATH_INFO'])) {
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    include_once("views/header.php");
                    include_once("views/maincontent.php");
                    include_once("views/footer.php");
                    break;

                case '/loging':


                    include_once("views/headersubpage.php");
                    include_once("views/loging.php");
                    include_once("views/footer.php");
                    if (isset($_POST['login'])) {
                        if ($_POST['username'] != "" &&  $_POST['password'] != "") {
                            $LoginData = $this->login($_POST['username'], $_POST['password']);
                            // echo "<pre>";
                            // print_r($LoginData);
                            if ($LoginData['code'] == 1) {
                                $_SESSION['userdata'] = $LoginData['data'][0];
                                if ($LoginData['data'][0]->Roleid == 1) {
                                    header("location:admindashboard");
                                } else {
                                    header("location:home");
                                }
                            } else {
                                echo "<script>alert('Invalid User !!!!') </script>";
                            }
                        } else {
                            echo "<script>alert('User name and password is Required !!!!') </script>";
                        }
                    }


                    break;
                case '/registretion':
                    include_once("views/headersubpage.php");
                    include_once("views/registretion.php");
                    include_once("views/footer.php");
                    // echo "<pre>";
                    // print_r($_REQUEST);
                    if (isset($_POST['registration'])) {
                        $hobb = implode(',', $_POST['hobbies']);
                        // $InsertArr = array("username"=>$_POST['username'],
                        // "fullname"=>$_POST['fullname'],
                        // "password"=>$_POST['password'],
                        // "email"=>$_POST['email'],
                        // "hobby"=>$hobb,
                        // "mobile"=>$_POST['mobile'],
                        // "gender"=>$_POST['gender'],);
                        // echo "<pre>";
                        array_pop($_POST);
                        unset($_POST['hobbies']);

                        if (isset($_FILES['profile_pic'])) {
                            if ($_FILES['profile_pic']['error'] == 0) {
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
                                $name = $_REQUEST['old_profile_pic'];
                            }
                        } else {

                            $name = "default.jpg";
                        }

                        $InsertArr = array_merge($_POST, array("hobby" => $hobb, "profile_pic" => $name));
                        $RegistUserData = $this->insert(
                            'user',
                            $InsertArr
                        );
                        if ($RegistUserData['code'] == 1) {
                            header("location:loging");
                        } else {
                            echo "Error While inserting";
                        }
                    }

                    break;
                case '/admindashboard':


                    include_once("views/admin/header.php");
                    include_once("views/admin/dashboard.php");
                    include_once("views/admin/footer.php");


                    break;
                case '/logout':
                    include_once("views/logout.php");

                    break;

                case '/allusers':

                    $FetchAllUserData = $this->select('user', array("Roleid" => 2, "status" => 1));


                    include_once("views/admin/header.php");
                    include_once("views/admin/allusersview.php");
                    include_once("views/admin/footer.php");

                    break;

                case '/addnewuser':
                    $AllCountryData = $this->select('tbl_countries');
                    $AllStatesData = $this->select('tbl_states');
                    $AllCitiesData = $this->select('tbl_cities');
                    include_once("views/admin/header.php");
                    include_once("views/admin/addnewuser.php");
                    include_once("views/admin/footer.php");



                    if (isset($_POST['registration'])) {
                        $hobb = implode(',', $_POST['hobbies']);
                        echo "<pre>";
                        array_pop($_POST);
                        unset($_POST['hobbies']);
                        if (isset($_FILES['profile_pic'])) {
                            if ($_FILES['profile_pic']['error'] == 0) {
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
                                $name = $_REQUEST['old_profile_pic'];
                            }
                        } else {

                            $name = "default.jpg";
                        }
                        $InsertArr = array_merge($_POST, array("hobby" => $hobb, "profile_pic" => $name));

                        $RegistUserData = $this->insert(
                            'user',
                            $InsertArr
                        );

                        header("location:allusers");
                    }


                    break;
                case '/edituser':
                    // $EditUserData = $this->select('user', array("id" => $_GET['userid'], "status" => 1));
                    $EditUserData = $this->select_join('user', 
                    array("tbl_cities" => "tbl_cities.id = user.city", 
                    "tbl_states" => "tbl_states.id = tbl_cities.state_id", 
                    "tbl_countries" => "tbl_countries.id = tbl_states.country_id"),
                    array("user.id" => $_GET['userid'], "status" => 1));
                    $AllCountryData = $this->select('tbl_countries');
                    $AllStatesData = $this->select('tbl_states');
                    $AllCitiesData = $this->select('tbl_cities');
                    
                    // exit;
                    // echo "<pre>";
                    // print_r($EditUserData);
                    // echo "</pre>";
                    
                    include_once("views/admin/header.php");
                    include_once("views/admin/edituser.php");
                    include_once("views/admin/footer.php");

                    if (isset($_POST['edit'])) {
                        $hobb = implode(',', $_POST['hobbies']);
                        // echo "<pre>";
                        array_pop($_POST);
                        unset($_POST['hobbies']);
                        unset($_POST['old_profile_pic']);

                        // echo "<pre>";
                        // print_r($GLOBALS);
                        // echo "</pre>";

                        if (isset($_FILES['profile_pic'])) {
                            if ($_FILES['profile_pic']['error'] == 0) {
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
                                $name = $_REQUEST['old_profile_pic'];
                            }
                        } else {

                            $name = "default.jpg";
                        }

                        $updatArr = array_merge($_POST, array("hobby" => $hobb, "profile_pic" => $name));

                        $EditUserData = $this->update('user', array("id" => $_GET['userid'], "status" => 1), $updatArr);

                        header("location:allusers");
                    }

                    break;

                case '/deleteuser':
                    echo "<pre>";
                    print_r($_REQUEST);
                    print_r($_GET);
                    $EditUserData = $this->select('user', array("id" => $_GET['userid'], "status" => 1));
                    // echo "<pre>";
                    // print_r($EditUserData['data'][0]->profile_pic);
                    // echo "</pre>";
                    // $picname = $EditUserData['data'][0]->profile_pic;
                    // unlink("../uplode/$picname");
                    $FetchAllUserData = $this->delete('user', array("id" => $_GET['userid'], "status" => 1));
                    header(("location:allusers"));
                    break;
                case '/allcountry':
                    $AllCountryData = $this->select('tbl_countries');
                    // print_r($AllCountryData);                    
                    echo json_encode($AllCountryData);

                    break;
                case '/allstate':
                    $AllStatesData = $this->select('tbl_states');
                    echo json_encode($AllStatesData);

                    break;
                case '/allcity':
                    $AllCitiesData = $this->select('tbl_cities');
                    echo json_encode($AllCitiesData);

                    break;
                case '/getstateid':
                    $AllStatesDatabycountryid = $this->select('tbl_states',array("country_id" => $_REQUEST['contryid']));
                    echo json_encode($AllStatesDatabycountryid);

                    break;    
                case '/getcityid':
                    $AllCitiesDatabystateid = $this->select('tbl_cities',array("state_id"=>$_REQUEST['stateid']));
                    echo json_encode($AllCitiesDatabystateid);

                    break; 



                default:

                    break;
            }
        } else {
            header("location:home");
        }
        ob_flush();
    }
}

$Controller = new Controller;