<?php include "includes/header.php"; ?>

<div id="wrapper">
    <?php include "includes/navigation.php"; ?>
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcom Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>
                    <?php include "includes/view_user_post.php"; ?>
                </div>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php" ?>