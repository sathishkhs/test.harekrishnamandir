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
    
    <div >
      <form method="post" id="date-download" action="donations/download_charitable_donations" class="d-flex align-items-center "> 
      <div class="form-group mr-5">
      <label for="festival">Select Program</label>
      <input type="hidden" name="program_name" id="program_name" value="">
      <select class="form-control  btn-secondary"  id="program">
          <option >Select Program</option>
          <?php foreach($charitable_programs as $program){ ?>
            <option value="<?php echo $program->page_slug; ?>"><?php echo $program->title; ?></option>
          <?php } ?>
      </select>
      </div>
      <div class="form-group mr-5">
        <label for="from_date">From Date</label>
        <input class="form-control" id="from_date" name="from_date" type="date" value="" >
      </div>
      <div class="form-group mr-5">
        <label for="from_date">To Date</label>
        <input class="form-control" id="to_date" name="to_date" type="date" value="" >
      </div>
    <input type="submit" id="download-charitable-donations" name="download" class=" btn btn-primary align-items-right" placeholder="" aria-controls="example1" value="Download Donations">
   
      </form>  
  </div>
  </div>
  <div class="card-body">
    <div class="table-responsive">
     
      <table id="charitable_donations_table" class="table display table-bordered table-striped table-hover dataTable dtr-inline" role="grid" aria-describedby="example1_info">
        <thead>
          <tr role="row">
            <th class="sorting_asc">Name</th>
            <th>Email</th>
            <th>Mobile</th>
            <th>City</th>
            <th>Pan</th>
            <th>Amount</th>
            <th> Date </th>
            <th>Seva Name</th>
            <th>Status</th>
            <th>Razor Payment Id</th>
            <th>Reason</th>
           
          </tr>

        </thead>
        <tbody>

        </tbody>

      </table>
    </div>
  </div>
</div>