<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <button type="button" onclick="change()" >try</button>
    <p id="demo"> my name is hardik</p>

    <script>
        function change(){

            let text =document.getElementById("demo").innerHTML;
            document.getElementById("demo").innerHTML = text.replace("hardik","jignesh"); 
        }
    </script>
    
</body>
</html>