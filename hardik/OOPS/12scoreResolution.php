<?php

class perentclassA{
    public static $staticA = "Hardik";
    function __construct()
    {
        echo self :: $staticA;
        echo "<br>Called FunctionName <br>";
    }
}

class chaildclassA extends perentclassA{
    function __construct()
    {
        parent :: __construct();
        echo "Called chaildFunction<br>";
    }

}

$obj = new chaildclassA;
echo perentclassA :: $staticA; 



?>