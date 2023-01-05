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
        <form class="form-horizontals" method="post" id="gallery_video_form" name="gallery_video_form" action="gallery/gallery_video_save" enctype="multipart/form-data">
            <input type="hidden" name="gallery_video_id" value="<?php echo (!empty($query->gallery_video_id)) ? $query->gallery_video_id : "" ?>" />
            <div class="card-body">

                <div class="row">
                    
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="banner_top_text">Video Name</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <input type="text" name="video_name" id="video_name" class="form-control" placeholder="Video Name" value="<?php echo (!empty($query->video_name)) ? $query->video_name : '' ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="gallery_id">Select Video Gallery</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                       
                            <select name="video_gallery_id" id="video_gallery_id" class="form-control ">

                                <option value="">Select Video Gallery</option>

                                <?php foreach ($video_galleries as $row) : ?>

                                    <option value="<?php echo $row->video_gallery_id; ?>" <?php echo (!empty($query->video_gallery_id) && $row->video_gallery_id == $query->video_gallery_id) ? 'selected' : ''; ?>><?php echo $row->gallery_name; ?></option>

                                <?php endforeach ?>

                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    
                    <!-- <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="category_id">Select Category</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                        
                            <select name="category_id" id="category_id" class="form-control ">

                                <option value="">Select Category</option>

                                <?php foreach ($categories as $row) : ?>

                                    <option value="<?php echo $row->category_id; ?>" <?php echo (!empty($query->category_id) && $row->category_id == $query->category_id) ? 'selected' : ''; ?>><?php echo $row->category_name .' - '. $this->db->where('gallery_id',$row->gallery_id)->get('gallery')->row()->gallery_name; ?></option>

                                <?php endforeach ?>

                            </select>
                        </div>
                    </div> -->
                </div>
               

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="gallery_video_path">Add Video or Youtube link</label>
                        </div>
                    </div>
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <?php echo form_error('gallery_video_path'); ?>
                            <input type="file" name="gallery_video_path" id="gallery_video_path" placeholder="Gallery Video" value="<?php echo (!empty($query->gallery_video_path)) ? $query->gallery_video_path : '' ?>" <?php echo (!empty($query->gallery_video_id)) ? '' : 'data-validation="required"'; ?>>
                            <!-- <?php if (!empty($query->gallery_video_path) && file_exists('./' . GALLERY_UPLOAD_PATH . $query->gallery_video_path)) { ?><br />
                                <a href="<?php echo GALLERY_UPLOAD_PATH . $query->gallery_video_path; ?>" class="cboxElement" data-rel="colorbox">
                                    <img src="<?php echo GALLERY_UPLOAD_PATH . $query->gallery_video_path; ?>" width="50"></a>
                                <input type="hidden" name="gallery_video_path" value="<?php echo (!empty($query->gallery_video_path)) ? $query->gallery_video_path : ''; ?>" />
                            <?php } ?> -->
                            <?php if (!empty($query->gallery_video_path)) { ?>
                                <br />
                                <a href="gallery/removevideo/<?php echo $query->gallery_video_id; ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?>
                            <!-- <p class="image-dimention">Banner Image Size Should be 1350px width and 560px height.</p> -->
                        </div>
                    </div>
                    else
                    <div class="col-xs-5 col-sm-5 col-md-5">
                        <div class="form-group">
                            <input type="text" name="video_link" id="video_link" class="form-control" placeholder="Youtube Video Link" value="<?php echo (!empty($query->video_link)) ? $query->video_link : '' ?>">
                                <small>example: https://www.youtube.com/embed/9voeFtYr4 add /embed/ in between .com and video code</small>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-3 col-sm-3 col-md-3">
                        <div class="form-group">
                            <label for="gallery_video_path">Add Cover Image</label>
                        </div>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="form-group">
                            <?php echo form_error('video_cover_path'); ?>
                            <input type="file" name="video_cover_path" id="video_cover_path" placeholder="Gallery Video" value="<?php echo (!empty($query->video_cover_path)) ? $query->video_cover_path : '' ?>" <?php echo (!empty($query->video_cover_path)) ? '' : 'required data-validation="required"'; ?> >
                            <?php if (!empty($query->video_cover_path) && file_exists('./' . GALLERY_VIDEO_UPLOAD_PATH . $query->video_cover_path)) { ?><br />
                                <a href="<?php echo GALLERY_VIDEO_UPLOAD_PATH . $query->video_cover_path; ?>" class="cboxElement" data-rel="colorbox">
                                    <img src="<?php echo GALLERY_VIDEO_UPLOAD_PATH . $query->video_cover_path; ?>" width="50"></a>
                                <input type="hidden" name="video_cover_path" value="<?php echo (!empty($query->video_cover_path)) ? $query->video_cover_path : ''; ?>" />
                            <?php } ?>
                            <?php if (!empty($query->video_cover_path)) { ?>
                                <br />
                                <a href="gallery/removevideo/<?php echo $query->gallery_video_id; ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?>
                            <p class="image-dimention">Banner Image Size Should be 1350px width and 560px height.</p>
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