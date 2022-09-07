<?php

class perentclassA{
    function __construct()
    {
        echo "Called FunctionName <br>";
    }
}

class chaildclassA extends perentclassA{
    function __construct()
    {
        parent :: __construct();
        echo "Called chaildFunction";
    }

}

$obj = new chaildclassA;

?>