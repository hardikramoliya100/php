<?php

$arr =array(100,200,300,400);


function ArrayFilter($arRes){
    return $arRes*$arRes;
}

$arrFilter= array_filter($arr,"ArrayFilter");
echo "<pre>";

// print_r($arr);
print_r($arrFilter);
echo "<br>------------------------------Array Map----------------------------------<br>";
function ArrayMap($arRes){
    return $arRes*$arRes;
}

$arrMap= array_map("ArrayMap",$arr);

print_r($arrMap);

function ArrayWalk($arRes,$arrD){
    echo "Value : ".$arRes."Key : ".$arrD."<br>";
}

$arrWalk= array_walk($arr,"ArrayWalk");
print_r($arrWalk);

?>