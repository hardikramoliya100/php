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

        const car=["volvo","bmw","oddi","maruti"];

        let text ="<ul>";

        for (let index = 0; index < car.length; index++) {
            text +="<li>"+car[index]+"</li>";
            
        }
        text += "</ul>";

        document.getElementById("demo").innerHTML= text;
    </script>
    
</body>
</html>