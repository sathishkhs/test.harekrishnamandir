	
<style>
.bg-image-he{
  padding-top: 10px;
    padding-bottom: 10px;
    background-size: contain;
    background-repeat: no-repeat;}
.page-title{
    background-color:transparent;
}
.layer-overlay.overlay-dark-3::before{
    background-color: transparent;
}
  @media (min-width: 1628px){
      .bg-image-he
{ background-position: right center !important;
    height:460px;
}  
      
  }
@media (max-width: 1628px){
    .bg-image-he{
         background-position: right center !important;
            height: 500px;
            background-repeat: no-repeat;
    }
}
@media (max-width: 1328px){
    .bg-image-he{
         background-position: right center !important;
            height: 440px;
    }
}
@media (max-width: 1028px){
    .bg-image-he{
         background-position: right center !important;
            height: 320px;
    }
}
@media (max-width: 780px){
  .bg-image-he{
    background-position: right center !important;
    height: 230px;
  }
@media (max-width: 380px){
  .bg-image-he{
    background-position: right center !important;
    height: 200px;
  }
  
</style>
	<?php if ( !empty($page_items->display_image) && $page_items->display_image == 1  && file_exists((BANNER_IMAGE_PATH . $page_items->banner_image))) { ?>
	<section class="page-title layer-overlay overlay-dark-3 section-typo-light bg-img-center bg-image-he" data-tm-bg-img="<?php echo BANNER_IMAGE_PATH . $page_items->banner_image; ?>" style="background-image: url(&quot;<?php echo BANNER_IMAGE_PATH . $page_items->banner_image; ?>&quot;);">
      <div class="container ">
        <div class="section-content">
  <div class="row">
            <div class="col-md-12 text-center">
    <!--          <h2 class="title"><?php  echo $page_heading; ?></h2>-->
    <!--          <nav class="breadcrumbs" role="navigation" aria-label="Breadcrumbs">-->
    <!--            <div class="breadcrumbs">-->
				<!--<?php echo $breadcrumb; ?>-->
              
    <!--            </div>-->
    <!--          </nav>-->
            </div>
          </div>
        
        </div>
      </div>
    </section>
	<?php } ?>



