<?php

class Controller{
    public $base_url="";
    function __construct()
    {
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
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }

}

$Controller = new Controller;
?>