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

  <div class="card-header py-3 d-flex justify-content-between">
    <h6 class="m-0 my-2 font-weight-bold text-primary "><?php echo $page_heading; ?> <?php if (!empty($sub_heading)) { ?><small><?php echo $sub_heading; ?></small><?php } ?></h6>
    <div class="">
    <!-- <a href="gallery/video_gallery_categories" class=" btn btn-info" placeholder="" aria-controls="example1">Category List </a> -->
    <a href="gallery/gallery_videos" class=" btn btn-info" placeholder="" aria-controls="example1">Add video to Gallery</a>
    <a href="gallery/create_video_gallery" class=" btn btn-primary" placeholder="" aria-controls="example1">Create Video Gallery</a>
    </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
          <small class="text-red">Note: To create Video gallery first you need to create a Video gallery then add Videos to gallery.</small>

      <table id="video_gallery_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc">Video Gallery Name</th>
            <th>Created Date </th>
            <th>Status</th>
            <th>Action</th>
          </tr>

        </thead>
        <tbody>

        </tbody>

      </table>
    </div>
  </div>
</div>