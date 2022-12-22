<?php

for ($i=0; $i<5 ; $i++) { 
    for ($j=0; $j<5 ; $j++) { 
        echo "*";
    }
    echo"<br>";
}

echo "<br><br>";

for ($i=0; $i<5 ; $i++) { 
    for ($j=0; $j<=$i ; $j++) { 
        echo " * ";
    }
    echo"<br>";
}

echo "<br><br>";

for ($i=0; $i<5 ; $i++) { 
    for ($j=0; $j<=$i ; $j++) { 
        echo " $i ";
    }
    echo"<br>";
}

echo "<br><br>";

for ($i=0; $i<5 ; $i++) { 
    for ($j=0; $j<=$i ; $j++) { 
        echo " $j ";
    }
    echo"<br>";
}

echo "<br><br>";
$a=0;
for ($i=0; $i<5 ; $i++) { 
    
    for ($j=0; $j<=$i ; $j++) { 
        echo " $a ";
        $a++;
    }
    echo"<br>";
    
}

echo "<br>";
for ($i=0; $i <5 ; $i++) { 
    for ($j=0; $j <5 ; $j++) { 
        if ($i<$j) {
            echo " * ";
        }else{
            echo " _ ";
        }
    }
    echo "<br>";
}

echo "<br>";

for ($i=1; $i <=5 ; $i++) {
     
    for ($j=1; $j <=5 ; $j++) { 
        if ($j<=(5-$i)) {
            echo " # ";
        }else {
            echo " * ";
        }
    }
    echo "<br>";
}
 $a=3; $b=1;
for ($i=0; $i <3; $i++) { 
    
    for ($j=0; $j <=$i ; $j++) { 
        echo " ".$a." ";
        $b++;
        $a=$a+$b;
    }
    echo "<br>";
}

?>

