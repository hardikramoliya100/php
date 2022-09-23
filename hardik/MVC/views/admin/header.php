<!--
    Author: W3layouts
    Author URL: http://w3layouts.com
    License: Creative Commons Attribution 3.0 Unported
    License URL: http://creativecommons.org/licenses/by/3.0/
    -->

    <?php
    
    if(!isset($_SESSION['userdata']))
    {
        header("location:loging");
    }
  
    if(isset($_SESSION['userdata'])){
        if(($_SESSION['userdata']->Roleid != 1)){
            header("location:loging");

        }    
   }
    
    ?>
    <!DOCTYPE HTML>
    <html>
    
    <head>
        <title>admin</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Glance Design Dashboard Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
    SmartPhone Compatible web template, free WebDesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script
            type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    
        <!-- Bootstrap Core CSS -->
        <link href="<?php echo $this->base_url_asset;?>/admin/css/bootstrap.css" rel='stylesheet' type='text/css' />
    
        <!-- Custom CSS -->
        <link href="<?php echo $this->base_url_asset;?>/admin/css/style.css" rel='stylesheet' type='text/css' />
    
        <!-- font-awesome icons CSS -->
        <link href="<?php echo $this->base_url_asset;?>/admin/css/font-awesome.css" rel="stylesheet">
        <!-- //font-awesome icons CSS-->
    
        <!-- side nav css file -->
        <link href='<?php echo $this->base_url_asset;?>/admin/css/SidebarNav.min.css' media='all' rel='stylesheet' type='text/css' />
        <!-- //side nav css file -->
    
        <!-- js-->
        <script src="<?php echo $this->base_url_asset;?>/admin/js/jquery-1.11.1.min.js"></script>
        <script src="<?php echo $this->base_url_asset;?>/admin/js/modernizr.custom.js"></script>
    
        <!-- Metis Menu -->
        <script src="<?php echo $this->base_url_asset;?>/admin/js/metisMenu.min.js"></script>
        <script src="<?php echo $this->base_url_asset;?>/admin/js/custom.js"></script>
        <link href="<?php echo $this->base_url_asset;?>/admin/css/custom.css" rel="stylesheet">
        <!--//Metis Menu -->
        <style>
            #chartdiv {
                width: 100%;
                height: 295px;
            }
        </style>
    
    </head>
    
    <body class="cbp-spmenu-push">
        <div class="main-content">
            <div class="cbp-spmenu cbp-spmenu-vertical cbp-spmenu-left" id="cbp-spmenu-s1">
                <!--left-fixed -navigation-->
                <aside class="sidebar-left">
                    <nav class="navbar navbar-inverse">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                data-target=".collapse" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <h1><a class="navbar-brand" href="index.html"><span class="fa fa-area-chart"></span> Glance<span
                                        class="dashboard_text">Design dashboard</span></a></h1>
                        </div>
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="sidebar-menu">
                                <li class="header">MAIN NAVIGATION</li>
                                <li class="treeview">
                                    <a href="index.html">
                                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                                    </a>
                                </li>
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-laptop"></i>
                                        <span>Components</span>
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li><a href="grids.html"><i class="fa fa-angle-right"></i> Grids</a></li>
                                        <li><a href="media.html"><i class="fa fa-angle-right"></i> Media Css</a></li>
                                    </ul>
                                </li>
                                
                            </ul>
                        </div>
                        <!-- /.navbar-collapse -->
                    </nav>
                </aside>
            </div>
            <!--left-fixed -navigation-->
    
            <!-- header-starts -->
            <div class="sticky-header header-section ">
                <div class="header-left">
                    <!--toggle button start-->
                    <button id="showLeftPush"><i class="fa fa-bars"></i></button>
                    <!--toggle button end-->
                    <div class="profile_details_left">
                        <!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                            
                            <li class="dropdown head-dpdn">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                        class="fa fa-bell"></i><span class="badge blue">4</span></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have 3 new notification</h3>
                                        </div>
                                    </li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="images/4.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet</p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li class="odd"><a href="#">
                                            <div class="user_img"><img src="images/1.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet </p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="images/3.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet </p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li><a href="#">
                                            <div class="user_img"><img src="images/2.jpg" alt=""></div>
                                            <div class="notification_desc">
                                                <p>Lorem ipsum dolor amet </p>
                                                <p><span>1 hour ago</span></p>
                                            </div>
                                            <div class="clearfix"></div>
                                        </a></li>
                                    <li>
                                        <div class="notification_bottom">
                                            <a href="#">See all notifications</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        
                        </ul>
                        <div class="clearfix"> </div>
                    </div>
                    <!--notification menu end -->
                    <div class="clearfix"> </div>
                </div>
                <div class="header-right">
                    <div class="profile_details">
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">
                                        <span class="prfil-img"><img src="images/2.jpg" alt=""> </span>
                                        <div class="user-name">
                                            <p>Admin Name</p>
                                            <span>Administrator</span>
                                        </div>
                                        <i class="fa fa-angle-down lnr"></i>
                                        <i class="fa fa-angle-up lnr"></i>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="#"><i class="fa fa-cog"></i> Settings</a> </li>
                                    <li> <a href="#"><i class="fa fa-user"></i> My Account</a> </li>
                                    <li> <a href="#"><i class="fa fa-suitcase"></i> Profile</a> </li>
                                    <li> <a href="logout"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            <!-- //header-ends -->
            <!-- main content start-->
        