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

    const persen={
        firstname: "Hardik",
        lastname: "Ramoliya",
        age: 22,
        Fullname:function(){
            return this.firstname+" "+this.lastname+" is "+this.age+" years old."
        }
    };

    document.getElementById("demo").innerHTML = persen.Fullname();

    </script>
    
</body>
</html>