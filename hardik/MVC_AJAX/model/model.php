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

    public function insert($data){
                        $fristname = $data['firstname'];
                        $lastname = $data['lastname'];
                        $email = $data['email'];
                        $mobile = $data['mobile'];
                        $query = "INSERT INTO user VALUES('','$fristname','$lastname','$email','$mobile')";
                        mysqli_query($this->conn, $query);   
    }

}

?>