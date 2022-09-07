<?php

class A {

    function parent(){

        return "parent";

    }

}
class B extends A{

    function chaild(){

        return "chaild";
    }
}

$obj = new B;

echo $obj -> chaild();
echo "<br>";
echo $obj -> parent();
?>