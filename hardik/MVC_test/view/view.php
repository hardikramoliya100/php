<?php
// print_r($data);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL USER</title>
</head>
<body>
    <div>
        ALL USER
    </div><br>
    <table border=2>
        <thead>
            <tr>
                <td>#</td>
                <td>firstname</td>
                <td>lastname</td>
                <td>email</td>
                <td>mobile</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            <?php $i=1; foreach ($data as $d) {?>
                <tr id="<?php echo $d['id']; ?>">
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $d['firstname']; ?></td>
                    <td><?php echo $d['lastname']; ?></td>
                    <td><?php echo $d['email']; ?></td>
                    <td><?php echo $d['mobile']; ?></td>
                    <td>
                        <a href="edit?id=<?php echo $d['id']; ?>">Edit</a>
                        <a href="delete?id=<?php echo $d['id']; ?>">delete</a>
                    </td>
                </tr>
                <tr>
                <?php } ?>

            </tr>
        </tbody>
    </table><br>
    <a href="addnewuser">ADD NEW USER</a>
    
</body>
</html>