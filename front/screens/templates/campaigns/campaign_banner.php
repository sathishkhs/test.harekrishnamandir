	
<style>
.bg-image-he{
  padding-top: 10px;
    padding-bottom: 10px;
    background-size: cover;
    height: 450px;
}
</style>
	<?php if ($page_items->display_image == 1 && !empty($page_items->display_image) && file_exists((BANNER_IMAGE_PATH . $page_items->banner_image))) { ?>
	<section class="page-title layer-overlay overlay-dark-3 section-typo-light bg-img-center bg-image-he" data-tm-bg-img="<?php echo BANNER_IMAGE_PATH . $page_items->banner_image; ?>" style="background-image: url(&quot;<?php echo BANNER_IMAGE_PATH . $page_items->banner_image; ?>&quot;);">
      <div class="container ">
        <div class="section-content">
        
        </div>
      </div>
    </section>
	<?php } ?>

  <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title"><?php  echo $page_heading; ?></h2>
              <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">
                <div class="breadcrumbs">
				<?php echo $breadcrumb; ?>
              
                </div>
              </nav>
            </div>
          </div>
