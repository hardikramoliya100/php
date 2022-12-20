<?php
class ProductModel
{
    public $conn = "";
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "my_e_commerce");
    }
  
    
}
