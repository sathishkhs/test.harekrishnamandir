<div class="container mt-30">
  <div class="section-content">
    <div class="row">

      <?php if (empty($galleries)) { ?>
        <div class="col-md-12">
          <div class="title-wrapper mb-1 text-center">
            <!-- <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6> -->
            <h2 class="title mb-0">No Galleries Found</h2>
          </div>
        </div>
      <?php } else { ?>

        <div class="col-md-12">
          <div class="title-wrapper mb-1 text-center">
            <h6 class="subtitle line-shape-bottom line-shape-center text-theme-colored1">Gallery</h6>
            <!-- <h2 class="title mb-0">Gallery</h2> -->
          </div>

          <!-- Isotope Gallery Grid -->
          <div id="" class="">
            <div class="container " >
              <!-- Isotope Item Start -->
              <div class="row">
                <?php foreach ($galleries as $gallery) { ?>
                  <div class="col-sm-12 col-md-6 col-lg-4 my-4">
                    <div class="card ">
                      <a href="<?php echo 'gallery/gallery_images/' . $gallery->gallery_id . '/' . $gallery->category_id; ?>"><img src="<?php echo GALLERY_UPLOAD_PATH . $gallery->category_img_path; ?>" class="card-img-top" alt="<?php echo $gallery->gallery_name; ?>" style="object-fit: cover;"></a>
                      <div class="card-body">
                        <a href="<?php echo 'gallery/gallery_images/' . $gallery->gallery_id . '/' . $gallery->category_id; ?>">
                          <h5 class="card-title"><?php echo $gallery->gallery_name; ?></h5>
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