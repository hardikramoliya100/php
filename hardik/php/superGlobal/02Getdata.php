<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    echo "<pre>";
    echo "----------------get----------------------------";
    print_r($_GET);
    echo "----------------post----------------------------";
    print_r($_POST);
    echo "----------------request----------------------------";
    print_r($_REQUEST);
    echo "----------------files---------------------------";
    print_r($_FILES);
    echo "----------------globals----------------------------";
    print_r($GLOBALS);


    ?>

    <form method="get">
        <input type="text" name="getdata">
        <input type="submit" name="send">

    </form>

    <form method="post">
        <input type="text" name="postdata">
        <input type="submit" name="send">

    </form>

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="profilepic">
        <input type="submit" name="send" value="sendimg">

    </form>
</body>
</html>