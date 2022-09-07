<?php

$arr = [100,200,300,400];

for($i=0;$i<4;$i++){
    echo "$arr[$i] <br>";
}

foreach ($arr as $key => $value) {
    echo "key is $key ,value is $value <br>";
}

?>