<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<button type="button" onclick="myfunction()" >try</button>
    
<p id="demo1"></p>
<p id="demo2"></p>

<script>
    function myfunction(){
       document.getElementById("demo1").innerHTML = "this is demo 1";
       document.getElementById("demo2").innerHTML = "this is demo 2";
    }
</script>
</body>
</html>