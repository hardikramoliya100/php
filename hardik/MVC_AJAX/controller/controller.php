<?php
include_once("model/model.php");

class Controller extends Model{
    public function __construct()
    {
        parent :: __construct();

        // echo "<pre>";
        // print_r($_SERVER);
        if(isset($_SERVER['PATH_INFO'])){
            switch ($_SERVER['PATH_INFO']) {
                case '/home':
                    // $data = $this->user();
                    // print_r($data);

                    include_once("view/header.php");
                    include_once("view/showuser.php");
                    include_once("view/footer.php");
                    break;

                    case '/adduser':
                           
                        include_once("view/header.php");
                        include_once("view/addnewuser.php");
                        include_once("view/footer.php");
                        break;
                    case '/showalluserdata':
                    $data = $this->user();
                    // print_r($data);
                    echo json_encode($data);
                    case '/newuserdata':
                        $this->insert($_POST);
                        

                        
                    

                    
                    
                    break;
                
                default:
                    # code...
                    break;
            }
        }
    }


}

$obj = new Controller();
?>