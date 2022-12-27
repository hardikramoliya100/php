<?php

$file ="exampl.txt";

if ($hendel = fopen($file,'w')) {

    fwrite($hendel,"I love PHP");

    fclose($hendel);
}else{

    echo "file is not found";

}




?>