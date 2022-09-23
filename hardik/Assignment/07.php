<?php

// • What will be the values of $a and $b after the code below is executed? Explain your answer.
// $a = '1';
// $b = &$a;
// $b = "2$b";

$a = '1';
$b = &$a;
$b = "2$b";

echo $a."<br>";
echo $b;


?>