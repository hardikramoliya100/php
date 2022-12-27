<?php

$file ="exampl.txt";

if ($hendel = fopen($file,'r')) {

   echo $content = fread($hendel,filesize($file));

    fclose($hendel);
}else{

    echo "file is not found";

}




?>