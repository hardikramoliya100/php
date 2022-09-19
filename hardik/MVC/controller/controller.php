<?php
include_once("model/model.php");

class Controller extends Model{
    public $base_url="";
    function __construct()
    {
        parent :: __construct();
        // echo "<pre>";
        // print_r($_SERVER);
        $AeeofReq =explode("/",$_SERVER['REQUEST_URI']);
        // print_r($AeeofReq);
        // echo "<br>http://localhost/php/hardik/MVC/<br>";
        $this->base_url = $_SERVER['REQUEST_SCHEME']."://".$_SERVER['SERVER_NAME']."/".$AeeofReq[1]."/".$AeeofReq[2]."/".$AeeofReq[3];
        $this->base_url_asset = $this->base_url."/assets";
        // exit;

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
                    
                    break;
                case '/registretion':
                    include_once("views/headersubpage.php");
                    include_once("views/registretion.php");
                    include_once("views/footer.php");
                    echo "<pre>";
                    print_r($_REQUEST);
                    if (isset($_POST['registration'])) {
                        $FetchAllUserData = $this->insert('user',array("username"=>$_POST['username'],"password"=>$_POST['password'],"email"=>$_POST['email'],"mobile"=>$_POST['mobile'],"gender"=>$_POST['gender'],));
                    }
                    
                    break;
                    case '/showallusre':

                        echo "showalluser";
                        echo "<pre>";
                        $FetchAllUserData = $this->select("user");
                        print_r($FetchAllUserData);
                        break;
                    
                default:
                    
                    break;
            }
        }else{
            header("location:home");
        }
    }

}

$Controller = new Controller;
?>