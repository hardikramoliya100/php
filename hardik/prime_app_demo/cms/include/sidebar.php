<div class="col-md-4">

    <!-- Blog Search Well -->

    <div class="well">
        <h4>Blog Search</h4>


        <form action="<?php echo $GLOBALS['url']; ?>search.php" method="post">
            <div class="input-group">
                <input type="text" class="form-control" name="search">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit" name="submit">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </span>
            </div>
        </form>


        <!-- /.input-group -->
    </div>


    <?php

    if (!isset($_SESSION['username'])) { ?>



        <div class="well">
            <h4>Login</h4>


            <form action="<?php echo $GLOBALS['url']; ?>include/login.php" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Enter Username">
                </div>
                <div class="input-group">
                    <input type="password" class="form-control" name="password" placeholder="Enter Password">
                    <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">Submit</button>
                    </span>
                </div>
                <div class="form-group">
                    <a href="<?php echo $GLOBALS['url']; ?>emailSend/forgot.php">Forgot Password</a>
                </div>

            </form>


            <!-- /.input-group -->
        </div>
    <?php } ?>

    <!-- Blog Categories Well -->
    <div class="well">

        <?php

        $query = "SELECT * FROM category";
        $category_data = mysqli_query($connection, $query);

        ?>
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-12">
                <ul class="list-unstyled">
                    <?php
                    $url=$GLOBALS['url'];
                    while ($row = mysqli_fetch_assoc($category_data)) {
                        $cat_title = $row['cat_title'];
                        $cat_id = $row['cat_id'];
                        echo "<li><a href='".$url."category/{$cat_id}'>{$cat_title}</a></li>";
                    }

                    ?>
                </ul>
            </div>

        </div>
        <!-- /.row -->
    </div>

    <!-- Side Widget Well -->
    <?php include "include/widget.php"; ?>

</div>