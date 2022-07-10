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
                                        BOOKINGS
                                    </li>
                                </ol>
                            </div>
                            <h4 class="page-title">All Bookings</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                 <div class="row">
                    <div class="col-sm-12">
                        <div class="card-box table-responsive">
                            <div class="col-md-12 he-ad">
                                <div class="col-md-6 fol-low">
                                    <h4 class="m-t-0 header-title"><b>Bookings</b></h4>
                                </div>
                            </div>

                            <?php
                            if(isset($bookings) && !empty($bookings)):
                            ?>
                            <table id="" class="table table-striped table-bordered ">
                                <thead>
                                    <tr>
                                        <th>SR. NO.</th>
                                        <th>Event Name</th>
                                        <th>Event Image</th>
                                        <th>Price</th>
                                        <th>Booking User</th>
                                        <th>From Date</th>
                                        <th>To Date</th>
                                        <th>OPTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $sr = 1;
                                    foreach($bookings as $booking):
                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $sr;?></td>
                                        <td><?php echo $booking['pro_name'];?></td>
                                        <td>
                                            <img src="<?php echo base_url('upload/products/').$booking['pro_image'];?>" class="img-thumbnail " alt="<?php echo $booking['pro_name'];?>" width="100" height="90">  
                                        </td>
                                        <td>&#8377; <?php echo $booking['pro_price'];?></td>
                                        <td><?php echo $booking['booking_user'];?></td>
                                        <td>
                                        <?php
                                            if($booking['book_from_date']!=='0000-00-00'){
                                                echo $booking['book_from_date'];
                                            }
                                        ?>        
                                        </td>
                                        <td>
                                        <?php
                                            if($booking['book_to_date']!=='0000-00-00'){
                                                echo $booking['book_to_date'];
                                            }
                                        ?>    
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo base_url('welcome/delete_booking/').$booking['book_id'];?>"><i class="fa fa-trash ic-on" title="Delete product"></i></a>
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
                            <h5 class="m-t-0 text-muted">No bookings found.</h5>
                            <?php
                            endif;
                            ?>
                        </div>
                    </div>
                </div>

<?php
  require_once 'includes/footer.php';
?>