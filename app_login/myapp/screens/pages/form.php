<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title"><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h3>
                    </div>
                    <!-- Horizontal Form -->
                    <form class="form-horizontals" method="POST" id="pages_form" name="pages_form" action="master/pages_save" enctype="multipart/form-data">
                        <input type="hidden" name="page_id" id="page_id" value="<?php echo (!empty($query->page_id)) ? $query->page_id : "" ?>" />

                        <div class="card-body">

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="type_id">Page Type</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="type_id" id="type_id">
                                            <option value="">-- Template Type --</option>
                                            <?php foreach ($page_type as $row) : ?>
                                                <option value="<?php echo $row->type_id; ?>" <?php echo (!empty($query->type_id) && $row->type_id == $query->type_id) ? 'selected' : ''; ?>><?php echo $row->type_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="row" id="gallery-id" style='<?php echo !empty($query->page_id) && !empty($query->gallery_id) ? "" : "display:none";?>'>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="type_id">Select Gallery</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="gallery_id" id="gallery_id" disabled>
                                            <option value="">-- Select Gallery --</option>
                                            <?php foreach ($galleries as $row) : ?>
                                                <option value="<?php echo $row->gallery_id; ?>" <?php echo (!empty($query->gallery_id) && $row->gallery_id == $query->gallery_id) ? 'selected' : ''; ?>><?php echo $row->gallery_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row" id="video-gallery-id" style='<?php echo !empty($query->page_id) && !empty($query->video_gallery_id) ? "" : "display:none";?>'>
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="type_id">Select Gallery</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <select class="form-control" name="video_gallery_id" id="video_gallery_id" disabled>
                                            <option value="">-- Select Video Gallery --</option>
                                            <?php foreach ($video_galleries as $row) : ?>
                                                <option value="<?php echo $row->video_gallery_id; ?>" <?php echo (!empty($query->video_gallery_id) && $row->video_gallery_id == $query->video_gallery_id) ? 'selected' : ''; ?>><?php echo $row->gallery_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div> -->

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="page_title">Page Title</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="page_title" id="page_title" onkeyup="getslug(this.value)" class="form-control" placeholder="Page Title" value="<?php echo (!empty($query->page_title)) ? $query->page_title : '' ?>" data-validation="required">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="banner_image">Banner Image</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="banner_image" id="banner_image" placeholder="Page Image" value="<?php echo (!empty($query->banner_image)) ? $query->banner_image : '' ?>">
                                        <?php if (!empty($query->banner_image) && file_exists(BANNER_IMAGE_PATH . $query->banner_image)) { ?>
                                            
                                                <img src="<?php echo BANNER_IMAGE_PATH . $query->banner_image; ?>" width="50">
                                            <input type="hidden" name="banner_image" value="<?php echo (!empty($query->banner_image)) ? $query->banner_image : ''; ?>" />
                                        <?php } ?><br />
                                        <?php if (!empty($query->banner_image)) { ?>
                                            <a href="master/pages_removeimg/<?php echo $query->page_id; ?>/<?php echo $query->banner_image ?>" onclick="return delete_action()">Remove Image</a>
                                        <?php } ?>
                                        <small>Note:  Banner image size  1349 x 213 </small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="display_images">Display Image</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="radiobuttons"><input name="display_image" value="1" type="radio" <?php echo (!empty($query->display_image)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="display_image" value="0" type="radio" <?php echo (empty($query->display_image)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="alt_title">alt Title</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="alt_title" id="page_title" class="form-control" placeholder="Alt Title" value="<?php echo (!empty($query->alt_title)) ? $query->alt_title : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="page_short_description">Page Short Description</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <textarea name="page_short_description" rows="4" id="page_short_description" class="form-control" placeholder="Page Short Description" data-validation="required"><?php echo (!empty($query->page_short_description)) ? $query->page_short_description : '' ?></textarea>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="page_content">Page Content</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <textarea name="page_content" id="page_content" rows="9" class="form-control ckeditor /summernote page_content" placeholder="Page Content" data-validation="required"><?php echo (!empty($query->page_content)) ? $query->page_content : '' ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="template_id">Select Gallery</label>
                                    </div>
                                </div>

                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <select name="gallery_id" id="gallery_id" class="form-control ">
                                            <option value="">Select Category - Gallery</option>
                                            <?php foreach ($galleries as $row) : ?>

                                            <option value="<?php echo $row->gallery_id; ?>" <?php echo (!empty($query->gallery_id) && $row->gallery_id == $query->gallery_id) ? 'selected' : ''; ?>><?php echo $this->db->where('category_id', $row->category_id)->get('category_gallery')->row()->category_name . ' - ' . $row->gallery_name; ?></option>

                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                          
                            </div>
                          

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="template_id">Template</label>
                                    </div>
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <div class="form-group">
                                        <select name="template_id" id="template_id" class="form-control" data-validation="required">
                                            <option value="">-- Templete Type --</option>
                                            <?php foreach ($templates as $row) : ?>
                                                <option value="<?php echo $row->template_id; ?>" <?php echo (!empty($query->template_id) && $row->template_id == $query->template_id) ? 'selected' : ''; ?>><?php echo $row->template_name; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="meta_title">Meta Title</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="<?php echo (!empty($query->meta_title)) ? $query->meta_title : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="meta_description">Meta Description</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <textarea type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"><?php echo (!empty($query->meta_description)) ? $query->meta_description : '' ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="meta_keywords">Meta Keywords</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo (!empty($query->meta_keywords)) ? $query->meta_keywords : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="other_meta_tags">Other Meta Tags (Only html tags format are allowed)</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="other_meta_tags" id="other_meta_tags" class="form-control" placeholder="Other Meta Tags" value="<?php echo (!empty($query->other_meta_tags)) ? $query->other_meta_tags : '' ?>">
                                        <small>Please enter value wrapped inside &lt;meta&rt;&lt;/meta&rt; tags</small>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="nofollow_ind">No Follow Tag</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="radiobuttons"><input name="nofollow_ind" value="1" type="radio" <?php echo (!empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="nofollow_ind" value="0" type="radio" <?php echo (empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="noindex_ind">No Index Tag</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <label class="radiobuttons"><input name="noindex_ind" value="1" type="radio" <?php echo (!empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="noindex_ind" value="0" type="radio" <?php echo (empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="canonical_url">Add Canonical URL</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="canonical_url" id="canonical_url" class="form-control" placeholder="Add Canonical URL" value="<?php echo (!empty($query->canonical_url)) ? $query->canonical_url : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="redirection_link">Redirection Link</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="redirection_link" id="redirection_link" class="form-control" placeholder="Redirection Link" value="<?php echo (!empty($query->redirection_link)) ? $query->redirection_link : '' ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="page_slug">Page Slug</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <?php echo form_error('page_slug'); ?>
                                        <input type="text" name="page_slug" id="page_slug" class="form-control" placeholder="Page Slug" value="<?php echo (!empty($query->page_slug)) ? $query->page_slug : '' ?>" data-validation="required">
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

                            <h3>Videos Section</h3>

                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="video_link_1">Video Link 1</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="video_link_1" id="video_link_1" class="form-control" placeholder="Video Link 1" value="<?php echo (!empty($query->video_link_1)) ? $query->video_link_1 : '' ?>">
                                    <small class="text-danger">Please enter youtube watch link example: https://www.youtube.com/watch?v=xcJtL7QggTI </small><br />
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="video_cover_img_1">Video 1 Cover Image</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <input type="file" name="video_cover_img_1" id="video_cover_img_1" placeholder="Page Image" value="<?php echo (!empty($query->video_cover_img_1)) ? $query->video_cover_img_1 : '' ?>">
                                        <?php if (!empty($query->video_cover_img_1) && file_exists(VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_1)) { ?>
                                            
                                                <img src="<?php echo VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_1; ?>" width="50">
                                            <input type="hidden" name="video_cover_img_1" value="<?php echo (!empty($query->video_cover_img_1)) ? $query->video_cover_img_1 : ''; ?>" />
                                        <?php } ?><br />
                                        <small class="text-danger">Please upload image with resolution 371x247 </small>    
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="video_link_2">Video Link 2</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="video_link_2" id="video_link_2" class="form-control" placeholder="Video Link 2" value="<?php echo (!empty($query->video_link_2)) ? $query->video_link_2 : '' ?>">
                                    <small class="text-danger">Please enter youtube watch link example: https://www.youtube.com/watch?v=xcJtL7QggTI </small><br />
                                </div>
                            </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="video_cover_img_2">Video 2 Cover Image</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <input type="file" name="video_cover_img_2" id="video_cover_img_2" placeholder="Page Image" value="<?php echo (!empty($query->video_cover_img_2)) ? $query->video_cover_img_2 : '' ?>">
                                        <?php if (!empty($query->video_cover_img_2) && file_exists(VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_2)) { ?>
                                            
                                            <img src="<?php echo VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_2; ?>" width="50">
                                            <input type="hidden" name="video_cover_img_2" value="<?php echo (!empty($query->video_cover_img_2)) ? $query->video_cover_img_2 : ''; ?>" />
                                            <?php } ?><br />
                                            <small class="text-danger">Please upload image with resolution 371x247 </small>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-3 col-sm-3 col-md-3">
                                    <div class="form-group">
                                        <label for="video_link_3">Video Link 3</label>
                                    </div>
                                </div>
                                <div class="col-xs-8 col-sm-8 col-md-8">
                                    <div class="form-group">
                                        <input type="text" name="video_link_3" id="video_link_3" class="form-control" placeholder="Video Link 3" value="<?php echo (!empty($query->video_link_3)) ? $query->video_link_3 : '' ?>">
                                    <small class="text-danger">Please enter youtube watch link example: https://www.youtube.com/watch?v=xcJtL7QggTI </small><br />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 col-sm-3 col-md-3">
                                <div class="form-group">
                                        <label for="video_cover_img_3">Video 3 Cover Image</label>
                                    </div>
                                </div>
                                <div class="col-xs-6 col-sm-6 col-md-6">
                                    <div class="form-group">
                                        <input type="file" name="video_cover_img_3" id="video_cover_img_3" placeholder="Page Image" value="<?php echo (!empty($query->video_cover_img_3)) ? $query->video_cover_img_3 : '' ?>">
                                        <?php if (!empty($query->video_cover_img_3) && file_exists(VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_3)) { ?>
                                            
                                                <img src="<?php echo VIDEO_COVER_IMAGE_PATH . $query->video_cover_img_3; ?>" width="50">
                                            <input type="hidden" name="video_cover_img_3" value="<?php echo (!empty($query->video_cover_img_3)) ? $query->video_cover_img_3 : ''; ?>" />
                                            <?php } ?><br />
                                            
                                            <small class="text-danger">Please upload image with resolution 371x247 </small>    
                                    </div>
                                </div>
                            </div>
                            
                            
                            

                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button class="btn btn-default" type="reset">
                                <i class="fa fa-refresh"></i>Reset</button>
                            &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp;
                            <a href="master/pages">
                                <button class="btn btn-warning " type="button">
                                    <i class="fa fa-times"></i>Back</button></a>
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- /.row -->
            </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

 <script>
    $(document).ready(function() {

$('.summernote').summernote({
    callbacks: {
        onImageUpload: function(files, editor, welEditable) {
            sendFile(files[0], editor, welEditable)
        },
        onMediaDelete: function(target) {
            // alert(target[0].src) 
            deleteFile(target[0].src);
        }
    },
    height: 300, // set editor height
    minHeight: null, // set minimum height of editor
    maxHeight: null, // set maximum height of editor
    focus: true, // set focus to editable area after initializing summernote
    fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New', 'Helvetica', 'Mukta', 'Impact', 'Tahoma', 'Times New Roman', 'Verdana', 'Roboto'],
    addDefaultFonts: false,
    styleTags: [
        'p',
        {
            title: 'Blockquote',
            tag: 'blockquote',
            className: 'blockquote',
            value: 'blockquote'
        },
        'pre', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'
    ],
});
})

function sendFile(file, editor, welEditable) {
data = new FormData();
data.append("file", file);
$.ajax({
    data: data,
    type: "POST",
    url: "blog/upload_editor_image",
    cache: false,
    contentType: false,
    processData: false,
    success: function(url) {
        $('.summernote').summernote("insertImage", url, 'filename');
    }
});
};

function deleteFile(src) {

$.ajax({
    data: {
        src: src
    },
    type: "POST",
    url: "blog/delete_editor_image", // replace with your url
    cache: false,
    success: function(resp) {
       
        console.log(resp);
    }
});
}
</script>