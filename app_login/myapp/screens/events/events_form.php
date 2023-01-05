<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <form class="form-horizontal" action="events/events_save" method="post" enctype="multipart/form-data">
                            <input name="event_id" type="hidden" value="<?php echo (!empty($query->event_id)) ? $query->event_id : ''; ?>" />
                            <br />
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Event Name </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('event_name'); ?></span>
                                    <input name="event_name" id="event_name" type="text" placeholder="Event Name" class="form-control" value="<?php echo (!empty($query->event_name)) ? $query->event_name : ''; ?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Event Date </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('start_date_time'); ?></span>
                                    <input name="start_date_time" id="start_date_time"  placeholder="Event date" class="form-control datetimepicker" value="<?php echo (!empty($query->start_date_time)) ? $query->start_date_time : ''; ?>" required/>
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Event End Date </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('end_date_time'); ?></span>
                                    <input name="end_date_time" id="end_date_time"  placeholder="Event End Date" class="form-control datetimepicker" value="<?php echo (!empty($query->end_date_time)) ? $query->end_date_time : ''; ?>" required/>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1"> Redirection Link </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('event_redirection_link'); ?></span>
                                    <input name="event_redirection_link" id="event_redirection_link" type="text" placeholder="Redirection Link" class="form-control" value="<?php echo (!empty($query->event_redirection_link)) ? $query->event_redirection_link : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Event Description </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('from_time'); ?></span>
                                    <textarea name="event_description" id="event_description" type="text" placeholder="Event Description" class="form-control ckeditor /summernote"><?php echo (!empty($query->event_description)) ? $query->event_description : ''; ?> </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                            <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Event Cover Image </label>
                            <div class="col-sm-10">
                            <input type="file" name="event_cover_image" id="event_cover_image" placeholder="Event Cover Image" value="<?php echo (!empty($query->event_cover_image)) ? $query->event_cover_image : '' ?>">
                            <?php if (!empty($query->event_cover_image) && file_exists(EVENT_COVER_IMAGE_UPLOAD_PATH . $query->event_cover_image)) { ?>

                                <img src="<?php echo EVENT_COVER_IMAGE_UPLOAD_PATH . $query->event_cover_image; ?>" width="50">
                                <input type="hidden" name="event_cover_image" value="<?php echo (!empty($query->event_cover_image)) ? $query->event_cover_image : ''; ?>" />
                            <?php } ?><br />
                            <?php if (!empty($query->event_cover_image)) { ?>
                                <a href="blog/post_removeimg/<?php echo $query->event_id; ?>/<?php echo $query->event_cover_image ?>" onclick="return delete_action()">Remove Image</a>
                            <?php } ?>
                            <small class="text-danger">Image resolution should be 350x350</small>
                            </div>
                        </div>
                            
                            <!-- <h4>Organiser Details</h4>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Organiser Name </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('organiser_name'); ?></span>
                                    <input name="organiser_name" id="organiser_name" type="text" placeholder="Organiser Name" class="form-control" value="<?php echo (!empty($query->organiser_name)) ? $query->organiser_name : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Organisation</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('organisation'); ?></span>
                                    <input name="organisation" id="organisation" type="text" placeholder="Organisation" class="form-control" value="<?php echo (!empty($query->organisation)) ? $query->organisation : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Website</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('website'); ?></span>
                                    <input name="website" id="website" type="text" placeholder="Website" class="form-control" value="<?php echo (!empty($query->website)) ? $query->website : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Email</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('email'); ?></span>
                                    <input name="email" id="email" type="text" placeholder="Email" class="form-control" value="<?php echo (!empty($query->email)) ? $query->email : ''; ?>" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Mobile</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('mobile'); ?></span>
                                    <input name="mobile" id="mobile" type="text" placeholder="Mobile" class="form-control" value="<?php echo (!empty($query->mobile)) ? $query->mobile : ''; ?>" />
                                </div>
                            </div>
                            -->

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status</label>
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
                            <div class="form-actions form-btns">
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
                                <a href="events">
                                    <button class="btn btn-warning btn-round" type="button">
                                        <i class="fa fa-times"></i>
                                        Back
                                    </button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<script src="../js-plugins/summernote/summernote-lite.min.js"></script>
<script >

    $(document).ready(function(){
 
 $('.summernote').summernote({
     height: 300,                 // set editor height
     minHeight: null,             // set minimum height of editor
     maxHeight: null,             // set maximum height of editor
     focus: true ,                 // set focus to editable area after initializing summernote
   });
})
</script>