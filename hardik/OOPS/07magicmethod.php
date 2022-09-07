<?php

class magicMethod{
    function __get($name)
    {
        echo $name."<br>";
    }

    function __set($key, $value)
    {
        echo "<br>Key is ".$key." Value is ".$value;
    }

    function __call($functionname, $arguments)
    {
        echo "<br>Key is".$functionname;
        print_r($arguments);
    }
}

$obj = new magicMethod;
echo "<br>";
 $obj-> username;
 $obj-> username2;
 $obj-> username = "hardik";
 $obj-> select("user",123,true);


?>