<?php

$car =array("volvo","BMW","Toyoto","Honda","oddi","Hero");

echo "<pre>";

print_r($car);

print_r(array_chunk($car,2));
print_r(array_slice($car,2));

?>