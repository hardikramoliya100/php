<?php

class hardik
{
    public $name = "chetan";
    function __construct()    
    {
        $this->Dbconnection = "name is ".$this->name;
        echo "<pre>";
        print_r($this->Dbconnection);

    }
}

$hardik = new hardik;
?>