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
    
    $number1 = array(1,2,3,4,5,6,7,8,9,10);
    $number2 = array(11,12,13,14,15,16,17,18,19,20);

    print_r($number1);
    echo "<br>";
    print_r($number2);
    
    $num1 = 30;
    $num2 = 25;
    
    echo "<br>";
    echo $num1 + $num2;
    echo "<br>";
    
    $name = ['hardik','jignesh'];
    $name1 = ['name1'=>'hardik','name2'=>'jignesh'];
    
    print_r($name);
    echo "<br>";
    print_r($name1);
    
    echo "<br>";
    echo $name[0];
    echo "<br>";
    echo $name1['name1'];

    
    ?>
</body>
</html>