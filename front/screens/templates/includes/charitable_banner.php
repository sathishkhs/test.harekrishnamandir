<?php if ($page_items->display_image == 1 && !empty($page_items->display_image) && file_exists((CHARITABLE_PROGRAM_BANNER_PATH . $page_items->banner))) { ?>
    
    
    <section class="container-fluid m-0 p-0" >
        <img src="<?php echo CHARITABLE_PROGRAM_BANNER_PATH . $page_items->banner; ?>" class="w-100 img-fluid img-responsive">   

    </section>
<?php } ?>
