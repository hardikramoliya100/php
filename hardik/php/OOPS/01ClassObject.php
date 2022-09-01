<?php

class A
{
    function addition($a ,$b){

        $sum= $a+$b;
        echo "<BR>".$sum;
    }

}

$object = new A;
$obj = new A;
$object-> addition(8,9);
$object->addition(7,10);
$obj-> addition(9,15);
?>