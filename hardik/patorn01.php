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

?>