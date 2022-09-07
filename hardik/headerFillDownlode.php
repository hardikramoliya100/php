<?php

if (isset($_POST['Downlode'])) {
   
    $file_name = "downlodefile.zip";
    
    header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="".$file_name');
// header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Pragma: public');
header('Content-Length: '.filesize($file_name));
ob_clean();
flush();
readfile("$file_name");
exit();
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
    <form method="post">
        <input type="submit" name="Downlode" id="Downlode" value="Downlode">
    </form>
    
</body>
</html>