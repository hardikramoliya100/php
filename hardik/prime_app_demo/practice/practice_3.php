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
    
    if (10<3) {
        # code...
    } elseif (10<4) {
        # code...
    }else{
        echo "I love PHP"."<br>";
    }
    
    for ($i=0; $i <=10 ; $i++) { 
        echo $i."<br>";
    }
    

    $num = 16; 
    
    switch ($num) {
        case '12':
            echo "number is 12";
            break;
        case '13':
            echo "number is 13";
            break;
        case '14':
            echo "number is 14";
            break;
        case '15':
            echo "number is 15";
            break;
        case '16':
            echo "number is 16";
            break;
        
        default:
            # code...
            break;
    }
    
    
    ?>
    
</body>
</html>