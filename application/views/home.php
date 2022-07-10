<?php
	require_once 'includes/header.php';
?>
      <section class="home-section home-fade home-full-height" id="home">
        <div class="hero-slider">
          <ul class="slides">
            <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url('<?php echo base_url('assets/')?>images/shop/slider1.png');">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">Welcome to Event Management App</div>
                  <div class="font-alt mb-30 titan-title-size-4"> Book What you want</div>
                  <div class="font-alt mb-40 titan-title-size-1">Book events online</div><a class="section-scroll btn btn-border-w btn-round" href="#">Learn More</a>
                </div>
              </div>
            </li>
            <li class="bg-dark-30 bg-dark shop-page-header" style="background-image:url('<?php echo base_url('assets/')?>images/shop/slider2.png');">
              <div class="titan-caption">
                <div class="caption-content">
                  <div class="font-alt mb-30 titan-title-size-1">Event Management App presents</div>
                  <div class="font-alt mb-40 titan-title-size-4">Exclusive events</div><a class="section-scroll btn btn-border-w btn-round" href="#">Learn More</a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
      <div class="main">
        <section class="module-small">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt">Hurry Up!!! Get all your essentials here</h2>
              </div>
            </div>
            <div class="row multi-columns-row">
              <?php
              if(isset($products) && !empty($products)):
                foreach($products as $product):
              ?>
              <div class="col-sm-6 col-md-3 col-lg-3">
                <div class="shop-item">
                  <div class="shop-item-image"><img src="<?php echo base_url('upload/products/').$product['pro_image'];?>" alt="<?php echo $product['pro_name'];?>"/>
                    <div class="shop-item-detail"><a href="<?php echo base_url('welcome/product_details/').$product['pro_id'];?>" class="btn btn-round btn-b"><span class="icon-basket">View Details</span></a></div>
                  </div>
                  <h4 class="shop-item-title font-alt"><a href="<?php echo base_url('welcome/product_details/').$product['pro_id'];?>"><?php echo $product['pro_name'];?></a></h4>&#8377; <?php echo $product['pro_price'];?>
                </div>
              </div>
              <?php
                endforeach;
              else:
              ?>
              <h4 class="text-center">No events Found</h4>
              <?php
              endif;
              ?>
            </div>
          </div>
        </section>
        <section class="module title_patch">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt mb-0">Get Anything. Get what you want.</h2>
              </div>
            </div>
          </div>
        </section>
<?php
	require_once 'includes/footer.php';
?>