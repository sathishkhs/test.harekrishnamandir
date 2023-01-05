<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

	require '../vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Festival_donations extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('payments_model');
		$user_id = $this->session->userdata('user_id');
		if (empty($user_id)) {
			redirect('');
		}
	}

	public function index(){
		$data['festivals'] = $this->payments_model->view('sevas_page');
		$data['view'] = 'festival_donations/donations_list';
		$data['title'] = 'Administrator Dashboard';
		$data['page_heading'] = 'Donations List';
		$data['breadcrumb'] = 'Donations List';
		$data['scripts'] = array('assets/javascripts/festival_donations.js');
		$this->load->view('templates/dashboard', $data);
	}

	public function donations_list($slug){
		$draw = intval($this->input->post("draw"));
		$start = intval($this->input->post("start"));
		$length = intval($this->input->post("length"));
		$payments = $this->payments_model->get_pagination($slug);

		$data = array();
		foreach ($payments->result() as $row) {
		if(!empty($row->status) ){
			if($row->status == 'success'){
		    $status = '<span class="text-success">Success</span>';
			}else{
			$status = 	'<span class="text-danger">Failed</span>';
			}
		}else{
		    $status = '<span class="text-warning">Dropped</span>';
		}
			$data[] = array(
				$row->full_name,
				$row->email,
				$row->phone_number,
				$row->seva_name,
				$row->amount,
				$row->razorpay_payment_id,
				$status,
				$row->reason,
				$row->payment_date
				

			);
		}
		$output = array(
			"draw" => $draw,
			"recordsTotal" => $payments->num_rows(),
			"recordsFiltered" => $payments->num_rows(),
			"data" => $data
		);
		echo json_encode($output);
		exit();
	}
}