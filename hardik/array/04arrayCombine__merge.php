<?php

$name = array("a"=>"hardik","b"=>"jignesh","c"=>"avi");
$age = array("a"=>"35","ba"=>"37","cr"=>"67");

echo "<pre>";
print_r($name);
print_r($age);

echo "<br>-------------------------------Array combine----------------------------------------------<br>";
$new=(array_combine($name,$age));
print_r($new);
echo "<br>-------------------------------Array Merge----------------------------------------------<br>";
$new1=(array_merge($name,$age));
print_r($new1);
echo "<br>--------------------------------Array Merge Recuesive---------------------------------------------<br>";
$new2=(array_merge_recursive($name,$age));
print_r($new2);

?>
