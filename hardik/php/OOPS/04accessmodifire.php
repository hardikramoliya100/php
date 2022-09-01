<?php

use chaildclass as GlobalChaildclass;
use parentclass as GlobalParentclass;

class parentclass{

    public $water = "water public value";
    protected $juice ="juice protectrd value";
    private $wine = "costly wine private value";
}

class chaildclass extends GlobalParentclass{

    function a()
    {
        echo $this -> juice;
    }
}

$chaildobj = new GlobalChaildclass;

echo $chaildobj -> water;
echo "<br>";

$chaildobj -> a();

?>