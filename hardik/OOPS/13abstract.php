<?php

abstract class RBI{
    abstract function Intrest();
}

class SBI extends RBI{

    function Intrest()
    {
        echo "Called SBI";
    }
}

class BOB extends RBI{
    function Intrest()
    {
        echo "<br>Called BOB";       
    }
}

$sbi = new SBI;
$bob = new BOB;

$sbi->Intrest();
$bob->Intrest();

?>