<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <section class="a">
        <div class="container">
            <div class="col-50 box">
                <div class="call30">
                    <h2 class="">php</h2>
                    <h2 class="">calculater</h2>

                </div>
                <div class="call30">
                    <form method="post">
                        <div class="n1">
                            <input type="text" name="text1" placeholder="Enter First Number">
                        </div>
                        <div class="n2">
                            <input type="text" name="text2" placeholder="Enter First Number">
                        </div>
                        <div class="select-style">
                            <select class="ab" name="opretion" style="width: 80px; border-radius: 5px;border: solid teal;padding: 5px;">
                                <option value="add">ADD</option>
                                <option value="sub">SUB</option>
                                <option value="mult">MULT</option>
                                <option value="div">DIV</option>
                            </select>
                        </div>
                        <div class="submit">
                            <input type="submit" name="submit" value="SUBMIT">
                            <br>
                        </div>
                    </form>
                    <div>

                        <p>

                            <?php

                            if (isset($_POST['submit'])) {
                                $num1 = $_POST['text1'];
                                $num2 = $_POST['text2'];
                                $opretion = $_POST['opretion'];

                                switch ($opretion) {
                                    case "add":
                                        $sum = $num1 + $num2;
                                        echo "The addition of two num is $sum";
                                        break;

                                    case "sub":
                                        $sum = $num1 - $num2;
                                        echo "The sbutraction of two num is $sum";
                                        break;

                                    case "mult":
                                        $sum = $num1 * $num2;
                                        echo "The multiplication of two num is $sum";
                                        break;

                                    case "div":
                                        $sum = $num1 / $num2;
                                        echo "The division of two num is $sum";
                                        break;

                                    default:
                                        echo "Sorry ";
                                }
                            }
                            ?>

                        </p>
                    </div>
                </div>
            </div>

            <!-- </div> -->

        </div>
    </section>
</body>

</html>