<?php

// Write a program for this Pattern:
//     *****
//     *
//     *
//     *
//     *****

for ($i=0; $i < 5; $i++) { 
    if ($i==0 || $i==4) {
        
        for ($j=0; $j <5 ; $j++) {
            
            echo " * ";
        }
        echo "<br>";
    }else{
        echo " * ";
        echo "<br>";
    }
    
}

?>