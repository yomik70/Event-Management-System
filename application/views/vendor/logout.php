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

        <title>SELLER - Logout</title>
        <link href="<?php echo base_url('assets/admin/')?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/core.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/components.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/pages.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/admin/')?>css/icons.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="bg-transparent">
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="wrapper-page">
                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box">
                                    <h2 class="text-uppercase">
                                        <a href="#" class="text-success">
                                            <span><img src="<?php echo base_url('assets/admin/')?>image/logo.png" alt="" height="40"></span>
                                            <h2 class="uvk-head-logo">SELLER APP</h2>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
                                    <div class="text-center m-b-20">
                                        <div class="m-b-20">
                                            <div class="checkmark">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 130.2 130.2">
                                                  <circle class="path circle" fill="none" stroke="#4bd396" stroke-width="6" stroke-miterlimit="10" cx="65.1" cy="65.1" r="62.1"/>
                                                  <polyline class="path check" fill="none" stroke="#4bd396" stroke-width="6" stroke-linecap="round" stroke-miterlimit="10" points="100.2,40.2 51.5,88.8 29.8,67.5 "/>
                                                </svg>
                                            </div>
                                        </div>

                                        <h3>See You Again !</h3>

                                        <p class="text-muted font-13 m-t-10"> You are now successfully sign out. </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-t-30">
                                <div class="col-sm-12 text-center">
                                    <p class="text-muted">Return to <a href="<?php echo base_url('welcome/vendor_login');?>" class="text-primary m-l-5 m-r-5"><b>Log In</b></a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>