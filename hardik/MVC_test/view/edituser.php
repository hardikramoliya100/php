

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    
</head>
<body>
    <div>
        EDIT USER
    </div><br>
    <div>
        <form action="" method="POST" >
            <div>
                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                <label for="">firstname</label>
                <input type="text" name="firstname" value="<?php echo $data['firstname']; ?>">
            </div><br>
            <div>
                <label for="">lastname</label>
                <input type="text" name="lastname" value="<?php echo $data['lastname']; ?>" >
            </div><br>
            <div>
                <label for="">email</label>
                <input type="text" name="email" value="<?php echo $data['email']; ?>">
            </div><br>
            <div>
                <label for="">mobile</label>
                <input type="text" name="mobile" value="<?php echo $data['mobile']; ?>">
            </div><br>
            <div>
                <input type="submit" value="edit" name="edit">
            </div>
        </form>
    </div><br>
    <a href="home">show all user</a>
</body>
</html>