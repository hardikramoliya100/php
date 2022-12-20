<?php
// session_start();

include_once("model/ProductModel.php");

// echo "hello";

class ProductController extends ProductModel
{
    public function __construct()
    {
        parent::__construct();
     

        if (isset($_SERVER['PATH_INFO'])) {

            switch ($_SERVER['PATH_INFO']) {

                
                    


                default:
                    
                    break;
            }
        }
    }
}

$obj1 = new ProductController;
