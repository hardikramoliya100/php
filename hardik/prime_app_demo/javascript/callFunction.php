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
        const persen1 = {
            Fullname: function() {

                return this.firstname + " " + this.lastname;

            }
        }

        const persen2 = {
            firstname: "Hardik",
            lastname: "Ramoliya"
        };

            let x = persen1.Fullname.call(persen2);
        document.getElementById("demo").innerHTML = x;
    </script>

</body>

</html>