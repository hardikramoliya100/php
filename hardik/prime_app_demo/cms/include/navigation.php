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
            <a class="navbar-brand" href="<?php echo $url; ?>">CMS Frent</a>
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
                    echo "<li><a href='/php/hardik/prime_app_demo/cms/category/{$cat_id}'>{$cat_title}</a></li>";
                }

                ?>
                <?php

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') { ?>


                        <li>
                            <a href="<?php echo $GLOBALS['url']; ?>admin">Admin</a>
                        </li>

                <?php
                    }
                }

                ?>
                <?php

                if (isset($_SESSION['user_role'])) {
                    if ($_SESSION['user_role'] == 'admin') {
                        if (isset($_GET['p_id'])) {
                            $p_id =  $_GET['p_id'];
                            echo "<li><a href='/php/hardik/prime_app_demo/cms/admin/posts.php?sourse=edit_post&p_id={$p_id}'>Edit Post</a></li>";
                        }
                    }
                }

                ?>


                <li>
                    <a href="<?php echo $GLOBALS['url']; ?>registration">Registration</a>
                </li>
                <li>
                    <a href="<?php echo $GLOBALS['url']; ?>emailSend/contact.php">Contact</a>
                </li>

                <?php

                if (isset($_SESSION['user_role'])) {
                ?>


                    <li>
                        <a href="/php/hardik/prime_app_demo/cms/include/logout.php">Logout</a>
                    </li>

                <?php

                } else { ?>


                    <li>
                        <a href="/php/hardik/prime_app_demo/cms/login.php">Login</a>
                    </li>

                <?php
                }

                ?>

                <!-- <li>
                        <a href="#">Contact</a>
                    </li> -->
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>