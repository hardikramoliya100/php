<?php include "includes/header.php"; ?>

<div id="wrapper">


    <?php include "includes/navigation.php"; ?>


    <div id="page-wrapper">

        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                        Dashbord Page
                        <small>aouther</small>
                    </h1>

                    <?php
                    
                    if(isset($_GET['sourse'])){
                        $sourse=$_GET['sourse'];
                    }else{
                        
                        $sourse='';
                    }
                    switch ($sourse) {
                        case 'add_user':
                           
                            include "includes/add_user.php";
                            break;

                        case 'edit_user':
                           
                            include "includes/edit_user.php";
                            break;
                        
                        default:

                        include "includes/view_all_user.php";
                            # code...
                            break;
                    }
                    
                    
                    
                    
                    
                    
                    
                    
                    ?>





                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php include "includes/footer.php" ?>