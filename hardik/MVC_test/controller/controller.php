<?php
session_start();

include_once("model/model.php");

// echo "hello";

class Controller extends Model
{
    public function __construct()
    {
        parent::__construct();
        // echo "<pre>";
        // print_r($_SERVER);

        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {

                case '/home':
                    // $query ="SELECT * FROM user";
                    // $row = mysqli_fetch_assoc(mysqli_query($this->conn,$query)) ;
                    $data =$this->show();
                    include_once("view/view.php");
                    // print_r($data['lastname']);
                    
                    break;
                    case '/addnewuser':
                        
                        include_once("view/adduser.php");
                        $this->insert($_POST);
                    break;
                    case '/edit':
                        
                        $id =$_GET['id'];
                        $data =$this->updet($id);
                        // print_r($data);
                        
                        include_once("view/edituser.php");
                        $a =$this->edit($_POST);
                        if (isset($a)) {
                            if ($a==1) {
                                
                                header("location:home");
                            }
                        }
                        
                    break;
                    case '/delete':
                        // print_r();
                        $id =$_GET['id'];
                        $this->delete($id);
                        header("location:home");
                    break;

                default:
                    # code...
                    break;
            }
        }
    }
}

$obj = new Controller;
