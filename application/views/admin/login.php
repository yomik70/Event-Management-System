<?php
    if(isset($_SESSION['admin_id'])){
        header('Location:'.base_url('welcome/admin_dashboard'));
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <title>Admin Login | Seller</title>
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
                                            <h2 class="uvk-head-logo"> Admin Login</h2>
                                        </a>
                                    </h2>
                                </div>
                                <div class="account-content">
                                    <?php
                                        if(isset($err_msg)):
                                    ?>
                                    <span class="text-danger"><?php echo $err_msg;?></span>
                                    <?php
                                        endif;
                                    ?>
                                    <form class="form-horizontal" action="<?php echo base_url('welcome/admin_login_action');?>" method="post">
                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <span class="text-danger"><?php echo form_error('email');?></span>
                                                <input class="form-control" type="email" name="email" placeholder="Username" value="<?php echo set_value('email');?>">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <span class="text-danger"><?php echo form_error('password');?></span>
                                                <input class="form-control" type="password" name="password" placeholder="Password" value="<?php echo set_value('password');?>">
                                            </div>
                                        </div>
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <input type="submit" value="Log In" class="btn w-md btn-bordered btn-danger waves-effect waves-light">
                                            </div>
                                        </div>
                                    </form>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>