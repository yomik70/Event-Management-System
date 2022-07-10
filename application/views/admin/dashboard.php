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
                                        DASHBOARD
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">DASHBOARD</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-12 he-ad">
                                <div class="col-md-6 fol-low">
                                    <h4 class="m-t-0 header-title"><b>Today's Vendors</b></h4>
                                </div>
                               
                            </div>
                            <table id="" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>SR. NO.</th>
                                        <th>NAME</th>
                                        <th>CONTACT</th>
                                        <th>ADDRESS</th>
                                        <th>DATE TIME</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                    <tr>
                                        <td class="text-center">1</td>
                                        <td>dsdsds</td>
                                        <td>dsds</td>
                                       	<td>dsdsds</td>
                                        <td>dsdsds</td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('leads/statusupdate/');?>"><i class="fa fa-edit ic-on" title="Update Status"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
<?php
	require_once 'includes/footer.php';
?>