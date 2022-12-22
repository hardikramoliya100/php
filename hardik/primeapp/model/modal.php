<?php
date_default_timezone_set("Asia/Kolkata");

class Model
{

    public $conn = "";
    public function __construct()
    {
        $this->conn = mysqli_connect("localhost", "root", "", "primeapp");
    }

    public function insert($data, $img)
    {


        $date = date("d-m-Y_h_i_sa");
        $username = $data['username'];
        $firstname = $data['firstname'];
        $lastname = $data['lastname'];
        $email = $data['email'];
        $password = $data['password'];
        $date = $data['date'];
        $query = "INSERT INTO user VALUES ('','$username','$firstname','$lastname','$email','$password','$date','$img','$date')";
        mysqli_query($this->conn, $query);
    }
    public function login($username, $password)
    {
        $query = 'SELECT * FROM `user` WHERE (`username`="' . $username . '" OR `email` ="' . $username . '") AND password ="' . $password . '"';

        $data =  mysqli_fetch_assoc(mysqli_query($this->conn, $query));

        return $data;
    }
    public function addlog($d)
    {

        $date = date("d-m-Y_h_i_sa");

        $query = "UPDATE user SET lastlog='$date' WHERE id='$d'";
        mysqli_query($this->conn, $query);
    }
}
