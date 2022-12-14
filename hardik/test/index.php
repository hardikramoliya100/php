<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta neme="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h2>index</h2>
    <table border= 1>
        <tr>
            <td>#</td>
            <td>neme</td>
            <td>email</td>
            <td>gender</td>
            <td>Action</td>
        </tr>
        <?php require 'config.php';
        
        $rows = mysqli_query($conn ,"SELECT * FROM usres");
        $i=1;?>
        <?php foreach($rows as $row){?>
            <tr id=<?php echo $row['id'] ?>>
                <td><?php echo $i++; ?></td>
                <td><?php echo $row['neme']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['gender']; ?></td>
                <td>
                    <a href="edituser.php?id=<?php echo $row['id']; ?>">Edit</a>
                    <button type="button" onclick="submitdata(<?php echo $row['id']; ?>)" >Delete</button>
                </td>
            </tr>
        <?php } ?>
    </table>
    <a href="adduser.php">add user</a>
    <?php require 'script.php';?>
    
</body>
</html>