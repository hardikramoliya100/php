<?php

class constructerExample{
    function __construct()
    {
        echo "call__construct";

    }

    function methodeOther()
    {
        echo "<br>call";
    }

    function __destruct()
    {
        echo "<br>call__destruct";
    }
}

$constructerExample = new constructerExample;

$constructerExample->methodeOther();
?>