<?php

if(isset($_POST['submit'])){

    $name = array('hardik','jignesh','pradyum');
    $username = $_POST['username'];
    $password = $_POST['password'];

    // echo $username;
    // echo "<br>";
    // echo $password;
    if (!in_array($username,$name)) {
        echo "sorry you are not allow";
    } else {
        echo "welcome";
    }
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="form.php" method="POST">
        <input type="text" name="username" placeholder="Enter Name"><br>
        <input type="password" name="password" placeholder="Enter Password"><br>
        <input type="submit" name="submit">
    </form>
</body>
</html>