<?php
echo "<br>-----------------------array_key_exists--------------------------<br>";
$a = array("volvo"=>"x90","BMW"=>"s4");

if (array_key_exists("volvo",$a)) {
    echo "Key exists";
}else{
    echo "Key not exists";
}

echo "<br>-----------------------array_key_exists--------------------------<br>";

$people = ["Thor","marvel","ironman","hulk"];

if (in_array("Thor",$people)) {
    echo "Match found";
}else{
    echo "Match not found";
}
?>