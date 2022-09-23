<?php
// Write a PHP program to check Leap years between 1901 to 2016 Using nested if.

echo " Leap years between 1901 to 2016 <br><br>";
for ($year=1901; $year <=2016; $year++) { 
    if( (0 == $year % 4) and (0 != $year % 100) or (0 == $year % 400) ){
        echo $year;
        echo "<br>";
    }
}
?>