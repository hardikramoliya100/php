<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<p id="demo"></p>

<script>
    const num =[10,15,6,76,1,65];
    let text ="";
    num.forEach(myfunction);
    document.getElementById("demo").innerHTML = text;

    function myfunction(value){
        text += value+"<br>";
    }
</script>
    
</body>
</html>