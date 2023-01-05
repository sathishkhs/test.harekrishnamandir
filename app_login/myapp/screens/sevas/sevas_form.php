<section class="content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <form class="form-horizontal" action="sevas/sevas_save" method="post" enctype="multipart/form-data">
                            <input name="sevas_id" type="hidden" value="<?php echo (!empty($query->sevas_id)) ? $query->sevas_id : ''; ?>" />
                            <br />
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Seva Name </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('seva_name'); ?></span>
                                    <input name="seva_name" id="seva_name" type="text" class="form-control" value="<?php echo (!empty($query->seva_name)) ? $query->seva_name : ''; ?>"required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Seva Code </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('seva_code'); ?></span>
                                    <input name="seva_code" id="seva_code" type="text" class="form-control" value="<?php echo (!empty($query->seva_code)) ? $query->seva_code : ''; ?>"required />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Tally Head </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('tally_head'); ?></span>
                                    <input name="tally_head" id="tally_head" type="text" class="form-control" value="<?php echo (!empty($query->tally_head)) ? $query->tally_head : ''; ?>" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-1">Seva Amount </label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('seva_amount'); ?></span>
                                    <input name="seva_amount" id="seva_amount" type="number" class="form-control" value="<?php echo (!empty($query->seva_amount)) ? $query->seva_amount : ''; ?>" />
                                </div>
                            </div>
                            
                           

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-3">Seva Image</label>
                                <div class="col-sm-<?php echo !empty($query->seva_image) ? 8 : 10 ?>">
                                    <span class="eror"><?php echo form_error('seva_image'); ?></span>
                                    <input name="seva_image" type="file" class="form-control" value="" />
                                    <p class="custom-msg text-danger">Note: Image size Should be 550px width and 380px height</p>
                                </div>
                                <?php if (!empty($query->seva_image)) { ?>
                                    <div class="col-sm-2">
                                        <img src="<?php echo SEVAS_PHOTO_UPLOAD_PATH . $query->seva_image; ?>" width="80px" height="80px">
                                    </div>
                                <?php } ?>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-5"> Seva Description</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('description'); ?></span>
                                    <textarea name="description" type="text" class="form-control ckeditor /summernote" value=""><?php echo (!empty($query->description)) ? $query->description : ''; ?>  </textarea>
                                </div>
                            </div>
                            <div class="form-group">
								<label class="col-sm-2 col-md-2 control-label" for="form-field-4">Select Festival</label>
								<div class="col-sm-10">
								    <span class="eror"><?php echo form_error('sevas_id'); ?></span>
									<select class="form-control" name="festival_id" id="festival_id"  >
										<option value="">Select Festivals</option>
										<?php foreach ($sevas_page as $row) : ?>
                                            <option value="<?php echo $row->festival_id; ?>" <?php echo (!empty($query->festival_id) && $query->festival_id == $row->festival_id) ? 'selected' : ''; ?>><?php echo $row->sevas_page_title; ?></option>
                                        <?php endforeach ?>
									</select>
								</div>
							</div>




                            <div class="form-group">
                                <label class="col-sm-2 col-md-2 control-label" for="form-field-8">Status</label>
                                <div class="col-sm-10">
                                    <span class="eror"><?php echo form_error('status'); ?></span>
                                    <input name="status" value="1" type="radio" <?php echo (!empty($query->status)) ? 'checked' : ''; ?> />
                                    <span class="label label-success">Publish</span>
                                    &nbsp; &nbsp; &nbsp;&nbsp;
                                    <input name="status" value="0" type="radio" <?php echo (empty($query->status)) ? 'checked' : ''; ?> />
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
                                <a href="sevas">
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