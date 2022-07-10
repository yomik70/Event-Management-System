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
                                    <li class="active">
                                        PRODUCTS
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">VENDOR'S PRODUCTS</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-12 he-ad">
                                <div class="col-md-6 fol-low">
                                    <h4 class="m-t-0 header-title"><b>Products</b></h4>
                                </div>
                            </div>

                            <?php
                            if(isset($products) && !empty($products)):
                            ?>
                            <table id="" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>SR. NO.</th>
                                        <th>Product Name</th>
                                        <th>Featured Image</th>
                                        <th>Price</th>
                                        <th>Vendor</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>Status</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach($products as $product):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $sr;?></td>
                                        <td><?php echo $product['pro_name'];?></td>
                                        <td>
                                            <img src="<?php echo base_url('upload/products/').$product['pro_image'];?>" class="img-thumbnail " alt="<?php echo $product['pro_name'];?>" width="100" height="90">  
                                        </td>
                                        <td><?php echo $product['pro_price'];?></td>
                                        <td>
                                        <?php
                                        $vendor_data = $this->Seller_model->get_data("tbl_vendor","vendor_id",$product['pro_vendor_id']);
                                        echo $vendor_data->vendor_name;
                                        ?> 
                                        </td>
                                        <td>
                                        <?php
                                            if($product['pro_from_date']!=='0000-00-00'){
                                                echo $product['pro_from_date'];
                                            }
                                        ?>        
                                        </td>
                                        <td>
                                        <?php
                                            if($product['pro_to_date']!=='0000-00-00'){
                                                echo $product['pro_to_date'];
                                            }
                                        ?>    
                                        </td>
                                        <td>
                                            <input class="change_product_sts" value="<?php echo $product['pro_id'];?>" type="checkbox" <?php echo ($product['pro_status']=='1')?"checked":"";?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="80" data-height="30">

                                            <!-- <?php echo ($product['pro_status']=='1')?"Active":"Inactive";?> -->
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('welcome/delete_product/').$product['pro_id'];?>"><i class="fa fa-trash ic-on" title="Delete product"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $sr++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            else:
                            ?>
                            <h5 class="m-t-0 text-muted">No products found.</h5>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

<?php
	require_once 'includes/footer.php';
?>