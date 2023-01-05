<div class="container mt-30">
        <div class="section-content">
          <div class="row">

          <?php if(empty($galleries)){ ?>
            <div class="col-md-12">
            <div class="title-wrapper mb-1 text-center">
              <!-- <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6> -->
              <h2 class="title mb-0">No Galleries Found</h2>
            </div>
            </div>
          <?php }else{ ?>

            <div class="col-md-12">
            
            <div class="title-wrapper mb-1 text-center">
              <!-- <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6> -->
              <h2 class="title mb-0 text-theme-colored1">Gallery</h2>
            </div>
              <!-- Isotope Gallery Grid -->
              <div id="gallery-holder-618422" class="isotope-layout grid-3 gutter-15 clearfix lightgallery-lightbox">
                <div class="isotope-layout-inner" style="position: relative; height: 1074.03px;">
                  <!-- Isotope Item Start -->
                  <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <?php foreach($galleries as $gallery){ ?>
                        <div class="isotope-item cat1 cat3" style="position: absolute; left: 0px; top: 0px;">
                          <div class="isotope-item-inner">
                            <div class="product">
                              <div class="product-header">
                                <!-- <span class="onsale">Sale!</span> -->
                                <div class="thumb image-swap">
                                  <a href="<?php echo 'custom_page/gallery_categories/'.$gallery->gallery_id; ?>"><img src="<?php echo GALLERY_IMG_UPLOAD_PATH . $gallery->gallery_img; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="<?php echo $gallery->gallery_name; ?>"></a>
                                  <a href="<?php echo $gallery->page_slug; ?>"><img src="<?php echo GALLERY_IMG_UPLOAD_PATH . $gallery->gallery_img; ?>" width="300" height="300" class="product-hover-image img-responsive img-fullwidth" alt="<?php echo $gallery->gallery_name; ?>"></a>
                                  <!-- <a href="<?php echo $gallery->page_slug; ?>"><img src="<?php echo GALLERY_IMG_UPLOAD_PATH . $gallery->gallery_img; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="<?php echo $gallery->gallery_name; ?>"></a>
                                  <a href="<?php echo $gallery->page_slug; ?>"><img src="<?php echo GALLERY_IMG_UPLOAD_PATH . $gallery->gallery_img; ?>" class="product-hover-image img-responsive img-fullwidth" alt="<?php echo $gallery->gallery_name; ?>"></a> -->
                                </div>
                               
                              </div>
                              <div class="product-details">
                                
                                <h5 class="product-title"><a href="<?php echo $gallery->page_slug; ?>"><?php echo $gallery->gallery_name; ?></a></h5>
                               
                              </div>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

                    </div>
                  </div>
               

                </div>
              </div>
              <!-- End Isotope Gallery Grid -->
            </div>
          <?php } ?>
          </div>
        </div>
      </div>
      
  