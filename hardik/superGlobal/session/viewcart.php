<?php

require('header.php');

if (!isset($_SESSION['cartitem'])) {

    echo "<h3>sorry no items add cart</h3>";
} else {



    if (isset($_POST['emptycart'])) {
        unset($_SESSION['cartitem']);
        header("location:cart.php");
    }
}

?>

<li><?php if(isset($_SESSION['cartitem']['cart2'])){echo $_SESSION['cartitem']['cart1']; } ?></li>
<li><?php if(isset($_SESSION['cartitem']['cart1'])){echo $_SESSION['cartitem']['cart2']; } ?></li>
<li><?php if(isset($_SESSION['cartitem']['cart3'])){echo $_SESSION['cartitem']['cart3']; } ?></li>
<li><?php if(isset($_SESSION['cartitem']['cart4'])){echo $_SESSION['cartitem']['cart4']; } ?></li>
<li><?php if(isset($_SESSION['cartitem']['cart5'])){echo $_SESSION['cartitem']['cart5']; } ?></li>


<form method="post">
    <div>
        <input type="submit" name="emptycart" id="emptycart" class="btn btn-danger" value="Empty Cart">
    </div>
</form>