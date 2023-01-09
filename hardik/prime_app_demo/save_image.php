<?php

$URL = 'C:\xampp\htdocs\php\hardik\prime_app_demo\cms\images\car1'; // Like "http:// ...." 

$FileToSave = 'D:/download.png';

$Content = file_get_contents($URL);

file_put_contents($FileToSave, $Content); 

?>