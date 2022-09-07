<?php

echo "<pre>";

echo "<br>--------------------pop--------------------------<br>";

$a= array("red","yellow","blue");

echo "<br>--------------------Befor pop--------------------------<br>";
print_r($a);

array_pop($a);

echo "<br>--------------------After pop--------------------------<br>";
print_r($a);

echo "<br>--------------------push--------------------------<br>";
$push= array("red","white");

echo "<br>--------------------Before push--------------------------<br>";
print_r($push);

array_push($push,"blue","yellow");

echo "<br>--------------------After push--------------------------<br>";
print_r($push);

?>