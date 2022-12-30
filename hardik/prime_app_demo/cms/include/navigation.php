<?php session_start(); ?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">CMS Frent</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">


                <?php

                $query = "SELECT * FROM category";
                $category_data = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_assoc($category_data)) {
                    $cat_title = $row['cat_title'];
                    $cat_id = $row['cat_id'];
                    echo "<li><a href='category.php?cat_id={$cat_id}'>{$cat_title}</a></li>";
                }

                ?>
                <?php

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') { ?>


                        <li>
                            <a href="admin">Admin</a>
                        </li>

                <?php
                    }
                }

                ?>

                <li>
                        <a href="include/logout.php">Logout</a>
                    </li>
                    <!-- <li>
                        <a href="#">Contact</a>
                    </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>