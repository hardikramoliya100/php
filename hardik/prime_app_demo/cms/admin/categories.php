<?php include "includes/header.php"; ?>

<div id="wrapper">


    <?php include "includes/navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Dashbord Page
                        <small>aouther</small>
                    </h1>
                    <div class="col-xs-6">

                        <?php //INSERT CATEGORY
                        insert_category(); ?>

                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input type="text" placeholder="Enter Category" class="form-control" name="cat_title">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="submit" value="Add Category">
                            </div>
                        </form>


                        <?php

                        if (isset($_GET['edit'])) {
                            $edit_id = $_GET['edit'];

                            include "includes/update_category.php";
                        } ?>
                        
                    </div>
                    <div class="col-xs-6">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Category Title</th>
                                </tr>
                            </thead>
                            <tbody>



                                <?php
                                //SELECT ALL CATEGORIES
                                selectAllCategories();

                                ?>

                                <?php deleteCategory(); ?>



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/footer.php" ?>