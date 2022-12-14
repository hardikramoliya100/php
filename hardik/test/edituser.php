<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta neme="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
    <h2>EDIT USER</h2>
    <form action="" method="POST" autocomplete="off">
    <?php require 'config.php'; 
    $id = $_GET['id'];
    $rows = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM usres WHERE id = $id"));
    ?>
    <input type="hidden" id="id" value="<?php echo $rows['id'];?>">
        <label for="">neme</label>
        <input type="text" id="neme" value="<?php echo $rows['neme'];?>"><br>
        <label for="">Email</label>
        <input type="text" id="email" value="<?php echo $rows['email'];?>"><br>
        <label for="">Gender</label>
        <select neme="" id="gender">
            <option value="Male" <?php if($rows["gender"] == "Male") echo "selected"; ?>>Male</option>
            <option value="Female" <?php if($rows["gender"] == "Female") echo "selected"; ?>>Female</option>
        </select><br>
        <button type="button" onclick="submitdata('edit')">Edit</button>
    </form>
    <br>
    <a href="index.php">GO TO Index</a>
    <?php require 'script.php';?>
    
</body>
</html>