<?php //echo '<pre>' ; print_r($festivals); ?>
<section style="background: #ececeb;">
  <div class="container pt-10">
    <div class="tm-sc-section-title section-title text-center mb-30">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6>
            <h2 class="title mb-0">Offer Seva</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content position-relative z-index-1">
        <div class="container">
      <div class="row">
      <?php if (!empty($festivals)) {
          foreach ($festivals as $festival) { ?>
        <div class="col-md-6 col-lg-4 mb-20 ">
          <div class="causes-item-current-style1 h-100">
            <div class="causes-item mb-lg-30 h-100 bg-white">
              <div class="causes-thumb">
                <img src="<?php echo FESTIVAL_BANNER_PATH . $festival->festival_banner; ?>" alt="Image" class="w-100">
                <a href="<?php echo $festival->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details  h-100">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title mb-1"><a href="<?php echo $festival->page_slug; ?>"><?php echo $festival->festival_title; ?></a></h6>
                <p class="mt-15"><?php echo substr($festival->festival_description, 0, 150) . '...'; ?></p> 
              
              </div>

            </div>
          </div>
        </div>
        <?php }
        } else {  ?>
          <h2 class=" text-center font-36">No Festivals Created</h2>
        <?php } ?>

      </div>
      </div>
    </div>
  </div>

</section>




