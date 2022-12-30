<?php include "includes/header.php"; ?>

<div id="wrapper">


    <?php include "includes/navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcom Admin
                        <small><?php echo $_SESSION['username']; ?></small>
                    </h1>

                </div>
            </div>


            <!-- /.row -->

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-file-text fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php

                                    $query = "SELECT * FROM posts";

                                    $total_post = mysqli_num_rows(mysqli_query($connection, $query));

                                    echo "<div class='huge'>$total_post</div>"


                                    ?>







                                    <div>Posts</div>
                                </div>
                            </div>
                        </div>
                        <a href="posts.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-comments fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <?php
                                    $query = "SELECT * FROM comments";

                                    $total_comments = mysqli_num_rows(mysqli_query($connection, $query));

                                    echo "<div class='huge'>$total_comments</div>"


                                    ?>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">

                                    <?php
                                    $query = "SELECT * FROM user";

                                    $total_user = mysqli_num_rows(mysqli_query($connection, $query));

                                    echo "<div class='huge'>$total_user</div>"


                                    ?>
                                    <div> Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="user.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-list fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">


                                    <?php
                                    $query = "SELECT * FROM category";

                                    $total_category = mysqli_num_rows(mysqli_query($connection, $query));

                                    echo "<div class='huge'>$total_category</div>"


                                    ?>
                                    <div>Categories</div>
                                </div>
                            </div>
                        </div>
                        <a href="categories.php">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <div class="row">
                <?php

                $query = "SELECT * FROM posts WHERE post_status = 'published'";

                $publised_post = mysqli_num_rows(mysqli_query($connection, $query));

                $query = "SELECT * FROM posts WHERE post_status = 'draft'";

                $draft_post = mysqli_num_rows(mysqli_query($connection, $query));

                $query = "SELECT * FROM comments WHERE comment_status = 'unapproved'";

                $unapproved_comment = mysqli_num_rows(mysqli_query($connection, $query));

                $query = "SELECT * FROM user WHERE user_role ='subscriber'";

                $subscriber_user = mysqli_num_rows(mysqli_query($connection, $query));








                ?>

                <script type="text/javascript">
                    google.charts.load('current', {
                        'packages': ['bar']
                    });
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                            ['data', 'count'],
                            <?php

                            $element_text = ['All Post','Activ Post','Draft Post', 'Categories', 'User','subscriber', 'Comments','unapproved comment'];
                            $element_count = [$total_post,$publised_post,$draft_post, $total_category, $total_user,$subscriber_user, $total_comments,$unapproved_comment];

                            for ($i = 0; $i < 8; $i++) {
                                echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}],";
                            }



                            ?>






                            // ['post', 1000],

                        ]);

                        var options = {
                            chart: {
                                title: '',
                                subtitle: '',
                            }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                </script>

                <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


            </div>
            <!-- /.row -->
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/footer.php" ?>