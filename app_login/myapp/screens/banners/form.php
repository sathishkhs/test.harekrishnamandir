	<div class="container">
		<div class="row">
			<div class="col-md-10 col-sm-12 mx-auto">
				<?php $msg = $this->session->flashdata('msg');
				if (!empty($msg['txt'])) : ?>
					<div class="alert alert-block alert-<?php echo $msg['type']; ?>">
						<button type="button" class="btn defalut" data-dismiss="alert">
							<i class="fa fa-times"></i>
						</button>
						<i class="<?php echo $msg['icon']; ?>"></i>
						<?php echo $msg['txt']; ?>
					</div>
				<?php endif ?>
			</div>
		</div>
	</div>
	<div class="card shadow mb-4">

    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h6>
    </div>
    <div class="card-body">
        <!-- Horizontal Form -->
        <form class="form-horizontals" method="post" id="banners_form" name="banners_form" action="master/banner_save" enctype="multipart/form-data">
            <input type="hidden" name="banner_id" value="<?php echo (!empty($query->banner_id)) ? $query->banner_id : "" ?>" />
            <div class="card-body">

                <div class="row">
                  
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_title">Banner Title</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="banner_title" id="banner_title" class="form-control" placeholder="Banner Title" value="<?php echo (!empty($query->banner_title)) ? $query->banner_title : '' ?>">
                        </div>
                    </div>
                </div>


                   <div class="row">
                        <div class="col-xs-3 col-sm-3 col-md-3">
                            <div class="form-group">
                                <label for="display_order">Display Order</label>
                            </div>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="text" name="display_order" id="display_order" class="form-control" placeholder="Display Order" value="<?php echo (!empty($query->display_order)) ? $query->display_order : '' ?>">
                            </div>
                        </div>
                    </div>
                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="image_redirect_url">Image Redirect URL</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="image_redirect_url" id="image_redirect_url" class="form-control" placeholder="Image Redirect Url" value="<?php echo (!empty($query->image_redirect_url)) ? $query->image_redirect_url : '' ?>">
                        </div>
                    </div>
                </div>
                

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_background_img_path">Banner Image</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('banner_background_img_path'); ?>
                            <input type="file" name="banner_background_img_path" id="banner_background_img_path" placeholder="Banner Image" value="<?php echo (!empty($query->banner_background_img_path)) ? $query->banner_background_img_path : '' ?>" <?php echo (!empty($query->banner_id)) ? '' : 'data-validation="required"'; ?>>
                            <?php if (!empty($query->banner_background_img_path) && file_exists('./' . BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path)) { ?><br />
                                <a href="<?php echo BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path; ?>" class="cboxElement" data-rel="colorbox">
                                    <img src="<?php echo BANNERS_PHOTO_UPLOAD_PATH . $query->banner_background_img_path; ?>" width="50"></a>
                                <input type="hidden" name="banner_background_img_path" value="<?php echo (!empty($query->banner_background_img_path)) ? $query->banner_background_img_path : ''; ?>" />
                            <?php } ?>
                            <?php if (!empty($query->banner_background_img_path)) { ?>
                                <br />
                                <a href="master/removeimg/<?php echo $query->banner_id; ?>">Remove Image</a>
                            <?php } ?>
                            <p class="image-dimention">Banner Image Size Should be 1585px width and 500px height.</p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="status_ind">Status</label>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <label class="radiobuttons"><input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                <span class="lbl">Publish</span></label>
                            &nbsp; &nbsp; &nbsp;&nbsp;
                            <label class="radiobuttons"><input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                <span class="lbl">Unpublish</span></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button class="btn btn-round btn-success" type="submit">
					<i class="fa fa-check"></i>
					Save
				</button>
                &nbsp; &nbsp; &nbsp;
                <button class="btn btn-round btn-danger" type="reset">
					<i class="fa fa-sync"></i>
					Reset
				</button>
                &nbsp; &nbsp; &nbsp;
                <a href="master/banners">
                    <button class="btn btn-warning btn-round" type="button">
                        <i class="fa fa-times"></i>Back</button></a>
            </div>

        </form>
    </div>

</div>