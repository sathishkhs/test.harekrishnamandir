
<?php if (!empty($banners)) { ?>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators ">
    <?php $count = count($banners);  
    for($i=0; $i < $count; $i++ ){ ?>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i;?>" class="carousel-indicators-round <?php echo ($i == 0) ? 'active' : '' ?>" aria-current="true" aria-label="Slide 1"></button>
    <?php } ?>
    <!-- <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
  </div>
  <div class="carousel-inner">
  <?php foreach ($banners as $key => $banner) {  ?>
    <div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ?>">
      <a href="<?php echo !empty($banner->image_redirect_url) ? $banner->image_redirect_url : '' ?>">
      <img src="<?php echo BANNER_IMAGE_PATH.$banner->banner_background_img_path; ?>" class="d-block w-100" alt="...">
      </a>
    </div>
   
    <?php }
  } else { ?>
    <div class="carousel-item <?php echo ($key == 0) ? 'active' : '' ?>">
      <a href="donate">
      <img src="assets/images/bg/slide1.jpg" class="d-block w-100" alt="...">
      </a>
    </div> 
    <?php } ?>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
