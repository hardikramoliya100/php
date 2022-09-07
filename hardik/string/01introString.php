<?php

$Str =  "String alpha-ABC's + numeric-123 +symb-!@# ";
// $Str =  'String alpha-ABC"s + numeric-123 +symb-!@# ';
echo $Str;
echo "<br>PHP only responding plain text to the browser with the help of echo print";
echo "<br>test","checking echo is command";
// print("print is function support single arg","testing");
// echo "<br>";
echo "<br>".$Str."<br>";

echo addslashes($Str);
?>