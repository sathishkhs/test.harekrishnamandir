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
    <a href="gallery/add_videos" class=" btn btn-primary" placeholder="" aria-controls="example1">Add Video to Gallery</a>
  </div>
  <div class="card-body">
    <div class="table-responsive">


      <table id="gallery_video_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc">Video Name</th>
            <th class="sorting_asc">Gallery Name</th>
            <!-- <th class="sorting_asc">Category Name</th> -->
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

<script>
  $(document).ready(function(){

      var gallery_images = $('#gallery_img_table').DataTable({ 
          // 'processing': true,
          //  'serverSide': true,
          //  'serverMethod': 'post',
          //  "searching": true,
          "ajax": {
              url: "gallery/gallery_image_list",
             
          },
          
          // Set column definition initialisation properties.
          "columnDefs": [
          { 
              "targets": [ 0 ], //first column / numbering column
              "orderable": false, //set not orderable
          },
          ],
      })
    })
</script>