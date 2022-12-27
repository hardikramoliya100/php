<?php

class Dog{

    public $eye_colore = "black";
    public $nose_colore = "blue";
    function body(){

       echo $this->eye_colore;
       echo $this->nose_colore;
    }
}

class NewDog extends Dog{
    function newbody(){
        $this->body();
    }
}

$cute = new NewDog();
$cute->newbody();
?>