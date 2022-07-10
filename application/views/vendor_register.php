<?php
  require_once 'includes/header.php';
?>
<div class="main">
        <section class="module bg-dark-30">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt mb-0">Become a vendor</h1>
              </div>
            </div>
          </div>
        </section>
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-2"></div>
              <!-- Vendor Login Starts -->
              <div class="col-sm-4">
                <h4 class="font-alt">Login as a vendor</h4>
                <hr class="divider-w mb-10">
                <?php
                    if($this->session->flashdata('v_login_err_msg')):
                ?>
                <h5 class="text-danger"><?php echo $this->session->flashdata('v_login_err_msg');?></h5>
                <?php
                    endif;
                ?>
                <form class="form" action="<?php echo base_url('welcome/vendor_login_action');?>" method="post">
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_email');?></span>
                    <input class="form-control" id="vendor_email" type="email" name="vendor_email" placeholder="Vendor email"  value="<?php echo set_value('vendor_email');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_password');?></span>
                    <input class="form-control" id="vendor_password" type="password" name="vendor_password" placeholder="Enter Password" value="<?php echo set_value('vendor_password');?>" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-round btn-b">Login</button>
                  </div>
                </form>
              </div>
              <!-- /Vendor Login Ends -->
              <!-- Vendor Register Starts -->
              <div class="col-sm-4">
                <h4 class="font-alt">Register as a vendor</h4>
                <hr class="divider-w mb-10">
                <?php
                    if($this->session->flashdata('v_reg_success_msg')):
                ?>
                <h5 class="text-success"><?php echo $this->session->flashdata('v_reg_success_msg');?></h5>
                <?php
                    endif;
                ?>
                <form class="form" action="<?php echo base_url('welcome/vendor_register_action');?>" method="post">
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_name');?></span>
                    <input class="form-control" id="vendor_name" type="text" name="vendor_name" placeholder="Vendor name" value="<?php echo set_value('vendor_name');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_address');?></span>
                    <textarea class="form-control" id="vendor_address" name="vendor_address" placeholder="Vendor address" rows="5" ><?php echo set_value('vendor_address');?></textarea>
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_description');?></span>
                    <textarea class="form-control" id="vendor_description" name="vendor_description" placeholder="Vendor description" rows="5" ><?php echo set_value('vendor_description');?></textarea>
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_email');?></span>
                    <input class="form-control" id="vendor_email" type="email" name="vendor_email" placeholder="Vendor email"  value="<?php echo set_value('vendor_email');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_password');?></span>
                    <input class="form-control" id="vendor_password" type="password" name="vendor_password" placeholder="Enter Password" value="<?php echo set_value('vendor_password');?>" />
                  </div>
                  <div class="form-group">
                    <span class="text-danger"><?php echo form_error('vendor_cpassword');?></span>
                    <input class="form-control" id="vendor_cpassword" type="password" name="vendor_cpassword" placeholder="Re-enter Password" value="<?php echo set_value('vendor_cpassword');?>" />
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-block btn-round btn-b">Register</button>
                  </div>
                </form>
              </div>
              <!-- /Vendor Register Ends -->
            </div>
          </div>
        </section>
<?php
  require_once 'includes/footer.php';
?>