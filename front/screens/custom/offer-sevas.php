<section style="background: #ececeb;">
  <div class="container pt-30">
    <div class="tm-sc-section-title section-title text-center mb-50">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6>
            <h2 class="title mb-0">Charitable Sevas</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content position-relative z-index-1">
      <div class="row">
      <?php if(!empty($charitable_programs) || !empty($festivals)){ 
        foreach($charitable_programs as $program){  ?>
        <div class="col-md-6 col-lg-4 mb-20">
          <div class="causes-item-current-style1 h-100">
            <div class="causes-item mb-lg-30 h-100 bg-white">
              <div class="causes-thumb">
                <img src="<?php echo CHARITABLE_PROGRAM_BANNER_PATH . $program->thumbnail; ?>" alt="Image" class="w-100" style="height:300px; object-fit:cover">
                <a href="<?php echo $program->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details  h-100">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title mb-1"><a href="<?php echo $program->page_slug; ?>"><?php echo $program->title; ?></a></h6>
                <p class="mt-15"><?php echo strip_tags(substr($program->left_description, 0, 150)) . '...'; ?></p> 
                <!-- <a href="<?php echo $program->page_slug; ?>" class="btn btn-default btn-primary btn-theme-colored mt-10 font-16 btn-sm">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> -->
              </div>

            </div>
          </div>
        </div>
        <?php }

        foreach($festivals as $program){ ?>
      <div class="col-md-6 col-lg-4 mb-20">
          <div class="causes-item-current-style1 h-100">
            <div class="causes-item mb-lg-30 h-100 bg-white">
              <div class="causes-thumb">
                <img src="<?php echo FESTIVAL_BANNER_PATH . $program->thumbnail; ?>" alt="Image" class="w-100" style="height:300px; object-fit:cover">
                <a href="<?php echo $program->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details  h-100">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title mb-1"><a href="<?php echo $program->page_slug; ?>"><?php echo $program->title; ?></a></h6>
                <p class="mt-15"><?php echo strip_tags(substr($program->festival_description, 0, 150)) . '...'; ?></p> 
                <!-- <a href="<?php echo $program->page_slug; ?>" class="btn btn-default btn-primary btn-theme-colored mt-10 font-16 btn-sm">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> -->
              </div>

            </div>
          </div>
        </div>

      <?php   }
        } else {  ?>
          <h2 class=" text-center font-36">No Charitable Programs Created</h2>
        <?php } ?>

    
      

      </div>
    </div>
  </div>

</section>


<section style="background: #ececeb;">
  <div class="container pt-50">
    <div class="tm-sc-section-title section-title text-center mb-50">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6>
            <h2 class="title mb-0">Nitya Sevas</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content position-relative z-index-1">
      <div class="row">
    
      <?php if(!empty($nitya_sevas)){ foreach($nitya_sevas as $program){  ?>
        <div class="col-md-6 col-lg-4 mb-20">
          <div class="causes-item-current-style1 h-100">
            <div class="causes-item mb-lg-30 h-100 bg-white">
              <div class="causes-thumb">
                <img src="<?php echo CHARITABLE_PROGRAM_BANNER_PATH . $program->thumbnail; ?>" alt="Image" class="w-100" style="height:300px; object-fit:cover">
                <a href="<?php echo $program->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details  h-100">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title mb-1"><a href="<?php echo $program->page_slug; ?>"><?php echo $program->title; ?></a></h6>
                <p class="mt-15"><?php echo strip_tags(substr($program->left_description, 0, 150)) . '...'; ?></p> 
                <!-- <a href="<?php echo $program->page_slug; ?>" class="btn btn-default btn-primary btn-theme-colored mt-10 font-16 btn-sm">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> -->
              </div>

            </div>
          </div>
        </div>
        <?php }
        } else {  ?>
          <h2 class=" text-center font-36">No Charitable Programs Created</h2>
        <?php } ?>

    

      </div>
    </div>
  </div>

</section>


<section style="background: #ececeb;">
  <div class="container pt-50">
    <div class="tm-sc-section-title section-title text-center mb-50">
      <div class="row justify-content-md-center">
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
          <div class="title-wrapper mb-1">
          <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6>
            <!-- <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Join Us in The Service of Lord</h6> -->
            <h2 class="title mb-0">Festival Sevas</h2>
          </div>
        </div>
      </div>
    </div>
    <div class="section-content position-relative z-index-1">
      <div class="row">
      
      <?php if(!empty($featured_festivals)){ foreach($featured_festivals as $festival){  ?>
        <div class="col-md-6 col-lg-4 mb-20">
          <div class="causes-item-current-style1 h-100">
            <div class="causes-item mb-lg-30 h-100 bg-white">
              <div class="causes-thumb">
                <img src="<?php echo SEVA_PAGE_BANNER_PATH . $festival->seva_page_banner; ?>" alt="Image" class="w-100">
                <a href="<?php echo $festival->page_slug; ?>" class="btn btn-donate-now">Donate Now</a>
              </div>
              <div class="causes-details  h-100">
                <div class="donation-goal mb-1">
                  <!-- <div class="raised">Goal: <span class="text-theme-colored1 font-weight-500">3600.00 USD</span></div> -->
                </div>
                <h6 class="causes-title mb-1"><a href="<?php echo $festival->page_slug; ?>"><?php echo $festival->sevas_page_title; ?></a></h6>
                <p class="mt-15"><?php echo strip_tags(substr($festival->seva_page_desc_top, 0, 150)) . '...'; ?></p> 
                <!-- <a href="<?php echo $festival->page_slug; ?>" class="btn btn-default btn-primary btn-theme-colored mt-10 font-16 btn-sm">Offer Seva <i class="flaticon-charity-make-a-donation font-16 ml-5"></i></a> -->
              </div>

            </div>
          </div>
        </div>
        <?php }
        } else {  ?>
          <h2 class=" text-center font-36">No Festival Sevas Created</h2>
        <?php } ?>

      </div>
    </div>
  </div>

</section>





 

