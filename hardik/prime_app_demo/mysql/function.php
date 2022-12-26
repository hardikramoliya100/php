
<?php include "db.php"; ?>
<?php

function showalldata()
{
    global $connection;

    $query = "SELECT * FROM user";

    $data = mysqli_query($connection, $query);



    while ($row = mysqli_fetch_assoc($data)) {
        $id = $row['id'];
        echo "<option value='$id'>$id</option>";
    }
}

function updatetable()
{
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE user SET username='$username',password='$password' WHERE id='$id'";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILE" . mysqli_error($connection));
    }
}
function deletedata()
{
    global $connection;
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "DELETE FROM user WHERE id='$id'";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("QUERY FAILE" . mysqli_error($connection));
    }
}

function showalluser()
{
    global $connection;
    $query = "SELECT * FROM user";
    
    $data = mysqli_query($connection, $query);
    while ($row = mysqli_fetch_assoc($data)) {
        print_r($row);
    }
}

function creat(){
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string($connection,$username);
    $password = mysqli_real_escape_string($connection,$password);

    $haseFormet = "$2y$10$";
    $solt = "iusedsomecrezystring22";

    $hashF_and_solt = $haseFormet.$solt;

    $password = crypt($password,$hashF_and_solt);

    if($username && $password){

    }else{
        echo "enter username and password";
    }

    

   $query = "INSERT INTO user VALUE ('','$username','$password')";

   mysqli_query($connection,$query);
}
