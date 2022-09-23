<?php

// Write a program in PHP to print Fibonacci series. 0, 1, 1, 2, 3, 5, 8, 13, 21

$a = 0;
$b = 1;

echo $a .",". $b ;

for ($i=0; $i < 9; $i++) { 
    $c = $b;
    $b = $c + $a;
    $a = $c;

    echo ",".$b;
}


?>