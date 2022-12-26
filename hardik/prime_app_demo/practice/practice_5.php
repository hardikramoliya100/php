<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    echo "<h1>Math function</h1> <br>";
    
    echo pow(2,7);
    echo "<br>";
    echo rand(1,1000);
    echo "<br>";
    echo sqrt(100);
    echo "<br>";
    echo ceil(4.5);
    echo "<br>";
    echo floor(4.5);
    echo "<br>";
    echo round(4.7);
    echo "<br>";
    
    
    echo "<h1>String function</h1> <br>";
    
    $string = "Hello Hardik";
    
    echo strlen($string);
    echo "<br>";
    echo strtoupper($string);
    echo "<br>";
    echo strtolower($string);
    
    echo "<h1>Array function</h1> <br>";
    
    $list = [12,56,789,435,100,45];

    echo max($list);
    echo "<br>";

    echo min($list);
    echo "<br>";
    sort($list);
    print_r($list);
    echo "<br>";

    $a=56;
    $found = in_array($a,$list);

    if ($found) {
        echo "found in array";
    } else {
        echo "Not found in array";
        # code...
    }
    

    


    ?>
</body>
</html>