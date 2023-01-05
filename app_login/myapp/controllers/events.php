<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Events extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();

		$this->load->model('events_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['query'] = $this->events_model->view_data('events');
		$data['view'] = 'events/events_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Events List';
		$data['breadcrumb'] = 'Events List';
		$data['scripts'] = array('assets/javascripts/events.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function events_list(){
        $draw = $this->input->post('draw');
		$start = $this->input->post('start');
		$length = $this->input->post('length');
        $events = $this->events_model-> pagination('events');
        $data = array();

		foreach ($events->result() as $row) {
			$status = (!empty($row->status_ind) && ($row->status_ind == 1)) ? "<i class='fa fa-check-circle text-success'>Active</i> &nbsp;&nbsp;" : "<i class='nav-icon fa  fa-times-circle text-danger' >Inactive</i>";
			$event_cover_image = !empty($row->event_cover_image) ? "<img src='".EVENT_COVER_IMAGE_UPLOAD_PATH. $row->event_cover_image."' width='100px' height='80px'>" : 'Not Found';
			$data[] = array(
                  $row->event_name,
                $event_cover_image,
                $row->start_date_time,
				// $row->end_date_time,
				$status,
				'
				<td><div class="action-buttons">
				<a class="" title="Edit" href="events/events_edit/' . $row->event_id . '">
				<button class="btn btn-primary btn-small btn-xs"><i class="fa fa-edit"></i></button></a>&nbsp;
				<a class="red" title="Delete" href="events/events_delete/' . $row->event_id . '"> 
				<button class="btn btn-danger btn-small btn-xs"><i class="fa fa-trash"></i></button></a>&nbsp;
				</div></td>
				'

			);
		}

        $output = array(
			"draw" => $draw,
			"recordsTotal" => $events->num_rows(),
			"recordsFiltered" => $events->num_rows(),
			"data" => $data

		);
		echo json_encode($output);
		exit;

    }

    public function events_add(){
		$data['seva_categories'] = $this->events_model->view_data('seva_category');
		$data['view'] = 'events/events_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Events Form';
		$data['breadcrumb'] = 'Events Form';
		$data['scripts'] = array('assets/javascripts/events.js');
		$this->load->view('templates/dashboard', $data);
    }
    public function events_edit($event_id){
		$data['seva_categories'] = $this->events_model->view_data('seva_category');
        $this->events_model->primary_key = array('event_id'=>$event_id);
        $data['query'] = $this->events_model->get_row('events');
		$data['view'] = 'events/events_form';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Events Form';
		$data['breadcrumb'] = 'Events Form';
		$data['scripts'] = array('assets/javascripts/events.js');
		$this->load->view('templates/dashboard', $data);
    }

	public function events_save()
	 {
		 $event_id = $this->input->post('event_id');
		 $this->events_model->data = $this->input->post();
		 $start_date_time = explode(' ',$this->input->post('start_date_time'));
		 $end_date_time = explode(' ',$this->input->post('end_date_time'));
		 $this->events_model->data['start_date'] = date('Y F d',strtotime($start_date_time[0]));
		 $this->events_model->data['start_time'] = date('h:i A', strtotime($start_date_time[1]));
		 $this->events_model->data['end_date'] = date('Y F d',strtotime($end_date_time[0]));
		 $this->events_model->data['end_time'] = date('h:i A', strtotime($end_date_time[1]));

		// Image Upload Code Begins Here
		$this->event_cover_image = array('upload_path' => EVENT_COVER_IMAGE_UPLOAD_PATH, 'allowed_types' => 'gif|jpg|png|jpeg');
		$this->upload->initialize($this->event_cover_image);
		if (!empty($_FILES['event_cover_image']['name']) && $this->upload->do_upload('event_cover_image')) {
			$upload_data = $this->upload->data();
			$file_Ext =  pathinfo($upload_data['full_path'], PATHINFO_EXTENSION);
			$gen_filename = "event_cover_image" . rand(1000000, 9999999) . "." . $file_Ext;
			rename($upload_data['full_path'], $upload_data['file_path'] . $gen_filename);
			$this->events_model->data['event_cover_image'] = $gen_filename;
			// $this->createthumbs(array($upload_data['file_name']));
		} else {

			$data['form_error']['event_cover_image'] = $this->upload->display_errors();
		}


		 if (!empty($event_id)) {
			 
			
			 $this->events_model->primary_key = array('event_id' => $event_id);
			 if ($this->events_model->update('events')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Updated Successfully');
			 } else {
				 $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Update Record.');
			 }
		 } else {
			 unset($this->events_model->data['event_id']);
			
			 $this->events_model->data['added_date'] = date('Y-m-d h:i:s');
			 if ($this->events_model->insert('events')) {
				 $msg = array('type' => 'success', 'icon' => 'fa fa-check', 'txt' => 'Record Added Successfully');
			 } else {
				 $data['query'] = (object) $this->input->events();
				 $data['view'] = "events/events_form";
				 $data['title'] = 'Administrator Dashboard';
				 $data['page_heading'] = 'Add/Edit seva';
				 $data['breadcrumb'] = "Add/Edit seva";
				 $data['scripts'] = array('assets/javascripts/' . 'events.js');
				 $this->load->view('templates/dashboard', $data);
				 $msg = array('type' => 'danger', 'icon' => 'fa fa-thumbs-down', 'txt' => 'Sorry! Unable to Add Record.');
			 }
		 }
 
		 $this->session->set_flashdata('msg', $msg);
		 redirect("events");
	 }

	 public function events_delete($event_id){
		$this->events_model->primary_key = array('event_id'=>$event_id);
		$this->events_model->delete('events');
		redirect('events');
	 }


}