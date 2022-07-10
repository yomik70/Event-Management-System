<?php
  require_once 'includes/header.php';
?>
      <div class="main">
        <section class="module">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h1 class="module-title font-alt">My Bookings</h1>
              </div>
            </div>
            <hr class="divider-w pt-20">
            <div class="row">
              <div class="col-sm-12">
                <?php
                if(isset($bookings) && !empty($bookings)):
                ?>
                <table class="table table-striped table-border checkout-table">
                  <tbody>
                    <tr>
                      <th class="hidden-xs">Event Image</th>
                      <th>Event Name</th>
                      <th>Event From Date</th>
                      <th>Event To Date</th>
                      <th class="hidden-xs">Price</th>
                      <th>Vendor</th>
                    </tr>
                    <?php
                    $bk_sr = 1;
                    foreach($bookings as $booking):
                    ?>
                    <tr>
                      <td class="hidden-xs">
                        <a href="<?php echo base_url('welcome/product_details/').$booking['book_pro_id'];?>">
                          <img src="<?php echo base_url('upload/products/').$booking['pro_image'];?>" alt="Accessories Pack"/>
                        </a>
                      </td>
                      <td>
                        <h5 class="product-title font-alt">
                          <?php echo $booking['pro_name'];?>
                        </h5>
                      </td>
                      <td>
                        <h5 class="product-title font-alt">
                          <?php echo $booking['book_from_date'];?>
                        </h5>
                      </td>
                      <td>
                        <h5 class="product-title font-alt">
                          <?php echo $booking['book_to_date'];?>
                        </h5>
                      </td>
                      <td class="hidden-xs">
                        <h5 class="product-title font-alt">&#8377; <?php echo $booking['pro_price'];?></h5>
                      </td>
                      <td>
                        <h5 class="product-title font-alt">
                        <?php
                        $vendor_data = $this->Seller_model->get_data("tbl_vendor","vendor_id",$booking['pro_vendor_id']);
                        echo $vendor_data->vendor_name;
                        ?>   
                        </h5>
                      </td>
                    </tr>
                    <?php
                    $bk_sr++;
                    endforeach;
                    ?>
                  </tbody>
                </table>

                <?php
                else:
                ?>
                <p>No Bookings yet.</p>
                <?php
                endif;
                ?>
              </div>
            </div>
          </div>
        </section>
<?php
  require_once 'includes/footer.php';
?>