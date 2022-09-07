<?php

use finalChaild as GlobalFinalChaild;

final class finalMethod{
    
    function finalFun(){
        echo "Call Final";
    }
}
// declring child class for accessing perent properties for testing final keyword
// class finalChaild extends finalMethod

class finalChaild{
    function finalFun1(){
        // GlobalFinalChaild :: finalFun();
        echo "Call Chaild";
    }
}

$obj = new finalChaild;
$obj-> finalFun1();

$obj1 = new finalMethod;
$obj1-> finalFun();




?>