<?php
    if(isset($_SESSION['vendor_id'])){
        header('Location:'.base_url('welcome/vendor_dashboard'));
    }
?>
<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Event Management</title>
    <!--  
    Stylesheets
    =============================================
    -->
    <!-- Default stylesheets-->
    <link href="<?php echo base_url('assets/')?>lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/animate.css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/owl.carousel/dist/<?php echo base_url('assets/')?>owl.carousel.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/owl.carousel/dist/<?php echo base_url('assets/')?>owl.theme.default.min.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="<?php echo base_url('assets/')?>lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Datepicker css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!--Datetimepicker files-->
    <link href="<?php echo base_url('assets/')?>css/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
    
    <!-- Main stylesheet and color file-->
    <link href="<?php echo base_url('assets/')?>css/style.css" rel="stylesheet">
    <link id="color-scheme" href="<?php echo base_url('assets/')?>css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="<?php echo base_url('');?>">Event Management</a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="<?php echo base_url('');?>"><i class="fa fa-home"></i> Home</a></li>
              
              
              <?php
              if(isset($_SESSION['user_id'])):
              ?> 
                <!-- If user is login -->
                <li><a href="<?php echo base_url('welcome/user_bookings')?>"><i class="fa fa-stop"></i> Your Bookings</a></li>
                <li><a href="<?php echo base_url('welcome/user_logout')?>"><i class="fa fa-sign-out"></i> Logout</a></li>
              <?php
              else:
              ?>
                <!-- if user is not login -->
                <li><a href="<?php echo base_url('welcome/user_register');?>"><i class="fa fa-sign-in"></i> Login / Register</a></li>
                <li><a href="<?php echo base_url('welcome/vendor_register');?>"><i class="fa fa-user"></i> Become a vendor</a></li>
              <?php
              endif;
              ?>
            </ul>
          </div>
        </div>
      </nav>