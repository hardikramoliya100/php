<?php

class parentclass {

    function additionoftwo($a,$b) {
        return $a+$b;
    }

}

class chaildclass extends parentclass {

    function avrg($x,$y)
    {
        $addition = $this -> additionoftwo($x,$y);

        return $addition/2;
    }
}

$child = new chaildclass;

echo $child -> avrg(10,10);

?>