<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="cstyle.css">
</head>

<body>
    <section class="wrapper">
        <h2>claculater</h2>
        <form method="post">
            <div class="section1">
                <span>Enter First Number</span>
                <input type="text" name="num1" autocomplete="off" placeholder="NUMBER">
            </div>
            <div class="section2">
                <span>Enter Second Number</span>
                <input type="text" name="num2" autocomplete="off" placeholder="NUMBER">
            </div>
            <div class="submit" >
                <input type="submit" name="submit" value="ADD">
                <input type="submit" name="submit" value="SUB">
                <input type="submit" name="submit" value="MULT">
                <input type="submit" name="submit" value="DIV">
            </div>
        </form>
        <div>

            <?php
        
        if(isset($_POST['submit'])){
            if (empty($_POST['num1'])) {
                
            }
            else{
                $num1=$_POST['num1'];
            }

            if (empty($_POST['num2'])) {
                
            }
            else{
                $num2=$_POST['num2'];
            }

            $opstion=$_POST['submit'];
            ?>
            <?php
            switch ($opstion) {
                case "ADD":
                    $ANS = $num1 + $num2;
                    echo "<span style='color:#00203FFF; display:block; margin: top 5px; margin-right': 50px>The addition of two num is $ANS</div>";
                    break;

                case "SUB":
                    $ANS = $num1 - $num2;
                    echo "<span style='color:#00203FFF; display:block; margin: top 5px; margin-right': 50px>The subtrition of two num is $ANS</span>";
                    break;
                    
                    case "MULT":
                        $ANS = $num1 * $num2;
                        echo "<span style='color:#00203FFF; display:block; margin: top 5px; margin-right': 50px>The multipition of two num is $ANS</span>";
                    break;

                case "DIV":
                    $ANS = $num1 / $num2;
                    echo "<span style='color:#00203FFF; display:block; margin: top 5px; margin-right': 50px>The division of two num is $ANS</span>";
                    break;

                default:
                echo "Sorry ";
            }
            
        }
               
        ?>
        
        <!-- <div class="hardik">The addition of two num is</div>  -->

        <!-- <span style="color:#00203FFF; display:block; margin: top 5px; margin-right: 50px">The addition of two num is</span> -->
    </section>
</body>

</html>