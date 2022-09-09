<?php

use SBI as GlobalSBI;

trait RBInew{
    function Intrest(){
        echo "Called intrest RBInew";
    }
}

trait RBI{
    function Intrest1(){
        echo "<br>Called intrest1 RBI";
    }
}

class SBI{

    use RBInew;
    use RBI;

    function lone(){
        $this->Intrest();
        $this->Intrest1();
        echo "<br>Called lone";
    }
}

$sbi = new GlobalSBI;
$sbi->lone();
?>