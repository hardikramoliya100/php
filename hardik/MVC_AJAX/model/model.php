<?php

class Model
{
    public $conn = "";
    public function __construct(){
        $this->conn = new mysqli("localhost","root","","test");
    }

    public function user(){
        $query = "SELECT * FROM user";
        $data = mysqli_query($this->conn,$query);
        if ($data->num_rows>0) {
            while ($fdata = $data->fetch_object()) {
                $fechdata[]=$fdata;
            }
        }
        return $fechdata;
    }

}

?>