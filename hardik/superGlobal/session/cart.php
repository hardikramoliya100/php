<?php 

include_once('header.php'); 
if($_SESSION['hardik']!==1){
    header("location:loging.php");
}else{

    if(isset($_POST['btn-add'])){
        
        $_SESSION['cartitem']=["cart1"=>$_POST["cart1"],"cart2"=>$_POST["cart2"],"cart3"=>$_POST["cart3"],"cart4"=>$_POST["cart4"],"cart5"=>$_POST["cart5"]];
        
    }
    
}
?>
<div class="container">
    <div class="row mt-4">
        <div class="col-md-4 offset-md-4 text-center">
            <div class="card border-primary mb-3" ">
            <div class=" card-header">

                <h4>Add to cart</h4>
            </div>
            <div class="card-body">
                <form method="post">
                    <div class="mt-2">
                        <input type="text" placeholder="" name="cart1" class="form-control" id="cart1">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="" name="cart2" class="form-control" id="cart2">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="" name="cart3" class="form-control" id="cart3">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="" name="cart4" class="form-control" id="cart4">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="" name="cart5" class="form-control" id="cart5">
                    </div>
                    <div class="mt-2">
                        <input type="submit" name="btn-add" class="btn btn-primary" value="Add to card">

                        <a href="viewcart.php" class="btn btn-danger">View Cart</a>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>