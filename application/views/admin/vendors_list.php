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
                                        <a href="<?php echo base_url('api/leads/dashboard');?>">EVENT MANAGEMENT</a>
                                    </li>
                                    <li class="active">
                                        VENDORS LIST
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">VENDORS LIST</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-12 he-ad">
                                <div class="col-md-6 fol-low">
                                    <h4 class="m-t-0 header-title"><b>Vendors</b></h4>
                                </div>
                               
                            </div>
                            <?php
                            if(isset($vendors) && !empty($vendors)):
                            ?>
                            <table id="" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>SR. NO.</th>
                                        <th>VENDOR NAME</th>
                                        <th>VENDOR ADDRESS</th>
                                        <th>VENDOR DESCRIPTION</th>
                                        <th>VENDOR EMAIL</th>
                                        <th>STATUS</th>
                                        <th>ADDED AT</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <?php
                                    $i = 1;
                                    foreach($vendors as $vendor):
                                    ?>
                                    <tr>
                                        <td><?php echo $i;?></td>
                                        <td><?php echo $vendor['vendor_name'];?></td>
                                        <td><?php echo $vendor['vendor_address'];?></td>
                                        <td><?php echo $vendor['vendor_description'];?></td>
                                        <td><?php echo $vendor['vendor_email'];?></td>
                                        <td>
                                            <input class="change_vendor_sts" value="<?php echo $vendor['vendor_id'];?>" type="checkbox" <?php echo ($vendor['vendor_status']=='1')?"checked":"";?> data-toggle="toggle" data-on="Active" data-off="Inactive" data-onstyle="success" data-offstyle="danger" data-width="80" data-height="30">
                                        </td>
                                        <td><?php echo $vendor['vendor_addedat'];?></td>
                                        <td class="text-center">
                                             <a href="<?php echo base_url('welcome/vendor_delete/').$vendor['vendor_id'];?>"><i class="fa fa-trash ic-on" title="Delete vendor"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                    endforeach;
                                    ?>
                                </tbody>
                            </table>
                            <?php
                            else:
                            ?>
                            <h5 class="m-t-0 text-muted">No vendors found.</h5>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>
<?php
	require_once 'includes/footer.php';
?>