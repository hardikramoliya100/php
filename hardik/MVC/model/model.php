<?php
// error_reporting(0);
date_default_timezone_set("Asia/Kolkata");
class Model{
    public $dbconnection = "";
    public function __construct() 
    {
        // $this->dbconnection = new mysqli("hostname","username","password","databasname");
        // $this->dbconnection = new mysqli_connect("localhost","root","","masterdatabase");
        try {
            
            $this->dbconnection = new mysqli("localhost","root","","masterdatabase");
            // echo "Inside Try";
        } catch (\Exception $e) {
            // echo "Inside catch";
            if (!file_exists("logs")) {
                mkdir("logs"); 
            }
            $msg=PHP_EOL."Error Messege=>>".$e->getMessage().PHP_EOL;
            $msg.="Error Date Time=>>".date("d-m-y h:i:s A").PHP_EOL;
            $filename='logs/'.date('d_m_y').'log.txt';
            file_put_contents($filename,$msg,FILE_APPEND);
            
        }
        // echo "<pre>";
        // print_r($this->dbconnection);
    }
    public function select($tbl,$where="")
    {
        // SELECT Query START
        $SQL ="SELECT * FROM $tbl";
        if($where != ""){

            $SQL .=" WHERE ";
            foreach ($where as $key => $value) {
                $SQL .= "$key = $value AND ";
            }
            $SQL = rtrim($SQL," AND ");
        }
        
        // SELECT Query END
        // Execute SELECT Query on datadase START
        $SQLEx =$this->dbconnection->query($SQL); 
        // Execute SELECT Query on datadase END
        
        // echo "<pre>";
        // print_r($SQLEx);
        // Conditiond for getting data form DB START
        if($SQLEx->num_rows > 0){
            
            // $data = $SQLEx->fetch_array();
            // echo "<pre>";
            // print_r($data); 
            //    $data = $SQLEx->fetch_object();
        // print_r($data->username);

        // Fetch multiple data with object formate START
        while($fdata = $SQLEx->fetch_object()){
        $Fetchdata[] = $fdata; //store data in array 
        }
        // Fetch multiple data with object formate  END
        // echo "<pre>";
        // print_r($Fatchdata);
        $data["msg"]="Succes";
        $data["data"]=$Fetchdata;
        $data["code"]=1;
    }else{
        $data["msg"]="Try again";
        $data["data"]=0;
        $data["code"]=0;
    }
    return $data;
       // Conditiond for getting data form DB END
    }
    public function login($uname,$upass){
        $SQL = 'SELECT * FROM `user` WHERE (`username`="'.$uname.'" OR `email` ="'.$uname.'" OR `mobile` ="'.$uname.'") AND password ="'.$upass.'"';
        $SQLEx =$this->dbconnection->query($SQL); 
        // echo "<pre>";
        // print_r($SQLEx);
        
        if($SQLEx->num_rows > 0){

        while($fdata = $SQLEx->fetch_object()){
        $Fetchdata[] = $fdata; //store data in array 
        }

        $data["msg"]="Succes";
        $data["data"]=$Fetchdata;
        $data["code"]=1;
    }else{
        $data["msg"]="Try again";
        $data["data"]=0;
        $data["code"]=0;
    }
    return $data;
     
    }
    public function update($tbl,$whr,$udata){
        

        $SQL = "UPDATE $tbl SET ";
        foreach ($udata as $key => $value) {
            $SQL .= " $key = '$value' ,";
        }
        $SQL = rtrim($SQL," ,");
        $SQL .= " WHERE";
        foreach ($whr as $key => $value) {
            $SQL .= " $key = $value AND ";
        }
        $SQL = rtrim($SQL," AND ");
        echo "<br>";
        echo $SQL;

    }
    public function insert($tbl,$data){
       
        // echo "<pro>";
        // print_r($data);
        // print_r(array_keys($data));
        $clam = implode(",",array_keys($data));
        $vals = implode("','",$data);
        
        // echo "INSERT INTO user(username,password,email,mobile,gender)VALUES('ab','bn','ab','bn','ab')";
        // echo "<br>";
        $SQL = "INSERT INTO $tbl($clam) VALUES('$vals')";
        
      
        $SQLEx =$this->dbconnection->query($SQL); 
        if ($SQLEx > 0) {
        $data["msg"]="Succes";
        $data["data"]=1;
        $data["code"]=1;
    }else{
        $data["msg"]="Try again";
        $data["data"]=0;
        $data["code"]=0;
        }
        return $data;
    }
    public function delete($tbl,$whr){
        $SQL = "DELETE  FROM $tbl";
        $SQL .=" WHERE";
        foreach ($whr as $key => $value) {
            $SQL .= " $key = $value AND ";
        }
        $SQL = rtrim($SQL," AND ");
        // echo $SQL;
        $SQLEx =$this->dbconnection->query($SQL); 
        
        if($SQLEx> 0){

        

        $data["msg"]="Succes";
        $data["data"]=1;
        $data["code"]=1;
    }else{
        $data["msg"]="Try again";
        $data["data"]=0;
        $data["code"]=0;
    }
    return $data;
    }

}



// $Model = new Model;
// echo "<br>";
// $Model->select("user");
?>