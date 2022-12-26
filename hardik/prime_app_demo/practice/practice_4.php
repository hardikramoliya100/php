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

function sum(){
    $number1=10;
    $number2=15;

    $sum=$number1+$number2;
    return $sum;

}

function sum1($num1,$num2){
    $sum = $num1 +$num2;
    return $sum;
}

echo sum()."<br>";
echo sum1(100,133)."<br>";



?>
    
</body>
</html>