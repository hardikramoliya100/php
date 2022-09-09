<?php

interface RBI{
    function Intrest();
}

interface RBInew{
    function lone();
}

class SBI implements RBI,RBInew{
    function Intrest()
    {
        echo "Call RBI";
    }
    function lone()
    {
        echo "<br>Called RBInem";
    }
}

$sbi = new SBI;

$sbi->Intrest();
$sbi->lone();

?>