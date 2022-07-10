<?php
	require_once 'includes/header.php';
?>
				<!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li>
                                        <a href="#">EVENT MANAGEMENT</a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url('welcome/vendor_products');?>">EVENTS</a>
                                    </li>
                                    <li class="active">
                                        EDIT EVENT
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">EDIT EVENT</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-12 he-ad">
                                <div class="col-md-6 fol-low">
                                    <h4 class="m-t-0 header-title"><b>Edit Event</b></h4>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <!-- Event added success message -->
                                <?php
                                    if($this->session->flashdata('pro_success_msg')):
                                ?>
                                <h5 class="text-success"><?php echo $this->session->flashdata('pro_success_msg');?></h5>
                                <?php
                                    endif;
                                ?>

                                <!-- Event image upload failed error message -->
                                <?php
                                    if($this->session->flashdata('pro_image_err_msg')):
                                ?>
                                <h5 class="text-danger"><?php echo $this->session->flashdata('pro_image_err_msg');?></h5>
                                <?php
                                    endif;
                                ?>

                                <!-- Something went wrong while add Event error message -->
                                <?php
                                    if($this->session->flashdata('pro_went_wrong_msg')):
                                ?>
                                <h5 class="text-danger"><?php echo $this->session->flashdata('pro_went_wrong_msg');?></h5>
                                <?php
                                    endif;
                                ?>
                            </div>
                            <div class="col-md-12">
                                <form action="<?php echo base_url('welcome/edit_product_action/').$single_product->pro_id;?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="control-label" for="date">Name</label>
                                                <input type="text" class="form-control" name="pro_name" id="pro_name" value="<?php echo $single_product->pro_name;?>" placeholder="Event name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group clearfix">
                                                <label class="control-label" for="date">Description</label>
                                                <textarea class="form-control" name="pro_description" id="pro_description" rows="4" placeholder="Event description" required><?php echo $single_product->pro_description;?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group clearfix">
                                                <label class="control-label" for="pro_from_date">From Date</label>
                                                <input type="text" class="form-control datepickr" placeholder="yyyy-mm-dd H:i:s" value="<?php echo $single_product->pro_from_date;?>" name="pro_from_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group clearfix">
                                                <label class="control-label" for="pro_to_date">To Date</label>
                                                <input type="text" class="form-control datepickr" placeholder="yyyy-mm-dd H:i:s" value="<?php echo $single_product->pro_to_date;?>" name="pro_to_date">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group clearfix">
                                                <label class="control-label" for="date">Price</label>
                                                <input type="text" class="form-control" value="<?php echo $single_product->pro_price;?>" name="pro_price" id="pro_price" placeholder="Event price" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group clearfix">
                                                        <label class="control-label" for="date">Featured Image</label>
                                                        <input type="file" class="form-control" name="pro_image" id="pro_image"  accept="image/png, image/jpeg">
                                                    </div>  
                                                </div>
                                                <div class="col-md-4">
                                                    <img src="<?php echo base_url('upload/products/').$single_product->pro_image;?>" class="img-thumbnail " alt="<?php echo $single_product->pro_name;?>" width="100" height="90"> 
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </form> 
                            </div>
                        </div>
                    </div>
                </div>

<!-- Add Event Modal -->
<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="<?php echo base_url('welcome/add_product');?>" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="addProductLabel">Add Event</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group clearfix">
                                <input type="hidden" name="pro_vendor_id" value="<?php echo $_SESSION['vendor_id'];?>">
                                <label class="control-label" for="date">Name</label>
                                <input type="text" class="form-control" name="pro_name" id="pro_name" placeholder="Event name" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group clearfix">
                                <label class="control-label" for="date">Description</label>
                                <textarea class="form-control" name="pro_description" id="pro_description" rows="4" placeholder="Event description" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label class="control-label" for="pro_from_date">From Date</label>
                                <input type="text" class="form-control datepickr" placeholder="yyyy-mm-dd H:i:s" name="pro_from_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label class="control-label" for="pro_to_date">To Date</label>
                                <input type="text" class="form-control datepickr" placeholder="yyyy-mm-dd H:i:s" name="pro_to_date">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label class="control-label" for="date">Price</label>
                                <input type="text" class="form-control" name="pro_price" id="pro_price" placeholder="Event price" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group clearfix">
                                <label class="control-label" for="date">Featured Image</label>
                                <input type="file" class="form-control" name="pro_image" id="pro_image"  accept="image/png, image/jpeg" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
	require_once 'includes/footer.php';
?>