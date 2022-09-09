<?php

class parentclass{
    function parentfunction(chaildclass $chaildclass){
        echo "Called parentMethod";
        $chaildclass->chaildfunction();
    }
}
class chaildclass extends parentclass{
    function chaildfunction(){
        echo "<br>Called chaildMethod";
    }
}

$chaildclass = new chaildclass;
$parentclass = new parentclass;

$parentclass-> parentfunction($chaildclass);

?>