<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <script>
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
</head>

<body>
    <div>
        ADD USER
    </div><br>
    <div>
        <form action="" method="POST">
            <div>
                <label for="">firstname</label>
                <input type="text" name="firstname">
            </div><br>
            <div>
                <label for="">lastname</label>
                <input type="text" name="lastname">
            </div><br>
            <div>
                <label for="">email</label>
                <input type="text" name="email">
            </div><br>
            <div>
                <label for="">mobile</label>
                <input type="text" name="mobile">
            </div><br>
            <div>
                <input type="submit" value="save" name="save">
            </div>
        </form>
    </div><br>
    <a href="home">show all user</a>
</body>

</html>