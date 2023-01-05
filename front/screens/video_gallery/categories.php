<div class="container mt-30">
        <div class="section-content">
          <div class="row">

          <?php if(empty($categories)){ ?>
            <div class="col-md-12">
            <div class="title-wrapper mb-1 text-center">
              <!-- <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6> -->
              <h2 class="title mb-0">No Galleries Found</h2>
            </div>
            </div>
          <?php }else{ ?>

            <div class="col-md-12">
            <div class="title-wrapper mb-1 text-center">
              <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Video Gallery</h6>
              <!-- <h2 class="title mb-0">Gallery</h2> -->
            </div>

              <!-- Isotope Gallery Grid -->
              <div id="gallery-holder-618422" class="isotope-layout grid-3 gutter-15 clearfix lightgallery-lightbox">
                <div class="isotope-layout-inner" style="position: relative; height: 1074.03px;">
                  <!-- Isotope Item Start -->
                  <div class="row">
                    <div class="col-sm-12 col-md-6 col-lg-4">
                      <?php foreach($categories as $gallery){  ?>
                        <div class="isotope-item cat1 cat3" style="position: absolute; left: 0px; top: 0px;">
                          <div class="isotope-item-inner">
                            <div class="product">
                              <div class="product-header">
                                <!-- <span class="onsale">Sale!</span> -->
                                <div class="thumb image-swap">
                                  <a href="<?php echo 'video_gallery/gallery_videos/'.$gallery->video_gallery_id; ?>"><img src="<?php echo GALLERY_VIDEO_UPLOAD_PATH . $gallery->gallery_video_img_path; ?>" class="product-main-image img-responsive img-fullwidth" width="300" height="300" alt="<?php echo $gallery->gallery_name; ?>"></a>
                                  <a href="<?php echo $gallery->page_slug; ?>"><img src="<?php echo GALLERY_VIDEO_UPLOAD_PATH . $gallery->gallery_video_img_path; ?>" class="product-hover-image img-responsive img-fullwidth" width="300" height="300" alt="<?php echo $gallery->gallery_name; ?>"></a>
                                
                                </div>
                               
                              </div>
                              <div class="product-details">
                                
                                <h5 class="product-title"><a href="<?php echo 'video_gallery/gallery_videos/'.$gallery->video_gallery_id; ?>"><?php echo $gallery->gallery_name; ?></a></h5>
                               
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
      
  