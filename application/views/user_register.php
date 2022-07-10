<?php
  require_once 'includes/header.php';
?>
<div class="main">
        <section class="module bg-dark-30">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Login / Register</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-2"></div>
              <!-- User Login Starts -->
              <div class="col-sm-4">
                <h4 class="font-alt">Login as a user</h4>
                <hr class="divider-w mb-10">
                <?php
                    if($this->session->flashdata('u_login_err_msg')):
                ?>
                <h5 class="text-danger"><?php echo $this->session->flashdata('u_login_err_msg');?></h5>
                <?php
                    endif;
                ?>
                <form class="form" action="<?php echo base_url('welcome/user_login_action');?>" method="post">
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_login_email');?></span>
                    <input class="form-control" id="user_login_email" type="email" name="user_login_email" placeholder="User email"  value="<?php echo set_value('user_login_email');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_login_password');?></span>
                    <input class="form-control" id="user_login_password" type="password" name="user_login_password" placeholder="Enter Password" value="<?php echo set_value('user_login_password');?>" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-round btn-b">Login</button>
                  </div>
                </form>
              </div>
              <!-- /User Login Ends -->
              <!-- User Register Starts -->
              <div class="col-sm-4">
                <h4 class="font-alt">Register as a user</h4>
                <hr class="divider-w mb-10">
                <?php
                    if($this->session->flashdata('u_reg_success_msg')):
                ?>
                <h5 class="text-success"><?php echo $this->session->flashdata('u_reg_success_msg');?></h5>
                <?php
                    endif;
                ?>
                <form class="form" action="<?php echo base_url('welcome/user_register_action');?>" method="post">
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_name');?></span>
                    <input class="form-control" id="user_name" type="text" name="user_name" placeholder="User name" value="<?php echo set_value('user_name');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_email');?></span>
                    <input class="form-control" id="user_email" type="email" name="user_email" placeholder="User email"  value="<?php echo set_value('user_email');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_password');?></span>
                    <input class="form-control" id="user_password" type="password" name="user_password" placeholder="Enter Password" value="<?php echo set_value('user_password');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('user_cpassword');?></span>
                    <input class="form-control" id="user_cpassword" type="password" name="user_cpassword" placeholder="Re-enter Password" value="<?php echo set_value('user_cpassword');?>" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-round btn-b">Register</button>
                  </div>
                </form>
              </div>
              <!-- /User Register Ends -->
            </div>
          </div>
        </section>
<?php
  require_once 'includes/footer.php';
?>