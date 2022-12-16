<?php
class Model
{
    public $conn = "";
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "test");
    }
    public function show()
    {
        $query = "SELECT * FROM user";
        $row = mysqli_query($this->conn, $query);
        return $row;
    }
    public function insert($add)
    {
        if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['mobile'])){

            $firstname=$add['firstname'];
            $lastname=$add['lastname'];
            $email=$add['email'];
            $mobile=$add['mobile'];
            $query = "INSERT INTO user VALUES ('','$firstname','$lastname','$email','$mobile')";
            mysqli_query($this->conn, $query);
        }

    }
    public function delete($get){
        // $id=$get['id'];
        $query = "DELETE FROM user WHERE id='$get'";
        mysqli_query($this->conn, $query);
    }

    public function updet($get)
    {
        $query = "SELECT * FROM user WHERE id='$get'";
        $row = mysqli_fetch_assoc(mysqli_query($this->conn, $query)) ;
        return $row;
    }

    public function edit($add)
    {
        if(isset($_POST['edit'])){
            $id = $add['id'];
            $firstname=$add['firstname'];
            $lastname=$add['lastname'];
            $email=$add['email'];
            $mobile=$add['mobile'];
            $query = "UPDATE user SET firstname='$firstname',lastname='$lastname',email='$email',mobile='$mobile' WHERE id='$id'";
            $data = mysqli_query($this->conn, $query);

            if ($data>0) {
                $a=1;
            }else{
                $a=0;
            }
            return $a;
        }

    }
}
