<?php
    if(!isset($_SESSION['vendor_id'])){
        header('Location:'.base_url('welcome/vendor_login'));
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Coderthemes">
        <title>EVENT MANAGEMENT - Home</title>
        <link href="<?php echo base_url('assets/admin/')?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/menu.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/crm.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>js/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!--Datepicker files-->
        <link href="<?php echo base_url('assets/admin/')?>css/datepickr.min.css" rel="stylesheet" type="text/css" />
        <!--Datetimepicker files-->
        <link href="<?php echo base_url('assets/')?>css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
        
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    </head>
    <body>
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">
                    <div class="logo">
                        <a href="<?php echo base_url('welcome/vendor_dashboard');?>" class="logo">
                            <img src="<?php echo base_url('assets/admin/')?>image/logo.png" alt="" height="50">
                            <h2 class="uvk-head">SELLER APP</h2>
                        </a>
                    </div>
                    <div class="menu-extras">
                        <ul class="nav navbar-nav navbar-right pull-right">

                            <li class="dropdown navbar-c-items">
                                <a href="#" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo base_url('assets/admin/')?>image/profile.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h5>Welcome, <?php echo $_SESSION['name'];?></h5>
                                    </li>
                                    <li><a href="<?php echo base_url('welcome/vendor_logout');?>"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>

                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                            <!-- <li class="has-submenu">
                                <a href="<?php echo base_url('welcome/vendor_dashboard');?>"><i class="mdi mdi-view-dashboard"></i>Dashboard</a>
                            </li> -->
                            <li class="has-submenu">
                                <a href="<?php echo base_url('welcome/vendor_products');?>"><i class="mdi mdi-view-dashboard"></i>Events</a>
                            </li>
                            <li class="has-submenu">
                                <a href="<?php echo base_url('welcome/vendor_bookings');?>"><i class="mdi mdi-view-dashboard"></i>Bookings</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="wrapper">
            <div class="container">