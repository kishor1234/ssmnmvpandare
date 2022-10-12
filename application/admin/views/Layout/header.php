<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Admin | Dashboard</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.5 -->
        <base href="<?= HOSTURL ?>">
        <link rel="stylesheet" href="assets/ap/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="assets/ap/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
              page. However, you can choose any other skin. Make sure you
              apply the skin class to the body tag so the changes take effect.
        -->
        <link rel="stylesheet" href="assets/ap/dist/css/skins/skin-blue.min.css">
        <link href="assets/ap/dropzone.css" rel="stylesheet" type="text/css"/>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="assets/ap/aasksoft editor/editor.css" rel="stylesheet" type="text/css"/>


        <style>
            img {
                width: 100%;
                height: auto;
            }

            .close:hover
            {
                color: red;
            }
            table.table-bordered{
                border:1px solid #222d32;
                margin-top:20px;
            }
            table.table-bordered > tbody > tr > th{
                border:1px solid #222d32;
                background-color: #3c8dbc;
                color:#fff;
            }
            table.table-bordered > tbody > tr > td{
                border:1px solid #222d32;
            }
        </style>
        <script src="assets/ap/plugins/jQuery/jQuery-2.1.4.min.js"></script>
        <script src="assets/js/jquery.form.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.css" integrity="sha256-Z8TW+REiUm9zSQMGZH4bfZi52VJgMqETCbPFlGRB1P8=" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.js" integrity="sha256-ZvMf9li0M5GGriGUEKn1g6lLwnj5u+ENqCbLM5ItjQ0=" crossorigin="anonymous"></script>
        <script src="assets/jquerytoast/jquery.toaster.js" type="text/javascript"></script>
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <!-- Main Header -->
            <header class="main-header">

                <!-- Logo -->
                <a href="/" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>D</b>BT</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Dashboard</b></span>
                </a>

                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown tasks-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-flag-o"></i>
                                    <span class="label label-danger"></span>
                                </a>

                            </li>
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <!-- The user image in the navbar-->
                                    <img src="assets/ap/dist/img/avatar5.png" class="user-image" alt="User Image">
                                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                    <span class="hidden-xs">Admin</span>
                                </a>
                                <ul class="dropdown-menu" style="width: 10px;">
                                    <!-- The user image in the menu -->
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VProfile"); ?>" >Profile</a>
                                    </li>
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VChangePassword"); ?>" >Change Password</a>
                                    </li>
                                    <li>
                                        <a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VLogout"); ?>" >Sign out</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Control Sidebar Toggle Button -->
                            <li>
                                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">

                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="assets/ap/dist/img/avatar5.png" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p>Admin</p>
                            <!-- Status -->
                            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>


                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu">
                        <li class="header">HEADER</li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="active"><a href="/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
                        <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VProject"); ?>"><i class="fa fa-dashboard"></i> Project</a></li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-crosshairs"></i> <span>CRM</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("upcommingOrder"); ?>" >Order</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("employee"); ?>" >Employee</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("users"); ?>" >Users</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("search"); ?>" >Search Order</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("customeSchedule"); ?>" >Custom Schedule</a></li>
                                <li><a target="_blank" href="/?r=<?php echo $obj->encdata("TodaysSchedule");?>" >Download Schedule for <?= date("Y-m-d");?></a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Master</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VLogo"); ?>">Company Logo</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VClient"); ?>">Client Logo</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VCategory"); ?>">Create Category</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VBranch"); ?>">Branch's</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPreBooking"); ?>">Pre Booking</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VArea"); ?>">Add Area</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VType"); ?>">Add Type</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VCertificate"); ?>">Add Certificate</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSliders"); ?>">Add Slider Images</a></li>
                                <li><a target="_blank" href="/<?php echo $obj->encdata("FM") . ".php"; ?>">File Manage</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VAreasServed"); ?>">Areas Served</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VMenu"); ?>" >Menu</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPrise"); ?>">Pest Control Prise</a></li>

                            </ul>
                        </li>

                        <!--                        <li class="treeview">
                                                    <a href="#"><i class="fa fa-link"></i> <span>Gallery Images</span> <i class="fa fa-angle-left pull-right"></i></a>
                                                    <ul class="treeview-menu">
                                                        <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VCreateEvent"); ?>">Event Photo</a></li>
                                                        <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewEventPhotos"); ?>">View Event</a></li>
                                                        <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VBulkofPhotoUploadView"); ?>">Photo Gallery</a></li>
                                                        <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VViewPhotoGallery"); ?>">View Gallery</a></li>
                                                    </ul>
                                                </li>-->
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Post</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPostGUI"); ?>" >Add Post</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VPostDataTable"); ?>" >Edit Post</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Video</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSingleVideo"); ?>" >YouTube Vide</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Career</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VJobList"); ?>" >Post Vacancies</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VJobApplication"); ?>" >Job Applications</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Subscription</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSub"); ?>" >Subscription list</a></li>
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VSendSub"); ?>" >Send Subscription </a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Testimonials</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VTestimonials"); ?>" >Testimonials</a></li>

                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#"><i class="fa fa-asterisk"></i> <span>Incoming Call Request</span> <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li><a href="/?r=<?php echo $obj->encdata("C_OpenLink") . "&v=" . $obj->encdata("VCall"); ?>" >Call Request</a></li>
                            </ul>
                        </li>
                    </ul><!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">

                <!-- Content Header (Page header) -->

                <div id="msg" style="position: fixed; z-index: 900; margin-left: 300px; width: 300px;">

                    <?php
                    if (!empty($_SESSION["msg"])) {
                        // echo '<div class="col-lg-4 col-lg-offset-4">';
                        echo $_SESSION["msg"];
                        //echo "</div>";
                        $_SESSION["msg"] = "";
                    }
                    ?>

                </div>

                <div id="main">

                </div>

