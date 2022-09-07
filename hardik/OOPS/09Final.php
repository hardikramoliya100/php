<?php

class finalMethod{
    // final public $finelA = "hardik"
    final function finalFun(){
        echo "Call Final";
    }
}

class finalChaild extends finalMethod{
    function finalFun1(){
        echo "Call Chaild";
    }
}

$obj = new finalChaild;
$obj-> finalFun1();
$obj-> finalFun();


?>