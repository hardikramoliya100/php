<?php
error_reporting(0);
class Model{
    public $dbconnection = "";
    public function __construct() 
    {
        // $this->dbconnection = new mysqli("hostname","username","password","databasname");
        // $this->dbconnection = new mysqli_connect("localhost","root","","masterdatabase");
        try {
            
            $this->dbconnection = new mysqli("localhost1","root","","masterdatabase");
            echo "Inside Try";
        } catch (\Throwable $th) {
            echo "Inside catch";
            
        }
        echo "<pre>";
        print_r($this->dbconnection);
    }
    public function select($tbl){
       echo $SQL ="SELECT * FORM $tbl";
    }
    public function upddte(){
        $SQL ="";
    }
    public function insert(){
        $SQL ="";
    }
    public function delete(){
        $SQL ="";
    }

}



$Model = new Model;
echo "<br>";
$Model->select("hardik");
?>