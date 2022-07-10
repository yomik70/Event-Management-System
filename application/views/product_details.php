<?php
	require_once 'includes/header.php';
?>

      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 mb-sm-40"><a class="gallery" href="#"><img src="<?php echo base_url('upload/products/').$single_product->pro_image;?>" alt="Single Product Image"/></a>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <div class="col-sm-12">
                    <h1 class="product-title font-alt"><?php echo $single_product->pro_name;?></h1>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-sm-12"><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star"></i></span><span><i class="fa fa-star star-off"></i></span><a class="open-tab section-scroll" href="#reviews">- 2 customer reviews</a>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-sm-12">
                    <div class="price font-alt"><span class="amount">&#8377; <?php echo $single_product->pro_price;?></span></div>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-sm-12">
                    <div class="description">
                      <p><?php echo $single_product->pro_description;?></p>
                    </div>
                  </div>
                </div>
                <div class="row mb-20">
                  <div class="col-sm-8">
                    <?php
                    if($this->session->flashdata('u_book_loginfirst_msg')):
                    ?>
                    <h5 class="text-danger"><?php echo $this->session->flashdata('u_book_loginfirst_msg');?></h5>
                    <?php
                        endif;
                    ?>
                    <?php
                    if($this->session->flashdata('u_book_success_msg')):
                    ?>
                    <h5 class="text-success"><?php echo $this->session->flashdata('u_book_success_msg');?></h5>
                    <?php
                        endif;
                    ?>
                    <form action="<?php echo base_url('welcome/book_product/').$single_product->pro_id;?>" method="post">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <span class="text-danger"><?php echo form_error('book_from_date');?></span>
                            <input class="form-control datepicker_input" id="book_from_date" type="text" name="book_from_date" placeholder="From Date"  value="<?php echo set_value('book_from_date');?>" />
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <span class="text-danger"><?php echo form_error('book_to_date');?></span>
                            <input class="form-control datepicker_input" id="book_to_date" type="text" name="book_to_date" placeholder="From Date"  value="<?php echo set_value('book_to_date');?>" />
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <h5><b>Online payment details</b></h5>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <span class="text-danger"><?php echo form_error('book_upi_id');?></span>
                            <input class="form-control" id="book_upi_id" type="text" name="book_upi_id" placeholder="UPI ID (eg. mobileNumber@UPI)"  value="<?php echo set_value('book_upi_id');?>" />
                          </div>
                        </div>
                        <div class="col-md-12">
                          <button type="submit" class="btn btn-lg btn-block btn-round btn-b">Book Now</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="row mt-70">
              <div class="col-sm-12">
                <ul class="nav nav-tabs font-alt" role="tablist">
                  <li class="active"><a href="#description" data-toggle="tab"><span class="icon-tools-2"></span>Description</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="description">
                    <p><?php echo $single_product->pro_description;?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

<?php
	require_once 'includes/footer.php';
?>