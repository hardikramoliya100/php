<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta neme="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>ADD USER</h2>
    <form action="" method="POST" autocomplete="off">
        <label for="">neme</label>
        <input type="text" id="neme"><br>
        <label for="">Email</label>
        <input type="text" id="email"><br>
        <label for="">Gender</label>
        <select neme="" id="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br>
        <button type="button" onclick="submitdata('insert')">Insert</button>
    </form>
    <br>
    <a href="index.php">GO TO Index</a>
    <?php require 'script.php';?>
    
</body>
</html>