<style>
    .dynamic {
        border-bottom: 1px solid #a6a6a6;
        margin-bottom: 20px;
    }
</style>

<div class="card shadow mb-4">
    <section class="content">
        <section class="wrapper">
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
                <div class="col-md-12">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <form class="form-horizontal" action="festivals/festival_save" method="post" enctype="multipart/form-data">
                                <input name="festival_id" type="hidden" value="<?php echo (!empty($query->festival_id)) ? $query->festival_id : ''; ?>" />
                                <input name="view_path" type="hidden" value="<?php echo (!empty($query->view_path)) ? $query->view_path : 'festivals/page'; ?>" />
                                <input name="template_path" type="hidden" value="<?php echo (!empty($query->template_path)) ? $query->template_path : 'templates/festivals_page'; ?>" />
                                <br />
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-1">Title </label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('festival_title'); ?></span>
                                        <input name="festival_title" id="festival_title" type="text" class="form-control" onkeyup="getslug(this.value)" value="<?php echo (!empty($query->festival_title)) ? $query->festival_title : ''; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-3">Banner Image</label>
                                    <div class="col-sm-<?php echo !empty($query->festival_banner) ? 8 : 10 ?>">
                                        <span class="eror"><?php echo form_error('seva_image'); ?></span>
                                        <input name="festival_banner" type="file" class="form-control" value="" />
                                        <small class="custom-msg text-danger">Note: Image size Should be 1550px width and 500px height</small>
                                    </div>
                                    <?php if (!empty($query->festival_banner)) { ?>
                                        <div class="col-sm-2">
                                            <img src="<?php echo FESTIVAL_BANNER_PATH . $query->festival_banner; ?>" width="80px" height="80px">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-3">Program Thumbnail</label>
                                    <div class="col-sm-<?php echo !empty($query->thumbnail) ? 8 : 10 ?>">
                                        <span class="eror"><?php echo form_error('thumbnail'); ?></span>
                                        <input name="thumbnail" type="file" class="form-control" value="" />
                                        <small class="custom-msg text-danger">Note: Image size Should be 550px width and 550px height</small>
                                    </div>
                                    <?php if (!empty($query->thumbnail)) { ?>
                                        <div class="col-sm-2">
                                            <img src="<?php echo FESTIVAL_BANNER_PATH . $query->thumbnail; ?>" width="80px" height="80px">
                                        </div>
                                    <?php } ?>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-1"> Top Description</label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('top_description'); ?></span>
                                        <textarea name="top_content" id="top_content" rows="9" class="form-control ckeditor /summernote schedule_content" placeholder="Page Content" data-validation="required"><?php echo (!empty($query->top_content)) ? $query->top_content : '' ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-5"> Side Description</label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('side_description'); ?></span>
                                        <textarea name="side_description" type="text" class="form-control ckeditor /summernote" value=""><?php echo (!empty($query->side_description)) ? $query->side_description : ''; ?>  </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-5"> Bottom Description</label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('bottom_description'); ?></span>
                                        <textarea name="bottom_description" type="text" class="form-control ckeditor /summernote" value=""><?php echo (!empty($query->bottom_description)) ? $query->bottom_description : ''; ?>  </textarea>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-1"> Date </label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('festival_date'); ?></span>
                                        <input name="festival_date" id="festival_date" type="date" class="form-control" value="<?php echo (!empty($query->festival_date)) ? $query->festival_date : ''; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-1"> Time </label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('festival_time'); ?></span>
                                        <input name="festival_time" id="festival_time" type="time" class="form-control" value="<?php echo (!empty($query->festival_time)) ? $query->festival_time : ''; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-8">Program Type</label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('program_type'); ?></span>
                                        <input name="program_type" value="0" type="radio" <?php echo (empty($query->program_type)) ? 'checked' : ''; ?> />
                                        <span class="label label-danger">Charitable Program</span>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <input name="program_type" value="1" type="radio" <?php echo (!empty($query->program_type)) ? 'checked' : ''; ?> />
                                        <span class="label label-success">Nitya Sevas</span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Show this programme on Donation Page </label>
                                    <div class="col-sm-10">
                                        <label class="radiobuttons"><input name="featured_programme" value="1" type="radio" <?php echo (!empty($query->featured_programme)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="featured_programme" value="0" type="radio" <?php echo (empty($query->featured_programme)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>




                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-6">Page Slug<span class="eror"><?php echo form_error('page_slug'); ?></span></label>
                                    <div class="col-sm-10">
                                        <input name="page_slug" id="page_slug" type="text" class="form-control" value="<?php echo (!empty($query->page_slug)) ? $query->page_slug : ''; ?>" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Meta Title</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_title" id="meta_title" class="form-control" placeholder="Meta Title" value="<?php echo (!empty($query->meta_title)) ? $query->meta_title : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Meta Description</label>
                                    <div class="col-sm-10">
                                        <textarea type="text" name="meta_description" id="meta_description" class="form-control" placeholder="Meta Description"><?php echo (!empty($query->meta_description)) ? $query->meta_description : '' ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Meta Keywords</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="meta_keywords" id="meta_keywords" class="form-control" placeholder="Meta Keywords" value="<?php echo (!empty($query->meta_keywords)) ? $query->meta_keywords : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Other Meta Tags (Only html tags format are allowed)</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="other_meta_tags" id="other_meta_tags" class="form-control" placeholder="Other Meta Tags" value="<?php echo (!empty($query->other_meta_tags)) ? $query->other_meta_tags : '' ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">No Follow Tag</label>
                                    <div class="col-sm-10">
                                        <label class="radiobuttons"><input name="nofollow_ind" value="1" type="radio" <?php echo (!empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="nofollow_ind" value="0" type="radio" <?php echo (empty($query->nofollow_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-2 control-label" for="form-field-4">No Index Tag</label>
                                    <div class="col-sm-10">
                                        <label class="radiobuttons"><input name="noindex_ind" value="1" type="radio" <?php echo (!empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">Yes</span></label>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <label class="radiobuttons"><input name="noindex_ind" value="0" type="radio" <?php echo (empty($query->noindex_ind)) ? 'checked' : ''; ?> />
                                            <span class="lbl">No</span></label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-4">Add Canonical URL</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="canonical_url" id="canonical_url" class="form-control" placeholder="Add Canonical URL" value="<?php echo (!empty($query->canonical_url)) ? $query->canonical_url : '' ?>">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-4">Redirection Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="redirection_link" id="redirection_link" class="form-control" placeholder="Redirection Link" value="<?php echo (!empty($query->redirection_link)) ? $query->redirection_link : '' ?>">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="col-sm-6 col-md-6 control-label" for="form-field-8">Status</label>
                                    <div class="col-sm-10">
                                        <span class="eror"><?php echo form_error('status_ind'); ?></span>
                                        <input name="status_ind" value="1" type="radio" <?php echo (!empty($query->status_ind)) ? 'checked' : ''; ?> />
                                        <span class="label label-success">Publish</span>
                                        &nbsp; &nbsp; &nbsp;&nbsp;
                                        <input name="status_ind" value="0" type="radio" <?php echo (empty($query->status_ind)) ? 'checked' : ''; ?> />
                                        <span class="label label-danger">Unpublish</span>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="col-sm-8 col-md-8 control-label" for="form-field-4">Form Heading</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="form_heading" id="form_heading" class="form-control" placeholder="Form Heading" value="<?php echo (!empty($query->form_heading)) ? $query->form_heading : '' ?>">
                                    </div>
                                </div>




                                <div class="container my-2">
                                    <section class="content">
                                        <section class="wrapper">

                                            <h3>Seva Details</h3>
                                            <?php $add_row_val = 1;

                                            if (!empty($sevas)) {

                                                foreach ($sevas as $key => $row) {

                                            ?>
                                                    <div class="row dynamic" id="dynamic<?php echo $row->sevas_id; ?>" data_count="<?php echo $row->sevas_id; ?>">


                                                        <div class="form-group col-md-6">
                                                            <label for="seva_name[<?php echo $row->sevas_id; ?>]">Seva Name*</label>
                                                            <input type="text" class="form-control" name="seva_name[<?php echo $row->sevas_id; ?>]" id="seva_name[<?php echo $row->sevas_id; ?>]" placeholder="Seva Name*" value="<?php echo (!empty($row->seva_name)) ? $row->seva_name : '' ?>" data-validation="required" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="seva_amount[<?php echo $row->sevas_id; ?>]">Seva Amount*</label>
                                                            <input type="text" class="form-control" name="seva_amount[<?php echo $row->sevas_id; ?>]" id="seva_amount[<?php echo $row->sevas_id; ?>]" placeholder="Seva Amount*" value="<?php echo (!empty($row->seva_amount)) ? $row->seva_amount : '' ?>" data-validation="required" required>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="seva_image[<?php echo $row->sevas_id; ?>]">Seva Image*</label>
                                                            <input type="file" name="seva_image[<?php echo $row->sevas_id; ?>]" id="seva_image[<?php echo $row->sevas_id; ?>]" class="form-control" placeholder="Seva Image" value="<?php echo $row->seva_image; ?>">
                                                            <?php if (!empty($row->seva_image)) { ?>
                                                                <img src="<?php echo (!empty($row->seva_image) ? SEVA_IMAGE_PATH . $row->seva_image : '') ?>" width="70px" height="70px">
                                                                <input type="hidden" name="backup_image[<?php echo $row->sevas_id; ?>]" value="<?php echo $row->seva_image; ?>">
                                                            <?php } else {
                                                            } ?>
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label class="col-sm-6 col-md-6 control-label" for="form-field-8">Status</label>
                                                            <div class="col-sm-10">
                                                                <span class="eror"><?php echo form_error('status_ind'); ?></span>
                                                                <input name="status[<?php echo $row->sevas_id; ?>]" value="1" type="radio" <?php echo (!empty($row->status)) ? 'checked' : ''; ?> />
                                                                <span class="label label-success">Publish</span>
                                                                &nbsp; &nbsp; &nbsp;&nbsp;
                                                                <input name="status[<?php echo $row->sevas_id; ?>]" value="0" type="radio" <?php echo (empty($row->status)) ? 'checked' : ''; ?> />
                                                                <span class="label label-danger">Unpublish</span>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-6 col-sm-6 col-md-2">
                                                            <div class="form-group">
                                                                <button name="remove" value="remove" type="button" onclick="return remove_row(<?php echo $row->sevas_id; ?> );" class="btn btn-danger pull-right">Remove </button>
                                                            </div>

                                                        </div>
                                                    </div>
                                                <?php $add_row_val = $row->sevas_id;
                                                }
                                            } else { ?>

                                                <div class="row dynamic" id="dynamic1" data_count='<?php echo 1; ?>'>
                                                    <div class="form-group col-md-6">
                                                        <label for="seva_name[1]">Seva Name*</label>
                                                        <input type="text" class="form-control" name="seva_name[1]" id="seva_name[1]" placeholder="Seva Name*" value="" data-validation="required" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="seva_amount[1]">Seva Amount*</label>
                                                        <input type="text" class="form-control" name="seva_amount[1]" id="seva_amount[1]" placeholder="Seva Amount*" value="" data-validation="required" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="seva_image[1]">Seva Image*</label>
                                                        <input type="file" name="seva_image[1]" id="seva_image[1]" class="form-control" placeholder="Seva Image" value="">
                                                        <?php if (!empty($query_data->seva_image)) { ?>
                                                            <img src="<?php echo (!empty($query_data->seva_image) ? SEVA_IMAGE_PATH . $query_data->seva_image : '') ?>" width="70px" height="70px">
                                                        <?php } else {
                                                        } ?>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label class="col-sm-10 col-md-10 control-label" for="form-field-8">Status</label>
                                                        <div class="col-sm-10">
                                                            <span class="eror"><?php echo form_error('status_ind'); ?></span>
                                                            <input name="status[1]" value="1" type="radio" checked />
                                                            <span class="label label-success">Publish</span>
                                                            &nbsp; &nbsp; &nbsp;&nbsp;
                                                            <input name="status[1]" value="0" type="radio" />
                                                            <span class="label label-danger">Unpublish</span>
                                                        </div>
                                                    </div>

                                                    <hr>
                                                </div>
                                            <?php } ?>
                                            <div class="form-group col-md-2 ">
                                                <button type="button" class="btn btn-primary " id='add_more_btn' onclick="return add_morerow();"> Add More
                                                </button>
                                            </div>
                                        </section>
                                    </section>
                                </div>

                                <div class="form-actions form-btns  form-group">
                                    <div class="col-sm-10">
                                        <button class="btn btn-round btn-success" type="submit">
                                            <i class="fa fa-check"></i>
                                            Save
                                        </button>
                                        &nbsp; &nbsp; &nbsp;
                                        <button class="btn btn-round btn-default" type="reset">
                                            <i class="fa fa-refresh"></i>
                                            Reset
                                        </button>
                                        &nbsp; &nbsp; &nbsp;
                                        <a href="sevas/seva_pages">
                                            <button class="btn btn-warning btn-round" type="button">
                                                <i class="fa fa-times"></i>
                                                Back
                                            </button></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

</div>

<script>
    var current_count = <?php echo $add_row_val; ?>;

    function add_morerow() {
        old_val = parseInt($('.dynamic').last().attr('data_count'));

        val = old_val + 1;
        var html = '<div class="row dynamic" id="dynamic' + val + '" data_count="' + val + '">';
        html += '<div class="form-group col-md-6">';
        html += '<label for="seva_name[' + val + ']">Seva Name*</label>'
        html += '<input type="text" class="form-control" name="seva_name[' + val + ']" id="seva_name[' + val + ']" placeholder="Seva Name*" value="" data-validation="required" >';
        html += '</div>';
        html += '<div class="form-group col-md-6">';
        html += '<label for="seva_amount[' + val + ']">Seva Amount*</label>'
        html += '<input type="text" class="form-control" name="seva_amount[' + val + ']" id="seva_amount[' + val + ']" placeholder="Seva Amount*" value="" data-validation="required" >';
        html += '</div>';
        html += '<div class="form-group col-md-6">';
        html += '<label for="seva_image[' + val + ']">Seva Image*</label>'
        html += '<input type="file" name="seva_image[' + val + ']" id="seva_image[' + val + ']" class="form-control" placeholder="Seva Image" value="">';
        html += '</div>';
        html += '<div class="form-group col-md-6">';
        html += '<label class="col-sm-10 col-md-10 control-label" for="form-field-8">Status</label>';
        html += '<div class="col-sm-10">';
        html += '<input name="status[' + val + ']" value="1" type="radio"  checked/>';
        html += '<span class="label label-success">Publish</span>';
        html += '&nbsp; &nbsp; &nbsp;&nbsp;';
        html += '<input name="status[' + val + ']" value="0" type="radio"  />';
        html += '<span class="label label-danger">Unpublish</span>';
        html += '</div>';
        html += '</div>';
        html += '<div class="col-md-2 my-2">';
        html += '<button name="remove" value="remove" type="button" onclick="return remove_row(' + val + ');" class="btn btn-danger pull-right" "  >Remove</button>';
        html += '</div>';
        html += '<hr>';
        html += '</div>';

        $('#dynamic' + old_val).after(html);
        $("#add_more_btn").attr("onclick", "return add_morerow(" + val + ");");

        current_count = current_count + 1;


    }

    function remove_row(val) {

        $('#dynamic' + val).remove();
        $('#add_more_btn').attr('onclick', 'return add_morerow(' + (val - 1) + ');');
        current_count = val - 1;


    }
</script>




<script src="../js-plugins/summernote/summernote-lite.min.js"></script>
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