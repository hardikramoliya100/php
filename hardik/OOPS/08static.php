<?php

class staticA{
    public static $publicData = "hardik";
    function any(){
        echo "Call";
    }
}
echo staticA :: $publicData;

?>
