<?php 

require('header.php');

if(!isset( $_SESSION['cartitem'])){

    echo "<h3>sorry no items add cart</h3>";
}else{
    if(isset($_POST['emptycart'])){
        unset($_SESSION['cartitem']);
        header("location:cart.php");
    }
}

?>
<li><?php echo $_SESSION['cartitem']['first']; ?></li>
<li><?php echo $_SESSION['cartitem']['last']; ?></li>
<li><?php echo $_SESSION['cartitem']['age']; ?></li>

<form method="post">
    <div>
        <input type="submit" name="emptycart" id="emptycart" class="btn btn-danger" value="Empty Cart">
    </div>
</form>