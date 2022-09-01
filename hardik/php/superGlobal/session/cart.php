<?php 

include_once('header.php'); 

if(isset($_POST['btn-add'])){

    $_SESSION['cartitem']=["first"=>$_POST["first"],"last"=>$_POST["last"],"age"=>$_POST["age"]];

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
                        <input type="text" placeholder="Enter first Name" name="first" class="form-control" id="first">
                    </div>
                    <div class="mt-2">
                        <input type="text" placeholder="Enter last Name" name="last" class="form-control" id="last">
                    </div>
                    <div class="mt-2">
                        <input type="number" placeholder="Enter your Age" name="age" class="form-control" id="age">
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