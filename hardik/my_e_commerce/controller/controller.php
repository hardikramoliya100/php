<?php
session_start();

include_once("model/model.php");

// echo "hello";

class Controller extends Model
{
    public function __construct()
    {
        parent::__construct();
     

        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {

                
                    case '/cetagory':
                        include_once("view/header.php");    
                        include_once("view/showallcetagory.php");   
                        include_once("view/footer.php");    
                    break;
                    case '/product':
                        include_once("view/header.php");    
                        include_once("view/product/showallproduct.php");   
                        include_once("view/footer.php");    
                    break;

                    case '/addcetagory':
                        include_once("view/header.php");    
                        include_once("view/addnewcetagory.php");                          
                        include_once("view/footer.php");    
                    break;
                    case '/editcetagory':
                        $id =$_GET['id'];
                        

                        include_once("view/header.php");    
                        include_once("view/edit.php");                          
                        include_once("view/footer.php");    
                    break;
                    case '/productedit':
                        $id =$_GET['id'];
                        

                        include_once("view/header.php");    
                        include_once("view/product/editproduct.php");                          
                        include_once("view/footer.php");    
                    break;

                    case '/addproduct':

                        include_once("view/header.php");    
                        include_once("view/product/addnewproduct.php");                          
                        include_once("view/footer.php");    
                    break;



                    case '/showallcetagory':
                        $data = $this->cetagory();   
                        echo json_encode($data);
                    break;
                    case '/fetchallproduct':
                        $data = $this->product();   
                        echo json_encode($data);
                    break;
                    case '/fetcheditdata':
                        $data = $this->editcetagory($_POST);   
                        echo json_encode($data);
                    break;
                    case '/newcetagorydata':
                        $data = $this->insert($_POST);   
                        echo json_encode($data);
                        
                    break;
                    case '/editdatacetagory':
                        $data = $this->update($_POST);
                        echo json_encode($data);
                    break;

                    case '/deletecourse':
                        $data = $this->delete($_POST['id']);   
                        return $data;
                        
                    break;
                    
                    case '/deleteprouduct':
                        $data = $this->deletepro($_POST['id']);   
                        echo json_encode($data);
                        
                    break;
                    case '/newproductdata':
                        $data = $this->insertproduct($_POST);
                        
                    break;
                    case '/fetcheditproductdata':
                        $data = $this->editproductdata($_POST);   
                        echo json_encode($data);
                        
                    break;
                    
                    case '/editdataproduct':
                        $data = $this->updsateproduct($_POST);
                        
                    break;
                    


                default:
                    
                    break;
            }
        }
    }
}

$obj = new Controller;
