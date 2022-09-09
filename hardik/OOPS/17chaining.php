<?php

class Queryclass{
    public $Query;
    function city($city){
        $this->Query = "city name $city.";
        return $this;
    }

    function state($state){
        $this->Query .= "state name $state.";
        return $this;
    }

    function country($country){
        $this->Query .= "country name $country.";
        return $this;
    }
}

$obj = new Queryclass;
echo $name = $obj->city("jetpur")->Query;
echo "<br>";
echo $name = $obj->city("jetpur")->state("gujrat")->Query;
echo " <br>";
echo $name = $obj->city("jetpur")->state("gujrat")->country("india")->Query;

?>
