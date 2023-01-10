<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p id="demo1"></p>
    <p id="demo2"></p>

    <script>

        class car{
            constructor(name,year){
                this.name = name;
                this.year = year;
            }
            age(x){
                return x - this.year;
            }
        }

        let date = new Date();
        let year = date.getFullYear();
        const mycar = new car("volvo",2014);

        document.getElementById("demo1").innerHTML = mycar.name+" "+mycar.year;

        document.getElementById("demo2").innerHTML = "my car age is "+mycar.age(year);

    </script>
    
</body>
</html>