<?php

require 'config.php';

if (isset($_POST['action'])) {
    if ($_POST['action'] == "insert") {
        insert();
    } else if ($_POST['action'] == "edit") {
        edit();
    } else {
        delete();
    }
}
function insert()
{
    global $conn;
    $neme = $_POST["neme"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $query = "INSERT INTO usres VALUES('','$neme','$email','$gender')";
    mysqli_query($conn, $query);
    echo "insert succesfull";
}

function edit()
{
    global $conn;
    $id = $_POST["id"];
    $neme = $_POST["neme"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];
    $query = "UPDATE usres SET neme='$neme', email='$email', gender='$gender' WHERE id='$id'";
    mysqli_query($conn, $query);
    echo "Update successfully";
}
function delete()
{
    global $conn;
    $id = $_POST["action"];
    $query = "DELETE FROM usres WHERE id='$id'";
    mysqli_query($conn, $query);
    echo "Delete successfully";
}
