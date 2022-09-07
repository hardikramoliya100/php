<?php

$A=["a"=>"red","b"=>"blue","c"=>"black","d"=>"yellow"];
$B=["a"=>"red","f"=>"blue","g"=>"black","k"=>"hardik"];
echo "<pre>";
print_r(array_diff($A,$B));
print_r(array_diff_key($A,$B));

?>