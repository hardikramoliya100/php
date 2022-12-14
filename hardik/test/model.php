<?php

class model{

    public $db="";
    function __construct()
    {
        $this->db = new mysqli("localhost","root","","user");
    }
}
?>