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
              <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6>
              <!-- <h2 class="title mb-0">Gallery</h2> -->
            </div>

              <!-- Isotope Gallery Grid -->
              <div id="" class=" gutter-15 clearfix ">
                <div class="container">
                  <!-- Isotope Item Start -->
                  <div class="row">
                  <?php foreach($categories as $gallery){  ?>
                  <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                    <div class="card ">
                    <a href="<?php echo 'gallery/show_gallery/'.$gallery->gallery_id.'/'.$gallery->category_id; ?>"><img src="<?php echo GALLERY_UPLOAD_PATH . $gallery->category_img_path; ?>" class="card-img-top" alt="<?php echo $gallery->category_name; ?>" style="object-fit: cover;"></a>
                      <div class="card-body">
                      <a href="<?php echo 'custom_page/show_gallery/'.$gallery->gallery_id; ?>">
                          <h5 class="card-title"><?php echo $gallery->category_name; ?></h5>
                        </a>
                      </div>
                    </div>
                  </div> 
                  <?php } ?>

                  </div>
               

                </div>
              </div>
              <!-- End Isotope Gallery Grid -->
            </div>

        <?php } ?>
          </div>
        </div>
      </div>
      
  


      
    <script>

$('.loadMore').loadMoreResults({
  displayedItems: 6
});
      </script>



